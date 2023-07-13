<?php
class Product extends connect
{
    function getall_product()
    {
        $sql = "SELECT * from sanpham order by id desc";
        $kq = parent::getall($sql);
        return $kq;
    }
    function getall_product_cate($id, $kyw)
    {
        $sql = "SELECT * from sanpham where 1";
        if ($id > 0) {
            $sql .= " and id_danh_muc='" . $id . "'";
        }
        if ($kyw != "") {
            $sql .= " and ten_san_pham like '%" . $kyw . "%'";
        }
        $sql .= " order by id desc";
        $kq = parent::getall($sql);
        return $kq;
    }
    function getone_product($id)
    {
        $sql = "SELECT * from sanpham where 1";
        if ($id > 0) {
            $sql .= " and id='" . $id . "'";
        }
        $kq = parent::getone($sql);
        return $kq;
    }
    function gethome_product($type)
    {
        $sql = "SELECT * from sanpham where 1";
        // sp hot
        if ($type == 1) {
            $sql .= " and hot=1";
        }
        // sp km
        if ($type == 2) {
            $sql .= " and promo>0";
        }
        //sp moi
        $sql .= " order by id desc limit 3";
        $kq = parent::getall($sql);
        return $kq;
    }
    function addOneProduct($id_danh_muc, $ten_san_pham, $don_gia, $giam_gia, $so_luong_ton_kho, $mo_ta, $hinh_anh, $ngay_nhap)
    {
        $sql = 'INSERT INTO sanpham(id_danh_muc,ten_san_pham,don_gia,giam_gia,so_luong_ton_kho,mo_ta,hinh_anh,ngay_nhap) 
        VALUES (' . $id_danh_muc . ',"' . $ten_san_pham . '",' . $don_gia . ',' . $giam_gia . ',' . $so_luong_ton_kho . ',"' . $mo_ta . '","' . $hinh_anh . '","' . $ngay_nhap . '")';
        parent::exec($sql);
    }
    function deleteOneProduct($id)
    {
        $sql = "DELETE FROM sanpham WHERE id=" . $id;
        parent::exec($sql);
    }
}
