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
  `price` double NOT NULL,
  `expire_date` date DEFAULT NULL,
  `form` varchar(50) DEFAULT NULL,
  `manufacturer` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `sold` int(11) DEFAULT NULL,
  `img_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicaments`
--

INSERT INTO `medicaments` (`id`, `name`, `description`, `price`, `expire_date`, `form`, `manufacturer`, `quantity`, `sold`, `img_path`) VALUES
(1, 'Paracetamol', 'Pain reliever and a fever reducer', 0, '2025-12-31', 'Tablet', 'Pharma Inc.', 100, 50, 'https://thumbs.dreamstime.com/z/d-rendering-paracetamol-pill-over-white-acetaminophen-medication-concept-d-rendering-paracetamol-pill-over-white-104989054.jpg\r\n'),
(2, 'Ibuprofen', 'Nonsteroidal anti-inflammatory drug', 0, '2024-05-30', 'Capsule', 'Health Corp.', 200, 150, 'https://www.pharmashopi.com/images/Image/ibuprofene-400mg-mylan-1400604447.png'),
(3, 'Amoxicillin', 'Antibiotic used to treat a number of bacterial infections', 0, '2023-11-15', 'Suspension', 'MedLife', 150, 75, 'https://images.lasante.net/24320-121722-thickbox.webp'),
(4, 'Aspirin', 'Used to reduce pain, fever, or inflammation', 0, '2026-01-01', 'Tablet', 'Global Pharma', 300, 120, 'https://fr.mainphar.com/image/ncache/catalog/pharm/10203626-1.398.webp'),
(5, 'Cetirizine', 'Antihistamine used to relieve allergy symptoms', 0, '2025-07-21', 'Tablet', 'AllergyFree', 250, 100, 'https://www.medicament.com/12115-thickbox_default/alairgix-cetirizine-comprimes.jpg\r\n'),
(6, 'Metformin', 'Used to treat type 2 diabetes', 0, '2024-03-10', 'Tablet', 'Diabetics Care', 400, 200, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSP7Gjc7RP61B2uwVqs1CqWkDjTaXn-2qFn08txd1JB7IG6XjjsChwC-VT03-sGXKr5hi14sp1V-tNCeCu-dV7WLiJv0X98HHnzHdlnm1deyt_qdklUhRptkw'),
(7, 'Omeprazole', 'Used to treat gastroesophageal reflux disease', 0, '2023-09-25', 'Capsule', 'StomachEase', 180, 90, 'https://encrypted-tbn2.gstatic.com/shopping?q=tbn:ANd9GcRN2zETHTxGs5xKejSJOwLeHHlFdZaP_FJg4KIRYiTDDvenN1qJz366PmasLpg0sqRDBfXsPxTTVkQ2qWuneOJpfMnKe96eYUr-wPhGkVOeZ0LgxLObkwFcKA'),
(8, 'Lisinopril', 'Used to treat high blood pressure', 0, '2025-10-18', 'Tablet', 'HeartCare', 220, 110, 'https://cdn.pim.mesoigner.fr/mesoigner/d86a92543ed9c317fd8d57f003488e8e/mesoigner-thumbnail-1000-1000-inset/736/543/lisinopril-biogaran-20-mg-comprime-secable.webp'),
(9, 'Levothyroxine', 'Used to treat hypothyroidism', 0, '2026-08-05', 'Tablet', 'Thyroid Health', 160, 80, 'https://c8.alamy.com/compfr/e7fkcy/les-comprimes-de-levothyroxine-un-remplacement-pour-une-hormone-normalement-produite-par-la-glande-thyroide-a-reguler-l-energie-du-corps-et-meta-e7fkcy.jpg'),
(10, 'Atorvastatin', 'Used to lower cholesterol levels', 0, '2024-12-01', 'Tablet', 'Cholesterol Solutions', 350, 175, 'https://5.imimg.com/data5/SELLER/Default/2023/7/325710235/RG/XA/JU/74349057/atorvastatin-10-mg.jpg'),
(11, 'Fluoxetine', 'Antidepressant of the selective serotonin reuptake inhibitor class', 0, '2024-10-30', 'Capsule', 'Mental Health Pharma', -1, -1, 'https://cdn.pim.mesoigner.fr/mesoigner/6827f8d790abe498d910176a1fb01588/mesoigner-thumbnail-1000-1000-inset/534/984/fluoxetine-biogaran-20-mg-comprime-dispersible-secable.webp'),
(12, 'Hydroxychloroquine', 'Used to prevent and treat malaria and lupus', 0, '2023-07-14', 'Tablet', 'Anti-Malaria Inc.', -1, -1, 'https://www.usinenouvelle.com/mediatheque/6/2/1/000858126_1200x800_c.jpg'),
(13, 'Clopidogrel', 'Used to prevent heart attacks and strokes', 0, '2025-04-25', 'Tablet', 'CardioCare', -1, -1, 'https://cdn.pim.mesoigner.fr/mesoigner/f2a79c6340c2753b4aa005a2d4e58e08/mesoigner-thumbnail-1000-1000-inset/900/874/clopidogrel-biogaran-75-mg-comprime-pellicule.webp'),
(14, 'Doxycycline', 'Antibiotic used to treat a wide variety of bacterial infections', 0, '2024-06-20', 'Capsule', 'InfectoPharma', -1, -1, 'https://res.cloudinary.com/zava-www-uk/image/upload/fl_progressive/a_exif,f_auto,e_sharpen:100,c_fit,w_920,h_690,q_70/v1541758805/fr/services-setup/chlamydia/doxycycline/huiqmgabkterlx5qnmot.jpg'),
(15, 'Warfarin', 'Used as an anticoagulant', 0, '2023-12-31', 'Tablet', 'Blood Thinners Co.', -1, -1, 'https://uknow.uky.edu/sites/default/files/styles/uknow_story_image/public/externals/bd6f7c8e92b639660edcabf0a073c10a.jpg'),
(16, 'Acyclovir', 'Antiviral medication used to treat herpes infections', 0, '2024-08-30', 'Tablet', 'ViralStop Pharma', -1, -1, 'https://www.pharmashopi.com/images/Image/Acyclovir-Mylan-tube-2g-1357219317.jpg'),
(17, 'Montelukast', 'Used for the maintenance treatment of asthma', 0, '2023-11-25', 'Tablet', 'AsthmaCare Inc.', -1, -1, 'https://cdn.pim.mesoigner.fr/mesoigner/609dcf55182ab5a0a0b0d616260bc1d4/mesoigner-thumbnail-1000-1000-inset/900/273/montelukast-mylan-10-mg-comprime-pellicule.webp'),
(18, 'Metoprolol', 'Used to treat high blood pressure and angina', 0, '2025-05-20', 'Tablet', 'HeartMed', -1, -1, 'https://cdn.pim.mesoigner.fr/mesoigner/33204b8f3f52fc5483d060c8875a3f87/mesoigner-thumbnail-1000-1000-inset/370/063/metoprolol-ranbaxy-100-mg-comprime-secable.webp'),
(19, 'Furosemide', 'Used to treat fluid build-up due to heart failure, liver scarring, or kidney disease', 0, '2023-09-10', 'Tablet', 'Diuretic Pharma', -1, -1, 'https://cdn.pim.mesoigner.fr/mesoigner/e54ae62d4708eb1bcf77ca8e660b0c82/mesoigner-thumbnail-1000-1000-inset/495/754/furosemide-viatris-40-mg-comprime-secable.webp'),
(20, 'Ciprofloxacin', 'Antibiotic used to treat a number of bacterial infections', 0, '2024-03-05', 'Tablet', 'Antibiotic Solutions', -1, -1, 'https://fidson.com/wp-content/uploads/2022/09/Ciprofloxacin-500.png');

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
