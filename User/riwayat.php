<?php 
    include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Riwayat Pesanan</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body{
            background-color: #f4f4f4;
        }
        .judul {
            font-size: 2em;
            padding: 30px 40px 10px;
        }

        a {
            text-decoration: none;
        }

        nav {
            width: 100%;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 2px solid #4361EE55;
            background-color: #4CC9F055;
        }

        nav h1 {
            font-size: 2em;
            padding-left: 40px;
            color: #4361EE;
        }
        nav h1 span {
            color: #3A0CA3;
        }

        nav .login {
            padding: 7px 20px;
            border: 2px solid #3A0CA3;
            font-size: 15px;
            font-weight: bold;
            color: #3A0CA3;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
            margin-right: 5px;
        }

        nav a{
            width: 40px;
            height: 40px;
            background-color: #3A0CA395;
            font-size: 15px;
            font-weight: bold;
            color: #ffffff;
            margin: 0 5px;
            font-size: 20px;
            display: grid;
            place-items: center;
            border-radius: 5px;
        }
        nav div a:nth-child(3){
            margin-right: 40px;
        }
        table{
            width: calc(100% - 80px);
            margin: 20px auto 20px;
        }
        table .atas{
            background: linear-gradient(to top left, #4361EE, #4CC9F0);
        }
        table tr th {
            height: 70px;
            color: #ffffff;
            font-size: 20px;
        }
        table tr th:nth-child(1) {
            border-radius: 5px 0 0 0;
            width: 80px;
        }
        table tr th:nth-child(6) {
            width: 150px;
        }
        table tr th:nth-child(7) {
            border-radius: 0 5px 0 0;
            /* width: 200px */
        }
        table tr td{
            text-align: center;
            padding: 30px 0;
            background-color: #00000005;
            font-size: 18px;
        }
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>
    <nav>
        <h1>Lap<span>store</span></h1>
        <div style="display: flex; align-items: center;">
            <a href="index.php">
                <i class="fa fa-home" aria-hidden="true"></i>
            </a>
            <a href="keranjang.php">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            </a>
            <a href="../logout.php">
                <i class="fa fa-sign-out" aria-hidden="true"></i>
            </a>
        </div>
    </nav>
    <h1 class="judul">Riwayat Pesanan Anda</h1>
    <table cellpadding="10" cellspacing="0">
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
        $data = query("SELECT * FROM transaksi");
        if(count($data) == 0){
            ?>
            <tr>
                <td colspan="7">Belum Ada Riwayat Belanja</td>
            </tr>
            <?php
        }else{
            foreach($data as $row){
                $nama = $row['id_user'];
                $pemesan = query("SELECT * FROM user WHERE id_user = '$nama'")[0];
                $iBarang = $row['id_barang'];
                $barang = query("SELECT * FROM barang WHERE id_barang = '$iBarang'")[0];
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $pemesan['nama_user']; ?></td>
                    <td>Laptop <?= $barang['jenis_barang']; ?></td>
                    <td><?= $row['tgl_transaksi']; ?></td>
                    <td><?= $row['jmlh_barang']; ?></td>
                    <td>Rp. <?= number_format($row['total_harga']); ?> ,-</td>
                    <td><?php 
                        if($row['status'] == "proses"){
                            echo "Pesanan Masih Di Proses";
                        }else if($row['status'] == "verifikasi"){
                            echo "Pesanan Sudah Di verifikasi";
                        }else{
                            echo "Pesanan Di Tolak";
                        }
                    ?></td>
                </tr>
                <?php
            }
        }
        
        ?>
    </table>
</body>
</html>