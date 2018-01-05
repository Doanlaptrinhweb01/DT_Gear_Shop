<div style="width:183%;">
<h1 align="center" style="margin-top:0px"> DANH SÁCH SẢN PHẨM</h1> 
<div class="search" style="" align="center">
 
   
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
		$page1=($page * 5)- 5;	// ngược lại ví dụ ta bấm vào page 2 thì 2*5 -5 = 5 là sẽ lấy kể từ vị trí 5 5 sp
	}
	
	
	if(isset($_POST['btnsearch']))
	{
		$search = $_POST['txtsearch'];
		$sql = "select * from sanpham where TenSanPham like '%".$search."%'";
	}
	else
	{
		$sql = "select * from sanpham limit $page1,5";
	}
	
	if(isset($_POST['btnall']))
	{
		$sql = "select * from sanpham limit $page1,5";	
	}

	$result = DataProvider::ExcuteQuery($sql);
?>
<div style="width:100%">
	<form method="post" action="index.php?a=1">
        <input type="text" name="txtsearch" placeholder="Tìm sản phẩm..." size="35" id="txt-search"/>
                <input type="submit" name="btnsearch" value="search" id="btn-search"/>
                <input type="submit" name="btnall" value="Tất cả sản phẩm" id="btn-all"/>


<table width="100%" border="1" cellspacing="0" cellpadding="5" align="center">
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
          <td></td>
          <td></td>
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
	  
	  $mau ='';
	  if($bixoa == 1)
	  {
		  $mau = 'style="background-color:#999"';
	  }
?>
  <tr <?php echo $mau?>>
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
    <td><a href="<?php echo $masp?>"> Sửa </a></td>
    <td><a onclick="return confirm('are you sure')" href="index.php?a=1&idd=<?php echo $masp?>">Xóa</a></td>
  </tr>
<?php
  }
?>
</table>
</form>
<div class="page" align="center">
<?php
	$sql2 = "select * from sanpham";
	$result2 = DataProvider::ExcuteQuery($sql2);//viết câu truy vấn lấy ra tất cả các dòng
	
	$numrow = mysqli_num_rows($result2); //đếm số lượng dòng
	
	$rowperpage = $numrow/5; //lấy ra số lượng trang để mỗi trang có 5sp
	
	for($i = 1; $i <= CEIL($rowperpage) ;$i++) //cho vòng lặp đi từ 1 đến tổng trang
	//hàm CEIL có nhiệm vụ vd có 22 sản phẩm thì 22/5 = 4.4 nếu không làm tròn thì chỉ sẽ lấy 4 trang nên hàm ceil có tác dụng làm tròn 4.4 thành 5 trang
	{
		echo '<a href="index.php?a=1&page='.$i.'" style="text-decoration:none">'.$i.'&nbsp;&nbsp;</a>';	
	}
?>

</div> 
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
		$slton = $_POST['txtslton'];
		$mota = $_POST['txtmota'];
		$maloaisp = $_POST['slloaisp'];
		$mahsx = $_POST['slhangsx'];	
		
		$sql = "INSERT INTO sanpham (TenSanPham, HinhURL, GiaSanPham, NgayNhap, SoLuongTon, SoLuongBan, SoLuocXem, MoTa, BiXoa, MaLoaiSanPham, MaHangSanXuat) 	              
		VALUES ('".$tensp."','".$hinh['name']."','".$gia."',NOW(),'".$slton."',0,0,'".$mota."',0,'".$maloaisp."','".$mahsx."')";
		
		$result = DataProvider::ExcuteQuery($sql);
		
		if($result == true)
		{
			echo "Thêm thành công";	
		}
		else
		{
			echo "Thêm Thất bại";	
		}
	}
	
	if(isset($_GET['idd']))
	{
		$idd = $_GET['idd'];
		$sqldl = "update sanpham set BiXoa = 1 where MaSanPham ='".$idd."'";
		$resultdl = DataProvider::ExcuteQuery($sqldl);
		if($resultdl == true)
		{
		?>
        	<script type="text/javascript">
				alert("Xóa thành công");
			</script>
        <?php	
		}
		else
		{
		?>
        	<script type="text/javascript">
				alert("Xóa không thành công");
			</script>
        <?php	
		}
	}
?>
<div style="width:100px;">
    <form method="post" enctype="multipart/form-data">
        <strong> Tên sản phẩm </strong>
            <input type="text" name="txttensp" />
        <strong> Hình </strong>
            <input type="file" name="hinh" />
        <strong> Giá </strong>
            <input type="number" name="txtgia" />
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
</div>