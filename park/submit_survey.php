<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  $fileName = '';
  $fileName = $_POST["myID"];
  $gender = '';
  $gender = $_POST["gender"];
  $age = '';
  $age = $_POST["age"];
  $age = trim($age);
  $age = strip_tags($age);
  
  $country = '';
  $country = $_POST["country"];
  $country = trim($country);
  $country = strip_tags($country);
  
  $english = '';
  $english = $_POST["english"];
  $prevAnalysis = '';
  $prevAnalysis = $_POST["prevAnalysis"];
  $diagnosed = '';
  $diagnosed = $_POST["diagnosed"];
  $yearDiagnosis = '';
  $yearDiagnosis = $_POST["yearDiagnosis"];
  $yearDiagnosis = trim($yearDiagnosis);
  $yearDiagnosis = strip_tags($yearDiagnosis);
  $med = '';
  $med = $_POST["medication"];
  $med = trim($med);
  $med = strip_tags($med);
  $medLast = '';
  $medLast = $_POST["lastMedication"];
  $medLast = trim($medLast);
  $medLast = strip_tags($medLast);
  
  $relationship = '';
  $relationship = $_POST["relationship"];
  $degree = '';
  $degree = $_POST["degree"];
  $income = '';
  $income = $_POST["income"];
  $ethnicity = '';
  $ethnicity = $_POST["ethnicity"];
  
  $raceOther = '';
  $raceOther = $_POST["raceOther"];
  $raceOther = trim($raceOther);
  $raceOther = strip_tags($raceOther);
  
  $raceName = '';
  $raceName = $_POST["race"];
  
  $email = '';
  $email = $_POST["email"];
  $email = trim($email);
  $email = strip_tags($email);
  
  $easyUse = '';
  $easyUse = $_POST["easyUse"];
  $understandInstruct = '';
  $understandInstruct = $_POST["understandInstruct"];
  $futureUse = '';
  $futureUse = $_POST["futureUse"];
  $noProblems = '';
  $noProblems = $_POST["noProblems"];
  $helpfulVideos = '';
  $helpfulVideos = $_POST["helpfulVideos"];
  $priorKnowledge = '';
  $priorKnowledge = $_POST["priorKnowledge"];
  $likes = '';
  $likes = $_POST["likes"];
  $likes = trim($likes);
  $likes = strip_tags($likes);
  
  $dislikes = '';
  $dislikes = $_POST["dislikes"];
  $dislikes = trim($dislikes);
  $dislikes = strip_tags($dislikes);
  
  $strengths = '';
  $strengths = $_POST["strengths"];
  $strengths = trim($strengths);
  $strengths = strip_tags($strengths);
  
  $improvements = '';
  $improvements = $_POST["improvements"];
  $improvements = trim($improvements);
  $improvements = strip_tags($improvements);
  
  
  if (empty($fileName)) {
		header('Location: https://www.machinteraction.com/parkinsons/error.html');
        return;
    }
  
  $fileLocation = "surveys/" . $fileName . ".txt";
  $myfile = fopen($fileLocation, "w") or die("Unable to open file!");
  $txt = $fileName . "\n";
  $txt .= "email: " . $email . "\n";
  $txt .= "gender: " . $gender . "\n";
  $txt .= "age: " . $age . "\n";
  $txt .= "country: " . $country . "\n";
  $txt .= "english-first-language: " . $english . "\n";
  $txt .= "previous-automated-analysis: " . $prevAnalysis . "\n";
  $txt .= "diagnosed: " . $diagnosed . "\n";
  $txt .= "year-of-diagnosis: " . $yearDiagnosis . "\n";
  $txt .= "medication: " . $med . "\n";
  $txt .= "last-medication: " . $medLast . "\n";
  $txt .= "relationship: " . $relationship . "\n";
  $txt .= "highest-degree: " . $degree . "\n";
  $txt .= "income: " . $income . "\n";
  $txt .= "ethnicity: " . $ethnicity . "\n";
  
  foreach ($raceName as $race){
	$txt .= "race: " . $race . "\n";
  }
  $txt .= "race-other: " . $raceOther . "\n";
  $txt .= "easy-to-use: " . $easyUse . "\n";
  $txt .= "understood-instructions: " . $understandInstruct . "\n";
  $txt .= "use-in-future: " . $futureUse . "\n";
  $txt .= "no-problems: " . $noProblems . "\n";
  $txt .= "videos-helpful: " . $helpfulVideos . "\n";
  $txt .= "prior-task-knowledge: " . $priorKnowledge . "\n";
  $txt .= "likes: " . $likes . "\n";
  $txt .= "dislikes: " . $dislikes . "\n";
  $txt .= "strengths: " . $strengths . "\n";
  $txt .= "improvements: " . $improvements . "\n";
  fwrite($myfile, $txt);
  fclose($myfile);

  header('Location: https://www.machinteraction.com/parkinsons/survey-complete.html');
}

?>