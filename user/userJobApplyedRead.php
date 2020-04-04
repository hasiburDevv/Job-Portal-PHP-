<?php
include"../inc/header.php";
include "userInsideCode.php";
Session::checkSessionUser();
?>

<?php
$msg = Session::get("applyedMsg");

if (isset($msg)) {
	echo $msg;# code...
}
Session::set("applyedMsg", NULL);
?>



<div class="container ">	
<table class="table table-bordered table-hover">
  <thead class="thead-light">
    <tr >
      <th>Job Title</th>
      <th>Company Name</th>
      <th>Industry Category</th>
      <th>No of Vacency</th>
      <th>Employer Status</th>
      <th>Apply Date</th>
      <th>Status</th>
    </tr>

  </thead>

<?php
$userID = Session::get('userID');

$showApplyJoblistObject = NEW userInsideCode();
$userShowJobPost = $showApplyJoblistObject->JobApplyPostShow($userID);

//$value = mysqli_fetch_array($empShowJobPost);


if ($userShowJobPost->num_rows > 0) {
    //Session::init();
    //Session::set('jobPostID', $empShowJobPost['jobPostID']);
     while ($row = $userShowJobPost->fetch_assoc()) {
?>
<tbody>
    <tr >
     
      <td ><?php echo $row['jobTitle'];  ?> </td>
      <td > <?php echo $row['companyName'];  ?> </td>
      <td > <?php echo $row['industryCategory'];  ?> </td>
      <td > <?php echo $row['vacancy'];  ?> </td>
      <td > <?php echo $row['empStatus'];  ?> </td>
      <td > <?php echo $row['applyDate'];  ?> </td>
      <td > <?php echo $row['status'];  ?> </td>
     
    </tr>
    
  </tbody>

<?php }
}else{
 echo "0 results";  
}
?>


</table>
</div>






<?php require"../inc/footer.php"?>
