<?php
$title = get_the_title();
$excerpt = get_the_excerpt();
$thumb = get_the_post_thumbnail_url();
$thumb_id = attachment_url_to_postid($thumb);
$thumb_alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$postid = get_the_ID();

$cat = get_primary_taxonomy_id($postid, 'event_category');
$term = get_term($cat);

$location_name = get_field('location_name');
$address = get_field('address');
$city = get_field('city');
$state = get_field('state');
$zip = get_field('zip');
$description = get_field('description');

$date = get_field('event_date', false, false);
$date = new DateTime($date);
$enddate = get_field('event_date', false, false);
$enddate = new DateTime($enddate);
$start = get_field('start_time');
$starttime = get_field('start_time', false, false);
$starttime = new DateTime($starttime);
$end = get_field('end_time');
$endtime = get_field('end_time', false, false);
$endtime = new DateTime($endtime);
?>

    <script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "Event",
    "name": "<?php the_title(); ?>",
    "description": "<?php echo $excerpt; ?>",
    "location": {
      "@type": "Place",
      "name": "<?php echo $location_name; ?>",
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "<?php echo $city; ?>",
        "addressRegion": "<?php echo $state; ?>",
        "postalCode": "<?php echo $zip; ?>",
        "streetAddress": "<?php echo $address; ?>"
      },
      "url": "<?php echo $actual_link; ?>"
    },
    "startDate": "<?php echo $date->format('Y-m-j'); ?>T<?php echo $starttime->format('H:i'); ?>",
    "endDate": "<?php echo $date->format('Y-m-j'); ?>T<?php echo $endtime->format('H:i'); ?>",
    "url": "<?php echo $actual_link; ?>"
  }
</script>



<div class="eventHero" style="background-image: url(<?php echo $thumb; ?>)">
    <div class="heroCover"></div>
    <div class="container">
        <div class="grid">
            <div class="col-sm-12">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
</div>

    <div class="container eventBody">
        <div class="grid">
            <div class="col-sm-6 col-md-8">
                <div class="eventDesc">
                <div class="maincopy">
                    <?php echo $description; ?>
                </div>
                    <?php
                    $link = get_field('rsvp_link');
                    if( $link ):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <a class="mainCTA cta1" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?><span class="fa-regular fa-arrow-right"></span></a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="eventBox">
                    <span class="fa-solid fa-location-dot"></span>
                    <p class="eventBoxTitle">Location</p>
                    <p class="eventBoxDetails"><?php echo $location_name; ?></p>
                    <p class="eventBoxDetails"><?php echo $address; ?></p>
                    <p class="eventBoxDetails"><?php echo $city . ' '.$state.' '.$zip; ?></p>
                    <span class="fa-solid fa-calendar"></span>
                    <p class="eventBoxTitle">Date</p>
                    <p class="eventBoxDetails"><?php echo $date->format('l, M d Y'); ?></p>
                    <p class="eventBoxDetails"> <?php echo $start; ?> - <?php echo $end; ?></p>
                    <span class="fa-solid fa-layer-group"></span>
                    <p class="eventBoxTitle">Type</p>
                    <p class="eventBoxDetails"><?php echo $term->name; ?></p>
                </div>

            </div>
        </div>
    </div>
