<?php include "header.php"; ?>
<style>
    html,
    body {
        height: 85%;
    }
    body {
        display: flex;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
    }
    .form-signin {
        width: 100%;
        max-width:800px;
        padding: 15px;
        margin: auto;
    }
    .form-signin .checkbox {
        font-weight: 400;
    }
    .form-signin .form-floating:focus-within {
        z-index: 2;
    }
    .form-signin input[type="text"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }
</style>
<main class="form-signin">
    <br><br>
    <center><h2>API-Docs</h2></center><br>
    <button class="btn btn-primary btn-sm" <?=$SiteAltOrTitle;?> onclick="PostMethod()">POST</button>
    <button class="btn btn-primary btn-sm" <?=$SiteAltOrTitle;?> onclick="GetMethod()">GET</button>
    <blockquote class="blockquote">
        <code>
            API-URL : <div class="col-12"><input <?=$SiteAltOrTitle;?> type="text" class="form-control" value="<?=base_url("api.php");?>" disabled></div>
        </code>
        <br>
        <div id="GetMethod" style="display: none;">
        <code>
            GET-UUID : <div class="col-12"><input <?=$SiteAltOrTitle;?> type="text" class="form-control" value="<?=base_url("api.php?uuid=TRUE&username=MCskin");?>" disabled></div>
        </code>
        <br>
        <code>
            GET-NAMEHISTORY : <div class="col-12"><input <?=$SiteAltOrTitle;?> type="text" class="form-control" value="<?=base_url("api.php?nameHistory=TRUE&uuID=xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx");?>" disabled></div>
        </code>
        <br>
        <code>
            GET-RENDER3DHEAD : <div class="col-12"><input <?=$SiteAltOrTitle;?> type="text" class="form-control" value="<?=base_url("api.php?Render3DHead=TRUE&uuID=xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx");?>" disabled></div>
        </code>
        <br>
        <code>
            GET-RENDER3DAVATAR : <div class="col-12"><input <?=$SiteAltOrTitle;?> type="text" class="form-control" value="<?=base_url("api.php?Render3DAvatar=TRUE&uuID=xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx&overlay=TRUE-OR-FALSE");?>" disabled></div>
        </code>
        <br>
        <code>
            GET-RENDER3DSKIN : <div class="col-12"><input <?=$SiteAltOrTitle;?> type="text" class="form-control" value="<?=base_url("api.php?Render3DSkin=TRUE&uuID=xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx");?>" disabled></div>
        </code>
        <br>
        <code>
            GET-DATA : <div class="col-12"><input <?=$SiteAltOrTitle;?> type="text" class="form-control" value="<?=base_url("api.php?getData=TRUE&username=MCskin");?>" disabled></div>
        </code>
        </div>
        <div id="PostMethod" style="display: none;">
            <code>
                POST-UUID : <div class="col-12"><input <?=$SiteAltOrTitle;?> type="text" class="form-control" value="PostBody => KEY:uuid VALUE:TRUE & KEY:username VALUE:MCskin" disabled></div>
            </code>
            <br>
            <code>
                POST-NAMEHISTORY : <div class="col-12"><input <?=$SiteAltOrTitle;?> type="text" class="form-control" value="PostBody => KEY:nameHistory VALUE:TRUE & KEY:uuID VALUE:xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" disabled></div>
            </code>
            <br>
            <code>
                POST-RENDER3DHEAD : <div class="col-12"><input <?=$SiteAltOrTitle;?> type="text" class="form-control" value="PostBody => KEY:Render3DHead VALUE:TRUE & KEY:uuID VALUE:xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" disabled></div>
            </code>
            <br>
            <code>
                POST-RENDER3DAVATAR : <div class="col-12"><input <?=$SiteAltOrTitle;?> type="text" class="form-control" value="PostBody => KEY:Render3DAvatar VALUE:TRUE & KEY:uuID VALUE:xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx & KEY:overlay VALUE:TRUE-OR-FALSE" disabled></div>
            </code>
            <br>
            <code>
                POST-RENDER3DSKIN : <div class="col-12"><input <?=$SiteAltOrTitle;?> type="text" class="form-control" value="PostBody => KEY:Render3DSkin VALUE:TRUE & KEY:uuID VALUE:xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" disabled></div>
            </code>
            <br>
            <code>
                POST-DATA : <div class="col-12"><input <?=$SiteAltOrTitle;?> type="text" class="form-control" value="PostBody => KEY:getData VALUE:TRUE & KEY:username VALUE:MCskin" disabled></div>
            </code>
        </div>
        <br>
    </blockquote>
</main>
<script>
    function GetMethod(){
        $("#GetMethod").show();
        $("#PostMethod").hide();
    }
    function PostMethod(){
        $("#GetMethod").hide();
        $("#PostMethod").show();
    }
</script>
<?php include "footer.php"; ?>
