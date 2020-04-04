<?php
include"../inc/header.php";
include "EmployerInsideCode.php";
Session::checkSessionEmployer();
?>

<div class="container">
<?php
$PostUploadMsg = Session::get("PostUploadMsg");
if (isset($PostUploadMsg)){
echo $PostUploadMsg;
}
Session::set("PostUploadMsg", NULL);
?>



<?php
 $empJobCandidateObject = new EmployerInsideCode();

if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['send'])){
  $jobApplicantID = Session::get('jobApplicantID'); 
  $sendUserResultMsg = $empJobCandidateObject->sendUserResultMethod($jobApplicantID, $_POST);//have to pass user data id $userid because need to tell you which data it which update
}
?>

<?php
if (isset($sendUserResultMsg)) {
  echo $sendUserResultMsg;
}
?>


<table class="table table-bordered table-hover ">
  <thead class="thead-light">
    <tr >
      <th>Job Title</th>
      <th>Candidate Name</th>
       <th>Resume</th>
        <th>Status</th>
        <th>Action</th>
         <th>Contact Email</th>
    </tr>

  </thead>

<?php
$empID = Session::get('empID');

$empJobCandidateMsg = $empJobCandidateObject->empJobCandidateMethod($empID);

//$value = mysqli_fetch_array($empShowJobPost);


if ($empJobCandidateMsg AND $empJobCandidateMsg->num_rows > 0) {
    //Session::init();
    //Session::set('jobPostID', $empShowJobPost['jobPostID']);
     while ($row = $empJobCandidateMsg->fetch_assoc()) {
?>


<form method="POST" action="">
<tbody>
    <tr >
    <?php //echo $row['jobApplicantID']; 

 Session::set('jobApplicantID',$row['jobApplicantID']); 

    ?>

     <td  ><?php echo $row['jobTitle'];  ?> </td>
      <td > <?php echo $row['name'];  ?> </td>
      <td><a href="../user/<?php echo $row['location'] ?>">Download</a></td>
      <!-- <td ><a class='link' href='EmployerInsideCode.php?download=<?php
echo $row["location"];
         ?>'>Download</a></td> -->  

      
      <td > 
  <select class="form-control" name="status" id="status">
    <option value="select" disabled="disabled" selected="">Select</option>
    <option value="Accept"
         <?php if($row['status'] == 'Accept'){ echo "Selected"; } ?> 
    >Accept</option>
    <option value="Reject"
<?php if($row['status'] == 'Reject'){ echo "Selected"; } ?>
    >Reject</option>
    <option value="Waiting"
<?php if($row['status'] == 'Waiting'){ echo "Selected"; } ?>
    >Waiting List</option>
  </select>

   </td>

<td> <button type="submit" name="send" class="btn btn-success">Send</button> </td>

<td> <a href="sendUserEmail.php?userEmail=<?php echo $row['email']; ?>&amp;contactEmail=<?php echo $row['contactEmail']; ?>" class="btn btn-danger">Email</a> </td>
</tr>
    
  </tbody>

</form>

<?php }
}else{
 //echo "0 results , No one apply ";  
}
?>


</table>

</div>
</div>


<?php require"../inc/footer.php"?>

