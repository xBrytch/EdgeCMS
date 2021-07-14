
CREATE TABLE `cms_news` (
  `id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `image` varchar(500) NOT NULL,
  `shortstory` text NOT NULL,
  `longstory` text NOT NULL,
  `formulario` text NOT NULL,
  `formvisible` enum('0','1','2') NOT NULL DEFAULT '0',
  `author` varchar(200) NOT NULL DEFAULT 'Hotel',
  `livenews` enum('0','1') NOT NULL DEFAULT '0',
  `active_comment` enum('0','1') DEFAULT '0',
  `active_form` enum('0','1') DEFAULT '0',
  `active_badge` enum('0','1') NOT NULL DEFAULT '0',
  `category` enum('gratis','hotel','mobis','promocao','sistema') NOT NULL DEFAULT 'hotel',
  `badge` varchar(550) NOT NULL,
  `date` int(11) NOT NULL DEFAULT '0',
  `gotoclient` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `cms_news` (`id`, `title`, `image`, `shortstory`, `longstory`, `author`, `livenews`, `active_comment`, `active_form`, `active_badge`, `category`, `badge`, `date`, `gotoclient`) VALUES
(1, 'EdgeCMS ', 'http://localhost/housekeeping/hen/web_promo/web_promo_royal.png', 'EdgeServer Pack - CMS + UI NITRO', '<p>EdgeSERVER - Obrigado pela prefer&ecirc;ncia, Edge &eacute; um pack privado de &uacute;ltima gera&ccedil;&atilde;o contendo os melhores e mais atualizados produtos do mundo do Habbo, contamos com a &uacute;ltima vers&atilde;o do HTML5, em BETA e mesmo assim nos proporciona uma experi&ecirc;ncia incr&iacute;vel, aprecie nosso modelo CMS, desenvolvido em bootstrap lumen, sendo escrito com:</p>\n\n<ul>\n	<li>PHP 47.0%&nbsp;</li>\n	<li>JavaScript 38.4%&nbsp;</li>\n	<li>CSS 13.1%&nbsp;</li>\n	<li>HTML 1.5%</li>\n</ul>\n\n<p>Um dos melhores e mais bonitos sistemas atualmente no mundo dos pixels, buscamos ser &quot;perfeitos&quot; mas, tendo em vista que somos humanos, podemos ter errado ou deixado algo para tr&aacute;s, caso algum problema ou bug venha acontecer contate: Brytch#5925 no discord.</p>\n\n<p>Att, EdgeServer.</p>\n', 'Brytch', '', '1', '0', '0', 'hotel', '', 1617574905, '0');

ALTER TABLE `cms_news`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `cms_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

