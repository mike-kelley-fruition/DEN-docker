<div class="container paddedContainer">
    <div class="grid">
        <div class="col-sm-12 maincopy">
            <h1><?php printf( esc_html__( 'Search Results for: %s', 'frubase' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
        </div>
    </div>
</div>
<div class="container searchContainer">
    <div class="grid">
        <div class="col-sm-12 maincopy">
            <?php
            if ( have_posts() ) :
			while ( have_posts() ) : the_post(); ?>
                <div class="searchBox">
                    <h2><?php the_title(); ?></h2>
                    <?php the_excerpt(); ?>
                    <a href="<?php the_permalink(); ?>">Read More</a>
                </div>
			<?php endwhile;
                wpbeginner_numeric_posts_nav();
		    else :
			echo "<h2>Nothing Found</h2>";
		    endif; ?>
		</div>
	</div>
</div>




