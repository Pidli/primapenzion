<?php
require_once "./data.php";

//chci vypsat ul seznam stranek
echo "<ul class='seznam-stranek-ul'>";
foreach ($poleStranek AS $stranka) {
    $id = htmlspecialchars($stranka->getId());
    echo "<li id='{$id}'>
        <a href='?edit={$id}'>{$id}</a>
        <a class='odkaz-smazani' href='?delete={$id}'>[Smazat {$id}]</a>
    </li>";
}
echo "</ul>";