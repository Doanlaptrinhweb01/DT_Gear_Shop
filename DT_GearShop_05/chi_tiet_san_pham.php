<?php 
	session_start();
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
				
				$tenSP ='';
				$hinh = '';
				$gia = '';
				$soLuongBan = '';
				$soLuotXem = '';
				$moTa = '';
				$tenHangSX = '';
				$tenLoaiSP = '';
				$maLoaiSP = '';
				$maHangSX = '';
				$soLuongTon = '';
				
				$sql = "SELECT TenSanPham, HinhURL, GiaSanPham, SoLuongBan, SoLuocXem, MoTa, hangsanxuat.TenHangSanXuat, loaisanpham.TenLoaiSanPham, loaisanpham.MaLoaiSanPham, hangsanxuat.MaHangSanXuat,sanpham.MaSanPham, sanpham.SoLuongTon FROM `sanpham`, hangsanxuat, loaisanpham WHERE sanpham.MaLoaiSanPham = loaisanpham.MaLoaiSanPham and sanpham.MaHangSanXuat = hangsanxuat.MaHangSanXuat and sanpham.MaSanPham=".$masp;
				$result = DataProvider::ExcuteQuery($sql);
				$row = mysqli_fetch_row($result);
				
				$tenSP = $row[0];
				$hinh = $row[1];
				$gia = $row[2];
				$soLuongBan = $row[3];
				$soLuotXem = $row[4];
				$moTa = $row[5];
				$tenHangSX = $row[6];
				$tenLoaiSP = $row[7];
				$maLoaiSP = $row[8];
				$maHangSX = $row[9];
				$soLuongTon = $row[11];
			?>
            <div>
				<div style="float:left">
                	<img src="img/San_Pham/<?php echo $hinh?>" width="500px" id="zoom"/>
                </div>
                <div style="width:316px; float:left; margin-left: 20px;">
                	<h1><?php echo $tenSP ?></h1>
                    <hr/>
                    <h2 style="color:#F00">Giá:&nbsp;<?php echo number_format($gia)?> VNĐ</h2>
                    <h3 style="color:#F00">Tình trạng: <?php echo ($soLuongTon>0)?"Còn hàng":"Không kinh doanh" ?> </h3>
                    <h3>Số lượng bán: <?php echo $soLuongBan ?> </h3>
                    <h3>Số lượt xem: <?php echo $soLuotXem ?> </h3>
                    <h2>Nhà Sản Xuất: <?php echo $tenHangSX ?> </h2>
                    <h2>Loại sản phẩm: <?php echo $tenLoaiSP ?> </h2>
                </div>
           	</div>
			    <div style="clear:both"></div>
            
            <div>
            	<?php
                	if(isset($_SESSION['tenDN']))
					{
                ?>	
                        <a href="them_SanPham.php?id=<?php echo $row[10]?>">
                            <input type="button" value="Mua Ngay" name="btnmua"
                            		 style="color:#FFF; background-color:#F30; width:520px; height:50px; font-size:20px"/>
                        </a>
                <?php
					}
					else
					{
						echo '<h2 style="color:red">Bạn phải đăng nhập để mua hàng</h2>';	
					}
				?>
            </div>    
            
            <div>
                 <hr/>
                 <h2>Mô Tả Sản Phẩm</h2>
                 <hr/>
                 <h1><?php echo $tenSP ?></h1>
                 <h3> <?php echo $moTa ?></h3>
            </div>
            
            <div class="div-sp-cungloai">
            	<hr/>
                <h4 class="fm-h4">Sản phẩm cùng loại</h4>
				<?php
                    $sql = "SELECT MaSanPham,TenSanPham, HinhURL, GiaSanPham FROM sanpham WHERE BiXoa=0 AND MaSanPham<>$masp AND MaLoaiSanPham=$maLoaiSP ORDER by NgayNhap DESC LIMIT 0,4";
					//"select MaSanPham,`TenSanPham`, HinhURL, GiaSanPham from sanpham 
		//where BiXoa=0 and MaSanPham<>'".$masp."'and MaLoaiSanPham='".$row[8]."'limit 0, 5"
                    $result = DataProvider::ExcuteQuery($sql);
                    
					while($row = mysqli_fetch_array($result))
					{
                ?>
                		<div class="sp sp-cungloai">
                            <a href="chi_tiet_san_pham.php?ma_sp=<?php echo $row[0]?>">
                                <div class="hinhsanphamcungloai">
                                    <img src="img/San_Pham/<?php echo $row[2]?>"/>
                                </div>
                                <h4 align="center"><?php echo $row[1]?></h4>
                                <p align="center">
                                    <strong>
                                        <?php echo number_format($row[3])?><u>đ</u>
                                    </strong>
                                </p>
                            </a>
                        </div>
            	<?php
					}
					
				?>
                
            </div>
            
            <div class="div-sp-cungloai">
                <h4 class="fm-h4">Sản phẩm cùng hãng</h4>
				<?php
                    $sql = "SELECT MaSanPham,TenSanPham, HinhURL, GiaSanPham FROM sanpham WHERE BiXoa=0 AND MaSanPham<>$masp AND MaHangSanXuat=$maHangSX ORDER by NgayNhap DESC LIMIT 0,4";
                    $result = DataProvider::ExcuteQuery($sql);
                    
					while($row = mysqli_fetch_array($result))
					{
                ?>
                		<div class="sp sp-cungloai">
                            <a href="chi_tiet_san_pham.php?ma_sp=<?php echo $row[0]?>">
                                <div class="hinhsanphamcungloai">
                                    <img src="img/San_Pham/<?php echo $row[2]?>"/>
                                </div>
                                <h4 align="center"><?php echo $row[1]?></h4>
                                <p align="center">
                                    <strong>
                                        <?php echo number_format($row[3])?><u>đ</u>
                                    </strong>
                                </p>
                            </a>
                        </div>
            	<?php
					}
				?>
                
            </div>
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
<script>
    $('#zoom').elevateZoom({
    zoomType: "inner",
	cursor: "crosshair",
	zoomWindowFadeIn: 500,
	zoomWindowFadeOut: 750
   }); 
</script>
</body>
</html>