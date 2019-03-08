jQuery(function($){
  'use strict';
        $('body').on('click','.rara-upload-button',function(e) {
            e.preventDefault();
            var clicked = $(this).closest('div');
            var custom_uploader = wp.media({
                title: 'RARA Image Uploader',
                // button: {
                //     text: 'Custom Button Text',
                // },
                multiple: false  // Set this to true to allow multiple files to be selected
                })
            .on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                var str = attachment.url.split('.').pop(); 
                var strarray = [ 'jpg', 'gif', 'png', 'jpeg' ]; 
                if( $.inArray( str, strarray ) != -1 ){
                    clicked.find('.rara-screenshot').empty().hide().append('<img src="' + attachment.url + '"><a class="rara-remove-image"></a>').slideDown('fast');
                }else{
                    clicked.find('.rara-screenshot').empty().hide().append('<small>'+spa_and_salon_uploader.msg+'</small>').slideDown('fast');    
                }
                
                clicked.find('.rara-upload').val(attachment.url).trigger('change');
                clicked.find('.rara-upload-button').val(spa_and_salon_uploader.change);
            }) 
            .open();
        });

        $('body').on('click','.rara-remove-image',function(e) {
            
            var selector = $(this).parent('div').parent('div');
            selector.find('.rara-upload').val('').trigger('change');
            selector.find('.rara-remove-image').hide();
            selector.find('.rara-screenshot').slideUp();
            selector.find('.rara-upload-button').val(spa_and_salon_uploader.upload);
            
            return false;
        });
  
});