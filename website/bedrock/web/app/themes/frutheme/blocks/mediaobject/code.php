<?php
if (!empty($block['data']['__is_preview'])) {
    echo "<img style='max-width: 100%;height: auto;width: 100%;' src=" . get_template_directory_uri() . "/images/blocks/mediaobject.png'>";
    return;
}
$content = get_field('content');
$alignment = get_field('alignment');
$image = get_field('image');
$background = get_field('background');
if($alignment){
    $order = "order-sm-6";
    $imageAlign = "imageRight";
}else{
    $order = "";
    $imageAlign = "imageLeft";
}
$no_padding_top = get_field('no_padding_top');
if($no_padding_top){
    $pad = "noPadTop";
}
?>

<div class="mediaFluid <?php echo $background; ?> <?php echo $pad; ?>">
    <div class="container">
        <div class="grid align-center">
            <div class="col-md-6 <?php echo $order; ?> <?php echo $imageAlign; ?>">
                <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>" class="flex-img <?php echo $imageRight; ?> wow animate__animated animate__fadeIn">
            </div>
            <div class="col-md-6">
                <div class="maincopy wow animate__animated animate__fadeIn">
                    <?php echo $content; ?>
                </div>
                <?php
                $link = get_field('optional_cta');
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