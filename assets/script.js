jQuery(document).ready(function() {
    jQuery('.tax-arrow').click(function() {
    	
    	if( jQuery(this).closest('.taxonomy-list-item').hasClass('active') ) {
    		jQuery(this).closest('.taxonomy-list-item').find('.tax-child-list-item').fadeOut();
    		jQuery(this).closest('.taxonomy-list-item').find('i.fas').addClass('fa-angle-right');
    		jQuery(this).closest('.taxonomy-list-item').find('i.fas').removeClass('fa-angle-down');
    		jQuery(this).closest('.taxonomy-list-item').removeClass('active');
    	} else {
    		jQuery(this).closest('.taxonomy-list-item').find('.tax-child-list-item').fadeIn();
    		jQuery(this).closest('.taxonomy-list-item').find('i.fas').removeClass('fa-angle-right');
    		jQuery(this).closest('.taxonomy-list-item').find('i.fas').addClass('fa-angle-down');
    		jQuery(this).closest('.taxonomy-list-item').addClass('active');
        }
    });
});