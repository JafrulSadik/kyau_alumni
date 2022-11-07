<?php 
    session_start();
    include_once 'DB_Connection.php';
    include "header.php";
    echo '<link rel="stylesheet" href="update_profile.css"/>';
?>

<?php

  if(isset($_POST['update_btn'])){

    $update_name = $_POST['update_name'];
    $update_dept = $_POST['update_dept'];
    $update_dob = $_POST['update_dob'];
    $update_phone = $_POST['update_phone'];
    $update_address= $_POST['update_address'];
    $update_img = $_FILES['image']['name'];

    $user_id = $_SESSION['login_user'];

    echo $update_img;
    echo $update_address;

    if($update_name){
        $sql = "UPDATE user_info SET user_name = '$update_name'  WHERE user_id = $user_id";
        mysqli_query($con, $sql);
        $_SESSION['user_name'] = $update_name;
    }

    if($update_dept){
        $sql = "UPDATE user_info SET user_department = '$update_dept'  WHERE user_id = $user_id";
        mysqli_query($con, $sql);
    }

    if($update_dob){
        $sql = "UPDATE user_info SET user_dob = '$update_dob'  WHERE user_id = $user_id";
        mysqli_query($con, $sql);
    }
    if($update_phone){
        $sql = "UPDATE user_info SET user_mobile = '$update_phone'  WHERE user_id = $user_id";
        mysqli_query($con, $sql);
    }
    if($update_address){
        $sql = "UPDATE user_info SET user_address = '$update_address'  WHERE user_id = $user_id";
        mysqli_query($con, $sql);
    }
    if($update_img){
        $file_name  = uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_",$_FILES['image']['name']);
        $destination = "./upload/".$file_name;
        $filename = $_FILES['image']['tmp_name'];

        if(move_uploaded_file($filename, $destination)){
            $sql = "UPDATE user_info SET user_image = '$destination'  WHERE user_id = $user_id";
            if(mysqli_query($con, $sql)){
                $_SESSION['user_image'] = $destination;
            };
            
        }
    }

    header("Location:./profile.php");

    
  }
?>


<div class="update_user_profile">
    <div class="update_header_text">
        <p>Update Profile</p>
    </div>
    <div class="update_user_img_text">
        <!-- <div class="update_user_img">
            <img src=<?php echo "./upload//".$_SESSION['user_image'] ?> alt="">
        </div> -->
        <form class="update_user_text" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
            <input type="text" name="update_name" placeholder="Full Name"/>
            <input type="text" name="update_dept" placeholder="Department Name"/>
            <input type="date" name="update_dob" placeholder="Date of Birth"/>
            <input type="text" name="update_phone" placeholder="Phone No."/>
            <input type="text" name="update_address" placeholder="Address"/>
            <input type="file" name="image" />
            <button name="update_btn" type="submit" >Save Changes </button>
        </form> 
        
    </div>
</div>


<?php include 'footer.php'; ?>