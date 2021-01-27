<?php
/**
 * Ifeature theme Starter Content.
 *
 * @package ifeature
 * @since ifeature 7.3.0
 */

if ( ! function_exists( 'ifeature_get_starter_content' ) ) {

	/**
	 * Function to return the array of starter content for the theme.
	 *
	 * Passes it through the `ifeature_starter_content` filter before returning.
	 *
	 * @since ifeature 7.3.0
	 * @return array a filtered array of args for the starter_content.
	 */
	function ifeature_get_starter_content() {

		// Define and register starter content to showcase the theme on new sites.
		$starter_content = array(
			'widgets'    => array(
				// Place one core-defined widgets in the first footer widget area.
				'sidebar-1' => array(
					'text_about',
				),
			),

			// Specify the core-defined pages to create and add custom thumbnails to some of them.
			'posts'      => array(
				'front' => array(
					'post_type'    => 'page',
					'post_title'   => __( 'Starter_Home', 'ifeature' ),
					'post_content' => join(
						'',
						array(
							'<!-- wp:image {"align":"full","id":12} -->',
							'<figure class="wp-block-image alignfull"><img src="' . get_theme_file_uri() . '/images/branding/slide1.jpg" alt="" class="wp-image-12"/></figure>',
							'<!-- /wp:image -->',
							'<!-- wp:columns {"align":"wide"} -->',
							'<div class="wp-block-columns alignwide"><!-- wp:column -->',
							'<div class="wp-block-column"><!-- wp:spacer {"height":20} -->',
							'<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>',
							'<!-- /wp:spacer -->',
							'<!-- wp:group {"backgroundColor":"very-light-gray"} -->',
							'<div class="wp-block-group has-very-light-gray-background-color has-background"><div class="wp-block-group__inner-container"><!-- wp:image {"id":29,"sizeSlug":"large"} -->',
							'<figure class="wp-block-image size-large"><img src="' . get_theme_file_uri() . '/images/branding/blueprint.png" alt="" class="wp-image-29"/></figure>',
							'<!-- /wp:image --></div></div>',
							'<!-- /wp:group -->',
							'<!-- wp:group {"backgroundColor":"very-light-gray","textColor":"very-dark-gray"} -->',
							'<div class="wp-block-group has-very-light-gray-background-color has-very-dark-gray-color has-text-color has-background"><div class="wp-block-group__inner-container"><!-- wp:paragraph {"align":"center"} -->',
							'<p class="has-text-align-center"><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever.</p>',
							'<!-- /wp:paragraph --></div></div>',
							'<!-- /wp:group --></div>',
							'<!-- /wp:column -->',
							'<!-- wp:column -->',
							'<div class="wp-block-column"><!-- wp:spacer {"height":20} -->',
							'<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>',
							'<!-- /wp:spacer -->',
							'<!-- wp:group {"backgroundColor":"very-light-gray"} -->',
							'<div class="wp-block-group has-very-light-gray-background-color has-background"><div class="wp-block-group__inner-container"><!-- wp:image {"id":30,"sizeSlug":"large"} -->',
							'<figure class="wp-block-image size-large"><img src="' . get_theme_file_uri() . '/images/branding/docs.png" alt="" class="wp-image-30"/></figure>',
							'<!-- /wp:image --></div></div>',
							'<!-- /wp:group -->',
							'<!-- wp:group {"backgroundColor":"very-light-gray","textColor":"very-dark-gray"} -->',
							'<div class="wp-block-group has-very-light-gray-background-color has-very-dark-gray-color has-text-color has-background"><div class="wp-block-group__inner-container"><!-- wp:paragraph {"align":"center"} -->',
							'<p class="has-text-align-center"><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever.</p>',
							'<!-- /wp:paragraph --></div></div>',
							'<!-- /wp:group --></div>',
							'<!-- /wp:column -->',
							'<!-- wp:column -->',
							'<div class="wp-block-column"><!-- wp:spacer {"height":20} -->',
							'<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>',
							'<!-- /wp:spacer -->',
							'<!-- wp:group {"backgroundColor":"very-light-gray","textColor":"very-dark-gray"} -->',
							'<div class="wp-block-group has-very-light-gray-background-color has-very-dark-gray-color has-text-color has-background"><div class="wp-block-group__inner-container"><!-- wp:image {"id":31,"sizeSlug":"large"} -->',
							'<figure class="wp-block-image size-large"><img src="' . get_theme_file_uri() . '/images/branding/slidericon.png" alt="" class="wp-image-31"/></figure>',
							'<!-- /wp:image --></div></div>',
							'<!-- /wp:group -->',
							'<!-- wp:group {"backgroundColor":"very-light-gray","textColor":"very-dark-gray"} -->',
							'<div class="wp-block-group has-very-light-gray-background-color has-very-dark-gray-color has-text-color has-background"><div class="wp-block-group__inner-container"><!-- wp:paragraph {"align":"center"} -->',
							'<p class="has-text-align-center"><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever.</p>',
							'<!-- /wp:paragraph --></div></div>',
							'<!-- /wp:group --></div>',
							'<!-- /wp:column --></div>',
							'<!-- /wp:columns -->',
							'<!-- wp:columns {"align":"wide"} -->',
							'<div class="wp-block-columns alignwide"><!-- wp:column {"width":69} -->',
							'<div class="wp-block-column" style="flex-basis:69%"><!-- wp:heading {"align":"center","textColor":"very-dark-gray"} -->',
							'<h2 class="has-very-dark-gray-color has-text-color has-text-align-center">HAPPINESS</h2>',
							'<!-- /wp:heading -->',
							'<!-- wp:paragraph {"textColor":"very-dark-gray"} -->',
							'<p class="has-text-color has-very-dark-gray-color"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',
							'<!-- /wp:paragraph -->',
							'<!-- wp:paragraph {"textColor":"very-dark-gray"} -->',
							'<p class="has-text-color has-very-dark-gray-color"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',
							'<!-- /wp:paragraph -->',
							'<!-- wp:paragraph {"textColor":"very-dark-gray"} -->',
							'<p class="has-text-color has-very-dark-gray-color"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',
							'<!-- /wp:paragraph --></div>',
							'<!-- /wp:column -->',
							'<!-- wp:column {"width":33.33} -->',
							'<div class="wp-block-column" style="flex-basis:33.33%"><!-- wp:group {"backgroundColor":"very-light-gray"} -->',
							'<div class="wp-block-group has-very-light-gray-background-color has-background"><div class="wp-block-group__inner-container"><!-- wp:search {"label":"","placeholder":"Search Here...","buttonText":""} /--></div></div>',
							'<!-- /wp:group -->',
							'<!-- wp:group {"backgroundColor":"very-light-gray","textColor":"very-dark-gray"} -->',
							'<div class="wp-block-group has-very-light-gray-background-color has-very-dark-gray-color has-text-color has-background"><div class="wp-block-group__inner-container"><!-- wp:calendar /--></div></div>',
							'<!-- /wp:group -->',
							'<!-- wp:group {"backgroundColor":"very-light-gray","textColor":"very-dark-gray"} -->',
							'<div class="wp-block-group has-very-light-gray-background-color has-very-dark-gray-color has-text-color has-background"><div class="wp-block-group__inner-container"><!-- wp:paragraph -->',
							'<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>',
							'<!-- /wp:paragraph --></div></div>',
							'<!-- /wp:group -->',
							'<!-- wp:group {"backgroundColor":"very-light-gray"} -->',
							'<div class="wp-block-group has-very-light-gray-background-color has-background"><div class="wp-block-group__inner-container"><!-- wp:social-links -->',
							'<ul class="wp-block-social-links"><!-- wp:social-link {"url":"https://wordpress.org","service":"wordpress"} /-->',
							'<!-- wp:social-link {"url":"facebook.com","service":"facebook"} /-->',
							'<!-- wp:social-link {"url":"twiter.com","service":"twitter"} /-->',
							'<!-- wp:social-link {"url":"instagram.com","service":"instagram"} /-->',
							'<!-- wp:social-link {"url":"linked.in","service":"linkedin"} /-->',
							'<!-- wp:social-link {"url":"youtube.com","service":"youtube"} /-->',
							'<!-- wp:social-link {"service":"chain"} /--></ul>',
							'<!-- /wp:social-links --></div></div>',
							'<!-- /wp:group --></div>',
							'<!-- /wp:column --></div>',
							'<!-- /wp:columns -->',
							'<!-- wp:paragraph -->',
							'<p></p>',
							'<!-- /wp:paragraph -->',
						)
					),
				),
				'about',
				'blog',
				'services',
				'contact',
			),

			// Default to a static front page and assign the front and posts pages.
			'options'    => array(
				'show_on_front'  => 'page',
				'page_on_front'  => '{{front}}',
				'page_for_posts' => '{{blog}}',
			),

			// Set up nav menus for each of the two areas registered in the theme.
			'nav_menus'  => array(
				// Assign a menu to the "primary" location.
				'primary' => array(
					'name'  => __( 'Primary', 'ifeature' ),
					'items' => array(
						'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
						'page_about',
						'page_blog',
						'page_services',
						'page_contact',
					),
				),
			),

			// Custom setting.
			'theme_mods' => array(
				'ifeature_style' => 'flat',
			),
		);

		$page = get_page_by_title( 'Starter_Home', OBJECT, 'page' );
		if ( $page ) {
			add_post_meta( $page->ID, 'ifeature_cc_page_sidebar', 'full_width' );
			add_post_meta( $page->ID, 'ifeature_cc_page_title_toggle', 0 );
		}

		/**
		 * Filters ifeature array of starter content.
		 *
		 * @since ifeature 7.3.0
		 *
		 * @param array $starter_content Array of starter content.
		 */
		return apply_filters( 'ifeature_starter_content', $starter_content );

	}
}
