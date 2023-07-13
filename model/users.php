<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class users extends connect
{
   //Khởi tạo thuộc tính cho lớp users

   private $fullname = null;
   private $address = null;
   private $tel = null;
   private $email = null;
   private $user = null;
   private $pass = null;
   private $admin = null;


   //Khai báo phương thức lấy danh sách user
   function standardlizedName($myName)
   {
      $myName = strtolower($myName);
      $myName = ucwords($myName);
      $myName = trim($myName);
      $myName = preg_replace('/\s+/', ' ', $myName);
      return $myName;
   }
   function getUsers()
   {
      $sql = "SELECT * from khachhang order by id asc";
      $kq = parent::getall($sql);
      return $kq;
   }
   function logInAdmin($taikhoan, $matkhau)
   {
      $matkhaudamahoa = md5($matkhau);
      $sql = "SELECT * FROM khachhang WHERE tai_khoan = '" . $taikhoan . "' AND mat_khau = '" . $matkhaudamahoa . "' AND vai_tro = 1";
      $kq = parent::getone($sql);
      return $kq;
   }
   //Khai báo phương thức lấy thông tin tài khoản đăng nhập
   function checklogin($user, $pass)
   {
      $sql = "SELECT * from khachhang where tai_khoan='" . $user . "' and mat_khau='" . $pass . "'";
      $kq = parent::getone($sql);
      return $kq;
   }
   //Khai báo phương thức lấy thông tin tài khoản đăng nhập
   function getInfoById($id)
   {
      $sql = "select * from khachhang where id='" . $id . "'";
      $kq = parent::getone($sql);
      return $kq;
   }
   function upgradeuser($iduser, $role, $idadmin)
   {
      if ($idadmin == 1) {
         if ($role == 1) {
            $sql = "UPDATE khachhang SET vai_tro = 0 WHERE id=" . $iduser;
         } else {
            $sql = "UPDATE khachhang SET vai_tro = 1 WHERE id=" . $iduser;
         }

         parent::exec($sql);
      }
   }
   //Khai báo phương thức đăng ký tài khoản
   // function insertUser($ho_ten,$tai_khoan,$mat_khau,$email,$dia_chi,$dien_thoai=null,$hinh_anh=null,$gioi_tinh=null,$ngay_sinh=null,$vai_tro=null)
   //  { 
   //    $sql = "INSERT INTO khachhang(ho_ten,tai_khoan,mat_khau,email,dia_chi,dien_thoai,hinh_anh,gioi_tinh,ngay_sinh,vai_tro) VALUES ('$ho_ten','$tai_khoan','$mat_khau','$email','$dia_chi','$dien_thoai','$hinh_anh','$gioi_tinh','$ngay_sinh','$vai_tro')";
   //    // parent::exec($sql);
   //    echo $sql;
   //  }  
   function insertUser($ho_ten, $tai_khoan, $mat_khau, $email, $dia_chi)
   {
      $sql = "INSERT INTO khachhang(ho_ten,tai_khoan,mat_khau,email,dia_chi) VALUES ('$ho_ten','$tai_khoan','$mat_khau','$email','$dia_chi')";
      parent::exec($sql);
      // echo $sql;
   }

   //Khai báo phương thức chỉnh sửa tài khoản
   function updateUser($fullname, $address, $email, $tel, $user, $pass, $admin, $id)
   {
      $sql = "update khachhang set fullname='$fullname',address='$address',email='$email',tel='$tel',user='$user',pass='$pass',admin='$admin' where id='$id'";
      parent::exec($sql);
   }

   //Khai báo phương thức xoá tài khoản
   function deleteUser($id)
   {
      $sql = "delete from khachhang where id = '$id'";
      parent::exec($sql);
   }

   //    //Khai báo phương thức chỉnh sửa thông tin đăng nhập
   //   function updatePassword($tmpUsername,$tmpPassword)
   //    { 
   //    $db = new connect();
   //    $query = "update users set Password='$tmpPassword' where UserName='$tmpUsername'";
   //    $db->exec($query);
   //    }
   //    //Khai báo phương thức cập nhật avatar
   //  function Change_avatar($Username, $avatar)
   //  {
   //      $db=new connect();
   //      $query = "update users set avatar='$avatar' where UserName='$Username'";
   //      $db->exec($query);
   //  }
   //  //Khai báo phương thức thay đổi thông tin user
   //  function Change_info($tmpUsername,$tmpFullName,$tmpEmail,$tmpAddress,$tmpPhone)
   //    { 
   //    $db = new connect();
   //    $query = "update users set FullName='$tmpFullName',Email='$tmpEmail',Address='$tmpAddress',Phone='$tmpPhone' where UserName='$tmpUsername'";
   //    $db->exec($query);
   //    }
}
