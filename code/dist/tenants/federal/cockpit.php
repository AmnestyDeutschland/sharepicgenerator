<?php
// phpcs:ignoreFile -- mainly html, ignore it
?>

<form id="pic">
    <div class="mb-5">
    <?php
        require_once(getBasePath('tenants/cockpit/picture.php'));
        require_once(getBasePath('tenants/cockpit/picture-size.php'));
        require_once(getBasePath('tenants/cockpit/federal/text.php'));
       
        require_once(getBasePath('tenants/cockpit/federal/logo.php'));
        require_once(getBasePath('tenants/cockpit/federal/eyecatcher.php'));
        
        require_once(getBasePath('tenants/cockpit/more.php'));
        require_once(getBasePath('tenants/cockpit/addpictures.php'));
        require_once(getBasePath('tenants/cockpit/addtext.php'));
        require_once(getBasePath('tenants/cockpit/eraser.php'));
        require_once(getBasePath('tenants/cockpit/quality.php'));
        require_once(getBasePath('tenants/cockpit/workfile.php'));
        require_once(getBasePath('tenants/cockpit/gallery.php'));
        require_once(getBasePath('tenants/cockpit/mail.php'));
        require_once(getBasePath('tenants/cockpit/gridlines.php'));
        require_once(getBasePath('tenants/cockpit/footer.php'));
    ?>

    </div>
</form>
