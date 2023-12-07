<?php
$cestaKeSlozce = "./upload/source/fotky-do-galerie";
$poleJmen = scandir($cestaKeSlozce);
//var_dump($poleJmen);

echo "<div class='galerie' id='zelva'>";
foreach($poleJmen AS $jmenoSouboru) {
    if($jmenoSouboru == "." || $jmenoSouboru == "..") {
        continue;
    }

    //timto si zjistime dimenze obrazku
    //nase knihovna photo swipe vyzaduje aby u kazdeho odkazu byly atributy vysky a sirky
    $poleInformaci = getimagesize("$cestaKeSlozce/$jmenoSouboru");
    $sirka = $poleInformaci[0];
    $vyska = $poleInformaci[1];

    //vykrelsime obrazek do stranky
    echo "<a href='$cestaKeSlozce/$jmenoSouboru' data-pswp-width='$sirka' data-pswp-height='$vyska' >
        <img src='$cestaKeSlozce/$jmenoSouboru' alt=''>
    </a>";
}
echo "</div>";
?>

<!-- pro galerie budeme pouzivat knihovnu photoswipe -->
<!-- tuto knihovnu si stahmene pres prikazovou radku -->
<!-- npm install photoswipe -->

<!-- musime pripoji css knihovny -->
<link rel="stylesheet" href="./node_modules/photoswipe/dist/photoswipe.css">
<!-- musime spusti knihovnu photoswipe -->
<script type="module">
import PhotoSwipeLightbox from './node_modules/photoswipe/dist/photoswipe-lightbox.esm.js';
const lightbox = new PhotoSwipeLightbox({
  gallery: '#zelva',
  children: 'a',
  pswpModule: () => import('./node_modules/photoswipe/dist/photoswipe.esm.js')
});
lightbox.init();
</script>