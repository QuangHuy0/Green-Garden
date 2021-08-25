<?php
if(isset($_SESSION['ss_taikhoan'])) {
	$user = $db->get('taikhoan',array('id_user'=>$_SESSION['ss_taikhoan']));
	if ($user[0]['role']==1) {
		if(isset($_POST['btn_create'])) {
			$name=$_POST['name'];
			$sdt=$_POST['sdt'];
			$email=$_POST['email'];
			$diachi=$_POST['Diachi'];
			$error=array();

			if($name=='') {
				$error['name']="Tên khách hàng không được để trống";
			}
			if($sdt=='') {
				$error['sdt']="SDT không được để trống";
			}

			if (!$error) {
				$khachhang_create = $db->get('khachhang',array('name'=>$name));
				if(!empty($khachhang_create)) {
					$error['name']="Tên khách hàng đã tồn tại";
				}
			}

			if (!$error) {
				$db->insert('khachhang',array(
					'name'=>$name,
					'sdt'=>$sdt,
					'email'=>$email,
					'Diachi'=>$diachi,
				));
				header('location: ?controller=khachhang');
			}
		}
	}else{
		header('location: ?controller=khachhang');
	}
}else{
	header('location: ?controller=login');
}
require_once('./view/V_add_khachhang.php');
?>