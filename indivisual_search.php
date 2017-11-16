<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/stu_Registration.php'; ?>

<?php 
    $reg = new Student();
   
 ?>

<?php 



   if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['update'])){
        $update = $reg->StudentUpdate($_POST,$_FILES);
  }


 ?>

<div class="header">
  <center><h1>Student Form</h1>
  <?php 
    if (isset($_GET['delroll'])) {
      $S_roll = $_GET['delroll'];
      $delStu = $reg->StudentDeleteById($S_roll);
      if (isset($delStu)) {
        echo "<script>Deleted</script>";
      }
    }
   ?>

<?php
  if (isset($update)) {
    echo $update;
  } ?>

 
</div>
    <div class="col-xs-12 col-sm-7 col-md-6 col-sm-offset-2 col-md-offset-3">
      <form action="" method="POST" class="form-horizontal"
       enctype="multipart/form-data">

        <div class="form-group">
          <label for="exampleInputEmail1">Roll number</label>
          <td>:</td>
          <input " type="text" required="" name="roll" class="form-control" id="" placeholder="Enter Student Roll">
        </div>
      
        <div class="form-grop">
           <div class="col-sm-offset-2 col-xs-10">
              <td>
              <button type="submit" class="btn btn-primary" name="submit">Search</button></td>
          </div>
         </div>

</form>
    </div>
<?php
 if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['ok'])){
  echo "<script>window.location='index.php'</script>";
  }
 if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
        $roll=$_POST['roll'];
        $search = $reg->indevisualSearch($roll);
  
if(isset($search)){
  while($result=$search->fetch_assoc()){ ?>



      <div class="col-xs-12 col-sm-7 col-md-6 col-sm-offset-2 col-md-offset-3">
      <form action="" method="POST" class="form-horizontal"
       enctype="multipart/form-data">

        <div class="form-group">
          <label for="exampleInputEmail1"> Student Name:</label>
          <td>:</td>
          <input  type="hidden" name="Sid" value="<?php echo $result['id'] ?>">
          <input  type="text" name="name" class="form-control" id="" value="<?php echo $result['name'] ?>">
        </div>
        <div class="form-group">      
          <p id="roll_alarm"></p>
          <label for="exampleInputEmail1">Roll no:</label>
          <td>:</td>
          <input type="text" name="roll" class="form-control" value="<?php echo $result['roll'] ?>"  >
        </div>
        <div class="form-group">      
          <p id="roll_alarm"></p>
          <label for="exampleInputEmail1">Registration:</label>
          <td>:</td>
          <input type="text" name="reg" class="form-control" value="<?php echo $result['reg'] ?>">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Deparment:</label>
            <select name="dept" class="form-control">
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
            <select name="semester" class="form-control">
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
            <select name="shift" class="form-control">
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
            <input type="text" name="f_name" class="form-control" value="<?php echo $result['f_name'] ?>">
        </div>

          <div class="form-group">
          <label for="exampleInputEmail1">Mother's Name</label>
          <td>:</td>
            <input type="text" name="m_name" class="form-control" value="<?php echo $result['m_name'] ?>">
          </div>

          <div class="form-group">
          <label for="exampleInputEmail1">Date of Birth:</label>
          <td>:</td>
            <input type="date" name="birth" class="form-control" value="<?php echo $result['birth_date'] ?>">
          </div>

          <div class="form-group">
         <label for="exampleInputEmail1">Present Address</label>
          <td>:</td>
            <input type="text" name="pre_vill" class="form-control" value="<?php echo $result['pre_vill'] ?>">
            <input type="text" name="pre_post" class="form-control" value="<?php echo $result['pre_post'] ?>">
            <input type="text" name="pre_thana" class="form-control" value="<?php echo $result['pre_thana'] ?>">
            <input type="text" name="pre_dist" class="form-control" value="<?php echo $result['pre_dist'] ?>">
          </div>

          <div class="form-group">
          <label for="exampleInputEmail1">Parmanet Address</label>
          <td>:</td>
            <input type="text" name="par_vill" class="form-control" value="<?php echo $result['par_vill'] ?>">
            <input type="text" name="par_post" class="form-control" value="<?php echo $result['par_post'] ?>">
            <input type="text" name="par_thana" class="form-control" value="<?php echo $result['par_thana'] ?>">
            <input type="text" name="par_dist" class="form-control" value="<?php echo $result['par_dist'] ?>">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Religion</label>
            <td>:</td>
              <input type="text" name="religion" class="form-control" value="<?php echo $result['religion'] ?>">
          </div>

          <div class="form-group">      
            <p id="phone_alarm"></p>
            <label for="exampleInputEmail1">Phone Number</label>
            <td>:</td>
            <input type="text" name="phone" class="form-control" value="<?php echo $result['phone'] ?>">
        </div>
          <div class="form-group">
          <label for="exampleInputEmail1">Session:</label>
            <select name="session" class="form-control">
            
              
                  <option selected="" value="<?php echo $result['session'] ?>"><?php echo $result['session'] ?></option>
            </select>
        </div>

        <div class="form-group">      
            <p id="phone_alarm"></p>
            <label for="exampleInputEmail1">Email</label>
            <td>:</td>
            <input type="text" name="email" class="form-control"  value="<?php echo $result['email'] ?>">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Image</label>
          <td>:</td>
          <input type="file" name="image">
          <img width="70px" height="50px" src="<?php echo $result['image'] ?>">
        </div>
      
        <div class="form-grop">
           <div class="col-sm-offset-2 col-xs-10">
              <td>
              <button type="submit" class="btn btn-primary" name="ok">Ok</button></td>
              <button type="submit" class="btn btn-primary" name="update">Update</button></td>
          <td>
              <a class="btn btn-danger" onclick="return confirm('Are sure want to delete!')" href="?delroll=<?php echo $result['roll'] ?>">Delete</a>
          </td>
          </div>
         </div>

</form>
    </div>



<?php }} else{
        echo "<script>alert('This Roll Not Available..!')</script>";
        }
        }
?>




<?php include 'inc/footer.php'; ?>