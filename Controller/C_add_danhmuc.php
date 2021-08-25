<?php
if (isset($_SESSION['ss_taikhoan'])) {
	$user = $db->get('taikhoan',array('id_user'=>$_SESSION['ss_taikhoan']));
	if ($user[0]['role']<=2) {
		if(isset($_POST['btn_createdm'])) {
			$tendm = $_POST['tendm'];

			$error = array();
			if ($tendm=='') {
				$error['tendm']="Bạn chưa nhập tên danh mục";
			}

			if (!$error) {
				$danhmuc_create = $db->get('danhmuc', array('danhmuc'=>$tendm));
				if (!empty($danhmuc_create)) {
					$error['tendm']="Danh mục đã tồn tại";
				}
			}

			if (!$error) {
				$db->insert('danhmuc', array(
					'danhmuc'=>$tendm
				));
				header('location: ?controller=danhmuc');
			}
		}
	}else{
			header('location: ?controller=danhmuc');
		} 
}else{
		header('location: ?controller=login');
	}
require_once('./view/V_add_danhmuc.php');
?>