<div class="col-sm-6 col-md-4 col-grid">
    <div class="card-wrapper maincopy">
        <?php
        $postID = get_the_ID();
        $event_date = get_field('event_date', $postID);
        $excerpt = get_the_excerpt($postID);
        $thumb = get_the_post_thumbnail_url($postID);
        $thumb_id = attachment_url_to_postid($thumb);
        $thumb_alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
        $cat = get_primary_taxonomy_id($postID, 'event_category');
        $term = get_term($cat);
        ?>
        <a class="blogTileImage" href="<?php the_permalink(); ?>">
            <img src="<?php echo $thumb; ?>" alt="<?php echo $thumb_alt; ?>" class="flex-img cardImage">
            <span><?php echo $term->name; ?></span>
        </a>
        <div class="card-body">
            <p><?php echo $event_date; ?></p>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p><?php echo $excerpt; ?></p>
        </div>
        <div class="card-footer">
            <a href="<?php the_permalink(); ?>">View Details <span class="fa-regular fa-arrow-right"></span></a>
        </div>
    </div>
</div>