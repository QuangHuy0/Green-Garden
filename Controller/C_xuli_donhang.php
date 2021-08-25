<?php
	if (isset($_SESSION['ss_taikhoan'])) {
		$user = $db->get('taikhoan',array('id_user'=>$_SESSION['ss_taikhoan']));
		if ($user[0]['role']<=2) {
			switch ($_GET['method']) {
				case 'edit':
					$id = $_GET['id_donhang'];
					$data_donhang = $db->get('donhang',array('id_donhang'=>$id));
					$db->update('donhang',array('id_tinhtrang'=>1),array('id_donhang'=>$id));
					header('location: ?controller=donhang');
					break;
				case 'del':
					$id = $_GET['id_donhang'];
					$data_donhang = $db->get('donhang',array('id_donhang'=>$id));
					$db->update('donhang',array('id_tinhtrang'=>2),array('id_donhang'=>$id));
					header('location: ?controller=donhang');
					break;

				default:
					header('location: ?controller=donhang');
					break;
			}
		}else{
			header('location: ?controller=donhang');
		}
	}else{
		header('location: ?controller=login');
	}
?>