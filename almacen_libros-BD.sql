/*
 Navicat Premium Data Transfer

 Source Server         : Local Mysql
 Source Server Type    : MySQL
 Source Server Version : 100140
 Source Host           : localhost:3306
 Source Schema         : almacen_libros

 Target Server Type    : MySQL
 Target Server Version : 100140
 File Encoding         : 65001

 Date: 10/03/2022 14:17:35
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for anno
-- ----------------------------
DROP TABLE IF EXISTS `anno`;
CREATE TABLE `anno`  (
  `idanno` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idanno`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of anno
-- ----------------------------
INSERT INTO `anno` VALUES (1, 'Primero');
INSERT INTO `anno` VALUES (2, 'Segundo');
INSERT INTO `anno` VALUES (3, 'Tercero');
INSERT INTO `anno` VALUES (4, 'Cuarto');
INSERT INTO `anno` VALUES (5, 'Quinto');

-- ----------------------------
-- Table structure for clasificacion
-- ----------------------------
DROP TABLE IF EXISTS `clasificacion`;
CREATE TABLE `clasificacion`  (
  `idclasificacion` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idclasificacion`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of clasificacion
-- ----------------------------
INSERT INTO `clasificacion` VALUES (1, 'Especialidad');
INSERT INTO `clasificacion` VALUES (2, 'Humanidades');
INSERT INTO `clasificacion` VALUES (3, 'Ciencias Básicas');

-- ----------------------------
-- Table structure for estudiante
-- ----------------------------
DROP TABLE IF EXISTS `estudiante`;
CREATE TABLE `estudiante`  (
  `carnet_identidad` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombre_completo` varchar(85) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `direccion` varchar(95) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sexo_idsexo` int UNSIGNED NOT NULL,
  `anno_idanno` int UNSIGNED NOT NULL,
  PRIMARY KEY (`carnet_identidad`) USING BTREE,
  UNIQUE INDEX `carnet_identidad_UNIQUE`(`carnet_identidad`) USING BTREE,
  INDEX `fk_estudiante_sexo1_idx`(`sexo_idsexo`) USING BTREE,
  INDEX `fk_estudiante_anno1_idx`(`anno_idanno`) USING BTREE,
  CONSTRAINT `fk_estudiante_anno1` FOREIGN KEY (`anno_idanno`) REFERENCES `anno` (`idanno`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_estudiante_sexo1` FOREIGN KEY (`sexo_idsexo`) REFERENCES `sexo` (`idsexo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of estudiante
-- ----------------------------
INSERT INTO `estudiante` VALUES ('65081508602', 'Pepe Perez', 'La Vuelta', 1, 2);
INSERT INTO `estudiante` VALUES ('88070431243', 'Lola Lopez', 'Blanquizal', 2, 1);
INSERT INTO `estudiante` VALUES ('96061300918', 'Juana Arias', 'Blanquizal', 2, 3);

-- ----------------------------
-- Table structure for libro
-- ----------------------------
DROP TABLE IF EXISTS `libro`;
CREATE TABLE `libro`  (
  `codlibro` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `titulo` varchar(85) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `autor` varchar(85) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `isbn` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `editorial` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cantidad_existencia` int NOT NULL,
  `precio` float NOT NULL,
  `clasificacion_idclasificacion` int UNSIGNED NOT NULL,
  `anno_idanno` int UNSIGNED NOT NULL,
  PRIMARY KEY (`codlibro`) USING BTREE,
  UNIQUE INDEX `codlibro_UNIQUE`(`codlibro`) USING BTREE,
  INDEX `fk_libro_clasificacion_idx`(`clasificacion_idclasificacion`) USING BTREE,
  INDEX `fk_libro_anno1_idx`(`anno_idanno`) USING BTREE,
  CONSTRAINT `fk_libro_anno1` FOREIGN KEY (`anno_idanno`) REFERENCES `anno` (`idanno`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_libro_clasificacion` FOREIGN KEY (`clasificacion_idclasificacion`) REFERENCES `clasificacion` (`idclasificacion`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of libro
-- ----------------------------
INSERT INTO `libro` VALUES ('Alg-I', 'Álgebra I', 'N/A', 'Libro de distribución gratuita', '888-999-998', 'Pueblo Nuevo', 20, 5, 1, 2);
INSERT INTO `libro` VALUES ('Mat-I', 'Análisis Matemático I', 'Piskunov', 'Libro para 1er año', '888-555-444-888', 'Educación', 22, 25, 3, 1);
INSERT INTO `libro` VALUES ('mat-II', 'Análisis Matemático II', 'Piskunov', 'll', '999-888-679', 'Educación', 10, 1, 1, 2);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `version` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `class` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `group` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `namespace` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of migrations
-- ----------------------------

-- ----------------------------
-- Table structure for sexo
-- ----------------------------
DROP TABLE IF EXISTS `sexo`;
CREATE TABLE `sexo`  (
  `idsexo` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idsexo`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of sexo
-- ----------------------------
INSERT INTO `sexo` VALUES (1, 'Masculino');
INSERT INTO `sexo` VALUES (2, 'Femenino');

SET FOREIGN_KEY_CHECKS = 1;
