<link rel="stylesheet" href="css/thongbao.css">
<link rel="stylesheet" href="css/dangnhap.css">
<?php
if (isset($_SESSION['user'])) {
    echo '
        <form id="thongbao-login" action="index.php">
            <h1>Bạn đã đăng nhập</h1>
            <div class="back-index">
                <input type="submit" value="Quay về trang chủ">
            </div>
            <div id="dangxuat">
                <a href="index.php?act=logout">Đăng xuất</a>
            </div>
        </form>
    ';
} else {

?>
    <form name="form1" method="post" action="index.php?act=dangnhap" id="form1">

        <h1 style="text-align: center;">ĐĂNG NHẬP</h1>

        <p>
            <label for="">TÀI KHOẢN :</label>
            <input required minlength="2" maxlength="30" name="tendangnhap" type="text" class="txt">

        </p>
        <p>
            <label for="">MẬT KHẨU :</label>
            <input required minlength="2" maxlength="30" name="matkhau" type="password" class="txt">
        </p>


        </div>
        <!-- <button class="button" ng-model="button" type="submit" name="btn-login">ĐĂNG NHẬP</button> -->
        <input type="submit" value="Đăng nhập" name="btn-login" class="button">

        <br>
        <div class="quen">
            <br>
            <a href="index.php?act=dangky">Tạo tài khoản mới ? </a>
        </div>

        <?php if (isset($thongbao) && ($thongbao != '')) echo $thongbao; ?>
    </form>
<?php
}
?>