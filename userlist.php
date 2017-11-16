<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<?php 
include 'classes/UserControl.php'; 
$user = new UserControl();
?>
<?php 

if(isset($_GET['udelid'])){
  $udelid=$_GET['udelid'];

  $userdelete=$user->UserDelete($udelid);
}


 ?>
<div class="well text-center">
    <h2>All User List Here</h2>
  </div>
<div class="container-fluid marginTop">
<div class="row">
<div class="col-xs-12">
 <div class="table-responsive">
<table class="table table-bordered table-hover">

      <thead>
        <tr   class="success">
          <th width="20%">Sl.No</th>
          <th width="30%">Username</th>
          <th width="32%">E-mail</th>
          <th width="20%">Action</th>
        </tr>
      </thead>
      <tbody>
      <?php 

$userData=$user->getAllUserData();
  if($userData){
    $i=0;
  while ($result=$userData->fetch_assoc()){ 
  $i++;
  ?>
        <tr class="danger">
          <td><?php echo $i; ?></td>
          <td><?php echo $result['username']; ?></td>
          <td><?php echo $result['email']; ?></td>
          
            <td>
           <?php if(Session::get("Role")=='0'){?>
            <a href="useredit.php?uid=<?php echo $result['id'];?>" class="btn btn-success">Edit</a> 
            
              <a onclick="return confirm('Are Sure Want To Delete-!')" href="?udelid=<?php echo $result['id'];?>" class="btn btn-danger">Delete</a>
              <?php }
              else{?>
              <a href="#" class="btn btn-danger">X~Edit</a> 
               <a href="#" class="btn btn-success">X~Delete</a>
                <?php }?>
            

            </td>
        </tr>
        
      </tbody>
    
<?php }} ?>
</table>
  </div>
</div>
</div>


</div>





<?php include 'inc/footer.php'; ?>