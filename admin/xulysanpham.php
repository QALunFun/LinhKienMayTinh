<?php
	include('../backend/connect.php');
?>
<?php
	if(isset($_POST['themsanpham'])){
		$tensanpham = $_POST['tensanpham'];
		$masanpham = $_POST['masanpham'];
		$hinhanh = $_FILES['hinhanh']['name'];
		$hinhanh1 = $_FILES['hinhanh1']['name'];
		$hinhanh2 = $_FILES['hinhanh2']['name'];
		$hinhanh3 = $_FILES['hinhanh3']['name'];
		$gia = $_POST['giasanpham'];
		$giakhuyenmai = $_POST['giakhuyenmai'];
		$soluong = $_POST['soluong'];
		$chitiet = $_POST['chitiet'];
		$mota = $_POST['mota'];
		$danhmuc = $_POST['danhmuc'];
		$path = '../uploads/';
		
		$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];

		$sql_insert_product = mysqli_query($mysqli,"INSERT INTO tbl_product(category_id, product_name, product_msp, product_price, product_bestsale, product_quantity, product_img, product_img1, product_img2, product_img3, product_intro, product_info) values ('$danhmuc', '$tensanpham', '$masanpham', '$gia', '$giakhuyenmai', '$soluong', '$hinhanh', '$hinhanh1', '$hinhanh2', '$hinhanh3', '$chitiet','$mota')");
		move_uploaded_file($hinhanh_tmp, $path.$hinhanh);
	}elseif(isset($_POST['capnhatsanpham'])) {
		$id_update = $_POST['id_update'];
		$tensanpham = $_POST['tensanpham'];
		$masanpham = $_POST['masanpham'];
		$hinhanh = $_FILES['hinhanh']['name'];
		$hinhanh1 = $_FILES['hinhanh1']['name'];
		$hinhanh2 = $_FILES['hinhanh2']['name'];
		$hinhanh3 = $_FILES['hinhanh3']['name'];
		$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
		$soluong = $_POST['soluong'];
		$gia = $_POST['giasanpham'];
		$giakhuyenmai = $_POST['giakhuyenmai'];
		$danhmuc = $_POST['danhmuc'];
		$chitiet = $_POST['chitiet'];
		$mota = $_POST['mota'];
		$path = '../uploads/';
		if($hinhanh==''){
			$sql_update_image = "UPDATE tbl_product SET product_name='$tensanpham',product_intro='$chitiet',product_info='$mota',product_price='$gia',product_bestsale='$giakhuyenmai',product_quantity='$soluong',category_id='$danhmuc' WHERE product_id='$id_update'";
		}else{
			move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
			$sql_update_image = "UPDATE tbl_product SET product_name='$tensanpham',product_intro='$chitiet',product_info='$mota',product_price='$gia',product_bestsale='$giakhuyenmai',product_quantity='$soluong',product_img='$hinhanh',category_id='$danhmuc' WHERE product_id='$id_update'";
		}
		mysqli_query($mysqli,$sql_update_image);
	}
	
?> 
<?php
	if(isset($_GET['xoa'])){
		$id= $_GET['xoa'];
		$sql_xoa = mysqli_query($mysqli,"DELETE FROM tbl_product WHERE product_id='$id'");
	} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>S???n ph???m</title>
	<link href="../assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
	      <li class="nav-item active">
	        <a class="nav-link" href="xulydonhang.php">????n h??ng <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="xulydanhmuc.php">Danh m???c</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="xulysanpham.php">S???n ph???m</a>
	      </li>
	       <li class="nav-item">
	        <a class="nav-link" href="xulykhachhang.php">Kh??ch h??ng</a>
	      </li>
	      
	    </ul>
	  </div>
	</nav><br><br>
	<div class="container">
		<div class="row">
		<?php
			if(isset($_GET['quanly'])=='capnhat'){
				$id_capnhat = $_GET['capnhat_id'];
				$sql_capnhat = mysqli_query($mysqli,"SELECT * FROM tbl_product WHERE product_id='$id_capnhat'");
				$row_capnhat = mysqli_fetch_array($sql_capnhat);
				$id_category_1 = $row_capnhat['category_id'];
				?>
				<div class="col-md-4">
				<h4>C???p nh???t s???n ph???m</h4>
				
				<form action="" method="POST" enctype="multipart/form-data">
					<label>T??n s???n ph???m</label>
					<input type="text" class="form-control" name="tensanpham" value="<?php echo $row_capnhat['product_name'] ?>"><br>
					<input type="hidden" class="form-control" name="id_update" value="<?php echo $row_capnhat['product_id'] ?>">
					<label>M?? s??? s???n ph???m</label>
					<input type="text" class="form-control" name="masanpham" value="<?php echo $row_capnhat['product_msp'] ?>"><br>
					<label>H??nh ???nh</label>
					<input type="file" class="form-control" name="hinhanh"><br>
					<img src="../assets/image/image_product/<?php echo $row_capnhat['product_img'] ?>" height="80" width="80"><br>
					<label>H??nh ???nh ph??? 1</label>
					<input type="file" class="form-control" name="hinhanh1"><br>
					<img src="../assets/image/image_product/<?php echo $row_capnhat['product_img'] ?>" height="80" width="80"><br>
					<label>H??nh ???nh ph??? 2</label>
					<input type="file" class="form-control" name="hinhanh2"><br>
					<img src="../assets/image/image_product/<?php echo $row_capnhat['product_img'] ?>" height="80" width="80"><br>
					<label>H??nh ???nh ph??? 3</label>
					<input type="file" class="form-control" name="hinhanh3"><br>
					<img src="../assets/image/image_product/<?php echo $row_capnhat['product_img'] ?>" height="80" width="80"><br>
					<label>Gi??</label>
					<input type="text" class="form-control" name="giasanpham" value="<?php echo $row_capnhat['product_price'] ?>"><br>
					<label>Gi?? khuy???n m??i</label>
					<input type="text" class="form-control" name="giakhuyenmai" value="<?php echo $row_capnhat['product_bestsale'] ?>"><br>
					<label>S??? l?????ng</label>
					<input type="text" class="form-control" name="soluong" value="<?php echo $row_capnhat['product_quantity'] ?>"><br>
					<label>Gi???i thi???u</label>
					<textarea class="form-control" rows="10" name="mota"><?php echo $row_capnhat['product_info'] ?></textarea><br>
					<label>Th??ng s??? s???n ph???m</label>
					<textarea class="form-control" rows="10" name="chitiet"><?php echo $row_capnhat['product_intro'] ?></textarea><br>
					<label>B???ng S???n Ph???m</label>
					<?php
					$sql_trangchu = mysqli_query($mysqli,"SELECT * FROM tbl_homecategory ORDER BY homectg_id ASC"); 
					?>
					<select name="trangchu" class="form-control">
						<option value="0">-----Ch???n Ph??n M???c S???n Ph???m-----</option>
						<?php
						while($row_trangchu = mysqli_fetch_array($sql_trangchu)){
						?>
						<option value="<?php echo $row_trangchu['homectg_id'] ?>"><?php echo $row_trangchu['homectg_name'] ?></option>
						<?php 
						}
						?>
					</select><br>
					<label>Danh m???c</label>
					<?php
					$sql_danhmuc = mysqli_query($mysqli,"SELECT * FROM tbl_category ORDER BY category_id DESC"); 
					?>
					<select name="danhmuc" class="form-control">
						<option value="0">-----Ch???n danh m???c-----</option>
						<?php
						while($row_danhmuc = mysqli_fetch_array($sql_danhmuc)){
							if($id_category_1==$row_danhmuc['category_id']){
						?>
						<option selected value="<?php echo $row_danhmuc['category_id'] ?>"><?php echo $row_danhmuc['category_name'] ?></option>
						<?php 
							}else{
						?>
						<option value="<?php echo $row_danhmuc['category_id'] ?>"><?php echo $row_danhmuc['category_name'] ?></option>
						<?php
							}
						}
						?>
					</select><br>
					<input type="submit" name="capnhatsanpham" value="C???p nh???t s???n ph???m" class="btn btn-default">
				</form>
				</div>
			<?php
			}else{
				?> 
				<div class="col-md-4">
				<h4>Th??m s???n ph???m</h4>
				
				<form action="" method="POST" enctype="multipart/form-data"> <!-- enctype="multipart/form-data" g???i h??nh ???nh-->
					<label>T??n s???n ph???m</label>
					<input type="text" class="form-control" name="tensanpham" placeholder="T??n s???n ph???m"><br>
					<label>M?? s???n ph???m</label>
					<input type="text" class="form-control" name="masanpham" placeholder="M?? s???n ph???m"><br>
					<label>H??nh ???nh</label>
					<input type="file" class="form-control" name="hinhanh"><br>
					<label>H??nh ???nh ph??? 1</label>
					<input type="file" class="form-control" name="hinhanh1"><br>
					<label>H??nh ???nh ph??? 2</label>
					<input type="file" class="form-control" name="hinhanh2"><br>
					<label>H??nh ???nh ph??? 3</label>
					<input type="file" class="form-control" name="hinhanh3"><br>
					<label>Gi??</label>
					<input type="text" class="form-control" name="giasanpham" placeholder="Gi?? s???n ph???m"><br>
					<label>Gi?? khuy???n m??i</label>
					<input type="text" class="form-control" name="giakhuyenmai" placeholder="Gi?? khuy???n m??i"><br>
					<label>S??? l?????ng</label>
					<input type="text" class="form-control" name="soluong" placeholder="S??? l?????ng"><br>
					<label>Gi???i thi???u</label>
					<textarea class="form-control" name="mota"></textarea><br>
					<label>Th??ng s??? s???n ph???m</label>
					<textarea class="form-control" name="chitiet"></textarea><br>
					<label>B???ng S???n Ph???m</label>
					<?php
					$sql_trangchu = mysqli_query($mysqli,"SELECT * FROM tbl_homecategory ORDER BY homectg_id ASC"); 
					?>
					<select name="trangchu" class="form-control">
						<option value="0">-----Ch???n Ph??n M???c S???n Ph???m-----</option>
						<?php
						while($row_trangchu = mysqli_fetch_array($sql_trangchu)){
						?>
						<option value="<?php echo $row_trangchu['homectg_id'] ?>"><?php echo $row_trangchu['homectg_name'] ?></option>
						<?php 
						}
						?>
					</select><br>
					<label>Danh m???c</label>
					
					<?php
					$sql_danhmuc = mysqli_query($mysqli,"SELECT * FROM tbl_category ORDER BY category_id ASC"); 
					?>
					<select name="danhmuc" class="form-control">
						<option value="0">-----Ch???n Danh M???c-----</option>
						<?php
						while($row_danhmuc = mysqli_fetch_array($sql_danhmuc)){
						?>
						<option value="<?php echo $row_danhmuc['category_id'] ?>"><?php echo $row_danhmuc['category_name'] ?></option>
						<?php 
						}
						?>
					</select><br>
					<input type="submit" name="themsanpham" value="Th??m s???n ph???m" class="btn btn-default">
				</form>
				</div>
				<?php
			} 
			
				?>
			<div class="col-md-8">
				<h4>Li???t k?? s???n ph???m</h4>
				<?php
				$sql_select_sp = mysqli_query($mysqli,"SELECT * FROM tbl_product,tbl_category WHERE tbl_product.category_id=tbl_category.category_id ORDER BY tbl_product.product_id ASC"); 
				?> 
				<table class="table table-bordered ">
					<tr>
						<th>Th??? t???</th>
						<th>T??n s???n ph???m</th>
						<th>M?? s???n ph???m</th>
						<th>H??nh ???nh</th>
						<th>S??? l?????ng</th>
						<th>Danh m???c</th>
						<th>Gi?? s???n ph???m</th>
						<th>Gi?? khuy???n m??i</th>
						<th>Qu???n l??</th>
					</tr>
					<?php
					$i = 0;
					while($row_sp = mysqli_fetch_array($sql_select_sp)){ 
						$i++;
					?> 
					<tr>
						<td><?php echo $i ?></td>
						<td><?php echo $row_sp['product_name'] ?></td>
						<td><?php echo $row_sp['product_msp'] ?></td>
						<td><img src="../assets/image/image_product/<?php echo $row_sp['product_img'] ?>" height="100" width="120"></td>
						<td><?php echo $row_sp['product_quantity'] ?></td>
						<td><?php echo $row_sp['category_name'] ?></td>
						<td><?php echo number_format($row_sp['product_price']).'vn??' ?></td>
						<td><?php echo number_format($row_sp['product_bestsale']).'vn??' ?></td>
						<td><a href="?xoa=<?php echo $row_sp['product_id'] ?>">X??a</a> || <a href="xulysanpham.php?quanly=capnhat&capnhat_id=<?php echo $row_sp['product_id'] ?>">C???p nh???t</a></td>
					</tr>
				<?php
					} 
					?> 
				</table>
			</div>
		</div>
	</div>
	
</body>
</html>