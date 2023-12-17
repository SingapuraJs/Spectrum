CREATE TABLE `usuarios` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `usr_usuario` varchar(255) NOT NULL,
  `usr_email` varchar(255) NOT NULL,
  `usr_senha` varchar(255) NOT NULL,
  `usr_foto` longtext,
  `usr_bio` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
)

CREATE TABLE `posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `imagem` longtext NOT NULL,
  `descricao` text,
  `dataCriacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_usuario` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`)
)
