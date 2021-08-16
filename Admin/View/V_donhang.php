<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="">
		<div style="background-color:#0C7E02; height: 40px; line-height: 40px;" class="row">
			<div class="col-9 text-white pl-5 ">Chào mừng <?php echo $user[0]['fullname'] ?></div>
			<div class="col-3 text-white">
				<ul class="nav">
					<li class="nav-item"><a class="text-white pl-3" href="?controller=trangchu">Trang chủ</a></li>
					<li class="nav-item"><a class="text-white pl-5" href="?controller=logout">Đăng Xuất</a></li>
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
				<div class="border-info border rounded-top col-13">
					<div>
						<div class="rounded-top pl-3 text-white" style="background-color:#0C7E02; height:40px; line-height: 40px;">Danh sách đơn hàng</div>
					</div>
					<div class="row mt-3">
						<form class="form-inline ml-5 my-2 my-lg-0" method="get" action="index.php">
	    					<input type="hidden" name="controller" value="donhang">
	      					<input name="keyword" class="form-control " type="search" placeholder="Mã đơn hàng" aria-label="Search" value="<?php echo (isset($_GET['keyword'])) ? $_GET['keyword'] : '' ?>">
	      					<button id="btn-search" class="btn btn-default" type="submit">Tìm kiếm</button>
				    	</form>
					</div>
					<div class="col-13 mt-5">
						<table class="table">
						  <thead class="text-white"  style="background-color:#0C7E02;">
					    	<tr>
					    	  <th scope="col" class="text-center">Id</th>
					    	  <th scope="col" class="text-center">Khách hàng</th>
					    	  <th scope="col" class="text-center">SDT</th>
					    	  <th scope="col" class="text-center">Tổng giá trị</th>
					    	  <th scope="col" class="text-center">Tình trạng</th>
					    	  <th scope="col" class="text-center">Hành động</th>
					    	</tr>
					    	<?php foreach ($donhang as $key => $value) {?>
						  </thead>
						  <tbody>
						    <tr>
						      <th scope="row" class="text-center border border-info align-middle"><?php echo $value['id_donhang'] ?></th>
						      <td class="border border-info align-middle"> <?php echo $value['name'] ?></td>
						      <td class="text-center border border-info align-middle"> <?php echo $value['sdt'] ?></td>
						      <td class="text-center border border-info align-middle"><?php echo $value['tong'] ?></td>
						      <td class="text-center border border-info align-middle"><?php
						      echo $value['tinhtrang']; ?></td>

						      <td class="text-center border border-info align-middle">
						      	<a class=" btn btn-primary" href="?controller=ctdonhang&id_donhang=<?php echo $value['id_donhang'] ?>">Chi tiết đơn hàng</a>
						      	<a class="btn btn-danger mx-2" href="?controller=xuli_donhang&method=del&id_donhang=<?php echo $value['id_donhang'] ?>">Hủy đơn hàng</a>
						      	<a class="btn btn-primary" href="?controller=xuli_donhang&method=edit&id_donhang=<?php echo $value['id_donhang'] ?>">Duyệt đơn hàng</a>

						      </td>
						     <?php } ?>
						    </tr>
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>