<?php
class comment extends connect{
    function getAllComment(){
        $sql = 'SELECT * FROM binhluan';
        return parent::getall($sql);
    }
}
?>