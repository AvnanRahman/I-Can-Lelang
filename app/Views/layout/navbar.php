<header class="sticky-top flex-md-nowrap">
    <div class="px-3 py-2" style="background-color: #50CEF5">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none">
                    <img class="bi me-2" src="/img/ikon.png" alt="Bootstrap" width="50" height="42">
                    <span class="fs-4" style="color: #12106C; font-weight: 600;">I-Can Lelang</span>
                </a>


                <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small" style="color: #12106C; font-weight: 500;">
                    <li>
                        <a href="/" class="nav-link" style="color: #12106C;">
                            Beranda
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #12106C;">
                            Akun
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/account">Akun Saya</a></li>
                            <li><a class="dropdown-item" href="/add-product">Ajukan Pelelangan</a></li>
                            <li><a class="dropdown-item" href="/riwayat">Riwayat Pesanan</a></li>
                            <!-- Menu admin -->
                            <?php if (in_groups('admin')) : ?>
                                <li><a class="dropdown-item" href="/dashboard">Dashboard Admin</a></li>
                            <?php endif; ?>
                            <!-- End Menu admin -->
                        </ul>
                    </li>
                    <li>
                        <a href="/search/" class="nav-link" style="color: #12106C;">
                            Search
                        </a>
                    </li>
                    <li>
                        <a href="/logout" class="nav-link" style="color: #12106C;">
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>