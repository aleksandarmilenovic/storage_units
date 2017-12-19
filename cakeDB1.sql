-- MySQL Script generated by MySQL Workbench
-- Tue Dec 19 10:30:59 2017
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema cake
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `cake` ;

-- -----------------------------------------------------
-- Schema cake
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `cake` DEFAULT CHARACTER SET utf8 ;
USE `cake` ;

-- -----------------------------------------------------
-- Table `cake`.`measurement_units`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cake`.`measurement_units` ;

CREATE TABLE IF NOT EXISTS `cake`.`measurement_units` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `symbol` VARCHAR(45) NULL,
  `active` TINYINT(1) NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cake`.`item_types`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cake`.`item_types` ;

CREATE TABLE IF NOT EXISTS `cake`.`item_types` (
  `id` INT NOT NULL,
  `opipljiv_tip` TINYINT NULL,
  `aktivan_tip` TINYINT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cake`.`items`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cake`.`items` ;

CREATE TABLE IF NOT EXISTS `cake`.`items` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `type` VARCHAR(45) NOT NULL,
  `kratak_opis` TEXT(100) NOT NULL,
  `tezina` INT(10) NULL,
  `storniran` TINYINT NULL,
  `measurement_unit_id` INT NOT NULL,
  `fk_item_types_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `measurement_unit_id_idx` (`measurement_unit_id` ASC),
  INDEX `fk_item_types_id_idx` (`fk_item_types_id` ASC),
  CONSTRAINT `measurement_unit_id`
    FOREIGN KEY (`measurement_unit_id`)
    REFERENCES `cake`.`measurement_units` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_item_types_id`
    FOREIGN KEY (`fk_item_types_id`)
    REFERENCES `cake`.`item_types` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cake`.`pgksps`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cake`.`pgksps` ;

CREATE TABLE IF NOT EXISTS `cake`.`pgksps` (
  `pid` INT NOT NULL,
  `hts/hs` VARCHAR(45) NOT NULL DEFAULT 'INT',
  `tax_group` FLOAT NOT NULL,
  `ECC` VARCHAR(40) NOT NULL,
  `release_date` DATE NOT NULL,
  `for_distributors` TINYINT NOT NULL,
  `status` ENUM('DEVELOPMENT', 'FOR_SALE', 'PHASE_OUT', 'ABSOLETE', 'HRND', 'DRAFT', 'IN_USE') NOT NULL,
  `service_production` TINYINT NOT NULL,
  `project` INT NULL,
  `item_id` INT NOT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  INDEX `items_id_idx` (`item_id` ASC),
  CONSTRAINT `items_id`
    FOREIGN KEY (`item_id`)
    REFERENCES `cake`.`items` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cake`.`sics`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cake`.`sics` ;

CREATE TABLE IF NOT EXISTS `cake`.`sics` (
  `status` ENUM('DEVELOPMENT', 'FOR_SALE', 'PHASE_OUT', 'ABSOLETE', 'HRND', 'DRAFT', 'IN_USE') NOT NULL,
  `rating` ENUM('PLATINIUM', 'GOLD', 'SILVER') NULL,
  `item_id` INT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  INDEX `fk_items_id_idx` (`item_id` ASC),
  CONSTRAINT `fk_items_id`
    FOREIGN KEY (`item_id`)
    REFERENCES `cake`.`items` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cake`.`semi_products`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cake`.`semi_products` ;

CREATE TABLE IF NOT EXISTS `cake`.`semi_products` (
  `status` ENUM('DEVELOPMENT', 'FOR_SALE', 'PHASE_OUT', 'ABSOLETE', 'HRND', 'DRAFT', 'IN_USE') NOT NULL,
  `usluzna_proizvodnja` TINYINT NOT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  `item_id` INT NULL,
  INDEX `fk_item_id_idx` (`item_id` ASC),
  CONSTRAINT `fk_item_id`
    FOREIGN KEY (`item_id`)
    REFERENCES `cake`.`items` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cake`.`materials`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cake`.`materials` ;

CREATE TABLE IF NOT EXISTS `cake`.`materials` (
  `id` INT NOT NULL,
  `status_material` ENUM('DEVELOPMENT', 'FOR_SALE', 'PHASE_OUT', 'ABSOLETE', 'HRND', 'DRAFT', 'IN_USE') NOT NULL,
  `usluzna_proizvodnja_material` TINYINT NOT NULL,
  `rating_material` ENUM('PLATINIUM', 'GOLD', 'SILVER') NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  `item_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_m_item_id_idx` (`item_id` ASC),
  CONSTRAINT `fk_m_item_id`
    FOREIGN KEY (`item_id`)
    REFERENCES `cake`.`items` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cake`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cake`.`users` ;

CREATE TABLE IF NOT EXISTS `cake`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `dozvola` ENUM('dozvoljeno', 'zabranjeno') NOT NULL,
  `created` DATETIME NOT NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cake`.`transport_permits`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cake`.`transport_permits` ;

CREATE TABLE IF NOT EXISTS `cake`.`transport_permits` (
  `id` INT NOT NULL,
  `operater` VARCHAR(45) NULL,
  `dozvola` TINYINT NULL,
  `fk_users_id` INT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_users_id_idx` (`fk_users_id` ASC),
  CONSTRAINT `fk_users_id`
    FOREIGN KEY (`fk_users_id`)
    REFERENCES `cake`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cake`.`transports`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cake`.`transports` ;

CREATE TABLE IF NOT EXISTS `cake`.`transports` (
  `id` INT NOT NULL,
  `datum_kreiranja` DATE NULL,
  `prenosnicu_kreirao` VARCHAR(45) NULL,
  `prenos_iz` INT NULL,
  `prenos_u` VARCHAR(45) NULL,
  `robu_izdao` VARCHAR(45) NULL,
  `status` ENUM('otvoren', 'poslat', 'spreman', 'isporucen', 'otkazan') NOT NULL,
  `tip_prenosa` ENUM('standard', 'trebovanje') NULL,
  `robu_primio` VARCHAR(45) NULL,
  `prenosnica_po_nalogu` VARCHAR(45) NULL,
  `fk_transport_premits` INT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_transport_premits_idx` (`fk_transport_premits` ASC),
  CONSTRAINT `fk_transport_premits`
    FOREIGN KEY (`fk_transport_premits`)
    REFERENCES `cake`.`transport_permits` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cake`.`transport_items`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cake`.`transport_items` ;

CREATE TABLE IF NOT EXISTS `cake`.`transport_items` (
  `id` INT NOT NULL,
  `artikal` VARCHAR(45) NULL,
  `trazena_kolicina` INT NULL,
  `izdatak_kolicina` INT NULL,
  `adresa_izdavanja` VARCHAR(45) NULL,
  `adresa_prijema` VARCHAR(45) NULL,
  `fk_transport_id` INT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_transport_id_idx` (`fk_transport_id` ASC),
  CONSTRAINT `fk_transport_id`
    FOREIGN KEY (`fk_transport_id`)
    REFERENCES `cake`.`transports` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cake`.`stockroom_items`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cake`.`stockroom_items` ;

CREATE TABLE IF NOT EXISTS `cake`.`stockroom_items` (
  `id` INT NOT NULL,
  `ukupna_kolicina` INT NULL,
  `slobodna_kolicina` INT NULL,
  `rezervisana_kolicina` INT NULL,
  `potrosnja` INT NULL,
  `item_id` INT NULL,
  `artikli_za_prenosnicu_id` INT NOT NULL,
  `id_transport_items_id` INT NULL,
  `modified` DATETIME NULL,
  `created` DATETIME NULL,
  PRIMARY KEY (`id`, `artikli_za_prenosnicu_id`),
  INDEX `fk_item_id_idex` (`item_id` ASC),
  INDEX `fk_transport_items_idx` (`id_transport_items_id` ASC),
  CONSTRAINT `fk_si_item_id`
    FOREIGN KEY (`item_id`)
    REFERENCES `cake`.`items` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_transport_items_id`
    FOREIGN KEY (`id_transport_items_id`)
    REFERENCES `cake`.`transport_items` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cake`.`stockroom_places`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cake`.`stockroom_places` ;

CREATE TABLE IF NOT EXISTS `cake`.`stockroom_places` (
  `id` INT NOT NULL,
  `naziv` VARCHAR(45) NULL,
  `kratak_opis` TEXT NULL,
  `default` TINYINT NULL,
  `aktivan` TINYINT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cake`.`stockroom_addresses`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cake`.`stockroom_addresses` ;

CREATE TABLE IF NOT EXISTS `cake`.`stockroom_addresses` (
  `id` INT NOT NULL,
  `ime` VARCHAR(45) NULL,
  `red` INT NULL,
  `polica` VARCHAR(45) NULL,
  `pregrada` INT NULL,
  `magacinsko_mesto` INT NULL,
  `barkod` INT NULL,
  `aktivan` TINYINT NULL,
  `stockroom_places_id` INT NULL,
  `transport_permits_id` INT NULL,
  `stockroom_items_id` INT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_stockroom_places_id_idx` (`stockroom_places_id` ASC),
  INDEX `fk_transport_permits_idx` (`transport_permits_id` ASC),
  INDEX `fk_stockroom_items_id_idx` (`stockroom_items_id` ASC),
  CONSTRAINT `stockroom_places_id`
    FOREIGN KEY (`stockroom_places_id`)
    REFERENCES `cake`.`stockroom_places` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `transport_permits_id`
    FOREIGN KEY (`transport_permits_id`)
    REFERENCES `cake`.`transport_permits` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `stockroom_items_id`
    FOREIGN KEY (`stockroom_items_id`)
    REFERENCES `cake`.`stockroom_items` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
