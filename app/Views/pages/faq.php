<?= $this->extend('layout/layout'); ?>
<?= $this->section('content'); ?>


<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw" style="color: #12106C; font-weight: 400;">Frequently Asked Questions</h1>
        <p class="lead text-muted">Halaman ini berisi pertanyaan yang sering ditanyakan
        <p>
        </p>
      </div>
    </div>
  </section>

  <div class="py-5 text-left container">
    <div class="accordion" id="accordionExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
          <button class="accordion-button collapsed" style="color: #12106C; font-weight: 500;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
            1. Apa itu I-Can Lelang?
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            I-Can Lelang merupakan sebuah website interaktif yang dapat anda gunakan untuk melakukan pelelangan ikan
            hias secara aman dan praktis.
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
          <button class="accordion-button collapsed" style="color: #12106C; font-weight: 500;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            2. Cara Kerja Pelelangan
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
          <div class="accordion-body" style="text-align:justify;">
            Setiap produk yang dilelang memiliki waktu mulai dan waktu berakhirnya proses pelelangan. Anda hanya dapat
            mengikuti pelelangan yang sedang berlangsung/aktif. Anda dapat melihat harga tawaran tertinggi pada produk
            tertentu. Anda hanya bisa mengajukan tawaran dengan kelipatan yang telah ditentukan penjual, dan harus
            melebihi tawaran tertinggi sementara. Apabila tawaran anda merupakan tawaran tertinggi sampai batas waktu
            habis, maka anda dapat melakukan checkout produk.
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree">
          <button class="accordion-button collapsed" style="color: #12106C; font-weight: 500;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            3. Cara Checkout Produk
          </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
          <div class="accordion-body" style="text-align:justify;">
            Apabila anda telah memenangkan sebuah produk yang dilelang, anda akan diteruskan ke halaman checkout.
            Pastikan anda mengisi alamat pengiriman dengan benar. Setelah alamat pengiriman telah terisi, anda dapat
            melakukan pembayaran. Pastikan balance anda cukup untuk melakukan pembayaran.
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingFour">
          <button class="accordion-button collapsed" style="color: #12106C; font-weight: 500;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            4. Cara Melakukan Top Up Balance
          </button>
        </h2>
        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
          <div class="accordion-body" style="text-align:justify;">
            Balance merupakan dompet anda di website ini. Anda dapat melakukan top up balance dengan mobile banking
            anda.
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingFive">
          <button class="accordion-button collapsed" style="color: #12106C; font-weight: 500;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
            5. Apa Itu BIN?
          </button>
        </h2>
        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
          <div class="accordion-body" style="text-align:justify;">
            BIN atau Buy It Now adalah harga untuk membeli barang secara langsung tanpa melakukan tawaran. Harga ini
            ditentukan oleh penjual.
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingSix">
          <button class="accordion-button collapsed" style="color: #12106C; font-weight: 500;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
            6. Bagaimana Cara Melelang Barang Saya?
          </button>
        </h2>
        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
          <div class="accordion-body" style="text-align:justify;">
            Sebelum melelang barang anda, anda harus mendaftar sebagai penjual. Untuk mendaftar sebagai penjual
            diperlukan verifikasi KYC (Know Your Customer) menggunakan KTP.
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingSeven">
          <button class="accordion-button collapsed" style="color: #12106C; font-weight: 500;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
            7. Mengapa Diperlukan KTP Untuk Mendaftar Sebagai Penjual?
          </button>
        </h2>
        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
          <div class="accordion-body" style="text-align:justify;">
            Verifikasi KYC (Know Your Customer) menggunakan KTP diperlukan untuk mencegah hal tidak diinginkan,
            seperti terjadinya penipuan. Dengan terverifikasinya penjual, maka pembeli tidak akan ragu untuk membeli
            atau mengikuti pelelangan.
          </div>
        </div>
      </div>
    </div>

    <section class="py-5 container text-center">
      <form action="/pages/insertFAQ" method="post">
        <div class="mb-3">
          Pertanyaan anda belum terjawab? Tanyakan saja!
          <textarea class="form-control" name="quest" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" style="background-color: #12106C; border: #12106C;">Submit</button>
      </form>
    </section>

</main>

<script src="./Album example · Bootstrap v5.1_files/bootstrap.bundle.min.js.download" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>

<?= $this->endSection(); ?>