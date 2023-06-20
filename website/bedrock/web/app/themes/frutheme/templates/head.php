<?php
$analytics = get_field('google_tag', 'option');
if($analytics){
    echo $analytics;
}
?>
<head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url');?>">
    <link rel="shortcut icon" href="<?php the_field('favicon', 'option'); ?>" />
    <?php wp_head(); ?>
</head>