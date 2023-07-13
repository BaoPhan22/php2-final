<link rel="stylesheet" href="css/thongbao.css" />
<link rel="stylesheet" href="css/cart.css" />

<?php
if (!isset($_SESSION['user'])) {
  echo
  '<form id="thongbao-login" action="index.php">
    <h1>Bạn chưa đăng nhập</h1>
    <h2>Vui lòng đăng nhập để thêm hàng vào giỏ</h2>
    <div class="back-index">
        <input type="submit" value="Quay về trang chủ">
    </div>
    <div id="dangxuat">
        <a href="index.php?act=dangnhap">Đăng nhập</a>
    </div>
  </form>';
} else {
  if (isset($_SESSION['cart'])) {
?>

    <div class="container">
      <form name="form1" action="index.php?act=billconfirm" method="post" id="form1">
        <h1 style="text-align: center">ĐẶT HÀNG</h1>

        <p class="border-bottom">
          <label for="">HỌ TÊN</label><br /><br>
          <input required minlength="2" maxlength="225" name="hoten" type="text" id="hoten" class="txt" value="<?= $_SESSION['user']['ho_ten'] ?>" />
        </p>
        <p class="border-bottom">
          <label for="">ĐỊA CHỈ</label><br /><br>
          <input required minlength="2" maxlength="225" name="diachi" type="text" id="diachi" class="txt" value="<?= $_SESSION['user']['dia_chi'] ?>" />
        </p>
        <p class="border-bottom">
          <label for="">SỐ ĐIỆN THOẠI</label><br /><br>
          <input required minlength="2" maxlength="11" name="dienthoai" type="text" id="phone" class="txt" value="<?= $_SESSION['user']['dien_thoai'] ?>" />
        </p>
        <p class="border-bottom">
          <label for="">EMAIL</label><br /><br>
          <input required minlength="2" maxlength="11" name="email" type="email" id="email" class="txt" value="<?= $_SESSION['user']['email'] ?>" />
        </p>
        <p class="border-bottom">
          <label for="">GHI CHÚ</label><br /><br>
          <input type="text" name="ghichu" id="ghichu" class="txt" />
        </p>
        <h5>PHƯƠNG THỨC THANH TOÁN</h5>
        <fieldset id="fs1">
          <input type="radio" name="pttt" value="1" checked /><label for="">COD (Thanh toán khi nhận hàng)</label><br />
          <input type="radio" name="pttt" value="2" /><label for="">ATM</label><br /><br>
        </fieldset>
        <input type="hidden" name="idkhachhang" value="<?= $_SESSION['user']['id'] ?>">
        <input type="submit" value="Tạo đơn hàng" class="button" name="taodonhang">
      </form>
      <div>
        <form name="form1" action="" id="form1">
          <?php
          $tong = 0;

          if (isset($_SESSION['cart']) && ($_SESSION['cart'] !== null)) {
            foreach ($_SESSION['cart'] as $sp) {
              extract($sp);
              $tong += $total;
              echo '<div class="sanpham border-bottom">
              <div class="itemsp">
                <input type="hidden" name="id" value="' . $id . '">
                  <img class="spgiohang" src="../uploads/hanghoa/' . $img . '" alt="" />
                <div>
                  <h5>' . $cost . ' x ' . $qty . '  </h5>
                  <p>250g</p>
                  <p class="giasp">' . $total . ' VNĐ</p>
                  <div class="delcart"><a href="index.php?act=delcart?id=' . $id . '"><i class="fa-solid fa-square-xmark"></i></a></div>
                </div>
              </div>
            </div>';
            }
            // echo '<pre>';
            // print_r($_SESSION['cart']);
            // echo '</pre>';
            echo $tong;
          }
          ?>
          <div class="tdh">
            <h4>Tổng đơn hàng:</h4>
            <h3><?php $tong ?> VNĐ</h3>
          </div>
          <div class="ttdh">
            <div class="del-allcart"><a href="index.php?act=delcart">Xoá giỏ hàng</a></div>
            <div class="continue-cart"><a href="index.php?act=product">Tiếp tục đặt hàng</a></div>
          </div>
        </form>
      </div>
    </div>

<?php
  } else if ($_SESSION['cart'] === null) {
    echo 'Giỏ hàng rỗng';
  }
}
?>