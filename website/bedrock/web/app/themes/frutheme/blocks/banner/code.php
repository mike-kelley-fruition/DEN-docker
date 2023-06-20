<?php
/**
 * Starter Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

if (!empty($block['data']['__is_preview'])) {
    echo "<img style='max-width: 100%;height: auto;width: 100%;' src=" . get_template_directory_uri() . "/images/blocks/banner.png'>";
    return;
}



$title = get_field( 'title' );
$copy = get_field( 'copy' );
$background_image = get_field( 'background_image' );
?>
<div class="bannerFluid" style="background-image: url('<?php echo $background_image['url']; ?>');">
    <div class="bannerOver"></div>
   <div class="container">
       <div class="grid">
           <div class="col-sm-12">
               <div class="intro maincopy">
               <h2 class="wow animate__animated animate__fadeIn"><?php echo $title; ?></h2>
               <p class="wow animate__animated animate__fadeIn"><?php echo $copy; ?></p>
               </div>
               <?php
               $link = get_field('cta');
               if( $link ):
                   $link_url = $link['url'];
                   $link_title = $link['title'];
                   $link_target = $link['target'] ? $link['target'] : '_self';
                   ?>
                   <a class="mainCTA cta1 shadow wow animate__animated animate__fadeIn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?><span class="fa-regular fa-arrow-right"></span></a>
               <?php endif; ?>
           </div>
       </div>
   </div>
</div>