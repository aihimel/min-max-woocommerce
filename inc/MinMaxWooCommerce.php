<?php
namespace Aihimel\MinMax;

defined( 'ABSPATH' ) || exit;

/**
 * Main plugin object
 *
 * @package aihimel/min-max
 *
 * @since MIN_MAX_SINCE
 */
final class MinMaxWooCommerce {
	private static $instance = null;
	private static $container = [];

	/**
	 * Initializes the objects and puts it inside container for future use
	 *
	 * @since MIN_MAX_SINCE
	 *
	 * @return void
	 */
	private function __construct() {

	}

	/**
	 * Returns main plugin object or container object if available
	 *
	 * @since MIN_MAX_SINCE
	 *
	 * @param string $key
	 *
	 * @return mixed|self|null
	 */
	public static function get_instance( string $key = '' ) {
		if ( empty( $key ) ) {
			if ( self::$instance === null ) {
				self::$instance = new self();
			}
			return self::$instance;
		} else {
			return self::$container[ $key ] ?? null;
		}
	}
}