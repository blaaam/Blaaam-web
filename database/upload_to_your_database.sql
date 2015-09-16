--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `login` varchar(45) NOT NULL DEFAULT '',
  `password` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastactive` bigint(13) unsigned NOT NULL DEFAULT '0',
  `accessLevel` tinyint(4) NOT NULL DEFAULT '0',
  `lastIP` char(15) DEFAULT NULL,
  `lastServer` tinyint(4) DEFAULT '1',
  `pcIp` char(15) DEFAULT NULL,
  `hop1` char(15) DEFAULT NULL,
  `hop2` char(15) DEFAULT NULL,
  `hop3` char(15) DEFAULT NULL,
  `hop4` char(15) DEFAULT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `web_comprovantes`
--

CREATE TABLE IF NOT EXISTS `web_comprovantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `forma_pag` varchar(255) NOT NULL,
  `valor` varchar(255) DEFAULT NULL,
  `itens` varchar(255) DEFAULT NULL,
  `comprovante` varchar(255) DEFAULT NULL,
  `char_name` varchar(255) DEFAULT NULL,
  `data` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Table structure for table `web_configs`
--

CREATE TABLE IF NOT EXISTS `web_configs` (
  `visitas` varchar(255) DEFAULT NULL,
  `manutencao` varchar(255) DEFAULT NULL,
  `manu_data` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `prevision` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `web_doacoes`
--

CREATE TABLE IF NOT EXISTS `web_doacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `item_id` varchar(255) NOT NULL,
  `preco_antigo` varchar(100) NOT NULL,
  `preco_atual` varchar(100) NOT NULL,
  `promocao` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;


--
-- Table structure for table `web_galeria`
--

CREATE TABLE IF NOT EXISTS `web_galeria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `url` varchar(800) DEFAULT NULL,
  `tamanho` varchar(255) DEFAULT NULL,
  `destaque` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;


--
-- Table structure for table `web_noticias`
--

CREATE TABLE IF NOT EXISTS `web_noticias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `data` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `autor` varchar(255) DEFAULT NULL,
  `noticia` text,
  `visitas` varchar(255) DEFAULT '1',
  `slug` text,
  `destaque` int(11) DEFAULT NULL,
  `privado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Table structure for table `web_report`
--

CREATE TABLE IF NOT EXISTS `web_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `reported_login` varchar(100) NOT NULL,
  `motivo` varchar(100) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `shout_box` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(60) NOT NULL,
  `message` varchar(100) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip_address` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


--
-- Table structure for table `configuration`
--

CREATE TABLE IF NOT EXISTS `configuration` (
  `PATH_LOGINSERVER` varchar(255) NOT NULL,
  `PATH_GAMESERVER` varchar(255) NOT NULL,
  `SERVER_NAME` varchar(255) NOT NULL,
  `RATE_XP` varchar(255) NOT NULL,
  `RATE_SP` varchar(255) NOT NULL,
  `RATE_DROP` varchar(255) NOT NULL,
  `RATE_ADENA` varchar(255) NOT NULL,
  `RATE_SPOIL` varchar(255) NOT NULL,
  `PATH_LOGO` varchar(255) NOT NULL,
  `PATH_SLIDE1` varchar(255) NOT NULL,
  `PATH_SLIDE2` varchar(255) NOT NULL,
  `PATH_SLIDE3` varchar(255) NOT NULL,
  `SITE_VNAME1` varchar(255) NOT NULL,
  `SITE_VNAME2` varchar(255) NOT NULL,
  `SITE_VNAME3` varchar(255) NOT NULL,
  `SITE_VNAME4` varchar(255) NOT NULL,
  `SITE_VNAME5` varchar(255) NOT NULL,
  `SITE_VNAME6` varchar(255) NOT NULL,
  `PATH_VOTE1` varchar(255) NOT NULL,
  `PATH_VOTE2` varchar(255) NOT NULL,
  `PATH_VOTE3` varchar(255) NOT NULL,
  `PATH_VOTE4` varchar(255) NOT NULL,
  `PATH_VOTE5` varchar(255) NOT NULL,
  `PATH_VOTE6` varchar(255) NOT NULL,
  `SITE_VOTE1` varchar(255) NOT NULL,
  `SITE_VOTE2` varchar(255) NOT NULL,
  `SITE_VOTE3` varchar(255) NOT NULL,
  `SITE_VOTE4` varchar(255) NOT NULL,
  `SITE_VOTE5` varchar(255) NOT NULL,
  `SITE_VOTE6` varchar(255) NOT NULL,
  `CREDITS` varchar(255) NOT NULL,
  `DOWNLOAD_SYS_1` varchar(255) NOT NULL,
  `DOWNLOAD_SYS_2` varchar(255) NOT NULL,
  `DOWNLOAD_ANIM_1` varchar(255) NOT NULL,
  `DOWNLOAD_ANIM_2` varchar(255) NOT NULL,
  `DOWNLOAD_SYSTEX_1` varchar(255) NOT NULL,
  `DOWNLOAD_SYSTEX_2` varchar(255) NOT NULL,
  `DOWNLOAD_FULL_EXE_1` varchar(255) NOT NULL,
  `DOWNLOAD_FULL_EXE_2` varchar(255) NOT NULL,
  `DOWNLOAD_FULL_RAR_1` varchar(255) NOT NULL,
  `DOWNLOAD_FULL_RAR_2` varchar(255) NOT NULL,
  `DOWNLOAD_CLIENT_1` varchar(255) NOT NULL,
  `DOWNLOAD_CLIENT_2` varchar(255) NOT NULL,
  `SITE_TITLE` varchar(255) NOT NULL,
  `SITE_EMAIL` varchar(255) NOT NULL,
  `item_id` varchar(255) NOT NULL,
  `DropItemId` varchar(255) NOT NULL,
  `MAX_ENCHANT` varchar(255) NOT NULL,
  `SITE_DESCRIPTION` varchar(255) NOT NULL,
  `SITE_KEYWORDS` varchar(255) NOT NULL,
  `SITE_AUTHOR` varchar(255) NOT NULL,
  `POLL_QUESTION` varchar(255) NOT NULL,
  `POLL_ANSWER1` varchar(255) NOT NULL,
  `POLL_ANSWER2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1

;

--
-- Dumping data for table `configuration`
--

INSERT INTO `configuration` (`PATH_LOGINSERVER`, `PATH_GAMESERVER`, `SERVER_NAME`, `RATE_XP`, `RATE_SP`, `RATE_DROP`, `RATE_ADENA`, `RATE_SPOIL`, `PATH_LOGO`, `PATH_SLIDE1`, `PATH_SLIDE2`, `PATH_SLIDE3`, `SITE_VNAME1`, `SITE_VNAME2`, `SITE_VNAME3`, `SITE_VNAME4`, `SITE_VNAME5`, `SITE_VNAME6`, `PATH_VOTE1`, `PATH_VOTE2`, `PATH_VOTE3`, `PATH_VOTE4`, `PATH_VOTE5`, `PATH_VOTE6`, `SITE_VOTE1`, `SITE_VOTE2`, `SITE_VOTE3`, `SITE_VOTE4`, `SITE_VOTE5`, `SITE_VOTE6`, `CREDITS`, `DOWNLOAD_SYS_1`, `DOWNLOAD_SYS_2`, `DOWNLOAD_ANIM_1`, `DOWNLOAD_ANIM_2`, `DOWNLOAD_SYSTEX_1`, `DOWNLOAD_SYSTEX_2`, `DOWNLOAD_FULL_EXE_1`, `DOWNLOAD_FULL_EXE_2`, `DOWNLOAD_FULL_RAR_1`, `DOWNLOAD_FULL_RAR_2`, `DOWNLOAD_CLIENT_1`, `DOWNLOAD_CLIENT_2`, `SITE_TITLE`, `SITE_EMAIL`, `item_id`, `DropItemId`, `MAX_ENCHANT`, `SITE_DESCRIPTION`, `SITE_KEYWORDS`, `SITE_AUTHOR`, `POLL_QUESTION`, `POLL_ANSWER1`, `POLL_ANSWER2`) VALUES
('C:/', 'C:/', 'L2ERTHEIA', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31', '32', '33', '34', '35', '36', '37', '38', '39', '40', '41', '42', '43', '44', '45', '46', '47', '48', '49', '50', '51', '52', '53', '54');
