<?= $this->extend('layout/main-section'); ?>

<?= $this->section('main'); ?>
<div class="container mt-4 editprod">
    <form method="POST" action="<?= base_url('/pages/edit_product/' . $product['id']) ?>">
        <div class="form-group">
            <label for="name">Nama Produk</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= old('name', $product['name']) ?>"
                required>
        </div><br>
        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea class="form-control" id="description" name="description"
                rows="3"><?= old('description', $product['description']) ?></textarea>
        </div><br>
        <div class="form-group">
            <label for="price">Harga</label>
            <input type="number" class="form-control" id="price" name="price"
                value="<?= old('price', $product['price']) ?>" step="0.01" required>
        </div><br>
        <div class="form-group">
            <label for="qty">Kuantitas</label>
            <input type="number" class="form-control" id="qty" name="qty" value="<?= old('qty', $product['qty']) ?>"
                required>
        </div><br>
        <button type="submit" class="btn btn-primary mt-2">Simpan Perubahan</button>
        <a href="<?= base_url('/pages/product') ?>" class="btn btn-danger mt-2">Batal</a>
    </form>
</div>
<?= $this->endSection() ?>