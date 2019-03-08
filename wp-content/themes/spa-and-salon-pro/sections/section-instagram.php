<?php
/**
 * Instagram Gallery Section
 * 
 * @package Spa_and_Salon
 */

$spa_and_salon_insta_username = get_theme_mod( 'spa_and_salon_instagram_username' ); 
$spa_and_salon_insta_title = get_theme_mod( 'spa_and_salon_instagram_title' ); 
$spa_and_salon_insta_desc = get_theme_mod( 'spa_and_salon_instagram_desc', __('Follow us on Instagram', 'spa-and-salon-pro') ); 
?>
<section class="instagram" id="instagram-section">
		<div class="container">
			<header class="header">
				<?php if ($spa_and_salon_insta_title) { ?>
					<h2><?php echo esc_html($spa_and_salon_insta_title); ?></h2>
				<?php } ?>                                    
				<p><?php echo wpautop(esc_html($spa_and_salon_insta_desc)); ?></p>
			</header>
		</div>
		<ul>
		<?php		
		if ($spa_and_salon_insta_username) {
	        $results_array = spa_and_salon_scrape_insta_home($spa_and_salon_insta_username);
	        for( $cnt=0; $cnt < 10; $cnt++ ) {
	       	 $latest_array = $results_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'][$cnt]; 
				$shortcode_key = $latest_array['node']['shortcode'];
				$instagram_url = 'http://instagram.com/p/'.$shortcode_key.'/?taken-by='.$spa_and_salon_insta_username;
				$thumbnail     = $latest_array['node']['thumbnail_src'];
	        ?>
	        <li><a href="<?php echo esc_html( $instagram_url ); ?>"><img src="<?php echo esc_url( $thumbnail ); ?>"></a></li>
	        <?php  
			} 
		} //endif
		?>
	</ul>
</section>