<?php
if (is_array($kh)) {
    extract($kh);
    $hinhanhold = $hinh_anh;
    if (isset($hinh_anh) && ($hinh_anh != '')) {
        $hinhanh = '<img src="../uploads/khachhang/' . $hinh_anh . '" width="250">';
    } else {
        $hinhanh = '';
    }
}
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<form action="index.php?act=updateprofile" method="post" enctype="multipart/form-data" class="w-50 m-auto">
    <div class="form-group">
        <input type="text" class="form-control" name="hoten" value="<?= $ho_ten ?>">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="taikhoan" value="<?= $tai_khoan ?>">
    </div>
    <div class="form-group">
        <input type="email" class="form-control" name="email" value="<?= $email ?>">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="diachi" value="<?= $dia_chi ?>">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="dienthoai" value="<?= $dien_thoai ?>">
    </div>
    <div class="form-group">
        <input type="file" class="form-control" name="hinhanh" value="<?= $hinh_anh ?>">
        <input type="hidden" name="hinhanhold" value="<?php echo $hinhanhold; ?>">
    </div>
    <?php
    if ($gioi_tinh == '') {
    ?>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gioitinh" id="exampleRadios1" value="Nam">
                <label class="form-check-label" for="exampleRadios1">
                    Nam
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gioitinh" id="exampleRadios2" value="Nữ">
                <label class="form-check-label" for="exampleRadios2">
                    Nữ
                </label>
            </div>
        </div>
    <?php
    } elseif ($gioi_tinh == 'Nam') {
    ?>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gioitinh" id="exampleRadios1" value="Nam" checked>
                <label class="form-check-label" for="exampleRadios1">
                    Nam
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gioitinh" id="exampleRadios2" value="Nữ">
                <label class="form-check-label" for="exampleRadios2">
                    Nữ
                </label>
            </div>
        </div>
    <?php
    } else {
    ?>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gioitinh" id="exampleRadios1" value="Nam">
                <label class="form-check-label" for="exampleRadios1">
                    Nam
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gioitinh" id="exampleRadios2" value="Nữ" checked>
                <label class="form-check-label" for="exampleRadios2">
                    Nữ
                </label>
            </div>
        </div>
    <?php
    }
    ?>
    <div class="form-group">
        <input type="date" class="form-control" name="ngaysinh" value="<?= $ngay_sinh ?>">
    </div>
    <div class="button">
        <input type="hidden" name="id" value="<?php if (isset($id) && ($id > 0)) echo $id; ?>">
        <input type="submit" name="capnhatthongtin" class="btn btn-primary" value="Cập nhật">
    </div>
</form>