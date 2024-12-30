<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            <div class="card">
                <div class="card-body">

                    <?= view('Myth\Auth\Views\_message_block') ?>

                    <form action="<?= url_to('login') ?>" method="post" class="formlogin">
                        <?= csrf_field() ?>
                        <h1 style="text-align: center; font-weight:700; font-family:poster;">Masuk | CompCare</h1>
                        <!-- Input Login -->
                        <div class="inputlogin">
                            <input required autocomplete="off" type="text"
                                class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
                                name="login" id="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                            <label for="login"><?= lang('Auth.emailOrUsername') ?></label>
                            <div class="invalid-feedback">
                                <?= session('errors.login') ?>
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
                        <!-- Submit Button -->
                        <div class="btnlogin-conlogin">
                            <button type="submit"
                                class="btnlogin btn btn-primary btn-block"><?= lang('Auth.loginAction') ?></button>
                            <div class="acc-text">
                                New here ?
                                <span style="color : #0000ff; cursor : pointer;"
                                    onclick="window.location.href='<?= url_to('register') ?>'">Create Account</span>
                            </div>
                        </div>
                    </form>


                    <hr>

                </div>
            </div>

        </div>
    </div>
</div>


<?= $this->endSection() ?>