<?php include "inc/loginheader.php" ?>
<?php 
session_start();
$err = "";
if(isset($_POST['submit'])){
    $name = filter_input(INPUT_POST,'name',FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password_C = filter_input(INPUT_POST,'cpassword',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $role = "patient";
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    if($num == 1){
        $err = "Email already exists";
    }else{
        if($password !== $password_C){
           $err = "Passwords do not match";
        }else{
            $hash = password_hash($password,PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (fullname,email,password,role) VALUES ('$name','$email','$hash','$role')";
            $result = mysqli_query($conn,$sql);
            if($result){
header("Location: /doctor/login.php");
            }
        }   
    }
   
}
?>
<section>
<div class="container">
    <div class="form m-auto">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
    <div><h1>SIGN UP</h1> </div>
    <?php echo "<p style ='color:red;'> $err</P>" ?>
  <div class="form-group">
    <label for="exampleInputEmail1">Fullname</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your User Details with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your User Details with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="password" name="cpassword" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password" required>
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</section>
<?php include "inc/footer.php" ?>