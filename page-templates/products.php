<?php
/**
 * The template for displaying product pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

 /* Template Name: Products */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">
			
			</div>
			<main class="site-main" id="main">
				<?php 
					$active_category = isset($_GET['category']) ? $_GET['category'] : 3;
				?>
				
				<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'loop-templates/content', 'page' ); ?>

				<div class="category-selector">
					<?php
						$menu = wp_get_nav_menu_items(8);
						foreach ($menu as $category) {
							$cls = $active_category == $category->object_id ? ' class="active"' : '';
							echo "<a href='?category=" . $category->object_id . "'".$cls.">".$category->title."</a>";
						}
					?>
				</div >

				<div class="products">
				<?php 
					$pages = get_posts(array(
						'post_type' => 'page',
						'category' =>	$active_category,
						'orderby' =>	'menu_order',
						'order' =>	'ASC',
					));

					foreach ($pages as $page) {
						echo "<a class='product' href='".get_permalink($page->ID)."'>";
						echo "  <div class='product-image' style='background-image: url(".wp_get_attachment_image_src(get_post_thumbnail_id($page->ID), 'single-post-thumbnail')[0].")'></div>";
						echo "  <div class='product-name'>".$page->post_title."</div>";
						echo "</a>";
					}
				?>
				</div>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

			
		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer(); ?>
