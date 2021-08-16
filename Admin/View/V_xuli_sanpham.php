<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="">
		<div style="background-color:#0C7E02;" class="row">
			<div class="col-9 text-white pl-5 pt-1">Chào mừng <?php echo $user[0]['fullname'] ?></div>
			<div class="col-3 text-white">
				<ul class="nav">
					<li class="nav-item"><a class="text-white btn" href="?controller=trangchu">Trang chủ</a></li>
					<li class="nav-item"><a class="text-white btn" href="?controller=logout">Đăng Xuất</a></li>
				</ul>
			</div>
		</div>
		

		<div class="row">
			<div class="col-2 mt-2 mx-4">
				<div style="background-color:#0C7E02; height:40px; line-height: 40px;" class="text-white rounded-top pl-2">Admin Menu</div>
				<div class="bg-light text-dark rounded-bottom border">
					<ul class="list-unstyled">
						<li class="border-bottom"><a class="text-dark btn btn-light col-12 text-left" href="?controller=nhanvien">Nhân viên</a></li>
						<li class="border-bottom"><a class="text-dark btn btn-light col-12 text-left" href="?controller=sanpham">Sản phẩm</a></li>
						<li class="border-bottom"><a class="text-dark btn btn-light col-12 text-left" href="?controller=danhmuc">Danh mục</a></li>
						<li class="border-bottom"><a class="text-dark btn btn-light col-12 text-left" href="?controller=donhang">Đơn hàng</a></li>
						<li class="border-bottom"><a class="text-dark btn btn-light col-12 text-left" href="?controller=khachhang">Khách hàng</a></li>
						<li class="border-bottom"><a class="text-dark btn btn-light col-12 text-left" href="?controller=profit">Doanh thu</a></li>
					</ul>
				</div>
			</div>
		
			<div class="col-9 mt-2">
				<div class="border-info border rounded-top text-white">
					<div class="rounded-top pl-3" style="background-color:#0C7E02; height:40px; line-height: 40px;">Hãy điền thông tin</div>
				</div>
				<div class="col-md-9">
					<form action="?controller=xuli_sanpham&method=edit&id_sanpham=<?php echo $_GET['id_sanpham'] ?>" method="post" enctype="multipart/form-data">
					<div class="row mt-5">
						<h5 class="text col-md-2">Tên sản phẩm</h5>
						<input type="text" name="tensp" class="form-control col-md-6" value="<?php echo $data_sanpham[0]['tensp'] ?>">
					</div>
					<div class="row mt-1">
						<?php if (isset($error['tensp'])) {?>
						<p class="text-danger"><?php echo $error['tensp'] ?></p>
						<?php } ?>
					</div>
					<div class="row mt-5">
						<h5 class="text col-md-2">Giá</h5>
						<input type="number" name="gia" class="form-control col-md-6" value="<?php echo $data_sanpham[0]['gia'] ?>">
					</div>
					<div class="row mt-5">
						<h5 class="text col-md-2">Số lượng</h5>
						<input type="text" name="tonkho" class="form-control col-md-6" value="<?php echo $data_sanpham[0]['tonkho'] ?>">
					</div>
					<div class="row mt-5">
						<h5 class="text col-md-2">Xuất xứ</h5>
						<input type="text" name="xuatxu" class="form-control col-md-6" value="<?php echo $data_sanpham[0]['xuatxu'] ?>">
					</div>
					<div class="row mt-5">
						<h5 class="text col-md-2">Hình ảnh</h5>
						<input type="file" name="anh" class="col-md-6" value="<?php echo $data_sanpham[0]['anh'] ?>">
					</div>
					<div class="row mt-1">
						<?php if (isset($error['anh'])) {?>
						<p class="text-danger"><?php echo $error['anh'] ?></p>
						<?php } ?>
					</div>
					<div class="row mt-5">
						<h5 class="text col-md-2">Chi tiết</h5>
						<textarea name="chitiet" class="form-control col-md-6" value="<?php echo $data_sanpham[0]['chitiet'] ?>"></textarea>
					</div>

					<div class="row mt-5">
						<button type="submit" style="background-color:#0C7E02;" class="col-md-3 btn text-white m-auto" name="btn_editsp">Xác nhận</button>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>