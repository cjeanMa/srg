-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema dbtecnoilave
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema dbtecnoilave
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `dbtecnoilave` DEFAULT CHARACTER SET utf8 ;
USE `dbtecnoilave` ;

-- -----------------------------------------------------
-- Table `dbtecnoilave`.`escuelaProfesional`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbtecnoilave`.`escuelaProfesional` (
  `idEscuelaProfesional` INT(2) NOT NULL AUTO_INCREMENT,
  `nombreEscuelaProfesional` VARCHAR(100) NOT NULL,
  `fechaCreacion` DATE NULL DEFAULT NULL,
  `res_autorizacion` VARCHAR(30) NULL DEFAULT '-',
  `fecha_autorizacion` DATE NOT NULL DEFAULT '0001-01-01',
  `res_revalidacion` VARCHAR(30) NULL DEFAULT '-',
  `fecha_revalidacion` DATE NOT NULL DEFAULT '0001-01-01',
  `disponibilidad` INT(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idEscuelaProfesional`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbtecnoilave`.`semestreAcademico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbtecnoilave`.`semestreAcademico` (
  `idSemestreAcademico` INT(3) NOT NULL AUTO_INCREMENT,
  `anio` VARCHAR(4) NOT NULL,
  `periodo` VARCHAR(3) NOT NULL,
  PRIMARY KEY (`idSemestreAcademico`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbtecnoilave`.`sexo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbtecnoilave`.`sexo` (
  `idSexo` INT(1) NOT NULL AUTO_INCREMENT,
  `nombreSexo` VARCHAR(40) NOT NULL,
  `letraSexo` VARCHAR(3) NOT NULL,
  PRIMARY KEY (`idSexo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbtecnoilave`.`discapacidad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbtecnoilave`.`discapacidad` (
  `idDiscapacidad` INT(2) NOT NULL AUTO_INCREMENT,
  `nombreDiscapacidad` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idDiscapacidad`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbtecnoilave`.`persona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbtecnoilave`.`persona` (
  `idPersona` VARCHAR(8) NOT NULL,
  `apellidoPaterno` VARCHAR(45) NOT NULL,
  `apellidoMaterno` VARCHAR(45) NOT NULL,
  `nombres` VARCHAR(45) NOT NULL,
  `idSexo` INT(1) NOT NULL DEFAULT 1,
  `fechaNacimiento` DATE NULL,
  `direccion` VARCHAR(45) NULL DEFAULT NULL,
  `email` VARCHAR(45) NULL DEFAULT NULL,
  `numCelular` VARCHAR(45) NULL DEFAULT NULL,
  `idDiscapacidad` INT(2) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idPersona`),
  INDEX `FK_idSexo` (`idSexo` ASC) ,
  INDEX `FK_idDiscapacidad` (`idDiscapacidad` ASC) ,
  CONSTRAINT `fk_idsexo`
    FOREIGN KEY (`idSexo`)
    REFERENCES `dbtecnoilave`.`sexo` (`idSexo`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_idDiscapacidad`
    FOREIGN KEY (`idDiscapacidad`)
    REFERENCES `dbtecnoilave`.`discapacidad` (`idDiscapacidad`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbtecnoilave`.`estudiante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbtecnoilave`.`estudiante` (
  `idEstudiante` INT(11) NOT NULL AUTO_INCREMENT,
  `idSemestreAcademico` INT(3) NOT NULL,
  `idEscuelaProfesional` INT(2) NOT NULL,
  `idPersona` VARCHAR(8) NOT NULL,
  PRIMARY KEY (`idEstudiante`),
  INDEX `FK_idPersona` (`idPersona` ASC) ,
  INDEX `FK_idEscuela` (`idEscuelaProfesional` ASC) ,
  INDEX `FK_idSemestreAcademico` (`idSemestreAcademico` ASC) ,
  CONSTRAINT `FK_sa`
    FOREIGN KEY (`idSemestreAcademico`)
    REFERENCES `dbtecnoilave`.`semestreAcademico` (`idSemestreAcademico`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `estudiante_ibfk_1`
    FOREIGN KEY (`idPersona`)
    REFERENCES `dbtecnoilave`.`persona` (`idPersona`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_idescuela`
    FOREIGN KEY (`idEscuelaProfesional`)
    REFERENCES `dbtecnoilave`.`escuelaProfesional` (`idEscuelaProfesional`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbtecnoilave`.`habilitacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbtecnoilave`.`habilitacion` (
  `idHabilitacion` INT(1) NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`idHabilitacion`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbtecnoilave`.`tipoMatricula`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbtecnoilave`.`tipoMatricula` (
  `idTipoMatricula` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(255) NULL,
  PRIMARY KEY (`idTipoMatricula`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbtecnoilave`.`matricula`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbtecnoilave`.`matricula` (
  `idMatricula` INT(7) NOT NULL AUTO_INCREMENT,
  `idSemestreAcademico` INT(3) NOT NULL,
  `nota` INT(2) NULL,
  `notaLetra` VARCHAR(20) NOT NULL,
  `fechaMatricula` DATE NOT NULL,
  `observacion` VARCHAR(150) NULL,
  `idEstudiante` INT(11) NOT NULL,
  `idEstado` INT(2) NOT NULL DEFAULT '1',
  `idEstadoModular` INT(1) NOT NULL DEFAULT '1',
  `tipoMatricula_idTipoMatricula` INT NOT NULL,
  PRIMARY KEY (`idMatricula`),
  INDEX `FK_idSemestreAcademico` (`idSemestreAcademico` ASC) ,
  INDEX `FK_idEstudiante` (`idEstudiante` ASC) ,
  INDEX `fk_matricula_tipoMatricula1_idx` (`tipoMatricula_idTipoMatricula` ASC) ,
  CONSTRAINT `fk_matricula_estudiante`
    FOREIGN KEY (`idEstudiante`)
    REFERENCES `dbtecnoilave`.`estudiante` (`idEstudiante`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_matricula_semestreacademico1`
    FOREIGN KEY (`idSemestreAcademico`)
    REFERENCES `dbtecnoilave`.`semestreAcademico` (`idSemestreAcademico`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_matricula_tipoMatricula1`
    FOREIGN KEY (`tipoMatricula_idTipoMatricula`)
    REFERENCES `dbtecnoilave`.`tipoMatricula` (`idTipoMatricula`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbtecnoilave`.`modulo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbtecnoilave`.`modulo` (
  `idModulo` INT(3) NOT NULL AUTO_INCREMENT,
  `nombreModulo` VARCHAR(100) NULL,
  `horasModulo` INT(3) NULL DEFAULT '0',
  `idEscuelaProfesional` INT(2) NOT NULL,
  PRIMARY KEY (`idModulo`),
  INDEX `FK_idEscuelaProfesional` (`idEscuelaProfesional` ASC) ,
  CONSTRAINT `fk_Modulo_EscuelaProfesional1`
    FOREIGN KEY (`idEscuelaProfesional`)
    REFERENCES `dbtecnoilave`.`escuelaProfesional` (`idEscuelaProfesional`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbtecnoilave`.`mcapacidades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbtecnoilave`.`mcapacidades` (
  `idMcapacidades` INT(3) NOT NULL AUTO_INCREMENT,
  `nombreMcapacidades` VARCHAR(100) NOT NULL,
  `idModulo` INT(3) NOT NULL,
  PRIMARY KEY (`idMcapacidades`),
  INDEX `FK_idModulo` (`idModulo` ASC) ,
  CONSTRAINT `fk_m_capacidades_modulo1`
    FOREIGN KEY (`idModulo`)
    REFERENCES `dbtecnoilave`.`modulo` (`idModulo`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbtecnoilave`.`permisos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbtecnoilave`.`permisos` (
  `idPermiso` INT(2) NOT NULL AUTO_INCREMENT,
  `nombrePermiso` VARCHAR(30) NOT NULL,
  `descripcion` VARCHAR(50) NULL DEFAULT NULL,
  PRIMARY KEY (`idPermiso`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbtecnoilave`.`practicas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbtecnoilave`.`practicas` (
  `idPracticas` INT(8) NOT NULL AUTO_INCREMENT,
  `institucion` VARCHAR(50) NOT NULL,
  `encargado` VARCHAR(50) NOT NULL,
  `direccion` VARCHAR(50) NOT NULL,
  `idEstudiante` INT(11) NOT NULL,
  `idModulo` INT(3) NOT NULL,
  PRIMARY KEY (`idPracticas`),
  INDEX `FK_idModulo` (`idModulo` ASC) ,
  INDEX `FK_idEstudiante` (`idEstudiante` ASC) ,
  CONSTRAINT `fk_practicas_estudiante`
    FOREIGN KEY (`idEstudiante`)
    REFERENCES `dbtecnoilave`.`estudiante` (`idEstudiante`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_practicas_modulo1`
    FOREIGN KEY (`idModulo`)
    REFERENCES `dbtecnoilave`.`modulo` (`idModulo`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbtecnoilave`.`semestre`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbtecnoilave`.`semestre` (
  `idSemestre` INT(3) NOT NULL AUTO_INCREMENT,
  `romanos` VARCHAR(3) NOT NULL,
  `nombre` VARCHAR(10) NOT NULL,
  `prenombre` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`idSemestre`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbtecnoilave`.`unidadDidactica`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbtecnoilave`.`unidadDidactica` (
  `idUnidadDidactica` INT(3) NOT NULL AUTO_INCREMENT,
  `nombreUnidadDidactica` VARCHAR(150) NOT NULL,
  `creditos` DECIMAL(4,2) NULL DEFAULT '0.00',
  `horasunidad` INT(3) NULL DEFAULT '0',
  `idSemestre` INT(3) NOT NULL,
  `idModulo` INT(3) NOT NULL,
  PRIMARY KEY (`idUnidadDidactica`),
  INDEX `FK_idModulo` (`idModulo` ASC) ,
  INDEX `FK_idSemestre` (`idSemestre` ASC) ,
  CONSTRAINT `fk_unidaddidactica_modulo1`
    FOREIGN KEY (`idModulo`)
    REFERENCES `dbtecnoilave`.`modulo` (`idModulo`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_unidaddidactica_semestre1`
    FOREIGN KEY (`idSemestre`)
    REFERENCES `dbtecnoilave`.`semestre` (`idSemestre`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbtecnoilave`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbtecnoilave`.`usuario` (
  `idUsuario` INT(3) NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(30) NOT NULL,
  `contraseña` VARCHAR(100) NOT NULL,
  `ultimaSesion` DATE NULL,
  `idPermiso` INT(2) NOT NULL,
  `idPersona` VARCHAR(8) NOT NULL,
  `idHabilitacion` INT(1) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  INDEX `FK_idPersona` (`idPersona` ASC) ,
  INDEX `FK_idPermisos` (`idPermiso` ASC) ,
  INDEX `FK_idHabilitacion` (`idHabilitacion` ASC) ,
  CONSTRAINT `fk_usuario_habilitacion1`
    FOREIGN KEY (`idHabilitacion`)
    REFERENCES `dbtecnoilave`.`habilitacion` (`idHabilitacion`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_usuario_permisos1`
    FOREIGN KEY (`idPermiso`)
    REFERENCES `dbtecnoilave`.`permisos` (`idPermiso`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_usuario_persona1`
    FOREIGN KEY (`idPersona`)
    REFERENCES `dbtecnoilave`.`persona` (`idPersona`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbtecnoilave`.`docente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbtecnoilave`.`docente` (
  `idDocente` INT(3) NOT NULL AUTO_INCREMENT,
  `idPersona` VARCHAR(8) NOT NULL,
  `idEscuelaProfesional` INT(2) NOT NULL,
  PRIMARY KEY (`idDocente`),
  INDEX `FK_idPersona` (`idPersona` ASC) ,
  INDEX `FK_idEscuelaProfesional` (`idEscuelaProfesional` ASC) ,
  CONSTRAINT `fk_docente_persona1`
    FOREIGN KEY (`idPersona`)
    REFERENCES `dbtecnoilave`.`persona` (`idPersona`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_docente_escuelaProfesional1`
    FOREIGN KEY (`idEscuelaProfesional`)
    REFERENCES `dbtecnoilave`.`escuelaProfesional` (`idEscuelaProfesional`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbtecnoilave`.`asignacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbtecnoilave`.`asignacion` (
  `idAsignacion` INT(4) NOT NULL AUTO_INCREMENT,
  `idDocente` INT(3) NOT NULL,
  `idSemestreAcademico` INT(3) NOT NULL,
  `idUnidadDidactica` INT(3) NOT NULL,
  PRIMARY KEY (`idAsignacion`),
  INDEX `FK_idDocente` (`idDocente` ASC) ,
  INDEX `FK_idSemestreAcademico` (`idSemestreAcademico` ASC) ,
  INDEX `FK_idUnidadDidactica` (`idUnidadDidactica` ASC) ,
  CONSTRAINT `fk_asignacion_docente1`
    FOREIGN KEY (`idDocente`)
    REFERENCES `dbtecnoilave`.`docente` (`idDocente`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_asignacion_semestreAcademico1`
    FOREIGN KEY (`idSemestreAcademico`)
    REFERENCES `dbtecnoilave`.`semestreAcademico` (`idSemestreAcademico`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_asignacion_unidadDidactica1`
    FOREIGN KEY (`idUnidadDidactica`)
    REFERENCES `dbtecnoilave`.`unidadDidactica` (`idUnidadDidactica`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbtecnoilave`.`plazoNotas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbtecnoilave`.`plazoNotas` (
  `idPlazoNotas` INT(3) NOT NULL AUTO_INCREMENT,
  `fechaInicio` DATE NOT NULL,
  `fechaLimite` DATE NOT NULL,
  `fechaCreacion` DATE NOT NULL,
  `fechaModificacion` DATE NULL,
  `idSemestreAcademico` INT(3) NOT NULL,
  PRIMARY KEY (`idPlazoNotas`),
  INDEX `FK_idSemestreAcademico` (`idSemestreAcademico` ASC) ,
  CONSTRAINT `fk_plazoNotas_semestreAcademico1`
    FOREIGN KEY (`idSemestreAcademico`)
    REFERENCES `dbtecnoilave`.`semestreAcademico` (`idSemestreAcademico`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbtecnoilave`.`plazoMatricula`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbtecnoilave`.`plazoMatricula` (
  `idPlazoMatricula` INT NOT NULL AUTO_INCREMENT,
  `fechaInicio` DATE NOT NULL,
  `fechaLimite` DATE NOT NULL,
  `fechaCreacion` DATE NULL,
  `fechaModificacion` DATE NULL,
  `idSemestreAcademico` INT(3) NOT NULL,
  PRIMARY KEY (`idPlazoMatricula`),
  INDEX `FK_idSemestreAcademico` (`idSemestreAcademico` ASC) ,
  CONSTRAINT `fk_plazoMatricula_semestreAcademico1`
    FOREIGN KEY (`idSemestreAcademico`)
    REFERENCES `dbtecnoilave`.`semestreAcademico` (`idSemestreAcademico`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbtecnoilave`.`unidadDidactica_has_matricula`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbtecnoilave`.`unidadDidactica_has_matricula` (
  `unidadDidactica_idUnidadDidactica` INT(3) NOT NULL,
  `matricula_idMatricula` INT(7) NOT NULL,
  `nota` INT(2) NOT NULL,
  `notaLetras` VARCHAR(45) NOT NULL,
  `observacion` VARCHAR(255) NULL,
  PRIMARY KEY (`unidadDidactica_idUnidadDidactica`, `matricula_idMatricula`),
  INDEX `fk_unidadDidactica_has_matricula_matricula1_idx` (`matricula_idMatricula` ASC) ,
  INDEX `fk_unidadDidactica_has_matricula_unidadDidactica1_idx` (`unidadDidactica_idUnidadDidactica` ASC) ,
  CONSTRAINT `fk_unidadDidactica_has_matricula_unidadDidactica1`
    FOREIGN KEY (`unidadDidactica_idUnidadDidactica`)
    REFERENCES `dbtecnoilave`.`unidadDidactica` (`idUnidadDidactica`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_unidadDidactica_has_matricula_matricula1`
    FOREIGN KEY (`matricula_idMatricula`)
    REFERENCES `dbtecnoilave`.`matricula` (`idMatricula`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
