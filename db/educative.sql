-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2017 at 04:50 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `educative`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_footer`
--

CREATE TABLE `address_footer` (
  `iid_footer` int(64) NOT NULL,
  `vname` varchar(128) NOT NULL,
  `vaddress` varchar(128) NOT NULL,
  `vmobile` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `address_footer`
--

INSERT INTO `address_footer` (`iid_footer`, `vname`, `vaddress`, `vmobile`) VALUES
(1, 'Nhà Phí Hồng Mạnh', '243 Tam Trinh', '01636679239');

-- --------------------------------------------------------

--
-- Table structure for table `banner_left`
--

CREATE TABLE `banner_left` (
  `iid_banner` int(64) NOT NULL,
  `vpath_image_banner` varchar(128) NOT NULL,
  `vlink_image_banner` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`id`, `name`, `email`, `content`) VALUES
(1, 'manh', 'phimanh2905@gmail.com', 'phimanh'),
(3, 'đá', 'phimanh29051996@gmail.com', 'đas');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `serial` int(64) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `address` varchar(128) NOT NULL,
  `phone` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`serial`, `name`, `email`, `address`, `phone`) VALUES
(1, 'khách hàng 1', 'email@gmail.com', 'địa chỉ 1', 1636679239),
(2, 'khach hang 2', 'email@gmail.com', 'dia chi 2', 126412786),
(3, 'minh', 'minh@gmail.com', 'minh', 1636679239),
(4, 'Lê Hoàng', 'lehoang@gmail.com', 'Lê Hoàng', 323232),
(5, 'tieesn nghiaz', 'tieesn nghiaz@gmail.com', 'tieesn nghiaz', 3123),
(6, 'khach hang', 'khach hang@gmail.com', 'khach hang', 22);

-- --------------------------------------------------------

--
-- Table structure for table `image_detail`
--

CREATE TABLE `image_detail` (
  `iid_detail` int(64) NOT NULL,
  `iid_loaidetail` int(64) NOT NULL,
  `tname` text NOT NULL,
  `tpath_image` text NOT NULL,
  `tdiscribe` text NOT NULL,
  `tnote` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `iid_menu` int(64) NOT NULL,
  `vname` varchar(128) NOT NULL,
  `iparent` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`iid_menu`, `vname`, `iparent`) VALUES
(13, 'Toán', 0),
(14, 'Văn', 0),
(15, 'Anh', 0),
(16, 'PEN', 0),
(17, 'PEN-I', 16),
(18, 'PEN-M', 16),
(19, 'Các khóa cơ bản', 0),
(20, 'PRO-S', 0);

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

CREATE TABLE `music` (
  `iid_song` int(64) NOT NULL,
  `vname_song` varchar(128) NOT NULL,
  `vpath_song` varchar(128) NOT NULL,
  `vdiscribe_song` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `newsfeed`
--

CREATE TABLE `newsfeed` (
  `id` int(64) NOT NULL,
  `email` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `newsfeed`
--

INSERT INTO `newsfeed` (`id`, `email`) VALUES
(0, 'Nhập email của bạn...'),
(0, '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `serial` int(64) NOT NULL,
  `date` date NOT NULL,
  `customerid` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`serial`, `date`, `customerid`) VALUES
(1, '2017-05-10', 1),
(2, '2017-05-10', 2),
(3, '2017-05-12', 3),
(4, '2017-05-12', 4),
(5, '2017-05-24', 5),
(6, '2017-05-26', 6);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `orderid` int(64) NOT NULL,
  `productid` int(64) NOT NULL,
  `quantity` int(64) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`orderid`, `productid`, `quantity`, `price`) VALUES
(1, 4, 1, 253),
(2, 1, 1, 1),
(3, 3, 1, 3353),
(4, 2, 1, 1234570),
(5, 7, 1, 500000),
(6, 7, 1, 500000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `iID` int(64) NOT NULL,
  `iid_parent` int(64) NOT NULL,
  `product_name` varchar(128) NOT NULL,
  `cost` int(64) NOT NULL,
  `img_path` varchar(128) NOT NULL,
  `quantity` int(64) NOT NULL,
  `description` text NOT NULL,
  `note` text NOT NULL,
  `sale` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`iID`, `iid_parent`, `product_name`, `cost`, `img_path`, `quantity`, `description`, `note`, `sale`) VALUES
(7, 17, 'Khóa học xã hội - Thầy Hà Cô Hương Thầy Năng', 500000, 'http://localhost/educative/Image/pen-i-khoa-hoc-xa-hoi-thay-ha-co-huong-thay-nang-600.png', 50, 'http://localhost/educative/Image/pen-i-khoa-hoc-xa-hoi-thay-ha-co-huong-thay-nang-600.png', 'http://localhost/educative/Image/pen-i-khoa-hoc-xa-hoi-thay-ha-co-huong-thay-nang-600.png', 10),
(8, 17, 'pen-i-mon-hoa-hoc-thay-vu-khac-ngoc-600', 600000, 'http://localhost/educative/Image/pen-i-mon-hoa-hoc-thay-vu-khac-ngoc-600.png', 50, 'pen-i-mon-hoa-hoc-thay-vu-khac-ngoc-600', 'pen-i-mon-hoa-hoc-thay-vu-khac-ngoc-600', 10),
(9, 17, 'pen-i-mon-tieng-anh-co-huong-fiona-500', 500000, 'http://localhost/educative/Image/pen-i-mon-tieng-anh-co-huong-fiona-500.png', 50, 'pen-i-mon-tieng-anh-co-huong-fiona-500', 'pen-i-mon-tieng-anh-co-huong-fiona-500', 10),
(10, 17, 'pen-i-mon-toan-thay-luu-huy-thuong-500', 500000, 'http://localhost/educative/Image/pen-i-mon-toan-thay-luu-huy-thuong-500.png', 50, 'pen-i-mon-toan-thay-luu-huy-thuong-500', 'pen-i-mon-toan-thay-luu-huy-thuong-500', 10),
(11, 18, 'pen-m-hoa-hoc-tb-tbk-thay-le-dang-khuong-500.png', 500000, 'http://localhost/educative/Image/pen-m-hoa-hoc-tb-tbk-thay-le-dang-khuong-500.png', 50, 'http://localhost/educative/Image/pen-m-hoa-hoc-tb-tbk-thay-le-dang-khuong-500.png', 'http://localhost/educative/Image/pen-m-hoa-hoc-tb-tbk-thay-le-dang-khuong-500.png', 10),
(12, 18, 'pen-m-hoa-hoc-tb-tbk-thay-le-dang-khuong-500', 500000, 'http://localhost/educative/Image/pen-m-hoa-hoc-tb-tbk-thay-le-dang-khuong-500.png', 50, 'pen-m-hoa-hoc-tb-tbk-thay-le-dang-khuong-500', 'pen-m-hoa-hoc-tb-tbk-thay-le-dang-khuong-500', 10),
(13, 18, 'pen-m-ngu-van-tb-tbk-thay-pham-huu-cuong-500', 500000, 'http://localhost/educative/Image/pen-m-ngu-van-tb-tbk-thay-pham-huu-cuong-500.png', 50, 'pen-m-ngu-van-tb-tbk-thay-pham-huu-cuong-500', 'pen-m-ngu-van-tb-tbk-thay-pham-huu-cuong-500', 10),
(14, 18, 'pen-m-sinh-hoc-k-g-thay-nguyen-thanh-cong-500', 500000, 'http://localhost/educative/Image/pen-m-sinh-hoc-k-g-thay-nguyen-thanh-cong-500.png', 50, 'pen-m-sinh-hoc-k-g-thay-nguyen-thanh-cong-500', 'pen-m-sinh-hoc-k-g-thay-nguyen-thanh-cong-500', 10),
(15, 18, 'pen-m-sinh-hoc-tb-tbk-thay-dinh-duc-hien-500', 500000, 'http://localhost/educative/Image/pen-m-sinh-hoc-tb-tbk-thay-dinh-duc-hien-500.png', 50, 'pen-m-sinh-hoc-tb-tbk-thay-dinh-duc-hien-500', 'pen-m-sinh-hoc-tb-tbk-thay-dinh-duc-hien-500', 10),
(16, 18, 'pen-m-toan-k-g-thay-le-anh-tuan-500', 500000, 'http://localhost/educative/Image/pen-m-toan-k-g-thay-le-anh-tuan-500.png', 50, 'pen-m-toan-k-g-thay-le-anh-tuan-500', 'pen-m-toan-k-g-thay-le-anh-tuan-500', 10),
(17, 18, 'pen-m-toan-k-g-thay-le-ba-tran-phuong-500', 500000, 'http://localhost/educative/Image/pen-m-toan-k-g-thay-le-ba-tran-phuong-500.png', 50, 'pen-m-toan-k-g-thay-le-ba-tran-phuong-500', 'pen-m-toan-k-g-thay-le-ba-tran-phuong-500', 10),
(18, 18, 'pen-m-toan-k-g-thay-nguyen-ba-tuan-500', 500000, 'http://localhost/educative/Image/pen-m-toan-k-g-thay-nguyen-ba-tuan-500.png', 50, 'pen-m-toan-k-g-thay-nguyen-ba-tuan-500', 'pen-m-toan-k-g-thay-nguyen-ba-tuan-500', 10),
(19, 18, 'pen-m-toan-nguyen-thanh-tung-500', 500000, 'http://localhost/educative/Image/pen-m-toan-nguyen-thanh-tung-500.png', 50, 'pen-m-toan-nguyen-thanh-tung-500', 'pen-m-toan-nguyen-thanh-tung-500', 10),
(20, 18, 'pen-m-toan-tb-tbk-thay-luu-huy-thuong-500', 500000, 'http://localhost/educative/Image/pen-m-toan-tb-tbk-thay-luu-huy-thuong-500.png', 50, 'pen-m-toan-tb-tbk-thay-luu-huy-thuong-500', 'pen-m-toan-tb-tbk-thay-luu-huy-thuong-500', 10),
(21, 18, 'pen-m-vat-li-k-g-thay-do-ngoc-ha-500', 500000, 'http://localhost/educative/Image/pen-m-vat-li-k-g-thay-do-ngoc-ha-500.png', 50, 'pen-m-vat-li-k-g-thay-do-ngoc-ha-500', 'pen-m-vat-li-k-g-thay-do-ngoc-ha-500', 10),
(22, 18, 'pen-m-vat-li-thay-nguyen-ngoc-hai-500', 500000, 'http://localhost/educative/Image/pen-m-vat-li-thay-nguyen-ngoc-hai-500.png', 50, 'pen-m-vat-li-thay-nguyen-ngoc-hai-500', 'pen-m-vat-li-thay-nguyen-ngoc-hai-500', 10),
(23, 18, 'pen-m-vat-li-thay-tran-duc-500', 500000, 'http://localhost/educative/Image/pen-m-vat-li-thay-tran-duc-500.png', 50, 'pen-m-vat-li-thay-tran-duc-500', 'pen-m-vat-li-thay-tran-duc-500', 10),
(24, 20, 'http://localhost/educative/Image/ProS_Anh_500_VuMaiPhuong.jpg', 222, 'http://localhost/educative/Image/ProS_Anh_500_VuMaiPhuong.jpg', 1, '<p>http://localhost/educative/Image/ProS_Anh_500_VuMaiPhuong.jpg</p>', '<p>http://localhost/educative/Image/ProS_Anh_500_VuMaiPhuong.jpg</p>\r\n', 2),
(25, 20, 'http://localhost/educative/Image/ProS_Anh_500_cophandieu.jpg', 2, 'http://localhost/educative/Image/ProS_Anh_500_cophandieu.jpg', 1, '<p>ProS_Anh_500_cophandieu.jpg</p>', '<p>ProS_Anh_500_cophandieu.jpg</p>\r\n', 2),
(26, 20, 'Khoá học ProS Hóa thầy Lê Phạm Thành', 500000, 'http://localhost/educative/Image/ProS_Hoa_500_lephamthanh1.jpg', 50, '<p>http://localhost/educative/Image/ProS_Hoa_500_lephamthanh1.jpg</p>', '<p>http://localhost/educative/Image/ProS_Hoa_500_lephamthanh1.jpg</p>\r\n', 10);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `iid_register` int(64) NOT NULL,
  `vuser` varchar(128) NOT NULL,
  `vpass` varchar(128) NOT NULL,
  `vname` varchar(128) NOT NULL,
  `vmail` varchar(128) NOT NULL,
  `vava` varchar(128) NOT NULL,
  `vlever` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`iid_register`, `vuser`, `vpass`, `vname`, `vmail`, `vava`, `vlever`) VALUES
(1, 'phihongmanh', 'phihongmanh', 'Phi Hong Manh', 'phimanh2905@gmail.com', 'http://localhost/educative/Image/admin.jpg', '1'),
(2, 'lehoaithanh', 'meomanhme', 'Le Hoai Thanh', 'thanh@gmail.com', 'http://localhost/educative/Image/avaThanh.jpg', '2'),
(3, 'test', 'test', 'SUA', 'SUA', 'SUA', '3'),
(4, 'test2', 'test2', 'test2', 'test2', 'http://localhost/educative/Image/admin.jpg', '3'),
(5, 'manh', 'manh', 'manh', 'manh@gmail.com', '', '4'),
(6, 'manh1', 'manh1', 'manh1', 'manh1@gmail.com', '', '4');

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE `slideshow` (
  `iid_image` int(64) NOT NULL,
  `vpath_image` varchar(128) NOT NULL,
  `vlink_image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`iid_image`, `vpath_image`, `vlink_image`) VALUES
(1, 'http://localhost/educative/Image/845x300_ht_nen_tang_(1).png', 'http://localhost/educative/Image/845x300_ht_nen_tang_(1).png'),
(2, 'http://localhost/educative/Image/845x300_(20000).png', 'http://localhost/educative/Image/845x300_(20000).png'),
(3, 'http://localhost/educative/Image/845x300_(1)_(1).jpg', 'http://localhost/educative/Image/845x300_(1)_(1).jpg'),
(4, 'http://localhost/educative/Image/845x300(hgtt).png', 'http://localhost/educative/Image/845x300(hgtt).png'),
(5, 'http://localhost/educative/Image/3_5_PEN_M.png', 'http://localhost/educative/Image/3_5_PEN_M.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_footer`
--
ALTER TABLE `address_footer`
  ADD PRIMARY KEY (`iid_footer`);

--
-- Indexes for table `banner_left`
--
ALTER TABLE `banner_left`
  ADD PRIMARY KEY (`iid_banner`);

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `image_detail`
--
ALTER TABLE `image_detail`
  ADD PRIMARY KEY (`iid_detail`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`iid_menu`);

--
-- Indexes for table `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`iid_song`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`iID`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`iid_register`);

--
-- Indexes for table `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`iid_image`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address_footer`
--
ALTER TABLE `address_footer`
  MODIFY `iid_footer` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `banner_left`
--
ALTER TABLE `banner_left`
  MODIFY `iid_banner` int(64) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `serial` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `image_detail`
--
ALTER TABLE `image_detail`
  MODIFY `iid_detail` int(64) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `iid_menu` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `music`
--
ALTER TABLE `music`
  MODIFY `iid_song` int(64) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `serial` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `orderid` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `iID` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `iid_register` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `iid_image` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
