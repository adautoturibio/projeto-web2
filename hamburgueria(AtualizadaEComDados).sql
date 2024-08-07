-- Adminer 4.8.1 MySQL 5.5.5-10.5.24-MariaDB-1:10.5.24+maria~ubu2004 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `categorias_id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`categorias_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `categorias` (`categorias_id`, `nome`) VALUES
(1,	'hamburguer'),
(2,	'Bebida');

DROP TABLE IF EXISTS `entregas`;
CREATE TABLE `entregas` (
  `entregas_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) DEFAULT NULL,
  `endereco_entrega` text DEFAULT NULL,
  `pedidos_pedidos_id` int(11) NOT NULL,
  PRIMARY KEY (`entregas_id`),
  KEY `fk_entregas_pedidos_id` (`pedidos_pedidos_id`),
  CONSTRAINT `fk_entregas_pedidos` FOREIGN KEY (`pedidos_pedidos_id`) REFERENCES `pedidos` (`pedidos_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `forma_pagamento`;
CREATE TABLE `forma_pagamento` (
  `forma_pagamento_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`forma_pagamento_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `imgprodutos`;
CREATE TABLE `imgprodutos` (
  `imgprodutos_id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `produtos_id` int(11) NOT NULL,
  PRIMARY KEY (`imgprodutos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- INSERT INTO `imgprodutos` (`imgprodutos_id`, `link`, `descricao`, `produtos_id`) VALUES
-- (1,	'https://img.freepik.com/fotos-gratis/ainda-vida-de-delicioso-hamburguer-americano_23-2149637312.jpg?t=st=1722971566~exp=1722975166~hmac=5433e064d78788c6775d35fda439f996ee0ab1d6395b521e1b4d220de3435e73&w=740',	'x-tudo',	2);

DROP TABLE IF EXISTS `itempedidos`;
CREATE TABLE `itempedidos` (
  `itempedidos_id` int(11) NOT NULL AUTO_INCREMENT,
  `pedidos_pedidos_id` int(11) NOT NULL,
  `produtos_produtos_id` int(11) NOT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `personalizacao` text DEFAULT NULL,
  PRIMARY KEY (`itempedidos_id`),
  KEY `pedidos_id` (`pedidos_pedidos_id`),
  KEY `produtos_id` (`produtos_produtos_id`),
  CONSTRAINT `fk_itempedidos_pedidos` FOREIGN KEY (`pedidos_pedidos_id`) REFERENCES `pedidos` (`pedidos_id`),
  CONSTRAINT `fk_itempedidos_produtos` FOREIGN KEY (`produtos_produtos_id`) REFERENCES `produtos` (`produtos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `pagamentos`;
CREATE TABLE `pagamentos` (
  `pagamentos_id` int(11) NOT NULL AUTO_INCREMENT,
  `valor_total` decimal(10,2) NOT NULL,
  `pedidos_pedidos_id` int(11) NOT NULL,
  `forma_pagamento_forma_pagamento_id` int(11) NOT NULL,
  PRIMARY KEY (`pagamentos_id`),
  KEY `pedidos_id` (`pedidos_pedidos_id`),
  KEY `forma_pagamento_id` (`forma_pagamento_forma_pagamento_id`),
  CONSTRAINT `fk_pagamentos_forma_pagamento` FOREIGN KEY (`forma_pagamento_forma_pagamento_id`) REFERENCES `forma_pagamento` (`forma_pagamento_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pagamentos_pedidos` FOREIGN KEY (`pedidos_pedidos_id`) REFERENCES `pedidos` (`pedidos_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE `pedidos` (
  `pedidos_id` int(11) NOT NULL AUTO_INCREMENT,
  `data_hora_pedidos` datetime NOT NULL DEFAULT current_timestamp(),
  `observacao` varchar(255) DEFAULT NULL,
  `usuarios_usuarios_id` int(11) NOT NULL,
  `entregas_entregas_id` int(11) NOT NULL,
  `pagamentos_pagamentos_id` int(11) NOT NULL,
  PRIMARY KEY (`pedidos_id`),
  KEY `fk_pedidos_usuarios_idx` (`usuarios_usuarios_id`),
  KEY `fk_pedidos_entregas_idx` (`entregas_entregas_id`),
  KEY `fk_pedidos_pagamentos_idx` (`pagamentos_pagamentos_id`),
  CONSTRAINT `fk_pedidos_entregas` FOREIGN KEY (`entregas_entregas_id`) REFERENCES `entregas` (`entregas_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedidos_pagamentos` FOREIGN KEY (`pagamentos_pagamentos_id`) REFERENCES `pagamentos` (`pagamentos_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedidos_usuarios` FOREIGN KEY (`usuarios_usuarios_id`) REFERENCES `usuarios` (`usuarios_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `personalizados`;
CREATE TABLE `personalizados` (
  `personalizados_id` int(11) NOT NULL AUTO_INCREMENT,
  `pedidos_persn` text DEFAULT NULL,
  `pedidos_pedidos_id` int(11) NOT NULL,
  PRIMARY KEY (`personalizados_id`),
  KEY `fk_personalizados_pedidos_idx` (`pedidos_pedidos_id`),
  CONSTRAINT `fk_personalizados_pedidos` FOREIGN KEY (`pedidos_pedidos_id`) REFERENCES `pedidos` (`pedidos_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `produtos`;
CREATE TABLE `produtos` (
  `produtos_id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `descricao` text DEFAULT NULL,
  `preco_custo` float(9,2) NOT NULL,
  `preco_venda` float(9,2) NOT NULL,
  `categorias_id` int(11) NOT NULL,
  `img` varchar(1000) NOT NULL,
  PRIMARY KEY (`produtos_id`),
  KEY `categorias_id` (`categorias_id`),
  CONSTRAINT `fk_produtos_categorias` FOREIGN KEY (`categorias_id`) REFERENCES `categorias` (`categorias_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `produtos` (`produtos_id`, `nome`, `descricao`, `preco_custo`, `preco_venda`, `categorias_id`, `img`) VALUES
(1, 'Burger Clássico', 'Pão, carne de hambúrguer, queijo, alface, tomate, cebola, picles, molho especial', 10.00, 18.00, 1, 'https://i.imgur.com/FYpad9p.jpeg'),
(2, 'Cheeseburger', 'Pão, carne de hambúrguer, queijo, alface, tomate, cebola, picles, molho especial', 11.00, 20.00, 1, 'https://i.imgur.com/VBXXVDT.jpeg'),
(3, 'Bacon Burger', 'Pão, carne de hambúrguer, queijo, alface, tomate, cebola, picles, molho especial', 12.00, 22.00, 1, 'https://i.imgur.com/01q4ppO.jpeg'),
(4, 'Chicken Burger', 'Pão, carne de hambúrguer, queijo, alface, tomate, cebola, picles, molho especial', 9.00, 17.00, 1, 'https://i.imgur.com/x34KZhO.jpeg'),
(5, 'Veggie Burger', 'Pão, carne de hambúrguer, queijo, alface, tomate, cebola, picles, molho especial', 8.00, 16.00, 1, 'https://i.imgur.com/2mgor39.jpeg'),
(6, 'Double Burger', 'Pão, carne de hambúrguer, queijo, alface, tomate, cebola, picles, molho especial', 14.00, 25.00, 1, 'https://i.imgur.com/ngoerYc.jpeg'),
(7, 'Coca-Cola Lata', 'Coca-Cola lata 350 ml', 1.50, 4.00, 2, 'https://i.imgur.com/a9gp7ij.jpeg'),
(8, 'Coca-Cola 2L', 'Coca-Cola garrafa 2 litros', 3.00, 8.00, 2, 'https://i.imgur.com/uZPZrUt.jpeg'),
(9, 'Fanta Lata', 'Fanta lata 350 ml', 1.50, 4.00, 2, 'https://i.imgur.com/Hziosok.jpeg'),
(10, 'Suco de Laranja', 'Suco de laranja natural 500 ml', 2.00, 6.00, 2, 'https://i.imgur.com/eR33Q7v.jpeg'),
(11, 'Guaraná Lata', 'Guaraná lata 350 ml', 1.50, 4.00, 2, 'https://i.imgur.com/vxjuTsH.jpeg'),
(12, 'Guaraná 2L', 'Guaraná garrafa 2 litros', 3.00, 8.00, 2, 'https://i.imgur.com/xCfUOZJ.jpeg');


DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `usuarios_id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `data_nasc` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `nivel` int(11) NOT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`usuarios_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `usuarios` (`usuarios_id`, `nome`, `sobrenome`, `telefone`, `data_nasc`, `email`, `senha`, `nivel`, `data_cadastro`) VALUES
(1,	'administrador',	'',	'(62) 98154-5421',	'2000-08-12',	'moderador01@gmail.com',	'a073801fcc2a4926908dd20c7d0a4dbe',	1,	'2024-08-01 10:15:05'),
(2,	'cliente',	'',	'(62) 98357-2154',	'1998-04-12',	'cliente01@gmail.com',	'd39c4be26e1e1f467bacb586a20c5aa8',	0,	'2024-08-01 10:20:05');

-- 2024-08-06 22:37:31