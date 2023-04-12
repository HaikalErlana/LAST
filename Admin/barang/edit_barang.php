<?php
include '../../koneksi.php';
$id = $_GET['id_barang'];
$data = query("SELECT * FROM barang WHERE id_barang = '$id'")[0];

if (isset($_POST['submit'])) {
    if (editBarang($_POST) > 0) {
?>
        <script>
            alert("Barang Berhasi Diubah!!");
            window.location = '../index.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("Barang Gagal Diubah!!");
            window.location = '../index.php';
        </script>
<?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Edit Barang</title>
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

        .box {
            width: 500px;
            border-radius: 5px;
            margin: 100px auto;
            background-color: #ffffff27;
            border-radius: 10px;
            padding: 5px 0;
            position: relative;
        }

        .box::after {
            content: '';
            position: absolute;
            width: calc(100% + 30px);
            height: calc(100% + 30px);
            z-index: -1;
            background: linear-gradient(to right bottom, #4CC9F0, #4361EE, #3A0CA3);
            top: -15px;
            left: -15px;
            border-radius: 10px
        }

        .box h1 {
            font-size: 3em;
            text-align: center;
            padding: 20px 0 30px;
            color: #fff;
        }

        .box label {
            font-size: 18px;
            color: #fff;
            padding: 0 0 10px 25px;
        }

        .box input {
            width: calc(100% - 50px);
            height: 60px;
            padding: 20px;
            margin: 10px auto 0;
            font-size: 18px;
            display: block;
            outline: none;
            border: none;
            background-color: #ffffff27;
            border: 2px solid #ffffff85;
            color: #fff;
            border-radius: 50px;
        }
        .box [foto]{
            padding: 15px 20px;
        }

        .box input::placeholder {
            color: #fff;
        }

        .box button {
            width: calc(100% - 50px);
            height: 55px;
            margin: 10px auto 20px;
            font-size: 18px;
            display: block;
            border-radius: 50px;
            background-color: #ffffff37;
            border: 2px solid #ffffff85;
            color: #fff;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="box">
        <h1>Edit Barang</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_barang" value="<?= $data['id_barang']; ?>">
            <label for="">Nama Barang</label><br>
            <input type="text" name="nama_barang" value="<?= $data['nama_barang']; ?>"><br>
            <label for="">Jenis Barang</label><br>
            <input type="text" name="jenis_barang" value="<?= $data['jenis_barang']; ?>"><br>
            <label for="">Harga Satuan</label><br>
            <input type="number" name="harga_satuan" value="<?= $data['harga_satuan']; ?>"><br>
            <label for="">Stok Barang</label><br>
            <input type="number" name="stok_barang" value="<?= $data['stok_barang']; ?>"><br>
            <label for="">Foto Barang</label><br>
            <input type="file" name="foto" value="<?= $data['foto']; ?>" foto><br>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>