<?php
/**
 * Plugin Name: Astra Starter Sites
 * Plugin URI: http://www.wpastra.com/pro/
 * Description: Import free sites build with Astra theme.
 * Version: 1.2.7
 * Author: Brainstorm Force
 * Author URI: http://www.brainstormforce.com
 * Text Domain: astra-sites
 *
 * @package Astra Sites
 */

/**
 * Set constants.
 */
if ( ! defined( 'ASTRA_SITES_NAME' ) ) {
	define( 'ASTRA_SITES_NAME', __( 'Astra Sites', 'astra-sites' ) );
}

if ( ! defined( 'ASTRA_SITES_VER' ) ) {
	define( 'ASTRA_SITES_VER', '1.2.7' );
}

if ( ! defined( 'ASTRA_SITES_FILE' ) ) {
	define( 'ASTRA_SITES_FILE', __FILE__ );
}

if ( ! defined( 'ASTRA_SITES_BASE' ) ) {
	define( 'ASTRA_SITES_BASE', plugin_basename( ASTRA_SITES_FILE ) );
}

if ( ! defined( 'ASTRA_SITES_DIR' ) ) {
	define( 'ASTRA_SITES_DIR', plugin_dir_path( ASTRA_SITES_FILE ) );
}

if ( ! defined( 'ASTRA_SITES_URI' ) ) {
	define( 'ASTRA_SITES_URI', plugins_url( '/', ASTRA_SITES_FILE ) );
}

if ( ! function_exists( 'astra_sites_setup' ) ) :

	/**
	 * Astra Sites Setup
	 *
	 * @since 1.0.5
	 */
	function astra_sites_setup() {
		require_once ASTRA_SITES_DIR . 'inc/classes/class-astra-sites.php';
	}

	add_action( 'plugins_loaded', 'astra_sites_setup' );

endif;


if ( ! function_exists( 'register_notices' ) ) :

	/**
	* Ask Theme Rating
	*
	* @since 1.4.0
	*/
	function register_notices() {
		$image_path = ASTRA_SITES_URI . 'inc/assets/images/astra-logo.svg';
		Astra_Notices::add_notice(
			array(
				'id'                         => 'astra-sites-rating',
				'type'                       => '',
				/* translators: %1$s logo link, %2$s product rating link, %3$s dismissable notice transient time. */
				'message'                    => sprintf(
					'<div class="notice-image">
						<img src="%1$s" class="custom-logo" alt="Astra" itemprop="logo"></div> 
						<div class="notice-content">
							<div class="notice-heading">
								%2$s
							</div>
							%3$s<br />
							<div class="astra-review-notice-container">
								<a href="%4$s" class="astra-notice-close astra-review-notice button-primary" target="_blank">
								%5$s
								</a>
							<span class="dashicons dashicons-calendar"></span>
								<a href="#" data-repeat-notice-after="%6$s" class="astra-notice-close astra-review-notice">
								%7$s
								</a>
							<span class="dashicons dashicons-smiley"></span>
								<a href="#" class="astra-notice-close astra-review-notice">
								%8$s
								</a>
							</div>
						</div>',
					$image_path,
					__( 'Hello! Seems like you have used Astra sites to build this website — Thanks a ton!', 'astra-sites' ),
					__( 'Could you please do us a BIG favor and give it a 5-star rating on WordPress? This would boost our motivation and help other users make a comfortable decision while choosing the Astra sites.', 'astra-sites' ),
					'https://wordpress.org/support/theme/astra/reviews/?filter=5#new-post',
					__( 'Ok, you deserve it', 'astra-sites' ),
					MONTH_IN_SECONDS,
					__( 'Nope, maybe later', 'astra-sites' ),
					__( 'I already did', 'astra-sites' )
				),
				'repeat-notice-after'        => MONTH_IN_SECONDS,
				'priority'                   => 15,
				'display-with-other-notices' => true,
			)
		);
	}

	add_action( 'admin_notices', 'register_notices' );

endif;