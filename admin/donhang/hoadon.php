<form action="index.php?act=donhang" method="post" class="w-50 m-auto formsearch nondisplay">
    <div class="form-group">
        <input type="text" name='id' class="form-control" placeholder="Tìm hóa đơn theo ID">
    </div>
    <div class="form-group">
        <input type="text" name='idcus' class="form-control" placeholder="Tìm hóa đơn theo ID khách hàng">
    </div>
    <div class="form-group">
        <input type="text" name='email' class="form-control" placeholder="Tìm hóa đơn theo Email">
    </div>
    <select class="custom-select mb-3" name="stt">
        <option value="-1">Trạng thái đơn hàng</option>
        <option value="0">Đang xử lý</option>
        <option value="1">Đang giao hàng</option>
        <option value="2">Hoàn thành</option>
    </select>
    <input type="submit" name='submit' class="btn btn-secondary mb-3" value="Tìm"></input>
</form>
<button class="btn btn-primary buttondisplaysearch">Tìm hóa đơn</button>
<table class="table w-100">
    <tr>
        <th>ID</th>
        <th>ID Khách hàng</th>
        <th>Địa chỉ</th>
        <th>Họ tên</th>
        <th>Điện thoại</th>
        <th>Email</th>
        <th>Ngày lập</th>
        <th>PTTT</th>
        <th>Ghi chú</th>
        <th>Trạng thái</th>
        <th>Tổng</th>
        <th>Chi tiết</th>
        <th>Cập nhật trạng thái</th>
    </tr>
    <?php
    if (isset($mybill) && ($mybill != '')) {
        foreach ($mybill as $bill) {
            extract($bill);
            $trang_thai1 = $trang_thai;
            if ($trang_thai1 == 0) {
                $trang_thai1 = 'Đang xử lý';
                echo '
                <tr style="background: linear-gradient(to right, #ff6600 0%, #ff3300 100%)">
                    <td>' . $id . '</td>
                    <td>' . $id_khach_hang . '</td>
                    <td>' . $dia_chi . '</td>
                    <td>' . $ho_ten . '</td>
                    <td>' . $dien_thoai . '</td>
                    <td>' . $email . '</td>
                    <td>' . $ngay_lap . '</td>
                    <td>' . $phuong_thuc_thanh_toan . '</td>
                    <td>' . $ghi_chu . '</td>
                    <td>' . $trang_thai1 . '</td>
                    <td>' . $tong . '</td>
                    <td><a href="index.php?act=chitiethoadon&idhd=' . $id . '"><i class="fas fa-arrow-right"></i></a></td>
                    <td><a href="index.php?act=capnhattrangthai&idhd=' . $id . '&stt=' . $trang_thai . '"><i class="fas fa-arrow-up"></i></a></td>
                </tr>
                
                ';
            } elseif ($trang_thai1 == 1) {
                $trang_thai1 = 'Đang giao hàng';
                echo '
        <tr style="background:linear-gradient(to top left, #ffcc66 0%, #ffff99 100%)">
            <td>' . $id . '</td>
            <td>' . $id_khach_hang . '</td>
            <td>' . $dia_chi . '</td>
            <td>' . $ho_ten . '</td>
            <td>' . $dien_thoai . '</td>
            <td>' . $email . '</td>
            <td>' . $ngay_lap . '</td>
            <td>' . $phuong_thuc_thanh_toan . '</td>
            <td>' . $ghi_chu . '</td>
            <td>' . $trang_thai1 . '</td>
            <td>' . $tong . '</td>
            <td><a href="index.php?act=chitiethoadon&idhd=' . $id . '"><i class="fas fa-arrow-right"></i></a></td>
            <td><a href="index.php?act=capnhattrangthai&idhd=' . $id . '&stt=' . $trang_thai . '"><i class="fas fa-arrow-up"></i></a></td>
        </tr>
        
        ';
            } else {
                $trang_thai1 = 'Đã hoàn thành';
                echo '
        <tr style="background: linear-gradient(to right, #00cc00 0%, #99ff99 100%)">
            <td>' . $id . '</td>
            <td>' . $id_khach_hang . '</td>
            <td>' . $dia_chi . '</td>
            <td>' . $ho_ten . '</td>
            <td>' . $dien_thoai . '</td>
            <td>' . $email . '</td>
            <td>' . $ngay_lap . '</td>
            <td>' . $phuong_thuc_thanh_toan . '</td>
            <td>' . $ghi_chu . '</td>
            <td>' . $trang_thai1 . '</td>
            <td>' . $tong . '</td>
            <td><a href="index.php?act=chitiethoadon&idhd=' . $id . '"><i class="fas fa-arrow-right"></i></a></td>
            <td><a href="index.php?act=capnhattrangthai&idhd=' . $id . '&stt=' . $trang_thai . '"><i class="fas fa-arrow-up"></i></a></td>
        </tr>
        
        ';
            }
            if ($phuong_thuc_thanh_toan == 1) {
                $phuong_thuc_thanh_toan = 'COD';
            } elseif ($phuong_thuc_thanh_toan == 2) {
                $phuong_thuc_thanh_toan = 'ATM';
            }
        }
    }
    // else {
    //     // echo '
    //     // <tr>
    //     //     <td colspan="15">Không tìm thấy kết quả phù hợp</td>
    //     // </tr>
    //     // ';
    // }
    ?>
</table>