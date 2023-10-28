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
$localeFile = INFUSIONS . $inf_folder . "/locale/" . LANGUAGE . ".php";
if (file_exists($localeFile)) {
    // Load the locale file matching the selection.
    include $localeFile;
} else {
    // Load the default locale file.
    include INFUSIONS . $inf_folder . "/locale/default.php";
}

/*
 * Infusion general information
 */
$inf_title = $locale['sp_infusion_title'];
$inf_description = $locale['sp_infusion_desc'];
$inf_version = "1.3.0";
$inf_developer = "scysys <a href=\"https://www.streampanel.net\" target=\"_blank\" rel=\"noopener\">@STREAMPANEL</a>";
$inf_email = "support@shoutcast-tools.com";
$inf_weburl = $locale['sp_infusion_url'];

/*
 * Administration panel
 */
$inf_adminpanel[1] = [
    "title" => $locale['sp_infusion_admin_nav_1'],
    //"image" => "",
    "panel" => "admin/admin.php",
    "rights" => "SP"
];

/*
 * Multilanguage table for administration
 */
$inf_mlt[1] = [
    "title" => $locale['sp_infusion_title'],
    "rights" => "SP"
];

/*
 * Insert DB
 */

// Streambox content
$insertnewtable1 = <<<EOT
/*
 * There seems to be no real function to receive the panel location in php-fusion 7.
 * So I need to get it with MySQL
 *
 * !!! ATTENTION !!!
 * Do not change anything on the Shoutcast Tools panels.
 * Name and content of a panel can be changed over the settings "Infusions - Shoutcast Tools" only!
 */
require_once(INFUSIONS . "shoutcast_tools/panels/streambox/location.php");
EOT;

// Tracklist content
$insertnewtable2 = <<<EOT
/*
 * There seems to be no real function to receive the panel location in php-fusion 7.
 * So I need to get it with MySQL
 *
 * !!! ATTENTION !!!
 * Do not change anything on the Shoutcast Tools panels.
 * Name and content of a panel can be changed over the settings "Infusions - Shoutcast Tools" only!
 */
require_once(INFUSIONS . "shoutcast_tools/panels/tracklist/location.php");
EOT;

// Cover content
$insertnewtable3 = <<<EOT
/*
 * There seems to be no real function to receive the panel location in php-fusion 7.
 * So I need to get it with MySQL
 *
 * !!! ATTENTION !!!
 * Do not change anything on the Shoutcast Tools panels.
 * Name and content of a panel can be changed over the settings "Infusions - Shoutcast Tools" only!
 */
require_once(INFUSIONS . "shoutcast_tools/panels/cover/location.php");
EOT;

// Insert Streambox panel
$inf_insertdbrow[1] = [
    "table" => DB_PANELS,
    "fields" => [
        "panel_name" => $locale['sp_infusion_panel_1_name'],
        "panel_filename" => 'st_streambox_panel',
        "panel_content" => $insertnewtable1,
        "panel_side" => '4',
        "panel_order" => '3',
        "panel_type" => 'php',
        "panel_access" => '0',
        "panel_display" => '0',
        "panel_status" => '0',
        "panel_url_list" => '',
        "panel_restriction" => '1'
    ]
];

// Insert History panel
$inf_insertdbrow[2] = [
    "table" => DB_PANELS,
    "fields" => [
        "panel_name" => $locale['sp_infusion_panel_2_name'],
        "panel_filename" => 'st_history_panel',
        "panel_content" => $insertnewtable2,
        "panel_side" => '3',
        "panel_order" => '3',
        "panel_type" => 'php',
        "panel_access" => '0',
        "panel_display" => '0',
        "panel_status" => '0',
        "panel_url_list" => '',
        "panel_restriction" => '1'
    ]
];

// Insert Cover panel
$inf_insertdbrow[3] = [
    "table" => DB_PANELS,
    "fields" => [
        "panel_name" => $locale['sp_infusion_panel_3_name'],
        "panel_filename" => 'st_cover_panel',
        "panel_content" => $insertnewtable3,
        "panel_side" => '4',
        "panel_order" => '3',
        "panel_type" => 'php',
        "panel_access" => '0',
        "panel_display" => '0',
        "panel_status" => '0',
        "panel_url_list" => '',
        "panel_restriction" => '1'
    ]
];

// Insert Streambox settings
$inf_insertdbrow[4] = [
    "table" => DB_SETTINGS_INF,
    "fields" => [
        "settings_name" => 'streambox_name',
        "settings_value" => 'Streambox Panel Name (Admin - Infusions - Shoutcast Tools)',
        "settings_inf" => $inf_folder
    ]
];

$inf_insertdbrow[5] = [
    "table" => DB_SETTINGS_INF,
    "fields" => [
        "settings_name" => 'streambox_id',
        "settings_value" => '0',
        "settings_inf" => $inf_folder
    ]
];

// Insert History settings
$inf_insertdbrow[6] = [
    "table" => DB_SETTINGS_INF,
    "fields" => [
        "settings_name" => 'tracklist_name',
        "settings_value" => 'Tracklist Panel Name (Admin - Infusions - Shoutcast Tools)',
        "settings_inf" => $inf_folder
    ]
];

$inf_insertdbrow[7] = [
    "table" => DB_SETTINGS_INF,
    "fields" => [
        "settings_name" => 'tracklist_id',
        "settings_value" => '0',
        "settings_inf" => $inf_folder
    ]
];

// Streamserver settings
$inf_insertdbrow[8] = [
    "table" => DB_SETTINGS_INF,
    "fields" => [
        "settings_name" => 'streamserver_type',
        "settings_value" => '2',
        "settings_inf" => $inf_folder
    ]
];

$inf_insertdbrow[9] = [
    "table" => DB_SETTINGS_INF,
    "fields" => [
        "settings_name" => 'streamserver_ipaddress',
        "settings_value" => '',
        "settings_inf" => $inf_folder
    ]
];

$inf_insertdbrow[10] = [
    "table" => DB_SETTINGS_INF,
    "fields" => [
        "settings_name" => 'streamserver_port',
        "settings_value" => '',
        "settings_inf" => $inf_folder
    ]
];

$inf_insertdbrow[11] = [
    "table" => DB_SETTINGS_INF,
    "fields" => [
        "settings_name" => 'streamserver_password',
        "settings_value" => '',
        "settings_inf" => $inf_folder
    ]
];

$inf_insertdbrow[12] = [
    "table" => DB_SETTINGS_INF,
    "fields" => [
        "settings_name" => 'streamserver_sid',
        "settings_value" => '1',
        "settings_inf" => $inf_folder
    ]
];

$inf_insertdbrow[13] = [
    "table" => DB_SETTINGS_INF,
    "fields" => [
        "settings_name" => 'streamserver_mountpoint',
        "settings_value" => '/stream',
        "settings_inf" => $inf_folder
    ]
];

// Cover settings
$inf_insertdbrow[14] = [
    "table" => DB_SETTINGS_INF,
    "fields" => [
        "settings_name" => 'cover_name',
        "settings_value" => 'Cover Panel Name (Admin - Infusions - Shoutcast Tools)',
        "settings_inf" => $inf_folder
    ]
];

$inf_insertdbrow[15] = [
    "table" => DB_SETTINGS_INF,
    "fields" => [
        "settings_name" => 'cover_size',
        "settings_value" => '2',
        "settings_inf" => $inf_folder
    ]
];

$inf_insertdbrow[16] = [
    "table" => DB_SETTINGS_INF,
    "fields" => [
        "settings_name" => 'cover_size_custom_width',
        "settings_value" => '300px',
        "settings_inf" => $inf_folder
    ]
];

$inf_insertdbrow[17] = [
    "table" => DB_SETTINGS_INF,
    "fields" => [
        "settings_name" => 'cover_size_custom_height',
        "settings_value" => '300px',
        "settings_inf" => $inf_folder
    ]
];

// HTML5 Player

// SSL-Proxy settings

// DJ Images

/*
 * Clean database
 */

// No need for this, but let's make sure I forget nothing
$inf_deldbrow[1] = DB_PANELS . " WHERE panel_name='" . $inf_folder . "'";

// Delete Streambox panel
$inf_deldbrow[2] = DB_PANELS . " WHERE panel_filename='st_streambox_panel'";

// Delete History panel
$inf_deldbrow[3] = DB_PANELS . " WHERE panel_filename='st_history_panel'";

// Delete Cover panel
$inf_deldbrow[4] = DB_PANELS . " WHERE panel_filename='st_cover_panel'";

// Delete settings
$inf_deldbrow[5] = DB_SETTINGS_INF . " WHERE settings_inf='" . $inf_folder . "'";
