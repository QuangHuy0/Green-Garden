<?php
	if (isset($_SESSION['ss_taikhoan'])) {
		$user = $db->get('taikhoan',array('id_user'=>$_SESSION['ss_taikhoan']));
		if ($user[0]['role']<=2) {
			switch ($_GET['method']) {
				case 'edit':
					$id = $_GET['id_sanpham'];
					$data_sanpham = $db->get('sanpham',array('id_sanpham'=>$id));
					if (isset($_POST['btn_editsp'])) {
						$tensp = $_POST['tensp'];
						$anh = $_FILES['anh']['name'];
						$gia = $_POST['gia'];
						$tonkho = $_POST['tonkho'];
						$xuatxu = $_POST['xuatxu'];
						$chitiet = $_POST['chitiet'];


						$error = array();
						if ($tensp=='') {
							$error['tensp']="Tên sản phẩm không được để trống";
						}
						if ($anh=='') {
							$error['anh']="Bạn chưa chọn ảnh";
						}else{
							if ($_FILES['anh']['type'] == "image/jpeg" || $_FILES['anh']['type'] == "image/png" || $_FILES['anh']['type'] == "image/gif") {

								$anh_url="../img/" . $anh;
								move_uploaded_file($_FILES['anh']['tmp_name'], $anh_url);
							}else{
								$error['anh']="Vui lòng chọn file ảnh png, jpg hay gif";
							}
						}

						if (!$error) {
							$db->update('sanpham',array(
								'tensp'=>$tensp,
								'gia'=>$gia,
								'tonkho'=>$tonkho,
								'xuatxu'=>$xuatxu,
								'chitiet'=>$chitiet,
								'anh'=>$anh_url),array('id_sanpham'=>$id));
						header('location: ?controller=sanpham');
						}
					}
					require_once('./View/V_xuli_sanpham.php');
					break;
				case 'del':
					$id = $_GET['id_sanpham'];
					$db->delete('sanpham',array('id_sanpham'=>$id));
					header('location: ?controller=sanpham');
					break;
				default:
					header('location: ?controller=sanpham');
					break;
			}
		}else{
			header('location: ?controller=sanpham');
		}
	}else{
		header('location: ?controller=login');
	}
?>