<?php
	$a = (isset($_GET['a'])) ? $_GET['a'] : 0;
	
	switch($a)
	{
		case 1:
			include("QL_SanPham.php");
			break;
		case 2:
			include("QL_LoaiSanPham.php");
			break;
		case 3:
			include("QL_NSX.php");
			break;
		case 4:
			include("QL_TaiKhoan.php");
			break;
		case 5:
			include("QL_DonHang.php");
			break;
		default:
			include("Error.php");
			break;	
	}
?>