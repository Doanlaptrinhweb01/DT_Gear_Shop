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
					include('sanPhamTheoHang.php');
				}
				else if(isset($_GET['idx']))
				{
					include('sanPhamTheoLoai.php');
				}
				else
				{
					include('sanPhamMoi.php');
					include('sanPhamBanChay.php');
					
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