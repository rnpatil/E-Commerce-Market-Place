-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 28, 2012 at 01:53 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ecomm2`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE IF NOT EXISTS `author` (
  `author_id` int(11) NOT NULL AUTO_INCREMENT,
  `author_name` varchar(30) NOT NULL,
  PRIMARY KEY (`author_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `author_name`) VALUES
(16, 'xyz wew'),
(17, 'xyz'),
(18, 'xyz'),
(19, 'xyz'),
(20, 'sad'),
(21, 'gfg'),
(22, 'gfg'),
(23, 'gdfg'),
(24, 'dad'),
(25, 'caasd'),
(26, 'hg');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_title` varchar(60) NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `publisher` varchar(30) NOT NULL,
  `isbn` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `pages` int(11) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `image_name` varchar(60) DEFAULT NULL,
  `image_path` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`book_id`),
  KEY `author_id` (`author_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=80 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_title`, `author_id`, `category_id`, `publisher`, `isbn`, `quantity`, `price`, `rating`, `pages`, `description`, `image_name`, `image_path`) VALUES
(20, 'pete cat', 21, 17, '', 5645, 4, '555.00', NULL, 677, 'Pete the Cat is wearing his favorite shirt—the one with the four totally groovy buttons. But when one falls off, does Pete cry? Goodness, no! He just keeps on singing his song—after all, what could be groovier than three groovy buttons? Count down with Pete in this rocking new story from the creators of the bestselling Pete the Cat books.', 'Blue hills.jpg', 'upload/5645_fdgdf_Blue hills.jpg'),
(21, 'fantastic flying', 23, 14, '', 5645, 4, '444.00', NULL, 1234, 'The book that inspired the Academy Award–winning short film, from New York Times bestselling author and beloved visionary William Joyce.  Morris Lessmore loved words.  He loved stories.  He loved books.', 'Water lilies.jpg', 'upload/5645_fdgdf_Water_lilies.jpg'),
(24, 'goodnight moon', 26, 21, '', 7987, 65, '867.00', NULL, 556, 'In a great green room, tucked away in bed, is a little bunny. "Goodnight room, goodnight moon." And to all the familiar things in the softly lit room -- to the picture of the three little bears sitting on chairs, to the clocks and his socks, to themittens and the kittens, toeverything one by one -- the little bunny says goodnight.', 'Sunset.jpg', 'upload/7987_j_ghh_Sunset.jpg'),
(25, 'bucket', 18, 15, '', 45656, 3, '567.00', NULL, 899, 'Through simple prose and vivid illustrations, this heartwarming book encourages positive behavior as children see how rewarding it is to express daily kindness, appreciation, and love. Bucket filling and dipping are effective metaphors for understanding the effects of our actions and words on the well being of others and ourselves.', '222.jpg', 'upload/1234_ABCD.jpg'),
(77, 'Shadow of Night', 18, 16, '', 124356, 4, '456.00', NULL, 1238, ' "Together we lifted our feet and stepped into the unknown"—the thrilling sequel to the New York Times bestseller A Discovery of Witches  Deborah Harkness exploded onto the literary scene with her debut novel, A Discovery of Witches, Book One of the magical All Souls Trilogy and an international publishing phenomenon. The novel introduced Diana Bishop, Oxford scholar and reluctant witch, and the handsome geneticist and vampire Matthew Clairmont; together they found themselves at the center of a supernatural battle over an enchanted manuscript known as Ashmole 782.', 'Shadow of Night.jpg', 'upload/Shadow of Night.jpg'),
(78, 'The Traitor Queen', 21, 12, '', 435345, 2, '678.00', NULL, 789, 'Discover the magic of Trudi Canavan with her brand new novel in the Traitor Spy trilogy...  Events are building to a climax in Sachaka as Lorkin returns from his exile with the Traitor rebels. The Traitor Queen has given Lorkin the huge task of brokering an alliance between his people and the Traitors. Lorkin has also had to become a feared black magician in order to harness the power of an entirely new kind of gemstone magic. This knowledge could transform the Guild of Magicians - or make Lorkin an outcast forever.  The Traitor Spy trilogy, which began with The Ambassador''s Mission and The Rogue, is the new series set in the world of the international bestselling Black Magician trilogy.', 'The Traitor Queen.jpg', 'upload/The Traitor Queen.jpg'),
(79, 'Tricked', 16, 16, '', 5656, 2, '458.00', NULL, 456, 'Druid Atticus O’Sullivan hasn’t stayed alive for more than two millennia without a fair bit of Celtic cunning. So when vengeful thunder gods come Norse by Southwest looking for payback, Atticus, with a little help from the Navajo trickster god Coyote, lets them think that they’ve chopped up his body in the Arizona desert.  But the mischievous Coyote is not above a little sleight of paw, and Atticus soon finds that he’s been duped into battling bloodthirsty desert shapeshifters called skinwalkers. Just when the Druid thinks he’s got a handle on all the duplicity, betrayal comes from an unlikely source. If Atticus survives this time, he vows he won’t be fooled again. Famous last words.', 'Tricked.jpg', 'upload/Tricked.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(20) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(11, 'children'),
(12, 'children'),
(13, 'children'),
(14, 'computer'),
(15, 'computer'),
(16, 'science'),
(17, 'science'),
(18, 'science'),
(19, 'travel'),
(20, 'travel'),
(21, 'travel');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_books_info`
--

CREATE TABLE IF NOT EXISTS `shipping_books_info` (
  `shipping_books_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `quantity` smallint(6) NOT NULL,
  `total_price` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  PRIMARY KEY (`shipping_books_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `shipping_books_info`
--

INSERT INTO `shipping_books_info` (`shipping_books_id`, `book_id`, `quantity`, `total_price`, `shipping_id`) VALUES
(2, 0, 0, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_user_info`
--

CREATE TABLE IF NOT EXISTS `shipping_user_info` (
  `shipping_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `shipping_fname` varchar(30) NOT NULL,
  `shipping_lname` varchar(30) NOT NULL,
  `shipping_address` varchar(150) NOT NULL,
  `shipping_contact` varchar(20) NOT NULL,
  `shipping_state` varchar(20) NOT NULL,
  `shipping_district` varchar(20) NOT NULL,
  `shipping_city` varchar(20) NOT NULL,
  `shipping_zip` varchar(10) NOT NULL,
  PRIMARY KEY (`shipping_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `shipping_user_info`
--

INSERT INTO `shipping_user_info` (`shipping_id`, `user_id`, `shipping_fname`, `shipping_lname`, `shipping_address`, `shipping_contact`, `shipping_state`, `shipping_district`, `shipping_city`, `shipping_zip`) VALUES
(2, 4, 'rahul', 'kadam', 'fdsdfsdfsdf', '324234', 'wsdsadf', 'dsfsdfsdf', 'dsfsdfsdf', '324234234');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE IF NOT EXISTS `shopping_cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` smallint(6) NOT NULL DEFAULT '1',
  `price` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `last_update` int(11) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `shopping_cart`
--

INSERT INTO `shopping_cart` (`cart_id`, `book_id`, `user_id`, `quantity`, `price`, `total_price`, `last_update`) VALUES
(1, 77, 4, 1, 456, 456, 2012),
(2, 79, 4, 1, 458, 458, 2012);

-- --------------------------------------------------------

--
-- Table structure for table `user2`
--

CREATE TABLE IF NOT EXISTS `user2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `zip_code` int(15) NOT NULL,
  `state` varchar(20) NOT NULL,
  `country` varchar(11) NOT NULL,
  `landline_no` int(15) NOT NULL,
  `mobile_no` int(15) NOT NULL,
  `password` varchar(11) NOT NULL,
  `con_password` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user2`
--

INSERT INTO `user2` (`id`, `name`, `email_id`, `address`, `zip_code`, `state`, `country`, `landline_no`, `mobile_no`, `password`, `con_password`) VALUES
(4, 'rahul kadam', 'rk@gmail.com', 'mulund east', 400081, 'maharashtra', 'india', 2314234, 4546546, '12345', '12345'),
(5, 'shailendra khandewale', 'sk@gmail.com', 'vidyavihar', 400065, 'maharashtra', 'india', 222456684, 965412355, '12345', '12345');
