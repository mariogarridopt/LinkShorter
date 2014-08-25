CREATE TABLE IF NOT EXISTS `shortlinks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `url` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `shotlinks` (`id`, `code`, `url`, `created`) VALUES
(1, 'grid', 'http://codegrid.org', '2014-07-02 22:22:48'),
