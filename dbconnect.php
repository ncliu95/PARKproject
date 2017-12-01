<?php

	 $DBhost = "localhost";
	 $DBuser = "root";
	 $DBpass = "mysql";
	 $DBname = "park_accounts";
	 
	 $DBcon = new MySQLi($DBhost,$DBuser,$DBpass,$DBname);
    
     if ($DBcon->connect_errno) {
         die("ERROR : -> ".$DBcon->connect_error);
     }
