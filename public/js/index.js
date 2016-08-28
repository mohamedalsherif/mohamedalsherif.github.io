var lastChoosenTab; //used to store the last opened tab in order to disable
//tabs being choosen on slide Transition

var isMobile;
var swipeSpeed = 600;
var swipe=false;
var animationStartMilliSecondsDifference=500;

function enter_hover_function()
{
	var ffdf= $(this);
	var fff=ffdf.position();
	var x=this;
	var gg=this.getBoundingClientRect();
	var ff=this.getBoundingClientRect().left;
	var theOverlay=$("#theOverlay")[0];

	var newTopPosition=this.y-192;//-(this.height/2);
	console.log("hiehgt: "+this.height+" width: "+ this.width + " y: "+this.y+ " x:"+this.x+" and new Top Position:"+newTopPosition);
	$("#theOverlay").css({height: this.height , width:this.width, top: newTopPosition, left: this.x, position:'relative' ,opacity: 1});
	//$("#theOverlay").css({height: this.height , width:this.width, top: fff.top, left: fff.left, position:'relative' ,opacity: 1});
}

function exit_hover_function()
{
	$("#theOverlay").css({opacity: 0});
}
function aa()
{

}



function bb(){

}

function oneSecondFunction()
{
	$("#nav").css('visibility','visible').hide().fadeIn(500).delay(0).queue(function(next) 
	{
		$("#divOfName").css('visibility','visible').hide().fadeIn(1000).delay(0).queue(function(next) 
	{
		$("#content").css('visibility','visible').hide().fadeIn(750).removeClass('visib_hidden');
		var elementsActive=$(".active");
		if(elementsActive.length==0)
		{
			$("#theNav0").addClass('active');
		}
	}).removeClass('visib_hidden');
		
	}).fadeIn(2000).removeClass('visib_hidden');;
	
	
}


function resizeNav()
{
	var mm=47;//max margin
	/*
	Get Left MArgin between two nav tabs and after the third one if its there
	*/
	function getLeftMargin(id1,id2,id3)
	{
		var f=$("#"+id1);
		var g=$("#"+id2);
		var position = f.position();
	}

	function getTotalWidthOfIds(ids)
	{
		//var ids=[];
		if(!(ids instanceof Array))
		{
			ids=[ids];
		}
		var totalWidth=0;
		for(var i=0;i<ids.length;i++)
		{
			var f=$(ids[i]);
			var width = f.outerWidth();
    		totalWidth+=width;
		}
		return totalWidth;
	}
	function putAllIdsInMiddle()
	{
		var totalWidth,contactLeftMargin=0,articleLeftMargin=0;
		totalWidth=getTotalWidthOfIds(["#theNav0","#theNav1","#theNav2","#theNav3","#theNav4"]);
		var viewportWidth=$(window).width(); 
		var leftMargin=((viewportWidth-totalWidth)/2);
		leftMargin=leftMargin>mm?leftMargin:mm;
		var rightMargin=viewportWidth-totalWidth-leftMargin;
		
		var fourthNav=$("#theNav4");
		var thirdNav=$("#theNav3");
		var p=fourthNav.position();
		if(rightMargin<mm)
		{
			var widthOfFour=getTotalWidthOfIds(["#theNav0","#theNav1","#theNav2","#theNav3"])+2*mm;
			if(widthOfFour>=viewportWidth)
			{
				totalWidth=getTotalWidthOfIds(["#theNav0","#theNav1","#theNav2"]);
				leftMargin=((viewportWidth-totalWidth)/2);
				
				articleLeftMargin=-getTotalWidthOfIds("#theNav3")/2+(getTotalWidthOfIds("#theNav0")+getTotalWidthOfIds("#theNav1"))/2;
				contactLeftMargin=0;
				
				//contact and articles down
				//put all again in middle
				//put contact between about and artwork
				//put articles between artwork and exhibtion
			}
			else
			{
				//contact only down
				//put all again in middle
				//put contact between artwork and exhibtion
				totalWidth=getTotalWidthOfIds(["#theNav0","#theNav1","#theNav2","#theNav3"]);
				leftMargin=((viewportWidth-totalWidth)/2);
				//$("#nav").css('margin-left',leftMargin+'px');

				contactLeftMargin=-getTotalWidthOfIds("#theNav4")/2+getTotalWidthOfIds("#theNav0")+(getTotalWidthOfIds("#theNav1")+getTotalWidthOfIds("#theNav2"))/2;
				//var outerWidth=fourthNav.outerWidth();
				//var ml=(viewportWidth/2)-(outerWidth/2)-outerWidth;
				
			
			}
		}
		
		fourthNav.css('margin-left',contactLeftMargin+'px');
		thirdNav.css('margin-left',articleLeftMargin+'px');

		//leftMargin=leftMargin>mm?leftMargin:mm;
		$("#nav").css('margin-left',leftMargin+'px');
	}
	putAllIdsInMiddle();
	return;
	var totalWidth = 0;
	$('#nav .nav_tab_li').each(function() {
    	var $this = $(this);
    	var width = $this.outerWidth();
    	totalWidth+=width;
	});
	var viewportWidth=$(window).width(); 
	var leftMargin=((viewportWidth-totalWidth)/2);
	leftMargin=leftMargin>mm?leftMargin:mm;
	var rightMargin=viewportWidth-totalWidth-leftMargin;
	var fourthNav=$("#theNav4");
	var thirdNav=$("#theNav3");
	if(rightMargin<mm)
	{
		var widthOfThree=totalWidth-thirdNav.outerWidth()-fourthNav.outerWidth()-mm-mm;
		if(widthOfThree>=viewportWidth)
		{
			//contact only down
			//put all again in middle
			//put contact between artwork and exhibtion
			var outerWidth=fourthNav.outerWidth();
			var ml=(viewportWidth/2)-(outerWidth/2)-outerWidth;
			fourthNav.css('margin-left',ml+'px');
		}
		else
		{
			//contact and articles down
			//put all again in middle
			//put contact between about and artwork
			//put articles between artwork and exhibtion
		}
		
	}else
	{
		fourthNav.css('margin-left','0px');
		thirdNav.css('margin-left','0px');
		$("#nav").css('margin-left',leftMargin+'px');
	}
	
	//var contactMargin=
	console.log("leftMargin: "+ leftMargin +" viewportWidth:"+viewportWidth+"totalWidth "+totalWidth +" final "+(viewportWidth-totalWidth-leftMargin));
}

$( window ).resize(function() 
{
	resizeNav();
});

$( document ).ready(function()
{
	
	resizeNav();
//  $("a").focus(function(){

    //this.blur();
    //this.parentElement.blur(); did not work
//});
  /* $.detectSwipe.threshold=50;
      $  ("body").on('swipeleft',  function(){
      slickSwipe("left");
      })
              .on('swiperight', function(){slickSwipe("right");})s */

	$('.galleryImage').hover (enter_hover_function,exit_hover_function);
    $("#fblikeDiv").removeAttr("data-href");
    console.log( "ready!" );
		window.setTimeout(oneSecondFunction, 1000);

    isMobile = window.matchMedia("only screen and (max-width: 760px)");

     if (isMobile.matches)
     {
           swipeSpeed = 300;
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
      if(lastChoosenTab==undefined)
      {
      	lastChoosenTab=$('.active')[0]; //executed only once 
      }
      if(lastChoosenTab!=undefined && tt.id!=lastChoosenTab.id)
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
  }else if(direction=="left" && currentSlide!=4)
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
