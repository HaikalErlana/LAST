<?php 
    include '../koneksi.php';

    $id = $_GET['id_transaksi'];

    $data = mysqli_query($koneksi, "UPDATE transaksi SET status = 'ditolak' WHERE id_transaksi = '$id'");
    if($data){
        ?>
        <script>
            alert("Data Berhasil Di Tolak!!!");
            window.location = 'pesanan.php';
            </script>
        <?php 
    }else {
        ?>
        <script>
            alert("Data Gagal Di Tolak!!!");
            window.location = 'pesanan.php';
        </script>
        <?php 
    }
?> 