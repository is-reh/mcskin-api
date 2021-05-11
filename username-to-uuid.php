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
    <center><h2>Username To UUID</h2></center>
    <div id="YazilimcinNet"></div>
    <form action="<?=$SiteApi;?>" method="POST" id="getUUID" name="getUUID">
        <div id="SubmitedArea">
            <div class="form-floating">
                <input name="JSuuid" value="TRUE" hidden>
                <input type="text" class="form-control" id="nickname" <?=$SiteAltOrTitle;?> name="username" placeholder="Enter your username..." required>
                <label for="nickname">Minecraft Nickname</label>
            </div><br>
            <button class="w-100 btn btn-lg btn-primary" id="isReH" <?=$SiteAltOrTitle;?> type="submit"><i class="far fa-terminal fa-sm"></i> Submit</button>
        </div>
        <div id="Result_isReH"></div>
    </form>
</main>
<script>
    $('#getUUID').on('submit',function(){
        $("#isReH").attr("disabled", "disabled");
        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: $(this).serializeArray(),
            dataType: "json",
            success: function (YazilimcinNet) {

                if (YazilimcinNet.UUID != null) {
                    $("#isReH").removeAttr("disabled", "disabled");
                    $("#YazilimcinNet").show();
                    $("#YazilimcinNet").html('<div class="alert alert-success alert-dismissible">UUID : <b>' + YazilimcinNet.UUID + "</b></div>");
                } else {
                    $("#isReH").removeAttr("disabled", "disabled");
                    $("#YazilimcinNet").show();
                    $("#YazilimcinNet").html('<div class="alert alert-danger alert-dismissible">No data found for this username</div>');
                }

            },
        });
        return false;
    });
</script>
<?php include "footer.php"; ?>
