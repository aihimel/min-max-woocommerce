<?php
namespace Aihimel\MinMax\Admin;

use Aihimel\MinMax\Template;

defined( 'ABSPATH' ) || exit;

/**
 * Adds WooCommerce settings page
 *
 * @package aihimel/min-max
 *
 * @since MIN_MAX_SINCE
 */
class WooCommerceSettingsTab {

	const INSTANCE_KEY = 'woocommerce-settings-tab';
	const MIN_MAX_SETTINGS_PAGE_KEY = 'min-max-settings';

	public function __construct() {
		add_filter( 'woocommerce_get_sections_products', [ $this, 'add_min_max_menu' ], 11 );
		add_filter( 'woocommerce_settings_products', [ $this, 'render_min_max_settings_page' ], 21 );
	}

	/**
	 * Adds a menu under woocommerce > settings > products
	 *
	 * @since MIN_MAX_SINCE
	 *
	 * @param array $sections
	 *
	 * @return array
	 */
	public function add_min_max_menu( array $sections ) {
		$sections[ self::MIN_MAX_SETTINGS_PAGE_KEY ] = __( 'Min Max', 'min-max-woocommerce' );
		return $sections;
	}

	/**
	 * Renders the settings page
	 *
	 * @since MIN_MAX_SINCE
	 *
	 * @return void
	 */
	public function render_min_max_settings_page() {
		if ( isset( $_GET[ 'section' ] ) ) {
			$section = sanitize_text_field( $_GET[ 'section' ] );
			if ( self::MIN_MAX_SETTINGS_PAGE_KEY === $section ) {
				Template::load( 'admin/settings' );
			}
		}
	}

}