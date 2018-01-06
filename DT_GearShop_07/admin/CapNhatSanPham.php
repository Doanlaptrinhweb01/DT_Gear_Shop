<?php
	session_start();
		include('../lib/DataProvider.php');
	if(isset($_SESSION['masp']))
	{
		$sql = "SELECT * From sanpham WHERE MaSanPham='".$_SESSION['masp']."'";
		$result = DataProvider::ExcuteQuery($sql);
		
		echo $sql;
	}
?>