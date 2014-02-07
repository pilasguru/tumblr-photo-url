<?php

/**
 * tumblr2.php 
 *
 * Recives tumblr post URL and return its photo
 *
 * @author     ysidorito 
 * @copyright  2014 Rodolfo Pilas
 * @license    http://opensource.org/licenses/MIT  The MIT License (MIT)
 * @link       https://github.com/ysidorito/tumblr-photo-url 
 */

function getImg($postUrl){
 $url = explode("/", $postUrl);
 $data = file_get_contents("htt"."p://".$url[2]."/mobile/post/".$url[4]);
 preg_match_all('<a href="(.*?)">',$data,$matches,PREG_PATTERN_ORDER);
 return $matches[1][0];
}
$imgUrl = getImg($_GET['u']);
$ext = strtolower(array_pop(explode('.',$imgUrl)));
$mime_types = array(
	'png' => 'image/png',
        'jpe' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'jpg' => 'image/jpeg',
        'gif' => 'image/gif',
	); 
header("Content-type:".$mime_types[$ext]);
$photo = file_get_contents($imgUrl);
print_r($photo);
?>
