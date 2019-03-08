/*! .isOnScreen() returns bool */
jQuery.fn.isOnScreen = function(){
	
	var win = jQuery(window);
	
	var viewport = {
		top : win.scrollTop(),
		left : win.scrollLeft()
	};
	viewport.right = viewport.left + win.width();
	viewport.bottom = viewport.top + win.height();
	
	var bounds = this.offset();
    bounds.right = bounds.left + this.outerWidth();
    bounds.bottom = bounds.top + this.outerHeight();
	
    return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
	
};

jQuery(document).ready(function($) {
    
    if (typeof spa_and_salon_ajax !== 'undefined') {
        
        var last_query = '';
        var search_xhr = null;
        function loadSearchResults(query, $container) {
            var search_query = query;
            if (!$container.hasClass('ajax-search-results-container')) {
                $container = $container.find('.ajax-search-results-container');
            }
            if (search_query == last_query) {
                var $results_container = $container.closest('.search-form').find('.ajax-search-results-container');
                if (!$results_container.is(':empty')) {
                    $results_container.show().closest('.search-form').addClass('ajax-search-box-open');
                    return false;
                }
            }
            last_query = search_query;
            
            if (search_xhr) {
                search_xhr.abort();
            }
            search_xhr = jQuery.ajax({
    			url: spa_and_salon_ajax.url, 
    			data: {  'action' : 'spa_and_salon_search', 'q' : search_query },
    			beforeSend: function() {
                    $container.addClass('loading');
    			},
    			success: function(data) {
    				$container.html(data).show().closest('.search-form').addClass('ajax-search-box-open');
    			}
            }).done(function() {
                $container.removeClass('loading');
            });
        }
        
        $('.search-form').each(function() {
            var $this = $(this);
            // add search results box
            $this.addClass('ajax-search').append('<div class="ajax-search-results-container"></div>')
                 .find('.search-field').on('input propertychange', function() { // IE<9 support with 'onpropertychange'
                    if ($(window).width() > 865) {
                        var s = jQuery(this).val();
                        if (s.length > 2) { 
                            fnDelay(function() {
                                loadSearchResults(s, $this);
                            }, 400);
                        } else {
                            $this.removeClass('ajax-search-box-open').find('.ajax-search-results-container').hide();
                        }
                    }
                 }).focus(function() {
                    var $cont = $this.find('.ajax-search-results-container');
                    if ( !$cont.is(':empty') && $(this).val().length > 2 ) {
                        $this.addClass('ajax-search-box-open');                        
                        $cont.show();
                    }
                 });
              $this.find('.ajax-search-results-container').hide();
        }).click(function(e) { // $('.search-form').click
            e.stopPropagation();
        });

        $(document).on('keydown', '.ajax-search-box-open', function(e) {

            var $this = $(this),
                focused = $this.find(':focus');

            switch(e.which) {
                case 38: // up
                    if ( focused.is("input") ) {
                        $this.find('li:last a').focus();
                    } else {
                        if (focused.closest('li').prev('li').length) {
                            focused.closest('li').prev('li').find('a:first').focus();
                        } else {
                            $this.find('input.search-field').focus();
                        }
                    }
                break;
                case 40: // down
                    if ( focused.is("input") ) {
                        $this.find('li:first a').focus();
                    } else {
                        if (focused.closest('li').next('li').length) {
                            focused.closest('li').next('li').find('a:first').focus();
                        } else {
                            $this.find('input.search-field').focus();
                        }
                    }
                break;
                default: return; // exit this handler for other keys
            }
            e.preventDefault(); // prevent the default action
        });
        
        //End Ajax Search
        
        //Start Ajax Pagination
        
        var pageNum = parseInt(spa_and_salon_ajax.startPage) + 1;
        var max = parseInt(spa_and_salon_ajax.maxPages);
        var nextLink = spa_and_salon_ajax.nextLink;
        var autoLoad = spa_and_salon_ajax.autoLoad;
        
        if ( autoLoad == 'load_more' ) {
            // Insert the "Load More Posts" link.
            $('.pagination')
                .before('<div class="pagination_holder" style="display: none;"></div>')                
                .after('<div id="load-posts"><a href="#"><i class="fa fa-refresh"></i>' + spa_and_salon_ajax.loadmore + '</a></div>');
            if (pageNum == max+1) {
                $('#load-posts a').html('<i class="fa fa-ban"></i>'+spa_and_salon_ajax.nomore).addClass('disabled');
            }
            $('#load-posts a').click(function() {
                if(pageNum <= max && !$(this).hasClass('loading')) {
                    $(this).html('<i class="fa fa-refresh fa-spin"></i>'+spa_and_salon_ajax.loading).addClass('loading');

                    $('.pagination_holder').load(nextLink + ' .latest_post', function() {
                        // Update page number and nextLink.
                        pageNum++;
                        var new_url = nextLink;
                        nextLink = nextLink.replace(/(\/?)page(\/|d=)[0-9]+/, '$1page$2'+ pageNum);
                        
                        //Temporary hold the post from pagination and append it to #main
                        var load_html = $('.pagination_holder').html(); 
                        $('.pagination_holder').html('');                                 
                        
                        /** YOU CAN CHANGE THE WRAPPER IF NEEDED HERE **/
                        $('.site-main article:last').after(load_html); // just simply append content without massonry
                        
                        /** For Tiled gallery of jetpact */                        
                        var $this = $('.site-main').find('.entry-content').find('div');
                        if( $this.hasClass('tiled-gallery') ){
                            $.getScript(spa_and_salon_ajax.plugin_url + "/jetpack/modules/tiled-gallery/tiled-gallery/tiled-gallery.js");                    
                        }
                        
                        if(pageNum <= max) {
                            $('#load-posts a').html('<i class="fa fa-refresh"></i>'+spa_and_salon_ajax.loadmore).removeClass('loading');
                        } else {
                            $('#load-posts a').html('<i class="fa fa-ban"></i>'+spa_and_salon_ajax.nomore).addClass('disabled').removeClass('loading');
                        }
                    });
                    
                } else {
                    // no more posts
                }

                return false;
            });
            $('.pagination').remove();
        }else if( autoLoad == 'infinite_scroll' ) {
            // autoload
            
            // Placeholder
            $('.pagination').before('<div class="pagination_holder" style="display: none;"></div>');
                
            var loading_posts = false;
            var last_post = false;
            
            if( $('.blog').length > 0 || $('.search').length > 0 || $('.archive').length > 0 ){
                $(window).scroll(function() {
                    if (!loading_posts && !last_post) {
                        var lastPostVisible = $('.latest_post').last().isOnScreen();
                        if (lastPostVisible) {
                            if(pageNum <= max) {
                                loading_posts = true;
                                
                                $('.pagination_holder').load(nextLink + ' .latest_post', function() {
                                    // Update page number and nextLink.
                                    pageNum++;
                                    var new_url = nextLink;
                                    
                                    loading_posts = false;
                                    nextLink = nextLink.replace(/(\/?)page(\/|d=)[0-9]+/, '$1page$2'+ pageNum); 
                                    
                                    //Temporary hold the post from pagination and append it to #main
                                    var load_html = $('.pagination_holder').html(); 
                                    $('.pagination_holder').html('');                                 
                                    
                                    /** YOU CAN CHANGE THE WRAPPER IF NEEDED HERE **/
                                    $('.site-main article:last').after(load_html); // just simply append content without massonry
                                    
                                    /** For Tiled gallery of jetpact */                        
                                    var $this = $('.site-main').find('.entry-content').find('div');
                                    if( $this.hasClass('tiled-gallery') ){
                                        $.getScript(spa_and_salon_ajax.plugin_url + "/jetpack/modules/tiled-gallery/tiled-gallery/tiled-gallery.js");                    
                                    }
                                    
                                });
                                
                            } else {
                                // no more posts
                                last_post = true;
                            }
                        }
                    }
                });
            }
            
        $('.pagination').remove();    
        } 
        // End Ajax Pagination
    }
    
}).click(function() { // (document).click
    if (typeof spa_and_salon_ajax !== 'undefined') { 
        jQuery('.ajax-search-results-container').fadeOut(200); jQuery('.search-form').removeClass('ajax-search-box-open'); 
    } 
});

var fnDelay = (function(){
  var timer = 0;
  return function(callback, ms){
    clearTimeout (timer);
    timer = setTimeout(callback, ms);
  };
})();