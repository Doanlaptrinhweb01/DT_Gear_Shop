<?php
	session_start();
	
	include_once('lib/DataProvider.php');
	$matKhauMoi = "";
	$xacNhanMatKhauMoi = "";
	$maBaoMat = "";

	$err = "";
	
	if(!isset($_SESSION['tenHT']) && !isset($_SESSION['matKhau']) && !isset($_SESSION['tenDN']))
	{
		if(isset($_POST['btnGui']))
		{
			
		}
		
		
		if(isset($_POST['btnXacNhan']))
		{
			
			$matKhauMoi = $_POST['txtMatKhauMoi'];
			$xacNhanMatKhauMoi = $_POST['txtXacNhanMatKhauMoi'];
			
			
			if(empty($matKhauMoi))
			{
				$err = "<p style='color:red'>Vui lòng nhập mật khẩu.</p>";
			}
			
			
			else if(empty($xacNhanMatKhauMoi))
			{
				$err = "<p style='color:red'>Nhập lại mật khẩu.</p>";
			}
			
			else if($matKhauMoi != $xacNhanMatKhauMoi)
			{
				$err = "<p style='color:red'>Mật khẩu không khớp.</p>";
			}
			
			else if(empty($maBaoMat))
			{
				$err = "<p style='color:red'>Nhập mã bảo mật.</p>";
			}
			
			else if($maBaoMat != $_SESSION['maCode'])
			{
				$err = "<p style='color:red'>Mã bảo mật không đúng.</p>";
			}
			
			else
			{
				$sql = "Update taikhoan set MatKhau = '$matKhauMoi' where TenDangNhap = '$'";
			}
		}
	}
	else
	{
		if($_SESSION['maLoai'] != 1)
			header('location:index.php');
		else
			header('location:admin/index.php');
	}
	
	
	include("layout/head.php");
?>

<body>
<div class="main">
	<!-- Header -->
   	<?php 
		include('layout/header.php');
	?>
    <!-- Content -->
    <div class="content">
    	<div class="frmDangKy">
            <h1 align="center">Lấy lại mật khẩu của bạn</h1>
            <form method="post">
                <div>
                	<strong>Mật khẩu mới</strong>
                    </br>
                	<label>
                    	<input type="password" id="txtMatKhauMoi" name="txtMatKhauMoi" placeholder="Mật khẩu mới" value="<?php echo $matKhauMoi ?>"  />
                    </label>
                </div>
                
                <div>
                	<strong>Xác nhận mật khẩu</strong>
                    </br>
                	<label>
                    	<input type="password" id="txtXacNhanMatKhauMoi" name="txtXacNhanMatKhauMoi" placeholder="Xác nhận mật khẩu" value="<?php echo $xacNhanMatKhauMoi ?>"  />
                    </label>
                </div>
                
                <div>
                    <strong>Mã bảo mật</strong>
                	<label>
                    	<input type="text" id="txtMaBaoMat" name="txtMaBaoMat" placeholder="Mã bảo mật" value="<?php $maBaoMat ?>"  />
                    </label>
                </div>
                
                <div>
                	<strong><hr /></strong>
                </div>
                
                 <div>
                	<strong><a href="login.php">Đăng Nhập</a></strong>
                </div>
                
                <div>
                	<strong><a href="register.php">Đăng ký</a></strong>
                </div>
                
                
                <div align="center" style="margin-top:10px;" id="btn">
                     <input type="submit" id="btnXacNhan" name="btnXacNhan" value="Xác nhận" />
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