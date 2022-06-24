<?= $this->extend('layout/layoutAdmin'); ?>
<?= $this->section('content'); ?>

<style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }
</style>


<body>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="dashboard">
                <span data-feather="list"></span>
                Daftar Permintaan Lelang
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="pertanyaan">
                <span data-feather="message-square"></span>
                Daftar Pertanyaan
              </a>
            </li>
          </ul>

          <!-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Saved reports</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
              <span data-feather="plus-circle"></span>
            </a>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Current month
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Last quarter
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Social engagement
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Year-end sale
              </a>
            </li>
          </ul> -->
        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-3">
        <!-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
              <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
              <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
              <span data-feather="calendar"></span>
              This week
            </button>
          </div>
        </div> -->

        <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->

        <h2>Daftar Permintaan Lelang</h2>

        <div class="table-responsive">
          <table class="table table-striped table-sm text-center">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Item</th>
                <th scope="col">Seller</th>
                <th scope="col">Detail Produk</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($list as $l) :
              ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $l['product_name'] ?></td>
                  <td><?= $l['user_id'] ?></td>
                  <td><a href="detail/<?= $l['bid_order_id']; ?>" class="btn btn-success">Lihat Detail</a></td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>

      </main>
    </div>
  </div>


  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
  <script src="js/admin.js"></script>

  <?= $this->endSection(); ?>