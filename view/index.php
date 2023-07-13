<?php
include "../model/connect.php";
include "../model/catalog.php";
include "../model/product.php";
include "../model/users.php";
include "../model/cart.php";
include "../model/order.php";
include "../model/slider.php";
include "../model/comment.php";

//lấy dữ liệu cho trang chủ

if (!isset($_SESSION['cartview']))
    $_SESSION['cartview'] = array();

$cata = new Catalog;
$danhmucmenu = $cata->getall_catalog();
$danhmuchome = $cata->gethome_catalog();
$pro = new Product;
$sp_moi = $pro->gethome_product(0);
$sp_hot = $pro->gethome_product(1);
$sp_promo = $pro->gethome_product(2);

include 'header.php';
if (isset($_GET['act']) && ($_GET['act'] != '')) {
    switch ($_GET['act']) {
        case 'about':
            include 'about.php';
            break;
        case 'contact':
            include 'contact.php';
            break;
        case 'dangky':
            
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $tendangnhap = $_POST['tendangnhap'];
                $matkhau = md5($_POST['matkhau']);
                $hoten = $_POST['hoten'];
                $email = $_POST['email'];
                $diachi = $_POST['diachi'];

                $u = new users();
                $newUser = $u->insertUser($hoten, $tendangnhap, $matkhau, $email, $diachi);
                header('location: index.php?act=');
            }

            include 'dangky.php';
            break;
        case 'dangnhap':
            if (isset($_POST['btn-login']) && ($_POST['btn-login'])) {
                $username = $_POST['tendangnhap'];
                $password = md5($_POST['matkhau']);
                $u = new users();
                $login = $u->checklogin($username, $password);
                if (is_array($login)) {
                    $_SESSION['user'] = $login;
                    // header('location: index.php');
                    header('location: index.php?act=');
                } else {
                    $thongbao = "Tài khoản không tồn tại!";
                }
            }
            include 'login.php';
            break;
        case 'profile':
            $u = new users();
            $kh = $u->getUsers();
            include 'profile.php';
            break;
            // case 'editprofile':
            //     if (isset($_GET['iduser']) && $_GET['iduser'] >= 0) {
            //         if (isset($_POST['capnhatthongtin']) && ($_POST['capnhatthongtin'])) {

            //             $u = new users();

            //             // $kh = $u->updateUser();
            //         }
            //     }
            //     include 'editprofile.php';
            //     break;
        case 'cart':
            include 'cart.php';
            break;
        case 'addtocart':
            if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
                $id = $_POST['id'];
                $sltk = $_POST['sltk'];
                if ($sltk == 0) $sltk = 1;
                if ($id > 0) {
                    add_item($id, $sltk);
                    // include "viewcart.php";
                    header('location: index.php?act=cart');
                }
            }
            break;
        case 'delcart':
            if (isset($_SESSION['cart'])) {
                if (isset($_GET['id'])) {
                    array_splice($_SESSION['cart'], $_GET['id'], 1);
                } else {
                    if (isset($_SESSION['cart'])) {
                        $_SESSION['cart'] = (array) null;
                    }
                    echo '<h1 style="text-align=center">Gi</h1>';
                    // header('location: index.php?act=product ');
                }
                // if (is_countable($_SESSION['cart']) > 0) header('location: index.php?act=cart ');
                // else  header('location: index.php?act=product ');
            }
            break;
        case 'billconfirm':
            if (isset($_POST['taodonhang']) && ($_POST['taodonhang'])) {
                $id_khach_hang = $_POST['idkhachhang'];
                $hoten = $_POST['hoten'];
                $dienthoai = $_POST['dienthoai'];
                $diachi = $_POST['diachi'];
                $ghichu = $_POST['ghichu'];
                $email = $_POST['email'];
                $pttt = $_POST['pttt'];
                $ngaydathang = date("Y-m-d");
                $o = new Orders();
                $tongdonhang = $o->tongdonhang();
                // echo $tongdonhang;  
                $idbill = $o->insertBill($id_khach_hang, $diachi, $hoten, $dienthoai, $email, $ngaydathang, $pttt, $ghichu, $tongdonhang);
                // echo $idbill;
                foreach ($_SESSION['cart'] as $cart) {
                    $o->insertCart($idbill, $cart['id'], $cart['qty'], $cart['cost'], $cart['qty'] * $cart['cost'], $cart['img'], $cart['name']);
                }

                $_SESSION['cart'] = [];
            }
            $bill = $o->loadOneBill($idbill);

            include 'billconfirm.php';


            break;
        case 'logout':
            session_destroy();
            header('location: index.php');
            break;
        case 'mybill':
            $o = new Orders();
            $mybill = $o->getOrdersList_user($_SESSION['user']['id']);
            include 'mybill.php';
            break;
        case 'billdetail':
            if (isset($_GET['idhd']) && ($_GET['idhd']) >= 0) {
                $o = new Orders();
                $mybilldetail = $o->getOrderDetail($_GET['idhd']);
            }
            include 'billdetail.php';
            break;


            // case 'updateprofile':
            //     updateProfile();
            //     header('location: index.php?act=profile');
            //     break;
            // case 'changepassword':
            //     if (isset($_GET['iduser']) && $_GET['iduser'] >= 0) {
            //         $sql = "SELECT * FROM khachhang WHERE id=" . $_GET['iduser'];
            //         $kh = pdo_query_one($sql);
            //     }
            //     include 'changepassword.php';
            //     break;
            // case 'updatepassword':
            //     if (isset($_POST['doimatkhau']) && ($_POST['doimatkhau'])) {
            //         $matkhaucu = md5($_POST['matkhaucu']);
            //         $matkhaumoi = md5($_POST['matkhaumoi']);
            //         $nhaplaimatkhaumoi = md5($_POST['matkhaucu']);
            //         $sql = 'UPDATE khachhang SET `mat_khau` = "' . $matkhaumoi . '" WHERE `mat_khau` = "' . $matkhaucu . '"';
            //         pdo_query($sql);
            //     }
            //     break;
        case 'product':
            $kywview = '';
            $iddm = '';
            if (isset($_POST['listokview']) && ($_POST['listokview'])) {
                $kywview = $_POST['kywview'];
                $iddm = $_POST['iddm'];
                $iddmdachon = $iddm;
            } else {
                $kywview = '';
                $iddm = 0;
            }
            $sp = new Product();
            $dssp = $sp->getall_product_cate($iddm, $kywview);
            // $myfile = fopen("allProduct.json", "w") or die("Unable to open file!");
            // fwrite($myfile, $dssp);
            // fclose($myfile);
            include 'product.php';
            break;
        case 'productdetail':
            if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
                $id = $_GET['idsp'];
            } else {
                $id = 0;
            }
            $sp = new Product();
            $thongtinsp = $sp->getone_product($id);
            $spcl = $sp->getall_product_cate($thongtinsp['id_danh_muc'], '');
            $myfile = fopen("allProductByCate.json", "w") or die("Unable to open file!");
            fwrite($myfile, $spcl);
            fclose($myfile);
            include "productdetail.php";
            break;
        default:
            $sd = new slider();
            $sliderInfo = $sd->getSlider();
            include 'body.php';
    }
} else {
    $sd = new slider();
    $sliderInfo = $sd->getSlider();
    include 'body.php';
}
include 'footer.php';