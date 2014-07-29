-- phpMyAdmin SQL Dump
-- version 4.2.6
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Jul 29, 2014 at 11:39 AM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `challenge_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `Box`
--

CREATE TABLE `Box` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `offer` varchar(10) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `Box`
--

INSERT INTO `Box` (`id`, `name`, `status`, `offer`) VALUES
(3, 'Trash', 'To schedule pickup', '25'),
(4, 'Commodities', 'Accepted', '150'),
(5, 'Antiques', 'New', '250'),
(6, 'Expensive stuff box', 'New', '900'),
(7, 'To donate', 'Pickup scheduled', '200'),
(8, 'Old things', 'Declined', '10');

-- --------------------------------------------------------

--
-- Table structure for table `Box_log`
--

CREATE TABLE `Box_log` (
  `box_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Box_log`
--

INSERT INTO `Box_log` (`box_id`, `log_id`) VALUES
(3, 9),
(3, 12),
(3, 13),
(4, 14),
(4, 15),
(5, 17),
(5, 20),
(6, 21),
(7, 26),
(7, 29),
(7, 30),
(7, 31),
(7, 32),
(8, 34),
(8, 35);

-- --------------------------------------------------------

--
-- Table structure for table `Log`
--

CREATE TABLE `Log` (
`id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `detail` varchar(250) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `Log`
--

INSERT INTO `Log` (`id`, `date`, `detail`) VALUES
(9, '2014-07-29 09:24:31', 'Offer set to: $25'),
(10, '2014-07-29 09:25:44', 'Image added'),
(11, '2014-07-29 09:26:37', 'Image added'),
(12, '2014-07-29 09:26:56', 'Status changed to: Accepted'),
(13, '2014-07-29 09:27:01', 'Status changed to: To schedule pickup'),
(14, '2014-07-29 09:27:19', 'Offer set to: $150'),
(15, '2014-07-29 09:27:25', 'Status changed to: Accepted'),
(16, '2014-07-29 09:28:12', 'Image added'),
(17, '2014-07-29 09:28:54', 'Offer set to: $23'),
(18, '2014-07-29 09:29:32', 'Image added'),
(19, '2014-07-29 09:30:24', 'Image added'),
(20, '2014-07-29 09:30:38', 'Offer set to: $250'),
(21, '2014-07-29 09:30:56', 'Offer set to: $900'),
(22, '2014-07-29 09:31:53', 'Image added'),
(23, '2014-07-29 09:32:08', 'Image added'),
(24, '2014-07-29 09:33:38', 'Image added'),
(25, '2014-07-29 09:34:20', 'Image added'),
(26, '2014-07-29 09:35:06', 'Offer set to: $50'),
(27, '2014-07-29 09:35:16', 'Image added'),
(28, '2014-07-29 09:35:44', 'Image added'),
(29, '2014-07-29 09:35:57', 'Offer set to: $200'),
(30, '2014-07-29 09:36:07', 'Status changed to: Accepted'),
(31, '2014-07-29 09:36:13', 'Status changed to: To schedule pickup'),
(32, '2014-07-29 09:36:20', 'Status changed to: Pickup scheduled'),
(33, '2014-07-29 09:36:59', 'Image added'),
(34, '2014-07-29 09:37:09', 'Offer set to: $10'),
(35, '2014-07-29 09:38:15', 'Status changed to: Declined');

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE `Product` (
`id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `box_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`id`, `name`, `box_id`) VALUES
(9, 'box full of old papers and magazines', 3),
(10, 'old lamp', 3),
(11, 'coal', 4),
(12, 'buda statue', 5),
(13, 'coffee table', 5),
(14, 'iPhone 5', 6),
(15, 'iPad Retina', 6),
(16, 'bose soundlink mini', 6),
(17, 'clothes', 7),
(18, 'freezer', 7),
(19, 'Barbie collection', 8);

-- --------------------------------------------------------

--
-- Table structure for table `Product_images`
--

CREATE TABLE `Product_images` (
`id` int(11) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `url` varchar(250) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `Product_images`
--

INSERT INTO `Product_images` (`id`, `added_date`, `url`, `product_id`) VALUES
(20, '2014-07-29 09:25:44', 'http://fingerthumb.typepad.com/.a/6a0120a6183221970c0177434a83ea970d-800wi', 9),
(21, '2014-07-29 09:26:37', 'https://www.google.com.ar/url?sa=i&rct=j&q=&esrc=s&source=images&cd=&cad=rja&uact=8&docid=X8gMN4N3Clrb0M&tbnid=leyEvB-4IBsv8M:&ved=0CAUQjRw&url=http%3A%2F%2Fpelfusion.com%2F26-really-amazing-realistic-3d-computer-graphics%2F&ei=rmjXU8SxD4HMsQTQjYLwDw', 10),
(22, '2014-07-29 09:28:12', 'http://www.energy4me.org/images2010/source_coal.jpg', 11),
(23, '2014-07-29 09:29:32', 'http://www.thebuddhagarden.com/mm5/graphics/00000001/japanese-buddha-statue_346x432.jpg', 12),
(24, '2014-07-29 09:30:24', 'http://www.mrbeasleys.com/store/images/products/81046.JPG', 13),
(25, '2014-07-29 09:31:53', 'http://i.dailymail.co.uk/i/pix/2012/09/21/article-2206701-151FED7B000005DC-137_468x465.jpg', 14),
(26, '2014-07-29 09:32:08', 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcQGvRadAkgKFpEuelG0Q6ldzEULb93VVeIN9nGQjgwNITwxPTjF', 14),
(27, '2014-07-29 09:33:38', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRG4zjtZ6nkHzH6YhMEMun3rN2TxXrwJI3YUgQgo3dRAsd6EX7L7w', 15),
(28, '2014-07-29 09:34:20', 'http://lh6.googleusercontent.com/-z2RJ5s-KKTw/U1TN_pq4YxI/AAAAAAAATGk/RLKGlV4VAk4/w500-h375-no/Bose+SoundLink+Mini+Review+%25281%2529.JPG', 16),
(29, '2014-07-29 09:35:16', 'http://1.bp.blogspot.com/-e4v0juYvQgQ/T0_GK6rP1GI/AAAAAAAAAZE/O48pc2ONsf8/s640/kutija+puna+stvari.jpg', 17),
(30, '2014-07-29 09:35:44', 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxQQDxAQDxQPDw8QDw8QDw8QDw8PDw8QFBUWFxUUFBQYHCggGBolHBUUITEhJSkrLi4uFx8zODMsNygtLisBCgoKDg0OGhAQFywcHBwsLCwsLSwsLCwsLCwsLCwsLCw3LCwsLCwsLCwsLCwsLCwsLDcsLCwsLCw0LDcsLC8sK//AABEIALcBEwMBIgACEQE', 18),
(31, '2014-07-29 09:36:59', 'http://www.hungryrunnergirl.com/wp-content/uploads/2011/11/IMG_0646.jpg', 19);

-- --------------------------------------------------------

--
-- Table structure for table `Product_log`
--

CREATE TABLE `Product_log` (
  `log_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Product_log`
--

INSERT INTO `Product_log` (`log_id`, `product_id`) VALUES
(10, 9),
(11, 10),
(16, 11),
(18, 12),
(19, 13),
(22, 14),
(23, 14),
(24, 15),
(25, 16),
(27, 17),
(28, 18),
(33, 19);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Box`
--
ALTER TABLE `Box`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Box_log`
--
ALTER TABLE `Box_log`
 ADD PRIMARY KEY (`box_id`,`log_id`), ADD KEY `log_id` (`log_id`);

--
-- Indexes for table `Log`
--
ALTER TABLE `Log`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Product`
--
ALTER TABLE `Product`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`), ADD KEY `box_id_3` (`box_id`);

--
-- Indexes for table `Product_images`
--
ALTER TABLE `Product_images`
 ADD PRIMARY KEY (`id`,`product_id`), ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `Product_log`
--
ALTER TABLE `Product_log`
 ADD PRIMARY KEY (`log_id`,`product_id`), ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Box`
--
ALTER TABLE `Box`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `Log`
--
ALTER TABLE `Log`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `Product`
--
ALTER TABLE `Product`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `Product_images`
--
ALTER TABLE `Product_images`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Box_log`
--
ALTER TABLE `Box_log`
ADD CONSTRAINT `box_log_ibfk_1` FOREIGN KEY (`box_id`) REFERENCES `Box` (`id`),
ADD CONSTRAINT `box_log_ibfk_2` FOREIGN KEY (`log_id`) REFERENCES `Log` (`id`);

--
-- Constraints for table `Product`
--
ALTER TABLE `Product`
ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`box_id`) REFERENCES `Box` (`id`);

--
-- Constraints for table `Product_images`
--
ALTER TABLE `Product_images`
ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `Product` (`id`);

--
-- Constraints for table `Product_log`
--
ALTER TABLE `Product_log`
ADD CONSTRAINT `product_log_ibfk_2` FOREIGN KEY (`log_id`) REFERENCES `Log` (`id`),
ADD CONSTRAINT `product_log_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `Product` (`id`);
