<?php
include"../inc/header.php";
include"userLoginRegistrationCode.php";
?>



<?php
$userObj = NEW User();
if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['submit']) ){
  $userForgetPassResult = $userObj->userForgetPass($_POST);
}

?>



<div class="container">
  <div style="max-width:600px; margin:0 auto">
<?php
if (isset($userForgetPassResult)) {
  echo $userForgetPassResult;
}
?>


<form class="form-signin" action="" method="POST">
  <h1 class="h3 mb-3 font-weight-normal">Forget Password?</h1>
  

  <label for="email">Email address:</label>
  <input type="email" id="email" name="email"  value="<?php if(isset($_POST['email'])){echo "";}?>" class="form-control" >

  <label for="q1">What is your favorite food?</label>
  <input type="text" id="q1" name="q1" value="<?php if(isset($_POST['q1'])){echo "";}?>" class="form-control" >

  <label for="q2">What is your favorite game?</label>
  <input type="text" id="q2" name="q2" value="<?php if(isset($_POST['q2'])){echo "";}?>" class="form-control" >

  <label for="npassword">New Password:</label>
  <input type="password" id="npassword" name="npassword" value="<?php if(isset($_POST['npassword'])){echo "";}?>" class="form-control" >
  
  <div style="margin-top:26px;"></div>
  <button class="btn btn-success " type="submit" name="submit">Submit</button>

</form>