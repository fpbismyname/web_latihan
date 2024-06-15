<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Login - MyShop</title>
    <!-- LoginCode -->
    <?php
    //memanggil code2 pada file action.php
    include "config/action.php";
    $action = new Action();

    //memulai sesi data
    session_start();

    //cek setelah registrasi
    if (isset($_SESSION["regis"])){
        $regis = $_SESSION["regis"];
        if ($regis){
            $action->message("Akun berhasil terdaftar !");
            $action->removeSession("regis");
        }
    } else {
        $action->setSession("regis", false);
    }

    //untuk cek login 
    if (isset($_POST["login"])) {
        $action->login($_POST["username"], $_POST["password"]); //memanggil function login dari file action.php
    }

    ?>
</head>

<body>
    <div class="container-col">
        <div class="row1">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Login</h1>
                </div>
                <div class="card-header">
                    <p class="card-subtitle">Ayo login ke myshop</p>
                </div>
                <div class="card-content">
                    <form method="POST" class="content-input">
                        <input type="text" name="username" placeholder="Username" />
                        <input type="password" name="password" placeholder="Password" />
                        <input type="submit" name="login" value="Login" />
                    </form>
                </div>
                <div class="row2">
                    <p>Belum punya akun ? <a href="register.php">Daftar disini !</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>