<?php
//nastartujeme session abychom mohli udelat prihalsovani a odhlasovani
session_start();
require_once "./data.php";

$aktivniInstance = "";

//zpracujem login formular
if (array_key_exists("login-submit", $_POST)) {
    $zadaneJmeno = $_POST["jmeno"];
    $zadaneHeslo = $_POST["heslo"];

    if ($zadaneJmeno == "admin" && $zadaneHeslo == "cici123") {
        $_SESSION["jePrihlasen"] = true;
    }
}

//zpracujeme logout
if (array_key_exists("logout-submit", $_GET)) {
    //odhlasime uzavetel tim, ze odstarnme klic ze sessiony
    unset($_SESSION["jePrihlasen"]);
    //procistime url aby nam to slovo "login-submit" zmizelo
    header("Location: ?");
    exit;
}

//kontrola zda je uzivatel prihlaseny
//nektere operace chcem porvest jen kdyz je prihlaseny
if (array_key_exists("jePrihlasen", $_SESSION)) {
    //zpracujeme mazani stranky
    if (array_key_exists("delete", $_GET)) {
        $idStranky = $_GET["delete"];
        $poleStranek[$idStranky]->smazMe();

        //presmerujeme uzivatele na cistou URL
        header("Location: ?");
        exit;
    }

    //zpracujeme formulare pro vytvoreni nove stranky
    if (array_key_exists("new", $_GET)) {
        //vytvorime isntaci ktera budem mit ve vsech vlastnostech prazdny string
        $aktivniInstance = new Stranka("", "", "", "");
    }

    //zpracujeme formular pro editovani stranky
    if (array_key_exists("edit", $_GET)) {
        $idStranky = $_GET["edit"];
        //najdeme instanci, kterou uzivatel chce editovat
        $aktivniInstance = $poleStranek[$idStranky];
    }

    //zpracujeme formular pro ulozeni stranky
    if (array_key_exists("aktualizovat-submit", $_POST)) {
        //kontrola zda id neni prazdne, pokud ano, tak ho presmerujem zpet na homepage adminu
        //tomuto if se rika "guarding clause"
        if (trim($_POST["id-stranky"]) == "") {
            header("Location: ?");
            exit;
        }

        //vytahneme data z formualre
        //trimneme id stranky aby nebyly mezery pred a za
        $idStranky = trim($_POST["id-stranky"]);
        $titulekStranky = $_POST["titulek-stranky"];
        $menuStranky = $_POST["menu-stranky"];
        $obrazekStranky = $_POST["obrazek-stranky"];
        //vloziem tyto data do isntance
        $aktivniInstance->setId($idStranky);
        $aktivniInstance->setTitulek($titulekStranky);
        $aktivniInstance->setMenu($menuStranky);
        $aktivniInstance->setObrazek($obrazekStranky);

        //propiseme zmeny do DB
        $aktivniInstance->propisDoDb();

        //zjistime si novy obsah texarea
        $obsahStranky = $_POST["obsah-stranky"];
        //nyni zavolame metodu setObsah a do argumentu dame ten novy text souboru
        $aktivniInstance->setObsah($obsahStranky);

        //presmerujeme ho na novou url s novym id
        header("Location: ?edit=$idStranky");
        exit;
    }

}//endKontrolaPrihlaseni

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin sekce</title>
</head>
<body>
    <h1>Admin sekce</h1>

    <?php

    //mame 2 verze stranek, jednu pro prihlasene a jednu pro neprihlasene

    if (array_key_exists("jePrihlasen", $_SESSION)) {
        //vypiseme verzi stranky pro prihlasene
        echo "<a href='?logout-submit'>Odhlasit se</a>";

        //pripojime seznam stranek, ktere muze editovat
        require_once "./seznam-stranek.php";

        echo "<hr>";
        //toto je odkaz ktery zpracujeme jako GET formular a zobrazime uzivateli prazdny WYSISYG
        echo "<a href='?new'>VYTVOŘIT NOVOU STRÁNKU</a>";
        echo "<hr>";


        //pripojime editor stranek jen pokud uzivatel zvolil nejakou konkretni stranku pro editovani
        if ($aktivniInstance != "") {
            require_once "./editor-stranek.php";
        }
    }else{
        //vypiseme vyeri stranky pro neprihlasene
        require_once "./prihlasovaci-formular.php";
    }
    ?>

</body>
</html>