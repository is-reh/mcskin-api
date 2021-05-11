<?php include "config.php"; ?>
<!--
You Are Looking For A Developer To Have Your Dream Site Contact Us
wa.me/905510709435
isreh09@gmail.com
██╗░██████╗██████╗░███████╗██╗░░██╗
██║██╔════╝██╔══██╗██╔════╝██║░░██║
██║╚█████╗░██████╔╝█████╗░░███████║
██║░╚═══██╗██╔══██╗██╔══╝░░██╔══██║
██║██████╔╝██║░░██║███████╗██║░░██║
╚═╝╚═════╝░╚═╝░░╚═╝╚══════╝╚═╝░░╚═╝
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="all, index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?=$SiteTitle;?></title>
    <meta name="application-name" content="<?=$SiteTitle;?>">
    <meta name="theme-color" content="#ffffff">
    <meta name="author" content="isReH">
    <meta name="publisher" content="isReH">
    <meta name="keywords" content="<?=$SiteKeys;?>">
    <meta property="og:image" content="<?=$SiteFavi;?>">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?=$SiteTitle;?>">
    <meta property="og:description" content="<?=$SiteDecs;?>">
    <meta property="og:url" content="<?=base_url();?>">
    <meta name="description" content="<?=$SiteDecs;?>">
    <meta name="twitter:description" content="<?=$SiteDecs;?>">
    <meta name="twitter:image" content="<?=$SiteFavi;?>">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="<?=$SiteTitle;?>">
    <link rel="canonical" href="<?=base_url();?>">
    <link rel="icon" type="image/png" sizes="512x512" href="<?=$SiteFavi;?>">
    <link rel="manifest" href="<?=base_url("manifest.json");?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://pro.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
</head>
<body>
<style>
    .imgRadius{
        border-radius: 20px;
        width: 50px;
        height: 50px;
    }
</style>
<header>
    <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?=base_url();?>"><img src="<?=$SiteLogo;?>" class="imgRadius" <?=$SiteAltOrTitle;?>></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url();?>" <?=$SiteAltOrTitle;?>><i class="fal fa-tachometer"></i> Homepage</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url("username-to-uuid.php");?>" <?=$SiteAltOrTitle;?>><i class="fal fa-hashtag"></i> Get UUID</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url("api-docs.php");?>" <?=$SiteAltOrTitle;?>><i class="fal fa-book"></i> API-Docs</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>