// Product Specification Unit Toggle JS
jQuery(document).ready(function() {

    jQuery('#unit-toggle label').on('click', function(){
        let unit = jQuery(this).data('unit');
        let productDim = jQuery('td.productDim').toArray();

        productDim.forEach(element => {
            let value = jQuery(element).data(unit);
            jQuery(element).text(value);
        });

    });
    
});