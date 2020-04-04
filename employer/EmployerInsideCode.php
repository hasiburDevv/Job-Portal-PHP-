<?php
include_once"../lib/DB.php";
include_once '../lib/Session.php';

class EmployerInsideCode{
public $dbEmpPost; 

function __construct(){
	$this->dbEmpPost = new Database();

$sql = "DELETE FROM jobpost WHERE deadline < NOW()";
	$result = $this->dbEmpPost->conn->query($sql);

/*if ($result) {
echo $msg ='<div class="alert alert-danger alert-dismissable fade show">
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            <strong>ERROR! </strong> Experied Deadline Post Should not Applicable! </a>
        </div>';
      //  echo $msg; 
}*/
}


public function employerJobPost($data){


$empID = Session::get('empID');

if (!isset($empID)) {
	echo "empID is't Set";
}

$jobTitle = $this->test_input($data['jobTitle']);        
$vacancy =  $this->test_input($data['vacancy']);      
$location = $this->test_input($data['location']); 
$empStatus = $this->test_input($data['empStatus']);    
$postedDate = $this->test_input($data['postedDate']);
$deadline = $this->test_input($data['deadline']);
$experiences = $this->test_input($data['experiences']);
$educationLevel = $this->test_input($data['educationLevel']);
$salary = $this->test_input($data['salary']);
$companyDescription = $this->test_input($data['companyDescription']);
$jobDescription = $this->test_input($data['jobDescription']);


$check_jobtitle = $this->jobTitleCheck($jobTitle);

if ($jobTitle == "" OR $vacancy == "" OR $location == "" OR $empStatus == "" OR $postedDate == "" OR $deadline == "" OR $experiences == "" OR $educationLevel == "" OR $salary == "" OR $companyDescription == "" OR $jobDescription == ""){
	$msg ="<div class='alert alert-danger'><strong>ERROR! </strong>Field must not be empty</div>";
	return $msg; 
}elseif ($check_jobtitle == true) {
$msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Duplicate Title Post not Allowed! </div>';
	return $msg;
}



$sql = "INSERT INTO jobpost(jobTitle, vacancy, location, empStatus, postedDate, deadline, experiences, educationLevel, salary, companyDescription, jobDescription, empID) VALUES ('$jobTitle', '$vacancy', '$location','$empStatus', '$postedDate', '$deadline', '$experiences', '$educationLevel', '$salary', '$companyDescription', '$jobDescription', '$empID')";


	if($this->dbEmpPost->conn->query($sql) == True){
	 $msg ='<div class="alert alert-success alert-dismissable fade show">
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            <strong>SUCCESS! </strong> Post Uploaded Successfully </a>
        </div>';
      //  echo $msg; 


Session::set("PostUploadMsg", $msg);
header("location: empJobPostRead.php");
//header("location: ../employer/empJobPostRead.php?msg='$msg'");
	//return $msg;
	}else{
		$msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Post is\'t Uploaded</div>';
	return $msg;
	}


}


private function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

private function jobTitleCheck($check_jobtitle){
	$sql = "SELECT jobTitle FROM jobpost WHERE jobTitle ='$check_jobtitle'";
	
	$result = $this->dbEmpPost->conn->query($sql);

	if($result->num_rows > 0){
		return true;
	}else{
		return false;
	}  
 }



public function empShowJobPost(){

$empID = Session::get('empID');

if (!isset($empID)) {
	echo "empID is't Set";
}

$sql = " SELECT * FROM jobpost WHERE empID = '$empID' AND deadline >= NOW() ORDER BY deadline ASC ";



$result = $this->dbEmpPost->conn->query($sql);

  return $result;

  }




public function getPostByID($jobPostID){
$sql = "SELECT * FROM jobpost where jobPostID = '$jobPostID'";
  
  $result = $this->dbEmpPost->conn->query($sql);
	if($result->num_rows > 0){
		return $result;
	}else{
		return false;
	}

} 



public function employerPostUpdate($jobPostID, $data){

$jobTitle = $this->test_input($data['jobTitle']);        
$vacancy =  $this->test_input($data['vacancy']);      
$location = $this->test_input($data['location']); 
$empStatus = $this->test_input($data['empStatus']);    
$postedDate = $this->test_input($data['postedDate']);
$deadline = $this->test_input($data['deadline']);
$experiences = $this->test_input($data['experiences']);
$educationLevel = $this->test_input($data['educationLevel']);
$salary = $this->test_input($data['salary']);
$companyDescription = $this->test_input($data['companyDescription']);
$jobDescription = $this->test_input($data['jobDescription']);


if ($jobTitle == "" OR $vacancy == "" OR $location == "" OR $empStatus == "" OR $postedDate == "" OR $deadline == "" OR $experiences == "" OR $educationLevel == "" OR $salary == "" OR $companyDescription == "" OR $jobDescription == ""){
	$msg ="<div class='alert alert-danger'><strong>ERROR! </strong>Field must not be empty</div>";
	return $msg; 
}



$sql = "UPDATE jobpost SET 
	 jobTitle = '$jobTitle',
	 vacancy = '$vacancy',
	 location = '$location',
	 empStatus = '$empStatus',
	 postedDate = '$postedDate',
	 deadline = '$deadline',
	 experiences = '$experiences',
	 educationLevel = '$educationLevel',
	 salary = '$salary',
     companyDescription = '$companyDescription',
     jobDescription = '$jobDescription'

	 WHERE jobPostID = '$jobPostID' ";


	if($this->dbEmpPost->conn->query($sql) === TRUE){
		$msg = '<div class="alert alert-success alert-dismissable fade show">
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            <strong>SUCCESS! </strong> Post Updated Successfully </a>
        </div>';
       // header("location:./register.php?signup_invalid=$invalid_submit"); // example 
        
		Session::set("PostUploadMsg", $msg);
		header("location: ./empJobPostRead.php");
	//return $msg;
	}else{
		$msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Post not Updated Successfully</div>';
	return $msg;
	}      

}


/*SELECT t1.col, t3.col FROM table1 
join table2 ON table1.primarykey = table2.foreignkey
join table3 ON table2.primarykey = table3.foreignkey

Read more: https://javarevisited.blogspot.com/2012/11/how-to-join-three-tables-in-sql-query-mysql-sqlserver.html#ixzz63kmQM8CJ*/


public function empJobCandidateMethod($empID){

$sql = "SELECT jobpost.jobTitle, useraccount.name,useraccount.email, useraccount.location, jobapplicant.status, jobapplicant.jobApplicantID, employeraccount.contactEmail FROM employeraccount
join jobpost ON employeraccount.empID = jobpost.empID
join  jobapplicant ON jobpost.jobPostID = jobapplicant.jobPostID
join useraccount ON jobapplicant.userID = useraccount.userID
WHERE jobapplicant.empID = '$empID'
 ";

$result = $this->dbEmpPost->conn->query($sql);
	if($result && $result->num_rows > 0){
		return $result;
	}else{
		return false;
	 }

   }


public function sendUserResultMethod($jobApplicantID, $data){

 $status = $data['status'];

$sql = "UPDATE jobapplicant SET 
	 status = '$status'
	 WHERE jobApplicantID = '$jobApplicantID' ";

$result = $this->dbEmpPost->conn->query($sql);

	if($result){

/*<!--<script> alert('Massage send Successfully!') </script> --> */

 $msg = '<div class="alert alert-success alert-dismissable fade show">
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            <strong>SUCCESS! </strong>Massage send Successfully </a>
        </div>';

        Session::set("PostUploadMsg", $msg);
		header("location: ./empJobPostCandidate.php");
      
	}else{
		$msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Massage wasn\'t send  Successfully</div>';
	return $msg;
	} 

}



/*

if(isset($_GET['download'])) {
  $location = $_GET['download'];


  $sql ="SELECT * FROM useraccount WHERE location = '$location'";

$result = $this->dbEmpPost->conn->query($sql);

  header('Content-Type: application/octet-stream');
  header('Content-Disposition: attachment; filename="'.basename($location).'"');
  header('Content-Length:'.filesize($location));
  readfile($location);

}


*/


public function empJobPostDelete($jobPostID){

 

$sql = "DELETE FROM jobpost WHERE jobPostID = '$jobPostID'";

$result = $this->dbEmpPost->conn->query($sql);

  if($result){

/*<!--<script> alert('Massage send Successfully!') </script> --> */

 $msg = '<div class="alert alert-info alert-dismissable fade show">
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            <strong>SUCCESS! </strong>Job Post Deleted Successfully </a>
        </div>';

        Session::set("PostUploadMsg", $msg);
		header("location: ./empJobPostRead.php");
      
	}else{
		$msg ='<div class="alert alert-danger"><strong>ERROR! Job Post Deleted not Successfull</strong></div>';
	
        Session::set("PostUploadMsg", $msg);
		header("location: ./empJobPostRead.php");
	}


}



}

