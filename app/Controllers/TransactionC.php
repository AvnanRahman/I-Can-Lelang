<?php

namespace App\Controllers;

use App\Models\BidOrderModel;
use App\Models\EditUser;
use App\Models\ShippingModel;
use App\Models\TransactionLogModel;
use App\Models\TransactionModel;

class TransactionC extends BaseController
{
    protected $bidOrderModel;
    protected $shippingModel;
    protected $transactionModel;
    protected $transactionlogModel;
    protected $userModel;

    public function __construct()
    {
        $this->bidOrderModel = new BidOrderModel();
        $this->shippingModel = new ShippingModel();
        $this->transactionModel = new TransactionModel();
        $this->transactionlogModel = new TransactionLogModel();
        $this->userModel = new EditUser();
    }

    public function checkout($id)
    {
        $bid = $this->bidOrderModel->find($id);
        $data = [
            'title' => 'Checkout Page',
            'validation' => \Config\Services::validation(),
            'bid' => $bid
        ];

        return view('pages/checkout', $data);
    }

    public function insertTransaction($bid_id, $totalPrice)
    {
        $idTransaction = rand(0, 99999);
        $idShipping = rand(0, 99999);
        $shippingPrice = 20000;


        //insert table shipping address
        $data_shipping = [
            'shipping_address_id' => $idShipping,
            'full_address' => $this->request->getPost('address'),
            'city' => $this->request->getPost('city'),
            'zip_code' => $this->request->getPost('postcode'),
            'receiver' => $this->request->getPost('receivername'),
            'phone' => $this->request->getPost('telpnumber')
        ];
        $this->shippingModel->insert_shippingAddress($data_shipping);

        //insert table transaction
        $data_transaction = [
            'transaction_id' => $idTransaction,
            'user_id ' => user()->id,
            'bid_order_id' => $bid_id,
            'transaction_date' => date('Y-m-d H:i:s'),
            'shipping_address_id' => $idShipping,
            'shipping_price' => $shippingPrice,
            'total' => $totalPrice
        ];
        $this->transactionModel->insert_transaction($data_transaction);

        //insert table transaction log
        $data_t_log = [
            'transaction_id' => $idTransaction,
            'user_id ' => user()->id,
            'total' => $totalPrice
        ];
        $this->transactionlogModel->insert_transactionLog($data_t_log);

        //update table user -> column balance
        $balance = user()->balance;

        $newBalance = $balance - $totalPrice;
        $this->userModel->save([
            'id' => user()->id,
            'balance' => $newBalance
        ]);

        //update table bid order -> column is active
        $this->bidOrderModel->save([
            'bid_order_id' => $bid_id,
            'is_active' => 0,
            'is_sold' => 1
        ]);

        session()->setFlashdata('suksesCheckout', 'Transaksi Produk Berhasil!');
        return redirect()->to('/');
    }
}
