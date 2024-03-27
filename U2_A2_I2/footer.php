<hr>
<footer>
    <div class="container-fluid">
        <div class="row">
            <hr>
            <div class="col-sm-6">
                &copy; 2024. Instituto México
            </div>
            <div class="col-sm-6">
                Av. De las Torres No. 780, Alcaldía Cuauhtémoc, C.P. 06500, CDMX
            </div>
        </div>
        <?php
        if (isset($footerExtra)) {
            include($footerExtra);
        }
        ?>
    </div>
</footer>