

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;



CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `questionare_id` bigint(20) NOT NULL,
  `question_id` bigint(20) NOT NULL,
  `answer` text COLLATE utf8_persian_ci NOT NULL,
  `respondent_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=294 ;



CREATE TABLE IF NOT EXISTS `code` (
  `questionare_id` bigint(20) NOT NULL,
  `code_development` text COLLATE utf8_persian_ci NOT NULL,
  `code_production` text COLLATE utf8_persian_ci NOT NULL,
  `author_name` varchar(255) COLLATE utf8_persian_ci NOT NULL DEFAULT 'Not Mentioned',
  `questionare_name` varchar(255) COLLATE utf8_persian_ci NOT NULL DEFAULT 'Not Mentioned',
  `questionare_desc` text COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`questionare_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;



CREATE TABLE IF NOT EXISTS `questions` (
  `question_title` text COLLATE utf8_persian_ci NOT NULL,
  `questionare_id` bigint(20) NOT NULL,
  `question_id_in_code` int(11) NOT NULL,
  PRIMARY KEY (`questionare_id`,`question_id_in_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
