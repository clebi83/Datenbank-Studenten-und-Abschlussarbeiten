-- MySQL Script generated by MySQL Workbench
-- Sun Dec 31 13:50:21 2017
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema abschlussarbeiten
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema abschlussarbeiten
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `abschlussarbeiten` DEFAULT CHARACTER SET utf8 ;
USE `abschlussarbeiten` ;

-- -----------------------------------------------------
-- Table `abschlussarbeiten`.`tblStudienabschluss`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `abschlussarbeiten`.`tblStudienabschluss` ;

CREATE TABLE IF NOT EXISTS `abschlussarbeiten`.`tblStudienabschluss` (
  `idtblStudienabschluss` INT NOT NULL AUTO_INCREMENT,
  `Art` VARCHAR(45) NULL,
  PRIMARY KEY (`idtblStudienabschluss`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `abschlussarbeiten`.`tblStudierende`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `abschlussarbeiten`.`tblStudierende` ;

CREATE TABLE IF NOT EXISTS `abschlussarbeiten`.`tblStudierende` (
  `Matrikelnummer` INT(45) NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NULL,
  `Vorname` VARCHAR(45) NULL,
  `Titel` VARCHAR(45) NULL,
  `Wohnort` VARCHAR(45) NULL,
  `Email` VARCHAR(45) NULL,
  `Foto` VARCHAR(500) NULL,
  `Telefonnummer` VARCHAR(45) NULL,
  `fkStudienabschluss` INT NULL,
  UNIQUE INDEX `MatrikelNummer_UNIQUE` (`Matrikelnummer` ASC),
  PRIMARY KEY (`Matrikelnummer`),
  INDEX `fk_tblStudierende_tblStudienabschluss_idx` (`fkStudienabschluss` ASC),
  CONSTRAINT `fk_tblStudierende_tblStudienabschluss`
    FOREIGN KEY (`fkStudienabschluss`)
    REFERENCES `abschlussarbeiten`.`tblStudienabschluss` (`idtblStudienabschluss`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `abschlussarbeiten`.`tblArtderArbeit`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `abschlussarbeiten`.`tblArtderArbeit` ;

CREATE TABLE IF NOT EXISTS `abschlussarbeiten`.`tblArtderArbeit` (
  `idtblArtderArbeit` INT NOT NULL AUTO_INCREMENT,
  `ArtderArbeit` VARCHAR(500) NOT NULL,
  PRIMARY KEY (`idtblArtderArbeit`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `abschlussarbeiten`.`tblAbschlussarbeit`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `abschlussarbeiten`.`tblAbschlussarbeit` ;

CREATE TABLE IF NOT EXISTS `abschlussarbeiten`.`tblAbschlussarbeit` (
  `idtblAbschlussarbeit` INT NOT NULL AUTO_INCREMENT,
  `Titel` VARCHAR(45) NULL,
  `Studienrichtung` VARCHAR(45) NULL,
  `Hochschule` VARCHAR(45) NULL,
  `DatumBewilligung` DATE NULL,
  `tblArtderArbeit_idtblArtderArbeit` INT NOT NULL,
  `Abgabetermin` DATE NULL,
  `Note` FLOAT NULL,
  `fk_ArtderArbeit` INT NOT NULL,
  `tblStudierende_MatrikelNummer` INT(45) NOT NULL,
  PRIMARY KEY (`idtblAbschlussarbeit`),
  INDEX `fk_tblAbschlussarbeit_tblArtderArbeit1_idx` (`fk_ArtderArbeit` ASC),
  INDEX `fk_tblAbschlussarbeit_tblStudierende1_idx` (`tblStudierende_MatrikelNummer` ASC),
  CONSTRAINT `fk_tblAbschlussarbeit_tblArtderArbeit1`
    FOREIGN KEY (`fk_ArtderArbeit`)
    REFERENCES `abschlussarbeiten`.`tblArtderArbeit` (`idtblArtderArbeit`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblAbschlussarbeit_tblStudierende1`
    FOREIGN KEY (`tblStudierende_MatrikelNummer`)
    REFERENCES `abschlussarbeiten`.`tblStudierende` (`Matrikelnummer`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `abschlussarbeiten`.`tblBetreuerGutachter`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `abschlussarbeiten`.`tblBetreuerGutachter` ;

CREATE TABLE IF NOT EXISTS `abschlussarbeiten`.`tblBetreuerGutachter` (
  `idtblBetreuerGutachter` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NULL,
  `Vorname` VARCHAR(45) NULL,
  `Titel` VARCHAR(45) NULL,
  `Telefonnummer` VARCHAR(45) NULL,
  `Email` VARCHAR(45) NULL,
  PRIMARY KEY (`idtblBetreuerGutachter`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `abschlussarbeiten`.`tblGutachter`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `abschlussarbeiten`.`tblGutachter` ;

CREATE TABLE IF NOT EXISTS `abschlussarbeiten`.`tblGutachter` (
  `fk_idtblAbschlussarbeit` INT NOT NULL,
  `fk_idtblBetreuerGutachter` INT NOT NULL,
  PRIMARY KEY (`fk_idtblAbschlussarbeit`, `fk_idtblBetreuerGutachter`),
  INDEX `fk_tblAbschlussarbeit_has_tblBetreuerGutachter_tblBetreuerG_idx` (`fk_idtblBetreuerGutachter` ASC),
  INDEX `fk_tblAbschlussarbeit_has_tblBetreuerGutachter_tblAbschluss_idx` (`fk_idtblAbschlussarbeit` ASC),
  CONSTRAINT `fk_tblAbschlussarbeit_has_tblBetreuerGutachter_tblAbschlussar1`
    FOREIGN KEY (`fk_idtblAbschlussarbeit`)
    REFERENCES `abschlussarbeiten`.`tblAbschlussarbeit` (`idtblAbschlussarbeit`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblAbschlussarbeit_has_tblBetreuerGutachter_tblBetreuerGut1`
    FOREIGN KEY (`fk_idtblBetreuerGutachter`)
    REFERENCES `abschlussarbeiten`.`tblBetreuerGutachter` (`idtblBetreuerGutachter`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `abschlussarbeiten`.`tblBetreuer`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `abschlussarbeiten`.`tblBetreuer` ;

CREATE TABLE IF NOT EXISTS `abschlussarbeiten`.`tblBetreuer` (
  `fk_idtblAbschlussarbeit` INT NOT NULL,
  `fk_idtblBetreuerGutachter` INT NOT NULL,
  PRIMARY KEY (`fk_idtblAbschlussarbeit`, `fk_idtblBetreuerGutachter`),
  INDEX `fk_tblAbschlussarbeit_has_tblBetreuerGutachter_tblBetreuerG_idx` (`fk_idtblBetreuerGutachter` ASC),
  INDEX `fk_tblAbschlussarbeit_has_tblBetreuerGutachter_tblAbschluss_idx` (`fk_idtblAbschlussarbeit` ASC),
  CONSTRAINT `fk_tblAbschlussarbeit_has_tblBetreuerGutachter_tblAbschlussar10`
    FOREIGN KEY (`fk_idtblAbschlussarbeit`)
    REFERENCES `abschlussarbeiten`.`tblAbschlussarbeit` (`idtblAbschlussarbeit`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_tblAbschlussarbeit_has_tblBetreuerGutachter_tblBetreuerGut10`
    FOREIGN KEY (`fk_idtblBetreuerGutachter`)
    REFERENCES `abschlussarbeiten`.`tblBetreuerGutachter` (`idtblBetreuerGutachter`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
