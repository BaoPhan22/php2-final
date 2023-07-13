<?php
if (is_array($productchoosen)) {
    extract($productchoosen);
    $hinhanhold = $hinh_anh;
    if (isset($hinh_anh) && ($hinh_anh != '')) {
        $hinhanh = '<img src="../uploads/hanghoa/' . $hinh_anh . '" width="250">';
    } else {
        $hinhanh = '';
    }
}
// echo $id_danh_muc;
?>
<link rel="stylesheet" href="css/sanpham.css">

<form action="index.php?act=updatesp" method="post" enctype="multipart/form-data" class="container">
    <h1>Cập nhật sản phẩm (mặt hàng)</h1>
    <div class="form-group">
        <input type="text" class="form-control" name="mahh" id="maHangHoa" placeholder="Mã sản phẩm" disabled value="<?= $id ?>">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="tenhh" id="tenHangHoa" placeholder="Tên sản phẩm" value="<?= $ten_san_pham ?>">
    </div>
    <div class="form-group">
        <input type="number" class="form-control" name="giahh" id="giaHangHoa" placeholder="Đơn giá" min="0" value="<?= $don_gia ?>">
    </div>
    <select class="custom-select mb-3" name="iddm" value="<?= $id_danh_muc ?>">
        <option value="">Loại hàng</option>
        <?php
        // include "model/pdo.php";
        $p = new Catalog();
        $arr = $p->getall_catalog();

        foreach ($arr as $row) {
            if ($row['id']==$id_danh_muc) {
                echo '
                <option value="' . $row['id'] . '" selected>' . $row['ten_danh_muc'] . '</option>
        ';
            } else {
                echo '
                <option value="' . $row['id'] . '">' . $row['ten_danh_muc'] . '</option>
        ';
            }
        }
        ?>
    </select>
    <div class="form-group">
        <input type="number" class="form-control" placeholder="Số lượng tồn kho" min="0" name="sltk" value="<?= $so_luong_ton_kho ?>">
    </div>
    <div class="form-group">
        <input type="number" max="100" min="0" class="form-control" name="giamgiahh" id="giamGiaHangHoa" placeholder="Giảm giá (%)" value="<?= $giam_gia ?>">
    </div>
    <div class="form-group">
        <input type="file" class="form-control-file" name="hinhanhhh" id="hinhAnhHangHoa" value="<?= $hinh_anh ?>">
        <input type="hidden" name="hinhanhold" value="<?php echo $hinhanhold; ?>">
    </div>
    <div class="form-group">
        <textarea class="form-control" name="motahh" id="" cols="30" rows="3" placeholder="Mô tả" value="<?= $mo_ta ?>"></textarea>
    </div>
    <div class="form-group">
        <!-- <label for="ngayNhap">Ngày nhập</label> -->
        <input type="date" class="form-control" name="ngaynhap" id="ngayNhap" value="<?= $ngay_nhap ?>">
    </div>
    <div class="button">
        <input type="hidden" name="id" value="<?php if (isset($id) && ($id > 0)) echo $id; ?>">
        <input type="submit" name="capnhatsanpham" class="btn btn-primary" value="Cập nhật">
        <input type="reset" class="btn btn-secondary" value="Nhập lại">
        <a href="index.php?act=danhsachsanpham"><input class="btn btn-secondary" value="Danh sách"></a>
    </div>

    <?php
    if (isset($thongbao) && ($thongbao != '')) {
        echo $thongbao;
    }
    ?>
</form>