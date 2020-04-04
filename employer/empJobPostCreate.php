<?php
include"../inc/header.php";
include "EmployerInsideCode.php";
Session::checkSessionEmployer();
?>


<?php // insert job post 
$employerPost = NEW EmployerInsideCode();
if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['submit']) ){
  $employerPostMsg = $employerPost->employerJobPost($_POST);
}
?>



<div class="container">
  <div style="max-width:600px; margin:0 auto">
<?php
if (isset($employerPostMsg)) {
  echo $employerPostMsg;
}

?>

<form class="form-signin" action="" method="POST">
  <h1 class="h3 mb-3 font-weight-normal">Post a Job</h1>

<div class="form-row">
<div class="form-group col-lg">
  <label for="jobTitle">Job Title:</label>
<input type="text" name="jobTitle" 
value="
<?php if(isset($_POST['jobTitle'])){echo $_POST['jobTitle'];}?>" 
class="form-control" >
</div>



</div>


<div class="form-row">


<fieldset disabled class="col-lg-6">
    <div class="form-group">
      <label for="disabledTextInput">Company Name</label>
      <input type="text" id="disabledTextInput" class="form-control" 
      value="<?php
$companyName = Session::get('companyName');
if(isset($companyName)){
  echo "$companyName";
}
?>">
    </div>
  </fieldset>

<fieldset disabled class="col-lg-6">
    <div class="form-group">
      <label for="disabledTextInput">Category</label>
      <input type="text" id="disabledTextInput" class="form-control" 
      value="<?php
$industryCategory = Session::get('industryCategory');
if(isset($industryCategory)){
  echo "$industryCategory";
}
?>">
    </div>
  </fieldset>
</div>




  <div class="form-row">
    <div class="form-group col-md-4">

      <label for="vacancy">Vacancy:</label>
  <input type="number" name="vacancy" value="<?php if(isset($_POST['vacancy'])){echo $_POST['vacancy'];}?>" class="form-control">

    </div>
    <div class="form-group col-md-5">

      <label for="location">Location:</label>
  <input type="text" name="location" value="<?php if(isset($_POST['location'])){echo $_POST['location'];}?>" class="form-control" >

    </div>

    <div class="form-group col-md-3">

  <label for="empStatus">Employment Status:</label>
<select name="empStatus" class="form-control">
   <option value="fullTime" <?php if(isset($_POST['empStatus']) && $_POST['empStatus'] == "fullTime") { echo "selected=\"selected\""; } ?>>Full-time</option>
   <option value="partTime" <?php if(isset($_POST['empStatus']) &&$_POST['empStatus'] == "partTime") { echo "selected=\"selected\""; } ?>>Part-Time</option>
 </select>
</div>

</div>


  <div class="form-row">
  
  <div class="form-group col-md-6">
    
    <label for="postedDate">Posted on Date:</label>
  <input type="date" name="postedDate" value="<?php if(isset($_POST['postedDate'])){echo $_POST['postedDate'];}?>" class="form-control" >

  </div>
    
  <div class="form-group col-md-6">
    
    <label for="deadline">Deadline:</label>
  <input type="date" name="deadline" value="<?php if(isset($_POST['deadline'])){echo $_POST['deadline'];}?>" class="form-control" >

  </div>

  </div>


  <div class="form-row">

   <div class="form-group col-md-4">

   <label for="experiences">Years of Experiences:</label>
  <input type="text" name="experiences" value="<?php if(isset($_POST['experiences'])){echo $_POST['experiences'];}?>" class="form-control" >

</div>

<div class="form-group col-md-5">
  
   <label for="educationLevel">Education Level:</label>
  <input type="text" name="educationLevel"  value="<?php if(isset($_POST['educationLevel'])){echo $_POST['educationLevel'];}?>" class="form-control" >

</div>
 
  <div class="form-group col-md-3">
    
    <label for="salary">Salary:</label>
  <input type="text" name="salary" value="<?php if(isset($_POST['salary'])){echo $_POST['salary'];}?>" class="form-control" >

  </div>

  </div>



<div class="form-row">
  
<div class="form-group col-md-6">
  <label for="companyDescription">Company description:</label>
  <textarea class="form-control" rows="5" name="companyDescription"> 
  </textarea>
</div>

<div class="form-group col-md-6">
  <label for="jobDescription">Job description:</label>
  <textarea class="form-control" rows="5" name="jobDescription"> 
  </textarea>
</div>

</div>



  <button type="submit" name="submit" class="btn btn-warning">Post in Forum</button>
</form>

</div>
</div>



<?php require"../inc/footer.php"?>

