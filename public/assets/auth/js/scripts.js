
function scroll_to(clicked_link, nav_height) {
	var element_class = clicked_link.attr('href').replace('#', '.');
	var scroll_to = 0;
	if(element_class != '.top-content') {
		element_class += '-container';
		scroll_to = $(element_class).offset().top - nav_height;
	}
	if($(window).scrollTop() != scroll_to) {
		$('html, body').stop().animate({scrollTop: scroll_to}, 1000);
	}
}


jQuery(document).ready(function() {
	
	/*
	    Navigation
	*/
	$('a.scroll-link').on('click', function(e) {
		e.preventDefault();
		scroll_to($(this), 0);
	});	
	
    /*
        Background slideshow
    */
    $('.top-content').backstretch("/assets/auth/images/7.jpg");
    $('.testimonials-container').backstretch("/assets/auth/images/7.jpg");
    $('.how-it-works-container').backstretch("/assets/auth/images/7.jpg");
    $('.call-to-action-container').backstretch("/assets/auth/images/7.jpg");
    $('.contact-container').backstretch("/assets/auth/images/8.jpg");
    
    $('#top-navbar-1').on('shown.bs.collapse', function(){
    	$('.top-content').backstretch("resize");
    });
    $('#top-navbar-1').on('hidden.bs.collapse', function(){
    	$('.top-content').backstretch("resize");
    });
    
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(){
    	$('.testimonials-container').backstretch("resize");
    });
    
    /*
        Wow
    */
    new WOW().init();
    
	/*
	    Modals
	*/
	$('.launch-modal').on('click', function(e){
		e.preventDefault();
		$( '#' + $(this).data('modal-id') ).modal();
	});
	
	/*
	    Subscription form
	*/
	$('.subscribe .subscribe-email').on('focus', function(){
		$(this).val('').removeClass('subscribe-error');
	});
	//$('.subscribe form').on('submit', function(e) {
	//	e.preventDefault();
	//	var this_form = $(this);
	//    var postdata = this_form.serialize();
	//    $.ajax({
	//        type: 'POST',
	//        url: 'assets/subscribe.php',
	//        data: postdata,
	//        dataType: 'json',
	//        success: function(json) {
	//            if(json.valid == 0) {
	//                $('.success-message').hide();
	//                this_form.find('.subscribe-email').addClass('subscribe-error').val(json.message);
	//                $('.subscribe form').addClass('animated shake').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
     //       			$(this).removeClass('animated shake');
     //       		});
	//            }
	//            else {
	//            	this_form.hide();
	//                $('.success-message').html(json.message).fadeIn('fast', function(){
	//                	$('.top-content').backstretch("resize");
	//                });
	//            }
	//        }
	//    });
	//});

});


jQuery(window).load(function() {
	
	/*
		Loader
	*/
	$(".loader-img").fadeOut();
	$(".loader").delay(1000).fadeOut("slow");
	
	/*
		Hidden images
	*/
	$(".modal-body img, .testimonial-image img").attr("style", "width: auto !important; height: auto !important;");
	
});
