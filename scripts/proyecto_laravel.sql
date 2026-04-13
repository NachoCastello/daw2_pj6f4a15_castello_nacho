DROP DATABASE IF EXISTS daw2_pj6f4a15_castello_nacho;
CREATE DATABASE daw2_pj6f4a15_castello_nacho;

DROP USER IF EXISTS 'administrador'@'localhost';
CREATE USER 'administrador'@'localhost' IDENTIFIED BY 'FjeClot26#';

GRANT ALL PRIVILEGES ON daw2_pj6f4a15_castello_nacho.* TO 'administrador'@'localhost';
FLUSH PRIVILEGES;
