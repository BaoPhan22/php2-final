<form action="index.php?act=adddm" method="post" class="container">
    <h1>Thêm danh mục (loại hàng)</h1>
<!-- 
    <div class="form-group">
        <label for="maLoai">Mã loại</label>
        <input type="text" class="form-control" name="maloai" id="maLoai" placeholder="Mã loại" disabled>
    </div> -->
    <div class="form-group">
        <label for="tenLoai">Tên loại</label>
        <input type="text" class="form-control" name="tenloai" id="tenLoai" placeholder="Tên loại">
    </div>
    <div class="form-group">
        <label for="STT">STT</label>
        <input type="number" class="form-control" name="stt_loai" id='STT' placeholder="Tên loại" value="0">
    </div>
    <div class="button">
        <input type="submit" name="themmoidanhmuc" class="btn btn-primary" value="Thêm mới">
        <input type="reset" class="btn btn-secondary" value="Nhập lại">
        <a href="index.php?act=danhsachdanhmuc"><input class="btn btn-secondary" value="Danh sách"></a>
    </div>

    <?php
    if (isset($thongbao) && ($thongbao != '')) {
        echo $thongbao;
    }
    ?>
</form>
