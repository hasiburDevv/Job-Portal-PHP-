<?php
include"../inc/header.php";
include "EmployerLoginRegistrationCode.php";
Session::checkSessionEmployer();
?>


<?php
 $empID = Session::get('empID');
 
 $empProfileObj = new Employer();

if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['update'])){
  $updateEmpResult = $empProfileObj->updateEmpProfileData($empID, $_POST);//have to pass user data id $userid because need to tell you which data it which update
}
?>



<div class="container">
  
  <div style="max-width:600px; margin:0 auto">
  <div class="panel panel-default">
  <div class="panel-heading">
 <h4>Employer profile
  <span class="float-right"><a class="btn btn-primary" href="empHome.php">Back</a>
</span>
</h4>
 <div class="panel-body">

<?php
if (isset($updateEmpResult)) {
  echo $updateEmpResult;
}
?>

<?php

 $empDataResult = $empProfileObj->getEmpById($empID);


if ($empDataResult->num_rows > 0){
  while ($row = $empDataResult->fetch_assoc()) {
  ?> 

<form class="form-signin" action="" method="POST">
 <label for="userName">Username:</label>
  <input type="text" id="userName" name="userName" 
value="<?php echo $row['userName']; ?>" class="form-control">

  <label for="q1">What is your favourite food?</label>
  <input type="text" id="q1" name="q1" class="form-control" value="<?php echo $row['q1']; ?>" class="form-control">

   <label for="q2">What is your favourite game?</label>
  <input type="text" id="q2" name="q2" class="form-control" 
    value="<?php echo $row['q2']; ?>" class="form-control">

<label for="name">Company Name:</label>
  <input type="text" id="companyName" name="companyName"

value="<?php echo $row['companyName']; ?>" class="form-control">



<div class="form-group">
  <label for="industryCategory">Industry Type:</label>
  
<select class="form-control" name="industryCategory" id="industryCategory">

    <option value="Accounting/Finance" 
<?php if($row['industryCategory'] == 'Accounting/Finance'){ echo "Selected"; } ?> 
>Accounting/Finance</option>


    <option value="Bank/ Non-Bank Fin. Institution"
<?php if($row['industryCategory'] == 'Bank/ Non-Bank Fin. Institution'){ echo "Selected"; } ?> 
>Bank/ Non-Bank Fin. Institution</option>


    <option value="Commercial/Supply Chain" 
<?php if($row['industryCategory'] == 'Commercial/Supply Chain'){ echo "Selected"; } ?> 
 > Commercial/Supply Chain</option>

      <option value="Education/Training" 
<?php if($row['industryCategory'] == 'Education/Training'){ echo "Selected"; } ?> 
 > Education/Training</option>


  <option value="Engineer/Architects" 
<?php if($row['industryCategory'] == 'Engineer/Architects'){ echo "Selected"; } ?> 
> Engineer/Architects</option>



     <option value="Garments/Textile" 

<?php if($row['industryCategory'] == 'Garments/Textile'){ echo "Selected"; } ?>
> Garments/Textile</option>


   <option value="HR/Org. Development" 
<?php if($row['industryCategory'] == 'HR/Org. Development'){ echo "Selected"; } ?>
> HR/Org. Development</option>


 <option value="Gen Mgt/Admin"
<?php if($row['industryCategory'] == 'Gen Mgt/Admin'){ echo "Selected"; } ?>
> Gen Mgt/Admin </option>



 <option value="Design/Creative"
<?php if($row['industryCategory'] == 'Design/Creative'){ echo "Selected"; } ?>
> Design/Creative</option>


<option value="Production/Operation" 
<?php if($row['industryCategory'] == 'Production/Operation'){ echo "Selected"; } ?>
> Production/Operation</option>


 <option value="Hospitality/ Travel/ Tourism" 
<?php if($row['industryCategory'] == 'Hospitality/ Travel/ Tourism'){ echo "Selected"; } ?>
> Hospitality/ Travel/ Tourism</option>


 <option value="Beauty Care/ Health & Fitness" 
<?php if($row['industryCategory'] == 'Beauty Care/ Health & Fitness'){ echo "Selected"; } ?>
> Beauty Care/ Health & Fitness</option>


 <option value="Electrician/ Construction/ Repair" 
<?php if($row['industryCategory'] == 'Electrician/ Construction/ Repair'){ echo "Selected"; } ?>
> Electrician/ Construction/ Repair </option>

 <option value="IT & Telecommunication" 
<?php if($row['industryCategory'] == 'IT & Telecommunication'){ echo "Selected"; } ?>
> IT & Telecommunication</option>

  
   <option value="Marketing/Sales" 
<?php if($row['industryCategory'] == 'Marketing/Sales'){ echo "Selected"; } ?>
> Marketing/Sales </option>


 <option value="Customer Support/Call Centre" 
<?php if($row['industryCategory'] == 'Customer Support/Call Centre'){ echo "Selected"; } ?>
> Customer Support/Call Centre</option>


<option value="Media/Ad./Event Mgt." 
<?php if($row['industryCategory'] == 'Media/Ad./Event Mgt.'){ echo "Selected"; } ?>
> Media/Ad./Event Mgt.</option>


<option value="Medical/Pharma" 
<?php if($row['industryCategory'] == 'Medical/Pharma'){ echo "Selected"; } ?>
> Medical/Pharma</option>

<option value="Agro (Plant/Animal/Fisheries)" 
<?php if($row['industryCategory'] == 'Agro (Plant/Animal/Fisheries)'){ echo "Selected"; } ?>
> Agro (Plant/Animal/Fisheries)</option>


<option value="NGO/Development" 
<?php if($row['industryCategory'] == 'NGO/Development'){ echo "Selected"; } ?>
> NGO/Development</option>

<option value="Research/Consultancy" 
<?php if($row['industryCategory'] == 'Research/Consultancy'){ echo "Selected"; } ?>
>  Research/Consultancy</option>

<option value="Secretary/Receptionist" 
<?php if($row['industryCategory'] == 'Secretary/Receptionist'){ echo "Selected"; } ?>
>  Secretary/Receptionist </option>


<option value="Data Entry/Operator/BPO" 
<?php if($row['industryCategory'] == 'Data Entry/Operator/BPO'){ echo "Selected"; } ?>
>  Data Entry/Operator/BPO</option>


<option value="Driving/Motor Technician" 
<?php if($row['industryCategory'] == 'Driving/Motor Technician'){ echo "Selected"; } ?>
>   Driving/Motor Technician</option>


<option value="Security/Support Service" 
<?php if($row['industryCategory'] == 'Security/Support Service'){ echo "Selected"; } ?>
> Security/Support Service</option>


<option value="Law/Legal" 
<?php if($row['industryCategory'] == 'Law/Legal'){ echo "Selected"; } ?>
 > Law/Legal </option>


  </select>

  
</div>


  <label for="contactName">Contact Person's Name:</label>
  <input type="text" id="contactName" name="contactName"
value="<?php echo $row['contactName']; ?>" class="form-control" >

   <label for="contactEmail">Contact Person's Email:</label>
  <input type="email" id="contactEmail" name="contactEmail" 
value="<?php echo $row['contactEmail']; ?>"
   class="form-control" >

  <label for="contactMobile">Contact Person's Mobile:</label>
  <input type="tel" id="contactMobile" name="contactMobile" 
value="<?php echo $row['contactMobile']; ?>"
 class="form-control" >

  
  <div style="margin-top:30px;"></div>
  <button type="submit" class="btn btn-success"  name="update">Update</button>
 
  <a class="btn btn-info" href="empChangePassword.php?empID=<?php echo $empID; ?>"> Password Change</a>

</form>

<?php
}
 }else{
 echo "0 result";
}
?>
</div>
</div>
</div>
</div>
</div>
  

<?php require"../inc/footer.php"?>

