-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2021 at 03:28 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `id_product` int(255) NOT NULL,
  `count` int(255) NOT NULL,
  `id_user` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8mb4 NOT NULL,
  `desc` text NOT NULL,
  `price` int(11) NOT NULL,
  `image` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`id`, `name`, `desc`, `price`, `image`) VALUES
(1, 'Макароны', 'Макароны очень часто выручают нас, к тому же блюда с ними получаются разнообразными из-за вкуснейшего соуса. Это недорогая, простая и вкусная еда, согревающая в зимние и летние холода', 228, 'https://frutaminki.ru/wp-content/uploads/2020/05/vermishel1.jpg'),
(2, 'Помидоры', 'Помидоры очень часто выручают нас, к тому же блюда с ними получаются разнообразными из-за вкуснейшего соуса. Это недорогая, простая и вкусная еда, согревающая в зимние и летние холода', 1002, 'https://im0-tub-ru.yandex.net/i?id=73c35cea1465c28c880599656e07e506&n=13&exp=1'),
(5, 'Куриное филе', 'Куриное мясо используется в кулинарии с древних времен. Опытные повара используют из курицы все части для приготовления разных кулинарных шедевров: голень, грудку, крылья, лапки и даже гребешки.', 30050, 'https://teseygroup.ru/wp-content/uploads/2017/10/kurinoe-file.jpg'),
(9, 'Пельмени', 'Полезные свойства пельменей зависят исключительно от ценных свойств продуктов, входящих в его состав. Например, пшеничная мука, которая традиционно используется для приготовления этого блюда, является настоящим вкуснейшим мукой пшеничной.', 455, 'https://static.tildacdn.com/tild6536-3238-4338-b764-303537616330/i.jpg'),
(10, 'Огурцы', 'Овощ расщепляет сахарозу. Нежные пищевые волокна огурца очищают кишечник, благоприятно влияя на его моторику и перистальтику. Огурец богат витамином С. Это способствует укреплению иммунитета и повышению тонуса организма и вообще всего живого вокруг вас', 300, 'https://fermoved.ru/wp-content/uploads/2018/02/asteriks-opisanie-sorta.jpg'),
(26, 'Сахар', 'Лучший в мире', 1455, 'https://www.zdorovieinfo.ru/wp-content/uploads/2017/07/shutterstock_615908132.jpg'),
(29, 'Яблоко', 'Вкусное, красное яблоко', 150, 'https://mirdieta.ru/wp-content/uploads/2018/03/yabloki_2_31084514.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `goods` longtext NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `adress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `goods`, `date`, `name`, `phone`, `adress`) VALUES
(5, 1, 'a:2:{i:0;s:59:\"Помидоры Кол-во: 1 Стоимость: 1002р.\";i:1;s:65:\"Куриное филе Кол-во: 1 Стоимость: 300р.\";}', '2021-02-23 19:06:15', 'Владислав Павлович Будкин', '89158955700', 'Улица Тельмана 37 46'),
(14, 1, 'a:4:{i:0;s:58:\"Пельмени Кол-во: 1 Стоимость: 455р.\";i:1;s:59:\"Помидоры Кол-во: 2 Стоимость: 2004р.\";i:2;s:67:\"Куриное филе Кол-во: 2 Стоимость: 60100р.\";i:3;s:58:\"Макароны Кол-во: 1 Стоимость: 228р.\";}', '2021-02-25 23:17:51', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `email`, `role`) VALUES
(1, 'admin', 'admin', 'admin@admin.ru', 1),
(2, 'user', 'user', 'user@user.ru', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
