<?php 
session_start();
include_once 'DB_Connection.php';
include 'header.php';

echo '<link rel="stylesheet" href="profile.css"/>';
?>

<?php 

    $user_id = $_SESSION['login_user'];

    $sql = "SELECT * FROM `user_info` WHERE user_id = $user_id";

    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result))
    {
        
        $user_data=mysqli_fetch_assoc($result);

        $user_mobile = $user_data['user_mobile'];
        $user_dob = $user_data['user_dob'];
        $user_address = $user_data['user_address'];
        $user_department = $user_data['user_department'];
    }

?>
    
        <!--******************* User profile section ************************-->
    <form action="profile.php" method="POST">
        <div class="user_profile">
            <div class="user_img_text">
                <div class="user_img">
                    
                    <img src=<?php echo $_SESSION['user_image'] ?> >
                </div>
                <div class="user_text">
                    <span class="user_text_name"><?php echo $_SESSION['user_name']; ?></span>
                    <span class="user_text_desg">Type : <?php echo $_SESSION['user_type']; ?></span>
                    <?php if($user_department){ echo "<span class='user_text_email'>Department : $user_department</span>"; }?>
                    <span class="user_text_email">E-mail : <?php echo $_SESSION['user_email']; ?></span>
                    <?php if($user_mobile){ echo "<span class='user_text_email'>Phone No : $user_mobile</span>"; }?>
                    <?php if($user_dob){ echo "<span class='user_text_email'>Date of Birth : $user_dob</span>"; }?>
                    <?php if($user_address){ echo "<span class='user_text_email'>Address : $user_address</span>"; }?>
                </div> 

                <div class="user_edit_profile">
                    <a href="update_profile.php" style="
                        padding : 10px 10px;
                        background: rgb(17, 138, 245);
                        color: white;
                        text-decoration: none;
                        border-radius: 10px;
                    ">
                      Update Profile
                    </a>
                </div>
            </div>

            
        </div>
    </form>
<?php include 'footer.php'; ?>
