<?php
function toDisplayVND($m)
{
    return number_format($m, 0, '', '.');
}
function showstatus($i)
{
    switch ($i) {
        case '1':
            $txt = "Đơn hàng được chấp nhận";
            break;
        case '2':
            $txt = "Đơn hàng đang xử lý";
            break;
        case '3':
            $txt = "Đơn hàng chuyển đối tác thứ 3";
            break;
        case '4':
            $txt = "Đơn hàng đang được giao";
            break;
        case '5':
            $txt = "Đơn hàng đã xử lý";
            break;
        default:
            $txt = "Đơn hàng được chấp nhận";
            break;
    }
    return $txt;
}
function add_item($id, $quantity)
{
    $pros = new Product();
    $pro = $pros->getone_product($id);

    // Tạo đối tượng mảng lưu trữ thông tin sản phẩm cần thêm vào giỏ hàng
    $id = $pro['id'];
    $name = $pro['ten_san_pham'];
    $cost = $pro['don_gia'];
    $img = $pro['hinh_anh'];
    //Nếu sản phẩm đã có trong giỏ hàng, cập nhật số lượng
    if (isset($_SESSION['cart'][$id])) {
        $quantity++;
    }
    $total = $cost * $quantity;
    $item = array(
        'id' => $id,
        'name' => $name,
        'cost' => $cost,
        'img' => $img,
        'qty' => $quantity,
        'total' => $total
    );
    // Thêm sản phẩm vào giỏ hàng thông qua mảng biến Session $_SESSION['cart']
    $_SESSION['cart'][$id] = $item;
}
function update_item($key, $quantity)
{
    $quantity = (int) $quantity;
    if ($quantity <= 0) {
        unset($_SESSION['cart'][$key]);
    } else {
        $_SESSION['cart'][$key]['qty']++;
    }
}

// Lấy tổng doanh thu của giỏ hàng

function get_subtotal()
{
    $subtotal = 0;
    foreach ($_SESSION['cart'] as $item) {
        $subtotal += $item['total'];
    }

    $subtotal = number_format($subtotal, 2);
    return $subtotal;
}
// Tính tống số lượng sản phẩm đã order
function get_subtotalitem()
{
    $subtotalitem = 0;
    foreach ($_SESSION['cart'] as $item) {
        $subtotalitem += $item['qty'];
    }

    $subtotal = number_format($subtotalitem, 2);
    return $subtotalitem;
}
