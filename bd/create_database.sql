-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema sistema_asistencia
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema sistema_asistencia
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `sistema_asistencia` DEFAULT CHARACTER SET utf8 ;
USE `sistema_asistencia` ;

-- -----------------------------------------------------
-- Table `sistema_asistencia`.`departamentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_asistencia`.`departamentos` (
  `id_departamento` INT NOT NULL AUTO_INCREMENT,
  `departamento` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_departamento`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_asistencia`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_asistencia`.`usuarios` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `codigo_usuario` VARCHAR(10) NOT NULL,
  `nombres` VARCHAR(80) NOT NULL,
  `apellidos` VARCHAR(80) NULL,
  `puesto` VARCHAR(30) NULL,
  `fk_departamento` INT NULL,
  `correo_electornico` VARCHAR(100) NULL,
  `password` TEXT NOT NULL,
  `rol` ENUM('Empleado', 'Administrador', 'Registradora') NOT NULL,
  `estatus` ENUM('Activo', 'Baja')  DEFAULT 'Activo' NOT NULL,
  PRIMARY KEY (`id_usuario`),
  FOREIGN KEY `fk_departamento` REFERENCES `departamentos` (`id_departamento`)
  ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE = InnoDB
COMMENT = 'Como también se usará para los usuarios de Registradoras, se dejarón varios campos nulleables: apellidos, puesto, departamento y correo_electronico.';


-- -----------------------------------------------------
-- Table `sistema_asistencia`.`asistencia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `msistema_asistenciaydb`.`asistencia` (
  `id_asistencia` INT NOT NULL AUTO_INCREMENT,
  `fecha` DATE NOT NULL,
  `fk_usuario` INT NOT NULL,
  `entrada` TIME NOT NULL,
  `salida` TIME NULL,
  `estatus_entrada` ENUM('A tiempo', 'Retraso' ) NOT NULL,
  `estatus_salida` ENUM('Horas Completas', 'Horas Incompletas', 'Tiempo Extra') NULL,
  PRIMARY KEY (`id_asistencia`),
  FOREIGN KEY `fk_usuario` REFERENCES `usuarios` (`id_usuario`)
  ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_asistencia`.`semestres`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_asistencia`.`semestres` (
  `id_semestre` INT NOT NULL AUTO_INCREMENT,
  `semestre` VARCHAR(10) NOT NULL,
  `cierre` DATE NOT NULL,
  `inicio` DATE NOT NULL,
  `cerrado_por` INT NOT NULL,
  `estatus` ENUM('Cerrado', 'En curso') DEFAULT 'En curso' NOT NULL,
  PRIMARY KEY (`id_semestre`),
  FOREIGN KEY `cerrado_por` REFERENCES `usuarios` (`id_usuario`)
  ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_asistencia`.`horario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_asistencia`.`horario` (
  `id_horario` INT NOT NULL AUTO_INCREMENT,
  `hora_entrada` TIME NOT NULL,
  `hora_salida` TIME NOT NULL,
  `fk_semestre` INT NOT NULL,
  `estatus` ENUM('Actual', 'Anterior') ENUM 'Actual' NOT NULL,
  PRIMARY KEY (`id_horario`),
  FOREIGN KEY `fk_semestre` REFERENCES `semestres` (`id_semestre`)
  ON DELETE CASCADE ON UPDATE CASCADE
  )
ENGINE = InnoDB
COMMENT = 'Por si ajustan el horario más de una vez en un mismo Semestre, el estatus evitará que otros registros de asistencia sean afectados.';


-- -----------------------------------------------------
-- Table `sistema_asistencia`.`notificaciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_asistencia`.`notificaciones` (
  `id_notificacion` INT NOT NULL AUTO_INCREMENT,
  `tipo` ENUM('Advertencia', 'Aviso Despido') NOT NULL,
  `mensaje` TEXT NOT NULL,
  `estatus` ENUM('Pendiente', 'Resuelto') NULL,
  `fk_empleado` INT NOT NULL,
  `atendido_por` INT NULL,
  PRIMARY KEY (`id_notificacion`),
  FOREIGN KEY `fk_empleado` REFERENCES `usuarios` (`id_usuario`)
  ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY `atendido_por` REFERENCES `usuarios` (`id_usuario`)
  ON DELETE CASCADE ON UPDATE CASCADE
  )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mysistema_asistenciadb`.`logs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_asistencia`.`logs` (
  `id_log` INT NOT NULL AUTO_INCREMENT,
  `mensaje` TEXT NOT NULL,
  `fk_usuario` INT NOT NULL,
  `fecha` DATE NOT NULL,,
  `hora` TIME NOT NULL,
  PRIMARY KEY (`id_log`),
  FOREIGN KEY `fk_usuario` REFERENCES `usuarios` (`id_usuario`)
  ON DELETE CASCADE ON UPDATE CASCADE
  )
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
