-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2026 at 06:22 PM
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
-- Database: `sitho_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activites`
--

CREATE TABLE `activites` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `type` enum('activité','conférence') DEFAULT NULL,
  `date` date DEFAULT NULL,
  `lieu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activites`
--

INSERT INTO `activites` (`id`, `titre`, `description`, `type`, `date`, `lieu`) VALUES
(1, 'Expositions dans deux grands pavillons', 'Deux pavillons d\'exposition ont été déployés : le premier dédié aux pays participants et aux entreprises touristiques, le second aux collectivités territoriales et aux métiers liés au tourisme. Au total, 172 stands ont été réservés.', 'activité', '2025-09-25', 'SIAO, Ouagadougou'),
(2, 'Hackathon Tourism Tech', 'Compétition de développement de solutions TIC destinées au secteur du tourisme, visant à stimuler la créativité des jeunes entrepreneurs et développeurs autour des défis numériques du tourisme sahélien.', 'activité', '2025-09-25', 'SIAO, Ouagadoug'),
(3, 'Concours de pitch de projets touristiques', 'Concours permettant à des porteurs de projets touristiques innovants de présenter leurs initiatives devant un jury. Objectif : encourager les idées locales et soutenir les entrepreneurs du secteur.', 'activité', '2025-09-25', 'SIAO, Ouagadougou'),
(4, 'Visites virtuelles en 3D des sites touristiques', 'Dispositif de visite immersive en réalité virtuelle permettant aux visiteurs de découvrir les richesses naturelles et culturelles du Burkina Faso sans quitter le salon, via des visites à 360° de sites touristiques emblématiques.', 'activité', '2025-09-25', 'SIAO, Ouagadougou'),
(5, 'Educ\'Tour dans la région du Centre-Est (Nakambé)', '  Excursion touristique éducative organisée à destination de 4 agences de voyages burkinabè et de 12 journalistes. L\'objectif était de les immerger dans le tourisme culturel, naturel et communautaire de la région invitée d\'honneur.', 'activité', '2025-09-25', 'Région du Centre-Est (Nakambé), Burkina Faso'),
(6, 'Rencontres B2B (Business to Business)', 'Sessions de rencontres structurées entre opérateurs touristiques, tours-opérateurs, investisseurs et acteurs institutionnels pour favoriser les partenariats, les contrats et les échanges commerciaux dans le secteur.', 'activité', '2025-09-25', 'SIAO, Ouagadougou'),
(7, 'Atelier de formation sur l\'élaboration de produits touristiques', 'Atelier de deux jours animé notamment par Rachel Monniet, représentante de l\'ONU-Tourisme. La première journée a porté sur les stratégies de conception et les étapes clés du développement d\'un produit touristique compétitif et innovant. Objectif : autonomiser les acteurs de la filière voyages et circuits.', 'activité', '2025-09-25', 'Ouagadougou'),
(8, 'Cérémonie de remise de distinctions honorifiques', 'Cinq personnalités du secteur touristique et hôtelier ont été élevées au grade de chevalier dans les Ordres de la communication, de la culture et des arts (agrafe tourisme et hôtellerie). Six pionniers du tourisme ont également reçu des attestations de reconnaissance.\',\r\n  \'Acteurs du secteur touristique', 'activité', '2025-09-27', 'SIAO, Ouagadougou'),
(9, 'Cérémonie de clôture et remise des 20 prix du SITHO 2025', 'Cérémonie présidée par le ministre Pingdwendé Gilbert Ouédraogo. Vingt prix ont été décernés : 18 prix officiels et 2 prix spéciaux attribués aux exposants et initiatives les plus exemplaires. Prix du meilleur stand région (Djôrô) et du meilleur stand pays (Mali).', 'activité', '2025-09-28', 'SIAO, Ouagadougou');

-- --------------------------------------------------------

--
-- Table structure for table `actualites`
--

CREATE TABLE `actualites` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date_evenement` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `actualites`
--

INSERT INTO `actualites` (`id`, `titre`, `description`, `date_evenement`) VALUES
(1, 'SITHO 2025 : plus de 10 000 visiteurs attendus et 172 stands réservés', ' Selon le président du comité national d\'organisation, Fidèle Tamini, 172 stands sont déjà réservés. Plus de 25 organes de presse ont été accrédités. Des délégations du Mali, Niger, Haïti, Cameroun, Afrique du Sud, Ghana et de l\'ONU-Tourisme ont confirmé leur participation.', '2025-09-22'),
(2, 'Préparatifs : le ministre visite le site du SIAO à J-1', 'Le 24 septembre 2025, le ministre de la Communication, de la Culture, des Arts et du Tourisme, Pingdwendé Gilbert Ouédraogo, a effectué une visite de contrôle du site. Il a déclaré : « L\'année 2025 peut être considérée comme l\'année du tourisme au Burkina Faso. » Le Village du SITHO, ouvert au grand public chaque soir de 10h à 2h du matin, était en cours d\'aménagement.', '2025-09-24'),
(3, 'Ouverture officielle de la 15e édition du SITHO', '  Le ministre d\'État Ismaël Sombié, représentant le Premier ministre, a lancé officiellement le 25 septembre 2025 les activités de la 15e édition du Salon International du Tourisme et de l\'Hôtellerie de Ouagadougou (SITHO), sur le site du SIAO. Placée sous le thème « Tourisme et intégration des peuples du Sahel », l\'édition a prévu d\'accueillir plus de 10 000 visiteurs pendant quatre jours.', '2025-09-25'),
(4, 'Journée du Niger et du Ghana : deux pays à l\'honneur', ' Le vendredi 26 septembre 2025, le SITHO a dédié sa journée au Niger (pays invité spécial) et au Ghana (pays invité d\'honneur). La ministre nigérienne du tourisme, Guichen Aghaichata Atta, a salué le Burkina Faso pour la constance de l\'organisation, soulignant que « le tourisme est un vecteur de paix, un facteur de résilience et un levier de développement ».', '2025-09-26'),
(5, 'Journée du Mali : artisans et bijoutiers maliens à l\'honneur', '  Le samedi 27 septembre 2025 était consacré au Mali, pays invité spécial. Bijoutiers, artisans et créateurs maliens ont exposé leurs savoir-faire au SIAO. Le Mali a ensuite reçu le prix du meilleur stand pays lors de la cérémonie de clôture.', '2025-09-27'),
(6, 'Clôture du SITHO 2025 : bilan satisfaisant et 20 prix décernés', '  La cérémonie de clôture du 28 septembre 2025 a été présidée par le ministre Pingdwendé Gilbert Ouédraogo. Vingt prix ont été remis (18 officiels et 2 spéciaux). La région du Djôrô a reçu le prix du meilleur stand région, le Mali celui du meilleur stand pays. Six pionniers du tourisme ont reçu des attestations de reconnaissance, et cinq acteurs ont été élevés au grade de chevalier.', '2025-09-28'),
(7, 'Bilan du DG de Faso Tourisme : vitalité et résilience du secteur', '  Sulaïman Kagoné, Directeur général de Faso Tourisme, a dressé un bilan positif : rencontres B2B, conférence inaugurale réunissant 78 participants, Educ\'Tour avec 4 agences burkinabè et 12 journalistes, et 20 prix décernés. Il a exprimé l\'ambition de faire du SITHO une plateforme incontournable en Afrique de l\'Ouest.', '2025-09-30'),
(8, 'Témoignages des exposants et visiteurs du SITHO 2025', '  Des exposants venus de Banfora, du Centre-Est et d\'ailleurs ont partagé leurs expériences. Si la clientèle était majoritairement locale, les exposants ont souligné la valeur de la visibilité et des contacts obtenus. L\'organisation a été jugée satisfaisante par les visiteurs, qui ont apprécié la diversité culturelle représentée.', '2025-09-30');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mot_de_passe` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `nom`, `email`, `mot_de_passe`) VALUES
(1, 'NABALOUM', 'latif70@gmail.com', 'Latif@70');

-- --------------------------------------------------------

--
-- Table structure for table `conferences`
--

CREATE TABLE `conferences` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `intervenant` text NOT NULL,
  `organisme` varchar(255) NOT NULL,
  `date_conference` varchar(255) NOT NULL,
  `theme` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `conferences`
--

INSERT INTO `conferences` (`id`, `titre`, `intervenant`, `organisme`, `date_conference`, `theme`, `description`) VALUES
(1, 'Conférence inaugurale : Tourisme et intégration des peuples du Sahel', 'Adama Siguiré\r\n  ', 'Commission nationale de l\'Alliance des États du Sahel (AES) — Vice-présidence chargée du développement', '2025-09-25', 'Tourisme et intégration régionale', 'Conférence d\'ouverture du SITHO 2025 portant sur le rôle du tourisme comme levier d\'intégration au sein de l\'AES. Elle a réuni 78 participants et a positionné le tourisme comme outil de cohésion sociale, de consolidation de la paix et de développement éco'),
(2, 'Panel : Transformation durable du tourisme — Journée mondiale du tourisme\r\n', ' \r\n\r\n    Intervenants multiples (non nominativement cités)', 'Ministère de la Communication, de la Culture, des Arts et du Tourisme du Burkina Faso', '2025-09-27', 'Développement durable et tourisme', 'Panel organisé le 27 septembre 2025 à l\'occasion de la 46e Journée mondiale du tourisme, célébrée chaque année le 27 septembre. Axé sur la transformation durable des pratiques touristiques dans un contexte sahélien.'),
(3, 'Allocution du représentant du Ghana : partage de patrimoine et de culture', 'Joseph K. Amoah\r\n  ', 'Ministère du Tourisme du Ghana', '2025-09-26', 'Coopération régionale et promotion culturelle', '\'Intervention du directeur de cabinet du ministre du tourisme du Ghana lors de la journée dédiée au pays invité d\'honneur. Il a insisté sur la nécessité de mieux présenter les nations, le patrimoine culturel et l\'histoire des peuples du Sahel et d\'Afrique'),
(4, 'Intervention de l\'ONU-Tourisme : développement des produits et innovation', 'Elcia Grandcourt', 'ONU-Tourisme — Direction régionale Afrique', '2025-09-25', 'Innovation et développement des produits touristiq', 'La Directrice régionale Afrique de l\'ONU-Tourisme a confirmé l\'engagement technique de l\'organisation pour le développement des produits touristiques burkinabè. Elle a décrit le SITHO comme un espace de dialogue, de connaissance et de partenariat orienté ');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `date_envoi` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `nom`, `prenom`, `email`, `message`, `date_envoi`) VALUES
(1, 'Zongo', 'Wendkonta ', 'wendkonta10@gmail.com', 'Je suis particulièrement heureux d\'avoir connu ce site pour me faire découvrir le sitho sans y être', '2025-09-10 15:12:15'),
(2, 'Pascal', 'Ouedraogo', 'pascal@gmail.com', 'Toujours un plaisir de revivre ces beaux moments', '2025-10-23 15:12:15'),
(3, 'Kaboré', 'Wilfrid', 'wilfrid10@mail.com', 'Heureux d\'avoir connu ce site', '2025-11-13 15:12:15'),
(4, 'Kambou', 'Rose', 'rosekambou@gmail.com', 'Je suis très heureuse de découvrir le sitho par votre site', '2026-04-09 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `exposants`
--

CREATE TABLE `exposants` (
  `id` int(11) NOT NULL,
  `nom_exposant` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `localisation` varchar(255) DEFAULT NULL,
  `domaine` varchar(255) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exposants`
--

INSERT INTO `exposants` (`id`, `nom_exposant`, `photo`, `localisation`, `domaine`, `description`) VALUES
(1, 'Village Artisanal de Ouaga', 'images/expo1.jpg', 'SIAO, Ouagadougou', 'Artisanat', 'Exposition de sculptures en bronze et masques traditionnels.'),
(2, 'Tissage du Faso', 'images/expo2.jpg', 'SIAO, Ouagadougou', 'Textile', 'Promotion du Faso Dan Fani et des pagnes tissés main.'),
(3, 'Poterie de Maane', 'images/expo3.jpg', 'SIAO, Ouagadougou', 'Artisanat', 'Vannerie et poteries décoratives faites à la main.'),
(4, 'Délices de Ouaga', 'images/mets1.jpg', 'SIAO, Ouagadougou', 'Gastronomie', 'Le meilleur du Riz Gras et du Poulet Bicyclette.'),
(5, 'Tradition & Goût', 'images/mets2.jpg', 'SIAO, Ouagadougou', 'Gastronomie', 'Spécialiste du Tô traditionnel avec sa sauce gombo.'),
(6, 'Saveurs du Terroir', 'images/mets3.jpg', 'SIAO, Ouagadougou', 'Gastronomie', 'Dégustation de Gonré et mets locaux du Burkina.');

-- --------------------------------------------------------

--
-- Table structure for table `galeries`
--

CREATE TABLE `galeries` (
  `id` int(11) NOT NULL,
  `type` enum('image','video') DEFAULT NULL,
  `fichier` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `galeries`
--

INSERT INTO `galeries` (`id`, `type`, `fichier`, `description`) VALUES
(1, 'image', 'images/sitho1.jpg', 'Cascade de Karfiguela(Banfora)'),
(2, 'image', 'images/sitho2.jpg', 'Cour Royale de Tiebele'),
(3, 'image', 'images/sitho3.jpg', 'Hotel Silmande'),
(4, 'image', 'images/sitho7.jpg', 'Pics de Sindou vu du ciel'),
(5, 'image', 'images/sitho8.jpg', 'Jeep Militaire du Capitaine Thomas Sankara'),
(6, 'image', 'images/sitho9.jpg', 'Memorial Thomas Sankara'),
(7, 'image', 'images/sitho10.jpg', 'Monument des Martyrs sis a Ouaga 2000'),
(8, 'image', 'images/sitho11.jpg', 'Musee national du Burkina Faso'),
(9, 'image', 'images/sitho12.jpg', 'Pics de Sindou vu du sol'),
(10, 'image', 'images/sitho13.jpg', 'Dernier demeure du Capitaine Thomas Sankara et de ses 12 Compagnons assasines au seins du memorial Thomas Sankara qui fait objet de visite de dizaines et de centaines de personnes au quotidien');

-- --------------------------------------------------------

--
-- Table structure for table `partenaires`
--

CREATE TABLE `partenaires` (
  `id` int(11) NOT NULL,
  `nom_structure` varchar(255) DEFAULT NULL,
  `statut` varchar(100) DEFAULT NULL,
  `localisation` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `partenaires`
--

INSERT INTO `partenaires` (`id`, `nom_structure`, `statut`, `localisation`, `logo`) VALUES
(1, 'Air Burkina', 'Transporteur Officiel', 'Avenue de la Nation', 'images/air_burkina.jpg'),
(2, 'Ministere de la Culture', 'Institutionnel', 'Ouagadougou', 'images/logo_ministere.png'),
(3, 'Hotel Silmande', 'Hebergement', 'Zone du Bois', 'images/silmande.png'),
(4, 'ONTB(Office National du Tourisme Burkinabè)', 'Partenaire technique', 'Koulouba', 'images/ontb_logo.png'),
(5, 'BOA(Bank Of Africa)', 'Sponsor Diamant', 'Quartier Projet', 'images/boa_logo.png'),
(6, 'BRAKINA', 'Partenaire Officiel', 'Zone Industrielle', 'images/logo_brakina.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activites`
--
ALTER TABLE `activites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `actualites`
--
ALTER TABLE `actualites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conferences`
--
ALTER TABLE `conferences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exposants`
--
ALTER TABLE `exposants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeries`
--
ALTER TABLE `galeries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partenaires`
--
ALTER TABLE `partenaires`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activites`
--
ALTER TABLE `activites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `actualites`
--
ALTER TABLE `actualites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `conferences`
--
ALTER TABLE `conferences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `exposants`
--
ALTER TABLE `exposants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `galeries`
--
ALTER TABLE `galeries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `partenaires`
--
ALTER TABLE `partenaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
