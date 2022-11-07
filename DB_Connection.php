<?php 
    $con = new mysqli("localhost","root","","kyau_alumni_project");

    if ($con -> connect_errno) {
        echo "Failed to connect to MySQL: " . $con -> connect_error;
        exit();
      }
?>