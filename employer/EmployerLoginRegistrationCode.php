<?php
include_once"../lib/DB.php";
include_once '../lib/Session.php';

class Employer{

public $dbEmp; 
function __construct(){
	$this->dbEmp = new Database();
}


public function employerAccount($data){

$userName = $this->test_input($data['userName']);        
$password =  $this->test_input($data['password']);      
$conformPassword = $this->test_input($data['conformPassword']);
$q1 = $this->test_input($data['q1']);
$q2 = $this->test_input($data['q2']); 
$companyName = $this->test_input($data['companyName']);    
$industryCategory = $this->test_input($data['industryCategory']);
$contactName = $this->test_input($data['contactName']);
$contactEmail = $this->test_input($data['contactEmail']);
$contactMobile = $this->test_input($data['contactMobile']);


$check_username = $this->usernameCheck($userName);
$check_email = $this->emailCheck($contactEmail);
$check_company = $this->companyCheck($companyName);



if ($userName == "" OR $password == "" OR $conformPassword == ""OR $q1 == "" OR $q2 == "" OR $companyName == "" OR $industryCategory == "" OR $contactName == "" OR $contactEmail == "" OR $contactMobile == ""){
	$msg ="<div class='alert alert-danger'><strong>ERROR! </strong>Field must not be empty</div>";
	return $msg; 
}


if (!preg_match("/^[a-zA-Z ]*$/",$userName) || !preg_match("/^[a-zA-Z ]*$/",$contactName)) {
	$msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Only letters and white space allowed </div>';
	return $msg;
}elseif(filter_var($contactEmail,FILTER_VALIDATE_EMAIL) == false){
	$msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Email address is not valid </div>';
	return $msg;
}elseif ($check_username == true) {
$msg ='<div class="alert alert-danger"><strong>ERROR! </strong>User Name already exist! </div>';
	return $msg;
}elseif ($check_email == true) {
$msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Email already exist! </div>';
	return $msg;
}elseif ($check_company == true) {
$msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Company Name already exist! </div>';
	return $msg;
   }elseif (!preg_match("/(^(\+8801|8801|01|008801))[1|5-9]{1}(\d){8}$/", $contactMobile)) {
$msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Invalid phone number! </div>';
	return $msg;
}elseif ($password != $conformPassword) {
$msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Password does\'t match! </div>';
	return $msg;
   }


$sql = "INSERT INTO employeraccount(userName, password, q1, q2, companyName, industryCategory, contactName, contactEmail, contactMobile) VALUES ('$userName', '$password', '$q1', '$q2', '$companyName','$industryCategory', '$contactName', '$contactEmail', '$contactMobile')";





	if($this->dbEmp->conn->query($sql) == True){
	 $msg ='<div class="alert alert-success alert-dismissable fade show">
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            <strong>SUCCESS! </strong> Account created successfully <a class="alert-link" href="empSignin.php"> Signin now !</a>
        </div>';
    
	 return $msg;
	}else{
		$msg ='<div class="alert alert-danger"><strong>ERROR! </strong>registration is not successfull </div>';
	return $msg;
	}


}



private function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


private function usernameCheck($userName){
	$sql = "SELECT userName FROM employeraccount WHERE userName ='$userName'";
	
	$result = $this->dbEmp->conn->query($sql);

	if($result->num_rows > 0){
		return true;
	}else{
		return false;
	}  
}

private function emailCheck($contactEmail){
	$sql = "SELECT contactEmail FROM employeraccount WHERE contactEmail ='$contactEmail'";
	
	$result = $this->dbEmp->conn->query($sql);

	if($result->num_rows > 0){
		return true;
	}else{
		return false;
	}  
}

private function q1Check($q1){
  $sql = "SELECT q1 FROM employeraccount WHERE q1 = '$q1'";

    $result = $this->dbEmp->conn->query($sql);

  if($result->num_rows > 0){
    return true;
  }else{
    return false;
  } 
}

private function q2Check($q2){
  $sql = "SELECT q2 FROM employeraccount WHERE q2 = '$q2'";

    $result = $this->dbEmp->conn->query($sql);

  if($result->num_rows > 0){
    return true;
  }else{
    return false;
  } 
}




private function companyCheck($companyName){
	$sql = "SELECT companyName FROM employeraccount WHERE companyName ='$companyName'";
	
	$result = $this->dbEmp->conn->query($sql);

	if($result->num_rows > 0){
		return true;
	}else{
		return false;
	}  
}




public function employerSignin($data){

$userName = $data['userName'];
$password = $data['password'];

$check_username = $this->usernameCheck($userName);

if ($userName == "" OR $password == "") {
	$msg = "<div class='alert alert-danger'>
<strong>ERROR! </strong>Field must not be empty</div>";
return $msg;
}elseif ($check_username == false) {
$msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Username does not exist! </div>';
	return $msg;
}

$sql = "SELECT * FROM employeraccount WHERE userName ='$userName' AND password = '$password' LIMIT 1";
	
$result = $this->dbEmp->conn->query($sql);

if ($result != false) {
	$value = mysqli_fetch_array($result);
if (mysqli_num_rows($result) > 0) {

	Session::init();
    Session::set("employerSignin", true);
    Session::set('empID', $value['empID']);
    Session::set("userName",$value['userName']);
    Session::set("companyName", $value['companyName']);
    Session::set("industryCategory", $value['industryCategory']);
    Session::set("contactName", $value['contactName']);
    Session::set("contactEmail", $value['contactEmail']);
    Session::set("contactMobile", $value['contactMobile']);
    Session::set("loginmsg", '<div class="alert alert-success"><strong>SUCCESS! </strong>You are logged in</div>'); 
    
    header("Location: ../employer/empHome.php");

}else{
 $msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Password not match</div>';
 return $msg;
   }
}else{
 $msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Query Result not found</div>';
 return $msg;
   }

}


public function empForgetPass( $data){

  $userName = $this->test_input($data['userName']);
  $q1    = $this->test_input($data['q1']);
  $q2    = $this->test_input($data['q2']);
  $npassword    = $this->test_input($data['npassword']);

$check_username = $this->usernameCheck($userName);
$check_q1 = $this->q1Check($q1);
$check_q2 = $this->q2Check($q2);

if($userName == "" OR $q1 == "" OR $q2 == "" OR $npassword == ""){
  $msg ="<div class='alert alert-danger'><strong>ERROR! </strong>Field must not be empty</div>";
  return $msg;
}
if(!preg_match("/^[a-zA-Z ]*$/",$userName)){
  $msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Username is not valid </div>';
  return $msg;
}elseif ($check_username == false) {
$msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Username does not exist! </div>';
  return $msg;
}elseif ($check_q1 == false) {
$msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Favorite food does not match! </div>';
  return $msg;
}elseif ($check_q2 == false) {
$msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Favorite game does not match! </div>';
  return $msg;
}


$sql = "SELECT * FROM employeraccount WHERE userName = '$userName' AND q1 = '$q1' AND q2 = '$q2' ";

$result = $this->dbEmp->conn->query($sql);

if ($result != false) {

  $sql = "UPDATE employeraccount SET 
   password = '$npassword'
   WHERE userName = '$userName' ";

   if($this->dbEmp->conn->query($sql) === TRUE){

 $msg ='<div class="alert alert-success alert-dismissable fade show">
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            <strong>SUCCESS! </strong> Password Updated Successfully <a class="alert-link" href="empSignin.php">Click here</a> to log in. </a>
        </div>';

  return $msg;
  }else{
    $msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Password not updated successfully</div>';
  return $msg;
  }      

}



}




public function updateEmpProfileData($empID, $data) {

$userName = $data['userName'];
$q1 =         $data['q1'];
$q2 =         $data['q2'];         
$companyName = $data['companyName'];    
$industryCategory = $data['industryCategory'];
$contactName = $data['contactName'];
$contactEmail = $data['contactEmail'];
$contactMobile = $data['contactMobile'];


$check_username = $this->usernameCheck($userName);
//$check_email = $this->emailCheck($contactEmail);
$check_company = $this->companyCheck($companyName);


if (!preg_match("/^[a-zA-Z ]*$/",$userName)) {
	$msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Only letters and white space allowed </div>';
	return $msg;
}elseif(filter_var($contactEmail,FILTER_VALIDATE_EMAIL) == false){
	$msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Email address is not valid </div>';
	return $msg;
}/*elseif ($check_email == true) {
$msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Email already exist! </div>';
	return $msg;
}*/elseif (!preg_match("/(^(\+8801|8801|01|008801))[1|5-9]{1}(\d){8}$/", $contactMobile)) {
$msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Invalid phone number! </div>';
	return $msg;
}



$sql = "UPDATE employeraccount SET 
	 userName = '$userName',
	 q1 = '$q1',
     q2 = '$q2',
	 companyName = '$companyName',
	 industryCategory = '$industryCategory',
	 contactName = '$contactName',
	 contactEmail = '$contactEmail',
	 contactMobile = '$contactMobile'
	 WHERE empID = '$empID' ";


	if($this->dbEmp->conn->query($sql) === TRUE){

 $msg ='<div class="alert alert-success alert-dismissable fade show">
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            <strong>SUCCESS! </strong> Employer Data Updated Successfully </a>
        </div>';
       // header("location:./register.php?signup_invalid=$invalid_submit"); // example 
        
		//Session::set("PostUploadMsg", $msg);
		//header("location: ./empJobPostRead.php");

       //$msg ='<div class="alert alert-success"><strong>SUCCESS! </strong>User data updated successfully</div>';
	return $msg;
	}else{
		$msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Employer data not updated successfully</div>';
	return $msg;
	}      

}

public function getEmpById($empID){

$sql = "SELECT * FROM employeraccount where empID = '$empID' LIMIT 1";

$result = $this->dbEmp->conn->query($sql);
   return $result;
 }



private function checkPassword($empID, $oldPassword){

$sql = "SELECT password FROM employeraccount WHERE empID = '$empID' AND password = '$oldPassword'"; 

$result = $this->dbEmp->conn->query($sql);

if ($result->num_rows > 0) {
	return true;
}else{
	return false;
}
}


public function updatePassword($empID, $data){
          $oldPassword = $data['oldPassword'];
          $newPassword = $data['password'];

if ($oldPassword == "" OR $newPassword == ""){
$msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Field must not be empty</div>';
	return $msg;
  }

$check_password = $this->checkPassword($empID, $oldPassword);

if ( $check_password == false){
	$msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Password not exist</div>';
	return $msg;
}

$sql = "UPDATE employeraccount set 
	 password = '$newPassword'
	 WHERE empID = '$empID' ";


if($this->dbEmp->conn->query($sql) === TRUE){
		$msg ='<div class="alert alert-success alert-dismissable fade show">
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            <strong>SUCCESS! </strong> Password Updated Successfully </a>
        </div>';
	return $msg;
	}else{
		$msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Password not updated</div>';
	return $msg;
	}


}



}