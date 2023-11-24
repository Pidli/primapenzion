<?php
require_once "./data.php";

//chci vypsat ul seznam stranek
echo "<ul>";
foreach ($poleStranek AS $stranka) {
    echo "<li>
        <a href='?edit={$stranka->getId()}'>{$stranka->getId()}</a>
    </li>";
}
echo "</ul>";