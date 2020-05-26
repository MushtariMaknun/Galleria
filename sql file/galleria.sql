-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2019 at 07:52 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `galleria`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ADMIN_ID` int(10) NOT NULL,
  `FIRST_NAME` varchar(20) NOT NULL,
  `LAST_NAME` varchar(20) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PASSWORD` varchar(15) NOT NULL,
  `JOIN_DATE` date NOT NULL,
  `PHONE_NUMBER` char(11) NOT NULL,
  `PROFIT` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ADMIN_ID`, `FIRST_NAME`, `LAST_NAME`, `EMAIL`, `PASSWORD`, `JOIN_DATE`, `PHONE_NUMBER`, `PROFIT`) VALUES
(1, 'Mushtari', 'Maknun', 'maknun@gmail.com', '0147', '2019-08-23', '01791452293', 625);

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `ARTIST_ID` int(10) NOT NULL,
  `FIRST_NAME` varchar(20) NOT NULL,
  `LAST_NAME` varchar(20) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PASSWORD` varchar(15) NOT NULL,
  `PHONE_NUMBER` char(11) NOT NULL,
  `JOIN_DATE` date NOT NULL,
  `PROFILE_IMAGE` varchar(50) DEFAULT NULL,
  `DESCRIPTION` varchar(100) DEFAULT NULL,
  `PROFILE_LINK` varchar(50) NOT NULL,
  `ACCOUNT_NO` char(8) DEFAULT NULL,
  `EARNINGS` double NOT NULL DEFAULT '0',
  `IS_BLOCKED` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`ARTIST_ID`, `FIRST_NAME`, `LAST_NAME`, `EMAIL`, `PASSWORD`, `PHONE_NUMBER`, `JOIN_DATE`, `PROFILE_IMAGE`, `DESCRIPTION`, `PROFILE_LINK`, `ACCOUNT_NO`, `EARNINGS`, `IS_BLOCKED`) VALUES
(1, 'Saba', 'Anowar', 'saba@gmail.com', '5678', '01791452293', '2019-08-12', NULL, NULL, 'www.galleia.com/saba', NULL, 975, 0),
(3, 'Nadia', 'Farhin', 'nadia@gmail.com', '1111', '01972562562', '2019-08-26', NULL, NULL, 'www.galleia.com/farhin', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `artwork`
--

CREATE TABLE `artwork` (
  `ARTWORK_ID` int(10) NOT NULL,
  `ARTIST_ID` int(10) NOT NULL,
  `TITLE` varchar(25) NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL,
  `IMAGE` varchar(50) NOT NULL,
  `UPLOAD_DATE` date NOT NULL,
  `TAGS` varchar(100) DEFAULT NULL,
  `ORIENTATION` varchar(10) NOT NULL,
  `CATEGORY` varchar(20) NOT NULL,
  `TYPE` varchar(15) NOT NULL,
  `SIZE` varchar(15) NOT NULL,
  `PRICE` double NOT NULL DEFAULT '0',
  `STATUS` varchar(15) NOT NULL DEFAULT 'AVAILABLE'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artwork`
--

INSERT INTO `artwork` (`ARTWORK_ID`, `ARTIST_ID`, `TITLE`, `DESCRIPTION`, `IMAGE`, `UPLOAD_DATE`, `TAGS`, `ORIENTATION`, `CATEGORY`, `TYPE`, `SIZE`, `PRICE`, `STATUS`) VALUES
(1, 1, 'Phoenix', 'Inspired by Mythology and Fire', 'img/product/animal/phoenix.jpg', '2019-08-13', 'animal,phoenix,illustration', 'vertical', 'animal', 'illustration', '26.6\" x 18.9\"', 700, 'AVAILABLE'),
(2, 1, 'Athens', 'Athens, Greece\r\n', 'img/product/city/athens.jpg', '2019-08-13', 'maps,city,citylight', 'vertical', 'city', 'illustration', '26.6\" x 18.9\"', 800, 'AVAILABLE'),
(3, 1, 'Space Surfing', 'Modeling,Rendering : 3ds max 2019\r\nPost production : Photoshop CSS', 'img/product/cosmos/space_surfing.jpg', '2019-08-13', 'galaxy,universe,imagination,space', 'vertical', 'cosmos', 'illustration', '26.6\" x 18.9\"', 750, 'AVAILABLE'),
(4, 1, 'Scottish Landscape', 'An expressionist surreal Scottish landscape with a deer.\r\nMedia : Acrylic Paint.', 'img/product/nature/scottish_landscape.jpg', '2019-08-13', 'nature,deer,painting,acrylic', 'horizontal', 'nature', 'painting', '17.7\" x 12.6\"', 2000, 'AVAILABLE'),
(5, 1, 'A New Hope', 'Fascinating photograph of mountain', 'img/product/multiframes/a_new_hope.jpg', '2019-08-13', 'mountain,nature,photograph', 'horizontal', 'multiframe', 'photography', '36.2\" x 48.62\"', 3000, 'AVAILABLE'),
(8, 1, 'Forest Leaves', 'Photograph of Autumn Leaves.', 'img/product/nature/Forest_Leaves.jpg', '2019-08-24', 'nature, autumn, leaves', 'vertical', 'nature', 'photography', '17.7\" x 12.6\"', 600, 'AVAILABLE'),
(9, 3, 'Fox Woodland', 'Beautiful illustration work with amazing details.', 'img/product/animal/Fox_Woodland.jpg', '2019-08-26', 'animal, fox, illustration', 'horizontal', 'animal', 'illustration', '17.7\" x 12.6\"', 800, 'AVAILABLE'),
(10, 3, 'Twilight Owl', 'Fascinating watercolor painting inspired from \"Legend Of The Guardians\".', 'img/product/animal/Twilight_Owl.jpg', '2019-08-26', 'owl, painting, watercolor, bird, animal', 'horizontal', 'animal', 'painting', '26.6\" x 18.9\"', 1500, 'AVAILABLE'),
(11, 3, 'Snow Fox', 'Photograph of a wild fox lying in pure white snow.', 'img/product/animal/Snow_Fox.jpg', '2019-08-26', 'fox, photograghy, wildlife, snow, animal.', 'horizontal', 'animal', 'photography', '26.6\" x 18.9\"', 1200, 'AVAILABLE'),
(12, 3, 'Ndovu Elephant', 'Elephants in the Savannah silhouette.', 'img/product/animal/Ndovu_Elephant.jpg', '2019-08-26', 'nature, animal, elephant, wildlife, photography.', 'horizontal', 'animal', 'photography', '26.6\" x 18.9\"', 1200, 'AVAILABLE'),
(13, 3, 'Golden Landscape', 'Fascinating multiframe to decorate your space and find daily inspiration in it.', 'img/product/multiframes/golden_landscape.jpg', '2019-08-26', 'multiframe, landscape, tree, illustration, sunset', 'horizontal', 'multiframe', 'illustration', '25.79\" x 54.33\"', 2000, 'AVAILABLE'),
(14, 3, 'New Land', 'SUNSET IN THE MOUNTAINS. ALONE WITH THE NATURE.', 'img/product/multiframes/new_land.jpg', '2019-08-26', 'multiframe, landscape,mountain, sky', 'horizontal', 'multiframe', 'photography', '25.79\" x 54.33\"', 2500, 'AVAILABLE'),
(15, 3, 'Spider Man', 'High-quality print from amazing Spider Man collection will bring unique style to your space and will show off your personality.', 'img/product/multiframes/spider_man.jpg', '2019-08-27', 'multiframe, spider-man, comic,illustration', 'vertical', 'multiframe', 'illustration', '72.64\" x 52.17\"', 2500, 'AVAILABLE'),
(16, 3, 'Super Nova', 'Marvelous poster designed to add authenticity to your place. Display your passion to the whole world.', 'img/product/cosmos/supernova.jpg', '2019-08-27', 'cosmos, supernova, galaxy, illustration', 'vertical', 'cosmos', 'illustration', '26.6\" x 18.9\"', 800, 'AVAILABLE'),
(17, 3, 'Edge of Dawn', 'Marvelous metal poster designed to add authenticity to your place. Display your passion to the whole world.', 'img/product/cosmos/Edge_of_Dawn.jpg', '2019-08-27', 'dawn, illustration, galaxy, universe', 'horizontal', 'cosmos', 'illustration', '26.6\" x 18.9\"', 800, 'AVAILABLE'),
(18, 3, 'Cybernight-3', 'Fascinating illustration of how skyscrapers looks at night.', 'img/product/city/cybernight-3.jpg', '2019-08-27', 'city, night, light, illustration', 'vertical', 'city', 'illustration', '17.7\" x 12.6\"', 800, 'AVAILABLE'),
(19, 3, 'Cybernight-4', 'Fascinating illustration of highway.', 'img/product/city/cybernight-4.jpg', '2019-08-27', 'city, night, light, illustration', 'vertical', 'city', 'illustration', '17.7\" x 12.6\"', 800, 'AVAILABLE'),
(20, 1, 'Cyber Brooklyn', 'Fascinating illustration of Brooklyn.', 'img/product/city/cyber_brooklyn.jpg', '2019-08-27', 'city, night, light, illustration, brooklyn', 'horizontal', 'city', 'illustration', '17.7\" x 12.6\"', 900, 'AVAILABLE'),
(21, 1, 'New York', 'New York City Lights Map.', 'img/product/city/new_york.jpg', '2019-08-27', 'city, map, new york, light, night', 'vertical', 'city', 'illustration', '17.7\" x 12.6\"', 600, 'AVAILABLE'),
(22, 1, 'Las Vegas', 'Las Vegas City Lights Map', 'img/product/city/las_vegas.jpg', '2019-08-27', 'city, night, light, illustration, vegas, map', 'vertical', 'city', 'illustration', '17.7\" x 12.6\"', 800, 'AVAILABLE'),
(23, 1, 'Astro-Not', 'Marvelous poster designed to add authenticity to your place. Display your passion to the whole world.', 'img/product/cosmos/astro-not.jpg', '2019-08-27', 'cosmos, galaxy, illustration,astronaut.', 'vertical', 'cosmos', 'illustration', '17.7\" x 12.6\"', 1000, 'AVAILABLE'),
(24, 1, 'Space 1', 'Marvelous poster designed to add authenticity to your place. Display your passion to the whole world.', 'img/product/cosmos/space_1.jpg', '2019-08-27', 'cosmos, space, galaxy, illustration,', 'horizontal', 'cosmos', 'illustration', '17.7\" x 12.6\"', 600, 'AVAILABLE'),
(25, 1, 'Thoughts Awakening', 'High-quality photograph from amazing Thoughts Awakening collection will bring unique style to your space and will show off your personality.', 'img/product/multiframes/Thoughts_Awakening.jpg', '2019-08-27', 'mountain, river, peace, photography', 'horizontal', 'multiframe', 'photography', '36.02\" x 48.62\"', 2500, 'AVAILABLE'),
(26, 1, 'Cyberpunk City', 'This Fascinating poster  has a unique signature and hologram on the back to add authenticity to each design.', 'img/product/multiframes/city.jpg', '2019-08-27', 'city, night, light, illustration, cybercity', 'horizontal', 'multiframe', 'illustration', '36.02\" x 48.62\"', 3000, 'AVAILABLE'),
(27, 1, 'Patronus Albus Dumbledore', 'Fascinating illustration of Patronus of a phoenix inspired by Harry Potter.', 'img/product/animal/Patronus_Albus_Dumbledore.jpg', '2019-08-27', 'abstract, illustration, patronus, harry potter.', 'vertical', 'abstract', 'illustration', '17.7\" x 12.6\"', 1000, 'AVAILABLE'),
(28, 1, 'still', 'mountain', 'img/product/nature/still.jpg', '2019-08-27', 'city, night, light, illustration, brooklyn', 'vertical', 'nature', 'illustration', '72.64\" x 52.17\"', 1500, 'AVAILABLE');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CUSTOMER_ID` int(10) NOT NULL,
  `FIRST_NAME` varchar(20) NOT NULL,
  `LAST_NAME` varchar(20) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PASSWORD` varchar(15) NOT NULL,
  `PHONE_NUMBER` char(11) NOT NULL,
  `JOIN_DATE` date NOT NULL,
  `ADDRESS` varchar(60) DEFAULT NULL,
  `POSTAL_CODE` char(4) DEFAULT NULL,
  `DISTRICT` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CUSTOMER_ID`, `FIRST_NAME`, `LAST_NAME`, `EMAIL`, `PASSWORD`, `PHONE_NUMBER`, `JOIN_DATE`, `ADDRESS`, `POSTAL_CODE`, `DISTRICT`) VALUES
(1, 'Marjana', 'Islam', 'marjana@gmail.com', '1234', '01972320573', '2019-08-12', NULL, NULL, NULL),
(2, 'Nusyba', 'Binta Jahan', 'nusyba@gmail.com', '2222', '01719064451', '2019-08-26', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `NOTIFICATION_ID` int(10) NOT NULL,
  `ARTIST_ID` int(10) NOT NULL,
  `GENERATED_DATE` date NOT NULL,
  `IS_READ` tinyint(1) NOT NULL DEFAULT '0',
  `ORDER_ID` int(10) NOT NULL,
  `ARTWORK_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`NOTIFICATION_ID`, `ARTIST_ID`, `GENERATED_DATE`, `IS_READ`, `ORDER_ID`, `ARTWORK_ID`) VALUES
(1, 1, '2019-08-27', 1, 1, 28);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `ORDER_ID` int(10) NOT NULL,
  `ARTWORK_ID` int(10) NOT NULL,
  `ARTIST_ID` int(10) NOT NULL,
  `QUANTITY` int(5) NOT NULL DEFAULT '1',
  `PRICE_EACH` double NOT NULL DEFAULT '0',
  `TYPE` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`ORDER_ID`, `ARTWORK_ID`, `ARTIST_ID`, `QUANTITY`, `PRICE_EACH`, `TYPE`) VALUES
(1, 28, 1, 1, 1500, 'illustration');

-- --------------------------------------------------------

--
-- Table structure for table `p_order`
--

CREATE TABLE `p_order` (
  `ORDER_ID` int(10) NOT NULL,
  `CUSTOMER_ID` int(10) NOT NULL,
  `ORDER_DATE` date NOT NULL,
  `ORDER_STATUS` varchar(10) NOT NULL DEFAULT 'PLACED',
  `TOTAL_PRICE` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_order`
--

INSERT INTO `p_order` (`ORDER_ID`, `CUSTOMER_ID`, `ORDER_DATE`, `ORDER_STATUS`, `TOTAL_PRICE`) VALUES
(1, 1, '2019-08-27', 'PLACED', 1600);

-- --------------------------------------------------------

--
-- Table structure for table `shipments`
--

CREATE TABLE `shipments` (
  `SHIPMENT_ID` int(10) NOT NULL,
  `ORDER_ID` int(10) NOT NULL,
  `ADDRESS` varchar(60) NOT NULL,
  `POSTAL_CODE` char(4) NOT NULL,
  `DISTRICT` varchar(15) NOT NULL,
  `SHIPPING_COST` double NOT NULL DEFAULT '100'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipments`
--

INSERT INTO `shipments` (`SHIPMENT_ID`, `ORDER_ID`, `ADDRESS`, `POSTAL_CODE`, `DISTRICT`, `SHIPPING_COST`) VALUES
(1, 1, 'fsdfsdf', '1234', 'jxsiajisad', 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ADMIN_ID`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`),
  ADD UNIQUE KEY `PASSWORD` (`PASSWORD`),
  ADD UNIQUE KEY `PHONE_NUMBER` (`PHONE_NUMBER`);

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`ARTIST_ID`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`),
  ADD UNIQUE KEY `PASSWORD` (`PASSWORD`),
  ADD UNIQUE KEY `PHONE_NUMBER` (`PHONE_NUMBER`),
  ADD UNIQUE KEY `PROFILE_LINK` (`PROFILE_LINK`),
  ADD UNIQUE KEY `ACCOUNT_NO` (`ACCOUNT_NO`);

--
-- Indexes for table `artwork`
--
ALTER TABLE `artwork`
  ADD PRIMARY KEY (`ARTWORK_ID`),
  ADD UNIQUE KEY `TITLE` (`TITLE`),
  ADD KEY `FKartwork276223` (`ARTIST_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CUSTOMER_ID`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`),
  ADD UNIQUE KEY `PASSWORD` (`PASSWORD`),
  ADD UNIQUE KEY `PHONE_NUMBER` (`PHONE_NUMBER`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`NOTIFICATION_ID`),
  ADD KEY `FKnotificati459621` (`ARTIST_ID`),
  ADD KEY `FKnotificati159808` (`ORDER_ID`,`ARTWORK_ID`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`ORDER_ID`,`ARTWORK_ID`),
  ADD KEY `FKorder_deta559599` (`ORDER_ID`),
  ADD KEY `FKorder_deta670925` (`ARTWORK_ID`);

--
-- Indexes for table `p_order`
--
ALTER TABLE `p_order`
  ADD PRIMARY KEY (`ORDER_ID`),
  ADD KEY `FKp_order9240` (`CUSTOMER_ID`);

--
-- Indexes for table `shipments`
--
ALTER TABLE `shipments`
  ADD PRIMARY KEY (`SHIPMENT_ID`),
  ADD KEY `FKshipments599019` (`ORDER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ADMIN_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `ARTIST_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `artwork`
--
ALTER TABLE `artwork`
  MODIFY `ARTWORK_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CUSTOMER_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `NOTIFICATION_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `p_order`
--
ALTER TABLE `p_order`
  MODIFY `ORDER_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shipments`
--
ALTER TABLE `shipments`
  MODIFY `SHIPMENT_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artwork`
--
ALTER TABLE `artwork`
  ADD CONSTRAINT `FKartwork276223` FOREIGN KEY (`ARTIST_ID`) REFERENCES `artist` (`ARTIST_ID`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `FKnotificati159808` FOREIGN KEY (`ORDER_ID`,`ARTWORK_ID`) REFERENCES `order_details` (`ORDER_ID`, `ARTWORK_ID`),
  ADD CONSTRAINT `FKnotificati459621` FOREIGN KEY (`ARTIST_ID`) REFERENCES `artist` (`ARTIST_ID`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `FKorder_deta559599` FOREIGN KEY (`ORDER_ID`) REFERENCES `p_order` (`ORDER_ID`),
  ADD CONSTRAINT `FKorder_deta670925` FOREIGN KEY (`ARTWORK_ID`) REFERENCES `artwork` (`ARTWORK_ID`);

--
-- Constraints for table `p_order`
--
ALTER TABLE `p_order`
  ADD CONSTRAINT `FKp_order9240` FOREIGN KEY (`CUSTOMER_ID`) REFERENCES `customer` (`CUSTOMER_ID`);

--
-- Constraints for table `shipments`
--
ALTER TABLE `shipments`
  ADD CONSTRAINT `FKshipments599019` FOREIGN KEY (`ORDER_ID`) REFERENCES `p_order` (`ORDER_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
