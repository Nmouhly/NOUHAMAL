-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 18 oct. 2024 à 00:17
-- Version du serveur : 5.7.41
-- Version de PHP : 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `l2is`
--

-- --------------------------------------------------------

--
-- Structure de la table `axes`
--

CREATE TABLE `axes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `axes`
--

INSERT INTO `axes` (`id`, `title`, `content`, `created_at`, `updated_at`, `team_id`) VALUES
(2, '<p>Axe 1 : Intelligence Artificielle</p>', '<p>Ce premier axe se concentre sur le développement d\'algorithmes d\'intelligence artificielle appliqués à divers domaines, notamment la reconnaissance d\'images et le traitement du langage naturel.</p>', '2024-10-04 08:42:32', '2024-10-04 08:42:32', 1),
(3, '<p>Axe 2 : IoT et Sécurité</p>', '<p>L\'axe IoT explore les solutions innovantes pour les systèmes connectés, tout en intégrant la sécurité des objets intelligents.</p>', '2024-10-04 08:43:12', '2024-10-04 08:43:12', 2),
(4, '<p>Axe 3 : Cloud Computing</p>', '<p>Cet axe est dédié à la recherche sur l\'optimisation des infrastructures de cloud computing pour une meilleure gestion des ressources et des performances.</p>', '2024-10-04 08:43:45', '2024-10-04 08:47:48', 1);

-- --------------------------------------------------------

--
-- Structure de la table `brevets`
--

CREATE TABLE `brevets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('en attente','approuvé','rejeté') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en attente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `brevets`
--

INSERT INTO `brevets` (`id`, `title`, `author`, `doi`, `id_user`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Vers un système de recommandation touristique efficace utilisant l\'optimisation évolutive multi-objectifs', 'Said RAKRAK, amal AL KHYIA, Nouhaila MOUHLY', '10.1109/ICCAD60883.2024.10553845', '2,4,5', '2024-10-05 10:04:29', '2024-10-15 17:53:49', 'approuvé'),
(2, 'Un modèle d\'auto-apprentissage amélioré pour détecter les catégories de fausses nouvelles', 'Said RAKRAK, Omar BENCHAREF', '10.6977/IJoSI.202403_8(1)0002', '2', '2024-10-05 10:06:22', '2024-10-14 20:31:29', 'approuvé'),
(3, 'Enrichissement de l\'ontologie par l\'exploitation de systèmes de marquage collaboratifs : une approche sémantique contextuelle', 'sara QASSIMI, amal AL KHYIA, Nouhaila MOUHLY, Ahmed LATIF', '10.1109/SYSCO.2016.7831337', '3,4,5', '2024-10-05 14:34:51', '2024-10-15 17:53:49', 'approuvé'),
(4, 'Un jeu sérieux pour valoriser et promouvoir l\'entrepreneuriat des jeunes', 'Said RAKRAK, Nouhaila MOUHLY, Said LATIF', '10.1007/978-3-319-46568-5_8', '2', '2024-10-05 14:41:06', '2024-10-14 20:31:29', 'approuvé'),
(7, 'Enrichissement de l\'ontologie par l\'exploitation de systèmes de marquage collaboratifs', 'sara QASSIMI', '10.3214587/74521', '3', '2024-10-15 23:07:52', '2024-10-15 23:07:52', 'en attente');

-- --------------------------------------------------------

--
-- Structure de la table `conferences`
--

CREATE TABLE `conferences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `conferences`
--

INSERT INTO `conferences` (`id`, `title`, `date`, `location`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Célébration de la Nomination du Professeur Said Rakrak : Nouveau Doyen de la FST', '2024-09-23', 'Salle de conférences fstg', 'conference_images/JTkq0v56bkGeqjWNKw5GZh2fUjCTSz2p5D2RLWhh.jpg', '2024-10-05 10:18:05', '2024-10-05 10:18:27'),
(2, 'Big Data et Cloud Computing : Nouvelles Frontières', '2024-10-19', 'Salle i8', 'conference_images/RMTjMlpPyn1gH1WxUg0VMZEZs1lKR8TP1w1z453R.jpg', '2024-10-05 10:22:14', '2024-10-05 10:22:14'),
(3, 'Cybersécurité et Réseaux : Stratégies Modernes', '2024-10-24', 'Salle i7', 'conference_images/B8M6kU9eYrnI6ZcrZGXxFrusSelDZ0xIKfjU0JD9.jpg', '2024-10-05 10:23:19', '2024-10-05 10:23:19');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `habilitations`
--

CREATE TABLE `habilitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lieu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('en attente','approuvé','rejeté') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en attente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `habilitations`
--

INSERT INTO `habilitations` (`id`, `title`, `author`, `doi`, `id_user`, `lieu`, `date`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Gestion et exploitation de données capteurs : une approche basée sur la réduction de données.', 'sara QASSIMI, Aziz DAROUICHI', '10.32147/856974', '3', 'Faculté des sciences et techniques à FES', '2024-10-09', '2024-10-05 14:21:12', '2024-10-14 20:31:30', 'approuvé'),
(2, 'Distributed control of multi-agent systems under communication constraints : application to robotics. Automatic.', 'sara QASSIMI', '10.21478/84521', '3', 'Faculté Des Scinences et Techniques à TANGER', '2024-10-24', '2024-10-05 14:22:39', '2024-10-14 20:31:30', 'approuvé');

-- --------------------------------------------------------

--
-- Structure de la table `home_descriptions`
--

CREATE TABLE `home_descriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `home_descriptions`
--

INSERT INTO `home_descriptions` (`id`, `content`, `created_at`, `updated_at`) VALUES
(6, '<p><strong style=\"color: rgb(55, 48, 163);\">Le Laboratoire de l\'Ingénierie Informatique et des Systèmes (L2IS) est un centre de recherche affilié à la Faculté des Sciences et Techniques de Marrakech. Nos travaux de recherche s\'appuient sur des domaines variés tels que l\'Internet des Objets (IoT), l\'Intelligence Artificielle, la Data Science et le Big Data, l\'Ingénierie Pédagogique Universitaire, les Réseaux et la Sécurité, le Calcul Haute Performance (HPC), le Cloud DevOps, et le Management et la Gouvernance des Systèmes d\'Information. Le L2IS se distingue par son engagement à aborder des problématiques complexes au croisement des technologies de l\'information, des communications et des sciences de l\'ingénieur. Le L2IS regroupe un ensemble de chercheurs, professeurs et administrateurs qui assurent le bon déroulement des projets. Nous avons également une équipe dynamique de doctorants contribuant activement aux recherches. ;Le L2IS collabore avec divers partenaires industriels et académiques pour des projets de recherche appliquée. Parmi nos initiatives notables, nous menons des projets collaboratifs visant à développer des solutions innovantes pour des problématiques spécifiques, renforçant ainsi notre rôle dans le domaine de la recherche et du développement  test.</strong></p>', '2024-10-15 17:41:23', '2024-10-15 17:41:42');

-- --------------------------------------------------------

--
-- Structure de la table `job_offers`
--

CREATE TABLE `job_offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `requirements` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `deadline` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `job_offers`
--

INSERT INTO `job_offers` (`id`, `title`, `description`, `requirements`, `location`, `salary`, `deadline`, `created_at`, `updated_at`) VALUES
(1, 'Développeur Full Stack Senior', 'Nous recherchons un développeur Full Stack Senior expérimenté.', 'Expérience approfondie avec Laravel et React.', 'Marrakech', 15000.00, '2024-10-07', '2024-10-05 10:26:05', '2024-10-05 10:26:05'),
(2, 'Ingénieur en Machine Learning', 'Nous sommes à la recherche d\'un ingénieur en machine learning pour travailler sur des projets innovants dans le domaine de l\'intelligence artificielle. Vous développerez et mettrez en œuvre des modèles d\'apprentissage automatique pour des applications variées.', 'Master en informatique ou domaine connexe. Expérience en Python et bibliothèques comme TensorFlow ou PyTorch. Connaissance des algorithmes d\'apprentissage supervisé et non supervisé.', 'Casablanca, Maroc', 25000.00, '2024-10-06', '2024-10-05 10:27:03', '2024-10-05 10:28:33'),
(4, 'Chef de Projet IT', 'Nous sommes à la recherche d\'un Chef de Projet IT pour diriger nos projets technologiques. Vous serez responsable de la planification, de l\'exécution et de la clôture des projets tout en garantissant que les objectifs sont atteints dans les délais et le budget impartis.', 'Expérience confirmée en gestion de projets IT. Maîtrise des méthodologies Agile et Scrum. Compétences en communication et en leadership.', 'Rabat', 19999.99, '2024-10-11', '2024-10-15 18:53:04', '2024-10-15 18:53:04'),
(5, 'Développeur Front-End React', 'Nous recherchons un Développeur Front-End talentueux pour rejoindre notre équipe dynamique. Vous serez responsable de la création et de l\'optimisation d\'interfaces utilisateur pour nos applications web. Le candidat idéal aura une solide expérience avec React et une passion pour l\'innovation.', 'Expérience pratique avec React.js et Redux. Connaissance approfondie de HTML, CSS et JavaScript. Expérience avec des outils de versionnage comme Git.', 'France', 20000.00, '2024-10-25', '2024-10-15 18:54:02', '2024-10-15 18:54:02');

-- --------------------------------------------------------

--
-- Structure de la table `laboratoire`
--

CREATE TABLE `laboratoire` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_web` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_fondation` date DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `contact_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('actif','ancien') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'actif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `statut` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `members`
--

INSERT INTO `members` (`id`, `user_id`, `name`, `position`, `team_id`, `bio`, `contact_info`, `image`, `email`, `status`, `created_at`, `updated_at`, `statut`) VALUES
(1, 3, 'sara QASSIMI', 'Professeur', 1, 'Professeur à la faculté des Sciences et Techniques à Marrakech.', '0766764719', 'member_images/6711893e2e2af.png', 'saraqassimi1@gmail.com', 'actif', '2024-10-04 15:26:01', '2024-10-17 21:01:34', 'Membre'),
(2, 4, 'amal AL KHYIA', 'Étudiant', 1, 'Étudiante en deuxième année d\'ingénierie des réseaux et systèmes d\'information à la FSTG.', '0666764718', NULL, 'alkhyiaamal4@gmail.com', 'actif', '2024-10-04 15:28:05', '2024-10-04 15:28:05', 'Membre'),
(3, NULL, 'Nouhaila MOUHLY', 'Étudiant', 3, 'Étudiante en deuxième année d\'ingénierie des réseaux et systèmes d\'information à la FSTG.', '06481245856', NULL, 'nouhailamouhly@gmail.com', 'actif', '2024-10-04 15:28:28', '2024-10-17 18:21:17', 'Ancien'),
(4, 2, 'Said RAKRAK', 'Admin', 2, 'Le Professeur Said Rakrak est le directeur du laboratoire L2IS, affilié à la Faculté des Sciences et Techniques. Il a consacré sa carrière à la recherche dans des domaines tels que l\'intelligence artificielle, la science des données et l\'ingénierie des systèmes. En plus de ses fonctions au sein du laboratoire, il est devenu doyen de la Faculté des Sciences et Techniques, où il joue un rôle clé dans la promotion de l\'excellence académique et la formation des jeunes chercheurs.', '0666764718', 'member_images/vWmMO3CQfv2g9kYDD0kTYKy35UdddkPHMGZk7p9T.jpg', 'directeurlaboratoirel2is@gmail.com', 'actif', '2024-10-05 16:27:12', '2024-10-16 21:05:54', 'Membre');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT '0',
  `important` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `message`, `read`, `important`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 'Bonjour Monsieur le Directeur, je vous ai envoyé des publications et j\'attends votre réponse.', 1, 0, '2024-10-05 14:56:16', '2024-10-16 21:02:07'),
(2, 3, 2, 'Bonjour monsieur , j\'attend votre réponse pour le dernier message.', 0, 0, '2024-10-05 14:59:59', '2024-10-14 16:08:41'),
(3, 2, 3, 'Désolé pour le retard, j\'ai examiné les publications que vous avez envoyées et j\'ai accepté celles qui étaient acceptables.', 0, 0, '2024-10-05 15:11:03', '2024-10-05 15:11:03'),
(4, 2, 3, 'désolé pour le retard', 1, 0, '2024-10-13 20:37:45', '2024-10-13 21:44:28');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_07_31_151652_create_teams_table', 2),
(6, '2024_07_31_151824_create_members_table', 2),
(7, '2024_08_01_215041_create_laboratoire_table', 2),
(8, '2024_08_02_123859_add_statut_to_members_table', 2),
(9, '2024_08_06_143826_create_projects_table', 2),
(10, '2024_08_12_004829_create_seminars_table', 2),
(11, '2024_08_12_145524_create_axes_table', 2),
(12, '2024_08_12_160850_create_presentations_table', 2),
(13, '2024_08_12_164649_create_ouvrages_table', 2),
(14, '2024_08_13_160232_create_revues_table', 2),
(15, '2024_08_16_012340_create_conferences_table', 2),
(16, '2024_08_16_025407_create_reports_table', 2),
(17, '2024_08_16_045510_create_patents_table', 2),
(18, '2024_08_18_120845_create_news_table', 2),
(19, '2024_08_21_004347_add_user_id_and_status_to_members_table', 2),
(20, '2024_08_21_150942_add_email_to_members_table', 2),
(21, '2024_08_22_125128_add_image_to_members_table', 2),
(22, '2024_08_22_231023_add_id_member_to_ouvrages_table', 2),
(23, '2024_08_26_000334_add_id_user_to_ouvrages_table', 2),
(24, '2024_08_30_131918_create_job_offers_table', 2),
(25, '2024_09_01_164336_create_home_descriptions_table', 2),
(26, '2024_09_01_182355_create_habilitations_table', 2),
(27, '2024_09_01_214819_create_theses_table', 2),
(28, '2024_09_01_230431_create_brevets_table', 2),
(29, '2024_09_21_150714_add_status_to_ouvrages_table', 3),
(30, '2024_09_21_225428_create_messages_table', 3),
(31, '2024_09_22_003937_add_status_to_revues_table', 3),
(32, '2024_09_22_112454_add_status_to_brevets_table', 3),
(33, '2024_09_22_163308_add_status_to_reports_table', 4),
(34, '2024_09_23_102821_add_status_to_theses_table', 4),
(35, '2024_09_23_230511_add_status_to_habilitations_table', 4),
(36, '2024_09_24_115006_remove_unnecessary_columns_from_conferences_table', 4),
(37, '2024_10_04_095703_add_bio_to_users_table', 5),
(38, '2024_10_11_175330_add_etat_to_users_table', 6),
(39, '2024_10_11_202036_add_api_token_to_users_table', 6),
(40, '2024_10_14_184926_add_important_to_messages_table', 6);

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Partenariat avec des entreprises locales', 'L2IS annonce un partenariat avec plusieurs entreprises locales dans le domaine de la gestion des systèmes d\'information. Ce partenariat vise à encourager l\'innovation et la recherche appliquée dans des projets industriels.', 'news_images/vb7AXoi0GlanfB9OM0xs3jCSlxi9goanoc3jCA5o.jpg', '2024-10-04 09:16:23', '2024-10-04 09:16:23'),
(3, 'Atelier sur le DevOps et le cloud', 'Un atelier interactif a été organisé sur la gestion et le déploiement des infrastructures Cloud avec les pratiques DevOps. Les participants ont pu acquérir de nouvelles compétences dans le domaine.', 'news_images/670bd9a832005.png', '2024-10-04 09:17:05', '2024-10-13 13:36:15'),
(4, 'Inauguration du Centre de Recherche Avancé en IoT et Intelligence Artificielle', 'Le Laboratoire de l\'Ingénierie Informatique et des Systèmes (L2IS) a inauguré son nouveau Centre de Recherche Avancé dédié aux domaines de l\'Internet des Objets (IoT) et de l\'Intelligence Artificielle. Ce centre a pour objectif de favoriser l\'innovation dans les technologies émergentes, en réunissant des experts en Data Science, Big Data, et Sécurité des Réseaux. Avec des infrastructures à la pointe de la technologie, le centre se concentrera sur la recherche appliquée dans les secteurs de la santé, de l\'industrie 4.0, et des villes intelligentes.La cérémonie d\'inauguration s\'est tenue le 10 octobre 2024, en présence de plusieurs chercheurs, partenaires industriels, et représentants académiques. Ce nouvel espace de collaboration entre chercheurs permettra également d\'accompagner les doctorants dans des projets ambitieux en lien avec la transformation numérique.', 'news_images/09T6S9aU6Z37e5Gl7DhH1dEnOOIuQmBEkVcWM5oB.jpg', '2024-10-15 17:57:46', '2024-10-15 18:01:30'),
(5, 'Lancement d’un Projet de Recherche en Sécurité des Réseaux et Cloud DevOps', 'Le Laboratoire L2IS a lancé un ambitieux projet de recherche dédié à la Sécurité des Réseaux et à l’intégration des technologies Cloud DevOps. Ce projet, en partenariat avec des industriels de renom, vise à développer des solutions innovantes pour renforcer la protection des données sensibles dans des environnements Cloud tout en améliorant l’efficacité des processus DevOps.\nLes chercheurs du laboratoire se concentreront sur des méthodes de sécurisation avancées, notamment le chiffrement des données, les systèmes de détection d’intrusions, et l’automatisation des processus Cloud. Ce projet est une étape cruciale pour positionner L2IS en tant que leader dans le domaine de la cybersécurité et du Cloud.', 'news_images/670fa5b64e831.png', '2024-10-15 17:57:47', '2024-10-16 10:51:28');

-- --------------------------------------------------------

--
-- Structure de la table `ouvrages`
--

CREATE TABLE `ouvrages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DOI` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_user` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('en attente','approuvé','rejeté') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en attente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ouvrages`
--

INSERT INTO `ouvrages` (`id`, `title`, `author`, `DOI`, `id_user`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Computer Vision Based Monitoring System for Flotation in Mining Industry 4.0', 'Said RAKRAK, sara QASSIMI, Ahmed CHAKIR', '10.1007/978-3-031-66705-3_10', '2,3', '2024-10-04 15:46:11', '2024-10-14 20:31:30', 'approuvé'),
(2, 'Context Embedding Deep Collaborative Filtering (CEDCF) in the higher education sector', 'Said RAKRAK', '10.1007/s11042-024-20051-y', '2', '2024-10-04 15:48:08', '2024-10-14 20:31:28', 'approuvé'),
(3, 'Apprentissage collaboratif dynamique basé sur des systèmes de recommandation et l\'intelligence collective émergente dans les communautés d\'apprentissage en ligne', 'sara QASSIMI, amal AL KHYIA, Marien HAFIDI', '10.1007/978-981-19-5137-4_12', '3,4', '2024-10-05 14:12:17', '2024-10-15 17:53:49', 'approuvé'),
(4, 'Vers une sémantique émergente des ressources Web grâce au balisage collaboratif', 'sara QASSIMI, Ahmed LATIF', '10.1007/978-3-319-66854-3_27', '3', '2024-10-05 14:42:01', '2024-10-14 20:31:30', 'approuvé'),
(15, 'Vers une sémantique émergente des ressources Web grâce au balisage collaboratif', 'sara QASSIMI', '10.32145487/84521', '3', '2024-10-15 22:53:18', '2024-10-15 23:05:34', 'rejeté');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `patents`
--

CREATE TABLE `patents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filing_date` date NOT NULL,
  `pdf_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\User', 2, 'new_user', 'ae8d42315f9326a75b84ecdf1a9ba8e6e368cf8eeaaa69c6e5adc7fb2f27378c', '[\"*\"]', '2024-10-04 08:15:23', '2024-10-02 21:43:07', '2024-10-04 08:15:23'),
(2, 'App\\User', 2, 'new_user', '8f9b113500e29f44e30e582542d81ac3e11f91d9b1f798660070ab02724033e9', '[\"*\"]', '2024-10-04 15:14:08', '2024-10-04 08:15:29', '2024-10-04 15:14:08'),
(3, 'App\\User', 2, 'new_user', 'a115db84e36fc75b904bcbbb00827d0aa6d063a4a403382fa22421b3fa0dde3a', '[\"*\"]', '2024-10-05 09:39:40', '2024-10-04 15:14:19', '2024-10-05 09:39:40'),
(4, 'App\\User', 2, 'new_user', 'e19b17232ec11583b6150e4657e907a80729a5424134ae73e6f956d67aca000a', '[\"*\"]', '2024-10-05 10:45:24', '2024-10-05 09:39:55', '2024-10-05 10:45:24'),
(5, 'App\\User', 3, 'new_user', '8db2211ef03cc74322232ab5ddcc8df28841c237a7e17423e8cbe36db5fbb6e8', '[\"*\"]', '2024-10-05 15:11:31', '2024-10-05 10:45:38', '2024-10-05 15:11:31'),
(6, 'App\\User', 2, 'new_user', 'b3a82e6601f237aa1ef7113bd02c06a3974effee34f46a2dae2b9aefc0fe6212', '[\"*\"]', '2024-10-05 14:43:14', '2024-10-05 10:51:04', '2024-10-05 14:43:14'),
(7, 'App\\User', 2, 'new_user', '2fe1da7c54f5f5d2d88da00fe697c493669c37a9ae134d36e82dc49f996e790b', '[\"*\"]', '2024-10-05 14:57:23', '2024-10-05 14:43:29', '2024-10-05 14:57:23'),
(8, 'App\\User', 2, 'new_user', '69da30f8aa0c50993b4125a4a0f0505890c9b2dcdba055c6e4fd037f146740f8', '[\"*\"]', '2024-10-05 15:07:28', '2024-10-05 14:57:29', '2024-10-05 15:07:28'),
(9, 'App\\User', 2, 'new_user', '4dcaebbdbefb320d5b6cbe5055556043867ba8a813a0e0c2f7ea1ae044903a53', '[\"*\"]', '2024-10-05 16:03:49', '2024-10-05 15:07:35', '2024-10-05 16:03:49'),
(10, 'App\\User', 2, 'new_user', 'd6658c4e1df790e3789eddbf3c0540156623cda325ca15cb3b86d9a102c8530f', '[\"*\"]', '2024-10-08 13:05:47', '2024-10-05 16:03:55', '2024-10-08 13:05:47'),
(11, 'App\\User', 2, 'new_user', '53d3ee8ab9652ab19e9ff5baf6c7ca1f2631b14a890675aac455c4cdf095516d', '[\"*\"]', '2024-10-08 22:42:56', '2024-10-08 13:05:53', '2024-10-08 22:42:56'),
(12, 'App\\User', 2, 'new_user', 'f21bb3a31a57d9f3ed3b126ad1acfd5b44d58a9339802196d7d31a46cf566da7', '[\"*\"]', '2024-10-09 09:55:37', '2024-10-08 22:43:17', '2024-10-09 09:55:37'),
(13, 'App\\User', 2, 'new_user', '53240f24c157689565805d7c8d09198c2aea4ca1f2e414910731596796033fe4', '[\"*\"]', '2024-10-09 10:22:49', '2024-10-09 09:55:43', '2024-10-09 10:22:49'),
(14, 'App\\User', 2, 'new_user', '9385ccdc32eaef1701550d8ab75dc03f5efdbb472d40d310b6840a775a732cea', '[\"*\"]', '2024-10-09 10:23:44', '2024-10-09 10:22:55', '2024-10-09 10:23:44'),
(15, 'App\\User', 3, 'new_user', '009618cbd957111185c35c6a6473d12ef6357f11d7f3b13ed7d9bc55dfa0223f', '[\"*\"]', '2024-10-09 10:26:31', '2024-10-09 10:24:01', '2024-10-09 10:26:31'),
(16, 'App\\User', 2, 'new_user', 'f3f841085c6ef10753a3ace861ed8f33d417335e7f69fbbecc2603c8796bd820', '[\"*\"]', '2024-10-09 10:47:52', '2024-10-09 10:26:44', '2024-10-09 10:47:52'),
(17, 'App\\User', 3, 'new_user', '5a7e57b32c27ef0b4ef611bb36420ccca5413b03709d8785590df3013d0e269b', '[\"*\"]', '2024-10-09 11:20:49', '2024-10-09 10:50:10', '2024-10-09 11:20:49'),
(18, 'App\\User', 2, 'new_user', '8cf3c93de5686672d87c8ada3d36396de3b23c64f8549beef2013c2d4eb11bd2', '[\"*\"]', '2024-10-09 11:22:02', '2024-10-09 11:20:56', '2024-10-09 11:22:02'),
(19, 'App\\User', 2, 'new_user', 'b0ae4241609dfc1968f2d903d9ad7405422762067e48b865612f6b68d9be7e94', '[\"*\"]', '2024-10-09 11:43:21', '2024-10-09 11:22:08', '2024-10-09 11:43:21'),
(20, 'App\\User', 3, 'new_user', 'edf80a152ebc7cb4f6ab814649f4f2244dc1f6d37bada622de936d4c83deaf95', '[\"*\"]', '2024-10-10 23:34:43', '2024-10-09 11:43:38', '2024-10-10 23:34:43'),
(21, 'App\\User', 2, 'new_user', '29c6c1ca2736d936b167b5a01d8260f6172d746a31b576d514bf097f266b27a5', '[\"*\"]', '2024-10-10 23:51:08', '2024-10-10 23:34:53', '2024-10-10 23:51:08'),
(22, 'App\\User', 2, 'new_user', '08bd2ad23ea4a928ad37121cf210fca9cd94dd4ff05a12e625144094b8cf848c', '[\"*\"]', '2024-10-13 12:39:33', '2024-10-10 23:51:16', '2024-10-13 12:39:33'),
(23, 'App\\User', 2, 'new_user', 'ecda464070b0987657ae338664e8f4645ff2138510857b461573b7e3fec295ec', '[\"*\"]', '2024-10-13 13:15:24', '2024-10-13 12:40:00', '2024-10-13 13:15:24'),
(24, 'App\\User', 2, 'new_user', '1b747e2084dd159097bf4a7cff1d249659b07a3fcf9d7246e01fdab2e15cf5ae', '[\"*\"]', '2024-10-13 13:15:30', '2024-10-13 13:12:44', '2024-10-13 13:15:30'),
(25, 'App\\User', 2, 'new_user', 'f5b7abb1b87d059b1847034bab17db294846d6a30f13ce26a970ab8c23c1de5f', '[\"*\"]', '2024-10-13 13:55:23', '2024-10-13 13:15:36', '2024-10-13 13:55:23'),
(26, 'App\\User', 2, 'new_user', 'efc73414923b2768c2eb87b5a85c5b9e5f0d1767a41fa392c013c83bda3d7393', '[\"*\"]', '2024-10-13 14:09:00', '2024-10-13 13:55:30', '2024-10-13 14:09:00'),
(27, 'App\\User', 2, 'new_user', '930321fb11525beaac1a345d92df676270bd3b2a8143f63ee69167e6959133a9', '[\"*\"]', '2024-10-13 14:09:29', '2024-10-13 14:09:05', '2024-10-13 14:09:29'),
(28, 'App\\User', 2, 'new_user', '0756342610bb3fca4a48de6c72e47fd887bb7f4c4143d398e12cda42764f9b02', '[\"*\"]', '2024-10-13 15:21:41', '2024-10-13 14:09:34', '2024-10-13 15:21:41'),
(29, 'App\\User', 3, 'new_user', '4636692b7867adb0b1f51b1155e0d24a40489b64f78205372f99931640b62350', '[\"*\"]', '2024-10-13 15:21:50', '2024-10-13 15:05:47', '2024-10-13 15:21:50'),
(30, 'App\\User', 2, 'new_user', '007ed0740d6704be2c34ab08f24a75c843e1858a1fc5d59fabf5294c6dc9cf76', '[\"*\"]', '2024-10-13 15:31:31', '2024-10-13 15:21:56', '2024-10-13 15:31:31'),
(31, 'App\\User', 2, 'new_user', 'e042af92dfe8225ad3dafb1686d1d43d9851dca7ff7c2870779b7fd4ea1d2536', '[\"*\"]', '2024-10-13 15:46:37', '2024-10-13 15:31:38', '2024-10-13 15:46:37'),
(32, 'App\\User', 2, 'new_user', 'cc284b8bc7c28797dd048cf99a3bd6a1d4243b5f822cbbd67403309bae169a11', '[\"*\"]', '2024-10-13 16:04:57', '2024-10-13 15:46:41', '2024-10-13 16:04:57'),
(33, 'App\\User', 2, 'new_user', 'f6d5cf4a03c848d981e7a2cc86d9232bc16d313a90ff6b74e77565a586112adc', '[\"*\"]', '2024-10-13 17:31:41', '2024-10-13 16:05:02', '2024-10-13 17:31:41'),
(34, 'App\\User', 3, 'new_user', '2802306485dd4c5486ee4d01f3f1d116e6da87a65e320dc4ba37cc951fec9916', '[\"*\"]', '2024-10-13 17:33:34', '2024-10-13 17:31:53', '2024-10-13 17:33:34'),
(35, 'App\\User', 3, 'new_user', '3fe77c92aef69d69fdd85009f5500a0607b5a458d6a57fa3af94691b53567bc2', '[\"*\"]', '2024-10-13 17:34:12', '2024-10-13 17:34:11', '2024-10-13 17:34:12'),
(36, 'App\\User', 3, 'new_user', '498b9267d8d8d978c8ee9f40a5e0646e2eb571785d64d8909a2fe461dd9c5d51', '[\"*\"]', '2024-10-13 17:35:42', '2024-10-13 17:34:55', '2024-10-13 17:35:42'),
(37, 'App\\User', 2, 'new_user', '1020cc4a2beee3dd4362ee1c70e224f89a6027ddae8976ec093b61edbb3043c4', '[\"*\"]', '2024-10-13 19:14:09', '2024-10-13 17:38:25', '2024-10-13 19:14:09'),
(38, 'App\\User', 2, 'new_user', '2b47091ff0e4cd8fcc019855cf457574d42e5c6bd529edd04f3991a1c7ba28f6', '[\"*\"]', '2024-10-13 20:46:08', '2024-10-13 19:14:16', '2024-10-13 20:46:08'),
(39, 'App\\User', 2, 'new_user', '8367e63c367f979ae66264bf0bf8cd3afcc8765a1a729d1708041b5f9f0a3044', '[\"*\"]', '2024-10-13 20:47:08', '2024-10-13 20:46:12', '2024-10-13 20:47:08'),
(40, 'App\\User', 3, 'new_user', '5d3f0b8b7edc26d3ba35d94097662d409ad365e520feb341b8871db57e652dab', '[\"*\"]', '2024-10-13 22:01:29', '2024-10-13 20:47:18', '2024-10-13 22:01:29'),
(41, 'App\\User', 2, 'new_user', 'df9d359ce9c9b93e52eba3113955d96986e0e87c23d9f2f4541f336ac5fbb9fc', '[\"*\"]', '2024-10-13 22:02:35', '2024-10-13 22:01:34', '2024-10-13 22:02:35'),
(42, 'App\\User', 2, 'new_user', '886e3f84772f64a7efe5592b17776499b6410edc14bb7df303f25a6560dfba70', '[\"*\"]', '2024-10-13 22:06:13', '2024-10-13 22:03:03', '2024-10-13 22:06:13'),
(43, 'App\\User', 2, 'new_user', 'ae9e863a84503658b547550c2f5405284e73670aacb75d9d743df7c81783e023', '[\"*\"]', '2024-10-14 15:56:24', '2024-10-13 22:06:19', '2024-10-14 15:56:24'),
(44, 'App\\User', 2, 'new_user', 'b9aff6b6674f0e6def004ffcefa045634494f8969f6bbf9b1af5be754f386e49', '[\"*\"]', '2024-10-14 16:09:05', '2024-10-14 15:58:39', '2024-10-14 16:09:05'),
(46, 'App\\User', 2, 'new_user', 'f3eb9e7a288c6dc1f00f2c08b9d451472f53cc1a8dc5c5ee9f09b1d207632ba6', '[\"*\"]', '2024-10-14 16:56:57', '2024-10-14 16:42:46', '2024-10-14 16:56:57'),
(47, 'App\\User', 3, 'new_user', '88eb9849b525d1ccf0edfac8f82867aa45e6874cf09599962779112c06dd0402', '[\"*\"]', '2024-10-14 16:50:00', '2024-10-14 16:49:49', '2024-10-14 16:50:00'),
(48, 'App\\User', 2, 'new_user', 'c88869556fc9f3632b91502c840671a1dd125ba4af72b4e6350ced760fd2af66', '[\"*\"]', '2024-10-14 18:34:49', '2024-10-14 16:58:17', '2024-10-14 18:34:49'),
(49, 'App\\User', 2, 'new_user', '2507b55ff9ca52dbf93994531848b6f0f392fbbca6e4243e232d08e7987f8dec', '[\"*\"]', '2024-10-14 18:48:30', '2024-10-14 18:34:56', '2024-10-14 18:48:30'),
(52, 'App\\User', 2, 'new_user', '7afa4b97e049b4f576546285559353c6cfd64b31cf119ce005736a7d7fbe8c3a', '[\"*\"]', '2024-10-14 19:29:59', '2024-10-14 19:29:12', '2024-10-14 19:29:59'),
(53, 'App\\User', 3, 'new_user', '0bf7ff2d12edbbd8be38ff3c2ebf50fe65d24447b72f528d0e7821bf4fe58caf', '[\"*\"]', '2024-10-14 19:47:49', '2024-10-14 19:29:33', '2024-10-14 19:47:49'),
(54, 'App\\User', 2, 'new_user', '56a33e87c8980696ab61a1b230df0fd9c946c45d0fab1105bfc3506fdc522941', '[\"*\"]', '2024-10-14 20:23:04', '2024-10-14 19:32:10', '2024-10-14 20:23:04'),
(55, 'App\\User', 2, 'new_user', '3fd31c4751c76c994c17a9f743711afb5fd9e0007ac59bd863d56223f711c7bd', '[\"*\"]', '2024-10-14 20:39:51', '2024-10-14 20:23:12', '2024-10-14 20:39:51'),
(56, 'App\\User', 3, 'new_user', '47f7bccbf08417350d544858e585b1b2cef2530ca135928a0396116b130e97bd', '[\"*\"]', '2024-10-14 21:41:52', '2024-10-14 20:33:22', '2024-10-14 21:41:52'),
(57, 'App\\User', 2, 'new_user', '5dc9f1a4ad9080e26e6e47bf8f9b6433b7d4a20848346b7327745348a653d57a', '[\"*\"]', '2024-10-14 20:50:57', '2024-10-14 20:42:10', '2024-10-14 20:50:57'),
(58, 'App\\User', 2, 'new_user', '93ac7d622923a384fba9048b1ca5f3fc72a3e59eee2952419b619fd097a94fb6', '[\"*\"]', '2024-10-14 21:41:52', '2024-10-14 20:51:03', '2024-10-14 21:41:52'),
(59, 'App\\User', 2, 'new_user', '4623ccae6bcc5c032149a418799d76c83386e106e5de8e49cd0474745a53ef5e', '[\"*\"]', '2024-10-14 22:10:13', '2024-10-14 21:40:58', '2024-10-14 22:10:13'),
(60, 'App\\User', 2, 'new_user', '03c6de9183d38d9c0bcd68c8bcd784557963130ec441a81b04db13203b8213db', '[\"*\"]', '2024-10-14 22:10:56', '2024-10-14 22:10:20', '2024-10-14 22:10:56'),
(61, 'App\\User', 3, 'new_user', '36de1e2079c6f081b7ba4115fe045f160af0edc544702b750d15ef9419947b59', '[\"*\"]', '2024-10-15 08:45:32', '2024-10-15 08:43:30', '2024-10-15 08:45:32'),
(62, 'App\\User', 3, 'new_user', '6f003e79ecc56b958e51258caafb1356d67bc3419ea44233736df6eb757b2441', '[\"*\"]', '2024-10-15 10:38:47', '2024-10-15 10:26:03', '2024-10-15 10:38:47'),
(63, 'App\\User', 3, 'new_user', '3412798a0feded326f23271c4672ee51f299628aefc0db31b7be906aeb480cdc', '[\"*\"]', '2024-10-15 17:30:58', '2024-10-15 10:38:54', '2024-10-15 17:30:58'),
(64, 'App\\User', 2, 'new_user', '8ebade6dafff5ec5158c254b057c5c6ed56fdf81a7329f3cfbd7a13b345b8aaa', '[\"*\"]', '2024-10-15 17:39:42', '2024-10-15 17:31:05', '2024-10-15 17:39:42'),
(65, 'App\\User', 2, 'new_user', 'f6961d04c718f60135847e341db203f0b863076deabda44d0750bfb784ae630d', '[\"*\"]', '2024-10-15 17:40:15', '2024-10-15 17:39:47', '2024-10-15 17:40:15'),
(66, 'App\\User', 2, 'new_user', '2c427446be230340207d564b5d1a131312057c8874273011c14a5f0b9be6f40a', '[\"*\"]', '2024-10-15 17:40:59', '2024-10-15 17:40:19', '2024-10-15 17:40:59'),
(67, 'App\\User', 2, 'new_user', '2a525a7c0668d3878bdc5c89bec395b3997fb33bbd7d6c47e8a71e6c1edb7d44', '[\"*\"]', '2024-10-15 17:42:04', '2024-10-15 17:41:06', '2024-10-15 17:42:04'),
(68, 'App\\User', 2, 'new_user', '4e57571d1a3745fa82157eb3b8bba57dd3f02623b837dca65aef5352bc230235', '[\"*\"]', '2024-10-15 17:47:27', '2024-10-15 17:42:09', '2024-10-15 17:47:27'),
(69, 'App\\User', 2, 'new_user', '1fecfeb827d5e54f3efdeb5ace939fe2c92d016b40bb19b9cc67e8f4b7b951ab', '[\"*\"]', '2024-10-15 17:48:16', '2024-10-15 17:47:32', '2024-10-15 17:48:16'),
(70, 'App\\User', 2, 'new_user', '698c963ed39fe55ef476468c30ec3d294ce62f970061c9d216ae83e8628e3604', '[\"*\"]', '2024-10-15 17:49:13', '2024-10-15 17:48:20', '2024-10-15 17:49:13'),
(71, 'App\\User', 2, 'new_user', '4f3b223fe7f9202accff7469bb5ce483a07e4a8beba8c62ad954052d7515c817', '[\"*\"]', '2024-10-15 18:26:00', '2024-10-15 17:49:20', '2024-10-15 18:26:00'),
(72, 'App\\User', 4, 'new_user', '9c88501d959bfb7970632054e6a6a1a639210ddc36563120153458662c5877c2', '[\"*\"]', '2024-10-15 18:26:56', '2024-10-15 17:53:34', '2024-10-15 18:26:56'),
(73, 'App\\User', 2, 'new_user', 'e6f3d66474af454b6ec0a9cb98a931288026596ad590057f86c851520bd14256', '[\"*\"]', '2024-10-15 18:28:22', '2024-10-15 18:27:00', '2024-10-15 18:28:22'),
(74, 'App\\User', 2, 'new_user', '790f8dae3ed59ceee75a8119e4d2f8ac33f48af390fe70a6358978dced300ae8', '[\"*\"]', '2024-10-15 18:29:06', '2024-10-15 18:28:46', '2024-10-15 18:29:06'),
(75, 'App\\User', 3, 'new_user', 'd71861a1ef473a03bb78c59ee9f6df11f4d0b72f13a5e21027052775a2f272dd', '[\"*\"]', '2024-10-15 18:31:54', '2024-10-15 18:29:20', '2024-10-15 18:31:54'),
(76, 'App\\User', 2, 'new_user', '0f0de84bfec3b97fcc89ee83d77093ee1cf11d01230a114680a2375d0b19837e', '[\"*\"]', '2024-10-15 18:40:32', '2024-10-15 18:32:18', '2024-10-15 18:40:32'),
(78, 'App\\User', 3, 'new_user', '6a4dab6569834cebf49a525cfe669d75b5e96f983a3702b3ba27daba9e27e639', '[\"*\"]', '2024-10-15 21:10:11', '2024-10-15 19:19:14', '2024-10-15 21:10:11'),
(79, 'App\\User', 2, 'new_user', 'fbba4913eea373e5a5d0e45728cb4b89d4e370f0320af532dee3c9de48ccdfc1', '[\"*\"]', '2024-10-15 22:52:07', '2024-10-15 21:10:16', '2024-10-15 22:52:07'),
(80, 'App\\User', 3, 'new_user', 'ea26a3b1ad6f728cb26c196df06d0961fd4a76b8564d079fdcd1a8067e761ba9', '[\"*\"]', '2024-10-15 23:13:46', '2024-10-15 22:52:17', '2024-10-15 23:13:46'),
(81, 'App\\User', 2, 'new_user', '71f3c80ba67bba97fdc39e7f9216724e6953d30b099571257406d244c7933ea5', '[\"*\"]', '2024-10-15 23:47:08', '2024-10-15 22:53:33', '2024-10-15 23:47:08'),
(82, 'App\\User', 3, 'new_user', '11d7d657b787e939feeb705aefadda4c3171ae4c94dd010ec922215a7652821d', '[\"*\"]', '2024-10-16 10:30:40', '2024-10-15 23:47:17', '2024-10-16 10:30:40'),
(83, 'App\\User', 2, 'new_user', 'ae26ac708d17b490c3aa265ac932961890e83e10c5f0c29a1bac0697436967eb', '[\"*\"]', '2024-10-16 10:56:56', '2024-10-16 10:30:49', '2024-10-16 10:56:56'),
(84, 'App\\User', 3, 'new_user', 'b6128afff89fa4a3bbcec1a77cc138c0f5fa388dc269b39f7448b849fae34951', '[\"*\"]', '2024-10-16 11:35:07', '2024-10-16 10:57:04', '2024-10-16 11:35:07'),
(85, 'App\\User', 2, 'new_user', '40b5e64de24e20e9491daae38b63a36a25c288716024cc11f2fd82ca78287a93', '[\"*\"]', '2024-10-16 12:01:35', '2024-10-16 11:10:44', '2024-10-16 12:01:35'),
(86, 'App\\User', 2, 'new_user', '32b25d7874b8f30697cd483fe25cd3445ff0460c89400a970ee59d22cf5d4c70', '[\"*\"]', '2024-10-16 21:00:06', '2024-10-16 12:01:49', '2024-10-16 21:00:06'),
(87, 'App\\User', 2, 'new_user', '585e38c5210ab3a6007065063b3b332b544a92b7de833b1ed3889a444090380f', '[\"*\"]', '2024-10-16 21:03:41', '2024-10-16 21:00:20', '2024-10-16 21:03:41'),
(88, 'App\\User', 3, 'new_user', '56fa4136bea096cd3e5033a0737907dab31cf13c00000258f997345fdd12a921', '[\"*\"]', '2024-10-16 21:05:06', '2024-10-16 21:03:51', '2024-10-16 21:05:06'),
(89, 'App\\User', 2, 'new_user', 'f5ea72e8f8aebd1cc8fb768c3321e167f9348eb9de5da958be966550ab7cf2a5', '[\"*\"]', '2024-10-17 18:20:39', '2024-10-16 21:05:11', '2024-10-17 18:20:39'),
(90, 'App\\User', 2, 'new_user', '2a84216b1bef8f7b4c6115d45da13a67c63802fa102f7204a401d6181fee9140', '[\"*\"]', '2024-10-17 20:21:40', '2024-10-17 18:20:46', '2024-10-17 20:21:40'),
(93, 'App\\User', 3, 'new_user', '2eda262529730080260593e169a4d7a5ef1287c0d296ca6d21dff1b5e92854de', '[\"*\"]', '2024-10-17 20:56:26', '2024-10-17 20:56:13', '2024-10-17 20:56:26'),
(94, 'App\\User', 2, 'new_user', '3d8e45e50ddeac6925b410d6b5d5c1247f76695f1b432edee81272fd9ea8c40f', '[\"*\"]', '2024-10-17 20:58:05', '2024-10-17 20:56:31', '2024-10-17 20:58:05'),
(95, 'App\\User', 3, 'new_user', 'f7fa2e9d92846337c24f25317cbad7196c6bcf23f0fc3caeaa6282b2057cb531', '[\"*\"]', '2024-10-17 21:00:16', '2024-10-17 20:58:14', '2024-10-17 21:00:16'),
(96, 'App\\User', 3, 'new_user', 'ed6a646dd9b66d07542d0809c427882da51a8b1092a983232d68201b44559570', '[\"*\"]', '2024-10-17 21:01:44', '2024-10-17 21:00:29', '2024-10-17 21:01:44'),
(97, 'App\\User', 3, 'new_user', '08c119f97d913bde7a53fc5c248b862696c5cfd0976b269b1618bdaa775ea63a', '[\"*\"]', '2024-10-17 21:02:06', '2024-10-17 21:01:59', '2024-10-17 21:02:06'),
(98, 'App\\User', 2, 'new_user', '47846b9896079ee275481e2009f9f6735fadac95f2fa23592f75a0c83eeb9b47', '[\"*\"]', '2024-10-17 21:08:03', '2024-10-17 21:02:12', '2024-10-17 21:08:03'),
(99, 'App\\User', 2, 'new_user', 'cdb0694df0a682a34be46db5bdd1a729fd13dd92ed211be5f496307a69b7175c', '[\"*\"]', '2024-10-17 21:10:50', '2024-10-17 21:08:16', '2024-10-17 21:10:50');

-- --------------------------------------------------------

--
-- Structure de la table `presentations`
--

CREATE TABLE `presentations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `presentations`
--

INSERT INTO `presentations` (`id`, `title`, `content`, `team_id`, `created_at`, `updated_at`) VALUES
(2, '<p>Présentation Équipe 1&nbsp;</p>', '<p>L\'équipe 1 est spécialisée en Intelligence Artificielle. Elle travaille sur la reconnaissance d\'images et le traitement du langage naturel.</p>', 1, '2024-10-04 08:18:32', '2024-10-14 22:21:47'),
(3, '<p>Présentation Équipe 2</p>', '<p>L\'équipe 2 se concentre sur les solutions IoT et la sécurité des systèmes connectés.</p>', 2, '2024-10-04 08:19:12', '2024-10-04 08:19:12'),
(4, '<p>Présentation Équipe 3</p>', '<p>L\'équipe 3 développe des infrastructures et des solutions de cloud computing optimisées pour l\'économie de ressources.</p>', 3, '2024-10-04 08:19:49', '2024-10-04 08:21:28');

-- --------------------------------------------------------

--
-- Structure de la table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `team` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `funding_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('en_cours','termine') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `team`, `start_date`, `end_date`, `funding_type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Développement d\'un Système de Détection d\'Anomalies en Temps Réel', 'Concevoir un système capable de détecter des anomalies dans les flux de données en temps réel pour prévenir les cyberattaques et les pannes système.', 'Équipe 1', '2024-10-02', '2024-11-22', 'ANR', 'en_cours', '2024-10-05 10:30:59', '2024-10-05 10:30:59'),
(2, 'Optimisation des Performances des Bases de Données Distribuées', 'Objectifs : Améliorer les performances et la scalabilité des bases de données distribuées utilisées dans des environnements cloud.', 'Équipe 2', '2024-08-12', '2024-10-05', 'ANR', 'termine', '2024-10-05 10:32:34', '2024-10-05 10:35:12'),
(3, 'Optimisation des Performances des Bases de Données Distribuées', 'Objectifs : Améliorer les performances et la scalabilité des bases de données distribuées utilisées dans des environnements cloud.', 'Équipe 1', '2024-10-10', '2024-10-11', 'ANR', 'en_cours', '2024-10-15 19:01:56', '2024-10-15 19:01:56'),
(4, 'Développement d\'un Système de Détection d\'Anomalies en Temps Réel', 'Concevoir un système capable de détecter des anomalies dans les flux de données en temps réel pour prévenir les cyberattaques et les pannes système.', 'Équipe 1', '2024-09-30', '2024-10-18', 'ANR', 'termine', '2024-10-15 19:02:44', '2024-10-15 19:06:17');

-- --------------------------------------------------------

--
-- Structure de la table `rapports`
--

CREATE TABLE `rapports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DOI` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_user` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('en attente','approuvé','rejeté') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en attente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `rapports`
--

INSERT INTO `rapports` (`id`, `title`, `author`, `DOI`, `id_user`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Améliorer l\'expérience des visiteurs grâce à l\'apprentissage par renforcement profon', 'Said RAKRAK, sara QASSIMI', '10.1145/3659677.3659754', '2,3', '2024-10-05 09:56:48', '2024-10-14 20:31:30', 'approuvé'),
(2, 'Améliorer l\'expérience des visiteurs grâce à l\'apprentissage par renforcement profond dans les villes intelligentes', 'Said RAKRAK, sara QASSIMI, amal AL KHYIA, Sana ABAKRIM', '10.1145/3659677.3659754', '2,3,4', '2024-10-05 09:57:49', '2024-10-15 17:53:49', 'approuvé'),
(3, 'Vers une sémantique émergente des ressources Web grâce au balisage collaboratif', 'sara QASSIMI, amal AL KHYIA, Nouhaila MOUHLY, Ahmed LATIF', '10.1007/978-3-319-66854-3_27', '3,4,5', '2024-10-05 14:16:56', '2024-10-15 17:53:49', 'approuvé'),
(5, 'Vers une sémantique émergente des ressources Web grâce au balisage collaboratif', 'sara QASSIMI', '10.321457/8545', '3', '2024-10-15 23:08:41', '2024-10-15 23:08:41', 'en attente');

-- --------------------------------------------------------

--
-- Structure de la table `revues`
--

CREATE TABLE `revues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DOI` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_user` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('en attente','approuvé','rejeté') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en attente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `revues`
--

INSERT INTO `revues` (`id`, `title`, `author`, `DOI`, `id_user`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Algorithmes évolutifs multi-objectifs dans les systèmes de recommandation', 'Said RAKRAK', '10.1007/978-3-031-68650-4_33', '2,2', '2024-10-05 09:48:58', '2024-10-14 20:31:28', 'approuvé'),
(2, 'Intégration de stratégies d\'apprentissage actif dans les systèmes de recommandation basés sur des modèles', 'Said RAKRAK, sara QASSIMI, Bachir ASRI', '10.1145/3659677.3659838', '2,3', '2024-10-05 09:49:53', '2024-10-14 20:31:30', 'approuvé'),
(3, 'Vers une sémantique émergente des ressources Web grâce au balisage collaboratif', 'Said RAKRAK, sara QASSIMI, Said LATIF', '10.1007/978-3-319-66854-3_27', '2,3', '2024-10-05 14:14:35', '2024-10-14 20:31:30', 'approuvé'),
(4, 'Innovation disruptive dans l\'industrie minière 4.0', 'sara QASSIMI', '10.1007/978-3-030-64258-7_28', '3', '2024-10-05 14:43:04', '2024-10-14 20:31:30', 'approuvé'),
(7, 'Innovation disruptive dans l\'industrie minière 4.0', 'sara QASSIMI, amal AL KHYIA', '10.321457/89652', '3,4', '2024-10-15 23:07:05', '2024-10-15 23:07:05', 'en attente');

-- --------------------------------------------------------

--
-- Structure de la table `seminars`
--

CREATE TABLE `seminars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `speaker` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `seminars`
--

INSERT INTO `seminars` (`id`, `title`, `description`, `date`, `start_time`, `end_time`, `location`, `speaker`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Séminaire sur la Cybersécurité et la Protection des Données', 'Ce séminaire abordera les dernières tendances en matière de cybersécurité, y compris les menaces émergentes et les meilleures pratiques pour protéger les systèmes et les données sensibles.', '2024-10-01', '13:36:00', '17:36:00', 'Salle de conférence', 'M. Jean Dupont, Expert en Cybersécurité chez CyberSecure', 'passe', '2024-10-05 10:37:07', '2024-10-05 10:37:07'),
(2, 'Data enabled Predictive Control of LPV systems', 'Ce séminaire abordera les dernières tendances en matière de cybersécurité, y compris les menaces émergentes et les meilleures pratiques pour protéger les systèmes et les données sensibles.', '2024-10-31', '16:39:00', '19:42:00', 'Salle de réunion à L\'ENSA', 'Pedro Luis Peres', 'prevu', '2024-10-05 10:39:56', '2024-10-05 10:39:56');

-- --------------------------------------------------------

--
-- Structure de la table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialization` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `teams`
--

INSERT INTO `teams` (`id`, `name`, `specialization`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Équipe 1', 'Intelligence Artificielle', 'Cette équipe se concentre sur les applications de l\'IA dans divers domaines, notamment la reconnaissance d\'images,.', '2024-10-02 22:04:47', '2024-10-02 22:10:09'),
(2, 'Équipe 2', 'Internet des Objets', 'Cette équipe développe des solutions pour l\'Internet des objets (IoT), en mettant l\'accent sur les systèmes connectés et la sécurité des données.', '2024-10-02 22:07:28', '2024-10-02 22:08:46'),
(3, 'Équipe 3', 'Cloud Computing', 'L\'équipe travaille sur les technologies de cloud computing, l\'optimisation des ressources et les infrastructures en nuage.', '2024-10-02 22:08:10', '2024-10-13 13:59:02');

-- --------------------------------------------------------

--
-- Structure de la table `theses`
--

CREATE TABLE `theses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lieu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('en attente','approuvé','rejeté') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en attente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `theses`
--

INSERT INTO `theses` (`id`, `title`, `author`, `doi`, `id_user`, `lieu`, `date`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Ordonnancer le trafic dans des réseaux déterministes grâce à l’apprentissage par renforcement', 'sara QASSIMI, Ahmed LATIF', '10.213487/84566', '3', 'Faculté Des Sciences Et Technique', '2024-10-17', '2024-10-05 14:18:49', '2024-10-14 20:31:30', 'approuvé'),
(2, 'Optimization of resource allocation for communication system M2M/H2H 5G.', 'sara QASSIMI, amal AL KHYIA, Laila CHAKIR', '10.21478/965321', '3,4', 'Ecole Nationale Supérieur Des Sciences Appliqués', '2024-08-14', '2024-10-05 14:20:04', '2024-10-15 17:53:49', 'approuvé'),
(4, 'Optimization of resource allocation for communication system M2M/H2H 5G.', 'sara QASSIMI, Said RAKRAK, Laila LATIF', '10.32145874/8569874', '3,2', 'Faculté des Sciences et Techniques', '2024-11-14', '2024-10-15 23:10:00', '2024-10-15 23:10:00', 'en attente');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `Etat` enum('approuve','non approuve') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'non approuve',
  `api_token` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`, `bio`, `Etat`, `api_token`) VALUES
(2, 'Said RAKRAK', 'directeurlaboratoirel2is@gmail.com', NULL, '$2y$10$aJCzvgpm.5jy/DW7Kcydp.uV74SozkR5DKpk1TLTMdJawg6Pz/3lC', NULL, 1, '2024-10-02 21:41:47', '2024-10-17 21:07:52', NULL, 'non approuve', NULL),
(3, 'sara QASSIMI', 'saraqassimi1@gmail.com', NULL, '$2y$10$AUVxeJn.rPHcvJhycieMYeke9ONSv1xYliYPLHi5a.YJ5aAF0STGK', NULL, 0, '2024-10-04 08:59:17', '2024-10-17 21:01:07', '', 'non approuve', NULL),
(4, 'amal AL KHYIA', 'alkhyiaamal4@gmail.com', NULL, '$2y$10$7613Vo62hpHc11zkNI86Z.PK2UgPuFAlarrTs1i7ziY7bDKuHRChK', NULL, 0, '2024-10-04 09:01:28', '2024-10-15 17:53:49', '', 'approuve', NULL),
(10, 'Laila Chakir', 'laila@gmail.com', NULL, '$2y$10$QxBbBwW1WwTOrC1KHqfl2Om277YsGDyQ3H3t1DoK.TprsBOdwgo26', NULL, 0, '2024-10-14 22:08:21', '2024-10-14 22:08:21', '', 'approuve', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `axes`
--
ALTER TABLE `axes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `brevets`
--
ALTER TABLE `brevets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `conferences`
--
ALTER TABLE `conferences`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `habilitations`
--
ALTER TABLE `habilitations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `home_descriptions`
--
ALTER TABLE `home_descriptions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `job_offers`
--
ALTER TABLE `job_offers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `laboratoire`
--
ALTER TABLE `laboratoire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `members_team_id_foreign` (`team_id`),
  ADD KEY `members_user_id_foreign` (`user_id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_sender_id_foreign` (`sender_id`),
  ADD KEY `messages_receiver_id_foreign` (`receiver_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ouvrages`
--
ALTER TABLE `ouvrages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `patents`
--
ALTER TABLE `patents`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `presentations`
--
ALTER TABLE `presentations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rapports`
--
ALTER TABLE `rapports`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `revues`
--
ALTER TABLE `revues`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `seminars`
--
ALTER TABLE `seminars`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `theses`
--
ALTER TABLE `theses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_api_token_unique` (`api_token`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `axes`
--
ALTER TABLE `axes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `brevets`
--
ALTER TABLE `brevets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `conferences`
--
ALTER TABLE `conferences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `habilitations`
--
ALTER TABLE `habilitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `home_descriptions`
--
ALTER TABLE `home_descriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `job_offers`
--
ALTER TABLE `job_offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `laboratoire`
--
ALTER TABLE `laboratoire`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `ouvrages`
--
ALTER TABLE `ouvrages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `patents`
--
ALTER TABLE `patents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT pour la table `presentations`
--
ALTER TABLE `presentations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `rapports`
--
ALTER TABLE `rapports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `revues`
--
ALTER TABLE `revues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `seminars`
--
ALTER TABLE `seminars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `theses`
--
ALTER TABLE `theses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `members_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
