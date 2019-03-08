jQuery(document).ready(function ($) {

  	// init Isotope
    var $grid = $('.grid').isotope({
        itemSelector: '.element-item',
        layoutMode: 'fitRows'
    });
    // filter functions
    var filterFns = {
        // show if number is greater than 50
        numberGreaterThan50: function() {
            var number = $(this).find('.number').text();
            return parseInt(number, 10) > 50;
        },
        // show if name ends with -ium
        ium: function() {
            var name = $(this).find('.name').text();
            return name.match(/ium$/);
        }
    };
    // bind filter button click
    $('.filters-button-group').on('click', 'button', function() {
        var filterValue = $(this).attr('data-filter');
        // use filterFn if matches value
        filterValue = filterFns[filterValue] || filterValue;
        $grid.isotope({ filter: filterValue });
    });
    // change is-checked class on buttons
    $('.button-group').each(function(i, buttonGroup) {
        var $buttonGroup = $(buttonGroup);
        $buttonGroup.on('click', 'button', function() {
            $buttonGroup.find('.is-checked').removeClass('is-checked');
            $(this).addClass('is-checked');
        });
    });

		// The slider being synced must be initialized first
		$('#slider .slides').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      fade: true,
      arrows: true,
      asNavFor: '.nav-thumb',
      infinite: false
    });
    $('#carousel .nav-thumb').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      asNavFor: '.slides',
      dots: false,
      arrows: false,
      centerMode: false,
      focusOnSelect: true,
      infinite: false, 
      responsive: [{

        breakpoint: 540,
        settings: {
          slidesToShow: 2,
        }
      }]
    });

    /** Lightbox */
    if( spa_and_salon_data.lightbox == '1' ){        
        $("a[href$='.jpg'],a[href$='.jpeg'],a[href$='.png'],a[href$='.gif'],[data-fancybox]").fancybox({
            buttons: [
            "zoom",
            //"share",
            "slideShow",
            "fullScreen",
            //"download",
            //"thumbs",
            "close"
            ]
        });       
    }	

    /* Sticky Menu */
    var winwidth = $(window).width();
    if( spa_and_salon_data.sticky == '1' && winwidth >= 992 ){
     var mns = "sticky-menu";
     hdr = $('.site-header').height();

     mn = $(".site-header .main-navigation");

     $(window).scroll(function() {
      if( $(this).scrollTop() > hdr ) {
       mn.addClass(mns);
     } else {
       mn.removeClass(mns);
     }
   });
   }
   /* Sticky Menu Ends */			



   $('header nav').meanmenu({
     meanScreenWidth: "992",
     meanRevealPosition: "center"
   });


        //banner carousel

        /** Variables from Customizer for Slider settings */
        if( spa_and_salon_data.auto == '1' ){
         var slider_auto = true;
       }else{
         slider_auto = false;
       }

       if( spa_and_salon_data.control == '1' ){
         var slider_option = true;
       }else{
         slider_option = false;
       }

       if( spa_and_salon_data.loop == '1' ){
        var slider_loop = true;
      }else{
        var slider_loop = false;
      }

      if( spa_and_salon_data.mode == 'slide' ){
        var animation = '';

      }else if( spa_and_salon_data.mode == 'fade' ){
        var animation = 'fadeOut';

      }else{
        var animation = spa_and_salon_data.mode;
      }

      if( spa_and_salon_data.rtl == '1' ){
        var rtl = true;
      }else{
        var rtl = false;
      }

      $("#banner-slider").owlCarousel({
        items        : 1,
        animateOut   : animation,
        loop         : slider_loop,
        autoplay     : slider_auto,
        nav          : slider_option, 
        mouseDrag    : false,
        lazyLoad     : true,
        lazyLoadEager: 1,
        rtl          : rtl,
        smartSpeed   : spa_and_salon_data.speed,
      });

      /****SHORTCODE***/	
      $('.shortcode-slider .slides').owlCarousel({
        //mode        : "slide",
        items        : 1,
        margin : 0,
        dots       : false,
        nav: true,
        MouseDrag  : false,
        rtl         : rtl
      });    	

      $('.rara_accordian .rara_accordian_content').hide(); /**Need to be CSS*/
      $('.rara_accordian:first').children('.rara_accordian_content').show();
      $('.rara_accordian:first').children('.rara_accordian_title').addClass('active');
      $('.rara_accordian_title').click(function(){
        if($(this).hasClass('active')){
        }
        else{
          $(this).parent('.rara_accordian').siblings().find('.rara_accordian_content').slideUp();
          $(this).next('.rara_accordian_content').slideToggle();
          $(this).parent('.rara_accordian').siblings().find('.rara_accordian_title').removeClass('active')
          $(this).toggleClass('active')
        }
      });

      $('.rara_toggle.close .rara_toggle_content').hide(); /**Need to be CSS*/
      $('.rara_toggle.open .rara_toggle_title').addClass('active');
      $('.rara_toggle_title').click(function(){
        $(this).next('.rara_toggle_content').slideToggle();
        $(this).toggleClass('active')
      });

      $('.rara_tab').hide();/**Need to be CSS*/
      $('.rara_tab_wrap').prepend('<div class="rara_tab_group clearfix"></div>');

      $('.rara_tab_wrap').each(function(){
        $(this).children('.rara_tab').find('.tab-title').prependTo($(this).find('.rara_tab_group'));
        $(this).children('.rara_tab').wrapAll( "<div class='rara_tab_content clearfix' />");
      });

      $('#page').each(function(){
        $(this).find('.rara_tab:first-child').show();
        $(this).find('.tab-title:first-child').addClass('active')
      });

      $('.rara_tab_group .tab-title').click(function(){
        $(this).siblings().removeClass('active');
        $(this).addClass('active');
        $(this).parent('.rara_tab_group ').next('.rara_tab_content').find('.rara_tab').hide();
        var ap_id = $(this).attr('id');
        $(this).parent('.rara_tab_group ').next('.rara_tab_content').find('.'+ap_id).show();
      });    
      /****SHORTCODE***/ 	

      /* Equal Height */
      $('.plan .col').matchHeight({
        byRow: true,
        property: 'height',
        target: null,
        remove: false
      });

      $('.plan-page .col').matchHeight({
        byRow: true,
        property: 'height',
        target: null,
        remove: false
      });

      $('.services-page .col').matchHeight({
        byRow: true,
        property: 'height',
        target: null,
        remove: false
      });

      $('.services .col').matchHeight({
        byRow: true,
        property: 'height',
        target: null,
        remove: false
      });

      $('#primary .widget-area .widget.widget_spa_and_salon_recent_post ul li').matchHeight({
        byRow: true,
        property: 'height',
        target: null,
        remove: false
      });

      $('#primary .widget-area .widget.widget_spa_and_salon_popular_post ul li').matchHeight({
        byRow: true,
        property: 'height',
        target: null,
        remove: false
      });

      $('#primary .widget-area .widget.widget_spa_and_salon_category_post ul li').matchHeight({
        byRow: true,
        property: 'height',
        target: null,
        remove: false
      });

      $('#primary .widget-area .widget.widget_spa_and_salon_author_post ul li').matchHeight({
        byRow: true,
        property: 'height',
        target: null,
        remove: false
      });	


      /* Custom Scroll Bar */
      $(".promotional-block .col .text-holder").mCustomScrollbar({
       theme:"minimal"
     });

      $(".testimonial #slider .holder .text-holder .holder").mCustomScrollbar({
       theme:"minimal"
     });

    // Script for back to top
    $(window).scroll(function(){
      if($(this).scrollTop() > 300){
        $('#rara-top').fadeIn();
      }else{
        $('#rara-top').fadeOut();
      }
    });
    
    $("#rara-top").click(function(){
      $('html,body').animate({scrollTop:0},600);
    });

  });		