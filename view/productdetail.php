<link rel="stylesheet" href="css/spct.css">
<?php
// $sqltest = 'SELECT * FROM hoadon where id_khach_hang=' . $_SESSION['user']['id'] . '';
// echo $sqltest;
if (is_array($thongtinsp)) {
    extract($thongtinsp);
}
?>
<form action="index.php?act=addtocart" method="post">
    <div id="product-details">
        <div id="product-details-top">
        </div>
        <div id="product-details-bottom">
            <div id="product-details-left">
                <img src="../uploads/hanghoa/<?= $hinh_anh ?>">
                <h2>Mô tả</h2>
                <?php
                echo $mo_ta;
                ?>
            </div>
            <div id="product-details-right">
                <div><a class="continue-cart" href="index.php?act=product"><i class="fa-solid fa-arrow-left"></i></a></div><br>
                <h3>CÀ PHÊ</h3>
                <h1><?= $ten_san_pham ?></h1>
                <h4>Giá: <?= $don_gia ?>VNĐ</h4>
                <!-- <div class="soluong">
                <div>-</div>
                <div>1</div>
                <div>+</div>
            </div> -->
                <div class="form-group">
                    <input type="number" class="form-control" placeholder="Số lượng" min="0" name="sltk" value='1'>
                </div>
                <input type="hidden" name="hinh_anh" value="<img src=../uploads/hanghoa/<?= $hinh_anh ?>">
                <input type="hidden" name="ten_san_pham" value="<?= $ten_san_pham ?>">
                <input type="hidden" name="don_gia" value="<?= $don_gia ?> ">
                <input type="hidden" name="id" value=" <?= $id ?>">
                <input type="submit" class="addhang" name="addtocart" value="Thêm vào giỏ hàng">
            </div>
        </div>
    </div>
</form>
<div class="list-group list-group-flush w-25 m-auto">
    <h2 class="text-center">Sản phẩm cùng loại</h2>
    <ul>
        <?php
        if (file_exists('allProductByCate.json')) {
            $filename = 'allProductByCate.json';
            $data = file_get_contents($filename);
            // print_r($data);
            $spcl = json_decode($data);
            // print_r($users);
            foreach ($spcl as $row) {
                $link = "index.php?act=productdetail&idsp=" . $row->id;
                echo '<li class="list-group-item list-group-item-action"><a href="' . $link . '"><img width="50" src="image/' . $row->hinh_anh . '">' . $row->ten_san_pham . '</a></li>';
            }
        }
        ?>
    </ul>
</div>
<?php
$c = new comment();
$comments = $c->getAllComment();
if ((isset($comments)) && (is_array($comments))) {
    // extract($comments);
    echo '<pre>';
    print_r($comments);
    echo '</pre>';
?>
    <div class="comment">
        <section style="background-color: #e7effd;">
            <div class="container my-5 py-5 text-dark">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-11 col-lg-9 col-xl-7">
                        <div class="d-flex flex-start mb-4">
                            <img class="rounded-circle shadow-1-strong me-3" src="../uploads/khachhang/none.png" alt="avatar" width="65" height="65" />
                            <div class="card w-100">
                                <div class="card-body p-4">
                                    <div class="">
                                        <h5></h5>
                                        <p class="small">3 hours ago</p>
                                        <p>
                                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque
                                            ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus
                                            viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla.
                                            Donec lacinia congue felis in faucibus ras purus odio, vestibulum in
                                            vulputate at, tempus viverra turpis.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-start">
                            <img class="rounded-circle shadow-1-strong me-3" src="../uploads/khachhang/none.png" alt="avatar" width="65" height="65" />
                            <div class="card w-100">
                                <div class="card-body p-4">
                                    <div class="">
                                        <h5>Mindy Campbell</h5>
                                        <p class="small">5 hours ago</p>
                                        <p>
                                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Delectus
                                            cumque doloribus dolorum dolor repellat nemo animi at iure autem fuga
                                            cupiditate architecto ut quam provident neque, inventore nisi eos quas?
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section style="background-color: #d94125;">
            <div class="container my-5 py-5 text-dark">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-6">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="d-flex flex-start w-100">
                                    <img class="rounded-circle shadow-1-strong me-3" src="../uploads/khachhang/none.png" alt="avatar" width="65" height="65" />
                                    <div class="w-100">
                                        <h5>Add a comment</h5>
                                        <div class="form-outline">
                                            <textarea class="form-control" id="textAreaExample" rows="4"></textarea>
                                            <label class="form-label" for="textAreaExample">What is your view?</label>
                                        </div>
                                        <div class="d-flex justify-content-between mt-3">
                                            <button type="button" class="btn btn-success">Danger</button>
                                            <button type="button" class="btn btn-danger">
                                                Send <i class="fas fa-long-arrow-alt-right ms-1"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php
}
?>
<script src="script.js"></script>
<!-- SELECT hoadon.id_khach_hang,chitiethoadon.id_san_pham FROM hoadon,chitiethoadon WHERE hoadon.id=chitiethoadon.id_hoa_don and hoadon.id_khach_hang=1 GROUP BY chitiethoadon.id_san_pham; -->