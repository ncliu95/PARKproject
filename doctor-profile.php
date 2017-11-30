<?php
session_start();
include_once 'dbconnect.php';

if (isset($_SESSION['ptUserSession'])!="") {
    header("Location: patient-profile.php");
    exit;
} else if (!isset($_SESSION['phyUserSession'])!=""){
    header("Location: index.html");
}

$query = $DBcon->query("SELECT * FROM physicians WHERE user_id=".$_SESSION['phyUserSession']);
$userRow=$query->fetch_array();
$DBcon->close();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome, <?php echo $userRow['first_name'];?>!</title>
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
	.navbar-fixed-left {
		margin-top: 50px;
		width: 300px;
		position: fixed;
		border-radius: 0;
		height: 100%;
	}

	.navbar-fixed-left .navbar-nav > li {
		float: none;  /* Cancel default li float: left */
		width: 300px;
	}

	.navbar-fixed-left + .container {
		padding-left: 160px;
	}

	/* On using dropdown menu (To right shift popuped) */
	.navbar-fixed-left .navbar-nav > li > .dropdown-menu {
		margin-top: -50px;
		margin-left: 140px;
	}
</style>
<script type="text/javascript">
	$(function(){

		$('#slide-submenu').on('click',function() {			        
			$(this).closest('.list-group').fadeOut('slide',function(){
				$('.mini-submenu').fadeIn();	
			});

		});

		$('.mini-submenu').on('click',function(){		
			$(this).next('.list-group').toggle('slide');
			$('.mini-submenu').hide();
		})
	})

</script>
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
	<div class="navbar navbar-default-novid navbar-fixed-left" style="overflow: auto;">
		<a class="navbar-brand" href="#"><b>Your Patients</b></a>
		<ul class="nav navbar-nav">
			<li>
				<a href="#">
					<div class="row">
						<div class="col-md-4">
							<img src="./img/personPlaceholder.svg" class="img-thumbnail" width="50">
							<h6>John Doe</h6>
						</div>
						<div class="col-md-8" style="font-size:12px">
							<span>Age:</span>
							<br>
							<span>Status:</span>
							<br>
							<span>Last Seen: </span>
							<br>
						</div>
					</div>
				</a>
			</li>
			<li>
				<a href="#">
					<div class="row">
						<div class="col-md-4">
							<img src="./img/personPlaceholder.svg" class="img-thumbnail" width="50">
							<h6>John Doe</h6>
						</div>
						<div class="col-md-8" style="font-size:12px">
							<span>Age:</span>
							<br>
							<span>Status:</span>
							<br>
							<span>Last Seen: </span>
							<br>
						</div>
					</div>
				</a>
			</li>
			<li>
				<a href="#">
					<div class="row">
						<div class="col-md-4">
							<img src="./img/personPlaceholder.svg" class="img-thumbnail" width="50">
							<h6>John Doe</h6>
						</div>
						<div class="col-md-8" style="font-size:12px">
							<span>Age:</span>
							<br>
							<span>Status:</span>
							<br>
							<span>Last Seen: </span>
							<br>
						</div>
					</div>
				</a>
			</li>
			<li>
				<a href="#">
					<div class="row">
						<div class="col-md-4">
							<img src="./img/personPlaceholder.svg" class="img-thumbnail" width="50">
							<h6>John Doe</h6>
						</div>
						<div class="col-md-8" style="font-size:12px">
							<span>Age:</span>
							<br>
							<span>Status:</span>
							<br>
							<span>Last Seen: </span>
							<br>
						</div>
					</div>
				</a>
			</li>
			<li>
				<a href="#">
					<div class="row">
						<div class="col-md-4">
							<img src="./img/personPlaceholder.svg" class="img-thumbnail" width="50">
							<h6>John Doe</h6>
						</div>
						<div class="col-md-8" style="font-size:12px">
							<span>Age:</span>
							<br>
							<span>Status:</span>
							<br>
							<span>Last Seen: </span>
							<br>
						</div>
					</div>
				</a>
			</li>
			<li>
				<a href="#">
					<div class="row">
						<div class="col-md-4">
							<img src="./img/personPlaceholder.svg" class="img-thumbnail" width="50">
							<h6>John Doe</h6>
						</div>
						<div class="col-md-8" style="font-size:12px">
							<span>Age:</span>
							<br>
							<span>Status:</span>
							<br>
							<span>Last Seen: </span>
							<br>
						</div>
					</div>
				</a>
			</li>
			<li>
				<a href="#">
					<div class="row">
						<div class="col-md-4">
							<img src="./img/personPlaceholder.svg" class="img-thumbnail" width="50">
							<h6>John Doe</h6>
						</div>
						<div class="col-md-8" style="font-size:12px">
							<span>Age:</span>
							<br>
							<span>Status:</span>
							<br>
							<span>Last Seen: </span>
							<br>
						</div>
					</div>
				</a>
			</li>
		</ul>
	</div>
	<br><br><br><br><br>
	<div class="row">
		<div class="col-md-offset-6 col-md-4">
			<h1>John Doe</h1>
		</div>
	</div>
	<br><br>
	<div class="row">
		<div class="col-md-offset-3 col-md-4">
			<h2>Recent Preformance</h2>
			<img src="./img/1/fingertip/20181130.jpg" class="img-responsive">
			<h3>SEVERITY SCORE: 0</h3>
			<br>
			<button type="button" class="btn btn-warning btn-lg">COMPLETE HISTORY</button>

		</div>
		<div class="col-md-offset-1 col-md-4">
			<h2>Perscribed Medications</h2>
			<span>Medication 1</span>
			<br>
			<span>Medication 2</span>
			<br>
			<span>Medication 3</span>
			<br>
		</div>
	</div>
	<br><br>
	<div class="row">
		<div class="col-md-offset-3 col-md-4">
			<h2>Notes</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent consectetur, massa non ornare convallis, orci dui pellentesque nunc, in faucibus quam risus sed risus.</p><p> Proin ac purus urna. Maecenas laoreet sem quis erat mollis suscipit. In tincidunt velit facilisis vehicula sollicitudin. Proin et neque scelerisque sem imperdiet scelerisque. Duis sed ligula accumsan, laoreet erat ac, faucibus urna. Donec vehicula porttitor felis vel elementum. </p>
		</div>
		<div class="col-md-offset-1 col-md-4">
			<h2>Information</h2>
			<span>Name: </span><br>
			<span>Phone Number: </span><br>
			<span>E-mail: </span><br>
			<span>Next Appointment: </span>
		</div>
	</div>
	</body>
	</html>












