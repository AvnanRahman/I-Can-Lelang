<?php

namespace App\Controllers;

use \App\Models\TransaksiLog;
use \App\Models\BidOrder;
use \App\Models\Transaksi;
use \App\Models\ShippingAddress;
use \App\Models\EditUser;

class User extends BaseController
{
    protected $riwayatModel;
    protected $allowedFields = ['fullname', 'address', 'date_of_birth', 'phone', 'is_seller'];

    public function __construct()
    {
        $this->riwayatModel = new TransaksiLog();
        $this->transaksiModel = new Transaksi();
        $this->bidModel = new BidOrder();
        $this->shippingModel = new ShippingAddress();
        $this->userModel = new EditUser();
    }

    public function account()
    {
        $login_user_id = user()->id;
        $userInfo = $this->userModel->where(['id' => $login_user_id])->first();

        $data = [
            'title' => 'My Account',
            'userInfo' => $userInfo,
        ];

        return view('user/account', $data);
    }

    public function editAccount($id)
    {
        // $login_user_id = user()->id;
        // $updateUser = $this->userModel->where(['id' => $id])->first();

        $data = [
            'title' => 'Edit My Account',
            'validation' => \Config\Services::validation(),
            'updateUser' => $this->userModel->getUser($id),

        ];
        // dd($updateUser);

        return view('user/account_edit', $data);
    }

    public function update($id)
    {
        $rule_nama = 'required';
        $rule_number = 'required|integer';
        $rule_profile = 'max_size[profile,1024]|is_image[profile]|mime_in[profile,image/jpg,image/jpeg,image/png]';
        //validasi input
        if (!$this->validate([
            'fullname' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => 'Nama wajib di isi.',
                ]
            ],
            'address' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => 'Alamat wajib di isi.'
                ]
            ],
            'date_of_birth' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => 'Tanggal lahir wajib di isi.'
                ]
            ],
            'phone_number' => [
                'rules' => $rule_number,
                'errors' => [
                    'required' => 'Nomor wajib di isi',
                    'integer' => 'Nomor harus berupa bilangan integer'
                ]
            ],
            'is_seller' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => 'Statu wajib di isi.'
                ]
            ],
            'profile' => [
                'rules' => $rule_profile,
                'errors' => [
                    'max_size' => 'Maksimum ukuran file 1 MB',
                    'is_image' => 'Format file harus gambar',
                    'mime_in' => 'Format file harus gambar'
                ]
            ]
        ])) {
            return redirect()->to('/account/' . $id)->withInput();
        }

        //ambil gambar
        $fileProfile = $this->request->getFile('profile');
        //cek gambar apakah sama
        if ($fileProfile->getError() == 4) {
            $namaProfile = $this->request->getVar('profileLama');
        } else {
            //generate nama acak
            $namaProfile = $fileProfile->getRandomName();
            //pindah gambar ke folder img
            $fileProfile->move('img/profile', $namaProfile);
            //cari nama gambar
            $user = $this->userModel->find($id);
            //jika file gambar default
            if ($user['profile'] != 'default.png') {
                //hapus gambar lama
                unlink('img/profile/' . $this->request->getVar('profileLama'));
            }
        }

        // $slug = url_title($this->request->getVar('nama_tempat'), '-', 'true');
        $this->userModel->save([
            'id' => $id,
            'fullname' => $this->request->getVar('fullname'),
            'address' => $this->request->getVar('address'),
            'date_of_birth' => $this->request->getVar('date_of_birth'),
            'phone_number' => $this->request->getVar('phone_number'),
            'is_seller' => $this->request->getVar('is_seller'),
            'profile' => $namaProfile
        ]);



        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/account');
    }


    public function riwayat()
    {
        $login_user_id = user()->id;

        // $riwayat = $this->riwayatModel->findAll();
        $riwayat = $this->riwayatModel->where(['user_id' => $login_user_id])->findAll();
        $data = [
            'title' => 'Riwayat Order',
            'riwayat' => $riwayat
        ];

        return view('user/riwayat', $data);
    }

    public function detail($bid_transaction_log_id)
    {
        // Ambil bid transaksi id, dan simpan bid_transaction_log_id
        $detailRiwayat = $this->riwayatModel->where(['bid_transaction_log_id' => $bid_transaction_log_id])->first();
        $transaction_id = $detailRiwayat['transaction_id'];

        // Gunakan bid_transaction_log_id untuk ambil data di tabel tansaksi, dan simpan bid_order_id, shipping_address_id
        $transaksi = $this->transaksiModel->where(['transaction_id' => $transaction_id])->first();
        $bid_id = $transaksi['bid_order_id'];
        $shipping_id = $transaksi['shipping_address_id'];

        //Gunakan shipping_address_id untuk ambil alamat
        $shipping = $this->shippingModel->where(['shipping_address_id' => $shipping_id])->first();

        //Gunakan bid_order_id untuk ambil data di tabel bid
        $bid = $this->bidModel->where(['bid_order_id' => $bid_id])->first();

        $data = [
            'title' => 'Detail Riwayat Order',
            'detailRiwayat' => $detailRiwayat,
            'transaksi' => $transaksi,
            'bid' => $bid,
            'shipping' => $shipping,

        ];


        return view('user/detail_riwayat', $data);

        // echo $bid;
        // echo $transaction_id;
        // echo $bid_transaction_log_id;
    }
}
