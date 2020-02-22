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
 * There seems to be no real funtion to receive the panel location in php-fusion 7.
 * So i need to get it with mysql
 *
 * !!! ATTENTION !!!
 * Do not change anything on the SHOUTcast Tools panels.
 * Name and content of an panel can be changed over the settings "Infusions - SHOUTcast Tools" only!
 */
// Select from db
$result = dbquery( "SELECT panel_filename, panel_side FROM " . DB_PANELS );

// Prepare output
while ( $row = $result->fetch_assoc() ) {

  // If "Left" panel
  if ( $row[ "panel_filename" ] == "st_streambox_panel"
    and $row[ "panel_side" ] == "1" ) {
    require_once( "infusions/shoutcast_tools/panels/streambox/left.php" );

    // If "Upper Center" panel
  } elseif ( $row[ "panel_filename" ] == "st_streambox_panel"
    and $row[ "panel_side" ] == "2" ) {
    require_once( "infusions/shoutcast_tools/panels/streambox/upper.php" );

    // If "Lower Center" panel
  } elseif ( $row[ "panel_filename" ] == "st_streambox_panel"
    and $row[ "panel_side" ] == "3" ) {
    require_once( "infusions/shoutcast_tools/panels/streambox/lower.php" );

    // "Right" panel was the last one that is possible
  } elseif ( $row[ "panel_filename" ] == "st_streambox_panel"
    and $row[ "panel_side" ] == "4" ) {
    require_once( "infusions/shoutcast_tools/panels/streambox/right.php" );
  }
}