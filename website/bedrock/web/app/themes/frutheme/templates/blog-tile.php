<div class="col-sm-6 col-md-4 col-grid">
    <div class="card-wrapper maincopy">
        <?php
        $id = get_the_ID();
        $thumb = get_the_post_thumbnail_url();
        $thumb_id = attachment_url_to_postid($thumb);
        $thumb_alt = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true );
        $date = get_the_date();
        $author_id = get_the_author_meta( 'ID' );
        $author = get_the_author_meta( 'display_name', $author_id );
        $url = get_author_posts_url(get_the_author_meta('ID'));
        $postid = get_the_ID();
        $cat = get_primary_taxonomy_id($postid, 'category');
        $catName = get_cat_name($cat);
        ?>
        <a class="blogTileImage" href="<?php the_permalink(); ?>">
            <img src="<?php echo $thumb; ?>" alt="<?php echo $thumb_alt; ?>" class="flex-img cardImage">
            <span><?php echo $catName; ?></span>
        </a>
        <div class="card-body">
            <p><?php echo $date; ?> · <?php echo $author; ?></p>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        </div>
        <div class="card-footer">
            <a href="<?php the_permalink(); ?>">Read Article <span class="fa-regular fa-arrow-right"></span></a>
        </div>
    </div>
</div>