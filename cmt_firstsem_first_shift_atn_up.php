<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/Student_Attend.php'; ?>
<?php   $sa  =  new Student_Attend(); ?>
<?php 
     $dept            =Session::get("dept"); 
     $semester        =Session::get("semester"); 
     $shift           =Session::get("shift"); 
     $subjectName     =Session::get("subjectName"); 


 ?>
<?php 
if(isset($_GET['dateid'])){
$dateid=$_GET['dateid'];

}
?>

<?php 
if(isset($_POST['attend_update_submit'])){
  $attend=$_POST['attend'];
  $updateattend=$sa->UpdateAttendance($attend,$dateid);
}



 ?>


<div class="well text-center">
    <h2>Attendance Update</h2>  
  </div>
  <h2>
  <?php if(isset($updateattend)){
    echo $updateattend;
    } ?>
  <h2 class="up_dt">Date : <?php echo $dateid; ?></h2>
  <h2 class="up_sub">Subject Name : <?php echo $subjectName; ?></h2>
      <a class="btn btn-info pull-right update_button" href="cmt_firstsem_first_shift_date_view.php">All Date View & Back</a>
    </h2>
<div class="container-fluid marginTop">
<div class="row">
<div class="col-xs-12">
 <div class="table-responsive">
   <form action="" method="POST">
<table class="table table-bordered table-hover" >

     <thead>
        <tr class="success">
          <th style="font-size:30px; color:red" >Sl</th>
          <th style="font-size: 30px;color:red" >Student Name</th>
          <th style="font-size: 30px;color:red"  >Roll </th>
          <th  style="font-size: 30px;color:red" >Attendance</th>
        </tr>
    </thead>

  <?php 

  $updateforshow=$sa->UpdateForShow($dateid,$subjectName,$shift);
    if( $updateforshow)
   {
    $i=0;
    while ($result=$updateforshow->fetch_assoc()) {
     $i++;
   ?>
      

 
          <tr>
          <td style="font-size: 20px;"><?php echo $i; ?></td>
          <td style="font-size: 20px;"><?php  echo $result['name']?></td>
          <td style="font-size: 20px;"><?php  echo $result['roll']?></td>
          <td>
      <input type="radio" name="attend[<?php echo $result['roll']; ?>]"
        value="present"<?php if($result['attend']=="present"){echo "checked";}?>>P

        |---| A<input type="radio" name="attend[<?php echo $result['roll']; ?>]"
        value="absent"<?php if($result['attend']=="absent"){echo "checked";}?>>

    </td>
          
        </tr>   
          
     
 <?php } } ?>
</table>
      <tr>
          <td colspan="4">
            <input type="submit" class="btn btn-primary btn-lg active pull-right" name="attend_update_submit" value="Update Attend">
          </td>
        </tr>
 </form>
  </div>
</div>
</div>
</div>




<?php include 'inc/footer.php'; ?>