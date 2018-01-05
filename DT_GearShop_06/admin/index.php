<?php
	include("layout/head.php");
?>

<body>
    <div class="main">
        <?php
            include("layout/header.php");
        ?>
    
        <div class="content">
            <?php
                include("layout/content_left.php");
            ?>	
            <div class="cotent-right" style="width:600px">
                <?php
                    $a = (isset($_GET['a'])) ? $_GET['a'] : 0;
                    
                    switch($a)
                    {
                        case 1:
                            include("QL_SanPham.php");
                            break;
                        case 2:
                            include("QL_LoaiSanPham.php");
                            break;
                        case 3:
                            include("QL_NSX.php");
                            break;
                        case 4:
                            include("QL_TaiKhoan.php");
                            break;
                        case 5:
                            include("QL_DonHang.php");
                            break;
                        default:
                            echo '<h1 align="center" style="color:red;">Chào mừng bạn đã đến mới trang quản lý của admin</h1>';
                            break;	
                    }
                ?>
            </div>
        </div>
       </div>
    </div>
</body>
</html>