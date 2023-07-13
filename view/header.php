<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script type="text/javascript" src="https://cunghocweb.com/data-out/js/jquery.js"></script>
    <script src="js/menu.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />

    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/body.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Mái Cà Phê</title>
</head>

<body>
    <!-- START HEADER -->
    <div class="row top">
        <div class="boxcenter">
            <div id="logo"><a href="index.php" class="logo"><img src="image/logo.png" alt="logo-maicafe"></a></div>
            <div id="menu">
                <li class="item"><a href="index.php">TRANG CHỦ</a></li>
                <li class="item"><a href="index.php?act=about">GIỚI THIỆU</a></li>
                <li class="item"><a href="index.php?act=product">SẢN PHẨM</a></li>
                <li class="item"><a href="index.php?act=dangnhap">ĐĂNG NHẬP</a></li>
                <li class="item"><a href="index.php?act=dangky">ĐĂNG KÝ</a></li>
            </div>
            <div id="action">
                <div class="item"><a href="index.php?act=profile"><i class="fa-solid fa-user"></i></a></div>
                <div class="item"><a href="index.php?act=cart"><i class="fa-solid fa-cart-shopping"></i></a></div>
                <!-- <div class="item"><a href=""><i class="fa-solid fa-magnifying-glass"></i></a></div> -->
            </div>
        </div>
    </div>
    <!-- END HEADER -->