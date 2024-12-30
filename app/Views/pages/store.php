<?= $this->extend('layout/main-section'); ?>

<?= $this->section('main'); ?>
<div class="container">
    <br>

    <?php if (logged_in()): ?>

    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahProduk"><svg
            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus-fill"
            viewBox="0 0 16 16">
            <path
                d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0" />
        </svg> Tambah Produk</button>
    <a href="/pages/product/"><button class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                height="16" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                <path
                    d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0" />
            </svg> Produk ku</button></a>
    <?php else: ?>
    <p>Selamat datang di marketplace kami! <a href="<?= base_url('login'); ?>">Login</a> untuk menambah produk.</p>
    <?php endif; ?>

    <?php if (logged_in()): ?>
    <div class="modal fade" id="modalTambahProduk" tabindex="-1" aria-labelledby="modalTambahProdukLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <form action="<?= base_url('store/addProduct'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                        <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger">
                            <?php 
                                $errors = session()->getFlashdata('error');
                                if (is_array($errors)): 
                                    foreach ($errors as $error): ?>
                            <p><?= esc($error); ?></p>
                            <?php endforeach; 
                                else: ?>
                            <p><?= esc($errors); ?></p>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>


                        <div class="form-group">
                            <input type="text" placeholder="Nama Produk" class="form-control input-field" id="name"
                                name="name" required>
                        </div><br>
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Deskripsi Produk" id="description"
                                name="description" required></textarea>
                        </div><br>
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="Harga" id="price" name="price"
                                step="0.01" required>
                        </div><br>
                        <div class="form-group">
                            <label for="qty"></label>
                            <input type="number" class="form-control" id="qty" name="qty" placeholder="Kuantitas"
                                required>
                        </div><br>
                        <div class="form-group">
                            <div class="upload-con">
                                <div class="head-up">
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M7 10V9C7 6.23858 9.23858 4 12 4C14.7614 4 17 6.23858 17 9V10C19.2091 10 21 11.7909 21 14C21 15.4806 20.1956 16.8084 19 17.5M7 10C4.79086 10 3 11.7909 3 14C3 15.4806 3.8044 16.8084 5 17.5M7 10C7.43285 10 7.84965 10.0688 8.24006 10.1959M12 12V21M12 12L15 15M12 12L9 15"
                                                stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                        </g>
                                    </svg>
                                    <p>Klik Browse untuk upload foto Produk</p>
                                </div>
                                <label for="file" class="foot-up">
                                    <svg fill="#000000" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path d="M15.331 6H8.5v20h15V14.154h-8.169z"></path>
                                            <path d="M18.153 6h-.009v5.342H23.5v-.002z"></path>
                                        </g>
                                    </svg>
                                    <p>Tidak ada foto yang dipilih!</p>
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M5.16565 10.1534C5.07629 8.99181 5.99473 8 7.15975 8H16.8402C18.0053 8 18.9237 8.9918 18.8344 10.1534L18.142 19.1534C18.0619 20.1954 17.193 21 16.1479 21H7.85206C6.80699 21 5.93811 20.1954 5.85795 19.1534L5.16565 10.1534Z"
                                                stroke="#000000" stroke-width="2"></path>
                                            <path d="M19.5 5H4.5" stroke="#000000" stroke-width="2"
                                                stroke-linecap="round"></path>
                                            <path
                                                d="M10 3C10 2.44772 10.4477 2 11 2H13C13.5523 2 14 2.44772 14 3V5H10V3Z"
                                                stroke="#000000" stroke-width="2"></path>
                                        </g>
                                    </svg>
                                </label>
                                <input type="file" id="image" name="image" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="row mt-5">
        <?php foreach ($products as $product): ?>
        <div class="col-md-4">
            <div class="card">

                <img src="<?= base_url('writable/' . $product['image_url']); ?>" class="card-img-top"
                    alt="Gambar Produk">
                <div class="card-body">
                    <h5 class="card-title"><?= esc($product['name']); ?></h5>
                    <p class="card-text"><?= esc($product['description']); ?></p>
                    <p class="card-text"><strong>Harga:</strong> Rp
                        <?= number_format($product['price'], 2, ',', '.'); ?></p>
                    <p class="card-text"><strong>Jumlah:</strong> <?= $product['qty']; ?></p>
                    <!-- Tombol Beli yang mengarah ke WhatsApp -->
                    <a href="https://wa.me/<?= urlencode($product['no_hp']) ?>?text=Halo, saya tertarik dengan produk *<?= urlencode($product['name']) ?>* seharga Rp <?= number_format($product['price'], 2, ',', '.') ?>"
                        class="btn btn-success" target="_blank">Beli!</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<?= $this->endSection(); ?>