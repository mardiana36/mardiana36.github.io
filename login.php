<?php
session_start();
if (isset($_SESSION['email'])) {
    echo "<script>
                    alert ('Anda sudah login!!');
                    document.location.href = 'dashboard.php';
                </script>";
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
    <script src="script.js"></script>
</head>

<body>
    <div class="container-login">
        <div>
            <p class="text-login"> <b> Admin </b> Perpustakaan</p>
        </div>
        <div class="div-login">
            <p>Silahkan Masuk</p>
            <form action="prosesLogin.php" method="post">
                <input type="text" id="email-login" name="email-login" placeholder="Email">
                <input type="password" id="password-login" name="password-login" placeholder="Password">
                <input type="checkbox" onclick="showPassword('password-login')" name="showPw" id="showPw">
                <input type="submit" value="Masuk" name="masuk" id="masuk">
            </form>

        </div>
    </div>
</body>

</html>