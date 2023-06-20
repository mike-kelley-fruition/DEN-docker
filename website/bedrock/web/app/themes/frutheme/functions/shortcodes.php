<?php 

function cta_shortcode( $atts, $content = null ) {
    $values = shortcode_atts( array(
        'url'       => '#',
    ), $atts );
    return '<a href="'. esc_attr($values['url']) .'" class="mainCTA">'. $content .'</a>';
}
add_shortcode( 'cta', 'cta_shortcode' );




// Test Gallery
add_shortcode( 'quote', 'quotefunction' );
function quotefunction( $params = array() ) {

  // default parameters
  extract(shortcode_atts(array(
    'copy' => '',
    'author' => '',
  ), $params));

    ob_start(); ?>

    <?php
    $posts = get_posts(array(
        'numberposts'	=> -1,
        'post_type'		=> 'race',
//        'meta_query'	=> array(
//            'relation'		=> 'AND',
//            array(
//                'key'	 	=> 'color',
//                'value'	  	=> array('red', 'orange'),
//                'compare' 	=> 'IN',
//            ),
//            array(
//                'key'	  	=> 'featured',
//                'value'	  	=> '1',
//                'compare' 	=> '=',
//            ),
//        ),
    ));

    $custom_query = new WP_Query('cat=-9'); // exclude category 9
    while($custom_query->have_posts()) : $custom_query->the_post(); ?>

        <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <?php the_content(); ?>
            test
        </div>

    <?php endwhile; ?>
    <?php wp_reset_postdata(); // reset the query ?>


    <?php $myvariable = ob_get_clean();
    return $myvariable;
}


