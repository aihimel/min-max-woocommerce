<?php
/**
 * Plugin Name: Min Max WooCommerce
 * Plugin Author: Aftabul Islam
 * Text Domain: min-max-woocommerce
 * Version: 1.0.0
 * Description: Minimum & maximum restriction for WooCommerce, WordPress plugin
 * Requires Plugins: woocommerce
 */

defined( 'ABSPATH' ) || exit;

// Constant definitions
defined( 'MIN_MAX_ROOT_DIR' )
	|| define( 'MIN_MAX_ROOT_DIR', __DIR__ );

defined( 'MIN_MAX_TEMPLATE_ROOT' )
	|| define( 'MIN_MAX_TEMPLATE_ROOT', MIN_MAX_ROOT_DIR . '/templates/' );

require_once 'vendor/autoload.php';

use Aihimel\MinMax\MinMaxWooCommerce;

MinMaxWooCommerce::get_instance();
