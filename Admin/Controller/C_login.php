<?php
if(isset($_SESSION['ss_taikhoan'])) {
	header('location: ?controller=trangchu');
}

if(isset($_POST['btn_login'])) {
	$username=$_POST['username'];
	$password=$_POST['password'];
	$error=array();
	if ($username=='') {
		$error['username']="Tài khoản không được để trống";
	}
	if ($password=='') {
		$error['password']="Mật khẩu không được để trống";
	}
	if (!$error) {
		$user = $db->get('taikhoan',array('username'=>$username));
		if(empty($user)) {
			$error['username']="Tài khoản này không tồn tại";
		}else{
			if($password!=$user[0]['password']) {
				$error['password']="Bạn nhập sai mật khẩu";
			}
		}
	}
	if (!$error) {
		$_SESSION['ss_taikhoan']=$user[0]['id_user'];
		header('location: ?controller=trangchu');
	}
}
require_once('./view/V_login.php');
?>