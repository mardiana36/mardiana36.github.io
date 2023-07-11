<?php
require "koneksi.php";
session_start();
$inputEmail = $_POST['email-login'];
$inputPassword = $_POST['password-login'];
$sql = "SELECT * FROM loginadmin WHERE email = '$inputEmail'";
$queryUser = mysqli_query($connection,$sql);
$dataUser = mysqli_fetch_assoc($queryUser);

$verificationPassword = password_verify($inputPassword,$dataUser['password']);
if($dataUser['email']===$inputEmail && $verificationPassword == true){
    $_SESSION['email'] = $dataUser['email'];
    header("Location: dashboard.php");
} else{
    echo "<script>
                alert ('Email/password salah, silahkan coba lagi!');
                document.location.href = 'login.php';
                </script>";
}
?>