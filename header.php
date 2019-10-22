<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://github.com/sonaspy">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'personal-eye' ); ?></a>
	<?php 
	$eyepress_preloader = get_theme_mod( 'eyepress_show_preloader', 'yes' );
	if($eyepress_preloader == 'yes'):
	 ?>
		<div id="loading-wrap">
			<div class="cp-preloader cp-preloader_type1">
				<span class="cp-preloader__letter" data-preloader="L"><?php esc_html_e('L','personal-eye'); ?></span>
				<span class="cp-preloader__letter" data-preloader="O"><?php esc_html_e('O','personal-eye'); ?></span>
				<span class="cp-preloader__letter" data-preloader="A"><?php esc_html_e('A','personal-eye'); ?></span>
				<span class="cp-preloader__letter" data-preloader="D"><?php esc_html_e('D','personal-eye'); ?></span>
				<span class="cp-preloader__letter" data-preloader="I"><?php esc_html_e('I','personal-eye'); ?></span>
				<span class="cp-preloader__letter" data-preloader="N"><?php esc_html_e('N','personal-eye'); ?></span>
				<span class="cp-preloader__letter" data-preloader="G"><?php esc_html_e('G','personal-eye'); ?></span>
			</div>
		</div>
	<?php endif; ?>
		<div id="home"></div>
		<!-- Header Section Start -->
		<div class="home-banner">
<?php 
$eyepress_header_image = get_theme_mod( 'eyepress_header_img_show' );
$eyepress_blog_header_sticky = get_theme_mod( 'eyepress_blog_header_sticky', 'fixed_sticky' );
if( $eyepress_header_image && is_home()){
	$eyepress_sticky_id = 'active-sticky';
	$eyepress_sticky_class = 'fixed';
}else{
	if( $eyepress_blog_header_sticky =='fixed' ) {
		$eyepress_sticky_id = 'hide-sticky';
		$eyepress_sticky_class = 'fixed';
	}elseif( $eyepress_blog_header_sticky =='scroll' ) {
		$eyepress_sticky_id = 'hide-sticky';
		$eyepress_sticky_class = 'scroll';
	}else{
		$eyepress_sticky_id = 'active-sticky';
		$eyepress_sticky_class = 'fixed';
	}
}

 ?>
		<header id="<?php echo esc_attr($eyepress_sticky_id); ?>" class="<?php echo esc_attr($eyepress_sticky_class); ?>">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="d-flex justify-end">
							<div class="logo mr-auto">
								<?php 
								if(has_custom_logo()):
									the_custom_logo();
								else:
								?>
							<h1 class="site-title"><a class="text-white" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html(bloginfo( 'name' )); ?></a></h1>
							<?php
							endif;
				if(display_header_text()==true):
				$eyepress_description = get_bloginfo( 'description', 'display' );
					if ($eyepress_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo esc_html($eyepress_description); /* WPCS: xss ok. */ ?></p>
					<?php endif; ?>
				<?php endif; ?>
							</div>
							<?php get_template_part('template-parts/home-section/eyepress-menu-template'); ?>
<?php 
$eyepress_sidebar_visibility = get_theme_mod( 'eyepress_sidebar_visibility','hide');
if($eyepress_sidebar_visibility== 'home-only' && is_front_page()){ ?>
	 <div class="expand-icon pull-right">
		<span class="bar-icon"></span>
	</div>
 
<?php
}elseif ($eyepress_sidebar_visibility== 'all') {  ?>
	 <div class="expand-icon pull-right">
		<span class="bar-icon"></span>
	</div>
<?php 
}
 ?>

							

						</div><!-- next start side menu -->

<?php 
if($eyepress_sidebar_visibility== 'home-only' && is_front_page()){
	 get_template_part('template-parts/home-section/eyepress-side-menu'); 
}elseif ($eyepress_sidebar_visibility== 'all') {
	 get_template_part('template-parts/home-section/eyepress-side-menu'); 
}


 ?>
					</div>
				</div>
			</div>
		</header>
		<!-- Header Section End -->
	<?php
	$eyepress_header_img_show = get_theme_mod('eyepress_header_img_show', 0);
	if (is_front_page() && $eyepress_header_img_show == 1) {
	 get_template_part('template-parts/home-section/eyepress-home-banner'); 
	 }
	 ?>
	 </div>
	<div id="content" class="site-content">
