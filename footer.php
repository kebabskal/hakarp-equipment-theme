<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'understrap_container_type' );
?>

</div>

<div id="footer-wrapper">
	<hr />
	<div class="row justify-content-center">
		<div class="col-md-auto">
			<nav class="navbar navbar-expand-md navbar-light content-justify-left">
			<?php wp_nav_menu(
				array(
					'theme_location'  => 'primary',
					'container_class' => 'collapse navbar-collapse',
					'container_id'    => 'navbarNavDropdown',
					'menu_class'      => 'navbar-nav ml-auto',
					'fallback_cb'     => '',
					'menu_id'         => 'footer-menu',
					'depth'           => 2,
					'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
				)
			); ?>
			</nav>
			<div id="footer" class="container text-center">
				<strong>HAKARPS EQUIPMENT AB</strong> |  Mogölsvägen 10  |  555 93 Jönköping  |  010-330 99 10  |  E-post: <a href="mailto:info@hakarps.nu">info@hakarps.nu</a>
			</div>
		</div>
			
		<div class="col-1 aaa"></div>
	</div>
</div>
<?php wp_footer(); ?>
</body>

</html>

