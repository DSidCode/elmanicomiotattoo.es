<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ManicomioTheme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		// --- INICIO: Carrusel y Título Animado (controlado por Opciones del Tema) ---

		$theme_options = get_option( 'manicomiortheme_options' );
		$carousel_enabled = isset( $theme_options['carousel_enabled'] ) && $theme_options['carousel_enabled'];

		if ( $carousel_enabled ) {

			// 1. Implementar el carrusel
			$image_count = isset( $theme_options['carousel_image_count'] ) ? intval( $theme_options['carousel_image_count'] ) : 5;

			$args = array(
				'post_type'      => 'attachment',
				'post_mime_type' => 'image',
				'post_status'    => 'inherit',
				'posts_per_page' => $image_count,
				'orderby'        => 'rand',
			);

			$query_images = new WP_Query( $args );

			if ( $query_images->have_posts() ) : ?>
				<div class="page-carousel-container">
					<?php while ( $query_images->have_posts() ) : $query_images->the_post(); ?>
						<div class="page-carousel-slide">
							<img src="<?php echo esc_url( wp_get_attachment_url() ); ?>" alt="Imagen del carrusel">
						</div>
					<?php endwhile; ?>
				</div>
			<?php
			endif;
			wp_reset_postdata();

			// 2. Mostrar el título con efecto
			the_title( '<h1 class="entry-title brillo">', '</h1>' );

		}

		// --- FIN: Carrusel y Título Animado ---

		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
