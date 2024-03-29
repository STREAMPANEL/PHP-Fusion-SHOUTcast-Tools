<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright (C) PHP-Fusion Inc
| https://www.php-fusion.co.uk/
+--------------------------------------------------------+
+--------------------------------------------------------+
| This Infusion was Developed by STREAMPANEL
| Copyright (C) scysys
| https://www.streampanel.net/
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

// Only show for Shoutcast V2, Icecast V2, and Icecast KH
if ($inf_settings['streamserver_type'] == "2" || $inf_settings['streamserver_type'] == "3" || $inf_settings['streamserver_type'] == "4") {
    opentable($locale['sp_infusion_settings_head_8']);
    echo "<form method='post' action='" . FUSION_SELF . $aidlink . "&amp;page=1'>\n";
    echo "<table class='tbl-border' style='width:100%; margin-top:5px;'>\n";
    echo "<tr>\n";
    echo "<td class='tbl2' style='width:100%;' colspan='2'>" . $locale['sp_infusion_settings_head_8_desc'] . "</td>\n";
    echo "</tr>\n<tr>\n";
    echo "<td class='tbl2' style='width:50%;'>" . $locale['sp_infusion_settings_14'] . "<br/><small>" . $locale['sp_infusion_settings_14_desc'] . "</small></td>\n";
    echo "<td class='tbl1'><input type='text' name='cover_name' class='textbox' value='" . $inf_settings['cover_name'] . "' style='width:100%;' /></td>\n";
    echo "</tr>\n<tr>\n";
    echo "<td class='tbl2' style='width:50%;'>" . $locale['sp_infusion_settings_10'] . "<br/><small>" . $locale['sp_infusion_settings_10_desc'] . "<br>\n";
    echo "<ul>\n";
    echo "<li>" . $locale['sp_infusion_settings_10_li_1'] . "</li>\n";
    echo "<li>" . $locale['sp_infusion_settings_10_li_2'] . "</li>\n";
    echo "<li>" . $locale['sp_infusion_settings_10_li_3'] . "</li>\n";
    echo "</ul>\n";
    echo "</small></td>\n";
    echo "<td class='tbl1'>\n";
    echo "<select name='cover_size' class='textbox' style='width:100%;'>\n";
    $coverSizeOptions = ["1", "2", "3"];
    foreach ($coverSizeOptions as $sizeOption) {
        $selected = ($inf_settings['cover_size'] == $sizeOption) ? "selected" : "";
        echo "<option value='$sizeOption' $selected>" . $locale['sp_infusion_settings_cover_size_' . $sizeOption] . "</option>\n";
    }
    echo "</select></td>\n";
    echo "</tr>\n<tr>\n";
    echo "<td class='tbl2' style='width:50%;'>" . $locale['sp_infusion_settings_11'] . "<br/><small>" . $locale['sp_infusion_settings_11_desc'] . "</small></td>\n";
    echo "<td class='tbl1'><input type='text' name='cover_size_custom_width' class='textbox' value='" . $inf_settings['cover_size_custom_width'] . "' style='width:100%;' /></td>\n";
    echo "</tr>\n<tr>\n";
    echo "<td class='tbl2' style='width:50%;'>" . $locale['sp_infusion_settings_12'] . "<br/><small>" . $locale['sp_infusion_settings_12_desc'] . "</small></td>\n";
    echo "<td class='tbl1'><input type='text' name='cover_size_custom_height' class='textbox' value='" . $inf_settings['cover_size_custom_height'] . "' style='width:100%;' /></td>\n";
    echo "</tr>\n<tr>\n";
    echo "<td class='tbl1' colspan='2'><input type='submit' name='st_infusion_settings' value='" . $locale['sp_infusion_submit'] . "' class='button' style='width:100%;' /></td>\n";
    echo "</tr>\n</table>\n";
    echo "</form>\n";
    closetable();

    opentable($locale['sp_infusion_settings_head_9']);
    echo "<div align='left'>\n";
    require_once INFUSIONS . "" . $inf_folder . "/cover/get_cover.php";
    echo "</div>\n";
    closetable();

    opentable($locale['sp_infusion_settings_head_10']);
    echo "<ul>\n";
    echo "<li>" . $locale['sp_infusion_settings_cover_note_1'] . "</li>\n";
    echo "<li>" . $locale['sp_infusion_settings_cover_note_2'] . "</li>\n";
    echo "<li>" . $locale['sp_infusion_settings_cover_note_3'] . "</li>\n";
    echo "</ul>\n";
    closetable();
} else {
    echo "<table class='center' width='80%' cellspacing='0' cellpadding='0'>\n";
    echo "<tbody><tr>\n";
    echo "<td class='tbl'>\n";
    echo "<font color='red'>" . $locale['sp_infusion_shoutcastv1_notsupported'] . "</font>\n";
    echo "<hr></td>\n";
    echo "</tr>\n";
    echo "</tbody></table>\n";
}
