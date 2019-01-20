<?php



/////////////////////////// Articles Functions ///////////////////////////
function getArticlesCount()
{
    global $articles;
    return count($articles);
}

function givenArticlesIndexGetArticlesParagraph($index)
{
    global $articles;
    $j = 0;
    $name = $articles[$index][$j++];
    $link = $articles[$index][$j++];
    $formatNew = '
    <div class="articlePDivs">  <a class="articleLinks" href="%s" target="_blank">%s</a>
    </div>
  		';
    $result = sprintf($formatNew, $link, $name);
    return $result;
}

/////////////////////////// Exhibition Functions ///////////////////////////
function getExhibitionsCount()
{
    global $exhibitions;
    return count($exhibitions);
}

function givenExhibitionIndexGetImageDiv($index)
{
    global $exhibtionsLocation, $exhibitions;
    $j = 0;
    $imagePath = $exhibtionsLocation . $exhibitions[$index][$j++];
    $exhibitionName = $exhibitions[$index][$j++];
    $exhibitionType = $exhibitions[$index][$j++];
    $exhibitionDate = $exhibitions[$index][$j++];
    $exhibitionLink = $exhibitions[$index][$j++];
    $exhibitionDescription = $exhibitions[$index][$j++];
    $formatNew = '
	<div class= "ExhibitionContainerDiv col-xs-12 col-sm-12 col-md-6">
		<div class="col-xs-6 col-sm-6 col-md-6">

       <img src="%s" itemprop="thumbnail" alt="Image description" class="exhibitionImage"  />

		</div>
		<div class="col-xs-6 col-sm-6 col-md-6">
			<div class="ExhibitionDescription">
			<h4>%s</h4>
			<span style ="font-style:italic" class="theCorrectFontParagraph subtitle">%s</span><br>
			<span style ="font-weight:600"  class="date">%s</span><br>
			<span style="    letter-spacing: 1px !important;" class="theCorrectFontParagraph">%s</span><br>
			<a href="%s" style="font-size:12px">Read More</a><br>
			</div>
		</div>
	</div>
		';
    //$formatNew ='<figure class="galleryImageContainer">
    //  <a href="%s" itemprop="contentUrl" data-size="964x1024">
    //    <img src="%s" itemprop="thumbnail" alt="Image description" class="galleryImage"  />
    //  </a>
    //	</figure>';
    $result = sprintf($formatNew, $imagePath, $exhibitionName, $exhibitionType, $exhibitionDate, $exhibitionLink, $exhibitionDescription);
    return $result;
}


function getArtworkImages()
{
    global $artworkImages;
    return $artworkImages;
}

function getPrintsImages()
{
    global $printsImages;
    return $printsImages;
}

function getImageCount($images)
{
    return count($images);
}

function getGalleryColumnCount()
{
    global $maxImagesPerColumn;
    return $maxImagesPerColumn;
}

function givenImageIndexGetNextIndex($index,$images)
{
    $count = getImageCount();
    $result = ($index + 1) % $count;
    if (isIndexEmpty($result,$images)) {
        return givenImageIndexGetNextIndex($result,$images);
    } else {
        return $result;
    }
}

function givenImageIndexGetPreviousIndex($index,$images)
{
    $count = getImageCount();
    if ($index == 0) {
        return $count - 1;
    } else {
        $result = $index - 1;
        if (isIndexEmpty($result,$images)) {
            return givenImageIndexGetPreviousIndex($result,$images);
        } else {
            return $result;
        }
    }
}

function isIndexEmpty($index,$images)
{
    global $imagesLocationSmall;
    $imagePath = givenImageIndexGetSmallImagePath($index,$images);
    if ($imagePath == $imagesLocationSmall) {
        return true;
    } else {
        return false;
    }
}


function givenImageIndexGetSmallImagePath($index,$images)
{
    global $imagesLocationSmall;
    return $imagesLocationSmall . $images[$index][0];
}

function givenImageIndexGetBigImagePath($index,$images)
{
    global $imagesLocationNormal;
    return $imagesLocationNormal . $images[$index][0];
}


function givenImageIndexGetImageCaption($index,$images)
{
    return $images[$index][1];
}

function givenArtworkImageIndexGetImageDiv($index,$images)
{
    global $imagesLocationNormal, $gallery_image_to_overlay_size;

    $imagePathSmall = givenImageIndexGetSmallImagePath($index,$images);
    $imagePathBig = givenImageIndexGetBigImagePath($index,$images);
    $imageCaption = givenImageIndexGetImageCaption($index,$images);


    $j = 0;
    $imagePath = $imagesLocationNormal . $images[$index][$j++];
    $imageName = $images[$index][$j++];
    $imageMedium = $images[$index][$j++];
    $imageFrame = $images[$index][$j++];
    $soldOptional = array_key_exists($j, $images[$index]) ? $images[$index][$j++] : "";

    if (!isIndexEmpty($index,$images)) {

        list($width, $height, $type, $attr) = getimagesize($imagePathBig);


        if (isset($gallery_image_to_overlay_size[$width . '*' . $height])) {
            $computedOverlayHeight = $gallery_image_to_overlay_size[$width . '*' . $height][0];
            $computedOverlayWidth = $gallery_image_to_overlay_size[$width . '*' . $height][1];
        } else {
            $computedOverlayHeight = 100;
            $computedOverlayWidth = 100;
        }
        $titleMargin = $computedOverlayHeight * 0.26;
        $margin_of_img_to_make_space_smaller = 100 - $computedOverlayHeight;
        $widthOfDataSize = $width;
        if ($computedOverlayWidth != 100) {
            $formatNew = '
      <div class="galleryImageContainer col-xs-12 col-md-4">
      <p class="pContentNone pImageName">' . $imageName . '</p>
      <a class="gallery_a_element hrefToRemoveInMobile" href="%s" data-size="' . $widthOfDataSize . 'x' . $height . '" >
                          <div style="position:relative; display:block; background-image: url(%s); margin-bottom:-' . $margin_of_img_to_make_space_smaller . '%%!important;" class="refcontainer">
                          <div class=" overlay overlaysmall" style="display: block; height:' . $computedOverlayHeight . '%% !important;
                           width:' . $computedOverlayWidth . '%% !important;">
                          <span class="theCorrectFontParagraph titleSize overlayTitle" style="margin-top: ' . $titleMargin . '%%;color:white;">' . $imageName . '</span>

                          <span style="color:white;" class="theCorrectFontParagraph size overlaySizeAndMedium">' . $imageFrame . '<br>
                          ' . $imageMedium . '</span>
                          <span style="color:white;" class="theCorrectFontParagraph size overlaySold"><br>
                          ' . $soldOptional . '</span>
                          </div>
                          </div>

      </a>

      ';
            //$widthOfDataSize=$width*($computedOverlayWidth/100);
            //  echo "widthOfDataSize ".$widthOfDataSize." width ".$width." computedOverlayWidth ".$computedOverlayWidth." midanswer ";
        } else {
            //echo "<p>".$width." </p>";
            $formatNew = '
		<div class="galleryImageContainer col-xs-12 col-md-4">
    <p class="pContentNone pImageName">' . $imageName . '</p>
    <a class="gallery_a_element hrefToRemoveInMobile" href="%s" data-size="' . $widthOfDataSize . 'x' . $height . '" >
                        <div style="position:relative; display:block; background-image: url(%s); margin-bottom:-' . $margin_of_img_to_make_space_smaller . '%%!important;" class="refcontainer">
                        <div class=" overlay overlaysmall" style="display: block; height:' . $computedOverlayHeight . '%% !important;
                         width:' . $computedOverlayWidth . '%% !important;">
                        <span class="theCorrectFontParagraph titleSize overlayTitle" style="margin-top: ' . $titleMargin . '%%;color:white;">' . $imageName . '</span>

                        <span style="color:white;" class="theCorrectFontParagraph size overlaySizeAndMedium">' . $imageFrame . '<br>
                        ' . $imageMedium . '</span>
                        <span style="color:white;" class="theCorrectFontParagraph size overlaySold"><br>
                        ' . $soldOptional . '</span>
                        </div>
       			            </div>

    </a>

    ';
        }
        //$formatNew .= '<p>'.$imageName .'</p>';
        $formatNew .= '<p class="pContentNone pMargin">&nbsp&nbsp' . $imageMedium . '</p>';
        $formatNew .= '<p class="pContentNone pMargin">&nbsp&nbsp' . $imageFrame . '</p>';


        if ($soldOptional == "") {
            $formatNew .= '<p class="pContentNone pSpaceToNextImageWithoutSold">&nbsp&nbsp ' . $soldOptional . '</p>';
        } else {
            $formatNew .= '<p class="pContentNone pSpaceToNextImage pSold">&nbsp&nbsp ' . $soldOptional . '</p>';
        }

        $formatNew .= '<div id="d" class="pContentNone" style="visibility: visible; display: block;">
<img src="public/img/other/LogoLine.png" class="pContentNone logoLine"></div>';
        //$formatNew .= '<img src="public/img/other/SeperatorLine.png" class="pMargin" alt="Seperator Line" width="300px" height="12">';
        //

        //$formatNew = $soldOptional!="":'<p>'.$soldOptional .'</p>':$formatNew;

        $formatNew .= '
    </div>';
        //$formatNew ='<figure class="galleryImageContainer">
        //  <a href="%s" itemprop="contentUrl" data-size="964x1024">
        //    <img src="%s" itemprop="thumbnail" alt="Image description" class="galleryImage"  />
        //  </a>
        //	</figure>';
        $result = sprintf($formatNew, $imagePathBig, $imagePathBig);//$imageCaption
        return $result;
    } else {
        //echo '<div class=" galleryImageContainer emptyDiv"> </div>'; TODO put back
        echo '';
    }
}


//var_dump($images[0]["caption"]);
//var_dump($images[1]["path"]);
//var_dump($images["multi"]["dimensional"]["array"]);
?>
