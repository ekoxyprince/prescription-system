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
<div class="container">
<div class="jumbotron bg-info">

  <h1 class="display-4">Good Day!</h1>
  <p class="lead">Welcome <?php echo $user_name ?> to your page You can answer Suggested Questions regarding <br> your symptomps to help us figure out what is wrong with you.</p>
    <a class="btn btn-primary btn-lg" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2"  role="button">Click Here</a>
  </p>
</div>
</div>
</section>



<!--Modal2-->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen-lg-down">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-success" id="exampleModalLabel">Select Any Illness you think you are suffering from</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="illness.php" method="get" >
             <?php 
             $sql = "SELECT * FROM illness";
                $result = mysqli_query($conn, $sql);
                $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
             ?>
                <div class="row mt-1">
                    <div class="col-md-12">
                        <label class="labels">Choose an Illness</label>
                        <select name="illness" id="illness">
                        <?php foreach($output as $data): ?>
                            <option value="<?php echo $data['name']?>"><?php echo $data['name']?></option>
                            <?php endforeach; ?>
                        </select>
                </div>
                </div>
              
               
                <div class="mt-5 text-center"><input class="btn btn-primary profile-button" type="submit" name="submit" value="Submit Form"></div>
                </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
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
</body>
</html>