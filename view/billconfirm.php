<?php
if ((isset($bill)) && (is_array($bill))) {
    extract($bill);
?>
    <link rel="stylesheet" href="css/bill.css">
    <div id="background">
        <div class="box">
            <div class="box-left">
                <div class="container">
                    <div class="madonhang">
                        <div class="titlema">Mã đơn hàng</div>
                        <?= $idbill ?>
                    </div>
                    <br>
                    <div class="thongtin">
                        <div class="titlethongtin">Thông tin đặt hàng :</div>
                        <div class="table">
                            <div class="hang">
                                <div class="inf">Người đặt hàng :</div>
                                <div><?= $bill['ho_ten'] ?></div>
                            </div>
                            <div class="hang">
                                <div class="inf">Địa chỉ :</div>
                                <div><?= $bill['dia_chi'] ?></div>
                            </div>
                            <div class="hang">
                                <div class="inf">Email :</div>
                                <div><?= $bill['email'] ?></div>
                            </div>
                            <div class="hang">
                                <div class="inf">Điện thoại :</div>
                                <div><?= $bill['dien_thoai'] ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-right">
                <div class="imgbill"><img src="image/logo.png" alt="">
                    <h1>Mái Cà Phê</h1>
                    <h4>Cảm ơn bạn đã đặt hàng và ủng hộ doanh nghiệp!</h4>
                </div>
            </div>
        </div>
    </div>
<?php
} ?>
<style>
    #background {
        margin: 100px 0px;
    }

    .box {
        display: flex;
    }

    #background .box-left {
        width: 40%;
        padding-bottom: 30px;
        margin-left: 150px;
        box-shadow: 10px 10px 15px 2px #ccc;
    }

    .container {
        width: 80%;
        margin: auto;
        padding: 70px 0px
    }

    #background .box-right {
        width: 60%;
        /* background-color: blueviolet; */
    }

    .madonhang {
        text-align: center;
        font-size: 25px;
    }

    .titlema {
        font-weight: 900;
        font-size: 30px;
    }


    .table tr {
        padding: 10px 0px
    }

    .hang {
        display: flex;
        padding-top: 25px;
        padding-bottom: 25px;
        border-bottom: 1px solid rgba(128, 128, 128, 0.784);
    }

    .titlethongtin {
        padding-bottom: 20px;
        font-size: 19px;
    }

    .inf {
        width: 35%;
        float: left;
    }

    .imgbill {
        text-align: center;
        padding-top: 100px;
    }

    .imgbill h1 {
        font-weight: 900;
        color: #162F45;
        padding-bottom: 15px;
    }

    .imgbill img {
        margin-left: 10px;
    }
</style>