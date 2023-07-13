<table class="table">
    <tr>
        <th>ID</th>
        <th>ID hóa đơn</th>
        <th>ID sản phẩm</th>
        <th>Số lượng</th>
        <th>Đơn giá</th>
        <th>Thành tiền</th>
        <th>Hình ảnh</th>
        <th>Tên sản phẩm</th>
    </tr>
    <?php
    foreach ($mybilldetail as $bdt) {
        extract($bdt);
        echo '
            <tr>
                <td>'.$id.'</td>
                <td>'.$id_hoa_don.'</td>
                <td>'.$id_san_pham.'</td>
                <td>'.$so_luong.'</td>
                <td>'.$don_gia.'</td>
                <td>'.$thanh_tien.'</td>
                <td><img width="100" src="../view/image/'.$img.'"></td>
                <td>'.$ten_san_pham.'</td>
            </tr>
        ';
    }
    ?>
</table>