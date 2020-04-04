<?php
include"../inc/header.php";
include "../user/userInsideCode.php";
//Session::checkSessionUser();
Session::checkSessionEmployer();
?>


<?php
$userPostBoardObject = NEW userInsideCode();
?>


<?php
$loginMsgResult = Session::get("loginmsg");
if (isset($loginMsgResult)){
echo $loginMsgResult;
}
Session::set("loginmsg", NULL); 

?>

<div class="container">
  
   <h4>Job Board
  <span class="float-right">
   Welcome! <strong>

<?php
$name = Session::get('userName');
if(isset($name)){
  echo "$name";
}
?> </strong>
</span>
</h3>
 




<?php require 'empSearch.php'; ?>

<?php
if (isset($_POST['submit'])) {
 

$userPostSearchdMsg = $userPostBoardObject->userJobPostBoardSearch($_POST['searchBox']);
 
?>

    <div style="margin-top:50px;"></div>
  <?php
if ($userPostSearchdMsg AND $userPostSearchdMsg->num_rows > 0) {

  while($row = $userPostSearchdMsg->fetch_assoc()) {

?>

<div class="card col-md-8 col-lg-6">

  <div class="card-header">
   <h5 style="color:green"><td><?php echo $row['jobTitle'];
   ?></td></h5>
  </div>
  
  <div class="card-body">
    
    <h6 class="card-title"><strong><td> <?php if (isset($row['companyName'])) {
    echo $row['companyName'];} 
   ?> </td></strong></h6><td>
   <p class="card-text"><h6><i class="fa fa-map-marker"></i> <td> <?php echo $row['location'];?> <td> </h6></p> 

    <i class="fa">&#127891;</i> <td> <?php echo $row['educationLevel']; ?></td><br>
    <i class="fa">&#xf0b1;</i><td> <?php echo $row['experiences'];?></td><br>
    <i class="fa">&#xf073;</i><td> <?php echo $row['deadline'];?></td>
</tr>
    </p>



 <a href="employerUserJobPostDetails.php?jobPostID=<?php echo urlencode( $row['jobPostID']); ?>&amp;empID=<?php echo urlencode( $row['empID']); ?>" class="btn btn-primary">Read More</a>

  </div>
</div>

<div style="margin-top:20px;"></div>
<?php }//while

?>
<?php
}else{

  echo "No Search Result Found!";
}




 }else{

?>

<?php


$results_per_page = 5;

$result = $userPostBoardObject->numberOfPages();
$number_of_results = mysqli_num_rows($result);
$number_of_pages = ceil($number_of_results/$results_per_page);

if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}

$this_page_first_result = ($page-1)*$results_per_page;

  $userPostBoardMsg = $userPostBoardObject->userJobPostBoard($this_page_first_result,$results_per_page);


?>



    <div style="margin-top:50px;"></div>
  <?php
if ($userPostBoardMsg && $userPostBoardMsg->num_rows > 0) {

  while($row = $userPostBoardMsg->fetch_assoc()) {

?>

<div class="card col-md-8 col-lg-6">

  <div class="card-header">
   <h5 style="color:green"><td><?php echo $row['jobTitle'];
   ?></td></h5>
  </div>
  
  <div class="card-body">
    
    <h6 class="card-title"><strong><td> <?php if (isset($row['companyName'])) {
    echo $row['companyName'];} 
   ?> </td></strong></h6><td>
   <p class="card-text"><h6><i class="fa fa-map-marker"></i> <td> <?php echo $row['location'];?> <td> </h6></p> 

    <i class="fa">&#127891;</i> <td> <?php echo $row['educationLevel']; ?></td><br>
    <i class="fa">&#xf0b1;</i><td> <?php echo $row['experiences'];?></td><br>
    <i class="fa">&#xf073;</i><td> <?php echo $row['deadline'];?></td>
</tr>
    </p>



 <a href="employerUserJobPostDetails.php?jobPostID=<?php echo urlencode( $row['jobPostID']); ?>&amp;empID=<?php echo urlencode( $row['empID']); ?>" class="btn btn-primary">Read More</a>

  </div>
</div>

<div style="margin-top:20px;"></div>
<?php }//while

}
?>


<div style='padding: 10px 20px 0px; border-top: ;'>
<strong>Page <?php echo $page." of ".$number_of_pages; ?></strong>
</div>


<div style="margin-top:20px;"></div>

<div class="container">
<ul class="pagination">
<?php
for ($page=1;$page<=$number_of_pages;$page++) {

  echo '<li" ><a href="empHome.php?page=' . $page . '" class="btn btn-outline-info">' . $page . '</a></li> ';
}
?>
</ul>
</div>
<?php
}
?>
</div>

 




<?php require"../inc/footer.php"?>

