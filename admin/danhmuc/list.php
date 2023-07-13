<?php
echo '<table class="container table">
    <tr>
        <th>MÃ LOẠI</th>
        <th>TÊN LOẠI</th>
        <th>STT</th>
        <th> <a href="index.php?act=adddm"><i class="fas fa-plus"></i></a> </th>
    </tr>';
    
$c = new Catalog();
$arr = $c->getall_catalog();

// echo '<pre>';
// print_r($arr);
// echo '</pre>';

$object = (object) $arr;
$object = new stdClass();
foreach ($arr as $key => $value) {
    $object->$key = $value;
}
$object = json_decode(json_encode($arr), FALSE);
echo '<pre>';
print_r($object);
echo '</pre>';

// foreach ($object as $key => $value) {
//     $suadm = "index.php?act=suadm&id=" . $value->id;
//     $xoadm = "index.php?act=deletedm&id=" . $value->id;
//     echo '
//         <tr>
//             <td>' . $value->id . '</td>
//             <td>' . $value->ten_danh_muc . '</td>
//             <td>' . $value->stt . '</td>
//             <td><a href="' . $suadm . '"><i class="fas fa-edit"></i></a> | <a href="' . $xoadm . '"><i class="fas fa-trash-alt"></i></a>
//         </tr>
//     ';
// }
foreach ($object as $key => $value) {
    echo '
        <tr>
            <td>' . $value->id . '</td>
            <td>' . $value->ten_danh_muc . '</td>
        </tr>
    ';
}
echo "</table>";
