<?php
if(isset($_POST['user_dangnhap'])){
    $taikhoan = $_POST['user_account'];
    $matkhau = $_POST['user_password'];
    if($taikhoan == '' || $matkhau == ''){
        echo '<script>alert("Làm ơn không để trống")</script>';
    }else {
        $sql_select_admin = mysqli_query($mysqli, "SELECT * FROM tbl_user WHERE user_account = '$taikhoan' AND user_password = '$matkhau' LIMIT 1");
        $count = mysqli_num_rows($sql_select_admin);
        $row_dangnhap = mysqli_fetch_array($sql_select_admin);
        if($count > 0){
            $_SESSION['user_dangnhap'] = $row_dangnhap['user_account'];
            $_SESSION['user_id'] = $row_dangnhap['user_id'];
            header('Location: index.php?quanly=giohang');
        } else {
            echo '<script>alert("Tài khoản mật khẩu bị sai")</script>';
        }
    }
}
?>

<div id="main-login">
    <div class="form-login">
        <h2>Trang Đăng Nhập</h2>
        <form action="">
            <div class="info-login row">
                <input type="text" name="user_login" required placeholder="Tên đăng nhập">
                <input type="password" name="pass_user" required placeholder="Mật khẩu">
            </div>

            <div class="btn-login-form row">
                <label><input type="checkbox" name=""> Lưu thông tin đăng nhập</label>
                <input type="submit" value="Đăng Nhập" name="user_dangnhap">
                <p>Bạn Chưa Có Tài Khoản? <a href="?quanly=dangky" style="color: red;">Đăng Ký</a></p>
            </div>
        </form>
    </div>
</div>