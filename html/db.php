<?php
    function OpenCon()
     {
     $dbhost = "localhost";
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
