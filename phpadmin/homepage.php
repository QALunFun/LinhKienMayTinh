<div id="banner">
    <img src="./assets/image/banner/b5.png" width="100%" alt="banner web">
</div>
<!-- -------------- END OF BANNER -------------- -->

<!-- PHP connect tbl add left-menu -->
<?php
$mysqli = new mysqli("localhost", "root", "", "linhkienmaytinh");
$sql_category = mysqli_query($mysqli, 'SELECT * FROM tbl_category ORDER BY category_id ASC');
?>

<div id="content">
    <div class="category row">
        <div class="category-left">
            <ul class="nav-left">
                <!-- PHP add left-menu -->
                <?php
                while ($row_category = mysqli_fetch_array($sql_category)) {
                ?>
                    <li class="nav-left-li" value="<?php echo $row_category['category_id'] ?>">
                        <a href="product.php?quanly=danhmuc&id=<?php echo $row_category['category_id'] ?>">
                            <?php echo $row_category['category_name'] ?>
                        </a>
                    </li>

                <?php
                }
                ?>
            </ul>
        </div>
        <!-- ---------- END OF CATEGORY-LEFT --------- -->

        <div class="category-right row">
            <div class="category-right-top">
                <div class="category-right-top-heading">
                    <h3>LINH KIỆN MÁY TÍNH</h3>
                </div>
                <div class="category-right-top-item">
                    <button>
                        <span>Bộ lọc</span>
                        <i class="ti-angle-down"></i>
                    </button>
                </div>
                <div class="category-right-top-item">
                    <select name="" id="">
                        <option value="">Sắp xếp</option>
                        <option value="">Giá cao đến thấp</option>
                        <option value="">Giá thấp đến cao</option>
                    </select>
                </div>
            </div>

            <!-- ---------- CATEGORY-RIGHT-CONTENT --------- -->
            <div class="category-right-content">
                <?php
                $sql_homeproduct = mysqli_query($mysqli, "SELECT * FROM tbl_homepro ORDER BY homepro_id ASC"); //lấy tất cả các dữ liệu trong bảng tbl_homepro
                while ($row_homeproduct = mysqli_fetch_array($sql_homeproduct)) {
                    $id_homeproduct = $row_homeproduct['homepro_id']; // lấy ra id của mục sản phẩm ở homepage VD: SALE PRODUCT
                ?>
                    <!-- ---------- SALE PRODUCT - SECTION ---------- -->
                    <div class="category-list-section">
                        <div id="sale-prod" class="section-top-list row">
                            <i class="section-icon ti-tag"></i>
                            <h3><?php echo $row_homeproduct['homepro_name'] ?></h3> <!--  Lấy ra tên của mục sản phẩm homepage -->
                        </div>
                        <div class="section-top-item row">
                            <?php
                            $sql_product = mysqli_query($mysqli, "SELECT * FROM tbl_product ORDER BY product_id ASC");
                            while ($row_product = mysqli_fetch_array($sql_product)) {
                                if ($row_product['homepro_id'] == $id_homeproduct) { // ss sản phẩm có id homepro trong tbl_product = với id trong mục
                            ?>
                                    <div class="category-rc-item">
                                        <a href="?quanly=chitietsp&id=<?php echo $row_product['product_id'] ?>">
                                            <!-- Gọi đến trang chi tiết sản phẩm -->
                                            <img src="./assets/image/image_product/<?php echo $row_product['product_img'] ?>" alt="">
                                            <h1><?php echo $row_product['product_name'] ?></h1>
                                        </a>
                                        <div class="ctg-price row">
                                            <p class="price-sale text-red "><?php echo number_format($row_product['product_bestsale']) ?><sup>đ</sup></p>
                                            <p class="price-product" style="text-decoration-line: line-through"><?php echo number_format($row_product['product_price']) ?><sup>đ</sup></p>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <!-- ---------- END OF CATEGORY-RIGHT-CONTENT --------- -->
        </div>
        <!-- ---------- END OF CATEGORY-RIGHT --------- -->
    </div>
</div>
<!-- -------------- END OF CONTENT -------------- -->

<div id="contact">
    <div class="contact-product row">
        <div class="contact-heading row">
            <i class="ti-pencil-alt"></i>
            <h1>CONTACT</h1>
        </div>
        <div class="contact-form">
            <div class="contact-form-left">
                <p>
                    <i class="ti-location-pin"></i>
                    <span>Thanh Hoa City</span>
                </p>
                <p>
                    <i class="ti-mobile"></i>
                    <span>Phone: +84 19103100162</span>
                </p>
                <p>
                    <i class="ti-email"></i>
                    <span>Email: email@hotmail.com</span>
                </p>
            </div>
            <div class="contact-form-right">
                <form action="" method="post">
                    <div class="cfr-top">
                        <div class="cfr-top-row cfr-tr-left">
                            <input type="text" placeholder="Name" name="ht" class="form-input">
                        </div>
                        <div class="cfr-top-row cfr-tr-right">
                            <input type="email" placeholder="Enter Email" name="mail" class="form-input">
                        </div>
                    </div>
                    <div class="cfr-bottom">
                        <input type="text" placeholder="Message" name="mess" class="form-input">
                    </div>
                    <input type="submit" name="submit-contact" value="SEND" class="cfr-btn"></input>
                </form>

                <?php
                $mysqli = new mysqli("localhost","root","","linhkienmaytinh");
                if (isset($_POST["submit-contact"])) {

                    $hoten = $_POST["ht"];
                    $email = $_POST["mail"];
                    $mess = $_POST["mess"];

                    $sql = "insert into tbl_contact value   (' ','" . $hoten . "', '" . $email . "', '" . $mess . "')";

                    mysqli_query($mysqli, $sql);
                }
                ?>

                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>