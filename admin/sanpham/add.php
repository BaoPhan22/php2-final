<link rel="stylesheet" href="css/sanpham.css">

<form action="index.php?act=addsp" method="post" enctype="multipart/form-data" class="container">
    <h1>Thêm sản phẩm (loại hàng)</h1>
    <!-- <div class="form-group">
        <input type="text" class="form-control" name="mahh" id="maHangHoa" placeholder="Mã sản phẩm" disabled>
    </div> -->
    <div class="form-group">
        <input type="text" class="form-control" name="tenhh" id="tenHangHoa" placeholder="Tên sản phẩm">
    </div>
    <div class="form-group">
        <input type="number" class="form-control" name="giahh" id="giaHangHoa" placeholder="Đơn giá" min="0">
    </div>
    <select class="custom-select mb-3" name="theloai">
        <option value="">Loại hàng</option>
        <?php
        $c = new Catalog();
        $arr = $c->getall_catalog();

        foreach ($arr as $row) {
            echo '
                <option value="' . $row['id'] . '">' . $row['ten_danh_muc'] . '</option>
        ';
        }
        ?>
    </select>
    <div class="form-group">
        <input type="number" class="form-control" placeholder="Số lượng tồn kho" min="0" name="sltk">
    </div>
    <div class="form-group">
        <input type="number" max="100" min="0" class="form-control" name="giamgiahh" id="giamGiaHangHoa" placeholder="Giảm giá (%)">
    </div>
    <div class="form-group">
        <input type="file" class="form-control-file" name="hinhanhhh" id="hinhAnhHangHoa">
    </div>
    <div class="form-group">
        <textarea class="form-control" name="motahh" id="" cols="30" rows="3" placeholder="Mô tả"></textarea>
    </div>
    <div class="form-group">
        <!-- <label for="ngayNhap">Ngày nhập</label> -->
        <input type="date" class="form-control" name="ngaynhap" id="ngayNhap" value="<?php $today = date("Y-m-d");
                                                                                        echo $today; ?>">
    </div>
    <div class="button">
        <input type="submit" name="themmoisanpham" class="btn btn-primary" value="Thêm mới">
        <input type="reset" class="btn btn-secondary" value="Nhập lại">
        <a href="index.php?act=danhsachsanpham"><input class="btn btn-secondary" value="Danh sách"></a>
    </div>

    <?php
    if (isset($thongbao) && ($thongbao != '')) {
        echo $thongbao;
    }
    ?>
</form>

<!-- $mydate=getdate(date("U"));
echo "$mydate[mday]/$mydate[mon]/$mydate[year]"; -->