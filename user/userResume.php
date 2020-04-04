<?php
include"../inc/header.php";
include "userLoginRegistrationCode.php";
Session::checkSessionUser();
?>
<div class="container col-lg-5">
<?php
 $userID = Session::get('userID');
  $userObj = new User();




  $ResumeResult = $userObj->resumeCheck($userID);

if ($ResumeResult && $ResumeResult->num_rows > 0) {

while ($row = $ResumeResult->fetch_assoc()) {

if(!empty($row['name_cv'])){

	echo $msg ='<div class="alert alert-warning alert-dismissable fade show">
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            <strong>Already Upload Your Resume 

     <a href=' .$row["location"].'>Check it</a>
             </strong>OR Update it! </a>
        </div>';
}else{

 $msg ='<div class="alert alert-warning alert-dismissable fade show">
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            <strong> No Resume found, Upload Your Resume! </strong></a>
        </div>';
echo $msg;

    }
  }
}else{

echo "No result";

}


 ?>


<?php
$loginMsgResult = Session::get("uploadCvMsg");
if (isset($loginMsgResult)){

echo $loginMsgResult;
}
Session::set("uploadCvMsg", NULL);
?>

<?php

if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['SubmitBtn'])){
  $uploadResumeResult = $userObj->uploadResume($userID, $_POST);
}
?>


<div class="custom-file">
	<form action="" method="post" enctype="multipart/form-data" name="form1">

<input type="file" name="resume" class="custom-file-input" id="resume">


  <label class="custom-file-label" for="customFile">Choose file</label>

<div style="margin-top:30px;"></div>

<input type="submit" class="btn btn-primary" name="SubmitBtn" id="SubmitBtn" value="Submit">
  </form>
</div>

</div>
<?php
/*
}*/
?>

<?php require"../inc/footer.php"?>


