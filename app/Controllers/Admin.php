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
class Admin extends BaseController
{
    public function __construct()
    {
        $this->bidOrderModel = new BidOrderModel();
        $this->pertanyaanModel = new pertanyaanModel();
    }

    public function dashboard()
    {
        $array = array('is_active' => 0, 'is_sold' => 0);
        $list = $this->bidOrderModel->where($array)->findAll();
        $data = [
            'title' => 'Dashboard Admin',
            'list' => $list
        ];

        return view('admin/dashboard', $data);
    }

    public function detailProduct($value)
    {
        $data = [
            'title' => 'Detail Produk',
            'id' => $value
        ];
        return view('admin/detail_product', $data);
    }

    public function accept($value)
    {
        $this->bidOrderModel->where(['bid_order_id' => $value])->save([
            'bid_order_id' => $value,
            'is_active' => 1
        ]);
        return redirect()->to('/dashboard');
    }

    public function delete($value)
    {
        $this->bidOrderModel->where(['bid_order_id' => $value])->delete();
        return redirect()->to('/dashboard');
    }

    public function pertanyaan()
    {
        $list = $this->pertanyaanModel->findAll();
        $data = [
            'title' => 'Daftar Pertanyaan',
            'list' => $list
        ];

        return view('admin/pertanyaan', $data);
    }
}
