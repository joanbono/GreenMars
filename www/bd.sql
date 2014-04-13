CREATE DATABASE sensors_db;
USE sensors_db;

CREATE table tbl_sensors (id MEDIUMINT NOT NULL AUTO_INCREMENT,sensor_name varchar(10) NOT NULL, sensor_data varchar(10), max_threshold varchar(10), min_threshold varchar(10), sensor_desc varchar(30),PRIMARY KEY (id) ) ENGINE=MyISAM;


CREATE table tbl_datalog (id MEDIUMINT NOT NULL AUTO_INCREMENT,now varchar(35) NOT NULL, sensor_name varchar(10) NOT NULL, sensor_data varchar(10), PRIMARY KEY (id) ) ENGINE=MyISAM;
