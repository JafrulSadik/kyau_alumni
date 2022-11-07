<?php
  echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
  rel="stylesheet"
  integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
  crossorigin="anonymous"
  />';
  echo "<link rel='stylesheet' href='./registration.css'>";
  include_once 'DB_Connection.php';
  ?>


  <?php

  if(isset($_POST['r-submit'])){
    $user_id = $_POST['r_id'];
    $user_name = $_POST['r_name'];
    $user_email = $_POST['r_email'];
    $user_password = $_POST['password'];
    $confirm_password= $_POST['confirm-pass'];
    $user_type = $_POST['user_type'];
  

    

    if(!empty($user_id) && !empty($user_name) && !empty($user_email) && !empty($user_type) && !empty($user_password) && !empty($confirm_password)){

      $sql = "SELECT * FROM `user_info` WHERE user_id = '$user_id'";

      $result = mysqli_query($con, $sql);

      $rows = mysqli_num_rows($result);

      if ($rows === 0) { 
          $hash_password = md5($user_password);
          $sql1 = "insert into user_info (`user_id`, `user_name`, `user_email`, `user_password`, `user_type`, `user_active`) values ('$user_id','$user_name','$user_email','$hash_password','$user_type','0')";

          mysqli_query($con, $sql1);
          header("Location:./Login.php");

      }else{
        echo '<script type="text/javascript">
                            alert("User ID already exist!!!");
                    </script>';
        
      }

    } 
      
    else {
      echo '<script type="text/javascript">
                          alert("Please Enter a valid information");
                  </script>';
    }

      

  }
?>



    <section class="r-page">
      <form class="r-form" action="Registration.php"  method="POST">
        <h1>Registration</h1>
        <input type="text" name="r_id" id="r_id" placeholder="KYAU_ID"/>
        <input type="text" name="r_name" id="r_name" placeholder="Name" />
        <input type="text" name="r_email" id="r_email" placeholder="Email" />
        <!-- <input type="text" name="r-phone" id="r-phone" placeholder="Phone" /> -->
        <label for="user_type">Choose User Type: </label> 
       <select name="user_type" id="user_type">   
              <option value="current_student">select category</option>    
              <option value="current_student">faculty_member</option>
              <option value="current_student">current_student</option>
              <option value="current_student">former_student</option>
       </select>
       
        <input
          type="password"
          name="password"
          id="password"
          placeholder="Password"
        />
        <input
          type="password"
          name="confirm-pass"
          id="confirm-pass"
          placeholder="Confirm Password"
        />
        <button class="r-btn" name ="r-submit">Sign Up</button>
        <p>Already have an account? <a href="Login.php">Login</a></p>
      </form>
    </section>
