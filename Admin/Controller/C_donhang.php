<?php
$kh = $db->get('khachhang',array());
 if (isset($_SESSION['ss_taikhoan'])) {
 	$user = $db->get('taikhoan',array('id_user'=>$_SESSION['ss_taikhoan']));
 	$data_nhanvien = $db->get('taikhoan',array('role'<=2));
 }else{
 	header('location: ?controller=login');
 }
if (isset($_GET['keyword'])) {
		$keyword = $_GET['keyword'];
		$donhang = $db->get_like1('donhang','khachhang','tinhtrang_dh','id_donhang',$keyword);
	}else{
		$donhang = $db->get_dh('donhang','khachhang','tinhtrang_dh','id_kh','id_kh','id_tinhtrang','id_tinhtrang');
	}
 require_once('./View/V_donhang.php');
 ?>

