<?php
include"../inc/header.php";
include "EmployerLoginRegistrationCode.php";
Session::checkSessionEmployer();
?>




<?php
if (isset($_GET['empID'])) {
 $empID = (int)$_GET['empID'];
  $sessionEmpID = Session::get("empID");
if ($empID != $sessionEmpID) {
  header("Location: empHome.php");
 }
}

$empObj = new Employer();

if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['updatePassword'])){
  $updatePasswordResult = $empObj->updatePassword($empID, $_POST);//have to pass user data id $userid because need to tell you which data it which update
}

?>

<div class="container">
  
  <div style="max-width:600px; margin:0 auto">
  <div class="panel panel-default">
  <div class="panel-heading">
 <h4>Change Password
  <span class="float-right"><a class="btn btn-primary" href="empProfile.php?empID=<?php echo $empID; ?>">Back</a>
</span>
</h4>
 <div class="panel-body">

<?php
if (isset($updatePasswordResult)) {
  echo $updatePasswordResult;
}
?>


<form class="form-signin" action="" method="POST">

  <label for="old_password">Old Password</label>
  <input type="password" id="oldPassword" name="oldPassword" value="<?php if(isset($_POST['oldPassword'])){echo $_POST['oldPassword'];}?>" class="form-control">

  <label for="password">New Password</label>
  <input type="password" id="password" name="password" value="<?php if(isset($_POST['password'])){echo $_POST['password'];}?>" class="form-control">



<div style="margin-top:30px;"></div>
  <button type="submit" class="btn btn-success"  name="updatePassword">Update</button>
</form>

</div>
</div>
</div>
</div>
</div>








<?php require"../inc/footer.php"?>