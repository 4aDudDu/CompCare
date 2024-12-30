<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            <div class="card">
                <div class="card-body">

                    <?= view('Myth\Auth\Views\_message_block') ?>

                    <!-- Form Register dengan desain template sebelumnya -->
                    <form action="<?= url_to('register') ?>" method="post" class="formlogin">
                        <?= csrf_field() ?>
                        <h1 style="text-align: center; font-weight:700; font-family:poster;">Daftar Akun | CompCare</h1>
                        <!-- Input Email -->
                        <div class="inputlogin">
                            <input required autocomplete="off" type="email"
                                class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>"
                                name="email" id="email" placeholder="<?= lang('Auth.email') ?>"
                                value="<?= old('email') ?>">
                            <label for="email"><?= lang('Auth.email') ?></label>
                            <div class="invalid-feedback">
                                <?= session('errors.email') ?>
                            </div>
                        </div>
                        <br>
                        <!-- Input Username -->
                        <div class="inputlogin">
                            <input required autocomplete="off" type="text"
                                class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>"
                                name="username" id="username" placeholder="<?= lang('Auth.username') ?>"
                                value="<?= old('username') ?>">
                            <label for="username"><?= lang('Auth.username') ?></label>
                            <div class="invalid-feedback">
                                <?= session('errors.username') ?>
                            </div>
                        </div>
                        <br>
                        <!-- Input Password -->
                        <div class="inputlogin">
                            <input required autocomplete="off" type="password"
                                class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>"
                                name="password" id="password" placeholder="<?= lang('Auth.password') ?>">
                            <label for="password"><?= lang('Auth.password') ?></label>
                            <div class="invalid-feedback">
                                <?= session('errors.password') ?>
                            </div>
                        </div>
                        <br>
                        <!-- Input Ulang Password -->
                        <div class="inputlogin">
                            <input required autocomplete="off" type="password"
                                class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>"
                                name="pass_confirm" id="pass_confirm" placeholder="<?= lang('Auth.repeatPassword') ?>">
                            <label for="pass_confirm"><?= lang('Auth.repeatPassword') ?></label>
                            <div class="invalid-feedback">
                                <?= session('errors.pass_confirm') ?>
                            </div>
                        </div>
                        <br>
                        <!-- Input No HP -->
                        <div class="inputlogin">
                            <input required autocomplete="off" type="text"
                                class="form-control <?php if (session('errors.no_hp')) : ?>is-invalid<?php endif ?>"
                                name="no_hp" id="no_hp" placeholder="<?= lang('Auth.phoneNumber') ?>"
                                value="<?= old('no_hp') ?>">
                            <label for="no_hp"><?= lang('Auth.phoneNumber') ?></label>
                            <div class="invalid-feedback">
                                <?= session('errors.no_hp') ?>
                            </div>
                        </div>

                        <br>

                        <!-- Tombol Submit -->
                        <div class="btnlogin-conlogin">
                            <button type="submit"
                                class="btnlogin btn btn-primary btn-block"><?= lang('Auth.register') ?></button>
                        </div>
                    </form>

                    <hr>

                    <p><?= lang('Auth.alreadyRegistered') ?> <a
                            href="<?= url_to('login') ?>"><?= lang('Auth.signIn') ?></a></p>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>