<?php
/**
 * Easy Digital Downloads - FES Vendor Upload Directories
 *
 * @package           EDD_FES_Vendor_Upload_Directories
 * @author            Mike Hemberger
 * @license           GPL-2.0+
 * @link              http://thestizmedia.com
 * @copyright         2014 Mike Hemberger
 *
 * Plugin Name:       Easy Digital Downloads - FES Vendor Upload Directories
 * Plugin URI:        TBD
 * Description:       An add-on for Easy Digital Downloads and Frontend Submissions to create separate upload directories for each vendor.
 * Version:           1.0
 * Requires:          Easy Digital Downloads and Frontend Submissions
 * Author:            Mike Hemberger and Chris Christoff
 * Author URI:        http://thestizmedia.com
 * Text Domain:       edd-fes-vendor-upload-directories
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/JiveDig/edd-fes-vendor-upload-directories
 * GitHub Branch:     master
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
    die;
}

/** Check if Easy Digital Downloads and Frontend Submissions is active */
if ( class_exists('Easy_Digital_Downloads') && class_exists('EDD_Front_End_Submissions') ) {

	/**
	 * Allow FES upload directory override
	 *
	 * @since 1.0
	 */
	apply_filters( 'override_default_fes_dir', true );

	/**
	 * Add user nicename directory to all uploads
	 *
	 * @since 1.0
	 */
	add_filter( 'upload_dir', 'vud_set_upload_dir' );
	function vud_set_upload_dir( $upload ) {
		$user          = wp_get_current_user();
		$user_nicename = $user->user_nicename;
		$upload['subdir'] = '/edd/';

		if ( EDD_FES()->vendors->vendor_is_vendor() && !EDD_FES()->vendors->vendor_is_admin() && wp_script_is( 'fes_form', $list = 'enqueued' ) ) {
			$custom_dir = $upload['subdir'] . strtolower($user_nicename);
		} else {
			$custom_dir = '';
		}

		$upload['path']   = $upload['basedir'] . $custom_dir;
		$upload['url']	  = $upload['baseurl'] . $custom_dir;

		return $upload;
	}

}
