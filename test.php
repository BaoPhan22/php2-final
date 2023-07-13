<?php
class Motorcycle
{
    public $name;
    public $type;
}

$bike1 = new Motorcycle();
$bike1->name = 'Husqvarna';
$bike1->type = 'dirt';
$bike2 = new Motorcycle();
$bike2->name = 'Goldwing';
$bike2->type = 'touring';
$bikes = array($bike1, $bike2);
?>
<pre><?php print_r($bikes);?> </pre>