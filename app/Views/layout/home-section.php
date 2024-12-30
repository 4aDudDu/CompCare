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

    <?= $this->include('layout/home-navbar'); ?>
    <?= $this->renderSection('home'); ?>


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

            const phoneNumber = '085249847386';
            const message =
                `Tipe Perangkat: ${deviceType}\nTipe Masalah: ${issueType}\nKeterangan: ${description}`;
            const waLink = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;

            window.open(waLink, '_blank');
        });
    });
    </script>

</body>

</html>