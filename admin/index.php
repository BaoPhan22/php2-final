<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<?php
session_start();
include "../model/connect.php";
include "../model/catalog.php";
include "../model/product.php";
include "../model/users.php";
include "../model/cart.php";
include "../model/order.php";
include "../model/comment.php";
include "../model/slider.php";
if (isset($_POST['dangnhapadmin']) && $_POST['dangnhapadmin']) {
    $username = $_POST['tendangnhapadmin'];
    $password = $_POST['matkhauadmin'];
    $u = new users();
    $checkadmin = $u->logInAdmin($username, $password);
    if (is_array($checkadmin)) {
        $_SESSION['admin'] = $checkadmin;
        header('location: index.php');
    } else {
        $thongbao = "Sai thông tin đăng nhập";
    }
}
?>
<?php
if (!isset($_SESSION['admin'])) {
?>
    <form action="" method="post" class="container w-50">
        <h1>Đăng nhập admin</h1>

        <div class="form-group">
            <label for="maLoai">Tên đăng nhập</label>
            <input type="text" class="form-control" name="tendangnhapadmin" placeholder="Tên đăng nhập">
        </div>
        <div class="form-group">
            <label for="tenLoai">Mật khẩu</label>
            <input type="password" class="form-control" name="matkhauadmin" placeholder="Mật khẩu">
        </div>
        <div class="button">
            <input type="submit" name="dangnhapadmin" class="btn btn-primary" value="Đăng nhập">
        </div>
        <?php
        if (isset($thongbao) && ($thongbao != '')) {
            echo $thongbao;
        }
        ?>
    </form>
<?php } else { ?>
<?php
    include 'header.php';
    if (isset($_GET['act']) && ($_GET['act'] != '')) {
        switch ($_GET['act']) {

                // start controller of cata
            case 'adddm':
                if (isset($_POST['themmoidanhmuc']) && ($_POST['themmoidanhmuc'])) {
                    $ten = $_POST['tenloai'];
                    $stt = $_POST['stt_loai'];
                    $c = new Catalog();
                    $c->addcata($ten, $stt);
                }
                include 'danhmuc/add.php';
                break;
            case 'danhsachdanhmuc':
                include 'danhmuc/list.php';
                break;
            case 'deletedm':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $c = new Catalog();
                    $c->deletecata($_GET['id']);
                    $c->getall_catalog();
                }
                include 'danhmuc/list.php';
                break;
            case 'suadm':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $c = new Catalog();
                    $dm = $c->getone_catalog($_GET['id']);
                }
                include 'danhmuc/update.php';
                break;
            case 'updatedm':
                if (isset($_POST['capnhatdanhmuc']) && $_POST['capnhatdanhmuc']) {
                    $tenloai = $_POST['tenloai'];
                    $id = $_POST['id'];
                    $stt = $_POST['stt_loai'];
                    $c = new connect();
                    $sql = "UPDATE danhmuc SET ten_danh_muc = '$tenloai' WHERE id=" . $id;
                    // echo $sql;
                    $sql1 = "UPDATE danhmuc SET stt = '$stt' WHERE id=" . $id;
                    // echo $sql1;
                    $c->exec($sql);
                    $c->exec($sql1);
                }
                header('location: index.php?act=danhsachdanhmuc');
                break;
                //     // end controller of cata

                //     // start controller product
            case 'addsp':
                if (isset($_POST['themmoisanpham']) && ($_POST['themmoisanpham'])) {
                    $tenhh = $_POST['tenhh'];
                    $giahh = $_POST['giahh'];
                    $theloai = $_POST['theloai'];
                    $giamgiahh = 0;
                    if (isset($_POST['giamgiahh']) && ($_POST['giamgiahh'] > 0))
                        $giamgiahh = $_POST['giamgiahh'];
                    $sltk = $_POST['sltk'];
                    $hinhanhhh = basename($_FILES['hinhanhhh']['name']);
                    $target_dir = "../uploads/hanghoa/";
                    $target_file = $target_dir . $hinhanhhh;
                    move_uploaded_file($_FILES['hinhanhhh']['tmp_name'], $target_file);
                    $motahh = $_POST['motahh'];
                    $ngaynhap = $_POST['ngaynhap'];

                    $p = new Product();
                    $p->addOneProduct($theloai, $tenhh, $giahh, $giamgiahh, $sltk, $motahh, $hinhanhhh, $ngaynhap);
                }
                include 'sanpham/add.php';
                break;
            case 'danhsachsanpham':
                $kywview = '';
                $iddm = 0;
                if (isset($_POST['listokview']) && ($_POST['listokview'])) {
                    $kywview = $_POST['kywview'];
                    $iddm = $_POST['iddm'];
                    $iddmdachon = $iddm;
                } else {
                    $kywview = '';
                    $iddm = 0;
                }
                $p = new Product();
                $arr = $p->getall_product_cate($iddm, $kywview);
                // $myfile = fopen("allProduct.json", "w") or die("Unable to open file!");
                // fwrite($myfile, $arr);
                // fclose($myfile);
                include 'sanpham/list.php';
                break;
            case 'deletesp':
                if ((isset($_GET['id'])) && ($_GET['id'] > 0)) {
                    $target_dir = "../uploads/hanghoa/";
                    $sqlchonhinhanhtudb = 'SELECT hinh_anh FROM sanpham WHERE id=' . $_GET['id'];
                    $c = new connect();
                    $tenhinhanh = $c->getone($sqlchonhinhanhtudb)[0];
                    $duongdanhinhanhbixoa = $target_dir . $tenhinhanh;
                    if (is_file($duongdanhinhanhbixoa)) {
                        unlink($duongdanhinhanhbixoa);
                    }
                    $p = new Product();
                    $p->deleteOneProduct($_GET['id']);
                    $arr = $p->getall_product();
                }
                include 'sanpham/list.php';
                break;
            case 'suasp':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $p = new Product();
                    $productchoosen = $p->getone_product($_GET['id']);
                }
                include 'sanpham/update.php';
                break;
            case 'updatesp':
                if (isset($_POST['capnhatsanpham']) && $_POST['capnhatsanpham']) {
                    $tenhh = $_POST['tenhh'];
                    $giahh = $_POST['giahh'];
                    $giamgiahh = $_POST['giamgiahh'];
                    $sltk = $_POST['sltk'];
                    //img
                    $hinhanhhh = basename($_FILES['hinhanhhh']['name']);
                    $target_dir = "../uploads/hanghoa/";
                    $target_file = $target_dir . $hinhanhhh;
                    move_uploaded_file($_FILES['hinhanhhh']['tmp_name'], $target_file);
                    //img
                    $id_danh_muc = $_POST['iddm'];
                    $motahh = $_POST['motahh'];
                    $ngaynhap = $_POST['ngaynhap'];
                    $id = $_POST['id'];
                    if (isset($hinhanhhh) && ($hinhanhhh != '')) {
                        $duongdanhinhanhcu = $target_dir . $_POST['hinhanhold'];
                        if (is_file($duongdanhinhanhcu)) {
                            unlink($duongdanhinhanhcu);
                        }
                        $sql = "UPDATE sanpham SET ten_san_pham='$tenhh',don_gia='$giahh',giam_gia='$giamgiahh'
                            ,hinh_anh='$hinhanhhh',id_danh_muc='$id_danh_muc',so_luong_ton_kho='$sltk',mo_ta='$motahh',ngay_nhap='$ngaynhap' 
                            WHERE id=" . $id;
                    } else {
                        $sql = "UPDATE sanpham SET ten_san_pham='$tenhh',don_gia='$giahh',giam_gia='$giamgiahh'
                            ,id_danh_muc='$id_danh_muc',so_luong_ton_kho='$sltk',mo_ta='$motahh',ngay_nhap='$ngaynhap' 
                            WHERE id=" . $id;
                    }
                    $p = new connect();
                    $productchoosen = $p->exec($sql);
                }
                header('location: index.php?act=danhsachsanpham');
                break;
            case 'logout':
                session_destroy();
                header('location: index.php');
                break;
            case 'qlbinhluan':
                echo '<h1>Quản lí bình luận</h1>';
                break;
            case 'qlkhachhang':
                $u = new users();
                $kh = $u->getUsers();
                include 'khachhang/list.php';
                break;
                // case 'thongke':
                //     $listthongke = loadAllAnalys();
                //     include 'thongke/thongke.php';
                //     break;
                // case 'chart':
                //     $listbieudo = loadAllAnalys();
                //     include 'thongke/bieudo.php';
                //     break;
            case 'donhang':
                $id = '';
                $idcus = '';
                $email = '';
                $stt = '';
                if (isset($_POST['submit']) && ($_POST['submit'])) {
                    $id = $_POST['id'];
                    $idcus = $_POST['idcus'];
                    $email = $_POST['email'];
                    $stt = $_POST['stt'];
                }
                $b = new Orders();
                $mybill = $b->getOrdersList($id, $idcus, $email, $stt);
                include 'donhang/hoadon.php';
                break;
            case 'capnhattrangthai':
                if (isset($_GET['idhd']) && ($_GET['idhd'] > 0)) {
                    $o = new Orders();
                    $stt = $o->update_status($_GET['idhd'], $_GET['stt']);
                }
                header('location: index.php?act=donhang');
                break;
            case 'chitiethoadon':
                if (isset($_GET['idhd']) && ($_GET['idhd']) >= 0) {
                    $b = new Orders();
                    $mybilldetail = $b->getOrderDetail($_GET['idhd']);
                }
                include 'donhang/chitiethoadon.php';
                break;
            case 'upgradeuser':
                if (isset($_GET['iduser']) && ($_GET['iduser'] >= 0)) {
                    if (isset($_GET['role']) && ($_GET['role'] >= 0)) {
                        if (isset($_SESSION['admin']['id']) && ($_SESSION['admin']['id'] == 1)) {
                            $u = new users();
                            $u->upgradeuser($_GET['iduser'], $_GET['role'], $_SESSION['admin']['id']);
                        }
                    }
                }
                header('location: index.php?act=qlkhachhang');
                break;
            default:
                include 'body.php';
                break;
        }
    } else {
        include 'body.php';
    }
    include 'footer.php';
}
?>