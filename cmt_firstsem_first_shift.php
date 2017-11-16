<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/Student_Attend.php'; ?>
<?php   $sa  =  new Student_Attend(); ?>
<?php 
error_reporting(0);
     $dept            =Session::get("dept"); 
     $semester        =Session::get("semester"); 
     $shift           =Session::get("shift"); 
     $subjectName     =Session::get("subjectName"); 


 ?>
<?php $cur_date=date('Y-m-d'); ?>
<?php 
if(isset($_POST['Add_Attend'])){
$attend=$_POST['attend'];

$insertattend=$sa->insertAttendance($dept,$semester,$shift ,$subjectName,$cur_date,$attend);

}

 ?>
<div class="well text-center">
    <h2>Student Attendance System</h2> 
    <a class="btn btn-info pull-left back_button" href="com_subject_select.php">Back</a> 
  </div>

<div class="pannel-heading">
    <h2>
      <a class="btn btn-info pull-right" href="cmt_firstsem_first_shift_date_view.php">View All</a>
    </h2>
</div>
  <div class="attend_header">
    
     <h3 class="att_dept">Department : <?php echo $dept; ?></h3>
     <h3 class="att_seme">Semester :   <?php echo $semester; ?></h3>
     <h3 class="att_shift">Shift :      <?php echo $shift; ?></h3>
     <h3 class="att_sub">subject Name :   <?php echo $subjectName; ?></h3>
  </div>
<div class="container-fluid marginTop">
<div class="row">
<div class="col-xs-12">
 <div class="table-responsive">
<div class="well text-center">
    <h2><strong>Date:</strong><?php echo $cur_date; ?> </h2>
     </div>
     <?php if(isset($insertattend)) {
      echo $insertattend;
      }?>
   <form action="" method="POST">
<table class="table table-bordered table-hover" >

     <thead>
        <tr class="success">
        
          <th width="15px">Sl</th>
          <th width="25px">Student Name</th>
          <th width="25px">Roll </th>
          <th width="25px">Attendance</th>
        </tr>
     
      </thead>

  <?php 

  $get_attend=$sa->Get_Attend($dept,$semester,$shift);
    if( $get_attend)
   {
    $i=0;
    while ($result=$get_attend->fetch_assoc()) {
     $i++;
   ?>
      

 
          <tr>
          <td style="font-size: 20px;"><?php echo $i; ?></td>
          <td style="font-size: 20px;"><?php  echo $result['name']?></td>
          <td style="font-size: 20px;"><?php  echo $result['roll']?></td>
          <td>
      <input type="radio" name="attend[<?php echo $result['roll']; ?>]"
      value="present">P
      |---| A<input type="radio" name="attend[<?php echo $result['roll']; ?>]"
      value="absent">

    </td>
          
        </tr>   
          
     
 <?php } } ?>
</table>
      <tr>
          <td colspan="4">
            <input type="submit" class="btn btn-primary btn-lg active pull-right" name="Add_Attend" value="Add Attend">
          </td>
        </tr>
 </form>
  </div>
</div>
</div>





<?php include 'inc/footer.php'; ?>