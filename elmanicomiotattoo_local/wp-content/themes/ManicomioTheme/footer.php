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

	<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) ) : ?>
		<aside class="footer-widgets-container" role="complementary">
			<div class="footer-widgets">
				<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
					<div class="widget-column footer-widget-1">
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</div>
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
					<div class="widget-column footer-widget-2">
						<?php dynamic_sidebar( 'footer-2' ); ?>
					</div>
				<?php endif; ?>
			</div><!-- .footer-widgets -->
		</aside><!-- .footer-widgets-container -->
	<?php endif; ?>

	<footer id="colophon" class="site-footer">
		<?php if ( has_nav_menu( 'footer' ) ) : ?>
			<nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer Menu', 'manicomiometheme' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'menu_class'     => 'footer-menu',
						'depth'          => 1,
					)
				);
				?>
			</nav><!-- .footer-navigation -->
		<?php endif; ?>
		<div class="site-info">
			<?php
			$site_name = get_bloginfo( 'name' );
			$year      = date( 'Y' );
			/* translators: 1: Current year, 2: Site name, 3: Author link. */
			$copyright_text = sprintf(
				/* translators: 1: Current year, 2: Site name, 3: Author link. */
				__( 'Copyright © %1$s %2$s | Designed and developed by %3$s.', 'manicomiometheme' ),
				esc_html( $year ),
				esc_html( $site_name ),
				'<a href="https://danisid.com" rel="author" target="_blank" rel="noopener noreferrer">DaniSid.com</a>'
			);
			echo wp_kses_post( $copyright_text );
			?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php
if ( has_nav_menu( 'social' ) ) :
	?>
	<nav class="redes-sociales-flotantes" aria-label="<?php esc_attr_e( 'Social Media Links', 'manicomiometheme' ); ?>">
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'social',
				'menu_class'     => 'social-links-menu',
				'depth'          => 1,
				'link_before'    => '<span class="screen-reader-text">',
				'link_after'     => '</span>',
			)
		);
		?>
	</nav><!-- .redes-sociales-flotantes -->
<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>
