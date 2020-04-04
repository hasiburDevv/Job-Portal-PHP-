<?php
include"../inc/header.php";
include"EmployerLoginRegistrationCode.php";
Session::checkSessionSigninEmployer();
?>

<?php
$employer = NEW Employer();
if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['submit']) ){
  $employerAccount = $employer->employerAccount($_POST);
}
?>



<div class="container">
  <div style="max-width:600px; margin:0 auto">

   
<?php
if (isset($employerAccount)) {
  echo $employerAccount;
}
?>
<form class="form-signin" action="" method="POST">
  <h1 class="h3 mb-3 font-weight-normal">Employer Registration Form</h1>
  <label for="userName">Username:</label>
  <input type="text" id="userName" name="userName" value="<?php if(isset($_POST['userName'])){echo $_POST['userName'];}?>" class="form-control">

<label for="password">Password:</label>
  <input type="password" name="password" id="password" value="<?php if(isset($_POST['password'])){echo $_POST['password'];}?>" class="form-control" >

   <label for="conformPassword">Conform Password:</label>
  <input type="password" name="conformPassword" id="conformPassword" value="<?php if(isset($_POST['conformPassword'])){echo $_POST['conformPassword'];}?>" class="form-control" >

  <label for="q1">Security Question 1:</label>
  <input type="text" id="q1" name="q1" value="<?php if(isset($_POST['q1'])){echo $_POST['q1'];}?>" class="form-control" >

  <label for="q2">Security Question 2:</label>
  <input type="text" id="q2" name="q2" value="<?php if(isset($_POST['q2'])){echo $_POST['q2'];}?>" class="form-control" >


<label for="name">Company Name:</label>
  <input type="text" id="companyName" name="companyName" value="<?php if(isset($_POST['companyName'])){echo $_POST['companyName'];}?>" class="form-control">



<div class="form-group">
  <label for="industryCategory">Industry Type:</label>
  
<select class="form-control" name="industryCategory" id="industryCategory">
 <option value="-1" >Select Category</option>

    <option value=" Accounting/Finance" <?php if(isset($_POST['industryCategory']) AND $_POST['industryCategory'] == " Accounting/Finance") { echo "Selected"; } ?> > Accounting/Finance</option>

    <option value=" Bank/ Non-Bank Fin. Institution" <?php if(isset($_POST['industryCategory']) AND $_POST['industryCategory'] == " Bank/ Non-Bank Fin. Institution") { echo "Selected"; } ?> > Bank/ Non-Bank Fin. Institution</option>

    <option value=" Commercial/Supply Chain" <?php if(isset($_POST['industryCategory']) AND $_POST['industryCategory'] == " Commercial/Supply Chain") { echo "Selected"; } ?> > Commercial/Supply Chain</option>

      <option value=" Education/Training" <?php if(isset($_POST['industryCategory']) AND $_POST['industryCategory'] == " Education/Training") { echo "Selected"; } ?> > Education/Training</option>

        <option value=" Engineer/Architects" <?php if(isset($_POST['industryCategory']) AND $_POST['industryCategory'] == " Engineer/Architects") { echo "Selected"; } ?> > Engineer/Architects</option>

          <option value=" Garments/Textile" <?php if(isset($_POST['industryCategory']) AND $_POST['industryCategory'] == " Garments/Textile") { echo "Selected"; } ?> > Garments/Textile</option>

            <option value=" HR/Org. Development" <?php if(isset($_POST['industryCategory']) AND $_POST['industryCategory'] == " HR/Org. Development") { echo "Selected"; } ?> > HR/Org. Development</option>

              <option value=" Gen Mgt/Admin " <?php if(isset($_POST['industryCategory']) AND $_POST['industryCategory'] == " Gen Mgt/Admin ") { echo "Selected"; } ?> > Gen Mgt/Admin </option>

                <option value=" Design/Creative" <?php if(isset($_POST['industryCategory']) AND $_POST['industryCategory'] == " Design/Creative") { echo "Selected"; } ?> > Design/Creative</option>

               <option value=" Production/Operation" <?php if(isset($_POST['industryCategory']) AND $_POST['industryCategory'] == " Production/Operation") { echo "Selected"; } ?> > Production/Operation</option>

               <option value=" Hospitality/ Travel/ Tourism" <?php if(isset($_POST['industryCategory']) AND $_POST['industryCategory'] == " Hospitality/ Travel/ Tourism") { echo "Selected"; } ?> > Hospitality/ Travel/ Tourism</option>

               <option value=" Beauty Care/ Health & Fitness" <?php if(isset($_POST['industryCategory']) AND $_POST['industryCategory'] == " Beauty Care/ Health & Fitness") { echo "Selected"; } ?> > Beauty Care/ Health & Fitness</option>

               <option value=" Electrician/ Construction/ Repair " <?php if(isset($_POST['industryCategory']) AND $_POST['industryCategory'] == " Electrician/ Construction/ Repair ") { echo "Selected"; } ?> > Electrician/ Construction/ Repair </option>

               <option value=" IT & Telecommunication" <?php if(isset($_POST['industryCategory']) AND $_POST['industryCategory'] == " IT & Telecommunication") { echo "Selected"; } ?> > IT & Telecommunication</option>

                <option value=" Marketing/Sales " <?php if(isset($_POST['industryCategory']) AND $_POST['industryCategory'] == " Marketing/Sales ") { echo "Selected"; } ?> > Marketing/Sales </option>


 <option value=" Customer Support/Call Centre" <?php if(isset($_POST['industryCategory']) AND $_POST['industryCategory'] == " Customer Support/Call Centre") { echo "Selected"; } ?> > Customer Support/Call Centre</option>


<option value=" Media/Ad./Event Mgt." <?php if(isset($_POST['industryCategory']) AND $_POST['industryCategory'] == " Media/Ad./Event Mgt.") { echo "Selected"; } ?> > Media/Ad./Event Mgt.</option>


<option value=" Medical/Pharma" <?php if(isset($_POST['industryCategory']) AND $_POST['industryCategory'] == "  Medical/Pharma") { echo "Selected"; } ?> > Medical/Pharma</option>

<option value=" Agro (Plant/Animal/Fisheries)" <?php if(isset($_POST['industryCategory']) AND $_POST['industryCategory'] == " Agro (Plant/Animal/Fisheries)") { echo "Selected"; } ?> > Agro (Plant/Animal/Fisheries)</option>

<option value=" NGO/Development" <?php if(isset($_POST['industryCategory']) AND $_POST['industryCategory'] == "  NGO/Development") { echo "Selected"; } ?> > NGO/Development</option>

<option value=" Research/Consultancy" <?php if(isset($_POST['industryCategory']) AND $_POST['industryCategory'] == "  Research/Consultancy") { echo "Selected"; } ?> >  Research/Consultancy</option>

<option value=" Secretary/Receptionist " <?php if(isset($_POST['industryCategory']) AND $_POST['industryCategory'] == " Secretary/Receptionist ") { echo "Selected"; } ?> >  Secretary/Receptionist </option>

<option value=" Data Entry/Operator/BPO" <?php if(isset($_POST['industryCategory']) AND $_POST['industryCategory'] == " Data Entry/Operator/BPO") { echo "Selected"; } ?> >  Data Entry/Operator/BPO</option>

<option value=" Driving/Motor Technician" <?php if(isset($_POST['industryCategory']) AND $_POST['industryCategory'] == " Driving/Motor Technician") { echo "Selected"; } ?> >   Driving/Motor Technician</option>

<option value=" Security/Support Service" <?php if(isset($_POST['industryCategory']) AND $_POST['industryCategory'] == " Security/Support Service") { echo "Selected"; } ?> >    Security/Support Service</option>

<option value=" Law/Legal " <?php if(isset($_POST['industryCategory']) AND $_POST['industryCategory'] == " Law/Legal ") { echo "Selected"; } ?> > Law/Legal </option>

  </select>

  
</div>


  <label for="contactName">Contact Person's Name:</label>
  <input type="text" id="contactName" name="contactName" value="<?php if(isset($_POST['contactName'])){echo $_POST['contactName'];}?>" class="form-control" >

   <label for="contactEmail">Contact Person's Email:</label>
  <input type="email" id="contactEmail" name="contactEmail" value="<?php if(isset($_POST['contactEmail'])){echo $_POST['contactEmail'];}?>" class="form-control" >

  <label for="contactMobile">Contact Person's Mobile:</label>
  <input type="tel" id="contactMobile" name="contactMobile" value="<?php if(isset($_POST['contactMobile'])){echo $_POST['contactMobile'];}?>" class="form-control" >

  
  <div style="margin-top:26px;"></div>
  <button class="btn btn-success " type="submit" name="submit">Create Account</button>

</form>
</div>
</div>

<?php require"../inc/footer.php"?>







