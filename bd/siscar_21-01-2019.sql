/*
 Navicat Premium Data Transfer

 Source Server         : LOCALHOST-MYSQL-XAMPP
 Source Server Type    : MySQL
 Source Server Version : 100136
 Source Host           : localhost:3306
 Source Schema         : siscar

 Target Server Type    : MySQL
 Target Server Version : 100136
 File Encoding         : 65001

 Date: 21/01/2019 09:46:16
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categoria
-- ----------------------------
DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria`  (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nivel` int(8) NULL DEFAULT NULL,
  `nombre` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `banda` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `eliminado` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'Eliminado : 1 : Si, 0 : No',
  `fchRg` timestamp(0) NULL DEFAULT NULL COMMENT 'Fecha de Registro',
  `fchAc` timestamp(0) NULL DEFAULT NULL COMMENT 'Fecha de Actualizacion',
  `usrId` int(8) NULL DEFAULT NULL COMMENT 'FK Usuario Modificacion/Creacion/Eliminacion',
  `ipAdd` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'Ip Address',
  `hosNm` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'HostName',
  PRIMARY KEY (`id_categoria`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of categoria
-- ----------------------------
INSERT INTO `categoria` VALUES (1, 'CJ', 0, 'Center Junior', '1200 - 1300', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL);
INSERT INTO `categoria` VALUES (2, 'CD', 1, 'Center Developer', '1500 - 2200', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL);
INSERT INTO `categoria` VALUES (3, 'CSD', 2, 'Center Senior Developer', '2800 - 2900', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL);
INSERT INTO `categoria` VALUES (4, 'CLD', 3, 'Center Leader Developer', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL);
INSERT INTO `categoria` VALUES (5, 'CSL', 4, 'Center Service Leader', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL);
INSERT INTO `categoria` VALUES (6, 'CSS', 5, 'Center Service Senior', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL);
INSERT INTO `categoria` VALUES (7, 'CSSL', 6, 'Center Service Senior Leader', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL);
INSERT INTO `categoria` VALUES (8, 'PT-N1', 99, 'PT-N1', '3000-3500', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', 4, '10.232.100.252', 'LIM-MXL5510MRN.usersad.everis.int');
INSERT INTO `categoria` VALUES (9, 'Manager', 99, 'Manager', '5000-6000', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', 4, '10.232.100.252', 'LIM-MXL5510MRN.usersad.everis.int');
INSERT INTO `categoria` VALUES (10, 'SOFT-N1', 99, 'SOFT-N1', '2200', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', 4, '10.232.100.252', 'LIM-MXL5510MRN.usersad.everis.int');
INSERT INTO `categoria` VALUES (11, 'PS-N1', 99, 'PS-N1', '2000', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', 4, '10.232.100.252', 'LIM-MXL5510MRN.usersad.everis.int');

-- ----------------------------
-- Table structure for cliente
-- ----------------------------
DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente`  (
  `id_cliente` int(8) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fecha` date NULL DEFAULT NULL,
  `estado` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `descripcion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `eliminado` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'Eliminado : 1 : Si, 0 : No',
  `fchRg` timestamp(0) NULL DEFAULT NULL COMMENT 'Fecha de Registro',
  `fchAc` timestamp(0) NULL DEFAULT NULL COMMENT 'Fecha de Actualizacion',
  `usrId` int(8) NULL DEFAULT NULL COMMENT 'FK Usuario Modificacion/Creacion/Eliminacion',
  `ipAdd` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'Ip Address',
  `hosNm` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'HostName',
  PRIMARY KEY (`id_cliente`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of cliente
-- ----------------------------
INSERT INTO `cliente` VALUES (1, 'BBVA', '2017-07-05', '1', 'BBVA BBVA', '0', '2017-07-05 01:00:00', '2018-10-06 17:40:10', 4, '10.10.1.131', 'CLRLAP034.fractal.local');
INSERT INTO `cliente` VALUES (2, 'BCP', '2017-07-05', '1', 'Banco de Credito del Peru', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL);
INSERT INTO `cliente` VALUES (3, 'Interbank', '2017-07-05', '1', 'Interbank', '0', '2017-07-05 01:00:00', '2017-08-24 16:46:10', 2, '10.232.101.209', 'LIM-5CG5114L3Z');
INSERT INTO `cliente` VALUES (4, 'CLARO', '2017-07-05', '1', 'CLARO', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL);
INSERT INTO `cliente` VALUES (5, 'Multicliente', '2017-07-05', '1', 'Multicliente', '0', '2017-07-05 01:00:00', '2017-07-21 16:54:38', 4, '10.232.100.252', 'LIM-MXL5510MRN');
INSERT INTO `cliente` VALUES (6, 'REPSOL PERU', '2017-07-05', '1', 'REPSOL', '0', '2017-07-05 01:00:00', '2017-08-24 16:45:57', 2, '10.232.101.209', 'LIM-5CG5114L3Z');
INSERT INTO `cliente` VALUES (7, 'EVERIS', '2017-07-05', '1', 'EVERIS EVERIS EVERIS', '0', '2017-07-05 01:00:00', '2018-10-06 17:40:02', 4, '10.10.1.131', 'CLRLAP034.fractal.local');
INSERT INTO `cliente` VALUES (8, 'Repsol Madrid', '2017-07-05', '1', 'Repsol Madrid', '1', '2017-07-14 12:50:26', '2017-07-21 16:54:27', 4, '10.232.100.252', 'LIM-MXL5510MRN');
INSERT INTO `cliente` VALUES (9, 'Centro', '2017-07-26', '1', 'Centro', '0', '2017-07-26 21:13:59', '2017-07-26 21:13:59', 4, '10.232.100.252', 'LIM-MXL5510MRN.usersad.everis.int');
INSERT INTO `cliente` VALUES (10, 'REPSOL ESPAÑA', '2017-07-05', '1', 'REPSOL ESPAÑA', '0', '2017-08-24 16:46:41', '2017-08-24 16:46:41', 2, '10.232.101.209', 'LIM-5CG5114L3Z');

-- ----------------------------
-- Table structure for dominio
-- ----------------------------
DROP TABLE IF EXISTS `dominio`;
CREATE TABLE `dominio`  (
  `id_dominio` int(8) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fecha` date NULL DEFAULT NULL,
  `estado` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `descripcion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `eliminado` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'Eliminado : 1 : Si, 0 : No',
  `fchRg` timestamp(0) NULL DEFAULT NULL COMMENT 'Fecha de Registro',
  `fchAc` timestamp(0) NULL DEFAULT NULL COMMENT 'Fecha de Actualizacion',
  `usrId` int(8) NULL DEFAULT NULL COMMENT 'FK Usuario Modificacion/Creacion/Eliminacion',
  `ipAdd` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'Ip Address',
  `hosNm` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'HostName',
  `fk_cliente` int(8) NULL DEFAULT NULL,
  PRIMARY KEY (`id_dominio`) USING BTREE,
  INDEX `fk_dominio_cliente_1`(`fk_cliente`) USING BTREE,
  CONSTRAINT `fk_dominio_cliente_1` FOREIGN KEY (`fk_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of dominio
-- ----------------------------
INSERT INTO `dominio` VALUES (1, 'AACC', '2017-07-05', '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, 6);
INSERT INTO `dominio` VALUES (2, 'Everilion', '2017-07-05', '1', '', '0', '2017-07-05 01:00:00', '2017-08-24 16:47:54', 2, '10.232.101.209', 'LIM-5CG5114L3Z', 10);
INSERT INTO `dominio` VALUES (3, 'BI', '2017-07-05', '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, 2);
INSERT INTO `dominio` VALUES (4, 'CS JAVA', '2017-07-05', '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, 2);
INSERT INTO `dominio` VALUES (5, 'CS.NET', '2017-07-05', '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, 2);
INSERT INTO `dominio` VALUES (6, 'EVERILION', '2017-07-05', '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, 1);
INSERT INTO `dominio` VALUES (7, 'EYP', '2017-07-05', '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, 6);
INSERT INTO `dominio` VALUES (8, 'HB', '2017-07-05', '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, 2);
INSERT INTO `dominio` VALUES (9, 'INTEGRACION', '2017-07-05', '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, 4);
INSERT INTO `dominio` VALUES (10, 'IPB', '2017-07-05', '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, 2);
INSERT INTO `dominio` VALUES (11, 'MBKR', '2017-07-05', '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, 2);
INSERT INTO `dominio` VALUES (12, 'MODTIEESS', '2017-07-05', '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, 6);
INSERT INTO `dominio` VALUES (13, 'MTTO', '2017-07-05', '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, 2);
INSERT INTO `dominio` VALUES (14, 'PORTAL', '2017-07-05', '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, 2);
INSERT INTO `dominio` VALUES (15, 'SAP BCP', '2017-07-05', '1', '.', '1', '2017-07-05 01:00:00', '2018-12-27 09:31:58', 4, '10.10.1.131', 'CLRLAP034.fractal.local', 2);
INSERT INTO `dominio` VALUES (16, 'SAP', '2017-07-05', '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, 5);
INSERT INTO `dominio` VALUES (17, 'SOPORTEN2', '2017-07-05', '0', 'SOPORTEN2 dddd', '0', '2017-07-05 01:00:00', '2018-12-27 09:34:21', 4, '10.10.1.131', 'CLRLAP034.fractal.local', 6);
INSERT INTO `dominio` VALUES (18, 'TESTING', '2017-07-05', '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, 2);
INSERT INTO `dominio` VALUES (19, 'TYC', '2017-07-20', '1', 'TYC', '0', '2017-07-05 01:00:00', '2017-07-21 16:53:13', 4, '10.232.100.252', 'LIM-MXL5510MRN', 2);
INSERT INTO `dominio` VALUES (20, 'USER IT', '2017-07-20', '1', 'USER IT', '0', '2017-07-05 01:00:00', '2017-07-21 16:52:50', 4, '10.232.100.252', 'LIM-MXL5510MRN', 2);
INSERT INTO `dominio` VALUES (21, 'INNOVA SCHOOL', '2017-07-05', '1', '', '0', '2016-12-13 19:56:04', '2017-08-24 16:51:45', 2, '10.232.101.209', 'LIM-5CG5114L3Z', 7);
INSERT INTO `dominio` VALUES (22, 'Estructura', '2017-07-26', '1', 'Estructura', '0', '2017-07-26 21:14:34', '2017-07-26 21:14:34', 4, '10.232.100.252', 'LIM-MXL5510MRN.usersad.everis.int', 9);
INSERT INTO `dominio` VALUES (23, 'Aceleradora Mobile', '2017-07-05', '1', '', '0', '2017-08-24 16:49:50', '2017-08-24 16:49:50', 2, '10.232.101.209', 'LIM-5CG5114L3Z', 7);
INSERT INTO `dominio` VALUES (24, 'MIGRACION ONE AMX', '2017-09-01', '0', 'MIGRACION ONE AMX', '1', '2017-09-26 17:58:07', '2017-09-26 17:59:12', 4, '10.232.124.129', 'LIM-5CG5114L3Z', 4);
INSERT INTO `dominio` VALUES (25, 'MIGRACION ONE AMXaa', '2017-09-01', '1', 'MIGRACION ONE AMX', '0', '2017-09-26 17:58:12', '2018-11-13 16:46:17', 4, '10.10.1.131', 'CLRLAP034.fractal.local', 4);

-- ----------------------------
-- Table structure for empleado
-- ----------------------------
DROP TABLE IF EXISTS `empleado`;
CREATE TABLE `empleado`  (
  `id_empleado` int(8) NOT NULL AUTO_INCREMENT,
  `cod_empleado` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nombres` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `apellidos` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `dni` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sexo` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fecha_nacimiento` date NULL DEFAULT NULL,
  `distrito` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'Distrito ( Obtenido del JSON Ej. : La Esperanza )',
  `fecha_ingreso` date NULL DEFAULT NULL,
  `fecha_prueba` date NULL DEFAULT NULL COMMENT 'Fecha de Finalizacion del Periodo de Prueba (fecha_ingreso + 6 meses)',
  `fecha_salida` date NULL DEFAULT NULL,
  `telefono` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `movil` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `direccion` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `estado_civil` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `estado` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `comentarios` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `eliminado` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'Eliminado : 1 : Si, 0 : No',
  `fchRg` timestamp(0) NULL DEFAULT NULL COMMENT 'Fecha de Registro',
  `fchAc` timestamp(0) NULL DEFAULT NULL COMMENT 'Fecha de Actualizacion',
  `usrId` int(8) NULL DEFAULT NULL COMMENT 'FK Usuario Modificacion/Creacion/Eliminacion',
  `ipAdd` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'Ip Address',
  `hosNm` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'HostName',
  `fk_institucion_educativa` int(8) NULL DEFAULT NULL,
  `fk_categoria` int(8) NULL DEFAULT NULL COMMENT 'FK Categoria',
  `fk_dominio` int(8) NULL DEFAULT NULL COMMENT 'FK Dominio',
  `fk_rol` int(8) NULL DEFAULT NULL,
  PRIMARY KEY (`id_empleado`) USING BTREE,
  INDEX `fk_institucion_educativa`(`fk_institucion_educativa`, `fk_categoria`, `fk_dominio`) USING BTREE,
  INDEX `fk_empleado_categoria_1`(`fk_categoria`) USING BTREE,
  INDEX `fk_empleado_dominio_1`(`fk_dominio`) USING BTREE,
  INDEX `fk_empleado_rol_1`(`fk_rol`) USING BTREE,
  CONSTRAINT `fk_empleado_categoria_1` FOREIGN KEY (`fk_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_empleado_dominio_1` FOREIGN KEY (`fk_dominio`) REFERENCES `dominio` (`id_dominio`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_empleado_institucion_educativa_1` FOREIGN KEY (`fk_institucion_educativa`) REFERENCES `institucion_educativa` (`id_institucion_educativa`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_empleado_rol_1` FOREIGN KEY (`fk_rol`) REFERENCES `rol` (`id_rol`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 119 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of empleado
-- ----------------------------
INSERT INTO `empleado` VALUES (1, '100717', 'Armando Edinson', 'Astudillo Moscol', NULL, NULL, '1990-01-10', NULL, '2017-07-01', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 5, 5, 1);
INSERT INTO `empleado` VALUES (2, '109800', 'Dennys Fernando', 'Távara Alvarado', NULL, NULL, '1993-01-10', NULL, '2016-01-18', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 2, 20, 1);
INSERT INTO `empleado` VALUES (3, '119681', 'Juan Carlos', 'Miñano Rodriguez', NULL, NULL, NULL, NULL, '2014-02-13', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 2, 19, 1);
INSERT INTO `empleado` VALUES (4, '127842', 'Jonathan Humberto ', 'Rubina Garay', NULL, NULL, NULL, NULL, '2015-04-06', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 2, 9, 2);
INSERT INTO `empleado` VALUES (5, '131227', 'Jonatthan Miguel', 'Saona Herrera', NULL, NULL, NULL, NULL, '2015-08-09', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 2, 9, 2);
INSERT INTO `empleado` VALUES (6, '134667', 'Heber David', 'Alvarez Paredes', NULL, NULL, NULL, NULL, '2016-01-18', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 1, 18, 2);
INSERT INTO `empleado` VALUES (7, '134668', 'Brady Marlon', 'Príncipe Quiñones', NULL, NULL, NULL, NULL, '2016-01-18', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 1, 20, 2);
INSERT INTO `empleado` VALUES (8, '134669', 'Carlos Eduardo', 'Castañeda Gallardo', NULL, NULL, NULL, NULL, '2016-01-18', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 1, 20, 2);
INSERT INTO `empleado` VALUES (9, '134671', 'Carlos Diego', 'Pérez Guzmán', NULL, NULL, NULL, NULL, '2016-01-18', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 1, 20, 2);
INSERT INTO `empleado` VALUES (10, '134672', 'Carlos Eduardo', 'Ramírez Díaz', NULL, NULL, NULL, NULL, '2016-01-18', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 3, 14, 1);
INSERT INTO `empleado` VALUES (11, '134674', 'Cristian Josué ', 'Muñoz Ponce', NULL, NULL, NULL, NULL, '2016-01-18', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 1, 14, 2);
INSERT INTO `empleado` VALUES (12, '134676', 'Dany ', 'Cenas Vasquez', NULL, NULL, NULL, NULL, '2016-01-18', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 2, 13, 2);
INSERT INTO `empleado` VALUES (13, '134679', 'Eloy Eduardo', 'Santillán Caballero', NULL, NULL, NULL, NULL, '2016-01-18', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 2, 11, 2);
INSERT INTO `empleado` VALUES (14, '134681', 'Fiorella', 'Yoplac Torres', NULL, NULL, NULL, NULL, '2016-01-18', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 3, 20, 1);
INSERT INTO `empleado` VALUES (15, '134682', 'Flor De Maria', 'Susuki Vera', NULL, NULL, NULL, NULL, '2016-01-18', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 1, 18, 2);
INSERT INTO `empleado` VALUES (16, '134683', 'Gemma Yaquelyn', 'Argomedo Cueva', NULL, NULL, NULL, NULL, '2016-01-18', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 1, 11, 2);
INSERT INTO `empleado` VALUES (17, '134684', 'Irving Stewart', 'Paredes Rodríguez', NULL, NULL, NULL, NULL, '2016-01-18', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 1, 8, 2);
INSERT INTO `empleado` VALUES (18, '134685', 'Jimmy Arnold', 'Moreno Nuñez', NULL, NULL, NULL, NULL, '2016-01-18', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 1, 15, 2);
INSERT INTO `empleado` VALUES (19, '134686', 'José Benjamín', 'Cabrera Villarreal', NULL, NULL, NULL, NULL, '2016-01-18', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 1, 18, 2);
INSERT INTO `empleado` VALUES (20, '134687', 'Juan Rafael', 'Noriega Acayturri', NULL, NULL, NULL, NULL, '2016-01-18', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 3, 9, 1);
INSERT INTO `empleado` VALUES (21, '134689', 'Kenidy Esmit', 'Carranza Laureano', NULL, NULL, NULL, NULL, '2016-01-18', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 1, 18, 2);
INSERT INTO `empleado` VALUES (22, '134690', 'Lucas Gabriel', 'Vasquez Leon', NULL, NULL, NULL, NULL, '2016-01-18', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 1, 11, 2);
INSERT INTO `empleado` VALUES (23, '134691', 'Luis Antonio', 'Anticona Barrantes', NULL, NULL, NULL, NULL, '2016-01-18', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 1, 19, 2);
INSERT INTO `empleado` VALUES (24, '134692', 'Oscar Moisés', 'Rivera Pérez', NULL, NULL, NULL, NULL, '2016-01-25', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 2, 11, 1);
INSERT INTO `empleado` VALUES (25, '134695', 'Gilberth Renato ', 'García Sevillano', NULL, NULL, NULL, NULL, '2016-01-18', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 3, 12, 1);
INSERT INTO `empleado` VALUES (26, '134696', 'Ricardo', 'Colonia Espinoza', NULL, NULL, NULL, NULL, '2016-01-18', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 2, 20, 2);
INSERT INTO `empleado` VALUES (27, '134697', 'Roy David', 'Cabrera Corcuera ', NULL, NULL, NULL, NULL, '2016-01-18', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 1, 5, 2);
INSERT INTO `empleado` VALUES (28, '134701', ' Victor Jaiden', 'Yomona Aguilar', NULL, NULL, NULL, NULL, '2016-01-18', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 2, 9, 2);
INSERT INTO `empleado` VALUES (29, '134708', 'Harold Poole', 'Nizama Samaniego', NULL, NULL, NULL, NULL, '2016-01-18', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 2, 19, 1);
INSERT INTO `empleado` VALUES (30, '134710', 'Victor Armando', 'Valdiviezo Oviedo', NULL, NULL, NULL, NULL, '2016-01-18', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 2, 15, 2);
INSERT INTO `empleado` VALUES (31, '134711', 'Jhohan Erick', 'Cortegana Alvarado', NULL, NULL, NULL, NULL, '2016-01-18', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 1, 15, 2);
INSERT INTO `empleado` VALUES (32, '134712', 'Ana Lucia', 'Carbajal Saenz', NULL, NULL, NULL, NULL, '2016-01-18', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 1, 18, 2);
INSERT INTO `empleado` VALUES (33, '134713', 'Ingrid Jacqueline', 'Cruz Gutierrez', NULL, NULL, NULL, NULL, '2016-01-18', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 1, 18, 2);
INSERT INTO `empleado` VALUES (34, '138891', 'Herbert Junior', 'Ortiz Huayaney', NULL, NULL, NULL, NULL, '2016-05-16', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 4, 18, 4);
INSERT INTO `empleado` VALUES (35, '138892', 'Edwin John ', 'Arribasplata Gutierrez', NULL, NULL, '2018-11-03', NULL, '2016-05-16', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 5, 12, 4);
INSERT INTO `empleado` VALUES (36, '138893', 'Diego Alberto ', 'Castañeda Avalos', NULL, NULL, NULL, NULL, '2016-05-16', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 3, 12, 4);
INSERT INTO `empleado` VALUES (37, '138894', 'Jeans Pierre ', 'Graos Neciosup', NULL, NULL, NULL, NULL, '2016-05-16', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 2, 14, 2);
INSERT INTO `empleado` VALUES (38, '138895', 'Gerson Richard', 'Diaz Alvarado ', NULL, NULL, NULL, NULL, '2016-05-16', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 2, 9, 2);
INSERT INTO `empleado` VALUES (39, '138897', 'Jorge Luis ', 'Vargas del Castillo', NULL, NULL, '2018-11-03', NULL, '2016-05-16', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 2, 12, 1);
INSERT INTO `empleado` VALUES (40, '139784', 'Julio Cesar ', 'González Mayanga', NULL, NULL, NULL, NULL, '2016-06-15', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 1, 14, 2);
INSERT INTO `empleado` VALUES (41, '139785', 'Jorge Santiago', ' Espinola Quipuzco', NULL, NULL, '2018-11-03', NULL, '2016-06-15', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 2, 7, 2);
INSERT INTO `empleado` VALUES (42, '139786', 'Macvander Stiben Isaac ', 'Anselmo Ríos', NULL, NULL, NULL, NULL, '2016-06-15', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 2, 14, 2);
INSERT INTO `empleado` VALUES (43, '140268', ' Rodolfo Valentino', 'Minchola Chavez', NULL, NULL, NULL, NULL, '2016-07-01', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 1, 9, 2);
INSERT INTO `empleado` VALUES (44, '140270', 'Claudia Elizabeth', 'Borja Ramos de Quintanilla', '23123123', 'F', '1993-03-21', 'El Porvenir', '2016-07-01', NULL, NULL, '', '', 'de Quintanilla', 'S', '1', 'de Quintanilla', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, 1, 1, 18, 1);
INSERT INTO `empleado` VALUES (45, '140271', 'Jorge Jonathan Jesús', 'Rodríguez Álvarez', NULL, NULL, NULL, NULL, '2016-07-01', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 1, 1, 2);
INSERT INTO `empleado` VALUES (46, '142509', 'Yngrid Laurita', 'Mariños Vanini', NULL, NULL, NULL, NULL, '2017-07-01', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 4, 3, 1);
INSERT INTO `empleado` VALUES (47, '142930', 'José', ' Guevara Evangelista', NULL, NULL, NULL, NULL, '2016-10-03', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 1, 7, 2);
INSERT INTO `empleado` VALUES (48, '142932', 'Newton Elmer Lincoln', 'Guarniz Cruz ', NULL, NULL, NULL, NULL, '2016-10-03', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 1, 9, 2);
INSERT INTO `empleado` VALUES (49, '142933', 'Martín Leonardo', ' Ávalos Horna', '', 'F', '2018-10-03', '', '2016-10-03', NULL, NULL, '', '', 'EJEMPLO....', 'S', '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, 1, 1, 7, 2);
INSERT INTO `empleado` VALUES (50, '142934', 'Kevin', ' Reaño Cisneros', NULL, NULL, NULL, NULL, '2016-10-03', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 1, 7, 2);
INSERT INTO `empleado` VALUES (51, '144020', 'Milagros Tatiana', 'Sandoval Ulloa', NULL, NULL, NULL, NULL, '2016-11-07', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 2, 23, 1);
INSERT INTO `empleado` VALUES (52, '144192', ' Fernando ', 'Gutierrez Lozano', NULL, NULL, NULL, NULL, '2016-11-14', NULL, NULL, NULL, NULL, NULL, NULL, '1', 'Pasó de Portal a Integración', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 3, 9, 2);
INSERT INTO `empleado` VALUES (53, '144193', ' José Guillermo', 'Quintanilla Paredes', '47765502', 'M', '1993-03-21', 'La Esperanza', '2016-11-14', NULL, NULL, '(044)41-34-85', '979737552', 'Urb. Manuel Arevalo Mz. A20 Lt 2 - II Etapa', 'S', '1', 'Urb. Manuel Arevalo Mz. A20 Lt 2 - II Etapa Urb. Manuel Arevalo Mz. A20 Lt 2 - II Etapa Urb. Manuel Arevalo Mz. A20 Lt 2 - II Etapa', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, 1, 1, 9, 1);
INSERT INTO `empleado` VALUES (54, '144194', 'Marina Isabel', 'Lías Fernández', NULL, NULL, NULL, NULL, '2016-11-14', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 1, 18, 2);
INSERT INTO `empleado` VALUES (55, '144195', 'Danny David', 'Escobar Isla ', NULL, NULL, NULL, NULL, '2016-11-14', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 2, 9, 1);
INSERT INTO `empleado` VALUES (56, '144196', 'Luis Miguel', ' Bardales Guerra', NULL, NULL, '1987-01-10', NULL, '2016-11-14', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 11, 17, 2);
INSERT INTO `empleado` VALUES (57, '144197', 'María Jesús', 'Pow Sang Diaz', NULL, NULL, NULL, NULL, '2016-11-14', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 3, 11, 4);
INSERT INTO `empleado` VALUES (58, '144198', 'Paul Andres', 'Kong Arana', NULL, NULL, NULL, NULL, '2016-11-14', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 1, 7, 2);
INSERT INTO `empleado` VALUES (59, '144199', 'Julio Alexander ', 'Vásquez Pacheco', NULL, NULL, NULL, NULL, '2016-11-14', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 2, 12, 1);
INSERT INTO `empleado` VALUES (60, '144200', 'Sandra Zoraida ', 'Medrano Parado', NULL, NULL, NULL, NULL, '2016-11-14', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 1, 4, 2);
INSERT INTO `empleado` VALUES (61, '144201', 'Herlbert William', 'Zavaleta Vilchez', NULL, NULL, NULL, NULL, '2016-11-17', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 6, 6, 4);
INSERT INTO `empleado` VALUES (62, '145235', 'Fabio Enrique', 'Castillo Galindo', NULL, NULL, NULL, NULL, '2017-01-02', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 4, 8, 4);
INSERT INTO `empleado` VALUES (63, '145379', 'Lionard', 'Leyva Hurtado', NULL, NULL, NULL, NULL, '2017-01-04', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 2, 20, 1);
INSERT INTO `empleado` VALUES (64, '145380', 'Marco Antonio', 'Contreras García', NULL, NULL, NULL, NULL, '2017-01-02', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 2, 5, 1);
INSERT INTO `empleado` VALUES (65, '145500', 'Luis Miguel', 'Muñoz Dominguez', NULL, NULL, NULL, NULL, '2017-01-09', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 3, 19, 4);
INSERT INTO `empleado` VALUES (66, '145639', 'Javier Florencio', ' Pinillos Mariños', NULL, NULL, NULL, NULL, '2017-01-16', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 2, 13, 2);
INSERT INTO `empleado` VALUES (67, '145654', 'Harry José ', 'Cordero Sanchez', NULL, NULL, NULL, NULL, '2017-01-16', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 3, 18, 4);
INSERT INTO `empleado` VALUES (68, '146370', 'Roberto Carlos', 'Fabián Francisco', NULL, NULL, NULL, NULL, '2017-02-06', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 2, 20, 1);
INSERT INTO `empleado` VALUES (69, '146371', 'Jesús Jhonatan', 'Gómez Cubas', NULL, NULL, NULL, NULL, '2017-02-06', NULL, NULL, NULL, NULL, NULL, NULL, '1', 'EESS', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 1, 20, 2);
INSERT INTO `empleado` VALUES (70, '146737', 'Jaime Kishiro Osmar', 'Gonzales Miranda', NULL, NULL, NULL, NULL, '2017-02-20', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 7, 16, 5);
INSERT INTO `empleado` VALUES (71, '146738', 'Katherine ', 'Bardales Zegarra', NULL, NULL, NULL, NULL, '2017-02-20', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 1, 12, 2);
INSERT INTO `empleado` VALUES (72, '146739', ' Daniel', 'Cam Urquizo', NULL, NULL, NULL, NULL, '2017-02-20', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 2, 9, 2);
INSERT INTO `empleado` VALUES (73, '146740', 'Jesús Valentín', 'Mendoza Torres', NULL, NULL, NULL, NULL, '2017-02-20', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 1, 20, 2);
INSERT INTO `empleado` VALUES (74, '146741', 'Maria Stephanie Katherine ', 'Yepez Mendoza', NULL, NULL, NULL, NULL, '2017-02-20', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 1, 4, 2);
INSERT INTO `empleado` VALUES (75, '146743', 'Deisy Liset ', 'Correa Valderrama', NULL, NULL, NULL, NULL, '2017-02-20', NULL, NULL, NULL, NULL, NULL, NULL, '1', 'EESS', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 1, 17, 2);
INSERT INTO `empleado` VALUES (76, '146744', 'Jorge Pedro Samuel', 'Vega Trujillo', NULL, NULL, NULL, NULL, '2017-02-20', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 2, 6, 2);
INSERT INTO `empleado` VALUES (77, '147062', 'Nelida Janeth', 'Valencia Cerna', NULL, NULL, NULL, NULL, '2017-03-01', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 1, 5, 2);
INSERT INTO `empleado` VALUES (78, '147064', 'David Johnson', 'Silva Bazan', NULL, NULL, NULL, NULL, '2017-03-01', NULL, NULL, NULL, NULL, NULL, NULL, '1', 'Adelantó del mes de Marzo', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 2, 19, 1);
INSERT INTO `empleado` VALUES (79, '147065', 'Long Christopher Stive', 'Vega Andia', NULL, NULL, NULL, NULL, '2017-03-01', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 1, 20, 2);
INSERT INTO `empleado` VALUES (80, '147066', 'Jerson Andre', 'Castañeda Purizaca', NULL, NULL, NULL, NULL, '2017-03-01', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 2, 19, 2);
INSERT INTO `empleado` VALUES (81, '147595', 'Giancarlo ', 'Marín Gaitán', NULL, NULL, NULL, NULL, '2017-03-13', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 2, 12, 2);
INSERT INTO `empleado` VALUES (82, '147596', 'Segundo Luisin', 'Jacobo Garcia ', NULL, NULL, NULL, NULL, '2017-03-13', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 2, 9, 1);
INSERT INTO `empleado` VALUES (83, '147598', 'Victor Hugo ', 'Castillo Baca', NULL, NULL, NULL, NULL, '2017-03-13', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 1, 12, 2);
INSERT INTO `empleado` VALUES (84, '147599', 'Miguel Ángel', 'Linares Borja', NULL, NULL, NULL, NULL, '2017-03-13', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 1, 20, 2);
INSERT INTO `empleado` VALUES (85, '148955', 'Harold Joseph', 'Jara Díaz', NULL, NULL, NULL, NULL, '2017-04-24', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 2, 9, 2);
INSERT INTO `empleado` VALUES (86, '149343', 'Luis Gustavo', 'Torres Llanos', NULL, NULL, NULL, NULL, '2017-07-01', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 2, 19, 1);
INSERT INTO `empleado` VALUES (87, '149344', 'Dither Gary', 'Zamora Gutierrez', NULL, NULL, NULL, NULL, '2017-07-01', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 3, 19, 1);
INSERT INTO `empleado` VALUES (88, '149345', 'Jose Vicente', 'Clavo Tafur', NULL, NULL, NULL, NULL, '2017-07-01', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 1, 16, 2);
INSERT INTO `empleado` VALUES (89, '149346', 'Raul', 'Pacori Coaquira', NULL, NULL, NULL, NULL, '2017-07-01', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 1, 16, 2);
INSERT INTO `empleado` VALUES (90, '149348', 'Herbert Neil', 'Serrano Arteaga', NULL, NULL, NULL, NULL, '2017-07-01', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 1, 16, 2);
INSERT INTO `empleado` VALUES (91, '149349', 'Agustin Renatto', 'Rodas Linares', NULL, NULL, NULL, NULL, '2017-07-01', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 1, 16, 2);
INSERT INTO `empleado` VALUES (92, '149350', 'Edward Klaus', 'Cueva Rengifo', NULL, NULL, NULL, NULL, '2017-07-01', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 1, 16, 2);
INSERT INTO `empleado` VALUES (93, '149351', 'Daimon Alexader', 'Moreno Osorio', NULL, NULL, NULL, NULL, '2017-07-01', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 1, 16, 2);
INSERT INTO `empleado` VALUES (94, '149352', 'Hugo Emilio', 'Lira Quezada', NULL, NULL, NULL, NULL, '2017-07-01', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 1, 16, 2);
INSERT INTO `empleado` VALUES (95, '149353', 'Luis Guillermo', 'Llontop Peña', NULL, NULL, NULL, NULL, '2017-07-01', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 1, 16, 2);
INSERT INTO `empleado` VALUES (96, '149355', 'Aleksandr', 'Artanmonov', NULL, NULL, NULL, NULL, '2017-07-01', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 1, 16, 2);
INSERT INTO `empleado` VALUES (97, '149531', 'Dangie Zarela', 'Gonzalez Cadenillas', NULL, NULL, NULL, NULL, '2017-07-01', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 3, 16, 1);
INSERT INTO `empleado` VALUES (98, '150270', 'Jesus Jhonny', 'Vásquez Cabos', NULL, NULL, NULL, NULL, '2017-07-01', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 5, 21, 1);
INSERT INTO `empleado` VALUES (99, '150271', 'Paul German', 'Avila Romero', NULL, NULL, NULL, NULL, '2017-07-01', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 3, 6, 1);
INSERT INTO `empleado` VALUES (100, '150272', 'Milton Luis ', 'Vasquez Pari', NULL, NULL, NULL, NULL, '2017-07-01', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 4, 9, 1);
INSERT INTO `empleado` VALUES (101, '150274', 'Irwing Rolando', 'Lule Camacho', NULL, NULL, NULL, NULL, '2017-07-01', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 2, 20, 1);
INSERT INTO `empleado` VALUES (102, '150275', 'Soledad del Carmen', 'Castillo Zavala', NULL, NULL, NULL, NULL, '2017-07-01', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 2, 20, 1);
INSERT INTO `empleado` VALUES (103, '150276', 'Carlos Jhoe', 'Pastor Romero', NULL, NULL, NULL, NULL, '2017-07-01', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 2, 20, 1);
INSERT INTO `empleado` VALUES (104, '150277', 'Katheryn Alexandra', 'Bautista Abad', NULL, NULL, NULL, NULL, '2017-07-01', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 1, 7, 2);
INSERT INTO `empleado` VALUES (105, '134703', 'Jorge Alexis ', 'Huaman Luna', NULL, NULL, NULL, NULL, '2017-07-01', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, NULL, 2, 10, 1);
INSERT INTO `empleado` VALUES (106, '135201', 'Greta ', 'Paredes Purizaga ', NULL, NULL, NULL, NULL, '2016-01-18', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '0', '2017-07-26 21:23:27', '2017-07-26 21:23:28', NULL, NULL, NULL, NULL, 8, 22, 3);
INSERT INTO `empleado` VALUES (107, '138042', 'Jose Humberto ', 'Vasquez Pereyra', NULL, NULL, NULL, NULL, '2016-04-18', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '0', '2017-07-26 21:25:34', '2017-07-26 21:25:36', NULL, NULL, NULL, NULL, 9, 22, 3);
INSERT INTO `empleado` VALUES (108, '143822', 'Valdemar Alex ', 'Llaury Medrano ', NULL, NULL, NULL, NULL, '2016-11-01', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '0', '2017-07-26 21:27:12', '2017-07-26 21:27:15', NULL, NULL, NULL, NULL, 10, 22, 3);
INSERT INTO `empleado` VALUES (109, '144019', 'Karina', 'Salirrosas Llanos ', NULL, NULL, NULL, NULL, '2016-11-07', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '0', '2017-07-26 21:31:10', '2017-07-26 21:31:12', NULL, NULL, NULL, NULL, 8, 22, 3);
INSERT INTO `empleado` VALUES (110, '148949', 'Alina', 'Cabel Irribarren', NULL, NULL, NULL, NULL, '2017-04-24', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '0', '2017-07-26 21:32:38', '2017-07-26 21:32:41', NULL, NULL, NULL, NULL, 8, 22, 3);
INSERT INTO `empleado` VALUES (111, '149333', 'Ana Paula', 'Nomberto Arce', NULL, NULL, NULL, NULL, '2017-05-01', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '0', '2017-07-26 21:32:40', '2017-07-26 21:32:43', NULL, NULL, NULL, NULL, 11, 22, 3);
INSERT INTO `empleado` VALUES (112, '138049', 'Alberto', 'Miranda Ortiz', NULL, NULL, NULL, NULL, '2017-07-17', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '0', '2017-07-26 21:32:57', '2017-07-26 21:32:59', NULL, NULL, NULL, NULL, 3, 24, 1);
INSERT INTO `empleado` VALUES (113, '141714', 'Andrés Felipe', 'Cieza Muñoz', NULL, NULL, NULL, NULL, '2016-08-18', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '0', '2017-07-27 13:06:41', '2017-07-27 13:06:42', NULL, NULL, NULL, NULL, 7, 12, 5);
INSERT INTO `empleado` VALUES (114, '999999', 'Gianmarco Renato', 'Doza Caballero', '12345678', 'M', '2017-09-08', 'Trujillo', '2017-08-16', '2018-02-16', NULL, '(044)41-23-65', '123456878', 'Trujillo', 'S', '1', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 5, 9, 5);
INSERT INTO `empleado` VALUES (115, '153630', 'Henry Smith', 'Ascate Sanchez', '43372775', 'M', '1985-06-17', 'Trujillo', '2017-09-18', '2018-03-18', NULL, '(044)41-05-24', '949797563', 'La Libertad ', 'S', '1', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1);
INSERT INTO `empleado` VALUES (116, '153245', 'Cristhian Guillermo', 'Hernandez Pizarro', '18213943', 'M', '1978-04-03', 'Trujillo', '2017-09-08', '2018-03-08', NULL, '(044)22-22-22', '954450197', 'Trujillo', 'S', '1', '', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, 1);
INSERT INTO `empleado` VALUES (117, '153244', 'Rolando Palermo', 'Rodriguez Cruz', '45609542', 'M', '1988-04-02', 'Trujillo', '2017-09-08', '2018-03-08', NULL, '(044)27-23-10', '999999999', 'Trujillo', 'S', '1', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 4);
INSERT INTO `empleado` VALUES (118, '134711', 'Jhohan Erick', 'Cortegana Alvarado', '70258830', 'M', '1993-02-01', 'Trujillo', '2016-01-18', '2016-07-18', NULL, '(044)00-00-00', '954702826', 'Trujillo', 'S', '1', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 4);

-- ----------------------------
-- Table structure for empleado_categoria
-- ----------------------------
DROP TABLE IF EXISTS `empleado_categoria`;
CREATE TABLE `empleado_categoria`  (
  `id_empleado_categoria` int(8) NOT NULL AUTO_INCREMENT,
  `salario` double(15, 2) NULL DEFAULT NULL,
  `fecha` date NULL DEFAULT NULL,
  `descripcion` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `estado` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `evaluador` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'Evaluador del cambio de Categoria (Nombre)',
  `tipo` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'Tipo de Calificacion (A,B,C,D)',
  `fk_empleado` int(8) NULL DEFAULT NULL,
  `fk_categoria` int(8) NULL DEFAULT NULL,
  PRIMARY KEY (`id_empleado_categoria`) USING BTREE,
  INDEX `fk_empleado_categoria_categoria_1`(`fk_categoria`) USING BTREE,
  INDEX `fk_empleado_categoria_empleado_1`(`fk_empleado`) USING BTREE,
  CONSTRAINT `fk_empleado_categoria_categoria_1` FOREIGN KEY (`fk_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_empleado_categoria_empleado_1` FOREIGN KEY (`fk_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 117 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of empleado_categoria
-- ----------------------------
INSERT INTO `empleado_categoria` VALUES (1, NULL, '2017-07-01', '', '1', NULL, NULL, 1, 5);
INSERT INTO `empleado_categoria` VALUES (2, NULL, '2016-01-18', '', '1', NULL, NULL, 2, 2);
INSERT INTO `empleado_categoria` VALUES (3, NULL, '2014-02-13', '', '1', NULL, NULL, 3, 2);
INSERT INTO `empleado_categoria` VALUES (4, NULL, '2015-04-06', '', '1', NULL, NULL, 4, 2);
INSERT INTO `empleado_categoria` VALUES (5, NULL, '2015-08-09', '', '1', NULL, NULL, 5, 2);
INSERT INTO `empleado_categoria` VALUES (6, NULL, '2016-01-18', '', '1', NULL, NULL, 6, 1);
INSERT INTO `empleado_categoria` VALUES (7, NULL, '2016-01-18', '', '1', NULL, NULL, 7, 1);
INSERT INTO `empleado_categoria` VALUES (8, NULL, '2016-01-18', '', '1', NULL, NULL, 8, 1);
INSERT INTO `empleado_categoria` VALUES (9, NULL, '2016-01-18', '', '1', NULL, NULL, 9, 1);
INSERT INTO `empleado_categoria` VALUES (10, NULL, '2016-01-18', '', '1', NULL, NULL, 10, 3);
INSERT INTO `empleado_categoria` VALUES (11, NULL, '2016-01-18', '', '1', NULL, NULL, 11, 1);
INSERT INTO `empleado_categoria` VALUES (12, NULL, '2016-01-18', '', '1', NULL, NULL, 12, 2);
INSERT INTO `empleado_categoria` VALUES (13, NULL, '2016-01-18', '', '1', NULL, NULL, 13, 2);
INSERT INTO `empleado_categoria` VALUES (14, NULL, '2016-01-18', '', '1', NULL, NULL, 14, 3);
INSERT INTO `empleado_categoria` VALUES (15, NULL, '2016-01-18', '', '1', NULL, NULL, 15, 1);
INSERT INTO `empleado_categoria` VALUES (16, NULL, '2016-01-18', '', '1', NULL, NULL, 16, 1);
INSERT INTO `empleado_categoria` VALUES (17, NULL, '2016-01-18', '', '1', NULL, NULL, 17, 1);
INSERT INTO `empleado_categoria` VALUES (18, NULL, '2016-01-18', '', '1', NULL, NULL, 18, 1);
INSERT INTO `empleado_categoria` VALUES (19, NULL, '2016-01-18', '', '1', NULL, NULL, 19, 1);
INSERT INTO `empleado_categoria` VALUES (20, NULL, '2016-01-18', '', '1', NULL, NULL, 20, 3);
INSERT INTO `empleado_categoria` VALUES (21, NULL, '2016-01-18', '', '1', NULL, NULL, 21, 1);
INSERT INTO `empleado_categoria` VALUES (22, NULL, '2016-01-18', '', '1', NULL, NULL, 22, 1);
INSERT INTO `empleado_categoria` VALUES (23, NULL, '2016-01-18', '', '1', NULL, NULL, 23, 1);
INSERT INTO `empleado_categoria` VALUES (24, NULL, '2016-01-25', '', '1', NULL, NULL, 24, 2);
INSERT INTO `empleado_categoria` VALUES (25, NULL, '2016-01-18', '', '1', NULL, NULL, 25, 3);
INSERT INTO `empleado_categoria` VALUES (26, NULL, '2016-01-18', '', '1', NULL, NULL, 26, 2);
INSERT INTO `empleado_categoria` VALUES (27, NULL, '2016-01-18', '', '1', NULL, NULL, 27, 1);
INSERT INTO `empleado_categoria` VALUES (28, NULL, '2016-01-18', '', '1', NULL, NULL, 28, 2);
INSERT INTO `empleado_categoria` VALUES (29, NULL, '2016-01-18', '', '1', NULL, NULL, 29, 2);
INSERT INTO `empleado_categoria` VALUES (30, NULL, '2016-01-18', '', '1', NULL, NULL, 30, 2);
INSERT INTO `empleado_categoria` VALUES (31, NULL, '2016-01-18', '', '1', NULL, NULL, 31, 1);
INSERT INTO `empleado_categoria` VALUES (32, NULL, '2016-01-18', '', '1', NULL, NULL, 32, 1);
INSERT INTO `empleado_categoria` VALUES (33, NULL, '2016-01-18', '', '1', NULL, NULL, 33, 1);
INSERT INTO `empleado_categoria` VALUES (34, NULL, '2016-05-16', '', '1', NULL, NULL, 34, 4);
INSERT INTO `empleado_categoria` VALUES (35, NULL, '2016-05-16', '', '1', NULL, NULL, 35, 5);
INSERT INTO `empleado_categoria` VALUES (36, NULL, '2016-05-16', '', '1', NULL, NULL, 36, 3);
INSERT INTO `empleado_categoria` VALUES (37, NULL, '2016-05-16', '', '1', NULL, NULL, 37, 2);
INSERT INTO `empleado_categoria` VALUES (38, NULL, '2016-05-16', '', '1', NULL, NULL, 38, 2);
INSERT INTO `empleado_categoria` VALUES (39, NULL, '2016-05-16', '', '1', NULL, NULL, 39, 2);
INSERT INTO `empleado_categoria` VALUES (40, NULL, '2016-06-15', '', '1', NULL, NULL, 40, 1);
INSERT INTO `empleado_categoria` VALUES (41, NULL, '2016-06-15', '', '1', NULL, NULL, 41, 2);
INSERT INTO `empleado_categoria` VALUES (42, NULL, '2016-06-15', '', '1', NULL, NULL, 42, 2);
INSERT INTO `empleado_categoria` VALUES (43, NULL, '2016-07-01', '', '1', NULL, NULL, 43, 1);
INSERT INTO `empleado_categoria` VALUES (44, NULL, '2016-07-01', '', '1', NULL, NULL, 44, 1);
INSERT INTO `empleado_categoria` VALUES (45, NULL, '2016-07-01', '', '1', NULL, NULL, 45, 1);
INSERT INTO `empleado_categoria` VALUES (46, NULL, '2017-07-01', '', '1', NULL, NULL, 46, 4);
INSERT INTO `empleado_categoria` VALUES (47, NULL, '2016-10-03', '', '1', NULL, NULL, 47, 1);
INSERT INTO `empleado_categoria` VALUES (48, NULL, '2016-10-03', '', '1', NULL, NULL, 48, 1);
INSERT INTO `empleado_categoria` VALUES (49, NULL, '2016-10-03', '', '1', NULL, NULL, 49, 1);
INSERT INTO `empleado_categoria` VALUES (50, NULL, '2016-10-03', '', '1', NULL, NULL, 50, 1);
INSERT INTO `empleado_categoria` VALUES (51, NULL, '2016-11-07', '', '1', NULL, NULL, 51, 2);
INSERT INTO `empleado_categoria` VALUES (52, NULL, '2016-11-14', '', '1', NULL, NULL, 52, 1);
INSERT INTO `empleado_categoria` VALUES (53, NULL, '2016-11-14', '', '1', NULL, NULL, 53, 1);
INSERT INTO `empleado_categoria` VALUES (54, NULL, '2016-11-14', '', '1', NULL, NULL, 54, 1);
INSERT INTO `empleado_categoria` VALUES (55, NULL, '2016-11-14', '', '1', NULL, NULL, 55, 2);
INSERT INTO `empleado_categoria` VALUES (56, NULL, '2016-11-14', '', '1', NULL, NULL, 56, 1);
INSERT INTO `empleado_categoria` VALUES (57, NULL, '2016-11-14', '', '1', NULL, NULL, 57, 3);
INSERT INTO `empleado_categoria` VALUES (58, NULL, '2016-11-14', '', '1', NULL, NULL, 58, 1);
INSERT INTO `empleado_categoria` VALUES (59, NULL, '2016-11-14', '', '1', NULL, NULL, 59, 2);
INSERT INTO `empleado_categoria` VALUES (60, NULL, '2016-11-14', '', '1', NULL, NULL, 60, 1);
INSERT INTO `empleado_categoria` VALUES (61, NULL, '2016-11-17', '', '1', NULL, NULL, 61, 6);
INSERT INTO `empleado_categoria` VALUES (62, NULL, '2017-01-02', '', '1', NULL, NULL, 62, 4);
INSERT INTO `empleado_categoria` VALUES (63, NULL, '2017-01-04', '', '1', NULL, NULL, 63, 2);
INSERT INTO `empleado_categoria` VALUES (64, NULL, '2017-01-02', '', '1', NULL, NULL, 64, 2);
INSERT INTO `empleado_categoria` VALUES (65, NULL, '2017-01-09', '', '1', NULL, NULL, 65, 3);
INSERT INTO `empleado_categoria` VALUES (66, NULL, '2017-01-16', '', '1', NULL, NULL, 66, 2);
INSERT INTO `empleado_categoria` VALUES (67, NULL, '2017-01-16', '', '1', NULL, NULL, 67, 3);
INSERT INTO `empleado_categoria` VALUES (68, NULL, '2017-02-06', '', '1', NULL, NULL, 68, 2);
INSERT INTO `empleado_categoria` VALUES (69, NULL, '2017-02-06', '', '1', NULL, NULL, 69, 1);
INSERT INTO `empleado_categoria` VALUES (70, NULL, '2017-02-20', '', '1', NULL, NULL, 70, 7);
INSERT INTO `empleado_categoria` VALUES (71, NULL, '2017-02-20', '', '1', NULL, NULL, 71, 1);
INSERT INTO `empleado_categoria` VALUES (72, NULL, '2017-02-20', '', '1', NULL, NULL, 72, 2);
INSERT INTO `empleado_categoria` VALUES (73, NULL, '2017-02-20', '', '1', NULL, NULL, 73, 1);
INSERT INTO `empleado_categoria` VALUES (74, NULL, '2017-02-20', '', '1', NULL, NULL, 74, 1);
INSERT INTO `empleado_categoria` VALUES (75, NULL, '2017-02-20', '', '1', NULL, NULL, 75, 1);
INSERT INTO `empleado_categoria` VALUES (76, NULL, '2017-02-20', '', '1', NULL, NULL, 76, 2);
INSERT INTO `empleado_categoria` VALUES (77, NULL, '2017-03-01', '', '1', NULL, NULL, 77, 1);
INSERT INTO `empleado_categoria` VALUES (78, NULL, '2017-03-01', '', '1', NULL, NULL, 78, 2);
INSERT INTO `empleado_categoria` VALUES (79, NULL, '2017-03-01', '', '1', NULL, NULL, 79, 1);
INSERT INTO `empleado_categoria` VALUES (80, NULL, '2017-03-01', '', '1', NULL, NULL, 80, 2);
INSERT INTO `empleado_categoria` VALUES (81, NULL, '2017-03-13', '', '1', NULL, NULL, 81, 2);
INSERT INTO `empleado_categoria` VALUES (82, NULL, '2017-03-13', '', '1', NULL, NULL, 82, 2);
INSERT INTO `empleado_categoria` VALUES (83, NULL, '2017-03-13', '', '1', NULL, NULL, 83, 1);
INSERT INTO `empleado_categoria` VALUES (84, NULL, '2017-03-13', '', '1', NULL, NULL, 84, 1);
INSERT INTO `empleado_categoria` VALUES (85, NULL, '2017-04-24', '', '1', NULL, NULL, 85, 2);
INSERT INTO `empleado_categoria` VALUES (86, NULL, '2017-07-01', '', '1', NULL, NULL, 86, 2);
INSERT INTO `empleado_categoria` VALUES (87, NULL, '2017-07-01', '', '1', NULL, NULL, 87, 3);
INSERT INTO `empleado_categoria` VALUES (88, NULL, '2017-07-01', '', '1', NULL, NULL, 88, 1);
INSERT INTO `empleado_categoria` VALUES (89, NULL, '2017-07-01', '', '1', NULL, NULL, 89, 1);
INSERT INTO `empleado_categoria` VALUES (90, NULL, '2017-07-01', '', '1', NULL, NULL, 90, 1);
INSERT INTO `empleado_categoria` VALUES (91, NULL, '2017-07-01', '', '1', NULL, NULL, 91, 1);
INSERT INTO `empleado_categoria` VALUES (92, NULL, '2017-07-01', '', '1', NULL, NULL, 92, 1);
INSERT INTO `empleado_categoria` VALUES (93, NULL, '2017-07-01', '', '1', NULL, NULL, 93, 1);
INSERT INTO `empleado_categoria` VALUES (94, NULL, '2017-07-01', '', '1', NULL, NULL, 94, 1);
INSERT INTO `empleado_categoria` VALUES (95, NULL, '2017-07-01', '', '1', NULL, NULL, 95, 1);
INSERT INTO `empleado_categoria` VALUES (96, NULL, '2017-07-01', '', '1', NULL, NULL, 96, 1);
INSERT INTO `empleado_categoria` VALUES (97, NULL, '2017-07-01', '', '1', NULL, NULL, 97, 3);
INSERT INTO `empleado_categoria` VALUES (98, NULL, '2017-07-01', '', '1', NULL, NULL, 98, 5);
INSERT INTO `empleado_categoria` VALUES (99, NULL, '2017-07-01', '', '1', NULL, NULL, 99, 3);
INSERT INTO `empleado_categoria` VALUES (100, NULL, '2017-07-01', '', '1', NULL, NULL, 100, 4);
INSERT INTO `empleado_categoria` VALUES (101, NULL, '2017-07-01', '', '1', NULL, NULL, 101, 2);
INSERT INTO `empleado_categoria` VALUES (102, NULL, '2017-07-01', '', '1', NULL, NULL, 102, 2);
INSERT INTO `empleado_categoria` VALUES (103, NULL, '2017-07-01', '', '1', NULL, NULL, 103, 2);
INSERT INTO `empleado_categoria` VALUES (104, NULL, '2017-07-01', '', '1', NULL, NULL, 104, 1);
INSERT INTO `empleado_categoria` VALUES (105, NULL, '2017-07-01', '', '1', NULL, NULL, 105, 2);
INSERT INTO `empleado_categoria` VALUES (106, NULL, '2017-07-26', NULL, '1', NULL, NULL, 106, 8);
INSERT INTO `empleado_categoria` VALUES (107, NULL, '2017-07-26', NULL, '1', NULL, NULL, 107, 9);
INSERT INTO `empleado_categoria` VALUES (108, NULL, '2017-07-26', NULL, '1', NULL, NULL, 108, 10);
INSERT INTO `empleado_categoria` VALUES (109, NULL, '2017-07-26', NULL, '1', NULL, NULL, 109, 8);
INSERT INTO `empleado_categoria` VALUES (110, NULL, '2017-07-26', NULL, '1', NULL, NULL, 110, 8);
INSERT INTO `empleado_categoria` VALUES (111, NULL, '2017-07-26', NULL, '1', NULL, NULL, 111, 11);
INSERT INTO `empleado_categoria` VALUES (112, NULL, '2017-07-26', NULL, '1', NULL, NULL, 112, 3);
INSERT INTO `empleado_categoria` VALUES (113, NULL, '2016-08-18', NULL, '1', NULL, NULL, 113, 7);
INSERT INTO `empleado_categoria` VALUES (114, 4500.00, '2017-08-15', 'Ingreso al Centro', '1', 'Greta Paredes', 'A', 114, 5);
INSERT INTO `empleado_categoria` VALUES (115, 8000.00, '2018-10-08', 'full Kines :V', '1', 'Greta full Kines :V', 'B', 52, 3);
INSERT INTO `empleado_categoria` VALUES (116, 0.00, '2018-10-29', '', '1', '', 'B', 56, 11);

-- ----------------------------
-- Table structure for empleado_dominio
-- ----------------------------
DROP TABLE IF EXISTS `empleado_dominio`;
CREATE TABLE `empleado_dominio`  (
  `id_empleado_dominio` int(8) NOT NULL AUTO_INCREMENT,
  `fecha` date NULL DEFAULT NULL,
  `descripcion` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `estado` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fk_empleado` int(8) NULL DEFAULT NULL,
  `fk_dominio` int(8) NULL DEFAULT NULL,
  PRIMARY KEY (`id_empleado_dominio`) USING BTREE,
  INDEX `fk_empleado_dominio_dominio_1`(`fk_dominio`) USING BTREE,
  INDEX `fk_empleado_dominio_empleado_1`(`fk_empleado`) USING BTREE,
  CONSTRAINT `fk_empleado_dominio_dominio_1` FOREIGN KEY (`fk_dominio`) REFERENCES `dominio` (`id_dominio`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_empleado_dominio_empleado_1` FOREIGN KEY (`fk_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 117 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of empleado_dominio
-- ----------------------------
INSERT INTO `empleado_dominio` VALUES (1, '2017-07-01', '', '1', 1, 2);
INSERT INTO `empleado_dominio` VALUES (2, '2016-01-18', '', '1', 2, 20);
INSERT INTO `empleado_dominio` VALUES (3, '2016-07-01', '', '1', 3, 19);
INSERT INTO `empleado_dominio` VALUES (4, '2017-01-09', '', '1', 4, 9);
INSERT INTO `empleado_dominio` VALUES (5, '2017-01-30', '', '1', 5, 9);
INSERT INTO `empleado_dominio` VALUES (6, '2016-01-18', '', '1', 6, 18);
INSERT INTO `empleado_dominio` VALUES (7, '2016-01-18', '', '1', 7, 20);
INSERT INTO `empleado_dominio` VALUES (8, '2016-01-18', '', '1', 8, 20);
INSERT INTO `empleado_dominio` VALUES (9, '2016-01-18', '', '1', 9, 20);
INSERT INTO `empleado_dominio` VALUES (10, '2016-01-18', '', '1', 10, 14);
INSERT INTO `empleado_dominio` VALUES (11, '2016-01-18', '', '1', 11, 14);
INSERT INTO `empleado_dominio` VALUES (12, '2016-01-18', '', '1', 12, 13);
INSERT INTO `empleado_dominio` VALUES (13, '2016-01-18', '', '1', 13, 11);
INSERT INTO `empleado_dominio` VALUES (14, '2016-01-18', '', '1', 14, 20);
INSERT INTO `empleado_dominio` VALUES (15, '2016-01-18', '', '1', 15, 18);
INSERT INTO `empleado_dominio` VALUES (16, '2016-01-18', '', '1', 16, 11);
INSERT INTO `empleado_dominio` VALUES (17, '2016-01-18', '', '1', 17, 8);
INSERT INTO `empleado_dominio` VALUES (18, '2016-01-18', '', '1', 18, 15);
INSERT INTO `empleado_dominio` VALUES (19, '2016-01-18', '', '1', 19, 18);
INSERT INTO `empleado_dominio` VALUES (20, '2016-01-18', '', '1', 20, 9);
INSERT INTO `empleado_dominio` VALUES (21, '2016-01-18', '', '1', 21, 18);
INSERT INTO `empleado_dominio` VALUES (22, '2016-01-18', '', '1', 22, 11);
INSERT INTO `empleado_dominio` VALUES (23, '2016-01-18', '', '1', 23, 19);
INSERT INTO `empleado_dominio` VALUES (24, '2016-01-25', '', '1', 24, 11);
INSERT INTO `empleado_dominio` VALUES (25, '2016-01-18', '', '1', 25, 12);
INSERT INTO `empleado_dominio` VALUES (26, '2016-01-18', '', '1', 26, 20);
INSERT INTO `empleado_dominio` VALUES (27, '2016-01-18', '', '1', 27, 5);
INSERT INTO `empleado_dominio` VALUES (28, '2016-01-18', '', '1', 28, 9);
INSERT INTO `empleado_dominio` VALUES (29, '2016-01-18', '', '1', 29, 19);
INSERT INTO `empleado_dominio` VALUES (30, '2016-01-18', '', '1', 30, 15);
INSERT INTO `empleado_dominio` VALUES (31, '2016-01-18', '', '1', 31, 15);
INSERT INTO `empleado_dominio` VALUES (32, '2016-01-18', '', '1', 32, 18);
INSERT INTO `empleado_dominio` VALUES (33, '2016-01-18', '', '1', 33, 18);
INSERT INTO `empleado_dominio` VALUES (34, '2016-05-16', '', '1', 34, 18);
INSERT INTO `empleado_dominio` VALUES (35, '2016-05-16', '', '1', 35, 12);
INSERT INTO `empleado_dominio` VALUES (36, '2016-05-16', '', '1', 36, 12);
INSERT INTO `empleado_dominio` VALUES (37, '2016-05-16', '', '1', 37, 14);
INSERT INTO `empleado_dominio` VALUES (38, '2016-05-16', '', '1', 38, 9);
INSERT INTO `empleado_dominio` VALUES (39, '2016-05-16', '', '1', 39, 12);
INSERT INTO `empleado_dominio` VALUES (40, '2016-06-15', '', '1', 40, 14);
INSERT INTO `empleado_dominio` VALUES (41, '2016-06-15', '', '1', 41, 7);
INSERT INTO `empleado_dominio` VALUES (42, '2016-06-15', '', '1', 42, 14);
INSERT INTO `empleado_dominio` VALUES (43, '2016-07-01', '', '1', 43, 9);
INSERT INTO `empleado_dominio` VALUES (44, '2016-07-01', '', '1', 44, 18);
INSERT INTO `empleado_dominio` VALUES (45, '2016-07-01', '', '1', 45, 1);
INSERT INTO `empleado_dominio` VALUES (46, '2017-07-01', '', '1', 46, 3);
INSERT INTO `empleado_dominio` VALUES (47, '2016-10-03', '', '1', 47, 7);
INSERT INTO `empleado_dominio` VALUES (48, '2016-10-03', '', '1', 48, 9);
INSERT INTO `empleado_dominio` VALUES (49, '2016-10-03', '', '1', 49, 7);
INSERT INTO `empleado_dominio` VALUES (50, '2016-10-03', '', '1', 50, 7);
INSERT INTO `empleado_dominio` VALUES (51, '2016-11-07', '', '1', 51, 18);
INSERT INTO `empleado_dominio` VALUES (52, '2017-02-13', '', '1', 52, 9);
INSERT INTO `empleado_dominio` VALUES (53, '2016-11-14', '', '1', 53, 9);
INSERT INTO `empleado_dominio` VALUES (54, '2016-11-14', '', '1', 54, 18);
INSERT INTO `empleado_dominio` VALUES (55, '2016-11-14', '', '1', 55, 9);
INSERT INTO `empleado_dominio` VALUES (56, '2016-11-14', '', '1', 56, 17);
INSERT INTO `empleado_dominio` VALUES (57, '2016-11-14', '', '1', 57, 11);
INSERT INTO `empleado_dominio` VALUES (58, '2016-11-14', '', '1', 58, 7);
INSERT INTO `empleado_dominio` VALUES (59, '2016-11-14', '', '1', 59, 12);
INSERT INTO `empleado_dominio` VALUES (60, '2016-11-14', '', '1', 60, 4);
INSERT INTO `empleado_dominio` VALUES (61, '2016-11-17', '', '1', 61, 6);
INSERT INTO `empleado_dominio` VALUES (62, '2017-01-02', '', '1', 62, 8);
INSERT INTO `empleado_dominio` VALUES (63, '2017-01-04', '', '1', 63, 20);
INSERT INTO `empleado_dominio` VALUES (64, '2017-01-02', '', '1', 64, 5);
INSERT INTO `empleado_dominio` VALUES (65, '2017-01-09', '', '1', 65, 19);
INSERT INTO `empleado_dominio` VALUES (66, '2017-01-16', '', '1', 66, 13);
INSERT INTO `empleado_dominio` VALUES (67, '2017-01-16', '', '1', 67, 18);
INSERT INTO `empleado_dominio` VALUES (68, '2017-02-06', '', '1', 68, 20);
INSERT INTO `empleado_dominio` VALUES (69, '2017-02-06', '', '1', 69, 20);
INSERT INTO `empleado_dominio` VALUES (70, '2017-02-20', '', '1', 70, 16);
INSERT INTO `empleado_dominio` VALUES (71, '2017-02-20', '', '1', 71, 12);
INSERT INTO `empleado_dominio` VALUES (72, '2017-02-20', '', '1', 72, 9);
INSERT INTO `empleado_dominio` VALUES (73, '2017-02-20', '', '1', 73, 20);
INSERT INTO `empleado_dominio` VALUES (74, '2017-02-20', '', '1', 74, 4);
INSERT INTO `empleado_dominio` VALUES (75, '2017-02-20', '', '1', 75, 17);
INSERT INTO `empleado_dominio` VALUES (76, '2017-02-20', '', '1', 76, 6);
INSERT INTO `empleado_dominio` VALUES (77, '2017-03-01', '', '1', 77, 5);
INSERT INTO `empleado_dominio` VALUES (78, '2017-03-01', '', '1', 78, 19);
INSERT INTO `empleado_dominio` VALUES (79, '2017-03-01', '', '1', 79, 20);
INSERT INTO `empleado_dominio` VALUES (80, '2017-03-01', '', '1', 80, 19);
INSERT INTO `empleado_dominio` VALUES (81, '2017-03-13', '', '1', 81, 12);
INSERT INTO `empleado_dominio` VALUES (82, '2017-03-13', '', '1', 82, 9);
INSERT INTO `empleado_dominio` VALUES (83, '2017-03-13', '', '1', 83, 12);
INSERT INTO `empleado_dominio` VALUES (84, '2017-03-13', '', '1', 84, 20);
INSERT INTO `empleado_dominio` VALUES (85, '2017-04-24', '', '1', 85, 9);
INSERT INTO `empleado_dominio` VALUES (86, '2017-07-01', '', '1', 86, 19);
INSERT INTO `empleado_dominio` VALUES (87, '2017-07-01', '', '1', 87, 19);
INSERT INTO `empleado_dominio` VALUES (88, '2017-07-01', '', '1', 88, 16);
INSERT INTO `empleado_dominio` VALUES (89, '2017-07-01', '', '1', 89, 16);
INSERT INTO `empleado_dominio` VALUES (90, '2017-07-01', '', '1', 90, 16);
INSERT INTO `empleado_dominio` VALUES (91, '2017-07-01', '', '1', 91, 16);
INSERT INTO `empleado_dominio` VALUES (92, '2017-07-01', '', '1', 92, 16);
INSERT INTO `empleado_dominio` VALUES (93, '2017-07-01', '', '1', 93, 16);
INSERT INTO `empleado_dominio` VALUES (94, '2017-07-01', '', '1', 94, 16);
INSERT INTO `empleado_dominio` VALUES (95, '2017-07-01', '', '1', 95, 16);
INSERT INTO `empleado_dominio` VALUES (96, '2017-07-01', '', '1', 96, 16);
INSERT INTO `empleado_dominio` VALUES (97, '2017-07-01', '', '1', 97, 16);
INSERT INTO `empleado_dominio` VALUES (98, '2017-07-01', '', '1', 98, 14);
INSERT INTO `empleado_dominio` VALUES (99, '2017-07-01', '', '1', 99, 6);
INSERT INTO `empleado_dominio` VALUES (100, '2017-07-01', '', '1', 100, 9);
INSERT INTO `empleado_dominio` VALUES (101, '2017-07-01', '', '1', 101, 20);
INSERT INTO `empleado_dominio` VALUES (102, '2017-07-01', '', '1', 102, 20);
INSERT INTO `empleado_dominio` VALUES (103, '2017-07-01', '', '1', 103, 20);
INSERT INTO `empleado_dominio` VALUES (104, '2017-07-01', '', '1', 104, 7);
INSERT INTO `empleado_dominio` VALUES (105, '2017-07-01', '', '1', 105, 10);
INSERT INTO `empleado_dominio` VALUES (106, '2017-07-01', NULL, '1', 106, 22);
INSERT INTO `empleado_dominio` VALUES (107, '2017-07-01', NULL, '1', 107, 22);
INSERT INTO `empleado_dominio` VALUES (108, '2017-07-01', NULL, '1', 108, 22);
INSERT INTO `empleado_dominio` VALUES (109, '2017-07-01', NULL, '1', 109, 22);
INSERT INTO `empleado_dominio` VALUES (110, '2017-07-01', NULL, '1', 110, 22);
INSERT INTO `empleado_dominio` VALUES (111, '2017-07-01', NULL, '1', 111, 22);
INSERT INTO `empleado_dominio` VALUES (112, '2017-07-01', NULL, '1', 112, 9);
INSERT INTO `empleado_dominio` VALUES (113, '2016-08-18', NULL, '1', 113, 12);
INSERT INTO `empleado_dominio` VALUES (114, '2017-08-24', '', '1', 98, 21);
INSERT INTO `empleado_dominio` VALUES (115, '2017-08-24', '', '1', 51, 23);
INSERT INTO `empleado_dominio` VALUES (116, '2017-08-15', 'Ingreso al Dominio', '1', 114, 9);

-- ----------------------------
-- Table structure for empleado_lider_dominio
-- ----------------------------
DROP TABLE IF EXISTS `empleado_lider_dominio`;
CREATE TABLE `empleado_lider_dominio`  (
  `id_empleado_lider_dominio` int(8) NOT NULL AUTO_INCREMENT,
  `dominios` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL COMMENT 'FK Dominios de los cuales es lider ej : [1,3,5,7]',
  `eliminado` char(1) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL COMMENT 'Eliminado : 1 : Si, 0 : No',
  `fchRg` timestamp(0) NULL DEFAULT NULL COMMENT 'Fecha de registro del registro en BD.',
  `fchAc` timestamp(0) NULL DEFAULT NULL COMMENT 'Fecha de actuallizacion del registro en BD.',
  `usrId` int(8) NULL DEFAULT NULL COMMENT 'FK Usuario Modificacion/Creacion/Eliminacion',
  `ipAdd` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL COMMENT 'Ip Address',
  `hosNm` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL COMMENT 'HostName',
  `fk_empleado` int(8) NULL DEFAULT NULL COMMENT 'FK Empleado',
  PRIMARY KEY (`id_empleado_lider_dominio`) USING BTREE,
  INDEX `fk_empleado_lider_dominio_empleado_1`(`fk_empleado`) USING BTREE,
  CONSTRAINT `fk_empleado_lider_dominio_empleado_1` FOREIGN KEY (`fk_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of empleado_lider_dominio
-- ----------------------------
INSERT INTO `empleado_lider_dominio` VALUES (1, '3,11,19,20', '0', '2017-07-07 01:00:00', '2017-07-10 10:53:04', 0, '::1', 'LIM-MXL5510MRN.usersad.everis.int', 1);
INSERT INTO `empleado_lider_dominio` VALUES (2, '2,4,5,8,10,13,14,18', '0', '2017-07-07 01:00:00', '2017-07-10 10:53:11', 0, '::1', 'LIM-MXL5510MRN.usersad.everis.int', 98);
INSERT INTO `empleado_lider_dominio` VALUES (3, '1,6,7,9,12,17,21', '0', '2017-07-07 01:00:00', '2017-07-10 10:53:19', 0, '::1', 'LIM-MXL5510MRN.usersad.everis.int', 35);
INSERT INTO `empleado_lider_dominio` VALUES (4, '15,16', '0', '2017-07-07 01:00:00', '2017-07-10 10:53:27', 0, '::1', 'LIM-MXL5510MRN.usersad.everis.int', 30);
INSERT INTO `empleado_lider_dominio` VALUES (5, '9', '0', '2017-07-07 01:00:00', '2017-07-10 12:19:32', 0, '10.232.100.88', 'LIM-MXL5510MRN', 20);
INSERT INTO `empleado_lider_dominio` VALUES (6, '9,25', '0', '2017-08-15 01:00:00', '2017-09-08 12:32:24', 0, '10.232.100.149', 'LIM-MXL5510MRN', 114);

-- ----------------------------
-- Table structure for empleado_tecnologia
-- ----------------------------
DROP TABLE IF EXISTS `empleado_tecnologia`;
CREATE TABLE `empleado_tecnologia`  (
  `id_empleado_tecnologia` int(8) NOT NULL AUTO_INCREMENT,
  `nivel` int(1) NULL DEFAULT NULL,
  `anios` int(2) NULL DEFAULT NULL,
  `flag_principal` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fecha` date NULL DEFAULT NULL,
  `descripcion` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `estado` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fk_empleado` int(8) NULL DEFAULT NULL,
  `fk_tecnologia` int(8) NULL DEFAULT NULL,
  PRIMARY KEY (`id_empleado_tecnologia`) USING BTREE,
  INDEX `fk_empleado_tecnologia_empleado_1`(`fk_empleado`) USING BTREE,
  INDEX `fk_empleado_tecnologia_tecnologia_1`(`fk_tecnologia`) USING BTREE,
  CONSTRAINT `fk_empleado_tecnologia_empleado_1` FOREIGN KEY (`fk_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_empleado_tecnologia_tecnologia_1` FOREIGN KEY (`fk_tecnologia`) REFERENCES `tecnologia` (`id_tecnologia`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 109 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of empleado_tecnologia
-- ----------------------------
INSERT INTO `empleado_tecnologia` VALUES (1, 5, 1, '1', '2017-07-01', '', '1', 1, 1);
INSERT INTO `empleado_tecnologia` VALUES (2, 5, 1, '1', '2016-01-18', '', '1', 2, 1);
INSERT INTO `empleado_tecnologia` VALUES (3, 5, 1, '1', '2014-02-13', '', '1', 3, 1);
INSERT INTO `empleado_tecnologia` VALUES (4, 5, 1, '1', '2015-04-06', '', '1', 4, 3);
INSERT INTO `empleado_tecnologia` VALUES (5, 5, 1, '1', '2015-08-09', '', '1', 5, 3);
INSERT INTO `empleado_tecnologia` VALUES (6, 5, 1, '1', '2016-01-18', '', '1', 6, 5);
INSERT INTO `empleado_tecnologia` VALUES (7, 5, 1, '1', '2016-01-18', '', '1', 7, 1);
INSERT INTO `empleado_tecnologia` VALUES (8, 5, 1, '1', '2016-01-18', '', '1', 8, 1);
INSERT INTO `empleado_tecnologia` VALUES (9, 5, 1, '1', '2016-01-18', '', '1', 9, 1);
INSERT INTO `empleado_tecnologia` VALUES (10, 5, 1, '1', '2016-01-18', '', '1', 10, 3);
INSERT INTO `empleado_tecnologia` VALUES (11, 5, 1, '1', '2016-01-18', '', '1', 11, 3);
INSERT INTO `empleado_tecnologia` VALUES (12, 5, 1, '1', '2016-01-18', '', '1', 12, 3);
INSERT INTO `empleado_tecnologia` VALUES (13, 5, 1, '1', '2016-01-18', '', '1', 13, 2);
INSERT INTO `empleado_tecnologia` VALUES (14, 5, 1, '1', '2016-01-18', '', '1', 14, 1);
INSERT INTO `empleado_tecnologia` VALUES (15, 5, 1, '1', '2016-01-18', '', '1', 15, 1);
INSERT INTO `empleado_tecnologia` VALUES (16, 5, 1, '1', '2016-01-18', '', '1', 16, 2);
INSERT INTO `empleado_tecnologia` VALUES (17, 5, 1, '1', '2016-01-18', '', '1', 17, 3);
INSERT INTO `empleado_tecnologia` VALUES (18, 5, 1, '1', '2016-01-18', '', '1', 18, 4);
INSERT INTO `empleado_tecnologia` VALUES (19, 5, 1, '1', '2016-01-18', '', '1', 19, 5);
INSERT INTO `empleado_tecnologia` VALUES (20, 5, 1, '1', '2016-01-18', '', '1', 20, 1);
INSERT INTO `empleado_tecnologia` VALUES (21, 5, 1, '1', '2016-01-18', '', '1', 21, 2);
INSERT INTO `empleado_tecnologia` VALUES (22, 5, 1, '1', '2016-01-18', '', '1', 22, 2);
INSERT INTO `empleado_tecnologia` VALUES (23, 5, 1, '1', '2016-01-18', '', '1', 23, 1);
INSERT INTO `empleado_tecnologia` VALUES (24, 5, 1, '1', '2016-01-25', '', '1', 24, 2);
INSERT INTO `empleado_tecnologia` VALUES (25, 5, 1, '1', '2016-01-18', '', '1', 25, 1);
INSERT INTO `empleado_tecnologia` VALUES (26, 5, 1, '1', '2016-01-18', '', '1', 26, 1);
INSERT INTO `empleado_tecnologia` VALUES (27, 5, 1, '1', '2016-01-18', '', '1', 27, 1);
INSERT INTO `empleado_tecnologia` VALUES (28, 5, 1, '1', '2016-01-18', '', '1', 28, 3);
INSERT INTO `empleado_tecnologia` VALUES (29, 5, 1, '1', '2016-01-18', '', '1', 29, 1);
INSERT INTO `empleado_tecnologia` VALUES (30, 5, 1, '1', '2016-01-18', '', '1', 30, 4);
INSERT INTO `empleado_tecnologia` VALUES (31, 5, 1, '1', '2016-01-18', '', '1', 31, 4);
INSERT INTO `empleado_tecnologia` VALUES (32, 5, 1, '1', '2016-01-18', '', '1', 32, 5);
INSERT INTO `empleado_tecnologia` VALUES (33, 5, 1, '1', '2016-01-18', '', '1', 33, 5);
INSERT INTO `empleado_tecnologia` VALUES (34, 5, 1, '1', '2016-05-16', '', '1', 34, 5);
INSERT INTO `empleado_tecnologia` VALUES (35, 5, 1, '1', '2016-05-16', '', '1', 35, 1);
INSERT INTO `empleado_tecnologia` VALUES (36, 5, 1, '1', '2016-05-16', '', '1', 36, 1);
INSERT INTO `empleado_tecnologia` VALUES (37, 5, 1, '1', '2016-05-16', '', '1', 37, 3);
INSERT INTO `empleado_tecnologia` VALUES (38, 5, 1, '1', '2016-05-16', '', '1', 38, 3);
INSERT INTO `empleado_tecnologia` VALUES (39, 5, 1, '1', '2016-05-16', '', '1', 39, 1);
INSERT INTO `empleado_tecnologia` VALUES (40, 5, 1, '1', '2016-06-15', '', '1', 40, 3);
INSERT INTO `empleado_tecnologia` VALUES (41, 5, 1, '1', '2016-06-15', '', '1', 41, 1);
INSERT INTO `empleado_tecnologia` VALUES (42, 5, 1, '1', '2016-06-15', '', '1', 42, 3);
INSERT INTO `empleado_tecnologia` VALUES (43, 5, 1, '1', '2016-07-01', '', '1', 43, 1);
INSERT INTO `empleado_tecnologia` VALUES (44, 5, 1, '1', '2016-07-01', '', '1', 44, 1);
INSERT INTO `empleado_tecnologia` VALUES (45, 5, 1, '1', '2016-07-01', '', '1', 45, 1);
INSERT INTO `empleado_tecnologia` VALUES (46, 5, 1, '1', '2017-07-01', '', '1', 46, 6);
INSERT INTO `empleado_tecnologia` VALUES (47, 5, 1, '1', '2016-10-03', '', '1', 47, 1);
INSERT INTO `empleado_tecnologia` VALUES (48, 5, 1, '1', '2016-10-03', '', '1', 48, 1);
INSERT INTO `empleado_tecnologia` VALUES (49, 5, 1, '1', '2016-10-03', '', '1', 49, 1);
INSERT INTO `empleado_tecnologia` VALUES (50, 5, 1, '1', '2016-10-03', '', '1', 50, 1);
INSERT INTO `empleado_tecnologia` VALUES (51, 5, 1, '1', '2016-11-07', '', '1', 51, 5);
INSERT INTO `empleado_tecnologia` VALUES (52, 5, 1, '1', '2016-11-14', '', '1', 52, 3);
INSERT INTO `empleado_tecnologia` VALUES (53, 5, 1, '1', '2016-11-14', '', '1', 53, 3);
INSERT INTO `empleado_tecnologia` VALUES (54, 5, 1, '1', '2016-11-14', '', '1', 54, 1);
INSERT INTO `empleado_tecnologia` VALUES (55, 5, 1, '1', '2016-11-14', '', '1', 55, 3);
INSERT INTO `empleado_tecnologia` VALUES (56, 5, 1, '1', '2016-11-14', '', '1', 56, 1);
INSERT INTO `empleado_tecnologia` VALUES (57, 5, 1, '1', '2016-11-14', '', '1', 57, 2);
INSERT INTO `empleado_tecnologia` VALUES (58, 5, 1, '1', '2016-11-14', '', '1', 58, 1);
INSERT INTO `empleado_tecnologia` VALUES (59, 5, 1, '1', '2016-11-14', '', '1', 59, 1);
INSERT INTO `empleado_tecnologia` VALUES (60, 5, 1, '1', '2016-11-14', '', '1', 60, 5);
INSERT INTO `empleado_tecnologia` VALUES (61, 5, 1, '1', '2016-11-17', '', '1', 61, 1);
INSERT INTO `empleado_tecnologia` VALUES (62, 5, 1, '1', '2017-01-02', '', '1', 62, 3);
INSERT INTO `empleado_tecnologia` VALUES (63, 5, 1, '1', '2017-01-04', '', '1', 63, 3);
INSERT INTO `empleado_tecnologia` VALUES (64, 5, 1, '1', '2017-01-02', '', '1', 64, 1);
INSERT INTO `empleado_tecnologia` VALUES (65, 5, 1, '1', '2017-01-09', '', '1', 65, 1);
INSERT INTO `empleado_tecnologia` VALUES (66, 5, 1, '1', '2017-01-16', '', '1', 66, 3);
INSERT INTO `empleado_tecnologia` VALUES (67, 5, 1, '1', '2017-01-16', '', '1', 67, 5);
INSERT INTO `empleado_tecnologia` VALUES (68, 5, 1, '1', '2017-02-06', '', '1', 68, 1);
INSERT INTO `empleado_tecnologia` VALUES (69, 5, 1, '1', '2017-02-06', '', '1', 69, 1);
INSERT INTO `empleado_tecnologia` VALUES (70, 5, 1, '1', '2017-02-20', '', '1', 70, 4);
INSERT INTO `empleado_tecnologia` VALUES (71, 5, 1, '1', '2017-02-20', '', '1', 71, 1);
INSERT INTO `empleado_tecnologia` VALUES (72, 5, 1, '1', '2017-02-20', '', '1', 72, 3);
INSERT INTO `empleado_tecnologia` VALUES (73, 5, 1, '1', '2017-02-20', '', '1', 73, 1);
INSERT INTO `empleado_tecnologia` VALUES (74, 5, 1, '1', '2017-02-20', '', '1', 74, 1);
INSERT INTO `empleado_tecnologia` VALUES (75, 5, 1, '1', '2017-02-20', '', '1', 75, 1);
INSERT INTO `empleado_tecnologia` VALUES (76, 5, 1, '1', '2017-02-20', '', '1', 76, 1);
INSERT INTO `empleado_tecnologia` VALUES (77, 5, 1, '1', '2017-03-01', '', '1', 77, 1);
INSERT INTO `empleado_tecnologia` VALUES (78, 5, 1, '1', '2017-03-01', '', '1', 78, 1);
INSERT INTO `empleado_tecnologia` VALUES (79, 5, 1, '1', '2017-03-01', '', '1', 79, 1);
INSERT INTO `empleado_tecnologia` VALUES (80, 5, 1, '1', '2017-03-01', '', '1', 80, 1);
INSERT INTO `empleado_tecnologia` VALUES (81, 5, 1, '1', '2017-03-13', '', '1', 81, 1);
INSERT INTO `empleado_tecnologia` VALUES (82, 5, 1, '1', '2017-03-13', '', '1', 82, 1);
INSERT INTO `empleado_tecnologia` VALUES (83, 5, 1, '1', '2017-03-13', '', '1', 83, 1);
INSERT INTO `empleado_tecnologia` VALUES (84, 5, 1, '1', '2017-03-13', '', '1', 84, 1);
INSERT INTO `empleado_tecnologia` VALUES (85, 5, 1, '1', '2017-04-24', '', '1', 85, 1);
INSERT INTO `empleado_tecnologia` VALUES (86, 5, 1, '1', '2017-07-01', '', '1', 86, 1);
INSERT INTO `empleado_tecnologia` VALUES (87, 5, 1, '1', '2017-07-01', '', '1', 87, 1);
INSERT INTO `empleado_tecnologia` VALUES (88, 5, 1, '1', '2017-07-01', '', '1', 88, 4);
INSERT INTO `empleado_tecnologia` VALUES (89, 5, 1, '1', '2017-07-01', '', '1', 89, 4);
INSERT INTO `empleado_tecnologia` VALUES (90, 5, 1, '1', '2017-07-01', '', '1', 90, 4);
INSERT INTO `empleado_tecnologia` VALUES (91, 5, 1, '1', '2017-07-01', '', '1', 91, 4);
INSERT INTO `empleado_tecnologia` VALUES (92, 5, 1, '1', '2017-07-01', '', '1', 92, 4);
INSERT INTO `empleado_tecnologia` VALUES (93, 5, 1, '1', '2017-07-01', '', '1', 93, 4);
INSERT INTO `empleado_tecnologia` VALUES (94, 5, 1, '1', '2017-07-01', '', '1', 94, 4);
INSERT INTO `empleado_tecnologia` VALUES (95, 5, 1, '1', '2017-07-01', '', '1', 95, 4);
INSERT INTO `empleado_tecnologia` VALUES (96, 5, 1, '1', '2017-07-01', '', '1', 96, 4);
INSERT INTO `empleado_tecnologia` VALUES (97, 5, 1, '1', '2017-07-01', '', '1', 97, 4);
INSERT INTO `empleado_tecnologia` VALUES (98, 5, 1, '1', '2017-07-01', '', '1', 98, 3);
INSERT INTO `empleado_tecnologia` VALUES (99, 5, 1, '1', '2017-07-01', '', '1', 99, 7);
INSERT INTO `empleado_tecnologia` VALUES (100, 5, 1, '1', '2017-07-01', '', '1', 100, 3);
INSERT INTO `empleado_tecnologia` VALUES (101, 5, 1, '1', '2017-07-01', '', '1', 101, 1);
INSERT INTO `empleado_tecnologia` VALUES (102, 5, 1, '1', '2017-07-01', '', '1', 102, 1);
INSERT INTO `empleado_tecnologia` VALUES (103, 5, 1, '1', '2017-07-01', '', '1', 103, 1);
INSERT INTO `empleado_tecnologia` VALUES (104, 5, 1, '1', '2017-07-01', '', '1', 104, 1);
INSERT INTO `empleado_tecnologia` VALUES (105, 5, 1, '1', '2017-07-01', '', '1', 105, 3);
INSERT INTO `empleado_tecnologia` VALUES (106, 5, 3, '1', '2017-07-26', 'BI y herramientas de reporting.', '1', 107, 6);
INSERT INTO `empleado_tecnologia` VALUES (107, 0, 0, '0', '2018-10-03', '', '1', 114, 1);
INSERT INTO `empleado_tecnologia` VALUES (108, 5, 5, '1', '2018-10-26', 'Full STack Developer', '1', 52, 3);

-- ----------------------------
-- Table structure for etiqueta
-- ----------------------------
DROP TABLE IF EXISTS `etiqueta`;
CREATE TABLE `etiqueta`  (
  `id_etiqueta` int(8) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(300) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL,
  `eliminado` char(1) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL COMMENT 'Eliminado : 1 : Si, 0 : No',
  `fchRg` timestamp(0) NULL DEFAULT NULL,
  `fchAc` timestamp(0) NULL DEFAULT NULL,
  `usrId` int(8) NULL DEFAULT NULL,
  `ipAdd` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `hosNm` varchar(300) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_etiqueta`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of etiqueta
-- ----------------------------
INSERT INTO `etiqueta` VALUES (1, 'Informática', 'Informática', '0', '2017-07-14 13:19:07', '2017-07-14 13:19:09', 4, NULL, NULL);
INSERT INTO `etiqueta` VALUES (2, 'Administración BBDD', 'Administración BBDD', '0', '2017-07-14 13:19:21', '2017-07-14 13:19:23', 4, NULL, NULL);
INSERT INTO `etiqueta` VALUES (3, 'BPM - Business Process Management', 'BPM - Business Process Management', '0', '2017-07-14 15:22:26', '2017-07-14 15:22:28', 4, NULL, NULL);
INSERT INTO `etiqueta` VALUES (4, 'Herramientas ETL', 'Herramientas ETL', '0', '2017-07-14 15:22:48', '2017-07-14 15:22:50', 4, NULL, NULL);
INSERT INTO `etiqueta` VALUES (5, 'People', 'People.', '0', '2017-07-24 17:22:22', '2017-07-25 16:22:08', 4, '10.232.100.252', 'LIM-MXL5510MRN');
INSERT INTO `etiqueta` VALUES (6, 'SCRUM', 'SCRUM.', '0', '2017-07-25 16:22:34', '2017-07-25 16:22:49', 4, '10.232.100.252', 'LIM-MXL5510MRN');
INSERT INTO `etiqueta` VALUES (7, 'Business Inteligence', 'Business Inteligence', '0', '2018-11-09 13:09:03', '2018-12-04 11:46:14', 8, '10.10.1.131', 'CLRLAP034.fractal.local');
INSERT INTO `etiqueta` VALUES (8, 'ITIL', 'ITIL', '0', '2018-11-13 12:04:30', '2018-12-04 11:45:59', 8, '10.10.1.131', 'CLRLAP034.fractal.local');

-- ----------------------------
-- Table structure for institucion_educativa
-- ----------------------------
DROP TABLE IF EXISTS `institucion_educativa`;
CREATE TABLE `institucion_educativa`  (
  `id_institucion_educativa` int(8) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `descripcion` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `estado` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fecha` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_institucion_educativa`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of institucion_educativa
-- ----------------------------
INSERT INTO `institucion_educativa` VALUES (1, 'Universidad Nacional de Trujillo', 'Universidad', '1', '2017-08-03 11:53:43');
INSERT INTO `institucion_educativa` VALUES (2, 'ITN -Cybertec', 'Instituto', '1', '2017-08-03 11:54:38');
INSERT INTO `institucion_educativa` VALUES (3, 'Universidad Privada Antenor Orrego', 'Universidad', '1', '2017-08-03 11:54:09');
INSERT INTO `institucion_educativa` VALUES (4, 'Universidad Privada del Norte', 'Universidad', '1', '2017-08-03 11:54:17');
INSERT INTO `institucion_educativa` VALUES (5, 'Universidad Privada Cesar Vallejo', 'Universidad', '1', '2017-08-03 11:54:25');
INSERT INTO `institucion_educativa` VALUES (6, 'Universidad Nacional de Ingenieria', 'Universidad Nacional de Ingenieria', '1', '2019-01-07 19:58:38');

-- ----------------------------
-- Table structure for leccion_aprendida
-- ----------------------------
DROP TABLE IF EXISTS `leccion_aprendida`;
CREATE TABLE `leccion_aprendida`  (
  `id_leccion_aprendida` int(8) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(300) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL,
  `etiquetas` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL COMMENT 'FK Etiqueta  ej : [1,3,5,7]',
  `ruta_archivo` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL,
  `eliminado` char(1) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL COMMENT 'Eliminado : 1 : Si, 0 : No',
  `fchRg` timestamp(0) NULL DEFAULT NULL,
  `fchAc` timestamp(0) NULL DEFAULT NULL,
  `usrId` int(8) NULL DEFAULT NULL,
  `ipAdd` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `hosNm` varchar(300) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `fk_dominio` int(8) NULL DEFAULT NULL,
  `fk_usuario` int(8) NULL DEFAULT NULL,
  PRIMARY KEY (`id_leccion_aprendida`) USING BTREE,
  INDEX `fk_leccion_aprendida_dominio_1`(`fk_dominio`) USING BTREE,
  INDEX `fk_leccion_aprendida_usuario_1`(`fk_usuario`) USING BTREE,
  CONSTRAINT `fk_leccion_aprendida_dominio_1` FOREIGN KEY (`fk_dominio`) REFERENCES `dominio` (`id_dominio`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_leccion_aprendida_usuario_1` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of leccion_aprendida
-- ----------------------------
INSERT INTO `leccion_aprendida` VALUES (1, 'Leccion Aprendida 1.', 'Leccion Aprendida 1.', '2', 'assets/archivos/lecciones/510c8cc8376d22bde45db45525e25018.xls', '0', '2017-08-03 16:57:43', '2019-01-07 19:57:42', 13, '10.10.1.131', 'CLRLAP034.fractal.local', 9, 13);

-- ----------------------------
-- Table structure for movimiento_empleado
-- ----------------------------
DROP TABLE IF EXISTS `movimiento_empleado`;
CREATE TABLE `movimiento_empleado`  (
  `id_movimiento_empleado` int(8) NOT NULL AUTO_INCREMENT,
  `operacion` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fecha` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `estado` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fk_empleado` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_movimiento_empleado`) USING BTREE,
  INDEX `fk_movimiento_empleado_empleado_1`(`fk_empleado`) USING BTREE,
  CONSTRAINT `fk_movimiento_empleado_empleado_1` FOREIGN KEY (`fk_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of movimiento_empleado
-- ----------------------------
INSERT INTO `movimiento_empleado` VALUES (1, 'INSERT', '2017-09-08 12:30:34', '1', 114);
INSERT INTO `movimiento_empleado` VALUES (2, 'UPDATE', '2017-09-08 12:30:51', '1', 114);
INSERT INTO `movimiento_empleado` VALUES (3, 'INSERT', '2017-09-26 15:55:11', '1', 115);
INSERT INTO `movimiento_empleado` VALUES (4, 'INSERT', '2017-09-26 16:20:51', '1', 116);
INSERT INTO `movimiento_empleado` VALUES (5, 'INSERT', '2017-09-26 16:26:19', '1', 117);
INSERT INTO `movimiento_empleado` VALUES (6, 'INSERT', '2017-09-26 16:36:59', '1', 118);
INSERT INTO `movimiento_empleado` VALUES (7, 'UPDATE', '2018-10-03 11:50:42', '1', 49);
INSERT INTO `movimiento_empleado` VALUES (8, 'UPDATE', '2018-11-15 12:52:03', '1', 44);
INSERT INTO `movimiento_empleado` VALUES (9, 'UPDATE', '2018-12-14 10:30:12', '1', 49);
INSERT INTO `movimiento_empleado` VALUES (10, 'UPDATE', '2018-12-18 10:40:39', '1', 53);

-- ----------------------------
-- Table structure for permiso
-- ----------------------------
DROP TABLE IF EXISTS `permiso`;
CREATE TABLE `permiso`  (
  `id_permiso` int(8) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `permisos` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `fecha` date NULL DEFAULT NULL,
  `estado` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_permiso`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of permiso
-- ----------------------------
INSERT INTO `permiso` VALUES (1, 'Administrador', 'a:35:{s:10:\"vDashboard\";s:1:\"1\";s:9:\"vEmpleado\";s:1:\"1\";s:9:\"aEmpleado\";s:1:\"1\";s:9:\"eEmpleado\";s:1:\"1\";s:9:\"dEmpleado\";s:1:\"1\";s:11:\"vVacaciones\";s:1:\"1\";s:11:\"aVacaciones\";s:1:\"1\";s:11:\"eVacaciones\";s:1:\"1\";s:11:\"dVacaciones\";s:1:\"1\";s:14:\"vLecAprendidas\";s:1:\"1\";s:14:\"aLecAprendidas\";s:1:\"1\";s:14:\"eLecAprendidas\";s:1:\"1\";s:14:\"dLecAprendidas\";s:1:\"1\";s:17:\"vPresupuestoAnual\";s:1:\"1\";s:17:\"aPresupuestoAnual\";s:1:\"1\";s:17:\"ePresupuestoAnual\";s:1:\"1\";s:17:\"dPresupuestoAnual\";s:1:\"1\";s:8:\"vDemanda\";s:1:\"1\";s:8:\"aDemanda\";s:1:\"1\";s:8:\"eDemanda\";s:1:\"1\";s:15:\"eDemandaDominio\";s:1:\"1\";s:8:\"dDemanda\";s:1:\"1\";s:19:\"vReporteComparativo\";s:1:\"1\";s:19:\"vSeguimientoDemanda\";s:1:\"1\";s:21:\"vResultadosEconomicos\";s:1:\"1\";s:9:\"mDominios\";s:1:\"1\";s:6:\"mRoles\";s:1:\"1\";s:11:\"mCategorias\";s:1:\"1\";s:21:\"mInstitucionEducativa\";s:1:\"1\";s:12:\"mTecnologias\";s:1:\"1\";s:10:\"mEtiquetas\";s:1:\"1\";s:9:\"mClientes\";s:1:\"1\";s:8:\"cUsuario\";s:1:\"1\";s:8:\"cPermiso\";s:1:\"1\";s:7:\"cBackup\";s:1:\"1\";}', '2017-08-25', '1');
INSERT INTO `permiso` VALUES (2, 'Jefe de Produccion', 'a:35:{s:10:\"vDashboard\";s:1:\"1\";s:9:\"vEmpleado\";s:1:\"1\";s:9:\"aEmpleado\";s:1:\"1\";s:9:\"eEmpleado\";s:1:\"1\";s:9:\"dEmpleado\";s:1:\"1\";s:11:\"vVacaciones\";s:1:\"1\";s:11:\"aVacaciones\";s:1:\"1\";s:11:\"eVacaciones\";s:1:\"1\";s:11:\"dVacaciones\";s:1:\"1\";s:14:\"vLecAprendidas\";s:1:\"1\";s:14:\"aLecAprendidas\";s:1:\"1\";s:14:\"eLecAprendidas\";s:1:\"1\";s:14:\"dLecAprendidas\";s:1:\"1\";s:17:\"vPresupuestoAnual\";s:1:\"1\";s:17:\"aPresupuestoAnual\";s:1:\"1\";s:17:\"ePresupuestoAnual\";s:1:\"1\";s:17:\"dPresupuestoAnual\";s:1:\"1\";s:8:\"vDemanda\";s:1:\"1\";s:8:\"aDemanda\";s:1:\"1\";s:8:\"eDemanda\";s:1:\"1\";s:15:\"eDemandaDominio\";s:1:\"1\";s:8:\"dDemanda\";s:1:\"1\";s:19:\"vReporteComparativo\";s:1:\"1\";s:19:\"vSeguimientoDemanda\";s:1:\"1\";s:21:\"vResultadosEconomicos\";s:1:\"1\";s:9:\"mDominios\";s:1:\"1\";s:6:\"mRoles\";s:1:\"1\";s:11:\"mCategorias\";s:1:\"1\";s:21:\"mInstitucionEducativa\";s:1:\"1\";s:12:\"mTecnologias\";s:1:\"1\";s:10:\"mEtiquetas\";s:1:\"1\";s:9:\"mClientes\";s:1:\"1\";s:8:\"cUsuario\";b:0;s:8:\"cPermiso\";b:0;s:7:\"cBackup\";b:0;}', '2017-08-25', '1');
INSERT INTO `permiso` VALUES (3, 'Lider de Dominio', 'a:35:{s:10:\"vDashboard\";b:0;s:9:\"vEmpleado\";s:1:\"1\";s:9:\"aEmpleado\";b:0;s:9:\"eEmpleado\";b:0;s:9:\"dEmpleado\";b:0;s:11:\"vVacaciones\";s:1:\"1\";s:11:\"aVacaciones\";s:1:\"1\";s:11:\"eVacaciones\";s:1:\"1\";s:11:\"dVacaciones\";b:0;s:14:\"vLecAprendidas\";s:1:\"1\";s:14:\"aLecAprendidas\";s:1:\"1\";s:14:\"eLecAprendidas\";s:1:\"1\";s:14:\"dLecAprendidas\";s:1:\"1\";s:17:\"vPresupuestoAnual\";b:0;s:17:\"aPresupuestoAnual\";b:0;s:17:\"ePresupuestoAnual\";b:0;s:17:\"dPresupuestoAnual\";b:0;s:8:\"vDemanda\";s:1:\"1\";s:8:\"aDemanda\";b:0;s:8:\"eDemanda\";b:0;s:15:\"eDemandaDominio\";s:1:\"1\";s:8:\"dDemanda\";b:0;s:19:\"vReporteComparativo\";b:0;s:19:\"vSeguimientoDemanda\";b:0;s:21:\"vResultadosEconomicos\";b:0;s:9:\"mDominios\";b:0;s:6:\"mRoles\";b:0;s:11:\"mCategorias\";b:0;s:21:\"mInstitucionEducativa\";b:0;s:12:\"mTecnologias\";s:1:\"1\";s:10:\"mEtiquetas\";s:1:\"1\";s:9:\"mClientes\";b:0;s:8:\"cUsuario\";b:0;s:8:\"cPermiso\";b:0;s:7:\"cBackup\";b:0;}', '2017-08-25', '1');
INSERT INTO `permiso` VALUES (4, 'People', 'a:35:{s:10:\"vDashboard\";b:0;s:9:\"vEmpleado\";s:1:\"1\";s:9:\"aEmpleado\";s:1:\"1\";s:9:\"eEmpleado\";s:1:\"1\";s:9:\"dEmpleado\";s:1:\"1\";s:11:\"vVacaciones\";s:1:\"1\";s:11:\"aVacaciones\";s:1:\"1\";s:11:\"eVacaciones\";s:1:\"1\";s:11:\"dVacaciones\";b:0;s:14:\"vLecAprendidas\";s:1:\"1\";s:14:\"aLecAprendidas\";s:1:\"1\";s:14:\"eLecAprendidas\";s:1:\"1\";s:14:\"dLecAprendidas\";s:1:\"1\";s:17:\"vPresupuestoAnual\";b:0;s:17:\"aPresupuestoAnual\";b:0;s:17:\"ePresupuestoAnual\";b:0;s:17:\"dPresupuestoAnual\";b:0;s:8:\"vDemanda\";b:0;s:8:\"aDemanda\";b:0;s:8:\"eDemanda\";b:0;s:15:\"eDemandaDominio\";b:0;s:8:\"dDemanda\";b:0;s:19:\"vReporteComparativo\";b:0;s:19:\"vSeguimientoDemanda\";b:0;s:21:\"vResultadosEconomicos\";b:0;s:9:\"mDominios\";b:0;s:6:\"mRoles\";s:1:\"1\";s:11:\"mCategorias\";s:1:\"1\";s:21:\"mInstitucionEducativa\";s:1:\"1\";s:12:\"mTecnologias\";s:1:\"1\";s:10:\"mEtiquetas\";s:1:\"1\";s:9:\"mClientes\";b:0;s:8:\"cUsuario\";b:0;s:8:\"cPermiso\";b:0;s:7:\"cBackup\";b:0;}', '2017-08-25', '1');
INSERT INTO `permiso` VALUES (5, 'Representante de Cliente', 'a:35:{s:10:\"vDashboard\";s:1:\"1\";s:9:\"vEmpleado\";s:1:\"1\";s:9:\"aEmpleado\";b:0;s:9:\"eEmpleado\";b:0;s:9:\"dEmpleado\";b:0;s:11:\"vVacaciones\";s:1:\"1\";s:11:\"aVacaciones\";b:0;s:11:\"eVacaciones\";b:0;s:11:\"dVacaciones\";b:0;s:14:\"vLecAprendidas\";s:1:\"1\";s:14:\"aLecAprendidas\";s:1:\"1\";s:14:\"eLecAprendidas\";s:1:\"1\";s:14:\"dLecAprendidas\";s:1:\"1\";s:17:\"vPresupuestoAnual\";b:0;s:17:\"aPresupuestoAnual\";b:0;s:17:\"ePresupuestoAnual\";b:0;s:17:\"dPresupuestoAnual\";b:0;s:8:\"vDemanda\";s:1:\"1\";s:8:\"aDemanda\";b:0;s:8:\"eDemanda\";b:0;s:15:\"eDemandaDominio\";s:1:\"1\";s:8:\"dDemanda\";b:0;s:19:\"vReporteComparativo\";b:0;s:19:\"vSeguimientoDemanda\";b:0;s:21:\"vResultadosEconomicos\";b:0;s:9:\"mDominios\";s:1:\"1\";s:6:\"mRoles\";b:0;s:11:\"mCategorias\";s:1:\"1\";s:21:\"mInstitucionEducativa\";b:0;s:12:\"mTecnologias\";s:1:\"1\";s:10:\"mEtiquetas\";s:1:\"1\";s:9:\"mClientes\";s:1:\"1\";s:8:\"cUsuario\";b:0;s:8:\"cPermiso\";b:0;s:7:\"cBackup\";b:0;}', '2017-08-25', '1');

-- ----------------------------
-- Table structure for prevision
-- ----------------------------
DROP TABLE IF EXISTS `prevision`;
CREATE TABLE `prevision`  (
  `id_prevision` int(8) NOT NULL AUTO_INCREMENT,
  `mes_anio` date NULL DEFAULT NULL,
  `nro_dias` int(2) NULL DEFAULT NULL,
  `flag_bloqueo` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fecha` date NULL DEFAULT NULL,
  `descripcion` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `estado` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_prevision`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of prevision
-- ----------------------------
INSERT INTO `prevision` VALUES (2, '2017-07-01', 20, '0', '2017-07-26', 'Previsión del mes de Julio 2017.', '1');
INSERT INTO `prevision` VALUES (4, '2017-08-01', 22, '0', '2017-08-25', 'Previsión - Demanda Agosto 2017', '1');
INSERT INTO `prevision` VALUES (5, '2017-09-01', 21, '0', '2017-09-26', 'Previsión - Demanda Mes de Setiembre', '1');

-- ----------------------------
-- Table structure for prevision_dominio
-- ----------------------------
DROP TABLE IF EXISTS `prevision_dominio`;
CREATE TABLE `prevision_dominio`  (
  `id_prevision_dominio` int(8) NOT NULL AUTO_INCREMENT,
  `nro_empleados` int(8) NULL DEFAULT NULL,
  `nro_vacaciones` decimal(8, 2) NULL DEFAULT NULL,
  `hrs_disponibles` decimal(8, 2) NULL DEFAULT NULL,
  `hrs_solutions` decimal(8, 2) NULL DEFAULT NULL,
  `flag_bloqueo` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fecha` date NULL DEFAULT NULL,
  `descripcion` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `estado` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fk_dominio` int(8) NULL DEFAULT NULL,
  `fk_prevision` int(8) NULL DEFAULT NULL,
  PRIMARY KEY (`id_prevision_dominio`) USING BTREE,
  INDEX `fk_prevision_dominio_dominio_1`(`fk_dominio`) USING BTREE,
  INDEX `fk_prevision_dominio_prevision_1`(`fk_prevision`) USING BTREE,
  CONSTRAINT `fk_prevision_dominio_dominio_1` FOREIGN KEY (`fk_dominio`) REFERENCES `dominio` (`id_dominio`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_prevision_dominio_prevision_1` FOREIGN KEY (`fk_prevision`) REFERENCES `prevision` (`id_prevision`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 91 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of prevision_dominio
-- ----------------------------
INSERT INTO `prevision_dominio` VALUES (2, 1, 45.00, 135.00, 135.00, NULL, '2017-07-26', '', '1', 1, 2);
INSERT INTO `prevision_dominio` VALUES (3, 1, 0.00, 180.00, 180.00, NULL, '2017-07-26', 'Aceleradora Mobile.', '1', 2, 2);
INSERT INTO `prevision_dominio` VALUES (4, 1, 0.00, 180.00, 180.00, NULL, '2017-07-26', '', '1', 3, 2);
INSERT INTO `prevision_dominio` VALUES (5, 2, 0.00, 360.00, 336.00, NULL, '2017-07-26', '', '1', 4, 2);
INSERT INTO `prevision_dominio` VALUES (6, 3, 0.00, 540.00, 504.00, NULL, '2017-07-26', '', '1', 5, 2);
INSERT INTO `prevision_dominio` VALUES (7, 3, 0.00, 540.00, 540.00, NULL, '2017-07-26', '', '1', 6, 2);
INSERT INTO `prevision_dominio` VALUES (8, 5, 54.00, 846.00, 900.00, NULL, '2017-07-26', '', '1', 7, 2);
INSERT INTO `prevision_dominio` VALUES (9, 2, 0.00, 360.00, 336.00, NULL, '2017-07-26', '', '1', 8, 2);
INSERT INTO `prevision_dominio` VALUES (10, 14, 45.00, 2475.00, 2340.00, NULL, '2017-07-26', '', '1', 9, 2);
INSERT INTO `prevision_dominio` VALUES (11, 2, 0.00, 360.00, 336.00, NULL, '2017-07-26', '', '1', 10, 2);
INSERT INTO `prevision_dominio` VALUES (12, 4, 0.00, 720.00, 672.00, NULL, '2017-07-26', '', '1', 11, 2);
INSERT INTO `prevision_dominio` VALUES (13, 7, 45.00, 1215.00, 1260.00, NULL, '2017-07-26', '', '1', 12, 2);
INSERT INTO `prevision_dominio` VALUES (14, 2, 0.00, 360.00, 336.00, NULL, '2017-07-26', '', '1', 13, 2);
INSERT INTO `prevision_dominio` VALUES (15, 5, 0.00, 900.00, 840.00, NULL, '2017-07-26', '', '1', 14, 2);
INSERT INTO `prevision_dominio` VALUES (16, 3, 18.00, 522.00, 504.00, NULL, '2017-07-26', '', '1', 15, 2);
INSERT INTO `prevision_dominio` VALUES (17, 10, 0.00, 1800.00, 1260.00, NULL, '2017-07-26', '', '1', 16, 2);
INSERT INTO `prevision_dominio` VALUES (18, 2, 9.00, 351.00, 360.00, NULL, '2017-07-26', '', '1', 17, 2);
INSERT INTO `prevision_dominio` VALUES (19, 10, 54.00, 1746.00, 1680.00, NULL, '2017-07-26', '', '1', 18, 2);
INSERT INTO `prevision_dominio` VALUES (20, 9, 45.00, 1575.00, 1344.00, NULL, '2017-07-26', '', '1', 19, 2);
INSERT INTO `prevision_dominio` VALUES (21, 15, 99.00, 2601.00, 2325.00, NULL, '2017-07-26', '', '1', 20, 2);
INSERT INTO `prevision_dominio` VALUES (22, 6, 0.00, 1080.00, 500.00, NULL, '2017-07-26', 'Agregado en PROD.', '1', 21, 2);
INSERT INTO `prevision_dominio` VALUES (44, 1, 0.00, 198.00, 198.00, NULL, '2017-08-25', '', '1', 1, 4);
INSERT INTO `prevision_dominio` VALUES (45, 6, 0.00, 1188.00, 1089.00, NULL, '2017-08-25', '', '1', 2, 4);
INSERT INTO `prevision_dominio` VALUES (46, 1, 0.00, 198.00, 198.00, NULL, '2017-08-25', '', '1', 3, 4);
INSERT INTO `prevision_dominio` VALUES (47, 2, 0.00, 396.00, 396.00, NULL, '2017-08-25', '', '1', 4, 4);
INSERT INTO `prevision_dominio` VALUES (48, 3, 0.00, 594.00, 594.00, NULL, '2017-08-25', '', '1', 5, 4);
INSERT INTO `prevision_dominio` VALUES (49, 4, 0.00, 792.00, 594.00, NULL, '2017-08-25', '', '1', 6, 4);
INSERT INTO `prevision_dominio` VALUES (50, 5, 135.00, 855.00, 801.00, NULL, '2017-08-25', '', '1', 7, 4);
INSERT INTO `prevision_dominio` VALUES (51, 1, 0.00, 198.00, 198.00, NULL, '2017-08-25', '', '1', 8, 4);
INSERT INTO `prevision_dominio` VALUES (52, 15, 126.00, 2844.00, 2484.00, NULL, '2017-08-25', '', '1', 9, 4);
INSERT INTO `prevision_dominio` VALUES (53, 2, 0.00, 396.00, 396.00, NULL, '2017-08-25', '', '1', 10, 4);
INSERT INTO `prevision_dominio` VALUES (54, 4, 72.00, 720.00, 792.00, NULL, '2017-08-25', '', '1', 11, 4);
INSERT INTO `prevision_dominio` VALUES (55, 7, 81.00, 1305.00, 1386.00, NULL, '2017-08-25', '', '1', 12, 4);
INSERT INTO `prevision_dominio` VALUES (56, 2, 0.00, 396.00, 396.00, NULL, '2017-08-25', '', '1', 13, 4);
INSERT INTO `prevision_dominio` VALUES (57, 4, 0.00, 792.00, 792.00, NULL, '2017-08-25', '', '1', 14, 4);
INSERT INTO `prevision_dominio` VALUES (58, 2, 63.00, 333.00, 396.00, NULL, '2017-08-25', '', '1', 15, 4);
INSERT INTO `prevision_dominio` VALUES (59, 11, 0.00, 2178.00, 1512.00, NULL, '2017-08-25', '', '1', 16, 4);
INSERT INTO `prevision_dominio` VALUES (60, 2, 45.00, 351.00, 396.00, NULL, '2017-08-25', '', '1', 17, 4);
INSERT INTO `prevision_dominio` VALUES (61, 11, 117.00, 2061.00, 2376.00, NULL, '2017-08-25', '', '1', 18, 4);
INSERT INTO `prevision_dominio` VALUES (62, 9, 27.00, 1755.00, 733.00, NULL, '2017-08-25', '', '1', 19, 4);
INSERT INTO `prevision_dominio` VALUES (63, 13, 261.00, 2313.00, 2268.00, NULL, '2017-08-25', '', '1', 20, 4);
INSERT INTO `prevision_dominio` VALUES (64, 1, 0.00, 198.00, 198.00, NULL, '2017-08-25', '', '1', 21, 4);
INSERT INTO `prevision_dominio` VALUES (65, 6, 0.00, 1188.00, 0.00, NULL, '2017-08-25', '', '1', 22, 4);
INSERT INTO `prevision_dominio` VALUES (66, 1, 0.00, 198.00, 198.00, NULL, '2017-08-25', '', '1', 23, 4);
INSERT INTO `prevision_dominio` VALUES (67, 1, 0.00, 189.00, 187.00, NULL, '2017-09-26', '', '1', 1, 5);
INSERT INTO `prevision_dominio` VALUES (68, 6, 0.00, 1134.00, 1040.00, NULL, '2017-09-26', '', '1', 2, 5);
INSERT INTO `prevision_dominio` VALUES (69, 2, 54.00, 324.00, 189.00, NULL, '2017-09-26', '', '1', 3, 5);
INSERT INTO `prevision_dominio` VALUES (70, 3, 36.00, 531.00, 567.00, NULL, '2017-09-26', '', '1', 4, 5);
INSERT INTO `prevision_dominio` VALUES (71, 3, 45.00, 522.00, 567.00, NULL, '2017-09-26', '', '1', 5, 5);
INSERT INTO `prevision_dominio` VALUES (72, 5, 0.00, 945.00, 567.00, NULL, '2017-09-26', '', '1', 6, 5);
INSERT INTO `prevision_dominio` VALUES (73, 6, 108.00, 1026.00, 837.00, NULL, '2017-09-26', '', '1', 7, 5);
INSERT INTO `prevision_dominio` VALUES (74, 1, 0.00, 189.00, 189.00, NULL, '2017-09-26', '', '1', 8, 5);
INSERT INTO `prevision_dominio` VALUES (75, 9, 45.00, 1656.00, 1656.00, NULL, '2017-09-26', '', '1', 9, 5);
INSERT INTO `prevision_dominio` VALUES (76, 2, 27.00, 351.00, 378.00, NULL, '2017-09-26', '', '1', 10, 5);
INSERT INTO `prevision_dominio` VALUES (77, 5, 90.00, 855.00, 756.00, NULL, '2017-09-26', '', '1', 11, 5);
INSERT INTO `prevision_dominio` VALUES (78, 6, 90.00, 1044.00, 945.00, NULL, '2017-09-26', '', '1', 12, 5);
INSERT INTO `prevision_dominio` VALUES (79, 3, 27.00, 540.00, 378.00, NULL, '2017-09-26', '', '1', 13, 5);
INSERT INTO `prevision_dominio` VALUES (80, 5, 63.00, 882.00, 756.00, NULL, '2017-09-26', '', '1', 14, 5);
INSERT INTO `prevision_dominio` VALUES (81, 2, 45.00, 333.00, 378.00, NULL, '2017-09-26', '', '1', 15, 5);
INSERT INTO `prevision_dominio` VALUES (82, 11, 0.00, 2079.00, 2079.00, NULL, '2017-09-26', '', '1', 16, 5);
INSERT INTO `prevision_dominio` VALUES (83, 0, 0.00, 0.00, 0.00, NULL, '2017-09-26', '', '1', 17, 5);
INSERT INTO `prevision_dominio` VALUES (84, 12, 90.00, 2178.00, 1890.00, NULL, '2017-09-26', '', '1', 18, 5);
INSERT INTO `prevision_dominio` VALUES (85, 11, 126.00, 1953.00, 1124.00, NULL, '2017-09-26', '', '1', 19, 5);
INSERT INTO `prevision_dominio` VALUES (86, 15, 189.00, 2646.00, 2240.00, NULL, '2017-09-26', '', '1', 20, 5);
INSERT INTO `prevision_dominio` VALUES (87, 1, 0.00, 189.00, 189.00, NULL, '2017-09-26', '', '1', 21, 5);
INSERT INTO `prevision_dominio` VALUES (88, 7, 0.00, 1323.00, 0.00, NULL, '2017-09-26', '', '1', 22, 5);
INSERT INTO `prevision_dominio` VALUES (89, 1, 0.00, 189.00, 189.00, NULL, '2017-09-26', '', '1', 23, 5);
INSERT INTO `prevision_dominio` VALUES (90, 1, 0.00, 189.00, 126.00, NULL, '2017-09-26', '', '1', 25, 5);

-- ----------------------------
-- Table structure for rol
-- ----------------------------
DROP TABLE IF EXISTS `rol`;
CREATE TABLE `rol`  (
  `id_rol` int(8) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `descripcion` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `fecha` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `estado` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_rol`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of rol
-- ----------------------------
INSERT INTO `rol` VALUES (1, 'Analista / Programador', 'Analista / Programador', '2017-07-05 00:00:00', '1');
INSERT INTO `rol` VALUES (2, 'Programador', 'Programador', '2017-08-03 10:39:35', '1');
INSERT INTO `rol` VALUES (3, 'Estructura', 'Estructura', '2017-07-05 00:00:00', '1');
INSERT INTO `rol` VALUES (4, 'Analista', 'Analista', '2017-07-05 00:00:00', '1');
INSERT INTO `rol` VALUES (5, 'Supervisor', 'Supervisor', '2017-07-05 00:00:00', '1');

-- ----------------------------
-- Table structure for seguimiento
-- ----------------------------
DROP TABLE IF EXISTS `seguimiento`;
CREATE TABLE `seguimiento`  (
  `id_seguimiento` int(8) NOT NULL AUTO_INCREMENT,
  `fecha_corte` date NULL DEFAULT NULL,
  `nro_dias_corte` int(2) NULL DEFAULT NULL,
  `flag_bloqueo` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fecha` date NULL DEFAULT NULL,
  `descripcion` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `estado` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fk_prevision` int(8) NOT NULL,
  PRIMARY KEY (`id_seguimiento`) USING BTREE,
  INDEX `fk_seguimiento_prevision_1`(`fk_prevision`) USING BTREE,
  CONSTRAINT `fk_seguimiento_prevision_1` FOREIGN KEY (`fk_prevision`) REFERENCES `prevision` (`id_prevision`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of seguimiento
-- ----------------------------
INSERT INTO `seguimiento` VALUES (1, '2017-07-07', 5, '1', '2017-07-18', 'Seguimiento demanda al 07.07', '1', 2);
INSERT INTO `seguimiento` VALUES (2, '2017-07-14', 10, '1', '2017-07-18', 'Seguimiento al 14.07', '1', 2);
INSERT INTO `seguimiento` VALUES (3, '2017-07-21', 15, '1', '2017-07-18', 'Seguimiento al 21.07', '1', 2);
INSERT INTO `seguimiento` VALUES (4, '2017-07-27', 19, '0', '2017-07-25', 'Seguimiento al 27.07', '1', 2);
INSERT INTO `seguimiento` VALUES (5, '2017-07-31', 20, '0', '2017-07-25', 'Seguimiento al 31.07', '1', 2);
INSERT INTO `seguimiento` VALUES (8, '2017-09-22', 16, NULL, '2017-09-26', 'Seguimiento de Demanda al 22.09.2017', '1', 5);
INSERT INTO `seguimiento` VALUES (10, '2017-09-29', NULL, NULL, '2017-09-28', NULL, '1', 5);
INSERT INTO `seguimiento` VALUES (11, '2017-09-29', 21, NULL, '2017-09-28', 'Avance de Seguimiento de Demanda al 29.09.2017', '1', 5);

-- ----------------------------
-- Table structure for seguimiento_prevision
-- ----------------------------
DROP TABLE IF EXISTS `seguimiento_prevision`;
CREATE TABLE `seguimiento_prevision`  (
  `id_seguimiento_prevision` int(8) NOT NULL AUTO_INCREMENT,
  `nro_empleados` int(8) NULL DEFAULT NULL,
  `nro_vacaciones` decimal(8, 2) NULL DEFAULT NULL,
  `hrs_disponibles` decimal(8, 2) NULL DEFAULT NULL,
  `hrs_solutions` decimal(8, 2) NULL DEFAULT NULL,
  `hrs_plan_meta` decimal(8, 2) NULL DEFAULT NULL,
  `hrs_plan_real` decimal(8, 2) NULL DEFAULT NULL,
  `hrs_plan_porcentaje` decimal(8, 2) NULL DEFAULT NULL,
  `hrs_ejec_meta` decimal(8, 2) NULL DEFAULT NULL,
  `hrs_ejec_real` decimal(8, 2) NULL DEFAULT NULL,
  `hrs_ejec_porcentaje` decimal(8, 2) NULL DEFAULT NULL,
  `flag_bloqueo` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `estado_delivery` int(8) NULL DEFAULT NULL COMMENT 'Estado dlvry : numerico (1 al 5) : Indicadores ',
  `demanda` int(8) NULL DEFAULT NULL COMMENT 'Demanda ( numerico 1 al 5 ) : Indicadores ',
  `descripcion` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `comentario` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `facturabilidad` decimal(8, 2) NULL DEFAULT NULL COMMENT '24.- Facturabilidad',
  `ocupabilidad` decimal(8, 2) NULL DEFAULT NULL COMMENT '10.- Ocupabilidad confirmada  ',
  `incurridos_validados` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'Flag de Validacion de Incurridos',
  `no_conformidades` int(8) NULL DEFAULT NULL COMMENT 'Numero de No conformidades (ej : 5) ',
  `inc_internas` int(8) NULL DEFAULT NULL COMMENT 'Nro de Incidencias Internas (ej : 8)',
  `inc_externas` int(8) NULL DEFAULT NULL COMMENT 'Nro de Incidencias Externas (ej : 8)',
  `eliminado` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'Eliminado : 1 : Si, 0 : No',
  `fchRg` timestamp(0) NULL DEFAULT NULL COMMENT 'Fecha de registro del registro en BD.',
  `fchAc` timestamp(0) NULL DEFAULT NULL COMMENT 'Fecha de actuallizacion del registro en BD.',
  `usrId` int(8) NULL DEFAULT NULL COMMENT 'FK Usuario Modificacion/Creacion/Eliminacion',
  `ipAdd` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'Ip Address	',
  `hosNm` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'HostName',
  `fk_seguimiento` int(8) NULL DEFAULT NULL,
  `fk_prevision_dominio` int(8) NULL DEFAULT NULL,
  PRIMARY KEY (`id_seguimiento_prevision`) USING BTREE,
  INDEX `fk_seguimiento_prevision_prevision_dominio_1`(`fk_prevision_dominio`) USING BTREE,
  INDEX `fk_seguimiento_prevision_seguimiento_1`(`fk_seguimiento`) USING BTREE,
  CONSTRAINT `fk_seguimiento_prevision_prevision_dominio_1` FOREIGN KEY (`fk_prevision_dominio`) REFERENCES `prevision_dominio` (`id_prevision_dominio`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_seguimiento_prevision_seguimiento_1` FOREIGN KEY (`fk_seguimiento`) REFERENCES `seguimiento` (`id_seguimiento`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 290 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of seguimiento_prevision
-- ----------------------------
INSERT INTO `seguimiento_prevision` VALUES (1, 1, 45.00, 135.00, 135.00, 27.00, 45.00, 33.00, 45.00, 45.00, 0.00, '1', NULL, NULL, NULL, 'Se viene trabajando con normalidad en Citrix en entorno de desarrollo, con 30 horas en petici&oacute;n y 15 horas en disponibilidad cliente', NULL, NULL, NULL, 0, 0, 0, '0', '2017-07-07 20:34:37', '2017-08-01 13:58:29', 2, '10.232.101.217', 'LIM-GQHPF72', 1, 2);
INSERT INTO `seguimiento_prevision` VALUES (2, 1, 0.00, 180.00, 180.00, 16.00, 63.00, 35.00, 36.00, 36.00, 0.00, '1', NULL, NULL, NULL, 'Se inicia con el servicio. El avance va de acuerdo a lo planificado.', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-07 20:34:37', '2017-08-01 13:58:29', 2, '10.232.101.217', 'LIM-GQHPF72', 1, 3);
INSERT INTO `seguimiento_prevision` VALUES (3, 1, 0.00, 180.00, 180.00, 45.00, 168.00, 93.00, 45.00, 45.00, 0.00, '1', NULL, NULL, NULL, 'Se realiza atenciones de an&aacute;lisis y evaluaciones de impacto de mediana complejidad por cambios en estructuras y Query\'s de alta complejidad. Se informa a Solutions la VDI a utilizar para que se pueda enviar mayor demanda con requerimientos de desarrollo.', NULL, NULL, NULL, 0, 0, 0, '0', '2017-07-07 20:34:37', '2017-08-01 13:58:29', 2, '10.232.101.217', 'LIM-GQHPF72', 1, 4);
INSERT INTO `seguimiento_prevision` VALUES (4, 2, 0.00, 360.00, 336.00, 84.00, 504.00, 150.00, 90.00, 90.00, 0.00, '1', NULL, NULL, NULL, 'Debido a que la demanda supera las horas estimadas se va repartir en los dominios de Portal, e IPB seg&uacute;n corresponda. De Momento se adicionan 20 Horas al dominio de Portal las cuales son de CS-JAVA.', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-07 20:34:37', '2017-08-01 13:58:29', 2, '10.232.101.217', 'LIM-GQHPF72', 1, 5);
INSERT INTO `seguimiento_prevision` VALUES (5, 3, 0.00, 540.00, 504.00, 126.00, 504.00, 100.00, 135.00, 135.00, 0.00, '1', NULL, NULL, NULL, 'Se avanza de acuerdo a lo planificado.', NULL, NULL, '', 0, 0, 0, '0', '2017-07-07 20:34:37', '2017-08-01 13:58:29', 2, '10.232.101.217', 'LIM-GQHPF72', 1, 6);
INSERT INTO `seguimiento_prevision` VALUES (6, 3, 0.00, 540.00, 540.00, 108.00, 135.00, 25.00, 135.00, 135.00, 0.00, '1', NULL, NULL, NULL, 'Se viene trabajando seg&uacute;n lo planificado', NULL, NULL, NULL, 0, 0, 0, '0', '2017-07-07 20:34:37', '2017-08-01 13:58:29', 2, '10.232.101.217', 'LIM-GQHPF72', 1, 7);
INSERT INTO `seguimiento_prevision` VALUES (7, 5, 54.00, 846.00, 900.00, 180.00, 225.00, 25.00, 225.00, 225.00, 0.00, '1', NULL, NULL, NULL, 'Se viene trabajando seg&uacute;n lo planificado', NULL, NULL, NULL, 0, 0, 0, '0', '2017-07-07 20:34:37', '2017-08-01 13:58:29', 2, '10.232.101.217', 'LIM-GQHPF72', 1, 8);
INSERT INTO `seguimiento_prevision` VALUES (8, 2, 0.00, 360.00, 336.00, 84.00, 168.00, 50.00, 45.00, 45.00, 0.00, '1', NULL, NULL, NULL, 'Seg&uacute;n lo indicacdo por Solutions la demanda no va superar las 168 horas, por lo cual se van a suplir con horas en otros dominios.', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-07 20:34:37', '2017-08-01 13:58:29', 2, '10.232.101.217', 'LIM-GQHPF72', 1, 9);
INSERT INTO `seguimiento_prevision` VALUES (9, 14, 45.00, 2475.00, 2340.00, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-07 20:34:37', '2017-08-01 13:58:29', 2, '10.232.101.217', 'LIM-GQHPF72', 1, 10);
INSERT INTO `seguimiento_prevision` VALUES (10, 2, 0.00, 360.00, 336.00, 84.00, 168.00, 50.00, 35.00, 35.00, 0.00, '1', NULL, NULL, NULL, 'Seg&uacute;n lo indicacdo por Solutions la demanda no va superar las 168 horas, por lo cual se van a suplir con horas en otros dominios.', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-07 20:34:37', '2017-08-01 13:58:29', 2, '10.232.101.217', 'LIM-GQHPF72', 1, 11);
INSERT INTO `seguimiento_prevision` VALUES (11, 4, 0.00, 720.00, 672.00, 168.00, 814.00, 121.00, 198.00, 198.00, 0.00, '1', NULL, NULL, NULL, 'Esta semana se han realizado las planificaciones de la demanda confirmada por Solutions, llegando a cubrir la totalidad de los requerimientos enviados. Esta semana estamos avanzando de acuerdo a la planificaci&oacute;n informada. Se tiene una consulta bloqueante para el ST 68169, estamos a la espera de la conformidad de Yvania para creaci&oacute;n del buz&oacute;n de correo.', NULL, NULL, NULL, 0, 0, 0, '0', '2017-07-07 20:34:37', '2017-08-01 13:58:29', 2, '10.232.101.217', 'LIM-GQHPF72', 1, 12);
INSERT INTO `seguimiento_prevision` VALUES (12, 7, 45.00, 1215.00, 1260.00, 252.00, 315.00, 25.00, 315.00, 315.00, 0.00, '1', NULL, NULL, NULL, 'Se viene trabajando seg&uacute;n lo planificado', NULL, NULL, NULL, 0, 0, 0, '0', '2017-07-07 20:34:37', '2017-08-01 13:58:29', 2, '10.232.101.217', 'LIM-GQHPF72', 1, 13);
INSERT INTO `seguimiento_prevision` VALUES (13, 2, 0.00, 360.00, 336.00, 84.00, 336.00, 100.00, 93.00, 93.00, 0.00, '1', NULL, NULL, NULL, 'Se ejecuta seg&uacute;n lo planificado, se tienen 3 Hrs adicionales por gesti&oacute;n, esto coordinado con Solutions.', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-07 20:34:37', '2017-08-01 13:58:29', 2, '10.232.101.217', 'LIM-GQHPF72', 1, 14);
INSERT INTO `seguimiento_prevision` VALUES (14, 5, 0.00, 900.00, 840.00, 210.00, 326.00, 39.00, 169.00, 169.00, 0.00, '1', NULL, NULL, NULL, 'Esta semana se tienen 2 bajas m&eacute;dicas en el equipo por lo que se tiene una reorganizaci&oacute;n interna para no afectar la atenci&oacute;n de las activiades comprometidas. Las horas reales de Portal son 149 horas, m&aacute;s 20 adicionlaes de CS JAVA,  seg&uacute;n lo establecido con los l&iacute;deres de Solutions', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-07 20:34:37', '2017-08-01 13:58:29', 2, '10.232.101.217', 'LIM-GQHPF72', 1, 15);
INSERT INTO `seguimiento_prevision` VALUES (15, 3, 18.00, 522.00, 504.00, 126.00, 302.00, 60.00, 102.00, 102.00, 0.00, '1', NULL, NULL, NULL, 'La demanda fue enviada el d&iacute;a 06/07/2017', NULL, NULL, NULL, 0, 0, 0, '0', '2017-07-07 20:34:37', '2017-08-01 13:58:29', 2, '10.232.101.217', 'LIM-GQHPF72', 1, 16);
INSERT INTO `seguimiento_prevision` VALUES (16, 10, 0.00, 1800.00, 1260.00, 315.00, 18.00, 1.00, 18.00, 18.00, 0.00, '1', NULL, NULL, NULL, 'Demanda distribuida: Repsol=18hrs. Disponibilidad cliente 297 horas', NULL, NULL, NULL, 0, 0, 0, '0', '2017-07-07 20:34:37', '2017-08-01 13:58:29', 2, '10.232.101.217', 'LIM-GQHPF72', 1, 17);
INSERT INTO `seguimiento_prevision` VALUES (17, 2, 9.00, 351.00, 360.00, 72.00, 90.00, 25.00, 90.00, 90.00, 0.00, '1', NULL, NULL, NULL, 'Las 90 horas se han incurrido a Disponibilidad Cliente', NULL, NULL, NULL, 0, 0, 0, '0', '2017-07-07 20:34:37', '2017-08-01 13:58:29', 2, '10.232.101.217', 'LIM-GQHPF72', 1, 18);
INSERT INTO `seguimiento_prevision` VALUES (18, 10, 54.00, 1746.00, 1680.00, 420.00, 1680.00, 100.00, 428.00, 428.00, 0.00, '1', NULL, NULL, NULL, 'Se avanza de acuerdo a lo planificado.', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-07 20:34:37', '2017-08-01 13:58:29', 2, '10.232.101.217', 'LIM-GQHPF72', 1, 19);
INSERT INTO `seguimiento_prevision` VALUES (19, 9, 45.00, 1575.00, 1344.00, 336.00, 1217.00, 91.00, 405.00, 413.00, -2.00, '1', NULL, NULL, NULL, 'Existe 8 hrs adicionales ejecutadas, fuera de horario de trabajo, debido a compromisos de entrega por el requerimiento de SGML.', NULL, NULL, '', 0, 0, 0, '0', '2017-07-07 20:34:37', '2017-08-01 13:58:29', 2, '10.232.101.217', 'LIM-GQHPF72', 1, 20);
INSERT INTO `seguimiento_prevision` VALUES (20, 15, 99.00, 2601.00, 2325.00, 581.00, 2325.00, 173.00, 581.00, 625.00, -8.00, '1', NULL, NULL, NULL, 'Se tienen 44 Hrs como apoyo adicional por: Instalación de la aplicación Membresía consumos, atención de documentación, asesoría (Revisión de PAEs y seguimientos)', NULL, NULL, '', 0, 0, 0, '0', '2017-07-07 20:34:37', '2017-08-01 13:58:29', 2, '10.232.101.217', 'LIM-GQHPF72', 1, 21);
INSERT INTO `seguimiento_prevision` VALUES (21, 1, 45.00, 135.00, 135.00, 68.00, 90.00, 67.00, 90.00, 90.00, 0.00, '1', NULL, NULL, NULL, 'Se viene trabajando con normalidad en Citrix en entorno de desarrollo, con 60 horas en petici&oacute;n y 30 horas en disponibilidad cliente', NULL, NULL, '1', 0, 0, 0, '0', '2017-07-25 16:39:06', '2017-08-01 13:58:34', 2, '10.232.101.217', 'LIM-GQHPF72', 2, 2);
INSERT INTO `seguimiento_prevision` VALUES (22, 1, 0.00, 180.00, 180.00, 90.00, 180.00, 100.00, 90.00, 90.00, 0.00, '1', NULL, NULL, NULL, 'El avance va de acuerdo a lo planificado.', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-25 16:39:06', '2017-08-01 13:58:34', 2, '10.232.101.217', 'LIM-GQHPF72', 2, 3);
INSERT INTO `seguimiento_prevision` VALUES (23, 1, 0.00, 180.00, 180.00, 90.00, 168.00, 93.00, 90.00, 90.00, 0.00, '1', NULL, NULL, NULL, 'Se contin&uacute;a con la atenci&oacute;n de requerimientos de an&aacute;lisis de impacto de mediana complejidad. Se coordinan los accesos a la VDI informada, a&uacute;n en proceso.', NULL, NULL, '1', NULL, NULL, NULL, '0', '2017-07-25 16:39:06', '2017-08-01 13:58:34', 2, '10.232.101.217', 'LIM-GQHPF72', 2, 4);
INSERT INTO `seguimiento_prevision` VALUES (24, 2, 0.00, 360.00, 336.00, 168.00, 336.00, 100.00, 168.00, 168.00, 0.00, '1', NULL, NULL, NULL, 'Debido a que la demanda supera las horas estimadas se va repartir en los dominios de Portal, IPB y HB seg&uacute;n corresponda. Por lo cual se da un avance total para este dominio de 380 horas, las cuales se reparten 86 en HB, 86 en IPB y 40 en Portal.', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-25 16:39:06', '2017-08-01 13:58:34', 2, '10.232.101.217', 'LIM-GQHPF72', 2, 5);
INSERT INTO `seguimiento_prevision` VALUES (25, 3, 0.00, 540.00, 504.00, 252.00, 504.00, 100.00, 405.00, 405.00, 0.00, '1', NULL, NULL, NULL, 'Se avanza de acuerdo a lo planificado', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-25 16:39:06', '2017-08-01 13:58:34', 2, '10.232.101.217', 'LIM-GQHPF72', 2, 6);
INSERT INTO `seguimiento_prevision` VALUES (26, 3, 0.00, 540.00, 540.00, 54.00, 270.00, 50.00, 270.00, 270.00, 0.00, '1', NULL, NULL, NULL, 'Se viene trabajando seg&uacute;n lo planificado', NULL, NULL, '1', 0, 0, 0, '0', '2017-07-25 16:39:06', '2017-08-01 13:58:34', 2, '10.232.101.217', 'LIM-GQHPF72', 2, 7);
INSERT INTO `seguimiento_prevision` VALUES (27, 5, 54.00, 846.00, 900.00, 450.00, 450.00, 50.00, 450.00, 450.00, 0.00, '1', NULL, NULL, NULL, 'Se viene trabajando seg&uacute;n lo planificado', NULL, NULL, '1', 0, 5, 0, '0', '2017-07-25 16:39:06', '2017-08-01 13:58:34', 2, '10.232.101.217', 'LIM-GQHPF72', 2, 8);
INSERT INTO `seguimiento_prevision` VALUES (28, 2, 0.00, 360.00, 336.00, 168.00, 280.00, 83.00, 168.00, 168.00, 0.00, '1', NULL, NULL, NULL, 'Se Establece que al igual que Portal se va completar las horas con requerimientos de CS-JAVA con lo cual 82 horas son de HB y 86 de CS JAVA', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-25 16:39:06', '2017-08-01 13:58:34', 2, '10.232.101.217', 'LIM-GQHPF72', 2, 9);
INSERT INTO `seguimiento_prevision` VALUES (29, 14, 45.00, 2475.00, 2340.00, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-25 16:39:06', '2017-08-01 13:58:34', 2, '10.232.101.217', 'LIM-GQHPF72', 2, 10);
INSERT INTO `seguimiento_prevision` VALUES (30, 2, 0.00, 360.00, 336.00, 168.00, 280.00, 83.00, 168.00, 168.00, 0.00, '1', NULL, NULL, NULL, 'Se Establece que al igual que Portal se va completar las horas con requerimientos de CS-JAVA con lo cual 82 horas son de IPB y 86 de CS JAVA', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-25 16:39:06', '2017-08-01 13:58:34', 2, '10.232.101.217', 'LIM-GQHPF72', 2, 11);
INSERT INTO `seguimiento_prevision` VALUES (31, 4, 0.00, 720.00, 672.00, 336.00, 861.00, 128.00, 389.00, 389.00, 0.00, '1', NULL, NULL, NULL, 'Se avanza de acuerdo a lo planificado. Se tiene que el requerimiento ST000087923 ha sido asignado a un analista de Solutions, se retira del control de demanda', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-25 16:39:06', '2017-08-01 13:58:34', 2, '10.232.101.217', 'LIM-GQHPF72', 2, 12);
INSERT INTO `seguimiento_prevision` VALUES (32, 7, 45.00, 1215.00, 1260.00, 126.00, 630.00, 50.00, 630.00, 630.00, 0.00, '1', NULL, NULL, NULL, 'Se viene trabajando seg&uacute;n lo planificado', NULL, NULL, '1', 0, 0, 0, '0', '2017-07-25 16:39:06', '2017-08-01 13:58:34', 2, '10.232.101.217', 'LIM-GQHPF72', 2, 13);
INSERT INTO `seguimiento_prevision` VALUES (33, 2, 0.00, 360.00, 336.00, 168.00, 336.00, 100.00, 186.00, 186.00, 0.00, '1', NULL, NULL, NULL, 'Se ejecuta seg&uacute;n lo planificado las 6 horas adicionales se deben a las horas de gesti&oacute;n coordinadas con Solutions.', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-25 16:39:06', '2017-08-01 13:58:34', 2, '10.232.101.217', 'LIM-GQHPF72', 2, 14);
INSERT INTO `seguimiento_prevision` VALUES (34, 5, 0.00, 900.00, 840.00, 420.00, 462.00, 55.00, 430.00, 430.00, 0.00, '1', NULL, NULL, NULL, 'Se acuerda con los l&iacute;deres de Solutions que las horas de CS se van a distribuir entre los dominios JAVA, con lo cual para PORTAL las horas de requerimientos son 390 Hrs y se completa 40 horas de CS-JAVA. ', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-25 16:39:06', '2017-08-01 13:58:34', 2, '10.232.101.217', 'LIM-GQHPF72', 2, 15);
INSERT INTO `seguimiento_prevision` VALUES (35, 3, 18.00, 522.00, 504.00, 50.40, 433.00, 86.00, 272.50, 272.50, 0.00, '1', NULL, NULL, NULL, 'se continua con la ejecuci&oacute;n de los requerimientos enviados por el cliente con normalidad.', NULL, NULL, NULL, 1, 1, NULL, '0', '2017-07-25 16:39:06', '2017-08-01 13:58:34', 2, '10.232.101.217', 'LIM-GQHPF72', 2, 16);
INSERT INTO `seguimiento_prevision` VALUES (36, 10, 0.00, 1800.00, 1260.00, 1260.00, 102.00, 8.00, 23.00, 23.00, 0.00, '1', NULL, NULL, NULL, 'Demanda distribuida: Repsol=102hrs. Disponibilidad cliente 528 horas. La demanda llego el viernes 14.07', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-25 16:39:06', '2017-08-01 13:58:34', 2, '10.232.101.217', 'LIM-GQHPF72', 2, 17);
INSERT INTO `seguimiento_prevision` VALUES (37, 2, 9.00, 351.00, 360.00, 180.00, 180.00, 50.00, 180.00, 180.00, 0.00, '1', NULL, NULL, NULL, 'Las 130 horas se han incurrido a Disponibilidad Cliente y 50 en Peticion de Tareas', NULL, NULL, '1', 0, 0, 0, '0', '2017-07-25 16:39:06', '2017-08-01 13:58:34', 2, '10.232.101.217', 'LIM-GQHPF72', 2, 18);
INSERT INTO `seguimiento_prevision` VALUES (38, 10, 54.00, 1746.00, 1680.00, 840.00, 1230.00, 73.00, 874.00, 874.00, 0.00, '1', NULL, NULL, NULL, 'se ha tenido 22 horas de indisponibilidad de un colaborador por enfermedad, + 4 horas de uso de cupon de tiempo libre de 1 colaborador', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-25 16:39:06', '2017-08-01 13:58:34', 2, '10.232.101.217', 'LIM-GQHPF72', 2, 19);
INSERT INTO `seguimiento_prevision` VALUES (39, 9, 45.00, 1575.00, 1344.00, 672.00, 1191.00, 89.00, 640.00, 640.00, 0.00, '1', NULL, NULL, NULL, 'Se avanza de acuerdo a lo planificado. Se realiza un ajuste de 158 horas a favor de Solutions por correcciones a los desarrollos.', NULL, NULL, '1', NULL, NULL, NULL, '0', '2017-07-25 16:39:06', '2017-08-01 13:58:34', 2, '10.232.101.217', 'LIM-GQHPF72', 2, 20);
INSERT INTO `seguimiento_prevision` VALUES (40, 15, 99.00, 2601.00, 2325.00, 1163.00, 2325.00, 100.00, 1162.00, 1103.00, 5.00, '1', NULL, NULL, NULL, 'Se realizaron algunos ajustes de horas de documentaci&oacute;n observadas por Solutions. Se tiene un retraso en un Soporte y aplicaci&oacute;n en interacci&oacute;n con EXTRA, la diferencia de horas ser&aacute; regularizado esta semana. Para la aplicaci&oacute;n de AIO se han realizado modificaciones y correcciones en documentaci&oacute;n y construcci&oacute;n a solicitud del usuario. Quedan pendiente regularizar las horas de seguimiento y generaci&oacute;n de reportes para Soporte.', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-25 16:39:06', '2017-08-01 13:58:34', 2, '10.232.101.217', 'LIM-GQHPF72', 2, 21);
INSERT INTO `seguimiento_prevision` VALUES (41, 1, 45.00, 135.00, 135.00, 126.00, 126.00, 93.00, 126.00, 126.00, 0.00, '1', NULL, NULL, NULL, 'Se viene trabajando con normalidad en Citrix en entorno de desarrollo, con 81 horas en petici&oacute;n y 45 horas en disponibilidad cliente', NULL, NULL, '1', 0, 0, 0, '0', '2017-07-25 16:39:59', '2017-08-01 13:58:40', 2, '10.232.101.217', 'LIM-GQHPF72', 3, 2);
INSERT INTO `seguimiento_prevision` VALUES (42, 1, 0.00, 180.00, 180.00, 135.00, 225.00, 125.00, 135.00, 135.00, 0.00, '1', NULL, NULL, NULL, 'Se ejecuta seg&uacute;n lo planificado', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-25 16:39:59', '2017-08-01 13:58:40', 2, '10.232.101.217', 'LIM-GQHPF72', 3, 3);
INSERT INTO `seguimiento_prevision` VALUES (43, 1, 0.00, 180.00, 180.00, 135.00, 168.00, 93.00, 135.00, 135.00, 0.00, '1', NULL, NULL, NULL, 'Se contin&uacute;a con la atenci&oacute;n de requerimientos de an&aacute;lisis de impacto de mediana complejidad. Se coordinan los accesos a la VDI informada, a&uacute;n en proceso.', NULL, NULL, '1', NULL, NULL, NULL, '0', '2017-07-25 16:39:59', '2017-08-01 13:58:40', 2, '10.232.101.217', 'LIM-GQHPF72', 3, 4);
INSERT INTO `seguimiento_prevision` VALUES (44, 2, 0.00, 360.00, 336.00, 252.00, 336.00, 100.00, 270.00, 270.00, 0.00, '1', NULL, NULL, NULL, 'Debido a que la demanda supera las horas estimadas se va repartir entre los dominios de PORTAL, IPB y HBK. Por lo cual de las 466 Hrs de CS JAVA se reparten como sigue: HBK 80 Hrs, IPB 80 Hrs y PORTAL 36 Hrs.', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-25 16:39:59', '2017-08-01 13:58:40', 2, '10.232.101.217', 'LIM-GQHPF72', 3, 5);
INSERT INTO `seguimiento_prevision` VALUES (45, 3, 0.00, 540.00, 504.00, 378.00, 504.00, 100.00, 405.00, 405.00, 0.00, '1', NULL, NULL, NULL, 'Se avanza de acuerdo a lo planificado', NULL, NULL, '1', NULL, NULL, NULL, '0', '2017-07-25 16:39:59', '2017-08-01 13:58:40', 2, '10.232.101.217', 'LIM-GQHPF72', 3, 6);
INSERT INTO `seguimiento_prevision` VALUES (46, 3, 0.00, 540.00, 540.00, 405.00, 405.00, 75.00, 405.00, 405.00, 0.00, '1', NULL, NULL, NULL, 'Se viene trabajando segun lo planificado', NULL, NULL, '1', 0, 0, 0, '0', '2017-07-25 16:39:59', '2017-08-01 13:58:40', 2, '10.232.101.217', 'LIM-GQHPF72', 3, 7);
INSERT INTO `seguimiento_prevision` VALUES (47, 5, 54.00, 846.00, 900.00, 675.00, 675.00, 75.00, 675.00, 675.00, 0.00, '1', NULL, NULL, NULL, 'Se viene trabajando seg&uacute;n lo planificado', NULL, NULL, '1', 0, 5, 0, '0', '2017-07-25 16:39:59', '2017-08-01 13:58:40', 2, '10.232.101.217', 'LIM-GQHPF72', 3, 8);
INSERT INTO `seguimiento_prevision` VALUES (48, 2, 0.00, 360.00, 336.00, 252.00, 280.00, 83.00, 194.00, 194.00, 0.00, '1', NULL, NULL, NULL, 'HBK: 114 Hrs m&aacute;s 80 de CS JAVA. Aun as&iacute; no se completa la demanda ya que no se cuenta con m&aacute;s requerimientos para asignar al CAR', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-25 16:39:59', '2017-08-01 13:58:40', 2, '10.232.101.217', 'LIM-GQHPF72', 3, 9);
INSERT INTO `seguimiento_prevision` VALUES (49, 14, 45.00, 2475.00, 2340.00, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-25 16:39:59', '2017-08-01 13:58:40', 2, '10.232.101.217', 'LIM-GQHPF72', 3, 10);
INSERT INTO `seguimiento_prevision` VALUES (50, 2, 0.00, 360.00, 336.00, 252.00, 280.00, 83.00, 195.00, 195.00, 0.00, '1', NULL, NULL, NULL, 'IPB: 115 Hrs m&aacute;s 80 de CS-JAVA. Aun as&iacute; no se completa la demanda ya que no se cuenta con m&aacute;s requerimientos para asignar al CAR', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-25 16:39:59', '2017-08-01 13:58:40', 2, '10.232.101.217', 'LIM-GQHPF72', 3, 11);
INSERT INTO `seguimiento_prevision` VALUES (51, 4, 0.00, 720.00, 672.00, 504.00, 935.00, 139.00, 563.00, 563.00, 0.00, '1', NULL, NULL, NULL, 'Se avanza de acuerdo a lo planificado. Se tienen 0.75 horas por disponibilidad cliente del requerimiento ST000082326.', NULL, NULL, '1', NULL, NULL, NULL, '0', '2017-07-25 16:39:59', '2017-08-01 13:58:40', 2, '10.232.101.217', 'LIM-GQHPF72', 3, 12);
INSERT INTO `seguimiento_prevision` VALUES (52, 7, 45.00, 1215.00, 1260.00, 945.00, 945.00, 75.00, 945.00, 945.00, 0.00, '1', NULL, NULL, NULL, 'Se sinceraron las horas de vacaciones con el proyecto', NULL, NULL, '1', 8, 0, 0, '0', '2017-07-25 16:39:59', '2017-08-01 13:58:40', 2, '10.232.101.217', 'LIM-GQHPF72', 3, 13);
INSERT INTO `seguimiento_prevision` VALUES (53, 2, 0.00, 360.00, 336.00, 252.00, 336.00, 100.00, 279.00, 279.00, 0.00, '1', NULL, NULL, NULL, 'Se ejecuta seg&uacute;n lo planificado. Se tienes 9 Hrs adicionales por gesti&oacute;n, las cuales corresponden a 3 horas semanales por 3 semanas.', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-25 16:39:59', '2017-08-01 13:58:40', 2, '10.232.101.217', 'LIM-GQHPF72', 3, 14);
INSERT INTO `seguimiento_prevision` VALUES (54, 5, 0.00, 900.00, 840.00, 630.00, 462.00, 55.00, 448.00, 448.00, 0.00, '1', NULL, NULL, NULL, 'Se acuerda con los l&iacute;deres de Solutions que las horas de CS-JAVA se van a distribuir entre los Dominios. PORTAL 412 Hrs, m&aacute;s 36 Hrs de CS JAVA. Adicional, se cancelan requerimientos, por ello la demanda disminuye.', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-25 16:39:59', '2017-08-01 13:58:40', 2, '10.232.101.217', 'LIM-GQHPF72', 3, 15);
INSERT INTO `seguimiento_prevision` VALUES (55, 3, 18.00, 522.00, 504.00, 378.00, 465.50, 92.36, 342.50, 342.50, 0.00, '1', NULL, NULL, NULL, 'Se contin&uacute;a con el la atenci&oacute;n de los requerimientos. Existen demora en  respuesta en algunas dos requerimiento lo cual ya se ha informado.', 97.00, 68.00, NULL, 0, 0, NULL, '0', '2017-07-25 16:39:59', '2017-08-01 13:58:40', 2, '10.232.101.217', 'LIM-GQHPF72', 3, 16);
INSERT INTO `seguimiento_prevision` VALUES (56, 10, 0.00, 1800.00, 1260.00, 84.00, 102.00, 8.00, 102.00, 102.00, 0.00, '1', NULL, NULL, NULL, 'Demanda distribuida: Repsol=102hrs. Disponibilidad cliente 843 horas.', NULL, NULL, NULL, NULL, 1, NULL, '0', '2017-07-25 16:39:59', '2017-08-01 13:58:40', 2, '10.232.101.217', 'LIM-GQHPF72', 3, 17);
INSERT INTO `seguimiento_prevision` VALUES (57, 2, 9.00, 351.00, 360.00, 270.00, 270.00, 75.00, 270.00, 270.00, 0.00, '1', NULL, NULL, NULL, 'Las 175 horas se han incurrido a Disponibilidad Cliente y 95 en Peticion de Tareas', NULL, NULL, '1', 0, 0, 0, '0', '2017-07-25 16:39:59', '2017-08-01 13:58:40', 2, '10.232.101.217', 'LIM-GQHPF72', 3, 18);
INSERT INTO `seguimiento_prevision` VALUES (58, 10, 54.00, 1746.00, 1680.00, 1260.00, 1680.00, 100.00, 1275.00, 1275.00, 0.00, '1', NULL, NULL, NULL, 'Se ejecuta seg&uacute;n lo planificado.', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-25 16:39:59', '2017-08-01 13:58:40', 2, '10.232.101.217', 'LIM-GQHPF72', 3, 19);
INSERT INTO `seguimiento_prevision` VALUES (59, 9, 45.00, 1575.00, 1344.00, 1008.00, 1180.00, 88.00, 1030.00, 1030.00, 0.00, '1', NULL, NULL, NULL, 'Se tienen 310.5 hrs por trabajo adicional (Soporte en QC, congelamiento y certificaci&oacute;n) en los requerimientos ST000060380, ST000077171, ST000076536, ST000080500 (Se incluyen 8 hrs del ST000072684 por priorizaci&oacute;n para enviar el congelamiento) y 910.5 hrs en proyectos evolutivos en curso. Se retiran 33 Hrs por la reversi&oacute;n y trabajo posterior del ST000086337.', NULL, NULL, '1', NULL, NULL, NULL, '0', '2017-07-25 16:39:59', '2017-08-01 13:58:40', 2, '10.232.101.217', 'LIM-GQHPF72', 3, 20);
INSERT INTO `seguimiento_prevision` VALUES (60, 15, 99.00, 2601.00, 2325.00, 1744.00, 2325.00, 100.00, 1743.00, 1744.00, 0.00, '1', NULL, NULL, NULL, 'Se han recuperado 58.93 horas pendientes de la semana pasada. Se tiene un adelanto en los avance de los Roapmaps por documentaci&oacute;n y gesti&oacute;n por estar llegando a la fase de cierre.', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-25 16:39:59', '2017-08-01 13:58:40', 2, '10.232.101.217', 'LIM-GQHPF72', 3, 21);
INSERT INTO `seguimiento_prevision` VALUES (101, 6, 0.00, 1080.00, 495.00, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-25 16:43:20', '2017-08-01 13:58:29', 2, '10.232.101.217', 'LIM-GQHPF72', 1, 22);
INSERT INTO `seguimiento_prevision` VALUES (102, 6, 0.00, 1080.00, 495.00, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-25 16:43:20', '2017-08-01 13:58:34', 2, '10.232.101.217', 'LIM-GQHPF72', 2, 22);
INSERT INTO `seguimiento_prevision` VALUES (103, 6, 0.00, 1080.00, 495.00, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-25 16:43:20', '2017-08-01 13:58:40', 2, '10.232.101.217', 'LIM-GQHPF72', 3, 22);
INSERT INTO `seguimiento_prevision` VALUES (104, 1, 45.00, 135.00, 135.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-26 21:06:43', '2017-07-26 21:06:43', 4, '10.232.100.252', 'LIM-MXL5510MRN.usersad.everis.int', 4, 2);
INSERT INTO `seguimiento_prevision` VALUES (105, 1, 0.00, 180.00, 180.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-26 21:06:43', '2017-07-26 21:06:43', 4, '10.232.100.252', 'LIM-MXL5510MRN.usersad.everis.int', 4, 3);
INSERT INTO `seguimiento_prevision` VALUES (106, 1, 0.00, 180.00, 180.00, 171.00, 168.00, 93.33, 171.00, 171.00, 0.00, NULL, NULL, NULL, NULL, 'Se contin&uacute;a con la atenci&oacute;n de requerimientos de an&aacute;lisis de impacto y trazabilidad de mediana complejidad. Ya se cuenta con la VDI, a&uacute;n en proceso la revisi&oacute;n de accesos.', NULL, NULL, '1', NULL, NULL, NULL, '0', '2017-07-26 21:06:43', '2017-08-01 18:09:14', 14, '10.232.124.157', 'LIM-648XDC2', 4, 4);
INSERT INTO `seguimiento_prevision` VALUES (107, 2, 0.00, 360.00, 336.00, 319.20, 336.00, 100.00, 336.00, 336.00, 0.00, NULL, NULL, NULL, NULL, 'Debido a que la demanda supera las horas estimadas se va repartir entre los dominios de PORTAL, IPB y HBK. Por lo cual de las 611 Hrs de CS JAVA se reparten como sigue: HBK 90 Hrs, IPB 90 Hrs y PORTAL 95 Hrs.', NULL, NULL, '1', NULL, NULL, NULL, '0', '2017-07-26 21:06:43', '2017-09-28 13:32:16', 15, '10.232.124.125', 'LIM-35701G2', 4, 5);
INSERT INTO `seguimiento_prevision` VALUES (108, 3, 0.00, 540.00, 504.00, 478.80, 504.00, 100.00, 513.00, 513.00, 0.00, NULL, NULL, NULL, NULL, 'Se ejecuta de acuerdo a lo planificado.', NULL, NULL, '1', NULL, NULL, NULL, '0', '2017-07-26 21:06:43', '2017-08-01 18:10:15', 14, '10.232.124.157', 'LIM-648XDC2', 4, 6);
INSERT INTO `seguimiento_prevision` VALUES (109, 3, 0.00, 540.00, 540.00, 513.00, 121.00, 22.41, 12212.00, 121212.00, -893.00, NULL, 1, 1, 'La ocupabilidad confirmada del mes es de 100.00% para 3 personas con un nivel de facturabilidad del 100.00%. AAAAA', 'aaaa..', 100.00, 100.00, '1', 2, 3, 4, '0', '2017-07-26 21:06:43', '2018-12-28 14:59:31', 4, '10.10.1.131', 'CLRLAP034.fractal.local', 4, 7);
INSERT INTO `seguimiento_prevision` VALUES (110, 5, 54.00, 846.00, 900.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-26 21:06:43', '2017-07-26 21:06:43', 4, '10.232.100.252', 'LIM-MXL5510MRN.usersad.everis.int', 4, 8);
INSERT INTO `seguimiento_prevision` VALUES (111, 2, 0.00, 360.00, 336.00, 319.20, 259.00, 77.08, 259.00, 259.00, 0.00, NULL, NULL, NULL, NULL, 'HBK: 169 Hrs m&aacute;s 90 de CS JAVA. Aun as&iacute; no se completa la demanda ya que no se cuenta con m&aacute;s requerimientos para asignar al CAR', NULL, NULL, '1', NULL, NULL, NULL, '0', '2017-07-26 21:06:43', '2017-09-28 13:33:24', 15, '10.232.124.125', 'LIM-35701G2', 4, 9);
INSERT INTO `seguimiento_prevision` VALUES (112, 14, 45.00, 2475.00, 2340.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-26 21:06:43', '2017-07-26 21:06:43', 4, '10.232.100.252', 'LIM-MXL5510MRN.usersad.everis.int', 4, 10);
INSERT INTO `seguimiento_prevision` VALUES (113, 2, 0.00, 360.00, 336.00, 319.20, 260.00, 77.38, 260.00, 260.00, 0.00, NULL, NULL, NULL, NULL, 'IPB: 170 Hrs m&aacute;s 90 de CS JAVA. Aun as&iacute; no se completa la demanda ya que no se cuenta con m&aacute;s requerimientos para asignar al CAR', NULL, NULL, '1', NULL, NULL, NULL, '0', '2017-07-26 21:06:43', '2017-09-28 13:34:07', 15, '10.232.124.125', 'LIM-35701G2', 4, 11);
INSERT INTO `seguimiento_prevision` VALUES (114, 4, 0.00, 720.00, 672.00, 638.40, 985.00, 146.58, 702.00, 702.00, 0.00, NULL, NULL, NULL, NULL, 'Se ejecuta de acuerdo a lo planificado. Se adicionan 50 Hrs por Soporte (Reuniones de CAVALI, CashOut, NHBK y el PaP de carga de fotos)', NULL, NULL, '1', NULL, NULL, NULL, '0', '2017-07-26 21:06:43', '2017-08-01 18:11:13', 14, '10.232.124.157', 'LIM-648XDC2', 4, 12);
INSERT INTO `seguimiento_prevision` VALUES (115, 7, 45.00, 1215.00, 1260.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-26 21:06:43', '2017-07-26 21:06:43', 4, '10.232.100.252', 'LIM-MXL5510MRN.usersad.everis.int', 4, 13);
INSERT INTO `seguimiento_prevision` VALUES (116, 2, 0.00, 360.00, 336.00, 319.20, 369.00, 109.82, 369.00, 369.00, 0.00, NULL, NULL, NULL, NULL, 'Se ejecuta seg&uacute;n lo planificado. Se tienes 12 Hrs adicionales por gesti&oacute;n, las cuales corresponden a 3 horas semanales por 4 semanas.', NULL, NULL, '1', NULL, NULL, NULL, '0', '2017-07-26 21:06:43', '2017-09-28 13:35:06', 15, '10.232.124.125', 'LIM-35701G2', 4, 14);
INSERT INTO `seguimiento_prevision` VALUES (117, 5, 0.00, 900.00, 840.00, 798.00, 597.00, 71.07, 597.00, 597.00, 0.00, NULL, NULL, NULL, NULL, 'Se acuerda con los l&iacute;deres de Solutions que las horas de CS-JAVA se van a distribuir entre los Dominios. PORTAL 502 Hrs, m&aacute;s 95 Hrs de CS JAVA. Adicional, se cancelan requerimientos, por ello la demanda disminuye.', NULL, NULL, '1', NULL, NULL, NULL, '0', '2017-07-26 21:06:43', '2017-09-28 13:35:58', 15, '10.232.124.125', 'LIM-35701G2', 4, 15);
INSERT INTO `seguimiento_prevision` VALUES (118, 3, 18.00, 522.00, 504.00, 478.80, 465.00, 92.26, 342.50, 342.50, 0.00, NULL, NULL, NULL, NULL, 'se contin&uacute;a con el la atenci&oacute;n de los requerimientos.. Existen demora en  respuesta en algunas dos requerimiento lo cual ya se ha informado.\r\n', NULL, NULL, NULL, 2, 1, NULL, '0', '2017-07-26 21:06:43', '2017-08-01 20:35:10', 16, '10.232.101.224', 'LIM-22Z01G2', 4, 16);
INSERT INTO `seguimiento_prevision` VALUES (119, 10, 0.00, 1800.00, 1260.00, 1197.00, 120.00, 9.52, 120.00, 120.00, 0.00, NULL, NULL, NULL, NULL, 'Demanda distribuida: Repsol=102hrs. Disponibilidad cliente 843 horas.\r\n', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-26 21:06:43', '2017-08-01 20:37:20', 16, '10.232.101.224', 'LIM-22Z01G2', 4, 17);
INSERT INTO `seguimiento_prevision` VALUES (120, 2, 9.00, 351.00, 360.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-26 21:06:43', '2017-07-26 21:06:43', 4, '10.232.100.252', 'LIM-MXL5510MRN.usersad.everis.int', 4, 18);
INSERT INTO `seguimiento_prevision` VALUES (121, 10, 54.00, 1746.00, 1680.00, 1596.00, 1680.00, 100.00, 1680.00, 1680.00, 0.00, NULL, NULL, NULL, NULL, 'Se ejecuta de acuerdo a lo planificado.', NULL, NULL, '1', NULL, NULL, NULL, '0', '2017-07-26 21:06:43', '2017-09-28 13:36:48', 15, '10.232.124.125', 'LIM-35701G2', 4, 19);
INSERT INTO `seguimiento_prevision` VALUES (122, 9, 45.00, 1575.00, 1344.00, 1276.80, 1180.00, 87.80, 1018.00, 1018.00, 0.00, NULL, NULL, NULL, NULL, 'Se ejecuta de acuerdo a lo planificado.', NULL, NULL, '1', NULL, NULL, NULL, '0', '2017-07-26 21:06:43', '2017-08-01 18:12:07', 14, '10.232.124.157', 'LIM-648XDC2', 4, 20);
INSERT INTO `seguimiento_prevision` VALUES (123, 15, 99.00, 2601.00, 2325.00, 2208.75, 2237.00, 96.22, 2209.00, 2155.00, 2.00, NULL, NULL, NULL, NULL, 'Se han tenido tareas de mayor complejidad t&eacute;cnica, se recupera la siguiente semana, asignando recursos son este Skill. Se han completado tareas de los roadmaps que se est&aacute;n gestionando en el CAR para cubrir la capacidad. Solutions no ha cubierto la demanda comprometida (2325 Hrs)...', NULL, NULL, '1', NULL, NULL, NULL, '0', '2017-07-26 21:06:43', '2018-11-03 16:01:26', 14, '10.10.1.131', 'CLRLAP034.fractal.local', 4, 21);
INSERT INTO `seguimiento_prevision` VALUES (124, 6, 0.00, 1080.00, 500.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-26 21:06:43', '2017-07-26 21:06:43', 4, '10.232.100.252', 'LIM-MXL5510MRN.usersad.everis.int', 4, 22);
INSERT INTO `seguimiento_prevision` VALUES (125, 1, 45.00, 135.00, 135.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-26 21:11:20', '2017-07-26 21:11:20', 4, '10.232.100.252', 'LIM-MXL5510MRN.usersad.everis.int', 5, 2);
INSERT INTO `seguimiento_prevision` VALUES (126, 1, 0.00, 180.00, 180.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-26 21:11:20', '2017-07-26 21:11:20', 4, '10.232.100.252', 'LIM-MXL5510MRN.usersad.everis.int', 5, 3);
INSERT INTO `seguimiento_prevision` VALUES (127, 1, 0.00, 180.00, 180.00, 180.00, 168.00, 93.33, 176.00, 176.00, 0.00, NULL, NULL, NULL, NULL, 'Se contin&uacute;a con la atenci&oacute;n de requerimientos de an&aacute;lisis de impacto y trazabilidad de mediana complejidad. Ya se cuenta con la VDI, a&uacute;n en proceso la revisi&oacute;n de accesos.', NULL, NULL, '1', NULL, NULL, NULL, '0', '2017-07-26 21:11:20', '2017-08-01 18:14:30', 14, '10.232.124.157', 'LIM-648XDC2', 5, 4);
INSERT INTO `seguimiento_prevision` VALUES (128, 2, 0.00, 360.00, 336.00, 336.00, 336.00, 100.00, 336.00, 336.00, 0.00, NULL, NULL, NULL, NULL, 'Debido a que la demanda supera las horas estimadas se va repartir entre los dominios de PORTAL, IPB y HBK. Por lo cual de las 611 Hrs de CS JAVA se reparten como sigue: HBK 90 Hrs, IPB 90 Hrs y PORTAL 95 Hrs.', NULL, NULL, '1', NULL, NULL, NULL, '0', '2017-07-26 21:11:20', '2017-09-28 13:39:01', 15, '10.232.124.125', 'LIM-35701G2', 5, 5);
INSERT INTO `seguimiento_prevision` VALUES (129, 3, 0.00, 540.00, 504.00, 504.00, 504.00, 100.00, 540.00, 540.00, 0.00, NULL, NULL, NULL, NULL, 'Se ejecuta de acuerdo a lo planificado.', NULL, NULL, '1', NULL, NULL, NULL, '0', '2017-07-26 21:11:20', '2017-08-01 18:15:18', 14, '10.232.124.157', 'LIM-648XDC2', 5, 6);
INSERT INTO `seguimiento_prevision` VALUES (130, 3, 0.00, 540.00, 540.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-26 21:11:20', '2017-07-26 21:11:20', 4, '10.232.100.252', 'LIM-MXL5510MRN.usersad.everis.int', 5, 7);
INSERT INTO `seguimiento_prevision` VALUES (131, 5, 54.00, 846.00, 900.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-26 21:11:20', '2017-07-26 21:11:20', 4, '10.232.100.252', 'LIM-MXL5510MRN.usersad.everis.int', 5, 8);
INSERT INTO `seguimiento_prevision` VALUES (132, 2, 0.00, 360.00, 336.00, 336.00, 259.00, 77.08, 259.00, 259.00, 0.00, NULL, NULL, NULL, NULL, 'HBK: 169 Hrs m&aacute;s 90 de CS JAVA. Aun as&iacute; no se completa la demanda ya que no se cuenta con m&aacute;s requerimientos para asignar al CAR', NULL, NULL, '1', NULL, NULL, NULL, '0', '2017-07-26 21:11:20', '2017-09-28 13:40:04', 15, '10.232.124.125', 'LIM-35701G2', 5, 9);
INSERT INTO `seguimiento_prevision` VALUES (133, 14, 45.00, 2475.00, 2340.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-26 21:11:20', '2017-07-26 21:11:20', 4, '10.232.100.252', 'LIM-MXL5510MRN.usersad.everis.int', 5, 10);
INSERT INTO `seguimiento_prevision` VALUES (134, 2, 0.00, 360.00, 336.00, 336.00, 260.00, 77.38, 260.00, 260.00, 0.00, NULL, NULL, NULL, NULL, 'IPB: 170 Hrs m&aacute;s 90 de CS JAVA. Aun as&iacute; no se completa la demanda ya que no se cuenta con m&aacute;s requerimientos para asignar al CAR', NULL, NULL, '1', NULL, NULL, NULL, '0', '2017-07-26 21:11:20', '2017-09-28 13:40:43', 15, '10.232.124.125', 'LIM-35701G2', 5, 11);
INSERT INTO `seguimiento_prevision` VALUES (135, 4, 0.00, 720.00, 672.00, 672.00, 996.00, 148.21, 729.00, 729.00, 0.00, NULL, NULL, NULL, NULL, 'Se ejecuta de acuerdo a lo planificado. Se adicionan 11 Hrs por Soporte (Reuniones por &quot;Referencia de direcciones&quot; y CIX-EVA para el pase a producci&oacute;n el 02-Agosto)', NULL, NULL, '1', NULL, NULL, NULL, '0', '2017-07-26 21:11:20', '2017-08-01 18:16:24', 14, '10.232.124.157', 'LIM-648XDC2', 5, 12);
INSERT INTO `seguimiento_prevision` VALUES (136, 7, 45.00, 1215.00, 1260.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-26 21:11:20', '2017-07-26 21:11:20', 4, '10.232.100.252', 'LIM-MXL5510MRN.usersad.everis.int', 5, 13);
INSERT INTO `seguimiento_prevision` VALUES (137, 2, 0.00, 360.00, 336.00, 336.00, 369.00, 109.82, 369.00, 369.00, 0.00, NULL, NULL, NULL, NULL, 'Se ejecuta seg&uacute;n lo planificado. Se tienes 12 Hrs adicionales por gesti&oacute;n, las cuales corresponden a 3 horas semanales por 4 semanas.', NULL, NULL, '1', NULL, NULL, NULL, '0', '2017-07-26 21:11:20', '2017-09-28 13:41:50', 15, '10.232.124.125', 'LIM-35701G2', 5, 14);
INSERT INTO `seguimiento_prevision` VALUES (138, 5, 0.00, 900.00, 840.00, 840.00, 597.00, 71.07, 597.00, 597.00, 0.00, NULL, NULL, NULL, NULL, 'Se acuerda con los l&iacute;deres de Solutions que las horas de CS-JAVA se van a distribuir entre los Dominios. PORTAL 502 Hrs, m&aacute;s 95 Hrs de CS JAVA. Adicional, se cancelan requerimientos, por ello la demanda disminuye.', NULL, NULL, '1', NULL, NULL, NULL, '0', '2017-07-26 21:11:20', '2017-09-28 13:42:37', 15, '10.232.124.125', 'LIM-35701G2', 5, 15);
INSERT INTO `seguimiento_prevision` VALUES (139, 3, 18.00, 522.00, 504.00, 504.00, 498.00, 98.81, 498.00, 498.00, 0.00, NULL, NULL, NULL, NULL, '&quot;A la fecha se han culminado con todos los requerimientos enviados por el cliente, pero existes las siguientes requerimientos aplazados por falta de respuesta: ST000081909, ST000086874, ST000074919, ST000083506. \r\nSe han generado 63 horas disponibilidad cliente de la petici&oacute;n ST000081909 y 51 horas en la petici&oacute;n ST000086874. Los peticiones ST000074919 y ST000083506 estan terminadas y s&oacute;lo est&aacute; pendiente la aprobaci&oacute;n de las pruebas por parte de solution.&quot;\r\n', NULL, NULL, NULL, 3, 2, NULL, '0', '2017-07-26 21:11:20', '2017-08-01 20:31:27', 16, '10.232.101.224', 'LIM-22Z01G2', 5, 16);
INSERT INTO `seguimiento_prevision` VALUES (140, 10, 0.00, 1800.00, 1260.00, 1260.00, 127.00, 10.08, 127.00, 127.00, 0.00, NULL, NULL, NULL, NULL, 'Demanda distribuida: Repsol=127hrs. Disponibilidad cliente 1133 horas.\r\n', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-26 21:11:20', '2017-08-01 20:32:56', 16, '10.232.101.224', 'LIM-22Z01G2', 5, 17);
INSERT INTO `seguimiento_prevision` VALUES (141, 2, 9.00, 351.00, 360.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-26 21:11:20', '2017-07-26 21:11:20', 4, '10.232.100.252', 'LIM-MXL5510MRN.usersad.everis.int', 5, 18);
INSERT INTO `seguimiento_prevision` VALUES (142, 10, 54.00, 1746.00, 1680.00, 1680.00, 1680.00, 100.00, 1680.00, 1680.00, 0.00, NULL, NULL, NULL, NULL, 'Se ejecuta de acuerdo a lo planificado.', NULL, NULL, '1', NULL, NULL, NULL, '0', '2017-07-26 21:11:20', '2017-09-28 13:43:23', 15, '10.232.124.125', 'LIM-35701G2', 5, 19);
INSERT INTO `seguimiento_prevision` VALUES (143, 9, 45.00, 1575.00, 1344.00, 1344.00, 1180.00, 87.80, 1180.00, 1180.00, 0.00, NULL, NULL, NULL, NULL, 'Se ejecuta de acuerdo a lo planificado.', NULL, NULL, '1', NULL, NULL, NULL, '0', '2017-07-26 21:11:20', '2017-08-01 18:17:20', 14, '10.232.124.157', 'LIM-648XDC2', 5, 20);
INSERT INTO `seguimiento_prevision` VALUES (144, 15, 99.00, 2601.00, 2325.00, 2325.00, 2264.00, 97.38, 2325.00, 2225.00, 4.00, NULL, NULL, NULL, NULL, 'Se han tenido tareas de mayor complejidad t&eacute;cnica, se recupera la siguiente semana, asignando recursos con este Skill. Se han completado tareas de los roadmaps que se est&aacute;n gestionando en el CAR para cubrir la capacidad. Solutions no ha cubierto la demanda comprometida (2325 Hrs). Se devuelven 42.80 Hrs a favor de Solutions por no haber sido ejecutadas.', NULL, NULL, '1', NULL, NULL, NULL, '0', '2017-07-26 21:11:20', '2017-08-10 23:32:40', 14, '10.232.100.133', 'LIM-648XDC2', 5, 21);
INSERT INTO `seguimiento_prevision` VALUES (145, 6, 0.00, 1080.00, 500.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-07-26 21:11:20', '2017-07-26 21:11:20', 4, '10.232.100.252', 'LIM-MXL5510MRN.usersad.everis.int', 5, 22);
INSERT INTO `seguimiento_prevision` VALUES (194, 1, 0.00, 189.00, 187.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-26 19:18:41', '2017-09-26 19:18:41', 4, '10.232.124.129', 'LIM-5CG5114L3Z', 8, 67);
INSERT INTO `seguimiento_prevision` VALUES (195, 6, 0.00, 1134.00, 1040.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-26 19:18:41', '2017-09-26 19:18:41', 4, '10.232.124.129', 'LIM-5CG5114L3Z', 8, 68);
INSERT INTO `seguimiento_prevision` VALUES (196, 2, 54.00, 324.00, 189.00, 144.00, 144.00, 76.19, 144.00, 144.00, 0.00, NULL, 0, 0, 'La ocupabilidad confirmada del mes es de 58.00% para 2 personas con un nivel de facturabilidad del 86.00%.....', 'En atenci&oacute;n un requerimiento de trazabilidad de alta complejidad. Se realiza la capacitaci&oacute;n HOST sobre la revisi&oacute;n de estructuras y detalle de campos para poder tomar requerimientos de esta naturaleza. Contin&uacute;a pendiente el permiso para el acceso a Remedy, escalado con Solutions.', 86.00, 58.00, '1', NULL, NULL, NULL, '0', '2017-09-26 19:18:41', '2018-11-03 16:17:38', 4, '10.10.1.131', 'CLRLAP034.fractal.local', 8, 69);
INSERT INTO `seguimiento_prevision` VALUES (197, 3, 36.00, 531.00, 567.00, 432.00, 483.00, 85.19, 482.00, 482.00, 0.00, NULL, NULL, NULL, NULL, 'Solutions solicit&oacute; se divida la demanda de CS y PC (Phone Banking Channel); demanda diferenciada se tiene: CS=134.5 Hrs, PC=348 Hrs.', NULL, NULL, '1', NULL, NULL, NULL, '0', '2017-09-26 19:18:41', '2017-09-28 12:34:44', 15, '10.232.124.125', 'LIM-35701G2', 8, 70);
INSERT INTO `seguimiento_prevision` VALUES (198, 3, 45.00, 522.00, 567.00, 432.00, 432.00, 76.19, 432.00, 432.00, 0.00, NULL, NULL, NULL, NULL, 'Se ejecuta de acuerdo a la demanda enviada. Se cubren 23 Hrs con demanda de CS Java', NULL, NULL, '1', NULL, NULL, NULL, '0', '2017-09-26 19:18:41', '2017-09-28 11:50:06', 14, '10.109.16.42', 'LIM-648XDC2', 8, 71);
INSERT INTO `seguimiento_prevision` VALUES (199, 5, 0.00, 945.00, 567.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 'La ocupabilidad confirmada del mes es de 60.00% para 5 personas con un nivel de facturabilidad del 100.00%. .. Prueba hijos de las mil pu... :V: ::V:V:V:V:', NULL, 100.00, 60.00, NULL, NULL, NULL, NULL, '0', '2017-09-26 19:18:41', '2018-11-03 16:18:55', 4, '10.10.1.131', 'CLRLAP034.fractal.local', 8, 72);
INSERT INTO `seguimiento_prevision` VALUES (200, 6, 108.00, 1026.00, 837.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-26 19:18:41', '2017-09-26 19:18:41', 4, '10.232.124.129', 'LIM-5CG5114L3Z', 8, 73);
INSERT INTO `seguimiento_prevision` VALUES (201, 1, 0.00, 189.00, 189.00, 144.00, 189.00, 100.00, 144.00, 144.00, 0.00, NULL, NULL, NULL, NULL, 'Se avanza seg&uacute;n lo planificado. Se cubren 40 Hrs con demanda de CS Java', NULL, NULL, '1', NULL, NULL, NULL, '0', '2017-09-26 19:18:41', '2017-09-28 12:36:33', 15, '10.232.124.125', 'LIM-35701G2', 8, 74);
INSERT INTO `seguimiento_prevision` VALUES (202, 9, 45.00, 1656.00, 1656.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-26 19:18:41', '2017-09-26 19:18:41', 4, '10.232.124.129', 'LIM-5CG5114L3Z', 8, 75);
INSERT INTO `seguimiento_prevision` VALUES (203, 2, 27.00, 351.00, 378.00, 288.00, 288.00, 76.19, 288.00, 288.00, 0.00, NULL, NULL, NULL, NULL, 'Se avanza seg&uacute;n la demanda enviada, se da inicio al requerimiento de &quot;Correcci&oacute;n de Vulnerabilidades del Site Administrativo BM&quot; con lo cual se nivela la demanda. Se cubren 110.5 Hrs con demanda de CS Java', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-26 19:18:41', '2017-09-28 12:38:42', 15, '10.232.124.125', 'LIM-35701G2', 8, 76);
INSERT INTO `seguimiento_prevision` VALUES (204, 5, 90.00, 855.00, 756.00, 576.00, 617.50, 81.68, 533.25, 524.25, 2.00, NULL, NULL, NULL, NULL, 'Se ejecuta de acuerdo a lo planificado y capacidad del equipo. Se tienen 9 Hrs de retrabajo en un error en Financial INQ.', NULL, NULL, '1', NULL, NULL, NULL, '0', '2017-09-26 19:18:41', '2017-09-28 11:47:42', 14, '10.109.16.42', 'LIM-648XDC2', 8, 77);
INSERT INTO `seguimiento_prevision` VALUES (205, 6, 90.00, 1044.00, 945.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-26 19:18:41', '2017-09-26 19:18:41', 4, '10.232.124.129', 'LIM-5CG5114L3Z', 8, 78);
INSERT INTO `seguimiento_prevision` VALUES (206, 3, 27.00, 540.00, 378.00, 288.00, 378.00, 100.00, 288.00, 288.00, 0.00, NULL, NULL, NULL, NULL, 'Se ejecuta de acuerdo a lo planificado', NULL, NULL, '1', NULL, NULL, NULL, '0', '2017-09-26 19:18:41', '2017-09-28 12:40:07', 15, '10.232.124.125', 'LIM-35701G2', 8, 79);
INSERT INTO `seguimiento_prevision` VALUES (207, 5, 63.00, 882.00, 756.00, 576.00, 756.00, 100.00, 615.00, 615.00, 0.00, NULL, NULL, NULL, NULL, 'Se avanza de acuerdo a la capacidad del equipo y planificaci&oacute;n de demanda. Se hace un esfuerzo adicional de 39.5 Hrs.', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-26 19:18:41', '2017-09-28 12:41:23', 15, '10.232.124.125', 'LIM-35701G2', 8, 80);
INSERT INTO `seguimiento_prevision` VALUES (208, 2, 45.00, 333.00, 378.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-26 19:18:41', '2017-09-26 19:18:41', 4, '10.232.124.129', 'LIM-5CG5114L3Z', 8, 81);
INSERT INTO `seguimiento_prevision` VALUES (209, 11, 0.00, 2079.00, 2079.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-26 19:18:41', '2017-09-26 19:18:41', 4, '10.232.124.129', 'LIM-5CG5114L3Z', 8, 82);
INSERT INTO `seguimiento_prevision` VALUES (210, 0, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-26 19:18:41', '2017-09-26 19:18:41', 4, '10.232.124.129', 'LIM-5CG5114L3Z', 8, 83);
INSERT INTO `seguimiento_prevision` VALUES (211, 12, 90.00, 2178.00, 1890.00, 1440.00, 1388.00, 73.44, 1388.00, 1388.00, 0.00, NULL, NULL, NULL, NULL, 'Se ejecuta de acuerdo a la demanda enviada.', NULL, NULL, '1', NULL, NULL, NULL, '0', '2017-09-26 19:18:41', '2017-09-28 12:45:13', 15, '10.232.124.125', 'LIM-35701G2', 8, 84);
INSERT INTO `seguimiento_prevision` VALUES (212, 11, 126.00, 1953.00, 1124.00, 856.38, 1124.00, 100.00, 1267.75, 724.25, 43.00, NULL, NULL, NULL, NULL, 'Se avanza de acuerdo a la demanda enviada. Se ejecutaron 543.5 Hrs de retrabajo (Correcciones a los desarrollos realizados en el CAR Trujillo). Se tiene un acumulado de 142 Hrs de apoyo a los digitadores (En Producci&oacute;n y Certificaci&oacute;n).', NULL, NULL, '1', NULL, NULL, NULL, '0', '2017-09-26 19:18:41', '2017-09-28 11:45:21', 14, '10.109.16.42', 'LIM-648XDC2', 8, 85);
INSERT INTO `seguimiento_prevision` VALUES (213, 15, 189.00, 2646.00, 2240.00, 1706.67, 1444.45, 64.48, 1654.86, 1431.35, 14.00, NULL, NULL, NULL, NULL, 'Se ejecuta de acuerdo a la demanda y capacidad del equipo. Se han presentado diferencias (151.65 Hrs) por retrabajos, incidencias externas e internas y curva de aprendizaje para los proyectos &quot;Planificaci&oacute;n y Seguimiento Semanal&quot; y &quot;Consolidaci&oacute;n CFA&quot;.', NULL, NULL, '1', NULL, NULL, NULL, '0', '2017-09-26 19:18:41', '2017-09-28 11:49:03', 14, '10.109.16.42', 'LIM-648XDC2', 8, 86);
INSERT INTO `seguimiento_prevision` VALUES (214, 1, 0.00, 189.00, 189.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-26 19:18:41', '2017-09-26 19:18:41', 4, '10.232.124.129', 'LIM-5CG5114L3Z', 8, 87);
INSERT INTO `seguimiento_prevision` VALUES (215, 7, 0.00, 1323.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-26 19:18:41', '2017-09-26 19:18:41', 4, '10.232.124.129', 'LIM-5CG5114L3Z', 8, 88);
INSERT INTO `seguimiento_prevision` VALUES (216, 1, 0.00, 189.00, 189.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-26 19:18:41', '2017-09-26 19:18:41', 4, '10.232.124.129', 'LIM-5CG5114L3Z', 8, 89);
INSERT INTO `seguimiento_prevision` VALUES (217, 1, 0.00, 189.00, 126.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-26 19:18:41', '2017-09-26 19:18:41', 4, '10.232.124.129', 'LIM-5CG5114L3Z', 8, 90);
INSERT INTO `seguimiento_prevision` VALUES (242, 1, 0.00, 189.00, 187.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:51', '2017-09-28 13:07:51', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 10, 67);
INSERT INTO `seguimiento_prevision` VALUES (243, 6, 0.00, 1134.00, 1040.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:51', '2017-09-28 13:07:51', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 10, 68);
INSERT INTO `seguimiento_prevision` VALUES (244, 2, 54.00, 324.00, 189.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:51', '2017-09-28 13:07:51', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 10, 69);
INSERT INTO `seguimiento_prevision` VALUES (245, 3, 36.00, 531.00, 567.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:51', '2017-09-28 13:07:51', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 10, 70);
INSERT INTO `seguimiento_prevision` VALUES (246, 3, 45.00, 522.00, 567.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:51', '2017-09-28 13:07:51', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 10, 71);
INSERT INTO `seguimiento_prevision` VALUES (247, 5, 0.00, 945.00, 567.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:51', '2017-09-28 13:07:51', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 10, 72);
INSERT INTO `seguimiento_prevision` VALUES (248, 6, 108.00, 1026.00, 837.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:51', '2017-09-28 13:07:51', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 10, 73);
INSERT INTO `seguimiento_prevision` VALUES (249, 1, 0.00, 189.00, 189.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:51', '2017-09-28 13:07:51', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 10, 74);
INSERT INTO `seguimiento_prevision` VALUES (250, 9, 45.00, 1656.00, 1656.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:51', '2017-09-28 13:07:51', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 10, 75);
INSERT INTO `seguimiento_prevision` VALUES (251, 2, 27.00, 351.00, 378.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:51', '2017-09-28 13:07:51', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 10, 76);
INSERT INTO `seguimiento_prevision` VALUES (252, 5, 90.00, 855.00, 756.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:51', '2017-09-28 13:07:51', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 10, 77);
INSERT INTO `seguimiento_prevision` VALUES (253, 6, 90.00, 1044.00, 945.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:51', '2017-09-28 13:07:51', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 10, 78);
INSERT INTO `seguimiento_prevision` VALUES (254, 3, 27.00, 540.00, 378.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:51', '2017-09-28 13:07:51', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 10, 79);
INSERT INTO `seguimiento_prevision` VALUES (255, 5, 63.00, 882.00, 756.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:51', '2017-09-28 13:07:51', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 10, 80);
INSERT INTO `seguimiento_prevision` VALUES (256, 2, 45.00, 333.00, 378.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:51', '2017-09-28 13:07:51', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 10, 81);
INSERT INTO `seguimiento_prevision` VALUES (257, 11, 0.00, 2079.00, 2079.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:51', '2017-09-28 13:07:51', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 10, 82);
INSERT INTO `seguimiento_prevision` VALUES (258, 0, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:51', '2017-09-28 13:07:51', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 10, 83);
INSERT INTO `seguimiento_prevision` VALUES (259, 12, 90.00, 2178.00, 1890.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:51', '2017-09-28 13:07:51', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 10, 84);
INSERT INTO `seguimiento_prevision` VALUES (260, 11, 126.00, 1953.00, 1124.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:51', '2017-09-28 13:07:51', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 10, 85);
INSERT INTO `seguimiento_prevision` VALUES (261, 15, 189.00, 2646.00, 2240.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:51', '2017-09-28 13:07:51', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 10, 86);
INSERT INTO `seguimiento_prevision` VALUES (262, 1, 0.00, 189.00, 189.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:51', '2017-09-28 13:07:51', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 10, 87);
INSERT INTO `seguimiento_prevision` VALUES (263, 7, 0.00, 1323.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:51', '2017-09-28 13:07:51', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 10, 88);
INSERT INTO `seguimiento_prevision` VALUES (264, 1, 0.00, 189.00, 189.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:51', '2017-09-28 13:07:51', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 10, 89);
INSERT INTO `seguimiento_prevision` VALUES (265, 1, 0.00, 189.00, 126.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:51', '2017-09-28 13:07:51', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 10, 90);
INSERT INTO `seguimiento_prevision` VALUES (266, 1, 0.00, 189.00, 187.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:56', '2017-09-28 13:07:56', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 11, 67);
INSERT INTO `seguimiento_prevision` VALUES (267, 6, 0.00, 1134.00, 1040.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 'La ocupabilidad confirmada del mes es de 92.00% para 6 personas con un nivel de facturabilidad del 100.00%. Comentario de Produccion', NULL, 100.00, 92.00, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:56', '2019-01-07 19:48:14', 4, '10.10.1.131', 'CLRLAP034.fractal.local', 11, 68);
INSERT INTO `seguimiento_prevision` VALUES (268, 2, 54.00, 324.00, 189.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:56', '2017-09-28 13:07:56', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 11, 69);
INSERT INTO `seguimiento_prevision` VALUES (269, 3, 36.00, 531.00, 567.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:56', '2017-09-28 13:07:56', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 11, 70);
INSERT INTO `seguimiento_prevision` VALUES (270, 3, 45.00, 522.00, 567.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:56', '2017-09-28 13:07:56', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 11, 71);
INSERT INTO `seguimiento_prevision` VALUES (271, 5, 0.00, 945.00, 567.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:56', '2017-09-28 13:07:56', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 11, 72);
INSERT INTO `seguimiento_prevision` VALUES (272, 6, 108.00, 1026.00, 837.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:56', '2017-09-28 13:07:56', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 11, 73);
INSERT INTO `seguimiento_prevision` VALUES (273, 1, 0.00, 189.00, 189.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:56', '2017-09-28 13:07:56', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 11, 74);
INSERT INTO `seguimiento_prevision` VALUES (274, 9, 45.00, 1656.00, 1656.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:56', '2017-09-28 13:07:56', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 11, 75);
INSERT INTO `seguimiento_prevision` VALUES (275, 2, 27.00, 351.00, 378.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:56', '2017-09-28 13:07:56', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 11, 76);
INSERT INTO `seguimiento_prevision` VALUES (276, 5, 90.00, 855.00, 756.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:56', '2017-09-28 13:07:56', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 11, 77);
INSERT INTO `seguimiento_prevision` VALUES (277, 6, 90.00, 1044.00, 945.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:56', '2017-09-28 13:07:56', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 11, 78);
INSERT INTO `seguimiento_prevision` VALUES (278, 3, 27.00, 540.00, 378.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:56', '2017-09-28 13:07:56', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 11, 79);
INSERT INTO `seguimiento_prevision` VALUES (279, 5, 63.00, 882.00, 756.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:56', '2017-09-28 13:07:56', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 11, 80);
INSERT INTO `seguimiento_prevision` VALUES (280, 2, 45.00, 333.00, 378.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:56', '2017-09-28 13:07:56', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 11, 81);
INSERT INTO `seguimiento_prevision` VALUES (281, 11, 0.00, 2079.00, 2079.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:56', '2017-09-28 13:07:56', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 11, 82);
INSERT INTO `seguimiento_prevision` VALUES (282, 0, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:56', '2017-09-28 13:07:56', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 11, 83);
INSERT INTO `seguimiento_prevision` VALUES (283, 12, 90.00, 2178.00, 1890.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:56', '2017-09-28 13:07:56', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 11, 84);
INSERT INTO `seguimiento_prevision` VALUES (284, 11, 126.00, 1953.00, 1124.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:56', '2017-09-28 13:07:56', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 11, 85);
INSERT INTO `seguimiento_prevision` VALUES (285, 15, 189.00, 2646.00, 2240.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:56', '2017-09-28 13:07:56', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 11, 86);
INSERT INTO `seguimiento_prevision` VALUES (286, 1, 0.00, 189.00, 189.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:56', '2017-09-28 13:07:56', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 11, 87);
INSERT INTO `seguimiento_prevision` VALUES (287, 7, 0.00, 1323.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:56', '2017-09-28 13:07:56', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 11, 88);
INSERT INTO `seguimiento_prevision` VALUES (288, 1, 0.00, 189.00, 189.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:56', '2017-09-28 13:07:56', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 11, 89);
INSERT INTO `seguimiento_prevision` VALUES (289, 1, 0.00, 189.00, 126.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2017-09-28 13:07:56', '2017-09-28 13:07:56', 2, '10.232.124.129', 'LIM-5CG5114L3Z', 11, 90);

-- ----------------------------
-- Table structure for tecnologia
-- ----------------------------
DROP TABLE IF EXISTS `tecnologia`;
CREATE TABLE `tecnologia`  (
  `id_tecnologia` int(8) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `grupo` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `eliminado` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'Eliminado : 1 : Si, 0 : No',
  `fchRg` timestamp(0) NULL DEFAULT NULL COMMENT 'Fecha de Registro',
  `fchAc` timestamp(0) NULL DEFAULT NULL COMMENT 'Fecha de Actualizacion',
  `usrId` int(8) NULL DEFAULT NULL COMMENT 'FK Usuario Modificacion/Creacion/Eliminacion',
  `ipAdd` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'Ip Address',
  `hosNm` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'HostName',
  PRIMARY KEY (`id_tecnologia`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tecnologia
-- ----------------------------
INSERT INTO `tecnologia` VALUES (1, '.NET', 'programacion', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL);
INSERT INTO `tecnologia` VALUES (2, 'IBM-ESQL', 'programacion', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL);
INSERT INTO `tecnologia` VALUES (3, 'JAVA', 'programacion.', '0', '2017-07-05 01:00:00', '2017-08-03 11:20:37', 4, '10.232.101.243', 'LIM-MXL5510MRN.usersad.everis.int');
INSERT INTO `tecnologia` VALUES (4, 'SAP', 'programacion', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL);
INSERT INTO `tecnologia` VALUES (5, 'Testing', 'herramientas', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL);
INSERT INTO `tecnologia` VALUES (6, 'BI - Análisis y Reporting', 'herramientas', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL);
INSERT INTO `tecnologia` VALUES (7, 'EVERILION', 'programacion', '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario`  (
  `id_usuario` int(8) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fecha` date NULL DEFAULT NULL,
  `estado` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `foto` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fsw` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'Forgot Password (Codigo Para recuperar Contraseña) , NUMERO ENTERO de 5 digitos , random ',
  `fchRgFsw` timestamp(0) NULL DEFAULT NULL COMMENT 'Fecha de Registro del codigo de Forgot Password (Codigo Para recuperar Contraseña) , NUMERO ENTERO de 5 digitos , random ',
  `eliminado` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'Eliminado : 1 : Si, 0 : No',
  `fchRg` timestamp(0) NULL DEFAULT NULL COMMENT 'Fecha de Registro',
  `fchAc` timestamp(0) NULL DEFAULT NULL COMMENT 'Fecha de Actualizacion',
  `usrId` int(8) NULL DEFAULT NULL COMMENT 'FK Usuario Modificacion/Creacion/Eliminacion',
  `ipAdd` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'Ip Address',
  `hosNm` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'HostName',
  `fk_permiso` int(8) NULL DEFAULT NULL,
  `fk_empleado` int(8) NULL DEFAULT NULL,
  PRIMARY KEY (`id_usuario`) USING BTREE,
  INDEX `fk_usuario_empleado_1`(`fk_empleado`) USING BTREE,
  INDEX `fk_usuario_permiso_1`(`fk_permiso`) USING BTREE,
  CONSTRAINT `fk_usuario_empleado_1` FOREIGN KEY (`fk_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_usuario_permiso_1` FOREIGN KEY (`fk_permiso`) REFERENCES `permiso` (`id_permiso`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES (1, 'Jose Vasquez Pereyra', 'jvasquezp', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'jose.humberto.vasquez.pereyra@everis.com', '2019-01-13', '1', '', NULL, NULL, '0', '2017-07-05 01:00:00', '2019-01-13 14:49:16', 4, '10.10.1.131', 'CLRLAP034.fractal.local', 1, 107);
INSERT INTO `usuario` VALUES (2, 'Felipe Cieza Muñoz', 'aciezamu', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'andres.felipe.cieza.munoz@everis.com', '2017-07-05', '1', 'assets/uploads/usuarios/0a3b01248188e0022c992a72fe4edeb8.jpg', NULL, NULL, '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, 2, 113);
INSERT INTO `usuario` VALUES (3, 'Juan Rafael Noriega Acayturri', 'jnoriegaa', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'juan.rafael.noriega.acayturri@everis.com', '2017-07-05', '1', 'assets/uploads/usuarios/d174d7c0d74db61fa232eaaed0bcc790.jpg', NULL, NULL, '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, 3, 20);
INSERT INTO `usuario` VALUES (4, 'Administrador SISCAR', 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'everis.car.trujillo@gmail.com', '2017-07-05', '1', 'assets/uploads/usuarios/40942b57e309b819940ea2880c62a891.png', NULL, NULL, '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, 1, NULL);
INSERT INTO `usuario` VALUES (8, 'Fiorella Yoplac Torres', 'fyoplact', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'fiorella.yoplac.torres@everis.com', '2017-07-05', '1', '', NULL, NULL, '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, 3, 14);
INSERT INTO `usuario` VALUES (9, 'Herbert Ortiz Huayaney', 'hortizh', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'herbert.junior.ortiz.huayaney@everis.com', '2017-07-05', '1', '', NULL, NULL, '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, 3, 34);
INSERT INTO `usuario` VALUES (11, 'Edwin Arribasplata Gutierrez.', 'earribasplatag', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'edwin.john.arribasplata.gutierrez@everis.com', '2018-11-02', '1', '', NULL, NULL, '0', '2017-07-05 01:00:00', '2018-11-02 15:34:50', 4, '10.10.1.131', 'CLRLAP034.fractal.local', 3, 35);
INSERT INTO `usuario` VALUES (12, 'Fabio Enrique Castillo Galindo', 'fcastillog', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'fabio.enrique.castillo.galindo@everis.com', '2017-07-05', '1', '', NULL, NULL, '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, 5, 62);
INSERT INTO `usuario` VALUES (13, 'Greta Paredes Purizaga  ', 'gparedesp', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'greta.de.jesus.paredes.purizaga@everis.com', '2017-07-05', '1', '', NULL, NULL, '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, 4, 106);
INSERT INTO `usuario` VALUES (14, ' Armando Edinson Astudillo Moscol', 'aastudillom', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'armando.edinson.astudillo.moscol@everis.com', '2017-07-10', '1', '', NULL, NULL, '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, 3, 1);
INSERT INTO `usuario` VALUES (15, 'Jesus Jhonny Vásquez Cabos', 'jvasquec', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'jesus.jhonny.vasquez.cabos@everis.com', '2017-09-28', '1', '', NULL, NULL, '0', '2017-07-05 01:00:00', '2017-09-28 12:23:08', 4, '10.232.101.236', 'LIM-MXL5510MRN', 3, 98);
INSERT INTO `usuario` VALUES (16, 'Víctor Valdiviezo Oviedo', 'vvaldivo', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'jguillermo_2103@hotmail.com', '2017-08-01', '1', '', NULL, NULL, '0', '2017-07-05 01:00:00', '2017-07-05 01:00:00', NULL, NULL, NULL, 3, 30);
INSERT INTO `usuario` VALUES (17, 'Gianmarco Renato Doza Caballero', 'gdozac', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'gianmarco.renato.doza.caballero@everis.com', '2017-09-08', '1', '', NULL, NULL, '0', '2017-09-08 12:33:10', '2017-09-08 12:33:10', 4, '10.232.100.149', 'LIM-MXL5510MRN', 3, 114);
INSERT INTO `usuario` VALUES (18, 'Jose Guillermo Quintanilla Paredes', 'jquintap', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'gquintanillaparedes@gmail.com', '2019-01-14', '1', '', NULL, NULL, '0', '2019-01-03 17:25:43', '2019-01-03 17:25:43', 4, '10.10.1.131', 'CLRLAP034.fractal.local', 1, 53);

-- ----------------------------
-- Table structure for vacaciones
-- ----------------------------
DROP TABLE IF EXISTS `vacaciones`;
CREATE TABLE `vacaciones`  (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL,
  `color` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `start` timestamp(0) NULL DEFAULT NULL,
  `end` timestamp(0) NULL DEFAULT NULL,
  `allDay` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `fk_empleado` int(11) NULL DEFAULT NULL,
  `fk_dominio` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_empleado`(`fk_empleado`, `fk_dominio`) USING BTREE,
  INDEX `fk_vacaciones_dominio_1`(`fk_dominio`) USING BTREE,
  CONSTRAINT `fk_vacaciones_dominio_1` FOREIGN KEY (`fk_dominio`) REFERENCES `dominio` (`id_dominio`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_vacaciones_empleado_1` FOREIGN KEY (`fk_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of vacaciones
-- ----------------------------
INSERT INTO `vacaciones` VALUES (1, 'Vacaciones Guillermo Quintanilla', 'Vacaciones de Guillermo Quintanilla', '#e00909', '2018-10-09 00:00:00', '2018-10-13 00:00:00', 'true', 53, 9);
INSERT INTO `vacaciones` VALUES (2, 'Vacaciones Guillermo', 'Vacaciones GuillermoVacaciones GuillermoVacaciones Guillermo', '#1111d0', '2019-01-16 00:00:00', '2019-01-21 00:00:00', 'true', 53, 9);

-- ----------------------------
-- Procedure structure for autoCompleteEmpleado
-- ----------------------------
DROP PROCEDURE IF EXISTS `autoCompleteEmpleado`;
delimiter ;;
CREATE PROCEDURE `autoCompleteEmpleado`(IN parametro VARCHAR(100))
BEGIN
   SELECT * FROM empleado WHERE nombres LIKE CONCAT('%', parametro , '%') AND estado = 1;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for autoCompleteUsuario
-- ----------------------------
DROP PROCEDURE IF EXISTS `autoCompleteUsuario`;
delimiter ;;
CREATE PROCEDURE `autoCompleteUsuario`(IN parametro VARCHAR(100))
BEGIN
   SELECT * FROM usuario WHERE username LIKE CONCAT(parametro,'%') AND estado = 1;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for bloquear_prevision
-- ----------------------------
DROP PROCEDURE IF EXISTS `bloquear_prevision`;
delimiter ;;
CREATE PROCEDURE `bloquear_prevision`(IN fecha VARCHAR(50),
    IN flag_bloqueo VARCHAR(10),
    IN in_id_prevision INT(8))
BEGIN
DECLARE EXIT HANDLER FOR SQLEXCEPTION ROLLBACK;
DECLARE EXIT HANDLER FOR SQLWARNING ROLLBACK;
START TRANSACTION;
UPDATE prevision_dominio SET flag_bloqueo = flag_bloqueo, fecha = STR_TO_DATE(fecha,'%Y-%m-%d') 
WHERE fk_prevision = in_id_prevision;
UPDATE prevision SET flag_bloqueo = flag_bloqueo, fecha = STR_TO_DATE(fecha,'%Y-%m-%d') 
WHERE id_prevision = in_id_prevision;
COMMIT;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for bloquear_seguimiento
-- ----------------------------
DROP PROCEDURE IF EXISTS `bloquear_seguimiento`;
delimiter ;;
CREATE PROCEDURE `bloquear_seguimiento`(IN id_seguimiento_in INT(8),
	IN flag_bloqueo VARCHAR(1),
	IN fecha VARCHAR(50),
	IN fchAc VARCHAR(50),
	IN usrId INT(8),
	IN ipAdd VARCHAR(100),
	IN hosNm VARCHAR(200))
BEGIN
DECLARE EXIT HANDLER FOR SQLEXCEPTION ROLLBACK;
DECLARE EXIT HANDLER FOR SQLWARNING ROLLBACK;
START TRANSACTION;
UPDATE seguimiento SET flag_bloqueo = flag_bloqueo, fecha = fecha WHERE id_seguimiento = id_seguimiento_in;
UPDATE seguimiento_prevision SET flag_bloqueo = flag_bloqueo, fchAc = fchAc, usrId = usrId,
 ipAdd = ipAdd, hosNm = hosNm WHERE fk_seguimiento = id_seguimiento_in;
COMMIT;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for eliminar_leccion_aprendida
-- ----------------------------
DROP PROCEDURE IF EXISTS `eliminar_leccion_aprendida`;
delimiter ;;
CREATE PROCEDURE `eliminar_leccion_aprendida`(IN in_id_leccion_aprendida INT(8))
BEGIN
DECLARE EXIT HANDLER FOR SQLEXCEPTION ROLLBACK;
DECLARE EXIT HANDLER FOR SQLWARNING ROLLBACK;
START TRANSACTION;
DELETE FROM leccion_aprendida WHERE id_leccion_aprendida = in_id_leccion_aprendida;
COMMIT;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for eliminar_prevision
-- ----------------------------
DROP PROCEDURE IF EXISTS `eliminar_prevision`;
delimiter ;;
CREATE PROCEDURE `eliminar_prevision`(IN in_id_prevision INT(8))
BEGIN
DECLARE EXIT HANDLER FOR SQLEXCEPTION ROLLBACK;
DECLARE EXIT HANDLER FOR SQLWARNING ROLLBACK;
START TRANSACTION;
DELETE FROM prevision_dominio WHERE fk_prevision = in_id_prevision;
DELETE FROM prevision WHERE id_prevision = in_id_prevision;
COMMIT;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for eliminar_seguimiento
-- ----------------------------
DROP PROCEDURE IF EXISTS `eliminar_seguimiento`;
delimiter ;;
CREATE PROCEDURE `eliminar_seguimiento`(IN in_id_seguimiento INT)
BEGIN
DECLARE EXIT HANDLER FOR SQLEXCEPTION ROLLBACK;
DECLARE EXIT HANDLER FOR SQLWARNING ROLLBACK;
START TRANSACTION;
DELETE FROM seguimiento_prevision WHERE fk_seguimiento = in_id_seguimiento;
DELETE FROM seguimiento WHERE id_seguimiento = in_id_seguimiento;
COMMIT;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for existe_prevision
-- ----------------------------
DROP PROCEDURE IF EXISTS `existe_prevision`;
delimiter ;;
CREATE PROCEDURE `existe_prevision`(IN fecha_corte_in VARCHAR(100))
BEGIN
   SELECT * FROM prevision WHERE YEAR(mes_anio) = YEAR(STR_TO_DATE(fecha_corte_in,'%Y-%m-%d')) 
		AND MONTH(mes_anio) = MONTH(STR_TO_DATE(fecha_corte_in,'%Y-%m-%d'));
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for getHistory_emplado_categoria
-- ----------------------------
DROP PROCEDURE IF EXISTS `getHistory_emplado_categoria`;
delimiter ;;
CREATE PROCEDURE `getHistory_emplado_categoria`(IN id_empleado_in INT)
BEGIN
   SELECT empleado.*,empleado_categoria.*,categoria.* FROM empleado
        JOIN empleado_categoria ON empleado.id_empleado = empleado_categoria.fk_empleado
        JOIN categoria ON categoria.id_categoria = empleado_categoria.fk_categoria WHERE empleado.id_empleado = id_empleado_in
        ORDER BY empleado_categoria.fecha DESC;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for getHistory_empleado_dominio
-- ----------------------------
DROP PROCEDURE IF EXISTS `getHistory_empleado_dominio`;
delimiter ;;
CREATE PROCEDURE `getHistory_empleado_dominio`(IN id_empleado_in INT)
BEGIN
   SELECT empleado.*,ed.*,dominio.*,ed.fecha as fecha_historial,ed.descripcion as descripcion_cambio FROM empleado
        JOIN empleado_dominio ed ON empleado.id_empleado = ed.fk_empleado
        JOIN dominio ON dominio.id_dominio = ed.fk_dominio WHERE empleado.id_empleado = id_empleado_in
        ORDER BY ed.fecha DESC;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for getHistory_empleado_tecnologia
-- ----------------------------
DROP PROCEDURE IF EXISTS `getHistory_empleado_tecnologia`;
delimiter ;;
CREATE PROCEDURE `getHistory_empleado_tecnologia`(IN id_empleado_in INT)
BEGIN
   SELECT empleado.*,empleado_tecnologia.*,tecnologia.* FROM empleado 
        JOIN empleado_tecnologia ON empleado.id_empleado = empleado_tecnologia.fk_empleado
        JOIN tecnologia ON tecnologia.id_tecnologia = empleado_tecnologia.fk_tecnologia WHERE empleado.id_empleado = id_empleado_in
        ORDER BY empleado_tecnologia.fecha DESC;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for getLiderHistory
-- ----------------------------
DROP PROCEDURE IF EXISTS `getLiderHistory`;
delimiter ;;
CREATE PROCEDURE `getLiderHistory`(IN fk_empleado_in INT)
BEGIN
   SELECT empleado_lider_dominio.* FROM empleado
        JOIN empleado_lider_dominio ON empleado.id_empleado = empleado_lider_dominio.fk_empleado
        WHERE empleado_lider_dominio.fk_empleado = fk_empleado_in
        ORDER BY empleado_lider_dominio.fchRg DESC;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_all_categorias
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_all_categorias`;
delimiter ;;
CREATE PROCEDURE `get_all_categorias`()
BEGIN
   SELECT * FROM categoria ORDER BY nivel DESC;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_all_clientes
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_all_clientes`;
delimiter ;;
CREATE PROCEDURE `get_all_clientes`()
BEGIN
   SELECT * FROM cliente WHERE estado = 1;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_all_cumpleanios_data
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_all_cumpleanios_data`;
delimiter ;;
CREATE PROCEDURE `get_all_cumpleanios_data`(IN start_in VARCHAR(100),
	IN end_in VARCHAR(100))
BEGIN
    SELECT 
    DATE(CONCAT(YEAR(NOW()),"-",MONTH(empleado.fecha_nacimiento),"-",DAY(empleado.fecha_nacimiento))) as inicio,
    CONCAT(empleado.nombres," ",empleado.apellidos) as titulo
    FROM empleado WHERE DATE(CONCAT(YEAR(NOW()),"-",MONTH(empleado.fecha_nacimiento),"-",DAY(empleado.fecha_nacimiento))) BETWEEN DATE(start_in) AND DATE(end_in);
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_all_cumpleanios_fecha
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_all_cumpleanios_fecha`;
delimiter ;;
CREATE PROCEDURE `get_all_cumpleanios_fecha`(IN fecha_in VARCHAR(100))
BEGIN
   SELECT 
        CONCAT(empleado.nombres," ",empleado.apellidos) as nombres_empleado
        FROM empleado WHERE DATE(CONCAT(YEAR(NOW()),"-",MONTH(empleado.fecha_nacimiento),"-",DAY(empleado.fecha_nacimiento))) = DATE(fecha_in);
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_all_dominios
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_all_dominios`;
delimiter ;;
CREATE PROCEDURE `get_all_dominios`()
BEGIN
SELECT * FROM dominio WHERE estado = 1 ORDER BY nombre;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_all_dominios_cliente
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_all_dominios_cliente`;
delimiter ;;
CREATE PROCEDURE `get_all_dominios_cliente`()
BEGIN
   SELECT dominio.*,cliente.nombre as cliente,COUNT(empleado.id_empleado) as nro_empleados FROM dominio
        JOIN cliente ON cliente.id_cliente = dominio.fk_cliente
        JOIN (SELECT t1.*
        FROM empleado_dominio  t1
        WHERE t1.fecha = (SELECT MAX(t2.fecha)
                         FROM empleado_dominio t2
                         WHERE t2.fk_empleado = t1.fk_empleado))temp_dom ON (temp_dom.fk_dominio = dominio.id_dominio)
        JOIN empleado ON empleado.id_empleado = temp_dom.fk_empleado
        WHERE empleado.estado = 1
        GROUP BY dominio.id_dominio;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_all_empleado
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_all_empleado`;
delimiter ;;
CREATE PROCEDURE `get_all_empleado`()
BEGIN
     SELECT empleado.*,dominio.nombre as nombredominio,categoria.codigo as nombrecategoria FROM empleado
			JOIN (SELECT t1.*
			FROM empleado_dominio  t1
			WHERE t1.fecha = (SELECT MAX(t2.fecha)
															 FROM empleado_dominio t2
															 WHERE t2.fk_empleado = t1.fk_empleado))temp_dom ON (temp_dom.fk_empleado = empleado.id_empleado)
			JOIN dominio ON dominio.id_dominio = temp_dom.fk_dominio
			JOIN (SELECT t1.*
			FROM empleado_categoria  t1
			WHERE t1.fecha = (SELECT MAX(t2.fecha)
															 FROM empleado_categoria t2
															 WHERE t2.fk_empleado = t1.fk_empleado))temp_cat ON (temp_cat.fk_empleado = empleado.id_empleado)
			JOIN categoria ON categoria.id_categoria = temp_cat.fk_categoria
			WHERE empleado.estado = 1
			ORDER BY empleado.apellidos ASC;
   END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_all_empleado_2
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_all_empleado_2`;
delimiter ;;
CREATE PROCEDURE `get_all_empleado_2`()
BEGIN
  SELECT empleado.*,dominio.nombre as nombredominio,categoria.codigo as nombrecategoria FROM empleado
  LEFT JOIN dominio ON dominio.id_dominio = empleado.fk_dominio
  LEFT JOIN categoria ON categoria.id_categoria = empleado.fk_categoria
  WHERE empleado.estado = 1
  ORDER BY empleado.apellidos ASC;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_all_empleado_data
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_all_empleado_data`;
delimiter ;;
CREATE PROCEDURE `get_all_empleado_data`()
BEGIN
     SELECT empleado.* FROM empleado WHERE empleado.estado = 1 ORDER BY empleado.apellidos ASC;
   END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_all_empleado_filtro_fechas
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_all_empleado_filtro_fechas`;
delimiter ;;
CREATE PROCEDURE `get_all_empleado_filtro_fechas`(IN fecha_consulta VARCHAR(100))
BEGIN
    SELECT empleado.*,dominio.nombre as nombredominio,categoria.codigo as nombrecategoria FROM empleado
        JOIN (SELECT t1.*
        FROM empleado_dominio  t1
        WHERE t1.fecha = (SELECT MAX(t2.fecha)
                         FROM empleado_dominio t2
                         WHERE t2.fk_empleado = t1.fk_empleado AND t2.fecha <= CAST(fecha_consulta AS DATE) )) temp_dom ON (temp_dom.fk_empleado = empleado.id_empleado)
        JOIN dominio ON dominio.id_dominio = temp_dom.fk_dominio
        JOIN (SELECT t1.*
        FROM empleado_categoria  t1
        WHERE t1.fecha = (SELECT MAX(t2.fecha)
                         FROM empleado_categoria t2
                         WHERE t2.fk_empleado = t1.fk_empleado AND t2.fecha <= CAST(fecha_consulta AS DATE))) temp_cat ON (temp_cat.fk_empleado = empleado.id_empleado)
        JOIN categoria ON categoria.id_categoria = temp_cat.fk_categoria
	WHERE  (empleado.fecha_ingreso <= CAST(fecha_consulta AS DATE)) AND ( empleado.fecha_salida IS NULL OR empleado.fecha_salida >= CAST(fecha_consulta AS DATE));
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_all_empleado_por_dominio
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_all_empleado_por_dominio`;
delimiter ;;
CREATE PROCEDURE `get_all_empleado_por_dominio`(IN id_dominio_in INT)
BEGIN
   SELECT empleado.*,categoria.codigo as nombrecategoria FROM empleado
        JOIN (SELECT t1.*
        FROM empleado_dominio  t1
        WHERE t1.fecha = (SELECT MAX(t2.fecha)
                         FROM empleado_dominio t2
                         WHERE t2.fk_empleado = t1.fk_empleado))temp_dom ON (temp_dom.fk_empleado = empleado.id_empleado)
        JOIN dominio ON dominio.id_dominio = temp_dom.fk_dominio
        JOIN (SELECT t1.*
        FROM empleado_categoria  t1
        WHERE t1.fecha = (SELECT MAX(t2.fecha)
                         FROM empleado_categoria t2
                         WHERE t2.fk_empleado = t1.fk_empleado))temp_cat ON (temp_cat.fk_empleado = empleado.id_empleado)
        JOIN categoria ON categoria.id_categoria = temp_cat.fk_categoria
        WHERE empleado.estado = 1 AND temp_dom.fk_dominio = id_dominio_in
        ORDER BY categoria.nivel DESC;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_all_etiquetas
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_all_etiquetas`;
delimiter ;;
CREATE PROCEDURE `get_all_etiquetas`()
BEGIN
SELECT etiqueta.* FROM etiqueta;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_all_instituciones
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_all_instituciones`;
delimiter ;;
CREATE PROCEDURE `get_all_instituciones`()
BEGIN
   SELECT * FROM institucion_educativa;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_all_lecciones_aprendidas
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_all_lecciones_aprendidas`;
delimiter ;;
CREATE PROCEDURE `get_all_lecciones_aprendidas`()
BEGIN
SELECT leccion_aprendida.*,dominio.nombre as nombredominio,usuario.nombre as nombreusuario FROM leccion_aprendida
JOIN dominio ON dominio.id_dominio = leccion_aprendida.fk_dominio
JOIN usuario ON usuario.id_usuario = leccion_aprendida.fk_usuario
WHERE leccion_aprendida.eliminado <> '1';
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_all_lecciones_busqueda
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_all_lecciones_busqueda`;
delimiter ;;
CREATE PROCEDURE `get_all_lecciones_busqueda`(IN asunto VARCHAR(100))
BEGIN
SELECT leccion_aprendida.*,dominio.nombre as nombredominio,usuario.nombre as nombreusuario FROM leccion_aprendida
JOIN dominio ON dominio.id_dominio = leccion_aprendida.fk_dominio
JOIN usuario ON usuario.id_usuario = leccion_aprendida.fk_usuario
WHERE leccion_aprendida.eliminado <> '1' AND (leccion_aprendida.nombre LIKE CONCAT('%',asunto,'%') OR leccion_aprendida.descripcion LIKE CONCAT('%',asunto,'%'));
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_all_permisos
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_all_permisos`;
delimiter ;;
CREATE PROCEDURE `get_all_permisos`()
BEGIN
   SELECT * FROM permiso;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_all_prevision
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_all_prevision`;
delimiter ;;
CREATE PROCEDURE `get_all_prevision`()
BEGIN
   SELECT * FROM prevision WHERE estado = 1;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_all_roles
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_all_roles`;
delimiter ;;
CREATE PROCEDURE `get_all_roles`()
BEGIN
SELECT * FROM rol WHERE estado = 1 ORDER BY nombre;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_all_seguimiento
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_all_seguimiento`;
delimiter ;;
CREATE PROCEDURE `get_all_seguimiento`()
BEGIN
   SELECT * FROM seguimiento;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_all_seguimiento_avance
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_all_seguimiento_avance`;
delimiter ;;
CREATE PROCEDURE `get_all_seguimiento_avance`()
BEGIN
SELECT seguimiento.*,COUNT(seguimiento_prevision.hrs_plan_meta)/COUNT(seguimiento_prevision.hrs_plan_meta IS NULL)*100 as avance FROM seguimiento
JOIN seguimiento_prevision ON seguimiento_prevision.fk_seguimiento = seguimiento.id_seguimiento
GROUP BY seguimiento_prevision.fk_seguimiento;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_all_seguimiento_x_usuario
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_all_seguimiento_x_usuario`;
delimiter ;;
CREATE PROCEDURE `get_all_seguimiento_x_usuario`()
BEGIN
   SELECT * FROM prevision WHERE estado = 1;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_all_tecnologias
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_all_tecnologias`;
delimiter ;;
CREATE PROCEDURE `get_all_tecnologias`()
BEGIN
   SELECT * FROM tecnologia WHERE eliminado != 1;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_all_usuarios
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_all_usuarios`;
delimiter ;;
CREATE PROCEDURE `get_all_usuarios`()
BEGIN
   SELECT usuario.*, permiso.nombre as permiso FROM usuario JOIN permiso ON usuario.fk_permiso = permiso.id_permiso WHERE usuario.estado = 1;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_all_usuarios_lideres
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_all_usuarios_lideres`;
delimiter ;;
CREATE PROCEDURE `get_all_usuarios_lideres`()
BEGIN
  SELECT usuario.email,CONCAT(empleado.nombres," ",empleado.apellidos) as nomcompletos,empleado_lider_dominio.dominios FROM usuario
  JOIN empleado ON empleado.id_empleado = usuario.fk_empleado
  JOIN empleado_lider_dominio ON empleado.id_empleado = empleado_lider_dominio.fk_empleado;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_dominios_prevision
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_dominios_prevision`;
delimiter ;;
CREATE PROCEDURE `get_dominios_prevision`(IN fk_prevision_in INT)
BEGIN
   SELECT * FROM prevision_dominio WHERE fk_prevision = fk_prevision_in;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_empleados_data_by_fk_dominio
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_empleados_data_by_fk_dominio`;
delimiter ;;
CREATE PROCEDURE `get_empleados_data_by_fk_dominio`(IN fk_dominio_in INT)
BEGIN
   SELECT empleado.*,categoria.codigo as nombrecategoria,rol.nombre as nombrerol,
        CONCAT(TIMESTAMPDIFF( YEAR, empleado.fecha_ingreso, now() ),' Años, ',
        TIMESTAMPDIFF( MONTH, empleado.fecha_ingreso, now() ) % 12,' Meses, ',
        FLOOR( TIMESTAMPDIFF( DAY, empleado.fecha_ingreso, now() ) % 30.4375 ),' Dias')
        as tiempo
        FROM empleado 
        JOIN categoria ON categoria.id_categoria = empleado.fk_categoria
        JOIN rol ON rol.id_rol = empleado.fk_rol
        WHERE empleado.fk_dominio = fk_dominio_in AND empleado.estado = 1
        ORDER BY categoria.nivel DESC;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_historial_lecciones
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_historial_lecciones`;
delimiter ;;
CREATE PROCEDURE `get_historial_lecciones`()
BEGIN
SELECT leccion_aprendida.*,
CASE 
WHEN (leccion_aprendida.fchAc-leccion_aprendida.fchRg>0) 
	THEN '1' 
WHEN (leccion_aprendida.eliminado = '1') 
	THEN '2'
ELSE '0' END as operacion,
usuario.nombre as nombreusuario FROM leccion_aprendida
JOIN dominio ON dominio.id_dominio = leccion_aprendida.fk_dominio
JOIN usuario ON usuario.id_usuario = leccion_aprendida.fk_usuario;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_nro_empleados_por_dominio
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_nro_empleados_por_dominio`;
delimiter ;;
CREATE PROCEDURE `get_nro_empleados_por_dominio`()
BEGIN
   SELECT count(empleado.id_empleado) as nro_empleados,dominio.nombre as nombredominio FROM empleado
        JOIN (SELECT t1.*
        FROM empleado_dominio  t1
        WHERE t1.fecha = (SELECT MAX(t2.fecha)
                         FROM empleado_dominio t2
                         WHERE t2.fk_empleado = t1.fk_empleado))temp_dom ON (temp_dom.fk_empleado = empleado.id_empleado)
        JOIN dominio ON dominio.id_dominio = temp_dom.fk_dominio
        WHERE empleado.estado = 1
        GROUP BY temp_dom.fk_dominio ORDER BY empleado.apellidos ASC;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_one_dominio
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_one_dominio`;
delimiter ;;
CREATE PROCEDURE `get_one_dominio`(IN id_dominio_in INT)
BEGIN
   SELECT * FROM dominio WHERE id_dominio = id_dominio_in;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_one_dominio_cliente_by_id_dominio
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_one_dominio_cliente_by_id_dominio`;
delimiter ;;
CREATE PROCEDURE `get_one_dominio_cliente_by_id_dominio`(IN id_dominio_in INT)
BEGIN
   SELECT dominio.*,cliente.nombre as nombrecliente,cliente.descripcion as descripcioncliente FROM dominio 
        JOIN cliente ON cliente.id_cliente = dominio.fk_cliente
        WHERE id_dominio = id_dominio_in;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_one_empleado_categoria
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_one_empleado_categoria`;
delimiter ;;
CREATE PROCEDURE `get_one_empleado_categoria`(IN id_empleado_in INT)
BEGIN
    SELECT empleado.*,empleado_categoria.*,categoria.*,empleado_categoria.fecha as fecha_cambio_categoria FROM empleado
    JOIN empleado_categoria ON empleado.id_empleado = empleado_categoria.fk_empleado
    JOIN categoria ON categoria.id_categoria = empleado_categoria.fk_categoria WHERE empleado.id_empleado = id_empleado_in
    ORDER BY empleado_categoria.fecha DESC LIMIT 1;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_one_empleado_dominio
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_one_empleado_dominio`;
delimiter ;;
CREATE PROCEDURE `get_one_empleado_dominio`(IN id_empleado_in INT)
BEGIN
   SELECT empleado.*,empleado_dominio.*,dominio.*,empleado_dominio.fecha as fecha_cambio_dominio FROM empleado
        JOIN empleado_dominio ON empleado.id_empleado = empleado_dominio.fk_empleado
        JOIN dominio ON dominio.id_dominio = empleado_dominio.fk_dominio WHERE empleado.id_empleado = id_empleado_in
        ORDER BY empleado_dominio.fecha DESC LIMIT 1;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_one_empleado_edad
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_one_empleado_edad`;
delimiter ;;
CREATE PROCEDURE `get_one_empleado_edad`(IN id_empleado_in INT)
BEGIN
   SELECT empleado.*,TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) AS edad from empleado WHERE id_empleado = id_empleado_in;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_one_empleado_lider_dominio
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_one_empleado_lider_dominio`;
delimiter ;;
CREATE PROCEDURE `get_one_empleado_lider_dominio`(IN fk_empleado_in INT)
BEGIN
   SELECT empleado_lider_dominio.* FROM empleado
        JOIN empleado_lider_dominio ON empleado.id_empleado = empleado_lider_dominio.fk_empleado
        WHERE empleado_lider_dominio.fk_empleado = fk_empleado_in AND empleado_lider_dominio.eliminado = 0
        ORDER BY empleado_lider_dominio.fchRg DESC LIMIT 1;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_one_etiqueta
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_one_etiqueta`;
delimiter ;;
CREATE PROCEDURE `get_one_etiqueta`(IN in_id_etiqueta INT)
BEGIN
   SELECT * FROM etiqueta WHERE id_etiqueta = in_id_etiqueta;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_one_leccion_aprendida
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_one_leccion_aprendida`;
delimiter ;;
CREATE PROCEDURE `get_one_leccion_aprendida`(IN in_id_leccion_aprendida INT)
BEGIN
   SELECT * FROM leccion_aprendida WHERE id_leccion_aprendida = in_id_leccion_aprendida;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_one_permiso
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_one_permiso`;
delimiter ;;
CREATE PROCEDURE `get_one_permiso`(IN id_permiso_in INT)
BEGIN
   SELECT * FROM permiso WHERE id_permiso = id_permiso_in;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_one_prevision
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_one_prevision`;
delimiter ;;
CREATE PROCEDURE `get_one_prevision`(IN id_prevision_in INT)
BEGIN
   SELECT * FROM prevision WHERE id_prevision = id_prevision_in;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_one_seguimiento
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_one_seguimiento`;
delimiter ;;
CREATE PROCEDURE `get_one_seguimiento`(IN id_seguimiento_in INT)
BEGIN
   SELECT * FROM seguimiento WHERE id_seguimiento = id_seguimiento_in;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_one_seguimiento_prevision
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_one_seguimiento_prevision`;
delimiter ;;
CREATE PROCEDURE `get_one_seguimiento_prevision`(IN id_seguimiento_prevision_in INT)
BEGIN
   SELECT sp.*,
   d.nombre as dominio,c.nombre as cliente,pd.nro_empleados as nro_empleados_prev,pd.nro_vacaciones as nro_vacaciones_prev,pd.hrs_disponibles as hrs_disponibles_prev,
   pd.hrs_solutions as hrs_solutions_prev,pd.fk_dominio FROM seguimiento_prevision sp
        JOIN prevision_dominio pd ON pd.id_prevision_dominio = sp.fk_prevision_dominio
        JOIN dominio d ON d.id_dominio =  pd.fk_dominio
        JOIN cliente c ON c.id_cliente = d.fk_cliente
        WHERE sp.id_seguimiento_prevision = id_seguimiento_prevision_in;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_one_usuario_empleado
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_one_usuario_empleado`;
delimiter ;;
CREATE PROCEDURE `get_one_usuario_empleado`(IN cod_empleado_in VARCHAR(10))
BEGIN
   SELECT usuario.*,empleado.*,permiso.nombre as nombre_permiso
        FROM usuario 
        JOIN empleado ON empleado.id_empleado = usuario.fk_empleado
        JOIN permiso ON usuario.fk_permiso = permiso.id_permiso
        WHERE empleado.cod_empleado = cod_empleado_in AND empleado.estado = 1;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_one_usuario_permiso
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_one_usuario_permiso`;
delimiter ;;
CREATE PROCEDURE `get_one_usuario_permiso`(IN username_in VARCHAR(50),
		IN password_in VARCHAR(100))
BEGIN
   SELECT usuario.*,permiso.nombre as nombre_permiso FROM usuario
        JOIN permiso ON usuario.fk_permiso = permiso.id_permiso
        WHERE username = username_in AND password = password_in;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_prevision_dominio_by_fk_prevision
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_prevision_dominio_by_fk_prevision`;
delimiter ;;
CREATE PROCEDURE `get_prevision_dominio_by_fk_prevision`(IN fk_prevision_in INT)
BEGIN
    SELECT pd.*,d.nombre as dominio,c.nombre as cliente FROM prevision_dominio pd
		JOIN dominio d ON d.id_dominio =  pd.fk_dominio
		JOIN cliente c ON c.id_cliente = d.fk_cliente
		WHERE fk_prevision = fk_prevision_in;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_seguimiento_prevision_by_fk_seguimiento
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_seguimiento_prevision_by_fk_seguimiento`;
delimiter ;;
CREATE PROCEDURE `get_seguimiento_prevision_by_fk_seguimiento`(IN fk_seguimiento_in INT)
BEGIN
   SELECT sp.*,d.nombre as dominio,c.nombre as cliente,pd.nro_empleados,pd.nro_vacaciones,pd.hrs_disponibles,pd.hrs_solutions,pd.fk_dominio FROM seguimiento_prevision sp
        JOIN prevision_dominio pd ON pd.id_prevision_dominio = sp.fk_prevision_dominio
        JOIN dominio d ON d.id_dominio =  pd.fk_dominio
        JOIN cliente c ON c.id_cliente = d.fk_cliente
        WHERE fk_seguimiento = fk_seguimiento_in;
END
;;
delimiter ;

-- ----------------------------
-- Function structure for HTML_UnEncode
-- ----------------------------
DROP FUNCTION IF EXISTS `HTML_UnEncode`;
delimiter ;;
CREATE FUNCTION `HTML_UnEncode`(x VARCHAR(255))
 RETURNS varchar(255) CHARSET latin1
BEGIN 

DECLARE TextString VARCHAR(255) ; 
SET TextString = x ; 

#quotation mark 
IF INSTR( x , '&quot;' ) 
THEN SET TextString = REPLACE(TextString, '&quot;','"') ; 
END IF ; 

#apostrophe  
IF INSTR( x , '&apos;' ) 
THEN SET TextString = REPLACE(TextString, '&apos;','"') ; 
END IF ; 

#ampersand 
IF INSTR( x , '&amp;' ) 
THEN SET TextString = REPLACE(TextString, '&amp;','&') ; 
END IF ; 

#less-than 
IF INSTR( x , '&lt;' ) 
THEN SET TextString = REPLACE(TextString, '&lt;','<') ; 
END IF ; 

#greater-than 
IF INSTR( x , '&gt;' ) 
THEN SET TextString = REPLACE(TextString, '&gt;','>') ; 
END IF ; 

#non-breaking space 
IF INSTR( x , '&nbsp;' ) 
THEN SET TextString = REPLACE(TextString, '&nbsp;',' ') ; 
END IF ; 

#inverted exclamation mark 
IF INSTR( x , '&iexcl;' ) 
THEN SET TextString = REPLACE(TextString, '&iexcl;','¡') ; 
END IF ; 

#cent 
IF INSTR( x , '&cent;' ) 
THEN SET TextString = REPLACE(TextString, '&cent;','¢') ; 
END IF ; 

#pound 
IF INSTR( x , '&pound;' ) 
THEN SET TextString = REPLACE(TextString, '&pound;','£') ; 
END IF ; 

#currency 
IF INSTR( x , '&curren;' ) 
THEN SET TextString = REPLACE(TextString, '&curren;','¤') ; 
END IF ; 

#yen 
IF INSTR( x , '&yen;' ) 
THEN SET TextString = REPLACE(TextString, '&yen;','¥') ; 
END IF ; 

#broken vertical bar 
IF INSTR( x , '&brvbar;' ) 
THEN SET TextString = REPLACE(TextString, '&brvbar;','¦') ; 
END IF ; 

#section 
IF INSTR( x , '&sect;' ) 
THEN SET TextString = REPLACE(TextString, '&sect;','§') ; 
END IF ; 

#spacing diaeresis 
IF INSTR( x , '&uml;' ) 
THEN SET TextString = REPLACE(TextString, '&uml;','¨') ; 
END IF ; 

#copyright 
IF INSTR( x , '&copy;' ) 
THEN SET TextString = REPLACE(TextString, '&copy;','©') ; 
END IF ; 

#feminine ordinal indicator 
IF INSTR( x , '&ordf;' ) 
THEN SET TextString = REPLACE(TextString, '&ordf;','ª') ; 
END IF ; 

#angle quotation mark (left) 
IF INSTR( x , '&laquo;' ) 
THEN SET TextString = REPLACE(TextString, '&laquo;','«') ; 
END IF ; 

#negation 
IF INSTR( x , '&not;' ) 
THEN SET TextString = REPLACE(TextString, '&not;','¬') ; 
END IF ; 

#soft hyphen 
IF INSTR( x , '&shy;' ) 
THEN SET TextString = REPLACE(TextString, '&shy;','­') ; 
END IF ; 

#registered trademark 
IF INSTR( x , '&reg;' ) 
THEN SET TextString = REPLACE(TextString, '&reg;','®') ; 
END IF ; 

#spacing macron 
IF INSTR( x , '&macr;' ) 
THEN SET TextString = REPLACE(TextString, '&macr;','¯') ; 
END IF ; 

#degree 
IF INSTR( x , '&deg;' ) 
THEN SET TextString = REPLACE(TextString, '&deg;','°') ; 
END IF ; 

#plus-or-minus  
IF INSTR( x , '&plusmn;' ) 
THEN SET TextString = REPLACE(TextString, '&plusmn;','±') ; 
END IF ; 

#superscript 2 
IF INSTR( x , '&sup2;' ) 
THEN SET TextString = REPLACE(TextString, '&sup2;','²') ; 
END IF ; 

#superscript 3 
IF INSTR( x , '&sup3;' ) 
THEN SET TextString = REPLACE(TextString, '&sup3;','³') ; 
END IF ; 

#spacing acute 
IF INSTR( x , '&acute;' ) 
THEN SET TextString = REPLACE(TextString, '&acute;','´') ; 
END IF ; 

#micro 
IF INSTR( x , '&micro;' ) 
THEN SET TextString = REPLACE(TextString, '&micro;','µ') ; 
END IF ; 

#paragraph 
IF INSTR( x , '&para;' ) 
THEN SET TextString = REPLACE(TextString, '&para;','¶') ; 
END IF ; 

#middle dot 
IF INSTR( x , '&middot;' ) 
THEN SET TextString = REPLACE(TextString, '&middot;','·') ; 
END IF ; 

#spacing cedilla 
IF INSTR( x , '&cedil;' ) 
THEN SET TextString = REPLACE(TextString, '&cedil;','¸') ; 
END IF ; 

#superscript 1 
IF INSTR( x , '&sup1;' ) 
THEN SET TextString = REPLACE(TextString, '&sup1;','¹') ; 
END IF ; 

#masculine ordinal indicator 
IF INSTR( x , '&ordm;' ) 
THEN SET TextString = REPLACE(TextString, '&ordm;','º') ; 
END IF ; 

#angle quotation mark (right) 
IF INSTR( x , '&raquo;' ) 
THEN SET TextString = REPLACE(TextString, '&raquo;','»') ; 
END IF ; 

#fraction 1/4 
IF INSTR( x , '&frac14;' ) 
THEN SET TextString = REPLACE(TextString, '&frac14;','¼') ; 
END IF ; 

#fraction 1/2 
IF INSTR( x , '&frac12;' ) 
THEN SET TextString = REPLACE(TextString, '&frac12;','½') ; 
END IF ; 

#fraction 3/4 
IF INSTR( x , '&frac34;' ) 
THEN SET TextString = REPLACE(TextString, '&frac34;','¾') ; 
END IF ; 

#inverted question mark 
IF INSTR( x , '&iquest;' ) 
THEN SET TextString = REPLACE(TextString, '&iquest;','¿') ; 
END IF ; 

#multiplication 
IF INSTR( x , '&times;' ) 
THEN SET TextString = REPLACE(TextString, '&times;','×') ; 
END IF ; 

#division 
IF INSTR( x , '&divide;' ) 
THEN SET TextString = REPLACE(TextString, '&divide;','÷') ; 
END IF ; 

#capital a, grave accent 
IF INSTR( x , '&Agrave;' ) 
THEN SET TextString = REPLACE(TextString, '&Agrave;','À') ; 
END IF ; 

#capital a, acute accent 
IF INSTR( x , '&Aacute;' ) 
THEN SET TextString = REPLACE(TextString, '&Aacute;','Á') ; 
END IF ; 

#capital a, circumflex accent 
IF INSTR( x , '&Acirc;' ) 
THEN SET TextString = REPLACE(TextString, '&Acirc;','Â') ; 
END IF ; 

#capital a, tilde 
IF INSTR( x , '&Atilde;' ) 
THEN SET TextString = REPLACE(TextString, '&Atilde;','Ã') ; 
END IF ; 

#capital a, umlaut mark 
IF INSTR( x , '&Auml;' ) 
THEN SET TextString = REPLACE(TextString, '&Auml;','Ä') ; 
END IF ; 

#capital a, ring 
IF INSTR( x , '&Aring;' ) 
THEN SET TextString = REPLACE(TextString, '&Aring;','Å') ; 
END IF ; 

#capital ae 
IF INSTR( x , '&AElig;' ) 
THEN SET TextString = REPLACE(TextString, '&AElig;','Æ') ; 
END IF ; 

#capital c, cedilla 
IF INSTR( x , '&Ccedil;' ) 
THEN SET TextString = REPLACE(TextString, '&Ccedil;','Ç') ; 
END IF ; 

#capital e, grave accent 
IF INSTR( x , '&Egrave;' ) 
THEN SET TextString = REPLACE(TextString, '&Egrave;','È') ; 
END IF ; 

#capital e, acute accent 
IF INSTR( x , '&Eacute;' ) 
THEN SET TextString = REPLACE(TextString, '&Eacute;','É') ; 
END IF ; 

#capital e, circumflex accent 
IF INSTR( x , '&Ecirc;' ) 
THEN SET TextString = REPLACE(TextString, '&Ecirc;','Ê') ; 
END IF ; 

#capital e, umlaut mark 
IF INSTR( x , '&Euml;' ) 
THEN SET TextString = REPLACE(TextString, '&Euml;','Ë') ; 
END IF ; 

#capital i, grave accent 
IF INSTR( x , '&Igrave;' ) 
THEN SET TextString = REPLACE(TextString, '&Igrave;','Ì') ; 
END IF ; 

#capital i, acute accent 
IF INSTR( x , '&Iacute;' ) 
THEN SET TextString = REPLACE(TextString, '&Iacute;','Í') ; 
END IF ; 

#capital i, circumflex accent 
IF INSTR( x , '&Icirc;' ) 
THEN SET TextString = REPLACE(TextString, '&Icirc;','Î') ; 
END IF ; 

#capital i, umlaut mark 
IF INSTR( x , '&Iuml;' ) 
THEN SET TextString = REPLACE(TextString, '&Iuml;','Ï') ; 
END IF ; 

#capital eth, Icelandic 
IF INSTR( x , '&ETH;' ) 
THEN SET TextString = REPLACE(TextString, '&ETH;','Ð') ; 
END IF ; 

#capital n, tilde 
IF INSTR( x , '&Ntilde;' ) 
THEN SET TextString = REPLACE(TextString, '&Ntilde;','Ñ') ; 
END IF ; 

#capital o, grave accent 
IF INSTR( x , '&Ograve;' ) 
THEN SET TextString = REPLACE(TextString, '&Ograve;','Ò') ; 
END IF ; 

#capital o, acute accent 
IF INSTR( x , '&Oacute;' ) 
THEN SET TextString = REPLACE(TextString, '&Oacute;','Ó') ; 
END IF ; 

#capital o, circumflex accent 
IF INSTR( x , '&Ocirc;' ) 
THEN SET TextString = REPLACE(TextString, '&Ocirc;','Ô') ; 
END IF ; 

#capital o, tilde 
IF INSTR( x , '&Otilde;' ) 
THEN SET TextString = REPLACE(TextString, '&Otilde;','Õ') ; 
END IF ; 

#capital o, umlaut mark 
IF INSTR( x , '&Ouml;' ) 
THEN SET TextString = REPLACE(TextString, '&Ouml;','Ö') ; 
END IF ; 

#capital o, slash 
IF INSTR( x , '&Oslash;' ) 
THEN SET TextString = REPLACE(TextString, '&Oslash;','Ø') ; 
END IF ; 

#capital u, grave accent 
IF INSTR( x , '&Ugrave;' ) 
THEN SET TextString = REPLACE(TextString, '&Ugrave;','Ù') ; 
END IF ; 

#capital u, acute accent 
IF INSTR( x , '&Uacute;' ) 
THEN SET TextString = REPLACE(TextString, '&Uacute;','Ú') ; 
END IF ; 

#capital u, circumflex accent 
IF INSTR( x , '&Ucirc;' ) 
THEN SET TextString = REPLACE(TextString, '&Ucirc;','Û') ; 
END IF ; 

#capital u, umlaut mark 
IF INSTR( x , '&Uuml;' ) 
THEN SET TextString = REPLACE(TextString, '&Uuml;','Ü') ; 
END IF ; 

#capital y, acute accent 
IF INSTR( x , '&Yacute;' ) 
THEN SET TextString = REPLACE(TextString, '&Yacute;','Ý') ; 
END IF ; 

#capital THORN, Icelandic 
IF INSTR( x , '&THORN;' ) 
THEN SET TextString = REPLACE(TextString, '&THORN;','Þ') ; 
END IF ; 

#small sharp s, German 
IF INSTR( x , '&szlig;' ) 
THEN SET TextString = REPLACE(TextString, '&szlig;','ß') ; 
END IF ; 

#small a, grave accent 
IF INSTR( x , '&agrave;' ) 
THEN SET TextString = REPLACE(TextString, '&agrave;','à') ; 
END IF ; 

#small a, acute accent 
IF INSTR( x , '&aacute;' ) 
THEN SET TextString = REPLACE(TextString, '&aacute;','á') ; 
END IF ; 

#small a, circumflex accent 
IF INSTR( x , '&acirc;' ) 
THEN SET TextString = REPLACE(TextString, '&acirc;','â') ; 
END IF ; 

#small a, tilde 
IF INSTR( x , '&atilde;' ) 
THEN SET TextString = REPLACE(TextString, '&atilde;','ã') ; 
END IF ; 

#small a, umlaut mark 
IF INSTR( x , '&auml;' ) 
THEN SET TextString = REPLACE(TextString, '&auml;','ä') ; 
END IF ; 

#small a, ring 
IF INSTR( x , '&aring;' ) 
THEN SET TextString = REPLACE(TextString, '&aring;','å') ; 
END IF ; 

#small ae 
IF INSTR( x , '&aelig;' ) 
THEN SET TextString = REPLACE(TextString, '&aelig;','æ') ; 
END IF ; 

#small c, cedilla 
IF INSTR( x , '&ccedil;' ) 
THEN SET TextString = REPLACE(TextString, '&ccedil;','ç') ; 
END IF ; 

#small e, grave accent 
IF INSTR( x , '&egrave;' ) 
THEN SET TextString = REPLACE(TextString, '&egrave;','è') ; 
END IF ; 

#small e, acute accent 
IF INSTR( x , '&eacute;' ) 
THEN SET TextString = REPLACE(TextString, '&eacute;','é') ; 
END IF ; 

#small e, circumflex accent 
IF INSTR( x , '&ecirc;' ) 
THEN SET TextString = REPLACE(TextString, '&ecirc;','ê') ; 
END IF ; 

#small e, umlaut mark 
IF INSTR( x , '&euml;' ) 
THEN SET TextString = REPLACE(TextString, '&euml;','ë') ; 
END IF ; 

#small i, grave accent 
IF INSTR( x , '&igrave;' ) 
THEN SET TextString = REPLACE(TextString, '&igrave;','ì') ; 
END IF ; 

#small i, acute accent 
IF INSTR( x , '&iacute;' ) 
THEN SET TextString = REPLACE(TextString, '&iacute;','í') ; 
END IF ; 

#small i, circumflex accent 
IF INSTR( x , '&icirc;' ) 
THEN SET TextString = REPLACE(TextString, '&icirc;','î') ; 
END IF ; 

#small i, umlaut mark 
IF INSTR( x , '&iuml;' ) 
THEN SET TextString = REPLACE(TextString, '&iuml;','ï') ; 
END IF ; 

#small eth, Icelandic 
IF INSTR( x , '&eth;' ) 
THEN SET TextString = REPLACE(TextString, '&eth;','ð') ; 
END IF ; 

#small n, tilde 
IF INSTR( x , '&ntilde;' ) 
THEN SET TextString = REPLACE(TextString, '&ntilde;','ñ') ; 
END IF ; 

#small o, grave accent 
IF INSTR( x , '&ograve;' ) 
THEN SET TextString = REPLACE(TextString, '&ograve;','ò') ; 
END IF ; 

#small o, acute accent 
IF INSTR( x , '&oacute;' ) 
THEN SET TextString = REPLACE(TextString, '&oacute;','ó') ; 
END IF ; 

#small o, circumflex accent 
IF INSTR( x , '&ocirc;' ) 
THEN SET TextString = REPLACE(TextString, '&ocirc;','ô') ; 
END IF ; 

#small o, tilde 
IF INSTR( x , '&otilde;' ) 
THEN SET TextString = REPLACE(TextString, '&otilde;','õ') ; 
END IF ; 

#small o, umlaut mark 
IF INSTR( x , '&ouml;' ) 
THEN SET TextString = REPLACE(TextString, '&ouml;','ö') ; 
END IF ; 

#small o, slash 
IF INSTR( x , '&oslash;' ) 
THEN SET TextString = REPLACE(TextString, '&oslash;','ø') ; 
END IF ; 

#small u, grave accent 
IF INSTR( x , '&ugrave;' ) 
THEN SET TextString = REPLACE(TextString, '&ugrave;','ù') ; 
END IF ; 

#small u, acute accent 
IF INSTR( x , '&uacute;' ) 
THEN SET TextString = REPLACE(TextString, '&uacute;','ú') ; 
END IF ; 

#small u, circumflex accent 
IF INSTR( x , '&ucirc;' ) 
THEN SET TextString = REPLACE(TextString, '&ucirc;','û') ; 
END IF ; 

#small u, umlaut mark 
IF INSTR( x , '&uuml;' ) 
THEN SET TextString = REPLACE(TextString, '&uuml;','ü') ; 
END IF ; 

#small y, acute accent 
IF INSTR( x , '&yacute;' ) 
THEN SET TextString = REPLACE(TextString, '&yacute;','ý') ; 
END IF ; 

#small thorn, Icelandic 
IF INSTR( x , '&thorn;' ) 
THEN SET TextString = REPLACE(TextString, '&thorn;','þ') ; 
END IF ; 

#small y, umlaut mark 
IF INSTR( x , '&yuml;' ) 
THEN SET TextString = REPLACE(TextString, '&yuml;','ÿ') ; 
END IF ; 

RETURN TextString ; 

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for insert_leccion
-- ----------------------------
DROP PROCEDURE IF EXISTS `insert_leccion`;
delimiter ;;
CREATE PROCEDURE `insert_leccion`(IN nombre VARCHAR(300),
    IN descripcion TEXT,
	IN etiquetas VARCHAR(200),
	IN ruta_archivo TEXT,
	IN eliminado VARCHAR(2),
	IN fchRg VARCHAR(50),
	IN fchAc VARCHAR(50),
	IN usrId INT(8),
	IN ipAdd VARCHAR(100),
	IN hosNm VARCHAR(300),
	IN in_fk_dominio INT(8),
	IN in_fk_usuario INT(8),
	OUT id_salida INT(8))
BEGIN
DECLARE id_salida_out INT DEFAULT 0;
DECLARE EXIT HANDLER FOR SQLEXCEPTION ROLLBACK;
DECLARE EXIT HANDLER FOR SQLWARNING ROLLBACK;
START TRANSACTION;
INSERT INTO leccion_aprendida (nombre, descripcion, etiquetas , ruta_archivo, eliminado , fchRg, fchAc, usrId, ipAdd, hosNm, fk_dominio, fk_usuario) 
VALUES (nombre,descripcion,etiquetas,ruta_archivo,eliminado,fchRg,fchAc,usrId,ipAdd,hosNm,in_fk_dominio,in_fk_usuario);
SET id_salida = LAST_INSERT_ID();
COMMIT;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for insert_prevision
-- ----------------------------
DROP PROCEDURE IF EXISTS `insert_prevision`;
delimiter ;;
CREATE PROCEDURE `insert_prevision`(IN mes_anio_in VARCHAR(30),
    IN nro_dias_in VARCHAR(30),
    IN fecha_in VARCHAR(30), 
    IN descripcion_in VARCHAR(50),
		IN estado_in VARCHAR(1),
		OUT id_salida INT)
BEGIN
    DECLARE id_salida_out INT DEFAULT 0;
    INSERT INTO prevision (mes_anio, nro_dias, flag_bloqueo, fecha, descripcion, estado) VALUES (mes_anio_in,nro_dias_in,"0",fecha_in,descripcion_in,estado_in); 
		SET id_salida = LAST_INSERT_ID();
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for insert_prevision_dominio
-- ----------------------------
DROP PROCEDURE IF EXISTS `insert_prevision_dominio`;
delimiter ;;
CREATE PROCEDURE `insert_prevision_dominio`(IN nro_empleados_in INT,
    IN nro_vacaciones_in INT,
    IN hrs_disponibles_in INT, 
    IN hrs_solutions_in INT,
    IN fecha_in VARCHAR(30),
    IN descripcion_in VARCHAR(100),
    IN estado_in VARCHAR(2),
    IN fk_dominio_in INT,
    IN fk_prevision_in INT)
BEGIN
    /*  DECLARE id_salida_out INT DEFAULT 0;  */
    INSERT INTO prevision_dominio (nro_empleados, nro_vacaciones, hrs_disponibles, hrs_solutions, fecha, descripcion, estado, fk_dominio, fk_prevision) VALUES 
    (nro_empleados_in,nro_vacaciones_in,hrs_disponibles_in,hrs_solutions_in,fecha_in,descripcion_in,estado_in,fk_dominio_in,fk_prevision_in); 
    /*  SET id_salida = LAST_INSERT_ID(); */
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for insert_seguimiento
-- ----------------------------
DROP PROCEDURE IF EXISTS `insert_seguimiento`;
delimiter ;;
CREATE PROCEDURE `insert_seguimiento`(IN fecha_corte VARCHAR(50),
    IN fecha VARCHAR(50),
	IN estado VARCHAR(1),
	IN in_fk_prevision INT(8),
	OUT id_salida INT(8))
BEGIN
DECLARE id_salida_out INT DEFAULT 0;
DECLARE EXIT HANDLER FOR SQLEXCEPTION ROLLBACK;
DECLARE EXIT HANDLER FOR SQLWARNING ROLLBACK;
START TRANSACTION;
INSERT INTO seguimiento (fecha_corte, fecha, estado , fk_prevision ) VALUES (fecha_corte,fecha,estado,in_fk_prevision);
SET id_salida = LAST_INSERT_ID();
COMMIT;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for insert_seguimiento_prevision
-- ----------------------------
DROP PROCEDURE IF EXISTS `insert_seguimiento_prevision`;
delimiter ;;
CREATE PROCEDURE `insert_seguimiento_prevision`(IN nro_empleados_in INT,
    IN nro_vacaciones_in INT,
    IN hrs_disponibles_in INT, 
    IN hrs_solutions_in INT,
    IN eliminado VARCHAR(1),
    IN fchRg VARCHAR(50),
    IN fchAc VARCHAR(50),
    IN usrId INT,
	IN ipAdd VARCHAR(100),
	IN hosNm VARCHAR(100),
	IN in_fk_seguimiento INT,
	IN in_fk_prevision_dominio INT)
BEGIN
DECLARE id_salida_out INT DEFAULT 0;
DECLARE EXIT HANDLER FOR SQLEXCEPTION ROLLBACK;
DECLARE EXIT HANDLER FOR SQLWARNING ROLLBACK;
START TRANSACTION;

INSERT INTO seguimiento_prevision (nro_empleados, nro_vacaciones, hrs_disponibles, hrs_solutions, 
	eliminado, fchRg, fchAc, usrId, ipAdd, hosNm, fk_seguimiento, fk_prevision_dominio) 

VALUES (nro_empleados_in, nro_vacaciones_in, hrs_disponibles_in, hrs_solutions_in,
	eliminado,fchRg,fchAc,usrId,ipAdd,hosNm,in_fk_seguimiento,in_fk_prevision_dominio);

COMMIT;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for movimiento_empleado
-- ----------------------------
DROP PROCEDURE IF EXISTS `movimiento_empleado`;
delimiter ;;
CREATE PROCEDURE `movimiento_empleado`(IN operacion_in VARCHAR(50),
    IN fecha_in VARCHAR(30),
    IN estado_in VARCHAR(2), 
    IN fk_empleado_in INT,
    OUT id_salida INT)
BEGIN
DECLARE id_salida_out INT DEFAULT 0;
DECLARE EXIT HANDLER FOR SQLEXCEPTION ROLLBACK;
DECLARE EXIT HANDLER FOR SQLWARNING ROLLBACK;
START TRANSACTION;
    INSERT INTO movimiento_empleado (operacion, fecha, estado, fk_empleado) 
    VALUES (operacion_in,fecha_in,estado_in,fk_empleado_in);
    SET id_salida = LAST_INSERT_ID();
COMMIT;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for update_leccion
-- ----------------------------
DROP PROCEDURE IF EXISTS `update_leccion`;
delimiter ;;
CREATE PROCEDURE `update_leccion`(IN nombre VARCHAR(300),
    IN descripcion TEXT,
	IN etiquetas VARCHAR(200),
	IN ruta_archivo TEXT,
	IN eliminado VARCHAR(2),
	IN fchAc VARCHAR(50),
	IN usrId INT(8),
	IN ipAdd VARCHAR(100),
	IN hosNm VARCHAR(300),
	IN in_fk_dominio INT(8),
	IN in_fk_usuario INT(8),
	IN in_id_leccion_aprendida INT(8))
BEGIN  
DECLARE EXIT HANDLER FOR SQLEXCEPTION ROLLBACK;
DECLARE EXIT HANDLER FOR SQLWARNING ROLLBACK;
START TRANSACTION;
UPDATE leccion_aprendida SET nombre = nombre, descripcion = descripcion, etiquetas = etiquetas, ruta_archivo = ruta_archivo, eliminado = eliminado 
,fchAc = fchAc, usrId = usrId, ipAdd = ipAdd, hosNm = hosNm, fk_dominio = in_fk_dominio, fk_usuario = in_fk_usuario
WHERE id_leccion_aprendida = in_id_leccion_aprendida;
COMMIT;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for update_prevision
-- ----------------------------
DROP PROCEDURE IF EXISTS `update_prevision`;
delimiter ;;
CREATE PROCEDURE `update_prevision`(IN mes_anio VARCHAR(50),
    IN nro_dias INT(8),
    IN fecha VARCHAR(50),
	IN descripcion TEXT,
    IN estado VARCHAR(1),
    IN in_id_prevision INT(8))
BEGIN
DECLARE EXIT HANDLER FOR SQLEXCEPTION ROLLBACK;
DECLARE EXIT HANDLER FOR SQLWARNING ROLLBACK;
START TRANSACTION;
UPDATE prevision SET mes_anio = STR_TO_DATE(mes_anio,'%Y-%m-%d'), nro_dias = nro_dias, fecha = STR_TO_DATE(fecha,'%Y-%m-%d'), 
descripcion = descripcion, estado = estado WHERE id_prevision = in_id_prevision;
COMMIT;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for update_prevision_dominio
-- ----------------------------
DROP PROCEDURE IF EXISTS `update_prevision_dominio`;
delimiter ;;
CREATE PROCEDURE `update_prevision_dominio`(IN nro_empleados INT,
    IN nro_vacaciones INT,
    IN hrs_disponibles INT,
    IN hrs_solutions INT,
    IN fecha VARCHAR(50),
    IN descripcion TEXT,
    IN estado VARCHAR(10),
    IN in_fk_dominio INT,
    IN in_fk_prevision INT)
BEGIN
DECLARE EXIT HANDLER FOR SQLEXCEPTION ROLLBACK;
DECLARE EXIT HANDLER FOR SQLWARNING ROLLBACK;
START TRANSACTION;
UPDATE prevision_dominio SET nro_empleados  = nro_empleados, nro_vacaciones = nro_vacaciones,
 hrs_disponibles = hrs_disponibles, hrs_solutions = hrs_solutions, 
 fecha = STR_TO_DATE(fecha,'%Y-%m-%d'), descripcion = descripcion, estado = estado 
 WHERE fk_dominio = in_fk_dominio AND fk_prevision = in_fk_prevision;
COMMIT;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for update_seguimiento
-- ----------------------------
DROP PROCEDURE IF EXISTS `update_seguimiento`;
delimiter ;;
CREATE PROCEDURE `update_seguimiento`(IN descripcion TEXT,
	IN nro_dias_corte INT(8),
	IN in_id_seguimiento INT(8))
BEGIN
DECLARE EXIT HANDLER FOR SQLEXCEPTION ROLLBACK;
DECLARE EXIT HANDLER FOR SQLWARNING ROLLBACK;
START TRANSACTION;
UPDATE seguimiento SET nro_dias_corte = nro_dias_corte, descripcion = descripcion WHERE id_seguimiento = in_id_seguimiento;
COMMIT;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for update_seguimiento_prevision_lideres
-- ----------------------------
DROP PROCEDURE IF EXISTS `update_seguimiento_prevision_lideres`;
delimiter ;;
CREATE PROCEDURE `update_seguimiento_prevision_lideres`(IN hrs_plan_meta DECIMAL(8,2),
	IN hrs_plan_real DECIMAL(8,2),
	IN hrs_plan_porcentaje DECIMAL(8,2),
	IN hrs_ejec_meta DECIMAL(8,2),
	IN hrs_ejec_real DECIMAL(8,2),
	IN hrs_ejec_porcentaje DECIMAL(8,2),
	IN comentario TEXT,
	IN incurridos_validados VARCHAR(1),
	IN no_conformidades INT(8),
	IN inc_internas INT(8),
	IN inc_externas INT(8),
	IN fchAc VARCHAR(50),
	IN usrId INT(8),
	IN ipAdd VARCHAR(100),
	IN hosNm VARCHAR(200),
	IN in_id_seguimiento_prevision INT(8))
BEGIN
DECLARE EXIT HANDLER FOR SQLEXCEPTION ROLLBACK;
DECLARE EXIT HANDLER FOR SQLWARNING ROLLBACK;
START TRANSACTION;
UPDATE seguimiento_prevision SET hrs_plan_meta = hrs_plan_meta, hrs_plan_real = hrs_plan_real,
 hrs_plan_porcentaje = hrs_plan_porcentaje, hrs_ejec_meta = hrs_ejec_meta, hrs_ejec_real = hrs_ejec_real, 
 hrs_ejec_porcentaje = hrs_ejec_porcentaje, comentario = comentario,incurridos_validados = incurridos_validados,
 no_conformidades = no_conformidades,inc_internas = inc_internas,inc_externas = inc_externas, fchAc = fchAc, 
 usrId = usrId, ipAdd = ipAdd, hosNm = hosNm WHERE id_seguimiento_prevision = in_id_seguimiento_prevision;
COMMIT;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for update_seguimiento_prevision_produccion
-- ----------------------------
DROP PROCEDURE IF EXISTS `update_seguimiento_prevision_produccion`;
delimiter ;;
CREATE PROCEDURE `update_seguimiento_prevision_produccion`(IN estado_delivery INT(8),
	IN demanda INT(8),
	IN descripcion TEXT,
	IN facturabilidad DECIMAL(8,2),
	IN ocupabilidad DECIMAL(8,2),
	IN fchAc VARCHAR(50),
	IN usrId INT(8),
	IN ipAdd VARCHAR(100),
	IN hosNm VARCHAR(200),
	IN in_id_seguimiento_prevision INT(8))
BEGIN
DECLARE EXIT HANDLER FOR SQLEXCEPTION ROLLBACK;
DECLARE EXIT HANDLER FOR SQLWARNING ROLLBACK;
START TRANSACTION;
UPDATE seguimiento_prevision SET estado_delivery = estado_delivery, 
demanda = demanda, descripcion = descripcion,facturabilidad = facturabilidad,
ocupabilidad = ocupabilidad, fchAc = fchAc, usrId = usrId, ipAdd = ipAdd, 
hosNm = hosNm WHERE id_seguimiento_prevision = in_id_seguimiento_prevision;
COMMIT;
END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
