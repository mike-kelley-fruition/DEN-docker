<?php
if (!empty($block['data']['__is_preview'])) {
    echo "<img style='max-width: 100%;height: auto;width: 100%;' src=" . get_template_directory_uri() . "/images/blocks/faqs.png'>";
    return;
}

$featured_posts = get_field('select_faqs');
$title = get_field('title');
$copy = get_field('copy');
$background = get_field('background');
$no_padding_top = get_field('no_padding_top');
if($no_padding_top){
    $pad = "noPadTop";
}
?>

<script type="application/ld+json">
{
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [
<?php
    if( $featured_posts ):
    $count = 1;
        foreach( $featured_posts as $featured_post ):
            $question = get_field( 'question', $featured_post);
            $answer = get_field( 'answer', $featured_post);
            if($count == 1){echo "";}else{echo ",";} ?>
            {
            "@type": "Question",
            "name": "<?php echo $question; ?>",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "<?php echo $answer; ?>"
                }
            }
            <?php $count++; endforeach; ?>
            <?php endif; ?>
 ]
 }
</script>





<div class="faqFluid <?php echo $background; ?> <?php echo $pad; ?>">
    <div class="container">
        <div class="grid">
            <div class="col-sm-12">
                <div class="maincopy intro">
                    <h2 class="wow animate__animated animate__fadeIn"><?php echo $title; ?></h2>
                    <p class="wow animate__animated animate__fadeIn"><?php echo $copy; ?></p>
                </div>
                <?php
                if( $featured_posts ): ?>
                    <?php
                    foreach( $featured_posts as $featured_post ):
                        $question = get_field( 'question', $featured_post);
                        $answer = get_field( 'answer', $featured_post);
                            ?>
                            <div class="beefup openSingle wow animate__animated animate__fadeIn">
                                <p class="beefup__head"><?php echo $question; ?></p>
                                <div class="beefup__body maincopy" role="region" hidden="hidden" style="display: none;">
                                    <p><?php echo $answer ; ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>