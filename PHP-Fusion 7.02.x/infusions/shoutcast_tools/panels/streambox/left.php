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

if (!defined("IN_FUSION")) {
    die("Access Denied");
}

/*
 * The folder in which the infusion resides.
 */
$inf_folder = "shoutcast_tools";

/*
 * Require infusions_db.php
 */
require INFUSIONS . $inf_folder . "/infusion_db.php";

/*
 * Check if a locale file is available that matches the selected locale.
 */
$localeFile = file_exists(INFUSIONS . $inf_folder . "/locale/" . LANGUAGE . ".php")
    ? INFUSIONS . $inf_folder . "/locale/" . LANGUAGE . ".php"
    : INFUSIONS . $inf_folder . "/locale/default.php";

include $localeFile;

/*
 * Get Streambox settings
 */
require_once INCLUDES . "infusions_include.php";
$inf_settings = get_settings("shoutcast_tools");

/*
 * Streambox
 */
openside($inf_settings['streambox_name']);

// Output can be changed here
echo '<div align="center">';
echo '<script src="https://www.shoutcast-tools.com/shoutcast/streambox/get/' . $inf_settings['streambox_id'] . '/" type="text/javascript"></script>';
echo '</div>';

closeside();
