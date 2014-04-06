<?php  session_start();
unset($img);
unset($pass_phrase);
unset($_SESSION['pass_phrase']);
						  define('CAPTCHA_NUM',6);
						  define('CAPTCHA_WIDTH',150);
						  define('CAPTCHA_HEIGHT',40);
						  $pass_phrase='';
						  for($i=0;$i<CAPTCHA_NUM;$i++){
							  $k=rand(0,1);
							  $pass_phrase.= $k==1?chr(rand(97,122)):rand(0,9);
						  }
						  $_SESSION['pass_phrase']= sha1($pass_phrase);
						  $img = imagecreatetruecolor(CAPTCHA_WIDTH,CAPTCHA_HEIGHT);
						  $bg_color=imagecolorallocate($img,255,255,255);
						  $text_color=imagecolorallocate($img,234,89,77);
						  $graphic_color = imagecolorallocate($img,0,0,0);
						  imagefilledrectangle($img,0,0,CAPTCHA_WIDTH,CAPTCHA_HEIGHT,$bg_color);
						  for($i=0;$i<6;$i++){
							  imageline($img,0,rand()%CAPTCHA_HEIGHT,CAPTCHA_WIDTH,rand()%CAPTCHA_HEIGHT,$graphic_color);
						  }
						  for($i=0;$i<50;$i++){
							  imagesetpixel($img,rand()%CAPTCHA_WIDTH,rand()%CAPTCHA_HEIGHT,$graphic_color);
						  }
						  imagettftext($img,24,0,20,CAPTCHA_HEIGHT-10,$text_color,"Courier New Bold.ttf",$pass_phrase);
						  imagegif($img);
						  header("Content-Type: image/gif");
						  
						  imagedestroy($img);
						
?>