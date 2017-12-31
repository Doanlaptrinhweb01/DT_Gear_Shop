<?php
	$check = 0;
	$tong='';
	if(isset($_SESSION['giohang'])) // nếu có tồn tại sản phẩm trong giỏ hàng
	{
		foreach($_SESSION['giohang'] as $id) //duyệt các sản phẩm trong giỏ hàng
		{
			if(isset($id))
			{
				$check = 1; //nếu tồn tại sản phẩn thì bật check lên 1
			}
		}
	}
	if($check != 1) //nếu check khác 1 có nghĩa là không có sản phẩm trong giỏ
	{
		$tong = '0'; //thì gán biến tổng sp bằng 0
	}
	else
	{
		$item = $_SESSION['giohang'];
		$tong = count($item); //ngược lại điếm số lượng sp trong giỏ	
	}
?>
<div class="header">
        <!-- Logo -->
        <div class="logo">
        	<h1><a href="./index.php"> DT Gear Shop </a></h1>
        </div>
        <!-- Logo -->
        <div class="formdn" style="margin-top:50px; float:right">
        	<ul>
                <li><a href="login.php"><img src="img/layout/dangnhap.png" width="20px"/>Đăng nhập</a></li> &nbsp;
                <li><a href="register.php"><img src="img/layout/dangky.png" width="20px"/>Đăng Ký</a></li>
                <li><a href="gio_hang.php"><img src="img/layout/cart.png" width="20px"/>Giỏ hàng(<?php echo $tong?>)</a></li>
            </ul>
        </div>
        
        <!--Login-Register-->
        <div class="search" style="float:left; margin-top:50px; margin-left:30px">
            <form method="post" action="search.php">
                <input type="text" name="txtsearch" placeholder="Tìm sản phẩm..." size="20" id="txt-search"/>
                <input type="submit" name="btnsearch" value="search" id="btn-search"/>
            </form>
        </div>
</div>