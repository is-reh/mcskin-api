<?php

$SiteLogo = base_url("logo.png");
$SiteFavi = base_url("favicon.png");
$SiteTitle = "MCskin - Minecraft Skins";
$SiteDecs = "MCskin - Minecraft Skins - Open Source API - Unlimited Usage";
$SiteKeys = "minecraft, minecraft skin, mcskin, minecraft skins, mcskin, craft";
$SiteApi = base_url("api.php");
$SiteAltOrTitle = "alt='MCskin' title='MCskin'";

function base_url($uri = ''){
    if (isset($uri)) {
        if ($uri === '') {
            $uri = "https://".$_SERVER["SERVER_NAME"]."/";
        }
        else {
            $uri = "https://".$_SERVER["SERVER_NAME"]."/".$uri;
        }
    }
    return $uri;
}
?>