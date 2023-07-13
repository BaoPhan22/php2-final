<link rel="stylesheet" href="css/dangky.css">
<link rel="stylesheet" href="css/thongbao.css">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"> </script>
<?php
// print_r($newUser);
if (!isset($_SESSION['user'])) {

?>

    <body ng-app="b4" ng-controller="ctr1">



        <form name="form1" action="index.php?act=dangky" method="post" id="form1">

            <h2 style="text-align: center;">ĐĂNG KÝ</h2>

            <p>
                <label for="">TÀI KHOẢN</label>
                <input required minlength="2" maxlength="30" ng-model="tendangnhap" name="tendangnhap" type="text" id="txt_username" class="txt">
                <em ng-if="form1.tendangnhap.$invalid" class="loi">Nhập tên đăng nhập</em>
            <div id="uname_response"></div>

            </p>
            <p>
                <label for="">MẬT KHẨU</label>
                <input required minlength="2" maxlength="30" ng-model="Matkhau" name="matkhau" type="password" id="hoten" class="txt">
                <em ng-if="form1.matkhau.$invalid" class="loi">Xin mời nhập mật khẩu</em>
            </p>
            <p>
                <label for="">HỌ TÊN</label><br>
                <input required minlength="2" maxlength="30" ng-model="hoten" name="hoten" type="text" id="hoten" class="txt">
                <em ng-if="form1.hoten.$invalid" class="loi">Nhập họ tên từ 2 đến 30 ký tự</em>
            </p>
            <p>
                <label for="">EMAIL</label><br>
                <input ng-model="email" type="email" name="email" id="email" class="txt">
                <em ng-if="form1.email.$invalid" class="loi">Nhập đúng gmail</em>
            </p>
            <p>
                <label for="">ĐỊA CHỈ</label><br>
                <input ng-model="diachi" type="text" name="diachi" id="diachi" class="txt">
                <em ng-if="form1.diachi.$invalid" class="loi">Nhập địa chỉ</em>
            </p>
            <div id="select-box-province">
                <select class="form-select custom-select w-100 form-select-sm mb-3" id="city" aria-label=".form-select-sm">
                    <option value="" selected>Chọn tỉnh thành</option>
                </select>

                <select class="form-select custom-select w-5 form-select-sm mb-3" id="district" aria-label=".form-select-sm">
                    <option value="" selected>Chọn quận huyện</option>
                </select>

                <select class="form-select custom-select w-5 form-select-sm mb-3" id="ward" aria-label=".form-select-sm">
                    <option value="" selected>Chọn phường xã</option>
                </select>
            </div>
            <?php if(isset($thongbao)) echo $thongbao; ?>
            <!-- <fieldset id="fs1">
                <input ng-model="gioitinh" type="radio" name="gioitinh" value="1"><label for="">NAM</label>
                <input ng-model="gioitinh" type="radio" name="gioitinh" value="2"><label for="">NỮ</label><br>
                <em ng-if="!gioitinh>=1" class="loi">Chọn Giới tính</em>
            </fieldset> -->
            <div name="baoloi" id="baoloi">
            </div>
            <!-- <button class="button"  ng-model="button" >ĐĂNG KÝ</button> -->
            <input type="submit" value="Đăng ký" class='button' name='dangky'>
            <br>
            <em class="loi" ng-if="(!form1.masv.$invalid) && (!form1.hoten.$invalid) && (!form1.email.$invalid ) && (gioitinh>=1) && (st1 ||st2 ||st3 || st4 || st5) && (qt>0) && (ghichu)">Nhập đúng</em>
        </form>


        <script>
            app = angular.module("b4", []);
            app.controller("ctr1", xuly);

            function xuly($scope) {}
        </script>
    <?php
} else {
    ?>
        <form id="thongbao-login" action="index.php">
            <h1>Bạn đã đăng nhập</h1>
            <div class="back-index">
                <input type="submit" value="Quay về trang chủ">
            </div>
            <div id="dangxuat">
                <a href="index.php?act=logout">Đăng xuất</a>
            </div>
        </form>
    <?php
}
    ?>
    <!-- <script>
        $(document).ready(function() {

            $("#txt_username").keyup(function() {

                var username = $(this).val().trim();

                if (username != '') {

                    $.ajax({
                        url: 'dangky.php',
                        type: 'post',
                        data: {
                            username: username
                        },
                        success: function(response) {

                            // Show response
                            $("#uname_response").html(response);

                        }
                    });
                } else {
                    $("#uname_response").html("");
                }

            });

        });
    </script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
    var citis = document.getElementById("city");
    var districts = document.getElementById("district");
    var wards = document.getElementById("ward");
    var Parameter = {
        url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
        method: "GET",
        responseType: "application/json",
    };
    var promise = axios(Parameter);
    promise.then(function(result) {
        renderCity(result.data);
    });

    function renderCity(data) {
        for (const x of data) {
            citis.options[citis.options.length] = new Option(x.Name, x.Id);
        }
        citis.onchange = function() {
            district.length = 1;
            ward.length = 1;
            if (this.value != "") {
                const result = data.filter(n => n.Id === this.value);

                for (const k of result[0].Districts) {
                    district.options[district.options.length] = new Option(k.Name, k.Id);
                }
            }
        };
        district.onchange = function() {
            ward.length = 1;
            const dataCity = data.filter((n) => n.Id === citis.value);
            if (this.value != "") {
                const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

                for (const w of dataWards) {
                    wards.options[wards.options.length] = new Option(w.Name, w.Id);
                }
            }
        };
    }
</script>