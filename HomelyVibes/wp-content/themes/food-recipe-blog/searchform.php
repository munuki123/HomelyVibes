<?php
/**
 * Template for displaying search forms
 *
 * @package Food Recipe Blog
 */

?>

<form method="get" class="search-from" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="form-group mb-0 search-div">
    	<input type="search" class="search-field form-control" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'food-recipe-blog' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php esc_attr_x( 'Search for:', 'label', 'food-recipe-blog' ); ?>">
    </div>
    <input type="submit" class="search-submit btn btn-primary " value="<?php echo esc_attr_x( 'Search', 'submit button', 'food-recipe-blog' ); ?>">
</form>