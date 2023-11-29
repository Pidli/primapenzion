<?php
require_once "./data.php";

//chci vypsat ul seznam stranek
echo "<ul>";
foreach ($poleStranek AS $stranka) {
    $id = htmlspecialchars($stranka->getId());
    echo "<li>
        <a href='?edit={$id}'>{$id}</a>
        <a href='?delete={$id}'>[Smazat {$id}]</a>
    </li>";
}
echo "</ul>";