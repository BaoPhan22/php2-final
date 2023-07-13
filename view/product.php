<link rel="stylesheet" href="css/product.css">

<div id="wp-products-new">
    <form action="index.php?act=product" method="post" class="w-50 m-auto">
        <input type="text" name="kywview" placeholder="Tên sản phẩm cần tìm" class="form-control mb-3 w-100">
        <select class="custom-select mb-3" name="iddm">
            <option value="">Loại hàng</option>
            <?php

use function PHPSTORM_META\type;

            $dm = new Catalog();
            $tendanhmuc = $dm->getall_catalog();

            foreach ($tendanhmuc as $row) {
                if ($row['id'] == $iddmdachon) {
                    echo '
                <option selected value="' . $row['id'] . '">' . $row['ten_danh_muc'] . '</option>
        ';
                } else {
                    echo '
                <option value="' . $row['id'] . '">' . $row['ten_danh_muc'] . '</option>
        ';
                }
            }
            echo var_dump($tendanhmuc);
            ?>
        </select>
        <input id="timkiem" type="submit" value="Tìm kiếm" name="listokview" class="btn btn-outline-primary mb-3">
    </form>
    <h3>TẤT CẢ SẢN PHẨM</h3>
    <ul id="list-products-new">
        <?php
        // if (file_exists('allProduct.json')) {
        //     $filename = 'allProduct.json';
        //     $data = file_get_contents($filename);
        //     // print_r($data);
        // print_r($dssp);
     
        // print_r($dssp);
        
        // echo gettype($dssp);
        
        // print_r($users);
        foreach ($dssp as $row) {
            extract($row);
            echo '<form action="index.php?act=addtocart" method="post">
            <div class="item">
            <div class="form-group">
                <input type="hidden" type="number" class="form-control" placeholder="Số lượng" min="0" name="sltk" value="1">
            </div>
            <input type="hidden" name="hinh_anh" value="' . $hinh_anh . '">
            <input type="hidden" name="ten_san_pham" value="' . $ten_san_pham . '">
            <input type="hidden" name="don_gia" value="' . $don_gia . ' ">
            <input type="hidden" name="id" value=" ' . $id . '" >
                <a href="index.php?act=productdetail&idsp=' . $id . '"><img src="../uploads/hanghoa/' . $hinh_anh . '" alt="" width="100%" height="300"></a>
                <div class="infor">
                    <div class="infor-column">
                    <p class="hang" name="hang">Còn hàng</p>
                        <p class="giasp">Giá: ' . $don_gia . ' VNĐ</p>
                        <p class="tensanpham">' . $ten_san_pham . '</p>
                    </div>
                </div>
                <input type="submit" name="addtocart" class="name btn btn-primary" href="index.php?act=productdetail&idsp=' . $id . '" value="Đặt hàng">
            </div>
            </form>
            ';
        }
        // }
        ?>


</div>

<script src="script.js"></script>