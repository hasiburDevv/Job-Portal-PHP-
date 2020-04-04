<?php
include"../inc/header.php";
include"userLoginRegistrationCode.php";
Session::checkSessionSigninUser();
?>


<?php
$userObj = NEW User();
if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['submit'])){

$userSigninResult = $userObj->userSignin($_POST);
}
?>

<div class="container">
  <div style="max-width:600px; margin:0 auto">
<?php
if (isset($userSigninResult)) {
  echo $userSigninResult;
}

?>
<form class="form-signin" action="" method="POST">
  <h1 class="h3 mb-3 font-weight-normal">Sign in</h1>
  

  <label for="email">Email address:</label>
  <input type="email" id="email" name="email"  value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>" class="form-control" >

  <label for="password">Password:</label>
  <input type="password" name="password" id="password" value="<?php if(isset($_POST['password'])){echo $_POST['password'];}?>" class="form-control">

  
  <div style="margin-top:26px;"></div>
  <button class="btn btn-success " type="submit" name="submit">Sign in</button>
  <a class="alert-link" href="UserForgetPass.php"> Forget Password?</a>

</form>
</div>
</div>

<?php require"../inc/footer.php"?>







