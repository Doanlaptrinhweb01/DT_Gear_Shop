<?php 
	session_start();
	include_once('lib/DataProvider.php');
	
	$tenHienThi = "";
	$diaChi = "";
	$dienThoai = "";
	$maBaoMat = "";
	$err = "";

	if(isset($_SESSION['tenDN']) && isset($_SESSION['matKhau']) && isset($_SESSION['tenHT']))
	{
		$sql = "SELECT TenHienThi, DiaChi, DienThoai FROM taikhoan WHERE BiXoa=0 AND TenDangNhap='".$_SESSION['tenDN']."'";
		$result = DataProvider::ExcuteQuery($sql);
		
		$row = mysqli_fetch_row($result);
		
		$tenHienThi = $row[0];
		$diaChi = $row[1];
		$dienThoai = $row[2];
		
		if(isset($_POST['btnCapNhat']))
		{
			$tenHienThi = $_POST['txtTenHienThi'];
			$diaChi = $_POST['txtDiaChi'];
			$dienThoai = $_POST['txtDienThoai'];
			$maBaoMat = $_POST['txtMaBaoMat'];
			if(empty($tenHienThi) || empty($diaChi) || empty($dienThoai))
			{
				$err = "<p style='color:red'>Vui lòng điền đầy đủ thông tin.</p>";
			}
			
			
			else if(empty($maBaoMat))
			{
				$err = "<p style='color:red'>Nhập mã bảo mật.</p>";
			}
			
			
			else
			{
				$sql = "Update taikhoan set TenHienThi='".$tenHienThi."', DiaChi='".$diaChi."', DienThoai='".$dienThoai."' WHERE TenDangNhap='".$_SESSION['tenDN']."'";
				
				DataProvider::ExcuteQuery($sql);
				$err = "<p style='color:red'>Cập nhật thành công.</p>";	
			}
		}
	}
	else
	{
		header('location:index.php');
	}
	
	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Thông Tin Cá Nhân - DTGEARSHOP.VN | SHOP GAMING GEAR HCM</title>
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
            <h1 align="center">Cập nhật thông tin</h1>
            <form method="post" action="capNhatThongTin.php">
                <div>
                	<strong>Tên hiển thị</strong>
                    </br>
                	<label>
                    	<input type="text" id="txtTenHienThi" name="txtTenHienThi" placeholder="Tên hiển thị" value="<?php echo $tenHienThi ?>" size="32" />
                    </label>
                </div>
                
                <div>
                	<strong>Địa chỉ</strong>
                    </br>
                	<label>
                    	<input type="text" id="txtDiaChi" name="txtDiaChi" placeholder="Địa chỉ" value="<?php echo $diaChi ?>" size="32" />
                    </label>
                </div>
                
                <div>
                	<strong>Điện thoại</strong>
                    </br>
                	<label>
                    	<input type="text" id="txtDienThoai" name="txtDienThoai" placeholder="0123456789" value="<?php echo $dienThoai ?>" size="32" />
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

                <div align="center" style="margin-top:10px;" id="btn">
                	<label>
                    	<input type="submit" id="btnCapNhat" name="btnCapNhat" value="Cập nhật" />
                    </label>
                    <label>
                    	<a href="index.php"><input type="button" value="Quay về" /></a>
                    </label>
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