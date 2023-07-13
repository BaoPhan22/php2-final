<table class="table">
    <tr>
        <th>HỌ TÊN</th>
        <th>TÀI KHOẢN</th>
        <th>EMAIL</th>
        <th>ĐỊA CHỈ</th>
        <th>ĐIỆN THOẠI</th>
        <th>HÌNH ẢNH</th>
        <th>GIỚI TÍNH</th>
        <th>NGÀY SINH</th>
        <th>Vai trò</th>
        <th></th>
    </tr>
    <?php
    foreach ($kh as $row) {
        extract($row);
        if ($hinh_anh != '') {
            echo '
            <tr>
                <td>' . $ho_ten . '</td>
                <td>' . $tai_khoan . '</td>
                <td>' . $email . '</td>
                <td>' . $dia_chi . '</td>
                <td>' . $dien_thoai . '</td>
                <td><img width="100px" src="../uploads/khachhang/' . $hinh_anh . '"></td>
                <td>' . $gioi_tinh . '</td>
                <td>' . $ngay_sinh . '</td>
                <td>' . $vai_tro . '</td>
                <td><a href="index.php?act=upgradeuser&iduser='.$id.'&role='.$vai_tro.'&idadmin='.$_SESSION['admin']['id'].'">Thay đổi vai trò</a></td>
            </tr>
        ';
        } else {
            echo '
            <tr>
                <td>' . $ho_ten . '</td>
                <td>' . $tai_khoan . '</td>
                <td>' . $email . '</td>
                <td>' . $dia_chi . '</td>
                <td>' . $dien_thoai . '</td>
                <td><img width="100px" src="../uploads/khachhang/none.png"></td>
                <td>' . $gioi_tinh . '</td>
                <td>' . $ngay_sinh . '</td>
                <td>' . $vai_tro . '</td>
                <td><a href="index.php?act=upgradeuser&iduser='.$id.'&role='.$vai_tro.'&idadmin='.$_SESSION['admin']['id'].'">Thay đổi vai trò</a></td>
            </tr>
        ';
        }
    }
    ?>
</table>