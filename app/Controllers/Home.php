<?php

namespace App\Controllers;

use \App\Models\TransaksiLog;
use \App\Models\BidOrder;
use \App\Models\Transaksi;
use \App\Models\ShippingAddress;
use \App\Models\EditUser;

class Home extends BaseController
{
    // public function index()
    // {
    //     $data = [
    //         'title' => 'I-Can Lelang',
    //     ];

    //     return view('pages/index', $data);
    // }
    public function __construct()
    {
        $this->riwayatModel = new TransaksiLog();
        $this->transaksiModel = new Transaksi();
        $this->bidModel = new BidOrder();
        $this->shippingModel = new ShippingAddress();
        $this->userModel = new EditUser();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard I-Can Lelang',
        ];
        return view('pages/index', $data);
    }
}
