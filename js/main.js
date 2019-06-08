jQuery(document).ready(function($){

	
	
	// browser window scroll (in pixels) after which the "menu" link is shown
	var offset = 300;

	var navigationContainer = $('#cd-nav'),
		mainNavigation = navigationContainer.find('#cd-main-nav ul');

	//hide or show the "menu" link
	checkMenu();
	$(window).scroll(function(){
		checkMenu();
	});

	//open or close the menu clicking on the bottom "menu" link
	$('.cd-nav-trigger').on('click', function(){
		$(this).toggleClass('menu-is-open');
		//we need to remove the transitionEnd event handler (we add it when scolling up with the menu open)
		mainNavigation.off('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend').toggleClass('is-visible');

	});

	function checkMenu() {
		if( $(window).scrollTop() > offset && !navigationContainer.hasClass('is-fixed')) {
			navigationContainer.addClass('is-fixed').find('.cd-nav-trigger').one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(){
				mainNavigation.addClass('has-transitions');
			});
		} else if ($(window).scrollTop() <= offset) {
			//check if the menu is open when scrolling up
			if( mainNavigation.hasClass('is-visible')  && !$('html').hasClass('no-csstransitions') ) {
				//close the menu with animation
				mainNavigation.addClass('is-hidden').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
					//wait for the menu to be closed and do the rest
					mainNavigation.removeClass('is-visible is-hidden has-transitions');
					navigationContainer.removeClass('is-fixed');
					$('.cd-nav-trigger').removeClass('menu-is-open');
				});
			//check if the menu is open when scrolling up - fallback if transitions are not supported
			} else if( mainNavigation.hasClass('is-visible')  && $('html').hasClass('no-csstransitions') ) {
					mainNavigation.removeClass('is-visible has-transitions');
					navigationContainer.removeClass('is-fixed');
					$('.cd-nav-trigger').removeClass('menu-is-open');
			//scrolling up with menu closed
			} else {
				navigationContainer.removeClass('is-fixed');
				mainNavigation.removeClass('has-transitions');
			}
		} 
	}
	
	 

	
	/* Js For The Team */
	
	$("#team a").click(function(){
        if ($(this).hasClass("no_action")) {
          return false;
        }
        if ($(this).hasClass("current_team")) {
          $("#team a").removeClass("current_team");
          
          $(".hidden").fadeOut(600);
          return false;
        }
        rel = $(this).attr("rel");
        $(".hidden").fadeOut(0);
        $("#"+rel).fadeIn(900);
        $("#team a").removeClass("current_team");
        $(this).addClass("current_team");
   
    });

    $(".arrow_team").click(function(){
          $("#team a").removeClass("current_team");
          $("#team_details").slideUp(400);
          $(".hidden").fadeOut(600);
    });

    $("#team2 a").click(function(){
        if ($(this).hasClass("no_action")) {
          return false;
        }
        if ($(this).hasClass("current_team2")) {
          $("#team12 a").removeClass("current_team12");
          $("#team2 a").removeClass("current_team2");
          $("#team3 a").removeClass("current_team3");
          $("#team4 a").removeClass("current_team4");
          $("#team5 a").removeClass("current_team5");
         
          $(".hidden2").fadeOut(600);
          return false;
        }
        rel = $(this).attr("rel");
        $(".hidden2").fadeOut(0);
        $("#"+rel).fadeIn(900);
          $("#team12 a").removeClass("current_team12");
          $("#team2 a").removeClass("current_team2");
          $("#team3 a").removeClass("current_team3");
          $("#team4 a").removeClass("current_team4");
          $("#team5 a").removeClass("current_team5");
        $(this).addClass("current_team2");
         
    });

   


	$("#list a").click(function(){
        if ($(this).hasClass("no_action")) {
          return false;
        }
        if ($(this).hasClass("current_team2")) {
          $("#list a").removeClass("current_team2");
          $(".hidden2").fadeOut(600);
		  $(".list_default").fadeOut(400);
          return false;
        }
        rel = $(this).attr("rel");
        $(".hidden2").fadeOut(0);
		 $(".list_default").fadeOut(400);
        $("#"+rel).fadeIn(900);
          
          $("#list a").removeClass("current_team2");
           $(".list_default").removeClass("current_team2");
        $(this).addClass("current_team2");
    });
   
    
  $("#menu").change(function(){
    rel = $("#menu option:selected").attr("rel");
    if ($("#menu option:selected").hasClass("active")) {
      return false;
    }
    $("#menu option").removeClass('active');
    $("#menu option:selected").addClass('active');
    $(".hidden2").fadeOut(400);
    $("#"+rel).delay(400).fadeIn(400);
  });
   
   $("#list a").click(function(){
    rel = $(this).attr("rel");
    if ($(this).hasClass("current")) {
      return false;
    }
    $("#list a").removeClass('current');
    $(this).addClass('current');
    $(".hidden").fadeOut(400);
    $("#"+rel).delay(400).fadeIn(400);
  });
		
$("#view_ach").click(function() {
$('#view_ach').toggle();
 $('#ach_div').toggle();
}); 

$("#ach_div").click(function() {
$('#view_ach').toggle();
 $('#ach_div').toggle();
}); 


$(".ld_h1").hover(function() {
$('#before').fadeToggle(900);
 $('#after').fadeToggle(900); 
});   

$(".ld_h2").hover(function() {
$('#before2').fadeToggle(900);
 $('#after2').fadeToggle(900);
});
$(".ld_h3").hover(function() {
$('#before3').fadeToggle(900);
 $('#after3').fadeToggle(900);
});

$(".ld_h4").hover(function() {
$('#before4').fadeToggle(900);
 $('#after4').fadeToggle(900);
});

$(".ld_h5").hover(function() {
$('#before5').fadeToggle(900);
 $('#after5').fadeToggle(900);
});
$(".ld_h6").hover(function() {
$('#before6').fadeToggle(900);
 $('#after6').fadeToggle(900);
});
$(".ld_h7").hover(function() {
$('#before7').fadeToggle(900);
 $('#after7').fadeToggle(900);
});
$(".ld_h8").hover(function() {
$('#before8').fadeToggle(900);
 $('#after8').fadeToggle(900);
});
$(".ld_h9").hover(function() {
$('#before9').fadeToggle(900);
 $('#after9').fadeToggle(900);
});

$(".ld_h10").hover(function() {
$('#before10').fadeToggle(900);
 $('#after10').fadeToggle(900);
});
$(".ld_h11").hover(function() {
$('#before11').fadeToggle(900);
 $('#after11').fadeToggle(900);
});
$(".ld_h12").hover(function() {
$('#before12').fadeToggle(900);
 $('#after12').fadeToggle(900);
});
$(".ld_h13").hover(function() {
$('#before13').fadeToggle(900);
 $('#after13').fadeToggle(900);
});
$(".ld_h14").hover(function() {
$('#before14').fadeToggle(900);
 $('#after14').fadeToggle(900);
});
$(".ld_h15").hover(function() {
$('#before15').fadeToggle(900);
 $('#after15').fadeToggle(900);
});
$(".ld_h16").hover(function() {
$('#before16').fadeToggle(900);
 $('#after16').fadeToggle(900);
});
$(".ld_h17").hover(function() {
$('#before17').fadeToggle(900);
 $('#after17').fadeToggle(900);
});
$(".ld_h18").hover(function() {
$('#before18').fadeToggle(900);
 $('#after18').fadeToggle(900);
});
$(".ld_h19").hover(function() {
$('#before19').fadeToggle(900);
 $('#after19').fadeToggle(900);
});
$(".ld_h20").hover(function() {
$('#before20').fadeToggle(900);
 $('#after20').fadeToggle(900);
});
$(".ld_h21").hover(function() {
$('#before21').fadeToggle(900);
 $('#after21').fadeToggle(900);
});
$(".ld_h22").hover(function() {
$('#before22').fadeToggle(900);
 $('#after22').fadeToggle(900);
});
$(".ld_h23").hover(function() {
$('#before23').fadeToggle(900);
 $('#after23').fadeToggle(900);
});



   /* Js For Dental Implants */
var currentIndex = 0,
  items = $('.dental-slider div'),
  itemAmt = items.length;

function cycleItems() {
  var item = $('.dental-slider div').eq(currentIndex);
  items.hide();
  item.css('display','inline-block');
}

var autoSlide = setInterval(function() {
  currentIndex += 1;
  if (currentIndex > itemAmt - 1) {
    currentIndex = 0;
  }
  cycleItems();
}, 9000);

$('.next').click(function() {
  clearInterval(autoSlide);
  currentIndex += 1;
  if (currentIndex > itemAmt - 1) {
    currentIndex = 0;
  }
  cycleItems();
});

$('.prev').click(function() {
  clearInterval(autoSlide);
  currentIndex -= 1;
  if (currentIndex < 0) {
    currentIndex = itemAmt - 1;
  }
  cycleItems();
});

   /* Js For Dental Implants  FAQ's*/
$("#plw1").click(function() {
$('#plw-p1').show(400);
$('#plw-p2').hide(400);
$('#plw-p3').hide(400);
$('#plw-p4').hide(400);
$('#plw-p5').hide(400);
$('#plw-p6').hide(400);
});

$("#plw2").click(function() {
$('#plw-p2').show(400);
$('#plw-p1').hide(400);
$('#plw-p3').hide(400);
$('#plw-p4').hide(400);
$('#plw-p5').hide(400);
$('#plw-p6').hide(400);
});

$("#plw3").click(function() {
$('#plw-p3').show(400);
$('#plw-p1').hide(400);
$('#plw-p2').hide(400);
$('#plw-p4').hide(400);
$('#plw-p5').hide(400);
$('#plw-p6').hide(400);
});

$("#plw4").click(function() {
$('#plw-p4').show(400);
$('#plw-p1').hide(400);
$('#plw-p2').hide(400);
$('#plw-p3').hide(400);
$('#plw-p5').hide(400);
$('#plw-p6').hide(400);
});

$("#plw5").click(function() {
$('#plw-p5').show(400);
$('#plw-p1').hide(400);
$('#plw-p2').hide(400);
$('#plw-p4').hide(400);
$('#plw-p3').hide(400);
$('#plw-p6').hide(400);
});

$("#plw6").click(function() {
$('#plw-p6').show(400);
$('#plw-p1').hide(400);
$('#plw-p2').hide(400);
$('#plw-p4').hide(400);
$('#plw-p3').hide(400);
$('#plw-p5').hide(400);
});
	
	});
  

 /*$(window).load(function(){	
		$(".pf .pf_content").show().addClass("slideRight");
	$(".slide-desc #slide-cont1").show().addClass("fadeIn");
	$(".slide-desc #slide-cont2").show().addClass("fadeIn2");
	$(".slide-desc p").show().addClass("fadeIn3"); 
	
	}); */

	$(window).scroll(function() {
	 $('.dc1').each(function(){
		var imagePos = $(this).offset().top;

		var topOfWindow = $(window).scrollTop();
			if (imagePos < topOfWindow+400) {
				$(this).show().addClass("fadeIn");
			}
		}); 
		
		
		$('#tl1').each(function(){
		var imagePos = $(this).offset().top;

		var topOfWindow = $(window).scrollTop();
			if (imagePos < topOfWindow+400) {
				$(this).show().addClass("fadeIn");
			}
		});
		
		$('#tl2').each(function(){
		var imagePos = $(this).offset().top;

		var topOfWindow = $(window).scrollTop();
			if (imagePos < topOfWindow+400) {
				$(this).show().addClass("fadeIn2");
			}
		});
		
		$('#tl3').each(function(){
		var imagePos = $(this).offset().top;

		var topOfWindow = $(window).scrollTop();
			if (imagePos < topOfWindow+400) {
				$(this).show().addClass("fadeIn3");
			}
		});
		
		$('#tl4').each(function(){
		var imagePos = $(this).offset().top;

		var topOfWindow = $(window).scrollTop();
			if (imagePos < topOfWindow+400) {
				$(this).show().addClass("fadeIn4");
			}
		});
		
	}); 
		


 