<?php
/**
 * Dynamic Styles
 *
 * @package Spa_And_Salon_Pro
 */

function spa_and_salon_dynamic_css_cb(){
    
    $body_font            = get_theme_mod( 'spa_and_salon_body_font', array('font-family'=>'Lato', 'variant'=>'regular') );    
    $body_fonts           = spa_and_salon_get_fonts( $body_font['font-family'], $body_font['variant'] );
    $body_font_size       = get_theme_mod( 'spa_and_salon_body_font_size', '18' );
    $body_line_ht         = get_theme_mod( 'spa_and_salon_body_line_height', '30' );
    $body_color           = get_theme_mod( 'spa_and_salon_body_color', '#666666' );
    $site_title_font      = get_theme_mod( 'spa_and_salon_site_title_font', array('font-family'=>'Marcellus', 'variant'=>'regular') );  
    $site_title_fonts     = spa_and_salon_get_fonts( $site_title_font['font-family'], $site_title_font['variant'] );  
    $site_title_font_size = get_theme_mod( 'spa_and_salon_site_title_font_size', '22' );
    
    $post_title_font      = get_theme_mod( 'spa_and_salon_post_title_font', array('font-family'=>'Marcellus', 'variant'=>'regular') );
    $post_title_fonts     = spa_and_salon_get_fonts( $post_title_font['font-family'], $post_title_font['variant'] );
    $post_title_font_size = get_theme_mod( 'spa_and_salon_post_title_font_size', '30' );
    $post_title_line_ht   = get_theme_mod( 'spa_and_salon_post_title_line_height', '36' );
    $post_title_color     = get_theme_mod( 'spa_and_salon_post_title_color', '#333333' );
	
    $page_title_font      = get_theme_mod( 'spa_and_salon_page_title_font', array('font-family'=>'Marcellus', 'variant'=>'regular') );
    $page_title_fonts     = spa_and_salon_get_fonts( $page_title_font['font-family'], $page_title_font['variant'] );
    $page_title_font_size = get_theme_mod( 'spa_and_salon_page_title_font_size', '48' );
    $page_title_line_ht   = get_theme_mod( 'spa_and_salon_page_title_line_height', '56' );
    $page_title_color     = get_theme_mod( 'spa_and_salon_page_title_color', '#72466a' );	
	
    $widget_title_font      = get_theme_mod( 'spa_and_salon_widget_title_font', array('font-family'=>'Marcellus', 'variant'=>'regular') );
    $widget_title_fonts     = spa_and_salon_get_fonts( $widget_title_font['font-family'], $widget_title_font['variant'] );    
    $widget_title_font_size = get_theme_mod( 'spa_and_salon_widget_title_font_size', '24' );
    $widget_title_line_ht   = get_theme_mod( 'spa_and_salon_widget_title_line_height', '28' );
    $widget_title_color     = get_theme_mod( 'spa_and_salon_widget_title_color', '#72466a' );	
    
    $widget_font      = get_theme_mod( 'spa_and_salon_widget_font', array('font-family'=>'Lato', 'variant'=>'regular') );
    $widget_fonts     = spa_and_salon_get_fonts( $widget_font['font-family'], $widget_font['variant'] );
    $widget_font_size = get_theme_mod( 'spa_and_salon_widget_font_size', '14' );
    $widget_line_ht   = get_theme_mod( 'spa_and_salon_widget_line_height', '30' );
    $widget_color     = get_theme_mod( 'spa_and_salon_widget_color', '#666666' );
        
    $h1_font      = get_theme_mod( 'spa_and_salon_h1_font', array('font-family'=>'Marcellus', 'variant'=>'regular') );
    $h1_fonts     = spa_and_salon_get_fonts( $h1_font['font-family'], $h1_font['variant'] );
    $h1_font_size = get_theme_mod( 'spa_and_salon_h1_font_size', '48' );
    $h1_line_ht   = get_theme_mod( 'spa_and_salon_h1_line_height', '57' );
    $h1_color     = get_theme_mod( 'spa_and_salon_h1_color', '#333333' );
    
    $h2_font      = get_theme_mod( 'spa_and_salon_h2_font', array('font-family'=>'Marcellus', 'variant'=>'regular') );
    $h2_fonts     = spa_and_salon_get_fonts( $h2_font['font-family'], $h2_font['variant'] );
    $h2_font_size = get_theme_mod( 'spa_and_salon_h2_font_size', '40' );
    $h2_line_ht   = get_theme_mod( 'spa_and_salon_h2_line_height', '52' );
    $h2_color     = get_theme_mod( 'spa_and_salon_h2_color', '#333333' );
    
    $h3_font      = get_theme_mod( 'spa_and_salon_h3_font', array('font-family'=>'Marcellus', 'variant'=>'regular') );
    $h3_fonts     = spa_and_salon_get_fonts( $h3_font['font-family'], $h3_font['variant'] );
    $h3_font_size = get_theme_mod( 'spa_and_salon_h3_font_size', '30' );
    $h3_line_ht   = get_theme_mod( 'spa_and_salon_h3_line_height', '43' );
    $h3_color     = get_theme_mod( 'spa_and_salon_h3_color', '#333333' );
    
    $h4_font      = get_theme_mod( 'spa_and_salon_h4_font', array('font-family'=>'Marcellus', 'variant'=>'regular') );
    $h4_fonts     = spa_and_salon_get_fonts( $h4_font['font-family'], $h4_font['variant'] );
    $h4_font_size = get_theme_mod( 'spa_and_salon_h4_font_size', '24' );
    $h4_line_ht   = get_theme_mod( 'spa_and_salon_h4_line_height', '33' );
    $h4_color     = get_theme_mod( 'spa_and_salon_h4_color', '#333333' );
    
    $h5_font      = get_theme_mod( 'spa_and_salon_h5_font', array('font-family'=>'Marcellus', 'variant'=>'regular') );
    $h5_fonts     = spa_and_salon_get_fonts( $h5_font['font-family'], $h5_font['variant'] );
    $h5_font_size = get_theme_mod( 'spa_and_salon_h5_font_size', '20' );
    $h5_line_ht   = get_theme_mod( 'spa_and_salon_h5_line_height', '28' );
    $h5_color     = get_theme_mod( 'spa_and_salon_h5_color', '#333333' );
    
    $h6_font      = get_theme_mod( 'spa_and_salon_h6_font', array('font-family'=>'Marcellus', 'variant'=>'regular') );
    $h6_fonts     = spa_and_salon_get_fonts( $h6_font['font-family'], $h6_font['variant'] );
    $h6_font_size = get_theme_mod( 'spa_and_salon_h6_font_size', '18' );
    $h6_line_ht   = get_theme_mod( 'spa_and_salon_h6_line_height', '24' );
    $h6_color     = get_theme_mod( 'spa_and_salon_h6_color', '#333333' );
    
    //  $color_scheme    = get_theme_mod( 'spa_and_salon_color_scheme', '#f47e46' );

    $medical_spa_child = get_theme_mod( 'spa_and_salon_ed_child_style','spa_and_salon' );
   
    if( $medical_spa_child == 'medical_spa' ) {
         $primary_color     = get_theme_mod( 'medical_spa_primary_color', '#e74497' );   
         $secondary_color   = get_theme_mod( 'medical_spa_secondary_color', '#95bf6b' );  
    }else{
         $primary_color     = get_theme_mod( 'spa_and_salon_primary_color', '#7fa200' );   
         $secondary_color   = get_theme_mod( 'spa_and_salon_secondary_color', '#ab5da5' );  
    }   
  
    
    $primary_rgb = spa_and_salon_hex2rgb( spa_and_salon_sanitize_hex_color( $primary_color ) );
    $secondary_rgb = spa_and_salon_hex2rgb( spa_and_salon_sanitize_hex_color( $secondary_color ) );     
    
    $bg_color        = get_theme_mod( 'spa_and_salon_bg_color', '#e9e9e9' );
    $body_bg         = get_theme_mod( 'spa_and_salon_body_bg', 'image' );
    $bg_image        = get_theme_mod( 'spa_and_salon_bg_image' );
    $bg_pattern      = get_theme_mod( 'spa_and_salon_bg_pattern', 'nobg' );
    $ed_auth_comment = get_theme_mod( 'spa_and_salon_ed_auth_comments' );


    if( $medical_spa_child == 'medical_spa'){
        echo "<style type='text/css' media='all'>"; ?>

            .medical-spa .site-branding .site-title a,
            .medical-spa .testimonial #slider .holder .text-holder .name,
            .medical-spa .instagram .header h2,
            .medical-spa .our-team .team .text-holder .name,
            .medical-spa #secondary .widget .widget-title,
            .medical-spa .plan-page .col .text-holder .title a:hover,
            .medical-spa .testimonial-page .testimonials .text-holder .info span{
                color: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
            }

            .medical-spa .promotional-block .col .img-holder .icon-holder,
            .medical-spa .welcome-note .col .title:before,
            .medical-spa .services .header h2:before,
            .medical-spa .plan .header h2:before,
            .medical-spa .plan .col:hover .text-holder .price,
            .medical-spa .testimonial .header h2:before,
            .medical-spa .testimonial #slider .holder .text-holder .name:before,
            .medical-spa .instagram .header h2:before,
            .medical-spa .site-footer .widget .widget-title:before,
            .medical-spa .rara_toggle .rara_toggle_title,
            .medical-spa .our-team .heading .title:before,
            .medical-spa .our-team .team .text-holder .name:before,
            .medical-spa #secondary .widget .widget-title:before,
            .medical-spa .plan-page .heading .title:before,
            .medical-spa .plan-page .button-holder button:hover,
            .medical-spa .plan-page .button-holder button.active,
            .medical-spa .plan-page .button-holder button.is-checked,
            .medical-spa .plan-page .col:hover .text-holder .price,
            .medical-spa .contact-page .heading .title:before,
            .medical-spa .services-page .heading .title:before,
            .medical-spa .testimonial-page .heading .title:before,
            .medical-spa .testimonial-page .testimonials .text-holder .info span:before{
                background: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
            }

            .medical-spa .rara_toggle{
                border-color: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
            }

            .medical-spa .promotional-block .col .text-holder .title:before,
            .medical-spa .plan .col .text-holder .price,
            .medical-spa .contact .right .header h2:before,
            .medical-spa .contact .left .address-holder .icon-holder,
            .medical-spa .plan-page .col .text-holder .price{
                background: <?php echo spa_and_salon_sanitize_hex_color( $secondary_color ); ?>;
            }

            .medical-spa .promotional-block .col:hover .text-holder,
            .medical-spa .services .col:hover h3,
            .medical-spa .services-page .col:hover h3{
                border-color: <?php echo spa_and_salon_sanitize_hex_color( $secondary_color ); ?>;
            }

            .medical-spa .promotional-block2:after{
                background: <?php echo 'rgba(' . $primary_rgb[0] . ', ' . $primary_rgb[1] . ', ' . $primary_rgb[2] . ', 0.8);'; ?>;
            }

            .medical-spa .main-navigation ul .current_page_item > a,
            .medical-spa .main-navigation ul .current-menu-item > a,
            .medical-spa .main-navigation ul .current_page_item > a,
            .medical-spa .main-navigation ul .current-menu-ancestor > a  {
                color: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;        
            }

            .contact-page .contact-info .text-holder .tel-link:hover,
            .contact-page .contact-info .text-holder .email-link:hover,
            .contact-page .contact-info .text-holder .tel-link:focus,
            .contact-page .contact-info .text-holder .email-link:focus{
                color: <?php echo spa_and_salon_sanitize_hex_color( $secondary_color ); ?>;
            }

        <?php echo "</style>";  
    }
	   
    
    $image = '';
    if( $body_bg == 'image' && $bg_image ){
        $image = $bg_image;    
    }elseif( $body_bg == 'pattern' && $bg_pattern != 'nobg' ){
        $image = get_template_directory_uri() . '/images/patterns/' . $bg_pattern . '.png';
    }

    echo "<style type='text/css' media='all'>"; ?>
    
    body{
    	font-size: <?php echo absint( $body_font_size ); ?>px;
    	line-height: <?php echo absint( $body_line_ht ); ?>px;
    	color: <?php echo spa_and_salon_sanitize_hex_color( $body_color ); ?>;
    	font-family: <?php echo $body_fonts['font']; ?>;
        font-weight: <?php echo esc_attr( $body_fonts['weight'] ); ?>;
        font-style: <?php echo esc_attr( $body_fonts['style'] ); ?>;
        background: url(<?php echo esc_url( $image ); ?>) <?php echo spa_and_salon_sanitize_hex_color( $bg_color ); ?>;
    }
    
    .site-branding .site-title{
        font-size: <?php echo absint( $site_title_font_size ); ?>px;
        font-family: <?php echo $site_title_fonts['font']; ?>;
        font-weight: <?php echo esc_attr( $site_title_fonts['weight'] ); ?>;
        font-style: <?php echo esc_attr( $site_title_fonts['style'] ); ?>;
    }

    .boxed {
		max-width:1250px;
		margin:0px auto; 
	    box-shadow: 0 -5px 3px rgba(0, 0, 0, 0.5);
        background-color:#fff;
    }    

    
    /* Color Scheme Starts */
    
        a {
            color: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
        }
    
        a:hover,
        a:focus {
            color: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
            text-decoration: underline;
        }          
            
        .site-content #primary .entry-title a:hover{
            color: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
        }
        
        .social-block {
            background: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
        }        
        
        .promotional-block {
            background: <?php echo spa_and_salon_sanitize_hex_color( $secondary_color ) ?>;
        }        
        
        .promotional-block .col .text-holder .icon-holder {
            background: <?php echo spa_and_salon_sanitize_hex_color( $secondary_color ) ?>;
        }        
        
        .site-content #primary .read-more{
            background: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
            color: #fff;
        }
        
		.site-content #primary .read-more:after {
	        background: <?php echo spa_and_salon_sanitize_hex_color( $secondary_color ) ?>;
            color: #fff;
        }        
        
        .widget.widget_newsletter form input[type="submit"]{
            background: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
            color: #fff;
        }
        
        .widget.widget_search form input[type="submit"],
        .search-header form input[type="submit"],
        .error404 .not-found form input[type="submit"]{
            background-color:<?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
        }
        
        .widget.widget_text .read-more{
            color: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
        }
        
        .widget.widget_twitter ul li a{
            color: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
        }
        
        #secondary .widget_tag_cloud a:hover{
            background: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
            color: #fff;
        }
        
        .error404 .home,
        .error404 .previous{
            background: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
            color: #fff;
        }
        
        #primary .entry-content form input[type="submit"],
        #primary .entry-content form input[type="reset"]{
            background: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?> ;
            color: #fff;
        }
        
        .tag-links span a:hover,
        .cat-links span a:hover,
        .share-links span a:hover{
            background: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
            color: #fff;
        }
        
        .reply a{
            color: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
        }
        
        .comment-form form input[type="submit"]{
            color: #fff;
            background:<?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
        }
        
        #load-posts a{
            background:<?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
        }
                
        
        /* secondary color */                                   
        
		.main-navigation ul .current_page_item > a,
        .main-navigation ul .current-menu-item > a,
        .main-navigation ul .current_page_item > a,
        .main-navigation ul .current-menu-ancestor > a  {
            color: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;        
        }
        
        .main-navigation ul li a:hover,
        .main-navigation ul li a:focus,
        .main-navigation ul li:hover > a {
            color: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;                    
        }                    
        
        .btn-green {
	         background:<?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
        }
        
        .btn-green:hover,
        .btn-green:focus{
            background: <?php echo spa_and_salon_sanitize_hex_color( $secondary_color ) ?>;
        }
        
        .widget.widget_calendar table caption {
	        background: <?php echo spa_and_salon_sanitize_hex_color( $secondary_color ); ?>;          
        }
        
        #back-top a {
            background: <?php echo spa_and_salon_sanitize_hex_color( $secondary_color ) ?>;
            color: #1c1c1c;
        }
        
        .call-to-action {
            background: <?php echo spa_and_salon_sanitize_hex_color( $secondary_color ) ?>;
        }
        
        .call-to-action .content .view-details:hover{
            background: #fff;
            color: <?php echo spa_and_salon_sanitize_hex_color( $secondary_color ) ?>;
        }
        
        .subscribe{
            background: <?php echo spa_and_salon_sanitize_hex_color( $secondary_color ) ?>;
        }
        
        .breadcrumbs{
            background: <?php echo spa_and_salon_sanitize_hex_color( $secondary_color ) ?>;
        }                    
    
    /* Color Scheme Ends */

   
    /* blogpage post title with link *
    .blog .post .entry-header .entry-title a {
    	font-size: <?php echo absint( $post_title_font_size ); ?>px;
    	line-height: <?php echo absint( $post_title_line_ht ); ?>px;
    	color: <?php echo spa_and_salon_sanitize_hex_color( $post_title_color ); ?>;
    	font-family: <?php echo $post_title_fonts['font']; ?>;
        font-weight: <?php echo esc_attr( $post_title_fonts['weight'] ); ?>;
        font-style: <?php echo esc_attr( $post_title_fonts['style'] ); ?>;
    }
    
    .blog .post .entry-header .entry-title a:hover {    
    	color: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;    
    }

    
    /* single post title */
    #primary .post .entry-title
    {
    	font-size: <?php echo absint( $post_title_font_size ); ?>px;
    	line-height: <?php echo absint( $post_title_line_ht ); ?>px;
    	color: <?php echo spa_and_salon_sanitize_hex_color( $post_title_color ); ?>;
    	font-family: <?php echo $post_title_fonts['font']; ?>;
        font-weight: <?php echo esc_attr( $post_title_fonts['weight'] ); ?>;
        font-style: <?php echo esc_attr( $post_title_fonts['style'] ); ?>;
    }
    
    /* single page title */
    .page #primary .page .entry-title,
    .testimonial-page .heading .title,
    .our-team .heading .title,
    .plan-page .heading .title,
    .plan-page .col .text-holder .price,
    .services-page .heading .title,
    .contact-page .heading .title{
    	font-size: <?php echo absint( $page_title_font_size ); ?>px;
    	line-height: <?php echo absint( $page_title_line_ht ); ?>px;
    	color: <?php echo spa_and_salon_sanitize_hex_color( $page_title_color ); ?>;
    	font-family: <?php echo $page_title_fonts['font']; ?>;
        font-weight: <?php echo esc_attr( $page_title_fonts['weight'] ); ?>;
        font-style: <?php echo esc_attr( $page_title_fonts['style'] ); ?>;
    }    
    
    /* homepage meta and read-more */
    .post .category{
    	color: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
    }
    
    .post .category a:hover,
    .post .category a:focus{
    	color: <?php echo spa_and_salon_sanitize_hex_color( $body_color ); ?>;
    }
    
    /*WIDGET-AREA*/
	#secondary .widget .widget-title,
    #primary .widget-area .widget .widget-title{
	   color: <?php echo spa_and_salon_sanitize_hex_color( $secondary_color ); ?>;
	}
    
    #secondary .widget ul li a:hover{
    	color: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
    }
    
    #secondary .widget.widget_tag_cloud .tagcloud a:hover,
    #secondary .widget.widget_tag_cloud .tagcloud a:focus,
    .site-footer .widget.widget_tag_cloud a:hover,
    .site-footer .widget.widget_tag_cloud a:focus{
    	background: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
    }
    
    #secondary .widget.widget_spa_and_salon_recent_post .entry-header .entry-title a:hover,
    #secondary .widget.widget_spa_and_salon_recent_post .entry-header .entry-title a:focus,
    #secondary .widget.widget_spa_and_salon_author_post .entry-header .entry-title a:hover,
    #secondary .widget.widget_spa_and_salon_author_post .entry-header .entry-title a:focus,
    #secondary .widget.widget_spa_and_salon_category_post .entry-header .entry-title a:hover,
    #secondary .widget.widget_spa_and_salon_category_post .entry-header .entry-title a:focus,
    #secondary .widget.widget_spa_and_salon_popular_post .entry-header .entry-title a:hover,
    #secondary .widget.widget_spa_and_salon_popular_post .entry-header .entry-title a:focus,
    .widget.widget_spa_and_salon_recent_post .entry-header .entry-title a:hover,
    .widget.widget_spa_and_salon_recent_post .entry-header .entry-title a:focus,
    .widget.widget_spa_and_salon_author_post .entry-header .entry-title a:hover,
    .widget.widget_spa_and_salon_author_post .entry-header .entry-title a:focus,
    .widget.widget_spa_and_salon_category_post .entry-header .entry-title a:hover,
    .widget.widget_spa_and_salon_category_post .entry-header .entry-title a:focus,
    .widget.widget_spa_and_salon_popular_post .entry-header .entry-title a:hover,
    .widget.widget_spa_and_salon_popular_post .entry-header .entry-title a:focus,
    #secondary .widget.widget_spa_and_salon_recent_post .entry-header .entry-meta a,
    #secondary .widget.widget_spa_and_salon_author_post .entry-header .entry-meta a,
    #secondary .widget.widget_spa_and_salon_category_post .entry-header .entry-meta a,
    #secondary .widget.widget_spa_and_salon_popular_post .entry-header .entry-meta a,
    .widget.widget_spa_and_salon_recent_post .entry-header .entry-meta a,
    .widget.widget_spa_and_salon_author_post .entry-header .entry-meta a,
    .widget.widget_spa_and_salon_category_post .entry-header .entry-meta a,
    .widget.widget_spa_and_salon_popular_post .entry-header .entry-meta a,
    #primary .widget-area .widget.widget_spa_and_salon_recent_post .entry-header .entry-title a:hover,
    #primary .widget-area .widget.widget_spa_and_salon_popular_post .entry-header .entry-title a:hover,
    #primary .widget-area .widget.widget_spa_and_salon_author_post .entry-header .entry-title a:hover,
    #primary .widget-area .widget.widget_spa_and_salon_category_post .entry-header .entry-title a:hover,
    #primary .widget-area .widget.widget_spa_and_salon_recent_post .entry-header .entry-meta a,
    #primary .widget-area .widget.widget_spa_and_salon_popular_post .entry-header .entry-meta a,
    #primary .widget-area .widget.widget_spa_and_salon_author_post .entry-header .entry-meta a,
    #primary .widget-area .widget.widget_spa_and_salon_category_post .entry-header .entry-meta a,
    #primary .widget-area .widget ul li a:hover{
        color: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
    }
    
    #primary .widget-area .widget.widget_tag_cloud a:hover,
    .comment-form input[type="submit"]{
        background: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
    }
    
    .comment-form input[type="submit"]:hover{
        background: <?php echo spa_and_salon_sanitize_hex_color( $secondary_color ); ?>;
    }
    
    .page-header .page-title{
        color: <?php echo spa_and_salon_sanitize_hex_color( $secondary_color ); ?>;
    }
    
    .navigation.pagination .page-numbers.current,
    .navigation.pagination .page-numbers:hover{
    	background: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
	    border: 1px solid <?php echo 'rgba(' . $primary_rgb[0] . ', ' . $primary_rgb[1] . ', ' . $primary_rgb[2] . ', 0.8);'; ?>
        color: #fff;            
    }
    
    .site-footer .footer-b .social-networks li a:hover,
    .site-footer .footer-b .social-networks li a:focus{
    	color: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
    }
    
    .site-footer .site-info a:hover{
        color: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
    }
    
    .error404 .site-content .error-page span{
        color: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
    }
    
    .error404 .site-content .error-page ul li a{
        color: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
    }
    
    button,
    input[type="button"],
    input[type="reset"],
    input[type="submit"] {
    	background: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
    }

    /* H1 content */
	#primary .post .entry-content h1, 
    #primary .page .entry-content h1 
	{
        font-family: <?php echo $h1_fonts['font']; ?>;
        font-size: <?php echo absint( $h1_font_size ); ?>px;
        font-weight: <?php echo esc_attr( $h1_fonts['weight'] ); ?>;
        font-style: <?php echo esc_attr( $h1_fonts['style'] ); ?>;
        line-height: <?php echo absint( $h1_line_ht ); ?>px;
        color: <?php echo spa_and_salon_sanitize_hex_color( $h1_color ); ?>;
    }
    
    /* H2 content */
	#primary .post .entry-content h2, 
    #primary .page .entry-content h2 {
        font-family: <?php echo $h2_fonts['font']; ?>;
        font-size: <?php echo absint( $h2_font_size ); ?>px;
        font-weight: <?php echo esc_attr( $h2_fonts['weight'] ); ?>;
        font-style: <?php echo esc_attr( $h2_fonts['style'] ); ?>;
        line-height: <?php echo absint( $h2_line_ht ); ?>px;
        color: <?php echo spa_and_salon_sanitize_hex_color( $h2_color ); ?>;
    }
    
    /* H3 content */
	#primary .post .entry-content h3, 
    #primary .page .entry-content h3 {
        font-family: <?php echo $h3_fonts['font']; ?>;
        font-size: <?php echo absint( $h3_font_size ); ?>px;
        font-weight: <?php echo esc_attr( $h3_fonts['weight'] ); ?>;
        font-style: <?php echo esc_attr( $h3_fonts['style'] ); ?>;
        line-height: <?php echo absint( $h3_line_ht ); ?>px;
        color: <?php echo spa_and_salon_sanitize_hex_color( $h3_color ); ?>;
    }
    
    /* H4 content */
	#primary .post .entry-content h4, 
    #primary .page .entry-content h4{
        font-family: <?php echo $h4_fonts['font']; ?>;
        font-size: <?php echo absint( $h4_font_size ); ?>px;
        font-weight: <?php echo esc_attr( $h4_fonts['weight'] ); ?>;
        font-style: <?php echo esc_attr( $h4_fonts['style'] ); ?>;
        line-height: <?php echo absint( $h4_line_ht ); ?>px;
        color: <?php echo spa_and_salon_sanitize_hex_color( $h4_color ); ?>;
    }
    
    /* H5 content */
	#primary .post .entry-content h5, 
    #primary .page .entry-content h5 {
        font-family: <?php echo $h5_fonts['font']; ?>;
        font-size: <?php echo absint( $h5_font_size ); ?>px;
        font-weight: <?php echo esc_attr( $h5_fonts['weight'] ); ?>;
        font-style: <?php echo esc_attr( $h5_fonts['style'] ); ?>;
        line-height: <?php echo absint( $h5_line_ht ); ?>px;
        color: <?php echo spa_and_salon_sanitize_hex_color( $h5_color ); ?>;
    }
    
    /* H6 content */
	#primary .post .entry-content h6, 
    #primary .page .entry-content h6 {
        font-family: <?php echo $h6_fonts['font']; ?>;
        font-size: <?php echo absint( $h6_font_size ); ?>px;
        font-weight: <?php echo esc_attr( $h6_fonts['weight'] ); ?>;
        font-style: <?php echo esc_attr( $h6_fonts['style'] ); ?>;
        line-height: <?php echo absint( $h6_line_ht ); ?>px;
        color: <?php echo spa_and_salon_sanitize_hex_color( $h6_color ); ?>;
    }

    .single-post .tags a{
        color: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
    }
    
    .single-post .tags a:hover,
    .single-post .tags a:focus{
    	color: <?php echo spa_and_salon_sanitize_hex_color( $body_color ); ?>;
    }
    

    #load-posts a,
    .widget.widget_calendar table tbody td a{
        background: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
    }
    
    .contact .right form input[type="submit"]{
        background: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
    }
    
    .contact .right form input[type="submit"]:hover,
    .contact .right form input[type="submit"]:focus{
        background: <?php echo spa_and_salon_sanitize_hex_color( $secondary_color ); ?>;
    }
    
    .promotional-block .col .text-holder .title,
    .welcome-note .col .title,
    .services .header h2,
    .plan .header h2,
    .testimonial h2,
    .instagram .header h2<!-- ,
    .testimonial-page .heading .title,
    .our-team .heading .title,
    .plan-page .heading .title,
    .plan-page .col .text-holder .price,
    .services-page .heading .title -->{
        color: <?php echo spa_and_salon_sanitize_hex_color( $secondary_color ); ?>;
        font-family: <?php echo $post_title_fonts['font']; ?>;
    }
    
    .banner .banner-text .text .title,
    .services .col h3,
    .promotional-block2 .text h2,
    .testimonial #slider .holder .text-holder .name,
    .contact .right .header h2,
    .contact .left .address-holder .address .text .title,
    .contact .left .address-holder .working-hours .title,
    .our-team .team .text-holder .name,
    .plan-page .button-holder button,
    .services-page .col h3,
    .comments-title,
    .comment-reply-title{
        font-family: <?php echo $post_title_fonts['font']; ?>;
    }
    
    .services .col h3 a:hover,
    .services .col h3 a:focus,
    .services-page .col h3 a:hover,
    .services-page .col h3 a:focus{
        color: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
    }
    
    .comment-form input[type="submit"],
    button,
    input,
    select,
    textarea{
        font-family: <?php echo $body_fonts['font']; ?>;        
    }
    
    .plan-page .button-holder button{
        color: <?php echo spa_and_salon_sanitize_hex_color( $secondary_color ); ?>;
        opacity: 0.5;
    }
    
    .plan-page .button-holder button:hover,
    .plan-page .button-holder button:focus,
    .plan-page .button-holder .active,
    .plan-page .button-holder .is-checked{
        background: <?php echo spa_and_salon_sanitize_hex_color( $secondary_color ); ?>;
        opacity: 1;
    }
    
    .plan .col .text-holder .title a{
        color: <?php echo spa_and_salon_sanitize_hex_color( $body_color ); ?>; 
    }
    
    .plan .col .text-holder .title a:hover,
    .plan .col .text-holder .title a:focus{
        text-decoration: none;
        color: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
    }
    
    .search .search-form input[type="submit"]{
        background: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
    }
    
    .search .search-form input[type="submit"]:hover,
    .search .search-form input[type="submit"]:focus{
        background: <?php echo spa_and_salon_sanitize_hex_color( $secondary_color ); ?>;
    }
    
    #primary .similar-posts .post .text-holder .entry-title a:hover,
    #primary .similar-posts .post .text-holder .entry-title a:focus{
        color: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
    }
    
    .comment-list .reply a{
        color: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
    }
    
    .widget.widget_spa_and_salon_social_links ul li a,
    #secondary .widget.widget_spa_and_salon_social_links ul li a,
    #primary .widget-area .widget.widget_spa_and_salon_social_links ul li a{
        border: 1px solid <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
        color: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
    }
    
    .widget.widget_spa_and_salon_social_links ul li a:hover,
    #secondary .widget.widget_spa_and_salon_social_links ul li a:hover,
    .widget.widget_spa_and_salon_social_links ul li a:focus,
    #secondary .widget.widget_spa_and_salon_social_links ul li a:focus,
    #primary .widget-area .widget.widget_spa_and_salon_social_links ul li a:hover,
    #primary .widget-area .widget.widget_spa_and_salon_social_links ul li a:focus{
        background: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
        color: #fff;
    }
    
    #primary .post .entry-content .rara_accordian,
    #primary .page .entry-content .rara_accordian{
        border-color: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
    }
    
    #primary .post .entry-content .rara_accordian .rara_accordian_title,
    #primary .page .entry-content .rara_accordian .rara_accordian_title{
        background: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
    }
    
    #primary .entry-content .rara_call_to_action_button{
        background: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
    }
    
    #primary .entry-content .rara_call_to_action_button:hover,
    #primary .entry-content .rara_call_to_action_button:focus{
        background: <?php echo spa_and_salon_sanitize_hex_color( $secondary_color ); ?>;
    }
    
    #primary .entry-content .social-shortcode a{
        border-color: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
        color: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
    }
    
    #primary .entry-content .social-shortcode a:hover,
    #primary .entry-content .social-shortcode a:focus{
        background: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
        color: #fff;
    }
    
    #primary .entry-content .rara_tab_wrap .rara_tab_group .tab-title{
        border-color: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
    }
    
    #primary .entry-content .rara_tab_wrap .rara_tab_group .tab-title.active,
    #primary .entry-content .rara_tab_wrap .rara_tab_group .tab-title:hover,
    #primary .entry-content .rara_tab_wrap .rara_tab_group .tab-title:focus{
        background: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
    }
    
    .contact-page .contact-info .icon-holder,
    .contact-page .contact-info .text-holder .title{
        color: <?php echo spa_and_salon_sanitize_hex_color( $secondary_color ); ?>;
    }
    
    .contact-page .form-section form input[type="submit"]{
        background: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
    }
    
    .contact-page .form-section form input[type="submit"]:hover,
    .contact-page .form-section form input[type="submit"]:focus{
        background: <?php echo spa_and_salon_sanitize_hex_color( $secondary_color ); ?>;     
    }
    
    .promotional-block .col .img-holder .icon-holder{
        background: <?php echo spa_and_salon_sanitize_hex_color( $secondary_color ); ?>;
    }
    
    .promotional-block .col .text-holder .title a{
        color: <?php echo spa_and_salon_sanitize_hex_color( $secondary_color ); ?>;
    }
    
    .promotional-block .col .text-holder .title a:hover,
    .promotional-block .col .text-holder .title a:focus{
        text-decoration: none;
        color: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
    }

    .post .entry-meta span a:before{
        background-image: url('data:image/svg+xml; utf-8, <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="<?php echo spa_and_salon_hash_to_percent23( spa_and_salon_sanitize_hex_color( $primary_color ) ); ?>" d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm32 32h-64c-17.6 0-33.5 7.1-45.1 18.6 40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64zm-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32 208 82.1 208 144s50.1 112 112 112zm76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2zm-223.7-13.4C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z"></path></svg>');
    }

    .post .entry-meta .posted-on a:before{
        background-image: url('data:image/svg+xml; utf-8, <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="<?php echo spa_and_salon_hash_to_percent23( spa_and_salon_sanitize_hex_color( $primary_color ) ); ?>" d="M400 64h-48V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H160V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zm-6 400H54c-3.3 0-6-2.7-6-6V160h352v298c0 3.3-2.7 6-6 6z"></path></svg>');
    }

    .post .entry-meta .byline a:before{
        background-image: url('data:image/svg+xml; utf-8, <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="<?php echo spa_and_salon_hash_to_percent23( spa_and_salon_sanitize_hex_color( $primary_color ) ); ?>" d="M497.9 142.1l-46.1 46.1c-4.7 4.7-12.3 4.7-17 0l-111-111c-4.7-4.7-4.7-12.3 0-17l46.1-46.1c18.7-18.7 49.1-18.7 67.9 0l60.1 60.1c18.8 18.7 18.8 49.1 0 67.9zM284.2 99.8L21.6 362.4.4 483.9c-2.9 16.4 11.4 30.6 27.8 27.8l121.5-21.3 262.6-262.6c4.7-4.7 4.7-12.3 0-17l-111-111c-4.8-4.7-12.4-4.7-17.1 0zM124.1 339.9c-5.5-5.5-5.5-14.3 0-19.8l154-154c5.5-5.5 14.3-5.5 19.8 0s5.5 14.3 0 19.8l-154 154c-5.5 5.5-14.3 5.5-19.8 0zM88 424h48v36.3l-64.5 11.3-31.1-31.1L51.7 376H88v48z"></path></svg>')
    }

    .post .entry-meta .comments-link a:before{
        background-image: url('data:image/svg+xml; utf-8, <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="<?php echo spa_and_salon_hash_to_percent23( spa_and_salon_sanitize_hex_color( $primary_color ) ); ?>" d="M256 32C114.6 32 0 125.1 0 240c0 49.6 21.4 95 57 130.7C44.5 421.1 2.7 466 2.2 466.5c-2.2 2.3-2.8 5.7-1.5 8.7S4.8 480 8 480c66.3 0 116-31.8 140.6-51.4 32.7 12.3 69 19.4 107.4 19.4 141.4 0 256-93.1 256-208S397.4 32 256 32z"></path></svg>');
    }

    .comment-metadata a:before{
        background-image: url('data:image/svg+xml; utf-8, <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="<?php echo spa_and_salon_hash_to_percent23( spa_and_salon_sanitize_hex_color( $primary_color ) ); ?>" d="M400 64h-48V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H160V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zm-6 400H54c-3.3 0-6-2.7-6-6V160h352v298c0 3.3-2.7 6-6 6z"></path></svg>');
    }

    #primary .similar-posts .post .text-holder .posted-on a:before{
        background-image: url('data:image/svg+xml; utf-8, <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="<?php echo spa_and_salon_hash_to_percent23( spa_and_salon_sanitize_hex_color( $primary_color ) ); ?>" d="M400 64h-48V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H160V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zm-6 400H54c-3.3 0-6-2.7-6-6V160h352v298c0 3.3-2.7 6-6 6z"></path></svg>');
    }

    #primary .widget-area .widget.widget_spa_and_salon_recent_post .entry-header .entry-meta .posted-on a:before,
    #primary .widget-area .widget.widget_spa_and_salon_popular_post .entry-header .entry-meta .posted-on a:before,
    #primary .widget-area .widget.widget_spa_and_salon_author_post .entry-header .entry-meta .posted-on a:before,
    #primary .widget-area .widget.widget_spa_and_salon_category_post .entry-header .entry-meta .posted-on a:before{
        background-image: url('data:image/svg+xml; utf-8, <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="<?php echo spa_and_salon_hash_to_percent23( spa_and_salon_sanitize_hex_color( $primary_color ) ); ?>" d="M400 64h-48V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H160V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zm-6 400H54c-3.3 0-6-2.7-6-6V160h352v298c0 3.3-2.7 6-6 6z"></path></svg>');
    }

    #secondary .widget.widget_spa_and_salon_recent_post ul li .entry-header .entry-meta .posted-on a:before,
    #secondary .widget.widget_spa_and_salon_author_post ul li .entry-header .entry-meta .posted-on a:before,
    #secondary .widget.widget_spa_and_salon_category_post ul li .entry-header .entry-meta .posted-on a:before,
    #secondary .widget.widget_spa_and_salon_popular_post ul li .entry-header .entry-meta .posted-on a:before,
    .widget.widget_spa_and_salon_recent_post ul li .entry-header .entry-meta .posted-on a:before,
    .widget.widget_spa_and_salon_author_post ul li .entry-header .entry-meta .posted-on a:before,
    .widget.widget_spa_and_salon_category_post ul li .entry-header .entry-meta .posted-on a:before,
    .widget.widget_spa_and_salon_popular_post ul li .entry-header .entry-meta .posted-on a:before{
    background-image: url('data:image/svg+xml; utf-8, <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="<?php echo spa_and_salon_hash_to_percent23( spa_and_salon_sanitize_hex_color( $primary_color ) ); ?>" d="M400 64h-48V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H160V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zm-6 400H54c-3.3 0-6-2.7-6-6V160h352v298c0 3.3-2.7 6-6 6z"></path></svg>');
}

    
    <?php if( $ed_auth_comment ){ ?>
    .comments-area .bypostauthor > .comment-body{
            border: 2px solid #ccc;
            border-radius: 5px;
            padding: 15px 15px 0;
        }
    <?php } ?>
    
    <?php if( is_woocommerce_activated() ) { ?>
    /* Wooo Commerce Style */
    .woocommerce .page-title,
    .woocommerce ul.products li.product h3,
    .woocommerce .product .product_title{
        font-family: <?php echo $post_title_fonts['font']; ?>;
    }
    
    .woocommerce ul.products li.product a{color: <?php echo spa_and_salon_sanitize_hex_color( $body_color ); ?>;}

    .woocommerce ul.products li.product .price{color: <?php echo spa_and_salon_sanitize_hex_color( $body_color ); ?>;}

    .woocommerce div.product form.cart .button{
        background: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
    }

    .woocommerce ul.products li.product .onsale,
    .woocommerce ul.products li.product .button:hover,
    .woocommerce ul.products li.product .button:focus,
    .woocommerce .woocommerce-pagination .page-numbers li .current,
    .woocommerce .woocommerce-pagination .page-numbers li a:hover,
    .woocommerce .woocommerce-pagination .page-numbers li a:focus,
    .woocommerce span.onsale,
    .woocommerce div.product form.cart .button:hover,
    .woocommerce div.product form.cart .button:focus,
    .woocommerce #review_form #respond .form-submit input[type="submit"]:hover,
    .woocommerce #review_form #respond .form-submit input[type="submit"]:focus,
    .woocommerce .place-order input[type="submit"]:hover,
    .woocommerce .place-order input[type="submit"]:focus,
    .woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover,
    .woocommerce-cart .wc-proceed-to-checkout a.checkout-button:focus,
    .woocommerce form.login input[type="submit"]:hover,
    .woocommerce form.login input[type="submit"]:focus,
    .woocommerce a.added_to_cart:hover,
    .woocommerce a.added_to_cart:focus{
    	background: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
        option: 0.8;
    }
    
    .woocommerce ul.products li.product .price,
    .woocommerce ul.products li.product .button,
    .woocommerce span.onsale,
    .woocommerce div.product .product_title,
    .woocommerce .related h2,
    .woocommerce div.product form.cart .button,
    .product_meta,
    .woocommerce div.product .woocommerce-tabs ul.tabs,
    .woocommerce div.product .woocommerce-tabs .panel h2,
    .woocommerce #review_form #respond .form-submit input[type="submit"],
    .woocommerce form .form-row label, .woocommerce-page form .form-row label,
    .woocommerce table.shop_table thead th,
    .woocommerce table.shop_table td,
    .woocommerce-checkout #payment ul.payment_methods li label,
    .woocommerce .place-order input[type="submit"],
    .woocommerce .shop_table .product-name a,
    .woocommerce-cart table.cart td.actions .coupon .input-text,
    .woocommerce .shop_table .actions .button,
    .woocommerce .cart_totals h2,
    .woocommerce-cart .wc-proceed-to-checkout a.checkout-button,
    .woocommerce .woocommerce-error .button,
    .woocommerce .woocommerce-info .button,
    .woocommerce .woocommerce-message .button,
    .woocommerce form.login input[type="submit"],
    .woocommerce a.added_to_cart{
    	font-family: <?php echo $body_fonts['font']; ?>;
    }
    
    .woocommerce ul.products li.product .button,
    .woocommerce div.product .product_title,
    .woocommerce .related h2,
    .woocommerce div.product .woocommerce-tabs ul.tabs li a,
    .woocommerce div.product .woocommerce-tabs .panel h2,
    .woocommerce #review_form #respond .form-submit input[type="submit"],
    .woocommerce form .form-row label, .woocommerce-page form .form-row label,
    .woocommerce table.shop_table td,
    .woocommerce table.shop_table .amount,
    .woocommerce-checkout #payment ul.payment_methods li label,
    .woocommerce .place-order input[type="submit"],
    .woocommerce .shop_table .product-name a,
    .woocommerce-cart .wc-proceed-to-checkout a.checkout-button,
    .woocommerce .woocommerce-error .button,
    .woocommerce .woocommerce-info .button,
    .woocommerce .woocommerce-message .button,
    .woocommerce form.login input[type="submit"],
    .woocommerce a.added_to_cart{
    	color: <?php echo spa_and_salon_sanitize_hex_color( $body_color ); ?>;
    }

    .woocommerce .woocommerce-info .button:hover,
    .woocommerce .woocommerce-message .button:hover,
    .woocommerce .woocommerce-info .button:focus,
    .woocommerce .woocommerce-message .button:focus{
        background: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
    }

    .woocommerce .shop_table .actions .button,
    .woocommerce-cart .wc-proceed-to-checkout a.checkout-button{
        background: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
        color: #fff;
    }

    #place_order{background: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;}

    
    .woocommerce .shop_table .product-name a:hover{
    	color: <?php echo spa_and_salon_sanitize_hex_color( $primary_color ); ?>;
    }
    
    
    .woocommerce div.product .product_title,
    .woocommerce .related h2,
    .woocommerce div.product .woocommerce-tabs .panel h2{
        font-family: <?php echo $post_title_fonts['font']; ?>;
    }

    <?php } ?>

    @media only screen and (max-width: 991px)
    {
        .mean-container .mean-bar {
            background: <?php echo spa_and_salon_sanitize_hex_color( $secondary_color ); ?>;
        }
    }
        

    <?php echo "</style>";  
}
add_action( 'wp_head', 'spa_and_salon_dynamic_css_cb', 100 );

/**
 * Function for sanitizing Hex color 
 */
function spa_and_salon_sanitize_hex_color( $color ){
	if ( '' === $color )
		return '';

    // 3 or 6 hex digits, or the empty string.
	if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) )	
		return $color;
}

/**
 * Convert '#' to '%23'
*/
function spa_and_salon_hash_to_percent23( $color_code ){
    $color_code = str_replace( "#", "%23", $color_code );
    return $color_code;
}
