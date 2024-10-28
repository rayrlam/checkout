

CREATE TABLE `employees` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rfid` char(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `joined_at` timestamp NOT NULL,
  `left_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employees_rfid_unique` (`rfid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO employees (id, first_name, last_name, rfid, joined_at, left_at, created_at, updated_at) VALUES ('1','Julius','Caesar','142594708f3a5a3ac2980914a0fc954f','2012-01-11 00:00:00','','','');

INSERT INTO employees (id, first_name, last_name, rfid, joined_at, left_at, created_at, updated_at) VALUES ('2','John','Deon','3ac2980914a0fc954f142594708f3a5a','2013-02-22 00:00:00','','','');

INSERT INTO employees (id, first_name, last_name, rfid, joined_at, left_at, created_at, updated_at) VALUES ('3','Peter','Pan','1425947954f08f3a5a3ac2980914a0fc','2014-03-13 00:00:00','','','');

INSERT INTO employees (id, first_name, last_name, rfid, joined_at, left_at, created_at, updated_at) VALUES ('4','David','Bradley','594708f3a5a3ac2980914a1420fc954f','2015-06-20 00:00:00','','','');

INSERT INTO employees (id, first_name, last_name, rfid, joined_at, left_at, created_at, updated_at) VALUES ('5','Tom','Hardy','708f3a5a3ac2142594980914a0fc954f','2016-11-08 00:00:00','','','');

INSERT INTO employees (id, first_name, last_name, rfid, joined_at, left_at, created_at, updated_at) VALUES ('6','Mary','Berry','954f708f3a5a3ac2142594980914a0fc','2016-12-28 00:00:00','','','');

INSERT INTO employees (id, first_name, last_name, rfid, joined_at, left_at, created_at, updated_at) VALUES ('7','Bob','Marley','000f708f3a5a3ac2142594980914a0fc','2016-12-30 00:00:00','2021-12-30 00:00:00','','');


CREATE TABLE `buildings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `building_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `buildings_country_id_foreign` (`country_id`),
  CONSTRAINT `buildings_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO buildings (id, building_name, country_id, created_at, updated_at) VALUES ('1','Isaac Newton','1','','');

INSERT INTO buildings (id, building_name, country_id, created_at, updated_at) VALUES ('2','Oscar Wilde','1','','');

INSERT INTO buildings (id, building_name, country_id, created_at, updated_at) VALUES ('3','Charles Darwin','1','','');

INSERT INTO buildings (id, building_name, country_id, created_at, updated_at) VALUES ('4','Benjamin Franklin','2','','');

INSERT INTO buildings (id, building_name, country_id, created_at, updated_at) VALUES ('5','Luciano Pavarotti','3','','');


CREATE TABLE `countries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `country_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO countries (id, country_name, created_at, updated_at) VALUES ('1','UK','','');

INSERT INTO countries (id, country_name, created_at, updated_at) VALUES ('2','USA','','');

INSERT INTO countries (id, country_name, created_at, updated_at) VALUES ('3','ITALY','','');


CREATE TABLE `departments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `department_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `building_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `departments_building_id_foreign` (`building_id`),
  CONSTRAINT `departments_building_id_foreign` FOREIGN KEY (`building_id`) REFERENCES `buildings` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO departments (id, department_name, building_id, created_at, updated_at) VALUES ('1','development','1','','');

INSERT INTO departments (id, department_name, building_id, created_at, updated_at) VALUES ('2','accounting','1','','');

INSERT INTO departments (id, department_name, building_id, created_at, updated_at) VALUES ('3','HR','2','','');

INSERT INTO departments (id, department_name, building_id, created_at, updated_at) VALUES ('4','sales','2','','');

INSERT INTO departments (id, department_name, building_id, created_at, updated_at) VALUES ('5','headquarters','3','','');

INSERT INTO departments (id, department_name, building_id, created_at, updated_at) VALUES ('6','development','4','','');

INSERT INTO departments (id, department_name, building_id, created_at, updated_at) VALUES ('7','sales','4','','');

INSERT INTO departments (id, department_name, building_id, created_at, updated_at) VALUES ('8','development','5','','');

INSERT INTO departments (id, department_name, building_id, created_at, updated_at) VALUES ('9','sales','5','','');

INSERT INTO departments (id, department_name, building_id, created_at, updated_at) VALUES ('10','director','3','','');


CREATE TABLE `employee_departments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` bigint unsigned NOT NULL,
  `department_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_departments_employee_id_foreign` (`employee_id`),
  KEY `employee_departments_department_id_foreign` (`department_id`),
  CONSTRAINT `employee_departments_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  CONSTRAINT `employee_departments_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO employee_departments (id, employee_id, department_id, created_at, updated_at) VALUES ('1','1','10','','');

INSERT INTO employee_departments (id, employee_id, department_id, created_at, updated_at) VALUES ('2','1','1','','');

INSERT INTO employee_departments (id, employee_id, department_id, created_at, updated_at) VALUES ('3','2','2','','');

INSERT INTO employee_departments (id, employee_id, department_id, created_at, updated_at) VALUES ('4','2','3','','');

INSERT INTO employee_departments (id, employee_id, department_id, created_at, updated_at) VALUES ('5','3','4','','');

INSERT INTO employee_departments (id, employee_id, department_id, created_at, updated_at) VALUES ('6','3','7','','');

INSERT INTO employee_departments (id, employee_id, department_id, created_at, updated_at) VALUES ('7','3','9','','');

INSERT INTO employee_departments (id, employee_id, department_id, created_at, updated_at) VALUES ('8','4','6','','');

INSERT INTO employee_departments (id, employee_id, department_id, created_at, updated_at) VALUES ('9','5','1','','');

INSERT INTO employee_departments (id, employee_id, department_id, created_at, updated_at) VALUES ('10','5','6','','');

INSERT INTO employee_departments (id, employee_id, department_id, created_at, updated_at) VALUES ('11','6','5','','');

INSERT INTO employee_departments (id, employee_id, department_id, created_at, updated_at) VALUES ('12','6','8','','');

INSERT INTO employee_departments (id, employee_id, department_id, created_at, updated_at) VALUES ('13','7','1','','');

INSERT INTO employee_departments (id, employee_id, department_id, created_at, updated_at) VALUES ('14','7','2','','');
