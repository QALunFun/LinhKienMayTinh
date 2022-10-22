<?php
$sql_diachi = mysqli_query($mysqli, "SELECT * FROM tbl_giohang WHERE product_id = '$product_id' ");
?>

<div id="container">
    <!-- -------------- END OF HEADER -------------- -->

    <!-- Thong tin giao hang -->
    <div class="delivery">
        <div class="cart-container">
            <div class="delivery-header">
                <div class="delivery-top">
                    <div class="delivery-top-icon">
                        <i class="ti-shopping-cart-full"></i>
                    </div>
                    <div class="delivery-top-icon">
                        <i class="ti-location-pin"></i>
                    </div>
                    <div class="delivery-top-icon">
                        <i class="ti-money"></i>
                    </div>
                </div>
            </div>

            <div class="delivery-main row">

                <div class="delivery-main-left">
                    <h2 class="text-red">Vui lòng chọn địa chỉ giao hàng</h2>
                    <form action="" method="post">
                        <div class="deml-input row-col">
                            <div class="deml-input-top-list row">
                                <div class="deml-input-top">
                                    <label for="name">Họ tên <span><sup class="text-red">*</sup></span></label>
                                    <input type="text" name="hoten" required id="name">
                                </div>
                                <div class="deml-input-top">
                                    <label for="number-phone">Điện thoại <span><sup class="text-red">*</sup></span></label>
                                    <input type="text" name="sdt" required id="number-phone">
                                </div>
                                <div class="deml-input-top">
                                    <label for="tinhtp">Tỉnh/TP <span><sup class="text-red">*</sup></span></label>
                                    <input type="text" name="tinhtp" required id="tinhtp">
                                </div>
                                <div class="deml-input-top">
                                    <label for="quanhuyen">Quận/Huyện <span><sup class="text-red">*</sup></span></label>
                                    <input type="text" name="quanhuyen" required id="quanhuyen">
                                </div>
                            </div>
                            <div class="deml-input-bottom-list">
                                <div class="deml-input-bottom">
                                    <label for="phuongxa">Phường/Xã <span><sup class="text-red">*</sup></span></label>
                                    <input type="text" name="phuongxa" required id="phuongxa">
                                </div>
                                <div class="deml-input-bottom">
                                    <label for="diachi">Địa chỉ <span><sup class="text-red">*</sup></span></label>
                                    <input type="text" required name="diachi" id="diachi">
                                </div>
                            </div>
                            <div class="deml-button row">
                                <a href="?quanly=giohang" class="text-gold">
                                    <p><span><i class="ti-angle-double-left"></i></span>Quay lại giỏ hàng</p>
                                </a>
                                <button id="" type="submit" name="submit" class="submit_diachi"><a href="?quanly=thanhtoan">THANH TOÁN VÀ GIAO HÀNG</a></button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="delivery-main-right">
                    <table>
                        <?php
                        $sql_get_giohang = mysqli_query($mysqli, "SELECT * FROM tbl_giohang ORDER BY giohang_id DESC");
                        ?>
                        <tr>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                        <?php
                        $i = 0;
                        $tongtien = 0; // Tổng tiền mua tất cả sản phẩm chứa trpng giỏ hàng
                        while ($row_fetch_gh = mysqli_fetch_array($sql_get_giohang)) {
                            $thanhtien = $row_fetch_gh['soluong'] * $row_fetch_gh['giasanpham'];
                            $i++;
                            $tongtien += $thanhtien;
                        ?>
                            <tr>
                                <td><?php echo $row_fetch_gh['tensanpham'] ?></td>
                                <td>
                                    <input type="hidden" name="product_id[]" value="<?php echo $row_fetch_gh['product_id'] ?>">
                                    <input type="text" class="quantity" name="soluong[]" value="<?php echo $row_fetch_gh['soluong'] ?>">
                                </td>
                                <td><?php echo number_format($thanhtien) ?><sup>đ</sup></td>
                            </tr>
                        <?php
                        }
                        ?>
                        <tr>
                            <td><b>Tổng tiền hàng:</b></td>
                            <td></td>
                            <td><b class="text-red"><?php echo number_format($tongtien) ?><sup class="text-red">đ</sup></b></td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <!-- -------------- END OF DELIVERY -------------- -->
    <?php
    $mysqli = new mysqli("localhost", "root", "", "linhkienmaytinh");
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $hoten = $_POST["hoten"];
        $sdt = $_POST["sdt"];
        $tinhtp = $_POST["tinhtp"];
        $quanhuyen = $_POST["quanhuyen"];
        $phuongxa = $_POST["phuongxa"];
        $diachi = $_POST["diachi"];

        $sql_khachhang = "INSERT INTO tbl_diachikh (hotenkh, sdtkh, tinhtp, quanhuyen, phuongxa, diachicuthe)
        VALUES ('$hoten', '$sdt', '$tinhtp', '$quanhuyen', '$phuongxa', '$diachi')";
        mysqli_query($mysqli, $sql_khachhang);
    }
    ?>


    <!-- ---------- Link JavaScript ---------- -->
    <script src="../style.js"></script>