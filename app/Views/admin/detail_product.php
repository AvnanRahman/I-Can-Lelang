<?= $this->extend('layout/layoutAdmin'); ?>
<?= $this->section('content'); ?>

<script type="text/javascript">
    function change_image(image) {

        var container = document.getElementById("main-image");

        container.src = image.src;
    }
    document.addEventListener("DOMContentLoaded", function(event) {});
</script>

<?php
if (session()->getFlashdata('pesan')) {
    echo "<script>Swal.fire(
        'Gagal!',
        'Tawaran Anda Tidak Boleh Di Bawah Harga Tawaran Sementara!',
        'warning'
      )</script>";
} elseif (session()->getFlashdata('sukses')) {
    echo "<script>Swal.fire(
        'Sukses!',
        'Tawaran Anda Berhasil Diajukan!',
        'success'
      )</script>";
}
include 'koneksi.php';
$idProduk = $id;

// $idProduk = $_SESSION['idProduk'];

// if (isset($_GET['bid_order_id'])) {
//     $idProduk = $_GET['bid_order_id'];
// } else {
//     die("Error. No ID Selected!");
// }

$produk = mysqli_query($db_con, "SELECT * FROM bid_order WHERE bid_order_id=$idProduk");
$r = mysqli_fetch_array($produk);

$nama = $r['product_name'];
$deskripsi = $r['product_description'];
$kelipatan = $r['increment_in_price_per_bid'];
$mulai = $r['bid_start_time'];
$selesai = $r['bid_end_time'];
$hargaDasar = $r['base_price'];
$hargaBIN = $r['buy_it_now_price'];
$idFoto = $r['picture_product_id'];
$idSeller = $r['user_id'];

$picture = mysqli_query($db_con, "SELECT * FROM picture_product WHERE picture_product_id=$idFoto");
$w = mysqli_fetch_array($picture);
$picture1 = $w['picture1'];
$picture2 = $w['picture2'];
$picture3 = $w['picture3'];
$picture4 = $w['picture4'];
$user = mysqli_query($db_con, "SELECT * FROM users WHERE id=$idSeller");
$o = mysqli_fetch_array($user);

$namaU = $o['fullname'];
$alamat = $o['address'];
$telp =  $o['phone_number'];
$fotoU = $o['profile'];
?>

<!-- Product section-->

<section class="py-5">

    <div class="container px-3 px-lg-5 my-4">
        <div class="row p-4 gx-4 gx-lg-3 align-items-center rounded-3" style="background-color: #50CEF5;">
            <div class="col-md-4">
                <div class="row ">
                    <div class="card bg-white bg-opacity-50 ">
                        <img id="main-image" class="card-img-top mt-2" src="/img/<?php echo $picture1 ?>" alt="" />
                        <div class="card-body">
                            <div class="container">
                                <div class="row m-0">
                                    <div class="col p-0">
                                        <img onclick="change_image(this)" class="rounded" style="width: 70px;" src="/img/<?php echo $picture1 ?>" alt="" />
                                    </div>
                                    <div class="col p-0">
                                        <img onclick="change_image(this)" class="rounded" style="width: 70px;" src="/img/<?php echo $picture2 ?>" alt="" />
                                    </div>
                                    <div class="col p-0">
                                        <img onclick="change_image(this)" class="rounded" style="width: 70px;" src="/img/<?php echo $picture3 ?>" alt="" />
                                    </div>
                                    <div class="col p-0">
                                        <img onclick="change_image(this)" class="rounded" style="width: 70px;" src="/img/<?php echo $picture4 ?>" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <p class="m-0 mb-1 fw-bold" style="color: #12106C;">Identitas Penjual</p>
                    <div class="row">
                        <div class="col-md-4">
                            <img class="rounded img-fluid img-thumbnail" src="/img/profile/<?php echo $fotoU ?>" />
                        </div>
                        <div class="col-md-8 fw-bold">
                            <p class="m-0"><?php echo $namaU ?></p>
                            <p class="m-0"><?php echo $alamat ?></p>
                            <p class="m-0"><?php echo $telp ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8" style="color: #12106C;">
                <div class="container">
                    <div class="row">
                        <h1 class="display-5 fw-bolder"><?php echo $nama ?></h1>
                        <hr style="height: 2px; color: #12106C; background-color: #12106C;">
                        </hr>
                        <p><?php echo $deskripsi ?></p>
                    </div>
                    <div class="row fw-bold">

                        <div class="col-md-6">
                            Harga Dasar
                            <div class="input-group input-group-sm mb-2">
                                <span class="input-group-text" id="inputGroup-sizing-default">IDR</span>
                                <input value="<?php echo $hargaDasar ?>" readonly type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>
                            Kelipatan Tawaran
                            <div class="input-group input-group-sm mb-2">
                                <span class="input-group-text" id="inputGroup-sizing-default">IDR</span>
                                <input value="<?php echo $kelipatan ?>" readonly type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>

                        </div>
                        <div class="col-md-6">
                            Mulai Lelang
                            <div class="input-group input-group-sm mb-2">
                                <input value="<?php echo $mulai ?>" readonly class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>
                            Selesai Lelang
                            <div class="input-group input-group-sm mb-2">
                                <input value="<?php echo $selesai ?>" readonly id="tawaran" name="tawaran" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>
                        </div>
                    </div>


                    <!-- Query Insert Tawar -->


                    <div class="row fw-bold">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            Harga BIN
                            <div class="input-group input-group-sm mb-2">
                                <span class="input-group-text" id="inputGroup-sizing-sm">IDR</span>
                                <input type="number" value="<?php echo $hargaBIN ?>" readonly class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-3">
                            <form onsubmit="return confirm('Acc Lelang?');" action="/admin/accept/<?= $idProduk ?>" method="post">
                                <div class="text-center mt-3 mb-4">
                                    <button name="submit" type="submit" class="btn btn-primary" style="background-color: #06a125; border: #06a125;">Setujui</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-3">
                            <form onsubmit="return confirm('Tolak Lelang? Produk akan dihapus');" action="/admin/delete/<?= $idProduk ?>" method="post">
                                <div class="text-center mt-3 mb-4">
                                    <button name="submit" type="submit" class="btn btn-danger">Tolak</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<?= $this->endSection(); ?>