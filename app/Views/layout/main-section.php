<!doctype html>
<html lang="en">
<?php helper('auth'); ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('css/component.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?= $this->include('layout/main-navbar'); ?>
    <?= $this->renderSection('main'); ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {

        $(document).ready(function() {
            $('#deviceType').on('change', function() {
                var deviceType = $(this).val();

                $.ajax({
                    url: '<?= base_url("pages/issueDevice") ?>',
                    type: 'POST',
                    data: {
                        deviceType: deviceType
                    },
                    success: function(data) {
                        $('#issueType').html(
                            '<option value="">Pilih Masalah</option>');
                        $.each(data, function(index, value) {
                            $('#issueType').append('<option value="' +
                                value +
                                '">' + value + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            });
        });

        document.getElementById('submitButton').addEventListener('click', function() {
            const deviceType = document.getElementById('deviceType').value;
            const issueType = document.getElementById('issueType').value;
            const description = document.getElementById('description').value;

            if (!deviceType || !issueType || !description) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Isi dulu keluhanmu!',
                    text: 'Harap isi semua bidang sebelum mengirim.',
                });
                return;
            }

            const phoneNumber = '082385858340';
            const message =
                `Tipe Perangkat: ${deviceType}\nTipe Masalah: ${issueType}\nKeterangan: ${description}`;
            const waLink = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;

            window.open(waLink, '_blank');
        });
    });
    document.querySelectorAll('#nav-tab>[data-bs-toggle="tab"]').forEach(el => {
        el.addEventListener('shown.bs.tab', () => {
            const target = el.getAttribute('data-bs-target');
            const scrollElem = document.querySelector(`${target} [data-bs-spy="scroll"]`);
            if (scrollElem) {
                bootstrap.ScrollSpy.getOrCreateInstance(scrollElem).refresh();
            }
        });
    });

    $(document).ready(function() {
        $('#deviceType').on('change', function() {
            var deviceType = $(this).val();

            $.ajax({
                url: '<?= base_url("pages/issueDevice") ?>',
                type: 'POST',
                data: {
                    deviceType: deviceType
                },
                success: function(data) {
                    $('#issueType').html(
                        '<option value="">Pilih Masalah</option>');
                    $.each(data, function(index, value) {
                        $('#issueType').append('<option value="' +
                            value + '">' +
                            value + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });
    });




    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('searchForm');
        const searchInput = document.getElementById('searchInput');
        const allProducts = Array.from(document.querySelectorAll('.col-md-4'));

        console.log("Total produk ditemukan:", allProducts.length);

        function filterProducts(searchTerm) {
            const lowerCaseSearchTerm = searchTerm.toLowerCase();

            console.log("Mencari:", searchTerm);

            allProducts.forEach(product => {
                const productName = product.querySelector('.card-title');
                if (!productName) return;

                const isMatch = productName.textContent.toLowerCase().includes(
                    lowerCaseSearchTerm);

                console.log("Nama produk:", productName.textContent, "Cocok dengan:",
                    lowerCaseSearchTerm, isMatch);

                if (isMatch) {
                    product.style.display = 'block';
                } else {
                    product.style.display = 'none';
                }
            });
        }

        form.addEventListener('submit', function(event) {
            event.preventDefault();
            const searchTerm = searchInput.value.trim();
            filterProducts(searchTerm);
        });

        searchInput.addEventListener('input', function() {
            const searchTerm = searchInput.value.trim();
            filterProducts(searchTerm);
        });
    });

    function deleteProduct(productId) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data ini akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: '<?= base_url("pages/product/delete/") ?>' + productId,
                    type: 'POST',
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                title: 'Berhasil!',
                                text: 'Produk berhasil dihapus.',
                                icon: 'success',
                            }).then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                title: 'Gagal!',
                                text: 'Terjadi kesalahan saat menghapus.',
                                icon: 'error',
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            title: 'Kesalahan!',
                            text: 'Terjadi kesalahan server.',
                            icon: 'error',
                        });
                    }
                });
            }
        });


    }
    </script>
</body>

</html>