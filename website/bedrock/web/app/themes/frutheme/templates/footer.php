<?php
$primary_logo = get_field('primary_logo', 'option');
$phone = get_field('phone', 'option');
$email = get_field('email', 'option');
$address = get_field('address', 'option');
$city = get_field('city', 'option');
$state = get_field('state', 'option');
$zip = get_field('zip', 'option');
$copyright = get_field('copyright', 'option');
$facebook = get_field('facebook', 'option');
$twitter = get_field('twitter', 'option');
$instagram = get_field('instagram', 'option');
$linkedin = get_field('linkedin', 'option');
$youtube = get_field('youtube', 'option');
$content = get_field('content', 'option');
$menu_title_1 = get_field('menu_title_1', 'option');
$menu_title_2 = get_field('menu_title_2', 'option');
?>

<div class="footerFluid">
    <div class="container">
        <div class="grid">
            <div class="col-sm-6 col-md-4 left">
                <a title="home link" href="/"><img class="flex-img footerLogo" src="<?php echo $primary_logo['url']; ?>" alt="<?php echo $primary_logo['alt']; ?>"></a>
                <p><?php echo $content; ?></p>
                <div class="socialFooter">
                    <?php if ($facebook) { ?>
                        <a title="facebook link" target="_blank" href="<?php echo $facebook; ?>"><span class="fa-brands fa-facebook-f"></span></a>
                    <?php } ?>
                    <?php if ($twitter) { ?>
                        <a title="twitter link" target="_blank" href="<?php echo $twitter; ?>"><span class="fab fa-twitter"></span></a>
                    <?php } ?>
                    <?php if ($linkedin) { ?>
                        <a title="linkedin link" target="_blank" href="<?php echo $linkedin; ?>"><span class="fab fa-linkedin-in"></span></a>
                    <?php } ?>
                    <?php if ($instagram) { ?>
                        <a title="instagram link" target="_blank" href="<?php echo $instagram; ?>"><span class="fab fa-instagram"></span></a>
                    <?php } ?>
                    <?php if ($youtube) { ?>
                        <a title="youtube link" target="_blank" href="<?php echo $youtube; ?>"><span class="fab fa-youtube"></span></a>
                    <?php } ?>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="grid">
                    <div class="col-6 col-sm-6 col-md-7">
                        <p class="menuTitle"><?php echo $menu_title_1; ?></p>
                        <p class="footerAddress"><?php echo $address; ?></p>
                        <p class="footerAddress"><?php echo $city.', '.$state.' '.$zip; ?></p>
                        <p class="footerEmail" ><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>
                        <p class="footerPhone">P: <a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a></p>
                    </div>
                    <div class="col-6 col-sm-6 col-md-5">
                        <p class="menuTitle"><?php echo $menu_title_2; ?></p>
                        <?php
                        $args = array('menu'=>'Footer1','menu_class'=>'FooterMenu');
                        wp_nav_menu($args);
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="newsLetter">
                    <?php echo do_shortcode('[gravityform id="3" title="false" description="false" ajax="true"]'); ?>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="footerCopyFluid">
    <div class="container">
        <div class="grid">
            <div class="col-sm-12">
                <p class="copyRightText">&copy;
                    <?php echo date('Y'); ?>
                    <?php echo $copyright; ?>
                </p>
                <?php
                $args = array('menu'=>'Copyright','menu_class'=>'copyrightmenu');
                wp_nav_menu($args);
                ?>
            </div>
        </div>
    </div>
</div>

<?php wp_footer();