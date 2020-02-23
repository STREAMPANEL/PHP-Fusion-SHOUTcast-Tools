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

// Only show for SHOUTcast V1, SHOUTcast V2
if ( $inf_settings[ 'streamserver_type' ] == "1" || $inf_settings[ 'streamserver_type' ] == "2" ) {

  opentable( $locale[ 'SP_infusion_settings_head_2' ] );
  echo "<form method='post' action='" . FUSION_SELF . $aidlink . "&amp;page=3'>\n";
  echo "<table class='tbl-border' style='width:100%; margin-top:5px;'>\n";
  echo "<tr>\n";
  echo "<td class='tbl2' style='width:100%;' colspan='2'>" . $locale[ 'SP_infusion_settings_head_2_desc' ] . "</td>\n";
  echo "</tr>\n<tr>\n";
  echo "<td class='tbl2' style='width:50%;'>" . $locale[ 'SP_infusion_settings_3' ] . "<br/><small>" . $locale[ 'SP_infusion_settings_3_desc' ] . "</small></td>\n";
  echo "<td class='tbl1'><input type='text' name='tracklist_name' class='textbox' value='" . $inf_settings[ 'tracklist_name' ] . "' style='width:100%;' /></td>\n";
  echo "</tr>\n<tr>\n";
  echo "<td class='tbl2' style='width:50%;'>" . $locale[ 'SP_infusion_settings_4' ] . "<br/><small>" . $locale[ 'SP_infusion_settings_4_desc' ] . "</small></td>\n";
  echo "<td class='tbl1'><input type='number' name='tracklist_id' class='textbox' value='" . $inf_settings[ 'tracklist_id' ] . "' style='width:100%;' /></td>\n";
  echo "</tr>\n<tr>\n";
  echo "<td class='tbl1' colspan='2'><input type='submit' name='st_infusion_settings' value='" . $locale[ 'SP_infusion_submit' ] . "' class='button' style='width:100%;' /></td>\n";
  echo "</tr>\n</table>\n";
  echo "</form>\n";
  closetable();

  opentable( $locale[ 'SP_infusion_settings_head_5' ] );
  echo "<div align='center'>\n";
  echo "<script src='https://www.shoutcast-tools.com/shoutcast/history/get/" . $inf_settings[ 'tracklist_id' ] . "/' type='text/javascript'></script>\n";
  echo "</div>\n";
  closetable();

  opentable( $locale[ 'SP_infusion_settings_head_7' ] );
  echo "<ul>\n";
  echo "<li>" . $locale[ 'SP_infusion_settings_tracklist_note_1' ] . "</li>\n";
  echo "<li>" . $locale[ 'SP_infusion_settings_tracklist_note_2' ] . "</li>\n";
  echo "</ul>\n";
  closetable();

} else {
  echo "<table class='center' width='80%' cellspacing='0' cellpadding='0'>\n";
  echo "<tbody><tr>\n";
  echo "<td class='tbl'>\n";
  echo "<font color='red'>" . $locale[ 'SP_infusion_icecast_notsupported' ] . "</font>\n";
  echo "<hr></td>\n";
  echo "</tr>\n";
  echo "</tbody></table>\n";
}