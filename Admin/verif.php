<?php 
    include '../koneksi.php';

    $id = $_GET['id_transaksi'];


    $data = mysqli_query($koneksi, "UPDATE transaksi SET status = 'verifikasi' WHERE id_transaksi = '$id'");
    if($data){
        ?>
        <script>
            alert("Data Berhasil Di Verifikasi!!!");
            window.location = 'pesanan.php';
            </script>
        <?php 
    }else {
        ?>
        <script>
            alert("Data Gagal Di Verifikasi!!!");
            window.location = 'pesanan.php';
        </script>
        <?php 
    }
?> 