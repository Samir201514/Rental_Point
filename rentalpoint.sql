-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2026 at 10:32 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentalpoint`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `BookingId` int(11) NOT NULL,
  `PostId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `PreferredDateTime` datetime NOT NULL,
  `Note` text DEFAULT NULL,
  `Status` varchar(30) DEFAULT 'Pending',
  `CreatedAt` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`BookingId`, `PostId`, `UserId`, `PreferredDateTime`, `Note`, `Status`, `CreatedAt`) VALUES
(1, 1, 17, '2026-10-12 10:30:00', 'I would like to visit the apartment.', 'Pending', '2026-09-09 14:29:39'),
(2, 2, 18, '2026-10-09 11:00:00', 'Interested in viewing the flat.', 'Approved', '2026-09-09 14:29:39'),
(3, 3, 19, '2026-10-08 14:30:00', 'Please confirm the viewing time.', 'Rejected', '2026-09-09 14:29:39'),
(4, 6, 12, '2026-10-15 15:00:00', 'I am interested in the shared flat.', 'Pending', '2026-09-09 14:29:39'),
(5, 7, 13, '2026-10-13 10:00:00', 'Would like to see the room.', 'Approved', '2026-09-09 14:29:39'),
(6, 4, 20, '2026-10-14 16:00:00', 'Interested in this family flat.', 'Pending', '2026-09-09 14:29:39'),
(7, 5, 21, '2026-10-11 09:00:00', 'I would like to inspect the flat.', 'Approved', '2026-09-09 14:29:39'),
(8, 8, 14, '2026-10-10 13:00:00', 'Interested in the master bedroom.', 'Pending', '2026-09-09 14:29:39'),
(9, 9, 15, '2026-10-16 17:00:00', 'I would like to discuss the roommate arrangement.', 'Rejected', '2026-09-09 14:29:39'),
(10, 10, 16, '2026-10-09 12:00:00', 'Interested in the student sublet.', 'Approved', '2026-09-09 14:29:39');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `PostId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `PostTypeId` int(11) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `Description` text DEFAULT NULL,
  `Bedrooms` int(11) NOT NULL,
  `Bathrooms` int(11) NOT NULL,
  `MonthlyRent` decimal(10,2) NOT NULL,
  `ServiceCharge` decimal(10,2) DEFAULT NULL,
  `TenantPreference` varchar(100) DEFAULT NULL,
  `GenderPref` varchar(20) DEFAULT NULL,
  `AvailableFrom` date DEFAULT NULL,
  `ViewsCount` int(11) DEFAULT 0,
  `ContactsCount` int(11) DEFAULT 0,
  `CreatedAt` datetime DEFAULT current_timestamp(),
  `Location` varchar(150) DEFAULT NULL,
  `ImagePath` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`PostId`, `UserId`, `PostTypeId`, `Title`, `Description`, `Bedrooms`, `Bathrooms`, `MonthlyRent`, `ServiceCharge`, `TenantPreference`, `GenderPref`, `AvailableFrom`, `ViewsCount`, `ContactsCount`, `CreatedAt`, `Location`, `ImagePath`) VALUES
(1, 2, 1, 'Charming 3-Bed Apartment with Balcony View', 'Spacious family apartment with a beautiful balcony overlooking the park.', 3, 3, 45000.00, 3000.00, 'Family', 'Any', '2026-09-01', 245, 18, '2026-09-09 14:19:33', 'Gulshan 2, Dhaka', 'Storage/User/Post/Post_1.jpg'),
(2, 3, 1, 'Spacious 2-Bed Flat Near Dhanmondi Lake', 'Well-maintained apartment close to universities, hospitals and shopping areas.', 2, 2, 28000.00, 2000.00, 'Family', 'Any', '2026-09-15', 189, 12, '2026-09-09 14:19:33', 'Dhanmondi, Dhaka', 'Storage/User/Post/Post_2.jpg'),
(3, 4, 1, 'Modern Furnished Apartment in Banani', 'Fully furnished apartment with modern kitchen, lift and 24-hour security.', 2, 2, 35000.00, 2500.00, 'Any', 'Any', '2026-10-01', 156, 9, '2026-09-09 14:19:33', 'Banani, Dhaka', 'Storage/User/Post/Post_3.jpg'),
(4, 5, 1, 'Family Flat Near Uttara Sector 10', 'Quiet residential apartment located close to schools, parks and public transport.', 3, 2, 32000.00, 2000.00, 'Family', 'Any', '2026-09-20', 134, 7, '2026-09-09 14:19:33', 'Uttara Sector 10, Dhaka', 'Storage/User/Post/Post_4.jpg'),
(5, 13, 2, 'Fully Furnished Room Available for Sublet', 'Furnished room available for a short-term sublet near major transport routes.', 1, 1, 9500.00, 500.00, 'Student', 'Any', '2026-09-20', 98, 11, '2026-09-09 14:19:33', 'Farmgate, Dhaka', 'Storage/User/Post/Post_5.jpg'),
(6, 14, 2, 'Premium Master Bedroom for Short-Term Sublet', 'Fully furnished master bedroom with AC and easy access to public transportation.', 1, 1, 11000.00, 800.00, 'Any', 'Any', '2026-10-01', 88, 10, '2026-09-09 14:19:33', 'Shyamoli, Dhaka', 'Storage/User/Post/Post_6.jpg'),
(7, 15, 2, 'Short-Term Room Sublet Near University Area', 'Clean and comfortable room available for students looking for a temporary stay.', 1, 1, 8500.00, 500.00, 'Student', 'Any', '2026-10-15', 72, 8, '2026-09-09 14:19:33', 'Mohakhali, Dhaka', 'Storage/User/Post/Post_7.jpg'),
(8, 12, 3, 'Female Roommate Needed for Shared Flat', 'Looking for a clean and responsible female roommate near AIUB.', 1, 1, 8000.00, 1000.00, 'Student', 'Female', '2026-09-15', 76, 8, '2026-09-09 14:19:33', 'Bashundhara, Dhaka', 'Storage/User/Post/Post_8.jpg'),
(9, 16, 3, 'Male Roommate Wanted for Shared 2-Bed Flat', 'Looking for a quiet, clean and responsible male roommate. Non-smoker preferred.', 2, 1, 7000.00, 500.00, 'Student', 'Male', '2026-11-01', 52, 6, '2026-09-09 14:19:33', 'Kuril, Dhaka', 'Storage/User/Post/Post_9.jpg'),
(10, 17, 3, 'Roommate Needed in Cozy Shared Apartment', 'Looking for a friendly and responsible roommate to share a well-maintained apartment.', 1, 1, 7500.00, 500.00, 'Student', 'Any', '2026-10-01', 64, 7, '2026-09-09 14:19:33', 'Rampura, Dhaka', 'Storage/User/Post/Post_10.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `postfacility`
--

CREATE TABLE `postfacility` (
  `PostId` int(11) NOT NULL,
  `Facility` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `postfacility`
--

INSERT INTO `postfacility` (`PostId`, `Facility`) VALUES
(1, 'Elevator'),
(1, 'Generator Backup'),
(1, 'Parking'),
(2, 'Attached Balcony'),
(2, 'Gas Supply'),
(3, 'Elevator'),
(3, 'Security Guard'),
(3, 'Wi-Fi Internet'),
(4, 'Generator Backup'),
(4, 'Parking'),
(5, 'Attached Balcony'),
(5, 'Wi-Fi Internet'),
(6, 'Air Conditioning'),
(6, 'Security Guard'),
(6, 'Wi-Fi Internet'),
(7, 'Pets Allowed'),
(7, 'Wi-Fi Internet'),
(8, 'Attached Balcony'),
(8, 'Wi-Fi Internet'),
(9, 'Smoking Allowed'),
(9, 'Wi-Fi Internet'),
(10, 'Security Guard'),
(10, 'Wi-Fi Internet');

-- --------------------------------------------------------

--
-- Table structure for table `posttype`
--

CREATE TABLE `posttype` (
  `PostTypeId` int(11) NOT NULL,
  `TypeName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posttype`
--

INSERT INTO `posttype` (`PostTypeId`, `TypeName`) VALUES
(1, 'Rental'),
(3, 'Roommate'),
(2, 'Sublet');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `ReportId` int(11) NOT NULL,
  `ReportedBy` int(11) NOT NULL,
  `PostId` int(11) NOT NULL,
  `ReportType` varchar(100) NOT NULL,
  `Description` text DEFAULT NULL,
  `Status` varchar(30) DEFAULT 'Pending',
  `Response` text DEFAULT NULL,
  `ReportedAt` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`ReportId`, `ReportedBy`, `PostId`, `ReportType`, `Description`, `Status`, `Response`, `ReportedAt`) VALUES
(1, 17, 3, 'Fake Listing', 'The information in this listing appears to be fake.', 'Resolved', 'Listing reviewed and issue resolved.', '2026-09-09 14:30:02'),
(2, 18, 7, 'Duplicate Post', 'This appears to be a duplicate listing.', 'Resolved', 'Duplicate post removed.', '2026-09-09 14:30:02'),
(3, 19, 1, 'Misleading Information', 'Some information in the listing appears misleading.', 'Open', NULL, '2026-09-09 14:30:02'),
(4, 20, 8, 'Spam', 'This listing appears to contain spam content.', 'Open', NULL, '2026-09-09 14:30:02'),
(5, 12, 4, 'Inappropriate Content', 'The listing contains inappropriate information.', 'Resolved', 'Content reviewed and corrected.', '2026-09-09 14:30:02'),
(6, 13, 9, 'Fake Listing', 'The property information could not be confirmed.', 'Open', NULL, '2026-09-09 14:30:02'),
(7, 14, 2, 'Misleading Information', 'The description does not match the property.', 'Resolved', 'Listing information was reviewed.', '2026-09-09 14:30:02'),
(8, 15, 10, 'Spam', 'The post appears to contain promotional spam.', 'Open', NULL, '2026-09-09 14:30:02'),
(9, 16, 5, 'Duplicate Post', 'A similar listing was already posted.', 'Resolved', 'Duplicate listing reviewed.', '2026-09-09 14:30:02'),
(10, 21, 6, 'Inappropriate Content', 'The post contains inappropriate content.', 'Open', NULL, '2026-09-09 14:30:02');

-- --------------------------------------------------------

--
-- Table structure for table `savedpost`
--

CREATE TABLE `savedpost` (
  `SavedId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `PostId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `savedpost`
--

INSERT INTO `savedpost` (`SavedId`, `UserId`, `PostId`) VALUES
(1, 12, 1),
(2, 13, 2),
(3, 14, 3),
(4, 15, 4),
(5, 16, 5),
(6, 17, 6),
(7, 18, 7),
(8, 19, 8),
(9, 20, 9),
(10, 21, 10);

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `SupportId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `Subject` varchar(200) NOT NULL,
  `Description` text NOT NULL,
  `Status` varchar(30) DEFAULT 'Pending',
  `Response` text DEFAULT NULL,
  `SubmittedAt` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`SupportId`, `UserId`, `Subject`, `Description`, `Status`, `Response`, `SubmittedAt`) VALUES
(1, 2, 'Verification Issue', 'I need help with my property verification.', 'Resolved', 'Your verification request has been reviewed.', '2026-09-09 14:30:15'),
(2, 12, 'Account Problem', 'I am having trouble accessing my account.', 'Pending', NULL, '2026-09-09 14:30:15'),
(3, 3, 'Post Update', 'I need help updating my rental post.', 'Resolved', 'Your post update request has been processed.', '2026-09-09 14:30:15'),
(4, 13, 'Booking Question', 'I have a question about my booking.', 'Pending', NULL, '2026-09-09 14:30:15'),
(5, 7, 'Verification Status', 'Please provide an update about my verification.', 'Resolved', 'Your document is currently under review.', '2026-09-09 14:30:15'),
(6, 17, 'Report Issue', 'I want to know the status of my report.', 'Pending', NULL, '2026-09-09 14:30:15'),
(7, 8, 'Property Listing', 'I need help managing my property listing.', 'Resolved', 'Your listing has been reviewed.', '2026-09-09 14:30:15'),
(8, 18, 'Saved Post Issue', 'A saved post is not appearing in my account.', 'Pending', NULL, '2026-09-09 14:30:15'),
(9, 9, 'Account Support', 'I need assistance with my account.', 'Resolved', 'Your account issue has been resolved.', '2026-09-09 14:30:15'),
(10, 19, 'Booking Request', 'I need help with a booking request.', 'Pending', NULL, '2026-09-09 14:30:15');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserId` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Gender` varchar(20) DEFAULT NULL,
  `UserTypeId` int(11) NOT NULL,
  `IsVerified` tinyint(1) DEFAULT 0,
  `RegisteredAt` datetime DEFAULT current_timestamp(),
  `ProfilePhoto` varchar(255) DEFAULT 'Storage/User/Profile/default.png',
  `Email` varchar(100) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Location` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserId`, `Name`, `Password`, `Gender`, `UserTypeId`, `IsVerified`, `RegisteredAt`, `ProfilePhoto`, `Email`, `Phone`, `Location`) VALUES
(1, 'Admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Male', 1, 1, '2026-09-09 14:05:36', 'Storage/User/Profile/default.png', 'admin@rentalpoint.com', '01700000000', 'Dhaka'),
(2, 'MD. ARAFAT RAHMAN SAMIR', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Male', 2, 1, '2026-09-09 14:05:36', 'Storage/User/Profile/default.png', 'arafat.rahman3926@gmail.com', '01711111111', 'Gulshan, Dhaka'),
(3, 'TURJOY SAHA PALAK', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Male', 2, 1, '2026-09-09 14:05:36', 'Storage/User/Profile/default.png', 'turjoy.saha.owner@gmail.com', '01722222222', 'Dhanmondi, Dhaka'),
(4, 'REFAYAT ALAM', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Female', 2, 0, '2026-09-09 14:05:36', 'Storage/User/Profile/default.png', 'refayat.alam.owner@gmail.com', '01733333333', 'Banani, Dhaka'),
(5, 'ISMAM YOUSUF DIPTO', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Male', 2, 1, '2026-09-09 14:05:36', 'Storage/User/Profile/default.png', 'ismam.yousuf.owner@gmail.com', '01744444444', 'Uttara, Dhaka'),
(6, 'MD. AFSANUR RAHMAN MAZUMDER', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Male', 2, 0, '2026-09-09 14:05:36', 'Storage/User/Profile/default.png', 'afsanur.rahman.owner@gmail.com', '01755555555', 'Mirpur, Dhaka'),
(7, 'Kamrul Hasan', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Male', 2, 1, '2026-09-09 14:05:36', 'Storage/User/Profile/default.png', 'kamrul.hasan@gmail.com', '01766666666', 'Bashundhara, Dhaka'),
(8, 'Nusrat Jahan', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Female', 2, 1, '2026-09-09 14:05:36', 'Storage/User/Profile/default.png', 'nusrat.jahan@gmail.com', '01777777777', 'Mohammadpur, Dhaka'),
(9, 'Sadia Islam', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Female', 2, 0, '2026-09-09 14:05:36', 'Storage/User/Profile/default.png', 'sadia.islam@gmail.com', '01788888888', 'Baridhara, Dhaka'),
(10, 'Tanvir Hasan', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Male', 2, 1, '2026-09-09 14:05:36', 'Storage/User/Profile/default.png', 'tanvir.hasan@gmail.com', '01799999999', 'Khilgaon, Dhaka'),
(11, 'Farzana Akter', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Female', 2, 0, '2026-09-09 14:05:36', 'Storage/User/Profile/default.png', 'farzana.akter@gmail.com', '01611111111', 'Malibagh, Dhaka'),
(12, 'MD. ARAFAT RAHMAN SAMIR', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Male', 3, 0, '2026-09-09 14:05:36', 'Storage/User/Profile/default.png', 'arafat.rahman.tenant@gmail.com', '01811111111', 'Bashundhara, Dhaka'),
(13, 'TURJOY SAHA PALAK', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Male', 3, 0, '2026-09-09 14:05:36', 'Storage/User/Profile/default.png', 'turjoy.saha.tenant@gmail.com', '01822222222', 'Farmgate, Dhaka'),
(14, 'REFAYAT ALAM', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Male', 3, 0, '2026-09-09 14:05:36', 'Storage/User/Profile/default.png', 'refayat.alam.tenant@gmail.com', '01833333333', 'Shyamoli, Dhaka'),
(15, 'ISMAM YOUSUF DIPTO', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Male', 3, 0, '2026-09-09 14:05:36', 'Storage/User/Profile/default.png', 'ismam.yousuf.tenant@gmail.com', '01844444444', 'Kuril, Dhaka'),
(16, 'MD. AFSANUR RAHMAN MAZUMDER', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Male', 3, 0, '2026-09-09 14:05:36', 'Storage/User/Profile/default.png', 'afsanur.rahman.tenant@gmail.com', '01855555555', 'Rampura, Dhaka'),
(17, 'Sajid Hasan', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Male', 3, 0, '2026-09-09 14:05:36', 'Storage/User/Profile/default.png', 'sajid.hasan@gmail.com', '01866666666', 'Banani, Dhaka'),
(18, 'Nayeem Rahman', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Male', 3, 0, '2026-09-09 14:05:36', 'Storage/User/Profile/default.png', 'nayeem.rahman@gmail.com', '01877777777', 'Dhanmondi, Dhaka'),
(19, 'Adnan Chowdhury', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Male', 3, 0, '2026-09-09 14:05:36', 'Storage/User/Profile/default.png', 'adnan.chowdhury@gmail.com', '01888888888', 'Gulshan, Dhaka'),
(20, 'Mitu Akter', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Female', 3, 0, '2026-09-09 14:05:36', 'Storage/User/Profile/default.png', 'mitu.akter@gmail.com', '01899999999', 'Uttara, Dhaka'),
(21, 'Rahim Ahmed', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Male', 3, 0, '2026-09-09 14:05:36', 'Storage/User/Profile/default.png', 'rahim.ahmed@gmail.com', '01911111111', 'Mirpur, Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `userpreference`
--

CREATE TABLE `userpreference` (
  `PrefId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `LookingFor` varchar(100) DEFAULT NULL,
  `MinBudget` decimal(10,2) DEFAULT NULL,
  `MaxBudget` decimal(10,2) DEFAULT NULL,
  `Location` varchar(150) DEFAULT NULL,
  `MoveInDate` date DEFAULT NULL,
  `Occupation` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userpreference`
--

INSERT INTO `userpreference` (`PrefId`, `UserId`, `LookingFor`, `MinBudget`, `MaxBudget`, `Location`, `MoveInDate`, `Occupation`) VALUES
(1, 12, 'Roommate', 8000.00, 15000.00, 'Bashundhara, Dhaka', '2026-09-01', 'Software Engineer'),
(2, 13, 'Flat', 15000.00, 25000.00, 'Farmgate, Dhaka', '2026-10-01', 'Bank Officer'),
(3, 14, 'Sublet', 6000.00, 12000.00, 'Shyamoli, Dhaka', '2026-09-15', 'Student'),
(4, 15, 'Room', 5000.00, 10000.00, 'Kuril, Dhaka', '2026-11-01', 'Student'),
(5, 16, 'Roommate', 10000.00, 18000.00, 'Rampura, Dhaka', '2026-09-20', 'Graphic Designer'),
(6, 17, 'Flat', 12000.00, 20000.00, 'Banani, Dhaka', '2026-10-10', 'Marketing Executive'),
(7, 18, 'Sublet', 7000.00, 14000.00, 'Dhanmondi, Dhaka', '2026-09-05', 'Freelancer'),
(8, 19, 'Room', 6000.00, 11000.00, 'Gulshan, Dhaka', '2026-11-15', 'Student'),
(9, 20, 'Roommate', 9000.00, 16000.00, 'Uttara, Dhaka', '2026-09-25', 'Nurse'),
(10, 21, 'Flat', 14000.00, 22000.00, 'Mirpur, Dhaka', '2026-10-20', 'Civil Engineer');

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `UserTypeId` int(11) NOT NULL,
  `TypeName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`UserTypeId`, `TypeName`) VALUES
(1, 'Admin'),
(2, 'Owner'),
(3, 'Tenant');

-- --------------------------------------------------------

--
-- Table structure for table `verificationdoc`
--

CREATE TABLE `verificationdoc` (
  `VerifyId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `VerifyDocPath` varchar(255) NOT NULL,
  `Status` varchar(30) DEFAULT 'Pending',
  `Response` text DEFAULT NULL,
  `SubmittedAt` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `verificationdoc`
--

INSERT INTO `verificationdoc` (`VerifyId`, `UserId`, `VerifyDocPath`, `Status`, `Response`, `SubmittedAt`) VALUES
(1, 2, 'Storage/Owner/PropertyDocument/Doc_1.pdf', 'Approved', 'Document verified successfully.', '2026-09-09 14:29:51'),
(2, 3, 'Storage/Owner/PropertyDocument/Doc_2.pdf', 'Approved', 'Document verified successfully.', '2026-09-09 14:29:51'),
(3, 4, 'Storage/Owner/PropertyDocument/Doc_3.pdf', 'Pending', NULL, '2026-09-09 14:29:51'),
(4, 5, 'Storage/Owner/PropertyDocument/Doc_4.pdf', 'Approved', 'Document verified successfully.', '2026-09-09 14:29:51'),
(5, 6, 'Storage/Owner/PropertyDocument/Doc_5.pdf', 'Rejected', 'Document could not be verified.', '2026-09-09 14:29:51'),
(6, 7, 'Storage/Owner/PropertyDocument/Doc_6.pdf', 'Approved', 'Document verified successfully.', '2026-09-09 14:29:51'),
(7, 8, 'Storage/Owner/PropertyDocument/Doc_7.pdf', 'Pending', NULL, '2026-09-09 14:29:51'),
(8, 9, 'Storage/Owner/PropertyDocument/Doc_8.pdf', 'Approved', 'Document verified successfully.', '2026-09-09 14:29:51'),
(9, 10, 'Storage/Owner/PropertyDocument/Doc_9.pdf', 'Rejected', 'Invalid verification document.', '2026-09-09 14:29:51'),
(10, 11, 'Storage/Owner/PropertyDocument/Doc_10.pdf', 'Pending', NULL, '2026-09-09 14:29:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`BookingId`),
  ADD KEY `PostId` (`PostId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`PostId`),
  ADD KEY `UserId` (`UserId`),
  ADD KEY `PostTypeId` (`PostTypeId`);

--
-- Indexes for table `postfacility`
--
ALTER TABLE `postfacility`
  ADD PRIMARY KEY (`PostId`,`Facility`);

--
-- Indexes for table `posttype`
--
ALTER TABLE `posttype`
  ADD PRIMARY KEY (`PostTypeId`),
  ADD UNIQUE KEY `TypeName` (`TypeName`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`ReportId`),
  ADD KEY `ReportedBy` (`ReportedBy`),
  ADD KEY `PostId` (`PostId`);

--
-- Indexes for table `savedpost`
--
ALTER TABLE `savedpost`
  ADD PRIMARY KEY (`SavedId`),
  ADD UNIQUE KEY `UserId` (`UserId`,`PostId`),
  ADD KEY `PostId` (`PostId`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`SupportId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserId`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `UserTypeId` (`UserTypeId`);

--
-- Indexes for table `userpreference`
--
ALTER TABLE `userpreference`
  ADD PRIMARY KEY (`PrefId`),
  ADD UNIQUE KEY `UserId` (`UserId`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`UserTypeId`),
  ADD UNIQUE KEY `TypeName` (`TypeName`);

--
-- Indexes for table `verificationdoc`
--
ALTER TABLE `verificationdoc`
  ADD PRIMARY KEY (`VerifyId`),
  ADD KEY `UserId` (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `BookingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `PostId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `posttype`
--
ALTER TABLE `posttype`
  MODIFY `PostTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `ReportId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `savedpost`
--
ALTER TABLE `savedpost`
  MODIFY `SavedId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `SupportId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `userpreference`
--
ALTER TABLE `userpreference`
  MODIFY `PrefId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `UserTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `verificationdoc`
--
ALTER TABLE `verificationdoc`
  MODIFY `VerifyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`PostId`) REFERENCES `post` (`PostId`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`PostTypeId`) REFERENCES `posttype` (`PostTypeId`);

--
-- Constraints for table `postfacility`
--
ALTER TABLE `postfacility`
  ADD CONSTRAINT `postfacility_ibfk_1` FOREIGN KEY (`PostId`) REFERENCES `post` (`PostId`) ON DELETE CASCADE;

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`ReportedBy`) REFERENCES `user` (`UserId`),
  ADD CONSTRAINT `report_ibfk_2` FOREIGN KEY (`PostId`) REFERENCES `post` (`PostId`);

--
-- Constraints for table `savedpost`
--
ALTER TABLE `savedpost`
  ADD CONSTRAINT `savedpost_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`) ON DELETE CASCADE,
  ADD CONSTRAINT `savedpost_ibfk_2` FOREIGN KEY (`PostId`) REFERENCES `post` (`PostId`) ON DELETE CASCADE;

--
-- Constraints for table `support`
--
ALTER TABLE `support`
  ADD CONSTRAINT `support_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`) ON DELETE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`UserTypeId`) REFERENCES `usertype` (`UserTypeId`);

--
-- Constraints for table `userpreference`
--
ALTER TABLE `userpreference`
  ADD CONSTRAINT `userpreference_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`) ON DELETE CASCADE;

--
-- Constraints for table `verificationdoc`
--
ALTER TABLE `verificationdoc`
  ADD CONSTRAINT `verificationdoc_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
