<?php
 if (isset($_SESSION['ss_taikhoan'])) {
 	$user = $db->get('taikhoan',array('id_user'=>$_SESSION['ss_taikhoan']));
 	$data_nhanvien = $db->get('taikhoan',array('role'<=2));
 }else{
 	header('location: ?controller=login');
 }
if (isset($_GET['keyword'])) {
		$keyword = $_GET['keyword'];
		$product = $db->get_like('sanpham','tensp',$keyword);
	}else{
		$product = $db->get('sanpham',array());
	}
 require_once('./View/V_sanpham.php');
 ?>