<?php
    session_start();
    include_once 'DB_Connection.php';
    $id = $_GET['id'];
    

    if($_SESSION['user_type'] != "admin"){
        header("Location: Login.php");
    } else {
        $sql1 = "DELETE FROM event_post WHERE post_id = $id";
    
    
        if (mysqli_query($con, $sql1)) {
            echo "Record deleted successfully";
            header("Location: index.php");
        } else {
            echo "Error deleting record: " . mysqli_error($con);
        }

    }

?>