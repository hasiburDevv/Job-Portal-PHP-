<?php
include"../inc/header.php";
include"userLoginRegistrationCode.php";
Session::checkSessionSigninUser();
?>



<?php
$userObj = NEW User();
if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['submit']) ){
  $userAccountResult = $userObj->userAccount($_POST);
}

?>



<div class="container">
  <div style="max-width:600px; margin:0 auto">
<?php
if (isset($userAccountResult)) {
  echo $userAccountResult;
}
?>

<form class="form-signin" action="" method="POST">
  <h1 class="h3 mb-3 font-weight-normal">Create Job Seeker Account</h1>
  <label for="name">Name:</label>
  <input type="text" id="name" name="name" value="<?php if(isset($_POST['name'])){echo $_POST['name'];}?>" class="form-control">


<div class="form-group">
  <label for="gender">Gender:</label>
  <select class="form-control" name="gender" id="gender">

    <option value="male" <?php if(isset($_POST['gender']) AND $_POST['gender'] == "male") { echo "Selected"; } ?> >Male</option>
    <option value="female" <?php if(isset($_POST['gender']) AND $_POST['gender'] == "female") { echo "Selected"; } ?> >Female</option>
    <option value="others" <?php if(isset($_POST['gender']) AND $_POST['gender'] == "others") { echo "Selected"; } ?> >Others</option>
  </select>
</div>


<!--
<div class="form-group">
  <label for="skillCategory">Select your skill from following list:</label>
  <select class="form-control" name="skillCategory" id="skillCategory">

 <option value="-1" >Select Category</option>

    <option value="Accounting/Finance" <?php if(isset($_POST['skillCategory']) AND $_POST['skillCategory'] == "Accounting/Finance") { echo "Selected"; } ?> >Accounting/Finance</option>

    <option value="Education/Training" <?php if(isset($_POST['skillCategory']) AND $_POST['skillCategory'] == "Education/Training") { echo "Selected"; } ?> >Education/Training</option>

    <option value="Engineer/Architect" <?php if(isset($_POST['skillCategory']) AND $_POST['skillCategory'] == "Engineer/Architect") { echo "Selected"; } ?> >Engineer/Architect</option>

      <option value="IT/Telecommunication" <?php if(isset($_POST['skillCategory']) AND $_POST['skillCategory'] == "IT/Telecommunication") { echo "Selected"; } ?> >IT/Telecommunication</option>

        <option value="Marketing/Sales" <?php if(isset($_POST['skillCategory']) AND $_POST['skillCategory'] == "Marketing/Sales") { echo "Selected"; } ?> >Marketing/Sales</option>

          <option value="Research/Consultancy" <?php if(isset($_POST['skillCategory']) AND $_POST['skillCategory'] == "Research/Consultancy") { echo "Selected"; } ?> >Research/Consultancy</option>
  </select>
</div>

-->
  <label for="email">Email address:</label>
  <input type="email" id="email" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>" class="form-control" >

   <label for="mobile">Mobile Number:</label>
  <input type="tel" id="mobile" name="mobile" value="<?php if(isset($_POST['mobile'])){echo $_POST['mobile'];}?>" class="form-control" >

  <label for="q1">Security Question 1:</label>
  <input type="text" id="q1" name="q1" value="<?php if(isset($_POST['q1'])){echo $_POST['q1'];}?>" class="form-control" >

  <label for="q2">Security Question 2:</label>
  <input type="text" id="q2" name="q2" value="<?php if(isset($_POST['q2'])){echo $_POST['q2'];}?>" class="form-control" >

  <label for="password">Password:</label>
  <input type="password" name="password" id="password" value="<?php if(isset($_POST['password'])){echo $_POST['password'];}?>" class="form-control" >

   <label for="conformPassword">Conform Password:</label>
  <input type="password" name="conformPassword" id="conformPassword" value="<?php if(isset($_POST['conformPassword'])){echo $_POST['conformPassword'];}?>" class="form-control" >

  
  <div style="margin-top:26px;"></div>
  <button class="btn btn-success " type="submit" name="submit">Create Account</button>

</form>
</div>
</div>

<?php require"../inc/footer.php"?>







