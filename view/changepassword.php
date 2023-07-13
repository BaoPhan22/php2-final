<link rel="stylesheet" href="css/changepassword.css">
<?php
if (is_array($kh)) {
    extract($kh);
}
?>
<form action="index.php?act=updatepassword" method="post">
    <h2>Đổi mật khẩu</h2>
    <div class="form-group">
        <input type="password" class="form-control" name="matkhaucu" placeholder="Mật khẩu cũ">
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="matkhaumoi" placeholder="Mật khẩu mới">
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="nhaplaimatkhaumoi" placeholder="Nhập lại mật khẩu mới">
    </div>
    <div class="button">
        <input type="hidden" name="id" value="<?php if (isset($id) && ($id > 0)) echo $id; ?>">
        <input type="submit" name="doimatkhau" class="btn btn-primary" value="Đổi mật khẩu">
    </div>
</form>