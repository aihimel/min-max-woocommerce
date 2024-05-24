<?php
namespace Aihimel\MinMax;

defined( 'ABSPATH' ) || exit;

/**
 * Manages template loading and template loading API
 *
 * @package aihimel/min-max
 *
 * @since MIN_MAX_SINCE
 */
class Template {

	public static function load( string $path, array $args = [] ) {
		$template_path = MIN_MAX_TEMPLATE_ROOT . $path . '.php';
		if ( file_exists( $template_path ) ) {
			extract( $args, EXTR_SKIP );
			require $template_path;
		} else {
			wp_trigger_error(
				__METHOD__,
				sprintf(
					esc_html__( 'Template file "%1$s" doesn\'t exists.', 'min-max-woocommerce' ),
					$template_path
				)
			);
		}
	}

}