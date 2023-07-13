<link rel="stylesheet" href="css/profile.css">
<?php
if (!isset($_SESSION['user'])) {
    echo '<div id="profile">
            <h1>Bạn chưa đăng nhập</h1>
            <div class="icon-back">
            <i class="fa-sharp fa-solid fa-arrow-rotate-left"></i>
            </div>
            <div class="profile">
                <a href="index.php?act=dangnhap">Đăng nhập để tiếp tục</a>
            </div>
        </div>
    ';
} else {
    extract($_SESSION['user']);
?>

    <table class="table table-bordered" style='text-align:center;'>
        <tr>
            <th>HỌ TÊN</th>
            <th>TÀI KHOẢN</th>
            <th>EMAIL</th>
            <th>ĐỊA CHỈ</th>
            <th>ĐIỆN THOẠI</th>
            <th>HÌNH ẢNH</th>
            <th>GIỚI TÍNH</th>
            <th>NGÀY SINH</th>
            <th></th>
        </tr>
        <tr>
            <td><?= $ho_ten ?></td>
            <td><?= $tai_khoan ?></td>
            <td><?= $email ?></td>
            <td><?= $dia_chi ?></td>
            <td><?= $dien_thoai ?></td>
            <?php
            if ($hinh_anh != '') {
            ?>
                <td><img width="100px" src="../uploads/khachhang/<?= $hinh_anh ?>"></td>
            <?php } else { ?>
                <td><img width="100px" src="../uploads/khachhang/none.png"></td>
            <?php } ?>
            <td><?= $gioi_tinh ?></td>
            <td><?= $ngay_sinh ?></td>
            <td><a href="index.php?act=editprofile&iduser=<?= $id ?>"><i class="fas fa-edit"></i></a></td>
        </tr>
    </table>


<?php
    echo '<div class="button mb-3">
            <a class="btn btn-primary" href="index.php?act=changepassword&iduser=' . $id . '">Đổi mật khẩu</a>
            <a class="btn btn-secondary" href="index.php?act=logout">Đăng xuất</a>
            <a class="btn btn-secondary" href="index.php?act=mybill">Hóa đơn của tôi</a>
        </div>
    ';
    // if (!isset($_COOKIE['user'])) {
    //     echo "Cookie named is not set!";
    // } else {
    //     echo 'Cookie named is set';
    // }
} ?>