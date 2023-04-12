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
            grid-template-rows: 961px;
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
        .sidebar a:nth-child(3){
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
            width: calc(100% - 100px);
            margin: 15px auto 30px;
        }
        table .atas {
            background: linear-gradient(to top left, #4361EE, #4CC9F0);
        }
        table tr th {
            height: 70px;
            color: #ffffff;
            font-size: 20px;
        }
        table tr th:nth-child(1) {
            border-radius: 5px 0 0 0;
            width: 60px
        }
        table tr th:nth-child(6) {
            width:150px;
        }
        [p] tr th:nth-child(8){
            border-radius: 0 5px 0 0;
        }
        [l] tr th:nth-child(7){
            border-radius: 0 5px 0 0;
        }
        table tr td{
            text-align: center;
            padding: 30px 0;
            background-color: #00000005;
            font-size: 18px;
        }
        table tr td:nth-child(8) a{
            padding: 10px 15px;
            border-radius: 5px;
            color: #fff;
        }
        table tr td:nth-child(8) a:nth-child(1){
            background-color: #02c39a;
        }
        table tr td:nth-child(8) a:nth-child(2){
            background-color: #f72585;
        }
        .tajuk{
            width: 300px;
            height: 50px;
            background-color: #3A0CA335;
            font-size: 17px;
            text-align:center;
            line-height: 50px;
            border: 1px solid #4361EE;
            border-radius: 5px;
            color: #3A0CA3;
            font-weight: bold;
            margin: 0 0 0 50px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h1>LapStore</h1>
        <a href="index.php">Data Barang</a>
        <a>Data Pesanan</a>
        <a href="../logout.php">Logout</a>
    </div>
    <div class="main">

        <h1>Selamat Datang Admin</h1>
        <h3>Data Pesanan</h3>
        <!-- Proses -->
        <p class="tajuk">Pesanan Yang Harus Di Proses</p>
        <table cellpadding="10" cellspacing="0" p>
            <tr class="atas">
                <th>No</th>
                <th>Nama Pemesan</th>
                <th>Jenis Barang</th>
                <th>Tanggal Transaksi</th>
                <th>Jumlah Barang</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            <?php 
            $no = 1;
            $data = query("SELECT * FROM transaksi WHERE status LIKE '%proses%'");
            foreach($data as $row){
                $nama = $row['id_user'];
                $pemesan = query("SELECT * FROM user WHERE id_user = '$nama'")[0];
                $barang = query("SELECT * FROM barang")[0];
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $pemesan['nama_user']; ?></td>
                    <td><?= $row['tgl_transaksi']; ?></td>
                    <td>Laptop <?= $barang['jenis_barang']; ?></td>
                    <td><?= $row['jmlh_barang']; ?></td>
                    <td>Rp. <?= number_format($row['total_harga']); ?> ,-</td>
                    <td><?= $row['status']; ?></td>
                    <td>
                        <a href="verif.php?id_transaksi=<?= $row['id_transaksi']; ?>">Accept</a>
                        <a href="tolak.php?id_transaksi=<?= $row['id_transaksi']; ?>" >Decline</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
        <!-- Verifikasi -->
        <p class="tajuk">Pesanan Yang Sudah Di Verifikasi <a href="cetak_transaksi.php">Cetak</a></p>
        <table cellpadding="10" cellspacing="0" l>
            <tr class="atas">
                <th>No</th>
                <th>Nama Pemesan</th>
                <th>Nama Barang</th>
                <th>Tanggal Transaksi</th>
                <th>Jumlah Barang</th>
                <th>Total Harga</th>
                <th>Status</th>
            </tr>
            <?php 
            $no = 1;
            $data = query("SELECT * FROM transaksi WHERE status LIKE '%verifikasi%'");
            foreach($data as $row){
                $nama = $row['id_user'];
                $pemesan = query("SELECT * FROM user WHERE id_user = '$nama'")[0];
                $barang = query("SELECT * FROM barang")[0];
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $pemesan['nama_user']; ?></td>
                    <td><?= $row['tgl_transaksi']; ?></td>
                    <td>Laptop <?= $barang['jenis_barang']; ?></td>
                    <td><?= $row['jmlh_barang']; ?></td>
                    <td>Rp. <?= number_format($row['total_harga']); ?> ,-</td>
                    <td><?= $row['status']; ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
        <!-- Ditolak -->
        <p class="tajuk">Pesanan Yang Di Tolak</p>
        <table cellpadding="10" cellspacing="0" l>
            <tr class="atas">
                <th>No</th>
                <th>Nama Pemesan</th>
                <th>Jenis Barang</th>
                <th>Tanggal Transaksi</th>
                <th>Jumlah Barang</th>
                <th>Total Harga</th>
                <th>Status</th>
            </tr>
            <?php 
            $no = 1;
            $data = query("SELECT * FROM transaksi WHERE status LIKE '%ditolak%'");
            foreach($data as $row){
                $nama = $row['id_user'];
                $pemesan = query("SELECT * FROM user WHERE id_user = '$nama'")[0];
                $barang = query("SELECT * FROM barang")[0];
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $pemesan['nama_user']; ?></td>
                    <td><?= $row['tgl_transaksi']; ?></td>
                    <td>Laptop <?= $barang['jenis_barang']; ?></td>
                    <td><?= $row['jmlh_barang']; ?></td>
                    <td>Rp. <?= number_format($row['total_harga']); ?> ,-</td>
                    <td><?= $row['status']; ?></td>
                </tr>
                <?php
            }
            ?>
        </table>    
    </div>
</body>
</html>