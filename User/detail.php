<?php
include '../koneksi.php';
$id = $_GET['id_barang'];
$data = query("SELECT * FROM barang WHERE id_barang= '$id'")[0];
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
    <title>Detail Barang</title>
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

        .container {
            width: calc(100% - 600px);
            height: 300px;
            margin: 100px auto 0;
            border-radius: 10px;
            background: linear-gradient(to top left, #4361EE, #4CC9F0);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .container .gambar {
            width: calc(100% - 400px);
            height: calc(100% - 60px);
            background-color: #ffffff55;
            border-radius: 5px;
            margin: 0 20px;
            display: grid;
            place-items: center;

        }
        .container .gambar img{
            width: 250px;
            height: auto;
        }

        .container .isi {
            width: calc(100% - 50px);
            height: 100%;
            background-color: #fff;
        }
        .container .isi h1{
            font-size: 2.3em;
            padding: 15px 20px 10px;
        }
        .container .isi h3{
            padding: 5px 0 10px 20px;
            font-size: 1.3em;
        }
        .container .isi p {
            padding: 0 0 0 20px;
            color: #4361EE;
        }
        .container .isi label {
            display: block;
            padding: 10px 0 0 20px;
            color: #00000055;
        }
        .container .isi input{
            display: block;
            margin: 0 0 0 20px;
            width: calc(100% - 50px);
            height: 40px;
            color: #00000055;
            padding: 0 20px;
            color: #000;
            outline: none;
        }
        .container .isi input:focus{
            border: 2px solid #4361EE85;
        }
        .container .isi button {
            padding: 10px 20px;
            background-color: #4CC9F0;
            border-radius: 5px;
            border: none;
            color: #fff;
            font-size: 15px;
            margin: 15px 0 0 20px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <form action="" method="post">
        <div class="container">
            <div class="gambar">
                <img src="../images/<?= $data["foto"]; ?>" alt="">
            </div>
            <div class="isi">
                <h1>Laptop <?= $data["jenis_barang"]; ?></h1>
                <h3>Rp. <?= number_format($data["harga_satuan"]); ?>,-</h3>
                <p>Tersisa <?= $data["stok_barang"]; ?> Stok</p>
                <label for="">Masukkan Jumlah Barang</label>
                <input type="number" name="qty" value="1" min="1">
                <button type="submit" name="pesan">Add To Cart</button>
            </div>
        </div>
    </form>
</body>

</html>

<?php
if (isset($_POST['pesan'])) {
    $qty = $_POST['qty'];
    if ($qty > $data['stok_barang']) {
?>
        <script>
            alert('Melebihi Batas Stok');
            window.location = 'index.php';
        </script>
    <?php
    }
    $_SESSION['cart'][$id] = $qty;
    ?>
    <script>
        alert("Barang Berhasil dimasukkan kedalam Keranjang!!!");
        window.location = 'keranjang.php';
    </script>
<?php
}
?>