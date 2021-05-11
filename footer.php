<div style="display: none;">
<a href="https://www.yazilimcin.net/" <?=$SiteAltOrTitle;?>>www.yazilimcin.net</a>
<a href="https://www.isreh.net/" <?=$SiteAltOrTitle;?>>www.isreh.net</a>
<a href="https://www.is-reh.net/" <?=$SiteAltOrTitle;?>>www.is-reh.net</a>
<a href="https://www.isreh.tech/" <?=$SiteAltOrTitle;?>>www.isreh.tech</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://pro.fontawesome.com/releases/v5.0.13/js/all.js"></script>
<script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.8/dist/clipboard.min.js"></script>
<script src="<?=base_url("console.log.js");?>"></script>
<script>
    new ClipboardJS('.copy-button');
    if ("serviceWorker" in navigator) {
        navigator.serviceWorker.register("/sw.js");
    }
</script>
</body>
</html>