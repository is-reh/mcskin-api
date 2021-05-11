<?php include "config.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>MCskin.EU</title>
    <style>
        body, html {
            overflow-x: hidden;
            overflow-y: hidden;
        }

        body {
            margin: 0;
        }

        canvas {
            width: 100%;
            height: 100%;
        }

        .shadow {
            /* Drop Shadow */
            -webkit-filter: drop-shadow(5px 5px 5px #222);
            filter: drop-shadow(5px 5px 5px #222);
        }

        #placeholderImage {
            height: 80vh;
            padding: 5vh;
        }
    </style>
</head>
<body>
<input style="
width:32px;
height:32px;
position: absolute;
left: 5px;
bottom: 30px;
font-size: 10px;
text-decoration: none;
z-index:10;"
id="animate"
type="checkbox">
<a style="position: absolute; left: 2px; bottom: 2px; opacity: 0.5; font-size: 10px; text-decoration: none; z-index:10;" href="https://www.mcskin.eu" target="_blank" <?=$SiteAltOrTitle;?> >
    <pre>MCskin.EU</pre>
</a>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/94/three.min.js"></script>
<script src="render.js"></script>
<script>
    var skinRender = new SkinRender({
        autoResize: true,
        render: {
            taa: true
        }
    }, document.body);
    skinRender.render({
        username: location.hash ? location.hash.substring(1) : "<?php echo $_GET["skin"]; ?>",
        <?php if(isset($_GET["capeUrl"])){
              if(!empty($_GET["capeUrl"])){
        ?>
        capeUrl: "<?php echo $_GET["capeUrl"];?>",
        optifine: true
        <?php } } ?>
    });
    if (location.hash) $("#nameInput").val(location.hash.substring(1));
    $("#nameInput,#capeInput,#slim").on("change", function () {
        skinRender.clearScene();
        var skin = $("#nameInput").val();
        var cape = $("#capeInput").val();
        var slim =  $("#slim").is(":checked");
        var options = {};
        if (skin.indexOf("http") === 0) {
            options.url = skin;
        } else {
            options.username = skin;
            location.hash = skin;
        }
        if (cape && cape.length > 0) {
            if (cape.includes("capes.dev") || !cape.startsWith("http")) { // capes.dev link or type
                options.cape = cape;
            } else {
                options.capeUrl = cape;
                options.optifine = cape.toLowerCase().indexOf("optifine") > 0;
            }
        }
        options.slim = slim;
        skinRender.render(options);
    })

    $(".partToggle").on("change", function () {
        skinRender.getModelByName($(this).attr("id")).visible = $(this).is(":checked");
    });

    var animate = false;
    $("#animate").on("change", function () {
        animate = $(this).is(":checked");
    });



    var startTime = Date.now();
    document.body.addEventListener("skinRender", function (e) {
        if (animate) {
            var t = (Date.now() - startTime) / 1000;
            e.detail.playerModel.children[2].rotation.x = Math.sin(t * 5) / 2;
            e.detail.playerModel.children[3].rotation.x = -Math.sin(t * 5) / 2;
            e.detail.playerModel.children[4].rotation.x = Math.sin(t * 5) / 2;
            e.detail.playerModel.children[5].rotation.x = -Math.sin(t * 5) / 2;
        }
    })
</script>
</body>
</html>
