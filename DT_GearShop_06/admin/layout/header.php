<div class="header">
        <!-- Logo -->
        <div class="logo">
        	<h1><a href="../index.php">DT Gear Shop</a></h1>
        </div>
        <!-- Logo -->
        <?php
			session_start();
			if(isset($_SESSION['tenHT']))
			{
		 ?>
         		<div class="formdn">
                    <ul>
                        <li>
                        <a href="../thongTinCaNhan.php"><img src="../img/layout/dangky.png" width="20px"/>
                        		<strong>Xin Chào Admin: <?php echo $_SESSION['tenHT'] ?></strong></a></li> &nbsp;
                        
                        <li><a href="../logout.php"><img src="../img/layout/dangnhap.png" width="20px"/>Đăng xuất</a></li>
                        </br>
                        
                    </ul>
                    <div align="center">
                    	<a href="../index.php">Về Trang Chủ Shop</a>
                    </div>
                </div>
         <?php
			}
		 ?>
</div>