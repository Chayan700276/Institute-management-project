<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/stu_Registration.php'; ?>

<?php 
    $reg = new Student();
 ?>
<?php
if(isset($_GET['stuid'])){
  $id=$_GET['stuid'];
  $studentDetails=$reg->studentDetailsbyid($id);
}
?>
<?php 

 if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
        
        echo "<script>window.location='studentList.php'</script>";
  }?>

   
<?php

if(isset($studentDetails)){
  while($result=$studentDetails->fetch_assoc()){ ?>

      <h3>Information of Roll No.:<?php echo $result['roll'];?></h3>

      <div class="col-xs-12 col-sm-7 col-md-6 col-sm-offset-2 col-md-offset-3">
      <form action="" method="POST" class="form-horizontal"
       enctype="multipart/form-data">

        <div class="form-group">
          <label for="exampleInputEmail1"> Student Name:</label>
          <td>:</td>
          
          <input  type="text" readonly="" name="name" class="form-control" id="" value="<?php echo $result['name'] ?>">
        </div>
        <div class="form-group">      
          <p id="roll_alarm"></p>
          <label for="exampleInputEmail1">Roll no:</label>
          <td>:</td>
          <input type="text" readonly="" name="roll" class="form-control" value="<?php echo $result['roll'] ?>"  >
        </div>
        <div class="form-group">      
          <p id="roll_alarm"></p>
          <label for="exampleInputEmail1">Registration:</label>
          <td>:</td>
          <input type="text" readonly="" name="reg" class="form-control" value="<?php echo $result['reg'] ?>">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Deparment:</label>
            <select readonly="" name="dept" class="form-control">
              <option value="">---Select Department---</option>

              <?php 
                  if ($result['dept']=='computer') { ?>
                     <option selected="" value="computer">Computer</option>
               <?php   } else if($result['dept']=='aidt'){?>

             
              <option selected="" value="aidt">AIDT</option>

           <?php   } else if($result['dept']=='food'){?>

              <option selected="" value="food">FOOD</option>

           <?php   } else if($result['dept']=='rac'){?>

              <option selected="" value="rac">RAC</option>

             <?php   } else{?> 
              <option selected="" value="mecha">MECHA</option>
              <?php } ?>
            </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Semester:</label>
            <select readonly="" name="semester" class="form-control">
              <option value="">---Select Semester---</option>
         
             <?php if ($result['semester']=='first') { ?>
              

              <option selected="" value="first">First</option>

              <?php   } else if($result['semester']=='second'){?>

              <option selected="" value="second">Second</option>
              <?php   } else if($result['semester']=='third'){?>
              <option selected="" value="third">Third</option>
              <?php   } else if($result['semester']=='fourth'){?>
              <option selected="" value="fourth">Fourth</option>
              <?php   } else if($result['semester']=='fifth'){?>
              <option selected="" value="fifth">Fifth</option>
              <?php   } else if($result['semester']=='sixth'){?>
              <option selected="" value="sixth">Sixth</option>
              <?php   } else{?>
              <option selected="" value="seventh">Seventh</option>
              <?php   } ?>
            </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Shift:</label>
            <select readonly="" name="shift" class="form-control">
              <option value="">---Select Shift---</option>

              <?php if ($result['shift']=='first') { ?>

              <option selected="" value="first">First</option>
              <?php } else { ?>
              <option selected="" value="second">Second</option>
              <?php } ?>
            </select>
        </div>
        <div class="form-group">
           <label for="exampleInputEmail1">Father's Name</label>
            <td>:</td>
            <input type="text" readonly="" name="f_name" class="form-control" value="<?php echo $result['f_name'] ?>">
        </div>

          <div class="form-group">
          <label for="exampleInputEmail1">Mother's Name</label>
          <td>:</td>
            <input type="text" readonly="" name="m_name" class="form-control" value="<?php echo $result['m_name'] ?>">
          </div>

          <div class="form-group">
          <label for="exampleInputEmail1">Date of Birth:</label>
          <td>:</td>
            <input type="date" readonly="" name="birth" class="form-control" value="<?php echo $result['birth_date'] ?>">
          </div>

          <div class="form-group">
         <label for="exampleInputEmail1">Present Address</label>
          <td>:</td>
            <input type="text"  readonly="" name="pre_vill" class="form-control" value="<?php echo $result['pre_vill'] ?>">
            <input type="text" readonly="" name="pre_post" class="form-control" value="<?php echo $result['pre_post'] ?>">
            <input type="text" readonly="" name="pre_thana" class="form-control" value="<?php echo $result['pre_thana'] ?>">
            <input type="text" readonly="" name="pre_dist" class="form-control" value="<?php echo $result['pre_dist'] ?>">
          </div>

          <div class="form-group">
          <label for="exampleInputEmail1">Parmanet Address</label>
          <td>:</td>
            <input type="text" readonly="" name="par_vill" class="form-control" value="<?php echo $result['par_vill'] ?>">
            <input type="text" readonly="" name="par_post" class="form-control" value="<?php echo $result['par_post'] ?>">
            <input type="text" readonly="" name="par_thana" class="form-control" value="<?php echo $result['par_thana'] ?>">
            <input type="text" readonly="" name="par_dist" class="form-control" value="<?php echo $result['par_dist'] ?>">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Religion</label>
            <td>:</td>
              <input type="text" readonly="" name="religion" class="form-control" value="<?php echo $result['religion'] ?>">
          </div>

          <div class="form-group">      
            <p id="phone_alarm"></p>
            <label for="exampleInputEmail1">Phone Number</label>
            <td>:</td>
            <input type="text" readonly="" name="phone" class="form-control" value="<?php echo $result['phone'] ?>">
        </div>
          <div class="form-group">
          <label for="exampleInputEmail1">Session:</label>
            <select name="session" class="form-control">
            
              
                  <option readonly="" selected="" value="<?php echo $result['session'] ?>"><?php echo $result['session'] ?></option>
            </select>
        </div>

        <div class="form-group">      
            <p id="phone_alarm"></p>
            <label for="exampleInputEmail1">Email</label>
            <td>:</td>
            <input type="text" readonly="" name="email" class="form-control"  value="<?php echo $result['email'] ?>">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Image</label>
          <td>:</td>
          <input type="file" readonly="" name="image">
          <img width="70px" height="50px" src="<?php echo $result['image'] ?>">
        </div>
      
        <div class="form-grop">
           <div class="col-sm-offset-2 col-xs-10">
              <td>
              <button type="submit" class="btn btn-primary" name="submit">ok</button></td>
          </div>
         </div>

</form>
    </div>



<?php }}
?>

<style type="text/css">
     h3{
    text-align: center;
    color:green;
    font-family: Time new roman;
    font-style: italic;
    font-size: 35px;
    border-bottom: 1px solid red;
    }
</style>


<?php include 'inc/footer.php'; ?>