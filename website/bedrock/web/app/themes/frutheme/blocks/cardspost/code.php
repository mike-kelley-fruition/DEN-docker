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
    echo "<img style='max-width: 100%;height: auto;width: 100%;' src=" . get_template_directory_uri() . "/images/blocks/cardspost.png'>";
    return;
}

$background_color = get_field( 'background' );
$title = get_field( 'title' );
$copy = get_field( 'copy' );

$no_padding_top = get_field('no_padding_top');
if($no_padding_top){
    $pad = "noPadTop";
}

?>
<div class="cardsPostFluid <?php echo $background_color; ?> <?php echo $pad; ?>">
   <div class="container">
       <div class="grid align-center">
           <div class="col-sm-8 maincopy intro">
               <h2 class="wow animate__animated animate__fadeIn"><?php echo $title; ?></h2>
               <p class="wow animate__animated animate__fadeIn"><?php echo $copy; ?></p>
           </div>
           <div class="col-sm-4">
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
       <div class="grid">
           <?php
           $count = 0;
           $featured_posts = get_field('select_posts');
           if( $featured_posts ):?>
                   <?php foreach( $featured_posts as $post ):
                   $thumb = get_the_post_thumbnail_url($post);
                   $thumb_id = attachment_url_to_postid($thumb);
                   $thumb_alt = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true );
                   $date = get_the_date('M d, Y', $post);
                   $author_id = get_post_field ('post_author', $post);
                   $display_name = get_the_author_meta( 'display_name' , $author_id );
                   $cat = get_primary_taxonomy_id($post, 'category');
                   $catName = get_cat_name($cat);
                   $title = get_the_title($post);
                   $link = get_the_permalink($post);
                   $excerpt = get_the_excerpt($post);
                   ?>
                   <div class="col-sm-6 col-md-4 col-grid wow animate__animated animate__fadeIn" data-wow-delay="0.<?php echo $count; ?>s">
                       <div class="card-wrapper maincopy">
                           <a class="blogTileImage" href="<?php echo $link; ?>">
                               <img src="<?php echo $thumb; ?>" alt="<?php echo $thumb_alt; ?>" class="flex-img cardImage">
                               <span><?php echo $catName; ?></span>
                           </a>
                           <div class="card-body">
                               <p><?php echo $date; ?> · <?php echo $display_name; ?></p>
                               <h2><a href="<?php echo $link; ?>"><?php echo $title; ?></a></h2>
                               <p><?php echo $excerpt; ?></p>
                           </div>
                           <div class="card-footer">
                               <a href="<?php echo $link; ?>">Read Article <span class="fa-regular fa-arrow-right"></span></a>
                           </div>
                       </div>
                   </div>
               <?php $count++; endforeach; ?>
           <?php endif; ?>
       </div>
   </div>
</div>