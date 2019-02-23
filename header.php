<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,900" rel="stylesheet">
	<!-- Google Tag Manager -->
	<script>
		(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f); })(window,document,'script','dataLayer','GTM-PWPW6DB');
	</script>
	<!-- End Google Tag Manager -->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PWPW6DB" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div class="hfeed site d-flex flex-column" id="page">

	<?php
	$emergencyAlert = get_page_by_title('Alert', OBJECT, 'page');

	if ( isset( $emergencyAlert ) ) :
	?>

	<div class="alert alert-danger px-0 mb-0">
		<div class="container" role="alert">
			<div class="row">
				<div class="col-sm col-sm-auto mb-2 mb-sm-0"><strong><i class="fa fa-exclamation-triangle mr-1"></i> ALERT</strong></div>
				<div class="col-sm">
					<?php echo $emergencyAlert->post_content; ?>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<div id="search-button-wrapper">
		<div class="container">
			<div class="row justify-content-end py-2">
				<div class="col col-md-4 col-lg-3 col-xl-2 px-0">
					<form method="get" id="header-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
						<label class="sr-only" for="s">Search</label>
						<input class="form-control border-0" id="s" name="s" type="text" placeholder="Search …" value="">
					</form>
				</div>
				<div class="col col-auto d-flex align-items-center">
					<a href="#" id="header-search-submit"><i class="fa fa-search"></i></a>
				</div>
			</div>
		</div>
	</div>

	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite" class="position-relative">

		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

		<nav class="navbar navbar-expand-md navbar-dark bg-primary">

		<?php if ( 'container' == $container ) : ?>
			<div class="container position-relative">
		<?php endif; ?>

				<a class="site-logo navbar-brand mr-0" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url">
					<img src="<?php bloginfo('template_url')?>/img/logo-color.svg" alt="Quincy Animal Shelter logo" onerror="this.src=<?php bloginfo('template_url')?>/img/logo.png; this.onerror=null;">
				</a>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
					<i class="fa fa-bars"></i>
				</button>

				<!-- The WordPress Menu goes here -->
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav ml-auto',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				); ?>

				<a class="btn btn-light btn-sm ml-2 donate-button py-md-2 px-md-3" href="/get-involved/donate/">Donate</a>
				
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post" id="donate-button-form" target="_blank">
					<input type="hidden" name="cmd" value="_s-xclick"></input>
					<input type="hidden" name="hosted_button_id" value="V33NXQKRUAJE4"></input>
				</form>
			<?php if ( 'container' == $container ) : ?>
			</div><!-- .container -->
			<?php endif; ?>

		</nav><!-- .site-navigation -->

	</div><!-- #wrapper-navbar end -->
