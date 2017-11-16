<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/stu_Registration.php'; ?>

<?php 
    $reg = new Student();
   
 ?>

<?php 

 if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['regsubmit'])){
        $stuReg = $reg->StudentRegistration($_POST,$_FILES);

  }

 ?>

<div class="header">
  <center><h1>Student Form</h1>
  <?php 
       if (isset($stuReg)) {
     echo $stuReg;
   }
   ?>
</div>
    <div class="col-xs-12 col-sm-7 col-md-6 col-sm-offset-2 col-md-offset-3">
      <form action="" method="POST" class="form-horizontal"
       enctype="multipart/form-data">

        <div class="form-group">
          <label for="exampleInputEmail1"> Student Name:</label>
          <td>:</td>
          <input " type="text" name="name" class="form-control" id="" placeholder="Enter Name">
        </div>
        <div class="form-group">      
          <p id="roll_alarm"></p>
          <label for="exampleInputEmail1">Roll no:</label>
          <td>:</td>
          <input type="text" name="roll" class="form-control" id="y_roll" onkeyup="roll_keyup()" placeholder="Roll No">
        </div>
        <div class="form-group">      
          <p id="roll_alarm"></p>
          <label for="exampleInputEmail1">Registration:</label>
          <td>:</td>
          <input type="text" name="reg" class="form-control" id="y_roll" onkeyup="roll_keyup()" placeholder="Registration No">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Deparment:</label>
            <select name="dept" class="form-control">
              <option value="">---Select Department---</option>
              <option value="computer">Computer</option>
              <option value="aidt">AIDT</option>
              <option value="food">FOOD</option>
              <option value="rac">RAC</option>
              <option value="mecha">MECHA</option>
            </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Semester:</label>
            <select name="semester" class="form-control">
              <option value="">---Select Semester---</option>
              <option value="first">First</option>
              <option value="second">Second</option>
              <option value="third">Third</option>
              <option value="fourth">Fourth</option>
              <option value="fifth">Fifth</option>
              <option value="sixth">Sixth</option>
              <option value="seventh">Seventh</option>
            </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Shift:</label>
            <select name="shift" class="form-control">
              <option value="">---Select Shift---</option>
              <option value="first">First</option>
              <option value="second">Second</option>
            </select>
        </div>
        <div class="form-group">
           <label for="exampleInputEmail1">Father's Name</label>
            <td>:</td>
            <input type="text" name="f_name" class="form-control" id="" placeholder="Father Name">
        </div>

          <div class="form-group">
          <label for="exampleInputEmail1">Mother's Name</label>
          <td>:</td>
            <input type="text" name="m_name" class="form-control" id="" placeholder="Mother Name">
          </div>

          <div class="form-group">
          <label for="exampleInputEmail1">Date of Birth:</label>
          <td>:</td>
            <input type="date" name="birth" class="form-control">
          </div>

          <div class="form-group">
         <label for="exampleInputEmail1">Present Address</label>
          <td>:</td>
            <input type="text" name="pre_vill" class="form-control" placeholder="Village">
            <input type="text" name="pre_post" class="form-control" placeholder="Post">
            <input type="text" name="pre_thana" class="form-control" placeholder="Thana">
            <input type="text" name="pre_dist" class="form-control" placeholder="District">
          </div>

          <div class="form-group">
          <label for="exampleInputEmail1">Parmanet Address</label>
          <td>:</td>
            <input type="text" name="par_vill" class="form-control" placeholder="Village">
            <input type="text" name="par_post" class="form-control" placeholder="Post">
            <input type="text" name="par_thana" class="form-control" placeholder="Thana">
            <input type="text" name="par_dist" class="form-control" placeholder="District">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Religion</label>
            <td>:</td>
              <input type="text" name="religion" class="form-control" placeholder="Religion">
          </div>

          <div class="form-group">      
            <p id="phone_alarm"></p>
            <label for="exampleInputEmail1">Phone Number</label>
            <td>:</td>
            <input type="text" name="phone" class="form-control"  placeholder="Phone No">
        </div>
          <div class="form-group">
          <label for="exampleInputEmail1">Session:</label>
            <select name="session" class="form-control">
              <option value="">---Select session---</option>
              <?php for($i=2000;$i<=3031;$i++){
                ?>
              <option value="<?php echo $i?>-<?php echo $i+1;?>"><?php echo $i?>-<?php echo $i+1;?></option>
              <?php }?>
            </select>
        </div>

        <div class="form-group">      
            <p id="phone_alarm"></p>
            <label for="exampleInputEmail1">Email</label>
            <td>:</td>
            <input type="text" name="email" class="form-control"  placeholder="Email(if have)">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Image</label>
          <td>:</td>
          <input type="file" name="image">
        </div>
      
        <div class="form-grop">
           <div class="col-sm-offset-2 col-xs-10">
              <td>
              <button type="submit" class="btn btn-primary" name="regsubmit">Insert</button></td>
          <td><button type="reset" class="btn btn-primary">Reset</button></td>
          </div>
         </div>

</form>
    </div>






<?php include 'inc/footer.php'; ?>