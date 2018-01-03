<h1 align="center" style="margin-top:0px"> DANH SÁCH SẢN PHẨM</h1> 
<div class="search" style="" align="center">
    <form method="post" action="">
        <input type="text" name="txtsearch" placeholder="Tìm sản phẩm..." size="35" id="txt-search"/>
        <input type="submit" name="btnsearch" value="search" id="btn-search"/>
    </form>
</div>
<?php
	include('../lib/DataProvider.php');
	
	$page = isset($_GET['page']) ? $_GET['page'] : ''; //lấy ra tham số page trên đường url
	
	if($page =="" || $page =='1') //nếu page là rỗng hay page là 1
	{
		$page1 = 0;//thì set page1 = 0 ý là limit 0,5 là trang đầu tiên
	}
	else
	{
		$page1=($page * 5)-5;	// ngược lại ví dụ ta bấm vào page 2 thì 2*5 -5 = 5 là sẽ lấy kể từ vị trí 5 5 sp
	}
	
	
	$sql = "select * from sanpham limit $page1,5";
	$result = DataProvider::ExcuteQuery($sql);
?>
<table width="1350" border="1" cellspacing="0" cellpadding="5" align="center">
  <tr>
    <td>Mã sản phẩm</td>
    <td>Tên sản phẩm</td>
    <td>Hình</td>
    <td>Giá</td>
    <td>Ngày nhập</td>
    <td>Số lượng tồn</td>
    <td>Số lượng bán</td>
    <td>Số lược xem</td>
    <td>Bị xóa</td>
    <td>Mã Loại Sản phẩm</td>
    <td>Mã hãng sản xuất</td>
  </tr>
<?php
  while($row = mysqli_fetch_array($result))
  {
	  $masp = $row['MaSanPham'];
	  $tensp = $row['TenSanPham'];
	  $hinh = $row['HinhURL'];
	  $gia = $row['GiaSanPham'];
	  $ngaynhap = $row['NgayNhap'];
	  $slton = $row['SoLuongTon'];
	  $slban = $row['SoLuongBan'];
	  $luocxem = $row['SoLuocXem'];
	  $mota = $row['MoTa'];
	  $bixoa = $row['BiXoa'];
	  $maloaisp = $row['MaLoaiSanPham'];
	  $mahsx = $row['MaHangSanXuat'];
?>
  <tr>
  	<td><?php echo $masp?></td>
    <td><?php echo $tensp?></td>
    <td><?php echo $hinh?></td>
    <td><?php echo $gia?></td>
    <td><?php echo $ngaynhap?></td>
    <td><?php echo $slton?></td>
    <td><?php echo $slban?></td>
    <td><?php echo $luocxem?></td>

    <td><?php echo $bixoa?></td>
    <td><?php echo $maloaisp?></td>
    <td><?php echo $mahsx?></td> &nbsp;
  </tr>
<?php
  }
?>
</table>
<div class="page" align="center">
<?php
	$sql2 = "select * from sanpham";
	$result2 = DataProvider::ExcuteQuery($sql2);//viết câu truy vấn lấy ra tất cả các dòng
	
	$numrow = mysqli_num_rows($result2); //đếm số lượng dòng
	
	$rowperpage = $numrow/5; //lấy ra số lượng trang để mỗi trang có 5sp
	
	for($i = 1; $i <= $rowperpage ;$i++) //cho vòng lặp đi từ 1 đến tổng trang
	{
		echo '<a href="admin_trangchu?a=1&page='.$i.'" style="text-decoration:none">'.$i.'&nbsp;&nbsp;</a>';	
	}
?>
</div>


<?php
	$sqlloaisp = "select MaLoaiSanPham, TenLoaiSanPham from loaisanpham";
	$sqlhangsx = "select MaHangSanXuat, TenHangSanXuat from hangsanxuat";
	
	$resultloaisp = DataProvider::ExcuteQuery($sqlloaisp);
	$resulthangsx = DataProvider::ExcuteQuery($sqlhangsx);
	
	
	$tensp = '';
	$hinh = '';
	$gia = '';
	$ngaynhap ='';
	$slton = '';
	$mota = '';
	$maloaisp = '';
	$mahsx = '';
	
	if(isset($_POST['btnthem']))
	{
		$tensp = $_POST['txttensp'];
		$hinh = $_FILES['hinh'];
		move_uploaded_file($hinh['tmp_name'],'images/San_Pham/'.$hinh['name']);
		$gia = $_POST['txtgia'];
		$ngaynhap =$_POST['txtngaynhap'];
		$slton = $_POST['txtslton'];
		$mota = $_POST['txtmota'];
		$maloaisp = $_POST['slloaisp'];
		$mahsx = $_POST['slhangsx'];	
		
		$sql = "INSERT INTO sanpham (TenSanPham, HinhURL, GiaSanPham, NgayNhap, SoLuongTon, SoLuongBan, SoLuocXem, MoTa, BiXoa, MaLoaiSanPham, MaHangSanXuat) 	              VALUES ('".$tensp."','".$hinh['name']."','".$gia."','".$ngaynhap."','".$slton."',0,0,'".$mota."',0,'".$maloaisp."','".$mahsx."')";
		
		$result = DataProvider::ExcuteQuery($sql);
		
		var_dump($result);
	}
?>
<div style="width:100px">
<form method="post" enctype="multipart/form-data">
    <strong> Tên sản phẩm </strong>
    	<input type="text" name="txttensp" />
    <strong> Hình </strong>
    	<input type="file" name="hinh" />
    <strong> Giá </strong>
    	<input type="number" name="txtgia" />
    <strong> Ngày nhập </strong>
    	<input type="datetime" name="txtngaynhap" />
    <strong> Số lượng tồn </strong>
    	<input type="number" name="txtslton" />
    <strong> Mô tả </strong>
    	<textarea name="txtmota"> </textarea>
    <strong> Mã loại sản phẩm </strong>
    	<select name="slloaisp"> 
        	<?php
				while($row = mysqli_fetch_array($resultloaisp))
				{
					$maloai = $row['MaLoaiSanPham'];
					$tenloai = $row['TenLoaiSanPham'];
					
					echo '<option value="'.$maloai.'">'.$maloai.'-'.$tenloai.'</option>';	
				}
			?>	
        </select>
    <strong> Mã hãng sản xuất </strong>
    	<select name="slhangsx"> 
        	<?php
				while($row = mysqli_fetch_array($resulthangsx))
				{
					$mahang = $row['MaHangSanXuat'];
					$tenhang = $row['TenHangSanXuat'];
					
					echo '<option value="'.$mahang.'">'.$mahang.'-'.$tenhang.'</option>';	
				}
			?>		
        </select>
        
       	<input type="submit" name="btnthem" value="Thêm" />
</form>
</div>