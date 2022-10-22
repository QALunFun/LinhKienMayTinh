<?php
session_start();
include_once('backend/connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Roboto:ital,wght@0,300;0,400;1,400&display=swap" rel="stylesheet">
    <!-- LINK CSS-->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="./assets/themify-icons/themify-icons.css">
    <!-- Title -->
    <link rel="icon" href="/assets/image/logo.png" type="x-icon/text">
    <title>Linh Kiện Máy Tính</title>
</head>

<body>
    <div id="container">
        <?php
        include('phpadmin/menu.php'); // header menu
        // END OF HEADER

        // Lấy biến quanly trong homepage.php
        if (isset($_GET['quanly'])) {
            $check_quanly = $_GET['quanly'];
        } else {
            $check_quanly = '';
        }

        // Gọi từ homepage qua category hoặc product - chi tiết
        if ($check_quanly == 'danhmuc') {
            include('phpadmin/category.php'); // left menu
        } elseif ($check_quanly == 'chitietsp') {
            include('phpadmin/product.php'); // chi tiết sp
        } elseif ($check_quanly == 'giohang') {
            include('phpadmin/giohang.php'); // đi đến trang giỏ hàng
        } elseif ($check_quanly == 'diachigiaohang') {
            include('phpadmin/diachigiaohang.php'); // đi đến trang địa chỉ giao
        } elseif ($check_quanly == 'thanhtoan') {
            include('phpadmin/thanhtoan.php'); // đi đến trang địa chỉ giao
        } elseif ($check_quanly == 'dangnhap') {
            include('phpadmin/signin.php'); // đi đến trang đăng nhập
        } elseif ($check_quanly == 'dangky') {
            include('phpadmin/signup.php'); // đi đến trang đăng ký
        } elseif ($check_quanly == 'timkiem') {
            include('phpadmin/timkiem.php'); // đi đến trang đăng ký
        } else {
            include('phpadmin/homepage.php'); // trang chủ
        }

        include('phpadmin/footer.php');
        // END OF FOOTER
        ?>
    </div>
</body>

<!-- ---------- Link JavaScript ---------- -->
<script src="style.js"></script>

</html>