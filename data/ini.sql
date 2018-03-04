/* Script Re Create Database */

DROP DATABASE IF EXISTS blog;

CREATE DATABASE blog;

USE blog;

CREATE TABLE post (

    id INT(11) AUTO_INCREMENT PRIMARY KEY,

    title VARCHAR(250) NOT NULL,

    content LONGTEXT,

    date TIMESTAMP

);

