<?php
$title = get_the_title();
$primary_logo = get_field('primary_logo', 'option');
$thumb = get_the_post_thumbnail_url();
$thumb_id = attachment_url_to_postid($thumb);
$thumb_alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
$author = get_the_author();
$date = get_the_date();
$datemodified = get_the_modified_date();
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$postid = get_the_ID();
$cat = get_primary_taxonomy_id($postid, 'category');
$catName = get_cat_name($cat);
$company = get_bloginfo('name');
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>

<script type="application/ld+json">
{
"@context": "http://schema.org",
 "@type": "BlogPosting",
 "mainEntityOfPage": {
   "@type": "WebPage",
   "@id": "<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>"
  },
 "headline": "<?php echo $title; ?>",
 "alternativeHeadline": "<?php echo $title; ?>",
 "image": "<?php echo $thumb; ?>",
 "editor": "<?php echo $author; ?>",
 "url": "<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>",
 "datePublished": "<?php the_time('Y-m-j'); ?>",
 "dateCreated": "<?php the_time('Y-m-j'); ?>",
 "dateModified": "<?php echo $datemodified; ?>",
   "author": {
    "@type": "Person",
    "name": "<?php echo $author; ?>"
  },
   "publisher": {
   "@type": "Organization",
   "name": "<?php echo $company; ?>",
        "logo": {
            "@type": "ImageObject",
            "name": "<?php echo $company; ?> Logo",
            "width": "165",
            "height": "38",
            "url": "<?php echo $primary_logo['url']; ?>"
        }
    }
 }
</script>




<div class="container">
   <div class="grid">
      <div class="col-sm-12 maincopy blogIntroWrap">

          <h1 class="blogTitle"><?php the_title(); ?></h1>
          <p><?php echo $catName; ?> | <?php echo $date; ?></p>
          <p class="backBlog"><span class="fa-regular fa-chevron-left"></span><a href="/blog/">Back to Blog</a></p>

          <div class="socialShare">
              <p>Share</p>
              <a class="fbshare socialshare" target="_blank" href="https://www.facebook.com/share.php?u=<?php echo $actual_link; ?>">
                  <span class="fab fa-facebook-f"></span>
              </a>
              <script src="https://platform.twitter.com/widgets.js" type="text/javascript"></script>
              <a target="_blank" href="http://twitter.com/share?url=<?php echo urlencode(get_permalink($postID)); ?>&count=horizontal" class="twittershare socialshare">
                  <span class="fab fa-twitter"></span>
              </a>
              <a class="linkedinshare socialshare" target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $actual_link; ?>&title=<?php the_title(); ?>&summary=<?php echo $excerpt; ?>&source=LinkedIn">
                  <span class="fab fa-linkedin-in"></span>
              </a>
          </div>

          <img src="<?php echo $thumb; ?>" alt="<?php echo $thumb_alt; ?>" class="flex-img featuredtop">
      </div>
   </div>
</div>


<?php the_content(); ?>


<div class="container relatedBlogs">
    <div class="grid">
        <div class="col-sm-12">
            <div class="intro">
            <h2>You Might Also Enjoy</h2>
            </div>
        </div>
        <?php get_cats_related_post(); ?>
    </div>
</div>


