<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = '';
  $name = $_POST["name"];
  $name = trim($name);
  $name = strip_tags($name);
  
  $email = '';
  $email = $_POST["email-contact"];
  $email = trim($email);
  $email = strip_tags($email);
  
  $phone = '';
  $phone = $_POST["phone"];
  $phone = trim($phone);
  $phone = strip_tags($phone);
  
  $message = '';
  $message = $_POST["message"];
  $message = trim($message);
  $message = strip_tags($message);
  
  $fileLocation = "emailMessages/". $email .".txt";
  $myfile = fopen($fileLocation, "w") or die("Unable to open file!");
  $txt = $name . "\n";
  $txt .= $email . "\n";
  $txt .= $phone . "\n";
  $txt .= $message . "\n\n";
  fwrite($myfile, $txt);
  fclose($myfile);

}

?>