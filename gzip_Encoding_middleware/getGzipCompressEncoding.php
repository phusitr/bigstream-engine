{\rtf1\ansi\ansicpg1252\cocoartf1671\cocoasubrtf600
{\fonttbl\f0\fswiss\fcharset0 Helvetica;}
{\colortbl;\red255\green255\blue255;}
{\*\expandedcolortbl;;}
\paperw11900\paperh16840\margl1440\margr1440\vieww28600\viewh18000\viewkind0
\pard\tx566\tx1133\tx1700\tx2267\tx2834\tx3401\tx3968\tx4535\tx5102\tx5669\tx6236\tx6803\pardirnatural\partightenfactor0

\f0\fs24 \cf0 <?php\
\
\
/*****************************************************\
 * File : getGzipCompreesEncoding.php\
 * Author : phusit Roongroj <phusit@necec.or.th>\
 * Internet Innovation Lab (INO)\
 * National Electronics and Computer Technology Center,NECTEC\
 * Get content and de-compress json file [GZIP Encoding]\
 * 02-11-2019\
 * ***************************************************/\
/* gets the data from a URL */\
\
$config  = file_get_contents ("config.json");\
$o = json_decode ($config,true);;\
\
function get_EncodingGZIPdata($url)\
\{\
	$ch = curl_init();\
	$timeout = 5;\
	curl_setopt($ch, CURLOPT_URL, $url);\
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);\
	curl_setopt($ch,CURLOPT_ENCODING , "deflate,gzip,br");\
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);\
	$data = curl_exec($ch);\
	curl_close($ch);\
	return $data;\
\}\
\
$fp = fopen ("output.json","w+");\
fwrite( $fp, get_EncodingGZIPdata($o['accessurl']));\
fclose ($fp);\
\
?>}