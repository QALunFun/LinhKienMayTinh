<?php
if (isset($_POST['themgiohang'])) {
    $tensanpham = $_POST['tensanpham'];
    $product_id = $_POST['product_id'];
    $hinhanh = $_POST['hinhanh'];
    $soluong = $_POST['soluong']; // So luong sp co ban dau
    $giasanpham = $_POST['giasanpham'];

    // Lấy số lượng sp mặc định + tăng: khi mua cùng sp
    $sql_quantity = mysqli_query($mysqli, "SELECT * FROM tbl_giohang WHERE product_id = '$product_id' ");
    //đếm
    $count = mysqli_num_rows($sql_quantity);
    if ($count > 0) {
        $row_product = mysqli_fetch_array($sql_quantity);
        $soluong = $row_product['soluong'] + 1;
        $sql_giohang = "UPDATE tbl_giohang SET soluong = '$soluong' WHERE product_id = '$product_id'"; // khi mua sp giống sp trong giỏ sẽ update số lượng mua tăng lên theo
    } else {
        $soluong = $soluong;
        $sql_giohang = "INSERT INTO tbl_giohang(product_id, hinhanh, tensanpham, soluong, giasanpham) VALUES('$product_id', '$hinhanh', '$tensanpham', '$soluong', '$giasanpham')";
    }

    $insert_row = mysqli_query($mysqli, $sql_giohang);

    if ($insert_row == 0) {
        header('Location:index.php?quanly=chitietsp&id=' . $product_id);
    }
} elseif (isset($_POST['capnhatgiohang'])) {
    for ($i = 0; $i < count($_POST['product_id']); $i++) {
        // Lấy ra id của sp và số lượng sp
        $product_id = $_POST['product_id'][$i];
        $soluong = $_POST['soluong'][$i];
        if($soluong <= 0){
            $sql_delete = mysqli_query($mysqli, "DELETE FROM tbl_giohang WHERE product_id = '$product_id' ");
        } else {
            $sql_update = mysqli_query($mysqli, "UPDATE tbl_giohang SET soluong = '$soluong' WHERE product_id = '$product_id' ");
        }
    }
} elseif(isset($_GET['xoa'])){
    $id = $_GET['xoa'];
    $sql_delete = mysqli_query($mysqli, "DELETE FROM tbl_giohang WHERE giohang_id = '$id' ");
}
?>


<div class="shopping-cart">
    <div class="cart-container">
        <div class="cart-header">
            <div class="cart-top">
                <div class="cart-top-icon">
                    <i class="ti-shopping-cart-full"></i>
                </div>
                <div class="cart-top-icon">
                    <i class="ti-location-pin"></i>
                </div>
                <div class="cart-top-icon">
                    <i class="ti-money"></i>
                </div>
            </div>
        </div>

        <div class="cart-contain">
            <div class="cart-contain-left">
                <form action="" method="post">
                    <table>
                        <?php
                        $sql_get_giohang = mysqli_query($mysqli, "SELECT * FROM tbl_giohang ORDER BY giohang_id DESC");
                        ?>
                        <tr>
                            <th>STT</th>
                            <th>Sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th>Thao tác</th>
                        </tr>
                        <!-- San pham trong gio de thanh toan -->
                        <?php
                        $i = 0;
                        $tongtien = 0; // Tổng tiền mua tất cả sản phẩm chứa trpng giỏ hàng
                        while ($row_fetch_gh = mysqli_fetch_array($sql_get_giohang)) {
                            $thanhtien = $row_fetch_gh['soluong'] * $row_fetch_gh['giasanpham'];
                            $i++;
                            $tongtien += $thanhtien;

                        ?>
                            <tr>
                                <td>
                                    <?php echo $i ?>
                                </td>
                                <td>
                                    <img src="./assets/image/image_product/<?php echo $row_fetch_gh['hinhanh'] ?>" width="120px" alt="Hình ảnh sản phẩm">
                                </td>
                                <td>
                                    <p>
                                        <?php echo $row_fetch_gh['tensanpham'] ?>
                                    </p>
                                </td>
                                <td>
                                    <input type="hidden" name="product_id[]" value="<?php echo $row_fetch_gh['product_id'] ?>">
                                    <input type="number" name="soluong[]" value="<?php echo $row_fetch_gh['soluong'] ?>">
                                </td>
                                <td>
                                    <p>
                                        <?php echo number_format($thanhtien) ?><sup>đ</sup>
                                    </p>
                                </td>
                                <td>
                                    <a href="?quanly=giohang&xoa=<?php echo $row_fetch_gh['giohang_id']?>">Xóa</a>
                                </td>
                            </tr>

                        <?php
                        }
                        ?>
                        <tr>
                            <td colspan="6">Tổng tiền cần thanh toán: <?php echo number_format($tongtien) ?><sup>đ</sup></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <input type="submit" value="Cập nhật giỏ hàng" name="capnhatgiohang" style="width: 160px; border: none; border-radius: 8px; padding: 12px" class="update-gh input-ss">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>

            <div class="cart-content-right">
                <div class="cart-content-right__desc">
                    <p>
                        Bạn sẽ được <b>miễn phí SHIP</b> khi đơn hàng của bạn có tổng giá trị
                        trên <b>2.000.000<sup>đ</sup></b>
                    </p>
                </div>

                <div class="cart-content-right__btn">
                    <button><a href="./index.php">TIẾP TỤC MUA HÀNG</a></button>
                    <button><a href="?quanly=diachigiaohang">THANH TOÁN</a></button>
                </div>
                <div class="cart-content-right__login">
                    <h2>Tài khoản SNAKE-SHOP</h2>
                    <p>
                        Hãy <a href="?quanly=dangnhap" class="text-gold">đăng nhập</a> tài khoản của bạn để tích điểm mua hàng tại SHOP.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- -------------- END OF SHOPPING CART -------------- -->

<!-- ---------- Link JavaScript ---------- -->
<script src="./style.js"></script>

</html>