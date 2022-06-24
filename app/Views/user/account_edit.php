<?= $this->extend('layout/layout'); ?>
<?= $this->section('content'); ?>

<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <!-- Image Profil -->
        <div class="col-md-3 border-right">
            <!-- <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="/img/profile.png">
                <span class="font-weight-bold"> <?= user()->username; ?></span>
                <span class="text-black-50"><?= user()->email; ?></span>
                <span> </span>
            </div> -->
        </div>

        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Edit Profile Settings</h4>
                </div>
                <div class="row mt-3">
                    <form action="/user/update/<?= user()->id; ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="profileLama" value="<?= user()->profile; ?>">
                        <div class="col-md-12 mt-3">
                            <label for="fullname">Fullname</label>
                            <div>
                                <input type="text" class="form-control <?= ($validation->hasError('fullname')) ? 'is-invalid' : ''; ?>" id="fullname" name="fullname" autofocus value="<?= (old('fullname')) ? old('fullname') : user()->fullname ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('fullname'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="address">Address</label>
                            <div>
                                <input type="text" class="form-control <?= ($validation->hasError('address')) ? 'is-invalid' : ''; ?>" id="address" name="address" autofocus value="<?= (old('address')) ? old('address') : user()->address ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('address'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="date_of_birth">Date of Birth</label>
                            <div>
                                <input type="date" class="form-control <?= ($validation->hasError('date_of_birth')) ? 'is-invalid' : ''; ?>" id="date_of_birth" name="date_of_birth" autofocus value="<?= (old('date_of_birth')) ? old('date_of_birth') : user()->date_of_birth ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('date_of_birth'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="phone_number">Phone Number</label>
                            <div>
                                <input type="text" class="form-control <?= ($validation->hasError('phone_number')) ? 'is-invalid' : ''; ?>" id="phone_number" name="phone_number" autofocus value="<?= (old('phone_number')) ? old('phone_number') : user()->phone_number ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('phone_number'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mt-3">
                            <label class="form-label" for="is_seller">Status User</label>
                            <select name="is_seller" class="form-select <?= ($validation->hasError('is_seller')) ? 'is-invalid' : ''; ?>" id="is_seller" name="is_seller" autofocus value="<?= (old('is_seller')) ? old('is_seller') : user()->is_seller ?>" name="is_seller" aria-label="Default select example">
                                <!-- <option selected>Status user</option> -->
                                <option value="0" selected="selected">User biasa</option>
                                <option value="1">Seller</option>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('is_seller'); ?>
                                </div>
                            </select>

                        </div>

                        <div class="col-md-12 mt-4">
                            <div class="mb-3">
                                <input type="file" class="form-control custom-file-input <?= ($validation->hasError('profile')) ? 'is-invalid' : ''; ?>" id="profile" name="profile" onchange="previewImg()">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('profile'); ?>
                                </div>
                                <label for="profile" class="form-label custom-file-label"><?= user()->profile; ?></label>
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <a href="/account/" class="btn btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-primary">Ubah Data</button>
                            <!-- <a href="/user/edit" class="btn btn-primary">Edit Profile</a> -->
                        </div>
                    </form>
                </div>


            </div>
        </div>


        <!-- Balance -->
        <!-- <div class="col-md-3 border-right">
            <div class="pt-3 px-3 mb-2 mt-5">
            </div>
            <div class="card-bottom pt-3 px-3 mb-2 mt-5">
                <div class="d-flex flex-row justify-content-between text-align-center">
                    <div class="d-flex flex-column"><span>My Balance</span>
                        <p>Rp. <span class="text-white"><?= user()->balance; ?></span></p>
                    </div>
                </div>
            </div>
        </div> -->



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