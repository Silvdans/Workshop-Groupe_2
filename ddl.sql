CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `mail` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,

  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

CREATE TABLE `vote` (
  `user` int(11) NOT NULL,
  `theme` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;


CREATE TABLE `theme` (
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`name`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

ALTER TABLE `vote`
  ADD CONSTRAINT `theme_FK` FOREIGN KEY (`user`) REFERENCES `theme` (`name`) ON DELETE CASCADE;
