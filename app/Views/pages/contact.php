<?= $this->extend('layout/main-section'); ?>

<?= $this->section('main'); ?>
<div class="container">
    <br>
    <h2 style="text-align: center; font-family: 'ayesh';"> Apa Masalah Devicemu?</h2><br>

    <div class="brutalist-card">
        <div class="brutalist-card__header">
            <div class="brutalist-card__icon">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z">
                    </path>
                </svg>
            </div>
            <div class="brutalist-card__alert">Form Keluhan</div>
        </div>
        <form>
            <div class="form-group">
                <label for="deviceType">Tipe Perangkat:</label>
                <select id="deviceType" name="deviceType" class="form-control">
                    <option value="">Pilih Tipe Perangkat</option>
                    <?php foreach ($deviceTypes as $key => $device): ?>
                        <option value="<?= $key; ?>"><?= $device; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <br>
            <div class="form-group">
                <label for="issueType">Tipe Masalah:</label>
                <select id="issueType" name="issueType" class="form-control">
                    <option value="">Pilih Masalah</option>
                </select>
            </div>
            <br>
            <div class="form-group">
                <label for="description">Keterangan Kerusakan:</label>
                <textarea id="description" name="description" class="form-control" rows="3"></textarea>
            </div>
            <br>
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
                                    stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                </path>
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
                                <path d="M19.5 5H4.5" stroke="#000000" stroke-width="2" stroke-linecap="round">
                                </path>
                                <path d="M10 3C10 2.44772 10.4477 2 11 2H13C13.5523 2 14 2.44772 14 3V5H10V3Z"
                                    stroke="#000000" stroke-width="2"></path>
                            </g>
                        </svg>
                    </label>
                    <input type="file" id="fileInput" name="fileInput" class="form-control">
                </div>
            </div>
            <br>
            <div class="form-group text-center">
                <button type="button" id="submitButton"
                    class="brutalist-card__button brutalist-card__button--mark">Kirim ke WhatsApp</button>
            </div>
        </form>
    </div>


</div>

<?= $this->endSection(); ?>