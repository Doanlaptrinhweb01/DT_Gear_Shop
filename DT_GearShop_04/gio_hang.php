<?php 
	session_start();
	include('layout/head.php');
?>

<body>
<div class="main">
<?php
	if(!empty($_SESSION['giohang'])) //nếu session giỏ hàng không rỗng
	{
		$giohang = $_SESSION['giohang'];//thì set biến $giohang = $_SESSION['giohang']
	}
	else // ngược lại nếu giỏ hàng là rỗng
	{
		$giohang = null;	//thì set null
	}

	if(isset($_POST['btncapnhat'])) //nếu nhấn vào  nút cập nhật
	{
		$soluong_cn = $_POST['soluong']; //lấy ra số lượng từ khung textbox số lượng
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
	if(count($giohang) > 0) //nếu có giỏ hàng
	{
?>
   	<form method="post">
    <h1 align="center"> THÔNG TIN GIỎ HÀNG</h1>
	<table width="1000" border="1" cellspacing="0" cellpadding="5" align="center" style="margin-top:20px">
      <tr>
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
        	<input type="submit" name="btncapnhat" value="Cập nhật" style="width:100px; height:50px; border-radius:10px"/>
        	<input type="submit" name="btndathang" value="Đặt Hàng" style="width:100px; height:50px; border-radius:10px"/>
        </td>
      </tr>
    </table>
	</form>
<?php
	}
	else //nếu không có giỏ hàng thì xuất ra công thông báo
	{
		echo '<h1 align="center">GIỎ HÀNG CỦA BẠN RỖNG <br/> ĐỂ CÓ GIỎ HÀNG NHẤN VÀO <a href="index.php" style="color:red">ĐÂY</a></h1>';	
	}
	
	if(isset($_POST['btndathang'])) //nếu nhấn vào nút đặt hàng
	{
		$sqlcheck ="SELECT MaTaiKhoan FROM taikhoan WHERE TenDangNhap ='".$_SESSION['tenDN']."'"; //tìm mã tài khoản mà có tên đăng nhập tương ứng
		$resultcheck = DataProvider::ExcuteQuery($sqlcheck);
		$row = mysqli_fetch_row($resultcheck);
		
		$sqldh = "insert into dondathang(NgayLap, TongThanhTien, MaTaiKhoan, MaTinhTrang) 
					values(NOW(),'".$tongcong."','".$row[0]."', 0)"; //thêm vào bảng đon đặt hàng
					
		$resultdh = DataProvider::ExcuteQuery($sqldh);
		
		echo '<h2 align="center" style="color:red"> ĐẶT HÀNG THÀNH CÔNG </h2>';
		unset($_SESSION['giohang']); //đặt hàng rồi thì xóa session giỏ hàng đi
	
	//tạo script đợi5s sau tự động load về trang index và sau khi mua hàng thành công
?>
		<script> 
			window.setTimeout(function() {
				window.location = 'index.php';
			  }, 5000);
		</script>
<?php
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