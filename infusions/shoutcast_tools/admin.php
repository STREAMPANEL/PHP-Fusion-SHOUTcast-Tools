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

require_once "../../maincore.php";
require_once THEMES . "templates/admin_header.php";

// The folder in which the infusion resides.
$inf_folder = "shoutcast_tools";

// Require infusions_db.php
require INFUSIONS . "" . $inf_folder . "/infusion_db.php";

// Check if a locale file is available that match the selected locale.
if ( file_exists( INFUSIONS . "" . $inf_folder . "/locale/" . $settings[ 'locale' ] . ".php" ) ) {
	// Load the locale file matching selection.
	include INFUSIONS . "" . $inf_folder . "/locale/" . $settings[ 'locale' ] . ".php";
} else {
	// Load the default locale file.
	include INFUSIONS . "" . $inf_folder . "/locale/default.php";
}

// Check if User has rights to Access Admin Area
if ( !checkrights( "ST" ) || !defined( "iAUTH" ) || $_GET[ 'aid' ] != iAUTH ) {
	redirect( "../../index.php" );
}

// Include infusions_include.php
require_once INCLUDES . "infusions_include.php";

// Save Settings
if ( isset( $_POST[ 'st_infusion_settings' ] ) ) {
	if ( isset( $_POST[ 'streambox_name' ] ) ) {
		$setting = set_setting( "streambox_name", $_POST[ 'streambox_name' ], "" . $inf_folder . "" );
	}
	if ( isset( $_POST[ 'streambox_id' ] ) && isnum( $_POST[ 'streambox_id' ] ) ) {
		$setting = set_setting( "streambox_id", $_POST[ 'streambox_id' ], "" . $inf_folder . "" );
	}
	if ( isset( $_POST[ 'tracklist_name' ] ) && $_POST[ 'tracklist_name' ] ) {
		$setting = set_setting( "tracklist_name", $_POST[ 'tracklist_name' ], "" . $inf_folder . "" );
	}
	if ( isset( $_POST[ 'tracklist_id' ] ) && isnum( $_POST[ 'tracklist_id' ] ) ) {
		$setting = set_setting( "tracklist_id", $_POST[ 'tracklist_id' ], "" . $inf_folder . "" );
	}
	redirect( FUSION_SELF . $aidlink . "&amp;status=saved" );
}

// Settings was successfully saved
if ( isset( $_GET[ 'status' ] ) ) {
	if ( $_GET[ 'status' ] == "saved" ) {
		$message = $locale[ 'SP_infusion_settings_saved' ];
	}
}

// Output: Admin Messages
if ( isset( $message ) && $message != "" ) {
	echo "<div id='close-message'><div class='admin-message'>" . $message . "</div></div>\n";
}

// Get Settings from DB
$inf_settings = get_settings( "" . $inf_folder . "" );

// Output AdminArea
opentable( $locale[ 'SP_infusion_settings' ] );
echo "<form method='post' action='" . FUSION_SELF . $aidlink . "'>\n";
echo "<table class='tbl-border' style='width:100%; margin-top:5px;'>\n";
echo "<tr>\n";
echo "<td class='tbl1'>" . $locale[ 'SP_infusion_settings_1' ] . "</td>\n";
echo "<td class='tbl1'><input type='text' name='streambox_name' class='textbox' value='" . $inf_settings[ 'streambox_name' ] . "' /></td>\n";
echo "</tr>\n<tr>\n";
echo "<td class='tbl1'>" . $locale[ 'SP_infusion_settings_2' ] . "</td>\n";
echo "<td class='tbl1'><input type='text' name='streambox_id' class='textbox' value='" . $inf_settings[ 'streambox_id' ] . "' /></td>\n";
echo "</tr>\n<tr>\n";
echo "<td class='tbl1'>" . $locale[ 'SP_infusion_settings_3' ] . "</td>\n";
echo "<td class='tbl1'><input type='text' name='tracklist_name' class='textbox' value='" . $inf_settings[ 'tracklist_name' ] . "' /></td>\n";
echo "</tr>\n<tr>\n";
echo "<td class='tbl1'>" . $locale[ 'SP_infusion_settings_4' ] . "</td>\n";
echo "<td class='tbl1'><input type='text' name='tracklist_id' class='textbox' value='" . $inf_settings[ 'tracklist_id' ] . "' /></td>\n";
echo "</tr>\n<tr>\n";
echo "<td class='tbl1' colspan='2'><input type='submit' name='st_infusion_settings' value='" . $locale[ 'SP_infusion_submit' ] . "' class='button' /></td>\n";
echo "</tr>\n</table>\n";
echo "</form>\n";
closetable();

// Get footer
require_once THEMES . "templates/footer.php";