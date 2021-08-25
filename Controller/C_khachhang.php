<?php
	if(isset($_SESSION['ss_taikhoan'])) {
		$user = $db->get('taikhoan',array('id_user'=>$_SESSION['ss_taikhoan']));
		$data_nhanvien = $db->get('taikhoan',array('role'<=2));
	}else{
		header('location: ?controller=login');
	}
	$data_khachhang = $db->get('khachhang',array());
	require_once('./view/V_khachhang.php');
?>