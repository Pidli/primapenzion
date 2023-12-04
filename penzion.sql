-- Active: 1700831731511@@127.0.0.1@3306@penzion
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Stř 29. lis 2023, 13:26
-- Verze serveru: 10.4.28-MariaDB
-- Verze PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `penzion`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `stranka`
--

DROP TABLE IF EXISTS `stranka`;
CREATE TABLE `stranka` (
  `id` varchar(255) NOT NULL,
  `titulek` varchar(255) DEFAULT NULL,
  `menu` varchar(255) DEFAULT NULL,
  `obrazek` varchar(255) DEFAULT NULL,
  `obsah` text DEFAULT NULL,
  `poradi` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `stranka`
--

INSERT INTO `stranka` (`id`, `titulek`, `menu`, `obrazek`, `obsah`, `poradi`) VALUES
('domu', 'PrimaPenzion', 'Home', 'primapenzion-main.jpg', '<section>\r\n<div class=\"info\">\r\n<div class=\"container\">\r\n<h1>PENZION A RESTAURACE</h1>\r\n<h2>Inspirováno krásnými věcmi.</h2>\r\n<h3 class=\"motto\">Podnadpis</h3>\r\n<p>Hledáte ubytování v západních Čechách nebo dokonce klidný penzion v západních Čechách? Pak jste na správném místě. Rodinný penzion Žuhansta nabízí kromě příjemného a levného ubytování i celou řadu možností pro pořádání společenské akcí či výletů po okolní přírodě (oblast řeky Berounky), která je na seznamu UNESCO.</p>\r\n</div>\r\n</div>\r\n</section>', 1),
('galerie', 'Fotogalerie', 'Foto', 'primapenzion-pool-min.jpg', '<section>\r\n<div class=\"info\">\r\n<div class=\"container\">\r\n<h1>Galerie</h1>\r\n<div class=\"galerie\"><a href=\"#\"> <img src=\"img/img1-min.jpg\" alt=\"obrázek\" /> </a> <a href=\"#\"> <img src=\"img/img2-min.jpg\" alt=\"obrázek\" /> </a> <a href=\"#\"> <img src=\"img/img3-min.jpg\" alt=\"obrázek\" /> </a> <a href=\"#\"> <img src=\"img/img4-min.jpg\" alt=\"obrázek\" /> </a> <a href=\"#\"> <img src=\"img/img5-min.jpg\" alt=\"obrázek\" /> </a> <a href=\"#\"> <img src=\"img/img6-min.jpg\" alt=\"obrázek\" /> </a> <a href=\"#\"> <img src=\"img/img7-min.jpg\" alt=\"obrázek\" /> </a> <a href=\"#\"> <img src=\"img/img8-min.jpg\" alt=\"obrázek\" /> </a></div>\r\n</div>\r\n</div>\r\n</section>', 2),
('kontakt', 'Kontakt', 'Napište nám', 'primapenzion-room2.jpg', '<section>\r\n<div class=\"kontakt\">\r\n<div class=\"container\">\r\n<div class=\"kontaktGrey\">\r\n<h1>Kontakt</h1>\r\n<div class=\"kontaktFlex\">\r\n<div class=\"pataText\">\r\n<p><i class=\"fa-solid fa-map-pin\"></i><b>PrimaPenzion</b>, Jablonského 2, Praha 7</p>\r\n<p><i class=\"fa-solid fa-phone\"></i><a href=\"tel:+420606123456\" class=\"odkaz\">+420 / 606 123 456</a></p>\r\n<p><i class=\"fa-regular fa-envelope\"></i><span>info@primapenzion.cz</span></p>\r\n</div>\r\n<div class=\"pataText\">\r\n<p></p>\r\n</div>\r\n<div class=\"doba\">\r\n<p><b>Po - Pá:</b> 8h - 20h</p>\r\n<p><b>So:</b> 10h - 22h</p>\r\n<p><b>Ne:</b> zavřeno</p>\r\n</div>\r\n</div>\r\n<div class=\"karty\">\r\n<p>Přijímáme tyto platební karty</p>\r\n<i class=\"fa-brands fa-cc-visa\"></i> <i class=\"fa-brands fa-cc-mastercard\"></i> <i class=\"fa-brands fa-paypal\"></i></div>\r\n</div>\r\n<iframe width=\"400\" height=\"450\" style=\"border: 0;\" src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2558.88762614901!2d14.441085899999997!3d50.107110299999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470b94b58406182b%3A0x1f35b827dff20972!2sJablonsk%C3%A9ho%20640%2F2%2C%20170%2000%20Praha%207-Hole%C5%A1ovice!5e0!3m2!1scs!2scz!4v1699524782637!5m2!1scs!2scz\" allowfullscreen=\"allowfullscreen\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>\r\n<div class=\"kontaktGrey\">\r\n<h2>Napište nám</h2>\r\n<form action=\"#\" method=\"get\"><input type=\"text\" name=\"jmeno\" placeholder=\"Jméno:\" /> <input type=\"text\" name=\"prijmeni\" placeholder=\"Příjmení:\" /> <input type=\"email\" name=\"mail\" placeholder=\"E-mail:\" /> <textarea name=\"Vzkaz\" placeholder=\"Napište nám\"></textarea> <input type=\"submit\" value=\"odeslat\" /></form></div>\r\n</div>\r\n</div>\r\n</section>', 4),
('rezervace', 'Rezervace', 'Chci pokoj', 'primapenzion-room.jpg', '<section>\r\n<div class=\"kontakt\">\r\n<div class=\"container\">\r\n<div class=\"kontaktGrey\">\r\n<h1>Rezervace</h1>\r\n<form action=\"#\" method=\"get\"><input type=\"text\" name=\"jmeno\" placeholder=\"Jméno:\" /> <input type=\"text\" name=\"prijmeni\" placeholder=\"Příjmení:\" /> <input type=\"email\" name=\"mail\" placeholder=\"E-mail:\" /><select name=\"osoby\" id=\"osoby\" placeholder=\"Počet dospělých\">\r\n<option value=\"pocet_dospelych\">Počet dospělých</option>\r\n<option value=\"1\">1</option>\r\n<option value=\"2\">2</option>\r\n<option value=\"3\">3</option>\r\n</select><select name=\"osoby\" id=\"osoby\" placeholder=\"Počet dětí\">\r\n<option value=\"pocet_dospelych\">Počet dětí</option>\r\n<option value=\"1\">1</option>\r\n<option value=\"2\">2</option>\r\n<option value=\"3\">3</option>\r\n</select><input type=\"number\" name=\"psi\" placeholder=\"Počet psů\" /> <input type=\"date\" name=\"prijezd\" placeholder=\"Datum příjezdu\" /> <input type=\"date\" name=\"odjezd\" placeholder=\"Datum odjezdu\" /> <textarea name=\"Vzkaz\" placeholder=\"Napište nám\"></textarea> <input type=\"submit\" value=\"odeslat\" /></form></div>\r\n</div>\r\n</div>\r\n</section>', 3);

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `stranka`
--
ALTER TABLE `stranka`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
