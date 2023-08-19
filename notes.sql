-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2023 at 08:02 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notes`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `sno` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `descr` text NOT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`sno`, `title`, `descr`, `date`) VALUES
(28, 'Conductors and Insulators', 'A substance which offers comparatively less opposition to the flow of current is known as a conductor, and substances which offer larger opposition are  called insulators.Some examples of conductors include copper, iron and steel. Some of examples of insulators include glass, dry wood and cotton.\r\n\r\nA substance which offers comparatively less opposition to the flow of current is known as a conductor, and substances which offer larger opposition are  called insulators.Some examples of conductors include copper, iron and steel. Some of examples of insulators include glass, dry wood and cotton.\r\nA substance which offers comparatively less opposition to the flow of current is known as a conductor, and substances which offer larger opposition are  called insulators.Some examples of conductors include copper, iron and steel. Some of examples of insulators include glass, dry wood and cotton.\r\n\r\n\r\n', '2023-08-19 00:30:38'),
(29, 'Electric Potential and Potential Difference', 'The electric potential at a point is defined as work done in bringing a unit positive charge from infinity to that point. The potential difference between two points is defined as the difference in electric potentials at the two given points. The electrons move only if there is a difference in electric pressure called the potential difference. One Volt is defined as energy consumption of one joule per electric charge of one coulomb.\r\n\r\nMathematically, electric potential between two points is given as:\r\n\r\n \r\n \r\nwhere V is the potential difference, W is the work done, Q is the electric charge.', '2023-08-19 00:23:34'),
(30, 'Resistance', 'Resistance is a measure of the opposition offered to the current flow in an electric circuit. Resistance is measured in ohms. All materials resist current flow up to some degree. All materials fall into one of two broad categories: Conductors and Insulators.\r\n\r\n', '2023-08-19 00:24:43'),
(31, 'Superconductors', 'Conductors which offer zero resistance to the flow of current are called superconductors. Prominent examples of superconductors include aluminium, niobium, magnesium diboride, and cuprates such as yttrium barium, copper oxide and iron pnictides.\r\n\r\n', '2023-08-19 00:25:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;