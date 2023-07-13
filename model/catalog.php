<?php
class Catalog extends connect{
    
    function __contruct(){
        
        
    }
    function getall_catalog(){
        $sql="select * from danhmuc order by stt desc";
        $kq=parent::getall($sql);
        return $kq;
    }
    function gethome_catalog(){
        $sql="select * from danhmuc where stt>0 order by stt desc";
        $kq=parent::getall($sql);
        return $kq;
    }
    function getone_catalog($id){
        $sql="select * from danhmuc where id='".$id."'";
        $kq=parent::getone($sql);
        return $kq;
    }

    function getlast(){
        $sql="select id from danhmuc order by id desc";
        $kq=parent::getone($sql);
        return $kq;
    }
    
    function addcata($name,$stt)
    {
        $sql = 'INSERT INTO danhmuc(ten_danh_muc,stt) VALUES ("' . $name . '",' . $stt . ')';
        parent::exec($sql);
    }
    //Update sản phẩm
    function editcata($name,$image,$price,$stt,$id)
    {
        $query = "UPDATE sanpham set ten_san_pham='$name',hinh_anh='$image',don_gia='$price',stt='$stt' where id='$id'";
        parent::exec($query);
    }
    //Xoá sản phẩm
    function deletecata($id)
    {
        $sql = "DELETE FROM danhmuc WHERE id=" . $id;
        parent::exec($sql);
    }

}
?>