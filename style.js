

// Action IMG
const bigImg = document.querySelector(".pcl-big-img img")
const smallImg = document.querySelectorAll(".pcl-small-img img")

smallImg.forEach(function(imgItem, X){
    imgItem.addEventListener("click", function(){
        bigImg.src = imgItem.src
    })
})


// ROLL INFORMATION
const buttonRoll = document.querySelector(".product-tab-roll")
if(buttonRoll){
    buttonRoll.addEventListener("click", function(){
        document.querySelector(".product-tab-content").classList.toggle("activeNone")
    })
}

const gioithieu = document.querySelector(".gioithieu")
const thongsosp = document.querySelector(".thongsosp")

// INFORMATION
if(thongsosp){
    thongsosp.addEventListener("click", function(){
        document.querySelector(".tab-content-tssp").style.display = 'block'
        document.querySelector(".tab-content-gtsp").style.display = 'none'
    })
}

if(gioithieu){
    gioithieu.addEventListener("click", function(){
        document.querySelector(".tab-content-tssp").style.display = 'none'
        document.querySelector(".tab-content-gtsp").style.display = 'block'
    })
}

// Form Đăng Ký
const form = document.getElementById('formup');
const username = document.getElementById('username');
const phone = document.getElementById('phone');
const email = document.getElementById('email');
const address = document.getElementById('address');
const password = document.getElementById('password');
const password2 = document.getElementById('password2');

form.addEventListener('submit', (e) => {
	e.preventDefault();
	
	checkInputs();
});

function checkInputs() {
	// Validate dữ liệu ở các ô input và highlight ô lên
	const usernameValue = username.value.trim();
	const phoneValue = phone.value.trim();
	const emailValue = email.value.trim();
	const addressValue = address.value.trim();
	const passwordValue = password.value.trim();
	const password2Value = password2.value.trim();
	
	if(usernameValue === '') {
		setErrorFor(username, 'Tên tài khoản không được để trống');
	} else {
		setSuccessFor(username);
	}
	
    if(phoneValue === '') {
		setErrorFor(phone, 'Số điện thoại không được để trống');
	} else if (!isPhone(phoneValue)) {
		setErrorFor(phone, 'Số điện thoại không đúng định dạng');
	} else {
		setSuccessFor(phone);
	}

	if(emailValue === '') {
		setErrorFor(email, 'Email không được để trống');
	} else if (!isEmail(emailValue)) {
		setErrorFor(email, 'Email không đúng định dạng');
	} else {
		setSuccessFor(email);
	}
	
    if(addressValue === '') {
		setErrorFor(address, 'Địa chỉ không được để trống');
	} else {
		setSuccessFor(address);
	}

	if(passwordValue === '') {
		setErrorFor(password, 'Mật khẩu không được để trống');
	} else {
		setSuccessFor(password);
	}
	
	if(password2Value === '') {
		setErrorFor(password2, 'Nhập lại mật khẩu để xác nhận');
	} else if(passwordValue !== password2Value) {
		setErrorFor(password2, 'Không khớp với mật khẩu đã đặt');
	} else{
		setSuccessFor(password2);
	}
}

function setErrorFor(input, message) {
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	formControl.className = 'form-control error';
	small.innerText = message;
}

function setSuccessFor(input) {
	const formControl = input.parentElement;
	formControl.className = 'form-control success';
}
	
function isEmail(email) {
	return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}

function isPhone(number) {
	return /(84|0[3|5|7|8|9])+([0-9]{8})\b/.test(number);
}