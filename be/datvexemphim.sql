-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 07, 2022 lúc 03:48 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `datvexemphim`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chieu_phims`
--

CREATE TABLE `chieu_phims` (
  `maChieu` bigint(20) UNSIGNED NOT NULL,
  `maCumRap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maPhim` bigint(20) UNSIGNED NOT NULL,
  `conChieu` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chieu_phims`
--

INSERT INTO `chieu_phims` (`maChieu`, `maCumRap`, `maPhim`, `conChieu`, `created_at`, `updated_at`) VALUES
(2, 'bhd-star-cineplex-3-2', 2, 1, '2021-11-14 07:08:59', '2021-11-14 07:08:59'),
(3, 'bhd-star-cineplex-3-2', 3, 1, '2021-11-14 07:09:03', '2021-11-14 07:09:03'),
(4, 'bhd-star-cineplex-bitexco', 4, 1, '2021-11-14 07:09:09', '2021-11-14 07:09:09'),
(6, 'bhd-star-cineplex-bitexco', 5, 1, '2021-11-14 07:09:15', '2021-11-14 07:09:15'),
(7, 'bhd-star-cineplex-bitexco', 2, 1, '2021-11-14 07:35:02', '2021-11-14 07:35:02'),
(9, 'cgv-aeon-binh-tan', 2, 1, '2021-11-14 14:12:44', '2021-11-14 14:12:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cum_raps`
--

CREATE TABLE `cum_raps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `maCumRap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenCumRap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diaChi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maHeThongRap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cum_raps`
--

INSERT INTO `cum_raps` (`id`, `maCumRap`, `tenCumRap`, `diaChi`, `maHeThongRap`, `created_at`, `updated_at`) VALUES
(1, 'bhd-star-cineplex-3-2', 'BHD Star Cineplex - 3/2', 'L5-Vincom 3/2, 3C Đường 3/2, Q.10', 'BHDStar', '2021-11-12 10:56:03', '2021-11-12 10:56:03'),
(2, 'bhd-star-cineplex-bitexco', 'BHD Star Cineplex - Bitexco', 'L3-Bitexco Icon 68, 2 Hải Triều, Q.1', 'BHDStar', '2021-11-12 10:56:25', '2021-11-12 10:56:25'),
(3, 'bhd-star-cineplex-pham-hung', 'BHD Star Cineplex - Phạm Hùng', 'L4-Satra Phạm Hùng, C6/27 Phạm Hùng, Bình Chánh', 'BHDStar', '2021-11-12 10:56:44', '2021-11-12 10:56:44'),
(4, 'bhd-star-cineplex-vincom-le-van-viet', 'BHD Star Cineplex - Vincom Lê Văn Việt', 'L4-Vincom Plaza, 50 Lê Văn Việt, Q.9', 'BHDStar', '2021-11-12 10:57:10', '2021-11-12 10:57:10'),
(5, 'bhd-star-cineplex-vincom-quang-trung', 'BHD Star Cineplex - Vincom Quang Trung', 'B1-Vincom QT, 190 Quang Trung, Gò Vấp', 'BHDStar', '2021-11-12 10:57:28', '2021-11-12 10:57:28'),
(6, 'bhd-star-cineplex-vincom-thao-dien', 'BHD Star Cineplex - Vincom Thảo Điền', 'L5-Megamall, 159 XL Hà Nội, Q.2', 'BHDStar', '2021-11-12 10:57:44', '2021-11-12 10:57:44'),
(7, 'cgv-aeon-binh-tan', 'CGV - Aeon Bình Tân', 'Tầng 3, TTTM Aeon Mall Bình Tân, Số 1 đường số 17A, khu phố 11, Bình Trị Đông B, Bình Tân', 'CGV', '2021-11-12 11:01:30', '2021-11-12 11:01:30'),
(8, 'cgv-aeon-tan-phu', 'CGV - Aeon Tân Phú', '30 Bờ Bao Tân Thắng, Sơn Kỳ, Tân Phú', 'CGV', '2021-11-12 11:01:48', '2021-11-12 11:01:48'),
(9, 'cgv-cgv-saigonres-nguyen-xi', 'CGV - CGV Saigonres Nguyễn Xí', 'Tầng 4-5, Saigonres Plaza, 79/81 Nguyễn Xí, P. 26, Bình Thạnh', 'CGV', '2021-11-12 11:02:09', '2021-11-12 11:02:09'),
(10, 'cgv-crescent-mall', 'CGV - Crescent Mall', 'Lầu 5, Crescent Mall, Đại lộ Nguyễn Văn Linh, Phú Mỹ Hưng, Q. 7', 'CGV', '2021-11-12 11:02:30', '2021-11-12 11:02:30'),
(11, 'cgv-ct-plaza', 'CGV - CT Plaza', '60A Trường Sơn,P. 2, Tân Bình', 'CGV', '2021-11-12 11:04:38', '2021-11-12 11:04:38'),
(12, 'cgv-golden-plaza', 'CGV - Golden Plaza', 'Tầng 4, Trung tâm thương mại Golden Plaza, 922 Nguyễn Trãi, P. 14, Q. 5', 'CGV', '2021-11-12 11:04:58', '2021-11-12 11:04:58'),
(13, 'cns-hai-ba-trung', 'CNS - Hai Bà Trưng', '135 Hai Bà Trưng, Bến Nghé, Q.1', 'CineStar', '2021-11-12 11:07:00', '2021-11-12 11:07:00'),
(14, 'cns-quoc-thanh', 'CNS - Quốc Thanh', '271 Nguyễn Trãi, Q.1', 'CineStar', '2021-11-12 11:07:21', '2021-11-12 11:07:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `he_thong_raps`
--

CREATE TABLE `he_thong_raps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `maHeThongRap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenHeThongRap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biDanh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `he_thong_raps`
--

INSERT INTO `he_thong_raps` (`id`, `maHeThongRap`, `tenHeThongRap`, `biDanh`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'BHDStar', 'BHD Star Cineplex', 'bhd-star-cineplex', 'http://localhost:8888/hinhanh/bhd-star-cineplex.png', '2021-11-12 10:46:57', '2021-11-12 10:46:57'),
(2, 'CGV', 'cgv', 'cgv', 'http://localhost:8888/hinhanh/cgv.png', '2021-11-12 10:47:56', '2021-11-12 10:47:56'),
(3, 'CineStar', 'CineStar', 'cinestar', 'http://localhost:8888/hinhanh/cinestar.png', '2021-11-12 10:48:23', '2021-11-12 10:48:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lich_chieus`
--

CREATE TABLE `lich_chieus` (
  `maLichChieu` bigint(20) UNSIGNED NOT NULL,
  `maRap` bigint(20) UNSIGNED NOT NULL,
  `ngayChieuGioChieu` datetime NOT NULL,
  `giaVe` bigint(20) NOT NULL,
  `maChieu` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tenRap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thoiLuong` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lich_chieus`
--

INSERT INTO `lich_chieus` (`maLichChieu`, `maRap`, `ngayChieuGioChieu`, `giaVe`, `maChieu`, `created_at`, `updated_at`, `tenRap`, `thoiLuong`) VALUES
(1, 11, '2021-11-12 17:56:03', 75000, 7, '2021-11-14 07:38:56', '2021-11-14 07:38:56', 'Rạp 1', 0),
(3, 1, '2021-11-12 17:56:03', 75000, 2, '2021-11-14 08:45:32', '2021-11-14 08:45:32', 'Rạp 1', 0),
(4, 1, '2021-11-12 17:56:03', 75000, 3, '2021-11-14 08:45:51', '2021-11-14 08:45:51', 'Rạp 1', 0),
(5, 11, '2021-11-12 17:56:03', 75000, 4, '2021-11-14 08:46:05', '2021-11-14 08:46:05', 'Rạp 1', 0),
(6, 11, '2021-11-12 17:56:03', 75000, 6, '2021-11-14 08:46:25', '2021-11-14 08:46:25', 'Rạp 1', 0),
(9, 61, '2021-11-12 17:56:03', 75000, 9, '2021-11-14 14:12:44', '2021-11-14 14:12:44', 'Rạp 1', 0),
(10, 62, '2021-11-12 17:56:03', 75000, 9, '2021-11-14 15:07:50', '2021-11-14 15:07:50', 'Rạp 2', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_11_09_121011_create_users_table', 1),
(2, '2021_11_10_065538_add_staff_column_to_user', 2),
(3, '2021_11_12_092941_create_he_thong_raps_table', 3),
(4, '2021_11_12_095313_create_cum_raps_table', 4),
(5, '2021_11_12_095643_create_raps_table', 4),
(6, '2021_11_12_095912_create_phims_table', 4),
(7, '2021_11_12_100659_create_lich_chieus_table', 4),
(8, '2021_11_12_132422_create_chieu_phims_table', 5),
(9, '2021_11_12_132601_change_lich_chieu', 6),
(10, '2021_11_13_093654_change_column_type', 7),
(11, '2021_11_14_063233_create_ves_table', 8),
(12, '2021_11_14_083457_change_lich_chieu_column', 9),
(13, '2021_11_14_084034_add_lich_chieus_column', 10),
(14, '2021_11_14_125247_remove_stt_column', 11),
(15, '2021_11_14_133731_alter_dang_chieu_column', 12),
(16, '2021_11_14_143324_alter_phims_table_add_thoi_luong_column', 12),
(17, '2021_11_14_144512_add_foreign_constraint', 13);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phims`
--

CREATE TABLE `phims` (
  `maPhim` bigint(20) UNSIGNED NOT NULL,
  `tenPhim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biDanh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trailer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhAnh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `moTa` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dangChieu` smallint(6) NOT NULL,
  `ngayKhoiChieu` datetime NOT NULL,
  `danhGia` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `thoiLuong` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phims`
--

INSERT INTO `phims` (`maPhim`, `tenPhim`, `biDanh`, `trailer`, `hinhAnh`, `moTa`, `dangChieu`, `ngayKhoiChieu`, `danhGia`, `created_at`, `updated_at`, `thoiLuong`) VALUES
(2, 'sed ex totam', 'sed-ex-totam', 'https://youtu.be/nW948Va-l10', 'http://localhost:8888/hinhanh/movie.jpg', 'Possimus veniam ducimus pariatur. Sed perferendis sit facilis qui odio excepturi. Iure rerum omnis dolores voluptatem nihil atque. Repellat omnis aut aliquid quaerat nemo.', 1, '2000-03-09 07:07:28', '7.00', '2021-11-13 10:02:10', '2021-11-13 10:02:10', 0),
(3, 'in culpa vel', 'in-culpa-vel', 'https://youtu.be/nW948Va-l10', 'http://localhost:8888/hinhanh/movie.jpg', 'Repellat tempore inventore rerum similique quia accusantium et. Ad dolor beatae accusantium rerum.', 1, '1987-01-16 16:24:06', '2.00', '2021-11-13 10:02:10', '2021-11-13 10:02:10', 0),
(4, 'quidem ad illo', 'quidem-ad-illo', 'https://youtu.be/nW948Va-l10', 'http://localhost:8888/hinhanh/movie.jpg', 'Aperiam impedit aliquid nostrum minus reiciendis ipsa quas omnis. Cumque consectetur atque sunt reiciendis. Iusto harum nam fuga. Ut adipisci et sequi at commodi sint quia quo.', 0, '2002-09-03 13:01:04', '9.00', '2021-11-13 10:02:10', '2021-11-13 10:02:10', 0),
(5, 'similique aliquid ea', 'similique-aliquid-ea', 'https://youtu.be/nW948Va-l10', 'http://localhost:8888/hinhanh/movie.jpg', 'Repellat impedit dolorem molestiae nobis voluptates. Error officiis ut exercitationem sit omnis. Distinctio inventore ut laudantium voluptas.', 0, '1989-07-08 03:03:51', '3.00', '2021-11-13 10:02:10', '2021-11-13 10:02:10', 0),
(6, 'rerum dolorem nesciunt', 'rerum-dolorem-nesciunt', 'https://youtu.be/nW948Va-l10', 'http://localhost:8888/hinhanh/movie.jpg', 'Aperiam culpa quae nam ducimus. Sint illum quia sed nobis quis accusantium non. Aspernatur aut eaque aliquam aut.', 1, '2003-07-10 12:42:04', '1.00', '2021-11-13 10:02:10', '2021-11-13 10:02:10', 0),
(7, 'repellendus deserunt excepturi', 'repellendus-deserunt-excepturi', 'https://youtu.be/nW948Va-l10', 'http://localhost:8888/hinhanh/movie.jpg', 'Laboriosam blanditiis laborum nihil sed. Explicabo neque temporibus animi atque dolores aut quis numquam. Ipsa velit aut commodi rem odio quibusdam. Expedita eum soluta ut est. Atque aspernatur hic ipsa voluptatem molestias quae vel cum.', 0, '2010-07-28 03:07:42', '6.00', '2021-11-13 10:02:10', '2021-11-13 10:02:10', 0),
(8, 'ipsam ratione quis', 'ipsam-ratione-quis', 'https://youtu.be/nW948Va-l10', 'http://localhost:8888/hinhanh/movie.jpg', 'Mollitia soluta modi minus tempora quia. Nobis nam et quia qui sunt et.', 0, '2007-06-18 14:48:55', '5.00', '2021-11-13 10:02:10', '2021-11-13 10:02:10', 0),
(9, 'est quasi nostrum', 'est-quasi-nostrum', 'https://youtu.be/nW948Va-l10', 'http://localhost:8888/hinhanh/movie.jpg', 'Facilis fuga deleniti nesciunt voluptatem et iste. Culpa facilis neque excepturi nulla dicta qui. Pariatur consequuntur excepturi aut dolorem aut.', 1, '1973-02-26 00:30:41', '0.00', '2021-11-13 10:02:10', '2021-11-13 10:02:10', 0),
(10, 'laborum harum voluptatibus', 'laborum-harum-voluptatibus', 'https://youtu.be/nW948Va-l10', 'http://localhost:8888/hinhanh/movie.jpg', 'Non quaerat eaque autem dolores et. Eum reprehenderit distinctio et ut inventore perferendis fugit. A repellendus aperiam quos architecto sit voluptas.', 1, '2015-10-18 11:20:41', '7.00', '2021-11-13 10:02:10', '2021-11-13 10:02:10', 0),
(11, 'eos facere nobis', 'eos-facere-nobis', 'https://youtu.be/nW948Va-l10', 'http://localhost:8888/hinhanh/movie.jpg', 'Quae impedit in deleniti dolores. Quis ullam ea voluptatem est eligendi. Corrupti reprehenderit totam placeat quo aperiam est.', 0, '2001-08-30 08:34:56', '8.00', '2021-11-13 10:02:10', '2021-11-13 10:02:10', 0),
(12, 'aut consequatur quo', 'aut-consequatur-quo', 'https://youtu.be/nW948Va-l10', 'http://localhost:8888/hinhanh/movie.jpg', 'Natus iusto veniam maxime. Optio aperiam commodi ipsa qui aut. Nisi unde rem quidem magnam. Autem quia sit suscipit necessitatibus. At voluptatem aut voluptate velit quam quibusdam est.', 0, '2021-04-19 13:41:24', '2.00', '2021-11-13 10:02:10', '2021-11-13 10:02:10', 0),
(13, 'mollitia incidunt ad', 'mollitia-incidunt-ad', 'https://youtu.be/nW948Va-l10', 'http://localhost:8888/hinhanh/movie.jpg', 'Officiis asperiores voluptas quos neque iusto rem. Et cum occaecati sapiente rem omnis quis. Praesentium quisquam minima dolor in voluptatem cum ipsa. A quidem odit dolore quisquam.', 0, '2013-01-10 11:22:40', '0.00', '2021-11-13 10:02:10', '2021-11-13 10:02:10', 0),
(14, 'totam officia fugit', 'totam-officia-fugit', 'https://youtu.be/nW948Va-l10', 'http://localhost:8888/hinhanh/movie.jpg', 'Exercitationem et esse expedita ipsam atque quis minima. Quidem eaque sed explicabo ut reprehenderit error. Mollitia omnis voluptas et qui cum. Dicta voluptatem architecto modi sapiente. Praesentium est quia doloremque nesciunt qui.', 1, '1994-11-02 10:01:14', '4.00', '2021-11-13 10:02:10', '2021-11-13 10:02:10', 0),
(15, 'accusamus sed iure', 'accusamus-sed-iure', 'https://youtu.be/nW948Va-l10', 'http://localhost:8888/hinhanh/movie.jpg', 'Quia quisquam doloremque repellat vel. Laboriosam ipsum voluptas ut unde consequuntur. Facere provident quaerat molestias libero.', 0, '2018-01-09 21:31:31', '7.00', '2021-11-13 10:02:10', '2021-11-13 10:02:10', 0),
(16, 'dolorum omnis sunt', 'dolorum-omnis-sunt', 'https://youtu.be/nW948Va-l10', 'http://localhost:8888/hinhanh/movie.jpg', 'Aut quia iste et ea necessitatibus. Ut est ut in nisi. Facilis alias veniam sequi quisquam saepe neque qui.', 1, '1973-04-20 19:04:56', '4.00', '2021-11-13 10:02:10', '2021-11-13 10:02:10', 0),
(18, 'sed doloremque nesciunt', 'sed-doloremque-nesciunt', 'https://youtu.be/nW948Va-l10', 'http://localhost:8888/hinhanh/movie.jpg', 'Expedita ullam dolor voluptate consequatur autem minus aperiam. Maxime reiciendis mollitia maiores. Ut officiis nostrum ipsum maxime quis tenetur odio.', 1, '1984-02-26 23:23:52', '8.00', '2021-11-13 10:02:10', '2021-11-13 10:02:10', 0),
(21, 'Spider: No Way Home', 'spider:-no-way-home', 'https://www.youtube.com/watch?v=JfVOs4VSpmA', 'http://localhost:8888/hinhanh/movie-image/1641560495_NWH-poster-1-game4v-1637893169-6.jpg', 'Người Nhện: Không còn nhà là phim siêu anh hùng năm 2021 của Hoa Kỳ dựa trên nhân vật Peter Parker của Marvel Comics, do Columbia Pictures và Marvel Studios đồng sản xuất, và được phân phối bởi Sony Pictures Releasing.', 1, '2021-12-17 00:00:00', '10.00', '2022-01-07 13:01:35', '2022-01-07 13:01:35', 120),
(22, 'Hoa Mộc Lan (2020)', 'hoa-mộc-lan(2020)', 'https://www.youtube.com/watch?v=KK8FHdFluOQ', 'http://localhost:8888/hinhanh/movie-image/1641561165_mulan-teaserposter-full-700x1037-1177687.jpeg', 'Hoa Mộc Lan (tên gốc tiếng Anh: Mulan) là phim điện ảnh chính kịch hành động kỳ ảo của Mỹ năm 2020 do Walt Disney Pictures sản xuất. Phim do Nick Caro đạo diễn, với phần kịch bản do Rick Jaffa, Amanda Silver, Lauren Hynek và Elizabeth Martin hợp tác thực hiện. Phim dựa trên huyền sử về nữ anh hùng Hoa Mộc Lan của Trung Quốc và là phiên bản chuyển thể từ bộ phim hoạt hình cùng tên năm 1998 của Walt Disney Animation Studios. Phim có sự tham gia diễn xuất của nữ diễn viên Lưu Diệc Phi trong vai nữ chính, cùng với dàn diễn viên phụ gồm Chân Tử Đan, Tzi Ma, Jason Scott Lee, Yoson An, Củng Lợi và Lý Liên Kiệt. Nội dung phim lấy bối cảnh tại Đế quốc Trung Hoa.', 1, '2020-03-09 00:00:00', '3.00', '2022-01-07 13:12:45', '2022-01-07 14:11:40', 115),
(23, 'Raya và Rồng thần cuối cùng', 'raya-và-rồng-thần-cuối-cùng', 'https://www.youtube.com/watch?v=l0_xBH0vhwM', 'http://localhost:8888/hinhanh/movie-image/1641561341_raya-poster-chinh-thuc-1615020557916225386316-1615718436462732040709.webp', 'Raya và rồng thần cuối cùng là phim hoạt hình phiêu lưu hành động kỳ ảo của Mỹ năm 2021. Phim do hai hãng Walt Disney Pictures và Walt Disney Animation Studios đồng sản xuất và hãng Walt Disney Studios Motion Pictures phát hành.', 0, '2021-03-05 00:00:00', '9.00', '2022-01-07 13:15:41', '2022-01-07 13:15:41', 107);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `raps`
--

CREATE TABLE `raps` (
  `maRap` bigint(20) UNSIGNED NOT NULL,
  `tenRap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maCumRap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `raps`
--

INSERT INTO `raps` (`maRap`, `tenRap`, `maCumRap`, `created_at`, `updated_at`) VALUES
(1, 'Rạp 1', 'bhd-star-cineplex-3-2', '2021-11-12 11:18:08', '2021-11-12 11:18:08'),
(2, 'Rạp 2', 'bhd-star-cineplex-3-2', '2021-11-12 11:18:08', '2021-11-12 11:18:08'),
(3, 'Rạp 3', 'bhd-star-cineplex-3-2', '2021-11-12 11:18:08', '2021-11-12 11:18:08'),
(4, 'Rạp 4', 'bhd-star-cineplex-3-2', '2021-11-12 11:18:08', '2021-11-12 11:18:08'),
(5, 'Rạp 5', 'bhd-star-cineplex-3-2', '2021-11-12 11:18:08', '2021-11-12 11:18:08'),
(6, 'Rạp 6', 'bhd-star-cineplex-3-2', '2021-11-12 11:18:08', '2021-11-12 11:18:08'),
(7, 'Rạp 7', 'bhd-star-cineplex-3-2', '2021-11-12 11:18:08', '2021-11-12 11:18:08'),
(8, 'Rạp 8', 'bhd-star-cineplex-3-2', '2021-11-12 11:18:08', '2021-11-12 11:18:08'),
(9, 'Rạp 9', 'bhd-star-cineplex-3-2', '2021-11-12 11:18:08', '2021-11-12 11:18:08'),
(10, 'Rạp 10', 'bhd-star-cineplex-3-2', '2021-11-12 11:18:08', '2021-11-12 11:18:08'),
(11, 'Rạp 1', 'bhd-star-cineplex-bitexco', '2021-11-12 11:20:58', '2021-11-12 11:20:58'),
(12, 'Rạp 2', 'bhd-star-cineplex-bitexco', '2021-11-12 11:20:58', '2021-11-12 11:20:58'),
(13, 'Rạp 3', 'bhd-star-cineplex-bitexco', '2021-11-12 11:20:58', '2021-11-12 11:20:58'),
(14, 'Rạp 4', 'bhd-star-cineplex-bitexco', '2021-11-12 11:20:58', '2021-11-12 11:20:58'),
(15, 'Rạp 5', 'bhd-star-cineplex-bitexco', '2021-11-12 11:20:58', '2021-11-12 11:20:58'),
(16, 'Rạp 6', 'bhd-star-cineplex-bitexco', '2021-11-12 11:20:58', '2021-11-12 11:20:58'),
(17, 'Rạp 7', 'bhd-star-cineplex-bitexco', '2021-11-12 11:20:58', '2021-11-12 11:20:58'),
(18, 'Rạp 8', 'bhd-star-cineplex-bitexco', '2021-11-12 11:20:58', '2021-11-12 11:20:58'),
(19, 'Rạp 9', 'bhd-star-cineplex-bitexco', '2021-11-12 11:20:58', '2021-11-12 11:20:58'),
(20, 'Rạp 10', 'bhd-star-cineplex-bitexco', '2021-11-12 11:20:58', '2021-11-12 11:20:58'),
(21, 'Rạp 1', 'bhd-star-cineplex-pham-hung', '2021-11-12 11:23:07', '2021-11-12 11:23:07'),
(22, 'Rạp 2', 'bhd-star-cineplex-pham-hung', '2021-11-12 11:23:07', '2021-11-12 11:23:07'),
(23, 'Rạp 3', 'bhd-star-cineplex-pham-hung', '2021-11-12 11:23:07', '2021-11-12 11:23:07'),
(24, 'Rạp 4', 'bhd-star-cineplex-pham-hung', '2021-11-12 11:23:07', '2021-11-12 11:23:07'),
(25, 'Rạp 5', 'bhd-star-cineplex-pham-hung', '2021-11-12 11:23:07', '2021-11-12 11:23:07'),
(26, 'Rạp 6', 'bhd-star-cineplex-pham-hung', '2021-11-12 11:23:07', '2021-11-12 11:23:07'),
(27, 'Rạp 7', 'bhd-star-cineplex-pham-hung', '2021-11-12 11:23:07', '2021-11-12 11:23:07'),
(28, 'Rạp 8', 'bhd-star-cineplex-pham-hung', '2021-11-12 11:23:07', '2021-11-12 11:23:07'),
(29, 'Rạp 9', 'bhd-star-cineplex-pham-hung', '2021-11-12 11:23:07', '2021-11-12 11:23:07'),
(30, 'Rạp 10', 'bhd-star-cineplex-pham-hung', '2021-11-12 11:23:07', '2021-11-12 11:23:07'),
(31, 'Rạp 1', 'bhd-star-cineplex-vincom-le-van-viet', '2021-11-12 11:23:25', '2021-11-12 11:23:25'),
(32, 'Rạp 2', 'bhd-star-cineplex-vincom-le-van-viet', '2021-11-12 11:23:25', '2021-11-12 11:23:25'),
(33, 'Rạp 3', 'bhd-star-cineplex-vincom-le-van-viet', '2021-11-12 11:23:25', '2021-11-12 11:23:25'),
(34, 'Rạp 4', 'bhd-star-cineplex-vincom-le-van-viet', '2021-11-12 11:23:25', '2021-11-12 11:23:25'),
(35, 'Rạp 5', 'bhd-star-cineplex-vincom-le-van-viet', '2021-11-12 11:23:25', '2021-11-12 11:23:25'),
(36, 'Rạp 6', 'bhd-star-cineplex-vincom-le-van-viet', '2021-11-12 11:23:25', '2021-11-12 11:23:25'),
(37, 'Rạp 7', 'bhd-star-cineplex-vincom-le-van-viet', '2021-11-12 11:23:25', '2021-11-12 11:23:25'),
(38, 'Rạp 8', 'bhd-star-cineplex-vincom-le-van-viet', '2021-11-12 11:23:25', '2021-11-12 11:23:25'),
(39, 'Rạp 9', 'bhd-star-cineplex-vincom-le-van-viet', '2021-11-12 11:23:25', '2021-11-12 11:23:25'),
(40, 'Rạp 10', 'bhd-star-cineplex-vincom-le-van-viet', '2021-11-12 11:23:25', '2021-11-12 11:23:25'),
(41, 'Rạp 1', 'bhd-star-cineplex-vincom-quang-trung', '2021-11-12 11:24:14', '2021-11-12 11:24:14'),
(42, 'Rạp 2', 'bhd-star-cineplex-vincom-quang-trung', '2021-11-12 11:24:14', '2021-11-12 11:24:14'),
(43, 'Rạp 3', 'bhd-star-cineplex-vincom-quang-trung', '2021-11-12 11:24:14', '2021-11-12 11:24:14'),
(44, 'Rạp 4', 'bhd-star-cineplex-vincom-quang-trung', '2021-11-12 11:24:14', '2021-11-12 11:24:14'),
(45, 'Rạp 5', 'bhd-star-cineplex-vincom-quang-trung', '2021-11-12 11:24:14', '2021-11-12 11:24:14'),
(46, 'Rạp 6', 'bhd-star-cineplex-vincom-quang-trung', '2021-11-12 11:24:14', '2021-11-12 11:24:14'),
(47, 'Rạp 7', 'bhd-star-cineplex-vincom-quang-trung', '2021-11-12 11:24:14', '2021-11-12 11:24:14'),
(48, 'Rạp 8', 'bhd-star-cineplex-vincom-quang-trung', '2021-11-12 11:24:14', '2021-11-12 11:24:14'),
(49, 'Rạp 9', 'bhd-star-cineplex-vincom-quang-trung', '2021-11-12 11:24:14', '2021-11-12 11:24:14'),
(50, 'Rạp 10', 'bhd-star-cineplex-vincom-quang-trung', '2021-11-12 11:24:14', '2021-11-12 11:24:14'),
(51, 'Rạp 1', 'bhd-star-cineplex-vincom-thao-dien', '2021-11-12 11:24:30', '2021-11-12 11:24:30'),
(52, 'Rạp 2', 'bhd-star-cineplex-vincom-thao-dien', '2021-11-12 11:24:30', '2021-11-12 11:24:30'),
(53, 'Rạp 3', 'bhd-star-cineplex-vincom-thao-dien', '2021-11-12 11:24:30', '2021-11-12 11:24:30'),
(54, 'Rạp 4', 'bhd-star-cineplex-vincom-thao-dien', '2021-11-12 11:24:30', '2021-11-12 11:24:30'),
(55, 'Rạp 5', 'bhd-star-cineplex-vincom-thao-dien', '2021-11-12 11:24:30', '2021-11-12 11:24:30'),
(56, 'Rạp 6', 'bhd-star-cineplex-vincom-thao-dien', '2021-11-12 11:24:30', '2021-11-12 11:24:30'),
(57, 'Rạp 7', 'bhd-star-cineplex-vincom-thao-dien', '2021-11-12 11:24:30', '2021-11-12 11:24:30'),
(58, 'Rạp 8', 'bhd-star-cineplex-vincom-thao-dien', '2021-11-12 11:24:30', '2021-11-12 11:24:30'),
(59, 'Rạp 9', 'bhd-star-cineplex-vincom-thao-dien', '2021-11-12 11:24:30', '2021-11-12 11:24:30'),
(60, 'Rạp 10', 'bhd-star-cineplex-vincom-thao-dien', '2021-11-12 11:24:30', '2021-11-12 11:24:30'),
(61, 'Rạp 1', 'cgv-aeon-binh-tan', '2021-11-12 11:24:54', '2021-11-12 11:24:54'),
(62, 'Rạp 2', 'cgv-aeon-binh-tan', '2021-11-12 11:24:54', '2021-11-12 11:24:54'),
(63, 'Rạp 3', 'cgv-aeon-binh-tan', '2021-11-12 11:24:54', '2021-11-12 11:24:54'),
(64, 'Rạp 4', 'cgv-aeon-binh-tan', '2021-11-12 11:24:54', '2021-11-12 11:24:54'),
(65, 'Rạp 5', 'cgv-aeon-binh-tan', '2021-11-12 11:24:54', '2021-11-12 11:24:54'),
(66, 'Rạp 6', 'cgv-aeon-binh-tan', '2021-11-12 11:24:54', '2021-11-12 11:24:54'),
(67, 'Rạp 7', 'cgv-aeon-binh-tan', '2021-11-12 11:24:54', '2021-11-12 11:24:54'),
(68, 'Rạp 8', 'cgv-aeon-binh-tan', '2021-11-12 11:24:54', '2021-11-12 11:24:54'),
(69, 'Rạp 9', 'cgv-aeon-binh-tan', '2021-11-12 11:24:54', '2021-11-12 11:24:54'),
(70, 'Rạp 10', 'cgv-aeon-binh-tan', '2021-11-12 11:24:54', '2021-11-12 11:24:54'),
(71, 'Rạp 11', 'cgv-aeon-binh-tan', '2021-11-12 11:25:06', '2021-11-12 11:25:06'),
(72, 'Rạp 12', 'cgv-aeon-binh-tan', '2021-11-12 11:25:06', '2021-11-12 11:25:06'),
(73, 'Rạp 13', 'cgv-aeon-binh-tan', '2021-11-12 11:25:06', '2021-11-12 11:25:06'),
(74, 'Rạp 14', 'cgv-aeon-binh-tan', '2021-11-12 11:25:06', '2021-11-12 11:25:06'),
(75, 'Rạp 15', 'cgv-aeon-binh-tan', '2021-11-12 11:25:06', '2021-11-12 11:25:06'),
(76, 'Rạp 16', 'cgv-aeon-binh-tan', '2021-11-12 11:25:06', '2021-11-12 11:25:06'),
(77, 'Rạp 17', 'cgv-aeon-binh-tan', '2021-11-12 11:25:06', '2021-11-12 11:25:06'),
(78, 'Rạp 18', 'cgv-aeon-binh-tan', '2021-11-12 11:25:06', '2021-11-12 11:25:06'),
(79, 'Rạp 19', 'cgv-aeon-binh-tan', '2021-11-12 11:25:06', '2021-11-12 11:25:06'),
(80, 'Rạp 20', 'cgv-aeon-binh-tan', '2021-11-12 11:25:06', '2021-11-12 11:25:06'),
(81, 'Rạp 1', 'cgv-aeon-tan-phu', '2021-11-12 11:25:15', '2021-11-12 11:25:15'),
(82, 'Rạp 2', 'cgv-aeon-tan-phu', '2021-11-12 11:25:15', '2021-11-12 11:25:15'),
(83, 'Rạp 3', 'cgv-aeon-tan-phu', '2021-11-12 11:25:15', '2021-11-12 11:25:15'),
(84, 'Rạp 4', 'cgv-aeon-tan-phu', '2021-11-12 11:25:15', '2021-11-12 11:25:15'),
(85, 'Rạp 5', 'cgv-aeon-tan-phu', '2021-11-12 11:25:15', '2021-11-12 11:25:15'),
(86, 'Rạp 6', 'cgv-aeon-tan-phu', '2021-11-12 11:25:15', '2021-11-12 11:25:15'),
(87, 'Rạp 7', 'cgv-aeon-tan-phu', '2021-11-12 11:25:15', '2021-11-12 11:25:15'),
(88, 'Rạp 8', 'cgv-aeon-tan-phu', '2021-11-12 11:25:15', '2021-11-12 11:25:15'),
(89, 'Rạp 9', 'cgv-aeon-tan-phu', '2021-11-12 11:25:15', '2021-11-12 11:25:15'),
(90, 'Rạp 10', 'cgv-aeon-tan-phu', '2021-11-12 11:25:15', '2021-11-12 11:25:15'),
(91, 'Rạp 1', 'cgv-cgv-saigonres-nguyen-xi', '2021-11-12 11:25:26', '2021-11-12 11:25:26'),
(92, 'Rạp 2', 'cgv-cgv-saigonres-nguyen-xi', '2021-11-12 11:25:26', '2021-11-12 11:25:26'),
(93, 'Rạp 3', 'cgv-cgv-saigonres-nguyen-xi', '2021-11-12 11:25:26', '2021-11-12 11:25:26'),
(94, 'Rạp 4', 'cgv-cgv-saigonres-nguyen-xi', '2021-11-12 11:25:26', '2021-11-12 11:25:26'),
(95, 'Rạp 5', 'cgv-cgv-saigonres-nguyen-xi', '2021-11-12 11:25:26', '2021-11-12 11:25:26'),
(96, 'Rạp 6', 'cgv-cgv-saigonres-nguyen-xi', '2021-11-12 11:25:26', '2021-11-12 11:25:26'),
(97, 'Rạp 7', 'cgv-cgv-saigonres-nguyen-xi', '2021-11-12 11:25:26', '2021-11-12 11:25:26'),
(98, 'Rạp 8', 'cgv-cgv-saigonres-nguyen-xi', '2021-11-12 11:25:26', '2021-11-12 11:25:26'),
(99, 'Rạp 9', 'cgv-cgv-saigonres-nguyen-xi', '2021-11-12 11:25:26', '2021-11-12 11:25:26'),
(100, 'Rạp 10', 'cgv-cgv-saigonres-nguyen-xi', '2021-11-12 11:25:26', '2021-11-12 11:25:26'),
(101, 'Rạp 1', 'cgv-crescent-mall', '2021-11-12 11:26:00', '2021-11-12 11:26:00'),
(102, 'Rạp 2', 'cgv-crescent-mall', '2021-11-12 11:26:00', '2021-11-12 11:26:00'),
(103, 'Rạp 3', 'cgv-crescent-mall', '2021-11-12 11:26:00', '2021-11-12 11:26:00'),
(104, 'Rạp 4', 'cgv-crescent-mall', '2021-11-12 11:26:00', '2021-11-12 11:26:00'),
(105, 'Rạp 5', 'cgv-crescent-mall', '2021-11-12 11:26:00', '2021-11-12 11:26:00'),
(106, 'Rạp 6', 'cgv-crescent-mall', '2021-11-12 11:26:00', '2021-11-12 11:26:00'),
(107, 'Rạp 7', 'cgv-crescent-mall', '2021-11-12 11:26:00', '2021-11-12 11:26:00'),
(108, 'Rạp 8', 'cgv-crescent-mall', '2021-11-12 11:26:00', '2021-11-12 11:26:00'),
(109, 'Rạp 9', 'cgv-crescent-mall', '2021-11-12 11:26:00', '2021-11-12 11:26:00'),
(110, 'Rạp 10', 'cgv-crescent-mall', '2021-11-12 11:26:00', '2021-11-12 11:26:00'),
(111, 'Rạp 1', 'cgv-ct-plaza', '2021-11-12 11:26:15', '2021-11-12 11:26:15'),
(112, 'Rạp 2', 'cgv-ct-plaza', '2021-11-12 11:26:15', '2021-11-12 11:26:15'),
(113, 'Rạp 3', 'cgv-ct-plaza', '2021-11-12 11:26:15', '2021-11-12 11:26:15'),
(114, 'Rạp 4', 'cgv-ct-plaza', '2021-11-12 11:26:15', '2021-11-12 11:26:15'),
(115, 'Rạp 5', 'cgv-ct-plaza', '2021-11-12 11:26:15', '2021-11-12 11:26:15'),
(116, 'Rạp 6', 'cgv-ct-plaza', '2021-11-12 11:26:15', '2021-11-12 11:26:15'),
(117, 'Rạp 7', 'cgv-ct-plaza', '2021-11-12 11:26:15', '2021-11-12 11:26:15'),
(118, 'Rạp 8', 'cgv-ct-plaza', '2021-11-12 11:26:15', '2021-11-12 11:26:15'),
(119, 'Rạp 9', 'cgv-ct-plaza', '2021-11-12 11:26:15', '2021-11-12 11:26:15'),
(120, 'Rạp 10', 'cgv-ct-plaza', '2021-11-12 11:26:15', '2021-11-12 11:26:15'),
(121, 'Rạp 1', 'cgv-golden-plaza', '2021-11-12 11:26:28', '2021-11-12 11:26:28'),
(122, 'Rạp 2', 'cgv-golden-plaza', '2021-11-12 11:26:28', '2021-11-12 11:26:28'),
(123, 'Rạp 3', 'cgv-golden-plaza', '2021-11-12 11:26:28', '2021-11-12 11:26:28'),
(124, 'Rạp 4', 'cgv-golden-plaza', '2021-11-12 11:26:28', '2021-11-12 11:26:28'),
(125, 'Rạp 5', 'cgv-golden-plaza', '2021-11-12 11:26:28', '2021-11-12 11:26:28'),
(126, 'Rạp 6', 'cgv-golden-plaza', '2021-11-12 11:26:28', '2021-11-12 11:26:28'),
(127, 'Rạp 7', 'cgv-golden-plaza', '2021-11-12 11:26:28', '2021-11-12 11:26:28'),
(128, 'Rạp 8', 'cgv-golden-plaza', '2021-11-12 11:26:28', '2021-11-12 11:26:28'),
(129, 'Rạp 9', 'cgv-golden-plaza', '2021-11-12 11:26:28', '2021-11-12 11:26:28'),
(130, 'Rạp 10', 'cgv-golden-plaza', '2021-11-12 11:26:28', '2021-11-12 11:26:28'),
(131, 'Rạp 1', 'cns-hai-ba-trung', '2021-11-12 11:26:48', '2021-11-12 11:26:48'),
(132, 'Rạp 2', 'cns-hai-ba-trung', '2021-11-12 11:26:48', '2021-11-12 11:26:48'),
(133, 'Rạp 3', 'cns-hai-ba-trung', '2021-11-12 11:26:48', '2021-11-12 11:26:48'),
(134, 'Rạp 4', 'cns-hai-ba-trung', '2021-11-12 11:26:48', '2021-11-12 11:26:48'),
(135, 'Rạp 5', 'cns-hai-ba-trung', '2021-11-12 11:26:48', '2021-11-12 11:26:48'),
(136, 'Rạp 6', 'cns-hai-ba-trung', '2021-11-12 11:26:48', '2021-11-12 11:26:48'),
(137, 'Rạp 7', 'cns-hai-ba-trung', '2021-11-12 11:26:48', '2021-11-12 11:26:48'),
(138, 'Rạp 8', 'cns-hai-ba-trung', '2021-11-12 11:26:48', '2021-11-12 11:26:48'),
(139, 'Rạp 9', 'cns-hai-ba-trung', '2021-11-12 11:26:48', '2021-11-12 11:26:48'),
(140, 'Rạp 10', 'cns-hai-ba-trung', '2021-11-12 11:26:48', '2021-11-12 11:26:48'),
(141, 'Rạp 1', 'cns-quoc-thanh', '2021-11-12 11:26:59', '2021-11-12 11:26:59'),
(142, 'Rạp 2', 'cns-quoc-thanh', '2021-11-12 11:26:59', '2021-11-12 11:26:59'),
(143, 'Rạp 3', 'cns-quoc-thanh', '2021-11-12 11:26:59', '2021-11-12 11:26:59'),
(144, 'Rạp 4', 'cns-quoc-thanh', '2021-11-12 11:26:59', '2021-11-12 11:26:59'),
(145, 'Rạp 5', 'cns-quoc-thanh', '2021-11-12 11:26:59', '2021-11-12 11:26:59'),
(146, 'Rạp 6', 'cns-quoc-thanh', '2021-11-12 11:26:59', '2021-11-12 11:26:59'),
(147, 'Rạp 7', 'cns-quoc-thanh', '2021-11-12 11:26:59', '2021-11-12 11:26:59'),
(148, 'Rạp 8', 'cns-quoc-thanh', '2021-11-12 11:26:59', '2021-11-12 11:26:59'),
(149, 'Rạp 9', 'cns-quoc-thanh', '2021-11-12 11:26:59', '2021-11-12 11:26:59'),
(150, 'Rạp 10', 'cns-quoc-thanh', '2021-11-12 11:26:59', '2021-11-12 11:26:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `taiKhoan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matKhau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soDt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maNhom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maLoaiNguoiDung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hoTen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `staff` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `taiKhoan`, `matKhau`, `email`, `soDt`, `maNhom`, `maLoaiNguoiDung`, `hoTen`, `created_at`, `updated_at`, `staff`) VALUES
(1, 'user-hcapij', '$2y$10$qwGQxE/.EXZXBrTwKHZFYeqc8wx.fXWVx8I7yZsy.bgFmN9bF28AO', 'tyrel.dietrich@example.com', '361-306-2494', 'GP01', 'KhachHang', 'Viviane Lubowitz', '2021-11-09 12:37:07', '2021-12-26 15:58:05', 0),
(2, 'user-titxhl', '$2y$10$pXQFYE/Gmhum7bDScQIweeMhptyO0f4q6GElmim0is8bKUcyU2qwe', 'kmitchell@example.org', '(341) 823-9841', 'GP01', 'KhachHang', 'Mrs. Arielle Zulauf PhD', '2021-11-09 12:37:07', '2021-11-09 12:37:07', 0),
(3, 'user-uvsnvf', '$2y$10$bjmjMcn6IcynLeZrIZiDwOS1h7iGMKJ.Frlq00tM8gBni05Hm76/i', 'little.demond@example.net', '251.929.6292', 'GP01', 'KhachHang', 'Mabelle Batz', '2021-11-09 12:37:07', '2021-11-09 12:37:07', 0),
(4, 'user-miaklb', '$2y$10$2S5usylzSXgpgiS1O3vjGO.aEkn8FVqClXrbxZ2Yq1FS1Jdx0qauC', 'hartmann.carol@example.org', '+1-281-533-2307', 'GP01', 'KhachHang', 'Marta Schulist', '2021-11-09 12:37:07', '2021-11-09 12:37:07', 0),
(5, 'user-xjiwml', '$2y$10$AUbihlOejs9vFCSw6TrwfOUOSX/AhKZyoHl16Y49Nz48EgN73iWfi', 'laura.rath@example.com', '754.588.4383', 'GP01', 'KhachHang', 'Mrs. Marlee Fisher', '2021-11-09 12:37:07', '2021-11-09 12:37:07', 0),
(6, 'caotrongnghia', '$2y$10$W.jy2mOXySvhmov/xsuPMu.gxGAqZJUJ8FviKu.mA5a5lNtAeUvJS', '18521138@gm.uit.edu.vn', '0364857809', 'GP01', 'QuanTri', 'Cao Trọng Nghĩa', '2021-11-10 08:15:01', '2022-01-07 14:45:03', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ves`
--

CREATE TABLE `ves` (
  `maVe` bigint(20) UNSIGNED NOT NULL,
  `taiKhoanNguoiDat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maLichChieu` bigint(20) UNSIGNED NOT NULL,
  `maGhe` int(11) NOT NULL,
  `tenGhe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `giaVe` bigint(20) NOT NULL,
  `loaiGhe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `daDat` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ves`
--

INSERT INTO `ves` (`maVe`, `taiKhoanNguoiDat`, `maLichChieu`, `maGhe`, `tenGhe`, `giaVe`, `loaiGhe`, `daDat`, `created_at`, `updated_at`) VALUES
(1, 'caotrongnghia', 4, 119, '119', 90000, 'Vip', 1, '2021-11-14 13:25:05', '2021-11-14 13:25:05'),
(2, 'caotrongnghia', 4, 120, '120', 90000, 'Vip', 1, '2021-11-14 13:29:43', '2021-11-14 13:29:43'),
(3, 'caotrongnghia', 4, 121, '121', 90000, 'Vip', 1, '2021-11-14 13:29:43', '2021-11-14 13:29:43'),
(4, 'caotrongnghia', 4, 48, '48', 75000, 'Thuong', 1, '2021-11-15 00:50:08', '2021-11-15 00:50:08'),
(5, 'caotrongnghia', 4, 107, '107', 90000, 'Vip', 1, '2021-11-15 00:50:08', '2021-11-15 00:50:08'),
(6, 'caotrongnghia', 4, 122, '122', 90000, 'Vip', 1, '2021-11-15 00:50:08', '2021-11-15 00:50:08'),
(7, 'caotrongnghia', 1, 120, '120', 90000, 'Vip', 1, '2021-11-15 02:50:12', '2021-11-15 02:50:12'),
(8, 'caotrongnghia', 1, 121, '121', 90000, 'Vip', 1, '2021-11-15 02:50:12', '2021-11-15 02:50:12');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chieu_phims`
--
ALTER TABLE `chieu_phims`
  ADD PRIMARY KEY (`maChieu`),
  ADD KEY `chieu_phims_maphim_foreign` (`maPhim`),
  ADD KEY `chieu_phims_macumrap_foreign` (`maCumRap`);

--
-- Chỉ mục cho bảng `cum_raps`
--
ALTER TABLE `cum_raps`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cum_raps_macumrap_unique` (`maCumRap`),
  ADD KEY `cum_raps_mahethongrap_foreign` (`maHeThongRap`);

--
-- Chỉ mục cho bảng `he_thong_raps`
--
ALTER TABLE `he_thong_raps`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `he_thong_raps_mahethongrap_unique` (`maHeThongRap`);

--
-- Chỉ mục cho bảng `lich_chieus`
--
ALTER TABLE `lich_chieus`
  ADD PRIMARY KEY (`maLichChieu`),
  ADD KEY `lich_chieus_machieu_foreign` (`maChieu`),
  ADD KEY `lich_chieus_marap_foreign` (`maRap`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phims`
--
ALTER TABLE `phims`
  ADD PRIMARY KEY (`maPhim`);

--
-- Chỉ mục cho bảng `raps`
--
ALTER TABLE `raps`
  ADD PRIMARY KEY (`maRap`),
  ADD KEY `raps_macumrap_foreign` (`maCumRap`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_taikhoan_unique` (`taiKhoan`);

--
-- Chỉ mục cho bảng `ves`
--
ALTER TABLE `ves`
  ADD PRIMARY KEY (`maVe`),
  ADD KEY `ves_malichchieu_foreign` (`maLichChieu`),
  ADD KEY `ves_taikhoannguoidat_foreign` (`taiKhoanNguoiDat`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chieu_phims`
--
ALTER TABLE `chieu_phims`
  MODIFY `maChieu` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `cum_raps`
--
ALTER TABLE `cum_raps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `he_thong_raps`
--
ALTER TABLE `he_thong_raps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `lich_chieus`
--
ALTER TABLE `lich_chieus`
  MODIFY `maLichChieu` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `phims`
--
ALTER TABLE `phims`
  MODIFY `maPhim` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `raps`
--
ALTER TABLE `raps`
  MODIFY `maRap` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `ves`
--
ALTER TABLE `ves`
  MODIFY `maVe` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chieu_phims`
--
ALTER TABLE `chieu_phims`
  ADD CONSTRAINT `chieu_phims_macumrap_foreign` FOREIGN KEY (`maCumRap`) REFERENCES `cum_raps` (`maCumRap`) ON DELETE CASCADE,
  ADD CONSTRAINT `chieu_phims_maphim_foreign` FOREIGN KEY (`maPhim`) REFERENCES `phims` (`maPhim`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `cum_raps`
--
ALTER TABLE `cum_raps`
  ADD CONSTRAINT `cum_raps_mahethongrap_foreign` FOREIGN KEY (`maHeThongRap`) REFERENCES `he_thong_raps` (`maHeThongRap`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `lich_chieus`
--
ALTER TABLE `lich_chieus`
  ADD CONSTRAINT `lich_chieus_machieu_foreign` FOREIGN KEY (`maChieu`) REFERENCES `chieu_phims` (`maChieu`) ON DELETE CASCADE,
  ADD CONSTRAINT `lich_chieus_marap_foreign` FOREIGN KEY (`maRap`) REFERENCES `raps` (`maRap`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `raps`
--
ALTER TABLE `raps`
  ADD CONSTRAINT `raps_macumrap_foreign` FOREIGN KEY (`maCumRap`) REFERENCES `cum_raps` (`maCumRap`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `ves`
--
ALTER TABLE `ves`
  ADD CONSTRAINT `ves_malichchieu_foreign` FOREIGN KEY (`maLichChieu`) REFERENCES `lich_chieus` (`maLichChieu`) ON DELETE CASCADE,
  ADD CONSTRAINT `ves_taikhoannguoidat_foreign` FOREIGN KEY (`taiKhoanNguoiDat`) REFERENCES `users` (`taiKhoan`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
