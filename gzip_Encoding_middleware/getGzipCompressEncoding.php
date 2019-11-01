<?php


/*****************************************************
 * File : getGzipCompreesEncoding.php
 * Author : phusit Roongroj <phusit@necec.or.th>
 * Internet Innovation Lab (INO)
 * National Electronics and Computer Technology Center,NECTEC
 * Get content and de-compress json file [GZIP Encoding]
 * 02-11-2019
 * ***************************************************/
/* gets the data from a URL */

$config  = file_get_contents ("config.json");
$o = json_decode ($config,true);;

function get_EncodingGZIPdata($url)
{
	$ch = curl_init();
	$timeout = 5;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch,CURLOPT_ENCODING , "deflate,gzip,br");
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}

$fp = fopen ("output.json","w+");
fwrite( $fp, get_EncodingGZIPdata($o['accessurl']));
fclose ($fp);
?>
