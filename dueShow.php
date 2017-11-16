<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/paymentclass.php'; ?>
<?php
 $pay = new Payment();

 ?>


<div class="header">
  <center><h1>Student payment due</h1>

 
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
  echo "<script>window.location='dueShow.php'</script>";
  }
 if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){

        $roll=$_POST['roll'];
         if(empty($roll)){
        echo "<span style='color:red;font-size:20px'>Field must not be empty...!</span>";
        }else{
        $query="SELECT * FROM `tbl_student` Where roll='$roll'";
        $stdent=$db->select($query);
        if($stdent){
          while ($result=$stdent->fetch_assoc()) {
           $name=$result['name'];
           $dept=$result['dept'];
           $semester=$result['semester'];
           $shift=$result['shift'];
          }
        }
      ?>

      <div class="col-xs-12 col-sm-7 col-md-6 col-sm-offset-2 col-md-offset-3">
      <form action="" method="POST" class="form-horizontal"
       enctype="multipart/form-data">
       <h2>Name:<?php echo $name;?></h2>
       <h3>Department:<?php echo $dept;?></h3>
       <h3>Semester:<?php echo $semester;?></h3>
       <h3>Shift:<?php echo $shift;?></h3>
        <div class="form-group">
          <label for="exampleInputEmail1"> Examination Fee:</label>
          <td>:</td>
          <?php
        $query="SELECT * FROM `student_payment` Where roll='$roll' AND due_type='exam_fee' order by id desc limit 1";
      $month=$db->select($query);
      if($month){
        while ($result=$month->fetch_assoc()) {
          $examfee=$result['due_amount'];
       }}else $examfee=0;?>
          <input  type="text" name="name" class="form-control" id="" value="<?php echo $examfee; ?>">
          
        </div>
          <div class="form-group">
          <label for="exampleInputEmail1"> Month fee:</label>
          <td>:</td>
            <?php
          $query="SELECT * FROM `student_payment` Where roll='$roll' AND due_type='month_fee' order by id desc limit 1";
          $month=$db->select($query);
          if($month){
          while ($result=$month->fetch_assoc()) {
          $monthfee=$result['due_amount'];
           }}else $monthfee=0;?>
          <input  type="text" name="name" class="form-control" id="" value="<?php echo $monthfee; ?>">
        </div>
          <div class="form-group">
          <label for="exampleInputEmail1"> Admission fee:</label>
          <td>:</td>
          <?php
          $query="SELECT * FROM `student_payment` Where roll='$roll' AND due_type='add_fee' order by id desc limit 1";
          $fee=$db->select($query);
          if($fee){
            while ($result=$fee->fetch_assoc()){
              $addmission=$result['due_amount'];
             }}else $addmission=0;?>
          <input  type="text" name="name" class="form-control" id="" value="<?php echo $addmission;?>">
        </div>
          <div class="form-group">
          <label for="exampleInputEmail1"> Total due</label>
          <td>:</td>
          <?php 
          $total=$examfee+$monthfee+$addmission;
          ?>
          <input  type="text" name="name" class="form-control" id="" value="<?php echo $total; ?>">
        </div>
      
        <div class="form-grop">
           <div class="col-sm-offset-2 col-xs-10">
              <td>
              <button type="submit" class="btn btn-primary" name="ok">Ok</button></td>
         
          </div>
         </div>

</form>
    </div>



<?php }
        }
?>

<style type="text/css">
  h2{
    color:red;
  }
  h3{
    color:green;
  }
</style>


<?php include 'inc/footer.php'; ?>