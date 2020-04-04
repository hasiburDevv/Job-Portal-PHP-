<?php
include_once"../lib/Session.php";
Session::init();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">




    <title>Dhaka Jobs</title>
  
</head>


<?php

if (isset($_GET['action']) && $_GET['action'] == "userlogout"){
  Session::destroyUser();
}elseif (isset($_GET['action']) && $_GET['action'] == "employerlogout"){
  Session::destroyEmployer();
}
?>

<body>
      <nav class="navbar navbar-light bg-info navbar-dark  navbar-expand-md">
        <div class="container">
          <a class="navbar-brand" href="#">Dhaka Jobs</a>
              <ul class="navbar-nav ml-auto">
                 

              <?php
            $userID = Session::get("userID");
            $empID = Session::get("empID");
           $userSignin = Session::get("userSignin");
           $employerSignin = Session::get("employerSignin");
           if($userSignin == true){
             ?>

                   <li class="nav-item">
                      <a class="nav-link" href="../user/userHome.php?userID=<?php echo $userID;?>">Home</a>
                  </li>
                   <!--
                    <li class="nav-item">
                      <a class="nav-link" href="../user/userEmployerListRead.php?userID=<?php echo $userID;?>">Employer List</a>
                  </li>  -->
                 
                  <li class="nav-item">
                      <a class="nav-link" href="../user/userJobApplyedRead.php?userID=<?php echo $userID;?>">Job Applyed</a>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link" href="../user/userResume.php?userID=<?php echo $userID;?>">Upload Resume</a>
                  </li>

                 <li class="nav-item">
                      <a class="nav-link" href="../user/userProfile.php?userID=<?php echo $userID;?>">Profile</a>
                  </li>


                  <li class="nav-item">
                      <a class="nav-link" href="?action=userlogout">Logout</a>


                 <?php }elseif ($employerSignin == true) {
                   ?>
                    
                   


                    <li class="nav-item">
                      <a class="nav-link" href="../employer/empHome.php?empID=<?php echo $empID;?>">Home</a>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link" href="../employer/empJobPostCreate.php?empID=<?php echo $empID;?>">Post a Job</a>
                  </li>
                

                    <li class="nav-item">
                      <a class="nav-link" href="../employer/empJobPostRead.php?empID=<?php echo $empID;?>">Post List</a>
                  </li>


                  <li class="nav-item">
                      <a class="nav-link" href="../employer/empJobPostCandidate.php?empID=<?php echo $empID;?>">Candidate</a>
                  </li>

                 <li class="nav-item">
                      <a class="nav-link" href="../employer/empProfile.php?empID=<?php echo $empID;?>">Profile</a>
                  </li>


                  <li class="nav-item">
                      <a class="nav-link" href="?action=employerlogout">Logout</a>


               <?php  }else{ ?>

                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Sign in <span style="color:LightGray">or</span> Create Account</a>
                     <div class="dropdown-menu">
                     
              <div class="card" style="width: 18rem;">
             <div class="card-body">
               <h5 class="card-title">Job Seeker</h5>
               <p class="card-text">Sign in or create an account as a job seeker</p>

               <a href="../user/userSignin.php" class="btn btn-primary">Sign in</a>

               <a  href="../user/userAccount.php" class="card-link">Create Account</a>

             </div>
           
                <div class="dropdown-divider"></div>
              
                <div class="card-body" style="width: 18rem;">
                  <h5 class="card-title">Employers</h5>
                  <p class="card-text">Sign in or create an account as a employers</p>
                <a href="../employer/empSignin.php" class="btn btn-warning">Sign in</a>
                  <a href="../employer/empAccount.php" class="card-link">Create Account</a>
                </div>
            
                      </div>
                    </div>
                  </li>
                 <?php } ?>

              </ul>
          </div>
    </nav>

<div style="margin-top:50px;"></div>