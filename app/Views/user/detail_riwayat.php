<?= $this->extend('layout/layout'); ?>
<?= $this->section('content'); ?>
<!-- Print Invoice -->

<script language=javascript>
    function printPage() {
        if (window.print) {
            agree = confirm('Apakah anda yakin akan mencetak halaman ini? Kli Oke jika iya!');
            if (agree) window.print();
        }
    }
</script>
<!-- Detail Riwayat -->
<div class="container-fluid">

    <div class="container">
        <!-- Title -->
        <div class="d-flex justify-content-between align-items-center py-3">
            <h2 class="h5 mb-0"><a href="#" class="text-muted"></a> Order #<?= $detailRiwayat['bid_transaction_log_id']; ?></h2>
        </div>

        <?php
        $subtotal = $transaksi['total'] - 20000;
        ?>

        <!-- Main content -->
        <div class="row">
            <div class="col-lg-8">
                <!-- Details -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="mb-3 d-flex justify-content-between">
                            <div>
                                <span class="me-3"><?= $transaksi['transaction_date']; ?></span>
                                <span class="me-3">#<?= $detailRiwayat['bid_transaction_log_id']; ?></span>
                                <span class="me-3">I-Can Balance</span>
                                <span class="badge rounded-pill bg-info">SHIPPING</span>
                            </div>
                            <div class="d-flex">


                                <!-- <button class="btn btn-link p-0 me-3 d-none d-lg-block btn-icon-text" onclick=printPage()><i class="bi bi-download"></i> <span class="text">Invoice</span></button> -->




                                <div class="dropdown">
                                    <button class="btn btn-link p-0 text-muted" type="button" data-bs-toggle="dropdown">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-pencil"></i> Edit</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-printer"></i> Print</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <table class="table table-borderless">
                            <tbody>
                                <!-- Produk -->
                                <tr>
                                    <td>
                                        <div class="d-flex mb-2">
                                            <!-- <div class="flex-shrink-0">
                                                <img src="https://via.placeholder.com/280x280/87CEFA/000000" alt="" width="35" class="img-fluid">
                                            </div> -->
                                            <div class="flex-lg-grow-1">
                                                <h6 class="small mb-0"><a href="#" class="text-reset"><?= $bid['product_name']; ?></a></h6>
                                                <span class="small">Description: <?= $bid['product_description']; ?></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td class="text-end">Rp<?= $subtotal ?>,00</td>
                                </tr>
                                <!-- <tr>
                                    <td>
                                        <div class="d-flex mb-2">
                                            <div class="flex-shrink-0">
                                                <img src="https://via.placeholder.com/280x280/FF69B4/000000" alt="" width="35" class="img-fluid">
                                            </div>
                                            <div class="flex-lg-grow-1 ms-3">
                                                <h6 class="small mb-0"><a href="#" class="text-reset">Smartwatch IP68 Waterproof GPS and Bluetooth Support</a></h6>
                                                <span class="small">Color: White</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>1</td>
                                    <td class="text-end">$79.99</td>
                                </tr> -->
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2">Subtotal</td>
                                    <td class="text-end">Rp<?= $subtotal ?>,00</td>
                                </tr>
                                <tr>
                                    <td colspan="2">Shipping</td>
                                    <td class="text-end">Rp20.000,00</td>
                                </tr>
                                <!-- <tr>
                                    <td colspan="2">Discount (Code: NEWYEAR)</td>
                                    <td class="text-danger text-end">-$10.00</td>
                                </tr> -->
                                <tr class="fw-bold">
                                    <td colspan="2">TOTAL</td>
                                    <td class="text-end">Rp.<?= $transaksi['total']; ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <!-- Payment -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <h3 class="h6">Payment Method</h3>
                                <p>I-Can Balance <br>
                                    Total: Rp.<?= $transaksi['total']; ?> <span class="badge bg-success rounded-pill">PAID</span></p>
                            </div>
                            <div class="col-lg-6">
                                <h3 class="h6">Billing address</h3>
                                <address>
                                    <strong><?= $shipping['receiver']; ?></strong><br>
                                    <?= $shipping['full_address']; ?><br>
                                    <abbr title="Phone"></abbr> <?= $shipping['phone']; ?>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <!-- Customer Notes -->
                <!-- <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="h6">Customer Notes</h3>
                        <p>Sed enim, faucibus litora velit vestibulum habitasse. Cras lobortis cum sem aliquet mauris rutrum. Sollicitudin. Morbi, sem tellus vestibulum porttitor.</p>
                    </div>
                </div> -->
                <div class="card mb-4">
                    <!-- Shipping information -->
                    <div class="card-body">
                        <h3 class="h6">Shipping Information</h3>
                        <!-- <strong>FedEx</strong>
                        <span><a href="#" class="text-decoration-underline" target="_blank"><?= $shipping['shipping_address_id']; ?></a> <i class="bi bi-box-arrow-up-right"></i> </span> -->
                        <hr>
                        <h3 class="h6">Address</h3>
                        <address>
                            <strong><?= $shipping['receiver']; ?></strong><br>
                            <?= $shipping['full_address']; ?><br>
                            <abbr title="Phone"></abbr> <?= $shipping['phone']; ?>
                        </address>
                    </div>
                </div>
                <!-- Tombol back -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <button class="btn btn-info" type="button" onclick=printPage()>Print Invoice</button>
                            <button class="btn btn-primary" type="button" onclick="document.location='/riwayat'">Kembali</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>