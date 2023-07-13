<div id="background">
    <h1 class="text-center">Chi tiết hóa đơn</h1>

    <table class="table">
        <tr>

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

                <td>' . $id_san_pham . '</td>
                <td>' . $so_luong . '</td>
                <td>' . toDisplayVND($don_gia) . '</td>
                <td>' . toDisplayVND($thanh_tien) . '</td>
                <td><img width="100" src="image/' . $img . '"></td>
                <td>' . $ten_san_pham . '</td>
            </tr>
        ';
        }
        ?>
    </table>
</div>
<style>
    #background {
        margin: 70px auto;
        width: 80%;
    }
</style>