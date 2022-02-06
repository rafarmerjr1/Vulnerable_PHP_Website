<?php
    function OpenCon()
     {
    /*
    DBhost must be changed depending on if you are using dockerized webapp
    or a locally hosted httpd/mariaDB webapp */
     //$dbhost = "localhost";  //localhost for local apache/mysql httpd/mariaDB
     $dbhost = "db"; //db for referenced DB in docker-docker.yml
     $dbuser = "admin"; #db admin NOT webadmin
     $dbpass = "administratorPassword!!!";
     $db = "webapp";
     $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

     return $conn;
     }

    function CloseCon($conn)
     {
     $conn -> close();
     }

OpenCon();
?>
