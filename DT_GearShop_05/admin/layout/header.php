<div class="header">
        <!-- Logo -->
        <div class="logo">
        	<h1 style="">DT Gear Shop</h1>
        </div>
        <!-- Logo -->
        <?php
			session_start();
			if(isset($_SESSION['tenHT']))
			{
		 ?>
         		<div class="formdn" style="margin-top:-50px; float:right">
                    <ul>
                        <li>
                        <a href="../thongTinCaNhan.php"><img src="../img/layout/dangky.png" width="20px"/>
                        		<strong>Xin Chào Admin:<?php echo $_SESSION['tenHT'] ?></strong></a></li> &nbsp;
                        
                        <li><a href="../login.php"><img src="../img/layout/dangnhap.png" width="20px"/>Đăng xuất</a></li>
                        </br>
                        
                    </ul>
                </div>
         <?php
			}
		 ?>
</div>