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
 * Get Cover settings
 */
require_once INCLUDES . "infusions_include.php";
$inf_settings = get_settings( "shoutcast_tools" );

// Get Cover size
if ( $inf_settings[ 'cover_size' ] == "1" ) {
  $coverSize = "small";
} elseif ( $inf_settings[ 'cover_size' ] == "2" ) {
  $coverSize = "medium";
} else {
  $coverSize = "large";
}

//// Check stream server type
// SHOUTcast V2
if ( $inf_settings[ 'streamserver_type' ] == "2" ) {
  require_once INFUSIONS . "" . $inf_folder . "/cover/shoutcastv2.php";
  // Icecast V2
} elseif ( $inf_settings[ 'streamserver_type' ] == "3" ) {
  require_once INFUSIONS . "" . $inf_folder . "/cover/icecastv2.php";
  // Icecast KH
} elseif ( $inf_settings[ 'streamserver_type' ] == "4" ) {
  require_once INFUSIONS . "" . $inf_folder . "/cover/icecastkh.php";
  // SHOUTcast V1
} else {
  require_once INFUSIONS . "" . $inf_folder . "/cover/shoutcastv1.php";
}