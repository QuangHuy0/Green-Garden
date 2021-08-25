<?php
$dm = $db->get('danhmuc',array());
if (isset($_SESSION['ss_taikhoan'])) {
	$user = $db->get('taikhoan',array('id_user'=>$_SESSION['ss_taikhoan']));
	if ($user[0]['role']<=2) {
		if(isset($_POST['btn_createbn'])) {
			$banner = $_FILES['banner']['name'];

			$error = array();
			if ($banner=='') {
				$error['banner']="Bạn chưa chọn hình ảnh";
			}else{
				if ($_FILES['banner']['type'] == "image/jpeg" || $_FILES['banner']['type'] == "image/png" || $_FILES['banner']['type'] == "image/gif") {
					$banner_url="../img/" . $banner;
					move_uploaded_file($_FILES['banner']['tmp_name'], $banner_url);
				}else{
					$error['banner']="Vui lòng chọn file ảnh png, jpg hay gif";
				}
			}
			if (!$error) {
				$db->insert('banner', array(
					'banner'=>$banner_url,
				));
				header('location: ?controller=banner');
			}
		}
	}else{
			header('location: ?controller=banner');
		} 
}else{
		header('location: ?controller=login');
	}
require_once('./view/V_add_banner.php');
?>