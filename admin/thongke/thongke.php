<h2>Thống kê sản phẩm theo loại</h2>
<table class="table">
    <tr>
        <th>Mã danh mục</th>
        <th>Tên danh mục</th>
        <th>Số lượng</th>
        <th>Giá thấp nhất</th>
        <th>Giá cao nhất</th>
        <th>Giá trung bình</th>
    </tr>
    <?php
        foreach($listthongke as $tk) {
            extract($tk);
            echo '
            <tr>
                <td>'.$cataid.'</td>
                <td>'.$cataname.'</td>
                <td>'.$countpro.'</td>
                <td>'.$minpro.'</td>
                <td>'.$maxpro.'</td>
                <td>'.$avgpro.'</td>
            </tr>
            ';
        }
    ?>
    
</table>
<a href="index.php?act=chart">Biểu đồ</a>