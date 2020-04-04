<?php
include"../inc/header.php";
include"EmployerLoginRegistrationCode.php";
Session::checkSessionSigninEmployer();
?>

<?php
$employer = NEW Employer();
if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['submit']) ){
  $employerSignin = $employer->employerSignin($_POST);
}
?>


<div class="container">
  <div style="max-width:600px; margin:0 auto">
<?php
if (isset($employerSignin)) {
  echo $employerSignin;
}

?>
<form class="form-signin" action="" method="POST">
  <h1 class="h3 mb-3 font-weight-normal">Employers Sign in</h1>
  

  <label for="userName">Username:</label>
  <input type="text" id="userName" name="userName" value="<?php if(isset($_POST['userName'])){echo $_POST['userName'];}?>" class="form-control" >

  <label for="password">Password:</label>
  <input type="password" name="password" id="password" name="userName" value="<?php if(isset($_POST['password'])){echo $_POST['password'];}?>" class="form-control" >

  
  <div style="margin-top:26px;"></div>
  <button class="btn btn-success " type="submit" name="submit">Sign in</button>
  <a class="alert-link" href="empForgetPass.php"> Forget Password?</a>


</form>
</div>
</div>

<?php require"../inc/footer.php"?>







