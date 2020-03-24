-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema animal_bd
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema animal_bd
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `animal_bd` DEFAULT CHARACTER SET utf8 ;
USE `animal_bd` ;

-- -----------------------------------------------------
-- Table `animal_bd`.`Cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `animal_bd`.`Cliente` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(150) NOT NULL,
  `Apellido` VARCHAR(150) NOT NULL,
  `Direccion` TEXT NOT NULL,
  `Correo` VARCHAR(199) NOT NULL,
  `Password` VARCHAR(99) NOT NULL,
  `Estatus` INT NOT NULL COMMENT '0 = activo\n1 = incativo',
  `Tipo` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `animal_bd`.`Mascota`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `animal_bd`.`Mascota` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(150) NOT NULL,
  `Tipo` VARCHAR(45) NOT NULL,
  `Color` VARCHAR(45) NOT NULL,
  `Caracteristica` TEXT NULL,
  `Estatus` INT NOT NULL,
  `Cliente_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Mascota_Cliente1_idx` (`Cliente_id` ASC) ,
  CONSTRAINT `fk_Mascota_Cliente1`
    FOREIGN KEY (`Cliente_id`)
    REFERENCES `animal_bd`.`Cliente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `animal_bd`.`Veterinario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `animal_bd`.`Veterinario` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(150) NOT NULL,
  `Apellido` VARCHAR(150) NOT NULL,
  `Correo` VARCHAR(199) NOT NULL,
  `Password` VARCHAR(99) NOT NULL,
  `Tipo` INT NOT NULL,
  `Estatus` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `animal_bd`.`Cita`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `animal_bd`.`Cita` (
  `idCita` INT NOT NULL AUTO_INCREMENT,
  `Diagnositco` TEXT NULL,
  `Fecha` DATE NOT NULL,
  `Hora` VARCHAR(60) NOT NULL,
  `Veterinario_id` INT UNSIGNED NOT NULL,
  `Mascota_id` INT NOT NULL,
  `Cliente_id` INT NOT NULL,
  `Estatus` INT NOT NULL COMMENT '0 = pendiente\n1 = confirmado\n3 = cancelada\n4 = concluido',
  `Eliminado_cliente` INT NOT NULL COMMENT '0 = no\n1 = si',
  `Eliminado_veterinario` INT NOT NULL,
  `Eliminado_admin` INT NOT NULL,
  PRIMARY KEY (`idCita`),
  INDEX `fk_Cita_Veterinario1_idx` (`Veterinario_id` ASC) ,
  INDEX `fk_Cita_Mascota1_idx` (`Mascota_id` ASC) ,
  INDEX `fk_Cita_Cliente1_idx` (`Cliente_id` ASC) ,
  CONSTRAINT `fk_Cita_Veterinario1`
    FOREIGN KEY (`Veterinario_id`)
    REFERENCES `animal_bd`.`Veterinario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Cita_Mascota1`
    FOREIGN KEY (`Mascota_id`)
    REFERENCES `animal_bd`.`Mascota` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Cita_Cliente1`
    FOREIGN KEY (`Cliente_id`)
    REFERENCES `animal_bd`.`Cliente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
