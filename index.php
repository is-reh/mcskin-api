<?php include "header.php"; ?>
<style>
    body,html{height:85%}body{display:flex;align-items:center;padding-top:40px;padding-bottom:40px;background-color:#f5f5f5}.form-signin{width:100%;max-width:800px;padding:15px;margin:auto}.form-signin .checkbox{font-weight:400}.form-signin .form-floating:focus-within{z-index:2}.form-signin input[type=text]{margin-bottom:-1px;border-bottom-right-radius:0;border-bottom-left-radius:0}
</style>
<main class="form-signin">
    <center id="TitleArea"><h2><?=$SiteTitle;?></h2></center>
    <div id="YazilimcinNet"></div>
<form action="<?=$SiteApi;?>" method="POST" id="GetDataMC" <?=$SiteAltOrTitle;?> name="GetDataMC">
    <div id="SubmitedArea">
    <div class="form-floating">
        <input name="getData" value="TRUE" <?=$SiteAltOrTitle;?> hidden>
        <input type="text" class="form-control" id="nickname" <?=$SiteAltOrTitle;?> name="username" placeholder="Enter your username..." required>
        <label for="nickname">Minecraft Nickname</label>
    </div><br>
    <button class="w-100 btn btn-lg btn-primary" <?=$SiteAltOrTitle;?> id="isReH" type="submit"><i class="far fa-terminal fa-sm"></i> Submit</button>
    </div>
    <div id="Result_isReH"></div>
</form>
</main>
<script>
    $('#GetDataMC').on('submit',function(){
        $("#isReH").attr("disabled", "disabled");
        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: $(this).serializeArray(),
            dataType: "json",
            success: function (YazilimcinNet) {
                if (YazilimcinNet.status == "good") {
                    $("#isReH").removeAttr("disabled", "disabled");
                    $("#Result_isReH").show();
                    $("#SubmitedArea").hide();
                    $("#TitleArea").hide();
                    $("#YazilimcinNet").hide();
                    const LastName = YazilimcinNet.LastName;
                    $("#Result_isReH").html(`

<br><br>
    <h1 translate="no" style="">`+YazilimcinNet.username+`</h1>
    <hr class="mt-1">
    <div class="row">
        <div class="col-md-6 col-lg-7 col-xl-8 order-md-2">
            <div class="card mb-3">
                <div class="card-header py-1"><strong>Minecraft Profile</strong></div>
                <div class="card-body py-1">
                    <div class="row no-gutters align-items-center">
                        <div class="col order-lg-1 col-lg-4"><strong>UUID</strong></div>
                        <div class="col-auto order-lg-3 col-lg-auto text-nowrap text-right"><a class="copy-button" href="javascript:void(0)" data-clipboard-text="`+YazilimcinNet.UUID+`">Copy</a></div>
                        <div class="col-12 order-lg-2 col-lg" style="font-size: 80%"><samp>`+YazilimcinNet.UUID+`</samp></div>
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col order-lg-1 col-lg-4"><strong>Username</strong></div>
                        <div class="col-auto order-lg-3 col-lg-auto text-nowrap text-right"><a class="copy-button" href="javascript:void(0)" data-clipboard-text="`+YazilimcinNet.username+`">Copy</a></div>
                        <div class="col-12 order-lg-2 col-lg" style="font-size: 90%"><samp>`+YazilimcinNet.username+`</samp></div>
                    </div>
                </div>
            </div>

            <div class="card mb-3" style="max-height: 160px">
                <div class="card-header py-1"><strong>Name History</strong></div>
                <div class="card-body py-1" style="overflow-y: auto">
                    <div class="row no-gutters">
                        <div class="col">
                            <div id="LastName"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3" style="max-height: 160px">
                <div class="card-header py-1"><strong>Advertisement</strong></div>
                <div class="card-body py-1" style="overflow-y: auto">
                    <div class="row no-gutters">
                        <div class="col">
                            <div id="AdsContainer"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header py-1">Head Command</div>
                <div class="card-body py-0">


                    <div class="input-group input-group-sm my-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">≥1.13</div>
                        </div>
                        <input style="font-family: Consolas, monospace;" class="form-control" value="`+YazilimcinNet.SkullCode.V113+`" readonly="">
                        <div class="input-group-append">
                            <a class="btn btn-primary copy-button border-left" href="javascript:void(0)" data-clipboard-text="`+YazilimcinNet.SkullCode.V113+`">Copy</a>
                        </div>
                    </div>


                    <div class="input-group input-group-sm my-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">≤1.12</div>
                        </div>
                        <input style="font-family: Consolas, monospace;" class="form-control" value="`+YazilimcinNet.SkullCode.V112+`" readonly="">
                        <div class="input-group-append">
                            <a class="btn btn-primary copy-button border-left" href="javascript:void(0)" data-clipboard-text="`+YazilimcinNet.SkullCode.V112+`">Copy</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-6 col-lg-5 col-xl-4 order-md-1">
            <div class="card mb-3">
                <div class="card-body text-center p-0">
                    <div class="position-relative checkered animation-paused">
                        <iframe src="3Drender.php?skin=`+YazilimcinNet.username+`" height="400"></iframe>
                    </div>
                </div>
            </div>
        </div>


    </div>

                    `);
                    //$("#AdsContainer").html();
                    LastName.forEach(NameHistory);
                    function NameHistory(item,index){
                        document.getElementById("LastName").innerHTML += `<div class="row no-gutters">
                    <div class="col order-lg-1 col-lg-4 text-nowrap">`+item.name+`</div>
                    <div class="col-auto order-lg-3 text-nowrap text-right"><a class="copy-button" href="javascript:void(0)" data-clipboard-text="`+item.name+`">Copy</a></div>
                    <div class="col-12 order-lg-2 col-lg">
                    </div>
                    </div>`;
                    }
                } else {
                    $("#isReH").removeAttr("disabled", "disabled");
                    $("#YazilimcinNet").show();
                    $("#YazilimcinNet").html('<div class="alert alert-danger alert-dismissible">' +YazilimcinNet.message+ '</div>');
                }
            },
        });
        return false;
    });
</script>
<?php include "footer.php"; ?>
