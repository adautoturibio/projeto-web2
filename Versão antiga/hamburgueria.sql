-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema hamburgueria
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema hamburgueria
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `hamburgueria` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
-- -----------------------------------------------------
-- Schema hamburgueria
-- -----------------------------------------------------
USE `hamburgueria` ;

-- -----------------------------------------------------
-- Table `hamburgueria`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hamburgueria`.`categoria` (
  `idcategoria` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idcategoria`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `hamburgueria`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hamburgueria`.`usuario` (
  `idusuarios` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NULL,
  `telefone` VARCHAR(45) NULL,
  PRIMARY KEY (`idusuarios`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hamburgueria`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hamburgueria`.`cliente` (
  `idcliente` INT NOT NULL AUTO_INCREMENT,
  `usuarios_idusuarios` INT NOT NULL,
  PRIMARY KEY (`idcliente`),
  INDEX `fk_cliente_usuarios1_idx` (`usuarios_idusuarios` ASC) VISIBLE,
  CONSTRAINT `fk_cliente_usuarios1`
    FOREIGN KEY (`usuarios_idusuarios`)
    REFERENCES `hamburgueria`.`usuario` (`idusuarios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `hamburgueria`.`funcionario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hamburgueria`.`funcionario` (
  `idfuncionario` INT NOT NULL AUTO_INCREMENT,
  `usuarios_idusuarios` INT NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idfuncionario`),
  INDEX `fk_funcionario_usuarios1_idx` (`usuarios_idusuarios` ASC) VISIBLE,
  CONSTRAINT `fk_funcionario_usuarios1`
    FOREIGN KEY (`usuarios_idusuarios`)
    REFERENCES `hamburgueria`.`usuario` (`idusuarios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hamburgueria`.`entrega`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hamburgueria`.`entrega` (
  `identrega` INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) NULL,
  PRIMARY KEY (`identrega`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hamburgueria`.`pagamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hamburgueria`.`pagamento` (
  `idpagamento` INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) NULL,
  PRIMARY KEY (`idpagamento`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hamburgueria`.`pedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hamburgueria`.`pedido` (
  `idpedido` INT NOT NULL AUTO_INCREMENT,
  `data_hora_pedido` DATETIME NOT NULL,
  `valor_total` DECIMAL(10,2) NOT NULL,
  `cliente_id` INT NOT NULL,
  `endereco_entrega` TEXT NULL DEFAULT NULL,
  `observacao` TEXT NULL DEFAULT NULL,
  `pedido_persn` INT NULL,
  `funcionario_idfuncionario` INT NOT NULL,
  `entrega_identrega` INT NOT NULL,
  `pagamento_idpagamento` INT NOT NULL,
  PRIMARY KEY (`idpedido`),
  INDEX `cliente_id` (`cliente_id` ASC) VISIBLE,
  INDEX `fk_pedido_funcionario1_idx` (`funcionario_idfuncionario` ASC) VISIBLE,
  INDEX `fk_pedido_entrega1_idx` (`entrega_identrega` ASC) VISIBLE,
  INDEX `fk_pedido_pagamento1_idx` (`pagamento_idpagamento` ASC) VISIBLE,
  CONSTRAINT `pedido_ibfk_1`
    FOREIGN KEY (`cliente_id`)
    REFERENCES `hamburgueria`.`cliente` (`idcliente`),
  CONSTRAINT `fk_pedido_funcionario1`
    FOREIGN KEY (`funcionario_idfuncionario`)
    REFERENCES `hamburgueria`.`funcionario` (`idfuncionario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedido_entrega1`
    FOREIGN KEY (`entrega_identrega`)
    REFERENCES `hamburgueria`.`entrega` (`identrega`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedido_pagamento1`
    FOREIGN KEY (`pagamento_idpagamento`)
    REFERENCES `hamburgueria`.`pagamento` (`idpagamento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `hamburgueria`.`produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hamburgueria`.`produto` (
  `idproduto` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `descricao` TEXT NULL DEFAULT NULL,
  `foto` BLOB NULL DEFAULT NULL,
  `preco` DECIMAL(10,2) NOT NULL,
  `categoria_id` INT NOT NULL,
  `informacoes_alergenicas` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`idproduto`),
  INDEX `categoria_id` (`categoria_id` ASC) VISIBLE,
  CONSTRAINT `produto_ibfk_1`
    FOREIGN KEY (`categoria_id`)
    REFERENCES `hamburgueria`.`categoria` (`idcategoria`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `hamburgueria`.`itempedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hamburgueria`.`itempedido` (
  `iditempedido` INT NOT NULL AUTO_INCREMENT,
  `pedido_id` INT NOT NULL,
  `produto_id` INT NOT NULL,
  `quantidade` INT NULL DEFAULT NULL,
  `personalizacao` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`iditempedido`),
  INDEX `pedido_id` (`pedido_id` ASC) VISIBLE,
  INDEX `produto_id` (`produto_id` ASC) VISIBLE,
  CONSTRAINT `itempedido_ibfk_1`
    FOREIGN KEY (`pedido_id`)
    REFERENCES `hamburgueria`.`pedido` (`idpedido`),
  CONSTRAINT `itempedido_ibfk_2`
    FOREIGN KEY (`produto_id`)
    REFERENCES `hamburgueria`.`produto` (`idproduto`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `hamburgueria`.`personalizado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hamburgueria`.`personalizado` (
  `idpersonalizado` INT NOT NULL AUTO_INCREMENT,
  `pedido_pers` TEXT NULL,
  `pedido_pedido_id` INT NOT NULL,
  PRIMARY KEY (`idpersonalizado`),
  INDEX `fk_personalizados_pedido1_idx` (`pedido_pedido_id` ASC) VISIBLE,
  CONSTRAINT `fk_personalizados_pedido1`
    FOREIGN KEY (`pedido_pedido_id`)
    REFERENCES `hamburgueria`.`pedido` (`idpedido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

