<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ManicomioTheme
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<?php
				$site_name = get_bloginfo( 'name' );
				$year      = date( 'Y' );
				printf( esc_html__( 'Copyright © %1$s %2$s | Diseñado y desarrollado por %3$s.', 'manicomiometheme' ), esc_html( $year ), esc_html( $site_name ), '<a href="https://danisid.com" rel="author">DaniSid.com</a>' );
			?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
