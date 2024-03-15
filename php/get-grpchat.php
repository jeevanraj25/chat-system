<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $output = "";
        $sql ="SELECT gc.*,usr.fname,usr.img FROM groupchat as gc LEFT JOIN users AS usr ON usr.unique_id = gc.message_sender_id WHERE usr.unique_id IS NOT NULL;";
                $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_assoc($result)){
                      if($row['message_sender_id']  === $outgoing_id){
                          $output .= '<div class="chat outgoing">
                                      <div class="details">
                                          <p>'. $row['message_text'] .'</p>
                                          <p class="time_details">'.date('h:i a', strtotime($row['date_time'])).'</p>
                                      </div>
                                      </div>';
                      }else{
                          $output .= '<div class="chat incoming">
                                      <img src="php/images/'.$row['img'].'" alt="">
                                      <div class="details">
                                          <p class="time_details">'.$row['fname'].'</p>
                                          <p>'. $row['message_text'].'</p>
                                          <p class="time_details">'.date('h:i a', strtotime($row['date_time'])).'</p>
                                      </div>
                                      </div>';
                      }
                  }
              }else{
                  $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
              }
              echo $output;
    }else{
        header("location: ../login.php");
    }

?>

