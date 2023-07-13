<?php
class slider extends connect {
    function __contruct(){
        
        
    }
    function getSlider(){
        $sql="select * from slider where status = 1";
        $kq=parent::getall($sql);
        return $kq;
    }
}
?>