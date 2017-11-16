<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>



<?php 
 if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['teach_search'])){
      $dept             = mysqli_real_escape_string($db->link, $_POST['dept']);
      if(empty ($dept)){
        echo "<span style='color:red;font-size:20px;'>field must not be empty...!</span>";
      }else{
     Session::set("dept",$dept); 
    echo "<script>window.location='teacher_list.php'</script>";
    }
  }
    ?>

<div class="header">
  <center><h1>Teacher Search</h1>
</div>
    <div class="col-xs-12 col-sm-7 col-md-6 col-sm-offset-2 col-md-offset-3">
      <form action="" method="POST" class="form-horizontal">

   
        <div class="form-group">
          <label for="exampleInputEmail1">Deparment:</label>
            <select name="dept" class="form-control">
              <option value="">---Select Department---</option>
              <option value="computer">Computer</option>
              <option value="aidt">AIDT</option>
              <option value="food">FOOD</option>
              <option value="rac">RAC</option>
              <option value="mecha">MECHA</option>
              <option value="non-department">Non-Department</option>
            </select>
        </div>
        <div class="form-grop">
           <div class="col-sm-offset-2 col-xs-10">
              <td>
              <button type="submit" class="btn btn-primary" name="teach_search">Submit</button></td>
          <td><button type="reset" class="btn btn-primary">Reset</button></td>
          </div>
         </div>

</form>
<a href="teacher.php"> <button type="reset" class="btn btn-default">Back</button></a>
    </div>
<?php include 'inc/footer.php'; ?>