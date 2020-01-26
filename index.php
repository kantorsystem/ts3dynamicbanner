<?php
	include('includes/config.inc.php');
	date_default_timezone_set('Europe/Budapest');
	putenv('GDFONTPATH=' . realpath('fonts/'));
	require_once("libraries/TeamSpeak3/TeamSpeak3.php");
	TeamSpeak3::init();
	$imgname;
	$date = date("m");
	function LoadBanner($date,$server_user,$server_password,$server_ip,$server_query_port,$server_port)
	{
		$ts3 = TeamSpeak3::factory("serverquery://" . $server_user . ":" . $server_password . "@" . $server_ip . ":" . $server_query_port . "/?server_port=" . $server_port . "");
		$max = $ts3->getProperty("virtualserver_maxclients");
		$count = $ts3->getProperty("virtualserver_clientsonline") - $ts3->getProperty("virtualserver_queryclientsonline");
		$clock = date("H:i");
		if($date == 12){
			$im = @imagecreatefrompng('images/12.png');
			$textcolor = imagecolorallocate($im, 0xFF, 0xFF, 0xFF);
			imagettftext ( $im, 33, 0, 298, 265, $textcolor, 'font.ttf' , "Kellemes 0 ünnepeket!");
			imagettftext ( $im, 20, 0, 25, 265, $textcolor, 'font2.ttf' , "Idő: " . $clock);
			imagettftext ( $im, 20, 0, 765, 265, $textcolor, 'font2.ttf' , "Online: " . $count . '/' . $max);
		}
		if($date == 01){
			$im = @imagecreatefrompng('images/01.png');
			$textcolor = imagecolorallocate($im, 0xFF, 0xFF, 0xFF);
			imagettftext ( $im, 18, 0, 27, 40, $textcolor, 'font2.ttf' , "Idő: " . $clock);
			imagettftext ( $im, 16, 0, 19, 94, $textcolor, 'font2.ttf' , "Online: " . $count . '/' . $max);
		}		
		if($date == 02){
			$im = @imagecreatefrompng('images/02.png');
			$textcolor = imagecolorallocate($im, 0xFF, 0xFF, 0xFF);
			imagettftext ( $im, 18, 0, 20, 50, $textcolor, 'font2.ttf' , "Idő: " . $clock);
			imagettftext ( $im, 18, 0, 7, 135, $textcolor, 'font2.ttf' , "Online: " . $count . '/' . $max);
		}
		if($date == 03){
			$im = @imagecreatefrompng('images/03.png');
			$textcolor = imagecolorallocate($im, 0xFF, 0xFF, 0xFF);
			imagettftext ( $im, 20, 0, 770, 40, $textcolor, 'font2.ttf' , "Idő: " . $clock);
			imagettftext ( $im, 20, 0, 755, 117, $textcolor, 'font2.ttf' , "Online: " . $count . '/' . $max);
		}		
		if($date == 04){
			$im = @imagecreatefrompng('images/04.png');
		}		
		if($date == 05){
			$im = @imagecreatefrompng('images/05.png');
			$textcolor = imagecolorallocate($im, 0xFF, 0xFF, 0xFF);
			imagettftext ( $im, 20, 0, 15, 274, $textcolor, 'font2.ttf' , "Idő: " . $clock);
			imagettftext ( $im, 20, 0, 160, 274, $textcolor, 'font2.ttf' , "Online: " . $count . '/' . $max);
		}		
		if($date == 06){
			$im = @imagecreatefrompng('images/06.png');
		}		
		if($date == 07){
			$im = @imagecreatefrompng('images/07.png');
			$textcolor = imagecolorallocate($im, 0xFF, 0xFF, 0xFF);
			imagettftext ( $im, 18, 0, 20, 40, $textcolor, 'font2.ttf' , "Idő: " . $clock);
			imagettftext ( $im, 15, 0, 18, 85, $textcolor, 'font2.ttf' , "Online: " . $count . '/' . $max);
		}
		if(!$im)
		{
			$im = imagecreatetruecolor (150, 30);
			$bgc = imagecolorallocate ($im, 255, 255, 255);
			$tc = imagecolorallocate ($im, 0, 0, 0);
			imagefilledrectangle ($im, 0, 0, 150, 30, $bgc);
			imagestring ($im, 1, 5, 5, 'Not found this season!', $tc);
		}

		return $im;
	}
	header('Content-Type: image/png');
	$img = LoadBanner($date,$server_user,$server_password,$server_ip,$server_query_port,$server_port);
	imagepng($img);
	imagedestroy($img);
?>