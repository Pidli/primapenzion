<?php
require_once "./data.php";

$token = $_SESSION["token"];

//chci vypsat ul seznam stranek
echo "<ul class='seznam-stranek-ul'>";
foreach ($poleStranek AS $stranka) {
    $id = htmlspecialchars($stranka->getId());
    echo "<li id='{$id}'>
        <a href='?edit={$id}'>{$id}</a>
        <a class='odkaz-smazani' href='?delete={$id}&token=$token'>[Smazat {$id}]</a>
    </li>";
}
echo "</ul>";