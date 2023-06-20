<?php
if (!empty($block['data']['__is_preview'])) {
    echo "<img style='max-width: 100%;height: auto;width: 100%;' src=" . get_template_directory_uri() . "/images/blocks/testimonial.png'>";
    return;
}

$title = get_field('title');
$background_image = get_field('background_image');
$hide_author = get_field('hide_author');
?>

<div class="testimonialFluid" <?php if($background_image){ ?>style="background-image: url('<?php echo $background_image; ?>');"<?php } ?>>
    <?php if($background_image){ ?>
        <div class="backOver"></div>
    <?php } ?>
    <div class="container">
        <div class="grid">
            <div class="col-sm-12">
                <h2 class="wow animate__animated animate__fadeIn"><?php echo $title; ?></h2>

                <div class="testimonialSlider wow animate__animated animate__fadeIn">
                <?php
                $featured_posts = get_field('select_testimonials');
                if( $featured_posts ): ?>
                        <?php foreach( $featured_posts as $featured_post ):
                            $quote = get_field('quote',  $featured_post);
                            $author = get_field('author',  $featured_post);
                            $position = get_field('position',  $featured_post);
                            ?>
                            <div>
                                <p class="testimonialQuote"><?php echo $quote; ?></p>
                                <?php if(!$hide_author){ ?>
                                <p class="quoteAuthor">-<?php echo $author.', '.$position; ?></p>
                                <?php } ?>
                            </div>
                        <?php endforeach; ?>
                <?php endif; ?>
                </div>

                <div class="sliderArrrows">
                    <span class="prev fa-thin fa-circle-arrow-left"></span>
                    <span class="next fa-thin fa-circle-arrow-right"></span>
                </div>


            </div>
        </div>
    </div>
</div>