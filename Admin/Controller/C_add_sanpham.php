<?php
$dm = $db->get('danhmuc',array());
if (isset($_SESSION['ss_taikhoan'])) {
	$user = $db->get('taikhoan',array('id_user'=>$_SESSION['ss_taikhoan']));
	if ($user[0]['role']<=2) {
		if(isset($_POST['btn_createsp'])) {
			$tensp = $_POST['tensp'];
			$gia = $_POST['gia'];
			$tonkho = $_POST['tonkho'];
			$xuatxu = $_POST['xuatxu'];
			$anh = $_FILES['anh']['name'];
			$chitiet = $_POST['chitiet'];
			$danhmuc = $_POST['danhmuc'];

			$error = array();
			if ($tensp=='') {
				$error['tensp']="Bạn chưa nhập tên sản phẩm";
			}
			if ($gia=='') {
				$error['gia']="Bạn chưa nhập đơn giá";
			}
			if ($danhmuc=='') {
				$error['danhmuc']="Bạn chưa chọn danh mục";
			}
			if ($tonkho=='') {
				$error['tonkho']="Bạn nhập vào bao nhiêu vậy?";
			}else
			if ($anh=='') {
				$error['anh']="Bạn chưa chọn hình ảnh";
			}else{
				if ($_FILES['anh']['type'] == "image/jpeg" || $_FILES['anh']['type'] == "image/png" || $_FILES['anh']['type'] == "image/gif") {
					$anh_url="../img/" . $anh;
					move_uploaded_file($_FILES['anh']['tmp_name'], $anh_url);
				}else{
					$error['anh']="Vui lòng chọn file ảnh png, jpg hay gif";
				}
			}

			if (!$error) {
				$sanpham_create = $db->get('sanpham', array('tensp'=>$tensp));
				if (!empty($sanpham_create)) {
					$error['tensp']="Sản phẩm đã tồn tại";
				}
			}
			if (!$error) {
				$db->insert('sanpham', array(
					'tensp'=>$tensp,
					'gia'=>$gia,
					'tonkho'=>$tonkho,
					'xuatxu'=>$xuatxu,
					'anh'=>$anh_url,
					'chitiet'=>$chitiet,
					'trangthai'=>1,
					'daban'=>0,
					'id_dm'=>$danhmuc,
					'nguoitao'=>$user[0]['fullname']
				));
				header('location: ?controller=sanpham');
			}
		}
	}else{
			header('location: ?controller=sanpham');
		} 
}else{
		header('location: ?controller=login');
	}
require_once('./view/V_add_sanpham.php');
?>