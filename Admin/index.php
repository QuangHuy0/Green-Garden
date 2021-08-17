ghhhh<?php
session_start();
require('./Model/m_database.php');
$db = new database();

if (isset($_GET['controller'])) {
	$controller = $_GET['controller'];
}else{
	$controller = 'login';
}

switch ($controller) {
	case 'login':
		require_once('./controller/C_login.php');
		break;
	case 'trangchu':
		require_once('./controller/C_trangchu.php');
		break;
	case 'logout':
		require_once('./controller/C_logout.php');
		break;
	case 'nhanvien':
		require_once('./controller/C_nhanvien.php');
		break;
	case 'add_nhanvien':
		require_once('./controller/C_add_nhanvien.php');
		break;
	case 'xuli_nhanvien':
		require_once('./controller/C_xuli_nhanvien.php');
		break;
	case 'sanpham':
		require_once('./controller/C_sanpham.php');
		break;
	case 'add_sanpham':
		require_once('./controller/C_add_sanpham.php');
		break;
	case 'xuli_sanpham':
		require_once('./controller/C_xuli_sanpham.php');
		break;
	case 'donhang':
		require_once('./controller/C_donhang.php');
		break;
	case 'khachhang':
		require_once('./controller/C_khachhang.php');
		break;
	case 'add_khachhang':
		require_once('./controller/C_add_khachhang.php');
		break;
	case 'xuli_khachhang':
		require_once('./controller/C_xuli_khachhang.php');
		break;
	case 'profit':
		require_once('./controller/C_profit.php');
		break;
	case 'danhmuc':
		require_once('./controller/C_danhmuc.php');
		break;
	case 'add_danhmuc':
		require_once('./controller/C_add_danhmuc.php');
		break;
	case 'xuli_danhmuc':
		require_once('./controller/C_xuli_danhmuc.php');
		break;
	case 'ctdonhang':
		require_once('./controller/C_ctdonhang.php');
		break;
	case 'xuli_donhang':
		require_once('./controller/C_xuli_donhang.php');
		break;
		
	
	default:
		echo "Loli";
		break;
}
?>
