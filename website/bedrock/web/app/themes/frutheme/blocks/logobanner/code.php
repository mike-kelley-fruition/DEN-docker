<?php
/**
 * Icon Banner Block Template.
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
    echo "<img style='max-width: 100%;height: auto;width: 100%;' src=" . get_template_directory_uri() . "/images/blocks/logobanner.png'>";
    return;
}

// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Load values and assign defaults.
$skin = get_field( 'skin' );
$title = get_field( 'title' );
?>
<div <?php echo $anchor; ?>class="iconBannerFluid <?php echo $skin; ?>">
   <div class="container">
       <div class="grid">
           <?php if($title){ ?>
           <div class="col-sm-12">
               <h2 class="wow animate__animated animate__fadeIn"><?php echo $title; ?></h2>
           </div>
           <?php } ?>
       </div>
       <div class="grid">
               <?php $count = 0; if( have_rows('logos') ): ?>
                   <?php while( have_rows('logos') ): the_row();
                   $image = get_sub_field('logo_image');
                   ?>
                       <div class="col-sm-auto wow animate__animated animate__fadeIn" data-wow-delay="0.<?php echo $count; ?>s">
                           <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="flex-img logoImage">
                       </div>
                   <?php $count++; endwhile; ?>
               <?php endif; ?>
       </div>
   </div>
</div>