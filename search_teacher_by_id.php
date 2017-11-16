<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/teacher.php'; ?>

<?php 
    $tech = new Teacher();
   
 ?>


<div class="header">
  <center><h1>Search Teacher here </h1>

</div>
    <div class="col-xs-12 col-sm-7 col-md-6 col-sm-offset-2 col-md-offset-3">
      <form action="" method="POST" class="form-horizontal"
       enctype="multipart/form-data">

        <div class="form-group">
          <label for="exampleInputEmail1">Teacher ID</label>
          <td>:</td>
          <input " type="text" required="" name="tech_id" class="form-control" id="" placeholder="Enter Teahcer ID">
        </div>
      
        <div class="form-grop">
           <div class="col-sm-offset-2 col-xs-10">
              <td>
              <button type="submit" class="btn btn-primary" name="submit">Search</button></td>
              <a href="teacher.php"><button class="btn btn-default">Back</button></a>
          </div>
         </div>

</form>
    </div>
<?php
 if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
        $tech_id=$_POST['tech_id'];
        $search = $tech->TeachersByID($tech_id);
  
if(isset($search)){
  while($result=$search->fetch_assoc()){ ?>



      <div class="col-xs-12 col-sm-7 col-md-6 col-sm-offset-2 col-md-offset-3">
 <form action="" method="POST" enctype="multipart/form-data">
      <div class="table-responsive">
         <table class="table">

        <div class="form-group">
          <label for="exampleInputEmail1">Teacher Name</label>
          <td>:</td>
          <input " type="hidden" name="id" class="form-control" value="<?php echo $result['id'] ?>">
          <input " type="text" name="teacher_name" class="form-control" value="<?php echo $result['teacher_name'] ?>">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Department</label>
            <select name="department" class="form-control">

            <option selected value="<?php echo $result['department'] ?>"><?php echo $result['department'] ?></option>
              
              <option value="computer">Computer</option>
              <option value="food">Food</option>
              <option value="aidt">AIDT</option>
              <option value="rac">RAC</option>
              <option value="mechatronics">Mechatronics</option>
               <option value="non-department">Non-Departmental</option>

            </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Teacher ID</label>
          <td>:</td>
          <input " type="text" name="teacher_id" class="form-control" id="" value="<?php echo $result['teacher_id'] ?>">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Joining Date</label>
          <td>:</td>
          <input " type="text" name="joining_date" class="form-control" id="" value="<?php echo $result['joining_date'] ?>">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Designation</label>
          <td>:</td>
          <input " type="text" name="designation" class="form-control" value="<?php echo $result['designation'] ?>">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Date of Birth</label>
          <td>:</td>
          <input " type="text" name="date_of_birth" class="form-control" id="" value="<?php echo $result['date_of_birth'] ?>">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Status</label>
            <select name="status" class="form-control">
             
              <option selected value="<?php echo $result['status'] ?>">

                      <?php
                         if ($result['status']=='0') {
                         echo "Running";
                      }else if($result['status']=='1'){
                       echo "Transfered";
                      }else if($result['status']=='2'){
                        echo "Retired";
                  } 
                  ?>
                
              </option>

              <option  value="0">Running</option>
              <option  value="1">Transfered</option>
              <option  value="2">Retired</option>


            </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Image</label>
          <td>:</td>  
             <img height="40px" width="60px" src="<?php echo $result['image']?>">
          <input " type="file" name="image" class="form-control" id="" value="<?php echo $result[''] ?>">
        </div>
        
      
        <div class="form-grop">
           <div class="col-sm-offset-2 col-xs-10">
              <td>
              <a href="editteacher.php?techid=<?php echo $result['id'];?>" class="btn btn-danger">Edit</a> </td>

          </div>
         </div>
         
         </table>
         </div>

</form>
<?php }}else{
        echo "<script>alert('This Teacher ID is Invalid..!')</script>";
        }
        }
?>
   
</div>
      
  
</div>
</div>


</div



<?php include 'inc/footer.php'; ?>