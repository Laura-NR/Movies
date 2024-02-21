-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 21, 2024 at 09:28 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movies`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` varchar(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name_category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_category`, `created`, `modified`) VALUES
('00684fa9-cf69-11ee-a9dd-c0bd740bda25', 'Mystère', '2024-02-19 21:53:58', '2024-02-19 21:53:58'),
('32d34e58-cf6a-11ee-a9dd-c0bd740bda25', 'Western', '2024-02-19 22:02:32', '2024-02-19 22:02:32'),
('4d01254e-cf65-11ee-a9dd-c0bd740bda25', 'Thriller Psychologique', '2024-02-19 21:27:28', '2024-02-19 21:27:28'),
('5252d144-cf65-11ee-a9dd-c0bd740bda25', 'Musical', '2024-02-19 21:27:37', '2024-02-19 21:27:37'),
('5b7b21fc-cf67-11ee-a9dd-c0bd740bda25', 'Biographique', '2024-02-19 21:42:11', '2024-02-19 21:42:11'),
('9936ab49-cf69-11ee-a9dd-c0bd740bda25', 'Fantasie', '2024-02-19 21:58:14', '2024-02-19 21:58:14'),
('9f9d0780-ce8f-11ee-82e6-af91c93ed985', 'Action', '2024-02-18 19:57:54', '2024-02-18 19:57:54'),
('afc4a6bd-ce8f-11ee-82e6-af91c93ed985', 'Horror', '2024-02-18 19:58:21', '2024-02-18 19:58:21'),
('b5bed01c-ce8f-11ee-82e6-af91c93ed985', 'Science-Fiction', '2024-02-18 19:58:31', '2024-02-18 19:58:31'),
('ba332b23-ce8f-11ee-82e6-af91c93ed985', 'Romance', '2024-02-18 19:58:39', '2024-02-18 19:58:39'),
('c05d55fa-ce8f-11ee-82e6-af91c93ed985', 'Comedy', '2024-02-18 19:58:49', '2024-02-18 19:58:49'),
('c63f0c3f-ce8f-11ee-82e6-af91c93ed985', 'Adventure', '2024-02-18 19:58:59', '2024-02-18 19:58:59'),
('eccec20f-cf68-11ee-a9dd-c0bd740bda25', 'Policier', '2024-02-19 21:53:25', '2024-02-19 21:53:25');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` varchar(36) COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_release` date DEFAULT NULL,
  `duration` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `synopsis` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `casting` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `director` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `category` varchar(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `note_press` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `poster` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `slug`, `date_release`, `duration`, `synopsis`, `casting`, `director`, `category`, `note_press`, `poster`, `created`, `modified`) VALUES
('000798e3-cf65-11ee-a9dd-c0bd740bda25', 'Dune 2', NULL, '2024-03-19', '01:29', ' In \"Dune 2,\" the saga continues as Paul Atreides navigates the treacherous politics of Arrakis while harnessing his newfound powers as a Muad\'Dib. Amidst rebellion and intrigue, Paul confronts his destiny and faces off against old foes to secure the future of his people and the fate of the desert planet.', 'Timothée Chalamet, Zendaya, Florence Pugh, Rebecca Ferguson', 'Denis Villeneuve', 'b5bed01c-ce8f-11ee-82e6-af91c93ed985', '****', 'uploads/dune-deuxieme-partie.png', '2024-02-19 21:25:19', '2024-02-19 21:25:19'),
('05ef614c-cf63-11ee-a9dd-c0bd740bda25', 'Alien Romulus', NULL, '2024-08-16', '01:49', ' In \"Alien Romulus,\" a team of astronauts discovers a mysterious planet, Romulus, harboring advanced alien life. As they explore, they uncover a dark secret: the aliens are plotting to invade Earth. Amidst betrayal and interstellar warfare, they must race against time to stop the impending threat and save humanity.', 'Cailee Spaeny, Isabela Merced, David Jonsson, Archie Renaux, Spike Fearn, Aileen Wu', 'Fede Alvarez', 'b5bed01c-ce8f-11ee-82e6-af91c93ed985', '*****', 'uploads/alien-romulus.jpg', '2024-02-19 21:11:10', '2024-02-19 21:11:10'),
('257bcc4b-cf6b-11ee-a9dd-c0bd740bda25', 'Mr and Ms Smith', NULL, '2005-10-19', '02:00', 'In \"Mr. & Mrs. Smith,\" a seemingly ordinary couple\'s marriage is put to the test when they discover they are both highly skilled assassins hired to kill each other. As their secret lives collide, they engage in a high-stakes game of cat and mouse filled with explosive action and unexpected twists. Amidst the chaos, they must navigate their feelings for each other while dodging bullets and evading capture, ultimately redefining the meaning of trust and love.', 'Brad Pitt, Angelina Jolie', 'Doug Liman', '9f9d0780-ce8f-11ee-82e6-af91c93ed985', '***', 'uploads/p35901-p-v8-aa.jpg', '2024-02-19 22:09:19', '2024-02-19 22:09:19'),
('4691990c-cf68-11ee-a9dd-c0bd740bda25', 'Inception', NULL, '2010-07-08', '02:28', ' In \"Inception,\" a mind-bending thriller, Dom Cobb leads a team of specialists who enter the dreams of others to steal secrets. When tasked with planting an idea instead of stealing one, Cobb faces his deepest fears and confronts his haunting past. Amidst layers of reality and deception, Cobb navigates a labyrinth of dreams within dreams, challenging the boundaries of perception and grappling with the consequences of his actions.', ' Leonardo DiCaprio, Ken Watanabe, Joseph Gordon-Levitt, Marion Cotillard, Elliot Page, Tom Hardy, Cillian Murphy, Tom Berenger, Michael Caine', 'Christopher Nolan', 'b5bed01c-ce8f-11ee-82e6-af91c93ed985', '****', 'uploads/untitled-2.jpg', '2024-02-19 21:48:46', '2024-02-19 21:48:46'),
('46f65f39-cf69-11ee-a9dd-c0bd740bda25', 'Contratiempo', NULL, '2016-08-02', '01:46', ' In \"Contratiempo\" (\"The Invisible Guest\"), a wealthy businessman seeks help from a prestigious lawyer after waking up next to his dead lover. As he recounts the events leading to her demise, truths unravel and secrets surface. With time ticking and suspense escalating, the lawyer navigates a maze of deception, uncovering shocking twists that redefine innocence and guilt.', 'Mario Casas, Ana Wagener, José Coronado, Bárbara Lennie', 'Oriol Paulo', 'eccec20f-cf68-11ee-a9dd-c0bd740bda25', '****', 'uploads/contratiempo.jpg', '2024-02-19 21:55:56', '2024-02-19 21:55:56'),
('7b5b937d-cf6a-11ee-a9dd-c0bd740bda25', 'The Revenant', NULL, '2015-02-19', '02:36', ' In \"The Revenant,\" a frontiersman seeks vengeance against those who left him for dead after a brutal bear attack. Enduring the harsh wilderness and confronting his own mortality, he embarks on a relentless quest for justice. Amidst the unforgiving landscape and encounters with both allies and adversaries, he grapples with his primal instincts and finds redemption in the most unlikely places.', 'Leonardo DiCaprio, Tom Hardy, Domhnall Gleeson, Will Poulter', 'Alejandro González Iñárritu', '32d34e58-cf6a-11ee-a9dd-c0bd740bda25', '*****', 'uploads/the-revenant.jpg', '2024-02-19 22:04:33', '2024-02-19 22:04:33'),
('a1994456-cf6c-11ee-a9dd-c0bd740bda25', 'The Martian', NULL, '2015-09-11', '02:22', ' In \"The Martian,\" an astronaut, stranded on Mars, battles the hostile environment and dwindling resources to survive. With ingenuity and resilience, he defies the odds, relying on his scientific expertise and unyielding spirit. As NASA races against time to rescue him, his story becomes a testament to human endurance and the indomitable will to overcome adversity.', ' Matt Damon, Jessica Chastain, Kristen Wiig, Jeff Daniels, Michael Peña, Sean Bean, Kate Mara, Sebastian Stan, Aksel Hennie, Mackenzie Davis, Benedict Wong, Donald Glover, Chen Shu, Eddy Ko, Chiwetel Ejiofor', 'Ridley Scott', 'b5bed01c-ce8f-11ee-82e6-af91c93ed985', '****', 'uploads/91lfvesft8l.jpg', '2024-02-19 22:19:56', '2024-02-19 22:19:56'),
('a582202d-cf66-11ee-a9dd-c0bd740bda25', 'El Hoyo', NULL, '2019-06-19', '01:34', ' In \"El Hoyo\" (\"The Platform\"), prisoners in a vertical prison are fed via a descending platform. As they struggle for survival, a man forms an unlikely alliance to change the system. Their journey through greed, desperation, and solidarity unveils the depths of human nature and the stark realities of inequality. Amidst chaos and sacrifice, they strive to bring light to the darkness of their dystopian existence.', 'Ivan Massagué, Antonia San Juan, Emilio Buale, ', 'Galder Gaztelu-Urrutia', '4d01254e-cf65-11ee-a9dd-c0bd740bda25', '*****', 'uploads/el-hoyo-987825598-large-l-cover.jpg', '2024-02-19 21:37:06', '2024-02-19 21:37:06'),
('a5b2e119-cf65-11ee-a9dd-c0bd740bda25', 'Joker: Folie à deux', NULL, '2024-04-19', '02:19', ' In \"Joker: Folie à Deux,\" a psychological thriller, two strangers with fractured minds cross paths in a bleak cityscape. Their shared delusions blur the lines between reality and madness, culminating in a chaotic descent into anarchy. As their twisted bond deepens, they embrace their alter egos, unleashing a wave of mayhem that grips the city in fear, forcing society to confront its own darkness.', 'Joaquin Phoenix, Lady Gaga, Zazie Beetz, Brendan Gleeson, Catherine Keener', 'Todd Phillips', '4d01254e-cf65-11ee-a9dd-c0bd740bda25', '*****', 'uploads/joker-folie-a-deux.png', '2024-02-19 21:29:57', '2024-02-19 21:29:57'),
('c576e7f4-cf67-11ee-a9dd-c0bd740bda25', 'Oppenheimer', NULL, '2023-07-11', '03:00', ' In \"Oppenheimer,\" a biographical drama, the brilliant physicist J. Robert Oppenheimer grapples with his conscience as he spearheads the Manhattan Project to develop the atomic bomb. Amidst political intrigue and moral dilemmas, Oppenheimer faces the devastating consequences of his creation and wrestles with the weight of his contributions to history. His journey unveils the complexities of science, power, and the human condition in the face of unprecedented technological advancement.', 'Cillian Murphy, Emily Blunt, Matt Damon, Robert Downey Jr., Florence Pugh, Josh Hartnett, Casey Affleck, Rami Malek, Kenneth Branagh', 'Christopher Nolan', '5b7b21fc-cf67-11ee-a9dd-c0bd740bda25', '*****', 'uploads/oppenheimer.jpg', '2024-02-19 21:45:09', '2024-02-19 21:45:09'),
('d8fed455-cf6b-11ee-a9dd-c0bd740bda25', 'PS. I love you', NULL, '2007-12-21', '02:05', ' In \"P.S. I Love You,\" a young widow receives a series of letters from her late husband, each one guiding her through grief and encouraging her to embrace life again. As she follows his posthumous instructions, she embarks on a journey of self-discovery, love, and healing. Through laughter and tears, she learns to let go of the past and embrace the future, ultimately finding solace in the enduring power of love and memory.', 'Hilary Swank, Gerard Butler, Lisa Kudrow, Harry Connick Jr., Gina Gershon, Jeffrey Dean, Morgan Kathy Bates', 'Richard LaGravenese', 'ba332b23-ce8f-11ee-82e6-af91c93ed985', '****', 'uploads/ps-i-love-you-film.jpg', '2024-02-19 22:14:20', '2024-02-19 22:14:20'),
('f3475e65-cf69-11ee-a9dd-c0bd740bda25', 'Brave', NULL, '2012-06-12', '01:33', ' In \"Brave,\" a spirited princess defies tradition and inadvertently unleashes chaos in her kingdom. To undo her mistake, she embarks on a perilous journey filled with mythical creatures and magical encounters. Along the way, she discovers the true meaning of bravery and the importance of embracing one\'s destiny. With wit and determination, she must reconcile her own desires with the expectations of her people to restore harmony to the realm.', 'Kelly Macdonald, Emma Thompson, Billy Connolly, Julie Walters, Robbie Coltrane, Kevin McKidd, Craig Ferguson', 'Mark Andrews, Brenda Chapman', '9936ab49-cf69-11ee-a9dd-c0bd740bda25', '****', 'uploads/91z5ijqcyol.jpg', '2024-02-19 22:00:45', '2024-02-19 22:00:45');

-- --------------------------------------------------------

--
-- Table structure for table `movies_categories`
--

CREATE TABLE `movies_categories` (
  `movie_id` varchar(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `category_id` varchar(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pwd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role_id` int NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `pwd`, `role_id`, `last_login`, `created`, `modified`) VALUES
('13b9885b-ba9c-11ee-a136-b23c15b54d61', 'lau7@lau7.fr', '$2y$10$sqMnyWYyNkVcDfvAQ.IIVufkINmxps8O8KdMci6/1uQ6SpjmXfFj6', 1, '2024-02-18 21:46:00', '2024-01-24 10:36:40', '2024-01-24 10:36:40'),
('34e70e13-c1b3-11ee-94f9-83b2f1a462fe', 'lau8@lau8.fr', '$2y$10$S4D4foWJvzevyGHx8La7hO/a4yP0/51.n3sOSDOkY5obEtzdDE5nq', 1, NULL, '2024-02-02 11:09:52', '2024-02-02 11:09:52'),
('93455d8d-b9cc-11ee-afb3-2106b98e9b61', 'lau1@lau1.fr', '$2y$10$0ilGr6Lf2PUgARBPdgcPmuDLKo/7zg7MnmPAicFYWKDcVwQNyFuu6', 1, NULL, '2024-01-23 09:51:19', '2024-02-05 10:10:39'),
('a3249857-c1d6-11ee-94f9-83b2f1a462fe', 'lau9@lau9.fr', '$2y$10$Q3SGid/VXjo2UL3YlJBH4ONlluwImwBixCuJqDdofzY0yRvyEv4dS', 1, NULL, '2024-02-02 15:23:29', '2024-02-02 15:23:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`) USING BTREE;

--
-- Indexes for table `movies_categories`
--
ALTER TABLE `movies_categories`
  ADD PRIMARY KEY (`movie_id`,`category_id`),
  ADD KEY `fk_category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movies_categories`
--
ALTER TABLE `movies_categories`
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_movie_id` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
