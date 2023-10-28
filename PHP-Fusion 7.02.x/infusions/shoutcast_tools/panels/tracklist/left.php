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

// Define the infusion folder.
$inf_folder = "shoutcast_tools";

// Include the necessary files.
require INFUSIONS . $inf_folder . "/infusion_db.php";

// Check if a locale file matching the selected locale is available.
$localeFile = file_exists(INFUSIONS . $inf_folder . "/locale/" . LANGUAGE . ".php")
    ? INFUSIONS . $inf_folder . "/locale/" . LANGUAGE . ".php"
    : INFUSIONS . $inf_folder . "/locale/default.php";

include $localeFile;

// Get Tracklist settings from the database.
require_once INCLUDES . "infusions_include.php";
$inf_settings = get_settings("shoutcast_tools");

// Display the Tracklist in a side panel.
openside($inf_settings['tracklist_name']);

// Output can be changed here
echo '<div align="center">';
echo '<script src="https://www.shoutcast-tools.com/shoutcast/history/get/' . $inf_settings['tracklist_id'] . '/" type="text/javascript"></script>';
echo '</div>';

closeside();
