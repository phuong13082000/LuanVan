-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 06, 2022 at 09:13 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `luanvan`
--

-- --------------------------------------------------------

--
-- Table structure for table `danhmucs`
--

DROP TABLE IF EXISTS `danhmucs`;
CREATE TABLE IF NOT EXISTS `danhmucs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kichhoat` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danhmucs`
--

INSERT INTO `danhmucs` (`id`, `name`, `slug`, `kichhoat`) VALUES
(2, 'Iphone', 'iphone', 0),
(10, 'Samsung', 'samsung', 0),
(11, 'Xiaomi', 'xiaomi', 0),
(12, 'Oppo', 'oppo', 0),
(14, 'Realme', 'realme', 0);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanphams`
--

DROP TABLE IF EXISTS `sanphams`;
CREATE TABLE IF NOT EXISTS `sanphams` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhanh` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia` int NOT NULL,
  `giakhuyenmai` int DEFAULT '0',
  `soluong` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cauhinh` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kichhoat` int NOT NULL DEFAULT '0',
  `noidung` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `danhmuc_id` int NOT NULL,
  `theloai_id` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `danhmuc_id` (`danhmuc_id`),
  KEY `theloai_id` (`theloai_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sanphams`
--

INSERT INTO `sanphams` (`id`, `name`, `slug`, `hinhanh`, `gia`, `giakhuyenmai`, `soluong`, `cauhinh`, `kichhoat`, `noidung`, `danhmuc_id`, `theloai_id`, `created_at`, `updated_at`) VALUES
(1, 'Iphone 13 Pro Max', 'iphone-13-pro-max', 'iphone-13-pro-max-sierra-blue-600x6006622.jpg', 33990000, 20000000, '10', '<ul><li>Chip Apple A15 Bionic</li><li>RAM: 6 GB</li><li>Dung lượng: 128 GB</li><li>Camera sau: 3 camera 12 MP</li><li>Camera trước: 12 MP</li><li>Pin 4352 mAh, Sạc 20 W</li></ul>', 0, '<figure class=\"image\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/230529/Kit/iphone-13-pro-max-n-2.jpg\" alt=\"Điện thoại iPhone 13 Pro Max 128GB\"></figure><h3>Thông tin sản phẩm</h3><h3>Điện thoại&nbsp;iPhone 13 Pro Max 128 GB&nbsp;- siêu phẩm được mong chờ nhất ở nửa cuối năm 2021 đến từ Apple. Máy có thiết kế không mấy đột phá khi so với người tiền nhiệm, bên trong đây vẫn là một sản phẩm có màn hình siêu đẹp, tần số quét được nâng cấp lên 120 Hz mượt mà, cảm biến camera có kích thước lớn hơn, cùng hiệu năng mạnh mẽ với sức mạnh đến từ Apple A15 Bionic, sẵn sàng cùng bạn chinh phục mọi thử thách.</h3><h3>Thiết kế đẳng cấp hàng đầu</h3><p>iPhone mới kế thừa thiết kế đặc trưng từ&nbsp;iPhone 12 Pro Max khi sở hữu khung viền vuông vức, mặt lưng kính cùng màn hình tai thỏ tràn viền nằm ở phía trước.</p><figure class=\"image\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/230529/iphone-13-pro-max-3.jpg\" alt=\"Thiết kế vuông vức đặc trưng - iPhone 13 Pro Max 128GB\"></figure><p>Với iPhone 13 Pro Max phần tai thỏ đã được thu gọn lại 20% so với thế hệ trước, không chỉ giải phóng nhiều không gian hiển thị hơn mà còn giúp mặt trước chiếc điện thoại trở nên hấp dẫn hơn mà vẫn đảm bảo được hoạt động của các cảm biến.</p><p><img src=\"https://cdn.tgdd.vn/Products/Images/42/230529/iphone-13-pro-max-2.jpg\" alt=\"Màn hình tai thỏ được tinh giản - iPhone 13 Pro Max 128GB\"></p><p>Điểm thay đổi dễ dàng nhận biết trên iPhone 13 Pro Max chính là kích thước của cảm biến camera sau được làm to hơn và để tăng độ nhận diện cho sản phẩm mới thì Apple cũng đã bổ sung một tùy chọn màu sắc&nbsp;Sierra Blue (màu xanh dương nhạt hơn so với Pacific Blue của iPhone 12 Pro Max).</p><p><img src=\"https://cdn.tgdd.vn/Products/Images/42/230529/iphone-13-pro-max-9.jpg\" alt=\"Sierra Blue trẻ trung, thanh lịch - iPhone 13 Pro Max 128GB\"></p><p>Máy vẫn tiếp tục sử dụng khung viền thép cao cấp cho khả năng chống trầy xước và va đập một cách vượt trội, kết hợp với khả năng kháng bụi, nước&nbsp;chuẩn IP68</p><p><img src=\"https://cdn.tgdd.vn/Products/Images/42/230529/iphone-13-pro-max-4.jpg\" alt=\"Viền thép cao cấp - iPhone 13 Pro Max 128GB\"></p><h3>Màn hình giải trí siêu mượt cùng tần số quét 120 Hz</h3><p>iPhone 13 Pro Max được trang bị màn hình kích thước 6.7 inch cùng độ phân giải 1284 x 2778 Pixels, sử dụng tấm nền OLED cùng công nghệ Super Retina XDR cho khả năng tiết kiệm năng lượng vượt trội nhưng vẫn đảm bảo hiển thị sắc nét sống động chân thực.</p><p><img src=\"https://cdn.tgdd.vn/Products/Images/42/230529/iphone-13-pro-max-5.jpg\" alt=\"Màn hình kích thước 6.7 inch - iPhone 13 Pro Max 128GB\"></p><p>iPhone Pro Max năm nay đã được nâng cấp lên tần số quét 120 Hz, mọi thao tác chuyển cảnh khi lướt ngón tay trên màn hình trở nên mượt mà hơn đồng thời hiệu ứng thị giác khi chúng ta chơi game hoặc xem video cũng cực kỳ mãn nhãn.</p><p><img src=\"https://cdn.tgdd.vn/Products/Images/42/230529/iphone-13-pro-max-6.jpg\" alt=\"Tốc độ làm tươi màn hình - iPhone 13 Pro Max 128GB\"></p><p>Cùng công nghệ ProMotion thông minh có thể thay đổi tần số quét từ 10 đến 120 lần mỗi giây tùy thuộc vào ứng dụng, thao tác bạn đang sử dụng, nhằm tối ưu thời lượng sử dụng pin và trải nghiệm của bạn.</p><p><img src=\"https://cdn.tgdd.vn/Products/Images/42/230529/iphone-13-pro-max-1.jpg\" alt=\"Công nghệ ProMotion thông minh - iPhone 13 Pro Max 128GB\"></p><p>Nếu bạn dùng iPhone 13 Pro Max để chơi game, tần số quét 120 Hz kết hợp hiệu suất đồ họa tuyệt vời của GPU sẽ khiến máy trở nên vô cùng hoàn hảo khi trải nghiệm.</p><p><img src=\"https://cdn.tgdd.vn/Products/Images/42/230529/iphone-13-pro-max-8.jpg\" alt=\"Mang đến trải nghiệm mượt mà - iPhone 13 Pro Max 128GB\"></p><p>Ngoài ra máy cũng hỗ trợ công nghệ True Tone, dải màu rộng chuẩn điện ảnh P3 sẽ cho mọi trải nghiệm của bạn trên máy trở nên ấn tượng hơn bao giờ hết.</p><p><img src=\"https://cdn.tgdd.vn/Products/Images/42/230529/iphone-13-pro-max-20.jpg\" alt=\"Dải màu chuẩn điện ảnh P3 - iPhone 13 Pro Max 128GB\"></p><h3>Cụm camera được nâng cấp toàn diện</h3><p>iPhone 13 Pro Max vẫn sẽ có bộ camera 3 ống kính xếp xen kẽ thành một cụm vuông, đặt ở góc trên bên trái của lưng máy gồm camera telephoto, camera góc siêu rộng&nbsp;và camera chính góc rộng với khẩu độ f/1.5 siêu lớn.</p><p><img src=\"https://cdn.tgdd.vn/Products/Images/42/230529/iphone-13-pro-max-21.jpg\" alt=\"Cụm camera chuyên nghiệp - iPhone 13 Pro Max 128GB\"></p><p>Camera góc siêu rộng cũng được nâng cấp với khẩu độ f/1.8, cảm biến nhanh hơn, mang tới những bức ảnh góc siêu rộng tự nhiên và chân thực và còn tăng cường có khả năng lấy nét ở khoảng cách chỉ 2 cm, mang đến tính năng chụp ảnh quay phim macro đầy thú vị.</p><p><img src=\"https://cdn.tgdd.vn/Products/Images/42/230529/iphone-13-pro-max-10.jpg\" alt=\"Lấy nét ở khoảng cách 2cm - iPhone 13 Pro Max 128GB\"></p><p>Camera tele trên iPhone 13 Pro Max có thể zoom quang học 3x, phóng to hình ảnh và video gấp 3 lần nhưng vẫn giữ nguyên chất lượng, hỗ trợ chụp ảnh chân dung <a href=\"https://www.thegioididong.com/dtdd-camera-xoa-phong\">xóa phông</a>, tích hợp sẵn rất nhiều bộ lọc màu tự nhiên giúp có được bức ảnh đúng như ý muốn.</p><p><img src=\"https://cdn.tgdd.vn/Products/Images/42/230529/iphone-13-pro-max-11.jpg\" alt=\"Khả năng zoom quang học - iPhone 13 Pro Max 128GB\"></p><p>Bên cạnh đó, cảm biến LiDAR vẫn sẽ hiện diện trên iPhone 13 Pro Max nhằm mang đến trải nghiệm thực tế tăng cường (AR) tốt nhất cho tất cả người dùng cũng như hỗ trợ cho cụm camera lấy nét trong môi trường ánh sáng yếu.</p><p><img src=\"https://cdn.tgdd.vn/Products/Images/42/230529/iphone-13-pro-max-12.jpg\" alt=\"Lấy nét trong môi trường anh sáng yếu - iPhone 13 Pro Max 128GB\"></p><p>Apple còn tăng cường khả năng nhiếp ảnh trên iPhone 13 Pro Max với chế độ quay phim chuẩn điện ảnh Cinematic&nbsp;giúp người dùng có thể dễ dàng lấy nét vào chủ thể cả trong và sau khi quay, đồng thời làm mờ hậu cảnh và những nhân vật khác trong khung hình.</p><p><img src=\"https://cdn.tgdd.vn/Products/Images/42/230529/iphone-13-pro-max-13.jpg\" alt=\"Chế độ quay Cinematic - iPhone 13 Pro Max 128GB\"></p><p>Đây cũng là chiếc điện thoại thông minh đầu tiên cung cấp quy trình làm việc chuyên nghiệp \"end-to-end\"&nbsp;cho phép bạn ghi và chỉnh sửa video ở định dạng nén ProRes hoặc Dolby Vision với nhiều thiết lập chuyên sâu&nbsp;tạo&nbsp;giúp rút ngắn đáng kể quá trình hậu kỳ tạo nên những thước phim chất lượng đáng kinh ngạc ngay trên chính chiếc điện thoại của mình.</p><p><img src=\"https://cdn.tgdd.vn/Products/Images/42/230529/iphone-13-pro-max-14.jpg\" alt=\"Khả năng quay video chuyên nghiệp - iPhone 13 Pro Max 128GB\"></p><h3>Hiệu năng đầy hứa hẹn với Apple A15 Bionic&nbsp;</h3><p>iPhone 13 Pro Max sẽ được trang bị bộ vi xử lý Apple A15 Bionic mới nhất của hãng, được sản xuất trên tiến trình 5 nm, đảm bảo mang lại hiệu năng vận hành ấn tượng mà vẫn tiết kiệm điện tốt nhất cùng khả năng hỗ trợ mạng 5G tốc độ siêu cao.</p><p>Theo Apple công bố, A15 Bionic là chipset nhanh nhất trong thế giới smartphone (9/2021), có&nbsp;tốc độ nhanh hơn 50% so với các chip khác trên thị trường, có thể thực hiện 15.8 nghìn tỷ phép tính mỗi giây, giúp hiệu năng CPU nhanh hơn bao giờ hết.</p><p><img src=\"https://cdn.tgdd.vn/Products/Images/42/230529/iphone-13-pro-max-15.jpg\" alt=\"Vi xử lý Apple A15 Bionic - iPhone 13 Pro Max 128GB\"></p><p>Máy sở hữu bộ nhớ trong 128 GB, vừa đủ với nhu cầu sử dụng của một người dùng cơ bản, không có nhu cầu quay video quá nhiều, ngoài ra năm nay cũng có thêm phiên bản bộ nhớ trong lên đến 1TB, bạn có thể cân nhắc nếu có nhu cầu lưu trữ cao.</p><p><img src=\"https://cdn.tgdd.vn/Products/Images/42/230529/iphone-13-pro-max-16.jpg\" alt=\"Dung lượng bộ nhớ - iPhone 13 Pro Max 128GB\"></p><p>Ngoài ra, máy còn được tích hợp công nghệ Wi-Fi 6, chuẩn kết nối không dây mới với việc trang bị nhiều băng tần 5G, tương thích với nhiều nhà mạng ở các quốc gia khác nhau, iPhone 13 Pro Max luôn cho tốc độ mạng tối đa, cho trải nghiệm xem phim 4K mượt mà, tải tệp tin trong chớp mắt, chơi game online không độ trễ ở bất cứ đâu.</p><p><img src=\"https://cdn.tgdd.vn/Products/Images/42/230529/iphone-13-pro-max-17.jpg\" alt=\"Kết nối nhanh chóng - iPhone 13 Pro Max 128GB\"></p><h3>Bước nhảy vọt về thời lượng pin</h3><p>iPhone Pro Max đánh dấu bước ngoặt mới trong thời lượng pin sử dụng. Với viên pin dung lượng pin lớn kết hợp cùng màn hình mới và bộ vi xử lý Apple A15 Bionic tiết kiệm điện, giúp iPhone 13 Pro Max trở thành chiếc iPhone có thời lượng pin tốt nhất từ trước đến nay, dài hơn 2.5 giờ so với người tiền nhiệm.&nbsp;</p><p><img src=\"https://cdn.tgdd.vn/Products/Images/42/230529/iphone-13-pro-max-18.jpg\" alt=\"Chip A15 giúp tối ưu hóa năng lượng - iPhone 13 Pro Max 128GB\"></p><p>Đáng tiếc là dung lượng pin của các mẫu iPhone mới được cải thiện nhưng tốc độ sạc nhanh của chúng vẫn chỉ dừng ở mức 20 W qua kết nối có dây và sạc qua MagSafe ở mức tối đa 15 W hoặc có thể qua bộ sạc không dây dựa trên Qi với công suất 7.5 W.</p><p><img src=\"https://cdn.tgdd.vn/Products/Images/42/230529/iphone-13-pro-max-19.jpg\" alt=\"Sạc MagSafe - iPhone 13 Pro Max 128GB\"></p><p>Apple đã không ngừng cải tiến đem đến cho người dùng sản phẩm tốt nhất, iPhone 13 Pro Max 128GB vẫn giữ được các điểm nổi bật của người tiền nhiệm, nổi bật với cải tiến về cấu hình, thời lượng pin cũng như camera và nhiều điều còn chờ bạn khám phá.</p>', 2, 5, '2022-10-03 07:37:35', '2022-10-05 11:04:13'),
(2, 'Samsung Galaxy Z Flip4 5G', 'samsung-galaxy-z-flip4-5g', 'samsung-galaxy-z-flip4-5g-128gb-thumb-tim-600x6008894.jpg', 25000000, 20000000, '10', '<ul><li>Chip Snapdragon 8+ Gen 1</li><li>RAM: 8 GB</li><li>Dung lượng: 128 GB</li><li>Camera sau: 2 camera 12 MP</li><li>Camera trước: 10 MP</li><li>Pin 3700 mAh, Sạc 25 W</li></ul>', 0, '<figure class=\"image\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/258047/Kit/samsung-galaxy-z-flip4-note-1-1.jpg\" alt=\"Điện thoại Samsung Galaxy Z Flip4 128GB\"></figure><h3>Mới đây chiếc Samsung Galaxy Z Flip4 128GB đã chính thức ra mắt trên thị trường công nghệ, đánh dấu sự trở lại của hãng trên con đường định hướng người dùng về sự tiện lợi trên những chiếc điện thoại gập. Với độ bền được gia tăng cùng kiểu thiết kế đẹp mắt giúp Flip4 trở thành một trong những tâm điểm sáng giá cho cuối năm 2022.</h3><h3>Ngoại hình thời trang - cầm nắm cực sang</h3><p>Samsung Galaxy Z Flip4 128GB sở hữu cơ chế hoạt động của một chiếc điện thoại gập hiện đại, với độ bền bỉ được gia tăng rất nhiều so với thế hệ tiền nhiệm giúp cho máy có thể đồng hành cùng với bạn trong một khoảng thời gian lâu dài và ít khi xảy ra các tình trạng hỏng hóc.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073328.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073328.jpg\" alt=\"Cơ chế gấp gọn -Samsung Galaxy Z Flip4 128GB\"></a></p><p>Máy được giới thiệu ra thị trường với 4 phiên bản màu sắc trẻ trung thời thượng, điều này giúp người dùng có thêm nhiều sự lựa chọn hơn để từ đó tìm ra cho mình một màu sắc hợp với cá tính hay gu ăn mặc của các bạn.</p><p>Điểm đặc biệt ở phiên bản này là phần mặt sau đều được hoàn thiện từ kính cường lực Corning Gorilla Glass Victus+, mang lại khả năng kháng được các vết xước trong quá trình sử dụng.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073330.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073330.jpg\" alt=\"Trang bị mặt kính cường lực - Samsung Galaxy Z Flip4 128GB\"></a></p><p>Được trang bị bộ khung làm từ vật liệu Armor Aluminum cùng kiểu thiết kế vuông vắn với các cạnh được gia công phẳng, không chỉ đem đến cho Flip4 một diện mạo cao cấp mà nó còn mang lại khả năng chống va đập tốt.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073333.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073333.jpg\" alt=\"Khung viền chắc chắn - Samsung Galaxy Z Flip4 128GB\"></a></p><p>Galaxy Z Flip4 có tỉ lệ màn hình là 22:9 nên máy trông rất là thon và tinh tế (kích thước chiều dài 165.2 mm), tuy nhiên sau khi gập thì <a href=\"https://www.thegioididong.com/dtdd\">điện thoại</a> chỉ dài khoảng 84.9 mm nên người dùng có thể bỏ túi một cách dễ dàng.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073335.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073335.jpg\" alt=\"Nhỏ nhắn thon gọn - Samsung Galaxy Z Flip4 128GB\"></a></p><p>Lần ra mắt này Samsung cho biết đây là chiếc điện thoại gập có hỗ trợ chuẩn kháng nước IPX8, vì vậy mà máy trở nên bền bỉ hơn mỗi khi di chuyển ngoài trời mưa nhẹ giúp bạn có thể an tâm hơn phần nào.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073337.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073337.jpg\" alt=\"Hỗ trợ chuẩn kháng nước - Samsung Galaxy Z Flip4 128GB\"></a></p><h3>Sử dụng công nghệ màn hình hàng đầu đến từ Samsung</h3><p>Galaxy Z Flip4 được sử dụng tấm nền Dynamic AMOLED 2X có khả năng hiển thị hình ảnh với màu sắc sinh động và hết sức rực rỡ, tái hiện màu đen sâu cho ra trải nghiệm trên các tựa game hành động hay những bộ phim bom tấn được chân thật hơn bao giờ hết.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073338.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073338.jpg\" alt=\"Tấm nền cao cấp - Samsung Galaxy Z Flip4 128GB\"></a></p><p>Chiếc điện thoại Samsung này có kích thước màn hình 6.7 inch, độ phân giải Full HD+ (1080 x 2640 Pixels), cùng mật độ điểm ảnh cao lên tới 425 PPI.</p><p>Nhằm giúp người dùng có thể nhận và xử lý các thông báo một cách nhanh chóng, Samsung cũng đã trang bị cho Flip4 một màn hình phụ ở mặt sau với kích thước 1.9 inch. Không chỉ dừng lại ở việc nhận biết thông báo như thế hệ trước, Flip4 còn có thêm tính năng nhận cuộc gọi hay xem được chi tiết thông báo ngay từ màn hình phụ.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073340.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073340.jpg\" alt=\"Trang bị màn hình phụ - Samsung Galaxy Z Flip4 128GB\"></a></p><p>Ngoài ra màn hình phụ này còn giúp cho người dùng có thể theo dõi được chất lượng bức ảnh trong lúc selfie bằng camera sau, từ đó khắc phục được những tình trạng như: Lệch bố cục, chủ thể không nằm ở trung tâm bức ảnh, chụp phải nhiều chi tiết thừa đằng sau,...</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-xanh-128gb-13-1.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-xanh-128gb-13-1.jpg\" alt=\"Vuôt chạm mượt mà - Samsung Galaxy ZFlip4 128GB\"></a></p><p>Nhờ màn hình có tần số quét lên tới 120 Hz cùng khả năng tự động điều chỉnh xuống còn 1 Hz cho những tác vụ không cần cuộn lướt quá nhiều. Điều này đem đến cho bạn quá trình sử dụng đã mắt hơn bởi độ trơn mượt cũng như tiết kiệm được kha khá điện năng tiêu thụ.</p><p>Màn hình của máy có độ sáng lên đến 1200 nits nên người dùng có thể sử dụng điện thoại ở ngoài trời dễ dàng hơn mà ít khi gặp phải tình trạng chói, lóa màn hình. Vậy nên những bạn thường xuyên sử dụng điện thoại để chụp ảnh ngoài trời, hay xem bản đồ trong lúc di chuyển ngoài đường cũng nên an tâm hơn khi sử dụng Galaxy Z Flip4.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073344.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073344.jpg\" alt=\"Màn hình độ sáng cao - Samsung Galaxy Z Flip4 128GB\"></a></p><h3>Trang bị camera chất lượng</h3><p>Galaxy Z Flip4 sẽ được tích hợp bộ đôi camera có cùng độ phân giải 12 MP ở mặt lưng, có hỗ trợ tính năng chụp ảnh góc siêu rộng và công nghệ chống rung quang quang học OIS. Giờ đây bạn hoàn toàn có thể thu được những bức ảnh có độ bao quát rộng lớn hay những thước phim ổn định hạn chế tình trạng rung lắc.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073345.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073345.jpg\" alt=\"Trang bị camera kép - Samsung Galaxy Z Flip4 128GB\"></a></p><p>Mặt trước sẽ được trang bị ống kính 10 MP để bạn có thể lưu lại được bức ảnh tự chụp có độ chi tiết tốt, sản xuất được nhiều vlog hay những video tự quay bản thân chất lượng hơn. Ngoài ra bạn cũng có thể selfie bằng camera sau nhờ có màn hình phụ giúp bạn có thể căn chỉnh khung hình một cách tiện lợi.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073347.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073347.jpg\" alt=\"Camera trước - Samsung Galaxy Z Flip4 128GB\"></a></p><h3>Hiệu năng mạnh mẽ đến từ dòng chip cao cấp của Qualcomm</h3><p>Tích hợp bên trong máy sẽ là con chip thuộc top những vi xử lý mạnh mẽ nhất trên smartphone tính đến thời điểm hiện tại (08/2022) mang tên Snapdragon 8+ Gen 1. Giờ đây các tác vụ cơ bản như lướt web, xem phim, nghe nhạc hay liên lạc chắc chắn sẽ không làm khó được Galaxy Z Flip4.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073349.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073349.jpg\" alt=\"Con chip hiệu năng cao - Samsung Galaxy Z Flip4 128GB\"></a></p><p>Điện thoại RAM 8 GB cũng là một lợi thế giúp cho máy có thể xử lý đồng thời nhiều tác vụ khi bạn mở cùng lúc nhiều ứng dụng. Chưa dừng lại ở đó, bộ nhớ trong có dung lượng lớn cũng sẽ giúp cho người dùng có thể chơi được nhiều tựa game đồ họa cao một cách mượt mà hơn.</p><h3>Hỗ trợ tính năng sạc nhanh&nbsp;</h3><p>Với viên pin được cải tiến hơn so với thế hệ cũ lên tới 3700 mAh, tuy không phải là một con số quá ấn tượng nhưng đây vẫn được xem là mức dung lượng vừa đủ cho những tác vụ như nhắn tin, đàm thoại, nghe nhạc cả ngày dài.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073350.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073350.jpg\" alt=\"Thời gian sử dụng dài lâu - Samsung Galaxy Z Flip4 128GB\"></a></p><p>Nhờ có công nghệ sạc nhanh 25 W nên việc lấp đầy viên pin trên Galaxy Z Flip4 sẽ được tối ưu thời gian đi đáng kể, ngoài ra bạn cũng có thể sử dụng tính năng sạc không dây tiện lợi để không cần phải loay hoay tìm jack cắm.</p><p>Samsung Galaxy Z Flip4 128GB chắc hẳn sẽ không phụ lòng người dùng bởi máy sở hữu gần như là đầy đủ mọi công nghệ hàng đầu, sử dụng ngôn ngữ thiết kế gập giúp người dùng có thể làm mới lại cách sử dụng smartphone để cho cuộc sống mỗi ngày của bạn trở nên mới mẻ hơn.</p>', 10, 4, '2022-10-03 09:57:20', '2022-10-05 10:02:00');

-- --------------------------------------------------------

--
-- Table structure for table `theloais`
--

DROP TABLE IF EXISTS `theloais`;
CREATE TABLE IF NOT EXISTS `theloais` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kichhoat` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `theloais`
--

INSERT INTO `theloais` (`id`, `name`, `slug`, `kichhoat`) VALUES
(1, 'Dưới 5 triệu', 'duoi-5-trieu', 0),
(2, 'Từ 5 triệu đến 10 triệu', 'tu-5-trieu-den-10-trieu', 0),
(3, 'Từ 10 triệu đến 20 triệu', 'tu-10-trieu-den-20-trieu', 0),
(4, 'Từ 20 triệu đến 30 triệu', 'tu-20-trieu-den-30-trieu', 0),
(5, 'Trên 30 triệu', 'tren-30-trieu', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Admin', 'hoangphuong0813@gmail.com', NULL, '$2y$10$hYeqtiCGTsaNXjjkdMkwReLBkrF7CR.Gfz/iOtsUhE69nO8TCfAuW', NULL, '2022-10-01 06:20:06', '2022-10-01 06:20:06');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
