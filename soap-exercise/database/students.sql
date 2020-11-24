CREATE DATABASE students;

use students;

CREATE TABLE `students`.`students` ( `id` INT NOT NULL AUTO_INCREMENT ,  `student_id` INT NOT NULL ,  `full_name` VARCHAR(10) NOT NULL ,  `email` VARCHAR(255) NOT NULL ,  `phone` VARCHAR(25) NOT NULL ,  `address` VARCHAR(100) NOT NULL ,  `entry_points` INT(100) NOT NULL ,    PRIMARY KEY  (`id`),    UNIQUE  (`student_id`),    UNIQUE  (`email`)) ENGINE = InnoDB;