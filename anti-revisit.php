<?php
@session_start();

if (isset($_SERVER['HTTP_CLIENT_IP'])) {
	$ip = $_SERVER['HTTP_CLIENT_IP'];
}
elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
}
elseif (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
	$ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
}
else {
	$ip = $_SERVER['REMOTE_ADDR'];
}

if (isset($_SESSION['visit'])) {
   if (isset($_SESSION['visit_two'])) {
      if (isset($_SESSION['visit_three'])) {
         $zCh = fopen(".htaccess", "a");
			fwrite($zCh, "Deny from " . $ip . "\n");
			fclose($zCh);
			header('HTTP/1.1 404 Not Found');
      }
      else {
         $_SESSION['visit_three'] = "three";
      }
   }
   else {
      $_SESSION['visit_two'] = "two";
   }
}
else {
   $_SESSION['visit'] = "one";
}

?>
