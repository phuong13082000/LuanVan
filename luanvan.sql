-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 08, 2022 at 04:19 PM
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
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `danhmuc_id` (`danhmuc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sanphams`
--

INSERT INTO `sanphams` (`id`, `name`, `slug`, `hinhanh`, `gia`, `giakhuyenmai`, `soluong`, `cauhinh`, `kichhoat`, `noidung`, `danhmuc_id`, `created_at`, `updated_at`) VALUES
(1, 'Iphone 13 Pro Max', 'iphone-13-pro-max', 'iphone-13-pro-max-sierra-blue-600x6006622.jpg', 33990000, 20000000, '10', '<ul><li>Chip Apple A15 Bionic</li><li>RAM: 6 GB</li><li>Dung lượng: 128 GB</li><li>Camera sau: 3 camera 12 MP</li><li>Camera trước: 12 MP</li><li>Pin 4352 mAh, Sạc 20 W</li></ul>', 0, '<figure class=\"image\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/230529/Kit/iphone-13-pro-max-n-2.jpg\" alt=\"Điện thoại iPhone 13 Pro Max 128GB\"></figure><h3>Thông tin sản phẩm</h3><h3>Điện thoại&nbsp;iPhone 13 Pro Max 128 GB&nbsp;- siêu phẩm được mong chờ nhất ở nửa cuối năm 2021 đến từ Apple. Máy có thiết kế không mấy đột phá khi so với người tiền nhiệm, bên trong đây vẫn là một sản phẩm có màn hình siêu đẹp, tần số quét được nâng cấp lên 120 Hz mượt mà, cảm biến camera có kích thước lớn hơn, cùng hiệu năng mạnh mẽ với sức mạnh đến từ Apple A15 Bionic, sẵn sàng cùng bạn chinh phục mọi thử thách.</h3><h3>Thiết kế đẳng cấp hàng đầu</h3><p>iPhone mới kế thừa thiết kế đặc trưng từ&nbsp;iPhone 12 Pro Max khi sở hữu khung viền vuông vức, mặt lưng kính cùng màn hình tai thỏ tràn viền nằm ở phía trước.</p><figure class=\"image\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/230529/iphone-13-pro-max-3.jpg\" alt=\"Thiết kế vuông vức đặc trưng - iPhone 13 Pro Max 128GB\"></figure><p>Với iPhone 13 Pro Max phần tai thỏ đã được thu gọn lại 20% so với thế hệ trước, không chỉ giải phóng nhiều không gian hiển thị hơn mà còn giúp mặt trước chiếc điện thoại trở nên hấp dẫn hơn mà vẫn đảm bảo được hoạt động của các cảm biến.</p><p><img src=\"https://cdn.tgdd.vn/Products/Images/42/230529/iphone-13-pro-max-2.jpg\" alt=\"Màn hình tai thỏ được tinh giản - iPhone 13 Pro Max 128GB\"></p><p>Điểm thay đổi dễ dàng nhận biết trên iPhone 13 Pro Max chính là kích thước của cảm biến camera sau được làm to hơn và để tăng độ nhận diện cho sản phẩm mới thì Apple cũng đã bổ sung một tùy chọn màu sắc&nbsp;Sierra Blue (màu xanh dương nhạt hơn so với Pacific Blue của iPhone 12 Pro Max).</p><p><img src=\"https://cdn.tgdd.vn/Products/Images/42/230529/iphone-13-pro-max-9.jpg\" alt=\"Sierra Blue trẻ trung, thanh lịch - iPhone 13 Pro Max 128GB\"></p><p>Máy vẫn tiếp tục sử dụng khung viền thép cao cấp cho khả năng chống trầy xước và va đập một cách vượt trội, kết hợp với khả năng kháng bụi, nước&nbsp;chuẩn IP68</p><p><img src=\"https://cdn.tgdd.vn/Products/Images/42/230529/iphone-13-pro-max-4.jpg\" alt=\"Viền thép cao cấp - iPhone 13 Pro Max 128GB\"></p><h3>Màn hình giải trí siêu mượt cùng tần số quét 120 Hz</h3><p>iPhone 13 Pro Max được trang bị màn hình kích thước 6.7 inch cùng độ phân giải 1284 x 2778 Pixels, sử dụng tấm nền OLED cùng công nghệ Super Retina XDR cho khả năng tiết kiệm năng lượng vượt trội nhưng vẫn đảm bảo hiển thị sắc nét sống động chân thực.</p><p><img src=\"https://cdn.tgdd.vn/Products/Images/42/230529/iphone-13-pro-max-5.jpg\" alt=\"Màn hình kích thước 6.7 inch - iPhone 13 Pro Max 128GB\"></p><p>iPhone Pro Max năm nay đã được nâng cấp lên tần số quét 120 Hz, mọi thao tác chuyển cảnh khi lướt ngón tay trên màn hình trở nên mượt mà hơn đồng thời hiệu ứng thị giác khi chúng ta chơi game hoặc xem video cũng cực kỳ mãn nhãn.</p><p><img src=\"https://cdn.tgdd.vn/Products/Images/42/230529/iphone-13-pro-max-6.jpg\" alt=\"Tốc độ làm tươi màn hình - iPhone 13 Pro Max 128GB\"></p><p>Cùng công nghệ ProMotion thông minh có thể thay đổi tần số quét từ 10 đến 120 lần mỗi giây tùy thuộc vào ứng dụng, thao tác bạn đang sử dụng, nhằm tối ưu thời lượng sử dụng pin và trải nghiệm của bạn.</p><p><img src=\"https://cdn.tgdd.vn/Products/Images/42/230529/iphone-13-pro-max-1.jpg\" alt=\"Công nghệ ProMotion thông minh - iPhone 13 Pro Max 128GB\"></p><p>Nếu bạn dùng iPhone 13 Pro Max để chơi game, tần số quét 120 Hz kết hợp hiệu suất đồ họa tuyệt vời của GPU sẽ khiến máy trở nên vô cùng hoàn hảo khi trải nghiệm.</p><p><img src=\"https://cdn.tgdd.vn/Products/Images/42/230529/iphone-13-pro-max-8.jpg\" alt=\"Mang đến trải nghiệm mượt mà - iPhone 13 Pro Max 128GB\"></p><p>Ngoài ra máy cũng hỗ trợ công nghệ True Tone, dải màu rộng chuẩn điện ảnh P3 sẽ cho mọi trải nghiệm của bạn trên máy trở nên ấn tượng hơn bao giờ hết.</p><p><img src=\"https://cdn.tgdd.vn/Products/Images/42/230529/iphone-13-pro-max-20.jpg\" alt=\"Dải màu chuẩn điện ảnh P3 - iPhone 13 Pro Max 128GB\"></p><h3>Cụm camera được nâng cấp toàn diện</h3><p>iPhone 13 Pro Max vẫn sẽ có bộ camera 3 ống kính xếp xen kẽ thành một cụm vuông, đặt ở góc trên bên trái của lưng máy gồm camera telephoto, camera góc siêu rộng&nbsp;và camera chính góc rộng với khẩu độ f/1.5 siêu lớn.</p><p><img src=\"https://cdn.tgdd.vn/Products/Images/42/230529/iphone-13-pro-max-21.jpg\" alt=\"Cụm camera chuyên nghiệp - iPhone 13 Pro Max 128GB\"></p><p>Camera góc siêu rộng cũng được nâng cấp với khẩu độ f/1.8, cảm biến nhanh hơn, mang tới những bức ảnh góc siêu rộng tự nhiên và chân thực và còn tăng cường có khả năng lấy nét ở khoảng cách chỉ 2 cm, mang đến tính năng chụp ảnh quay phim macro đầy thú vị.</p><p><img src=\"https://cdn.tgdd.vn/Products/Images/42/230529/iphone-13-pro-max-10.jpg\" alt=\"Lấy nét ở khoảng cách 2cm - iPhone 13 Pro Max 128GB\"></p><p>Camera tele trên iPhone 13 Pro Max có thể zoom quang học 3x, phóng to hình ảnh và video gấp 3 lần nhưng vẫn giữ nguyên chất lượng, hỗ trợ chụp ảnh chân dung <a href=\"https://www.thegioididong.com/dtdd-camera-xoa-phong\">xóa phông</a>, tích hợp sẵn rất nhiều bộ lọc màu tự nhiên giúp có được bức ảnh đúng như ý muốn.</p><p><img src=\"https://cdn.tgdd.vn/Products/Images/42/230529/iphone-13-pro-max-11.jpg\" alt=\"Khả năng zoom quang học - iPhone 13 Pro Max 128GB\"></p><p>Bên cạnh đó, cảm biến LiDAR vẫn sẽ hiện diện trên iPhone 13 Pro Max nhằm mang đến trải nghiệm thực tế tăng cường (AR) tốt nhất cho tất cả người dùng cũng như hỗ trợ cho cụm camera lấy nét trong môi trường ánh sáng yếu.</p><p><img src=\"https://cdn.tgdd.vn/Products/Images/42/230529/iphone-13-pro-max-12.jpg\" alt=\"Lấy nét trong môi trường anh sáng yếu - iPhone 13 Pro Max 128GB\"></p><p>Apple còn tăng cường khả năng nhiếp ảnh trên iPhone 13 Pro Max với chế độ quay phim chuẩn điện ảnh Cinematic&nbsp;giúp người dùng có thể dễ dàng lấy nét vào chủ thể cả trong và sau khi quay, đồng thời làm mờ hậu cảnh và những nhân vật khác trong khung hình.</p><p><img src=\"https://cdn.tgdd.vn/Products/Images/42/230529/iphone-13-pro-max-13.jpg\" alt=\"Chế độ quay Cinematic - iPhone 13 Pro Max 128GB\"></p><p>Đây cũng là chiếc điện thoại thông minh đầu tiên cung cấp quy trình làm việc chuyên nghiệp \"end-to-end\"&nbsp;cho phép bạn ghi và chỉnh sửa video ở định dạng nén ProRes hoặc Dolby Vision với nhiều thiết lập chuyên sâu&nbsp;tạo&nbsp;giúp rút ngắn đáng kể quá trình hậu kỳ tạo nên những thước phim chất lượng đáng kinh ngạc ngay trên chính chiếc điện thoại của mình.</p><p><img src=\"https://cdn.tgdd.vn/Products/Images/42/230529/iphone-13-pro-max-14.jpg\" alt=\"Khả năng quay video chuyên nghiệp - iPhone 13 Pro Max 128GB\"></p><h3>Hiệu năng đầy hứa hẹn với Apple A15 Bionic&nbsp;</h3><p>iPhone 13 Pro Max sẽ được trang bị bộ vi xử lý Apple A15 Bionic mới nhất của hãng, được sản xuất trên tiến trình 5 nm, đảm bảo mang lại hiệu năng vận hành ấn tượng mà vẫn tiết kiệm điện tốt nhất cùng khả năng hỗ trợ mạng 5G tốc độ siêu cao.</p><p>Theo Apple công bố, A15 Bionic là chipset nhanh nhất trong thế giới smartphone (9/2021), có&nbsp;tốc độ nhanh hơn 50% so với các chip khác trên thị trường, có thể thực hiện 15.8 nghìn tỷ phép tính mỗi giây, giúp hiệu năng CPU nhanh hơn bao giờ hết.</p><p><img src=\"https://cdn.tgdd.vn/Products/Images/42/230529/iphone-13-pro-max-15.jpg\" alt=\"Vi xử lý Apple A15 Bionic - iPhone 13 Pro Max 128GB\"></p><p>Máy sở hữu bộ nhớ trong 128 GB, vừa đủ với nhu cầu sử dụng của một người dùng cơ bản, không có nhu cầu quay video quá nhiều, ngoài ra năm nay cũng có thêm phiên bản bộ nhớ trong lên đến 1TB, bạn có thể cân nhắc nếu có nhu cầu lưu trữ cao.</p><p><img src=\"https://cdn.tgdd.vn/Products/Images/42/230529/iphone-13-pro-max-16.jpg\" alt=\"Dung lượng bộ nhớ - iPhone 13 Pro Max 128GB\"></p><p>Ngoài ra, máy còn được tích hợp công nghệ Wi-Fi 6, chuẩn kết nối không dây mới với việc trang bị nhiều băng tần 5G, tương thích với nhiều nhà mạng ở các quốc gia khác nhau, iPhone 13 Pro Max luôn cho tốc độ mạng tối đa, cho trải nghiệm xem phim 4K mượt mà, tải tệp tin trong chớp mắt, chơi game online không độ trễ ở bất cứ đâu.</p><p><img src=\"https://cdn.tgdd.vn/Products/Images/42/230529/iphone-13-pro-max-17.jpg\" alt=\"Kết nối nhanh chóng - iPhone 13 Pro Max 128GB\"></p><h3>Bước nhảy vọt về thời lượng pin</h3><p>iPhone Pro Max đánh dấu bước ngoặt mới trong thời lượng pin sử dụng. Với viên pin dung lượng pin lớn kết hợp cùng màn hình mới và bộ vi xử lý Apple A15 Bionic tiết kiệm điện, giúp iPhone 13 Pro Max trở thành chiếc iPhone có thời lượng pin tốt nhất từ trước đến nay, dài hơn 2.5 giờ so với người tiền nhiệm.&nbsp;</p><p><img src=\"https://cdn.tgdd.vn/Products/Images/42/230529/iphone-13-pro-max-18.jpg\" alt=\"Chip A15 giúp tối ưu hóa năng lượng - iPhone 13 Pro Max 128GB\"></p><p>Đáng tiếc là dung lượng pin của các mẫu iPhone mới được cải thiện nhưng tốc độ sạc nhanh của chúng vẫn chỉ dừng ở mức 20 W qua kết nối có dây và sạc qua MagSafe ở mức tối đa 15 W hoặc có thể qua bộ sạc không dây dựa trên Qi với công suất 7.5 W.</p><p><img src=\"https://cdn.tgdd.vn/Products/Images/42/230529/iphone-13-pro-max-19.jpg\" alt=\"Sạc MagSafe - iPhone 13 Pro Max 128GB\"></p><p>Apple đã không ngừng cải tiến đem đến cho người dùng sản phẩm tốt nhất, iPhone 13 Pro Max 128GB vẫn giữ được các điểm nổi bật của người tiền nhiệm, nổi bật với cải tiến về cấu hình, thời lượng pin cũng như camera và nhiều điều còn chờ bạn khám phá.</p>', 2, '2022-10-03 07:37:35', '2022-10-05 11:04:13'),
(2, 'Samsung Galaxy Z Flip4 5G', 'samsung-galaxy-z-flip4-5g', 'samsung-galaxy-z-flip4-5g-128gb-thumb-tim-600x6008894.jpg', 25000000, 20000000, '10', '<ul><li>Chip Snapdragon 8+ Gen 1</li><li>RAM: 8 GB</li><li>Dung lượng: 128 GB</li><li>Camera sau: 2 camera 12 MP</li><li>Camera trước: 10 MP</li><li>Pin 3700 mAh, Sạc 25 W</li></ul>', 0, '<figure class=\"image\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/258047/Kit/samsung-galaxy-z-flip4-note-1-1.jpg\" alt=\"Điện thoại Samsung Galaxy Z Flip4 128GB\"></figure><h3>Mới đây chiếc Samsung Galaxy Z Flip4 128GB đã chính thức ra mắt trên thị trường công nghệ, đánh dấu sự trở lại của hãng trên con đường định hướng người dùng về sự tiện lợi trên những chiếc điện thoại gập. Với độ bền được gia tăng cùng kiểu thiết kế đẹp mắt giúp Flip4 trở thành một trong những tâm điểm sáng giá cho cuối năm 2022.</h3><h3>Ngoại hình thời trang - cầm nắm cực sang</h3><p>Samsung Galaxy Z Flip4 128GB sở hữu cơ chế hoạt động của một chiếc điện thoại gập hiện đại, với độ bền bỉ được gia tăng rất nhiều so với thế hệ tiền nhiệm giúp cho máy có thể đồng hành cùng với bạn trong một khoảng thời gian lâu dài và ít khi xảy ra các tình trạng hỏng hóc.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073328.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073328.jpg\" alt=\"Cơ chế gấp gọn -Samsung Galaxy Z Flip4 128GB\"></a></p><p>Máy được giới thiệu ra thị trường với 4 phiên bản màu sắc trẻ trung thời thượng, điều này giúp người dùng có thêm nhiều sự lựa chọn hơn để từ đó tìm ra cho mình một màu sắc hợp với cá tính hay gu ăn mặc của các bạn.</p><p>Điểm đặc biệt ở phiên bản này là phần mặt sau đều được hoàn thiện từ kính cường lực Corning Gorilla Glass Victus+, mang lại khả năng kháng được các vết xước trong quá trình sử dụng.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073330.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073330.jpg\" alt=\"Trang bị mặt kính cường lực - Samsung Galaxy Z Flip4 128GB\"></a></p><p>Được trang bị bộ khung làm từ vật liệu Armor Aluminum cùng kiểu thiết kế vuông vắn với các cạnh được gia công phẳng, không chỉ đem đến cho Flip4 một diện mạo cao cấp mà nó còn mang lại khả năng chống va đập tốt.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073333.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073333.jpg\" alt=\"Khung viền chắc chắn - Samsung Galaxy Z Flip4 128GB\"></a></p><p>Galaxy Z Flip4 có tỉ lệ màn hình là 22:9 nên máy trông rất là thon và tinh tế (kích thước chiều dài 165.2 mm), tuy nhiên sau khi gập thì <a href=\"https://www.thegioididong.com/dtdd\">điện thoại</a> chỉ dài khoảng 84.9 mm nên người dùng có thể bỏ túi một cách dễ dàng.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073335.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073335.jpg\" alt=\"Nhỏ nhắn thon gọn - Samsung Galaxy Z Flip4 128GB\"></a></p><p>Lần ra mắt này Samsung cho biết đây là chiếc điện thoại gập có hỗ trợ chuẩn kháng nước IPX8, vì vậy mà máy trở nên bền bỉ hơn mỗi khi di chuyển ngoài trời mưa nhẹ giúp bạn có thể an tâm hơn phần nào.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073337.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073337.jpg\" alt=\"Hỗ trợ chuẩn kháng nước - Samsung Galaxy Z Flip4 128GB\"></a></p><h3>Sử dụng công nghệ màn hình hàng đầu đến từ Samsung</h3><p>Galaxy Z Flip4 được sử dụng tấm nền Dynamic AMOLED 2X có khả năng hiển thị hình ảnh với màu sắc sinh động và hết sức rực rỡ, tái hiện màu đen sâu cho ra trải nghiệm trên các tựa game hành động hay những bộ phim bom tấn được chân thật hơn bao giờ hết.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073338.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073338.jpg\" alt=\"Tấm nền cao cấp - Samsung Galaxy Z Flip4 128GB\"></a></p><p>Chiếc điện thoại Samsung này có kích thước màn hình 6.7 inch, độ phân giải Full HD+ (1080 x 2640 Pixels), cùng mật độ điểm ảnh cao lên tới 425 PPI.</p><p>Nhằm giúp người dùng có thể nhận và xử lý các thông báo một cách nhanh chóng, Samsung cũng đã trang bị cho Flip4 một màn hình phụ ở mặt sau với kích thước 1.9 inch. Không chỉ dừng lại ở việc nhận biết thông báo như thế hệ trước, Flip4 còn có thêm tính năng nhận cuộc gọi hay xem được chi tiết thông báo ngay từ màn hình phụ.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073340.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073340.jpg\" alt=\"Trang bị màn hình phụ - Samsung Galaxy Z Flip4 128GB\"></a></p><p>Ngoài ra màn hình phụ này còn giúp cho người dùng có thể theo dõi được chất lượng bức ảnh trong lúc selfie bằng camera sau, từ đó khắc phục được những tình trạng như: Lệch bố cục, chủ thể không nằm ở trung tâm bức ảnh, chụp phải nhiều chi tiết thừa đằng sau,...</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-xanh-128gb-13-1.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-xanh-128gb-13-1.jpg\" alt=\"Vuôt chạm mượt mà - Samsung Galaxy ZFlip4 128GB\"></a></p><p>Nhờ màn hình có tần số quét lên tới 120 Hz cùng khả năng tự động điều chỉnh xuống còn 1 Hz cho những tác vụ không cần cuộn lướt quá nhiều. Điều này đem đến cho bạn quá trình sử dụng đã mắt hơn bởi độ trơn mượt cũng như tiết kiệm được kha khá điện năng tiêu thụ.</p><p>Màn hình của máy có độ sáng lên đến 1200 nits nên người dùng có thể sử dụng điện thoại ở ngoài trời dễ dàng hơn mà ít khi gặp phải tình trạng chói, lóa màn hình. Vậy nên những bạn thường xuyên sử dụng điện thoại để chụp ảnh ngoài trời, hay xem bản đồ trong lúc di chuyển ngoài đường cũng nên an tâm hơn khi sử dụng Galaxy Z Flip4.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073344.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073344.jpg\" alt=\"Màn hình độ sáng cao - Samsung Galaxy Z Flip4 128GB\"></a></p><h3>Trang bị camera chất lượng</h3><p>Galaxy Z Flip4 sẽ được tích hợp bộ đôi camera có cùng độ phân giải 12 MP ở mặt lưng, có hỗ trợ tính năng chụp ảnh góc siêu rộng và công nghệ chống rung quang quang học OIS. Giờ đây bạn hoàn toàn có thể thu được những bức ảnh có độ bao quát rộng lớn hay những thước phim ổn định hạn chế tình trạng rung lắc.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073345.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073345.jpg\" alt=\"Trang bị camera kép - Samsung Galaxy Z Flip4 128GB\"></a></p><p>Mặt trước sẽ được trang bị ống kính 10 MP để bạn có thể lưu lại được bức ảnh tự chụp có độ chi tiết tốt, sản xuất được nhiều vlog hay những video tự quay bản thân chất lượng hơn. Ngoài ra bạn cũng có thể selfie bằng camera sau nhờ có màn hình phụ giúp bạn có thể căn chỉnh khung hình một cách tiện lợi.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073347.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073347.jpg\" alt=\"Camera trước - Samsung Galaxy Z Flip4 128GB\"></a></p><h3>Hiệu năng mạnh mẽ đến từ dòng chip cao cấp của Qualcomm</h3><p>Tích hợp bên trong máy sẽ là con chip thuộc top những vi xử lý mạnh mẽ nhất trên smartphone tính đến thời điểm hiện tại (08/2022) mang tên Snapdragon 8+ Gen 1. Giờ đây các tác vụ cơ bản như lướt web, xem phim, nghe nhạc hay liên lạc chắc chắn sẽ không làm khó được Galaxy Z Flip4.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073349.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073349.jpg\" alt=\"Con chip hiệu năng cao - Samsung Galaxy Z Flip4 128GB\"></a></p><p>Điện thoại RAM 8 GB cũng là một lợi thế giúp cho máy có thể xử lý đồng thời nhiều tác vụ khi bạn mở cùng lúc nhiều ứng dụng. Chưa dừng lại ở đó, bộ nhớ trong có dung lượng lớn cũng sẽ giúp cho người dùng có thể chơi được nhiều tựa game đồ họa cao một cách mượt mà hơn.</p><h3>Hỗ trợ tính năng sạc nhanh&nbsp;</h3><p>Với viên pin được cải tiến hơn so với thế hệ cũ lên tới 3700 mAh, tuy không phải là một con số quá ấn tượng nhưng đây vẫn được xem là mức dung lượng vừa đủ cho những tác vụ như nhắn tin, đàm thoại, nghe nhạc cả ngày dài.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073350.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-100822-073350.jpg\" alt=\"Thời gian sử dụng dài lâu - Samsung Galaxy Z Flip4 128GB\"></a></p><p>Nhờ có công nghệ sạc nhanh 25 W nên việc lấp đầy viên pin trên Galaxy Z Flip4 sẽ được tối ưu thời gian đi đáng kể, ngoài ra bạn cũng có thể sử dụng tính năng sạc không dây tiện lợi để không cần phải loay hoay tìm jack cắm.</p><p>Samsung Galaxy Z Flip4 128GB chắc hẳn sẽ không phụ lòng người dùng bởi máy sở hữu gần như là đầy đủ mọi công nghệ hàng đầu, sử dụng ngôn ngữ thiết kế gập giúp người dùng có thể làm mới lại cách sử dụng smartphone để cho cuộc sống mỗi ngày của bạn trở nên mới mẻ hơn.</p>', 10, '2022-10-03 09:57:20', '2022-10-05 10:02:00'),
(3, 'Xiaomi Redmi Note 11', 'xiaomi-redmi-note-11', 'Xiaomi-redmi-note-11-black-600x6006909.jpeg', 4690000, 0, '10', '<ul><li>Chip Snapdragon 680</li><li>RAM: 4 GB</li><li>Dung lượng: 64 GB</li><li>Camera sau: Chính 50 MP &amp; Phụ 8 MP, 2 MP, 2 MP</li><li>Camera trước: 13 MP</li><li>Pin 5000 mAh, Sạc 33 W</li></ul>', 0, '<p><img src=\"https://cdn.tgdd.vn/Products/Images/42/269831/Kit/xiaomi-redmi-note-11-n-2.jpg\" alt=\"Điện thoại Xiaomi Redmi Note 11 (4GB/64GB)\"></p><h3>Thông tin sản phẩm</h3><h3>Điện thoại Redmi được mệnh danh là dòng sản phẩm quốc dân ngon - bổ&nbsp; - rẻ của Xiaomi và Redmi Note 11 (4GB/64GB) cũng không phải ngoại lệ, máy sở hữu một hiệu năng ổn định, màn hình 90 Hz mượt mà, cụm camera AI đến 50 MP cùng một mức giá vô cùng tốt.</h3><h3>Khung viền phẳng thời thượng</h3><p>Redmi Note 11 được hoàn thiện từ nhựa nguyên khối, mặt lưng thiết kế nhám mờ giúp quá trình sử dụng được thoải mái hơn, không bị trơn, tuột. Thiết kế nhám cũng giúp máy trông mạnh mẽ, cứng cáp hơn.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/269831/xiaomi-redmi-note-11-4gb-64gb-090222-032242.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/269831/xiaomi-redmi-note-11-4gb-64gb-090222-032242.jpg\" alt=\"Thiết kế thời trang | Xiaomi Redmi Note 11\"></a></p><p>Máy sử dụng khung viền phẳng theo xu hướng khá là thời trang, cạnh viền được bo cong nhẹ ôm về phía trước nên khi sử dụng sẽ không bị cấn tay. Cụm 4 camera được làm lồi hơn so với mặt lưng của máy, nhìn chung phần thiết kế này khá cơ bản và phù hợp với nhiều đối tượng người dùng.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/269831/xiaomi-redmi-note-11-4gb-64gb-260122-085723.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/269831/xiaomi-redmi-note-11-4gb-64gb-260122-085723.jpg\" alt=\"Khung viền phẳng | Xiaomi Redmi Note 11\"></a></p><p>Máy cũng được trang bị cảm biến vân tay tích hợp trong phím nguồn và mình nhận thấy tốc độ nhận và mở khóa của cảm biến này là cực kì nhanh.</p><h3>Hiệu năng hàng đầu phân khúc</h3><p>Hiệu năng trên chiếc máy này khiến mình thật sự rất bất ngờ, điện thoại được trang bị con chip Snapdragon 680 xây dựng trên tiến trình 6 nm giúp cho máy xử lý những tác vụ cơ bản rất là trơn tru. Mình kiểm tra bằng ứng dụng đo hiệu năng Benchmark (bên trái) với điểm đơn nhân là 353 và đa nhân 1547, và ứng dụng PC Mark (bên phải) đạt 7170 điểm.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/269831/xiaomi-redmi-note-11-4gb-64gb-090222-034442.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/269831/xiaomi-redmi-note-11-4gb-64gb-090222-034442.jpg\" alt=\"Đo hiệu năng bằng phần mềm | Redmi Note 11\"></a></p><p>Với phiên bản 4 GB RAM thì mình vẫn có thể đa nhiệm tốt nhu cầu sử dụng hằng ngày như sử dụng mạng xã hội, xem phim, giải trí nhẹ, hiện tượng giật lag hay đơ máy hầu như rất ít khi xảy ra.</p><p>Các ứng dụng để làm việc như Google Docs, Google Sheet, Word, Excel,... thì máy vẫn xử lý tốt, chuyển cảnh, thao tác khá mượt.</p><p>Về phần trải nghiệm game trên chiếc máy này, mình đã chơi qua các tựa game phổ biến như Liên Quân thì máy có thể chơi ở đồ họa cao 60 FPS. Khi giao tranh tổng thì có thể drop còn 53-55 FPS, đồ họa hình ảnh trong game ở mức ổn, không bị quá nhiệt tại cụm camera.&nbsp;</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/269831/xiaomi-redmi-note-11-4gb-64gb-090222-035323.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/269831/xiaomi-redmi-note-11-4gb-64gb-090222-035323.jpg\" alt=\"Hiệu năng Xiaomi Redmi Note 11\"></a></p><p>Game PUBG Mobile thì mình có thể cài đặt đồ họa Mượt với FPS Cao hoặc đồ họa Cân bằng với FPS Trung bình để chơi ổn áp nhất.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/269831/xiaomi-redmi-note-11-4gb-64gb-090222-053820.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/269831/xiaomi-redmi-note-11-4gb-64gb-090222-053820.jpg\" alt=\"Đồ họa game PUBG Mobile | Xiaomi Redmi Note 11\"></a></p><p>Hiệu năng này sẽ phù hợp với bạn nếu bạn không yêu cầu đồ họa cao xuất sắc, bạn cần một trải nghiệm mượt mà, ổn định cũng như là một chiếc máy có nhiệt độ mát mẻ khi sử dụng.</p><h3>Màn hình AMOLED mượt mà</h3><p>Xiaomi Redmi Note 11 có màn hình sở hữu hàng loạt điểm nhấn như màn hình đục lỗ 6.43 inches, độ phân giải Full HD+, tấm nền AMOLED cùng khả năng hỗ trợ 100% dải màu rộng DCI-P3 mang lại màu sắc khá là rực rỡ và tươi tắn, độ chi tiết hiển thị cao, kích thước lớn giúp cho máy hiển thị được nhiều thông tin hơn.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/269831/xiaomi-redmi-note-11-4gb-64gb-090222-035929.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/269831/xiaomi-redmi-note-11-4gb-64gb-090222-035929.jpg\" alt=\"Hỗ trợ dải màu rộng P3 | Xiaomi Redmi Note 11\"></a></p><p>Phần viền màn hình khá cân đối, phần \"cằm\" cũng được làm tinh gọn hơn nhiều. Bên cạnh đó, máy cũng được trang bị tần số quét 90 Hz mang lại cho mình trải nghiệm vuốt chạm các thứ cực kì là mượt mà, giúp cho những trải nghiệm khi chơi game, xem phim cũng như là lướt web đều rất là tốt.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/269831/xiaomi-redmi-note-11-4gb-64gb-090222-040212.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/269831/xiaomi-redmi-note-11-4gb-64gb-090222-040212.jpg\" alt=\"Viền màn hình Xiaomi Redmi Note 11\"></a></p><p>Thêm một điểm cộng cho Redmi Note 11 là máy có hỗ trợ Chế độ đọc 3.0 giúp hạn chế ánh sáng xanh đi vào mắt, gìn giữ sức khỏe đôi mắt của bạn.</p><p>Về phần âm thanh thì máy sở hữu 2 loa âm thanh kép đạt chứng nhận Hi-Res Audio, cụm loa này có âm thanh sáng, âm lượng khá giúp trải nghiệm nghe, nhìn của bạn trở nên tốt hơn bao giờ hết.</p><h3>Camera AI đến 50 MP</h3><p>Mặt lưng sở hữu cụm 4 camera với cảm biến chính lên đến 50 MP bậc nhất trong phân khúc cùng với nhiều chế độ chụp mới nhất. Trong điều kiện đủ sáng ảnh cho ra có chất lượng chi tiết tốt, màu sắc tươi tắn.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/269831/xiaomi-redmi-note-11-4gb-64gb-090222-040336.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/269831/xiaomi-redmi-note-11-4gb-64gb-090222-040336.jpg\" alt=\"Ảnh chụp từ camera chính Xiaomi Redmi Note 11\"></a></p><p>Bên cạnh đó camera góc siêu rộng 8 MP giúp cho chúng ta có thể cho ra những bức ảnh có góc nhìn lớn lên đến 118 độ. Cảm biến Macro 2 MP mang lại những bức ảnh vô cùng là chi tiết cùng với cảm biến độ sâu 2 MP phục vụ cho việc chụp chân dung.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/269831/xiaomi-redmi-note-11-4gb-64gb-090222-040338.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/269831/xiaomi-redmi-note-11-4gb-64gb-090222-040338.jpg\" alt=\"Ảnh chụp từ camera Xiaomi Redmi Note 11\"></a></p><p>Về khả năng quay phim, Redmi Note 11 hỗ trợ quay Full HD 1080p, cùng một số tính năng quay nghệ thuật như: Tua nhanh thời gian (TimeLapse), quay chậm (SlowMotion).</p><h3>Sử dụng xuyên suốt</h3><p>Pin trên chiếc Redmi Note 11 cũng là một điểm sáng khi máy được trang bị một viên pin có dung lượng 5000 mAh, trong quá trình sử dụng thực tế thì thời gian sử dụng cho tác vụ hỗn hợp được khoảng 9 tiếng.*</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/269831/xiaomi-redmi-note-11-4gb-64gb-090222-040859.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/269831/xiaomi-redmi-note-11-4gb-64gb-090222-040859.jpg\" alt=\"Thời gian sử dụng pin trên Xiaomi Redmi Note 11\"></a></p><p>Cùng với viên pin lớn thì Redmi Note 11 cũng được trang bị công nghệ sạc nhanh 33 W Pro tiên tiến và an toàn, mình có sạc từ 0-100% pin thì máy chỉ cần khoảng 77 phút.*</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/269831/xiaomi-redmi-note-11-4gb-64gb-090222-040857.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/269831/xiaomi-redmi-note-11-4gb-64gb-090222-040857.jpg\" alt=\"Thời gian sạc pin trên Xiaomi Redmi Note 11\"></a></p><p><i>*Thời gian sạc, sử dụng có thể thay đổi tùy theo nhu cầu, tác vụ sử dụng.</i></p><p>Theo mình đây sẽ là một ông vua tầm trung mới, xứng đáng với danh hiệu ngon - bổ - rẻ mà nhiều khách hàng tin dùng, những điểm sáng về cấu hình, màn hình và camera sẽ giúp bạn tự tin chọn Redmi Note 11 để học tập, làm việc và giải trí.</p><p>&nbsp;</p>', 11, '2022-10-06 08:02:24', '2022-10-06 08:02:24'),
(4, 'Realme 9 series', 'realme-9-series', 'realme-9-pro-plus-5g-blue-thumb-600x600807.jpg', 9990000, 8990000, '10', '<ul><li>Chip MediaTek Dimensity 920 5G</li><li>RAM: 8 GB</li><li>Dung lượng: 128 GB</li><li>Camera sau: Chính 50 MP &amp; Phụ 8 MP, 2 MP</li><li>Camera trước: 16 MP</li><li>Pin 4500 mAh, Sạc 60 W</li></ul>', 0, '<figure class=\"image\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/255513/Kit/realme-9-pro-plus-n.jpg\" alt=\"Điện thoại Realme 9 Pro+ 5G\"></figure><h3>Realme 9 Pro+ 5G&nbsp;- chiếc smartphone tầm trung của Realme đã được ra mắt, máy có một thiết kế đầy màu sắc, cụm 3 camera với cảm biến IMX766 giúp bạn có được những bức ảnh sinh động.</h3><h3>Thiết kế màu sắc thay đổi theo ánh sáng</h3><p>Realme 9 Pro+ 5G với thiết kế Light Shift trên phiên bản Lam Hừng Đông hoàn toàn mới, có thể thay đổi màu từ xanh lam nhạt sang đỏ khi tiếp xúc với ánh sáng mặt trời đẹp tựa như cảnh bình minh. Còn một phiên bản màu khác là Lục Cực Quang cũng cực kỳ đẹp mắt.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/255513/realme-9-pro-plus-2-2.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/255513/realme-9-pro-plus-2-2.jpg\" alt=\"Thiết kế trẻ trung - realme 9 Pro+\"></a></p><p><i>*Phiên bản màu Lục Cực Quang</i></p><p>Realme cũng đã phủ lên điện thoại của mình một lớp hoàn thiện đặc biệt để tạo ra dải ánh sáng lấp lánh đầy màu sắc tuyệt đẹp, chạy dọc mặt lưng tạo thành điểm nhấn độc đáo hấp dẫn mọi ánh nhìn ngay từ lần đầu tiên.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/255513/realme-9-pro-plus-3-2.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/255513/realme-9-pro-plus-3-2.jpg\" alt=\"Lớp hoàn thiện đặc biệt - realme 9 Pro+\"></a></p><p>Realme 9 Pro+ có khung viền được hoàn thiện từ nhựa, mặt lưng kính bóng bẩy, thiết kế khá cứng cáp, các chi tiết gia công tỉ mỉ, không gặp tình trạng ọp ẹp.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/255513/realme-9-pro-plus-4-2.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/255513/realme-9-pro-plus-4-2.jpg\" alt=\"Thiết kế tỉ mĩ - realme 9 Pro+\"></a></p><p>Mặt lưng của máy được vát cong về phía trước, nên tạo cảm giác máy rất mỏng, sử dụng rất thoải mái, chắc tay.</p><h3>Ảnh chụp sắc nét ngay trong điều kiện thiếu sáng</h3><p>Camera trên Realme 9 Pro+ cũng là 1 điểm nhấn mạnh mẽ của hãng qua câu \"Sáng bừng từng khoảnh khắc\", máy trang bị hệ thống 3 camera bao gồm camera chính 50 MP, camera góc siêu rộng 8 MP và camera macro 2 MP.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/255513/realme-9-pro-plus-5-2.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/255513/realme-9-pro-plus-5-2.jpg\" alt=\"Cụm camera độ phân giải cao - realme 9 Pro+\"></a></p><p>Realme nhấn mạnh về khả năng chụp ảnh thiếu sáng của Realme 9 Pro+ với công nghệ mang tên ProLight. Kết hợp cùng cảm biến hình ảnh Sony IMX766 giúp thu nhận ánh sáng nhiều hơn, có khả năng nắm bắt chi tiết tốt và tái tạo màu sắc chính xác, giảm nhiễu khi chụp ảnh đêm.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/255513/realme-9-pro-plus-15.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/255513/realme-9-pro-plus-15.jpg\" alt=\"Ảnh chụp từ camera - Realme 9 Pro Plus\"></a></p><p>Ảnh đêm có sự cân bằng ánh sáng khá tốt, tình trạng nhiễu hạt đã được giảm thiểu và ảnh cũng có độ tương phản cao nên nhìn chung bức ảnh đêm của chúng ta tương đối lung linh.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/255513/realme-9-pro-plus-2-3.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/255513/realme-9-pro-plus-2-3.jpg\" alt=\"Ảnh chụp từ camera - Realme 9 Pro Plus\"></a></p><p>Ở điều kiện ban ngày ảnh từ Realme 9 Pro+ có xu hướng làm màu đậm hơn so với thực tế một chút, tương phản cao, những yếu tố như cân bằng sáng, HDR, độ tươi của màu sắc đều được đảm bảo.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/255513/realme-9-pro-plus-1-2.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/255513/realme-9-pro-plus-1-2.jpg\" alt=\"Ảnh chụp từ camera chính - realme 9 Pro+\"></a></p><p>Do không có camera chuyên biệt để chụp ảnh xóa phông nên ảnh chân dung trên Realme 9 Pro+ nằm ở mức ổn, ảnh xóa phông khá sâu nhưng chưa được mượt, ảnh còn lẹm khá nhiều ở những phần khó như tóc.</p><p>Để chụp được những bức ảnh đẹp nhất các bạn nên chụp ở khoảng cách 2 - 3 mét là ổn, đừng chụp quá gần.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/255513/realme-9-pro-plus-13-2.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/255513/realme-9-pro-plus-13-2.jpg\" alt=\"Chụp ảnh chân dung - realme 9 Pro+\"></a></p><p>Công nghệ chống rung quang học (OIS) cùng thuật toán nâng cao được trang bị, giúp Realme 9 Pro+ quay được những video ổn định hơn trong điều kiện thiếu sáng, cũng như trong khi di chuyển.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/255513/realme-9-pro-plus-6-2.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/255513/realme-9-pro-plus-6-2.jpg\" alt=\"Quay video với chống rung OIS - realme 9 Pro+\"></a></p><p>Camera selfie có độ phân giải 16 MP, hình selfie tương đối sắc nét và rực rỡ, ảnh đậm màu hơn so với thực tế, màu da cũng sẽ được làm mịn nhẹ, các bạn để mức làm đẹp thấp nhất thì chúng ta sẽ có 1 bức ảnh selfie cực kỳ tự nhiên.</p><h3>Hiệu suất nhanh hơn với vi xử lý MediaTek</h3><p>Tốc độ xử lý của Dimensity 920 lên đến 2.5 GHz, đồng thời máy cũng trang bị hệ thống làm mát buồng hơi cải tiến mang lại hiệu suất chơi game cũng như phản hồi các ứng dụng thật nhanh chóng. Kết quả kiểm tra bằng phần mềm Benchmark (bên trái) và PCMark (bên phải) như sau:</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/255513/realme-9-pro-plus-7-2.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/255513/realme-9-pro-plus-7-2.jpg\" alt=\"Điểm hiệu năng khi đo bằng phần mềm - realme 9 Pro+\"></a></p><p>Công nghệ mở rộng RAM động trên Realme 9 Pro+ có thể tự động mở rộng RAM lên đến 13 GB (8 GB mặc định + 5 GB mở rộng) nên thao tác chuyển đổi giữa các ứng dụng gần như ngay lập tức.</p><p>Những ứng dụng nhẹ nhàng thường ngày như: Facebook, TikTok, YouTube, nhắn tin,... thì máy hoàn toàn dư sức. Còn riêng về khả năng chơi game thì mình cũng có test qua 1 số tựa game quen thuộc như Liên Quân Mobile và PUBG Mobile.</p><p>Game Liên Quân Mobile thì máy có thể chơi khá mượt mà và ổn định, FPS luôn đạt mức 60, skill tướng xả thoải mái, hình ảnh trong game đẹp, thao tác không bị delay.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/255513/realme-9-pro-plus-8-2.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/255513/realme-9-pro-plus-8-2.jpg\" alt=\"Liên Quân Mobile - realme 9 Pro+\"></a></p><p>PUBG Mobile thì khi các bạn setting ở mức đồ họa mượt - tốc độ khung hình cực độ thì máy chơi ổn, mọi di chuyển đều tốt, không giật lag, combat rất tốt.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/255513/realme-9-pro-plus-9-2.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/255513/realme-9-pro-plus-9-2.jpg\" alt=\"PUBG Mobile - realme 9 Pro+\"></a></p><h3>Màn hình 90 Hz mượt mà</h3><p>Realme 9 Pro+ trang bị màn hình đủ dùng với kích thước 6.4 inch, tấm nền Super AMOLED, độ phân giải Full HD+, cho hình ảnh hiển thị sắc nét, màu sắc rực rỡ, màu đen sâu.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/255513/realme-9-pro-plus-10-2.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/255513/realme-9-pro-plus-10-2.jpg\" alt=\"Màn hình AMOLED - realme 9 Pro+\"></a></p><p>Tần số quét 90 Hz cho mọi chuyển động hiển thị mượt mà hơn, độ sáng tối đa đạt 1000 nits cho khả năng hiển thị ở nơi có độ sáng cao tốt hơn.</p><p>Nhìn chung đây là 1 màn hình khá phổ thông ở phân khúc giá, các yếu tố vừa đủ để cho chúng ta 1 khả năng hiển thị tương đối tốt, trong trẻo, nổi khối và không bị ám màu.</p><h3>Sạc 50% pin trong khoảng 15 phút*</h3><p>Realme 9 Pro+ được trang bị viên pin dung lượng 4500 mAh, có thể đồng hành cùng bạn trải qua cả ngày năng động với một lần sạc duy nhất. Hỗ trợ công suất sạc nhanh 60 W và Realme khá hào phóng khi trong hộp máy lại trang bị cho chúng ta 1 củ sạc đến 65 W.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/255513/realme-9-pro-plus-240322-112501.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/255513/realme-9-pro-plus-240322-112501.jpg\" alt=\"Sạc nhanh 60 W - realme 9 Pro+\"></a></p><p>Thời gian sử dụng khá ấn tượng với hơn 8 tiếng, sử dụng như tác vụ thông thường như mạng xã hội, xem phim, chơi game.</p><p>*Dữ liệu đến từ phòng thí nghiệm Realme. Dữ liệu thực tế có thể khác do môi trường thử nghiệm hoặc mất mát do sử dụng.</p><p>Realme 9 Pro+ là một sản phẩm có ngoại hình bắt mắt, hiệu năng có thể cùng bạn xử lý mọi tác vụ, camera hỗ trợ nhiều tính năng cùng với một viên pin có thời gian sử dụng lâu dài, là chiếc máy phù hợp với mọi đối tượng người dùng đặc biệt là các bạn trẻ năng động.</p>', 14, '2022-10-06 08:47:12', '2022-10-06 08:47:12'),
(5, 'OPPO Reno8 series', 'oppo-reno8-series', 'oppo-reno8-pro-thumb-xanh-1-600x6007275.jpg', 18990000, 0, '10', '<ul><li>Chip MediaTek Dimensity 8100 Max 8 nhân</li><li>RAM: 12 GB</li><li>Dung lượng: 256 GB</li><li>Camera sau: Chính 50 MP &amp; Phụ 8 MP, 2 MP</li><li>Camera trước: 32 MP</li><li>Pin 4500 mAh, Sạc 80 W</li></ul>', 0, '<h3>OPPO Reno8 Pro 5G ra mắt với sự đột phá về phần camera khi đây là thiết bị đầu tiên thuộc dòng Reno được tích hợp NPU MariSilicon X, được xem là NPU cao cấp nhất đến từ OPPO (2022) có khả năng xử lý hình ảnh đỉnh cao. Kèm với đó là một con chip mạnh mẽ đến từ nhà MediaTek giúp bạn có thể cân được mọi tựa game đang hiện hành.</h3><h3>Vẻ ngoài thời thượng</h3><p>Sản phẩm lần này sử dụng kiểu thiết kế vuông vức hợp xu hướng, cùng với đó là khung viền kim loại và mặt kính cường lực Gorilla Glass 5 giúp cho thiết bị có được độ bền bỉ cao hơn.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/260546/oppo-reno8-pro-230722-105151.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/260546/oppo-reno8-pro-230722-105151.jpg\" alt=\"Thiết kế đẹp mắt - OPPO Reno8 Pro\"></a></p><p>Điểm thú vị ở phần mặt lưng máy là cụm camera được tạo hình liền mạch và sử dụng kiểu thiết kế nổi 3D. Để tránh bị trầy xước camera nên hãng cũng đã đưa hai vùng ống kính này đặt sâu hơn so với mặt cụm một cách đầy tinh tế.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/260546/oppo-reno8-pro-260722-054141.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/260546/oppo-reno8-pro-260722-054141.jpg\" alt=\"Cụm camera độc đáo - OPPO Reno8 Pro\"></a></p><h3>Không gian hiển thị rộng lớn</h3><p>Với một màn hình có kích thước lên đến 6.7 inch giúp người dùng có thể thỏa sức trải nghiệm chơi game hay xem phim được đã mắt nhờ nội dung được hiển thị to rõ cùng một không gian thao tác cực kỳ rộng lớn.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/260546/oppo-reno8-pro-260722-054143.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/260546/oppo-reno8-pro-260722-054143.jpg\" alt=\"Màn hình kích thước lớn - OPPO Reno8 Pro\"></a></p><p>OPPO Reno8 Pro sử dụng công nghệ màn hình AMOLED và độ sáng tối đa 800 nits giúp tái hiện màu đen sâu cho ra hình ảnh chân thực. Ngoài ra độ sáng cao còn giúp người dùng có thể sử dụng thiết bị ở ngoài trời một cách dễ dàng hơn.</p><h3>Nhiếp ảnh chuyên nghiệp nhờ camera chất lượng</h3><p>Đây được xem là lần đầu tiên OPPO đưa NPU MariSilicon X qua dòng sản phẩm Reno nhằm cạnh tranh trực tiếp với nhiều hãng khác ở phần chụp ảnh. Với chức năng xử lý thuật toán đỉnh cao nên những bức ảnh chụp đêm hay tấm hình nhiều màu sắc đi chăng nữa thì OPPO Reno8 Pro vẫn cho ra kết quả hết sức ưng ý.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/260546/oppo-reno8-pro-260722-054145.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/260546/oppo-reno8-pro-260722-054145.jpg\" alt=\"Tích hợp NPU hình ảnh - OPPO Reno8 Pro\"></a></p><p>Thiết bị được trang bị 3 camera trong đó camera chính có độ phân giải lên tới 50 MP giúp ghi lại những khoảnh khắc thường ngày cực kỳ sắc nét. Với những bạn thường xuyên quay phim với mục đích sản xuất nội dung, thì tính năng quay video 4K sẽ là một điểm rất sáng giá mà bạn nên để tâm so với các sản phẩm khác có cùng phân khúc trên thị trường.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/260546/oppo-reno8-pro-260722-054147.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/260546/oppo-reno8-pro-260722-054147.jpg\" alt=\"Hỗ trợ chụp ảnh quay video sắc nét - OPPO Reno8 Pro\"></a></p><p>Mặt trước của điện thoại sẽ được trang bị camera selfie có độ phân giải 32 MP cùng với các tính năng thông minh như: Chụp đêm, làm đẹp, xóa phông. Giờ đây người dùng có thể tự tin tạo dáng với những bức ảnh tự chụp khi chất lượng cho ra hứa hẹn sẽ làm bạn cực kỳ ưng ý.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/260546/oppo-reno8-pro-260722-054148.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/260546/oppo-reno8-pro-260722-054148.jpg\" alt=\"Selfie chất lượng - OPPO Reno8 Pro\"></a></p><h3>Hiệu năng mạnh mẽ cân mọi tác vụ hàng ngày</h3><p>MediaTek Dimensity 8100 Max là chipset được chọn để trang bị cho chiếc điện thoại OPPO Reno này với tốc độ xung nhịp tối đa đạt được lên tới 2.85 GHz. Giờ đây với những nhu cầu sử dụng cơ bản thì máy hoàn toàn có thể xử lý một cách vi vu và mượt mà hay chơi được những tựa game hiện hành ở mức đồ họa cao.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/260546/oppo-reno8-pro-260722-054150.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/260546/oppo-reno8-pro-260722-054150.jpg\" alt=\"Hiệu năng mạnh mẽ - OPPO Reno8 Pro\"></a></p><p>Điện thoại RAM 12 GB quả thực là một mức dung lượng lý tưởng dành cho những ai thường xuyên sử dụng nhiều ứng dụng cùng lúc, bởi tình trạng giật lag hay tải lại ứng dụng từ đầu cũng hiếm khi xảy ra trên OPPO Reno8 Pro.</p><h3>Hỗ trợ sạc pin nhanh chóng</h3><p>Nhằm tối ưu thời gian sạc để khách hàng không phải chờ đợi quá lâu thì OPPO cũng đã trang bị thêm cho máy công nghệ sạc siêu nhanh SuperVOOC 80 W, giờ đây người dùng chỉ cần mất chưa tới 10 phút là có đủ dung lượng pin đáp ứng cho việc nghe gọi cả ngày dài.</p><p><a href=\"https://cdn.tgdd.vn/Products/Images/42/260546/oppo-reno8-pro-260722-054152.jpg\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/260546/oppo-reno8-pro-260722-054152.jpg\" alt=\"Sạc pin nhanh chóng - OPPO Reno8 Pro\"></a></p><p>OPPO Reno8 Pro được xem là một chiếc flagship toàn diện khi được nâng cấp đầy đủ từ cấu hình, thiết kế cho đến camera, đặc biệt trong số đó là NPU MariSilicon X với khả năng xử lý hình ảnh đỉnh cao giúp bạn có được những thước phim hay bức ảnh cực kỳ chất lượng.</p>', 12, '2022-10-06 08:50:27', '2022-10-06 08:53:08');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham_theloai`
--

DROP TABLE IF EXISTS `sanpham_theloai`;
CREATE TABLE IF NOT EXISTS `sanpham_theloai` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sanpham_id` int NOT NULL,
  `theloai_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sanpham_id` (`sanpham_id`),
  KEY `theloai_id` (`theloai_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sanpham_theloai`
--

INSERT INTO `sanpham_theloai` (`id`, `sanpham_id`, `theloai_id`) VALUES
(1, 5, 3),
(3, 4, 2),
(4, 3, 1),
(5, 2, 4),
(6, 1, 5),
(7, 5, 6),
(8, 5, 7),
(9, 4, 7),
(10, 4, 9),
(11, 3, 6),
(12, 3, 7),
(13, 1, 6),
(14, 1, 7),
(15, 1, 8),
(16, 2, 7),
(17, 2, 9);

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `theloais`
--

INSERT INTO `theloais` (`id`, `name`, `slug`, `kichhoat`) VALUES
(1, 'Dưới 5 triệu', 'duoi-5-trieu', 0),
(2, 'Từ 5 triệu đến 10 triệu', 'tu-5-trieu-den-10-trieu', 0),
(3, 'Từ 10 triệu đến 20 triệu', 'tu-10-trieu-den-20-trieu', 0),
(4, 'Từ 20 triệu đến 30 triệu', 'tu-20-trieu-den-30-trieu', 0),
(5, 'Trên 30 triệu', 'tren-30-trieu', 0),
(6, 'Chơi game / Cấu hình cao', 'choi-game-cau-hinh-cao', 0),
(7, 'Chụp ảnh, quay phim', 'chup-anh-quay-phim', 0),
(8, 'Mỏng nhẹ', 'mong-nhe', 0),
(9, 'Nhỏ gọn, dễ cầm', 'nho-gon-de-cam', 0);

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
