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

// Define the folder in which the infusion resides.
$inf_folder = "shoutcast_tools";

// Require infusion database file.
require INFUSIONS . $inf_folder . "/infusion_db.php";

// Check if a locale file is available that matches the selected locale.
if (file_exists(INFUSIONS . $inf_folder . "/locale/" . LANGUAGE . ".php")) {
    // Load the locale file matching the selection.
    include INFUSIONS . $inf_folder . "/locale/" . LANGUAGE . ".php";
} else {
    // Load the default locale file.
    include INFUSIONS . $inf_folder . "/locale/default.php";
}

// Get Cover settings
require_once INCLUDES . "infusions_include.php";
$inf_settings = get_settings($inf_folder);

// Get Cover size
$coverSize = "large"; // Default to "large"
if ($inf_settings['cover_size'] == "1") {
    $coverSize = "small";
} elseif ($inf_settings['cover_size'] == "2") {
    $coverSize = "medium";
}

// Check stream server type and include the appropriate cover script
if ($inf_settings['streamserver_type'] == "2") {
    require_once INFUSIONS . $inf_folder . "/cover/shoutcastv2.php";
} elseif ($inf_settings['streamserver_type'] == "3") {
    require_once INFUSIONS . $inf_folder . "/cover/icecastv2.php";
} elseif ($inf_settings['streamserver_type'] == "4") {
    require_once INFUSIONS . $inf_folder . "/cover/icecastkh.php";
} else {
    require_once INFUSIONS . $inf_folder . "/cover/shoutcastv1.php";
}
