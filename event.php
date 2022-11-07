<?php 

include_once 'DB_Connection.php';

echo '<link rel="stylesheet" href="event.css"/>';






?>


    <!-- ***************Event POST*********** -->

    <div class="event">
        <div class="event_head">
            <p>Latest News & Events</p>
        </div>

        <?php  


            $sql = "SELECT * FROM `event_post` ORDER BY `event_post`.`created_at` DESC";
            $result = mysqli_query($con, $sql);

            while($row = mysqli_fetch_array($result)){
            
                $url = "post_details.php?id=".$row['post_id'];
                
            ?>

            <div class="event_post" style="margin:10px 0px ;">
                <div class="event_list">
                    <div class="event_date">
                    <?php echo  $row['date'] ?><br><?php echo  $row['month'] ?>
                    </div>

                    <div class="event_post_details">
                        <div class="event_post_title">
                            <a href=<?php echo $url ?>><p><?php echo  $row['post_title'] ?></p></a>
                        </div>
                        <div class="event_post_author">
                            <p>Posted by : <span><?php echo $row['author_name'] ?></span></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php }; ?>



    </div>


    </div>