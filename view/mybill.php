<div id="background">
    <h1 class="text-center">Hóa đơn của tôi</h1>
    <?php
    foreach ($mybill as $bill) {
        extract($bill);
        $ptttView = '';
        $sttView = '';
        if ($phuong_thuc_thanh_toan === 1) {
            $ptttView = 'COD';
        } else {
            $ptttView = 'ATM';
        }
        if ($trang_thai === 0) {
            $sttView = 'Mới đặt';
        } elseif ($trang_thai === 1) {
            $sttView = 'Đang xử lý';
        } elseif ($trang_thai === 2) {
            $sttView = 'Đang giao hàng';
        }
    ?>
        <table class="body-wrap">
            <tbody>
                <tr>
                    <td></td>
                    <td class="container" width="600">
                        <div class="content">
                            <table class="main" width="100%" cellpadding="0" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td class="content-wrap aligncenter">
                                            <table width="100%" cellpadding="0" cellspacing="0">
                                                <tbody>
                                                    <tr>
                                                        <td class="content-block">
                                                            <table class="invoice">
                                                                <tbody>
                                                                    <tr>
                                                                        <td><b><?= $ho_ten ?></b><br>Số điện thoại: <?= $dien_thoai ?><br>Địa chỉ: <?= $dia_chi ?><br>Mã hóa đơn: <?= $id ?><br><?= $ngay_lap ?><br>Trạng thái: <?= $sttView ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <table class="invoice-items" cellpadding="0" cellspacing="0">
                                                                                <tbody>
                                                                                    <tr class="total">
                                                                                        <td class="alignright" width="80%">Tổng VNĐ</td>
                                                                                        <td class="alignright"><?= toDisplayVND($tong) ?></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="content-block">
                                                            <?php echo '<a href="index.php?act=billdetail&idhd=' . $id . '">Chi tiết</a>'; ?>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    <?php } ?>
</div>
<style>
    img {
        max-width: 100%;
    }

    body {
        -webkit-font-smoothing: antialiased;
        -webkit-text-size-adjust: none;
        width: 100% !important;
        height: 100%;
        line-height: 1.6;
    }

    /* Let's make sure all tables have defaults */
    table td {
        vertical-align: top;
    }

    /* -------------------------------------
    BODY & CONTAINER
------------------------------------- */
    body {
        background-color: #f6f6f6;
    }

    .body-wrap {
        background-color: #f6f6f6;
        width: 100%;
    }

    .container {
        display: block !important;
        max-width: 600px !important;
        margin: 0 auto !important;
        /* makes it centered */
        clear: both !important;
    }

    .content {
        max-width: 600px;
        margin: 0 auto;
        display: block;
        padding: 20px;
    }

    /* -------------------------------------
    HEADER, FOOTER, MAIN
------------------------------------- */
    .main {
        background: #fff;
        border: 1px solid #e9e9e9;
        border-radius: 3px;
    }

    .content-wrap {
        padding: 20px;
    }

    .content-block {
        padding: 0 0 20px;
    }


    .footer p,
    .footer a,
    .footer unsubscribe,
    .footer td {
        font-size: 12px;
    }

    /* -------------------------------------
    TYPOGRAPHY
------------------------------------- */


    /* -------------------------------------
    LINKS & BUTTONS
------------------------------------- */
    a {
        color: #1ab394;
        text-decoration: underline;
    }

    .btn-primary {
        text-decoration: none;
        color: #FFF;
        background-color: #1ab394;
        border: solid #1ab394;
        border-width: 5px 10px;
        line-height: 2;
        font-weight: bold;
        text-align: center;
        cursor: pointer;
        display: inline-block;
        border-radius: 5px;
        text-transform: capitalize;
    }

    /* -------------------------------------
    OTHER STYLES THAT MIGHT BE USEFUL
------------------------------------- */
    .last {
        margin-bottom: 0;
    }

    .first {
        margin-top: 0;
    }

    .aligncenter {
        text-align: center;
    }

    .alignright {
        text-align: right;
    }

    .alignleft {
        text-align: left;
    }

    .clear {
        clear: both;
    }

    /* -------------------------------------
    ALERTS
    Change the class depending on warning email, good email or bad email
------------------------------------- */
    .alert {
        font-size: 16px;
        color: #fff;
        font-weight: 500;
        padding: 20px;
        text-align: center;
        border-radius: 3px 3px 0 0;
    }

    .alert a {
        color: #fff;
        text-decoration: none;
        font-weight: 500;
        font-size: 16px;
    }

    .alert.alert-warning {
        background: #f8ac59;
    }

    .alert.alert-bad {
        background: #ed5565;
    }

    .alert.alert-good {
        background: #1ab394;
    }

    /* -------------------------------------
    INVOICE
    Styles for the billing table
------------------------------------- */
    .invoice {
        margin: 40px auto;
        text-align: left;
        width: 80%;
    }

    .invoice td {
        padding: 5px 0;
    }

    .invoice .invoice-items {
        width: 100%;
    }

    .invoice .invoice-items td {
        border-top: #eee 1px solid;
    }

    .invoice .invoice-items .total td {
        border-top: 2px solid #333;
        border-bottom: 2px solid #333;
        font-weight: 700;
    }

    /* -------------------------------------
    RESPONSIVE AND MOBILE FRIENDLY STYLES
------------------------------------- */
    @media only screen and (max-width: 640px) {

        h1,
        h2,
        h3,
        h4 {
            font-weight: 600 !important;
            margin: 20px 0 5px !important;
        }

        h1 {
            font-size: 22px !important;
        }

        h2 {
            font-size: 18px !important;
        }

        h3 {
            font-size: 16px !important;
        }

        .container {
            width: 100% !important;
        }

        .content,
        .content-wrap {
            padding: 10px !important;
        }

        .invoice {
            width: 100% !important;
        }
    }
</style>