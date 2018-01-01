<?php 
	session_start();
	include('layout/head.php');         
?>

<body>
<div class="main">
<?php
	$giohang = array();
	$giohang = $_SESSION['giohang'];
	
	if(isset($_POST['btncapnhat']))
	{
		$soluong_cn = $_POST['soluong'];
		foreach($soluong_cn as $id=>$sl)//duyệt qua mảng các số lượng mà có MaSanPham tương ứng
		{
			if($sl == 0) //nếu người dùng cập nhật số lượng là 0 thì xóa giỏ hàng vs Id tương ứng
			{
				unset($_SESSION['giohang'][$id]);	
			}
			else if($sl > 0 && is_numeric($sl)) //nếu số lượng > 0 và số lượng là số
			{
				$_SESSION['giohang'][$id] = $sl;	 //cập nhật số lượng là số lượng mà khách nhập vào ô textbox
			}
			//refesh lại trang giỏ hàng
			header("location: ".$_SERVER['REQUEST_URI']."");
		}
			
	}
?>
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
<?php
	if(count($giohang)) //nếu có giỏ hàng
	{
?>
   	<form method="post">
    <h1 align="center"> THÔNG TIN GIỎ HÀNG</h1>
	<table width="1000" border="1" cellspacing="0" cellpadding="5" align="center" style="margin-top:20px">
      <tr style="background-color:#000; color:#FFF; font-size:20px" height="50px" align="center">
        <td>Tên Sản Phẩm</td>
        <td>Số lượng</td>
        <td>Đơn giá</td>
        <td>Thành tiền</td>
        <td>&nbsp;</td>
      </tr>
<?php
	include("lib/DataProvider.php");
	$tongcong = 0;
	foreach($giohang as $id=>$sl)//duyệt qua tất cả giỏ hàng
	{
		$sql = "select TenSanPham, GiaSanPham from sanpham where MaSanPham=".$id;//viết câu truy vấn lấy tra thông tin sản phẩn với MaSanPham là id tương ứng
		$result = DataProvider::ExcuteQuery($sql);
		$row = mysqli_fetch_array($result);
?>     
      <tr>
        <td><?php echo $row["TenSanPham"]?></td>
        <td><input type="text" name="soluong[<?php echo $id?>]" size="4" value="<?php echo $sl?>"/></td>
        <td><?php echo number_format($row['GiaSanPham'])?></td>
        <td><?php echo number_format($sl*$row['GiaSanPham'])?></td>
        <td><a href="xoa_sp.php?id=<?php echo $id?>"><strong style="color:#666">Xóa Sản phẩm</strong></a></td>
      </tr>
<?php
		$tongcong += $sl*$row['GiaSanPham'];
	}
	
?>      
      
      <tr>
        <td colspan="5" style="text-align:right">Tổng Cộng: <?php echo number_format($tongcong)?></td>
      </tr>
      <tr>
        <td colspan="5" align="center">
        	<input class="btngiohang" type="submit" name="btncapnhat" value="Cập nhật" style="width:100px; height:50px; border-radius:5px"/>
        	<input class="btngiohang" type="submit" name="btndathang" value="Đặt Hàng" style="width:100px; height:50px; border-radius:5px"/>
        </td>
      </tr>
    </table>
	</form>
<?php
	}
	else
	{
		echo '<h1 align="center">GIỎ HÀNG CỦA BẠN RỖNG <br/> ĐỂ CÓ GIỎ HÀNG NHẤN VÀO <a href="index.php" style="color:red">ĐÂY</a></h1>';	
	}
	
	if(isset($_POST['btndathang']))
	{
		echo 'đặt hàng';	
	}
?>
    </div>
    <div style="clear:both"></div>
    <!-- Footer -->
    <?php 
		include('layout/footer.php');
	?> 
</div>
</body>
</html>