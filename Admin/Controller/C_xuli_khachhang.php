<?php 
	if (isset($_SESSION['ss_taikhoan'])) {
		$user = $db->get('taikhoan',array('id_user'=>$_SESSION['ss_taikhoan']));
		if ($user[0]['role']==1) {
			switch ($_GET['method']) {
				case 'edit':
					$id = $_GET['id_kh'];
					$data_khachhang = $db->get('khachhang',array('id_kh'=>$id));
					if (isset($_POST['btn_edit'])) {
						$name = $_POST['name'];
						$sdt = $_POST['sdt'];
						$email = $_POST['email'];
						$Diachi = $_POST['Diachi'];

						$error= array();
						if ($name=='') {
							$error['name']="Tên khách hàng không được để trống";
						}
						if ($sdt=='') {
							$error['sdt']="Cho mình xin số điiii";
						}

						if (!$error) {
							$db->update('khachhang',array(
								'name'=>$name,
								'sdt'=>$sdt,
								'email'=>$email,
								'Diachi'=>$Diachi),array('id_kh'=>$id));
						header('location: ?controller=khachhang');
						}
					}
					require_once('./view/V_xuli_khachhang.php');
					break;
				case 'del':
					$id = $_GET['id_kh'];
					$db->delete('khachhang',array('id_kh'=>$id));
					header('location: ?controller=khachhang');
					break;
				default:
					header('location: ?controller=khachhang');
					break;
			}
		}else{
			header('location: ?controller=khachhang');
		}
	}else{
		header('location: ?controller=login');
	}
?>