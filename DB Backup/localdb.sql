-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 17, 2018 lúc 12:35 PM
-- Phiên bản máy phục vụ: 10.1.32-MariaDB
-- Phiên bản PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `localdb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `bill_id` int(11) NOT NULL,
  `bill_receiver` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bill_oderdate` datetime NOT NULL,
  `bill_address` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `cust_username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `bill_total` int(11) NOT NULL,
  `coupon_value` int(11) NOT NULL DEFAULT '0',
  `bill_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`bill_id`, `bill_receiver`, `bill_oderdate`, `bill_address`, `cust_username`, `bill_total`, `coupon_value`, `bill_status`) VALUES
(2, 'Huy Thanh', '2018-01-18 15:19:36', 'HN', 'demo', 1375000, 50, 2),
(10, 'Thanh', '2018-01-18 15:55:07', 'Thanh', 'demo', 223000, 0, 1),
(11, 'TYNA', '2018-01-25 14:43:41', 'hà nội', 'demo', 125000, 0, 2),
(12, 'Thanh', '2018-02-02 11:10:40', 'Phương Trạch, Vĩnh Ngọc, Đông Anh, Hà Nội', 'demo', 125000, 0, 1),
(13, 'Thanh', '2018-02-05 14:04:12', 'Phương Trạch, Vĩnh Ngọc, Đông Anh, Hà Nội', 'demo', 125000, 0, 1),
(14, 'Thanh', '2018-02-05 14:06:10', 'Phương Trạch, Vĩnh Ngọc, Đông Anh, Hà Nội', 'demo', 17050, 50, 1),
(15, 'Thanh', '2018-02-05 14:52:50', 'Phương Trạch, Vĩnh Ngọc, Đông Anh, Hà Nội', 'demo', 250000, 0, 1),
(16, 'Huy Thanh', '2018-01-05 14:53:58', 'HN', 'huythanh', 2500000, 0, 1),
(17, 'Huy Thanh', '2018-02-06 14:29:22', 'HN', 'demo', 1257500, 50, 2),
(23, 'Hoang Huy Thanh', '2018-08-13 15:30:11', 'Dong Anh', 'demo', 670009, 50, 2),
(24, 'Ngoc Anh', '2018-08-13 15:33:02', 'Dong Anh', 'demo', 1062009, 50, 1),
(25, 'Ngoc Anh', '2018-08-13 16:08:19', 'Dong Anh', 'tyna', 6340018, 0, 1),
(26, 'thanh', '2018-08-15 14:11:29', 'dong anh', 'demo', 135000, 0, 1),
(27, 'Huy Thanh', '2018-08-17 10:39:45', 'HANOI', 'demo', 120000, 90, 1),
(28, 'HuyThanh', '2018-08-17 10:42:23', 'HaNoi', 'demo', 120000, 29, 1),
(29, 'Huythanh', '2018-08-17 13:07:32', 'thanh', 'demo', 15000, 29, 1),
(30, 'Thanh', '2018-08-17 14:19:22', 'Thanh', 'demo', 15000, 29, 1),
(31, 'Thanh', '2018-08-17 14:22:46', 'Thanh', 'demo', 15000, 29, 1),
(32, 'Thanh', '2018-08-17 14:35:57', 'thanh', 'demo', 240000, 29, 1),
(33, 'thanh', '2018-08-17 15:15:37', 'thanh', 'demo', 480000, 90, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE `bill_detail` (
  `bill_detail_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `prd_id` int(11) NOT NULL,
  `prd_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_detail`
--

INSERT INTO `bill_detail` (`bill_detail_id`, `bill_id`, `prd_id`, `prd_price`, `quantity`) VALUES
(6, 2, 3, 125000, 2),
(7, 2, 9, 2500000, 1),
(21, 10, 3, 125000, 1),
(22, 10, 5, 98000, 1),
(23, 11, 3, 125000, 1),
(24, 12, 3, 125000, 1),
(25, 13, 3, 125000, 1),
(26, 14, 2, 34100, 1),
(27, 15, 7, 250000, 1),
(28, 16, 9, 2500000, 1),
(29, 17, 1, 15000, 1),
(30, 17, 9, 2500000, 1),
(31, 23, 6, 670009, 1),
(32, 24, 6, 670009, 1),
(33, 24, 5, 98000, 4),
(34, 25, 6, 670009, 2),
(35, 25, 9, 2500000, 2),
(36, 26, 4, 120000, 1),
(37, 26, 1, 15000, 1),
(38, 27, 4, 120000, 1),
(39, 28, 4, 120000, 1),
(40, 29, 1, 15000, 1),
(41, 30, 1, 15000, 1),
(42, 31, 1, 15000, 1),
(43, 32, 4, 120000, 2),
(44, 33, 4, 120000, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cat_status` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_status`) VALUES
(1, 'Cupcake', b'1'),
(2, 'Muffinn', b'1'),
(3, 'Hamburger', b'1'),
(4, 'Tiramisu', b'1'),
(5, 'Flan caramen', b'1'),
(6, 'Pizza', b'0'),
(7, 'Doughnut', b'0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupon`
--

CREATE TABLE `coupon` (
  `coupon_id` int(11) NOT NULL,
  `coupon_code` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `coupon_value` int(11) NOT NULL,
  `coupon_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `coupon`
--

INSERT INTO `coupon` (`coupon_id`, `coupon_code`, `coupon_value`, `coupon_quantity`) VALUES
(1, 'TETTRUNGTHU', 20, 20),
(2, 'QUOCKHANH', 29, 5),
(3, 'HOTDEAL', 90, 0),
(4, 'SUMMER2018', 50, 0),
(5, 'SPECIALDEAL', 10, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `cust_username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `cust_pw` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `cust_phonenum` int(11) NOT NULL,
  `cust_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cust_address` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `cust_accumulate` int(11) NOT NULL DEFAULT '0',
  `cust_level` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_username`, `cust_pw`, `cust_phonenum`, `cust_email`, `cust_address`, `cust_accumulate`, `cust_level`) VALUES
(5, 'huythanh', 'thanhkoy', 1635539210, 'thanhkoi1411@gmail.com', 'Hà Nội', 2625000, b'0'),
(6, 'tyna', 'thanhkoy', 2147483647, 'thanhkoi1411@gmail.co', 'Đông Anh HN VN abc', 6465018, b'1'),
(7, 'demo', 'thanh', 1234567, 'huythanh.cp12@gmail.com', 'Hà Nội vn', 7646500, b'1'),
(11, 'hflfhhfkj', '12', 2147483647, 'hhsjhfdj@d.c', 'dfddfsd', 125000, b'0'),
(12, 'hihi', 'thanh', 1234567890, 'hihihi@hihi.com', 'Phương Trạch, Vĩnh Ngọc, Đông Anh, Hà Nội', 0, b'0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `emp_username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `emp_pw` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `emp_access` bit(1) NOT NULL DEFAULT b'0',
  `emp_verify` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_username`, `emp_pw`, `emp_access`, `emp_verify`) VALUES
(1, 'admin', 'thanh', b'1', 'abc'),
(2, 'mod', 'thanh', b'0', '123'),
(3, 'na', 'thanh', b'1', 'pxpcvn'),
(4, 'unknow', 'thanhkoy', b'1', 'CFgcri'),
(5, 'thanhkoy', 'thanhkoy', b'0', 'zdBner');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `fb_id` int(11) NOT NULL,
  `fb_content` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `fb_datetime` datetime NOT NULL,
  `cust_username` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `feedback`
--

INSERT INTO `feedback` (`fb_id`, `fb_content`, `fb_datetime`, `cust_username`) VALUES
(1, 'gut gut :>', '2018-08-14 14:08:55', 'demo'),
(2, 'gut :>', '2018-08-14 14:09:37', 'demo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `log`
--

CREATE TABLE `log` (
  `log_id` int(11) NOT NULL,
  `emp_username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `log_act` varchar(2000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `log`
--

INSERT INTO `log` (`log_id`, `emp_username`, `log_act`) VALUES
(2, 'admin', 'Change property of category Pizza'),
(3, 'admin', 'Change property of product Cupcake kem tươi'),
(4, 'admin', 'Change property of product Cupcake kem tươi'),
(5, 'admin', 'Add a new category Doughnut'),
(6, 'admin', 'Change property of employee account unknow'),
(7, 'admin', 'Add a new employee account thanhkoy'),
(8, 'admin', 'Change property of category Pizza'),
(9, 'admin', 'Change property of product Pepperoni & Beef'),
(10, 'admin', 'Change property of category Doughnut'),
(11, 'admin', 'Change bill status'),
(12, 'admin', 'Change bill status'),
(13, 'admin', 'Change bill status'),
(14, 'admin', 'Change bill status'),
(15, 'admin', 'Change bill status'),
(16, 'admin', 'Change bill status'),
(17, 'admin', 'Add a news'),
(18, 'admin', 'Add a news'),
(19, 'admin', 'Add a news'),
(20, 'admin', 'Add a news'),
(21, 'admin', 'Add a news'),
(22, 'admin', 'Edit news'),
(23, 'admin', 'Edit news'),
(24, 'admin', 'Edit news'),
(25, 'admin', 'Edit news'),
(26, 'admin', 'Edit news'),
(27, 'admin', 'Edit news'),
(28, 'admin', 'Edit news'),
(29, 'admin', 'Edit news'),
(30, 'mod', 'Change bill status'),
(31, 'mod', 'Add a news'),
(32, 'admin', 'Change property of product White Pearl Swirls Cupcake'),
(33, 'admin', 'Change property of product Cupcake kem tươi'),
(34, 'admin', 'Edit news'),
(35, 'admin', 'Change property of product Beef and Burger Seasoning'),
(36, 'admin', 'Change property of product Cupcake trà xanh'),
(37, 'admin', 'Change property of product Hamburger with caramelised pineapple'),
(38, 'admin', 'Change property of product Mascarpone Flan Cake with Marinated Berries'),
(39, 'admin', 'Change property of product Muffin Blueberry'),
(40, 'admin', 'Change property of product Muffin coffee with chocolate chips'),
(41, 'admin', 'Change property of product Muffin coffee with chocolate chips'),
(42, 'admin', 'Change property of product Pepperoni & Beef'),
(43, 'admin', 'Change property of product RED VELVET CUPCAKES'),
(44, 'admin', 'Change property of product Strawberry Cupcakes'),
(45, 'admin', 'Change property of product Tiramisu Cake'),
(46, 'admin', 'Change property of product White Pearl Swirls Cupcake'),
(47, 'admin', 'Change bill status'),
(48, 'admin', 'Change bill status');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `news_image` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `news_content` varchar(8000) COLLATE utf8_unicode_ci NOT NULL,
  `news_datetime` date NOT NULL,
  `emp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_image`, `news_content`, `news_datetime`, `emp_id`) VALUES
(3, 'fsdfdsf', '18740621_1325683040883295_2780692871029380264_n.jpg', '<p><strong>sdfsdfdsfsdf</strong></p>\r\n\r\n<p>dfdfsdfsdfsd</p>\r\n\r\n<p><em>dsasdsadsad</em></p>\r\n\r\n<p><s>dsasadsadsad</s></p>\r\n\r\n<p><s>abc</s></p>\r\n', '2018-01-29', 1),
(4, 'DEMO', '20429812_974208712719724_3658547607490858101_n.jpg', '<p><strong>hihi</strong></p>\r\n', '2018-01-29', 1),
(5, ' Transform Vanilla Cupcake Mix for the Holidays- 3 Simple Topper Designs', '18157022_774127319413349_1920531001670021990_n.jpg', '<p>Happy Holidays!! Today, we are sharing 3 simple ideas for transforming vanilla cake mix into festive holiday cupcakes. I love concepts that add visual interest to any dessert table or party spread that are fun, whimsical and easy to replicate!!</p>\r\n\r\n<p>Our first cupcake design plays on the concept of &quot;Believing&quot;, featuring little North Pole cupcake toppers. To replicate the look at home, simply trim red and white striped paper straws in half, push through the center of your cupcake slightly, and add the FREE printable North Pole tags found at the bottom of this blog post.</p>\r\n\r\n<p><img alt=\"Picture\" src=\"https://www.crowningdetails.com/uploads/2/3/6/2/23626268/published/img-5377.jpg?1513305011\" /></p>\r\n\r\n<p><img alt=\"Picture\" src=\"https://www.crowningdetails.com/uploads/2/3/6/2/23626268/published/img-5382.jpg?1513305395\" /></p>\r\n\r\n<p>For our 2nd project, we created DIY Christmas tree cupcakes using a vanilla cupcake base, a sugar ice cream cone and green frosting with a star tip attachment. To replicate this look, center the sugar cone atop the cupcake with a small base layer of icing. Using your star tip attachment for green icing, work your way from the bottom to the top of the ice cream cone placing stars in a 360 fashion on the cone.</p>\r\n\r\n<p>If you wanted to take this concept further, you could add M&amp;M chocolate candies around the tree to resemble ornaments and a yellow one on top to mimic a star topper. Or, you could dust the tree with powdered sugar for a &#39;frosted&#39; effect.</p>\r\n\r\n<p><img alt=\"Picture\" src=\"https://www.crowningdetails.com/uploads/2/3/6/2/23626268/published/img-5367.jpg?1513304430\" /></p>\r\n\r\n<p>For each of our DIY concepts, we started with a delicious vanilla cupcake recipe using the baking mix from Cupcake Royale. When you start out with a great base, virtually anything your imagination can conceive is possible when it comes to cupcake creation.</p>\r\n', '2018-01-30', 1),
(6, 'News demo', '25323905_630561177280565_1485058713_n.jpg', '<p>abcdef</p>\r\n', '2018-02-06', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `prd_id` int(11) NOT NULL,
  `prd_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `prd_price` int(11) NOT NULL,
  `prd_image` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `prd_description` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `prd_status` bit(1) NOT NULL DEFAULT b'1',
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`prd_id`, `prd_name`, `prd_price`, `prd_image`, `prd_description`, `prd_status`, `cat_id`) VALUES
(1, 'Cupcake kem tươi', 15000, 'cupcake1.jpg', 'The BEST Red Velvet Cupcakes are a light cake with a beautiful red color and a slight chocolate flavor with a little tang from the buttermilk. They are perfectly moist and topped with cream cheese frosting. You will agree that these are the best!The BEST Red Velvet Cupcakes are a light cake with a beautiful red color and a slight chocolate flavor with a little tang from the buttermilk. They are perfectly moist and topped with cream cheese frosting. You will agree that these are the best!The BEST Red Velvet Cupcakes are a light cake with a beautiful red color and a slight chocolate flavor with a little tang from the buttermilk. They are perfectly moist and topped with cream cheese frosting. You will agree that these are the best!', b'1', 1),
(2, 'Muffin Blueberry', 34100, 'muffin1.jpg', 'Tuyệt vời!', b'1', 2),
(3, 'Cupcake trà xanh', 125000, 'cupcake2.jpg', 'Dễ làm', b'1', 1),
(4, 'RED VELVET CUPCAKES', 120000, 'cupcake3.jpg', 'The BEST Red Velvet Cupcakes are a light cake with a beautiful red color and a slight chocolate flavor with a little tang from the buttermilk.  They are perfectly moist and topped with cream cheese frosting.  You will agree that these are the best!', b'1', 1),
(5, 'Strawberry Cupcakes', 98000, 'cupcake4.jpg', 'Strawberry Cupcakes with Strawberry Buttercream Frosting', b'1', 1),
(6, 'White Pearl Swirls Cupcake', 670009, '18157022_774127319413349_1920531001670021990_n.jpg', 'The royal cupcake!!', b'1', 1),
(7, 'Muffin coffee with chocolate chips', 250000, 'vegan-cinnamon-coffee-chocolate-chip-muffins.jpg', 'So cinnamon-y, coffee-ish and chocolatey goodness. Not only do these taste incredible, but your house will smell like heaven too, by the way.', b'1', 2),
(8, 'Tiramisu Cake', 900000, 'IMG_3437-tiramisu-cake-square.jpg', 'Tiramisu Cake – a layered, Italian espresso infused mascarpone dessert, in cake form. Get your caffeine fix, plus a boozy kick!', b'1', 4),
(9, 'Mascarpone Flan Cake with Marinated Berries', 2500000, 'PF641DESSERTX1114-h.jpg', 'Mascarpone Flan Cake with Marinated Berries', b'1', 5),
(10, 'Hamburger with caramelised pineapple', 52000, 'hamburger-with-caramelised-pineapple-90338-1.jpeg', 'This hamburger with caramelised pineapple has a delicious tropical flavour.', b'1', 3),
(11, 'Beef and Burger Seasoning', 65000, 'Beef-Burger-min.jpg', 'Ingredients: Garlic, paprika, coriander, dill seeds, rosemary, thyme, dark mustard seeds, black pepper, chili flakes', b'1', 3),
(12, 'Pepperoni & Beef', 207000, 'pizza_trad_pepperonibeef.png', 'Sometimes pepperoni just isn’t enough. And we don’t blame you when there’s the opportunity for unlimited amounts of beef that can go with it. And with traditional garlic butter spread and cooked right over the crust, it’s an irresistible concoction of flavor freedom.', b'1', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_rating`
--

CREATE TABLE `product_rating` (
  `rate_id` int(11) NOT NULL,
  `rate_value` int(11) NOT NULL,
  `prd_id` int(11) NOT NULL,
  `cust_username` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_rating`
--

INSERT INTO `product_rating` (`rate_id`, `rate_value`, `prd_id`, `cust_username`) VALUES
(1, 1, 4, 'demo'),
(2, 1, 4, 'hihi'),
(3, 4, 1, 'demo');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`);

--
-- Chỉ mục cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`bill_detail_id`),
  ADD KEY `bill_id` (`bill_id`),
  ADD KEY `prd_id` (`prd_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Chỉ mục cho bảng `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_id`),
  ADD UNIQUE KEY `coupon_code` (`coupon_code`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`),
  ADD UNIQUE KEY `cust_username` (`cust_username`);

--
-- Chỉ mục cho bảng `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `emp_username` (`emp_username`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fb_id`),
  ADD KEY `cust_id` (`cust_username`);

--
-- Chỉ mục cho bảng `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `emp_username` (`emp_username`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prd_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Chỉ mục cho bảng `product_rating`
--
ALTER TABLE `product_rating`
  ADD PRIMARY KEY (`rate_id`),
  ADD KEY `prd_id` (`prd_id`),
  ADD KEY `cust_id` (`cust_username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `bill_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `prd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `product_rating`
--
ALTER TABLE `product_rating`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD CONSTRAINT `bill_detail_ibfk_1` FOREIGN KEY (`bill_id`) REFERENCES `bill` (`bill_id`),
  ADD CONSTRAINT `bill_detail_ibfk_2` FOREIGN KEY (`prd_id`) REFERENCES `product` (`prd_id`);

--
-- Các ràng buộc cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`cust_username`) REFERENCES `customer` (`cust_username`);

--
-- Các ràng buộc cho bảng `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`emp_username`) REFERENCES `employee` (`emp_username`);

--
-- Các ràng buộc cho bảng `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`);

--
-- Các ràng buộc cho bảng `product_rating`
--
ALTER TABLE `product_rating`
  ADD CONSTRAINT `product_rating_ibfk_1` FOREIGN KEY (`prd_id`) REFERENCES `product` (`prd_id`),
  ADD CONSTRAINT `product_rating_ibfk_2` FOREIGN KEY (`cust_username`) REFERENCES `customer` (`cust_username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
