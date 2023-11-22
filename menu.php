<div class="menu">
    <ul>
        <?php
        foreach ($poleStranek as $stranka) {
            echo "<li><a href='?id-stranky={$stranka['id']}'>{$stranka['menu']}</a></li>";
        }
        ?>
    </ul>
</div>