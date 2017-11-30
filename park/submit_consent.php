<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $consent2 = '';
  $fileName = '';
  $consent2 = $_POST["consent2"];
  $fileName = $_POST["myID"];
  
  if (empty($fileName)) {
        echo 'PermissionDeniedErrorNoID';
        return;
    }
  
  $fileLocation = "eConsentForms/" . $fileName . ".txt";
  $myfile = fopen($fileLocation, "w") or die("Unable to open file!");
  $txt = $fileName . "\n";
  $txt .= $consent2 . "\n";
  fwrite($myfile, $txt);
  fclose($myfile);
  
  if($consent2 == 'yes'){
	  header('Location: https://www.machinteraction.com/parkinsons/task1-prep.html');
  }
  else{
	  header('Location: https://www.machinteraction.com/parkinsons/noConsent.html');
  }
}

?>