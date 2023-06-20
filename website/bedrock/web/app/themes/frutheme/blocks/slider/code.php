<?php
if (!empty($block['data']['__is_preview'])) {
    echo "<img style='max-width: 100%;height: auto;width: 100%;' src=" . get_template_directory_uri() . "/images/blocks/slider.png'>";
    return;
}

$copy_full = get_field('slider');
?>

<div class="sliderFluid">
    <div class="grid grid-bleed">
        <div class="col-sm-12">
            <div class="slider">
                <?php if( have_rows('slider') ): ?>
                    <?php while( have_rows('slider') ): the_row();
                        $image = get_sub_field('image');
                        ?>
                        <div>
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="flex-img">
                            <div class="maincopy">
                            <p>Fruition’s expertise, attentiveness to new trends, commitment to partner relationships and finely tuned interactive creative and technical processes generate carefully crafted digital marketing and digital products that empower your team, educate your audience and engage your customers.</p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>