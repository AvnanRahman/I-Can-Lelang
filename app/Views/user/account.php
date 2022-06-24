<?= $this->extend('layout/layout'); ?>
<?= $this->section('content'); ?>

<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <!-- Image Profil -->
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="/img/profile/<?= user()->profile; ?>">
                <span class="font-weight-bold"> <?= user()->username; ?> </span>
                <span class="text-black-50"><?= user()->email; ?></span>
                <span> </span>
            </div>
        </div>

        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-3">
                    <form>
                        <fieldset disabled>
                            <div class="col-md-12 mt-3">
                                <label for="disabledTextInput" class="form-label">Full Name</label>
                                <input type="text" id="disabledTextInput" class="form-control" placeholder="" value="<?= user()->fullname; ?>">
                            </div>
                            <div class="col-md-12 mt-3">
                                <label for="disabledTextInput" class="form-label">Address</label>
                                <input type="text" id="disabledTextInput" class="form-control" placeholder="" value="<?= user()->address; ?>">
                            </div>
                            <div class="col-md-12 mt-3">
                                <label for="disabledDate" class="form-date">Date of Birth</label>
                                <input type="date" id="disabledDate" class="form-control" placeholder="" value="<?= user()->date_of_birth; ?>">
                            </div>
                            <div class="col-md-12 mt-3">
                                <label for="disabledTextInput" class="form-label">Phone</label>
                                <input type="text" id="disabledTextInput" class="form-control" placeholder="" value="<?= user()->phone_number; ?>">
                            </div>
                            <div class="col-md-12 mt-3">
                                <label for="disabledTextInput" class="form-label">Status</label>
                                <input type="text" id="disabledTextInput" class="form-control" placeholder="" value="<?= user()->is_seller == 1 ? 'Seller' : 'Pengguna biasa'; ?>">
                            </div>
                        </fieldset>
                    </form>
                </div>

                <div class="mt-5 text-center">
                    <!-- <button class="btn btn-warning profile-button" type="button">Edit Profile</button> -->
                    <a href="/account/<?= user()->id; ?>" class="btn btn-primary">Edit Profile</a>
                </div>
            </div>
        </div>


        <!-- Balance -->
        <div class="col-md-3 border-right">
            <div class="pt-3 px-3 mb-2 mt-5">
            </div>
            <div class="card-bottom pt-3 px-3 mb-2 mt-5">
                <div class="d-flex flex-row justify-content-between text-align-center">
                    <div class="d-flex flex-column"><span>My Balance</span>
                        <p>Rp. <span class="text-white"><?= user()->balance; ?></span></p>
                    </div>
                </div>
            </div>
        </div>



        <!-- <div class="col-md-4">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                    <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
                    <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div>
                </div>
            </div> -->
    </div>
</div>
</div>
</div>

<?= $this->endSection(); ?>