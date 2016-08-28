var lastChoosenTab; //used to store the last opened tab in order to disable
//tabs being choosen on slide Transition

var isMobile;
var swipeSpeed = 600;
var swipe=false;
$( document ).ready(function()
{
//  $("a").focus(function(){

    //this.blur();
    //this.parentElement.blur(); did not work
//});
  /* $.detectSwipe.threshold=50;
      $  ("body").on('swipeleft',  function(){
      slickSwipe("left");
      })
              .on('swiperight', function(){slickSwipe("right");}) */



    $("#fblikeDiv").removeAttr("data-href");
    console.log( "ready!" );

    isMobile = window.matchMedia("only screen and (max-width: 760px)");

     if (isMobile.matches)
     {
           swipeSpeed = 400;
           $(".hrefToRemoveInMobile").removeAttr("href");
           swipe=true;
     }
     else
     {
       //initPhotoSwipeFromDOM('#demo-test-gallery');
     //initPhotoSwipeFromDOM('.hrefToRemoveInMobile');
       //initPhotoSwipeFromDOM('.galleryImageContainer');
       //initPhotoSwipeFromDOM('#my-gallery');
        initPhotoSwipeFromDOM('.galleryImageContainer');
     }

    


    $('#content').slick({
      infinite: false,
      speed: swipeSpeed,
      slidesToShow: 1,
      adaptiveHeight: true,
      arrows: false,
      swipe:swipe,
      touchMove:false
});
	gotoArtworkIfUrlContainsGidAndPid();
    fixDisplay();
    lastChoosenTab=$('.active')[0];
    $('#content').on('afterChange', function(event, slick, currentSlide)
    {
      var tt= $("#theNav"+currentSlide)[0];
      if(tt.id!=lastChoosenTab.id)
      {
        chooseLastChoosenTabAndUpdateActiveUIGivenLi(tt);
      }
    });


    // media query event handler
      var mq = window.matchMedia("(min-width: 961px)");
      mq.addListener(WidthChange);
      WidthChange(mq);
      CSSPropertiesAddedOnTheFly();


});


function gotoArtworkIfUrlContainsGidAndPid()
{
	var photoswipeParseHash = function() {
				var hash = window.location.hash.substring(1),
			    params = {};

			    if(hash.length < 5) { // pid=1
			        return params;
			    }

			    var vars = hash.split('&');
			    for (var i = 0; i < vars.length; i++) {
			        if(!vars[i]) {
			            continue;
			        }
			        var pair = vars[i].split('=');
			        if(pair.length < 2) {
			            continue;
			        }
			        params[pair[0]] = pair[1];
			    }

			    if(params.gid) {
			    	params.gid = parseInt(params.gid, 10);
			    }

			    return params;
			};
			
 var hashData = photoswipeParseHash();
			if(hashData.pid && hashData.gid) {
				tryToSlickGoTo(1);
			}

}


function goto(id, t)
{
  if(tryToSlickGoTo(id))
  {
    chooseLastChoosenTabAndUpdateActiveUIGivenLi(t.parentNode);
  }
}

function chooseLastChoosenTabAndUpdateActiveUIGivenLi(t)
{
  $(lastChoosenTab).first().removeAttr("data-toggle");
  $(lastChoosenTab).removeClass('active');
  $(t).first().attr( "data-toggle", "tab" );
  $(t).addClass('active');
  lastChoosenTab=t;
}

function tryToSlickGoTo(id)
{
  var currentSlide = $('#content').slick('slickCurrentSlide');
  $('#content').slick('slickGoTo',id,false);
  var currentSlideAfterSwipe = $('#content').slick('slickCurrentSlide');
  if(currentSlideAfterSwipe==currentSlide)
  {
    return false;
  }
  else
  {
    return true;
  }
}

function slickSwipe(direction)
{
  var currentSlide = $('#content').slick('slickCurrentSlide');
  if(direction=="right" && currentSlide!=0)
  {
    $('#content').slick('slickGoTo',currentSlide-1,false);
  }else if(direction=="left" && currentSlide!=3)
  {
    $('#content').slick('slickGoTo',currentSlide+1,false);
  }
}


function changeDisplay(newDisplay)
{
  	var cols =     document.getElementsByClassName('emptyDiv');
  	for(i=0; i<cols.length; i++)
  	{
    	cols[i].style.display = newDisplay;
  	}
}

function fixDisplay()
{
	if(window.outerWidth<=1177)
     {
     	changeDisplay("none");
		//make the divs use no space
     }
     else
     {
    	 changeDisplay("");
     }
}

window.onresize = function()
{
   	fixDisplay();
   	//console.log(window.outerWidth);
}

function CSSPropertiesAddedOnTheFly()
{
// $(".galleryImageContainer").css("width","100%");
//  $(".galleryImageContainer").css("height","100%");
  //$(".galleryImage").css("max-width","100%");
  //$(".galleryImage").css("height","100%");

  $(".exhibitionImage").css("width","100%");
  $(".exhibitionImage").css("height","100%");



  $("#fblikeDiv").removeAttr("data-layout"); //to enable source copying in git
  $("#fblikeDiv").removeAttr("data-show-faces");
  $("#fblikeDiv").removeAttr("data-href");

  if(isMobile.matches)
  {
    $("#fblikeDiv").attr("data-layout","button_count");
    $("#fblikeDiv").attr("data-show-faces","false");
  }
  else
  {
    $("#fblikeDiv").attr("data-layout","standard");
    $("#fblikeDiv").attr("data-show-faces","true");
  }
  $("#fblikeDiv").attr("data-href","https://www.facebook.com/Nourine-Hammad-1413192872293705/");
}


function WidthChange(mq)
{
  if (mq.matches)
  {
    $("#theHomeMain").attr( "data-size", "1162x1460");
  }
  else
  {
    $("#theHomeMain").attr( "data-size", "1055x1460");
  }
}
