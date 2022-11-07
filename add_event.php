<script src="./ckeditor//ckeditor.js"></script>
<?php 
      session_start();
      include_once 'DB_Connection.php';
      include "header.php";
      echo '<link rel="stylesheet" href="add_event.css"/>';
?>

<?php

  if(isset($_POST['event_post_submit'])){
        date_default_timezone_set('Asia/Dhaka');
        // $event_title = $_POST['event_title'];
        $event_title = mysqli_real_escape_string($con, $_POST['event_title']);


        // $event_description = $_POST['event_description'];
        $event_description = mysqli_real_escape_string($con, $_POST['event_description']);


        $user_id = $_SESSION['login_user'];
        $author_name = $_SESSION['user_name'];
        $month = date('M');
        $date = date('d');

        
        $sql_post = "INSERT INTO event_post(`post_title`, `post_description`,`author_name`, `author_id`, `month`, `date`) VALUES ('$event_title', '$event_description','$author_name', '$user_id', '$month', '$date')";

        mysqli_query($con, $sql_post);

        echo "<script> alart('Successfully posted!')</script>";
        header("Location:./index.php");
   }
?>

    <section class="input_from_sect">
            <form id="add_event_input_form" action="add_event.php" method="POST">
                <input type="text" name="event_title" id="" placeholder="Enter title" required>
                <textarea name="event_description" id="" cols="30" rows="10"></textarea>
                <button type="submit" name="event_post_submit">Post</button>
            </form>
    </section>

    <section>
        <form method="post">
            <input type="submit" name="delete_btn"
                    class="button" value="Delete" />
        </form>
    </section>

    
    <script>
        CKEDITOR.replace('event_description');
    </script>

<?php include "footer.php" ?>