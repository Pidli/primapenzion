<form action="" method="post">
    <label for="motyl">Obsah stranky:</label>
    <textarea name="obsah-stranky" id="motyl" cols="30" rows="30"><?php echo htmlspecialchars($aktivniInstance->getObsah()); ?></textarea>
    <input type="submit" name="aktualizovat-submit" value="Aktualizovat web">
</form>

<!-- script:src -->
<!-- pripojili jsme knihovnu tinymce -->
<script src="./vendor/tinymce/tinymce/tinymce.js"></script>

<!-- nastartovat knihovnu tinymce -->
<script>
    //toto je komentar

    /*
    toto je 
    taky komentar
    */

    tinymce.init({
        selector: "#motyl",
        content_css: ["./css/style.css", "./css/all.min.css"],
        entity_encoding: 'raw',
        cleanup: false,
        verify_html: false,
        plugins: ["code", "responsivefilemanager", "image", "anchor", "autolink", "autoresize", "link", "media", "lists"],
        toolbar1: 'formatselect | bold italic strikethrough | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
        toolbar2: "| responsivefilemanager | link | image media | forecolor backcolor  | print preview code ",
    });
</script>