<?php
include"../inc/header.php";
include"userLoginRegistrationCode.php";
Session::checkSessionUser();
?>

<?php
 $userID = Session::get('userID');
 
 $userObj = new User();

if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['update'])){
  $updateUserResult = $userObj->updateUserData($userID, $_POST);//have to pass user data id $userid because need to tell you which data it which update
}
?>






<!--
<div class="modal-body">
  <div class="container-fluid">
    <div class="row">



      <div class="col-md-4">.col-md-4</div>
      <div class="col-md-4 ml-auto">.col-md-4 .ml-auto</div>
    </div>
    <div class="row">
      <div class="col-md-3 ml-auto">.col-md-3 .ml-auto</div>
      <div class="col-md-2 ml-auto">.col-md-2 .ml-auto</div>
    </div>
    <div class="row">
      <div class="col-md-6 ml-auto">.col-md-6 .ml-auto</div>
    </div>
    <div class="row">
      <div class="col-sm-9">
        Level 1: .col-sm-9
        <div class="row">
          <div class="col-8 col-sm-6">
            Level 2: .col-8 .col-sm-6
          </div>
          <div class="col-4 col-sm-6">
            Level 2: .col-4 .col-sm-6
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

-->





<div class="container">
  
  <div style="max-width:600px; margin:0 auto">
  <div class="panel panel-default">
  <div class="panel-heading">
 <h4>User profile
  <span class="float-right"><a class="btn btn-primary" href="userHome.php">Back</a>
</span>
</h4>
 <div class="panel-body">

<?php
if (isset($updateUserResult)) {
  echo $updateUserResult;
}
?>

<?php

 $userDataResult = $userObj->getUserById($userID);


if ($userDataResult->num_rows > 0){
  while ($row = $userDataResult->fetch_assoc()) {
  ?> 

<form class="form-signin" action="" method="POST">
  <label for="name">Name:</label>
  <input type="text" id="name" name="name" class="form-control" value="<?php echo $row['name']; ?>">


<div class="form-group">
  <label for="gender">Select Gender:</label>
  <select class="form-control" name="gender" id="gender">
    <option value="male"
         <?php if($row['gender'] == 'male'){ echo "Selected"; } ?> 
    >Male</option>
    <option value="female"
<?php if($row['gender'] == 'female'){ echo "Selected"; } ?>
    >Female</option>
    <option value="others"
<?php if($row['gender'] == 'others'){ echo "Selected"; } ?>
    >Others</option>
  </select>
</div>

<!--
<div class="form-group">
  <label for="skillCategory">Select your skill from following list:</label>
  
  <select class="form-control" name="skillCategory" id="skillCategory">
    <option value="Accounting/Finance" 
         <?php if($row['skillCategory'] == 'Accounting/Finance'){ echo "Selected"; } ?> 
    >Accounting/Finance</option>
    <option value="Education/Training" 
  <?php if($row['skillCategory'] == 'Education/Training'){ echo "Selected"; } ?> 
    >Education/Training</option>
    <option value="Engineer/Architect" 
    <?php if($row['skillCategory'] == 'Engineer/Architect'){ echo "Selected"; } ?> 
    >Engineer/Architect</option>
      <option value="IT/Telecommunication" 
      <?php if($row['skillCategory'] == 'IT/Telecommunication'){ echo "Selected"; } ?> 
      >IT/Telecommunication</option>
        <option value="Marketing/Sales" 
         <?php if($row['skillCategory'] == 'Marketing/Sales'){ echo "Selected"; } ?> 
        >Marketing/Sales</option>
          <option value="Research/Consultancy" 
          <?php if($row['skillCategory'] == 'Research/Consultancy'){ echo "Selected"; } ?> 
          >Research/Consultancy</option>
  </select>
</div>

-->

  <label for="email">Email address:</label>
  <input type="email" id="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" >

   <label for="mobile">Mobile Number:</label>
  <input type="tel" id="mobile" name="mobile" class="form-control" 
    value="<?php echo $row['mobile']; ?>">

    <label for="q1">What is your favourite food?</label>
  <input type="text" id="q1" name="q1" class="form-control" value="<?php echo $row['q1']; ?>" >

   <label for="q2">What is your favourite game?</label>
  <input type="text" id="q2" name="q2" class="form-control" 
    value="<?php echo $row['q2']; ?>">
  
  <div style="margin-top:30px;"></div>
  <button type="submit" class="btn btn-success"  name="update">Update</button>
 
  <a class="btn btn-info" href="userChangePassword.php?userID=<?php echo $userID; ?>"> Password Change</a>

</form>
<?php
}
 }else{
 echo "0 result";
}
?>
</div>
</div>
</div>
</div>
</div>
  


<?php require"../inc/footer.php"?>







