<?php
?>

DROP DATABASE IF EXISTS h1;
CREATE DATABASE h1;
USE h1;

CREATE TABLE entradas(
  id int(11) NOT NULL AUTO_INCREMENT,
  texto varchar(255) DEFAULT NULL,
  PRIMARY KEY (id)
  )
ENGINE = INNODB;

INSERT INTO entradas (id, texto)
  VALUES (DEFAULT, 'texto1'),
(DEFAULT, 'texto2'),
(DEFAULT, 'texto3');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

