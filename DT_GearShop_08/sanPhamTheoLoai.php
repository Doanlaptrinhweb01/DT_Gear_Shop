<div class="sanpham">
	<?php
	 	$maloaisanpham = $_GET['id'];
		include_once('lib/DataProvider.php');
		$sql = "SELECT MaSanPham ,TenSanPham, HinhURL, GiaSanPham, TenLoaiSanPham FROM sanpham, loaisanpham WHERE sanpham.SoLuongTon > 0 AND sanpham.BiXoa=0 AND sanpham.MaLoaiSanPham = loaisanpham.MaLoaiSanPham
				and loaisanpham.MaLoaiSanPham =".$maloaisanpham;
		
		$result = DataProvider::ExcuteQuery($sql);
		$row1 = mysqli_fetch_row($result);
		$TenLoaiSp = $row1[4];
	?>
    	<h2><?php echo $TenLoaiSp?></h2>
    <?php
		while($row = mysqli_fetch_array($result))
		{
	?>
    	<div class="sp">
        	<a href="index.php?a=4&id=<?php echo $row['MaSanPham']; ?>">
            	<div class="hinhsanpham">
                	<img src="img/San_Pham/<?php echo $row['HinhURL'] ?>"/>
                </div>
                <h4 align="center"><?php echo $row['TenSanPham'] ?></h4>
                <p align="center">
                	<strong>
						<?php echo number_format($row['GiaSanPham'])?><u>đ</u>
                    </strong>
                </p>
            </a>
        </div>
    <?php
		}
	?>
</div>