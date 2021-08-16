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
						<div class="rounded-top pl-3 text-white" style="background-color:#0C7E02; height:40px; line-height: 40px;">Danh sách sản phẩm</div>
						<div class="row float-right m-2"><a href="?controller=add_sanpham" style="background-color:#0C7E02;" class="btn text-white">Thêm sản phẩm</a></div>
					</div>
					<div class="row mt-3">
						<form class="form-inline my-2 my-lg-0" method="get" action="index.php">
	    					<input type="hidden" name="controller" value="sanpham">
	      					<input name="keyword" class="form-control " type="search" placeholder="Tên sản phẩm" aria-label="Search" value="<?php echo (isset($_GET['keyword'])) ? $_GET['keyword'] : '' ?>">
	      					<button id="btn-search" class="btn btn-default" type="submit">Tìm kiếm</button>
				    	</form>
					</div>
					<div class="col-13 mt-5">
						<table class="table">
						  <thead class="text-white"  style="background-color:#0C7E02;">
					    	<tr>
					    	  <th scope="col" class="text-center">Id</th>
					    	  <th scope="col" class="text-center">Ảnh</th>
					    	  <th scope="col" class="text-center">Tên sản phẩm</th>
					    	  <th scope="col" class="text-center">Tồn kho</th>
					    	  <th scope="col" class="text-center">Đã bán</th>
					    	  <th scope="col" class="text-center">Sửa</th>
					    	  <th scope="col" class="text-center">Xóa</th>
					    	</tr>
					    	<?php foreach ($product as $key => $value) {?>
						  </thead>
						  <tbody>
						    <tr>
						      <th scope="row" class="text-center border border-info align-middle"><?php echo $value['id_sanpham'] ?></th>
						      <td  class="border border-info"style="width: 150px;"><img style="width: 150px; height: 80px;" src="<?php echo $value['anh'] ?>"></td>
						      <td class="border border-info align-middle"><?php echo $value['tensp'] ?></td>
						      <td class="text-center border border-info align-middle"><?php echo $value['tonkho'] ?></td>
						      <td class="text-center border border-info align-middle"><?php echo $value['daban'] ?></td>
						      
						      <td class="text-center border border-info align-middle">
						      	 <a href="?controller=xuli_sanpham&method=edit&id_sanpham=<?php echo $value['id_sanpham'] ?>" class="btn btn-success">Sửa</a>
						      </td>
						      <td class="text-center border border-info align-middle"><a href="?controller=xuli_sanpham&method=del&id_sanpham=<?php echo $value['id_sanpham'] ?>" class="btn btn-danger">Xóa</a></td>
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