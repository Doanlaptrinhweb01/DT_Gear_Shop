<div class="hangxanxuat">
    <h1> Hãng sản xuất </h1>
    <?php
		include_once('lib/DataProvider.php');
		$sql = "SELECT MaHangSanXuat,TenHangSanXuat FROM hangsanxuat";
		
		$result = DataProvider::ExcuteQuery($sql);
		while($row = mysqli_fetch_array($result))
		{
			$tenhangsanxuat = $row['TenHangSanXuat'];
			$mahangsanxuat = $row['MaHangSanXuat'];
	?>
    	<a href="index.php?idi=<?php echo $mahangsanxuat?>"> <?php echo $tenhangsanxuat?></a> <br/>
    <?php
		}
	?>
</div>