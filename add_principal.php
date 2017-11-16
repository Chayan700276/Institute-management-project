<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/principal.php'; ?>


<?php
 $ppal = new Principal();

if(isset($_POST['psubmit']) && $_SERVER['REQUEST_METHOD']=='POST'){

  $prinInsert =$ppal->AddPrincipal($_POST,$_FILES);
}
 ?>

<div id="#header" class="well text-center">
    <h2>Add Principal!</h2>
<?php 
    if(isset($prinInsert)){
      echo $prinInsert;
    }

   ?>
  </div>
  

    <div class="col-xs-12 col-sm-7 col-md-6 col-sm-offset-2 col-md-offset-3">
      <form action="" method="POST" enctype="multipart/form-data">
      <div class="table-responsive">
         <table class="table">

        <div class="form-group">
          <label for="exampleInputEmail1">Principal Name</label>
          <input " type="text" name="principal_name" class="form-control" id="" placeholder="Enter Name">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">G-mail</label>
          <input " type="email" name="p_gmail" class="form-control" id="" placeholder="Enter g-mail">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Joining Date</label>
          <input " type="text" name="joining_date" class="form-control" id="" placeholder="Enter joining_date">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Designation</label>
            <select class="form-control" name="designation">
              <option value="">Select One</option>
              <option value="Principal">Principal</option>
              <option value="Vice-principal">Vice-principal</option>
            </select>

        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Date of Birth</label>
          <input " type="text" name="date_of_birth" class="form-control" id="" placeholder="Enter date_of_birth">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Image</label>
          <input " type="file" name="image" class="form-control" id="" placeholder="Enter Name">
        </div>
        
      
        <div class="form-grop">
           <div class="col-sm-offset-2 col-xs-10">
              <td>
              <button type="submit" class="btn btn-primary" name="psubmit">Submit</button>
              <button type="reset" class="btn btn-primary">Reset</button></td>
          </div>
         </div>

         </table>
         </div>

</form>

<a href="principal.php"> <button type="reset" class="btn btn-default">Back</button></a>

    </div>


<style type="text/css">
 h2{
  color:green;
  font-family: Times new Roman;
  font-size: 50px;
}
.well{
  background: white;
  box-shadow: 5px 5px 5px 5px #ddd;
  margin-bottom: 50px;
}

</style>



<?php include 'inc/footer.php'; ?>