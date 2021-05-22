<?php

/*
Anti revisit by blocking the ip address using htaccess
Deny from $ip
*/
session_start();

if (isset($_SESSION['visit'])) {
   echo "visit one";
   if (isset($_SESSION['visit_two'])) {
      echo "visit two";
      if (isset($_SESSION['visit_three'])) {
         echo "block the ip";
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
