<?php
include '../koneksi.php';
if (empty($_SESSION["cart"]) || !isset($_SESSION["cart"])) {
?>
    <script>
        alert("Barang Masih Kosong Nih!!! Jangan Lupa Berbelanja Ya");
        window.location = 'index.php';
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Keranjang</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
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
        .container {
            width: 100%;
            height: auto;
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            flex-flow: wrap;
            padding: 20px;
            margin-bottom: 100px;
        }

        .list {
            width: calc(100% - 700px);
            height: 300px;
            margin-bottom: 40px;
            border-radius: 10px;
            background: linear-gradient(to top left, #4361EE, #4CC9F0);
            display: flex;
            align-items: center;
        }

        .list .gambar {
            width: calc(100% - 300px);
            height: calc(100% - 60px);
            background-color: #ffffff55;
            border-radius: 5px;
            margin: 0 20px;
            display: grid;
            place-items: center;

        }

        .list .gambar img {
            width: 200px;
            height: auto;
        }

        .list .isi {
            width: calc(100% - 50px);
            height: 100%;
            background-color: #fff;
            border-radius: 0 10px 10px 0;
        }

        .list .isi h1 {
            text-align: start;
            font-size: 2.2em;
            padding: 15px 0 10px 15px;
        }

        .list .isi h3 {
            padding: 5px 0 10px 20px;
            font-size: 1.3em;
        }

        .list .isi p {
            padding: 0 0 0 20px;
            color: #4361EE;
        }

        .list .isi .th {
            display: block;
            padding: 10px 0 0 20px;
            color: #00000055;
        }

        .list .isi h2 {
            display: block;
            margin: 0 0 0 20px;
            width: calc(100% - 50px);
            height: 40px;
            color: #00000055;
            padding: 0 20px;
            color: #000;
            outline: none;
        }

        .list .isi a {
            display: inline-block;
            padding: 7px 20px;
            border-radius: 5px;
            color: #fff;
            font-size: 15px;
            margin: 10px 0 0 10px;
            cursor: pointer;
            background-color: #f72585;
        }

        .list .isi [edit] {
            margin: 10px 0 0 20px;
            background-color: #02c39a;
        }

        .total {
            width: calc(100% - 300px);
            height: 120px;
            background-color: #ffffff35;
            position: fixed;
            backdrop-filter: blur(10px);
            bottom: 0;
            border: 2px solid #ffffff55;
            border-radius: 5px 5px;
            left: 10%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 0 10px 2px rgba(0, 0, 0, .1);
        }

        .total h1 {
            font-size: 1.3em;
            padding-left: 50px;
            text-align: start;
        }

        .total a {
            margin-right: 50px;
            padding: 7px 20px;
            border-radius: 5px;
            color: #fff;
            font-size: 15px;
            background-color: #4CC9F0;
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
            <a href="riwayat.php">
                <i class="fa fa-history" aria-hidden="true"></i>
            </a>
            <a href="../logout.php">
                <i class="fa fa-sign-out" aria-hidden="true"></i>
            </a>
        </div>
    </nav>
    <h1 class="judul">Keranjang</h1>
    <div class="container">
        <?php
        $grandTotal = 0;
        foreach ($_SESSION['cart'] as $id_barang => $kuantitas) : ?>
            <?php
            $data = query("SELECT * FROM barang WHERE id_barang = '$id_barang'")[0];
            $totalHarga = $data['harga_satuan'] * $kuantitas;
            $grandTotal += $totalHarga;
            ?>
            <div class="list">
                <div class="gambar">
                    <img src="../images/<?= $data["foto"]; ?>" alt="">
                </div>
                <div class="isi">
                    <h1>Laptop <?= $data["jenis_barang"]; ?></h1>
                    <h3>Rp. <?= number_format($data["harga_satuan"]); ?>,-</h3>
                    <p>Beli <?= $kuantitas; ?> Barang</p>
                    <p class="th">Total Harga</p>
                    <h3>Rp. <?= number_format($totalHarga); ?> ,-</h3>
                    <a href="edit_keranjang.php?id_barang=<?= $data['id_barang']; ?>" edit>Edit</a>
                    <a href="hapus_keranjang.php?id_barang=<?= $data['id_barang']; ?>" hapus>Hapus</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="total">
        <h1>GrandTotal : <br>Rp. <?= number_format($grandTotal); ?>,-</h1>
        <a href="checkout.php">Checkout</a>
    </div>
</body>

</html>