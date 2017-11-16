<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/paymentclass.php'; ?>
<?php
 $pay = new Payment();
if(isset($_POST['submit'])){

$exam           =$_POST['exam'];
$month          =$_POST['month'];
$semester        =$_POST['semester'];
$addmission     =$_POST['addmission'];
$refard         =$_POST['refard'];
if(empty($exam) || empty($month) || empty($semester) || empty($addmission) || empty($refard)){
  echo "<span style='color:red;font-size:20px'>Field must not be empty...!</span>";
}
else{
  $define=$pay->definePayment($exam,$month,$semester,$addmission,$refard);
if($define){
        echo $define;
        }
}
}
 ?>

<div class="well text-center">
    <h2>Payment Insert Here!</h2>
     
  </div>
  

    <div class="col-xs-12 col-sm-7 col-md-6 col-sm-offset-2 col-md-offset-3">
      <form action="" method="post" class="form-horizontal"
       enctype="multipart/form-data">
        <div class="form-group">
          <label for="exampleInputEmail1">Examination fee</label>
          <td>:</td>
          <input " type="text" name="exam" class="form-control" id="" placeholder="Enter Examination Fee">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Month fee</label>
          <td>:</td>
          <input " type="text" name="month" class="form-control" id="" placeholder="Enter Month Fee">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Addmission fee</label>
          <td>:</td>
          <input " type="text" name="addmission" class="form-control" id="" placeholder="Enter Addmission Fee">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Refard exam fee per subject</label>
          <td>:</td>
          <input " type="text" name="refard" class="form-control" id="" placeholder="Enter par subject Refard Examination Fee">
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
      
        <div class="form-grop">
           <div class="col-sm-offset-2 col-xs-10">
              <td>
              <button type="submit" class="btn btn-primary" name="submit">submit</button></td>
          <td><button type="reset" class="btn btn-primary">Reset</button></td>
          </div>
         </div>

</form>
    </div>






<?php include 'inc/footer.php'; ?>