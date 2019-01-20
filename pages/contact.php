<div id="Contact" class="contentbox">

    <div id="contactTopDiv"></div>


    <div class="centerPseudo">


        <div class="enquiry">
            <center>

                <a class="contactSocialIcons theAFloatNone" href="<?php echo $facebookPage; ?>" target="blank"><img
                            src="public/img/other/fb.svg"></a>
                <a class="contactSocialIcons theAFloatNone" href="<?php echo $instagramPage; ?>" target="blank"><img
                            src="public/img/other/insta.svg"></a>
                <!--<<li><img src="images/pin.svg"></li>-->

            </center>
        </div>
        <br/>
        <div class="nourineMail" >
                <a id="theMailCenterA" class="theAFloatNone" href="mailto:<?php
                echo $contactPageText;
                ?>" class="theCorrectFont mail"><?php
                    echo strtoupper($contactPageText);
                    ?></a>
        </div>


    </div>
    <div class="theCorrectFontParagraph col-xs-offset-2 col-xs-8 enquiry">

        <center>
            <?php
            echo $enquiryText;
            ?>
        </center>
    </div>


</div>
