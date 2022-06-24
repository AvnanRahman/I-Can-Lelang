<?= $this->extend('layout/layout'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="py-5 text-start">
        <a class="btn btn-primary" href="/" role="button">Kembali</a>
    </div>
    <div class="card" style="background-color: #50CEF5;">
        <div class="card-body row">
            <div class="col order-md-1">
                <form onsubmit="return confirm('Jual Produk?');" action="insert-product" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="file">Upload File</label>
                            <input class="form-control" type="file" name="images[]" id="formFileMultiple" multiple>
                        </div>
                        <div class="col">
                            <div class="col mb-3">
                                <label for="name">Nama Produk</label>
                                <input type="text" class="form-control" name="name" placeholder="">
                            </div>
                            <div class="col mb-3">
                                <label for="name">Deskripsi Produk</label>
                                <input type="text" class="form-control" name="desc" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 mb-3">
                            <label for="startDate">Mulai Lelang</label>
                            <input id="startDate" class="form-control" name="start" type="datetime-local" />
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="endDate">Selesai Lelang</label>
                            <input id="endDate" class="form-control" name="end" type="datetime-local" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label>Open Bid</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="text" class="form-control" name="openbid">
                                <span class="input-group-text">.00</span>
                            </div>
                        </div>
                        <div class="col mb-3">
                            <label>Harga BIN</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="text" class="form-control" name="binprice">
                                <span class="input-group-text">.00</span>
                            </div>
                        </div>
                        <div class="col mb-3">
                            <label>Kelipatan Tawaran</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="text" class="form-control" name="bid">
                                <span class="input-group-text">.00</span>
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <button class="px-5 btn btn-primary btn-lg btn-block" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>