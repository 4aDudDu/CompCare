<?php if (session()->has('message')) : ?>
<div class="alert alert-success">
    <?= session('message') ?>
</div>
<?php endif ?>

<?php if (session()->has('error')) : ?>
<div class="alert alert-danger">
    <?php 
        $errors = session('error');
        // Jika session error berupa array, tampilkan semua pesan error
        if (is_array($errors)) {
            echo implode('<br>', $errors); // Gabungkan array error dengan <br> untuk baris baru
        } else {
            echo $errors; // Jika hanya satu error message
        }
        ?>
</div>
<?php endif ?>

<?php if (session()->has('errors')) : ?>
<ul class="alert alert-danger">
    <?php foreach (session('errors') as $error) : ?>
    <li><?= $error ?></li>
    <?php endforeach ?>
</ul>
<?php endif ?>