<?php
//
//add_action( 'after_setup_theme', 'woocommerce_support' );
//function woocommerce_support() {
//    add_theme_support( 'woocommerce' );
//}
//add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
//
//
//
//
//
//add_action( 'woocommerce_after_quantity_input_field', 'bbloomer_display_quantity_plus' );
//
//function bbloomer_display_quantity_plus() {
//    echo '<button type="button" class="plus">+</button>';
//}
//
//add_action( 'woocommerce_before_quantity_input_field', 'bbloomer_display_quantity_minus' );
//
//function bbloomer_display_quantity_minus() {
//    echo '<button type="button" class="minus">-</button>';
//}
//
//add_action( 'wp_footer', 'bbloomer_add_cart_quantity_plus_minus' );
//
//function bbloomer_add_cart_quantity_plus_minus() {
//
//    if ( ! is_product() && ! is_cart() ) return;
//
//    wc_enqueue_js( "
//
//      $(document).on( 'click', 'button.plus, button.minus', function() {
//
//         var qty = $( this ).parent( '.quantity' ).find( '.qty' );
//         var val = parseFloat(qty.val());
//         var max = parseFloat(qty.attr( 'max' ));
//         var min = parseFloat(qty.attr( 'min' ));
//         var step = parseFloat(qty.attr( 'step' ));
//
//         if ( $( this ).is( '.plus' ) ) {
//            if ( max && ( max <= val ) ) {
//               qty.val( max ).change();
//            } else {
//               qty.val( val + step ).change();
//            }
//         } else {
//            if ( min && ( min >= val ) ) {
//               qty.val( min ).change();
//            } else if ( val > 1 ) {
//               qty.val( val - step ).change();
//            }
//         }
//
//      });
//
//   " );
//}
//
//
//
//add_action('wp_head', 'ajaxurl');
//function ajaxurl() {
//    echo '<script type="text/javascript">
//           var ajaxUrl = "' . admin_url('admin-ajax.php') . '";
//        </script>';
//}
//
//add_action( 'wp_ajax_add_to_cart', 'add_to_cart' );
//add_action( 'wp_ajax_nopriv_add_to_cart', 'add_to_cart' );
//function add_to_cart(){
//
//    $product_id = $_POST['product_id'];
//    $min_qty = intval($_POST['min_qty']);
//
//    $add = WC()->cart->add_to_cart( $product_id, $min_qty );
//
//    if($add){
//        echo get_the_title( $product_id );
//    }else{
//        echo '0';
//    }
//
//    die();
//}
//
//
//
//
//
//
//
//function woocommerce_order_review( $deprecated = false ) {
//    wc_get_template(
//        'checkout/review-order.php',
//        array(
//            'checkout' => WC()->checkout(),
//        )
//    );
//}
//
//
//
//function woocommerce_checkout_payment() {
//    if ( WC()->cart->needs_payment() ) {
//        $available_gateways = WC()->payment_gateways()->get_available_payment_gateways();
//        WC()->payment_gateways()->set_current_gateway( $available_gateways );
//    } else {
//        $available_gateways = array();
//    }
//
//    wc_get_template(
//        'checkout/payment.php',
//        array(
//            'checkout'           => WC()->checkout(),
//            'available_gateways' => $available_gateways,
//            'order_button_text'  => apply_filters( 'woocommerce_order_button_text', __( 'Place order', 'woocommerce' ) ),
//        )
//    );
//}
//
//
//
//
//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
//
//
//
//function tishonator_woo_variations_limit( $limit ) {
//    $limit = 1000;
//    return $limit;
//}
//add_filter( 'woocommerce_rest_batch_items_limit', 'tishonator_woo_variations_limit' );
//
//add_filter('woocommerce_reset_variations_link', '__return_empty_string');
//
//
//
//
//
//// Remove the additional information tab
//function quadlayers_remove_product_tabs( $tabs ) {
//    unset( $tabs['additional_information'] );
//    return $tabs;
//}
//add_filter( 'woocommerce_product_tabs', 'quadlayers_remove_product_tabs', 98 );
//
