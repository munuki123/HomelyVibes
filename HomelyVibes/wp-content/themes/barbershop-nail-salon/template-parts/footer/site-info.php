<?php
/**
 * Displays footer site info
 *
 * @subpackage Barbershop Nail Salon
 * @since 1.0
 * @version 1.4
 */

?>
<div class="site-info py-4 text-center">
	<?php
        echo esc_html( get_theme_mod( 'beauty_salon_spa_footer_text' ) );
        printf(
            /* translators: %s: Barbershop Nail Salon WordPress Theme. */
            '<a href="' . esc_attr__( 'https://www.ovationthemes.com/wordpress/free-barbershop-wordpress-theme/', 'barbershop-nail-salon' ) . '"> %s</a>',
            esc_html__( 'Barbershop Nail Salon WordPress Theme', 'barbershop-nail-salon' )
        );
    ?>
</div>
