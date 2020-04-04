<?php
include_once"../lib/DB.php";
include_once '../lib/Session.php';

class User{
public $dbUser; 
function __construct(){
	$this->dbUser = new Database();
}

public function userAccount($data){

$name     = $this->test_input($data['name']);
$gender = $this->test_input($data['gender']);
//$skillCategory = $this->test_input($data['skillCategory']);
$email = $this->test_input($data['email']);
$mobile = $this->test_input($data['mobile']);
$q1 = $this->test_input($data['q1']);
$q2 = $this->test_input($data['q2']);
$password = $this->test_input($data['password']);
$conformPassword = $this->test_input($data['conformPassword']);


$check_email = $this->emailCheck($email);

if($name == "" OR $gender == "" /*OR $skillCategory == "" */OR $email == "" OR $mobile == "" OR $q1 == "" OR $q2 == "" OR $password == "" OR $conformPassword == ""){
	$msg ="<div class='alert alert-danger'><strong>ERROR! </strong>Field must not be empty</div>";
	return $msg;
}



if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
	$msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Only letters and white space allowed </div>';
	//header("Location: userSignin.php?")
	return $msg;
}elseif(filter_var($email,FILTER_VALIDATE_EMAIL) == false){
	$msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Email address is not valid </div>';
	return $msg;
}elseif ($check_email == true) {
$msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Email already exist! </div>';
	return $msg;
}elseif (!preg_match("/(^(\+8801|8801|01|008801))[1|5-9]{1}(\d){8}$/", $mobile)) {
$msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Invalid phone number! </div>';
	return $msg;
}elseif ($password != $conformPassword) {
$msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Passwords doesn\'t match! </div>';
	return $msg;
}


$sql = "INSERT INTO useraccount(name, gender, email, mobile, q1, q2, password) VALUES ('$name', '$gender', '$email' , '$mobile', '$q1', '$q2', '$password')";

 if($this->dbUser->conn->query($sql) == True){


	$msg = '<div class="alert alert-success alert-dismissable fade show">
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            <strong>SUCCESS! </strong> Account created successfully <a class="alert-link" href="userSignin.php"> Login now !</a>
        </div>';
       // header("location:./register.php?signup_invalid=$invalid_submit"); // example 
        
		//Session::set("AccountCreateMsg", $msg);
		//header("location: ./userAccount.php");
 
 return $msg;
	}else{
		$msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Account not created successfully </div>';
	return $msg;
	}

 }



private function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



 private function emailCheck($email){
	$sql = "SELECT email FROM useraccount WHERE email = '$email'";

    $result = $this->dbUser->conn->query($sql);

	if($result->num_rows > 0){
		return true;
	}else{
		return false;
	} 
}

private function q1Check($q1){
  $sql = "SELECT q1 FROM useraccount WHERE q1 = '$q1'";

    $result = $this->dbUser->conn->query($sql);

  if($result->num_rows > 0){
    return true;
  }else{
    return false;
  } 
}

private function q2Check($q2){
  $sql = "SELECT q2 FROM useraccount WHERE q2 = '$q2'";

    $result = $this->dbUser->conn->query($sql);

  if($result->num_rows > 0){
    return true;
  }else{
    return false;
  } 
}

public function userSignin($data){


$email    = $this->test_input($data['email']);
$password = $this->test_input($data['password']);

$check_email = $this->emailCheck($email);

if($email == "" OR $password == ""){
	$msg ="<div class='alert alert-danger'><strong>ERROR! </strong>Field must not be empty</div>";
	return $msg;
}
if(filter_var($email,FILTER_VALIDATE_EMAIL) == false){
	$msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Email address is not valid </div>';
	return $msg;
}elseif ($check_email == false) {
$msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Email does not exist! </div>';
	return $msg;
}


$sql = "SELECT * FROM useraccount WHERE email = '$email' AND password = '$password' LIMIT 1";

$result = $this->dbUser->conn->query($sql);

if ($result != false) {
	$value = mysqli_fetch_array($result);

	if (mysqli_num_rows($result) > 0) {
		
		Session::init();
    Session::set("userSignin", true);
    Session::set('userID', $value['userID']);
    Session::set("name",$value['name']);
    Session::set("gender", $value['gender']);
   // Session::set("skillCategory", $value['skillCategory']);
    Session::set("email", $value['email']);
    Session::set("mobile", $value['mobile']);
    Session::set("loginmsg", '<div class="alert alert-success alert-dismissable fade show">
                  <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span></button><strong>SUCCESS! </strong> You are logged in </a></div>'); 
   
    header("Location: ../user/userHome.php");
	}else{
 $msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Data not match</div>';
 return $msg;
   }
}else{
 $msg ='<div class="alert alert-danger"><strong>ERROR! </strong>No data found</div>';
 return $msg;
   }

}#end user_login


public function userForgetPass( $data){

  $email    = $this->test_input($data['email']);
  $q1    = $this->test_input($data['q1']);
  $q2    = $this->test_input($data['q2']);
  $npassword    = $this->test_input($data['npassword']);

$check_email = $this->emailCheck($email);
$check_q1 = $this->q1Check($q1);
$check_q2 = $this->q2Check($q2);

if($email == "" OR $q1 == "" OR $q2 == "" OR $npassword == ""){
  $msg ="<div class='alert alert-danger'><strong>ERROR! </strong>Field must not be empty</div>";
  return $msg;
}
if(filter_var($email,FILTER_VALIDATE_EMAIL) == false){
  $msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Email address is not valid </div>';
  return $msg;
}elseif ($check_email == false) {
$msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Email does not exist! </div>';
  return $msg;
}elseif ($check_q1 == false) {
$msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Favorite food does not match! </div>';
  return $msg;
}elseif ($check_q2 == false) {
$msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Favorite game does not match! </div>';
  return $msg;
}


$sql = "SELECT * FROM useraccount WHERE email = '$email' AND q1 = '$q1' AND q2 = '$q2' ";

$result = $this->dbUser->conn->query($sql);

if ($result != false) {

  $sql = "UPDATE useraccount SET 
   password = '$npassword'
   WHERE email = '$email' ";

   if($this->dbUser->conn->query($sql) === TRUE){

 $msg ='<div class="alert alert-success alert-dismissable fade show">
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            <strong>SUCCESS! </strong> Password Updated Successfully <a class="alert-link" href="userSignin.php">Click here</a> to log in. </a>
        </div>';

  return $msg;
  }else{
    $msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Password not updated successfully</div>';
  return $msg;
  }      

}



}





public function updateUserData($userID, $data){

$name     =       $data['name'];
$gender =         $data['gender'];
$email    =       $data['email'];
$mobile =         $data['mobile'];
$q1 =         $data['q1'];
$q2 =         $data['q2'];

$check_email = $this->emailCheck($email);

if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
	$msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Only letters and white space allowed </div>';
	return $msg;
}elseif(filter_var($email,FILTER_VALIDATE_EMAIL) == false){
	$msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Email address is not valid </div>';
	return $msg;
}/*elseif ($check_email == true) {
$msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Email already exist! </div>';
	return $msg;
} */elseif (!preg_match("/(^(\+8801|8801|01|008801))[1|5-9]{1}(\d){8}$/", $mobile)) {
$msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Invalid phone number! </div>';
	return $msg;
}


$sql = "UPDATE useraccount SET 
	 name = '$name',
	 gender = '$gender',
	  email = '$email',
	 mobile = '$mobile',
   q1 = '$q1',
   q2 = '$q2'
	 WHERE userID = '$userID' ";


	if($this->dbUser->conn->query($sql) === TRUE){

 $msg ='<div class="alert alert-success alert-dismissable fade show">
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            <strong>SUCCESS! </strong> User Data Updated Successfully </a>
        </div>';
       // header("location:./register.php?signup_invalid=$invalid_submit"); // example 
        
		//Session::set("PostUploadMsg", $msg);
		//header("location: ./empJobPostRead.php");

       //$msg ='<div class="alert alert-success"><strong>SUCCESS! </strong>User data updated successfully</div>';
	return $msg;
	}else{
		$msg ='<div class="alert alert-danger"><strong>ERROR! </strong>User data not updated successfully</div>';
	return $msg;
	}      

}

public function getUserById($userID){

$sql = "SELECT * FROM useraccount where userID = '$userID' LIMIT 1";

$result = $this->dbUser->conn->query($sql);
   return $result;
 }



private function checkPassword($userID, $oldPassword){

$sql = "SELECT password FROM useraccount WHERE userID = '$userID' AND password = '$oldPassword'"; 

$result = $this->dbUser->conn->query($sql);

if ($result->num_rows > 0) {
	return true;
}else{
	return false;
}
}


public function updatePassword($userID, $data){
          $oldPassword = $data['oldPassword'];
          $newPassword = $data['password'];

if ($oldPassword == "" OR $newPassword == ""){
$msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Field must not be empty</div>';
	return $msg;
  }

$check_password = $this->checkPassword($userID, $oldPassword);

if ( $check_password == false){
	$msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Password not exist</div>';
	return $msg;
}

$sql = "UPDATE useraccount set 
	 password = '$newPassword'
	 WHERE userID = '$userID' ";


if($this->dbUser->conn->query($sql) === TRUE){
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





public function uploadResume($userID, $data){



  $fileName=$_FILES["resume"]["name"];
   if ( empty($fileName)) {

 $msg ='<div class="alert alert-danger alert-dismissable fade show">
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            <strong>ERROR! </strong> File must not be Empty  </a>
        </div>'; 

  return Session::set("uploadCvMsg", $msg);

      } 
  //$fileSize=$_FILES["resume"]["size"]/1024;
  $fileType=$_FILES["resume"]["type"];
  $fileTmpName=$_FILES["resume"]["tmp_name"];  

$fileTypeArray = ["application/pdf", "application/doc", "application/docx", "application/rtf", "application/txt", "application/odf", "application/msword"];

  if(in_array($fileType, $fileTypeArray)){
  //  if($fileSize<=200){

      //New file name
      $random=rand(1111,9999);
      $newFileName=$random.$fileName;

      //File upload path
      $uploadPath="resume/".$newFileName;

 if ( empty($uploadPath)) {
     $msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Please Upload your Resume </div>';
	return $msg;
      } 


      //function for upload file
    
      
      if($this->dbUser->conn->query("UPDATE useraccount SET 
	 name_cv = '$newFileName',
	 location = '$uploadPath'
	 WHERE userID = '$userID' "
    ) === TRUE AND  move_uploaded_file($fileTmpName,$uploadPath)){
        echo "Successful"; 
        echo "File Name :".$newFileName; 
        //echo "File Size :".$fileSize." kb"; 
        //echo "File Type :".$fileType; 
        header('Location:userResume.php');



        	$msg ='<div class="alert alert-success alert-dismissable fade show">
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            <strong>SUCCESS! </strong> Resume Upload Successfully </a>
        </div>';
      //  echo $msg; 

Session::set("uploadCvMsg", $msg);
  header('Location: ../user/userResume.php');

	}else{
		$msg ='<div class="alert alert-danger"><strong>ERROR! </strong>Resume Upload is\'t Successfully</div>';
	return $msg;
	   }
    /*}
    else{
      echo "Maximum upload file size limit is 200 kb";
    }
  */
}
  else{

        	$msg ='<div class="alert alert-danger alert-dismissable fade show">
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            <strong>ERROR! </strong> Your file format is not acceptable </a>
        </div>';
      //  echo $msg; 

Session::set("uploadCvMsg", $msg);
  header('Location: ../user/userResume.php');
  }  



   }



public function resumeShow($userID){

 $sql = "SELECT location FROM useraccount WHERE userID = '$userID'";

    $result = $this->dbUser->conn->query($sql);

  if($result->num_rows > 0){
    return $result;
  }else{
    return false;
  }
}



public function resumeCheck($userID){
	$sql = "SELECT name_cv,location FROM useraccount WHERE userID = '$userID'";

    $result = $this->dbUser->conn->query($sql);

	return $result;
}
 

}
