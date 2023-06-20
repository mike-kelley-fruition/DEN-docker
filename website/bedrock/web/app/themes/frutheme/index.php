
<?php echo apply_filters('the_content', get_post_field('post_content', 73)); ?>


<div class="blogFluid">
    <div class="container">
        <div class="grid">
            <div class="col-sm-12">
                <h2 class="blogIntro">Stay current on the latest changes impacting SEO and digital marketing</h2>

                <div class="blogFilterWrap">
                    <select name="catdrop" title="category dropdown" class="blogDropdown" onchange='document.location.href=this.options[this.selectedIndex].value;'>
                        <option selected disabled value=""><?php echo esc_attr(__('Select Category')); ?></option>
                        <?php
                        $option = '<option value="' . get_option('home') . '/blog/">All Categories</option>'; // change category to your custom page slug
                        $categories = get_categories();
                        foreach ($categories as $category) {
                            $option .= '<option value="'.get_option('home').'/category/'.$category->slug.'">';
                            $option .= $category->cat_name;
                            $option .= ' ('.$category->category_count.')';
                            $option .= '</option>';
                        }
                        echo $option;
                        ?>
                    </select>
                </div>


            </div>
        </div>

        <div class="grid">
            <?php
            if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();
                echo get_template_part('templates/blog-tile');
            endwhile;
            ?>
        </div>

        <div class="grid">
            <div class="col-sm-12">
                <?php wpbeginner_numeric_posts_nav(); ?>
            </div>
        <?php else : ?>
            <div class='col-12'>
                <h2>Not Posts Found</h2>
            </div>
        <?php endif;
        ?>
        </div>


    </div>
</div>

