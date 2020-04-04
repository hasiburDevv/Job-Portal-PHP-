<?php
include"../inc/header.php";
include "userInsideCode.php";
Session::checkSessionUser();
?>


<?php
if (isset($_GET['jobPostID']) && isset($_GET['empID']) ) {
 $jobPostID = (int)$_GET['jobPostID'];
  $empID = (int)$_GET['empID'];
}
  $userID = Session::get('userID');

?>

<?php
$jobPostDetailObject = NEW userInsideCode;


if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['apply'])){

$applyMsg = $jobPostDetailObject->userJobPostApplyedMethod($userID, $empID, $jobPostID, $_POST);
  }

?>



<div class="container">
 <div>
 <h4>Job Details
  <span class="float-right"><a class="btn btn-primary" href="userHome.php">Back</a>
</span>
</h4>
   <div style="margin-top:50px;"></div>
 <fieldset class="fieldset">
<table>
<?php
$jobPostDetailResult = $jobPostDetailObject->getJobPostDetailByID($jobPostID, $empID);

 if ( $jobPostDetailResult && $jobPostDetailResult->num_rows > 0){ 
    while($row = $jobPostDetailResult->fetch_assoc()) { 
       ?>
       
           
             <tr>
                 <td align="center">
                  <span style="font-weight: bold;">
     Category: </span> <?php echo $row['industryCategory'].'<br>'.'<br>'; ?>
              </td>
                </tr> 


    
                <tr>
                 <td align="center" style="color:green; ">
                  <h4>
                   	
                   	<strong> <?php echo $row['jobTitle']."<br>"; ?> </strong> 

                   </h4> 
                 </td>
               </tr>
               
 
               <tr>
                 <td align="center">
                <strong> <?php echo $row['companyName'].'<br>'.'<br>';?> </strong>  
              </td>
                </tr> 

         
             <tr>
                 <td><span style="font-weight: 500;"> Vacancy: </span> 
                   <?php echo $row['vacancy']."<br>"."<br>"; ?>
                 </td>
               </tr>
             

         <div>
             <tr>
                 <td>
                  <span style="font-weight: 500;">
             Job Responsibilities: </span>
                    
                 </td>
                </tr>
               
               <tr>
                 <td>
            <?php echo str_replace('\n', "<br/>", $row['jobDescription']) ."<br>"."<br>"; ?>
                   </td>
               </tr> 
           </div>

           <div>
             <tr>
                 <td>
                  <span style="font-weight: 500;">
             Company Description: </span>
                    
                 </td>
                </tr>
               
               <tr>
                 <td>
            <?php echo str_replace('\n', "<br/>", $row['companyDescription']) ."<br>"."<br>"; ?>
                   </td>
               </tr> 
           </div>


          <div>
             <tr>
                 <td>
                  <span style="font-weight: 500;">
          Employment Status: </span>
                    
                 </td>
                </tr>
               
               <tr>
                 <td>
            <?php echo $row['empStatus']."<br>"."<br>"; ?>
                   </td>
               </tr> 
           </div>




           <div>
             <tr>
                 <td>
                  <span style="font-weight: 500;">
          Educational Requirements: </span>
                    
                 </td>
                </tr>
               
               <tr>
                 <td>
            <?php echo str_replace('\n', "<br/>", $row['educationLevel']) ."<br>"."<br>"; ?>
                   </td>
               </tr> 
           </div>




         <div>
             <tr>
                 <td>
                  <span style="font-weight: 500;">
               Experience Requirements: </span>
                    
                 </td>
                </tr>
               
               <tr>
                 <td>
            <?php echo $row['experiences']."<br>"."<br>"; ?>
                   </td>
               </tr> 
           </div>



         <div>
             <tr>
                 <td>
                  <span style="font-weight: 500;">Job Location: </span>
                    
                 </td>
                </tr>
               
               <tr>
                 <td>
            <?php echo $row['location']."<br>"."<br>"; ?>
                   </td>
               </tr> 
           </div>


         <div>
             <tr>
                 <td>
                  <span style="font-weight: 500;">Salary: </span>
                    
                 </td>
                </tr>
               
               <tr>
                 <td>
            <?php echo $row['salary']."<br>"."<br>"; ?>
                   </td>
               </tr> 
           </div>



<div>
             <tr>
                 <td>
                  <span style="font-weight: 500;">Dead Line: </span>
                    
                 </td>
                </tr>
               
               <tr>
                 <td>
            <?php echo $row['deadline']."<br>"."<br>"; ?>
                   </td>
               </tr> 
           </div>

        



 </table>
</fieldset>
</div>
<?php }//while

?>
<?php
}else{
 echo "0 results";
}
?>

 <div style="margin-top:50px;"></div>

<div class="container col-lg-5 col-md-6 col-sm-8">

<?php
if (isset($applyMsg)) {
  echo $applyMsg;
}
?>


<?php
/*
//$uploadResume = Session::get("uploadResume");

if ($this::get("uploadResume") == true){

echo $msg ='<div class="alert alert-success alert-dismissable fade show">
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            <strong>Please Upload Your Resume! </strong> Update it! </a>
        </div>';

}else{
  */
?>

<form method="POST" action="" >

<div style="margin-top:30px;"></div>

<div class="text-center">
  <button  type="submit" class="btn btn-success"  name="apply">Apply</button>
 
</div>
<!--
<a class="btn btn-primary" href="userJobApplyedRead.php?jobPostID=<?php echo urlencode( $row['jobPostID']); ?>&amp;empID=<?php echo urlencode( $row['empID']); ?>&amp;userID=<?php echo urlencode( $row['userID']); ?>">
      Apply</a> -->

</form>


<?php/*
}*/
?>


</div>

<?php require"../inc/footer.php"?>
