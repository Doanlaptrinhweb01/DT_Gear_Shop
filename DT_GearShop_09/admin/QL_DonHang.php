<div style="width:100%;">
    <h1 align="center" style="color:#F00"> DANH SÁCH ĐƠN ĐẶT HÀNG</h1> 
  	<div class="search" style="" align="center">
	    <form method="post" action="">
	        <input type="text" name="txtsearch" placeholder="Tìm đơn hàng(theo mã)..." size="35" class="txt"/>
	        <input type="submit" name="btnsearch" value="search" class="btn"/>
	    </form>
	</div>
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
		$sql = "select dondathang.*, DienThoai from dondathang, taikhoan where dondathang.MaTaiKhoan = taikhoan.MaTaiKhoan and 
		MaDonDatHang like '%".$search."%'";
	}
	else
	{
		$sql = "select dondathang.*, DienThoai from dondathang, taikhoan where dondathang.MaTaiKhoan = taikhoan.MaTaiKhoan limit $page1,5";
	}

	$result = DataProvider::ExcuteQuery($sql);
?>
<div style="width:100%">
    <form method="post" action="index.php?a=1">
        <table width="100%" border="0" cellspacing="0" cellpadding="5" align="center">
            <tr id="tr-list">
                <td>Mã đơn đặt hàng</td>
                <td>Ngày lập</td>
                <td>Tổng tiền</td>
                <td>Mã Tài khoản</td>
                <td>SoDienThoai</td>
                <td>Tình trạng</td>
                <td></td>
            </tr>
            <?php
              while($row = mysqli_fetch_array($result))
              {
                  $madondathang = $row['MaDonDatHang'];
                  $ngaylap = $row['NgayLap'];
                  $tongtien = $row['TongThanhTien'];
                  $mataikhoan = $row['MaTaiKhoan'];
                  $matinhtrang = $row['MaTinhTrang'];
                  $dienthoai = $row['DienThoai'];
				  				  
                  $mau ='';
                  if($matinhtrang == 0)
                  {
                      $mau = 'style="background-color:#999999"';
                  }
            ?>
            <tr <?php echo $mau ?> >
                <td><?php echo $madondathang ?></td>
                <td><?php echo $ngaylap?></td>
                <td><?php echo number_format($tongtien)?> VNĐ</td>
                <td><?php echo $mataikhoan ?></td>
                <td><?php echo $dienthoai ?></td>
                <td><?php echo $matinhtrang == 1?"Đã giao":"Chưa giao"?></td>
 
                <td><strong><a href="GiaoHang.php?idd=<?php echo $madondathang?>">Giao</a></strong></td>
            </tr>
                <?php
                  }
				                    
                ?>
        </table>
    </form>
    <div class="page" align="center">
    <?php
        $sql2 = "select dondathang.*, DienThoai from dondathang, taikhoan where dondathang.MaTaiKhoan = taikhoan.MaTaiKhoan";
        $result2 = DataProvider::ExcuteQuery($sql2);//viết câu truy vấn lấy ra tất cả các dòng
        
        $numrow = mysqli_num_rows($result2); //đếm số lượng dòng
        
        $rowperpage = $numrow/5; //lấy ra số lượng trang để mỗi trang có 5sp
        
        for($i = 1; $i <= CEIL($rowperpage) ;$i++) //cho vòng lặp đi từ 1 đến tổng trang
        //hàm CEIL có nhiệm vụ vd có 22 sản phẩm thì 22/5 = 4.4 nếu không làm tròn thì chỉ sẽ lấy 4 trang nên hàm ceil có tác dụng làm tròn 4.4 thành 5 trang
        {
            echo '<a href="index.php?a=8&page='.$i.'" style="text-decoration:none">'.$i.'&nbsp;&nbsp;</a>';	
        }
    ?>
    
    </div> 
</div>

<!--
<?php
	//if(isset($_GET['idd']))
	//{
		//$idd = $_GET['idd'];
		//$sqldl = "update dondathang set MaTinhTrang=1 where MaDonDatHang ='".$idd."'";
		//$resultdl = DataProvider::ExcuteQuery($sqldl);
		//if($resultdl == true)
		//{
		//?>
        	<script type="text/javascript">
				//alert("Đặt hàng thành công");
			//</script>
       <?php	
		//}
		//else
		//{
		?>
        	<script type="text/javascript">
				alert("Đặt hàng không thành công");
			</script>
        <?php	
		//}
	//}
?>

-->
