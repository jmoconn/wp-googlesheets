<?php
/**
 * @package  tm_sheets
 */
/**
 * Plugin Name: TM Sheets
 * Description: Fetches and processes data from Google Sheets
 * Author: Teal Media
 * License: GPLv2 or later
 * Text Domain: tm_sheets
 */

defined( 'ABSPATH' ) or die();

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

define( 'TM_SHEETS_PATH', plugin_dir_path( __FILE__ ) );

function tm_get_sheet($sheet_id, $tab) {
	return ( new TmSheets\Sheets() )->get_data( $sheet_id, $tab );
}
