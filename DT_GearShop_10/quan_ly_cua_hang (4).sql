-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 30, 2017 lúc 11:12 AM
-- Phiên bản máy phục vụ: 5.7.19
-- Phiên bản PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quan_ly_cua_hang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdondathang`
--

DROP TABLE IF EXISTS `chitietdondathang`;
CREATE TABLE IF NOT EXISTS `chitietdondathang` (
  `MaChiTietDatHang` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `GiaBan` int(11) NOT NULL,
  `MaDonDatHang` int(9) NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  KEY `FK_ChiTietDonDatHang_dondathang` (`MaDonDatHang`),
  KEY `FK_ChiTietDonDatHang_sanpham` (`MaSanPham`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdondathang`
--

INSERT INTO `chitietdondathang` (`MaChiTietDatHang`, `SoLuong`, `GiaBan`, `MaDonDatHang`, `MaSanPham`) VALUES
(1, 1, 23290000, 40, 1),
(1, 1, 5990000, 40, 16),
(2, 2, 490000, 41, 15),
(2, 2, 8062000, 41, 12),
(3, 2, 5990000, 43, 16),
(3, 1, 3700000, 43, 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dondathang`
--

DROP TABLE IF EXISTS `dondathang`;
CREATE TABLE IF NOT EXISTS `dondathang` (
  `MaDonDatHang` int(9) NOT NULL AUTO_INCREMENT,
  `NgayLap` datetime NOT NULL,
  `TongThanhTien` int(11) NOT NULL,
  `MaTaiKhoan` int(11) NOT NULL,
  `MaTinhTrang` int(11) NOT NULL,
  PRIMARY KEY (`MaDonDatHang`),
  KEY `FK_DonDatHang_TinhTrang` (`MaTinhTrang`),
  KEY `FK_DonDatHang_TaiKhoan` (`MaTaiKhoan`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dondathang`
--

INSERT INTO `dondathang` (`MaDonDatHang`, `NgayLap`, `TongThanhTien`, `MaTaiKhoan`, `MaTinhTrang`) VALUES
(40, '2017-12-26 19:43:24', 29280000, 1, 1),
(41, '2017-12-26 19:44:35', 17104000, 1, 1),
(43, '2017-12-27 13:36:12', 15680000, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hangsanxuat`
--

DROP TABLE IF EXISTS `hangsanxuat`;
CREATE TABLE IF NOT EXISTS `hangsanxuat` (
  `MaHangSanXuat` int(11) NOT NULL AUTO_INCREMENT,
  `TenHangSanXuat` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `LogoURL` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `BiXoa` tinyint(1) NOT NULL,
  PRIMARY KEY (`MaHangSanXuat`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hangsanxuat`
--

INSERT INTO `hangsanxuat` (`MaHangSanXuat`, `TenHangSanXuat`, `LogoURL`, `BiXoa`) VALUES
(1, 'LogiTech', 'Logitech_logo.PNG', 0),
(2, 'Asus', 'Asus-logo.PNG', 0),
(3, 'MSI', 'MSI_logo.PNG', 0),
(4, 'Apple', 'apple.PNG', 0),
(5, 'Dell', 'dell-logo.PNG', 0),
(6, 'HP', '22375229_531035857236857_1077614815_o.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

DROP TABLE IF EXISTS `loaisanpham`;
CREATE TABLE IF NOT EXISTS `loaisanpham` (
  `MaLoaiSanPham` int(11) NOT NULL AUTO_INCREMENT,
  `TenLoaiSanPham` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `BiXoa` tinyint(1) NOT NULL,
  PRIMARY KEY (`MaLoaiSanPham`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`MaLoaiSanPham`, `TenLoaiSanPham`, `BiXoa`) VALUES
(1, 'Gaming Gear', 0),
(2, 'Thiết bị tin học', 0),
(3, 'Sản phẩm apple', 0),
(4, 'LapTop Máy Tính', 0),
(5, 'Thiết bị cứng', 1),
(6, 'Phần cứng', 1),
(7, 'Phần miềm', 1),
(8, 'Phần miềm', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaitaikhoan`
--

DROP TABLE IF EXISTS `loaitaikhoan`;
CREATE TABLE IF NOT EXISTS `loaitaikhoan` (
  `MaloaiTaiKhoan` int(11) NOT NULL,
  `TenLoaiTaiKhoan` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MaloaiTaiKhoan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaitaikhoan`
--

INSERT INTO `loaitaikhoan` (`MaloaiTaiKhoan`, `TenLoaiTaiKhoan`) VALUES
(0, 'User'),
(1, 'Admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE IF NOT EXISTS `sanpham` (
  `MaSanPham` int(11) NOT NULL AUTO_INCREMENT,
  `TenSanPham` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `HinhURL` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `GiaSanPham` int(11) NOT NULL,
  `NgayNhap` datetime NOT NULL,
  `SoLuongTon` int(11) NOT NULL,
  `SoLuongBan` int(11) NOT NULL,
  `SoLuocXem` int(11) NOT NULL,
  `MoTa` text COLLATE utf8_unicode_ci NOT NULL,
  `BiXoa` tinyint(1) NOT NULL,
  `MaLoaiSanPham` int(11) NOT NULL,
  `MaHangSanXuat` int(11) NOT NULL,
  PRIMARY KEY (`MaSanPham`),
  KEY `FK_SanPham_HangSanXuat` (`MaHangSanXuat`),
  KEY `FK_SanPham_LoaiSanPham` (`MaLoaiSanPham`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSanPham`, `TenSanPham`, `HinhURL`, `GiaSanPham`, `NgayNhap`, `SoLuongTon`, `SoLuongBan`, `SoLuocXem`, `MoTa`, `BiXoa`, `MaLoaiSanPham`, `MaHangSanXuat`) VALUES
(1, 'Laptop Asus GL553VD-FY305 (I7-7700HQ)', 'AsusGL553VD.jpg', 23290000, '2017-12-25 13:03:43', 343, 102, 1017, 'Laptop chơi game tầm trung với RoG Strix GL553VD. Đây chính là bản nâng cấp của GL552VW vốn được rất nhiều anh em ưa thích bởi mức giá vừa phải, thiết kế đẹp và hiệu năng khá', 0, 4, 2),
(2, 'Laptop MacBook 15\'\' MPTT2', 'MacBook_MPTT2.JPG', 69790000, '2017-05-12 00:00:00', 15, 12, 570, 'Hãng CPU:Intel,Công nghệ CPU:Intel Core i7\r\n,Tốc độ CPU:2.9GHz,Dung lượng RAM:16GB\r\n,Loại RAM:SDRAM,Loại ổ đĩa:SSD\r\nDung lượng ổ đĩa:,512GB,Chipset đồ họa:Radeon Pro 560,Bộ nhớ đồ họa:4GB', 0, 3, 4),
(3, 'Tai nghe Logitech G633 Gaming', 'TaiNgheG633.jpg', 2950000, '2017-02-27 00:00:00', 67, 123, 789, 'Các sản phẩm do Logitech chế tạo luôn được đánh giá cao về mọi mặt, sự chính xác, âm thanh chuẩn, không gian game rộng mở, thoải mái khi đeo lâu và hoạt động bền bỉ. Tiếp nối những yếu tố mang đến thành công đó, cùng với việc ra mắt thêm bộ nhận diện thương hiệu mới', 0, 1, 1),
(4, 'Màn hình LCD Dell 27\'\' S2718H', 'ManHinhDell27.jpg', 7790000, '2017-02-28 00:00:00', 43, 17, 204, 'Cũng thuộc dòng màn hình 27 inch, S2718H mang lại không gian làm việc thoải mái cũng như hướng đến đối tượng có yêu cầu cao về giải trí.S2718H sở hữu độ sáng khung hình 250cd/m2, tần số quét 60Hz, độ tương phản 1000:1 và độ phân giải FHD cung cấp chất lượng hình ảnh chân thật, sống động.', 0, 2, 5),
(5, ' PC iMac MNE02', 'PCiMacMNE02.jpg', 42500000, '2017-03-15 00:00:00', 4, 12, 68, 'PC iMac  luôn là một trong những sản phẩm nhận được rất nhiều sự quan tâm của người tiêu dùng cũng như tín đồ của Apple khi Apple cho ra một sản phẩm mới là một sự kiện luôn được quan tâm và chờ đợi chọn mua một sản phẩm máy tính phục vụ cho công việc của mình.', 0, 3, 4),
(6, 'Laptop MSI GP72M 7REX-1216XVN (I7-7700HQ)', 'LaptopMSIGP72M.jpg', 27499000, '2017-03-17 00:00:00', 234, 78, 469, 'MSI GP72M 7REX-1216XVN Leopard Pro được thiết kế lý tưởng giữa bề mặt nhôm kim loại phay xước kết hợp với khung máy vô cùng chắc chắn, đi cùng với đó là màu sắc hài hòa giữa tông màu đen đỏ đặc trưng làm nổi bật lên vẻ đẹp mạnh mẽ nam tính trên một một chiếc laptop gaming.', 0, 4, 3),
(7, 'Bàn phím Logitech Pro Gaming', 'BanPhamLogitechPro.jpg', 2090000, '2017-04-09 00:00:00', 14, 243, 1048, 'Những chiếc switch Romer-G™ được thiết kế dành riêng cho game thủ chuyên nghiệp, phản hồi tốt và độ bền cao. Điểm kích hoạt ngắn ở 1.5mm nhanh hơn 25% sơ với các switch cơ học thường dùng khác. Với sự kết hợp hoàn hảo giữa tốc độ, độ chính xác và hiệu năng', 0, 1, 1),
(8, 'Loa Logitech Z337', 'LoaLogitechZ337.jpg', 1650000, '2017-06-03 00:00:00', 234, 45, 553, 'Tận hưởng sự tiện lợi của việc truyền phát không dây và không bao giờ phải lo lắng về thời gian sử dụng pin bởi vì hệ thống loa 2.1 này luôn được cắm điện. Công suất tối đa 80 Watt/Công suất RMS 40 Watt đem lại âm thanh nổi trội.', 0, 2, 1),
(9, 'Chuột máy tính Logitech Gaming G903', 'chuotLogitechG903.jpg', 3700000, '2017-08-15 00:00:00', 531, 24, 746, 'Chuột Gaming không dây - 2.4GHz. Độ phân giải: 200-12.000 dpi, độ nhạy: 1ms, độ bền: 50.000.000 lần nhấn. Đèn LED RGB 16.8 triệu màu, tích hợp sạc không dây với padPOWERPLAY, thời lượng pin 32 giờ, 4 nút tùy chọn', 0, 1, 1),
(10, 'Laptop Dell Inspiron 13 7370-7D61Y2', 'LaptopDellInspiron13.jpg', 34390000, '2017-05-02 00:00:00', 43, 34, 726, 'Thiết kế thanh mảnh, mỏng manh giúp bạn thêm không gian màn hình cho những hình ảnh tuyệt đẹp, trong khi màn hình IPS Full HD (với tùy chọn cảm ứng có sẵn) cho phép bạn xem màn hình từ nhiều góc độ mà không ảnh hưởng đến chất lượng hình ảnh. Ngoài ra, một bảng điều khiển 300-nit sáng rõ ràng làm việc ở ngoài trời dễ dàng hơn và luồng thú vị hơn. ', 0, 4, 5),
(11, 'Điện thoại iPhone X 256GB A1901', 'iPhoneX256GB.jpg', 34200000, '2017-11-26 00:00:00', 12, 10, 1299, 'Không còn nghi ngờ gì nữa, kiểu dáng của chiếc iPhone X được lấy cảm hứng thiết kế từ iPhone 4. Với bộ khung kim loại bóng bẩy cùng 2 lớp kính ở mặt trước/sau, siêu phẩm này thực sự quá bắt mắt và sang trọng. Đặc biệt, lớp kính mà Apple sử dụng đã được các đối tác gia công đến 7 lớp màu khác nhau nhằm giúp ngoại hình máy trở nên rất nổi bật.', 0, 3, 4),
(12, 'Mainboard Asus Maximus X Hero', 'MainboardAsusMaximus.jpg', 8062000, '2017-10-22 00:00:00', 21, 80, 971, 'Hỗ trợ Multi-GPU:S/p NVIDIA 2-Way SLI, AMD 3-Way CrossFireX Khe cắm mở rộng:PCIe x16, 3x PCIe x1, 2x PCIe (x16, x8/x8)\r\nLưu trữ:2x M.2 2242/2260/2280 (Sata/ PCIe 3 x4), 6x Sata3. Raid 0/1/5/10\r\nLAN:Intel Gigabit LAN.Âm thanh:Audio ROG 8-CH CODEC S1120A', 0, 2, 2),
(13, 'Laptop MSI GV62 7RD-1883XVN (I5-7300HQ)', 'LaptopMSIGV627RD.jpg', 21640000, '2017-09-28 00:00:00', 31, 45, 739, 'Với giải pháp làm mát Cooler Boost 4 sáng tạo và các tính năng chơi game độc ​​quyền của MSI dành cho game thủ, bộ vi xử lý Intel Kaby Lake Core i5 7300HQ trang bị trên MSI GV62 7RD-1883XVN sẽ đảm bảo cho bạn một hiệu suất vô cùng mạnh mẽ.', 0, 4, 3),
(14, 'Laptop MacBook Air MQD32ZP/A', 'LaptopMacBookAir.jpg', 23790000, '2017-03-21 00:00:00', 17, 13, 1346, 'Hãng CPU:Intel.Công nghệ CPU:Intel Core i5.Loại CPU:Dual - Core.Tốc độ CPU:1.8GHz.Tốc độ tối đa:2.9GHz.Hỗ trợ RAM tối đa:Không hỗ trợ nâng cấp.Dung lượng RAM:	8GB.Loại RAM:DDR3L.Tốc độ BUS RAM:1600 MHz.Loại ổ đĩa:SSD.Chipset đồ họa HD Graphics 6000.Kích thước màn hình:13.3 inch.Kênh âm thanh:2.0.Loại đĩa quang:	Không', 0, 3, 4),
(15, 'Chuột máy tính Asus CERBERUS', 'chuotAsusCERBERUS.jpg', 490000, '2017-12-17 00:00:00', 109, 139, 827, 'Chuột quang có dây, độ phân giải: 500 - 2.500 dpi, dây cáp bện với đầu cắm USB connector mạ vàng.\r\n', 0, 1, 2),
(16, 'Màn hình LCD Asus 31.5\'\'VA325H', 'manghinhLCDAsus31.jpg', 5990000, '2017-08-26 00:00:00', 57, 22, 551, 'Màn hình VA325H 31,5” Full HD với góc nhìn rộng 178°, Tỷ lệ Tương phản Thông minh 100.000.000:1 cùng các công nghệ SplendidPlus và VividPixel độc quyền của ASUS, được tối ưu cho chất lượng hình ảnh và màu sắc tốt nhất. Màn hình VA325H với góc nhìn siêu rộng 178˚ (Ngang) / 178˚ (Dọc) loại trừ hiện tượng biến màu trên màn hình của bạn dù bạn nhìn từ vị trí nào và bằng cách nào đi chăng nữa.', 0, 2, 2),
(17, 'Card màn hình Msi 8GB GTX1070 Ti Gaming 8G', 'CardMs8GBGTX1070Ti.jpg', 15430000, '2017-10-20 00:00:00', 72, 32, 333, 'Loại Chipset:	NVIDIA GeForce GTX 1070 Ti\r\nin OC mode:	1683 MHz / 1607 MHz\r\nin Gaming mode:	1468 MHz / 1354 MHz\r\nMemory Clock:	8008 MHz\r\nMemory Size:	8GB\r\nMemory Type:	GDDR5\r\nMemory Bus:	256-bit\r\nCardBus:	PCI-E 3.0 x16\r\nOutput:	3x DisplayPort, HDMI, DVI-D\r\nSố lượng màn hình xuất ra:	4\r\nCông xuất nguồn:	500W', 0, 2, 3),
(18, 'Laptop Asus GL703VD-EE057T (I7-7700HQ)', 'LaptopAsusGL703VD.jpg', 27900000, '2017-09-14 00:00:00', 163, 15, 815, 'Asus ROG Strix Scar Edition GL703VD được thiết kế dành riêng cho những tay súng sắc bén nhất trong những chuyến đi săn khắc nghiệt nhất – tối ưu hóa để đạt được lợi thế cạnh tranh trong các tựa game FPS như : Player Unknown\'s  Battlegrounds ,CF ,Counter-Strike, Overwatch, và Team Fortress 2.', 0, 4, 2),
(19, 'Tai nghe Logitech G430 Gaming', 'TaiNgeG430.jpg', 1250000, '2017-06-01 00:00:00', 268, 124, 2319, 'Tai nghe Logitech G 430 là dòng tai nghe chơi game có âm thanh 7.1 - thiết kế tối ưu nhất  về trọng lượng cho game thủ khi đeo suốt trong quá trình chiến game mà sợ mỏi. Củ tai khá mềm mại, vòm tai có thể điều chỉnh tùy vào kích cỡ đầu của người dùng. Logitech G430 có âm thanh 7.1 vô cùng sống động và mức giá cực mềm so với các dòng tai nghe gaming 7.1 cho game thủ hiện nay.\r\n\r\n', 0, 1, 1),
(20, 'Máy tính bảng Apple iPad 2017 ', 'AppleiPad2017.jpg', 12520000, '2017-01-14 00:00:00', 13, 5, 98, 'Với con chip Apple A9 2 nhân 64-bit, 1.84 GHz, RAM 2 GB kết hợp với hệ điều hành iOS mượt mà sẽ mang lại cho bạn trải nghiệm mượt mà và trơn tru mà khó có thiết bị nào cùng phân khúc có thể đem lại.', 0, 3, 4),
(25, 'Magic Mouse Không dây', '22375229_531035857236857_1077614815_o.jpg', 456000, '2017-12-25 13:23:08', 12, 0, 0, 'Con chuột này kinh lắm', 1, 3, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

DROP TABLE IF EXISTS `taikhoan`;
CREATE TABLE IF NOT EXISTS `taikhoan` (
  `MaTaiKhoan` int(11) NOT NULL AUTO_INCREMENT,
  `TenDangNhap` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `TenHienThi` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `DienThoai` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `BiXoa` tinyint(1) NOT NULL,
  `MaLoaiTaiKhoan` int(11) NOT NULL,
  PRIMARY KEY (`MaTaiKhoan`),
  KEY `MaLoaiTaiKhoan` (`MaLoaiTaiKhoan`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`MaTaiKhoan`, `TenDangNhap`, `MatKhau`, `TenHienThi`, `DiaChi`, `DienThoai`, `Email`, `BiXoa`, `MaLoaiTaiKhoan`) VALUES
(1, 'phat', '12345678', 'Tan_Phat', '227 nguyen van cu', '090989765', 'tanphat@gmail.com', 0, 0),
(2, 'ngoc', '12345678', 'Ngoc', '135 KTX Tran Hung Da0', '9123456789', 'ngoc_truong@gmail.com', 1, 0),
(3, 'tanphat', '987654321', 'Tan-Phat-AM', '227 Tran Hung Dao', '0909876542', 'tanphat123@gmail.com', 1, 1),
(4, 'ngoctruong', '12345678', 'Trương Tiến Ngọc', '135KTX Trần Hưng Đạo', '0122789456', 'ngoctruong@gmail.com', 0, 1),
(5, 'tanphat10197', '12345678', 'Huỳnh Lâm Tấn Phát', '228 Nguyễn Văn Cừ', '908712312', 'tanphat10197@gmail.com', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinhtrang`
--

DROP TABLE IF EXISTS `tinhtrang`;
CREATE TABLE IF NOT EXISTS `tinhtrang` (
  `MaTinhTrang` int(11) NOT NULL,
  `TenTinhTrang` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MaTinhTrang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tinhtrang`
--

INSERT INTO `tinhtrang` (`MaTinhTrang`, `TenTinhTrang`) VALUES
(0, 'Chưa giao'),
(1, 'Đã giao');

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdondathang`
--
ALTER TABLE `chitietdondathang`
  ADD CONSTRAINT `FK_ChiTietDonDatHang_dondathang` FOREIGN KEY (`MaDonDatHang`) REFERENCES `dondathang` (`MaDonDatHang`),
  ADD CONSTRAINT `FK_ChiTietDonDatHang_sanpham` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`);

--
-- Các ràng buộc cho bảng `dondathang`
--
ALTER TABLE `dondathang`
  ADD CONSTRAINT `FK_DonDatHang_TaiKhoan` FOREIGN KEY (`MaTaiKhoan`) REFERENCES `taikhoan` (`MaTaiKhoan`),
  ADD CONSTRAINT `FK_DonDatHang_TinhTrang` FOREIGN KEY (`MaTinhTrang`) REFERENCES `tinhtrang` (`MaTinhTrang`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `FK_SanPham_HangSanXuat` FOREIGN KEY (`MaHangSanXuat`) REFERENCES `hangsanxuat` (`MaHangSanXuat`),
  ADD CONSTRAINT `FK_SanPham_LoaiSanPham` FOREIGN KEY (`MaLoaiSanPham`) REFERENCES `loaisanpham` (`MaLoaiSanPham`);

--
-- Các ràng buộc cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `FK_taikhoan_loaitaikhoan` FOREIGN KEY (`MaLoaiTaiKhoan`) REFERENCES `loaitaikhoan` (`MaloaiTaiKhoan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
