 <?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/principal.php'; ?>
<?php 
    $ppal = new Principal();
   
 ?>
<?php 
  
  if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['prinpdate'])){
       $updateprin = $ppal->UpdatePrincipal($_POST,$_FILES);
  }
   
 ?>


<?php

    if (isset($_GET['pid'])) {
        $pid = $_GET['pid'];
    }

       $prin_search=$ppal->PrincipalById($pid);

?>

<?php
 if(isset($prin_search)){
    while ($result = $prin_search->fetch_assoc()) { ?>
      

<h2 style="margin-bottom:30px;">Update Principal's information here</h2>
<h3>
           <?php if (isset($updateprin)) {
              echo $updateprin;
           } ?>
</h3>

<div class="col-xs-12 col-sm-7 col-md-6 col-sm-offset-2 col-md-offset-3">
 <form action="" method="POST" enctype="multipart/form-data">
      <div class="table-responsive">
         <table class="table">

        <div class="form-group">
          <label for="exampleInputEmail1">Principal Name</label>
          <input " type="hidden" name="id" class="form-control" value="<?php echo $result['id'] ?>">
          <input " type="text" name="principal_name" class="form-control" value="<?php echo $result['principal_name'] ?>">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Principal G-mail</label>
          <input " type="gmail" name="p_gmail" class="form-control" id="" value="<?php echo $result['p_gmail'] ?> ">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Joining Date</label>
          <input " type="text" name="joining_date" class="form-control" id="" value="<?php echo $result['joining_date'] ?>">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Designation</label>
          <input " type="text" name="designation" class="form-control" value="<?php echo $result['designation'] ?>">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Date of Birth</label>
          <input " type="text" name="date_of_birth" class="form-control" id="" value="<?php echo $result['date_of_birth'] ?>">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Status</label>
            <select name="status" class="form-control">

            <option seleted value="<?php echo $result['status'] ?>"><?php echo $result['status'] ?></option>

              <option value="Running">Running</option>
              <option value="Transfered">Transfered</option>
              <option value="Retired">Retired</option>


            </select>
        </div>

          <?php 
              if ($result['status']=='Transfered') {?>

              <div class="form-group">
              <label for="exampleInputEmail1">Transfered Date</label>
              <input " type="text" name="transfered_date" class="form-control" id="" value="<?php echo $result['transfered_date'] ?>">
             </div>
             <div class="form-group">
              <label for="exampleInputEmail1">Retired Date</label>
              <input " type="text" name="retired_date" class="form-control" id="" placeholder="If Retired">
           </div>

         <?php }elseif($result['status']=='Retired'){ ?>

              <div class="form-group">
              <label for="exampleInputEmail1">Retired Date</label>
              <input " type="text" name="retired_date" class="form-control" id="" value="<?php echo $result['retired_date'] ?>">
             </div>
             <div class="form-group">
              <label for="exampleInputEmail1">Transfered Date</label>
              <input " type="text" name="transfered_date" class="form-control" id="" placeholder="If Transfered">
            </div>


         <?php }else{ ?>

          <div class="form-group">
              <label for="exampleInputEmail1">Transfered Date</label>
              <input " type="text" name="transfered_date" class="form-control" id="" placeholder="If Transfered">
            </div>
             <div class="form-group">
              <label for="exampleInputEmail1">Retired Date</label>
              <input " type="text" name="retired_date" class="form-control" id="" placeholder="If Retired">
           </div>
           <?php } ?>


        <div class="form-group">
          <label for="exampleInputEmail1">Image</label> 
             <img height="40px" width="60px" src="<?php echo $result['image']?>">
          <input  type="file" name="image" class="form-control">
        </div>
        
      
        <div class="form-grop">
           <div class="col-sm-offset-2 col-xs-10">
              <td>
              <button type="submit" class="btn btn-primary" name="prinpdate">Update</button></td>
          <td><button type="reset" class="btn btn-primary">Reset</button></td>
          </div>
         </div>
         
         </table>
         </div>

</form>
<?php  }}else{
      echo "Something went worng";
    }
   ?>
   <a href="principal_list.php"> <button type="reset" class="btn btn-default">Back</button></a>
</div>
      
  
</div>
</div>


</div



?>

<style>
  
  h2{
    text-align: center;
    color:green;
    }
    h3{
    text-align: center;
    color:green;
    }
    h4{
    text-align: center;
    color:red;
    }
</style>
<?php include 'inc/footer.php'; ?>