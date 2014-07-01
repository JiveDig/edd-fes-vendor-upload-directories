<?php
/**
 * Easy Digital Downloads - FES Vendor Upload Directories
 *
 * @package           EDD_FES_Vendor_Upload_Directories
 * @author            Mike Hemberger
 * @license           GPL-2.0+
 * @link              http://thestizmedia.com
 * @copyright         2013 Mike Hemberger
 *
 * Plugin Name:       Easy Digital Downloads - FES Vendor Upload Directories
 * Plugin URI:        TBD
 * Description:       An add-on for Easy Digital Downloads and Frontend Submissions to create separate upload directories for each vendor.
 * Version:           1.0.0
 * Requires: 		  Easy Digital Downloads and Frontend Submissions
 * Author:            Mike Hemberger
 * Author URI:        http://thestizmedia.com
 * Text Domain:       edd-fes-vendor-upload-directories
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/cdils/genesis-style-trump
 * GitHub Branch:     master
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
    die;
}

/** Check if Easy Digital Downloads and Frontend Submissions is active */
if ( class_exists('Easy_Digital_Downloads') && class_exists('EDD_Front_End_Submissions') ) {

	add_action( 'genesis_setup', 'genesisstyletrump_load_stylesheet' );
	/**
	 * Move Genesis child theme style sheet to a much later priority to give any plugins a chance to load first.
	 *
	 * @since 1.0.0
	 */
	function genesisstyletrump_load_stylesheet() {

		// If Parallax Pro theme is active, enqueue Genesis Style Trump at earlier priority
		$priority = 'Parallax Pro Theme' == wp_get_theme() ? 14 : 999;

		remove_action( 'genesis_meta', 'genesis_load_stylesheet' );
		add_action( 'wp_enqueue_scripts', 'genesis_enqueue_main_stylesheet', $priority );
	}

	/**
	 * Allow FES upload directory override
	 *
	 * @since 1.0.0
	 */
	apply_filters( 'override_default_fes_dir', true );

	/**
	 * Add user nicename directory to all uploads
	 *
	 * @since 1.0.0
	 */
	add_filter( 'upload_dir', 'vud_set_upload_dir' );
	function vud_set_upload_dir( $upload ) {
	$user          = wp_get_current_user();
	$user_nicename = $user->user_nicename;

		$upload['subdir'] = '/edd/';
		$upload['path']   = $upload['basedir'] . $upload['subdir'] . strtolower($user_nicename);
		$upload['url']	  = $upload['baseurl'] . $upload['subdir'] . strtolower($user_nicename);

		return $upload;

	}

}