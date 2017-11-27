<?php
session_start();
if (isset($_SESSION['ptUserSession'])!="") {
    header("Location: patient-profile.php");
    exit;
} else if (isset($_SESSION['phyUserSession'])!=""){
    header("Location: doctor-profile.php");
}
require_once 'dbconnect.php';

if(isset($_POST['pt-btn-signup'])) {

    $fname = strip_tags($_POST['pt-firstname']);
    $lname = strip_tags($_POST['pt-lastname']);
    $phycode = strip_tags($_POST['phy-code']);
    $email = strip_tags($_POST['pt-email']);
    $upass = strip_tags($_POST['pt-password']);
    
    $fname = $DBcon->real_escape_string($fname);
    $lname = $DBcon->real_escape_string($lname);
    $phycode = $DBcon->real_escape_string($phycode);
    $email = $DBcon->real_escape_string($email);
    $upass = $DBcon->real_escape_string($upass);
 
    $hashed_password = password_hash($upass, PASSWORD_DEFAULT); // this function works only in PHP 5.5 or latest version
 
    $check_email = $DBcon->query("SELECT email FROM patients WHERE email='$email'");
    $count=$check_email->num_rows;
 
    if ($count==0) {
        $query = "INSERT INTO patients(first_name,last_name,physician_code,email,password) VALUES('$fname','$lname','$phycode','$email','$hashed_password')";
        if ($DBcon->query($query)) {
            $msg = "<div class='alert alert-success'>
            <span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
            </div>";
        } else {
            //echo '<script type="text/javascript">alert("'.$mysqli_error().'");</script>';
            //die(mysqli_error($DBcon));
            $msg = "<div class='alert alert-danger'>
            <span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
            </div>";
        }
     
    } else {
        $msg = "<div class='alert alert-danger'>
        <span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry email already taken !
        </div>";
    }
    $DBcon->close();
}

if(isset($_POST['phy-btn-signup'])) {
 
    $fname = strip_tags($_POST['phy-firstname']);
    $lname = strip_tags($_POST['phy-lastname']);
    $email = strip_tags($_POST['phy-email']);
    $upass = strip_tags($_POST['phy-password']);
    
    $fname = $DBcon->real_escape_string($fname);
    $lname = $DBcon->real_escape_string($lname);
    $email = $DBcon->real_escape_string($email);
    $upass = $DBcon->real_escape_string($upass);
 
    $hashed_password = password_hash($upass, PASSWORD_DEFAULT); // this function works only in PHP 5.5 or latest version
 
    $check_email = $DBcon->query("SELECT email FROM physicians WHERE email='$email'");
    $count=$check_email->num_rows;
 
    if ($count==0) {
        $query = "INSERT INTO physicians(first_name,last_name,email,password) VALUES('$fname','$lname','$email','$hashed_password')";

        if ($DBcon->query($query)) {
            $msg = "<div class='alert alert-success'>
            <span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
            </div>";
        } else {
            die(mysqli_error($DBcon));
            $msg = "<div class='alert alert-danger'>
            <span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
            </div>";
        }
 
    } else {
        $msg = "<div class='alert alert-danger'>
        <span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry email already taken !
        </div>";
    }
    $DBcon->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registration</title>
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
        <div class="row">
            <div class="col-md-5"></div>
            <div class="col-md-2"><h1 style="text-align: center">REGISTRATION</h1></div>
            <div class="col-md-5"></div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-3">
                <div id="patients-link">
                    <br>
                    <button type="button" class="btn-default btn-block btn-lg" data-toggle="modal" data-target="#patientModal">PATIENT REGISTRATION</button>
                    <img src="./img/redcross.png" class="img-thumbnail" width="310" height="310">
                </div>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-3">
                <div id="doctors-link">
                    <br>
                    <button type="button" class="btn-default btn-block btn-lg" data-toggle="modal" data-target="#doctorModal">DOCTOR REGISTRATION</button>
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
                    <h4 class="modal-title">Patient Registration</h4>
                    <?php
                        if(isset($msg)){
                        echo $msg;
                    }
                    ?>
                </div>
                <div class="modal-body">
                    <form class="form-group" method="POST">
                        <div class="col-md-6">
                            <label>First Name: </label>
                            <input type="text" class="form-control" name="pt-firstname">
                        </div>
                        <div class="col-md-6">
                            <label>Last Name: </label>
                            <input type="text" class="form-control" name="pt-lastname">
                        </div>
                        <div class="col-md-12">
                            <label>E-mail: </label>
                            <input type="text" class="form-control" name='pt-email'>
                        </div>
                        <div class="col-md-12">
                            <label>Password: </label>
                            <input type="password" class="form-control" name='pt-password'>
                        </div>
                        <div class="col-md-12">
                            <label>Physician Code: </label>
                            <input type="text" class="form-control" name='phy-code'>
                        </div>
                        <div class="col-md-12">
                            <br>
                            <button type="submit" class="btn btn-success" name='pt-btn-signup' id='pt-btn-signup'>Submit</button>
                        </div>
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
                    <h4 class="modal-title">Doctor Registration</h4>
                    <?php
                        if(isset($msg)){
                        echo $msg;
                    }
                    ?>
                </div>
                <div class="modal-body">
                    <form class="form-group" method="POST">
                        <div class="col-md-6">
                            <label>First Name: </label>
                            <input type="text" class="form-control" name="phy-lastname">
                        </div>
                        <div class="col-md-6">
                            <label>Last Name: </label>
                            <input type="text" class="form-control" name="phy-lastname">
                        </div>
                        <div class="col-md-12">
                            <label>E-mail: </label>
                            <input type="text" class="form-control" name="phy-email">
                        </div>
                        <div class="col-md-12">
                            <label>Password: </label>
                            <input type="password" class="form-control" name="phy-password">
                        </div>
                        <div class="col-md-12">
                            <br>
                            <button type="submit" class="btn btn-success" name="phy-btn-signup" id="phy-btn-signup">Submit</button>
                        </div>
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