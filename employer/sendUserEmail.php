<?php
include"../inc/header.php";
include "EmployerInsideCode.php";
Session::checkSessionEmployer();
?>

<?php
if (isset($_GET['userEmail']) || isset($GET['contactEmail'])) {
 $contactEmail = $_GET['contactEmail']; 
 /*
value="<?php echo $contactEmail; ?>" disabled
value="<?php echo $userEmail; ?>" disabled
*/
	$userEmail = $_GET['userEmail'];
}
?>

<div class="container col-sm-4" >
<form method="POST" action="send_mail.php">
  
    <div class="form-group">
      <label for="to">To:</label>
      <input type="text" id="disabledTextInput" name="to" class="form-control" value="<?php echo $userEmail;?>" Disabled>
    </div>
    <div class="form-group">
       <label for="subject">Subject:</label>
       <input type="text" name="subject" class="form-control" >
    </div>
    <div class="form-group">
       <label for="massage">Massage:</label>
        <textarea class="form-control" rows="5" name="massage"> 
  </textarea>
    </div>
    <button type="submit" class="btn btn-success" name="send">Send</button>
</form>
</div>
<?php require"../inc/footer.php"?>

