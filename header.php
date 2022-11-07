<?php 
include_once 'DB_Connection.php';


echo '<link rel="stylesheet" href="header.css"/>';

?>


<form action="header.php" method="POST">
    <div class="profile_page">
        <div class="titleimage">
            <img src="./image/logo-title.png" alt="kyau-title-image" />
    </div>


<!--********************** Navbar ************************-->
    
        <div class="navbar_new">
            <div class="nav_new_menu">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="">Notice</a></li>
                    <?php
                    if(isset($_SESSION['login_user'])){
                        if($_SESSION['user_type'] == "admin"){ ?>
                            <li><a href="admin_approve.php">Pending</a></li>
                            <li><a href="add_event.php">Add Event</a></li>
                            <li><a href="">Contact</a></li>
                            <li><a href="">About</a></li>
                            <?php } else if($_SESSION['user_type'] == "faculty_member"){ ?>
                            <li><a href="">Add Event</a></li>
                            <li><a href="">Contact</a></li>
                            <li><a href="">About</a></li>
                            <?php }else{ ?>
                            <li><a href="">Contact</a></li>
                            <li><a href="">About</a></li>
                                <?php }
                                }?>

            </div>
         
            <div class="nav_user_info">
                <ul>
                    <?php if(isset($_SESSION['login_user'])){ ?>
                    <li><a href="profile.php"><?php echo "Welcome ".$_SESSION['user_name']; ?></a></li>
                    <li><a href="logout.php">Logout</a></li>
                    <?php } else{ ?>
                        <li><a href="./Login.php">Login</a></li>
                    <?php } ?>
                </ul>
                

            </div>
        </div>  
</form>
