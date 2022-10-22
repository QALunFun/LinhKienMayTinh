<!-- HEADER MENU -->

<header>
    <?php
    $sql_homecategory = mysqli_query($mysqli, 'SELECT * FROM tbl_homecategory ORDER BY homectg_id ASC');
    ?>
    <div class="logo">
        <img src="./assets/image/logo.png" alt="">
    </div>
    <div class="menu">
        <ul class="nav">
            <?php
            while ($row_homecategory = mysqli_fetch_array($sql_homecategory)) {
            ?>
                <li>
                    <a href="?quanly=danhmuc &id=<?php echo $row_homecategory['homectg_id'] ?>">
                        <!-- MENU hướng đến mục SALE / HOT / NEW PRODUCT -->
                        <?php echo $row_homecategory['homectg_name'] ?>
                    </a>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>

    <div class="others">
        <ul class="nav-others">
            <li>
                <form action="index.php?quanly=timkiem" method="post">
                    <input type="text" placeholder="Tìm kiếm..." name="search_product">
                    <button class="others-search ti-search" type="submit" name="search_btn"></button>
                </form>

            </li>
            <li><a class="ti-shopping-cart" href="?quanly=giohang"></a></li>
            <li><a class="ti-user" href="?quanly=dangnhap"></a></li>
        </ul>
    </div>
</header>