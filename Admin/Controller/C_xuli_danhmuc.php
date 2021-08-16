<?php
	if (isset($_SESSION['ss_taikhoan'])) {
		$user = $db->get('taikhoan',array('id_user'=>$_SESSION['ss_taikhoan']));
		if ($user[0]['role']<=2) {
			switch ($_GET['method']) {
				case 'edit':
					$id = $_GET['id_danhmuc'];
					$data_danhmuc = $db->get('danhmuc',array('id_danhmuc'=>$id));
					if (isset($_POST['btn_editdm'])) {
						$danhmuc = $_POST['danhmuc'];


						$error = array();
						if ($danhmuc=='') {
							$error['danhmuc']="Tên danh mục không được để trống";
						}
						if (!$error) {
							$db->update('danhmuc',array(
								'danhmuc'=>$danhmuc),array('id_danhmuc'=>$id));
						header('location: ?controller=danhmuc');
						}
					}
					require_once('./View/V_xuli_danhmuc.php');
					break;
				case 'del':
					$id = $_GET['id_danhmuc'];
					$db->delete('danhmuc',array('id_danhmuc'=>$id));
					header('location: ?controller=danhmuc');
					break;
				default:
					header('location: ?controller=danhmuc');
					break;
			}
		}else{
			header('location: ?controller=danhmuc');
		}
	}else{
		header('location: ?controller=login');
	}
?>