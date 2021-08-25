<?php
	if (isset($_SESSION['ss_taikhoan'])) {
		$user = $db->get('taikhoan',array('id_user'=>$_SESSION['ss_taikhoan']));
		if ($user[0]['role']<=2) {
			switch ($_GET['method']) {
				case 'edit':
					$id = $_GET['id_banner'];
					$data_banner = $db->get('banner',array('id_banner'=>$id));
					if (isset($_POST['btn_editbn'])) {
						$banner = $_FILES['banner']['name'];

						$error = array();
						if ($banner=='') {
							$error['banner']="Bạn chưa chọn ảnh";
						}else{
							if ($_FILES['banner']['type'] == "image/jpeg" || $_FILES['banner']['type'] == "image/png" || $_FILES['banner']['type'] == "image/gif") {

								$banner_url="../img/" . $banner;
								move_uploaded_file($_FILES['banner']['tmp_name'], $banner_url);
							}else{
								$error['banner']="Vui lòng chọn file ảnh png, jpg hay gif";
							}
						}
						if (!$error) {
							$db->update('banner',array(
								'banner'=>$banner_url),array('id_banner'=>$id));
						header('location: ?controller=banner');
						}
					}
					require_once('./View/V_xuli_banner.php');
					break;
				case 'del':
					$id = $_GET['id_banner'];
					$db->delete('banner',array('id_banner'=>$id));
					header('location: ?controller=banner');
					break;
				default:
					header('location: ?controller=banner');
					break;
			}
		}else{
			header('location: ?controller=banner');
		}
	}else{
		header('location: ?controller=login');
	}
?>