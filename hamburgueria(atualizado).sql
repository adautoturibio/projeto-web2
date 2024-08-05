
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';



CREATE SCHEMA IF NOT EXISTS `hamburgueria` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ;
-- -----------------------------------------------------
-- Schema hamburgueria
-- -----------------------------------------------------
USE `hamburgueria` ;


CREATE TABLE IF NOT EXISTS `hamburgueria`.`imgprodutos` (
  `imgprodutos_id` int(11) NOT NULL  AUTO_INCREMENT,
  `link` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `produtos_id` int(11) NOT NULL,
  PRIMARY KEY (`imgprodutos_id`)) 
  ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- -----------------------------------------------------
-- Table `hamburgueria`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hamburgueria`.`categorias` (
  `categorias_id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`categorias_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_general_ci;


-- -----------------------------------------------------
-- Table `hamburgueria`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hamburgueria`.`usuarios` (
  `usuarios_id` INT NOT NULL,
  `nome` VARCHAR(100) NOT NULL,
  `sobrenome`VARCHAR(100) NOT NULL,
  `telefone` VARCHAR(45) NULL,
  `data_nasc`DATE NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `nivel` int(11) NOT NULL,
  `data_cadastro` DATETIME NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`usuarios_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_general_ci;

INSERT INTO `usuarios` (`usuarios_id`, `nome`, `sobrenome`, `telefone`, `data_nasc`, `email`, `senha`, `nivel`,`data_cadastro`) 
VALUES (1, 'administrador', '', '(62) 98154-5421', '2000-08-12', 'moderador01@gmail.com', 'a073801fcc2a4926908dd20c7d0a4dbe', '1', '2024-08-01 10:15:05'),
(2, 'cliente','', '(62) 98357-2154', '1998-04-12', 'cliente01@gmail.com', 'd39c4be26e1e1f467bacb586a20c5aa8', '0', '2024-08-01 10:20:05');


-- -----------------------------------------------------
-- Table `hamburgueria`.`clientes`
-- -----------------------------------------------------
-- CREATE TABLE IF NOT EXISTS `hamburgueria`.`clientes` (
--   `clientes_id` INT NOT NULL AUTO_INCREMENT,
--   `usuarios_usuarios_id` INT NOT NULL,
--   PRIMARY KEY (`clientes_id`),
--   INDEX `fk_clientes_usuarios_idx` (`usuarios_usuarios_id` ASC) VISIBLE,
--   CONSTRAINT `fk_clientes_usuarios`
--     FOREIGN KEY (`usuarios_usuarios_id`)
--     REFERENCES `hamburgueria`.`usuarios` (`usuarios_id`)
--     ON DELETE NO ACTION
--     ON UPDATE NO ACTION)
-- ENGINE = InnoDB
-- DEFAULT CHARACTER SET = utf8mb4
-- COLLATE = utf8mb4_general_ci;


-- -- -----------------------------------------------------
-- -- Table `hamburgueria`.`funcionarios`
-- -- -----------------------------------------------------
-- CREATE TABLE IF NOT EXISTS `hamburgueria`.`funcionarios` (
--   `funcionarios_id` INT NOT NULL AUTO_INCREMENT,
--   `usuarios_usuarios_id` INT NOT NULL,
--   `senha` VARCHAR(45) NOT NULL,
--   PRIMARY KEY (`funcionarios_id`),
--   INDEX `fk_funcionarios_usuarios_idx` (`usuarios_usuarios_id` ASC) VISIBLE,
--   CONSTRAINT `fk_funcionarios_usuarios`
--     FOREIGN KEY (`usuarios_usuarios_id`)
--     REFERENCES `hamburgueria`.`usuarios` (`usuarios_id`)
--     ON DELETE NO ACTION
--     ON UPDATE NO ACTION)
-- ENGINE = InnoDB
-- DEFAULT CHARACTER SET = utf8mb4
-- COLLATE = utf8mb4_general_ci;


-- -----------------------------------------------------
-- Table `hamburgueria`.`entregas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hamburgueria`.`entregas` (
  `entregas_id` INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) NULL,
  `endereco_entrega` TEXT NULL DEFAULT NULL,
  `pedidos_pedidos_id` INT NOT NULL,
  PRIMARY KEY (`entregas_id`),
  INDEX `fk_entregas_pedidos_id` (`pedidos_pedidos_id` ASC) VISIBLE,
  CONSTRAINT `fk_entregas_pedidos`
  FOREIGN KEY (`pedidos_pedidos_id`)
  REFERENCES `hamburgueria`.`pedidos` (`pedidos_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_general_ci;


-- -----------------------------------------------------
-- Table `hamburgueria`.`pagamentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hamburgueria`.`pagamentos` (
  `pagamentos_id` INT NOT NULL AUTO_INCREMENT,
  `valor_total` DECIMAL(10,2) NOT NULL,
  `pedidos_pedidos_id` INT NOT NULL,
  `forma_pagamento_forma_pagamento_id` INT NOT NULL,
  PRIMARY KEY (`pagamentos_id`),
  INDEX `pedidos_id` (`pedidos_pedidos_id` ASC) VISIBLE,
  INDEX `forma_pagamento_id`(`forma_pagamento_forma_pagamento_id` ASC) VISIBLE,
  CONSTRAINT `fk_pagamentos_pedidos`
  FOREIGN KEY (`pedidos_pedidos_id`)
  REFERENCES `hamburgueria`.`pedidos` (`pedidos_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
  CONSTRAINT `fk_pagamentos_forma_pagamento`
  FOREIGN KEY (`forma_pagamento_forma_pagamento_id`)
  REFERENCES `hamburgueria`.`forma_pagamento` (`forma_pagamento_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `hamburgueria`.`forma_pagamento`(
  `forma_pagamento_id`INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) NULL,
  PRIMARY KEY (`forma_pagamento_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_general_ci;

-- -----------------------------------------------------
-- Table `hamburgueria`.`pedidos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hamburgueria`.`pedidos` (
  `pedidos_id` INT NOT NULL AUTO_INCREMENT,
  `data_hora_pedidos` DATETIME NOT NULL DEFAULT current_timestamp(), 
  `observacao` VARCHAR(255) NULL DEFAULT NULL,
  `usuarios_usuarios_id` INT NOT NULL,
  `entregas_entregas_id` INT NOT NULL,
  `pagamentos_pagamentos_id` INT NOT NULL,
  PRIMARY KEY (`pedidos_id`),
  INDEX `fk_pedidos_usuarios_idx` (`usuarios_usuarios_id` ASC) VISIBLE,
  INDEX `fk_pedidos_entregas_idx` (`entregas_entregas_id` ASC) VISIBLE,
  INDEX `fk_pedidos_pagamentos_idx` (`pagamentos_pagamentos_id` ASC) VISIBLE,
  CONSTRAINT `fk_pedidos_usuarios`
    FOREIGN KEY (`usuarios_usuarios_id`)
    REFERENCES `hamburgueria`.`usuarios` (`usuarios_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedidos_entregas`
    FOREIGN KEY (`entregas_entregas_id`)
    REFERENCES `hamburgueria`.`entregas` (`entregas_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedidos_pagamentos`
    FOREIGN KEY (`pagamentos_pagamentos_id`)
    REFERENCES `hamburgueria`.`pagamentos` (`pagamentos_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_general_ci;


-- -----------------------------------------------------
-- Table `hamburgueria`.`produtos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hamburgueria`.`produtos` (
  `produtos_id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `descricao` TEXT NULL DEFAULT NULL,
  `preco_custo` float(9,2) NOT NULL,
  `preco_venda` float(9,2) NOT NULL,
  `categorias_id` INT NOT NULL,
  PRIMARY KEY (`produtos_id`),
  INDEX `categorias_id` (`categorias_id` ASC) VISIBLE,
  CONSTRAINT `fk_produtos_categorias`
    FOREIGN KEY (`categorias_id`)
    REFERENCES `hamburgueria`.`categorias` (`categorias_id`)  ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_general_ci;


-- -----------------------------------------------------
-- Table `hamburgueria`.`itempedidos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hamburgueria`.`itempedidos` (
  `itempedidos_id` INT NOT NULL AUTO_INCREMENT,
  `pedidos_pedidos_id` INT NOT NULL,
  `produtos_produtos_id` INT NOT NULL,
  `quantidade` INT NULL DEFAULT NULL,
  `personalizacao` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`itempedidos_id`),
  INDEX `pedidos_id` (`pedidos_pedidos_id` ASC) VISIBLE,
  INDEX `produtos_id` (`produtos_produtos_id` ASC) VISIBLE,
  CONSTRAINT `fk_itempedidos_pedidos`
    FOREIGN KEY (`pedidos_pedidos_id`)
    REFERENCES `hamburgueria`.`pedidos` (`pedidos_id`),
  CONSTRAINT `fk_itempedidos_produtos`
    FOREIGN KEY (`produtos_produtos_id`)
    REFERENCES `hamburgueria`.`produtos` (`produtos_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_general_ci;


-- -----------------------------------------------------
-- Table `hamburgueria`.`personalizados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hamburgueria`.`personalizados` (
  `personalizados_id` INT NOT NULL AUTO_INCREMENT,
  `pedidos_persn` TEXT NULL,
  `pedidos_pedidos_id` INT NOT NULL,
  PRIMARY KEY (`personalizados_id`),
  INDEX `fk_personalizados_pedidos_idx` (`pedidos_pedidos_id` ASC) VISIBLE,
  CONSTRAINT `fk_personalizados_pedidos`
    FOREIGN KEY (`pedidos_pedidos_id`)
    REFERENCES `hamburgueria`.`pedidos` (`pedidos_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_general_ci;




SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

