
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
				<div class="border-info border rounded-top">
					<div class="rounded-top pl-3 text-white" style="background-color:#0C7E02; height:40px; line-height: 40px;">Hãy điền thông tin</div>
				</div>

				<div class="col-7">
				<form action="?controller=add_sanpham" method="post" enctype="multipart/form-data">
					<div class="row mt-5">
						<h5 class="text-dark col-md-3">Tên sản phẩm</h5>
						<input type="text" name="tensp" class="form-control col-md-6" value="<?php echo (isset($tensp))?$tensp:'' ?>">
					</div>
					<div class="row mt-1">
					<?php if (isset($error['tensp'])) {?>
						<p class="text-danger"><?php echo $error['tensp'] ?></p>			
					<?php } ?>
					</div>
					<div class="row mt-5">
						<h5 class="text col-md-3">Giá</h5>
						<input type="number" name="gia" class="form-control col-md-6" value="<?php echo (isset($gia))?$gia:'' ?>">
					</div>
					<div class="row mt-1">
					<?php if (isset($error['gia'])) {?>
						<p class="text-danger"><?php echo $error['gia'] ?></p>			
					<?php } ?>
					</div>
					<div class="row mt-5">
						<h5 class="text col-md-3">Số lượng</h5>
						<input type="text" name="tonkho" class="form-control col-md-6" value="<?php echo (isset($tonkho))?$tonkho:'' ?>">
					</div>
					<div class="row mt-1">
					<?php if (isset($error['tonkho'])) {?>
						<p class="text-danger"><?php echo $error['tonkho'] ?></p>			
					<?php } ?>
					</div>
					<div class="row mt-5">
						<h5 class="text-dark col-md-3">Xuất xứ</h5>
						<input type="text" name="xuatxu" class="form-control col-md-6" value="<?php echo (isset($xuatxu))?$xuatxu:'' ?>">
					</div>
					<div class="row mt-5">
						<h5 class="text-dark col-md-3">Danh Mục</h5>
						<select name="danhmuc">
							<?php foreach ($dm as $key => $value) {?>
							<option name="danhmuc" value="<?php echo $value['id_danhmuc'] ?>"><?php echo $value['danhmuc'] ?>
							</option>
							<?php } ?>
						</select>
					</div>
					<div class="row mt-1">
					<?php if (isset($error['danhmuc'])) { ?>
						<p class="text-danger"><?php echo $error['danhmuc'] ?></p>
					<?php } ?>
					</div>
					<div class="row mt-5">
						<h5 class="text-dark col-md-3">Hình ảnh</h5>
						<input type="file" name="anh" class="col-md-6" value="<?php echo (isset($anh))?$anh:'' ?>">
					</div>
					<div class="row mt-1">
					<?php if (isset($error['anh'])) { ?>
						<p class="text-danger"><?php echo $error['anh'] ?></p>
					<?php } ?>
					</div>
					<div class="row mt-5">
						<h5 class="text-dark col-md-3">Chi tiết</h5>
						<textarea name="chitiet" class="form-control col-md-6" value="<?php echo (isset($chitiet))?$chitiet:'' ?>"></textarea>
					</div>


					<div class="row mt-5">
						<button type="submit" style="background-color:#0C7E02;" class="col-md-3 btn m-auto text-white" name="btn_createsp">Thêm sản phẩm</button>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>