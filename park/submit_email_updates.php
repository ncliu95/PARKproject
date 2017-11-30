<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = '';
  $email = $_POST["email"];
  $email = trim($email);
  $email = strip_tags($email);
  
  $fileLocation = "emailListFutureUpdates/". $email .".txt";
  $myfile = fopen($fileLocation, "w") or die("Unable to open file!");
  $txt = $email . "\n";
  fwrite($myfile, $txt);
  fclose($myfile);

}

?>