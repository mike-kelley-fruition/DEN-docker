<?php
$primary_logo = get_field('primary_logo', 'option');
$phone = get_field('phone', 'option');
?>
    <script>
        /* M Menu */
        document.addEventListener(
            "DOMContentLoaded", () => {
                new Mmenu( "#menu", {
                    "extensions": [
                        "fx-menu-zoom",
                        "fx-panels-zoom",
                        "pagedim-black",
                        "position-left",
                        "theme-light"
                    ],
                    "iconbar": {
                        "use": true,
                        "top": [
                            "<a href='/'><span class='fas fa-home'></span></a>",
                            "<a href='tel:<?php echo $phone; ?>'><i class='fas fa-phone'></i></a>"
                        ]
                    },
                    "navbars": [
                        {
                            "position": "top",
                            "content": [
                                "<a href='/'><img class='mobileLogo' src='<?php echo $primary_logo['url']; ?>' alt='<?php echo $primary_logo['alt']; ?>'></a>"
                            ],
                            "height": 3
                        }
                    ]
                });
            }
        );
    </script>
<!--Mobile & Tablet Hamburger-->
<div id="navTablet">
    <div class="container">
        <div class="grid align-center">
            <div class="col-3">
                <a title="mobile menu" class="mburger mburger--collapse" href="#menu">
                    <strong></strong>
                    <strong></strong>
                    <strong></strong>
                </a>
            </div>
            <div class="col-6">
                <a title="home page link" href="/"><img class="flex-img mainLogo" src="<?php echo $primary_logo['url']; ?>" alt="<?php echo $primary_logo['alt']; ?>"></a>
            </div>
            <div class="col-3">
                <!--open mobile-->
            </div>
        </div>
    </div>
</div>
<!-- The Mobile Menu -->
<div class="mobilemenuwrapper">
    <nav id="menu">
        <?php
        $args = array('menu'=>'Desktop');
        wp_nav_menu($args);
        ?>
    </nav>
</div>
<!--Desktop Menu-->
<div id="navDesktop">
    <div class="container">
        <div class="grid align-center grid-bleed">
            <div class="col-sm-3">
                <a title="primary logo" href="/"><img class="flex-img mainLogo animate__animated animate__fadeIn" src="<?php echo $primary_logo['url']; ?>" alt="<?php echo $primary_logo['alt']; ?>"></a>
            </div>
            <div class="col-sm-9 headerRight">
                <?php
                $search_form = '<li class="headerSearch"><a class="popup-with-zoom-anim" title="site search" href="#search-dialog"><span class="far fa-search"></span></a></li>';
                $items_wrap = '<ul id="%1$s" class="%2$s">%3$s';
                $items_wrap .= sprintf( '<li id="searchItem">%1$s</li></ul>', $search_form );
                $args = array(
                    'menu'=>'Desktop',
                    'theme_location'   => "primary",
                    'menu_class'=>'main-navigation',
                    'items_wrap' => $items_wrap,
                    'walker' => new fluent_themes_custom_walker_nav_menu
                );
                wp_nav_menu($args); ?>

            </div>
        </div>
    </div>
</div>



    <!-- dialog itself, mfp-hide class is required to make dialog hidden -->
    <div id="search-dialog" class="zoom-anim-dialog mfp-hide">
        <form role="search" method="get" class="search-form" action="/">
            <label for="s" class="screen-reader-text">Search</label>
            <input type="search" name="s" id="s" class="search-field" placeholder="Search for Keyword…">
            <input title="site search button" type="submit" class="search-submit" value="Search">
        </form>
    </div>



<?php wp_head();