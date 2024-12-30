<?= $this->extend('layout/main-section'); ?>

<?= $this->section('main'); ?>




<?php if ($errorMessages = session()->getFlashdata('error')): ?>
<?php 
        
        $errorMessage = is_array($errorMessages) ? implode('<br>', $errorMessages) : $errorMessages;
    ?>
<script>
Swal.fire({
    icon: 'error',
    title: 'Oops...',
    html: '<?= addslashes($errorMessage) ?>',
});
</script>
<?php endif; ?>

<?php if ($successMessage = session()->getFlashdata('success')): ?>
<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: '<?= addslashes(is_array($successMessage) ? implode('<br>', $successMessage) : $successMessage) ?>',
});
</script>
<?php endif; ?>





<div class="container mt-4">
    <?php if (session()->getFlashdata('error')): ?>

    <?php if ($errors = session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?php if (is_array($errors)): ?>
        <?php foreach ($errors as $error): ?>
        <p><?= esc($error) ?></p>
        <?php endforeach; ?>
        <?php else: ?>
        <p><?= esc($errors) ?></p>
        <?php endif; ?>
    </div>
    <?php endif; ?>

    <?php endif; ?>
    <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
    <?php endif; ?>

    <div class="setclass">
        <div class="hsetclass" style="padding-bottom: 1em;">
            <span>Pengaturan Akun</span>

        </div>
        <br>
        <form action="<?= base_url('/pages/updateProfile'); ?>" method="post">
            <?= csrf_field(); ?>
            <div class="mb-3">
                <input type="text" class="form-control" id="username" name="username"
                    value="<?= esc($user['username']); ?>" disabled>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="no_hp" name="no_hp"
                    value="<?= old('no_hp', esc($user['no_hp'] ?? '')); ?>" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" id="password" name="password"
                    placeholder="Isi jika ingin mengganti password">
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" id="password_confirm" name="password_confirm"
                    placeholder="Ulangi password baru">
            </div>
            <button type="submit" class="brutalist-card__button brutalist-card__button--mark">Simpan Perubahan</button>
        </form>

    </div>






</div>
<?= $this->endSection(); ?>