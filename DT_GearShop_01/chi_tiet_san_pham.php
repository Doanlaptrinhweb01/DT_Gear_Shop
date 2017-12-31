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
			include('layout/hangsanxuat.php');
		?>
        <!-- Div Loai San Pham -->
        <?php 
			include('layout/loaisanpham.php');
		?>  
        </div>
        <!-- Content-right -->
        <div class="content-right">
            <?php
				include_once('lib/DataProvider.php');
				$masp = $_GET['ma_sp'];
				$sql = "SELECT `TenSanPham`, `HinhURL`, `GiaSanPham`, `SoLuongBan`, `SoLuocXem`, `MoTa`, hangsanxuat.TenHangSanXuat, loaisanpham.TenLoaiSanPham						                        FROM `sanpham`, hangsanxuat, loaisanpham
						WHERE sanpham.MaLoaiSanPham = loaisanpham.MaLoaiSanPham and sanpham.MaHangSanXuat = hangsanxuat.MaHangSanXuat
						and sanpham.MaSanPham=".$masp;
				$result = DataProvider::ExcuteQuery($sql);
				$row = mysqli_fetch_row($result);
			?>
            <div>
				<div style="float:left">
                	<img src="img/San_Pham/<?php echo $row[1]?>" width="500px"/>
                </div>
                <div>
                	<h1><?php echo $row[0]?></h1>
                    <hr/>
                    <h2 style="color:#00F">Giá:<?php echo number_format($row[2])?> VNĐ</h2>
                    <h3>Số lượng bán: <?php echo $row[3]?> </h3>
                    <h3>Số lượt xem: <?php echo $row[4]?> </h3>
                    <h2>Nhà Sản Xuất: <?php echo $row[6]?> </h2>
                    <h2>Loại sản phẩm: <?php echo $row[7]?> </h2>
                    <input type="button" value="Mua Ngay" name="btnmua" style="color:#FFF; background-color:#F30; width:580px; height:50px; font-size:20px"/>
                </div>
           	</div>
			    <div style="clear:both"></div>
            <div>
                 <hr/>
                    <p>Mô Tả Sản Phẩm</p>
                 <hr/>
                 <h1><?php echo $row[0]?></h1>
                 <h3> <?php echo $row[5]?></h3>
            </div>
   	   </div>
    <?php
		$sqlupdate = "update sanpham set SoLuocXem = SoLuocXem + 1 where MaSanPham =".$masp;
		DataProvider::ExcuteQuery($sqlupdate);
	?>
	<div style="clear:both"></div>
    <!-- Footer -->
    <?php 
		include('layout/footer.php');
	?> 
</div>
</body>
</html>