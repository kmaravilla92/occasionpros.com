function resize() {
	var windowWidth = $(window).width();
	var windowHeight = $(window).height();

	// STICKY FOOTER
	var footerHeight = $('.page-footer').outerHeight();
	var footerTop = (footerHeight) * -1;
	$('.page-footer').css({marginTop: footerTop});
	$('#main-wrapper').css({paddingBottom: footerHeight});
}

$(window).resize(function() {
	resize();
});

var UI = {};

UI.home_page = function(){
};

$(document).ready(function() {
	resize();

	switch($('body').attr('rel')){
		case 'home-page':
			UI.home_page();
		break;
	}
	var windowH = $(window).height();
	$('.fullscreen').height(windowH);

});

$(window).resize(function() {
});


$(window).load(function() {

	resize();

});


/* resize background images */
function backgroundResize(){


    var windowH = $(window).height();
    $(".bg").each(function(i){
        var path = $(this);
        // variables
        var contW = path.width();
        var contH = path.height();
        var imgW = path.attr("data-img-width");
        var imgH = path.attr("data-img-height");
        var ratio = imgW / imgH;
        // overflowing difference
        var diff = parseFloat(path.attr("data-diff"));
        diff = diff ? diff : 0;
        // remaining height to have fullscreen image only on parallax
        var remainingH = 0;
        if(path.hasClass("parallax")){
            var maxH = contH > windowH ? contH : windowH;
            remainingH = windowH - contH;
        }
        // set img values depending on cont
        imgH = contH + remainingH + diff;
        imgW = imgH * ratio;
        // fix when too large
        if(contW > imgW){
            imgW = contW;
            imgH = imgW / ratio;
        }
        //
        path.data("resized-imgW", imgW);
        path.data("resized-imgH", imgH);
        path.css("background-size", imgW + "px " + imgH + "px");
    });
}

$(window).resize(backgroundResize);
$(window).focus(backgroundResize);

backgroundResize();

$(document).ready(function() {
    $('a.popup-with-zoom-anim').magnificPopup({
        type: 'inline',

        fixedContentPos: false,
        fixedBgPos: true,

        overflowY: 'auto',

        closeBtnInside: true,
        preloader: false,

        midClick: true,
        removalDelay: 300,
        mainClass: 'my-mfp-zoom-in'
    });

    $('#btn-register-trig,#btn-register-trigv2,.user-access,.user-not').click(function(){
        $(this).children('.register-drop').stop().slideToggle("slow");
    });
    $('#side-menus').click(function(){
        $('.client-dashboard .navigation').stop().slideToggle("slow");
    });

    $(window).resize(function(){
        if ($(window).width() < 980) {
            $(".open").pageslide();
        }
        else {
             $.pageslide.close()
        }
    });

    if ($(window).width() < 980) {
        $(".open").pageslide();
    }
    else {
         $.pageslide.close()
    }


    (function() {

        "use strict";

        var togglesMenus = document.querySelectorAll("#side-menus");

       

        for (var i = togglesMenus.length - 1; i >= 0; i--) {
          var togglesMenu = togglesMenus[i];
          toggleHandler(togglesMenu);
        };

        function toggleHandler(toggle) {
          toggle.addEventListener( "click", function(e) {
            e.preventDefault();
            (this.classList.contains("is-active") === true) ? this.classList.remove("is-active") : this.classList.add("is-active");

          });
        }

    })();
});

$(document).on('click', '.scroll a', function(event){
	event.preventDefault();

	$('html, body').animate({
		scrollTop: $( $.attr(this, 'href') ).offset().top
	}, 500);
});