-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 21, 2019 at 04:42 AM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rush00`
--

-- --------------------------------------------------------

--
-- Table structure for table `ft_categories`
--

CREATE TABLE `ft_categories` (
  `category_ID` bigint(20) NOT NULL,
  `category_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ft_categories`
--

INSERT INTO `ft_categories` (`category_ID`, `category_name`, `category_description`, `category_image`, `category_active`) VALUES
(1, 'Mac', 'Avec le MacBook Pro, l’ordinateur portable atteint des sommets inédits en matière de performances et de portabilité. Quelles que soient les contrées où vous mènera votre imagination, vous parviendrez plus vite que jamais à vos objectifs grâce, entre autres, à des processeurs et à une mémoire hautes performances, à des graphismes avancés et à un système de stockage d’une rapidité fulgurante.', 'img/category/cat_mac.png', 1),
(2, 'iPad', 'Il est tout nouveau, tout écran, tout puissant.\r\nIl est tout nouveau, tout écran, tout puissant. Il renferme nos technologies les plus avancées dans un design complètement réinventé. Il va vous surprendre, vous impressionner, vous émerveiller.', 'img/category/cat_ipad.png', 1),
(3, 'iPhone', 'Un triple appareil photo visionnaire qui démultiplie vos possibilités sans ajouter la moindre complexité. Une autonomie qui fait un bond en avant sans précédent. Une puce surpuissante qui va deux fois plus loin en matière d’apprentissage automatique et repousse les limites de ce qu’un smart­phone peut faire. Les capacités de cet iPhone sont telles qu’il est le premier à décrocher l’appellation Pro. Et il la mérite.', 'img/category/cat_iphone.png', 1),
(4, 'Watch', 'La version la plus élégante de l’Apple Watch est de retour avec deux matériaux emblématiques : le titane et la céramique. Réunissant toutes les innovations de la Series 5 et le savoir-faire de l’horlogerie traditionnelle, elle est à la fois intemporelle et résolument dans l’air du temps.', 'img/category/cat_watch.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ft_orderdetails`
--

CREATE TABLE `ft_orderdetails` (
  `id` bigint(20) NOT NULL,
  `order_ID` bigint(20) UNSIGNED NOT NULL,
  `product_ID` bigint(20) UNSIGNED NOT NULL,
  `product_price` float NOT NULL,
  `product_quantity` int(100) UNSIGNED NOT NULL,
  `product_total` float NOT NULL,
  `product_color` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ft_orderdetails`
--

INSERT INTO `ft_orderdetails` (`id`, `order_ID`, `product_ID`, `product_price`, `product_quantity`, `product_total`, `product_color`) VALUES
(1, 1, 1, 1799, 1, 1799, 'gray'),
(2, 1, 7, 1159, 1, 1159, 'black'),
(3, 2, 7, 1159, 1, 1159, 'black'),
(4, 2, 10, 449, 1, 449, 'gold'),
(5, 3, 5, 569, 2, 1138, 'white'),
(6, 4, 11, 179, 5, 895, 'white');

-- --------------------------------------------------------

--
-- Table structure for table `ft_orders`
--

CREATE TABLE `ft_orders` (
  `order_ID` bigint(20) UNSIGNED NOT NULL,
  `user_ID` bigint(20) UNSIGNED NOT NULL,
  `order_date` date NOT NULL,
  `order_total` float NOT NULL,
  `order_paid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ft_orders`
--

INSERT INTO `ft_orders` (`order_ID`, `user_ID`, `order_date`, `order_total`, `order_paid`) VALUES
(1, 1, '2019-10-19', 2958, 1),
(2, 1, '2019-10-18', 1608, 1),
(3, 1, '2019-10-18', 1138, 1),
(4, 1, '2019-10-18', 895, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ft_products`
--

CREATE TABLE `ft_products` (
  `product_ID` bigint(20) UNSIGNED NOT NULL,
  `category_ID` bigint(20) NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` float NOT NULL,
  `product_image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_stock` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ft_products`
--

INSERT INTO `ft_products` (`product_ID`, `category_ID`, `product_name`, `product_description`, `product_price`, `product_image`, `product_color`, `product_stock`) VALUES
(1, 1, 'Macbook Pro', 'Avec le MacBook Pro, l’ordinateur portable atteint des sommets inédits en matière de performances et de portabilité. Quelles que soient les contrées où vous mènera votre imagination, vous parviendrez plus vite que jamais à vos objectifs grâce, entre autres, à des processeurs et à une mémoire hautes performances, à des graphismes avancés et à un système de stockage d’une rapidité fulgurante.', 1799, 'img/product/macbook_pro.png', 'gray', 1),
(2, 1, 'Macbook Air', 'Il y a de nouvelles raisons de s’éprendre du Mac le plus populaire au monde. Disponible en argent, gris sidéral et or, le nouveau MacBook Air, plus fin et plus léger, réunit un superbe écran Retina avec technologie True Tone, Touch ID, un clavier de dernière génération et un trackpad Force Touch.	Son boîtier au design iconique est constitué d’aluminium 100 % recyclé, ce qui en fait le Mac le plus respectueux de l’environ­nement jamais créé1. Et avec son autonomie d’une journée, il vous permet de tout faire, partout.', 1299, 'img/product/macbook_air.png', 'gray', 1),
(3, 1, 'iMac', 'L’iMac, un monstre ? De puissance, c’est certain. De beauté, aussi. C’est d’ailleurs toute l’idée sur laquelle il repose depuis le début : transformer l’utilisation d’un ordinateur de bureau en une fabuleuse expérience, en intégrant des technologies puissantes et faciles à utiliser dans un élégant design tout‑en‑un. Et cette fois, le nouvel iMac va encore plus loin. Non seulement il est équipé de processeurs dernier cri, de prodigieux outils, d’une mémoire plus rapide et d’une carte graphique impressionnante, mais tous ces atouts sont mis en valeur par l’écran Retina le plus lumineux et le plus spectaculaire jamais vu sur un Mac. Il a tout, en encore plus puissant.', 2499, 'img/product/imac.png', 'gray', 1),
(4, 2, 'iPad Pro', 'Le nouvel écran Liquid Retina s’étend d’un bord à l’autre de l’iPad Pro. Ses couleurs saisissantes de réalisme et sa technologie ProMotion ultra‑réactive donnent à tout ce qui s’y affiche une beauté et une fluidité sensationnelles.', 899, 'img/product/ipad_pro.png', 'black', 1),
(5, 2, 'iPad Air', 'Avec l’iPad Air, nos technologies les plus puissantes sont désormais accessibles à un plus grand nombre. Puce A12 Bionic avec Neural Engine. Écran Retina de 10,5 pouces avec affichage True Tone. Compatibilité avec l’Apple Pencil et le Smart Keyboard. Dans un poids plume inférieur à 500 g pour une épaisseur de 6,1 mm seulement. Une puissance formidable qui va vous donner des ailes.', 569, 'img/product/ipad_air.png', 'white', 1),
(6, 2, 'iPad mini', 'L’iPad mini est plébiscité pour sa taille et pour les possibilités qu’il offre. Aujourd’hui, il y a encore plus de raisons de l’aimer. Des exemples ? La puce A12 Bionic avec Neural Engine. Un écran Retina de 7,9 pouces avec affichage True Tone. Sans oublier l’Apple Pencil, qui vous permet de saisir au vol vos idées les plus lumineuses. C’est toujours l’iPad mini. Et, plus que jamais, il fait le maximum.', 469, 'img/product/ipad_mini.png', 'white', 1),
(7, 3, 'iPhone 11 Pro', 'L’iPhone 11 Pro tourne des vidéos magnifiques et plus vraies que nature, avec un niveau de détail accru et plus de fluidité dans les mouvements. Grâce à une puissance de traitement phénoménale, il est capable de filmer en 4K avec une gamme dynamique étendue et une stabilisation vidéo de qualité cinéma. Le tout, à 60 images par seconde. Entre le cadrage quatre fois plus vaste que vous propose l’ultra grand-angle et la nouvelle gamme d’outils de retouches dont vous disposez, vous avez de quoi vous amuser.', 1159, 'img/product/iphone_11_pro.png', 'black', 1),
(8, 3, 'iPhone 11', 'Un nouveau double appareil photo conçu pour élargir vos horizons. Une puce plus rapide que toutes les autres puces de smart­phone. Une autonomie d’une journée, pour passer plus de temps à faire ce que vous aimez et moins à recharger. Et la meilleure qualité vidéo sur smartphone, pour embellir tous vos souvenirs.', 809, 'img/product/iphone_11.png', 'white', 1),
(9, 3, 'iPhone 8', 'L\'iPhone 8 est en quelque sorte ce bon élève qui énerve les professeurs en ne faisant que le strict nécessaire pour maintenir de bons résultats. Il est à la fois réussi et frustrant. On regrette de ne pas voir plus d\'évolutions physiques sur ce terminal, mais il reste l\'un des meilleurs smartphones de moins de 5 pouces du marché. Il renforce ses acquis, sans vraiment prendre la peine de se surpasser.', 809, 'img/product/iphone_8.png', 'black', 1),
(10, 4, 'Apple Watch', 'Cette montre a un écran toujours activé.\r\nAvec le nouvel écran Retina toujours activé, vous voyez votre cadran et l’heure qu’il est à tout moment.', 449, 'img/product/watch.jpg', 'black', 1),
(11, 3, 'AirPods', 'Plus magiques que jamais.\r\nTemps de conversation augmenté, activation vocale de Siri et nouveau boîtier de charge sans fil. Les nouveaux AirPods sont des écouteurs sans fil, et sans commune mesure. Retirez-les de leur boîtier et ils fonctionnent tout de suite avec tous vos appareils. Portez-les à vos oreilles et ils se connectent immédiatement pour vous faire profiter d’un son de haute qualité parfaitement détaillé. Plus que géniaux, ils sont magiques.', 179, 'img/product/airpods.jpg', 'white', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ft_users`
--

CREATE TABLE `ft_users` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `user_email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_pass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_registered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_firstname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_level` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ft_users`
--

INSERT INTO `ft_users` (`ID`, `user_email`, `user_pass`, `user_registered`, `user_firstname`, `user_name`, `user_level`) VALUES
(1, 'valecart@student.42.fr', '251fb65591159560c438a093b5c5b1580c30435c24ce76ef0a6bffa518ff9fc55deb5bcba1d142f1356e6063e047c4f629b5bcbd1ffb6491b47710d491eee3ea', '2019-10-19 16:22:55', 'Valentin', 'Lécart', 1),
(2, 'thboura@student.42.fr', '4cd2e2be4179965fe1f774a1a4c96424e4aa3887b3b03b9d2fcbb86d9ffb4967eeba5f0a527d71252fbdfe7b12a9fb8a82e8d24efe606537edce611991bb18e1', '2019-10-19 16:22:55', 'Thomas', 'Boura', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ft_categories`
--
ALTER TABLE `ft_categories`
  ADD UNIQUE KEY `category_ID` (`category_ID`);

--
-- Indexes for table `ft_orderdetails`
--
ALTER TABLE `ft_orderdetails`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `ft_orders`
--
ALTER TABLE `ft_orders`
  ADD UNIQUE KEY `order_ID` (`order_ID`);

--
-- Indexes for table `ft_products`
--
ALTER TABLE `ft_products`
  ADD UNIQUE KEY `product_ID` (`product_ID`);

--
-- Indexes for table `ft_users`
--
ALTER TABLE `ft_users`
  ADD UNIQUE KEY `user_ID` (`ID`),
  ADD UNIQUE KEY `user_email` (`user_email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
