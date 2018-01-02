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
			include('layout/hangSanXuat.php');
		?>
        <!-- Div Loai San Pham -->
        <?php 
			include('layout/loaiSanPham.php');
		?>  
        </div>
        <!-- Content-right -->
        <div class="content-right">
            <?php
				if(isset($_GET['idi']))
				{
					include('v_SanPham/sanPhamTheoHang.php');
				}
				else if(isset($_GET['idx']))
				{
					include('v_SanPham/sanPhamTheoLoai.php');
				}
				else
				{
					include('v_SanPham/sanPhamMoi.php');
					include('v_SanPham/sanPhamBanChay.php');
				}
				
			?>
        </div>
    </div>
    <div style="clear:both"></div>
    <!-- Footer -->
    <?php 
		include('layout/footer.php');
	?> 
</div>
</body>
</html>