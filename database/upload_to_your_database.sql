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
