-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 21, 2024 at 09:09 PM
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
('000798e3-cf65-11ee-a9dd-c0bd740bda25', 'Dune 2', 'dune-2', '2024-03-19', '01:29', ' In \"Dune 2,\" the saga continues as Paul Atreides navigates the treacherous politics of Arrakis while harnessing his newfound powers as a Muad\'Dib. Amidst rebellion and intrigue, Paul confronts his destiny and faces off against old foes to secure the future of his people and the fate of the desert planet.', 'Timothée Chalamet, Zendaya, Florence Pugh, Rebecca Ferguson', 'Denis Villeneuve', 'b5bed01c-ce8f-11ee-82e6-af91c93ed985', '****', 'uploads/dune-deuxieme-partie.png', '2024-02-19 21:25:19', '2024-02-19 21:25:19'),
('031ddbce-d0f5-11ee-bd64-e2581355723b', 'How to loose a guy in 10 days', 'how-to-loose-a-guy-in-ten-days', '2024-02-07', '01:01', 'wgnwdgbwsfvs', 'nwxgbwsfbwsf', 'dgnwfgnxfgnd', 'eccec20f-cf68-11ee-a9dd-c0bd740bda25', '****', 'Array', '2024-02-21 21:08:43', '2024-02-21 21:08:43'),
('05ef614c-cf63-11ee-a9dd-c0bd740bda25', 'Alien Romulus', 'alien-romulus', '2024-08-16', '01:49', ' In \"Alien Romulus,\" a team of astronauts discovers a mysterious planet, Romulus, harboring advanced alien life. As they explore, they uncover a dark secret: the aliens are plotting to invade Earth. Amidst betrayal and interstellar warfare, they must race against time to stop the impending threat and save humanity.', 'Cailee Spaeny, Isabela Merced, David Jonsson, Archie Renaux, Spike Fearn, Aileen Wu', 'Fede Alvarez', 'b5bed01c-ce8f-11ee-82e6-af91c93ed985', '*****', 'uploads/alien-romulus.jpg', '2024-02-19 21:11:10', '2024-02-19 21:11:10'),
('257bcc4b-cf6b-11ee-a9dd-c0bd740bda25', 'Mr and Ms Smith', 'mr-and-ms-smith', '2005-10-19', '02:00', 'In \"Mr. & Mrs. Smith,\" a seemingly ordinary couple\'s marriage is put to the test when they discover they are both highly skilled assassins hired to kill each other. As their secret lives collide, they engage in a high-stakes game of cat and mouse filled with explosive action and unexpected twists. Amidst the chaos, they must navigate their feelings for each other while dodging bullets and evading capture, ultimately redefining the meaning of trust and love.', 'Brad Pitt, Angelina Jolie', 'Doug Liman', '9f9d0780-ce8f-11ee-82e6-af91c93ed985', '***', 'uploads/p35901-p-v8-aa.jpg', '2024-02-19 22:09:19', '2024-02-19 22:09:19'),
('4691990c-cf68-11ee-a9dd-c0bd740bda25', 'Inception', 'inception', '2010-07-08', '02:28', ' In \"Inception,\" a mind-bending thriller, Dom Cobb leads a team of specialists who enter the dreams of others to steal secrets. When tasked with planting an idea instead of stealing one, Cobb faces his deepest fears and confronts his haunting past. Amidst layers of reality and deception, Cobb navigates a labyrinth of dreams within dreams, challenging the boundaries of perception and grappling with the consequences of his actions.', ' Leonardo DiCaprio, Ken Watanabe, Joseph Gordon-Levitt, Marion Cotillard, Elliot Page, Tom Hardy, Cillian Murphy, Tom Berenger, Michael Caine', 'Christopher Nolan', 'b5bed01c-ce8f-11ee-82e6-af91c93ed985', '****', 'uploads/untitled-2.jpg', '2024-02-19 21:48:46', '2024-02-19 21:48:46'),
('46f65f39-cf69-11ee-a9dd-c0bd740bda25', 'Contratiempo', 'contratiempo', '2016-08-02', '01:46', ' In \"Contratiempo\" (\"The Invisible Guest\"), a wealthy businessman seeks help from a prestigious lawyer after waking up next to his dead lover. As he recounts the events leading to her demise, truths unravel and secrets surface. With time ticking and suspense escalating, the lawyer navigates a maze of deception, uncovering shocking twists that redefine innocence and guilt.', 'Mario Casas, Ana Wagener, José Coronado, Bárbara Lennie', 'Oriol Paulo', 'eccec20f-cf68-11ee-a9dd-c0bd740bda25', '****', 'uploads/contratiempo.jpg', '2024-02-19 21:55:56', '2024-02-19 21:55:56'),
('7b5b937d-cf6a-11ee-a9dd-c0bd740bda25', 'The Revenant', 'the-revenant', '2015-02-19', '02:36', ' In \"The Revenant,\" a frontiersman seeks vengeance against those who left him for dead after a brutal bear attack. Enduring the harsh wilderness and confronting his own mortality, he embarks on a relentless quest for justice. Amidst the unforgiving landscape and encounters with both allies and adversaries, he grapples with his primal instincts and finds redemption in the most unlikely places.', 'Leonardo DiCaprio, Tom Hardy, Domhnall Gleeson, Will Poulter', 'Alejandro González Iñárritu', '32d34e58-cf6a-11ee-a9dd-c0bd740bda25', '*****', 'uploads/the-revenant.jpg', '2024-02-19 22:04:33', '2024-02-19 22:04:33'),
('a1994456-cf6c-11ee-a9dd-c0bd740bda25', 'The Martian', 'the-marthian', '2015-09-11', '02:22', ' In \"The Martian,\" an astronaut, stranded on Mars, battles the hostile environment and dwindling resources to survive. With ingenuity and resilience, he defies the odds, relying on his scientific expertise and unyielding spirit. As NASA races against time to rescue him, his story becomes a testament to human endurance and the indomitable will to overcome adversity.', ' Matt Damon, Jessica Chastain, Kristen Wiig, Jeff Daniels, Michael Peña, Sean Bean, Kate Mara, Sebastian Stan, Aksel Hennie, Mackenzie Davis, Benedict Wong, Donald Glover, Chen Shu, Eddy Ko, Chiwetel Ejiofor', 'Ridley Scott', 'b5bed01c-ce8f-11ee-82e6-af91c93ed985', '****', 'uploads/91lfvesft8l.jpg', '2024-02-19 22:19:56', '2024-02-19 22:19:56'),
('a582202d-cf66-11ee-a9dd-c0bd740bda25', 'El Hoyo', 'el-hoyo', '2019-06-19', '01:34', ' In \"El Hoyo\" (\"The Platform\"), prisoners in a vertical prison are fed via a descending platform. As they struggle for survival, a man forms an unlikely alliance to change the system. Their journey through greed, desperation, and solidarity unveils the depths of human nature and the stark realities of inequality. Amidst chaos and sacrifice, they strive to bring light to the darkness of their dystopian existence.', 'Ivan Massagué, Antonia San Juan, Emilio Buale, ', 'Galder Gaztelu-Urrutia', '4d01254e-cf65-11ee-a9dd-c0bd740bda25', '*****', 'uploads/el-hoyo-987825598-large-l-cover.jpg', '2024-02-19 21:37:06', '2024-02-19 21:37:06'),
('a5b2e119-cf65-11ee-a9dd-c0bd740bda25', 'Joker: Folie à deux', 'joker-folie-a-deux', '2024-04-19', '02:19', ' In \"Joker: Folie à Deux,\" a psychological thriller, two strangers with fractured minds cross paths in a bleak cityscape. Their shared delusions blur the lines between reality and madness, culminating in a chaotic descent into anarchy. As their twisted bond deepens, they embrace their alter egos, unleashing a wave of mayhem that grips the city in fear, forcing society to confront its own darkness.', 'Joaquin Phoenix, Lady Gaga, Zazie Beetz, Brendan Gleeson, Catherine Keener', 'Todd Phillips', '4d01254e-cf65-11ee-a9dd-c0bd740bda25', '*****', 'uploads/joker-folie-a-deux.png', '2024-02-19 21:29:57', '2024-02-19 21:29:57'),
('c576e7f4-cf67-11ee-a9dd-c0bd740bda25', 'Oppenheimer', 'oppenheimer', '2023-07-11', '03:00', ' In \"Oppenheimer,\" a biographical drama, the brilliant physicist J. Robert Oppenheimer grapples with his conscience as he spearheads the Manhattan Project to develop the atomic bomb. Amidst political intrigue and moral dilemmas, Oppenheimer faces the devastating consequences of his creation and wrestles with the weight of his contributions to history. His journey unveils the complexities of science, power, and the human condition in the face of unprecedented technological advancement.', 'Cillian Murphy, Emily Blunt, Matt Damon, Robert Downey Jr., Florence Pugh, Josh Hartnett, Casey Affleck, Rami Malek, Kenneth Branagh', 'Christopher Nolan', '5b7b21fc-cf67-11ee-a9dd-c0bd740bda25', '*****', 'uploads/oppenheimer.jpg', '2024-02-19 21:45:09', '2024-02-19 21:45:09'),
('d8fed455-cf6b-11ee-a9dd-c0bd740bda25', 'PS. I love you', 'ps-i-love-you', '2007-12-21', '02:05', ' In \"P.S. I Love You,\" a young widow receives a series of letters from her late husband, each one guiding her through grief and encouraging her to embrace life again. As she follows his posthumous instructions, she embarks on a journey of self-discovery, love, and healing. Through laughter and tears, she learns to let go of the past and embrace the future, ultimately finding solace in the enduring power of love and memory.', 'Hilary Swank, Gerard Butler, Lisa Kudrow, Harry Connick Jr., Gina Gershon, Jeffrey Dean, Morgan Kathy Bates', 'Richard LaGravenese', 'ba332b23-ce8f-11ee-82e6-af91c93ed985', '****', 'uploads/ps-i-love-you-film.jpg', '2024-02-19 22:14:20', '2024-02-19 22:14:20'),
('f3475e65-cf69-11ee-a9dd-c0bd740bda25', 'Brave', 'brave', '2012-06-12', '01:33', ' In \"Brave,\" a spirited princess defies tradition and inadvertently unleashes chaos in her kingdom. To undo her mistake, she embarks on a perilous journey filled with mythical creatures and magical encounters. Along the way, she discovers the true meaning of bravery and the importance of embracing one\'s destiny. With wit and determination, she must reconcile her own desires with the expectations of her people to restore harmony to the realm.', 'Kelly Macdonald, Emma Thompson, Billy Connolly, Julie Walters, Robbie Coltrane, Kevin McKidd, Craig Ferguson', 'Mark Andrews, Brenda Chapman', '9936ab49-cf69-11ee-a9dd-c0bd740bda25', '****', 'uploads/91z5ijqcyol.jpg', '2024-02-19 22:00:45', '2024-02-19 22:00:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`) USING BTREE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
