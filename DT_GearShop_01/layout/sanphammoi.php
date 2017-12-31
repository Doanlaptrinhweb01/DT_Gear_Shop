<div class="sanpham">
    <h1> Sản phẩm mới</h1>
    <?php
		include_once('lib/DataProvider.php');
		$sql = "SELECT TenSanPham,MaSanPham, HinhURL, GiaSanPham FROM sanpham ORDER by NgayNhap DESC LIMIT 0,9";
		
		$result = DataProvider::ExcuteQuery($sql);
		while($row = mysqli_fetch_array($result))
		{
			$TenSp = $row['TenSanPham'];
			$Hinh = $row['HinhURL'];
			$Gia = $row['GiaSanPham'];
			$masp = $row['MaSanPham'];
	?>
    	<div class="sp" style="">
        	<img src="img/San_Pham/<?php echo $Hinh?>" width="350px"/>
            <h4> <?php echo $TenSp?></h4>
            <p><?php echo $Gia?></p>
            <a href="chi_tiet_san_pham.php?ma_sp=<?php echo $masp?>"> Chi tiết </a>
        </div>
    <?php
		}
	?>
</div>