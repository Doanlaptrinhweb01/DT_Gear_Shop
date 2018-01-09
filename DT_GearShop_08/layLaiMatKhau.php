<?php
	session_start();
	
	include_once('lib/DataProvider.php');
	$tenDangNhap = "";
	$email = "";
	$maBaoMat = "";

	$err = "";
	
	if(!isset($_SESSION['tenHT']) && !isset($_SESSION['matKhau']) && !isset($_SESSION['tenDN']))
	{
		if(isset($_POST['btnGui']))
		{
			$tenDangNhap = $_POST['txtTenDangNhap'];
			$email = $_POST['txtEmail'];
			$maBaoMat = $_POST['txtMaBaoMat'];
			
			$_SESSION['maCode'] = 1111;
			
			if(empty($tenDangNhap))
			{
				$err = "<p style='color:red'>Vui lòng nhập tài khoản.</p>";
			}
			
			else if(empty($email))
			{
				$err = "<p style='color:red'>Vui lòng nhập email.</p>";
			}
			
			
			else if(empty($maBaoMat))
			{
				$err = "<p style='color:red'>Nhập mã bảo mật.</p>";
			}
			
			
			else
			{
				$sql = "SELECT MaTaiKhoan, TenDangNhap, MatKhau, TenHienThi, MaLoaiTaiKhoan, Email FROM taikhoan WHERE BiXoa=0 AND TenDangNhap='$tenDangNhap'";
				$result = DataProvider::ExcuteQuery($sql);
				
				$row = mysqli_fetch_row($result);
				
				if($tenDangNhap == $row[1] && $email == $row[5])
				{
					$maLoai = $row[4];
					$_SESSION['tenDN'] = $tenDangNhap;
					$_SESSION['email'] = $email;
				}
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
            <form method="post" action="xacNhanDoiMkMoi.php">
                <div>
                	<strong>Tên đăng nhập</strong>
                    </br>
                	<label>
                    	<input type="text" id="txtTenDangNhap" name="txtTenDangNhap" placeholder="Tên đăng nhập"  />
                    </label>
                </div>
                
                <div>
                	<strong>Email</strong>
                    </br>
                	<label>
                    	<input type="email" id="txtEmail" name="txtEmail" placeholder="Địa chỉ email lúc đăng ký" />
                    </label>
                </div>
                
                <div>
                    <strong>Mã bảo mật</strong>
                    <div id="div-capcha">
                    	
                    </div>
                	<label>
                    	<input type="text" id="txtMaBaoMat" name="txtMaBaoMat" placeholder="Mã bảo mật"  />
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
                    <input type="submit" id="btnGui" name="btnGui" value="Gửi" />
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