<?php
include_once"../lib/DB.php";
include_once '../lib/Session.php';

class userInsideCode{

public $dbUserPost; 

function __construct(){
  $this->dbUserPost = new Database();
}


public function numberOfPages(){

$sql='SELECT * FROM jobpost';

$result = $this->dbUserPost->conn->query($sql);

return $result;
}



public function userJobPostBoardSearch($data){

$sql = "SELECT jobpost.jobPostID, jobpost.jobTitle, jobpost.location, jobpost.educationLevel, jobpost.experiences, jobpost.deadline, jobpost.empID, employeraccount.companyName FROM jobpost INNER JOIN employeraccount ON jobpost.empID = employeraccount.empID WHERE jobpost.jobTitle = '$data' AND jobpost.deadline >= NOW() ";

$result = $this->dbUserPost->conn->query($sql);
return $result;

   }


public function userJobPostBoard($this_page_first_result,$results_per_page){

$sql = "SELECT jobpost.jobPostID, jobpost.jobTitle, jobpost.location, jobpost.educationLevel, jobpost.experiences, jobpost.deadline, jobpost.empID, employeraccount.companyName FROM jobpost INNER JOIN employeraccount ON jobpost.empID = employeraccount.empID WHERE jobpost.deadline >= NOW() ORDER BY deadline ASC  LIMIT $this_page_first_result,$results_per_page ";

$result = $this->dbUserPost->conn->query($sql);
return $result;

   }


public function getJobPostDetailByID($jobPostID,$empID){


$sql = "SELECT jobpost.jobPostID, jobpost.jobTitle, jobpost.vacancy, jobpost.jobDescription, jobpost.companyDescription, jobpost.empStatus, jobpost.location, jobpost.educationLevel, jobpost.experiences, jobpost.salary, jobpost.deadline, employeraccount.companyName, employeraccount.industryCategory from jobpost,employeraccount where jobpost.jobPostID = '$jobPostID' and employeraccount.empID = '$empID'";

/*
$sql = "SELECT jobPostID, jobTitle, vacancy, jobDescription, empStatus, location, educationLevel, experiences, salary, deadline FROM jobpost WHERE jobPostID = '$jobPostID' UNION SELECT industryCategory FROM employeraccount WHERE empID = '$empID'
";

  "SELECT jobpost.jobPostID, jobpost.jobTitle, jobpost.vacancy, jobpost.jobDescription, jobpost.empStatus, jobpost.location, jobpost.educationLevel, jobpost.experiences jobpost.satary, jobpost.deadline,employeraccount.companyName, employeraccount.industryCategory FROM jobpost WHERE jobPostID='$jobPostID' INNER JOIN employeraccount ON empID = $empID"; */ 

$result = $this->dbUserPost->conn->query($sql);
return $result;
}



private function jobApplyCheck($userID, $jobPostID){
  $sql = "SELECT * FROM jobapplicant WHERE userID ='$userID' AND jobPostID = '$jobPostID'";
  
  $result = $this->dbUserPost->conn->query($sql);

  if($result->num_rows > 0){
    return true;
  }else{
    return false;
  }  
 }






private function resumeCheck($userID){
  $sql = "SELECT name_cv FROM useraccount WHERE userID = '$userID'";

    $result = $this->dbUserPost->conn->query($sql);

if ($result && $result->num_rows > 0) {

while ($row = $result->fetch_assoc()) {

if(!empty($row['name_cv'])){

return true;

 /* echo $msg ='<div class="alert alert-success alert-dismissable fade show">
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            <strong>Already Upload Your Resume </strong> Update it! </a>
        </div>'; */
}else{

return false;
/* $msg ='<div class="alert alert-success alert-dismissable fade show">
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            <strong> No Resume found, Upload Your Resume! </strong></a>
        </div>';
echo $msg; */

    }
  }
}else{

echo "No result";

}


}
 


public function userJobPostApplyedMethod($userID, $empID, $jobPostID, $data){


$check_resume = $this->resumeCheck($userID);
           
$check_jobApply = $this->jobApplyCheck($userID, $jobPostID);

if ($check_resume == false) {
 $msg ='<div class="alert alert-danger alert-dismissable fade show">
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            <strong>Please Upload Your Resume! </strong> <a class="alert-link" href="userResume.php"> Click here</a>
        </div>';
  return $msg;
}elseif ($check_jobApply == true) {
$msg ='<div class="alert alert-danger"><strong>ERROR! </strong>You Already Apply this Job! </div>';
  return $msg;
}

 $sql = "INSERT INTO jobapplicant(userID, jobPostID, empID)VALUES('$userID', '$jobPostID', '$empID')";
    

 if($this->dbUserPost->conn->query($sql) == True){


	$msg ='<div class="alert alert-success alert-dismissable fade show">
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            <strong>SUCCESS! </strong> Job Application Successfully </a>
        </div>';
      //  echo $msg; 


Session::set("applyedMsg", $msg);
header("location: ./userJobApplyedRead.php");
//header("location: ../employer/empJobPostRead.php?msg='$msg'");
	//return $msg;
	}else{
		$msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Job Application is\'t Successfully</div>';
	return $msg;
	   }

    }    


public function JobApplyPostShow($userID){

 $sql = "SELECT jobpost.jobTitle, employeraccount.companyName, employeraccount.industryCategory, jobpost.vacancy, jobpost.empStatus, jobapplicant.applyDate, jobapplicant.status FROM employeraccount
 INNER JOIN  jobpost ON employeraccount.empID = jobpost.empID
 INNER JOIN jobapplicant ON jobpost.jobPostID = jobapplicant.jobPostID
 WHERE jobapplicant.userID = '$userID'    
 ";

$result = $this->dbUserPost->conn->query($sql);
return $result; 

      }
    


public function inputTextSearch($inputText){

$sql = "SELECT jobTitle FROM jobpost WHERE jobTitle LIKE '%inputText%'";

$result = $this->dbUserPost->conn->query($sql);
if ($result->num_rows > 0) {

while ($row = $result->fetch_assoc()) {

$msg = " <a href='#' class='list-group-item list-group-item-action border-1'>".$row['jobTitle']."</a>";

return $msg;
         }
      }else{
$msg = "<p class='list-group-item border-1'>No Record</p>";

return $msg;

      }
    }

  }


