<?php include "inc/loginheader.php" ?>
<?php 
session_start();
$err = "";
if(isset($_POST['submit'])){
    $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  
 
    $sql ="SELECT * FROM users WHERE email = '$email'";
    $result =mysqli_query($conn,$sql);
    $output = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    if($output){
        $user_details = $output[0];
       $user_id = $user_details['uid'];
       $user_name = $user_details['fullname'];
       $user_pass = $user_details['password'];
       $user_access = password_verify($password,$user_pass);
       if($user_access == true){
        $_SESSION['id'] = $user_id;
        header('location:/doctor/user/index.php');
       }else{
       $err = "incorrect username or password";
        }
       
    }else{
        $err = "incorrect username or password";
    } 
}
?>
<section>
<div class="container">
    <div class="form m-auto">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
    <div><h1>LOGIN</h1> </div>
    <?php echo "<p style ='color:red;'> $err</P>" ?>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your User Details with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
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