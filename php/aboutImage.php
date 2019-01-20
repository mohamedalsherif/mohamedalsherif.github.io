<?php

//could not include galleryimages.php and let it work
// so had to use same method but with differnet name..
function givenImageIndexGetImageCaption1($index)
{
    global $artworkImages;
    return $artworkImages[$index][1];
}

function givenImageIndexGetBigImagePath1($index)
{
    global $artworkImages, $imagesLocationNormal;
    return $imagesLocationNormal . $artworkImages[$index][0];
}

function getHomeMainImage()
{
    global $mainImageNumber;

    if ($mainImageNumber == "") {
        return "";
    }


    $imagePathBig = givenImageIndexGetBigImagePath1($mainImageNumber);
    $imageCaption = givenImageIndexGetImageCaption1($mainImageNumber);

    $formatNew = '


    <a id="theHomeMain" href="%s" data-size="545x865" class="demo-gallery__img--main">
       <img src="%s" class="homePageImages1"/>
       <figure>%s</figure>
    </a>';

    $result = sprintf($formatNew, $imagePathBig, $imagePathBig, $imageCaption);
    return $result;

}

?>
