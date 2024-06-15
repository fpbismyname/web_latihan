<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="style.css"/>
    <title>Login - MyShop</title>
    <!-- LoginCode -->
    <?php
    //memanggil code2 pada file action.php
    include "config/action.php";
    $action = new Action();

    //memulai data sesi
    session_start();
    
    //untuk cek login 
    if (isset($_POST["register"])) {
        $action->register($_POST["username"], $_POST["password"], $_POST["email"]);//memanggil function register dari file action.php
    }

    ?>
</head>

<body>
    <div class="container-col">
        <div class="row1">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Register</h1>
                </div>
                <div class="card-header">
                    <p class="card-subtitle">Ayo daftar ke myshop</p>
                </div>
                <div class="card-content">
                    <form method="POST" class="content-input">
                        <input type="text" name="username" placeholder="Username baru" />
                        <input type="email" name="email" placeholder="Email baru" />
                        <input type="password" name="password" placeholder="Password baru" />
                        <input type="submit" name="register" value="register"/>
                    </form>
                </div>
                <div class="row2">
                    <p>Sudah punya akun ? <a href="index.php">Login disini !</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>