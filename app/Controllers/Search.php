<?php

namespace App\Controllers;

use \App\Models\TransaksiLog;
use \App\Models\BidOrder;
use \App\Models\Transaksi;
use \App\Models\ShippingAddress;
use \App\Models\EditUser;
use App\Models\pertanyaanModel;
use App\Models\imagesModel;

#For static page
class Search extends BaseController
{

    protected $bidOrder;

    public function __construct()
    {
        $this->riwayatModel = new TransaksiLog();
        $this->transaksiModel = new Transaksi();
        $this->bidModel = new BidOrder();
        $this->shippingModel = new ShippingAddress();
        $this->userModel = new EditUser();
        $this->pertanyaanModel = new pertanyaanModel();
        $this->imagesModel = new imagesModel();
    }


    public function index()
    {
        // $bid = $this->bidModel->findAll();
        $currentPage = $this->request->getVar('page_bid_order') ? $this->request->getVar('page_bid_order') : 1;
        // d($this->request->getVar('keyword'));
        $array = array('is_active' => 1, 'is_sold' => 0);
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $bid =  $this->bidModel->where($array)->search($keyword);
        } else {
            $bid = $this->bidModel->where($array);
        }

        $data = [
            'title' => 'Search Produk',
            'bid' => $bid->paginate(6, 'bid_order'),
            'pager' => $this->bidModel->pager,
            'currentPage' => $currentPage
        ];

        return view('pages/search', $data);
    }
}
