-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2021-03-29 14:39:16
-- 伺服器版本： 5.7.26
-- PHP 版本： 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `php_practice`
--

-- --------------------------------------------------------

--
-- 資料表結構 `dashboard_admin`
--

CREATE TABLE `dashboard_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `account` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `dashboard_admin`
--

INSERT INTO `dashboard_admin` (`id`, `account`, `password`) VALUES
(1, 'root', '12345');

-- --------------------------------------------------------

--
-- 資料表結構 `dashboard_location`
--

CREATE TABLE `dashboard_location` (
  `id` int(10) UNSIGNED NOT NULL,
  `valid` tinyint(1) NOT NULL,
  `name` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lng` decimal(25,20) NOT NULL,
  `lat` decimal(25,20) NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `dashboard_location`
--

INSERT INTO `dashboard_location` (`id`, `valid`, `name`, `position`, `address`, `lng`, `lat`, `phone`, `description`, `image`) VALUES
(1, 1, '八德介壽路店', '北部', '33462 桃園市八德區介壽路一段555號', '121.30135514481513000000', '24.96832323291062700000', '(03)367-5156', '販售系列：男裝、女裝、童裝、BABY系列\r\n\r\n', 'location_1.jpeg'),
(2, 1, '土城金城路店', '北部', '23652 新北市土城區金城路二段90號', '121.45355126872015000000', '24.98087857532118500000', '(02)8262-6266', '販售系列：男裝、女裝、童裝、BABY系列', 'location_2.jpeg'),
(3, 1, '台中中清路店', '中部', '40761 台中市西屯區中清路二段1389號', '120.64621998404770000000', '24.12934529116088000000', '(04)2473-4020', '販售系列：男裝、女裝、童裝、BABY系列', 'location_3.jpeg'),
(4, 1, '秀泰生活台中文心店', '中部', '40854台中市南屯區文心南路289號', '120.64624144171978000000', '24.12936487396535000000', '(04)2473-4020', '販售系列：男裝、女裝、童裝、BABY系列', 'location_4.jpeg'),
(5, 1, '大魯閣草衙道店', '南部', '80665高雄市前鎮區中安路1之1號1樓', '120.32959143983861000000', '22.58255136296105200000', '(07)791-3063', '販售系列：男裝、女裝、童裝、BABY系列', 'location_5.jpeg'),
(6, 1, '台南永康永大路店', '南部', '71076 台南市永康區永大路三段168號', '120.26023983984676000000', '23.03137964221355500000', '(06)201-9540', '販售系列：男裝、女裝、童裝、BABY系列', 'location_6.jpeg'),
(7, 1, '花蓮遠東百貨店', '東部', '97051 花蓮縣花蓮市和平路581號B1F', '121.59974415335125000000', '23.97883352555023600000', '(03)831-6702', '販售系列：男裝、女裝、童裝、BABY系列', 'location_7.jpeg'),
(8, 1, '台東秀泰廣場店', '東部', '95044 台東縣台東市新生路93號1F', '121.14781099751387000000', '22.75259598719961000000', '(089)348-889', '販售系列：男裝、女裝、童裝、BABY系列\r\n\r\n', 'location_8.jpeg'),
(9, 1, '蘆洲長榮路店', '北部', '24765 新北市蘆洲區長榮路253號', '121.46007390427282000000', '25.08644342037324600000', '(02)8286-2426', '販售系列：男裝、女裝、童裝、BABY系列', 'location_9.jpeg'),
(10, 1, '楊梅中山北路店', '北部', '32653 桃園市楊梅區中山北路二段345號', '121.17540501776163000000', '24.91231737044762800000', '(03)481-8500', '販售系列：男裝、女裝、童裝、BABY系列', 'location_10.jpeg'),
(11, 1, '中壢大江購物中心店', '北部', '32061 桃園市中壢區中園路二段501號3F', '121.22845860427104000000', '25.00177137141032000000', '(03)468-0230', '販售系列：男裝、女裝、童裝、BABY系列', 'location_11.jpeg'),
(12, 1, '雙和比漾廣場店', '北部', '23444 新北市永和區中山路一段238號B1F', '121.50766527543533000000', '25.00848122705959000000', '(02)8231-6872', '販售系列：男裝、女裝、童裝、BABY系列', 'location_12.jpeg'),
(13, 1, '桃園春日路店', '北部', '33051 桃園市桃園區春日路1501號1F', '121.30683923310725000000', '25.02348924127094800000', '(03)317-8854', '販售系列：男裝、女裝、童裝、BABY系列', 'location_13.jpeg'),
(14, 1, '台北車站館前店', '北部', '10047 台北市中正區館前路12號B1~3F', '121.51472283310784000000', '25.04590478399772700000', '(02)2331-5806', '販售系列：男裝、女裝、童裝、BABY系列', 'location_14.jpeg'),
(15, 1, '淡水大都會廣場店 ', '北部', '25151 新北市淡水區中山路8號2F', '121.44508019078195000000', '25.16936216931528500000', '(02)2629-6467', '販售系列：男裝、女裝、童裝、BABY系列', 'location_15.jpeg'),
(16, 1, '苗栗尚順購物中心店', '中部', '35157 苗栗縣頭份鎮東庄里中央路105號2F', '120.90397217533321000000', '24.68931335637952000000', '(037)683-286', '販售系列：男裝、女裝、童裝、BABY系列\r\n公告：UNIQLO 苗栗尚順購物中心店因櫃位改裝，將於2021/4/11(日)21:30~2021/4/18(日)21:30進行櫃位調整。預計於2021/4/19(一)11:00繼續為您服務。', 'location_16.jpeg'),
(17, 1, '彰化中央路店', '中部', '50056 彰化縣彰化市中央路222號', '120.52781114648577000000', '24.06702766408278600000', '(04)751-1227', '販售系列：男裝、女裝、童裝、BABY系列', 'location_17.jpeg'),
(18, 1, '家樂福苗栗店', '中部', '36055 苗栗縣苗栗市國華路599號1F', '120.81761867533096000000', '24.57394904728968400000', '(037)371-757', '販售系列：男裝、女裝、童裝、BABY系列', 'location_18.jpeg'),
(19, 1, '沙鹿光華時尚廣場店', '中部', '43341 台中市沙鹿區鹿寮里21鄰光華路308號', '120.56507957532450000000', '24.24138566642098500000', '(04)2663-0229', '販售系列：男裝、女裝、童裝、BABY系列', 'location_19.jpeg'),
(20, 1, '南紡購物中心店', '南部', '70155 台南市東區中華東路一段366號3F', '120.23286779092216000000', '22.99173076979404200000', '(06)236-6869', '販售系列：男裝、女裝、童裝、BABY系列', 'location_20.jpeg'),
(21, 1, '高雄漢神百貨本店', '南部', '80146 高雄市前金區成功一路266‐1號B2F', '120.29593023336530000000', '22.61929769590108600000', '(07)215-3787', '販售系列：男裝、女裝、童裝、BABY系列', 'location_21.jpeg'),
(22, 1, '台南德安百貨店', '南部', '70167 台南市東區中華東路三段360號2F', '120.22067543297145000000', '22.97406283660944000000', '(06)289-2821', '販售系列：男裝、女裝、童裝、BABY系列\r\n公告：UNIQLO 台南德安百貨店因租約到期，將正式營業至2021/3/14(日)22:00止。', 'location_22.jpeg'),
(23, 1, '宜蘭新月廣場店', '東部', '26049 宜蘭縣宜蘭市民權路二段38巷6號2F', '121.75082186184070000000', '24.75442923013289600000', '(03)931-5709', '販售系列：男裝、女裝、童裝、BABY系列', 'location_23.jpeg');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `dashboard_admin`
--
ALTER TABLE `dashboard_admin`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `dashboard_location`
--
ALTER TABLE `dashboard_location`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動增長(AUTO_INCREMENT)
--

--
-- 使用資料表自動增長(AUTO_INCREMENT) `dashboard_admin`
--
ALTER TABLE `dashboard_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `dashboard_location`
--
ALTER TABLE `dashboard_location`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
