<div class="sanpham">
	<?php
	 	$maloaisanpham = $_GET['idx'];
		include_once('lib/DataProvider.php');
		$sql = "SELECT MaSanPham ,TenSanPham, HinhURL, GiaSanPham, TenLoaiSanPham FROM sanpham, loaisanpham
			    WHERE sanpham.BiXoa=0 AND sanpham.MaLoaiSanPham = loaisanpham.MaLoaiSanPham
				and loaisanpham.MaLoaiSanPham =".$maloaisanpham;
		
		$result = DataProvider::ExcuteQuery($sql);
		$row1 = mysqli_fetch_row($result);
		$TenLoaiSp = $row1[4];
	?>
    	<h2><?php echo $TenLoaiSp?></h2>
    <?php
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
						<?php echo number_format($Gia)?><u>đ</u>
                    </strong>
                </p>
            </a>
        </div>
    <?php
		}
	?>
</div>