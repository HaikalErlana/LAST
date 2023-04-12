<?php 
    include '../koneksi.php';
    $id = $_GET['id_barang'];
    unset($_SESSION["cart"][$id]);
    ?>
    <script>
        alert("Barang Telah Dihapus!!");
        window.location = 'keranjang.php';
    </script>
    <?php
?>