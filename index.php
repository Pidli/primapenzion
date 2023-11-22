<?php
$idStranky = "domu";

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

if (array_key_exists("id-stranky", $_GET)) {
    $idStranky = $_GET["id-stranky"];
}
?>
<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $poleStranek[$idStranky]["titulek"]; ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet"><!-- tady sem si vložila z fontů google  -->
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <!-- favicona navázaná z galerie  -->
</head>

<body>
    <header>
        <div class="container">
            <div class="headerTop">
                <a class="odkaz" href="tel: +420606123456">+420 / 606 123 456</a>
                <div class="socIcon">
                    <a href="#" target="_blank"><i class="fa-brands fa-facebook"></i></a><!-- tady sem si vložila z fontů google přímo ten link z font awesome -->
                    <a href="#" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" target="_blank"><i class="fa-brands fa-square-x-twitter"></i></a>
                </div>
            </div>
            <a href="index.php" class="logo">Prima<br> PENZION</a>
            <?php
                require "./menu.php";
            ?>
        </div>

        <img src="<?php echo "./img/{$poleStranek[$idStranky]["obrazek"]}" ?>" alt="PrimaPenzion">

    </header>

    <!-- zde bude section -->
    <?php
        require_once "./$idStranky.html";
    ?>

    <footer>
        <div class="pata">
            <?php
                require "./menu.php";
            ?>

            <a href="index.html" class="logo">Prima<br> PENZION</a>
            <div class="pataText">
                <p><i class="fa-solid fa-location-dot"></i>
                    <a href="https://maps.app.goo.gl/oEBPWUPoxqmivXfs5" target="_blank" class="odkaz">
                        <b>PrimaPenzion</b>, Jablonského 2, Praha 7
                    </a>
                </p>
                <p>
                    <i class="fa-solid fa-phone"></i>
                    <a href="tel:+420606123456" class="odkaz">+420 / 606 123 456</a>
                </p>
                <p>
                    <i class="fa-regular fa-envelope"></i>
                    <span>info@primapenzion.cz</span>
                </p>
            </div>
            <div class="socIcon">
                <a href="https://facebook.com" target="_blank">
                    <i class="fa-brands fa-facebook"></i>
                </a>
                <a href="https://instagram.com" target="_blank">
                    <i class="fa-brands fa-instagram"></i>
                </a>
                <a href="https://twitter.com" target="_blank">
                    <i class="fa-brands fa-square-x-twitter"></i>
                </a>
            </div>

        </div>
        <div class="copy">
            &copy; <b>PrimaPenzion</b> 2023
        </div>
    </footer>

</body>

</html>