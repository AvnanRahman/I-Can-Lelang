<?= $this->extend('layout/layout'); ?>
<?= $this->section('content'); ?>

<!-- Tabel Riwayat -->
<div class="container">
    <div class="row">
        <div class="col">

            <h1 class="mt-2">Riwayat Transaksi</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Username</th>
                        <th scope="col">Transaction ID</th>
                        <th scope="col">Total</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($riwayat as $r) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= user()->username; ?></td>
                            <td><?= $r['transaction_id']; ?></td>
                            <td><?= $r['total']; ?></td>
                            <td>
                                <a href="/riwayat/<?= $r['bid_transaction_log_id']; ?>" class="btn btn-success">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>