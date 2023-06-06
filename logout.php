<?php 

session_start();
session_destroy();

echo '<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>';
echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
echo "<script>
    $(document).ready(function() {
        Swal.fire({
            title: 'Log Out?',
            text: 'Anda akan keluar dari halaman ini. Apakah Anda yakin?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Anda berhasil keluar!',
                    icon: 'success'
                }).then(function() {
                    window.location.href = 'index.php';
                });
            } else {
            }
        });
    });
</script>";
?>
