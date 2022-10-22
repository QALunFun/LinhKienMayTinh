        <!-- Thanh toan don hang -->
        <div class="payment">
            <div class="cart-container">
                <div class="payment-header">
                    <div class="payment-top">
                        <div class="payment-top-icon">
                            <i class="ti-shopping-cart-full"></i>
                        </div>
                        <div class="payment-top-icon">
                            <i class="ti-location-pin"></i>
                        </div>
                        <div class="payment-top-icon">
                            <i class="ti-money"></i>
                        </div>
                    </div>
                </div>
                <form action="" method="post">
                    <div class="payment-main row">
                        <div class="payment-main-left">
                            <div class="pml-method-delivery">
                                <h3>Phương thức giao hàng</h3>
                                <div class="pml-method-item-delivery">
                                    <input checked type="radio" name="delivery" value="FAST">
                                    <label for="">Giao hàng chuyển phát nhanh</label>
                                </div>
                            </div>

                            <div class="pml-method-payment">
                                <h3>Phương thức thanh toán</h3>
                                <p>
                                    Mọi dịch vụ đều được bảo mật và mã hóa. Thông tin thẻ tín dụng sẽ không được lưu lại.
                                </p>
                                <div class="pml-method-item-payment">
                                    <div class="pml-method-pmitem">
                                        <input type="radio" name="payment" id="payment-vm" value="1">
                                        <label for="payment-vm">Thanh toán bằng thẻ tín dụng</label>
                                        <div class="pml-img">
                                            <img src="./assets/image/payment/visa-mastercard-1-1.png" width="120px" height="40px" alt="">
                                        </div>
                                    </div>
                                    <div class="pml-method-pmitem">
                                        <input checked type="radio" name="payment" id="payment-atm" value="2">
                                        <label for="payment-atm">Thanh toán bằng thẻ ATM</label>
                                        <div class="pml-img">
                                            <img src="./assets/image/payment/LogoPayment.jpg" alt="">
                                        </div>
                                        <p>Hỗ trợ thanh toán online hơn 38 ngân hàng phổ biến tại Việt Nam</p>
                                    </div>
                                    <div class="pml-method-pmitem">
                                        <input type="radio" name="payment" id="payment-momo" value="3">
                                        <label for="payment-momo">Thanh toán bằng MoMo</label>
                                        <div class="pml-img">
                                            <img src="./assets/image/payment/MOMO_logo.png" width="60px" alt="">
                                        </div>
                                    </div>
                                    <div class="pml-method-pmitem">
                                        <input type="radio" name="payment" value="4">
                                        <label for="">Thanh toán tại nhà</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="payment-main-right">
                            <div class="pmr-button-list">
                                <div class="pmr-button-item">
                                    <input type="text" placeholder="Mã giảm giá" name="codesale">
                                    <button><i class="ti-check-box"></i></button>
                                </div>
                                <div class="pmr-button-item">
                                    <input type="text" placeholder="Mã cộng tác viên" name="mactv">
                                    <button><i class="ti-check-box"></i></button>
                                </div>
                            </div>
                            <div class="pmr-select">
                                <select name="manv" id="">
                                    <option value="">Chọn mã nhân viên</option>
                                    <option name="manv" value="MSM01">MSM01</option>
                                    <option name="manv" value="MSM02">MSM02</option>
                                    <option name="manv" value="MSM03">MSM03</option>
                                    <option name="manv" value="MSM04">MSM04</option>
                                    <option name="manv" value="MSM05">MSM05</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="payment-button">
                        <button name="submit-thanhtoan">THANH TOÁN</button>
                    </div>
                </form>
            </div>
        </div>

        <?php
        $mysqli = new mysqli("localhost", "root", "", "linhkienmaytinh");

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $delivery = $_POST["delivery"];
            $payment = $_POST["payment"];
            $codesale = $_POST["codesale"];
            $mactv = $_POST["mactv"];
            $manv = $_POST["manv"];

            $sql_khachhang = "INSERT INTO tbl_diachikh (ptgiao, ptthanhtoan, magg, mactv, manv)
        VALUES ('$delivery', '$payment', '$codesale', '$mactv', '$manv')";
            mysqli_query($mysqli, $sql_khachhang);
        }
        ?>