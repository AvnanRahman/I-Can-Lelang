<?= $this->extend('layout/layout'); ?>
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
$idU = user()->id;
$idProduk = $id;

$produk = mysqli_query($db_con, "SELECT * FROM bid_order WHERE bid_order_id=$idProduk");
$r = mysqli_fetch_array($produk);

$nama = $r['product_name'];
$deskripsi = $r['product_description'];
$kelipatan = $r['increment_in_price_per_bid'];
$mulai = $r['bid_start_time'];
$selesai = $r['bid_end_time'];
$hargaDasar = $r['base_price'];
$hargaBIN = $r['buy_it_now_price'];
$sementara = $r['current_bid'];
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

$lastbid = mysqli_query($db_con, "SELECT last_bid FROM bid_log WHERE user_id=$idU AND bid_order_id=$idProduk");
$row = mysqli_fetch_array($lastbid);
if ($row == null) {
    $bidterakhir = 0;
} else {
    $bidterakhir = $row['last_bid'];
}
?>
<script>
    var countDownDate = new Date("<?php echo $selesai ?>").getTime();
    var selesai = false;
    var x = setInterval(function() {
        $("#myID").hide();
        var now = new Date().getTime();
        var distance = countDownDate - now;
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("timer").innerHTML = days + "d " + hours + "h " +
            minutes + "m " + seconds + "s ";

        $(document).ready(function() {
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("timer").innerHTML = "EXPIRED";
                var sementara = <?= $sementara ?>;
                var bidterakhir = <?= $bidterakhir ?>;
                $("#expired").hide();
                $("#expired2").hide();
                if (sementara == bidterakhir) {
                    $("#myID").show();
                }
            } else {
                $("#myID").hide();

            }
        });
    }, 1000);
</script>

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

                    <form onsubmit="return confirm('Ajukan tawaran?');" action="/pages/tawar/<?= $id ?>" method="post">

                        <div class="row fw-bold">

                            <div class="col-md-6">
                                Tawaran Sementara
                                <div class="input-group input-group-sm mb-2">
                                    <span class="input-group-text" id="inputGroup-sizing-default">IDR</span>
                                    <input value="<?php echo $sementara ?>" readonly type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                </div>
                                Kelipatan Tawaran
                                <div class="input-group input-group-sm mb-2">
                                    <span class="input-group-text" id="inputGroup-sizing-default">IDR</span>
                                    <input value="<?php echo $kelipatan ?>" readonly type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                </div>

                            </div>
                            <div class="col-md-6">
                                Tawaran Terakhir Anda
                                <div class="input-group input-group-sm mb-2">
                                    <span class="input-group-text" id="inputGroup-sizing-default">IDR</span>
                                    <input value="<?php echo $bidterakhir ?>" readonly type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                </div>
                                Tawar
                                <div class="input-group input-group-sm mb-2">
                                    <span class="input-group-text" id="inputGroup-sizing-default">IDR</span>
                                    <input required value="<?php echo $sementara ?>" id="tawaran" name="tawaran" step="<?php echo $kelipatan ?>" type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                </div>
                            </div>

                        </div>
                        <div class="text-center mt-3 mb-4">
                            <button id="expired" name="submit" type="submit" class="btn btn-primary yakinkah" style="background-color: #12106C; border: #12106C;">Tawar!</button>
                        </div>

                    </form>


                    <div class="row fw-bold">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            Harga BIN
                            <div class="input-group input-group-sm mb-2">
                                <span class="input-group-text" id="inputGroup-sizing-sm">IDR</span>
                                <input type="number" value="<?php echo $hargaBIN ?>" readonly class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>
                            <div class="text-center mt-3">
                                <form method="get" action="/checkout/<?= $idProduk; ?>">
                                    <input type="hidden" name="buttonDetail" value="binBtn">
                                    <input type="submit" class="btn btn-primary" id="expired2" style="background-color: #12106C; border: #12106C;" value="Beli Sekarang!">
                                </form>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-4"></div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <div class="rounded bg-white bg-opacity-50 fw-bold shadow p-2 text-center mb-3 mt-3">
                                <p class="mb-0 text-uppercase">Sisa Waktu Lelang</p>
                                <div id="timer" class="py-4"></div>
                                <form method="get" action="/checkout/<?= $idProduk; ?>">
                                    <input type="hidden" name="buttonDetail" value="checkoutBtn">
                                    <input type="submit" class="btn btn-primary" id="myID" style="background-color: #12106C; border: #12106C;" value="Checkout">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?= $this->endSection(); ?>