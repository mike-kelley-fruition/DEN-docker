<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;



/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
//do_action( 'woocommerce_before_main_content' );

?>

<div class="productArchiveHero">
    <div class="container">
        <div class="grid">
            <div class="col-sm-6">
                <h1>Hale Pet Door Products</h1>
                <p>Lorem ipsum dolor sit amet consectetur. Posuere blandit sit malesuada posuere amet consectetur phasellus.</p>
            </div>
        </div>
    </div>
</div>

<div class="productArchiveFluid">
<div class="container">
    <div class="grid">

        <div class="col-sm-3">
            <h2>SideBar Here</h2>
        </div>


        <div class="col-sm-9">


            <?php
if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' );

	woocommerce_product_loop_start();

    $count = 1;

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
            if($count == 3){
                get_template_part('woocommerce/archivecoupon');
            }else {
                the_post();
                do_action('woocommerce_shop_loop');
                wc_get_template_part('content', 'product');
            }
            $count++;
        }
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );
?>

    </div>
</div>

</div>

