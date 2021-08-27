<?php
include "../db.php";



if (empty($_POST['con_id'])) {
	echo "No Access";
}else{
$userid = $_POST['con_id'];
$sql = "select * from contact where con_id=".$userid;
$result = mysqli_query($con,$sql);
while( $row = mysqli_fetch_array($result) ){
 $con_date = $row['con_date'];
 $con_mail = $row['con_mail'];
 $con_name = $row['con_name'];
 $con_massage = $row['con_massage'];

 $response = "
 <form >
  <div class='form-group'>
    <label for='Name'>Name</label>
    <input type='text' class='form-control' value='".$con_name."' >
  </div>
  <div class='form-group'>
    <label for='email'>Email</label>
    <input type='email' class='form-control' value='".$con_mail."'>
  </div>
  <div class='form-group'>
   <label for='massage'>Massage:</label>
   <textarea class='form-control' rows='5' >".$con_massage."</textarea>
  </div> 
  <div class='form-group'>
   <label for='massage'>Action:</label>
   <a target='_blank' href='mailto:".$con_mail."'>Reply</a>
  </div> 
  
</form>

 ";
 
}
echo $response;
exit;
}
