<?php
/**
 * Card Icons Block Template.
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
    echo "<img style='max-width: 100%;height: auto;width: 100%;' src=" . get_template_directory_uri() . "/images/blocks/cardsimage.png'>";
    return;
}

// Load values and assign defaults.
$background_color = get_field( 'background_color' );;
$intro_title = get_field('intro_title');
$intro_copy = get_field('intro_copy');
$background = get_field('background');

$no_padding_top = get_field('no_padding_top');
if($no_padding_top){
    $pad = "noPadTop";
}
?>
<div class="cardsImageFluid <?php echo $background; ?> <?php echo $pad; ?>">
   <div class="container">
       <div class="grid">
           <div class="col-sm-12">
               <div class="intro">
                   <div class="maincopy">
                   <h2 class="wow animate__animated animate__fadeIn"><?php echo $intro_title; ?></h2>
                   <p class="wow animate__animated animate__fadeIn"><?php echo $intro_copy; ?></p>
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
       <div class="grid">
           <?php $count = 0; if( have_rows('cards') ): ?>
                   <?php while( have_rows('cards') ): the_row();
                       $pre_headline = get_sub_field('pre_headline');
                       $title = get_sub_field('title');
                       $image = get_sub_field('image');
                       $copy = get_sub_field('copy');
                       $link = get_sub_field('link');
                       if( $link ):
                           $link_url = $link['url'];
                           $link_title = $link['title'];
                           $link_target = $link['target'] ? $link['target'] : '_self';
                           ?>
                       <div class="col-sm-6 col-md-auto col-grid wow animate__animated animate__fadeIn" data-wow-delay="0.<?php echo $count; ?>s">
                           <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="cardImages">
                               <div class="imageWrap">
                               <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="flex-img">
                               </div>
                               <p class="preHeadline"><?php echo $pre_headline; ?></p>
                               <h2><?php echo $title; ?></h2>
                               <p class="learnMore"><?php echo esc_html( $link_title ); ?> <span class="fa-regular fa-arrow-right"></span></p>
                           </a>
                       </div>
                       <?php endif; ?>
                   <?php $count++; endwhile; ?>
           <?php endif; ?>
       </div>
   </div>
</div>