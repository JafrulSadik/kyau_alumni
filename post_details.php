<?php
    session_start();
    include "./header.php";
    echo '<link rel="stylesheet" href="./post_details.css?v=4"/>';
    
    echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />';
    include './DB_Connection.php';

    $post_id = $_GET['id'];

    if(isset($_POST['delete_btn'])){

        $id = $_GET['id'];

        echo "<script>if(confirm('Are you sure to delete the file?')){
            location.replace('http://localhost/kyau_alumni_project/delete_post.php?id=$id');
        }</script>";

    }

    


    

    $sql = "SELECT * FROM `event_post` WHERE post_id = $post_id LIMIT 1";

    $result = mysqli_query($con, $sql);

    $post_data = mysqli_fetch_assoc($result);

    
    $date_time_format=date_create($post_data['created_at']);
    
    $date_format = date_format( $date_time_format ,"d/m/Y h:i A");
    
    $date_time = explode(" ", $date_format);

    $date = $date_time[0];
    $time = $date_time[1]. ' ' .$date_time[2];


?>



<section id="post_details_container">
        <div class="post_details">
            <div class="post_details_header">
                <div class="post_details_title">
                    <p><?php echo $post_data['post_title'] ?></p>

                    <hr>
                </div>
                <div class="post_details_by">
                    <span class="author_name"><i class="fa-solid fa-user"></i>  <?php echo $post_data['author_name'] ?></span>
                    <span class="date"><i class="fa-solid fa-calendar-days"></i>  <?php echo $date ?></span>
                    <span class="time"><i class="fa-solid fa-clock"></i> <?php echo $time ?></span>
                </div>
            </div>
    
            <div class="post_details_content">
                <div><?php echo $post_data['post_description'] ?></div>
            </div>
        </div>

    </section>

<?php
    if($_SESSION['user_type'] == 'admin'){
        echo '
        <section id="delete_update_container"style="
                            width: 100%;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                        " >
            <form method="post" style="
                                width: 60%;
                            "
                        >

                <input style="
                            background-color: #bf1128;
                            color : white;
                            border : none;
                            padding : 7px 15px;
                            border-radius: 5px;
                        " 

                        type="submit" name="delete_btn"
                        class="button" value="Delete" 
                    />
            </form>
        </section>
        ';
    }

    
?>

<?php
    include "./footer.php";
?>

    