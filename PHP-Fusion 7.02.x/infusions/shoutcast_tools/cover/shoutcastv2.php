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

// Get Cover
$server = $inf_settings['streamserver_ipaddress'] . ":" . $inf_settings['streamserver_port'];

$url = "$server/stats?sid=1&json=1";

// Initialize cURL
$ch = curl_init();

// Disable SSL verification (only for testing, consider enabling it in production)
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

// Set cURL to return the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Set the URL to fetch
curl_setopt($ch, CURLOPT_URL, $url);

// Execute cURL request
$result = curl_exec($ch);

// Close cURL
curl_close($ch);

$result = json_decode($result, true);

if ($result['songtitle'] == "") {
    // Do nothing if the currently playing song title is empty
} else {
    $actualSongtitle = $result['songtitle'];
    $actualSongtitle2 = strtolower(trim($actualSongtitle));
    echo "<!-- Cover--><img src='https://cover.streampanel.net/cover-api/sp/track.php?title=" . urlencode($actualSongtitle2) . "&size=medium&urlonly=yes' width='" . $inf_settings['cover_size_custom_width'] . "' height='" . $inf_settings['cover_size_custom_height'] . "' alt='" . htmlspecialchars($actualSongtitle) . "' /><!-- Generate Covers that we don't know at this time--><iframe src='https://www.shoutcast-tools.com/external/api/cover/shoutcastv2/$coverSize.php?url=http://" . $inf_settings['streamserver_ipaddress'] . ":" . $inf_settings['streamserver_port'] . "' width='0px' height='0px' style='display:none;'></iframe>";
}
