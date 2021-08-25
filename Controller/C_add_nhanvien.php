<?php
if(isset($_SESSION['ss_taikhoan'])) {
	$user = $db->get('taikhoan',array('id_user'=>$_SESSION['ss_taikhoan']));
	if ($user[0]['role']==1) {
		if(isset($_POST['btn_create'])) {
			$username=$_POST['username'];
			$password=$_POST['password'];
			$fullname=$_POST['fullname'];
			$email=$_POST['email'];
			$sdt=$_POST['sdt'];
			$diachi=$_POST['diachi'];
			$error=array();

			if($username=='') {
				$error['username']="Tài khoản không được để trống";
			}
			if($password=='') {
				$error['password']="Mật khẩu không được để trống";
			}
			if($fullname=='') {
				$error['fullname']="Họ tên không được để trống";
			}

			if (!$error) {
				$nhanvien_create = $db->get('taikhoan',array('username'=>$username));
				if(!empty($nhanvien_create)) {
					$error['username']="Tài khoản đã được sử dụng";
				}
			}

			if (!$error) {
				$db->insert('taikhoan',array(
					'username'=>$username,
					'password'=>$password,
					'fullname'=>$fullname,
					'email'=>$email,
					'sdt'=>$sdt,
					'diachi'=>$diachi,
					'role'=>2
				));
				header('location: ?controller=nhanvien');
			}
		}
	}else{
		header('location: ?controller=nhanvien');
	}
}else{
	header('location: ?controller=login');
}
require_once('./view/V_add_nhanvien.php');
?>