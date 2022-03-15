CREATE TABLE `food` (
  `id` int NOT NULL COMMENT 'Primary Key',
  `foodGroup` varchar(100) DEFAULT NULL,
  `foodName` varchar(100) DEFAULT NULL,
  `energyKJ` int DEFAULT NULL,
  `energyKCAL` int DEFAULT NULL,
  `protein` float DEFAULT NULL,
  `fat` float DEFAULT NULL,
  `carb` float DEFAULT NULL,
  `fiber` float DEFAULT NULL,
  `waste` int DEFAULT NULL,
  PRIMARY KEY (`id`)
);