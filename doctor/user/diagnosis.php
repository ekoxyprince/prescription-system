<?php 
include "../config/database.php" ;
session_start();
if(isset($_SESSION['id'])){
    $user_id = $_SESSION['id'];
  $sql = "SELECT * FROM users WHERE uid = '$user_id'";
  $result = mysqli_query($conn,$sql);
  $output = mysqli_fetch_all($result,MYSQLI_ASSOC); 
  $user_details = $output[0];
  $user_role = $user_details['role'];
  if($user_role === "patient"){
    $user_id = $user_details['uid'];
    $user_name = $user_details['fullname'];
  }else{
    header("Location:/doctor/login.php " );
  }
 
}
else{
    header("Location:/doctor/login.php " );
};
?>
<!DOCTYPE html>
<html lang="en">
<?php
$first = $_GET['first'];
$second = $_GET['second'];
$third = $_GET['third'];
$fourth = $_GET['fourth'];
$fifth = $_GET['fifth'];
$sixth = $_GET['sixth'];

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Medical-Consultation</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-light bg-light mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">Medical-Consultation</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                        <a class="nav-link" href="./">home</a>
                    </li>
                  
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php">logout</a>
                    </li>
            </li>
        </ul>
      </div>
  </div>
</nav>
<section>
<div class="container  d-flex">
   <?php if($third == "yes"||$fourth == "yes" ||$fifth == "yes"||$sixth=="yes"||$first == "yes"||$second == "yes"): ?>   
<div class="card m-auto" style="width: 38rem;">
  <div class="card-body" >
    <h5 class="card-title" id="message">You Have Malaria</h5>
    <h6 class="card-subtitle mb-2 text-muted">Choose from the following treatment options for Malaria:</h6>
    <p class="card-text"><dl>
 <ol>
<li> <b>Artemisin-based Combination Therapy:</b><br>
*Artemether-Lumefantrine Tablet, 20mg artemether + 120mg lumefantrine.<br>
OR<br>
* Sulphadoxine/Pyrimethamine, 25mg/kg of the sulfonamides 1.25mg/kg of Pyrimethamine
</li>
<li><b>Monotherapies:</b><br>
*Chloroquine Tablet, 25mg/kg base over 3 days. 
<br>
OR
<br>
*Quinine 10mg/kg 8 - 12 hourly for 5 - 7 days. </li>
 </ol>
 This are the malaria drugs available. You're suggesting the one the person should take or and dosage. Kind of how you're directed when you go to a pharmacy. <br><br>
If symptoms persists after the duration of the dosage, see a doctor.
</dl></p>
  </div>
</div>
<?php endif;?>
<?php if($third == "no"&&$fourth == "no" &&$fifth == "no"&&$sixth=="no"&&$first == "no"&&$second == "no"): ?>   
<div class="card m-auto" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">You do not have Malaria</h5>
    <h6 class="card-subtitle mb-2 text-muted"></h6>
    <p class="card-text"><dl>
 Make sure to eat well and drink plenty of water
</dl></p>
  </div>
</div>
<?php endif;?>
</div>
<div class="col-md-6 mb-4">
        <label></label>
        <input type="range" id="rate" min="0.5" max="2" value="1" step="0.1" class="form-control" hidden/>
      </div>
      <div class="col-md-6 mb-4">
        <label></label>
        <input type="range" id="pitch" min="0.5" max="2" value="1" step="0.1" class="form-control" hidden/>
      </div>
      
    </div>
    <a href="#" id="speak" class="btn btn-block btn-danger font-weight-bold text-uppercase">Speak</a>
  </form>  
</div>



</section>
<footer class="text-center mt-5">
  Copyright &copy; 2022
</footer>
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
<script>
    var navBtn = document.getElementById("navBtn")
    var dropdownToggle = document.getElementById("dropdown")
    navBtn.onclick = ()=>{
        dropdownToggle.classList.toggle("show")
    }
    
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function(){
        $(function(){
  if ('speechSynthesis' in window)  // To check speech sysntesis is supported in browser or not
  {
    
    // To get supported voice list in browser & append to select list
    speechSynthesis.onvoiceschanged = function() {
      var $voicelist = $('#voices');

      if($voicelist.find('option').length == 0) {
        speechSynthesis.getVoices().forEach(function(voice, index) {
          var $option = $('<option>')
          .val(index)
          .html(voice.name + (voice.default ? ' (default)' :''));

          $voicelist.append($option);
        });
      }
    }

    // On speak button click below function is calling
    $('#speak').click(function(){
      
      var message = $('#message').html();  // To get message from textarea
      
      const messageParts = message.split(/<break[=0-9]*>/g);  //Regex to split the entered using <break>
      
      var timeDelay = "";
      if(messageParts.length>1)  // to check delay is added or not
      {
        timeDelay = message.match(/break[=0-9]*/g).toString().replace(/break=/g, "").split(",");  // To get time delay added in break
      }
      let currentIndex = 0;
      
      // TTS function which is called for each part of text
      const speak = (textToSpeak, timeToDelay) => {
        const msg = new SpeechSynthesisUtterance();
        const voices = window.speechSynthesis.getVoices();
        msg.voice = voices[$('#voices').val()];
        msg.rate = $('#rate').val();
        msg.pitch = $('#pitch').val();
        msg.volume = 1; // 0 to 1
        msg.text = textToSpeak;
        msg.onend = function() {
          currentIndex++;
          if (currentIndex < messageParts.length) {
            setTimeout(() => {
              speak(messageParts[currentIndex],timeDelay[currentIndex])
            }, timeToDelay)
          }
        };
        speechSynthesis.speak(msg);
      }
      
      speak(messageParts[0], timeDelay[0]);  // calling speak function
    });
    
  } else {
    alert("Your Browser does not support speech synthesis");
  }
});
    })
</script>
</body>
</html>