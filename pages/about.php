<div id="About" class="contentbox">
    <div id="theBody" style="text-align: center; margin-top:10px ">


        <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1">


            <div id="bio">
                <p id="theBioParagraph" class="theCorrectFontParagraph">
                    <?php
                    echo $bioText;
                    ?>
                </p>
                <p>&nbsp;</p>
                <div id="theBioImage" class="col-xs-offset-2 col-xs-8">
                    <img id="mainAboutImage" src="<?php echo $aboutMainImage; ?>"></img>
                </div>
            </div>

        </div>


        <div class="col-xs-12 col-sm-12 col-md-4">

            <div id="demo-test-gallery" class="demo-gallery kiko-gallery" data-pswp-uid="1">
                <?php
                include 'php/aboutImage.php';
                echo getHomeMainImage();
                ?>
            </div>
        </div>
    </div>


</div>
