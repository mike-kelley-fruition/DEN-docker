<?php
if (!empty($block['data']['__is_preview'])) {
    echo "<img style='max-width: 100%;height: auto;width: 100%;' src=" . get_template_directory_uri() . "/images/blocks/contact.png'>";
    return;
}
$content_type = get_field('content_type');
$image = get_field('image');
$contact_intro = get_field('contact_intro');
$optional_background_image = get_field('optional_background_image');
?>


<div class="contactFluid" <?php if($optional_background_image){?> style="background-image: url('<?php echo $optional_background_image; ?>');" <?php } ?>>
    <div class="container">
        <div class="grid">
            <div class="col-sm-6">
                <div class="maincopy">
                    <?php if($content_type == "Copy"){ ?>
                    <?php echo $contact_intro; ?>
                    <?php }else{ ?>
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="flex-img">
                    <?php } ?>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="formWrapper">
                    <h2>Contact Us</h2>
                    <?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]') ?>
                </div>
            </div>
        </div>
    </div>
</div>