<?php
$instanceDB = new PDO(
    "mysql:host=localhost;dbname=penzion;charset=utf8mb4",
    "root",
    "",
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
);

//nadefinujeme tridu Stranka
class Stranka {
    private $id;
    private $titulek;
    private $menu;
    private $obrazek;
    private $oldId = "";


    function __construct($argId, $argTitulek, $argMenu, $argObrazek) {
        $this->id = $argId;
        $this->titulek = $argTitulek;
        $this->menu = $argMenu;
        $this->obrazek = $argObrazek; 
    }

    function getTitulek() {
        return $this->titulek;
    }

    function setTitulek($argNovyTitulek) {
        $this->titulek = $argNovyTitulek;
    }

    function getId() {
        return $this->id;
    }

    function setId($argNoveId) {
        if (trim($argNoveId) != "") {
            //ulozime si stare id bokem pro pozdejsi pouziti
            $this->oldId = $this->id;
            //zmenime hodnotu id
            $this->id = trim($argNoveId);
        }
    }

    function getMenu() {
        return $this->menu;
    }

    function setMenu($argNoveMenu) {
        $this->menu = $argNoveMenu;
    }

    function getObrazek() {
        return $this->obrazek;
    }

    function setObrazek($argNovyObrazek) {
        $this->obrazek = $argNovyObrazek;
    }

    function getObsah() {
        //tato promenena $instanceDB uvnitr classy Stranka neexistuje
        //uvnitr classy nemuzeme pouzivta promenne nadefinovane mimo classu
        //pokud chceme pouzit promennou, ktera zvnikla mimo classu, tak musime pouzit pole $GLOBALS
        $prikaz = $GLOBALS["instanceDB"]->prepare("SELECT * FROM stranka WHERE id=:id");
        $prikaz->bindParam(":id", $this->id, PDO::PARAM_STR);
        $prikaz->execute();
        //vime ze chceme 1 konkretni vysledek, misto fetchAll pouzijeme fetch
        //fetchAll vrati polePoli, fetch vrati jen pole
        $vysledek = $prikaz->fetch();

        //pokud jsme fetchnuli boolean false, tak to znamena, ze jsme v databazi danou stranku nenasli
        if ($vysledek == false) {
            //pokud zadna stranka v DB neni, tak vratime prazdny string
            return "";
        }

        //vytahne si z pole obsah
        $obsahSouboru = $vysledek["obsah"];

        //$obsahSouboru = file_get_contents("./{$this->id}.html");
        return $obsahSouboru;
    }

    function setObsah($argObsah) {
        $prikaz = $GLOBALS["instanceDB"]->prepare("UPDATE stranka SET obsah=:obsah WHERE id=:id");
        $prikaz->bindParam(":obsah", $argObsah, PDO::PARAM_STR);
        $prikaz->bindParam(":id", $this->id, PDO::PARAM_STR);
        $prikaz->execute();

        //file_put_contents("./{$this->id}.html", $argObsah);
    }

    function propisDoDb() {
        if ($this->oldId == "") {
            //nejprve zjsitit nejvyssi cislo v DB ve sloupecku poradi
            $maxHodnotaPoradi = $this->dejMiNoveNejvyssiPoradi();

            $prikaz = $GLOBALS["instanceDB"]->prepare("INSERT INTO stranka SET id=:id, titulek=:titulek, menu=:menu, obrazek=:obrazek, poradi=:poradi");
            $prikaz->bindParam(":id", $this->id, PDO::PARAM_STR);
            $prikaz->bindParam(":titulek", $this->titulek, PDO::PARAM_STR);
            $prikaz->bindParam(":menu", $this->menu, PDO::PARAM_STR);
            $prikaz->bindParam(":obrazek", $this->obrazek, PDO::PARAM_STR);
            $prikaz->bindParam(":poradi", $maxHodnotaPoradi, PDO::PARAM_STR);
        }else{
            $prikaz = $GLOBALS["instanceDB"]->prepare("UPDATE stranka SET id=:id, titulek=:titulek, menu=:menu, obrazek=:obrazek WHERE id=:oldId");
            $prikaz->bindParam(":id", $this->id, PDO::PARAM_STR);
            $prikaz->bindParam(":titulek", $this->titulek, PDO::PARAM_STR);
            $prikaz->bindParam(":menu", $this->menu, PDO::PARAM_STR);
            $prikaz->bindParam(":obrazek", $this->obrazek, PDO::PARAM_STR);
            $prikaz->bindParam(":oldId", $this->oldId, PDO::PARAM_STR);
        }

        $prikaz->execute();
    }

    function smazMe() {
        //pokdu instance zavola tut funkci, tak posleme do DB SQL prikaz aby se stranka odstranila z tabulky
        $prikaz = $GLOBALS["instanceDB"]->prepare("DELETE FROM stranka WHERE id=:id");
        $prikaz->bindParam(":id", $this->id, PDO::PARAM_STR);
        $prikaz->execute();
    }

    function dejMiNoveNejvyssiPoradi() {
        $prikaz = $GLOBALS["instanceDB"]->prepare("SELECT MAX(poradi) AS max_hodnota FROM stranka");
        $prikaz->execute();
        $vysledek = $prikaz->fetch();
        $maxHodnotaPoradi = $vysledek["max_hodnota"];
        $maxHodnotaPoradi += 1;
        return $maxHodnotaPoradi;
    }

}//endStranka

//prazdne pole stranek
$poleStranek = array();
//posleme SQL do DB a vytahneme data
$prikaz = $instanceDB->prepare("SELECT * FROM stranka ORDER BY poradi ASC");
$prikaz->execute();
$poleVysledku = $prikaz->fetchAll();
//podle dat z DB vytovrime insatnce a vlozime je do pole
//var_dump($poleVysledku);
foreach($poleVysledku AS $vysledek) {
    $poleStranek[$vysledek["id"]] = new Stranka($vysledek["id"], $vysledek["titulek"], $vysledek["menu"], $vysledek["obrazek"]);
}

/*
//toto uz nepotrebujeme budeme pole stranek vytvraret dynamicky podle dat ulozenych v databazi
$poleStranek = array(
    "domu" => new Stranka("domu", "Primapenzion", "Domů", "primapenzion-main.jpg"),
    "galerie" => new Stranka("galerie", "Fotogalerie", "Foto", "primapenzion-pool-min.jpg"),
    "rezervace" => new Stranka("rezervace", "Rezervace", "Chci pokoj", "primapenzion-room.jpg"),
    "kontakt" => new Stranka("kontakt", "Kontakt", "Napište nám", "primapenzion-room2.jpg")
);
*/

//toto je pole poli
//nechcme udelame si pole objektu
/*
$poleStranek = array(
    "domu" => [
        "id" => "domu",
        "titulek" => "Primapenzion",
        "obrazek" => "primapenzion-main.jpg",
        "menu" => "Domů"
    ],
    "galerie" => [
        "id" => "galerie",
        "titulek" => "Fotogalerie",
        "obrazek" => "primapenzion-pool-min.jpg",
        "menu" => "Foto"
    ],
    "rezervace" => [
        "id" => "rezervace",
        "titulek" => "Rezervace",
        "obrazek" => "primapenzion-room.jpg",
        "menu" => "Chci pokoj"
    ],
    "kontakt" => [
        "id" => "kontakt",
        "titulek" => "Kontakt",
        "obrazek" => "primapenzion-room2.jpg",
        "menu" => "Napište nám"
    ]
);
*/