<?php
if (isset($_SESSION['ss_taikhoan'])) {
 	$user = $db->get('taikhoan',array('id_user'=>$_SESSION['ss_taikhoan']));
 	$data_nhanvien = $db->get('taikhoan',array('role'<=2));
 }else{
 	header('location: ?controller=login');
 }
$dt = $db->get('profit',array());


require_once('./View/V_profit.php');
?>