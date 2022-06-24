<?php

namespace App\Controllers;

use App\Models\BidOrderModel;
use App\Models\ImagesModel;

class BidOrderC extends BaseController
{
    protected $bidOrderModel;
    protected $imagesModel;

    public function __construct()
    {
        $this->bidOrderModel = new BidOrderModel();
        $this->imagesModel = new ImagesModel();
    }

    public function jualpages()
    {
        $data = [
            'title' => 'Tambah Produk',
        ];
        return view('pages/jual', $data);
    }

    public function insertBid()
    {
        $files = $this->request->getFiles();

        if ($files) {
            $bidId = rand(0, 99999);
            $picId = rand(0, 99999);
            $img = array(null, null, null, null);
            $i = 0;

            foreach ($files['images'] as $key => $image) {
                $imageName = $image->getRandomName();
                // array_push($img, $imageName);
                $img[$i] = $imageName;
                $image->move('img/', $imageName);
                $i++;
            }

            $data_images = [
                'picture_product_id' => $picId,
                'picture1' => $img[0],
                'picture2' => $img[1],
                'picture3' => $img[2],
                'picture4' => $img[3],
            ];
            $this->imagesModel->insert_images($data_images);

            $data_bidorder = [
                'bid_order_id' => $bidId,
                'product_name' => $this->request->getPost('name'),
                'product_description' => $this->request->getPost('desc'),
                'user_id ' => user()->id,
                'picture_product_id' => $picId,
                'increment_in_price_per_bid' => $this->request->getPost('bid'),
                'bid_start_time' => $this->request->getPost('start'),
                'bid_end_time' => $this->request->getPost('end'),
                'base_price' => $this->request->getPost('openbid'),
                'buy_it_now_price' => $this->request->getPost('binprice'),
                'current_bid' => $this->request->getPost('openbid'),
                'is_active' => '0',
                'is_sold' => '0'
            ];
            $this->bidOrderModel->insert_bidorder($data_bidorder);
            session()->setFlashdata('sukses', 'Pelelangan Anda Berhasil Diajukan!');
            return redirect()->to('/');
        }
    }
}
