<form action="index.php?act=danhsachsanpham" method="post" class="w-50 m-auto">
    <input type="text" name="kywview" placeholder="Tên sản phẩm cần tìm" class="form-control mb-3 w-100">
    <select class="custom-select mb-3" name="iddm">
        <option value="">Loại hàng</option>
        <?php
        $p = new Catalog();
        $tendanhmuc = $p->getall_catalog();

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
        ?>
    </select>
    <input type="submit" value="Tìm kiếm" name="listokview" class="btn btn-outline-primary mb-3">
</form>
<?php
// if (isset($_GET['idcata']) && ($_GET['idcata'] > 0)) {
//     $idcata = $_GET['idcata'];
//     $arr = showAllProduct("", $idcata);
// }
// else {
//     $arr = showAllProduct('',0);
// }
echo '<table class="container table">
    <tr>
        <th>MÃ SẢN PHẨM</th>
        <th>LOẠI HÀNG</th>
        <th>TÊN SẢN PHẨM</th>
        <th>ĐƠN GIÁ</th>
        <th>GIẢM GIÁ</th>
        <th>SỐ LƯỢNG TỒN KHO</th>
        <th>MÔ TẢ</th>
        <th>HÌNH ẢNH</th>
        <th>NGÀY NHẬP</th>
        <th> <a href="index.php?act=addsp"><i class="fas fa-plus"></i></a> </th>
    </tr>';

// if (file_exists('allProduct.json')) {
//     $filename = 'allProduct.json';
//     $data = file_get_contents($filename);
//     // print_r($data);
//     $products = json_decode($data);
//     // print_r($users);


foreach ($arr as $row1) {
    extract($row1);
    $suasp = "index.php?act=suasp&id=" . $id;
    $xoasp = "index.php?act=deletesp&id=" . $id;
    echo '
        <tr>
            <td>' . $id . '</td>
            <td>' . $id_danh_muc . ' </td>
            <td>' . $ten_san_pham . '</td>
            <td>' . $don_gia . '</td>
            <td>' . $giam_gia . '</td>
            <td>' . $so_luong_ton_kho . '</td>
            <td>' . $mo_ta . '</td>
            <td> <img width="100" src="../uploads/hanghoa/' . $hinh_anh . '"></td>
            <td>' . $ngay_nhap . '</td>
            <td><a href="' . $suasp . '"><i class="fas fa-edit"></i></a> | <a href="' . $xoasp . '"><i class="fas fa-trash-alt"></i></a>
        </tr>
    ';
}


echo "</table>";
?>