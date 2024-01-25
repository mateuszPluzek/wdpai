/*
 Navicat Premium Data Transfer

 Source Server         : wdpai_db
 Source Server Type    : PostgreSQL
 Source Server Version : 160001 (160001)
 Source Host           : localhost:5432
 Source Catalog        : postgres
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 160001 (160001)
 File Encoding         : 65001

 Date: 25/01/2024 09:41:11
*/


-- ----------------------------
-- Sequence structure for operators_id_operator_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."operators_id_operator_seq";
CREATE SEQUENCE "public"."operators_id_operator_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for routes_id_route_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."routes_id_route_seq";
CREATE SEQUENCE "public"."routes_id_route_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for station_routes_id_station_route_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."station_routes_id_station_route_seq";
CREATE SEQUENCE "public"."station_routes_id_station_route_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for stations_id_station_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."stations_id_station_seq";
CREATE SEQUENCE "public"."stations_id_station_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for trains_id_train_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."trains_id_train_seq";
CREATE SEQUENCE "public"."trains_id_train_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for user_details_id_user_detail_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."user_details_id_user_detail_seq";
CREATE SEQUENCE "public"."user_details_id_user_detail_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for users_id_user_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."users_id_user_seq";
CREATE SEQUENCE "public"."users_id_user_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for week_days_id_week_day_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."week_days_id_week_day_seq";
CREATE SEQUENCE "public"."week_days_id_week_day_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Table structure for favourite_stations
-- ----------------------------
DROP TABLE IF EXISTS "public"."favourite_stations";
CREATE TABLE "public"."favourite_stations" (
  "id_user" int4,
  "id_station" int4
)
;

-- ----------------------------
-- Records of favourite_stations
-- ----------------------------
INSERT INTO "public"."favourite_stations" VALUES (9, 3);
INSERT INTO "public"."favourite_stations" VALUES (9, 10);
INSERT INTO "public"."favourite_stations" VALUES (8, 10);
INSERT INTO "public"."favourite_stations" VALUES (14, 11);
INSERT INTO "public"."favourite_stations" VALUES (14, 1);

-- ----------------------------
-- Table structure for operating_days
-- ----------------------------
DROP TABLE IF EXISTS "public"."operating_days";
CREATE TABLE "public"."operating_days" (
  "id_route" int4,
  "id_week" int4
)
;

-- ----------------------------
-- Records of operating_days
-- ----------------------------

-- ----------------------------
-- Table structure for operators
-- ----------------------------
DROP TABLE IF EXISTS "public"."operators";
CREATE TABLE "public"."operators" (
  "id_operator" int4 NOT NULL DEFAULT nextval('operators_id_operator_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of operators
-- ----------------------------
INSERT INTO "public"."operators" VALUES (1, 'PR');
INSERT INTO "public"."operators" VALUES (2, 'KS');
INSERT INTO "public"."operators" VALUES (3, 'IC');
INSERT INTO "public"."operators" VALUES (4, 'EIP');
INSERT INTO "public"."operators" VALUES (5, 'EIC');
INSERT INTO "public"."operators" VALUES (6, 'TLK');
INSERT INTO "public"."operators" VALUES (7, 'CZD');

-- ----------------------------
-- Table structure for routes
-- ----------------------------
DROP TABLE IF EXISTS "public"."routes";
CREATE TABLE "public"."routes" (
  "id_route" int4 NOT NULL DEFAULT nextval('routes_id_route_seq'::regclass),
  "id_train" int4 NOT NULL,
  "code" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of routes
-- ----------------------------
INSERT INTO "public"."routes" VALUES (16, 3, 'KRA-KAT34308');
INSERT INTO "public"."routes" VALUES (17, 4, 'KRA-SERWIS1');
INSERT INTO "public"."routes" VALUES (18, 5, 'ŻY-KAT94770');
INSERT INTO "public"."routes" VALUES (19, 6, 'KRK-KAT3820');

-- ----------------------------
-- Table structure for station_routes
-- ----------------------------
DROP TABLE IF EXISTS "public"."station_routes";
CREATE TABLE "public"."station_routes" (
  "id_station_route" int4 NOT NULL DEFAULT nextval('station_routes_id_station_route_seq'::regclass),
  "id_station" int4 NOT NULL,
  "id_next_station" int4,
  "id_route" int4 NOT NULL,
  "route_order" int4,
  "arrival_time" time(0),
  "departure_time" time(0)
)
;

-- ----------------------------
-- Records of station_routes
-- ----------------------------
INSERT INTO "public"."station_routes" VALUES (6, 1, 17, 16, 1, '07:54:00', '08:04:00');
INSERT INTO "public"."station_routes" VALUES (7, 17, 3, 16, 2, '08:08:00', '08:08:00');
INSERT INTO "public"."station_routes" VALUES (9, 4, 5, 16, 4, '08:20:00', '08:20:00');
INSERT INTO "public"."station_routes" VALUES (10, 5, 6, 16, 5, '08:24:00', '08:24:00');
INSERT INTO "public"."station_routes" VALUES (11, 6, 7, 16, 6, '08:28:00', '08:29:00');
INSERT INTO "public"."station_routes" VALUES (12, 7, 8, 16, 7, '08:39:00', '08:40:00');
INSERT INTO "public"."station_routes" VALUES (13, 8, 9, 16, 8, '08:44:00', '08:45:00');
INSERT INTO "public"."station_routes" VALUES (14, 9, 10, 16, 9, '09:02:00', '09:03:00');
INSERT INTO "public"."station_routes" VALUES (15, 10, 11, 16, 10, '09:11:00', '09:12:00');
INSERT INTO "public"."station_routes" VALUES (16, 11, 11, 16, 11, '09:17:00', '09:17:00');
INSERT INTO "public"."station_routes" VALUES (8, 3, 4, 16, 3, '08:15:00', '08:15:00');
INSERT INTO "public"."station_routes" VALUES (17, 1, 17, 17, 1, '06:10:00', '06:20:00');
INSERT INTO "public"."station_routes" VALUES (18, 17, 17, 17, 2, '06:25:00', '06:25:00');
INSERT INTO "public"."station_routes" VALUES (19, 20, 21, 18, 1, '12:46:00', '12:48:00');
INSERT INTO "public"."station_routes" VALUES (20, 21, 22, 18, 2, '12:57:00', '12:57:00');
INSERT INTO "public"."station_routes" VALUES (21, 22, 23, 18, 3, '13:13:00', '13:13:00');
INSERT INTO "public"."station_routes" VALUES (22, 23, 24, 18, 4, '13:14:00', '13:14:00');
INSERT INTO "public"."station_routes" VALUES (23, 24, 25, 18, 5, '13:17:00', '13:21:00');
INSERT INTO "public"."station_routes" VALUES (24, 25, 26, 18, 6, '13:34:00', '13:35:00');
INSERT INTO "public"."station_routes" VALUES (25, 26, 27, 18, 7, '13:40:00', '13:40:00');
INSERT INTO "public"."station_routes" VALUES (27, 27, 28, 18, 8, '13:45:00', '13:46:00');
INSERT INTO "public"."station_routes" VALUES (29, 28, 29, 18, 9, '13:58:00', '13:58:00');
INSERT INTO "public"."station_routes" VALUES (30, 29, 30, 18, 11, '14:06:00', '14:07:00');
INSERT INTO "public"."station_routes" VALUES (32, 30, 31, 18, 12, '14:12:00', '14:12:00');
INSERT INTO "public"."station_routes" VALUES (33, 31, 11, 18, 13, '14:18:00', '14:19:00');
INSERT INTO "public"."station_routes" VALUES (35, 11, 11, 18, 14, '14:27:00', '14:27:00');
INSERT INTO "public"."station_routes" VALUES (36, 1, 11, 19, 1, '14:37:00', '13:37:00');
INSERT INTO "public"."station_routes" VALUES (37, 11, 11, 19, 2, '15:36:00', '15:41:00');

-- ----------------------------
-- Table structure for stations
-- ----------------------------
DROP TABLE IF EXISTS "public"."stations";
CREATE TABLE "public"."stations" (
  "id_station" int4 NOT NULL DEFAULT nextval('stations_id_station_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default",
  "code" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of stations
-- ----------------------------
INSERT INTO "public"."stations" VALUES (1, 'Kraków główny', 'KRG');
INSERT INTO "public"."stations" VALUES (3, 'Kraków Bronowice', 'KRB');
INSERT INTO "public"."stations" VALUES (4, 'Zabierzów', 'ZAB');
INSERT INTO "public"."stations" VALUES (5, 'Rudawa', 'RUD');
INSERT INTO "public"."stations" VALUES (6, 'Krzeszowice', 'KRZ');
INSERT INTO "public"."stations" VALUES (7, 'Trzebinia', 'TRZ');
INSERT INTO "public"."stations" VALUES (8, 'Balin', 'BLN');
INSERT INTO "public"."stations" VALUES (9, 'Mysłowice', 'MYS');
INSERT INTO "public"."stations" VALUES (10, 'Katowice Zawodzie', 'KTZ');
INSERT INTO "public"."stations" VALUES (11, 'Katowice', 'KAT');
INSERT INTO "public"."stations" VALUES (17, 'Kraków Łobzów', 'KRŁ');
INSERT INTO "public"."stations" VALUES (20, 'Żywiec', 'ŻWC');
INSERT INTO "public"."stations" VALUES (21, 'Łodygowice', 'ŁDG');
INSERT INTO "public"."stations" VALUES (22, 'Wilkowice Bystra', 'WLB');
INSERT INTO "public"."stations" VALUES (23, 'Bielsko-Biała Lipnik', 'BBL');
INSERT INTO "public"."stations" VALUES (24, 'Bielsko-Biała Główna', 'BBG');
INSERT INTO "public"."stations" VALUES (25, 'Czechowice-Dziedzice', 'CZD');
INSERT INTO "public"."stations" VALUES (26, 'Goczałkowice', 'GCZ');
INSERT INTO "public"."stations" VALUES (27, 'Pszczyna', 'PSZ');
INSERT INTO "public"."stations" VALUES (28, 'Kobiór', 'KBR');
INSERT INTO "public"."stations" VALUES (29, 'Tychy', 'TCH');
INSERT INTO "public"."stations" VALUES (30, 'Katowice Podlesie', 'KTP');
INSERT INTO "public"."stations" VALUES (31, 'Katowice Ligota', 'KTL');

-- ----------------------------
-- Table structure for trains
-- ----------------------------
DROP TABLE IF EXISTS "public"."trains";
CREATE TABLE "public"."trains" (
  "id_train" int4 NOT NULL DEFAULT nextval('trains_id_train_seq'::regclass),
  "id_operator" int4 NOT NULL,
  "name" varchar(255) COLLATE "pg_catalog"."default",
  "number" int4
)
;

-- ----------------------------
-- Records of trains
-- ----------------------------
INSERT INTO "public"."trains" VALUES (1, 1, 'KAROLINKA', 43800);
INSERT INTO "public"."trains" VALUES (3, 1, ' ', 34308);
INSERT INTO "public"."trains" VALUES (4, 1, 'SERWISOWY', 1);
INSERT INTO "public"."trains" VALUES (5, 2, 'S5', 94770);
INSERT INTO "public"."trains" VALUES (6, 3, 'OSTERWA', 3820);

-- ----------------------------
-- Table structure for user_details
-- ----------------------------
DROP TABLE IF EXISTS "public"."user_details";
CREATE TABLE "public"."user_details" (
  "id_user_detail" int4 NOT NULL DEFAULT nextval('user_details_id_user_detail_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default",
  "surname" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of user_details
-- ----------------------------
INSERT INTO "public"."user_details" VALUES (11, 'Adam', 'Mickiewicz');
INSERT INTO "public"."user_details" VALUES (13, 'Tester', 'testowy');
INSERT INTO "public"."user_details" VALUES (12, 'Docker', 'admin');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS "public"."users";
CREATE TABLE "public"."users" (
  "id_user" int4 NOT NULL DEFAULT nextval('users_id_user_seq'::regclass),
  "email" varchar(255) COLLATE "pg_catalog"."default",
  "password" varchar(255) COLLATE "pg_catalog"."default",
  "user_type" varchar(255) COLLATE "pg_catalog"."default" DEFAULT 'user'::character varying,
  "id_user_detail" int4
)
;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO "public"."users" VALUES (8, 'adam@gmail.com', '$2y$10$6G8bQTFkJZrph/boGu3GUOtE7VBHaX90.o4w8j7L19yAEKRFohLaq', 'user', 11);
INSERT INTO "public"."users" VALUES (9, 'admin@admin.com', '$2y$10$M4zaBEILujHSY4ADVsE4k.7QEwX/3b/lDUPhF0lKuaNytUBVjDN4e', 'admin', 12);
INSERT INTO "public"."users" VALUES (14, 'test@gmail.com', '$2y$10$stcqwMd8jxdIPp3LBSzLF.sgLdjOOPad.BvH81OxwqArV7xE0LC.S', 'user', 13);

-- ----------------------------
-- Table structure for week_days
-- ----------------------------
DROP TABLE IF EXISTS "public"."week_days";
CREATE TABLE "public"."week_days" (
  "id_week_day" int4 NOT NULL DEFAULT nextval('week_days_id_week_day_seq'::regclass),
  "name_of_the_day" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of week_days
-- ----------------------------
INSERT INTO "public"."week_days" VALUES (1, 'monday');
INSERT INTO "public"."week_days" VALUES (2, 'tuesday');
INSERT INTO "public"."week_days" VALUES (3, 'wednesday');
INSERT INTO "public"."week_days" VALUES (4, 'thursday');
INSERT INTO "public"."week_days" VALUES (5, 'friday');
INSERT INTO "public"."week_days" VALUES (6, 'saturday');
INSERT INTO "public"."week_days" VALUES (7, 'sunday');

-- ----------------------------
-- Function structure for add_operator
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."add_operator"("p_name" varchar);
CREATE OR REPLACE FUNCTION "public"."add_operator"("p_name" varchar)
  RETURNS "pg_catalog"."void" AS $BODY$BEGIN
	-- Routine body goes here...
		INSERT INTO Operators(name) VALUES (p_name);
	RETURN;
END$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;

-- ----------------------------
-- Function structure for update_departure
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."update_departure"();
CREATE OR REPLACE FUNCTION "public"."update_departure"()
  RETURNS "pg_catalog"."trigger" AS $BODY$
BEGIN
    IF NEW.departure_time < NEW.arrival_time THEN
        NEW.departure_time := NEW.arrival_time;
    END IF;
    RETURN NEW;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;

-- ----------------------------
-- View structure for personal_data
-- ----------------------------
DROP VIEW IF EXISTS "public"."personal_data";
CREATE VIEW "public"."personal_data" AS  SELECT user_details.name AS "Imię",
    user_details.surname AS nazwisko,
    users.email AS "e-mail"
   FROM users
     JOIN user_details USING (id_user_detail);

-- ----------------------------
-- View structure for Kraków-Katowice
-- ----------------------------
DROP VIEW IF EXISTS "public"."Kraków-Katowice";
CREATE VIEW "public"."Kraków-Katowice" AS  SELECT stations.name
   FROM stations
     JOIN station_routes USING (id_station)
  WHERE station_routes.id_route = 16
  ORDER BY station_routes.arrival_time;

-- ----------------------------
-- View structure for Find_route
-- ----------------------------
DROP VIEW IF EXISTS "public"."Find_route";
CREATE VIEW "public"."Find_route" AS  SELECT id_route
   FROM station_routes
  WHERE id_station = ANY (ARRAY[1, 3])
  GROUP BY id_route
 HAVING count(DISTINCT id_station) = 2;

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."operators_id_operator_seq"
OWNED BY "public"."operators"."id_operator";
SELECT setval('"public"."operators_id_operator_seq"', 7, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."routes_id_route_seq"
OWNED BY "public"."routes"."id_route";
SELECT setval('"public"."routes_id_route_seq"', 21, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."station_routes_id_station_route_seq"
OWNED BY "public"."station_routes"."id_station_route";
SELECT setval('"public"."station_routes_id_station_route_seq"', 38, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."stations_id_station_seq"
OWNED BY "public"."stations"."id_station";
SELECT setval('"public"."stations_id_station_seq"', 31, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."trains_id_train_seq"
OWNED BY "public"."trains"."id_train";
SELECT setval('"public"."trains_id_train_seq"', 6, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."user_details_id_user_detail_seq"
OWNED BY "public"."user_details"."id_user_detail";
SELECT setval('"public"."user_details_id_user_detail_seq"', 17, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."users_id_user_seq"
OWNED BY "public"."users"."id_user";
SELECT setval('"public"."users_id_user_seq"', 14, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."week_days_id_week_day_seq"
OWNED BY "public"."week_days"."id_week_day";
SELECT setval('"public"."week_days_id_week_day_seq"', 7, true);

-- ----------------------------
-- Indexes structure for table favourite_stations
-- ----------------------------
CREATE UNIQUE INDEX "unique_constraints" ON "public"."favourite_stations" USING btree (
  "id_user" "pg_catalog"."int4_ops" ASC NULLS LAST,
  "id_station" "pg_catalog"."int4_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table operators
-- ----------------------------
ALTER TABLE "public"."operators" ADD CONSTRAINT "operators_pkey" PRIMARY KEY ("id_operator");

-- ----------------------------
-- Indexes structure for table routes
-- ----------------------------
CREATE UNIQUE INDEX "unique_code_route" ON "public"."routes" USING btree (
  "code" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table routes
-- ----------------------------
ALTER TABLE "public"."routes" ADD CONSTRAINT "routes_pkey" PRIMARY KEY ("id_route");

-- ----------------------------
-- Indexes structure for table station_routes
-- ----------------------------
CREATE UNIQUE INDEX "unique_route" ON "public"."station_routes" USING btree (
  "id_route" "pg_catalog"."int4_ops" ASC NULLS LAST,
  "route_order" "pg_catalog"."int4_ops" ASC NULLS LAST
);

-- ----------------------------
-- Triggers structure for table station_routes
-- ----------------------------
CREATE TRIGGER "before_insert_trigger" BEFORE INSERT ON "public"."station_routes"
FOR EACH ROW
EXECUTE PROCEDURE "public"."update_departure"();

-- ----------------------------
-- Primary Key structure for table station_routes
-- ----------------------------
ALTER TABLE "public"."station_routes" ADD CONSTRAINT "station_routes_pkey" PRIMARY KEY ("id_station_route");

-- ----------------------------
-- Indexes structure for table stations
-- ----------------------------
CREATE UNIQUE INDEX "unique_code" ON "public"."stations" USING btree (
  "code" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);
CREATE UNIQUE INDEX "unique_name" ON "public"."stations" USING btree (
  "name" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table stations
-- ----------------------------
ALTER TABLE "public"."stations" ADD CONSTRAINT "stations_pkey" PRIMARY KEY ("id_station");

-- ----------------------------
-- Indexes structure for table trains
-- ----------------------------
CREATE UNIQUE INDEX "unique_number" ON "public"."trains" USING btree (
  "number" "pg_catalog"."int4_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table trains
-- ----------------------------
ALTER TABLE "public"."trains" ADD CONSTRAINT "trains_pkey" PRIMARY KEY ("id_train");

-- ----------------------------
-- Primary Key structure for table user_details
-- ----------------------------
ALTER TABLE "public"."user_details" ADD CONSTRAINT "user_details_pkey" PRIMARY KEY ("id_user_detail");

-- ----------------------------
-- Primary Key structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_pkey" PRIMARY KEY ("id_user");

-- ----------------------------
-- Primary Key structure for table week_days
-- ----------------------------
ALTER TABLE "public"."week_days" ADD CONSTRAINT "week_days_pkey" PRIMARY KEY ("id_week_day");

-- ----------------------------
-- Foreign Keys structure for table favourite_stations
-- ----------------------------
ALTER TABLE "public"."favourite_stations" ADD CONSTRAINT "fk_station" FOREIGN KEY ("id_station") REFERENCES "public"."stations" ("id_station") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."favourite_stations" ADD CONSTRAINT "fk_user" FOREIGN KEY ("id_user") REFERENCES "public"."users" ("id_user") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table operating_days
-- ----------------------------
ALTER TABLE "public"."operating_days" ADD CONSTRAINT "fk_day" FOREIGN KEY ("id_week") REFERENCES "public"."week_days" ("id_week_day") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."operating_days" ADD CONSTRAINT "fk_route" FOREIGN KEY ("id_route") REFERENCES "public"."routes" ("id_route") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table routes
-- ----------------------------
ALTER TABLE "public"."routes" ADD CONSTRAINT "fk_train" FOREIGN KEY ("id_train") REFERENCES "public"."trains" ("id_train") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table station_routes
-- ----------------------------
ALTER TABLE "public"."station_routes" ADD CONSTRAINT "fk_route" FOREIGN KEY ("id_route") REFERENCES "public"."routes" ("id_route") ON DELETE CASCADE ON UPDATE NO ACTION;
ALTER TABLE "public"."station_routes" ADD CONSTRAINT "kf_next" FOREIGN KEY ("id_next_station") REFERENCES "public"."stations" ("id_station") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."station_routes" ADD CONSTRAINT "kf_station" FOREIGN KEY ("id_station") REFERENCES "public"."stations" ("id_station") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table trains
-- ----------------------------
ALTER TABLE "public"."trains" ADD CONSTRAINT "fk_operator" FOREIGN KEY ("id_operator") REFERENCES "public"."operators" ("id_operator") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "kf_user_detail" FOREIGN KEY ("id_user_detail") REFERENCES "public"."user_details" ("id_user_detail") ON DELETE NO ACTION ON UPDATE NO ACTION;
