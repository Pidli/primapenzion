<?php
//nadefinujeme tridu Stranka
class Stranka {
    private $id;
    private $titulek;
    private $menu;
    private $obrazek;

    function __construct($argId, $argTitulek, $argMenu, $argObrazek) {
        $this->id = $argId;
        $this->titulek = $argTitulek;
        $this->menu = $argMenu;
        $this->obrazek = $argObrazek; 
    }

    function getTitulek() {
        return $this->titulek;
    }

    function getId() {
        return $this->id;
    }

    function getMenu() {
        return $this->menu;
    }

    function getObrazek() {
        return $this->obrazek;
    }

    function getObsah() {
        $obsahSouboru = file_get_contents("./{$this->id}.html");
        return $obsahSouboru;
    }

    function setObsah($argObsah) {
        file_put_contents("./{$this->id}.html", $argObsah);
    }

}//endStranka



$poleStranek = array(
    "domu" => new Stranka("domu", "Primapenzion", "Domů", "primapenzion-main.jpg"),
    "galerie" => new Stranka("galerie", "Fotogalerie", "Foto", "primapenzion-pool-min.jpg"),
    "rezervace" => new Stranka("rezervace", "Rezervace", "Chci pokoj", "primapenzion-room.jpg"),
    "kontakt" => new Stranka("kontakt", "Kontakt", "Napište nám", "primapenzion-room2.jpg")
);




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