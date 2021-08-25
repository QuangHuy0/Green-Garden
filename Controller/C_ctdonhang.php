<?php
 if (isset($_SESSION['ss_taikhoan'])) {
 	$user = $db->get('taikhoan',array('id_user'=>$_SESSION['ss_taikhoan']));
 	$data_nhanvien = $db->get('taikhoan',array('role'<=2));
 }else{
 	header('location: ?controller=login');
 }
$id = $_GET['id_donhang'];
$product = $db->get_1('sanpham','ctdonhang','id_sanpham','id_sp',array('id_donhang'=>$id));
 require_once('./View/V_ctdonhang.php');
 ?>