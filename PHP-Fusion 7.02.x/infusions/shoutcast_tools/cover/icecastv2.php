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

/**
 * Encode data to Base64URL
 * @param string $data
 * @return boolean|string
 */
function base64url_encode( $data ) {
  // First of all you should encode $data to Base64 string
  $b64 = base64_encode( $data );

  // Make sure you get a valid result, otherwise, return FALSE, as the base64_encode() function do
  if ( $b64 === false ) {
    return false;
  }

  // Convert Base64 to Base64URL by replacing “+” with “-” and “/” with “_”
  $url = strtr( $b64, '+/', '-_' );

  // Remove padding character from the end of line and return the Base64URL result
  return rtrim( $url, '=' );
}

// Get Cover
$server = $inf_settings[ 'streamserver_ipaddress' ] . ":" . $inf_settings[ 'streamserver_port' ];

$url = "$server/status-json.xsl";

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
$stats = $result[ 'icestats' ];
$source = $stats[ 'source' ];

if ( $source[ 'title' ] == "" ) {
  // Do nothing
} else {
  $actualSongtitle = $source[ 'title' ];
  $actualSongtitle2 = strtolower( trim( $actualSongtitle ) );
  echo "<!-- Cover--><img src='https://cover.streampanel.net/cover-api/sp/track.php?title=". urlencode($actualSongtitle2) ."&size=medium&urlonly=yes' width='" . $inf_settings[ 'cover_size_custom_width' ] . "' height='" . $inf_settings[ 'cover_size_custom_height' ] . "' alt='" . $actualSongtitle . "' /><!-- Generate Covers that we dont know at this time--><iframe src='https://www.shoutcast-tools.com/external/api/cover/icecastv2/$coverSize.php?url=http://" . $inf_settings[ 'streamserver_ipaddress' ] . ":" . $inf_settings[ 'streamserver_port' ] . "' width='0px' height='0px' style='display:none;'></iframe>";
}

if ( $source[ 0 ][ 'title' ] == "" ) {
  // Do nothing
} else {
  $actualSongtitle = $source[ 0 ][ 'title' ];
  $actualSongtitle2 = strtolower( trim( $actualSongtitle ) );
  echo "<!-- Cover--><img src='https://cover.streampanel.net/cover-api/sp/track.php?title=". urlencode($actualSongtitle2) ."&size=medium&urlonly=yes' width='" . $inf_settings[ 'cover_size_custom_width' ] . "' height='" . $inf_settings[ 'cover_size_custom_height' ] . "' alt='" . $actualSongtitle . "' /><!-- Generate Covers that we dont know at this time--><iframe src='https://www.shoutcast-tools.com/external/api/cover/icecastv2/$coverSize.php?url=http://" . $inf_settings[ 'streamserver_ipaddress' ] . ":" . $inf_settings[ 'streamserver_port' ] . "' width='0px' height='0px' style='display:none;'></iframe>";
}

if ( $source[ 1 ][ 'title' ] == "" ) {
  // Do nothing
} else {
  $actualSongtitle = $source[ 1 ][ 'title' ];
  $actualSongtitle2 = strtolower( trim( $actualSongtitle ) );
  echo "<!-- Cover--><img src='https://cover.streampanel.net/cover-api/sp/track.php?title=". urlencode($actualSongtitle2) ."&size=medium&urlonly=yes' width='" . $inf_settings[ 'cover_size_custom_width' ] . "' height='" . $inf_settings[ 'cover_size_custom_height' ] . "' alt='" . $actualSongtitle . "' /><!-- Generate Covers that we dont know at this time--><iframe src='https://www.shoutcast-tools.com/external/api/cover/icecastv2/$coverSize.php?url=http://" . $inf_settings[ 'streamserver_ipaddress' ] . ":" . $inf_settings[ 'streamserver_port' ] . "' width='0px' height='0px' style='display:none;'></iframe>";
}

if ( $source[ 2 ][ 'title' ] == "" ) {
  // Do nothing
} else {
  $actualSongtitle = $source[ 2 ][ 'title' ];
  $actualSongtitle2 = strtolower( trim( $actualSongtitle ) );
  echo "<!-- Cover--><img src='https://cover.streampanel.net/cover-api/sp/track.php?title=". urlencode($actualSongtitle2) ."&size=medium&urlonly=yes' width='" . $inf_settings[ 'cover_size_custom_width' ] . "' height='" . $inf_settings[ 'cover_size_custom_height' ] . "' alt='" . $actualSongtitle . "' /><!-- Generate Covers that we dont know at this time--><iframe src='https://www.shoutcast-tools.com/external/api/cover/icecastv2/$coverSize.php?url=http://" . $inf_settings[ 'streamserver_ipaddress' ] . ":" . $inf_settings[ 'streamserver_port' ] . "' width='0px' height='0px' style='display:none;'></iframe>";
}