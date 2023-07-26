<?php
/**
 * Displays featured image header
 *
 * @package Food Recipe Blog
 */
?>

<div class="featured-header-image">
    <img src="<?php the_post_thumbnail_url( 'food-recipe-blog-featured-header-image' ); ?>">
    <div class="bg-gradient">
        <header class="entry-header centered">
            <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
        </header>
    </div>
</div>