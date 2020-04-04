<?php
include"../inc/header.php";
include "EmployerInsideCode.php";
Session::checkSessionEmployer();
?>


<?php
$PostUploadMsg = Session::get("PostUploadMsg");
if (isset($PostUploadMsg)){
echo $PostUploadMsg;
}
Session::set("PostUploadMsg", NULL);
?>

<?php/*
if (isset($_GET['msg'])) {
  echo $_GET['msg']; 
}*/
?>


<div class="container">	
<table class="table table-bordered table-hover">
  <thead class="thead-light">
    <tr >
      
      <th>Job Title</th>
      <th  >Post Date</th>
      <th >Deadline</th>
      <th>Edit</th>
      <th  >Delete</th>
    </tr>

  </thead>

<?php
$showPostlistObject = NEW EmployerInsideCode();
$empShowJobPost = $showPostlistObject->empShowJobPost();

//$value = mysqli_fetch_array($empShowJobPost);


if ($empShowJobPost && $empShowJobPost->num_rows > 0) {
    //Session::init();
    //Session::set('jobPostID', $empShowJobPost['jobPostID']);
     while ($row = $empShowJobPost->fetch_assoc()) {
?>
<tbody>
    <tr >
     
      <td  ><?php echo $row['jobTitle'];  ?> </td>
      <td > <?php echo $row['postedDate'];  ?> </td>
      <td > <?php echo $row['deadline'];  ?> </td>
     
<?php  
Session::set('jobPostID', $row['jobPostID']); 
$jobPostID = Session::get('jobPostID');
?>

      <td> <a href="empJobPostUpdate.php?jobPostID=<?php echo $jobPostID; ?>" class="btn btn-primary">Edit</a> </td>
      <td> <a href="empJobPostDelete.php?action=delete&jobPostID=<?php echo $jobPostID; ?>" class="btn btn-danger ">Delete</a> </td>
     
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

