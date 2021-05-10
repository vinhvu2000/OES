-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2021 at 06:47 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oes_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `baikt`
--

CREATE TABLE `baikt` (
  `mabkt` char(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mamh` char(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenbkt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thoigian` int(11) NOT NULL,
  `solan` int(4) NOT NULL,
  `cachtinh` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'caonhat',
  `diemtoithieu` int(11) NOT NULL,
  `deadline` datetime NOT NULL,
  `ghichu` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `trangthai` int(11) NOT NULL DEFAULT 1,
  `maltc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `baikt`
--

INSERT INTO `baikt` (`mabkt`, `mamh`, `tenbkt`, `thoigian`, `solan`, `cachtinh`, `diemtoithieu`, `deadline`, `ghichu`, `trangthai`, `maltc`) VALUES
('COMP103_694414', 'COMP103', 'Bài Kiểm Tra Giữa Kì', 15, 3, 'caonhat', 80, '2021-04-24 03:01:00', '', 1, 'COMP103_01|COMP103_02|COMP103_03');

-- --------------------------------------------------------

--
-- Table structure for table `cauhoi`
--

CREATE TABLE `cauhoi` (
  `mach` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mabkt` char(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loaich` int(11) NOT NULL,
  `noidung` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `dapan1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dapan2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dapan3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dapan4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dapan5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dapan6` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dapan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cauhoi`
--

INSERT INTO `cauhoi` (`mach`, `mabkt`, `loaich`, `noidung`, `dapan1`, `dapan2`, `dapan3`, `dapan4`, `dapan5`, `dapan6`, `dapan`, `image`) VALUES
('QS_0526043', 'COMP103_694414', 1, 'Trong MS Word, chức năng của tổ hợp phím Ctrl + X là gì?', 'Sao chép phần văn bản bôi đen', 'Xóa phần văn bản bôi đen', 'Không có chức năng', 'Sao chép rồi xóa phần văn bản bôi đen', '', '', 'dapan4', ''),
('QS_2412629', 'COMP103_694414', 1, 'Chức năng chính của MS Word là gì?', 'Soạn thảo văn bản', 'Chỉnh sửa video', 'Tính toán', 'Quản lí điểm học sinh', 'Chỉnh sửa ảnh', 'Nghe nhạc', 'dapan1', ''),
('QS_4583707', 'COMP103_694414', 1, 'Ý nghĩa của tổ hợp phím ALT + F4 là gì?', 'Đóng file hoặc thư mục đang mở', 'Tạo ra một thư mục mới', 'Xóa thư mục đang chọn', 'Gọi trình quản lí tác vụ', 'Truy cập hệ thống bí mật của máy tính', 'Diệt virus', 'dapan1', ''),
('QS_5851768', 'COMP103_694414', 1, 'Trong MS Word, chức năng của phím tắt Ctrl + S là gì', 'Vẽ hình siêu nhân siêu to khổng lồ', 'Tạo ra 1 con robot biết nói tiếng Việt', 'Lưu file đang mở', 'Reset máy tính', '', '', 'dapan4', ''),
('QS_6240564', 'COMP103_694414', 1, 'Phần mềm nào KHÔNG được phát triển bởi Microsoft?', 'Excel', 'Powerpoint', 'Word', 'Access', 'Zalo', '', 'dapan5', ''),
('QS_7628845', 'COMP103_694414', 1, 'Bạn An cần 1 phần mềm soạn thảo văn bản để viết đơn xin nghỉ học. Bạn An cần cài phần mềm nào sau đây? (Chọn 2)', 'MS Word', 'MS Excel', 'MS PowerPoint', 'MS Access', 'Unikey', 'Notepad++', 'dapan1|dapan5', ''),
('QS_8166289', 'COMP103_694414', 2, 'Trong MS Excel, hàm nào được sử dụng để tính tổng?', '', '', '', '', '', '', 'sum', '');

-- --------------------------------------------------------

--
-- Table structure for table `dangki`
--

CREATE TABLE `dangki` (
  `maltc` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `masv` char(9) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dangki`
--

INSERT INTO `dangki` (`maltc`, `masv`) VALUES
('COMP103_01', '685105079'),
('COMP103_01', '685105001'),
('COMP103_01', '685105003'),
('COMP103_01', '685105004'),
('COMP103_01', '685105005'),
('COMP103_01', '685105007'),
('COMP103_01', '685105008'),
('COMP103_01', '685105009'),
('COMP103_01', '685105010'),
('COMP103_01', '685105011'),
('COMP103_01', '685105015'),
('COMP103_01', '685105016'),
('COMP103_01', '685105012'),
('COMP103_01', '685105013'),
('COMP103_01', '685105014'),
('COMP103_01', '685105017'),
('COMP103_01', '685105018'),
('COMP103_01', '685105019'),
('COMP103_02', '685105020'),
('COMP103_02', '685105021'),
('COMP103_02', '685105022'),
('COMP103_02', '685105023'),
('COMP103_02', '685105024'),
('COMP103_02', '685105026'),
('COMP103_02', '685105027'),
('COMP103_02', '685105028'),
('COMP103_02', '685105029'),
('COMP103_02', '685105030'),
('COMP103_02', '685105031'),
('COMP103_02', '685105033'),
('COMP103_02', '685105035'),
('COMP103_02', '685105036'),
('COMP103_02', '685105038'),
('COMP103_02', '685105039'),
('COMP103_02', '685105040'),
('COMP103_02', '685105189'),
('COMP103_02', '685105178'),
('COMP103_02', '685105167'),
('COMP103_03', '685105156'),
('COMP103_03', '685105155'),
('COMP103_03', '685105145'),
('COMP103_03', '685105142'),
('COMP103_03', '685105134'),
('COMP103_03', '685105129'),
('COMP103_03', '685105123'),
('COMP103_03', '685105116'),
('COMP103_03', '685105081'),
('COMP103_03', '685105080'),
('COMP103_03', '685105078'),
('COMP103_03', '685105077'),
('COMP103_03', '685105075'),
('COMP103_03', '685105074'),
('COMP103_03', '685105073'),
('COMP103_03', '685105071'),
('COMP103_03', '685105070'),
('COMP103_03', '685105069'),
('COMP124_02', '685105116'),
('COMP124_02', '685105123'),
('COMP124_02', '685105129'),
('COMP124_02', '685105134'),
('COMP124_02', '685105142'),
('COMP124_02', '685105145'),
('COMP124_02', '685105155'),
('COMP124_02', '685105156'),
('COMP124_02', '685105167'),
('COMP124_02', '685105178'),
('COMP124_02', '685105189'),
('COMP124_02', '685105069'),
('COMP124_02', '685105070'),
('COMP124_02', '685105071'),
('COMP124_02', '685105073'),
('COMP124_02', '685105074'),
('COMP124_02', '685105075'),
('COMP124_02', '685105077'),
('COMP124_02', '685105078'),
('COMP124_02', '685105079'),
('COMP316_03', '685105011'),
('COMP316_03', '685105012'),
('COMP316_03', '685105013'),
('COMP316_03', '685105014'),
('COMP316_03', '685105015'),
('COMP316_03', '685105016'),
('COMP316_03', '685105017'),
('COMP316_03', '685105018'),
('COMP316_03', '685105019'),
('COMP316_03', '685105020'),
('COMP316_03', '685105021'),
('COMP316_03', '685105022'),
('COMP316_03', '685105023'),
('COMP316_03', '685105024'),
('COMP316_03', '685105026'),
('COMP316_03', '685105027'),
('COMP316_03', '685105028'),
('COMP316_03', '685105029'),
('COMP316_03', '685105030'),
('COMP316_03', '685105079');

-- --------------------------------------------------------

--
-- Table structure for table `diem`
--

CREATE TABLE `diem` (
  `masv` char(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mabkt` char(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diem` int(11) NOT NULL,
  `trangthai` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thoigian` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diem`
--

INSERT INTO `diem` (`masv`, `mabkt`, `diem`, `trangthai`, `thoigian`) VALUES
('685105079', 'COMP103_694414', 71, '0', '2021-04-17 11:03:20'),
('685105001', 'COMP103_694414', 100, 'PASS', '2021-04-16 13:39:42'),
('685105078', 'COMP103_694414', 100, 'PASS', '2021-04-16 13:38:42'),
('685105079', 'COMP103_694414', 92, 'PASS', '2021-04-16 13:20:20'),
('685105001', 'COMP103_694414', 92, 'PASS', '2021-04-16 13:25:20'),
('685105003', 'COMP103_694414', 92, 'PASS', '2021-04-16 13:20:21'),
('685105004', 'COMP103_694414', 88, 'PASS', '2021-04-16 13:25:21'),
('685105005', 'COMP103_694414', 92, 'PASS', '2021-04-16 13:20:22'),
('685105007', 'COMP103_694414', 92, 'PASS', '2021-04-16 13:25:22'),
('685105008', 'COMP103_694414', 98, 'PASS', '2021-04-16 13:20:23'),
('685105009', 'COMP103_694414', 92, 'PASS', '2021-04-16 13:25:23'),
('685105010', 'COMP103_694414', 90, 'PASS', '2021-04-16 13:20:24'),
('685105011', 'COMP103_694414', 92, 'PASS', '2021-04-16 13:25:24'),
('685105015', 'COMP103_694414', 92, 'PASS', '2021-04-16 13:20:25'),
('685105016', 'COMP103_694414', 84, 'PASS', '2021-04-16 13:25:25'),
('685105012', 'COMP103_694414', 92, 'PASS', '2021-04-16 13:20:26'),
('685105013', 'COMP103_694414', 92, 'PASS', '2021-04-16 13:25:26'),
('685105014', 'COMP103_694414', 92, 'PASS', '2021-04-16 13:20:27'),
('685105017', 'COMP103_694414', 78, 'FAIL', '2021-04-16 13:25:27'),
('685105018', 'COMP103_694414', 92, 'PASS', '2021-04-16 13:20:28'),
('685105019', 'COMP103_694414', 92, 'PASS', '2021-04-16 13:25:28'),
('685105020', 'COMP103_694414', 92, 'PASS', '2021-04-16 13:20:29'),
('685105021', 'COMP103_694414', 92, 'PASS', '2021-04-16 13:25:29'),
('685105022', 'COMP103_694414', 60, 'FAIL', '2021-04-16 13:20:30'),
('685105023', 'COMP103_694414', 92, 'PASS', '2021-04-16 13:25:30'),
('685105024', 'COMP103_694414', 92, 'PASS', '2021-04-16 13:20:31'),
('685105026', 'COMP103_694414', 92, 'PASS', '2021-04-16 13:25:31'),
('685105027', 'COMP103_694414', 92, 'PASS', '2021-04-16 13:20:32'),
('685105028', 'COMP103_694414', 88, 'PASS', '2021-04-16 13:25:32'),
('685105029', 'COMP103_694414', 92, 'PASS', '2021-04-16 13:20:33'),
('685105030', 'COMP103_694414', 92, 'PASS', '2021-04-16 13:25:33'),
('685105031', 'COMP103_694414', 98, 'PASS', '2021-04-16 13:20:34'),
('685105033', 'COMP103_694414', 86, 'PASS', '2021-04-16 13:25:34'),
('685105035', 'COMP103_694414', 92, 'PASS', '2021-04-16 13:20:35'),
('685105036', 'COMP103_694414', 92, 'PASS', '2021-04-16 13:25:35'),
('685105038', 'COMP103_694414', 92, 'PASS', '2021-04-16 13:20:36'),
('685105039', 'COMP103_694414', 92, 'PASS', '2021-04-16 13:25:36'),
('685105040', 'COMP103_694414', 55, 'FAIL', '2021-04-16 13:20:37'),
('685105189', 'COMP103_694414', 92, 'PASS', '2021-04-16 13:25:37'),
('685105178', 'COMP103_694414', 92, 'PASS', '2021-04-16 13:20:38'),
('685105167', 'COMP103_694414', 92, 'PASS', '2021-04-16 13:25:38'),
('685105156', 'COMP103_694414', 92, 'PASS', '2021-04-16 13:20:39'),
('685105155', 'COMP103_694414', 92, 'PASS', '2021-04-16 13:25:39'),
('685105145', 'COMP103_694414', 92, 'PASS', '2021-04-16 13:20:40'),
('685105142', 'COMP103_694414', 92, 'PASS', '2021-04-16 13:25:40'),
('685105134', 'COMP103_694414', 55, 'FAIL', '2021-04-16 13:20:41'),
('685105129', 'COMP103_694414', 84, 'PASS', '2021-04-16 13:25:41'),
('685105123', 'COMP103_694414', 92, 'PASS', '2021-04-16 13:20:42'),
('685105116', 'COMP103_694414', 92, 'PASS', '2021-04-16 13:25:42'),
('685105081', 'COMP103_694414', 84, 'PASS', '2021-04-16 13:20:43'),
('685105080', 'COMP103_694414', 92, 'PASS', '2021-04-16 13:25:43'),
('685105078', 'COMP103_694414', 92, 'PASS', '2021-04-16 13:20:44'),
('685105077', 'COMP103_694414', 92, 'PASS', '2021-04-16 13:25:44'),
('685105075', 'COMP103_694414', 92, 'PASS', '2021-04-16 13:20:45'),
('685105074', 'COMP103_694414', 77, 'FAIL', '2021-04-16 13:25:45'),
('685105073', 'COMP103_694414', 92, 'PASS', '2021-04-16 13:20:46'),
('685105071', 'COMP103_694414', 92, 'PASS', '2021-04-16 13:25:46'),
('685105070', 'COMP103_694414', 92, 'PASS', '2021-04-16 13:20:47'),
('685105069', 'COMP103_694414', 92, 'PASS', '2021-04-16 13:25:47');

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE `khoa` (
  `makhoa` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenkhoa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trangthai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khoa`
--

INSERT INTO `khoa` (`makhoa`, `tenkhoa`, `trangthai`) VALUES
('CNTT', 'Công nghệ thông tin', 1),
('SPHH', 'Sư phạm hóa học', 1),
('SPTH', 'Sư phạm toán', 1),
('SPVL', 'Sư phạm vật lý', 1);

-- --------------------------------------------------------

--
-- Table structure for table `loptinchi`
--

CREATE TABLE `loptinchi` (
  `maltc` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mamh` char(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lichhoc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trangthai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loptinchi`
--

INSERT INTO `loptinchi` (`maltc`, `mamh`, `lichhoc`, `trangthai`) VALUES
('COMP103_01', 'COMP103', 'Thứ 2(1-2)', 1),
('COMP103_02', 'COMP103', 'Thứ 3(1-2)', 1),
('COMP103_03', 'COMP103', 'Thứ 2(3-4)', 1),
('COMP124_01', 'COMP124', 'Thứ 2(1-2)', 1),
('COMP124_02', 'COMP124', 'Thứ 2(6-7)', 1),
('COMP124_03', 'COMP124', 'Thứ 5(1-2)', 1),
('COMP225_01', 'COMP225', 'Thứ 2(9-10)', 1),
('COMP225_02', 'COMP225', 'Thứ 4(9-10)', 1),
('COMP225_03', 'COMP225', 'Thứ 4(1-2)', 1),
('COMP311_01', 'COMP311', 'Thứ 5(9-10)', 1),
('COMP311_02', 'COMP311', 'Thứ 3(4-5)', 1),
('COMP311_03', 'COMP311', 'Thứ 6(4-5)', 1),
('COMP316_01', 'COMP316', 'Thứ 4(6-8)', 1),
('COMP316_02', 'COMP316', 'Thứ 5(6-8)', 1),
('COMP316_03', 'COMP316', 'Thứ 6(1-3)', 1);

-- --------------------------------------------------------

--
-- Table structure for table `monhoc`
--

CREATE TABLE `monhoc` (
  `mamh` char(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenmh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trangthai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monhoc`
--

INSERT INTO `monhoc` (`mamh`, `tenmh`, `trangthai`) VALUES
('COMP103', 'Tin học đại cương', 1),
('COMP124', 'Lập trình C/C++', 1),
('COMP225', 'Nhập môn KHMT', 1),
('COMP311', 'Lập trình Java', 1),
('COMP316', 'Lập trình .NET', 1);

-- --------------------------------------------------------

--
-- Table structure for table `phanhoi`
--

CREATE TABLE `phanhoi` (
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phanhoi`
--

INSERT INTO `phanhoi` (`code`, `noidung`) VALUES
('0001', 'Tên tài khoản hoặc mật khẩu không chính xác'),
('0002', 'Tài khoản của bạn chưa được kích hoạt.'),
('0003', 'Chặn truy cập. Bạn không phải là admin'),
('0004', 'Bạn cần phải đăng nhập trước'),
('0005', 'Đổi mật khẩu thành công'),
('0006', 'Đổi mật khẩu không thành công'),
('0007', 'Kích hoạt thành công'),
('0008', 'Kích hoạt thất bại'),
('0009', 'Hủy kích hoạt thành công'),
('0010', 'Hủy kích hoạt thất bại'),
('0011', 'Mã khoa đã tồn tại'),
('0012', 'Tên khoa đã tồn tại'),
('0013', 'Thêm khoa thành công'),
('0014', 'Thêm khoa thất bại'),
('0015', 'Xóa khoa thành công'),
('0016', 'Xóa khoa thất bại'),
('0017', 'Mã lớp tín chỉ đã tồn tại'),
('0018', 'Thêm lớp tín chi thành công'),
('0019', 'Thêm lớp tín chỉ thất bại'),
('0020', 'Xóa lớp tín chỉ thành công'),
('0021', 'Xóa lớp tín chỉ thất bại'),
('0022', 'Xóa môn học thành công'),
('0023', 'Xóa môn học thất bại'),
('0024', 'Mã môn học đã tồn tại'),
('0025', 'Thêm môn học thành công'),
('0026', 'Thêm môn học thất bại'),
('0027', 'Cập nhật thông tin sinh viên thành công'),
('0028', 'Cập nhật thông tin sinh viên thất bại'),
('0029', 'Email này đã được sử dụng'),
('0030', 'Số điện thoại này đã được sử dụng'),
('0031', 'Cập nhật thông tin sinh viên thành công'),
('0032', 'Cập nhật thông tin sinh viên thất bại'),
('0033', 'Mã sinh viên đã tồn tại'),
('0034', 'Thêm sinh viên thành công'),
('0035', 'Thêm sinh viên thất bại'),
('0036', 'Xóa sinh viên thành công'),
('0037', 'Xóa sinh viên thất bại'),
('0038', 'Phải có ít nhất 1 lớp làm bài kiểm tra'),
('0039', 'Một môn học không thể có 2 bài kiểm tra tên giống nhau'),
('0040', 'Thêm bài kiểm tra thành công'),
('0041', 'Thêm bài kiểm tra thất bại'),
('0042', 'Kích hoạt bài kiểm tra thành công'),
('0043', 'Kích hoạt bài kiểm tra thất bại'),
('0044', 'Hủy kích hoạt bài kiểm tra thành công'),
('0045', 'Hủy kích hoạt bài kiểm tra thất bại'),
('0046', 'Cập nhật bài kiểm tra thành công'),
('0047', 'Cập nhật bài kiểm tra thất bại'),
('0048', 'Bạn chưa chọn đáp án đúng'),
('0049', 'Phải có ít nhất 1 đáp án'),
('0050', 'Đáp án đúng rỗng'),
('0051', 'Thêm câu hỏi thành công'),
('0052', 'Thêm câu hỏi thất bại'),
('0053', 'Xóa câu hỏi thành công'),
('0054', 'Xóa câu hỏi thất bại'),
('0055', 'Cập nhật câu hỏi thành công'),
('0056', 'Cập nhật câu hỏi thất bại'),
('0057', 'Xóa bài kiểm tra thành công'),
('0058', 'Xóa bài kiểm tra thất bại'),
('0059', 'Xóa thông báo thành công'),
('0060', 'Xóa thông báo thất bại'),
('0061', 'Thêm thông báo thành công'),
('0062', 'Thêm thông báo thất bại'),
('0063', 'Cập nhật thông báo thành công'),
('0064', 'Cập nhật thông báo thất bại'),
('0065', 'Mã xác nhận đã được gửi đến email của bạn'),
('0066', 'Gửi mã xác nhận thât bại'),
('0067', 'Mã xác nhận không chính xác'),
('0068', 'Chặn truy cập. Bạn không phải sinh viên'),
('0069', 'Sinh viên này đã ở trong 1 lớp khác'),
('0070', 'Thêm sinh viên vào lớp thành công'),
('0071', 'Thêm sinh viên vào lớp thất bại'),
('0072', 'Xóa sinh viên khỏi lớp thành công'),
('0073', 'Xóa sinh viên khỏi lớp thất bại');

-- --------------------------------------------------------

--
-- Table structure for table `sinhvien`
--

CREATE TABLE `sinhvien` (
  `masv` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotendem` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioitinh` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `makhoa` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sinhvien`
--

INSERT INTO `sinhvien` (`masv`, `hotendem`, `ten`, `gioitinh`, `ngaysinh`, `email`, `sdt`, `makhoa`, `diachi`, `avatar`) VALUES
('685105001', 'Lê Huy Quang ', 'Anh', 'Nam', '2000-04-15', 'lehuyquanganh@gmail.com', '0912297127', 'CNTT', 'Ngọc Hà', NULL),
('685105003', 'Lê Thái ', 'Anh', 'Nam', '2000-12-26', 'lethaianh@gmail.com', '0913296129', 'CNTT', 'Đội Cấn', NULL),
('685105004', 'Mai Thiên Quang ', 'Anh', 'Nam', '2000-11-18', 'maithienquanganh@gmail.com', '0914295131', 'CNTT', 'Ngọc Khánh', NULL),
('685105005', 'Nguyễn Hoàng ', 'Anh', 'Nam', '2000-01-02', 'nguyenhoanganh@gmail.com', '0915294133', 'CNTT', 'Kim Mã', NULL),
('685105007', 'Lại Xuân ', 'Diễn', 'Nam', '2000-08-26', 'laixuandien@gmail.com', '0916293135', 'CNTT', 'Giảng Võ', NULL),
('685105008', 'Vũ Tiến ', 'Dũng', 'Nam', '2000-08-28', 'vutiendung@gmail.com', '0918291139', 'CNTT', 'Cống Vị', NULL),
('685105009', 'Nguyễn Đức ', 'Duy', 'Nam', '2000-09-22', 'nguyenducduy@gmail.com', '0917292137', 'CNTT', 'Thành Công', NULL),
('685105010', 'Mai Thái ', 'Dương', 'Nam', '2000-05-10', 'maithaiduong@gmail.com', '0919290141', 'CNTT', 'Liễu Giai', NULL),
('685105011', 'Vũ Thái ', 'Dương', 'Nam', '2000-04-16', 'vuthaiduong@gmail.com', '0920289143', 'CNTT', 'Vĩnh Phúc', NULL),
('685105012', 'Đinh Quang ', 'Đạo', 'Nam', '1999-12-20', 'dinhquangdao@gmail.com', '0921288145', 'CNTT', 'Điện Biên', NULL),
('685105013', 'Trần Tiến ', 'Đạt', 'Nam', '2000-06-05', 'trantiendat@gmail.com', '0922287147', 'CNTT', 'Trúc Bạch', NULL),
('685105014', 'Nguyễn Minh ', 'Giang', 'Nam', '2000-09-09', 'nguyenminhgiang@gmail.com', '0923286149', 'CNTT', 'Quán Thánh', NULL),
('685105015', 'Trần Thị Thu ', 'Hà', 'Nữ', '2000-02-06', 'tranthithuha@gmail.com', '0925284153', 'CNTT', 'Cửa Nam', NULL),
('685105016', 'Nguyễn Xuân ', 'Hải', 'Nam', '2000-11-03', 'nguyenxuanhai@gmail.com', '0926283155', 'CNTT', 'Chương Dương', NULL),
('685105017', 'Lê Văn ', 'Hanh', 'Nam', '2000-03-01', 'levanhanh@gmail.com', '0924285151', 'CNTT', 'Đồng Xuân', NULL),
('685105018', 'Trần Thị ', 'Hạnh', 'Nữ', '2000-03-06', 'tranthihanh@gmail.com', '0927282157', 'CNTT', 'Phúc Tân', NULL),
('685105019', 'Nguyễn Thị ', 'Hằng', 'Nữ', '2000-02-20', 'nguyenthihang@gmail.com', '0928281159', 'CNTT', 'Hàng Buồm ', NULL),
('685105020', 'Hoàng Văn ', 'Hiện', 'Nam', '2000-09-13', 'hoangvanhien@gmail.com', '0934275171', 'CNTT', 'Hàng Bông', NULL),
('685105021', 'Nguyễn Khắc ', 'Hiệp', 'Nam', '2000-08-21', 'nguyenkhachiep@gmail.com', '0935274173', 'CNTT', 'Cửa Đông', NULL),
('685105022', 'Mai Văn ', 'Hiểu', 'Nam', '1999-05-01', 'maivanhieu@gmail.com', '0933276169', 'CNTT', 'Cầu Giấy', NULL),
('685105023', 'Hoàng Trọng ', 'Hiếu', 'Nam', '2000-06-21', 'hoangtronghieu@gmail.com', '0929280161', 'CNTT', 'Trần Hưng Đạo', NULL),
('685105024', 'Ngô Minh ', 'Hiếu', 'Nam', '2000-09-22', 'ngominhhieu@gmail.com', '0930279163', 'CNTT', 'Tràng Tiền', NULL),
('685105026', 'Nguyễn Trung ', 'Hiếu', 'Nam', '1996-09-29', 'nguyentrunghieu@gmail.com', '0931278165', 'CNTT', 'Lý Thái Tổ', NULL),
('685105027', 'Trịnh Trung ', 'Hiếu', 'Nam', '2000-07-29', 'trinhtrunghieu@gmail.com', '0932277167', 'CNTT', 'Hàng Trống', NULL),
('685105028', 'Nguyễn Công ', 'Hoàng', 'Nam', '1999-06-13', 'nguyenconghoang@gmail.com', '0936273175', 'CNTT', 'Hàng Bài', NULL),
('685105029', 'Đỗ Huy ', 'Hùng', 'Nam', '2000-02-20', 'dohuyhung@gmail.com', '0938271179', 'CNTT', 'Hàng Bồ', NULL),
('685105030', 'Nguyễn Công ', 'Hùng', 'Nam', '2000-09-04', 'nguyenconghung@gmail.com', '0939270181', 'CNTT', 'Phan Chu Trinh', NULL),
('685105031', 'Phạm Quang ', 'Huy', 'Nam', '2000-12-14', 'phamquanghuy@gmail.com', '0937272177', 'CNTT', 'Hàng Gai', NULL),
('685105033', 'Lê Nguyên ', 'Hưng', 'Nam', '2000-09-26', 'lenguyenhung@gmail.com', '0940269183', 'CNTT', 'Hàng Bạc', NULL),
('685105035', 'Vũ Ngọc ', 'Lan', 'Nữ', '2000-11-01', 'vungoclan@gmail.com', '0941268185', 'CNTT', 'Hàng Đào', NULL),
('685105036', 'Vũ Thị Thúy ', 'Lan', 'Nữ', '2000-11-27', 'vuthithuylan@gmail.com', '0942267187', 'CNTT', 'Ngọc Thụy', NULL),
('685105038', 'Đinh Hải ', 'Long', 'Nam', '2000-01-20', 'dinhhailong@gmail.com', '0943266189', 'CNTT', 'Bồ Đề', NULL),
('685105039', 'Bùi Thị Ngọc ', 'Minh', 'Nữ', '2000-10-11', 'buithingocminh@gmail.com', '0944265191', 'CNTT', 'Đức Giang', NULL),
('685105040', 'Phạm Phương ', 'Minh', 'Nữ', '2000-01-16', 'phamphuongminh@gmail.com', '0945264193', 'CNTT', 'Thượng Thanh', NULL),
('685105042', 'Dương Thị Thanh ', 'Nga', 'Nữ', '2000-04-15', 'duongthithanhnga@gmail.com', '0946263195', 'CNTT', 'Ngọc Lâm', NULL),
('685105043', 'Lê Thị ', 'Nga', 'Nữ', '2000-07-09', 'lethinga@gmail.com', '0947262197', 'CNTT', 'Sài Đồng', NULL),
('685105044', 'Nguyễn Thị Kim ', 'Ngân', 'Nữ', '2000-12-16', 'nguyenthikimngan@gmail.com', '0948261199', 'CNTT', 'Thạch Bàn', NULL),
('685105069', 'Hoàng Thị Thu ', 'Trang', 'Nữ', '1999-06-13', 'hoangthithutrang@gmail.com', '0924229741', 'SPVL', 'Hàng Bài', NULL),
('685105070', 'Phạm Thị ', 'Trang', 'Nữ', '2000-12-14', 'phamthitrang@gmail.com', '0924239642', 'SPVL', 'Hàng Gai', NULL),
('685105071', 'Trần Thu ', 'Trang', 'Nữ', '2000-02-20', 'tranthutrang@gmail.com', '0924249543', 'SPVL', 'Hàng Bồ', NULL),
('685105073', 'Lưu Anh ', 'Tú', 'Nữ', '2000-09-26', 'luuanhtu@gmail.com', '0924269345', 'SPVL', 'Hàng Bạc', NULL),
('685105074', 'Nguyễn Minh ', 'Tuấn', 'Nam', '2000-09-04', 'nguyenminhtuan@gmail.com', '0924259444', 'SPVL', 'Phan Chu Trinh', NULL),
('685105075', 'Nguyễn Việt ', 'Tùng', 'Nam', '2000-11-01', 'nguyenviettung@gmail.com', '0924279246', 'SPVL', 'Hàng Đào', NULL),
('685105077', 'Trần Hà ', 'Vi', 'Nữ', '2000-11-27', 'tranhavi@gmail.com', '0924289147', 'SPVL', 'Ngọc Thụy', NULL),
('685105078', 'Trịnh Hoàng ', 'Việt', 'Nam', '2000-01-20', 'trinhhoangviet@gmail.com', '0924299048', 'SPVL', 'Bồ Đề', NULL),
('685105079', 'Vũ Thành ', 'Vinh', 'Nam', '2000-11-05', 'vinhvu5112000@gmail.com', '0947664673', 'SPVL', 'Đức Giang', NULL),
('685105080', 'Trần Thị ', 'Xuân', 'Nữ', '2000-01-16', 'tranthixuan@gmail.com', '0924318850', 'SPVL', 'Thượng Thanh', NULL),
('685105081', 'Dương Thị ', 'Yến', 'Nữ', '2000-04-15', 'duongthiyen@gmail.com', '0924328751', 'SPVL', 'Ngọc Lâm', NULL),
('685105116', 'Nguyễn Tiến ', 'Thăng', 'Nam', '2000-05-10', 'nguyentienthang@gmail.com', '0924190137', 'SPTH', 'Liễu Giai', NULL),
('685105123', 'Nguyễn Thị Thanh ', 'Ngân', 'Nữ', '2000-04-15', 'nguyenthithanhngan@gmail.com', '0924120830', 'SPTH', 'Ngọc Hà', NULL),
('685105129', 'Nguyễn Đình ', 'Thắng', 'Nam', '2000-04-16', 'nguyendinhthang@gmail.com', '0924200038', 'SPTH', 'Vĩnh Phúc', NULL),
('685105134', 'Lê Thị ', 'Ngọc', 'Nữ', '2000-12-26', 'lethingoc@gmail.com', '0924130731', 'SPTH', 'Đội Cấn', NULL),
('685105142', 'Hồ Văn ', 'Thìn', 'Nam', '1999-12-20', 'hovanthin@gmail.com', '0924209939', 'SPTH', 'Điện Biên', NULL),
('685105145', 'Trần Quý ', 'Phái', 'Nam', '2000-11-18', 'tranquyphai@gmail.com', '0924140632', 'SPTH', 'Ngọc Khánh', NULL),
('685105155', 'Nhữ Duy ', 'Thìn', 'Nam', '2000-09-09', 'nhuduythin@gmail.com', '0924219840', 'SPTH', 'Trúc Bạch', NULL),
('685105156', 'Nguyễn Hải ', 'Phong', 'Nam', '2000-01-02', 'nguyenhaiphong@gmail.com', '0924150533', 'SPTH', 'Kim Mã', NULL),
('685105167', 'Nguyễn Minh ', 'Phương', 'Nữ', '2000-08-26', 'nguyenminhphuong@gmail.com', '0924160434', 'SPTH', 'Giảng Võ', NULL),
('685105178', 'Lê Tuấn ', 'Thành', 'Nam', '2000-09-22', 'letuanthanh@gmail.com', '0924170335', 'SPTH', 'Thành Công', NULL),
('685105189', 'Vũ Công ', 'Thành', 'Nam', '2000-08-28', 'vucongthanh@gmail.com', '0924180236', 'SPTH', 'Cống Vị', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `username` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vaitro` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'student',
  `trangthai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`username`, `password`, `vaitro`, `trangthai`) VALUES
('685105001', '077ab6b93f77eac620c0881c9143a2bb', 'student', 1),
('685105003', 'e34d29116a3e329936ddb12ea7ea62f3', 'student', 1),
('685105004', 'be59843af12c041f4739851eb3f6c7f6', 'student', 1),
('685105005', 'bfd2365e4cc3b2f0de1aa1f8ccada8fc', 'student', 1),
('685105007', 'b59d25f1878f147f1257785073c57eeb', 'student', 1),
('685105008', '2b80bfd64187feeb87f897ee6181fb27', 'student', 1),
('685105009', '055544854155b7024838ca93508fb7ac', 'student', 1),
('685105010', '5b08d5a33d89be7e127dde0d9b6086c8', 'student', 1),
('685105011', 'b66ee2d0e1232201b57c4b5e1228cca8', 'student', 1),
('685105012', '07f08d567b481449c6a93efa0a6ed99f', 'student', 1),
('685105013', 'c2ddf60fc1068cdf4332465a97faca11', 'student', 1),
('685105014', 'b84d4b47898b4f546d5148c7b2053476', 'student', 1),
('685105015', '9d155ec5ad13dc326ca85f1c14c42892', 'student', 1),
('685105016', '4b2b072fe2f2854b6b956807efad73fd', 'student', 1),
('685105017', '2e31f42a0cda5ecb407d7f5d4d0a1367', 'student', 1),
('685105018', '7a70b83f80d5120a0a0c94117c5c7b0e', 'student', 1),
('685105019', '642a6d080b47847341ce101b0fe754a1', 'student', 1),
('685105020', '7d947793865b6b5cb14be64c10083903', 'student', 1),
('685105021', '332ea5abd867bb62653f1d9775c63b24', 'student', 1),
('685105022', 'daebe48c9eb910b7e55b2009fcad26fe', 'student', 1),
('685105023', '6b840a4d9c722a9dd5442980134148af', 'student', 1),
('685105024', '055544854155b7024838ca93508fb7ac', 'student', 1),
('685105026', '5fb9698a2fe97d5862f858006a672d51', 'student', 1),
('685105027', '0b7e5fd8fec746c36e07dd04687b106b', 'student', 1),
('685105028', 'dec3dd63bd4cb60e008ec043eca90da0', 'student', 1),
('685105029', '642a6d080b47847341ce101b0fe754a1', 'student', 1),
('685105030', '557c16e0d952db6fdde410c91743d840', 'student', 1),
('685105031', '748400e8f0a7de5631e6fdabf2752192', 'student', 1),
('685105033', '321ab5cb96a222361ed78adb8825c0a5', 'student', 1),
('685105035', '6bf1d222a4dfa97e16f71b76ddeb4cd2', 'student', 1),
('685105036', '65f8fa30fda8e4db735b6179ca14e8ea', 'student', 1),
('685105038', '70af7628e51043127f0b9f410b41b0fa', 'student', 1),
('685105039', '84f19a4544d1efbaab5ff56663d4f0b9', 'student', 1),
('685105040', 'b4d7e0a8d6dd34f3a085f26a756bee08', 'student', 1),
('685105042', '077ab6b93f77eac620c0881c9143a2bb', 'student', 1),
('685105043', '245d0997314521ef863ae4f7410b1041', 'student', 1),
('685105044', '74121a39466fc1c3a2ea6d726b9bd3b9', 'student', 1),
('685105069', 'dec3dd63bd4cb60e008ec043eca90da0', 'student', 1),
('685105070', '748400e8f0a7de5631e6fdabf2752192', 'student', 1),
('685105071', '642a6d080b47847341ce101b0fe754a1', 'student', 1),
('685105073', '321ab5cb96a222361ed78adb8825c0a5', 'student', 1),
('685105074', '557c16e0d952db6fdde410c91743d840', 'student', 1),
('685105075', '6bf1d222a4dfa97e16f71b76ddeb4cd2', 'student', 1),
('685105077', '65f8fa30fda8e4db735b6179ca14e8ea', 'student', 1),
('685105078', '70af7628e51043127f0b9f410b41b0fa', 'student', 1),
('685105079', '35fd3474b8552ce9aa577d2f20a0ffc3', 'student', 1),
('685105080', 'b4d7e0a8d6dd34f3a085f26a756bee08', 'student', 1),
('685105081', '077ab6b93f77eac620c0881c9143a2bb', 'student', 1),
('685105116', '5b08d5a33d89be7e127dde0d9b6086c8', 'student', 1),
('685105123', '077ab6b93f77eac620c0881c9143a2bb', 'student', 1),
('685105129', 'b66ee2d0e1232201b57c4b5e1228cca8', 'student', 1),
('685105134', 'e34d29116a3e329936ddb12ea7ea62f3', 'student', 1),
('685105142', '07f08d567b481449c6a93efa0a6ed99f', 'student', 1),
('685105145', 'be59843af12c041f4739851eb3f6c7f6', 'student', 1),
('685105155', 'b84d4b47898b4f546d5148c7b2053476', 'student', 1),
('685105156', 'bfd2365e4cc3b2f0de1aa1f8ccada8fc', 'student', 1),
('685105167', 'b59d25f1878f147f1257785073c57eeb', 'student', 1),
('685105178', '055544854155b7024838ca93508fb7ac', 'student', 1),
('685105189', '2b80bfd64187feeb87f897ee6181fb27', 'student', 1),
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `thongbao`
--

CREATE TABLE `thongbao` (
  `matb` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mamh` char(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tieude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaydang` datetime NOT NULL,
  `capnhat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thongbao`
--

INSERT INTO `thongbao` (`matb`, `mamh`, `tieude`, `noidung`, `ngaydang`, `capnhat`) VALUES
('NT_0801135', 'COMP103', 'Thông báo lịch học môn Tin học đại cương', 'Tuần học (10-16/4) các em được nghỉ, tuần sau học bù', '2021-04-15 01:27:47', '2021-04-15 01:27:47'),
('NT_4451149', 'COMP225', 'Thông báo lịch học Môn Nhập môn KHMT', 'Tuần học (10-16/4) các em được nghỉ, tuần sau học bù', '2021-04-15 01:26:35', '2021-04-15 01:52:43'),
('NT_5188141', 'COMP103', '1', '1', '2021-04-15 03:23:56', '2021-04-15 03:23:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baikt`
--
ALTER TABLE `baikt`
  ADD PRIMARY KEY (`mabkt`),
  ADD KEY `mamh` (`mamh`);

--
-- Indexes for table `cauhoi`
--
ALTER TABLE `cauhoi`
  ADD PRIMARY KEY (`mach`),
  ADD KEY `Mabkt` (`mabkt`);

--
-- Indexes for table `dangki`
--
ALTER TABLE `dangki`
  ADD KEY `dangki_fk1` (`maltc`),
  ADD KEY `dangki_fk3` (`masv`);

--
-- Indexes for table `diem`
--
ALTER TABLE `diem`
  ADD KEY `Masv` (`masv`),
  ADD KEY `Mabkt` (`mabkt`);

--
-- Indexes for table `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`makhoa`);

--
-- Indexes for table `loptinchi`
--
ALTER TABLE `loptinchi`
  ADD PRIMARY KEY (`maltc`),
  ADD KEY `Mamh` (`mamh`);

--
-- Indexes for table `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`mamh`);

--
-- Indexes for table `phanhoi`
--
ALTER TABLE `phanhoi`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`masv`),
  ADD KEY `Makhoa` (`makhoa`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `thongbao`
--
ALTER TABLE `thongbao`
  ADD PRIMARY KEY (`matb`),
  ADD KEY `mamh` (`mamh`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `baikt`
--
ALTER TABLE `baikt`
  ADD CONSTRAINT `baikt_ibfk_1` FOREIGN KEY (`mamh`) REFERENCES `monhoc` (`Mamh`);

--
-- Constraints for table `cauhoi`
--
ALTER TABLE `cauhoi`
  ADD CONSTRAINT `cauhoi_fk1` FOREIGN KEY (`mabkt`) REFERENCES `baikt` (`mabkt`);

--
-- Constraints for table `dangki`
--
ALTER TABLE `dangki`
  ADD CONSTRAINT `dangki_fk1` FOREIGN KEY (`maltc`) REFERENCES `loptinchi` (`maltc`),
  ADD CONSTRAINT `dangki_fk2` FOREIGN KEY (`masv`) REFERENCES `sinhvien` (`masv`);

--
-- Constraints for table `diem`
--
ALTER TABLE `diem`
  ADD CONSTRAINT `Masv` FOREIGN KEY (`masv`) REFERENCES `sinhvien` (`masv`),
  ADD CONSTRAINT `mabkt` FOREIGN KEY (`mabkt`) REFERENCES `baikt` (`mabkt`);

--
-- Constraints for table `loptinchi`
--
ALTER TABLE `loptinchi`
  ADD CONSTRAINT `Mamh` FOREIGN KEY (`Mamh`) REFERENCES `monhoc` (`Mamh`),
  ADD CONSTRAINT `loptinchi_ibfk_1` FOREIGN KEY (`mamh`) REFERENCES `monhoc` (`Mamh`);

--
-- Constraints for table `monhoc`
--
ALTER TABLE `monhoc`
  ADD CONSTRAINT `mamhfk_1` FOREIGN KEY (`mamh`) REFERENCES `loptinchi` (`mamh`);

--
-- Constraints for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD CONSTRAINT `sinhvien_ibfk_1` FOREIGN KEY (`makhoa`) REFERENCES `khoa` (`makhoa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
