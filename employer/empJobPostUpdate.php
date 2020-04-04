<?php
include"../inc/header.php";
include "EmployerInsideCode.php";
Session::checkSessionEmployer();
?>


<?php // Update job post 
$employerPostUpdateObject = NEW EmployerInsideCode();

 if (isset($_GET['jobPostID'])){
  $jobPostID = $_GET['jobPostID'];
}


if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['update'])){
  $employerPostMsg = $employerPostUpdateObject->employerPostUpdate($jobPostID, $_POST);
 }

?>



<div class="container">
  <div style="max-width:600px; margin:0 auto">

<?php/*
$PostUploadMsg = Session::get("PostUploadMsg");
if (isset($PostUploadMsg)){
echo $PostUploadMsg;
}
Session::set("PostUploadMsg", NULL);*/
?>


<?php
if (isset($employerPostMsg)) {
  echo $employerPostMsg;
}

?>



<?php

 $PostData = $employerPostUpdateObject->getPostByID($jobPostID);

if ($PostData->num_rows > 0){
  while ($row = $PostData->fetch_assoc()) {
  ?> 


<h4>Update Your Post
  <span class="float-right"><a class="btn btn-primary" href="empJobPostRead.php">Back</a>
</span>
</h4>
  
 <div style="margin-top:20px;"></div>
<form class="form-signin" action="" method="POST">
 


<div class="form-row ">
<div class="form-group col-lg">
  <label for="jobTitle">Job Title:</label>
<input type="text" name="jobTitle" 
value="<?php echo $row['jobTitle']; ?>" 
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
  <input type="number" name="vacancy" value="<?php echo $row['vacancy']; ?>"  class="form-control">

    </div>
    <div class="form-group col-md-5">

      <label for="location">Location:</label>
  <input type="text" name="location" value="<?php echo $row['location']; ?>" class="form-control" >

    </div>

    <div class="form-group col-md-3">

  <label for="empStatus">Employment Status:</label>
<select name="empStatus" class="form-control">
   <option
    value="fullTime" 
    <?php if($row['empStatus'] == 'fullTime'){ echo "Selected"; } ?>

    >Full-time</option>
   <option value="partTime" <?php if($row['empStatus'] == 'partTime'){ echo "Selected"; } ?>
   >Part-Time</option>
 </select>
</div>

</div>


  <div class="form-row">
  
  <div class="form-group col-md-6">
    
    <label for="postedDate">Posted on Date:</label>
  <input type="date" name="postedDate" value="<?php echo $row['postedDate']; ?>" class="form-control" >

  </div>
    
  <div class="form-group col-md-6">
    
    <label for="deadline">Deadline:</label>
  <input type="date" name="deadline" value="<?php echo $row['deadline']; ?>" class="form-control" >

  </div>

  </div>


  <div class="form-row">

   <div class="form-group col-md-4">

   <label for="experiences">Years of Experiences:</label>
  <input type="text" name="experiences" value="<?php echo $row['experiences']; ?>" class="form-control" >

</div>

<div class="form-group col-md-5">
  
   <label for="educationLevel">Education Level:</label>
  <input type="text" name="educationLevel"  value="<?php echo $row['educationLevel']; ?>" class="form-control" >

</div>
 
  <div class="form-group col-md-3">
    
    <label for="salary">Salary:</label>
  <input type="text" name="salary" value="<?php echo $row['salary']; ?>" class="form-control" >

  </div>

  </div>



<div class="form-row">
  
<div class="form-group col-md-6">
  <label for="companyDescription">Company description:</label>
  <textarea class="form-control" cols="48" rows="8" name="companyDescription"> <?php if (isset($row['companyDescription'])) {
    echo $row['companyDescription'];
    } ?>
  </textarea>
  </textarea>
</div>

<div class="form-group col-md-6">
  <label for="jobDescription">Job description:</label>
  <textarea class="form-control" cols="48" rows="8" name="jobDescription"> 
    <?php if (isset($row['jobDescription'])) {
    echo $row['jobDescription'];
    } ?>
  </textarea>
</div>

</div>



  <button type="submit" name="update" class="btn btn-success">Update</button>
  </form>
<?php
    }
 }else{
  echo "0 result";
}
?>
</div>
</div>



<?php require"../inc/footer.php"?>

