<?php
if (!empty($block['data']['__is_preview'])) {
    echo "<img style='max-width: 100%;height: auto;width: 100%;' src=" . get_template_directory_uri() . "/images/blocks/herosimple.png'>";
    return;
}

$hero_h1 = get_field('hero_h1');
$hero_alignment = get_field('hero_alignment');
$background_image = get_field('background_image');
$background_image_upload = get_field('background_image_upload');
$alignHero = "";
if ($hero_alignment == "Center"){
    $alignHero = "centerHero";
}
$overlay = get_field('overlay');
?>

<div class="heroSimple <?php echo $alignHero; ?>"
    <?php if($background_image){?>
    style="background-image:url('<?php echo$background_image; ?>');"
    <?php } ?>>

    <?php if($overlay){?>
    <div class="heroCover"></div>
    <?php } ?>

    <div class="container">
        <div class="grid">
            <div class="col-sm-12">
                <h1 class="wow animate__animated animate__fadeInUp"><?php echo $hero_h1; ?>
            </div>
        </div>
    </div>
</div>