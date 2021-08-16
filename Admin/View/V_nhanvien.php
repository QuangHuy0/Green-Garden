<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
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
						<div class="rounded-top pl-3 text-white" style="background-color:#0C7E02; height:40px; line-height: 40px;">Quản lý nhân viên</div>
						<div class="row float-right m-2"><a href="?controller=add_nhanvien" style="background-color:#0C7E02;" class="btn text-white">Thêm nhân viên</a></div>
					</div>
					<div class="col-13 mt-5">
					<?php if ($user[0]['role']==1) {?>
						<table class="table">
						  <thead class="text-white"  style="background-color:#0C7E02;">
					    	<tr>
					    	  <th scope="col" class="text-center">Id</th>
					    	  <th scope="col" class="text-center">Tên đăng nhập</th>
					    	  <th scope="col" class="text-center">Họ tên</th>
					    	  <th scope="col" class="text-center">Email</th>
					    	  <th scope="col" class="text-center">Số ĐT</th>
					    	  <th scope="col" class="text-center">Thao tác</th>
					    	</tr>
						  </thead>
						  <tbody>
						    <tr>
						    <?php foreach ($data_nhanvien as $key => $value) {?>
						      <th scope="row" class="text-center border border-info align-middle"><?php echo $value['id_user'] ?></th>
						      <td class=" border border-info align-middle"><?php echo $value['username'] ?></td>
						      <td class="border border-info align-middle"><?php echo $value['fullname'] ?></td>
						      <td class="border border-info align-middle"><?php echo $value['email'] ?></td>
						      <td class="border border-info align-middle"><?php echo $value['sdt'] ?></td>
						      <td class="text-center border border-info align-middle">
						      	 <a href="?controller=xuli_nhanvien&method=edit&id_user=<?php echo $value['id_user'] ?>" class="btn btn-success mx-3">Sửa</a>
						      	 <a href="?controller=xuli_nhanvien&method=del&id_user=<?php echo $value['id_user'] ?>" class="btn btn-danger">Xóa</a>
						      </td>
						    </tr>
						    <?php } ?>
						  </tbody>
						</table>
					</div>
				<?php }else{?>
					<div class="row">
						<h3 class="text-center text-danger col-md-12">Bạn không có quyền </h3>
					</div>
				<?php } ?>
					
				</div>

			</div>
		</div>
	</div>
</body>
</html>