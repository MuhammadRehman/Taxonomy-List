jQuery(document).ready(function() {
    jQuery('.tax-arrow').click(function() {
    	
    	if( jQuery(this).closest('.taxonomy-list-item').hasClass('active') ) {
    		jQuery(this).closest('.taxonomy-list-item').find('.tax-child-list-item').fadeOut();
    		jQuery(this).closest('.taxonomy-list-item').find('div.tax-arrow').addClass('rotate');
    		jQuery(this).closest('.taxonomy-list-item').find('div.tax-arrow').removeClass('rotate');
    		jQuery(this).closest('.taxonomy-list-item').removeClass('active');
    	} else {
    		jQuery(this).closest('.taxonomy-list-item').find('.tax-child-list-item').fadeIn();
    		jQuery(this).closest('.taxonomy-list-item').find('div.tax-arrow').removeClass('rotate');
    		jQuery(this).closest('.taxonomy-list-item').find('div.tax-arrow').addClass('rotate');
    		jQuery(this).closest('.taxonomy-list-item').addClass('active');
        }
	});
	
	jQuery("#tax-search-filter").on("keyup", function() {
		var value = jQuery(this).val().toLowerCase();
		if( value != '' ) {
			jQuery('.taxonomy-list-item').hide()
			.filter('[data-taxname*="'+value+'"]')
			.show(); // show the filtered elements
		} else {
			jQuery('.taxonomy-list-item').show();
		}
	});
});