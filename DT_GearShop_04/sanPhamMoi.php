<div class="sanpham">
    <h2>Sản phẩm mới nhất</h2>
    <?php
		include_once('lib/DataProvider.php');
		$sql = "SELECT MaSanPham,TenSanPham, HinhURL, GiaSanPham FROM sanpham WHERE SoLuongTon > 0 AND BiXoa=0 ORDER by NgayNhap DESC LIMIT 0,9";
		
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
						<?php echo number_format($Gia)?><u>đ</u>
                    </strong>
                </p>
            </a>
        </div>
    <?php
		}
	?>
</div>