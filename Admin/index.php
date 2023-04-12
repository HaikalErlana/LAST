<?php 
    include '../koneksi.php';
    if(!isset($_SESSION['status'])){
        ?>
        <script>
            alert('Silahkan Login Terlebih Dahulu!!!');
            window.location = '../index.php';
        </script>
        <?php
    }
    if($_SESSION['role'] != 'Admin'){
        ?>
        <script>
            alert('Anda Tidak Bisa Memasuki Halaman Admin!!!');
            window.location = '../index.php';
        </script>
        <?php
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Halaman Admin</title>
    <style>
         *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body{
            background-color: #f4f4f4;
            display: grid;
            grid-template-areas: 'sidebar main';
            grid-template-columns: 400px 1fr;
            grid-template-rows: 649px;
        }
        .sidebar{
            grid-area: 'sidebar';
            box-shadow: 0 0 10px rgba(0, 0, 0, .8);
            
        }
        .sidebar h1{
            font-size: 3em;
            text-align: center;
            padding: 30px 0;
        }
        a{
            text-decoration: none;
        }
        .sidebar a{
            display: block; 
            padding: 20px 120px;
            text-align: center;
            margin: 10px 0;
            font-size: 18px;
            color: #fff;
            background-color: #4361EE35;
            transition: .3s;
        }
        .sidebar a:hover{
            background-color: #4361EE;
        }
        .sidebar a:nth-child(2){
            background-color: #4361EE;
        }

        .main{
            grid-area: 'main';
            overflow-x: scroll;
        }
        h1{
            text-align: center;
            font-size: 3em;
            padding: 40px 0 0;
        }
        h3{
            text-align: center;
            font-size: 2em;
            padding: 20px 0;
        }
        table{
            width: calc(100% - 200px);
            margin: 30px auto 20px;
        }
        table tr th {
            height: 70px;
            color: #ffffff;
            font-size: 20px;
        }
        table .atas {
            background: linear-gradient(to top left, #4361EE, #4CC9F0);
        }
        table tr th:nth-child(1) {
            border-radius: 5px 0 0 0;
        }
        table tr th:nth-child(5) {
            border-radius: 0 5px 0 0;
            width: 200px;
        }
        table tr td{
            text-align: center;
            padding: 30px 0;
            background-color: #00000005;
            font-size: 18px;
        }
        table tr td:nth-child(5) a{
            padding: 10px 15px;
            border-radius: 5px;
            color: #fff;
        }
        table tr td:nth-child(5) a:nth-child(1){
            background-color: #02c39a;
        }
        table tr td:nth-child(5) a:nth-child(2){
            background-color: #f72585;
        }
        .add {
            padding: 13px 20px;
            border-radius: 3px;
            background-color: #3A0CA335;
            color: #3A0CA3;
            border: 2px solid #3A0CA3;
            font-weight: bold;
            margin: 100px 0 0 100px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h1>LapStore</h1>
        <a >Data Barang</a>
        <a href="pesanan.php">Data Pesanan</a>
        <a href="../logout.php">Logout</a>
    </div>
    <div class="main">
        <h1>Selamat Datang Admin</h1>
        <h3>Data Barang</h3>
        <a href="barang/tambah_barang.php" class="add">Tambah Barang</a>
        <table cellpadding="10" cellspacing="0">
            <tr class="atas">
                <th>No</th>
                <th>Nama Barang</th>
                <th>Harga Satuan</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
            <?php 
            $no = 1;
            $data = query("SELECT * FROM barang");
            foreach($data as $row){
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td>Laptop <?= $row['jenis_barang']; ?></td>
                    <td>Rp. <?= number_format($row['harga_satuan']); ?> ,-</td>
                    <td><?= $row['stok_barang']; ?></td>
                    <td>
                        <a href="barang/edit_barang.php?id_barang=<?= $row['id_barang']; ?>">Edit</a>
                        <a href="barang/hapus_barang.php?id_barang=<?= $row['id_barang']; ?>" onclick="return confirm('Yakinn Mau Dihapus???');">Hapus</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</body>
</html>