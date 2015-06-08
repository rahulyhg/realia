<?php

/*
Plugin Name: Realia
Version: 0.4.0
Description: Complete real estate office in WordPress plugin. Realia is covering all needs of real estate agencies or portals. No problem for Realia to turn your website into directory solution with payment options. It allows you to create and customize website in just few clicks by using setting manager in customizer. For full list of plugin features visit <a href="http://wprealia.com">wprealia.com</a>.
Author: Pragmatic Mates
Author URI: http://wprealia.com
Text Domain: realia
Domain Path: /languages/
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

if ( ! class_exists( 'Realia' ) ) {
    /**
     * Class Realia
     *
     * @class Realia
     * @package Realia
     * @author Pragmatic Mates
     */
    final class Realia {
        /**
         * Initialize Realia plugin
         */
        public function __construct() {
            $this->constants();
            $this->libraries();
            $this->includes();
	        $this->load_plugin_textdomain();

            add_action( 'tgmpa_register', array( __CLASS__, 'register_plugins' ) );
        }

        /**
         * Defines constastants
         *
         * @access public
         * @return void
         */
        public function constants() {
            define( 'REALIA_DIR', plugin_dir_path( __FILE__ ) );
            define( 'REALIA_PROPERTY_PREFIX', 'property_' );
            define( 'REALIA_AGENCY_PREFIX', 'agency_' );
            define( 'REALIA_AGENT_PREFIX', 'agent_' );
            define( 'REALIA_TRANSACTION_PREFIX', 'transaction_' );
            define( 'REALIA_PACKAGE_PREFIX', 'user_' );
            define( 'REALIA_USER_PREFIX', 'user_' );
            define( 'REALIA_RECAPTCHA_URL', 'https://www.google.com/recaptcha/api/siteverify' );

	        define( 'REALIA_CONTRACT_SALE', 'SALE' );
	        define( 'REALIA_CONTRACT_RENT', 'RENT' );
        }

        /**
         * Include classes
         *
         * @access public
         * @return void
         */
        public function includes() {
	        require_once REALIA_DIR . 'includes/class-realia-utilities.php';
            require_once REALIA_DIR . 'includes/class-realia-recaptcha.php';
            require_once REALIA_DIR . 'includes/class-realia-template-loader.php';
            require_once REALIA_DIR . 'includes/class-realia-post-types.php';
            require_once REALIA_DIR . 'includes/class-realia-taxonomies.php';
            require_once REALIA_DIR . 'includes/class-realia-customizations.php';
            require_once REALIA_DIR . 'includes/class-realia-query.php';
            require_once REALIA_DIR . 'includes/class-realia-price.php';
            require_once REALIA_DIR . 'includes/class-realia-scripts.php';
            require_once REALIA_DIR . 'includes/class-realia-widgets.php';
            require_once REALIA_DIR . 'includes/class-realia-filter.php';
            require_once REALIA_DIR . 'includes/class-realia-pages.php';
            require_once REALIA_DIR . 'includes/class-realia-currencies.php';
            require_once REALIA_DIR . 'includes/class-realia-shortcodes.php';
            require_once REALIA_DIR . 'includes/class-realia-google-maps-styles.php';
            require_once REALIA_DIR . 'includes/class-realia-packages.php';
	        require_once REALIA_DIR . 'includes/class-realia-api.php';

	        if ( Realia_Utilities::is_paypal_enabled() ) {
		        require_once REALIA_DIR . 'includes/class-realia-paypal.php';
	        }
        }

        /**
         * Loads third party libraries
         *
         * @access public
         * @return void
         */
        public static function libraries() {
            require_once REALIA_DIR . 'libraries/cmb_field_map/cmb-field-map.php';
            require_once REALIA_DIR . 'libraries/cmb2-attached-posts/cmb2-attached-posts.php';
            require_once REALIA_DIR . 'libraries/class-tgm-plugin-activation.php';
        }

	    /**
	     * Loads localization files
         *
         * @access public
         * @return void
	     */
	    public function load_plugin_textdomain() {
		    load_plugin_textdomain( 'realia', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
	    }

        /**
         * Access public
         *
         * @access public
         * @return void
         */
        public static function register_plugins() {
            $plugins = array(
	            array(
		            'name'      => 'CMB2',
		            'slug'      => 'cmb2',
		            'required'  => false,
	            ),
                array(
                    'name'      => 'WP REST API (WP API)',
                    'slug'      => 'json-rest-api',
                    'required'  => false,
                ),
            );

            tgmpa( $plugins );
        }
    }
}

new Realia();
