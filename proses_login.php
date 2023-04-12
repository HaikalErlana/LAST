<?php 
    include 'koneksi.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $data = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");

    $cek = mysqli_num_rows($data);
    if($cek > 0){
        $cek_role = mysqli_fetch_assoc($data);
        if($cek_role['role'] == 1){
            $_SESSION['nama_user'] = $cek_role['nama_user'];
            $_SESSION['status'] = 'login';
            $_SESSION['role'] = 'Admin';
            header("Location: Admin/index.php?pesan=login");
        }else if($cek_role['role'] == 2){
            $_SESSION['nama_user'] = $cek_role['nama_user'];
            $_SESSION['status'] = 'login';
            $_SESSION['id_user'] = $cek_role['id_user'];
            $_SESSION['role'] = 'Customer';
            header("Location: User/index.php?pesan=login");
        }
    }else{
        ?>
        <script>
            alert('Username dan Password tidak ditemukan!!');
            window.location = 'index.php';
        </script>
        <?php
    }
?>