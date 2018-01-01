<?php
	session_start();
	unset($_SESSION['tenHT']);
	unset($_SESSION['giohang']);
	//$message = "Đăng Xuất Thành Công";
	echo '<script type="text/javascript">alert("Đăng Xuất Thành Công");</script>';
	header("location:index.php");	

?>