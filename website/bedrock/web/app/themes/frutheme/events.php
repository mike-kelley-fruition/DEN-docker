<?php
/* Template Name: Events */
$keyword = get_query_var('keyword');
$topic = get_query_var('topic');
$order = get_query_var('order');
$active = get_query_var('active');
$terms = get_terms( 'event_category', array(
    'hide_empty' => false,
) );
?>

<?php the_content(); ?>

<div class="eventFluid">
    <div class="container">
        <div class="grid align-end searchEventsGrid" >
            <div class="col-sm-12">
                <input id="keywords" class="keyword" type="text" name="keyword" value="<?= $keyword ?>" placeholder="Keywords" title="KEYWORDS">
                <select name="topic" class="eventSelect mediaSelect" title="topic">
                    <option value="" <?= empty($topic) ? 'selected' : '' ?>>All Topics</option>
                    <?php foreach ($terms as $term): ?>
                        <option value="<?= $term->slug ?>" <?= $term->slug == $topic ? 'selected' : '' ?>><?= $term->name ?></option>
                    <?php endforeach ?>
                </select>
                <select name="active" class="eventSelect activeSelect" title="active">
                    <option value="" <?= empty($active) ? 'selected' : '' ?>>Upcoming & Past</option>
                    <option value="Upcoming" name="Upcoming">Upcoming</option>
                    <option value="Past" name="Past">Past</option>
                </select>
            </div>
        </div>

        <div class="grid spinnerGrid">
            <div class="col-sm-12">
                <div class="fa-4x">
                    <i class="fas fa-spinner fa-spin"></i>
                </div>
            </div>
        </div>

        <div class="grid smallGrid post-container">
            <?php
            $paged = get_query_var( 'paged', 1 );
            $today = date('Ymd');
            $args = array(
                'post_type' => 'events',
                's' => $keyword,
                'paged' => $paged,
                'posts_per_page'=> 3,
                'meta_key' => 'event_date',
                'orderby' => 'meta_value_num',
                'order' => $order,
                'tax_query' => array(),
                'meta_query' => array(),
            );
            if(!empty($topic)) {
                $args['tax_query'][] = array(
                    'taxonomy' => 'event_category',
                    'field'    => 'slug',
                    'terms'    => $topic,
                );
            }
            if(!empty($active)) {
                if($active == "Upcoming"){
                    $operator = ">";
                }
                if($active == "Past"){
                    $operator = "<";
                }
                $args['meta_query'][] = array(
                    'key' => 'event_date',
                    'value' => $today,
                    'type' => 'DATE',
                    'compare' => $operator,
                );
            }

            $data = array();
            $query = new WP_Query($args);
            if ( $query->have_posts() ) :
                while ( $query->have_posts() ) : $query->the_post();
                    $postID = get_the_ID();
                    $event_date = get_field('event_date', $postID);
                    $thumbnail = get_the_post_thumbnail_url($postID);
                    $permalink = get_the_permalink($postID);
                    $title = get_the_title();
                    $date = get_field('event_date', $postID, false);
                    $date = new DateTime($date);
                    $calDate = $date->format('Y-m-d');
                    $data[] = array(
                        'title' => $title,
                        'start' => $calDate,
                        'url' => 'test',
                    );


                    echo get_template_part('templates/event-tile');

                    ?>

                <?php endwhile; wp_reset_postdata(); ?>

                <div class="col-sm-12 pagination">
                    <?php
                    echo paginate_links( array(
                        'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                        'total'        => $query->max_num_pages,
                        'current'      => max( 1, get_query_var( 'paged' ) ),
                        'format'       => '?paged=%#%',
                        'show_all'     => false,
                        'type'         => 'plain',
                        'end_size'     => 1,
                        'mid_size'     => 2,
                        'prev_next'    => true,
                        'prev_text'    => sprintf( '<span></span> %1$s', __( '<', 'text-domain' ) ),
                        'next_text'    => sprintf( '%1$s <span></span>', __( '>', 'text-domain' ) ),
                        'add_args'     => false,
                        'add_fragment' => '',
                    ) );
                    ?>
                </div>

            <?php else : ?>
                <div class="col-sm-12">
                    <p>No events found for your search. Please try again.</p>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>



<script>
	jQuery( document ).ready(function($) {

		var xhr = new XMLHttpRequest(), prev_keyword = '', base_url = '<?= get_the_permalink() ?>';

		$(".mediaSelect").change(reload_posts);

		$(".activeSelect").change(reload_posts);

		$('.keyword').on('input', function() {
			if(this.value.length >= 3 || prev_keyword.length >= 3) {
				reload_posts();
			}else {
				var query = get_query_string();
				window.history.replaceState('', '', base_url+'?'+query);
			}
			prev_keyword = this.value;
		});

		function get_query_string() {
			var select = $('.mediaSelect');
			var active = $('.activeSelect');
			var keyword = $('.keyword');
			var query = '';

			$.each(select, function(elem) {
				if(this.value != '') {
					if(query.length > 0)
						query += '&';
					query += this.name+'='+this.value;
				}
			});

			$.each(active, function(elem) {
				if(this.value != '') {
					if(query.length > 0)
						query += '&';
					query += this.name+'='+this.value;
				}
			});

			if(keyword.val().length >= 3) {
				if(query.length > 0)
					query += '&';

				query += keyword.attr('name')+'='+keyword.val();
			}
			return query;
		}


		function reload_posts() {

			xhr.abort();
			var query = get_query_string();

			$(".post-container").html('');

			$(".spinnerGrid").css("display", "block");

			var url = base_url+'?'+query;

			window.history.replaceState('', '', url);

			xhr = $.get( url, function( response ) {

				$(".spinnerGrid").css("display", "none");
				var html = $(response).find('.post-container').html();
				$(".post-container").html(html);

			});

		}

	});
</script>
