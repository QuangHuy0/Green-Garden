<?php 
	if (isset($_SESSION['ss_taikhoan'])) {
		$user = $db->get('taikhoan',array('id_user'=>$_SESSION['ss_taikhoan']));
		if ($user[0]['role']==1) {
			switch ($_GET['method']) {
				case 'edit':
					$id = $_GET['id_user'];
					$data_nhanvien = $db->get('taikhoan',array('id_user'=>$id));
					if (isset($_POST['btn_edit'])) {
						$password = $_POST['password'];
						$fullname = $_POST['fullname'];
						$email = $_POST['email'];
						$sdt = $_POST['sdt'];

						$error= array();
						if ($password=='') {
							$error['password']="Mật khẩu không được để trống";
						}
						if ($fullname=='') {
							$error['fullname']="Họ tên không được để trống";
						}
						if ($sdt=='') {
							$error['sdt']="Cho xin số đi mờ";
						}
						if (!$error) {
							$db->update('taikhoan',array(
								'password'=>$password,
								'fullname'=>$fullname,
								'sdt'=>$sdt,
								'email'=>$email),array('id_user'=>$id));
						header('location: ?controller=nhanvien');
						}
					}
					require_once('./view/V_xuli_nhanvien.php');
					break;
				case 'del':
					$id = $_GET['id_user'];
					$db->delete('taikhoan',array('id_user'=>$id));
					header('location: ?controller=nhanvien');
					break;

				default:
					header('location: ?controller=nhanvien');
					break;
			}
		}else{
			header('location: ?controller=nhanvien');
		}
	}else{
		header('location: ?controller=login');
	}
?>