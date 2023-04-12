<?php 
    session_start();
    $koneksi = mysqli_connect("localhost", "root", "", "penjualan1");

    // buat query data
    function query($query){
        global $koneksi;

        $result = mysqli_query($koneksi, $query);
        $rows = [];

        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }

        return $rows;
    }

    // checkout
    function checkout($data){
        global $koneksi;

        foreach($_SESSION["cart"] as $product_id => $result){
            $barang = query("SELECT * FROM barang WHERE id_barang = '$product_id'")[0];
            $id_user = $data['id_user'];
            $id_barang = $product_id;
            $total_harga = $result * $barang["harga_satuan"];
            $tanggal = $data["tgl_transaksi"];
            $qty = $result;
            $st = 'proses';

            $query_checkout = mysqli_query($koneksi, "INSERT INTO transaksi VALUES(NULL, '$tanggal', '$id_user', '$id_barang', '$qty', '$total_harga', '$st')");

            // pengurangan stok
            $query_stok = mysqli_query($koneksi, "UPDATE barang SET stok_barang = stok_barang - '$result' WHERE id_barang = '$product_id'");
        }
        return mysqli_affected_rows($koneksi);
    }

    // tes
    function tambahUser($data){
        global $koneksi;

        $username = htmlspecialchars($data['username']);
        $password = htmlspecialchars($data['password']);
        $nama_user = htmlspecialchars($data['nama_user']);
        $role = htmlspecialchars($data['role']);
        $created_at = htmlspecialchars($data['created_at']);
        $update_at = htmlspecialchars($data['update_at']);
        
        $query = "INSERT INTO user VALUES('', '$username', '$password', '$nama_user', '$role', '$created_at', '$update_at')";
        // move_uploaded_file($tmp_name, "../images/$name");//ada salah tulis di sini, destinationnya keluar folder dulu

        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);
    }

    // crud barang
    function tambahBarang($data){
        global $koneksi;

        $nama = $data['nama_barang'];
        $jenis = $data['jenis_barang'];
        $harga = $data['harga_satuan'];
        $stok = $data['stok_barang'];
        $foto = $_FILES['foto']['name'];
        $files = $_FILES['foto']['tmp_name'];

        $query = "INSERT INTO barang VALUES(NULL, '$nama', '$jenis', '$harga', '$stok', '$foto')";
        move_uploaded_file($files, "C:/xampp/htdocs/last/images/".$foto);

        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);
    }
    
    function hapusBarang($data){
        global $koneksi;
        
        $id = $data['id_barang'];
        
        $query = mysqli_query($koneksi, "DELETE FROM barang WHERE id_barang = '$id'");
        
        return mysqli_affected_rows($koneksi);
    }
    
    function editBarang($data){
        global $koneksi;

        $id = $data['id_barang'];
        $nama = $data['nama_barang'];
        $jenis = $data['jenis_barang'];
        $harga = $data['harga_satuan'];
        $stok = $data['stok_barang'];
        $foto = $_FILES['foto']['name'];
        $files = $_FILES['foto']['tmp_name'];

        if(empty($foto)){
            $query = mysqli_query($koneksi, "UPDATE barang SET nama_barang =  '$nama', jenis_barang =  '$jenis', harga_satuan =  '$harga', stok_barang =  '$stok' WHERE id_barang = '$id'");
        }else{
            $query = mysqli_query($koneksi, "UPDATE barang SET nama_barang =  '$nama', jenis_barang =  '$jenis', harga_satuan =  '$harga', stok_barang =  '$stok' foto = '$foto' WHERE id_barang = '$id'");
            move_uploaded_file($files, "C:/xampp/htdocs/last/images/".$foto);
        }

        return mysqli_affected_rows($koneksi);

    }
    ?>