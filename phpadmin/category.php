
<!-- LEFT MENU -->

<?php
$sql_category = mysqli_query($mysqli, 'SELECT * FROM tbl_category ORDER BY category_id ASC');
?>

<div class="category-left">
    <ul class="nav-left">
        <!-- PHP add left-menu -->
        <?php
        while ($row_category = mysqli_fetch_array($sql_category)) {
        ?>
            <li class="nav-left-li" value="<?php echo $row_category['category_id'] ?>">
                <a href="?quanly=danhmuc&id=<?php echo $row_homecategory['homectg_id'] ?>">  <!-- Gọi đến chi tiết từng danh mục -->
                    <?php echo $row_category['category_name'] ?>
                </a>
            </li>

        <?php
        }
        ?>
    </ul>
</div>