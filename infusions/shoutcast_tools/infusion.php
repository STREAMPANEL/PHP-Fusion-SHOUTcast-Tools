<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright (C) PHP-Fusion Inc
| https://www.php-fusion.co.uk/
+--------------------------------------------------------+
/*-------------------------------------------------------+
| This Infusion was Developed by
| STREAMPANEL
| Copyright (C) scysys
| https://www.streampanel.net/
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

// The folder in which the infusion resides.
$inf_folder = "shoutcast_tools";

// Require infusions_db.php
require INFUSIONS . "" . $inf_folder . "/infusion_db.php";

// Check if a locale file is available that match the selected locale.
if ( file_exists( INFUSIONS . "" . $inf_folder . "/locale/" . LANGUAGE . ".php" ) ) {
	// Load the locale file matching selection.
	include INFUSIONS . "" . $inf_folder . "/locale/" . LANGUAGE . ".php";
} else {
	// Load the default locale file.
	include INFUSIONS . "" . $inf_folder . "/locale/default.php";
}

// Infusion general information
$inf_title = $locale[ 'SP_infusion_title' ];
$inf_description = $locale[ 'SP_infusion_desc' ];
$inf_version = "1.01";
$inf_developer = "scysys @STREAMPANEL";
$inf_email = "scictools@streampanel.net";
$inf_weburl = $locale[ 'SP_infusion_url' ];

//Administration panel
$inf_adminpanel[ 1 ] = array(
	"title" => $locale[ 'SP_infusion_admin_nav' ],
	"panel" => "admin.php",
	"rights" => "SP"
);

// Multilanguage table for Administration
$inf_mlt[ 1 ] = array(
	"title" => $locale[ 'SP_infusion_title' ],
	"rights" => "SP"
);

// Prepare MySQL Panel Content
$insertnewtable1     = 'require_once INCLUDES . \"infusions_include.php\";$inf_settings = get_settings( \"shoutcast_tools\" );openside( $inf_settings[ \'streambox_name\' ] );echo \'<div align=\"center\">\';echo \'<script src=\"https://www.shoutcast-tools.de/shoutcast/streambox/get/\' . $inf_settings[ \'streambox_id\' ] . \'/\" type=\"text/javascript\"></script>\';echo \'</div>\';closeside();';
$insertnewtable1     = mysql_real_escape_string($insertnewtable1);

$insertnewtable2     = 'require_once INCLUDES . \"infusions_include.php\";$inf_settings = get_settings( \"shoutcast_tools\" );opentable( $inf_settings[ \'tracklist_name\' ] );echo \'<div align=\"center\">\';echo \'<script src=\"https://www.shoutcast-tools.de/shoutcast/history/get/\' . $inf_settings[ \'tracklist_id\' ] . \'/\" type=\"text/javascript\"></script>\';echo \'</div>\';closetable();';
$insertnewtable2     = mysql_real_escape_string($insertnewtable2);

// Infuse insertations
$inf_insertdbrow[ 1 ] = DB_PANELS . " (panel_name, panel_filename, panel_content, panel_side, panel_order, panel_type, panel_access, panel_display, panel_status, panel_url_list,  	panel_restriction) VALUES('" . $locale[ 'SP_infusion_panel1_name' ] . "', '', '$insertnewtable1', '3', '3', 'php', '0', '0', '0', '', '1')";

$inf_insertdbrow[ 2 ] = DB_PANELS . " (panel_name, panel_filename, panel_content, panel_side, panel_order, panel_type, panel_access, panel_display, panel_status, panel_url_list,  	panel_restriction) VALUES('" . $locale[ 'SP_infusion_panel2_name' ] . "', '', '$insertnewtable2', '4', '3', 'php', '0', '0', '0', '', '1')";

$inf_insertdbrow[ 3 ] = DB_SETTINGS_INF . " (settings_name, settings_value, settings_inf) VALUES('streambox_name', '0', '" . $inf_folder . "')";
$inf_insertdbrow[ 4 ] = DB_SETTINGS_INF . " (settings_name, settings_value, settings_inf) VALUES('streambox_id', '0', '" . $inf_folder . "')";

$inf_insertdbrow[ 5 ] = DB_SETTINGS_INF . " (settings_name, settings_value, settings_inf) VALUES('tracklist_name', '0', '" . $inf_folder . "')";
$inf_insertdbrow[ 6 ] = DB_SETTINGS_INF . " (settings_name, settings_value, settings_inf) VALUES('tracklist_id', '0', '" . $inf_folder . "')";

// Defuse cleaning 
$inf_deldbrow[ 1 ] = DB_PANELS . " WHERE panel_name='" . $locale[ 'SP_infusion_panel1_name' ] . "'";
$inf_deldbrow[ 2 ] = DB_PANELS . " WHERE panel_name='" . $locale[ 'SP_infusion_panel2_name' ] . "'";
$inf_deldbrow[ 3 ] = DB_SETTINGS_INF . " WHERE settings_inf='" . $inf_folder . "'";
