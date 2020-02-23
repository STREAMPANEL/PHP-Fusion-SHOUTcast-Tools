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

// Get Cover
$server = $inf_settings[ 'streamserver_ipaddress' ] . ":" . $inf_settings[ 'streamserver_port' ];

$url = "$server/stats?sid=1&json=1";
//  Initiate curl
$ch = curl_init();
// Disable SSL verification
curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
// Will return the response, if false it print the response
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
// Set the url
curl_setopt( $ch, CURLOPT_URL, $url );
// Execute
$result = curl_exec( $ch );
// Closing
curl_close( $ch );

$result = json_decode( $result, true );

if ( $result[ 'songtitle' ] == "" ) {
  // Do nothing
} else {
  $actualSongtitle = $result[ 'songtitle' ];
  $actualSongtitle2 = strtolower( trim( $actualSongtitle ) );
  echo "<!-- Cover--><img src='https://www.shoutcast-tools.com/cached/cover/sp/$coverSize/" . base64_encode( $actualSongtitle2 ) . ".jpg' width='" . $inf_settings[ 'cover_size_custom_width' ] . "' height='" . $inf_settings[ 'cover_size_custom_height' ] . "' alt='" . $actualSongtitle . "' /><!-- Generate Covers that we dont know at this time--><iframe src='https://www.shoutcast-tools.com/external/api/cover/shoutcastv2/$coverSize.php?url=http://" . $inf_settings[ 'streamserver_ipaddress' ] . ":" . $inf_settings[ 'streamserver_port' ] . "' width='0px' height='0px' style='display:none;'></iframe>";
}