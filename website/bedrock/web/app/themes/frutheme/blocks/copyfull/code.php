<?php
if (!empty($block['data']['__is_preview'])) {
    echo "<img style='max-width: 100%;height: auto;width: 100%;' src=" . get_template_directory_uri() . "/images/blocks/copyfull.png'>";
    return;
}

$copy_full = get_field('copy_full');
$no_padding_top = get_field('no_padding_top');
if($no_padding_top){
    $pad = "noPadTop";
}
?>

<div class="container copyFullContainer <?php echo $pad; ?>">
    <div class="grid">
        <div class="col-sm-12 maincopy">
            <?php echo $copy_full; ?>
        </div>
    </div>
</div>