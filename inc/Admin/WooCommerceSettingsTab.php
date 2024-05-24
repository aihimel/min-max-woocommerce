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

	/**
	 * Settings ids
	 *
	 * @since MIN_MAX_SINCE
	 */
	const TITLE_ID = 'min-max-woocommerce-settings-title';
	const MINIMUM_AMOUNT_ID = 'min-max-woocommerce-settings-minimum-amount';
	const MAXIMUM_AMOUNT_ID = 'min-max-woocommerce-settings-maximum-amount';

	public function __construct() {
		add_filter( 'woocommerce_get_sections_products', [ $this, 'add_min_max_menu' ], 11 );
		add_filter( 'woocommerce_get_settings_products', [ $this, 'add_min_max_settings' ], 10, 2 );
	}

	/**
	 * Adds min max settings inside `min-max-settings` tab
	 *
	 * @since MIN_MAX_SINCE
	 *
	 * @param $settings
	 * @param $current_section
	 *
	 * @return mixed
	 */
	public function add_min_max_settings( $settings, $current_section ) {
		if ( ! self::MIN_MAX_SETTINGS_PAGE_KEY === $current_section ) {
			return $settings;
		}
		$settings[] = [
			'name' => __('Cart Amount Settings', 'min-max-woocommerce'),
			'type' => 'title',
			'desc' => __('Set minimum and maximum cart amount for your customers', 'min-max-woocommerce'),
			'id'   => self::TITLE_ID
		];

		$settings[] = [
			'name'     => __('Minimum Amount', 'min-max-woocommerce'),
			'desc_tip' => __('Enter the cart minimum amount for your customers.', 'min-max-woocommerce'),
			'id'       => self::MINIMUM_AMOUNT_ID,
			'type'     => 'text',
			'css'      => 'min-width:300px;',
			'desc'     => __('Cart minimum amount', 'min-max-woocommerce'),
			'default'  => '',
			'placeholder' => 'eg: 30.00'
		];

		$settings[] = [
			'name'     => __('Maximum Amount', 'min-max-woocommerce'),
			'desc_tip' => __('Enter the cart maximum amount for your customers.', 'min-max-woocommerce'),
			'id'       => self::MAXIMUM_AMOUNT_ID,
			'type'     => 'text',
			'css'      => 'min-width:300px;',
			'desc'     => __('Cart maximum amount', 'min-max-woocommerce'),
			'default'  => '',
			'placeholder' => 'eg: 300.00'
		];

		$settings[] = array(
			'type' => 'sectionend',
			'id'   => 'my_custom_product_settings'
		);

		return $settings;
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
}
