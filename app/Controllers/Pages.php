<?php

namespace App\Controllers;

use \App\Models\TransaksiLog;
use \App\Models\BidOrder;
use \App\Models\BidOrderModel;
use \App\Models\Transaksi;
use \App\Models\ShippingAddress;
use \App\Models\EditUser;
use App\Models\pertanyaanModel;
use App\Models\bidLogModel;


#For static page
class Pages extends BaseController
{

    public function __construct()
    {
        $this->bidLogModel = new bidLogModel();
        $this->riwayatModel = new TransaksiLog();
        $this->transaksiModel = new Transaksi();
        $this->bidModel = new BidOrder();
        $this->shippingModel = new ShippingAddress();
        $this->userModel = new EditUser();
        $this->pertanyaanModel = new pertanyaanModel();
        $this->bidOrderModel = new BidOrderModel();
    }

    // public function index()
    // {
    //     $data = [
    //         'title' => 'Dashboard I-Can Lelang',
    //     ];

    //     return view('pages/index', $data);
    // }

    public function faq()
    {
        $data = [
            'title' => 'Frequently Asked Question',
        ];

        return view('pages/faq', $data);
    }

    public function insertFAQ()
    {
        $data_quest = [
            'question' => $this->request->getPost('quest'),
            'user_id' => user()->id,
        ];

        $this->pertanyaanModel->insert_quest($data_quest);
        return redirect()->to('pages/faq');
    }

    public function pdDetail($value)
    {
        $data = [
            'title' => 'Detail Produk',
            'id' => $value,
        ];
        // $data['id'] = $value;
        return view('pages/detail_product', $data);
    }

    public function tawar($id)
    {
        $sementara = $this->bidOrderModel->where(['bid_order_id' => $id])->findColumn('current_bid');
        $tawaran = $this->request->getVar('tawaran');
        $array = array('bid_order_id' => $id, 'user_id' => user()->id);
        $lastbid = $this->bidLogModel->where($array)->findAll();

        if ($sementara[0] < $tawaran) {
            if ($lastbid == null) {
                $this->bidLogModel->save([
                    'bid_order_id' => $id,
                    'user_id' => user()->id,
                    'last_bid' => $tawaran,
                ]);
            } else {
                $this->bidLogModel->save([
                    'bid_log_id' => $lastbid[0]['bid_log_id'],
                    'bid_order_id' => $id,
                    'user_id' => user()->id,
                    'last_bid' => $tawaran,
                ]);
            }
            $this->bidOrderModel->save([
                'bid_order_id' => $id,
                'current_bid' => $tawaran,
            ]);
            session()->setFlashdata('sukses', 'Tawaran Anda Berhasil Diajukan!');
        } else {
            session()->setFlashdata('pesan', 'Tawaran Anda Tidak Boleh Di Bawah Harga Tawaran Sementara!');
        }
        return redirect()->to('/product/' . $id);
    }
}
