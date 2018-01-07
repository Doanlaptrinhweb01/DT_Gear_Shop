<?php
	$timsp = '';
	if(isset($_POST['btnSearch']))
	{
		$timsp = $_POST['txtSearch'];
		if($timsp == "")
		{
			echo '<h2>Kết quả tìm kiếm <span style="color:red">RỖNG</span></h2>';
		}
		else
		{
?>
			<h2>Kết quả tìm kiếm cho: "<span style="color:red"><?php echo $timsp?></span>"</h2>
<?php
			$sql = "SELECT MaSanPham, TenSanPham, HinhURL, GiaSanPham FROM SANPHAM 
			WHERE BiXoa=0 and TenSanPham like '%".$timsp."%'";
			$result = DataProvider::ExcuteQuery($sql);	
			while($row = mysqli_fetch_array($result))
			{
				$TenSp = $row['TenSanPham'];
				$Hinh = $row['HinhURL'];
				$Gia = $row['GiaSanPham'];
				$maSP = $row['MaSanPham'];
?>
			<div class="sp">
				<a href="index.php?a=4&id=<?php echo $maSP?>">
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
