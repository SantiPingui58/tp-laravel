
-- -----------------------------------------------------
-- Schema bidcom
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `bidcom` ;

-- -----------------------------------------------------
-- Schema bidcom
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bidcom` DEFAULT CHARACTER SET utf8 ;
USE `bidcom` ;

-- -----------------------------------------------------
-- Table `bidcom`.`productos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bidcom`.`productos` ;

CREATE TABLE IF NOT EXISTS `bidcom`.`productos` (
  `id_producto` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(70) NOT NULL,
  `precio` INT(11) NOT NULL,
  `descuento` INT(11) NOT NULL,
  `stock` INT(11) NOT NULL,
  PRIMARY KEY (`id_producto`))
ENGINE = InnoDB
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = utf8;


INSERT INTO `bidcom`.`productos` (`id_producto`, `nombre`, `descripcion`, `precio`, `descuento`, `stock`) VALUES (1, 'Peluca Pelo Largo Verde', 'Peluca rizada color verde pelo largo producto importado', 16999, 24, 1810);
INSERT INTO `bidcom`.`productos` (`id_producto`, `nombre`, `descripcion`, `precio`, `descuento`, `stock`) VALUES (2, 'Peluca Red Kanekalon', 'Peluca pelo lacio cabello negro puntas rojas producto nacional', 14999, 29, 1358);
INSERT INTO `bidcom`.`productos` (`id_producto`, `nombre`, `descripcion`, `precio`, `descuento`, `stock`) VALUES (3, 'Peluca Rizado Rosa', 'Peluca pelo corto rizado color rosa producto importado', 17999, 29, 1357);
INSERT INTO `bidcom`.`productos` (`id_producto`, `nombre`, `descripcion`, `precio`, `descuento`, `stock`) VALUES (4, 'Peluca Pelo Lacio Lila', 'Peluca pelo lacio color lila fantasÃ­a producto nacional', 12999, 29, 713);
INSERT INTO `bidcom`.`productos` (`id_producto`, `nombre`, `descripcion`, `precio`, `descuento`, `stock`) VALUES (5, 'Peluca Negra Mechones Rosa', 'Peluca pelo lacio cabello negro mechones rosa producto importado', 21999, 29, 1492);
INSERT INTO `bidcom`.`productos` (`id_producto`, `nombre`, `descripcion`, `precio`, `descuento`, `stock`) VALUES (6, 'Peluca Anime Rosa Peinado', 'Peluca estilo anime color rosa con peinado producto importado', 0, 0, 0);
INSERT INTO `bidcom`.`productos` (`id_producto`, `nombre`, `descripcion`, `precio`, `descuento`, `stock`) VALUES (7, 'Peluca Anime Rosa Pastel', 'Peluca estilo anime pelo corto color rosa pastel producto importado', 0, 0, 0);
INSERT INTO `bidcom`.`productos` (`id_producto`, `nombre`, `descripcion`, `precio`, `descuento`, `stock`) VALUES (8, 'Peluca Anime Rubio', 'Peluca estilo anime pelo lacio color rubio producto nacional', 0, 0, 0);
INSERT INTO `bidcom`.`productos` (`id_producto`, `nombre`, `descripcion`, `precio`, `descuento`, `stock`) VALUES (9, 'Peluca Anime Arco Iris', 'Peluca estilo anime lacio con peinado color arco iris producto importa', 0, 0, 0);
