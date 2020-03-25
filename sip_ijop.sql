/*
 Navicat Premium Data Transfer

 Source Server         : XAMPP
 Source Server Type    : MySQL
 Source Server Version : 100128
 Source Host           : localhost:3306
 Source Schema         : sip_ijop

 Target Server Type    : MySQL
 Target Server Version : 100128
 File Encoding         : 65001

 Date: 25/03/2020 07:56:39
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for ci_sessions
-- ----------------------------
DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions`  (
  `id` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL,
  INDEX `ci_sessions_timestamp`(`timestamp`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ci_sessions
-- ----------------------------
INSERT INTO `ci_sessions` VALUES ('ua3oiao73089hkcrqqok0o092kphmghq', '::1', 1585042839, 0x5F5F63695F6C6173745F726567656E65726174657C693A313538353034323636363B);
INSERT INTO `ci_sessions` VALUES ('67tstolgtb229ggaspnd2pn5qrj4oik6', '::1', 1585043513, 0x5F5F63695F6C6173745F726567656E65726174657C693A313538353034333234353B);
INSERT INTO `ci_sessions` VALUES ('37mqpe9ph9649ghu04ecu127e7qfureq', '::1', 1585044082, 0x5F5F63695F6C6173745F726567656E65726174657C693A313538353034333739363B);
INSERT INTO `ci_sessions` VALUES ('feak06m9ums21m3b3gpkkh8b413e82dg', '::1', 1585044846, 0x5F5F63695F6C6173745F726567656E65726174657C693A313538353034343535343B);
INSERT INTO `ci_sessions` VALUES ('oti53pcrrv4imte0v4k9b16jrmu6cpmu', '::1', 1585045037, 0x5F5F63695F6C6173745F726567656E65726174657C693A313538353034343837373B);
INSERT INTO `ci_sessions` VALUES ('lqiemf1t864dh3ifmt24dkhstfdccrjs', '::1', 1585045460, 0x5F5F63695F6C6173745F726567656E65726174657C693A313538353034353230313B);
INSERT INTO `ci_sessions` VALUES ('o9us73aieqi9cjarq4odpb5u2co395av', '::1', 1585045720, 0x5F5F63695F6C6173745F726567656E65726174657C693A313538353034353531313B);
INSERT INTO `ci_sessions` VALUES ('8udetq0ecndu3ebn12221mdic5g8tqdu', '::1', 1585046079, 0x5F5F63695F6C6173745F726567656E65726174657C693A313538353034353831343B);
INSERT INTO `ci_sessions` VALUES ('dbh8ugbv60dnr65l6g13ej3uddp3tks9', '::1', 1585051580, 0x5F5F63695F6C6173745F726567656E65726174657C693A313538353035313238333B);
INSERT INTO `ci_sessions` VALUES ('c2isn7g15tjai63dhnufnqc01akokc0u', '::1', 1585051841, 0x5F5F63695F6C6173745F726567656E65726174657C693A313538353035313834313B);
INSERT INTO `ci_sessions` VALUES ('j571p4giurcldefullv5dlgbv3qccvb6', '::1', 1585052630, 0x5F5F63695F6C6173745F726567656E65726174657C693A313538353035323434333B);
INSERT INTO `ci_sessions` VALUES ('oh67pqbv6vnr1stt7c0c7f2lhcvllk62', '::1', 1585052873, 0x5F5F63695F6C6173745F726567656E65726174657C693A313538353035323637393B);
INSERT INTO `ci_sessions` VALUES ('42mmt1p2q7h3qnv1gr48d3p11avcqq94', '::1', 1585052695, 0x5F5F63695F6C6173745F726567656E65726174657C693A313538353035323639353B);
INSERT INTO `ci_sessions` VALUES ('ik3bcc817p41o75gpcuko760r4n0avi5', '::1', 1585053175, 0x5F5F63695F6C6173745F726567656E65726174657C693A313538353035323939303B);
INSERT INTO `ci_sessions` VALUES ('4urvqrrmbjp13mdg060b78bqmp7n7kt0', '::1', 1585053634, 0x5F5F63695F6C6173745F726567656E65726174657C693A313538353035333335343B);
INSERT INTO `ci_sessions` VALUES ('qnnbkljf0c6e6f4msi9dr8rovui76ebn', '::1', 1585053989, 0x5F5F63695F6C6173745F726567656E65726174657C693A313538353035333736373B);
INSERT INTO `ci_sessions` VALUES ('k5g9ljnatguk9sqdqaek081p2os3bmc2', '::1', 1585054740, 0x5F5F63695F6C6173745F726567656E65726174657C693A313538353035343734303B);
INSERT INTO `ci_sessions` VALUES ('pvjdm1eg1t0narger4hjd01qug8vi0gl', '::1', 1585059043, 0x5F5F63695F6C6173745F726567656E65726174657C693A313538353035383735393B);
INSERT INTO `ci_sessions` VALUES ('hv27lq2s64aa2cr1s0fgjtp1jl42dv79', '::1', 1585059114, 0x5F5F63695F6C6173745F726567656E65726174657C693A313538353035393036383B);
INSERT INTO `ci_sessions` VALUES ('b3qiv3bggn7ttm132es2m4ghukuftn4e', '::1', 1585059549, 0x5F5F63695F6C6173745F726567656E65726174657C693A313538353035393534393B);
INSERT INTO `ci_sessions` VALUES ('6a75sv09gfu401vhu68b8iboginr74pg', '::1', 1585059951, 0x5F5F63695F6C6173745F726567656E65726174657C693A313538353035393934363B);
INSERT INTO `ci_sessions` VALUES ('rgcsc6vg906scutl3h98tqugpr2povsk', '::1', 1585063421, 0x5F5F63695F6C6173745F726567656E65726174657C693A313538353036333230323B);
INSERT INTO `ci_sessions` VALUES ('lbiedbo53o1uoaq0hppl3oge8spsri9i', '::1', 1585063899, 0x5F5F63695F6C6173745F726567656E65726174657C693A313538353036333636333B);
INSERT INTO `ci_sessions` VALUES ('2s4mardkm83ltp7g5vmar85l6g159uk5', '::1', 1585064299, 0x5F5F63695F6C6173745F726567656E65726174657C693A313538353036343038323B);
INSERT INTO `ci_sessions` VALUES ('9vj8vclp8rk8k9saevjhgktic0gvtopo', '::1', 1585064832, 0x5F5F63695F6C6173745F726567656E65726174657C693A313538353036343734363B);
INSERT INTO `ci_sessions` VALUES ('431eni5k2omml1rffuqu8o8j7uch1hb9', '::1', 1585065070, 0x5F5F63695F6C6173745F726567656E65726174657C693A313538353036353035353B);
INSERT INTO `ci_sessions` VALUES ('7mpm9r2nj66m1c8ei0pgdd8f5d7t1u1a', '::1', 1585066117, 0x5F5F63695F6C6173745F726567656E65726174657C693A313538353036363031373B726567697374726173695F73756B7365737C623A313B5F5F63695F766172737C613A313A7B733A31373A22726567697374726173695F73756B736573223B733A333A226F6C64223B7D);
INSERT INTO `ci_sessions` VALUES ('nebh47ulnde65su1tuh17ast3lbmu154', '::1', 1585066400, 0x5F5F63695F6C6173745F726567656E65726174657C693A313538353036363430303B);
INSERT INTO `ci_sessions` VALUES ('v9r8mdnivb9llrk8sft3k038s7emfrm7', '::1', 1585066916, 0x5F5F63695F6C6173745F726567656E65726174657C693A313538353036363931363B);
INSERT INTO `ci_sessions` VALUES ('q9576srjjsqnrkga7s9lfkbfohfd1uvr', '::1', 1585068625, 0x5F5F63695F6C6173745F726567656E65726174657C693A313538353036383632353B);
INSERT INTO `ci_sessions` VALUES ('8mdtopgnv5qronqt6qm7u6a5rt01jpff', '::1', 1585069179, 0x5F5F63695F6C6173745F726567656E65726174657C693A313538353036383932383B6E616D617C733A31333A2250656E6767756E612062617275223B6C6576656C7C733A313A2231223B656D61696C7C733A31343A226261727540676D61696C2E636F6D223B68707C733A31323A22303835383432373137353135223B);
INSERT INTO `ci_sessions` VALUES ('3rpu8eq5j3f6po3ahgg8oi3cocjnor44', '::1', 1585069234, 0x5F5F63695F6C6173745F726567656E65726174657C693A313538353036393233343B6E616D617C733A31333A2250656E6767756E612062617275223B6C6576656C7C733A313A2231223B656D61696C7C733A31343A226261727540676D61696C2E636F6D223B68707C733A31323A22303835383432373137353135223B);
INSERT INTO `ci_sessions` VALUES ('vhfj97u51clias7nteqaqdkqsk4q2613', '::1', 1585071107, 0x5F5F63695F6C6173745F726567656E65726174657C693A313538353037303836363B);
INSERT INTO `ci_sessions` VALUES ('jdfvjh2o0meklm8rooatu3urjnetdojn', '::1', 1585071529, 0x5F5F63695F6C6173745F726567656E65726174657C693A313538353037313238383B);
INSERT INTO `ci_sessions` VALUES ('ae6uue2dlcqvil9pl8pfad1fdqm7boum', '::1', 1585071864, 0x5F5F63695F6C6173745F726567656E65726174657C693A313538353037313630393B);

-- ----------------------------
-- Table structure for tbl_kec
-- ----------------------------
DROP TABLE IF EXISTS `tbl_kec`;
CREATE TABLE `tbl_kec`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kec` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_kec
-- ----------------------------
INSERT INTO `tbl_kec` VALUES (1, 'Banjarharjo');
INSERT INTO `tbl_kec` VALUES (2, 'Bantarkawung');
INSERT INTO `tbl_kec` VALUES (3, 'Brebes');
INSERT INTO `tbl_kec` VALUES (4, 'Bulakamba');
INSERT INTO `tbl_kec` VALUES (5, 'Bumiayu');
INSERT INTO `tbl_kec` VALUES (6, 'Jatibarang');
INSERT INTO `tbl_kec` VALUES (7, 'Kersana');
INSERT INTO `tbl_kec` VALUES (8, 'Ketanggungan');
INSERT INTO `tbl_kec` VALUES (9, 'Larangan');
INSERT INTO `tbl_kec` VALUES (10, 'Losari');
INSERT INTO `tbl_kec` VALUES (11, 'Paguyangan');
INSERT INTO `tbl_kec` VALUES (12, 'Salem');
INSERT INTO `tbl_kec` VALUES (13, 'Sirampog');
INSERT INTO `tbl_kec` VALUES (14, 'Songgom');
INSERT INTO `tbl_kec` VALUES (15, 'Tanjung');
INSERT INTO `tbl_kec` VALUES (16, 'Tonjong');
INSERT INTO `tbl_kec` VALUES (17, 'Wanasari');

-- ----------------------------
-- Table structure for tbl_kel
-- ----------------------------
DROP TABLE IF EXISTS `tbl_kel`;
CREATE TABLE `tbl_kel`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kec` int(11) NULL DEFAULT NULL,
  `kel` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `kd_pos` int(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 299 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_kel
-- ----------------------------
INSERT INTO `tbl_kel` VALUES (1, 1, 'Bandungsari', 52265);
INSERT INTO `tbl_kel` VALUES (2, 1, 'Banjar Lor', 52265);
INSERT INTO `tbl_kel` VALUES (3, 1, 'Banjarharjo', 52265);
INSERT INTO `tbl_kel` VALUES (4, 1, 'Blandongan', 52265);
INSERT INTO `tbl_kel` VALUES (5, 1, 'Ciawi', 52265);
INSERT INTO `tbl_kel` VALUES (6, 1, 'Cibendung', 52265);
INSERT INTO `tbl_kel` VALUES (7, 1, 'Cibuniwangi', 52265);
INSERT INTO `tbl_kel` VALUES (8, 1, 'Cigadung', 52265);
INSERT INTO `tbl_kel` VALUES (9, 1, 'Cihaur', 52265);
INSERT INTO `tbl_kel` VALUES (10, 1, 'Cikakak', 52265);
INSERT INTO `tbl_kel` VALUES (11, 1, 'Cikuya', 52265);
INSERT INTO `tbl_kel` VALUES (12, 1, 'Cimunding', 52265);
INSERT INTO `tbl_kel` VALUES (13, 1, 'Cipajang', 52265);
INSERT INTO `tbl_kel` VALUES (14, 1, 'Dukuhjeruk', 52265);
INSERT INTO `tbl_kel` VALUES (15, 1, 'Karangmaja', 52265);
INSERT INTO `tbl_kel` VALUES (16, 1, 'Kertasari', 52265);
INSERT INTO `tbl_kel` VALUES (17, 1, 'Kubangjero', 52265);
INSERT INTO `tbl_kel` VALUES (18, 1, 'Malahayu', 52265);
INSERT INTO `tbl_kel` VALUES (19, 1, 'Parireja', 52265);
INSERT INTO `tbl_kel` VALUES (20, 1, 'Penanggapan', 52265);
INSERT INTO `tbl_kel` VALUES (21, 1, 'Pende', 52265);
INSERT INTO `tbl_kel` VALUES (22, 1, 'Sindangheula', 52265);
INSERT INTO `tbl_kel` VALUES (23, 1, 'Sukareja', 52265);
INSERT INTO `tbl_kel` VALUES (24, 1, 'Tegalreja', 52265);
INSERT INTO `tbl_kel` VALUES (25, 1, 'Tiwulandu', 52265);
INSERT INTO `tbl_kel` VALUES (26, 2, 'Bangbayang', 52274);
INSERT INTO `tbl_kel` VALUES (27, 2, 'Banjarsari', 52274);
INSERT INTO `tbl_kel` VALUES (28, 2, 'Bantarkawung', 52274);
INSERT INTO `tbl_kel` VALUES (29, 2, 'Bantarwaru', 52274);
INSERT INTO `tbl_kel` VALUES (30, 2, 'Cibentang', 52274);
INSERT INTO `tbl_kel` VALUES (31, 2, 'Cinanas', 52274);
INSERT INTO `tbl_kel` VALUES (32, 2, 'Ciomas', 52274);
INSERT INTO `tbl_kel` VALUES (33, 2, 'Jipang', 52274);
INSERT INTO `tbl_kel` VALUES (34, 2, 'Karangpari', 52274);
INSERT INTO `tbl_kel` VALUES (35, 2, 'Kebandungan', 52274);
INSERT INTO `tbl_kel` VALUES (36, 2, 'Legok', 52274);
INSERT INTO `tbl_kel` VALUES (37, 2, 'Pangebatan', 52274);
INSERT INTO `tbl_kel` VALUES (38, 2, 'Pakiringan', 52274);
INSERT INTO `tbl_kel` VALUES (39, 2, 'Pengarasan', 52274);
INSERT INTO `tbl_kel` VALUES (40, 2, 'Sindangwangi', 52274);
INSERT INTO `tbl_kel` VALUES (41, 2, 'Tambakserang', 52274);
INSERT INTO `tbl_kel` VALUES (42, 2, 'Telaga', 52274);
INSERT INTO `tbl_kel` VALUES (43, 2, 'Terlaya', 52274);
INSERT INTO `tbl_kel` VALUES (44, 2, 'Waru', 52274);
INSERT INTO `tbl_kel` VALUES (45, 3, 'Pasarbatang', 52211);
INSERT INTO `tbl_kel` VALUES (46, 3, 'Brebes', 52212);
INSERT INTO `tbl_kel` VALUES (47, 3, 'Pulosari', 52213);
INSERT INTO `tbl_kel` VALUES (48, 3, 'Padasugih', 52214);
INSERT INTO `tbl_kel` VALUES (49, 3, 'Wangandalem', 52214);
INSERT INTO `tbl_kel` VALUES (50, 3, 'Gandasuli', 52215);
INSERT INTO `tbl_kel` VALUES (51, 3, 'Banjaranyar', 52216);
INSERT INTO `tbl_kel` VALUES (52, 3, 'Kaligangsa Kulon', 52217);
INSERT INTO `tbl_kel` VALUES (53, 3, 'Kaligangsa Wetan', 52217);
INSERT INTO `tbl_kel` VALUES (54, 3, 'Limbangan Wetan', 52218);
INSERT INTO `tbl_kel` VALUES (55, 3, 'Kalimati', 52219);
INSERT INTO `tbl_kel` VALUES (56, 3, 'Kaliwlingi', 52219);
INSERT INTO `tbl_kel` VALUES (57, 3, 'Kedunguter', 52219);
INSERT INTO `tbl_kel` VALUES (58, 3, 'Krasak', 52219);
INSERT INTO `tbl_kel` VALUES (59, 3, 'Lembarawa', 52219);
INSERT INTO `tbl_kel` VALUES (60, 3, 'Limbangan Kulon', 52219);
INSERT INTO `tbl_kel` VALUES (61, 3, 'Pagejugan', 52219);
INSERT INTO `tbl_kel` VALUES (62, 3, 'Pemaron', 52219);
INSERT INTO `tbl_kel` VALUES (63, 3, 'Randusanga Kulon', 52219);
INSERT INTO `tbl_kel` VALUES (64, 3, 'Randusanga Wetan', 52219);
INSERT INTO `tbl_kel` VALUES (65, 3, 'Sigambir', 52219);
INSERT INTO `tbl_kel` VALUES (66, 3, 'Tengki', 52219);
INSERT INTO `tbl_kel` VALUES (67, 3, 'Terlangu', 52219);
INSERT INTO `tbl_kel` VALUES (68, 4, 'Bangsri', 52253);
INSERT INTO `tbl_kel` VALUES (69, 4, 'Banjaratma', 52253);
INSERT INTO `tbl_kel` VALUES (70, 4, 'Bulakamba', 52253);
INSERT INTO `tbl_kel` VALUES (71, 4, 'Bulakparen', 52253);
INSERT INTO `tbl_kel` VALUES (72, 4, 'Bulusari', 52253);
INSERT INTO `tbl_kel` VALUES (73, 4, 'Cimohong', 52253);
INSERT INTO `tbl_kel` VALUES (74, 4, 'Cipelem', 52253);
INSERT INTO `tbl_kel` VALUES (75, 4, 'Dukuhlo', 52253);
INSERT INTO `tbl_kel` VALUES (76, 4, 'Grinting', 52253);
INSERT INTO `tbl_kel` VALUES (77, 4, 'Jubang', 52253);
INSERT INTO `tbl_kel` VALUES (78, 4, 'Karangsari', 52253);
INSERT INTO `tbl_kel` VALUES (79, 4, 'Kluwut', 52253);
INSERT INTO `tbl_kel` VALUES (80, 4, 'Luwungragi', 52253);
INSERT INTO `tbl_kel` VALUES (81, 4, 'Pakijangan', 52253);
INSERT INTO `tbl_kel` VALUES (82, 4, 'Petunjungan', 52253);
INSERT INTO `tbl_kel` VALUES (83, 4, 'Pulogading', 52253);
INSERT INTO `tbl_kel` VALUES (84, 4, 'Rancawuluh', 52253);
INSERT INTO `tbl_kel` VALUES (85, 4, 'Siwuluh', 52253);
INSERT INTO `tbl_kel` VALUES (86, 4, 'Tegalglagah', 52253);
INSERT INTO `tbl_kel` VALUES (87, 5, 'Adisana', 52273);
INSERT INTO `tbl_kel` VALUES (88, 5, 'Bumiayu', 52273);
INSERT INTO `tbl_kel` VALUES (89, 5, 'Dukuhturi', 52273);
INSERT INTO `tbl_kel` VALUES (90, 5, 'Jatisawit', 52273);
INSERT INTO `tbl_kel` VALUES (91, 5, 'Kalierang', 52273);
INSERT INTO `tbl_kel` VALUES (92, 5, 'Kalilangkap', 52273);
INSERT INTO `tbl_kel` VALUES (93, 5, 'Kalinusu', 52273);
INSERT INTO `tbl_kel` VALUES (94, 5, 'Kalisumur', 52273);
INSERT INTO `tbl_kel` VALUES (95, 5, 'Kaliwadas', 52273);
INSERT INTO `tbl_kel` VALUES (96, 5, 'Langkap', 52273);
INSERT INTO `tbl_kel` VALUES (97, 5, 'Laren', 52273);
INSERT INTO `tbl_kel` VALUES (98, 5, 'Negaradaha', 52273);
INSERT INTO `tbl_kel` VALUES (99, 5, 'Pamijen', 52273);
INSERT INTO `tbl_kel` VALUES (100, 5, 'Panggarutan', 52273);
INSERT INTO `tbl_kel` VALUES (101, 5, 'Pruwatan', 52273);
INSERT INTO `tbl_kel` VALUES (102, 6, 'Bojong', 52261);
INSERT INTO `tbl_kel` VALUES (103, 6, 'Buaran', 52261);
INSERT INTO `tbl_kel` VALUES (104, 6, 'Janegara', 52261);
INSERT INTO `tbl_kel` VALUES (105, 6, 'Jatibarang Kidul', 52261);
INSERT INTO `tbl_kel` VALUES (106, 6, 'Jatibarang Lor', 52261);
INSERT INTO `tbl_kel` VALUES (107, 6, 'Kalialang', 52261);
INSERT INTO `tbl_kel` VALUES (108, 6, 'Kalipucang', 52261);
INSERT INTO `tbl_kel` VALUES (109, 6, 'Karanglo', 52261);
INSERT INTO `tbl_kel` VALUES (110, 6, 'Kebogadung', 52261);
INSERT INTO `tbl_kel` VALUES (111, 6, 'Kebonagung', 52261);
INSERT INTO `tbl_kel` VALUES (112, 6, 'Kedungtukang', 52261);
INSERT INTO `tbl_kel` VALUES (113, 6, 'Kemiriamba', 52261);
INSERT INTO `tbl_kel` VALUES (114, 6, 'Kendawa', 52261);
INSERT INTO `tbl_kel` VALUES (115, 6, 'Kertasinduyasa', 52261);
INSERT INTO `tbl_kel` VALUES (116, 6, 'Klampis', 52261);
INSERT INTO `tbl_kel` VALUES (117, 6, 'Klikiran', 52261);
INSERT INTO `tbl_kel` VALUES (118, 6, 'Kramat', 52261);
INSERT INTO `tbl_kel` VALUES (119, 6, 'Pamengger', 52261);
INSERT INTO `tbl_kel` VALUES (120, 6, 'Pedeslohor', 52261);
INSERT INTO `tbl_kel` VALUES (121, 6, 'Rengasbandung', 52261);
INSERT INTO `tbl_kel` VALUES (122, 6, 'Tegalwulung', 52261);
INSERT INTO `tbl_kel` VALUES (123, 6, 'Tembelang', 52261);
INSERT INTO `tbl_kel` VALUES (124, 7, 'Ciampel', 52264);
INSERT INTO `tbl_kel` VALUES (125, 7, 'Cigedog', 52264);
INSERT INTO `tbl_kel` VALUES (126, 7, 'Cikandang', 52264);
INSERT INTO `tbl_kel` VALUES (127, 7, 'Jagapura', 52264);
INSERT INTO `tbl_kel` VALUES (128, 7, 'Kemukten', 52264);
INSERT INTO `tbl_kel` VALUES (129, 7, 'Kersana', 52264);
INSERT INTO `tbl_kel` VALUES (130, 7, 'Kradenan', 52264);
INSERT INTO `tbl_kel` VALUES (131, 7, 'Kramatsampang', 52264);
INSERT INTO `tbl_kel` VALUES (132, 7, 'Kubangpari', 52264);
INSERT INTO `tbl_kel` VALUES (133, 7, 'Limbangan', 52264);
INSERT INTO `tbl_kel` VALUES (134, 7, 'Pende', 52264);
INSERT INTO `tbl_kel` VALUES (135, 7, 'Sindangjaya', 52264);
INSERT INTO `tbl_kel` VALUES (136, 7, 'Sutamaja', 52264);
INSERT INTO `tbl_kel` VALUES (137, 8, 'Baros', 52263);
INSERT INTO `tbl_kel` VALUES (138, 8, 'Buara', 52263);
INSERT INTO `tbl_kel` VALUES (139, 8, 'Bulakelor', 52263);
INSERT INTO `tbl_kel` VALUES (140, 8, 'Ciduwet', 52263);
INSERT INTO `tbl_kel` VALUES (141, 8, 'Cikeusal Kidul', 52263);
INSERT INTO `tbl_kel` VALUES (142, 8, 'Cikeusal Lor', 52263);
INSERT INTO `tbl_kel` VALUES (143, 8, 'Ciseureuh', 52263);
INSERT INTO `tbl_kel` VALUES (144, 8, 'Dukuhtengah', 52263);
INSERT INTO `tbl_kel` VALUES (145, 8, 'Dukuhbadag', 52263);
INSERT INTO `tbl_kel` VALUES (146, 8, 'Dukuhturi', 52263);
INSERT INTO `tbl_kel` VALUES (147, 8, 'Jemasih', 52263);
INSERT INTO `tbl_kel` VALUES (148, 8, 'Karangbandung', 52263);
INSERT INTO `tbl_kel` VALUES (149, 8, 'Karangmalang', 52263);
INSERT INTO `tbl_kel` VALUES (150, 8, 'Ketanggungan', 52263);
INSERT INTO `tbl_kel` VALUES (151, 8, 'Kubangjati', 52263);
INSERT INTO `tbl_kel` VALUES (152, 8, 'Kubangsari', 52263);
INSERT INTO `tbl_kel` VALUES (153, 8, 'Kubangwungu', 52263);
INSERT INTO `tbl_kel` VALUES (154, 8, 'Padakaton', 52263);
INSERT INTO `tbl_kel` VALUES (155, 8, 'Pamedaran', 52263);
INSERT INTO `tbl_kel` VALUES (156, 8, 'Sindangjaya', 52263);
INSERT INTO `tbl_kel` VALUES (157, 8, 'Tanggungsari', 52263);
INSERT INTO `tbl_kel` VALUES (158, 9, 'Kamal', 52262);
INSERT INTO `tbl_kel` VALUES (159, 9, 'Karangbale', 52262);
INSERT INTO `tbl_kel` VALUES (160, 9, 'Kedungbokor', 52262);
INSERT INTO `tbl_kel` VALUES (161, 9, 'Larangan', 52262);
INSERT INTO `tbl_kel` VALUES (162, 9, 'Luwunggede', 52262);
INSERT INTO `tbl_kel` VALUES (163, 9, 'Pamulihan', 52262);
INSERT INTO `tbl_kel` VALUES (164, 9, 'Rengaspendawa', 52262);
INSERT INTO `tbl_kel` VALUES (165, 9, 'Siandong', 52262);
INSERT INTO `tbl_kel` VALUES (166, 9, 'Sitanggal', 52262);
INSERT INTO `tbl_kel` VALUES (167, 9, 'Slatri', 52262);
INSERT INTO `tbl_kel` VALUES (168, 9, 'Wlahar', 52262);
INSERT INTO `tbl_kel` VALUES (169, 9, 'Poncol', 52262);
INSERT INTO `tbl_kel` VALUES (170, 10, 'Babakan', 52255);
INSERT INTO `tbl_kel` VALUES (171, 10, 'Blubuk', 52255);
INSERT INTO `tbl_kel` VALUES (172, 10, 'Bojongsari', 52255);
INSERT INTO `tbl_kel` VALUES (173, 10, 'Dukuhsalam', 52255);
INSERT INTO `tbl_kel` VALUES (174, 10, 'Jati Sawit', 52255);
INSERT INTO `tbl_kel` VALUES (175, 10, 'Kalibuntu', 52255);
INSERT INTO `tbl_kel` VALUES (176, 10, 'Karangdempel', 52255);
INSERT INTO `tbl_kel` VALUES (177, 10, 'Karangjunti', 52255);
INSERT INTO `tbl_kel` VALUES (178, 10, 'Karangsambung', 52255);
INSERT INTO `tbl_kel` VALUES (179, 10, 'Kecipir', 52255);
INSERT INTO `tbl_kel` VALUES (180, 10, 'Kedungneng', 52255);
INSERT INTO `tbl_kel` VALUES (181, 10, 'Limbangan', 52255);
INSERT INTO `tbl_kel` VALUES (182, 10, 'Losari Kidul', 52255);
INSERT INTO `tbl_kel` VALUES (183, 10, 'Losari Lor', 52255);
INSERT INTO `tbl_kel` VALUES (184, 10, 'Negla', 52255);
INSERT INTO `tbl_kel` VALUES (185, 10, 'Pekauman', 52255);
INSERT INTO `tbl_kel` VALUES (186, 10, 'Pengabean', 52255);
INSERT INTO `tbl_kel` VALUES (187, 10, 'Prapag Kidul', 52255);
INSERT INTO `tbl_kel` VALUES (188, 10, 'Prapag Lor', 52255);
INSERT INTO `tbl_kel` VALUES (189, 10, 'Radegan', 52255);
INSERT INTO `tbl_kel` VALUES (190, 10, 'Randusari', 52255);
INSERT INTO `tbl_kel` VALUES (191, 10, 'Rungkang', 52255);
INSERT INTO `tbl_kel` VALUES (192, 11, 'Cilibur', 52276);
INSERT INTO `tbl_kel` VALUES (193, 11, 'Cipetung', 52276);
INSERT INTO `tbl_kel` VALUES (194, 11, 'Kedungoleng', 52276);
INSERT INTO `tbl_kel` VALUES (195, 11, 'Kretek', 52276);
INSERT INTO `tbl_kel` VALUES (196, 11, 'Pagojengan', 52276);
INSERT INTO `tbl_kel` VALUES (197, 11, 'Paguyangan', 52276);
INSERT INTO `tbl_kel` VALUES (198, 11, 'Pakujati', 52276);
INSERT INTO `tbl_kel` VALUES (199, 11, 'Pandansari', 52276);
INSERT INTO `tbl_kel` VALUES (200, 11, 'Ragatunjung', 52276);
INSERT INTO `tbl_kel` VALUES (201, 11, 'Taraban', 52276);
INSERT INTO `tbl_kel` VALUES (202, 11, 'Wanatirta', 52276);
INSERT INTO `tbl_kel` VALUES (203, 11, 'Winduaji', 52276);
INSERT INTO `tbl_kel` VALUES (204, 12, 'Banjaran', 52275);
INSERT INTO `tbl_kel` VALUES (205, 12, 'Bentar', 52275);
INSERT INTO `tbl_kel` VALUES (206, 12, 'Bentarsari', 52275);
INSERT INTO `tbl_kel` VALUES (207, 12, 'Capar', 52275);
INSERT INTO `tbl_kel` VALUES (208, 12, 'Ciputih', 52275);
INSERT INTO `tbl_kel` VALUES (209, 12, 'Citimbang', 52275);
INSERT INTO `tbl_kel` VALUES (210, 12, 'Gandoang', 52275);
INSERT INTO `tbl_kel` VALUES (211, 12, 'Ganggawang', 52275);
INSERT INTO `tbl_kel` VALUES (212, 12, 'Gunung Larang', 52275);
INSERT INTO `tbl_kel` VALUES (213, 12, 'Gunung Sugih', 52275);
INSERT INTO `tbl_kel` VALUES (214, 12, 'Gunung Tajem', 52275);
INSERT INTO `tbl_kel` VALUES (215, 12, 'Indrajaya', 52275);
INSERT INTO `tbl_kel` VALUES (216, 12, 'Kadumanis', 52275);
INSERT INTO `tbl_kel` VALUES (217, 12, 'Pabuaran', 52275);
INSERT INTO `tbl_kel` VALUES (218, 12, 'Pasir Panjang', 52275);
INSERT INTO `tbl_kel` VALUES (219, 12, 'Salem', 52275);
INSERT INTO `tbl_kel` VALUES (220, 12, 'Tembongraja', 52275);
INSERT INTO `tbl_kel` VALUES (221, 12, 'Gunung Jaya', 52275);
INSERT INTO `tbl_kel` VALUES (222, 12, 'Wanoja', 52275);
INSERT INTO `tbl_kel` VALUES (223, 12, 'Windu Sakti', 52275);
INSERT INTO `tbl_kel` VALUES (224, 12, 'Winduasri', 52275);
INSERT INTO `tbl_kel` VALUES (225, 13, 'Batursari', 52272);
INSERT INTO `tbl_kel` VALUES (226, 13, 'Benda', 52272);
INSERT INTO `tbl_kel` VALUES (227, 13, 'Buniwah', 52272);
INSERT INTO `tbl_kel` VALUES (228, 13, 'Dawuhan', 52272);
INSERT INTO `tbl_kel` VALUES (229, 13, 'Igirklanceng', 52272);
INSERT INTO `tbl_kel` VALUES (230, 13, 'Kaligiri', 52272);
INSERT INTO `tbl_kel` VALUES (231, 13, 'Kaliloka', 52272);
INSERT INTO `tbl_kel` VALUES (232, 13, 'Manggis', 52272);
INSERT INTO `tbl_kel` VALUES (233, 13, 'Mendala', 52272);
INSERT INTO `tbl_kel` VALUES (234, 13, 'Mlayang', 52272);
INSERT INTO `tbl_kel` VALUES (235, 13, 'Plompong', 52272);
INSERT INTO `tbl_kel` VALUES (236, 13, 'Sridadi', 52272);
INSERT INTO `tbl_kel` VALUES (237, 13, 'Wanareja', 52272);
INSERT INTO `tbl_kel` VALUES (238, 14, 'Cenang', 52266);
INSERT INTO `tbl_kel` VALUES (239, 14, 'Dukuhmaja', 52266);
INSERT INTO `tbl_kel` VALUES (240, 14, 'Gegerkunci', 52266);
INSERT INTO `tbl_kel` VALUES (241, 14, 'Jatimakmur', 52266);
INSERT INTO `tbl_kel` VALUES (242, 14, 'Jatirokeh', 52266);
INSERT INTO `tbl_kel` VALUES (243, 14, 'Karangsembung', 52266);
INSERT INTO `tbl_kel` VALUES (244, 14, 'Songgom', 52266);
INSERT INTO `tbl_kel` VALUES (245, 14, 'Songgom Lor', 52266);
INSERT INTO `tbl_kel` VALUES (246, 14, 'Wanacala', 52266);
INSERT INTO `tbl_kel` VALUES (247, 14, 'Wanatawang', 52266);
INSERT INTO `tbl_kel` VALUES (248, 15, 'Karangreja', 52254);
INSERT INTO `tbl_kel` VALUES (249, 15, 'Kedawung', 52254);
INSERT INTO `tbl_kel` VALUES (250, 15, 'Kemurang Kulon', 52254);
INSERT INTO `tbl_kel` VALUES (251, 15, 'Kemurang Wetan', 52254);
INSERT INTO `tbl_kel` VALUES (252, 15, 'Krakahan', 52254);
INSERT INTO `tbl_kel` VALUES (253, 15, 'Kubangputat', 52254);
INSERT INTO `tbl_kel` VALUES (254, 15, 'Lemah Abang', 52254);
INSERT INTO `tbl_kel` VALUES (255, 15, 'Luwung Gede', 52254);
INSERT INTO `tbl_kel` VALUES (256, 15, 'Luwungbata', 52254);
INSERT INTO `tbl_kel` VALUES (257, 15, 'Mundu', 52254);
INSERT INTO `tbl_kel` VALUES (258, 15, 'Pejagan', 52254);
INSERT INTO `tbl_kel` VALUES (259, 15, 'Pengaradan', 52254);
INSERT INTO `tbl_kel` VALUES (260, 15, 'Sarireja', 52254);
INSERT INTO `tbl_kel` VALUES (261, 15, 'Sengon', 52254);
INSERT INTO `tbl_kel` VALUES (262, 15, 'Sidakaton', 52254);
INSERT INTO `tbl_kel` VALUES (263, 15, 'Tanjung', 52254);
INSERT INTO `tbl_kel` VALUES (264, 15, 'Tegongan', 52254);
INSERT INTO `tbl_kel` VALUES (265, 15, 'Tengguli', 52254);
INSERT INTO `tbl_kel` VALUES (266, 16, 'Galuh Timur', 52271);
INSERT INTO `tbl_kel` VALUES (267, 16, 'Kalijurang', 52271);
INSERT INTO `tbl_kel` VALUES (268, 16, 'Karangjongkeng', 52271);
INSERT INTO `tbl_kel` VALUES (269, 16, 'Kutamendala', 52271);
INSERT INTO `tbl_kel` VALUES (270, 16, 'Kutayu', 52271);
INSERT INTO `tbl_kel` VALUES (271, 16, 'Linggapura', 52271);
INSERT INTO `tbl_kel` VALUES (272, 16, 'Negarayu', 52271);
INSERT INTO `tbl_kel` VALUES (273, 16, 'Pepedan', 52271);
INSERT INTO `tbl_kel` VALUES (274, 16, 'Purbayasa', 52271);
INSERT INTO `tbl_kel` VALUES (275, 16, 'Purwodadi', 52271);
INSERT INTO `tbl_kel` VALUES (276, 16, 'Rajawetan', 52271);
INSERT INTO `tbl_kel` VALUES (277, 16, 'Tanggeran', 52271);
INSERT INTO `tbl_kel` VALUES (278, 16, 'Tonjong', 52271);
INSERT INTO `tbl_kel` VALUES (279, 16, 'Watujaya', 52271);
INSERT INTO `tbl_kel` VALUES (280, 17, 'Pesantunan', 52221);
INSERT INTO `tbl_kel` VALUES (281, 17, 'Pebatan', 52222);
INSERT INTO `tbl_kel` VALUES (282, 17, 'Dukuhwringin', 52252);
INSERT INTO `tbl_kel` VALUES (283, 17, 'DumelingGlonggong', 52252);
INSERT INTO `tbl_kel` VALUES (284, 17, 'Jagalempeni', 52252);
INSERT INTO `tbl_kel` VALUES (285, 17, 'Keboledan', 52252);
INSERT INTO `tbl_kel` VALUES (286, 17, 'Kertabesuki', 52252);
INSERT INTO `tbl_kel` VALUES (287, 17, 'Klampok', 52252);
INSERT INTO `tbl_kel` VALUES (288, 17, 'Kupu', 52252);
INSERT INTO `tbl_kel` VALUES (289, 17, 'Lengkong', 52252);
INSERT INTO `tbl_kel` VALUES (290, 17, 'Sawojajar', 52252);
INSERT INTO `tbl_kel` VALUES (291, 17, 'Siasem', 52252);
INSERT INTO `tbl_kel` VALUES (292, 17, 'Sidamulya', 52252);
INSERT INTO `tbl_kel` VALUES (293, 17, 'Sigentong', 52252);
INSERT INTO `tbl_kel` VALUES (294, 17, 'Sisalam', 52252);
INSERT INTO `tbl_kel` VALUES (295, 17, 'Siwungkuk', 52252);
INSERT INTO `tbl_kel` VALUES (296, 17, 'Tanjungsari', 52252);
INSERT INTO `tbl_kel` VALUES (297, 17, 'Tegalgandu', 52252);
INSERT INTO `tbl_kel` VALUES (298, 17, 'Wanasari', 52252);

-- ----------------------------
-- Table structure for tbl_pengajuan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_pengajuan`;
CREATE TABLE `tbl_pengajuan`  (
  `id` int(11) NOT NULL,
  `id_user` int(11) NULL DEFAULT NULL,
  `id_jenis_lembaga` int(11) NULL DEFAULT NULL,
  `nama_lembaga` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_kecamatan` int(11) NULL DEFAULT NULL,
  `id_kelurahan` int(11) NULL DEFAULT NULL,
  `jalan_gang` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `dukuh` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `rt` int(3) NULL DEFAULT NULL,
  `rw` int(3) NULL DEFAULT NULL,
  `tahun_berdiri` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nama_yayasan` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nama_pimpinan` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `file_surat_permohonan` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `file_pernyataan_nkri` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `file_rekomendasi_kua` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `file_suket_domisili` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `file_status_tanah_lembaga` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `file_struktur_pengurus` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `file_ijop_lama` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `file_akta_yayasan` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `file_emis_lembaga` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `file_emis_asatidz` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `file_emis_santri` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tbl_user
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `hp` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `level` int(2) NULL DEFAULT 2,
  `locked` int(1) NULL DEFAULT 0,
  `last_login` datetime(0) NULL DEFAULT NULL,
  `created` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `idx_email`(`email`) USING BTREE,
  UNIQUE INDEX `idx_hp`(`hp`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO `tbl_user` VALUES (1, 'M. Toha', 'tohakepriben@gmail.com', '089670581924', 1, 0, NULL, '2020-03-24 22:18:31', '2020-03-25 00:28:27');
INSERT INTO `tbl_user` VALUES (6, 'Pengguna baru', 'baru@gmail.com', '085842717515', 2, 0, NULL, '2020-03-24 23:08:36', '2020-03-25 00:28:27');

SET FOREIGN_KEY_CHECKS = 1;
