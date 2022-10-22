<div id="main-signup">
    <div class="container">
        <div class="header">
            <h2>Tạo Tài Khoản Mới</h2>
        </div>
        <form id="formup" class="form-signup" action="" method="post">
            <div class="form-control">
                <label for="username">Họ và tên</label>
                <input type="text" name="userfull" required placeholder="VD: Tống Bá Quang Anh" id="user" />
                <small>Error message</small>
            </div>
            <div class="form-control">
                <label for="username">Tên tài khoản</label>
                <input type="text" name="username" required placeholder="quanganhuneti" id="username" />
                <small>Error message</small>
            </div>
            <div class="form-control">
                <label for="phone">Số điện thoại</label>
                <input type="text" name="phone" required placeholder="Số điện thoại" id="phone" />
                <small>Error message</small>
            </div>
            <div class="form-control">
                <label for="email">Email</label>
                <input type="email" name="email" required placeholder="quanganh@uneti.com" id="email" />
                <small>Error message</small>
            </div>
            <div class="form-control">
                <label for="address">Địa chỉ</label>
                <input type="text" name="address" required placeholder="Địa chỉ" id="address" />
                <small>Error message</small>
            </div>
            <div class="form-control">
                <label for="password">Mật khẩu</label>
                <input type="password" name="password" required placeholder="Mật khẩu" id="password" />
                <small>Error message</small>
            </div>
            <div class="form-control">
                <label for="password2">Nhập lại mật khẩu</label>
                <input type="password" name="password2" required placeholder="Nhập lại mật khẩu" id="password2" />
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
            </div>
            <button class="submit_btn" name="submit" type="submit" id="submit_signup">Đăng kí</button>
        </form>
    </div>
</div>
<!-- -------------- END OF LOGIN -------------- -->
<?php
$mysqli = new mysqli("localhost", "root", "", "linhkienmaytinh");
if (isset($_POST['submit'])) {
    $fullname = $_POST["userfull"];
    $acc = $_POST["username"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $pass = $_POST["password"];

    $sql_user = "INSERT INTO tbl_user (user_fullname, user_account, user_phone, user_email, user_address, user_password)
        VALUES ('$fullname', '$acc', '$phone', '$email', '$address', '$pass')";
    mysqli_query($mysqli, $sql_user);
}
?>

<!-- ---------- Link JavaScript ---------- -->
<script src="/style.js"></script>

</html>