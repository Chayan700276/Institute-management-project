<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/UserControl.php'; ?>


<?php 
 $user = new UserControl();

if(isset($_GET['uid'])){

  $userid=$_GET['uid'];

}
 ?>
<?php if(isset($_POST['userupdate'])){
$username=$_POST['username'];
  $email=$_POST['email'];
  $userupdate=$user->UserUpdate($username, $email,$userid);


  } ?>

<div class="well text-center">
    <h2>Profile Update</h2>
     <?php 
    if(isset($userupdate)){
      echo $userupdate;
    }

   ?>
  </div>
 

 <div class="col-xs-12 col-sm-7 col-md-6 col-sm-offset-2 col-md-offset-3">
      <form action="" method="post" class="form-horizontal"
       enctype="multipart/form-data">
<?php 
$userData=$user->getUserValue($userid);
  if($userData){
  while ($result=$userData->fetch_assoc()){ 

  ?>
        <div class="form-group">
          <label for="exampleInputEmail1">Username:</label>
          <td>:</td>
          <input type="text" name="username" class="form-control" id="" value="<?php echo $result['username']; ?>" required="" >
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">E-mail:</label>
          <td>:</td>
          <input " type="text" name="email" class="form-control" id=""  value="<?php echo $result['email']; ?>">
        </div>
       
      
        <div class="form-grop">
           <div class="col-sm-offset-2 col-xs-10">
              <td>
              <button type="submit" class="btn btn-primary" name="userupdate">Profile Update</button></td>
          
          </div>
         </div>

</form><?php }} ?>
    </div>






<?php include 'inc/footer.php'; ?>