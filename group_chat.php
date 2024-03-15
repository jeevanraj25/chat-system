<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" 
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" 
            crossorigin="anonymous"></script>
            <script>
    $(document).ready(function(){
        // Define a function to load messages
        function loadMessages() {
            $("#comments").load("load_messages.php");
        }

        // Call the loadMessages function initially
        loadMessages();

        // Set an interval to call the loadMessages function every 2 seconds
        setInterval(loadMessages, 2000); // 2000 milliseconds = 2 seconds
    });
</script>
<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>

        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <div class="details_grp">
            Group Chat
        </div>
      </header>
      <div class="chat-box" id="comments">
      <?php
                $outgoing_id = $_SESSION['unique_id'];
                $output = "";
                $sql ="SELECT gc.*,usr.fname,usr.img FROM groupchat as gc LEFT JOIN users AS usr ON usr.unique_id = gc.message_sender_id WHERE usr.unique_id IS NOT NULL LIMIT 200;";
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

            ?>
      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="on">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>
  
</body>
</html>


<script src="javascript/grp_chat.js"></script>