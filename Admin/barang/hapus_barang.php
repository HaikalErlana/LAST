<?php 
    include '../../koneksi.php';
    
    if(hapusBarang($_GET)){
        ?>
           <script>
               alert("Barang Berhasi Dihapus!!");
               window.location = '../index.php';
           </script>
        <?php
    }else{
        ?>
           <script>
               alert("Barang Gagal Dihapus!!");
               window.location = '../index.php';
           </script>
        <?php
    }
?>