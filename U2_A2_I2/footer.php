<footer>
    <hr />
    <article>
        &copy; 2024. Instituto México
    </article>
    <article>
        Av. De las Torres No. 780, Alcaldía Cuauhtémoc, C.P. 06500, CDMX
    </article>
    <!--article>
        <img title="WhatsApp" src="imagenes/WhatsApp.svg.webp" width="45px">
    </article -->

    <?php
    if (isset($footerExtra)) {
        include($footerExtra);
    }
    ?>
</footer>
