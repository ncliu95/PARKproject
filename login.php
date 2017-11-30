<?php
session_start();
require_once 'dbconnect.php';

if (isset($_SESSION['ptUserSession'])!="") {
    header("Location: patient-profile.php");
    exit;
} else if (isset($_SESSION['phyUserSession'])!=""){
    header("Location: doctor-profile.php");
}

if (isset($_POST['pt-btn-login'])) {
    $email = strip_tags($_POST['pt-email']);
    $password = strip_tags($_POST['pt-password']);

    $email = $DBcon->real_escape_string($email);
    $password = $DBcon->real_escape_string($password);

    $query = $DBcon->query("SELECT user_id, email, password FROM patients WHERE email='$email'");
    $row=$query->fetch_array();

    $count = $query->num_rows; // if email/password are correct returns must be 1 row
 
    if (password_verify($password, $row['password']) && $count==1) {
        $_SESSION['ptUserSession'] = $row['user_id'];
        header("Location: patient-profile.php");
    } else {
        $msg = "<div class='alert alert-danger'>
        <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Invalid Username or Password !
        </div>";
    }
    $DBcon->close();
}

if (isset($_POST['phy-btn-login'])) {
    $email = strip_tags($_POST['phy-email']);
    $password = strip_tags($_POST['phy-password']);

    $email = $DBcon->real_escape_string($email);
    $password = $DBcon->real_escape_string($password);

    $query = $DBcon->query("SELECT user_id, email, password FROM physicians WHERE email='$email'");
    $row=$query->fetch_array();

    $count = $query->num_rows; // if email/password are correct returns must be 1 row
 
    if (password_verify($password, $row['password']) && $count==1) {
        $_SESSION['phyUserSession'] = $row['user_id'];
        header("Location: doctor-profile.php");
    } else {
        $msg = "<div class='alert alert-danger'>
        <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Invalid Username or Password !
        </div>";
    }
    $DBcon->close();
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
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
    .img-thumbnail {
        background-color: transparent;
        border-color: transparent;
    }
    #patients-link {
        align-content: center;
        text-align: center;
        background: lightblue;

        border-style: solid;
        border-width: 2px;
    }
    #doctors-link {
        align-content: center;
        text-align: center;
        background: red;

        border-style: solid;
        border-width: 2px;
    }
    .btn-default {
        background: transparent;
        color: black;
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
                        <a id="navtext" class="page-scroll" href="./login.php">LOGIN</a>
                    </li>
                    <li>
                        <a id="navtext" class="page-scroll" href="./register.php">REGISTER</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="constainer" style="margin-top: 100px">
        <?php
            if(isset($msg)){
                echo $msg;
            }
        ?>
        <div class="row">
            <div class="col-md-5"></div>
            <div class="col-md-2"><h1 style="text-align: center">LOGIN</h1></div>
            <div class="col-md-5"></div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-3">
                <div id="patients-link">
                    <br>
                    <button type="button" class="btn-default btn-block btn-lg" data-toggle="modal" data-target="#patientModal">PATIENT LOGIN</button>
                    <img src="./img/redcross.png" class="img-thumbnail" width="310" height="310">
                </div>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-3">
                <div id="doctors-link">
                    <br>
                    <button type="button" class="btn-default btn-block btn-lg" data-toggle="modal" data-target="#doctorModal">DOCTOR LOGIN</button>
                    <img src="./img/stethoscope.png" class="img-thumbnail" width="215">
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

    <!-- Modal -->
    <div id="patientModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Patient Login</h4>
                    <?php
                        if(isset($msg)){
                        echo $msg;
                    }
                    ?>
                </div>
                <div class="modal-body">
                    <form class="form-group" method="POST">
                        <label>E-mail: </label>
                        <input type="text" class="form-control" name="pt-email">
                        <label>Password: </label>
                        <input type="password" class="form-control" name="pt-password">
                        <br>
                        <button type="submit" class="btn btn-success" name="pt-btn-login" id="pt-btn-login">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="doctorModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Doctor Login</h4>
                    <?php
                        if(isset($msg)){
                        echo $msg;
                    }
                    ?>
                </div>
                <div class="modal-body">
                    <form class="form-group" method="POST">
                        <label>E-mail: </label>
                        <input type="text" class="form-control" name="phy-email">
                        <label>Password: </label>
                        <input type="password" class="form-control" name="phy-password">
                        <br>
                        <button type="submit" class="btn btn-success" name="phy-btn-login" id="phy-btn-login">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
</body>
</html>