<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
//echo "<pre>";
//print_r($product);
//echo "</pre>";
?>
<div class="container" id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

    <div class="grid">
        <div class="col-sm-12">
            <?php
            /**
             * woocommerce_before_main_content hook.
             *
             * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
             * @hooked woocommerce_breadcrumb - 20
             */
            //do_action( 'woocommerce_before_main_content' );
            ?>
            <?php if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
            } ?>
        </div>
        <div class="col-sm-6">
            <?php
            $attachment_ids  = $product->get_gallery_image_ids();
            $image_urls      = array();
            $image_id        = $product->get_image_id();
            if ( $image_id ) {
                $image_url = wp_get_attachment_image_url( $image_id, 'full' );

                $image_urls[ 0 ] = $image_url;
            }

            foreach ( $attachment_ids as $attachment_id ) {
                $image_urls[] = wp_get_attachment_url( $attachment_id );
            } ?>

            <div class="sliderProduct">
            <?php foreach ( $image_urls as $image_src_url ) {
                echo '<img class="flex-img" src="' . $image_src_url . '">';
            }
            ?>
            </div>

            <div class="slider-nav">
                <?php foreach ( $image_urls as $image_src_url ) { ?>
                        <div>
                            <div class="sliderThumb" style="background-image:url('<?php echo $image_src_url; ?>');"></div>
                        </div>
                <?php } ?>
            </div>

        </div>
        <div class="col-sm-6">

            <?php do_action( 'woocommerce_before_single_product' ); ?>

            <?php
            /**
             * Hook: woocommerce_single_product_summary.
             *
             * @hooked woocommerce_template_single_title - 5
             * @hooked woocommerce_template_single_rating - 10
             * @hooked woocommerce_template_single_price - 10
             * @hooked woocommerce_template_single_excerpt - 20
             * @hooked woocommerce_template_single_add_to_cart - 30
             * @hooked woocommerce_template_single_meta - 40
             * @hooked woocommerce_template_single_sharing - 50
             * @hooked WC_Structured_Data::generate_product_data() - 60
             */
            do_action( 'woocommerce_single_product_summary' );
            ?>
            <?php
            /**
             * Hook: woocommerce_after_single_product_summary.
             *
             * @hooked woocommerce_output_product_data_tabs - 10
             * @hooked woocommerce_upsell_display - 15
             * @hooked woocommerce_output_related_products - 20
             */
            //do_action( 'woocommerce_after_single_product_summary' );
            ?>
            <?php do_action( 'woocommerce_after_single_product' ); ?>


        </div>
    </div>
</div>




<div class="container">
    <div class="grid">
        <div class="col-sm-12">


            <div class="beefup openProduct">
                <p class="beefup__head">Description</p>
                <div class="beefup__body maincopy" role="region" hidden="hidden" style="display: none;">
                    <p>Give your dog or cat the freedom to come and go as they please with Hale Pet Door. Our door pet doors are a perfect fit for any type of door, any size of pet, and provide the quality and expertise that you would expect from a top pet door company. Our door dog doors and door cat doors are designed to be easy to install and work great in any type of door in your house.
                        Whether you’re looking for a dog or a cat door for any door in your home, Hale Pet Door has a door model pet door that will work great for you.</p>
                    <p>Give your dog or cat the freedom to come and go as they please with Hale Pet Door. Our door pet doors are a perfect fit for any type of door, any size of pet, and provide the quality and expertise that you would expect from a top pet door company. Our door dog doors and door cat doors are designed to be easy to install and work great in any type of door in your house.
                        Whether you’re looking for a dog or a cat door for any door in your home, Hale Pet Door has a door model pet door that will work great for you.</p>
                    <p>Give your dog or cat the freedom to come and go as they please with Hale Pet Door. Our door pet doors are a perfect fit for any type of door, any size of pet, and provide the quality and expertise that you would expect from a top pet door company. Our door dog doors and door cat doors are designed to be easy to install and work great in any type of door in your house.
                        Whether you’re looking for a dog or a cat door for any door in your home, Hale Pet Door has a door model pet door that will work great for you.</p>
                </div>
            </div>

            <div class="beefup openProduct">
                <p class="beefup__head">Video</p>
                <div class="beefup__body maincopy" role="region" hidden="hidden" style="display: none;">
                    <p>Give your dog or cat the freedom to come and go as they please with Hale Pet Door. Our door pet doors are a perfect fit for any type of door, any size of pet, and provide the quality and expertise that you would expect from a top pet door company. Our door dog doors and door cat doors are designed to be easy to install and work great in any type of door in your house.
                        Whether you’re looking for a dog or a cat door for any door in your home, Hale Pet Door has a door model pet door that will work great for you.</p>
                    <p>Give your dog or cat the freedom to come and go as they please with Hale Pet Door. Our door pet doors are a perfect fit for any type of door, any size of pet, and provide the quality and expertise that you would expect from a top pet door company. Our door dog doors and door cat doors are designed to be easy to install and work great in any type of door in your house.
                        Whether you’re looking for a dog or a cat door for any door in your home, Hale Pet Door has a door model pet door that will work great for you.</p>
                    <p>Give your dog or cat the freedom to come and go as they please with Hale Pet Door. Our door pet doors are a perfect fit for any type of door, any size of pet, and provide the quality and expertise that you would expect from a top pet door company. Our door dog doors and door cat doors are designed to be easy to install and work great in any type of door in your house.
                        Whether you’re looking for a dog or a cat door for any door in your home, Hale Pet Door has a door model pet door that will work great for you.</p>
                </div>
            </div>

            <div class="beefup openProduct">
                <p class="beefup__head">Sizing</p>
                <div class="beefup__body maincopy" role="region" hidden="hidden" style="display: none;">
                    <p>Give your dog or cat the freedom to come and go as they please with Hale Pet Door. Our door pet doors are a perfect fit for any type of door, any size of pet, and provide the quality and expertise that you would expect from a top pet door company. Our door dog doors and door cat doors are designed to be easy to install and work great in any type of door in your house.
                        Whether you’re looking for a dog or a cat door for any door in your home, Hale Pet Door has a door model pet door that will work great for you.</p>
                    <p>Give your dog or cat the freedom to come and go as they please with Hale Pet Door. Our door pet doors are a perfect fit for any type of door, any size of pet, and provide the quality and expertise that you would expect from a top pet door company. Our door dog doors and door cat doors are designed to be easy to install and work great in any type of door in your house.
                        Whether you’re looking for a dog or a cat door for any door in your home, Hale Pet Door has a door model pet door that will work great for you.</p>
                    <p>Give your dog or cat the freedom to come and go as they please with Hale Pet Door. Our door pet doors are a perfect fit for any type of door, any size of pet, and provide the quality and expertise that you would expect from a top pet door company. Our door dog doors and door cat doors are designed to be easy to install and work great in any type of door in your house.
                        Whether you’re looking for a dog or a cat door for any door in your home, Hale Pet Door has a door model pet door that will work great for you.</p>
                </div>
            </div>

            <div class="beefup openProduct">
                <p class="beefup__head">Installation</p>
                <div class="beefup__body maincopy" role="region" hidden="hidden" style="display: none;">
                    <p>Give your dog or cat the freedom to come and go as they please with Hale Pet Door. Our door pet doors are a perfect fit for any type of door, any size of pet, and provide the quality and expertise that you would expect from a top pet door company. Our door dog doors and door cat doors are designed to be easy to install and work great in any type of door in your house.
                        Whether you’re looking for a dog or a cat door for any door in your home, Hale Pet Door has a door model pet door that will work great for you.</p>
                    <p>Give your dog or cat the freedom to come and go as they please with Hale Pet Door. Our door pet doors are a perfect fit for any type of door, any size of pet, and provide the quality and expertise that you would expect from a top pet door company. Our door dog doors and door cat doors are designed to be easy to install and work great in any type of door in your house.
                        Whether you’re looking for a dog or a cat door for any door in your home, Hale Pet Door has a door model pet door that will work great for you.</p>
                    <p>Give your dog or cat the freedom to come and go as they please with Hale Pet Door. Our door pet doors are a perfect fit for any type of door, any size of pet, and provide the quality and expertise that you would expect from a top pet door company. Our door dog doors and door cat doors are designed to be easy to install and work great in any type of door in your house.
                        Whether you’re looking for a dog or a cat door for any door in your home, Hale Pet Door has a door model pet door that will work great for you.</p>
                </div>
            </div>

            <div class="beefup openProduct">
                <p class="beefup__head">Tech Specs</p>
                <div class="beefup__body maincopy" role="region" hidden="hidden" style="display: none;">
                    <p>Give your dog or cat the freedom to come and go as they please with Hale Pet Door. Our door pet doors are a perfect fit for any type of door, any size of pet, and provide the quality and expertise that you would expect from a top pet door company. Our door dog doors and door cat doors are designed to be easy to install and work great in any type of door in your house.
                        Whether you’re looking for a dog or a cat door for any door in your home, Hale Pet Door has a door model pet door that will work great for you.</p>
                    <p>Give your dog or cat the freedom to come and go as they please with Hale Pet Door. Our door pet doors are a perfect fit for any type of door, any size of pet, and provide the quality and expertise that you would expect from a top pet door company. Our door dog doors and door cat doors are designed to be easy to install and work great in any type of door in your house.
                        Whether you’re looking for a dog or a cat door for any door in your home, Hale Pet Door has a door model pet door that will work great for you.</p>
                    <p>Give your dog or cat the freedom to come and go as they please with Hale Pet Door. Our door pet doors are a perfect fit for any type of door, any size of pet, and provide the quality and expertise that you would expect from a top pet door company. Our door dog doors and door cat doors are designed to be easy to install and work great in any type of door in your house.
                        Whether you’re looking for a dog or a cat door for any door in your home, Hale Pet Door has a door model pet door that will work great for you.</p>
                </div>
            </div>

        </div>
    </div>
</div>



<div class="container relatedProductsContainer">
    <div class="grid">
        <div class="col-sm-12">
            <h2>Frequently bought together</h2>



            <div class="relatedSlider">

            <div class="relatedCard">
                <img src="https://frutheme2.ddev.site/app/uploads/2023/02/four_doors_double_flaps.png">
                <p>Training Flap</p>
                <a href="#">Add to Cart</a>
            </div>


                <div class="relatedCard">
                    <img src="https://frutheme2.ddev.site/app/uploads/2023/02/four_doors_double_flaps.png">
                    <p>Training Flap</p>
                    <a href="#">Add to Cart</a>
                </div>

                <div class="relatedCard">
                    <img src="https://frutheme2.ddev.site/app/uploads/2023/03/White_Wall_Model.png">
                    <p>Training Flap</p>
                    <a href="#">Add to Cart</a>
                </div>

                <div class="relatedCard">
                    <img src="https://frutheme2.ddev.site/app/uploads/2023/02/four_doors_double_flaps.png">
                    <p>Training Flap</p>
                    <a href="#">Add to Cart</a>
                </div>

                <div class="relatedCard">
                    <img src="https://frutheme2.ddev.site/app/uploads/2023/02/four_doors_double_flaps.png">
                    <p>Training Flap</p>
                    <a href="#">Add to Cart</a>
                </div>


            </div>


        </div>
    </div>
</div>