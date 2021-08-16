<?php
	if(isset($_SESSION['ss_taikhoan'])) {
		$user = $db->get('taikhoan',array("id_user"=>$_SESSION['ss_taikhoan']));
	}else{
		header('location: ?controller=login');
	}
	require_once('./view/V_trangchu.php');
?>