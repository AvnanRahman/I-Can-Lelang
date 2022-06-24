<?= $this->extend('layout/layout'); ?>
<?= $this->section('content'); ?>

<!-- Search Page -->
<div class="container">
  <div class="row">
    <div class="col">
      <h1 class="mt-2">Search Page </h1>
      <form action="" method="POST">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Masukkan nama atau deskripsi produk..." name="keyword">
          <button class="btn btn-outline-secondary" type="submit" name="submit">Search</button>
        </div>
      </form>
    </div>
  </div>

  <div class="row">
    <div class="col">


      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Produk</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Tanggal Berakhir</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1 + (2 * ($currentPage - 1)) ?>
          <?php foreach ($bid as $b) : ?>
            <tr>
              <th scope="row"><?= $i++; ?></th>

              <td><?= $b['product_name']; ?></td>
              <td><?= $b['product_description']; ?></td>
              <td><?= $b['bid_end_time']; ?></td>

              <td>
                <a href="/product/<?= $b['bid_order_id']; ?>" class="btn btn-success">Detail</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <?= $pager->links('bid_order', 'bid_pagination'); ?>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>