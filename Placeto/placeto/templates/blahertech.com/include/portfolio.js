$(document).ready(function()
{
	//Show Banner
	$(".main_image .desc").show(); //Show Banner
	$(".main_image .block").animate({ opacity: 0.85 }, 1 ); //Set Opacity

	//Click and Hover events for thumbnail list
	$(".image_thumb ul li:first").addClass('active'); 
	$(".image_thumb ul li").click(function(){ 
		//Set Variables
		var imgAlt = $(this).find('img').attr("alt"); //Get Alt Tag of Image
		var imgTitle = $(this).find('a').attr("href"); //Get Main Image URL
		var imgDesc = $(this).find('.block').html(); 	//Get HTML of block
		var imgDescHeight = $(".main_image").find('.block').height();	//Calculate height of block	
		
		if ($(this).is(".active")) {  //If it's already active, then...
			return false; // Don't click through
		} else {
			//Animate the Teaser	
			$(".main_image img").animate({ opacity: 0}, 250 );			
			$(".main_image .block").animate({ opacity: 0, marginBottom: -imgDescHeight }, 250 , function() {
				$(".main_image .block").html(imgDesc).animate({ opacity: 0.85,	marginBottom: "0" }, 250 );
				$(".main_image img").attr({ src: imgTitle , alt: imgAlt}).animate({ opacity: 1}, 250 );
			});
		}
		
		$(".image_thumb ul li").removeClass('active'); //Remove class of 'active' on all lists
		$(this).addClass('active');  //add class of 'active' on this list only
		return false;
		
	}) .hover(function(){
		$(this).addClass('hover');
		}, function() {
		$(this).removeClass('hover');
	});
			
	//Toggle Teaser
	$("a.collapse").click(function(){
		$(".main_image .block").slideToggle();
		$("a.collapse").toggleClass("show");
		return false;
	});
	
	/* mdm - 3/4/10
	--------------- */

	timing = 15000; // Change the speed here. "1000" == 1 sec
	rotate = setInterval("triggernext()", timing);
	
	// .bind below requires js lib 1.4, if using 1.3 change to: 
	//mouseover $(...).hover(function() {
	//mouseout }, function() {
	
	$('.image_thumb').bind({   
	
		mouseenter: function() {
			clearInterval(rotate);
		},
		mouseleave: function() {
			rotate = setInterval("triggernext()", timing);
		}
	});
	$('.image_next').bind({   
	
		mouseenter: function() {
			clearInterval(rotate);
		},
		mouseleave: function() {
			rotate = setInterval("triggernext()", timing);
		}
	});
	$('.image_prev').bind({   
	
		mouseenter: function() {
			clearInterval(rotate);
		},
		mouseleave: function() {
			rotate = setInterval("triggernext()", timing);
		}
	});
	
}); //Close $(document).ready([...]);
	
	function triggernext() {
		slides = $(".image_thumb ul");
		if((slides.find("li.active").index() + 1) == slides.find("li").length) {
			slides.find("li:first").trigger('click');
		} else {
			slides.find("li.active").next().trigger('click');
		}
	}
