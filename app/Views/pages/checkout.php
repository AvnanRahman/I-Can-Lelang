<?= $this->extend('layout/layout'); ?>
<?= $this->section('content'); ?>

<div class="py-5 text-center">
    <h2>Checkout Form</h2>
</div>

<div class="container">
    <?php
    $idProduk = $bid['bid_order_id'];

    $hargaProduk = 0;
    $total = 0;
    $binOrBid = $_GET['buttonDetail'];
    if ($binOrBid == "binBtn") {
        $hargaProduk = $bid['buy_it_now_price'];
        $total = $hargaProduk + 20000;
    } else if ($binOrBid == "checkoutBtn") {
        $hargaProduk = $bid['current_bid'];
        $total = $hargaProduk + 20000;
    }
    ?>
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Detail Order</span>
                <span class="badge badge-secondary badge-pill">3</span>
            </h4>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0 text-muted">Nama Item</h6>
                        <small class="text-muted"><?= $bid['product_name']; ?></small>
                    </div>
                    <span class="text-muted">Rp<?= $hargaProduk; ?>,00</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0 text-muted">Ongkos Kirim</h6>
                    </div>
                    <span class="text-muted">Rp20000,00</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span class="fw-bold">Total</span>
                    <strong>
                        Rp<?= $total; ?>,00
                    </strong>
                </li>
            </ul>

            <div class="list-group-item d-flex justify-content-between">
                <span class="fw-bold">My Balance</span>
                <strong>Rp<?= user()->balance; ?>,00</strong>
            </div>

        </div>
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Alamat Pengiriman</h4>
            <form onsubmit="return confirm('Yakin Checkout? Pastikan alamat sudah benar!');" action="/TransactionC/insertTransaction/<?= $idProduk; ?>/<?= $total; ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <div>
                        <label for="address">Alamat Lengkap</label>
                        <input type="text" class="form-control" name="address">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-7 mb-3">
                        <label for="city">Kota</label>
                        <input type="text" class="form-control" name="city">
                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="zip">Kode Pos</label>
                        <input type="text" class="form-control" name="postcode">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-7 mb-3">
                        <label for="name">Nama Penerima</label>
                        <input type="text" class="form-control" name="receivername">
                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="contact">Nomor Telepon</label>
                        <input type="text" class="form-control" name="telpnumber">
                    </div>
                </div>
                <hr class="mb-4">
                <button class="px-5 btn btn-primary btn-lg btn-block" type="submit">Pay</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>