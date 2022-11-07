<?php 
  session_start();

  if($_SESSION){
    header("Location: index.php");
  }

  echo "<link rel='stylesheet' href='./Login.css'>";
  include_once 'DB_Connection.php'; 
 
  if(isset($_POST['l-btn']))
  {
    $user_id = $_POST['l-id'];
    $user_password = $_POST['l-password'];
    $hash_login_password = md5($user_password);

      if(!empty($user_id) && !empty($user_password))
      {
              
          $query = "select * from user_info where user_id = '$user_id' and user_password = '$hash_login_password' limit 1";
          $result = mysqli_query($con, $query);

          if(mysqli_num_rows($result))
          {
              
              $user_data=mysqli_fetch_assoc($result);
              
              if($user_data['user_active']){
                $_SESSION['login_user'] = $user_data['user_id'];
                $_SESSION['user_name'] = $user_data['user_name'];
                $_SESSION['user_type'] = $user_data['user_type'];
                $_SESSION['user_email'] = $user_data['user_email'];
                $_SESSION['user_image'] = $user_data['user_image'];
                header("Location: index.php");
              } else {
                echo '<script type="text/javascript">
                          alert("Please wait until admin approve");
                  </script>';
              }
              
              
          } 
          else{
            echo '<script type="text/javascript">
                          alert("ID and Password dose not match.");
                  </script>';
          }
      }else{
        echo '<script type="text/javascript">
                          alert("ID and Password dose not match");
              </script>';
      }
  }
?>



    <section class="l-page">
      <form class="l-form" action="Login.php" method="POST">
        <h1>Login</h1>
        <input type="text" name="l-id" id="l-id" placeholder="KYAU_ID" />
        <input
          type="password"
          name="l-password"
          id="l-email"
          placeholder="Password"
        />
        <button class="l-btn" name="l-btn">Login</button>
        <p>Don't have account? <a href="Registration.php">Sign Up</a></p>
      </form>
    </section>
