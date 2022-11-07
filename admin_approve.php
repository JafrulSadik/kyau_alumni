<?php
  session_start();
  echo "<link rel='stylesheet' href='./admin.css'>";
  if($_SESSION['user_type'] != 'admin'){
    header("Location: Login.php");
  }
  include 'DB_Connection.php';

  echo '<link rel="stylesheet" href="admin.css"/>';
?>

<?php include "header.php"; ?>


<section  id="main-content">
    <table  id = ""  cellpadding = "20px">
        <thead>
                <th>user_id</th>
                <th>user_email</th>
                <th>user_mobile</th>
                <th>user_type</th>
                <th>Permission</th>
        </thead>
    
        <?php  


                $sql = "select * from user_info where user_active = 0";
                $result = mysqli_query($con, $sql);

                while($row = mysqli_fetch_array($result)){

                ?>
                <tbody>
                
                        <td> <?php echo $row['user_id']; ?></td>
                        <td><?php echo $row['user_email']; ?></td>
                        <td><?php echo $row['user_mobile']; ?></td>
                        <td><?php echo $row['user_type']; ?></td>
                     
                        <td>
                            <form acton="admin_approve.php" method="POST">
                                    <input type="hidden" name = "user_email" value="<?php echo $row['user_email'] ?>">
                                    <input type="submit" name = "approve" value="Approve">
                                    <input type="submit" name = "deny" value="deny">
                            </form>
                        </td>
                        
                </tbody>
                <?php }; ?>
      </table>
    
    </div>
    <?php include "footer.php"; ?>
</section>




<?php
      if(isset($_POST['approve']))
      {

        $user_email=$_POST['user_email'];
        //echo "$user_email";

        $sql1 = "UPDATE user_info SET user_active = '1' WHERE user_email = '$user_email'";
        mysqli_query($con, $sql1);
        header("Location:./admin_approve.php");
      }
      if(isset($_POST['deny']))
      {

        $user_email=$_POST['user_email'];
        //echo "$user_email";

        $sql2 = "DELETE  FROM user_info WHERE user_email = '$user_email'";
        mysqli_query($con, $sql2);
        header("Location:./admin_approve.php");
      }
?>