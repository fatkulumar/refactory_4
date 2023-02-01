<?php
session_start();
include 'connection.php';
    if(isset($_POST['register'])) {
        $username = $_POST["username"];
        $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

        $qryku = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username'");
        $jumlah_data =  mysqli_num_rows($qryku);
        if($jumlah_data == 0) {
            $qry = mysqli_query($koneksi, "INSERT INTO `users`(`username`, `password`) VALUES ('$username','$password')");
            header('Location: index.php');
        }elseif($jumlah_data > 0) {
            foreach($qryku as $item) {
                $user = $item['username'];
                if($user == $username) {
                    $_SESSION['pesan'] = 'Username Sudah ada';
                    header('Location: index.php');
                }else{
                    $qry = mysqli_query($koneksi, "INSERT INTO `users`(`username`, `password`) VALUES ('$username','$password')");
                    if($qry) {
                        $_SESSION['usename'] = $_POST['username'];
                        header('Location: index.html');
                    }else{
                        echo 'gagal';
                    }
                }
            }
        }
    }elseif(isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $qry = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username'");
        foreach($qry as $item) {
            $password_hash = $item['password'];
            if(password_verify($_POST['password'], $password_hash)) {
                echo "cocok";
            }else{
                echo "gagal";
            }
        }
    }