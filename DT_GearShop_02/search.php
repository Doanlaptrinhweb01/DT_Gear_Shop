<?php 
	include('layout/head.php');
?>

<body>
<div class="main">
	<!-- Header -->
   	<?php 
		include('layout/header.php');
		
	?>
    <!-- Banner -->
    <?php 
		include('layout/banner.php');
	?>
    <!-- Content -->
    <div class="content">
    <!-- Content-Left -->
        <div class="content-left">
        <!-- Div Hang San Xuat -->
        <?php 
			include('layout/hangSanXuat.php');
		?>
        <!-- Div Loai San Pham -->
        <?php 
			include('layout/loaiSanPham.php');
		?>  
        </div>
        <!-- Content-right -->
        <div class="content-right">
            <?php
					$timsp = '';
					if(isset($_POST['btnsearch']))
					{
						$timsp = $_POST['txtsearch'];
						if($timsp == "")
						{
							echo '<h2>Kết quả tìm kiếm <span style="color:red">RỖNG</span></h2>';
						}
						else
						{
			?>
            	 	<h2>Kết quả tìm kiếm cho: "<span style="color:red"><?php echo $timsp?></span>"</h2>
            <?php
						$sql = "SELECT MaSanPham, TenSanPham, HinhURL, GiaSanPham FROM SANPHAM WHERE BiXoa=0 and TenSanPham like '%".$timsp."%'";
						$result = DataProvider::ExcuteQuery($sql);	
						while($row = mysqli_fetch_array($result))
						{
							$TenSp = $row['TenSanPham'];
							$Hinh = $row['HinhURL'];
							$Gia = $row['GiaSanPham'];
							$maSP = $row['MaSanPham'];
					?>
						<div class="sp">
							<a href="chi_tiet_san_pham.php?ma_sp=<?php echo $maSP?>">
								<div class="hinhsanpham">
									<img src="img/San_Pham/<?php echo $Hinh?>"/>
								</div>
								<h4 align="center"><?php echo $TenSp?></h4>
								<p align="center">
									<strong>
										<?php echo number_format($Gia) ?><u>đ</u>
									</strong>
								</p>
							</a>
						</div>
					<?php
						}
					}
				}
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