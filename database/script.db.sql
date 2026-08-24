-- MySQL Workbench Synchronization
-- Generated: 2026-08-24 11:11
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: isabela_albano

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

ALTER TABLE `aumigos`.`id_clientes` 
DROP FOREIGN KEY `fk_id_clientes_id_animais`;

ALTER TABLE `aumigos`.`id_animais` 
DROP FOREIGN KEY `fk_id_animais_cadastro_animal1`;

ALTER TABLE `aumigos`.`cadastro_animal` 
DROP FOREIGN KEY `fk_cadastro_animal_cadastro_cliente1`;

ALTER TABLE `aumigos`.`cadastro_cliente` 
DROP FOREIGN KEY `fk_cadastro_cliente_id_clientes1`;

ALTER TABLE `aumigos`.`id_clientes` 
ADD COLUMN `vizualizar_dados_clientes` VARCHAR(45) NOT NULL AFTER `id_clientescol`;

ALTER TABLE `aumigos`.`cadastro_animal` 
ADD COLUMN `listar_animais` VARCHAR(45) NOT NULL AFTER `gerenciar_animal`;

ALTER TABLE `aumigos`.`cadastro_cliente` 
ADD COLUMN `listar_clientes` VARCHAR(45) NOT NULL AFTER `gerenciar_clientes`;

CREATE TABLE IF NOT EXISTS `aumigos`.`SIstema_Clientes` (
  `idSIstema_Clientes` INT(11) NOT NULL,
  `SIstema_Clientescol` VARCHAR(45) NOT NULL,
  `editar_cliente` VARCHAR(45) NOT NULL,
  `excluir_cliente` VARCHAR(45) NOT NULL,
  `id_clientes_id_clientes` INT(11) NOT NULL,
  PRIMARY KEY (`idSIstema_Clientes`),
  INDEX `fk_SIstema_Clientes_id_clientes1_idx` (`id_clientes_id_clientes` ASC) VISIBLE,
  CONSTRAINT `fk_SIstema_Clientes_id_clientes1`
    FOREIGN KEY (`id_clientes_id_clientes`)
    REFERENCES `aumigos`.`id_clientes` (`id_clientes`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

ALTER TABLE `aumigos`.`id_clientes` 
ADD CONSTRAINT `fk_id_clientes_id_animais`
  FOREIGN KEY (`id_animais_id_animais`)
  REFERENCES `aumigos`.`id_animais` (`id_animais`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `aumigos`.`id_animais` 
ADD CONSTRAINT `fk_id_animais_cadastro_animal1`
  FOREIGN KEY (`cadastro_animal_idcadastro_animal`)
  REFERENCES `aumigos`.`cadastro_animal` (`idcadastro_animal`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `aumigos`.`cadastro_animal` 
ADD CONSTRAINT `fk_cadastro_animal_cadastro_cliente1`
  FOREIGN KEY (`cadastro_cliente_idcadastro_cliente`)
  REFERENCES `aumigos`.`cadastro_cliente` (`idcadastro_cliente`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `aumigos`.`cadastro_cliente` 
ADD CONSTRAINT `fk_cadastro_cliente_id_clientes1`
  FOREIGN KEY (`id_clientes_id_clientes`)
  REFERENCES `aumigos`.`id_clientes` (`id_clientes`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;


-- -----------------------------------------------------
-- Placeholder table for view `aumigos`.`view1`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aumigos`.`view1` (`id` INT);


USE `aumigos`;

-- -----------------------------------------------------
-- View `aumigos`.`view1`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `aumigos`.`view1`;
USE `aumigos`;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
