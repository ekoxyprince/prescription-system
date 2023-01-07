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
$illness = $_GET['illness'];
$sql = "SELECT * FROM illness WHERE name = '$illness'";
$result = mysqli_query($conn,$sql);
$output = mysqli_fetch_all($result,MYSQLI_ASSOC);

$fir = $output[0]['first'];
$sec = $output[0]['second'];
$thi = $output[0]['third'];
$for = $output[0]['fourth'];
$fif = $output[0]['fifth'];
$six = $output[0]['sixth'];
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
<div class="container">
<div class="row col-md-12">
  <h4 class="fw-bold text-center mt-3"></h4>
  <form class=" bg-white px-4" action="diagnosis.php" method="get">
    <p class="fw-bold"><?php echo $fir?>?</p>

    <div class="form-check mb-2">
      <input class="form-check-input" type="radio" name="first" id="radioExample1" value="yes" required />
      <label class="form-check-label" for="radioExample1">
        Yes
      </label>
    </div>
    <div class="form-check mb-2">
      <input class="form-check-input" type="radio" name="first" id="radioExample2" value="no" required/>
      <label class="form-check-label" for="radioExample2">
        No
      </label>
    </div>

    <p class="fw-bold"><?php echo $sec?>?</p>

<div class="form-check mb-2">
  <input class="form-check-input" type="radio" name="second" id="radioExample1" value="yes" required />
  <label class="form-check-label" for="radioExample1">
    Yes
  </label>
</div>
<div class="form-check mb-2">
  <input class="form-check-input" type="radio" name="second" id="radioExample2" value="no" required/>
  <label class="form-check-label" for="radioExample2">
    No
  </label>
</div>
<p class="fw-bold"><?php echo $thi?>?</p>

<div class="form-check mb-2">
  <input class="form-check-input" type="radio" name="third" id="radioExample1" value="yes" required />
  <label class="form-check-label" for="radioExample1">
    Yes
  </label>
</div>
<div class="form-check mb-2">
  <input class="form-check-input" type="radio" name="third" id="radioExample2" value="no" required/>
  <label class="form-check-label" for="radioExample2">
    No
  </label>
</div>
<p class="fw-bold"><?php echo $for?>?</p>

<div class="form-check mb-2">
  <input class="form-check-input" type="radio" name="fourth" id="radioExample1" value="yes" required />
  <label class="form-check-label" for="radioExample1">
    Yes
  </label>
</div>
<div class="form-check mb-2">
  <input class="form-check-input" type="radio" name="fourth" id="radioExample2" value="no" required/>
  <label class="form-check-label" for="radioExample2">
    No
  </label>
</div>
<p class="fw-bold"><?php echo $fif?>?</p>

<div class="form-check mb-2">
  <input class="form-check-input" type="radio" name="fifth" id="radioExample1" value="yes" required />
  <label class="form-check-label" for="radioExample1">
    Yes
  </label>
</div>
<div class="form-check mb-2">
  <input class="form-check-input" type="radio" name="fifth" id="radioExample2" value="no" required/>
  <label class="form-check-label" for="radioExample2">
    No
  </label>
</div>
<p class="fw-bold"><?php echo $six?>?</p>

<div class="form-check mb-2">
  <input class="form-check-input" type="radio" name="sixth" id="radioExample1" value="yes" required />
  <label class="form-check-label" for="radioExample1">
    Yes
  </label>
</div>
<div class="form-check mb-2">
  <input class="form-check-input" type="radio" name="sixth" id="radioExample2" value="no" required/>
  <label class="form-check-label" for="radioExample2">
    No
  </label>
</div>
    <div class="text-end d-flex">
    <button type="submit" class="btn btn-primary m-auto">Submit</button>
  </div>
  </form>
 
</div>
</div>
</section>



<!--Modal2-->


 
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