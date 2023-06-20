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
    echo "<img style='max-width: 100%;height: auto;width: 100%;' src=" . get_template_directory_uri() . "/images/blocks/video.png'>";
    return;
}


// Load values and assign defaults.
$title = get_field( 'title' );
$content = get_field( 'content' );
$video_image = get_field( 'video_image' );
$youtube_url = get_field( 'youtube_url' );
$background = get_field('background');

$no_padding_top = get_field('no_padding_top');
if($no_padding_top){
    $pad = "noPadTop";
}
?>
<div class="videoFluid <?php echo $background; ?> <?php echo $pad; ?>">
   <div class="container">
       <div class="grid">
           <div class="col-sm-12">
               <div class="intro maincopy">
                   <h2 class="wow animate__animated animate__fadeIn"><?php echo $title; ?></h2>
                   <p class="wow animate__animated animate__fadeIn"><?php echo $content; ?></p>
               </div>

               <div class="videoWrap">

                   <a class="popup-youtube videoImage" href="<?php echo $youtube_url; ?>" style="background-image:url('<?php echo $video_image['url']; ?>');">
                       <div class="overLayVideo"></div>
                       <span class="fa-sharp fa-solid fa-circle-play wow animate__animated animate__bounceIn"></span>
                   </a>
               </div>

           </div>
       </div>
   </div>
</div>