<div class="sanpham">
	<?php
	 	$maloaisanpham = $_GET['idx'];
		include_once('lib/DataProvider.php');
		$sql = "SELECT TenSanPham,MaSanPham, HinhURL, GiaSanPham, TenLoaiSanPham FROM sanpham, loaisanpham WHERE sanpham.MaLoaiSanPham = loaisanpham.MaLoaiSanPham
				and loaisanpham.MaLoaiSanPham =".$maloaisanpham;
		
		$result = DataProvider::ExcuteQuery($sql);
		$row1 = mysqli_fetch_row($result);
		$TenLoaiSp = $row1[3];
	?>
    	<h1><?php echo $TenLoaiSp?></h1>
    <?php
		while($row = mysqli_fetch_array($result))
		{
			$TenSp = $row['TenSanPham'];
			$Hinh = $row['HinhURL'];
			$Gia = $row['GiaSanPham'];
			$masp = $row['MaSanPham'];
			
	?>

    	<div class="sp">
        	<img src="img/San_Pham/<?php echo $Hinh?>" width="350px"/>
            <h4> <?php echo $TenSp?></h4>
            <p><?php echo $Gia?></p>
            <a href="chi_tiet_san_pham.php?ma_sp=<?php echo $masp?>"> Chi tiết </a>
        </div>
    <?php
		}
	?>
</div>