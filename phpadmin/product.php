<!-- CHI TIẾT SẢN PHẨM -->

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = '';
}
$sql_chitiet = mysqli_query($mysqli, "SELECT * FROM tbl_product WHERE product_id = '$id' ");
?>



<!-- page chi tiết sp -->
<div class="product">
    <div class="product-top ">
        <h3>
            LINH KIỆN MÁY TÍNH <i class="ti-arrow-right"></i> Chi Tiết Sản Phẩm
        </h3>
    </div>

    <?php
    while ($row_chitiet = mysqli_fetch_array($sql_chitiet)) {
    ?>
        <div class="product-content row">
            <div class="product-content-left row">
                <div class="pcl-big-img">
                    <img src="./assets/image/image_product/<?php echo $row_chitiet['product_img'] ?>" alt="Ảnh sản phẩm">
                </div>

                <div class="pcl-small-img">
                    <img src="./assets/image/image_product/<?php echo $row_chitiet['product_img'] ?>" alt="Ảnh sản phẩm 1">
                    <img src="./assets/image/image_product/<?php echo $row_chitiet['product_img1'] ?>" alt="Ảnh sản phẩm 2">
                    <img src="./assets/image/image_product/<?php echo $row_chitiet['product_img2'] ?>" alt="Ảnh sản phẩm 3">
                    <img src="./assets/image/image_product/<?php echo $row_chitiet['product_img3'] ?>" alt="Ảnh sản phẩm 4">
                </div>
            </div>

            <div class="product-content-right">
                <div class="product-information">
                    <h1><?php echo $row_chitiet['product_name'] ?></h1>
                    <div class="product-sub-info row">
                        <p>
                            MSP:
                            <span><?php echo $row_chitiet['product_msp'] ?></span>
                        </p>
                        <span>
                            <i class="ti-star"></i>
                            <i class="ti-star"></i>
                            <i class="ti-star"></i>
                            <i class="ti-star"></i>
                            <i class="ti-star"></i>
                        </span>
                    </div>
                    <div class="product-price">
                        <b><?php echo number_format($row_chitiet['product_bestsale']) ?><sup>đ</sup></b>
                        <i style="text-decoration-line: line-through; font-size: 14px; color: #000"><?php echo number_format($row_chitiet['product_price']) ?><sup>đ</sup></i>
                    </div>

                    <div class="product-button row">
                        <form action="?quanly=giohang" method="post">
                            <div class="product-quantity">
                                <p style="font-size: 16px; font-weight: 500; line-height: 1.2;">Số lượng</p>
                                <input type="number" name="soluong" min="1" value="<?php echo $row_fetch_gh['soluong'] ?>">
                            </div>
                            <input type="hidden" name="tensanpham" value="<?php echo $row_chitiet['product_name'] ?>">
                            <input type="hidden" name="product_id" value="<?php echo $row_chitiet['product_id'] ?>">
                            <input type="hidden" name="hinhanh" value="<?php echo $row_chitiet['product_img'] ?>">
                            <!-- <input type="hidden" name="soluong" value="1"> -->
                            <input type="hidden" name="giasanpham" value="<?php echo $row_chitiet['product_bestsale'] ?>">
                            <input type="submit" name="themgiohang" id="giohang" class="giohang" value="THÊM VÀO GIỎ HÀNG">
                        </form>
                    </div>

                    <div class="product-tab">
                        <div class="product-tab-roll">
                            <i class="ti-arrow-circle-down"></i>
                        </div>
                        <div class="product-tab-content">
                            <div class="product-tab__header row">
                                <div class="tab-item gioithieu">
                                    <span>GIỚI THIỆU</span>
                                </div>
                                <div class="tab-item thongsosp">
                                    <span>THÔNG SỐ SẢN PHẨM</span>
                                </div>
                            </div>
                            <div class="product-tab__body">
                                <div class="tab-content-gtsp">
                                    <p>
                                        <?php echo $row_chitiet['product_intro'] ?>
                                    </p>
                                </div>
                                <div class="tab-content-tssp">
                                    <p>
                                        <?php echo $row_chitiet['product_info'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="product-footer">
        </div>

    <?php
    }
    ?>
</div>