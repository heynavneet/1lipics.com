<?php
session_start();
include 'layout/header.php';
?>



<?php   
$res = mysqli_query($connection, "SELECT * FROM usermanagement LIMIT 20");
while ($row=mysqli_fetch_array($res)) {

?>

<a href="users/<?php echo $row['id']; ?>" class="grid-item img-responsive" >
 <p><?php echo $row['username'] ?></p>
</a>

<?php  
}

?>
