<?= $this->extend('layout/main-section'); ?>

<?= $this->section('main'); ?>
<div class="container mt-4">

    <?php if (count($products) === 0): ?>
    <div class="alert alert-warning" role="alert">
        Tidak ada Barang yang ditambahkan
    </div>
    <?php else: ?>
    <div class="row">
        <?php foreach ($products as $product): ?>
        <div class="col-md-4 mb-3">
            <div class="card">
                <?php if ($product['image_url']): ?>
                <img src="<?= base_url('writable/' . $product['image_url']); ?>" class="card-img-top"
                    alt="Gambar Produk">
                <?php else: ?>
                <div class="card-img-top d-flex align-items-center justify-content-center"
                    style="height: 200px; background-color: #eaeaea;">
                    <span class="text-muted">No Image</span>
                </div>
                <?php endif; ?>
                <div class="card-body">
                    <h5 class="card-title"><?= $product['name'] ?></h5>
                    <p class="card-text"><?= $product['description'] ?></p>
                    <p class="card-text"><strong>Harga:</strong> Rp <?= number_format($product['price'], 2) ?></p>
                    <p class="card-text"><strong>Stok:</strong> <?= $product['qty'] ?></p>
                    <div class="d-flex justify-content-between">

                        <a href="<?= base_url('/pages/edit_product/' . $product['id']) ?>"
                            class="btn btn-warning">Edit</a>

                        <button class="btn btn-danger" onclick="deleteProduct(<?= $product['id'] ?>)">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<?= $this->endSection() ?>