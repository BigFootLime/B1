-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2024 at 11:05 AM
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
-- Database: `pharmasys_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `medicaments`
--

CREATE TABLE `medicaments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  `form` varchar(50) DEFAULT NULL,
  `manufacturer` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `sold` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicaments`
--

INSERT INTO `medicaments` (`id`, `name`, `description`, `expire_date`, `form`, `manufacturer`, `quantity`, `sold`) VALUES
(1, 'Paracetamol', 'Pain reliever and a fever reducer', '2025-12-31', 'Tablet', 'Pharma Inc.', 100, 50),
(2, 'Ibuprofen', 'Nonsteroidal anti-inflammatory drug', '2024-05-30', 'Capsule', 'Health Corp.', 200, 150),
(3, 'Amoxicillin', 'Antibiotic used to treat a number of bacterial infections', '2023-11-15', 'Suspension', 'MedLife', 150, 75),
(4, 'Aspirin', 'Used to reduce pain, fever, or inflammation', '2026-01-01', 'Tablet', 'Global Pharma', 300, 120),
(5, 'Cetirizine', 'Antihistamine used to relieve allergy symptoms', '2025-07-21', 'Tablet', 'AllergyFree', 250, 100),
(6, 'Metformin', 'Used to treat type 2 diabetes', '2024-03-10', 'Tablet', 'Diabetics Care', 400, 200),
(7, 'Omeprazole', 'Used to treat gastroesophageal reflux disease', '2023-09-25', 'Capsule', 'StomachEase', 180, 90),
(8, 'Lisinopril', 'Used to treat high blood pressure', '2025-10-18', 'Tablet', 'HeartCare', 220, 110),
(9, 'Levothyroxine', 'Used to treat hypothyroidism', '2026-08-05', 'Tablet', 'Thyroid Health', 160, 80),
(10, 'Atorvastatin', 'Used to lower cholesterol levels', '2024-12-01', 'Tablet', 'Cholesterol Solutions', 350, 175),
(11, 'Fluoxetine', 'Antidepressant of the selective serotonin reuptake inhibitor class', '2024-10-30', 'Capsule', 'Mental Health Pharma', -1, -1),
(12, 'Hydroxychloroquine', 'Used to prevent and treat malaria and lupus', '2023-07-14', 'Tablet', 'Anti-Malaria Inc.', -1, -1),
(13, 'Clopidogrel', 'Used to prevent heart attacks and strokes', '2025-04-25', 'Tablet', 'CardioCare', -1, -1),
(14, 'Doxycycline', 'Antibiotic used to treat a wide variety of bacterial infections', '2024-06-20', 'Capsule', 'InfectoPharma', -1, -1),
(15, 'Warfarin', 'Used as an anticoagulant', '2023-12-31', 'Tablet', 'Blood Thinners Co.', -1, -1),
(16, 'Acyclovir', 'Antiviral medication used to treat herpes infections', '2024-08-30', 'Tablet', 'ViralStop Pharma', -1, -1),
(17, 'Montelukast', 'Used for the maintenance treatment of asthma', '2023-11-25', 'Tablet', 'AsthmaCare Inc.', -1, -1),
(18, 'Metoprolol', 'Used to treat high blood pressure and angina', '2025-05-20', 'Tablet', 'HeartMed', -1, -1),
(19, 'Furosemide', 'Used to treat fluid build-up due to heart failure, liver scarring, or kidney disease', '2023-09-10', 'Tablet', 'Diuretic Pharma', -1, -1),
(20, 'Ciprofloxacin', 'Antibiotic used to treat a number of bacterial infections', '2024-03-05', 'Tablet', 'Antibiotic Solutions', -1, -1);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `mail`, `password`) VALUES
(3, 'LEBG', 'Keenan', 'kesmartin2004@tagueule.fr', '$2y$10$6UlBMJXN.TbmFhHFrvWV.u8EB0oZRTDl5iE8BV02F2ErJsI1bJ6IO'),
(7, 'chatte', 'lucas', 'lucacchatte@philipe.ss', '$2y$10$QiAzG8DlvQ5UOl.Yt37qfOKYgvA2KdudgVYianIf/RDXdDLLZUEQe'),
(10, 'gage', 'lile', 'zefzef@46', '$2y$10$W./xS..XW3OIarYXM2frE.5CD55yY2oNhmrkOOiLci2YNp9/wJWOm'),
(11, 'DEPLANTE', 'Dylan', 'playskill74@gmail.com', '$2y$10$XYta923qaGPFgFEsupoXW.8CZdVhiLaTtxO8e4znoJNNGd2d76S1C'),
(12, 'MARTIN', 'Keenan', 'kesmartin@martintechsolutions.fr', '$2y$10$QQ7TIWB5T9rBSWABVm9SCexTqPPBBDsga4U//bj/u07ws.SwDI3Y.'),
(13, 'MARTIN', 'Keenan', 'kesmartin@croix-rousse-precision.fr', '$2y$10$IctuiKWcShr/QIW9tpyu7.8gZrkkYxwMsrIPbEcdykku803sJp6tW'),
(14, 'admin', 'admin', 'admin@pharmasys.fr', '$2y$10$naWSXc57Mygr3UUZ5JSHF.aTaxT8UA5YA3PBIGUunANtJ84ov5sXi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medicaments`
--
ALTER TABLE `medicaments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medicaments`
--
ALTER TABLE `medicaments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
