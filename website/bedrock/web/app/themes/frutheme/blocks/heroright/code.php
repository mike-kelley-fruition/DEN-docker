<?php
if (!empty($block['data']['__is_preview'])) {
    echo "<img style='max-width: 100%;height: auto;width: 100%;' src=" . get_template_directory_uri() . "/images/blocks/heroright.png'>";
    return;
}

$hero_h1 = get_field('hero_h1');
$hero_copy = get_field('hero_copy');
$hero_background = get_field('hero_background');
?>

<div class="heroRightFluid">
        <div class="grid align-center">
            <div class="col-md-6">

                <div class="heroRightCopy">
                    <h1 class="wow animate__animated animate__fadeInUp"><?php echo $hero_h1; ?></h1>
                    <?php if( $hero_copy){ ?>
                        <p class="wow animate__animated animate__fadeInUp"><?php echo $hero_copy; ?></p>
                    <?php } ?>
                    <?php
                    $link = get_field('hero_cta_1');
                    if( $link ):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <a class="mainCTA cta1 shadow wow animate__animated animate__fadeInUp" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?><span class="fa-regular fa-arrow-right"></span></a>
                    <?php endif; ?>

                    <?php
                    $link = get_field('hero_cta_2');
                    if( $link ):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <a class="mainCTA cta3 shadow wow animate__animated animate__fadeInUp" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?><span class="fa-regular fa-arrow-right"></span></a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-md-6 heroRight wow animate__animated animate__fadeInRight" style="background-image: url(<?php echo $hero_background['url']; ?>)";></div>
        </div>
    </div>
</div>