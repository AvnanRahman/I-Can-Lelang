<?= $this->extend('layout/layout'); ?>
<?= $this->section('content'); ?>
<!-- Balance -->

<div class="container-xxl py-5">
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>


    <div class="container">
        <?php
        function rupiah($angka)
        {
            $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
            return $hasil_rupiah;
        }
        include 'koneksi.php';
        $userid = user()->id;
        $data = mysqli_query($db_con, "SELECT DISTINCT b.bid_order_id,product_name,product_description,picture1 FROM bid_order b JOIN bid_log l LEFT JOIN picture_product p ON b.picture_product_id=p.picture_product_id WHERE b.is_active=1 AND b.bid_order_id = ANY (SELECT bid_order_id FROM bid_log WHERE user_id=$userid) GROUP BY b.bid_order_id");
        if ($d = mysqli_fetch_array($data)) {
        ?>
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-4">Lelang Yang Sedang Kamu Ikutin</h1>
            </div>
        <?php
        }
        ?>
        <div class="row g-4">
            <?php
            $data = mysqli_query($db_con, "SELECT DISTINCT b.bid_order_id,product_name,product_description,picture1,b.current_bid FROM bid_order b JOIN bid_log l LEFT JOIN picture_product p ON b.picture_product_id=p.picture_product_id WHERE b.is_active=1 AND b.bid_order_id = ANY (SELECT bid_order_id FROM bid_log WHERE user_id=$userid) GROUP BY b.bid_order_id");
            while ($d = mysqli_fetch_array($data)) {
            ?>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded overflow-hidden">
                        <img class='img-fluid' src='img/<?php echo $d['picture1'] ?>' alt=''>
                        <div class="position-relative p-4 pt-0">
                            <div class="service-icon">
                                <i class="fa fa-shopping-cart fa-3x" onclick="location.href='product/<?= $d['bid_order_id'] ?>'"></i>
                            </div>
                            <h4 class="mb-3" style="color: #12106C;"> <?php echo $d['product_name'] ?> </h4>
                            <div class="row">
                                <div class="col-md-6">

                                    <p> <?php echo $d['product_description'] ?> </p>
                                </div>
                                <div class="col-md-6 text-center fw-bold">
                                    Tawaran Sementara
                                    <div class="rounded-pill" style="background-color: #12106C; color:white">
                                        <p> <?php echo rupiah($d['current_bid']) ?> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-4">Ikut Lelang Ini Yuk!</h1>
        </div>
        <div class="row g-4">

            <?php

            include 'koneksi.php';
            $data = mysqli_query($db_con, "SELECT b.bid_order_id,product_name,product_description,picture1,b.current_bid FROM bid_order b LEFT JOIN picture_product p ON b.picture_product_id=p.picture_product_id WHERE is_active=1 GROUP BY p.picture_product_id");
            while ($d = mysqli_fetch_array($data)) {
            ?>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded overflow-hidden">
                        <img class='img-fluid' src='img/<?php echo $d['picture1'] ?>' alt=''>
                        <div class="position-relative p-4 pt-0">
                            <div class="service-icon">
                                <i class="fa fa-shopping-cart fa-3x" onclick="location.href='product/<?= $d['bid_order_id'] ?>'"></i>
                            </div>
                            <h4 class="mb-3" style="color: #12106C;"> <?php echo $d['product_name'] ?> </h4>
                            <div class="row">
                                <div class="col-md-6">

                                    <p> <?php echo $d['product_description'] ?> </p>
                                </div>
                                <div class="col-md-6 text-center fw-bold">
                                    Tawaran Sementara
                                    <div class="rounded-pill" style="background-color: #12106C; color:white">
                                        <p> <?php echo rupiah($d['current_bid']) ?> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>

        </div>
    </div>
</div>

<?php
if (session()->getFlashdata('sukses')) {
    echo "<script>Swal.fire(
        'Sukses!',
        'Pelelangan Anda Berhasil Diajukan!',
        'success'
      )</script>";
}

if (session()->getFlashdata('suksesCheckout')) {
    echo "<script>Swal.fire(
        'Sukses!',
        'Transaksi Produk Berhasil!',
        'success'
      )</script>";
}
?>

<?= $this->endSection(); ?>