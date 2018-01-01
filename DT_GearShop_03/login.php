<?php
	session_start();
	include_once('lib/DataProvider.php');
	$tenDangNhap = "";
	$matKhau = "";
	$tenHienThi = "";
	$maBaoMat = "";
	$err = "";
	if(isset($_POST['btnDangNhap']))
	{
		$tenDangNhap = $_POST['txtTenDangNhap'];
		$matKhau = $_POST['txtMatKhau'];
		$maBaoMat = $_POST['txtMaBaoMat'];
		if(empty($tenDangNhap))
		{
			$err = "<p style='color:red'>Vui lòng nhập tài khoản.</p>";
		}
		
		else if(empty($matKhau))
		{
			$err = "<p style='color:red'>Vui lòng nhập mật khẩu.</p>";
		}
		
		
		else if(empty($maBaoMat))
		{
			$err = "<p style='color:red'>Nhập mã bảo mật.</p>";
		}
		
		
		else
		{
			$sql = "SELECT MaTaiKhoan, TenDangNhap, MatKhau, TenHienThi FROM taikhoan WHERE BiXoa=0 AND TenDangNhap='$tenDangNhap'";
			$result = DataProvider::ExcuteQuery($sql);
			
			$row = mysqli_fetch_row($result);
			
			if($tenDangNhap == $row[1] && $matKhau== $row[2])
			{
				$tenHienThi = $row[3];
				$_SESSION['tenHT'] = $tenHienThi;
			}
			
			if(isset($_SESSION['tenHT']))
			{
				header('location:index.php');
			}
			
			else
			{
				$err = "<p style='color:red'>Đăng nhập thất bại</br>Vui lòng kiểm tra lại tên đăng nhập và  mật khẩu</p>";
			}
			
		}

	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Đăng nhập - DTGEARSHOP.VN | SHOP GAMING GEAR HCM</title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="css/design_form.css"/>
</head>

<body>
<div class="main">
	<!-- Header -->
   	<?php 
		include('layout/header.php');
	?>
    <!-- Content -->
    <div class="content">
    	<div class="frmDangKy">
            <h1 align="center">Đăng nhập</h1>
            <form method="post">
                <div>
                	<strong>Tên đăng nhập</strong>
                    </br>
                	<label>
                    	<input type="text" id="txtTenDangNhap" name="txtTenDangNhap" placeholder="Tên đăng nhập" value="<?php echo $tenDangNhap ?>"  />
                    </label>
                </div>
                
                <div>
                	<strong>Mật khẩu</strong>
                    </br>
                	<label>
                    	<input type="password" id="txtMatKhau" name="txtMatKhau" placeholder="Mật khẩu" value="<?php echo $matKhau ?>"  />
                    </label>
                </div>
                
                <div>
                    <strong>Mã bảo mật</strong>
                    <div id="div-capcha">
                    	
                    </div>
                	<label>
                    	<input type="text" id="txtMaBaoMat" name="txtMaBaoMat" placeholder="Mã bảo mật" value="<?php $maBaoMat ?>"  />
                    </label>
                </div>
                
                <div>
                	<strong><hr /></strong>
                </div>
                
                <div>
                	<strong><a href="register.php">Đăng ký</a></strong>
                </div>
                
                <div>
                    <strong><a href="#">Quên mật khẩu</a></strong>
                </div>
                
                <div align="center" style="margin-top:10px;" id="btn">
                	
                    	<input type="submit" id="btnDangNhap" name="btnDangNhap" value="Đăng nhập" style="text-align:center; padding-left: 15px;" />
                    
                </div>
            </form>
        </div>
        
        <div align="center">
        	<?php
				echo $err;
			?>
        </div>
        
    </div>
    <div style="clear:both"></div>
    <!-- Footer -->
    <?php 
		include('layout/footer.php');
	?> 
</div>
</body>
</html>