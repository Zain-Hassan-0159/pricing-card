<?php
/**
 * Plugin Name: Pricing Card
 * Description: Pricing Card is a custom widget plugin for elementor.
 * Version:     1.0.0
 * Author:      Zain Hassan
 * Author URI:  https://hassanzain.com/
 * Text Domain: elementor-pricing-card
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if (!defined('PRICING_CARD_WIDGET_URL')) {
    define('PRICING_CARD_WIDGET_URL', plugins_url('/', __FILE__));
}


/**
 * Register Pricing Card.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */
function register_pricing_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/card.php' );

	$widgets_manager->register( new \Elementor_pricingCard_Widget() );

}
add_action( 'elementor/widgets/register', 'register_pricing_widget' );

function elementor_test_widgets_dependencies() {

	/* Scripts */
	wp_register_script( 'pricing-card-js', plugins_url( 'assets/js/pricing-card.js', __FILE__ ) );

	/* Styles */
	wp_register_style( 'pricing-card-css', plugins_url( 'assets/css/pricing-card.css', __FILE__ ) );

}
add_action( 'wp_enqueue_scripts', 'elementor_test_widgets_dependencies' );