<?php
if (is_array($dm)) {
    extract($dm);
}
?>
<form action="index.php?act=updatedm" method="post" class="container">
    <h1>Sửa danh mục (loại hàng)</h1>

    <div class="form-group">
        <label for="maLoai">Mã loại</label>
        <input type="text" class="form-control" name="maloai" id="maLoai" placeholder="Mã loại" disabled value="<?php if (isset($id) && ($id > 0)) echo $id; ?>">
    </div>
    <div class="form-group">
        <label for="tenLoai">Tên loại</label>
        <input type="text" class="form-control" name="tenloai" id="tenLoai" placeholder="Tên loại" value="<?php if (isset($id) && ($id > 0)) echo $ten_danh_muc; ?>">
    </div>
    <div class="form-group">
        <label for="STT">STT</label>
        <input type="number" class="form-control" name="stt_loai" id='STT' placeholder="Tên loại" value="<?php if (isset($id) && ($id > 0)) echo $stt; ?>">
    </div>
    <div class="button">
        <input type="hidden" name="id" value="<?php if (isset($id) && ($id > 0)) echo $id; ?>">
        <input type="submit" name="capnhatdanhmuc" class="btn btn-primary" value="Cập nhật">
        <input type="reset" class="btn btn-secondary" value="Nhập lại">
        <a href="index.php?act=danhsachdanhmuc"><input class="btn btn-secondary" value="Danh sách"></a>
    </div>

    <?php
    if (isset($thongbao) && ($thongbao != '')) {
        echo $thongbao;
    }
    ?>
</form>
<style>
    .button {
        width: 100% !important;
        display: flex;
        flex-flow: wrap row;
        justify-content: center;
    }

    .button>* {
        width: 30%;
        margin-right: 5px;
    }

    .button a input {
        width: 100%;
    }

    .custom-control,
    .custom-radio {
        width: 100% !important;
        margin-left: 20px;
    }
</style>