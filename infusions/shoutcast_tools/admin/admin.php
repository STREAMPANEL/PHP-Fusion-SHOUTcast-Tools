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

require_once "../../../maincore.php";
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
if ( !checkrights( "SP" ) || !defined( "iAUTH" ) || $_GET[ 'aid' ] != iAUTH ) {
  redirect( "../../../index.php" );
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
  if ( isset( $_POST[ 'streamserver_type' ] ) && isnum( $_POST[ 'streamserver_type' ] ) ) {
    $setting = set_setting( "streamserver_type", $_POST[ 'streamserver_type' ], "" . $inf_folder . "" );
  }
  if ( isset( $_POST[ 'streamserver_ipaddress' ] ) && $_POST[ 'streamserver_ipaddress' ] ) {
    $setting = set_setting( "streamserver_ipaddress", $_POST[ 'streamserver_ipaddress' ], "" . $inf_folder . "" );
  }
  if ( isset( $_POST[ 'streamserver_port' ] ) && isnum( $_POST[ 'streamserver_port' ] ) ) {
    $setting = set_setting( "streamserver_port", $_POST[ 'streamserver_port' ], "" . $inf_folder . "" );
  }
  if ( isset( $_POST[ 'streamserver_password' ] ) && $_POST[ 'streamserver_password' ] ) {
    $setting = set_setting( "streamserver_password", $_POST[ 'streamserver_password' ], "" . $inf_folder . "" );
  }
  if ( isset( $_POST[ 'streamserver_sid' ] ) && isnum( $_POST[ 'streamserver_sid' ] ) ) {
    $setting = set_setting( "streamserver_sid", $_POST[ 'streamserver_sid' ], "" . $inf_folder . "" );
  }
  if ( isset( $_POST[ 'streamserver_mountpoint' ] ) && $_POST[ 'streamserver_mountpoint' ] ) {
    $setting = set_setting( "streamserver_mountpoint", $_POST[ 'streamserver_mountpoint' ], "" . $inf_folder . "" );
  }
  if ( isset( $_POST[ 'cover_name' ] ) && $_POST[ 'cover_name' ] ) {
    $setting = set_setting( "cover_name", $_POST[ 'cover_name' ], "" . $inf_folder . "" );
  }
  if ( isset( $_POST[ 'cover_size' ] ) && isnum( $_POST[ 'cover_size' ] ) ) {
    $setting = set_setting( "cover_size", $_POST[ 'cover_size' ], "" . $inf_folder . "" );
  }
  if ( isset( $_POST[ 'cover_size_custom_width' ] ) && $_POST[ 'cover_size_custom_width' ] ) {
    $setting = set_setting( "cover_size_custom_width", $_POST[ 'cover_size_custom_width' ], "" . $inf_folder . "" );
  }
  if ( isset( $_POST[ 'cover_size_custom_height' ] ) && $_POST[ 'cover_size_custom_height' ] ) {
    $setting = set_setting( "cover_size_custom_height", $_POST[ 'cover_size_custom_height' ], "" . $inf_folder . "" );
  }
  redirect( FUSION_SELF . $aidlink . "&amp;page=" . $_GET[ 'page' ] . "status=saved" );
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

// Generating admin navigation
echo "<table cellpadding='0' cellspacing='1' class='tbl-border' style='text-align:center;width:100%;margin-bottom:1em;'>\n";
echo "<tr>\n";
echo "<td class='" . ( $_GET[ 'page' ] == 1 ? "tbl1" : "tbl2" ) . "' style='width:25%'>" . ( $_GET[ 'page' ] == 1 ? "<strong>" : "" ) . "<a href='" . FUSION_SELF . $aidlink . "&amp;page=1'>" . $locale[ 'SP_infusion_navigation_1' ] . "</a>" . ( $_GET[ 'page' ] == 1 ? "</strong>" : "" ) . "</td>\n";
echo "<td class='" . ( $_GET[ 'page' ] == 2 ? "tbl1" : "tbl2" ) . "' style='width:25%'>" . ( $_GET[ 'page' ] == 2 ? "<strong>" : "" ) . "<a href='" . FUSION_SELF . $aidlink . "&amp;page=2'>" . $locale[ 'SP_infusion_navigation_2' ] . "</a>" . ( $_GET[ 'page' ] == 2 ? "</strong>" : "" ) . "</td>\n";
echo "<td class='" . ( $_GET[ 'page' ] == 3 ? "tbl1" : "tbl2" ) . "' style='width:25%'>" . ( $_GET[ 'page' ] == 3 ? "<strong>" : "" ) . "<a href='" . FUSION_SELF . $aidlink . "&amp;page=3'>" . $locale[ 'SP_infusion_navigation_3' ] . "</a>" . ( $_GET[ 'page' ] == 3 ? "</strong>" : "" ) . "</td>\n";
echo "<td class='" . ( $_GET[ 'page' ] == 4 ? "tbl1" : "tbl2" ) . "' style='width:25%'>" . ( $_GET[ 'page' ] == 4 ? "<strong>" : "" ) . "<a href='" . FUSION_SELF . $aidlink . "&amp;page=4'>" . $locale[ 'SP_infusion_navigation_4' ] . "</a>" . ( $_GET[ 'page' ] == 4 ? "</strong>" : "" ) . "</td>\n";
echo "</tr>\n";
echo "</table>\n";

// Streambox settings
if ( $_GET[ 'page' ] == 2 ) {
  require_once INFUSIONS . "" . $inf_folder . "/admin/streambox.php";

  // Tracklist Settings
} elseif ( $_GET[ 'page' ] == 3 ) {
  require_once INFUSIONS . "" . $inf_folder . "/admin/tracklist.php";

  // Cover setting
} elseif ( $_GET[ 'page' ] == 4 ) {
  require_once INFUSIONS . "" . $inf_folder . "/admin/cover.php";

  //// Streamserver Settings
} else {
  opentable( $locale[ 'SP_infusion_settings_head_3' ] );
  echo "<form method='post' action='" . FUSION_SELF . $aidlink . "&amp;page=1'>\n";
  echo "<table class='tbl-border' style='width:100%; margin-top:5px;'>\n";
  echo "<tr>\n";
  echo "<td class='tbl2' style='width:100%;' colspan='2'>" . $locale[ 'SP_infusion_settings_head_3_desc' ] . "</td>\n";
  echo "</tr>\n<tr>\n";
  echo "<td class='tbl2' style='width:50%;'>" . $locale[ 'SP_infusion_settings_5' ] . "<br/><small>" . $locale[ 'SP_infusion_settings_5_desc' ] . "</small></td>\n";
  echo "<td class='tbl1'>\n";
  echo "<select name='streamserver_type' class='textbox' style='width:100%;'>\n";
  if ( $inf_settings[ 'streamserver_type' ] == "1" ) {
    echo "<option value='1' selected>" . $locale[ 'SP_infusion_settings_streamserver_type_1' ] . "</option>\n";
  } else {
    echo "<option value='1'>" . $locale[ 'SP_infusion_settings_streamserver_type_1' ] . "</option>\n";
  };
  if ( $inf_settings[ 'streamserver_type' ] == "2" ) {
    echo "<option value='2' selected>" . $locale[ 'SP_infusion_settings_streamserver_type_2' ] . "</option>\n";
  } else {
    echo "<option value='2'>" . $locale[ 'SP_infusion_settings_streamserver_type_2' ] . "</option>\n";
  };
  if ( $inf_settings[ 'streamserver_type' ] == "3" ) {
    echo "<option value='3' selected>" . $locale[ 'SP_infusion_settings_streamserver_type_3' ] . "</option>\n";
  } else {
    echo "<option value='3'>" . $locale[ 'SP_infusion_settings_streamserver_type_3' ] . "</option>\n";
  };
  if ( $inf_settings[ 'streamserver_type' ] == "4" ) {
    echo "<option value='4' selected>" . $locale[ 'SP_infusion_settings_streamserver_type_4' ] . "</option>\n";
  } else {
    echo "<option value='4'>" . $locale[ 'SP_infusion_settings_streamserver_type_4' ] . "</option>\n";
  };
  echo "</select></td>\n";
  echo "</tr>\n<tr>\n";
  echo "<td class='tbl2' style='width:50%;'>" . $locale[ 'SP_infusion_settings_6' ] . "<br/><small>" . $locale[ 'SP_infusion_settings_6_desc' ] . "</small></td>\n";
  echo "<td class='tbl1'><input type='text' name='streamserver_ipaddress' class='textbox' value='" . $inf_settings[ 'streamserver_ipaddress' ] . "' style='width:100%;' /></td>\n";
  echo "</tr>\n<tr>\n";
  echo "<td class='tbl2' style='width:50%;'>" . $locale[ 'SP_infusion_settings_7' ] . "<br/><small>" . $locale[ 'SP_infusion_settings_7_desc' ] . "</small></td>\n";
  echo "<td class='tbl1'><input type='number' name='streamserver_port' class='textbox' value='" . $inf_settings[ 'streamserver_port' ] . "' style='width:100%;' /></td>\n";
  echo "</tr>\n<tr>\n";
  // Only show password field for SHOUTcast V1
  if ( $inf_settings[ 'streamserver_type' ] == "1" ) {
    echo "<td class='tbl2' style='width:50%;'>" . $locale[ 'SP_infusion_settings_13' ] . "<br/><small>" . $locale[ 'SP_infusion_settings_13_desc' ] . "</small></td>\n";
    echo "<td class='tbl1'><input type='password' name='streamserver_password' class='textbox' value='" . $inf_settings[ 'streamserver_password' ] . "' style='width:100%;' /></td>\n";
    echo "</tr>\n<tr>\n";
  };
  // Only show SID for SHOUTcast V2 servers
  if ( $inf_settings[ 'streamserver_type' ] == "2" ) {
    echo "<td class='tbl2' style='width:50%;'>" . $locale[ 'SP_infusion_settings_8' ] . "<br/><small>" . $locale[ 'SP_infusion_settings_8_desc' ] . "</small></td>\n";
    echo "<td class='tbl1'><input type='number' name='streamserver_sid' class='textbox' value='" . $inf_settings[ 'streamserver_sid' ] . "' style='width:100%;' /></td>\n";
    echo "</tr>\n<tr>\n";
  };
  // Only show mount point for SHOUTcast V2, Icecast V2 & Icecast KH
  if ( $inf_settings[ 'streamserver_type' ] == "2" || $inf_settings[ 'streamserver_type' ] == "3" || $inf_settings[ 'streamserver_type' ] == "4" ) {
    echo "<td class='tbl2' style='width:50%;'>" . $locale[ 'SP_infusion_settings_9' ] . "<br/><small>" . $locale[ 'SP_infusion_settings_9_desc' ] . "</small></td>\n";
    echo "<td class='tbl1'><input type='text' name='streamserver_mountpoint' class='textbox' value='" . $inf_settings[ 'streamserver_mountpoint' ] . "' style='width:100%;' /></td>\n";
    echo "</tr>\n<tr>\n";
  };
  echo "<td class='tbl1' colspan='2'><input type='submit' name='st_infusion_settings' value='" . $locale[ 'SP_infusion_submit' ] . "' class='button' style='width:100%;' /></td>\n";
  echo "</tr>\n</table>\n";
  echo "</form>\n";
  closetable();

}


echo "<br/>\n";
echo "<div align='center'><small><a href='" . $locale[ 'SP_infusion_url_premium' ] . "' target='_blank'>" . $locale[ 'SP_infusion_footer' ] . "</a></small></div>";

// Get footer
require_once THEMES . "templates/footer.php";