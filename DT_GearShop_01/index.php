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
				if(isset($_GET['idi']))
				{
					include('layout/sanphamHXS.php');
				}
				else if(isset($_GET['idx']))
				{
					include('layout/sanphamTheoLoai.php');
				}
				else
				{
					include('layout/sanphammoi.php');
					include('layout/sanphambanchay.php');
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