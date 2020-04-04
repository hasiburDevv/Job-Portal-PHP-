<?php
class Session{

public static function init(){
   if (version_compare(phpversion(),'5.4.0','<')) {
   if (session_id() == '') {
      	session_start();
      }   
    }else {
    	if (session_status() == PHP_SESSION_NONE) {
    		session_start();
    	}
    }
  }


  public static function set($key, $val){
        $_SESSION[$key] = $val;
  }

  
   public static function get($key){
       if (isset($_SESSION[$key])) {
         
         return  $_SESSION[$key];
       }else{
       	return false;
       }
  }




public static function checkSessionUser(){
if (self::get("userSignin") == false) {
	self::destroyUser();
	header("Location: ../user/userSignin.php");
	}	
}

public static function checkSessionEmployer(){
if (self::get("employerSignin") == false) {
  self::destroyEmployer();
  header("Location: ../employer/empSignin.php");
  } 
}




public static function checkSessionSigninUser(){
if (self::get("userSignin") == true) {
	header("Location: ../user/userHome.php");
	}
}


public static function checkSessionSigninEmployer(){
if (self::get("employerSignin") == true) {
  header("Location: ../employer/empHome.php");
  exit();
  }
}

public static function destroyUser(){ 
	session_destroy();
	session_unset();
	header("Location: ../user/userSignin.php");
}

public static function destroyEmployer(){ 
  session_destroy();
  session_unset();
 header("Location: ../employer/empSignin.php");
}

} 
?>
