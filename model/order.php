<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Orders extends connect
{
    public function __construct()
    {
    }
    // public function execLastInsertID($query)
    // {
    //     $conn = new connect();
    //     $conn = $this->db->exec($query);
    //     $rs = $conn->lastInsertId();
    //     return $rs;
    // }
    public function insertBill($id_khach_hang, $dia_chi, $ho_ten, $dien_thoai, $email, $ngay_lap, $phuong_thuc_thanh_toan, $ghi_chu, $tong)
    {
        $cnn = new connect();
        $sql = "INSERT INTO hoadon(id_khach_hang,dia_chi,ho_ten,dien_thoai,email,ngay_lap,phuong_thuc_thanh_toan,ghi_chu,tong) VALUES ('$id_khach_hang','$dia_chi','$ho_ten','$dien_thoai','$email','$ngay_lap','$phuong_thuc_thanh_toan','$ghi_chu','$tong')";

        $cnn->exec($sql);
        $last_id = $cnn->db->lastInsertId();
        return $last_id;
    }

    public function insertCart($id_hoa_don, $id_san_pham, $so_luong, $don_gia, $thanh_tien, $img, $ten_san_pham)
    {
        $cnn = new connect();
        $sql = "INSERT INTO chitiethoadon(id_hoa_don,id_san_pham,so_luong,don_gia,thanh_tien,img,ten_san_pham) VALUES ('$id_hoa_don','$id_san_pham','$so_luong','$don_gia','$thanh_tien','$img','$ten_san_pham')";
        $cnn->exec($sql);
    }
    function loadOneBill($id)
    {
        $cnn = new connect();
        $sql = 'SELECT * FROM hoadon WHERE id=' . $id;
        $kq = $cnn->getone($sql);
        return $kq;
        // echo $sql;
    }
    // Tạo hóa đơn khi người dùng nhấn nút Thanh toán
    public function createOrder($userid)
    {
        //lấy ngày hệ thống & định dạng
        $date = new DateTime("now");
        $orderdate = $date->format("Y-m-d h:s");
        //tạo tạo 1 đơn hàng rỗng, để lấy idorder cập nhập cho giỏ hàng session
        $cnn = new connect();
        $sql = "INSERT INTO orders(ngaytao,iduser) values ('$orderdate','$userid')";
        //echo $sql;
        //parent::exec($sql);
        $cnn->exec($sql);


        //lấy idorder mới nhất
        $cnn = new connect();
        $sql = "SELECT id from orders order by id desc limit 1";
        $new_order = $cnn->getone($sql);
        //$new_order=parent::getone($sql);
        return $new_order['id'];
    }

    // Thêm danh sách chi tiết sản phẩm từng hóa đơn
    public function insertOrderDetail($idpro, $name, $image, $price, $soluong, $thanhtien, $idorder)
    {
        $cnn = new connect();
        $sql = "INSERT INTO cart (idpro,name,image,price,soluong,thanhtien,idorder) values('$idpro','$name','$image','$price','$soluong','$thanhtien','$idorder')";
        $cnn->exec($sql);
    }

    // Cập nhật tổng hóa đơn
    public function updateOrderTotal($idorder, $total)
    {
        $cnn = new connect();
        $sql = "UPDATE orders set total='$total' where id='" . $idorder . "'";
        $cnn->exec($sql);
    }

    public function updateOrderOk($idorder, $fullname, $address, $tel, $date, $email, $phuongthuctt, $note, $total)
    {
        $cnn = new connect();
        $sql = "UPDATE orders set status=1,name='$fullname',address='$address',tel='$tel',email='$email',phuongthuctt='$phuongthuctt' where id='" . $idorder . "'";
        $cnn->exec($sql);
    }

    // Lấy hóa đơn theo ID
    function getOrder($idorder)
    {
        $cnn = new connect();
        $sql = "select o.id as idorder, o.ngaytao as ngaytao, o.total as total,";
        $sql .= " c.id as iduser,c.fullname as fullname, c.address as address, c.email as email, c.tel as tel";
        $sql .= " from orders o inner join users c on o.iduser = c.id where o.id='" . $idorder . "'";
        $kq = $cnn->getone($sql);
        return $kq;
    }
    //cập nhật trạng thái đơn hàng
    public function update_status($idorder, $status)
    {
        $cnn = new connect();
        $sttDis = $status;
        if ($status >= 2) $sttDis=0;
        else $sttDis++;
        $sql = "UPDATE hoadon set trang_thai='$sttDis' where id='" . $idorder . "'";
        $cnn->exec($sql);
        // echo $sql;
    }
    // xóa đơn hàng
    public function delete_order($idorder)
    {
        $cnn = new connect();
        $sql = "DELETE from orders where id='" . $idorder . "'";
        $cnn->exec($sql);
    }
    // Lấy danh sách hóa đơn
    function getOrdersList_user($iduser)
    {

        $sql = "SELECT * from hoadon where id_khach_hang='" . $iduser . "' order by id desc";
        $cnn = new connect();
        $kq = $cnn->getall($sql);
        return $kq;
    }
    // Lấy danh sách hóa đơn
    function getOrdersList($id, $idcus, $email, $stt)
    {
        $sql = "SELECT * from hoadon where 1";
        if ($id != '') {
            $sql .= ' and id = ' . $id . '';
        }
        if ($idcus != '') {
            $sql .= ' and id_khach_hang = ' . $idcus . '';
        }
        if ($email != '') {
            $sql .= ' and email = ' . $email . '';
        }
        if ($stt >= 0 && $stt <= 2) {
            $sql .= ' and trang_thai = ' . $stt . '';
        }
        $sql .= ' order by trang_thai desc';
        $cnn = new connect();
        $kq = $cnn->getall($sql);
        return $kq;
        // echo $sql;
    }
    // Lấy chi tiết hóa đơn
    function getOrderDetail($idorder)
    {
        $cnn = new connect();
        $sql = "SELECT * from chitiethoadon where id_hoa_don='" . $idorder . "'";
        $kq = $cnn->getall($sql);
        return $kq;
    }
    function tongdonhang()
    {
        $tong = 0;
        foreach ($_SESSION['cart'] as $cart) {
            $ttien = $cart['qty'] * $cart['cost'];
            $tong += $ttien;
        }
        return $tong;
    }

    // function getListOrder_DESC()
    // {
    //      $db = new connect();
    //      $select = "select * from orderdetails ORDER BY OrderID DESC";
    //      $result = $db->getList($select);
    //      return $result;
    //  }


    //  function getListOrderUser($id)
    //      {
    //         $db = new connect();
    //         $select = "select * from orders where OrderID='$id'";
    //         $result = $db->getList($select);
    //         return $result ;
    //      }  
    // function Deleteorder($id)
    //      {
    //         $db = new connect();
    //         $query = "delete from orderdetails where OrderID = '$id'";
    //         $db->exec($query);
    //      }

}
