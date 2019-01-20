<div id="Gallery11" class="contentbox">


    <div id="my-gallery11" class="demo-gallery" data-pswp-uid="2">


        <?php
        $artworkImages =getPrintsImages();
        $imagesCount = getImageCount($artworkImages);

        for ($i = 0; $i < $imagesCount; $i++) {
            if ($i % 3 == 0) {
                echo '<div class="combiningGalleryDivs">';
            }
            echo givenArtworkImageIndexGetImageDiv($i,$artworkImages);
            if ($i % 3 == 2) {
                echo '</div>';
            }
        }
        if ($i % 3 != 0) {
            echo '</div>';
        }
        ?>
    </div>


</div>
