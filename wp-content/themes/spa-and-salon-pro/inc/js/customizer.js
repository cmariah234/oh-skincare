jQuery(document).ready(function($) {
	/* Move widgets to their respective sections */
    wp.customize.panel( 'spa_and_salon_home_options', function( section ) {
        section.expanded.bind( function( isExpanded ) {
            if ( isExpanded ) {
                wp.customize.previewer.previewUrl.set( spa_and_salon_pro_customizer_data.frontpage  );
            }
        } );
    } );
    
    // Scroll to Home section starts
    $('body').on('click', '#sub-accordion-panel-spa_and_salon_home_options .control-subsection .accordion-section-title', function(event) {
        var section_id = $(this).parent('.control-subsection').attr('id');
        scrollToSection( section_id );
    });

    });

    function scrollToSection( section_id ){
        var preview_section_id = "banner";

        var $contents = jQuery('#customize-preview iframe').contents();

        switch ( section_id ) {
            
            case 'accordion-section-spa_and_salon_header_featured_section':
            preview_section_id = "promotional-section";
            break;

            case 'accordion-section-spa_and_salon_about_section':
            preview_section_id = "welcome-note";
            break;
            
            case 'accordion-section-spa_and_salon_services_section':
            preview_section_id = "services";
            break;

            case 'accordion-section-spa_and_salon_homepage_cta':
            preview_section_id = "cta";
            break;  

            case 'accordion-section-spa_and_salon_plans_section':
            preview_section_id = "plan";
            break;

            case 'accordion-section-spa_and_salon_testimonials_section':
            preview_section_id = "testimonial";
            break;

            case 'accordion-section-spa_and_salon_homepage_instagram':
            preview_section_id = "instagram-section";
            break;
        }

        if( $contents.find('#'+preview_section_id).length > 0 && $contents.find('.home').length > 0 ){
            $contents.find("html, body").animate({
            scrollTop: $contents.find( "#" + preview_section_id ).offset().top
            }, 1000);
        }
}