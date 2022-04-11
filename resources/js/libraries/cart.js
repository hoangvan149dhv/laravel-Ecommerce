const flyCart = (productId) => {
    let image = jQuery(`.single_product_item_${productId} img`),
        offsetImgParent = image.parent().offset(),
        offsetIconCart = jQuery('.main_menu .cart i span').offset();
    image.clone().offset({
        top: offsetImgParent.top,
        left: offsetImgParent.left
    }).css({
        'opacity': '0.5',
        'position': 'absolute',
        'width': '150px',
        'z-index': '1001'
    }).appendTo(jQuery('body')).animate({
        top: offsetIconCart.top,
        left: offsetIconCart.left,
        height: "50px",
        width: "50px"
    }, 1200, function(){
        jQuery(this).remove()
    });
}

export { flyCart };
