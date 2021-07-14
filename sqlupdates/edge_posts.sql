
CREATE TABLE `edge_posts` (
  `id` int(11) NOT NULL,
  `postagem` text NOT NULL,
  `usuario` text NOT NULL,
  `data` longtext NOT NULL,
  `staff` varchar(2) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT 'EdgeCMS - Posts'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

ALTER TABLE `edge_posts`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `edge_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
