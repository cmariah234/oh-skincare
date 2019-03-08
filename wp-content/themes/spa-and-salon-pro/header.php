<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Spa_and_Salon
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head itemscope itemtype="http://schema.org/WebSite">
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
<?php do_action( 'spa_and_salon_fb_page_box' ); ?>
<?php if (get_theme_mod( 'spa_and_salon_layout_boxer', 'full-width' ) == 'boxed') { $boxclass =  "boxed"; } else { $boxclass =  ""; } ?>
<div id="page" class="site <?php echo $boxclass; ?>">
	<header id="masthead" class="site-header <?php if( !is_page_template( 'template-home.php' ) ) { echo 'header-inner'; }  ?>" role="banner" itemscope itemtype="http://schema.org/WPHeader">
		<div class="container">

			<?php 
				$phone_on_header  = get_theme_mod( 'spa_and_salon_contact_phone_on_header', '1' );
				$spa_and_salon_ph = get_theme_mod( 'spa_and_salon_contact_phone', esc_html__( '01-234566789', 'spa-and-salon-pro' ) );
				$social_links     = get_theme_mod( 'spa_and_salon_ed_social_header' );

				$class = '';
				if( ! ( $phone_on_header && $spa_and_salon_ph ) && ! $social_links ){
					$class = ' hide-header-t';
				}

				if( ( $phone_on_header && $spa_and_salon_ph ) || $social_links ){ ?>
					<div class="header-t">
						<?php
						if($social_links){
							do_action( 'spa_and_salon_social_link' ); 
						} 
						if( $phone_on_header && $spa_and_salon_ph ){ ?>
		      				<a href="tel:<?php echo esc_attr( $spa_and_salon_ph ); ?>" class="tel-link">
		      				<span class="fa fa-phone"></span>
		      				<?php echo esc_html( $spa_and_salon_ph ); ?></a>
		     			<?php } ?>
					</div>
				<?php } ?>
			<div class="header-b<?php echo $class; ?>">
				<div class="site-branding" itemscope itemtype="http://schema.org/Organization">
					<?php 
				         if( function_exists( 'has_custom_logo' ) && has_custom_logo() ){
                            	the_custom_logo();
                       	 } 
                    ?>
                	<?php if ( is_front_page() ) : ?>
                        <h1 class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php else : ?>
                        <p class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                    <?php endif;
					 $description = get_bloginfo( 'description', 'display' );
					 if ( $description || is_customize_preview() ) : ?>
						<p class="site-description" itemprop="description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
				<?php
					endif; ?>
				</div> <!-- .site-branding -->
		
				<nav class="main-navigation" id="site-navigation"  role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
				</nav><!-- #site-navigation -->
				
			</div>
		</div>
	</header><!-- #masthead -->
	<?php 
	$template_header = get_page_template_slug( get_the_ID() );
	
	if (in_array ($template_header, array('template-home.php') )  || is_404() ){
	}	
	else {
		$spa_and_salon_ed_breadcrumbs = get_theme_mod('spa_and_salon_ed_breadcrumb', '0');
			if($spa_and_salon_ed_breadcrumbs) {	?>
			
				<div class="breadcrumbs">
				<div class="container">
					<?php do_action( 'spa_and_salon_breadcrumbs' ); ?>
				</div>
				</div>    
	<?php                
			}
			
	}
	?>    
	<?php 

	if (in_array ($template_header, array('template-home.php','template-services.php','template-team.php','template-plans.php','template-testimonial.php','template-contact.php') ) ){
	}
	else {
	  		echo '<div class="wrapper">';
			echo '<div class="container">';
			echo '<div id="content" class="site-content">';	  
			echo '<div class="row">';
}