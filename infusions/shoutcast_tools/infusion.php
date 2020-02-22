<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright (C) PHP-Fusion Inc
| https://www.php-fusion.co.uk/
+--------------------------------------------------------+
+--------------------------------------------------------+
| This Infusion was Developed by
| STREAMPANEL
| Copyright (C) scysys
| https://www.streampanel.net/
| 
| Tested with PHP-Fusion 7.x only!
| 
| Developed with PHP 7.2
| Make sure everything is working when you use another version of php.
| 
| For Support inquires contact me under: support@shoutcast-tools.com
| Support is in English and German only!
+--------------------------------------------------------+
+--------------------------------------------------------+
| This program is released as free software under the
| Affero GPL license. You can redistribute it and/or
| modify it under the terms of this license which you
| can read by viewing the included agpl.txt or online
| at www.gnu.org/licenses/agpl.html. Removal of this
| copyright header is strictly prohibited without
| written permission from the original author(s).
+--------------------------------------------------------*/

if ( !defined( "IN_FUSION" ) ) {
  die( "Access Denied" );
}

/*
 * The folder in which the infusion resides.
 */
$inf_folder = "shoutcast_tools";

/*
 * Require infusions_db.php
 */
require INFUSIONS . "" . $inf_folder . "/infusion_db.php";

/*
 * Check if a locale file is available that match the selected locale.
 */
if ( file_exists( INFUSIONS . "" . $inf_folder . "/locale/" . LANGUAGE . ".php" ) ) {
  // Load the locale file matching selection.
  include INFUSIONS . "" . $inf_folder . "/locale/" . LANGUAGE . ".php";
} else {
  // Load the default locale file.
  include INFUSIONS . "" . $inf_folder . "/locale/default.php";
}

/*
 * Infusion general information
 */
$inf_title = $locale[ 'SP_infusion_title' ];
$inf_description = $locale[ 'SP_infusion_desc' ];
$inf_version = "1.25";
$inf_developer = "scysys <a href=\"https://www.streampanel.net\" target=\"_blank\">@STREAMPANEL</a>";
$inf_email = "support@shoutcast-tools.com";
$inf_weburl = $locale[ 'SP_infusion_url' ];

/*
 * Administration panel
 */
$inf_adminpanel[ 1 ] = array(
  "title" => $locale[ 'SP_infusion_admin_nav_1' ],
  //"image" => "",
  "panel" => "admin/admin.php",
  "rights" => "SP"
);

/*
 * Multilanguage table for administration
 */
$inf_mlt[ 1 ] = array(
  "title" => $locale[ 'SP_infusion_title' ],
  "rights" => "SP"
);

/*
 * Insert DB
 */

// Streambox content
$insertnewtable1 = '/*
 * There seems to be no real funtion to receive the panel location in php-fusion 7.
 * So i need to get it with mysql
 *
 * !!! ATTENTION !!!
 * Do not change anything on the SHOUTcast Tools panels.
 * Name and content of an panel can be changed over the settings "Infusions - SHOUTcast Tools" only!
 */
require_once ("infusions/shoutcast_tools/panels/streambox/location.php");
';
$insertnewtable1 = mysql_real_escape_string( $insertnewtable1 );

// Tracklist content
$insertnewtable2 = '/*
 * There seems to be no real funtion to receive the panel location in php-fusion 7.
 * So i need to get it with mysql
 *
 * !!! ATTENTION !!!
 * Do not change anything on the SHOUTcast Tools panels.
 * Name and content of an panel can be changed over the settings "Infusions - SHOUTcast Tools" only!
 */
require_once ("infusions/shoutcast_tools/panels/tracklist/location.php");
';
$insertnewtable2 = mysql_real_escape_string( $insertnewtable2 );

// Cover content
$insertnewtable3 = '/*
 * There seems to be no real funtion to receive the panel location in php-fusion 7.
 * So i need to get it with mysql
 *
 * !!! ATTENTION !!!
 * Do not change anything on the SHOUTcast Tools panels.
 * Name and content of an panel can be changed over the settings "Infusions - SHOUTcast Tools" only!
 */
require_once ("infusions/shoutcast_tools/panels/cover/location.php");
';
$insertnewtable3 = mysql_real_escape_string( $insertnewtable3 );

// Insert Streambox panel
$inf_insertdbrow[ 1 ] = DB_PANELS . " (panel_name, panel_filename, panel_content, panel_side, panel_order, panel_type, panel_access, panel_display, panel_status, panel_url_list, panel_restriction) VALUES('" . $locale[ 'SP_infusion_panel_1_name' ] . "', 'st_streambox_panel', '$insertnewtable1', '4', '3', 'php', '0', '0', '0', '', '1')";

// Insert History panel
$inf_insertdbrow[ 2 ] = DB_PANELS . " (panel_name, panel_filename, panel_content, panel_side, panel_order, panel_type, panel_access, panel_display, panel_status, panel_url_list, panel_restriction) VALUES('" . $locale[ 'SP_infusion_panel_2_name' ] . "', 'st_history_panel', '$insertnewtable2', '3', '3', 'php', '0', '0', '0', '', '1')";

// Insert Cover panel
$inf_insertdbrow[ 3 ] = DB_PANELS . " (panel_name, panel_filename, panel_content, panel_side, panel_order, panel_type, panel_access, panel_display, panel_status, panel_url_list, panel_restriction) VALUES('" . $locale[ 'SP_infusion_panel_3_name' ] . "', 'st_cover_panel', '$insertnewtable3', '4', '3', 'php', '0', '0', '0', '', '1')";

// Insert Streambox settings
$inf_insertdbrow[ 4 ] = DB_SETTINGS_INF . " (settings_name, settings_value, settings_inf) VALUES('streambox_name', 'Streambox Panel Name (Admin - Infusions - SHOUTcast Tools)', '" . $inf_folder . "')";
$inf_insertdbrow[ 5 ] = DB_SETTINGS_INF . " (settings_name, settings_value, settings_inf) VALUES('streambox_id', '0', '" . $inf_folder . "')";

// Insert History settings
$inf_insertdbrow[ 6 ] = DB_SETTINGS_INF . " (settings_name, settings_value, settings_inf) VALUES('tracklist_name', 'Tracklist Panel Name (Admin - Infusions - SHOUTcast Tools)', '" . $inf_folder . "')";
$inf_insertdbrow[ 7 ] = DB_SETTINGS_INF . " (settings_name, settings_value, settings_inf) VALUES('tracklist_id', '0', '" . $inf_folder . "')";

// Streamserver settings
$inf_insertdbrow[ 8 ] = DB_SETTINGS_INF . " (settings_name, settings_value, settings_inf) VALUES('streamserver_type', '2', '" . $inf_folder . "')";
$inf_insertdbrow[ 9 ] = DB_SETTINGS_INF . " (settings_name, settings_value, settings_inf) VALUES('streamserver_ipaddress', '', '" . $inf_folder . "')";
$inf_insertdbrow[ 10 ] = DB_SETTINGS_INF . " (settings_name, settings_value, settings_inf) VALUES('streamserver_port', '', '" . $inf_folder . "')";
$inf_insertdbrow[ 11 ] = DB_SETTINGS_INF . " (settings_name, settings_value, settings_inf) VALUES('streamserver_password', '', '" . $inf_folder . "')";
$inf_insertdbrow[ 12 ] = DB_SETTINGS_INF . " (settings_name, settings_value, settings_inf) VALUES('streamserver_sid', '1', '" . $inf_folder . "')";
$inf_insertdbrow[ 13 ] = DB_SETTINGS_INF . " (settings_name, settings_value, settings_inf) VALUES('streamserver_mountpoint', '/stream', '" . $inf_folder . "')";

//Cover settings
$inf_insertdbrow[ 14 ] = DB_SETTINGS_INF . " (settings_name, settings_value, settings_inf) VALUES('cover_name', 'Cover Panel Name (Admin - Infusions - SHOUTcast Tools)', '" . $inf_folder . "')";
$inf_insertdbrow[ 15 ] = DB_SETTINGS_INF . " (settings_name, settings_value, settings_inf) VALUES('cover_size', '2', '" . $inf_folder . "')";
$inf_insertdbrow[ 16 ] = DB_SETTINGS_INF . " (settings_name, settings_value, settings_inf) VALUES('cover_size_custom_width', '300px', '" . $inf_folder . "')";
$inf_insertdbrow[ 17 ] = DB_SETTINGS_INF . " (settings_name, settings_value, settings_inf) VALUES('cover_size_custom_height', '300px', '" . $inf_folder . "')";

// HTML5 Player

// SSL-Proxy settings

// DJ Images

/*
 * Clean database
 */

// No need for this, but lets make sure i forget nothing
$inf_deldbrow[ 1 ] = DB_PANELS . " WHERE panel_name='" . $inf_folder . "'";

// Delete streambox panel
$inf_deldbrow[ 2 ] = DB_PANELS . " WHERE panel_filename='st_streambox_panel'";

// Delete history panel
$inf_deldbrow[ 3 ] = DB_PANELS . " WHERE panel_filename='st_history_panel'";

// Delete cover panel
$inf_deldbrow[ 4 ] = DB_PANELS . " WHERE panel_filename='st_cover_panel'";

// Delete settings
$inf_deldbrow[ 5 ] = DB_SETTINGS_INF . " WHERE settings_inf='" . $inf_folder . "'";