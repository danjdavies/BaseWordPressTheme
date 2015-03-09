// Responsive Menu

var DD = {}

DD.SideMenuNavigation = function()
{

	var nav		  = $('#nav'),
		menuIcon  = $('.menu-icon');


	menuIcon.click(function(e){
		e.preventDefault();
		nav.toggleClass('open');
	})

}

DD.HoveredState = function()
{

	// On hover, add hovered class to all children elements
	$(".content--animated-strip .column a").mouseover(function(){$(this).children("*").addClass("hovered");}).mouseout(function(){$(this).children("*").removeClass("hovered");});
	// On hover, add hovered class to all children elements
	$(".content--animated-strip--two .column a").mouseover(function(){$(this).children("*").addClass("hovered");}).mouseout(function(){$(this).children("*").removeClass("hovered");});

	//On hover of play, change text
	$("#home-play-btn").mouseover(function(){
		$("#home-play-btn span").text("COMING SOON");
		}).mouseout(function(){
		$("#home-play-btn span").text("PLAY");
	});
}

/*DD.MeetTheTeam = function()
{

	var $clientcarousel = $('#clients-list'),
		clients = $clientcarousel.children().length;
		clientwidth = (clients * 300); // 140px width for each client item
		rotating = true;
		clientspeed = 1800;
		seeclients = setInterval(rotateClients, clientspeed);

 		$clientcarousel.css('width',clientwidth);

		$(document).on({
			mouseenter: function(){
			rotating = false; // turn off rotation when hovering
		},
		mouseleave: function(){
			rotating = true;
			}
		}, '#clients');

		function rotateClients() {
			if(rotating != false) {
				var $first = $('#clients-list li:first');
				$first.animate({ 'margin-left': '-300px' }, 600, function() {
				$first.remove().css({ 'margin-left': '0px' });
				$('#clients-list li:last').after($first);
			});
		}
	}
}*/

DD.AwardsOverlay = function()
{

	$('#awards-open').click(function(e){
		e.preventDefault();
		var drop = $('.home-drop-outer');
		drop.fadeIn(300);
	});

	// Hide awards drop down
	$('.awards-close').click(function(e){
		e.preventDefault();
		var drop = $('.home-drop-outer');
		drop.fadeOut(300);
	});
}

DD.EqualHeight = function()
{

	equalheight = function(container){

	var currentTallest = 0,
	     currentRowStart = 0,
	     rowDivs = new Array(),
	     $el,
	     topPosition = 0;
	 $(container).each(function() {

	   $el = $(this);
	   $($el).height('auto')
	   topPostion = $el.position().top;

	   if (currentRowStart != topPostion) {
	     for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
	       rowDivs[currentDiv].height(currentTallest);
	     }
	     rowDivs.length = 0; // empty the array
	     currentRowStart = topPostion;
	     currentTallest = $el.height();
	     rowDivs.push($el);
	   } else {
	     rowDivs.push($el);
	     currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
	  }
	   for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
	     rowDivs[currentDiv].height(currentTallest);
	   }
	 });
	}

	$(window).load(function() {
	  equalheight('#pr-blocks .column');
	});


	$(window).resize(function(){
	  equalheight('#pr-blocks .column');
	});
}

DD.HeroSlider = function() {

	$('.hero-slider').slick({
		infinite: true,
		arrows: false,
		autoplay: true,
		adaptiveHeight: true
	});
}

DD.TeamSlider = function() {

	$('.team-slider').slick({
		infinite: true,
		slidesToShow: 4,
		slidesToScroll: 4,
		arrows: false,
		autoplay: true,
		responsive: [
	    {
	      breakpoint: 1024,
	      settings: {
	        slidesToShow: 3,
	        slidesToScroll: 3,
	        infinite: true
	      }
	    },
	    {
	      breakpoint: 768,
	      settings: {
	        slidesToShow: 2,
	        slidesToScroll: 2
	      }
	    },
	    {
	      breakpoint: 480,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    }
	  ]
	});
}

DD.PageCarousel = function() {

	$('.page-slider').slick({
		infinite: true,
		arrows: true,
		autoplay: false,
		dots: true
	});
}

DD.AnimatedFigures = function()
{
        $('.counter').counterUp({
            delay: 5,
            time: 3000
        });
}

DD.GalleryPopup = function()
{
		//Problem: User when clicking on image goes to a dead end
		//Solution: Create an overlay with the large image - Lightbox

		var $overlay = $('<div id="overlay"></div>'),
			$image = $("<img>"),
			$caption = $("<p></p>"),
			$closeButton = $('<a href="#" class="close"></a>'),
			$popupDiv = $('<div>');

		//A div to overlay
		$overlay.append($popupDiv);

		//An image to overlay
		$popupDiv.append($image);

		//A close button to overlay
		$popupDiv.append($closeButton);

		//A caption to overlay
		$popupDiv.append($caption);


		//Add overlay
		$("body").append($overlay);

		//Capture the click event on a link to an image
		$(".gallery-item a").click(function(event){
			event.preventDefault();
		  var imageLocation = $(this).attr("href");
		  //Update overlay with the image linked in the link
		  $image.attr("src", imageLocation);

		  //Show the overlay.
		  $overlay.show();

		  //Get child's alt attribute and set caption
		  var captionText = $(this).children("img").attr("alt");
		  $caption.text(captionText);
		});

		//When overlay is clicked
		$overlay.click(function(){
		  //Hide the overlay
		  $overlay.hide();
		});
}

DD.CreativeToggle = function(){


		$('#creative-toggle').click(function(e){
			e.preventDefault();

			var inner = $('.creative-nav-showen');
			var btn   = $(this);
			var count = 0;

			if(!$(this).hasClass('opened')){
				inner.slideDown(200, function() {
					btn.addClass('opened');
				});
			} else {
				inner.slideUp(200);
				btn.removeClass('opened');
			}

		});
}

DD.ExternalLinks = function(){

		$('a[rel="external"]').attr('target', '_blank');

}

DD.StaffPopup = function()
{
		var staffListItem 	= $('.staff-list li'),
			overlay 		= $('#overlay'),
			profileIcon		= $('.profile-btn'),
			closeButton		= $('a.close'),
			profileText		= $('.profile-text');

			profileIcon.click(function(){
				overlay.show();
				$(this).next().show();
			})

			//When overlay is clicked
			overlay.click(function(){
			  //Hide the overlay
			  overlay.hide();
			  profileText.hide();
			});

			closeButton.click(function(){
				overlay.hide();
			  	profileText.hide();
			})
}

DD.Accordion = function()
{
		$('#accordion').find('.accordion-toggle').click(function(){

		//Expand or collapse this panel
		$(this).next().slideToggle('fast');

		//Hide the other panels
		$(".accordion-content").not($(this).next()).slideUp('fast');

		});
}

DD.MapsHale = function()
{
		var c = new google.maps.LatLng(53.370681, -2.339984);
    var a = {
        zoom: 15,
        center: c,
        mapTypeControl: true,
        mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
        },
        navigationControl: true,
        navigationControlOptions: {
            style: google.maps.NavigationControlStyle.SMALL
        },
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var d = new google.maps.Map(document.getElementById("hale_canvas"), a);
    var i = '<div id="content"><h1 id="firstHeading" class="coral">Peppermint Soda</h1><div id="bodyContent"><p>26 PARK ROAD,<br /> HALE,<br /> CHESHIRE,<br /> WA15 9NN</p></div>';
    var e = new google.maps.InfoWindow({
        content: i
    });
    var f = new google.maps.MarkerImage("http://peppermintsoda.co.uk/images/layout/contact-map-pin.png", new google.maps.Size(100, 50), new google.maps.Point(0, 0), new google.maps.Point(50, 50));
    var h = new google.maps.MarkerImage("http://peppermintsoda.co.uk/images/layout/contact-map-shadow.png", new google.maps.Size(130, 50), new google.maps.Point(0, 0), new google.maps.Point(65, 50));
    var g = new google.maps.LatLng(53.370681, -2.339984);
    var b = new google.maps.Marker({
        position: g,
        map: d,
        icon: f,
        shadow: h,
        title: "Peppermint Soda",
        zIndex: 3
    });
    google.maps.event.addListener(b, "click", function() {
        e.open(d, b)
    })
}

DD.MapsLondon = function()
{
		var c = new google.maps.LatLng(51.521368, -0.114567);
    var a = {
        zoom: 15,
        center: c,
        mapTypeControl: true,
        mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
        },
        navigationControl: true,
        navigationControlOptions: {
            style: google.maps.NavigationControlStyle.SMALL
        },
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var d = new google.maps.Map(document.getElementById("london_canvas"), a);
    var i = '<div id="content"><h1 id="firstHeading" class="coral">Peppermint Soda</h1><div id="bodyContent"><p>22A THEOBALD’S ROAD,<br /> LONDON,<br /> WC1X 8PF</p></div>';
    var e = new google.maps.InfoWindow({
        content: i
    });
    var f = new google.maps.MarkerImage("http://peppermintsoda.co.uk/images/layout/contact-map-pin.png", new google.maps.Size(100, 50), new google.maps.Point(0, 0), new google.maps.Point(50, 50));
    var h = new google.maps.MarkerImage("http://peppermintsoda.co.uk/images/layout/contact-map-shadow.png", new google.maps.Size(130, 50), new google.maps.Point(0, 0), new google.maps.Point(65, 50));
    var g = new google.maps.LatLng(51.521368, -0.114567);
    var b = new google.maps.Marker({
        position: g,
        map: d,
        icon: f,
        shadow: h,
        title: "Peppermint Soda",
        zIndex: 3
    });
    google.maps.event.addListener(b, "click", function() {
        e.open(d, b)
    })
}


DD.SideMenuNavigation();
DD.HoveredState();
//DD.MeetTheTeam();
DD.AwardsOverlay();
DD.EqualHeight();
DD.HeroSlider();
DD.TeamSlider();
DD.GalleryPopup();
DD.AnimatedFigures();
DD.CreativeToggle();
DD.PageCarousel();
DD.ExternalLinks();
DD.StaffPopup();
DD.Accordion();
DD.MapsHale();
DD.MapsLondon();




