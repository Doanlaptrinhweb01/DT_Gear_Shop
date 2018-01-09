<div class="sanpham">
    <h2> Sản phẩm bán chạy nhất</h2>
    <?php
		include_once('lib/DataProvider.php');
		$sql = "SELECT MaSanPham, TenSanPham, HinhURL, GiaSanPham FROM SANPHAM WHERE SoLuongTon > 0 AND BiXoa=0 ORDER by SoLuongBan DESC LIMIT 0,9";
		
		$result = DataProvider::ExcuteQuery($sql);
		while($row = mysqli_fetch_array($result))
		{
	?>
    	<div class="sp">
        	<a href="index.php?a=4&id=<?php echo $row['MaSanPham'] ?>">
            	<div class="hinhsanpham">
                	<img src="img/San_Pham/<?php echo $row['HinhURL'] ?>"/>
                </div>
                <h4 align="center"><?php echo $row['TenSanPham'] ?></h4>
                <p align="center">
					<strong>
						<?php echo number_format($row['GiaSanPham']) ?><u>đ</u>
                    </strong>
                </p>
            </a>
        </div>
    <?php
		}
	?>
</div>