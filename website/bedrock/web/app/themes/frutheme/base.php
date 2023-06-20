<?php
use Roots\Sage;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>
<?php
get_template_part('templates/header');
include Sage\template_path();
get_template_part('templates/footer');
?>
</body>
</html>
