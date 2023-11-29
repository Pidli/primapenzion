-- Active: 1700831731511@@127.0.0.1@3306@penzion
DROP DATABASE penzion;
CREATE DATABASE penzion DEFAULT CHARSET utf8mb4;
USE penzion;
CREATE TABLE stranka (
    id VARCHAR(255) PRIMARY KEY,
    titulek VARCHAR(255),
    menu VARCHAR(255),
    obrazek VARCHAR(255),
    obsah TEXT,
    poradi INT NOT NULL DEFAULT 0
);
SHOW TABLES;
INSERT INTO stranka SET id="kocka", titulek="mnau", menu="cici", obrazek="primapenzion-main.jpg", obsah="cici123";
SELECT * FROM stranka;

--zmente titulek a id kocky na pes
UPDATE stranka SET id="pes", titulek="haf" WHERE id="kocka";

SELECT MAX(poradi) AS max_hodnota FROM stranka;