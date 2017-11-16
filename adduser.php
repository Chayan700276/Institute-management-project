<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/UserControl.php'; ?>


<?php 

if(!Session::get("Role")=='0'){   
  echo "<script>window.location='index.php'</script>";
  
}
?>
<?php
 $user = new UserControl();
if(isset($_POST['usersubmit'])){

$username    =$_POST['username'];
$email       =$_POST['email'];
$password    =$_POST['password'];
$status      =$_POST['status'];

$UserData=$user->AddUser($_POST);
}
 ?>

<div class="well text-center">
    <h2>Add User Here-!</h2>
<?php 
    if(isset($UserData)){
      echo $UserData;
    }

   ?>
  </div>
  

    <div class="col-xs-12 col-sm-7 col-md-6 col-sm-offset-2 col-md-offset-3">
      <form action="" method="post" class="form-horizontal"
       enctype="multipart/form-data">

        <div class="form-group">
          <label for="exampleInputEmail1">Username:</label>
          <td>:</td>
          <input " type="text" name="username" class="form-control" id="" placeholder="Enter Name">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">E-mail:</label>
          <td>:</td>
          <input " type="text" name="email" class="form-control" id="" placeholder="Enter Name">
        </div>
         <div class="form-group">
          <label for="exampleInputEmail1">Password:</label>
          <td>:</td>
          <input " type="text" name="password" class="form-control" id="" placeholder="Enter Name">
        </div>
        
        <div class="form-group">
          <label for="exampleInputEmail1">Role:</label>
            <select name="status" class="form-control">
              <option value="">---Select Role---</option>
              <option value="0">Admin</option>
              <option value="1">Viewer</option>
            </select>
        </div>
      
        <div class="form-grop">
           <div class="col-sm-offset-2 col-xs-10">
              <td>
              <button type="submit" class="btn btn-primary" name="usersubmit">Add User</button></td>
          <td><button type="reset" class="btn btn-primary">Reset</button></td>
          </div>
         </div>

</form>
    </div>






<?php include 'inc/footer.php'; ?>