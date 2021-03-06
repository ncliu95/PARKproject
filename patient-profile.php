<?php
session_start();
include_once 'dbconnect.php';

if (!isset($_SESSION['ptUserSession'])!="") {
    header("Location: index.html");
    exit;
} else if (isset($_SESSION['phyUserSession'])!=""){
    header("Location: doctor-profile.php");
}

$query = $DBcon->query("SELECT * FROM patients WHERE user_id=".$_SESSION['ptUserSession']);
$userRow=$query->fetch_array();
$DBcon->close();

//$command = escapeshellcmd('cd ../../Applications/AMPPS/www/PARKproject/ && sudo python test.py');
$output = shell_exec('python test.py');
echo '<script type="text/javascript">alert('.$output.');</script>';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome, <?php echo $userRow['first_name']; ?>!</title>
	<meta charset="utf-8">
    <meta name="description" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="generator" content="Codeply">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/animate.min.css" />
    <link rel="stylesheet" href="./css/ionicons.min.css" />
    <link rel="stylesheet" href="./css/styles.css" />
    <style type="text/css">
    	.container {
    		margin-top: 100px;
    	}
        h1 {
            font-size: 45px;
        }
    </style>
</head>
<body>
	<nav id="topNav" class="navbar navbar-default-novid navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-collapse collapse" id="bs-navbar">
                <ul class="nav navbar-nav">
                    <li>
                        <a id="navtext-main" class="navbar-brand-novid page-scroll" href="./index.html">PARK</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a id="navtext" class="page-scroll" href="./logout.php">LOGOUT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
    	<div class="row">
    		<div class = "col-md-8 col-md-offset-2" style="text-align: center;">
    			<h1><b><u>RECENT PREFORMANCE</u></b></h1>
    		</div>
		</div>
		<div class="row">
			<?php 
				$user_id = $_SESSION['ptUserSession'];
				$dir1 = "./img/".$user_id."/fist/";
				$dir2 = "./img/".$user_id."/fingertip/";
				$dir3 = "./img/".$user_id."/prosup/";

				$recent1 = scandir($dir1, 1);
				$recent2 = scandir($dir2, 1);
				$recent3 = scandir($dir3, 1);

				$path1 = $dir1 . $recent1[0];
				$path2 = $dir2 . $recent2[0];
				$path3 = $dir3 . $recent3[0];
				
				echo "<script>console.log( 'Path1: " . $path1 . "' );</script>";
				echo "<script>console.log( 'Path1: " . $path2 . "' );</script>";
				echo "<script>console.log( 'Path1: " . $path3 . "' );</script>";
			?>
			<div class="col-md-4">
				<img src="<?php echo $path1; ?>" class="img-responsive">
			</div>
			<div class="col-md-4">
				<img src="<?php echo $path2; ?>" class="img-responsive">
			</div>
			<div class="col-md-4">
				<img src="<?php echo $path3; ?>" class="img-responsive">
			</div>
		</div>
        <div class="row">
            <div class="col-md-4" style="text-align: center;">
                <h3><b>SEVERITY SCORE: 2</b></h3>
            </div>
            <div class="col-md-4" style="text-align: center;">
                <h3><b>SEVERITY SCORE: 0</b></h3>
            </div>
            <div class="col-md-4" style="text-align: center;">
                <h3><b>SEVERITY SCORE: 1</b></h3>
            </div>
        </div>
		<br><br><br>
		<div class="row">
			<div class = "col-md-3 col-md-offset-2">
    			<button type="button" class="btn btn-warning btn-xl">COMPLETE HISTORY</button>
    		</div>
    		<div class = "col-md-3 col-md-offset-1">
    			<button type="button" class="btn btn-success btn-xl" onclick="location.href='./park/task1-prep.html';">TAKE NEW MEASUREMENT</button>
    		</div>
    	</div>
    	<br><br><br>
    	<div class="row">
    		<div class = "col-md-8 col-md-offset-2" style="text-align: center;">
    			<h1><b><u>MEDICATION</u></b></h1>
    		</div>
    		<div class = "col-md-8 col-md-offset-2">
    			<div class="form-group">
					<h3>Which of the following have you taken recently?<h3>
					<div class="checkbox">
						<label><input type="checkbox" value="">RX #1</label>
					</div>
					<div class="checkbox">
						<label><input type="checkbox" value="">RX #2<label>
					</div>
					<div class="checkbox disabled">
						<label><input type="checkbox" value="">RX #3</label>
					</div>
					<button type="button" class="btn btn-success btn-xl">SUBMIT</button>
				</div>
    		</div>
		</div>
    </div>
</body>
</html>