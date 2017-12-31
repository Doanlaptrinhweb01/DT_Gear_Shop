<div class="loaisanpham">
    <h1> Loại Sản Phẩm </h1>
    <?php
		include_once('lib/DataProvider.php');
		$sql = "SELECT MaLoaiSanPham,TenLoaiSanPham FROM loaisanpham";
		
		$result = DataProvider::ExcuteQuery($sql);
		while($row = mysqli_fetch_array($result))
		{
			$tenloaisp = $row['TenLoaiSanPham'];
			$maloaisp = $row['MaLoaiSanPham'];
	?>
    	<a href="index.php?idx=<?php echo $maloaisp?>"> <?php echo $tenloaisp?></a> <br/>
    <?php
		}
	?>
</div>