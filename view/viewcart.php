<?php
include '../model/connect.php';
include '../model/order.php';
$o = new Orders();
$bill = $o->loadOneBill(55);
echo var_dump($bill);
