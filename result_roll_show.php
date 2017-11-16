<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/Result.php'; ?>
<?php   $rt  =  new Result(); ?>
<?php 
error_reporting(0);

     $dept            =Session::get("set_dept"); 
     $semester        =Session::get("set_semester"); 
     $shift           =Session::get("set_shift"); 
     $subjectName     =Session::get("set_subject_name"); 
     $subjectCode     =Session::get("set_subject_code"); 

     $total   =Session::get("total"); 
     $tc     =Session::get("tc"); 
     $tf     =Session::get("tf"); 
     $pc     =Session::get("pc"); 
     $pf     =Session::get("pf");


 ?>

<div class="well text-center">
    <h2>Result Processing System</h2> 

    <a class="btn btn-info pull-left back_button" href="re_subject_select.php">Back</a> 
  </div>

  <div class="attend_header">
    
     <h3 class="att_dept">Department : <?php echo $dept; ?></h3>
     <h3 class="att_seme">Semester :   <?php echo $semester; ?></h3>
     <h3 class="att_shift">Shift :      <?php echo $shift; ?></h3>
     <h3 class="att_sub">Subject Name :   <?php echo $subjectName; ?></h3>
     <h3 class="sub_code_result">Subject Code :   <?php echo $subjectCode; ?></h3>
    <?php 
if (isset($resultinsert)) {
  echo $resultinsert;
}?>
     <table class="result_tbl" border="3">
       <tr>
         <td>TC</td>
         <td>TF</td>
         <td>PC</td>
         <td>PF</td>
       </tr>
       <tr>
         <td><?php echo $tc; ?></td>
         <td><?php echo $tf; ?></td>
         <td><?php echo $pc; ?></td>
         <td><?php echo $pf; ?></td>
       </tr>


     </table>
  </div>
<div class="container-fluid marginTop">
<div class="row">
<div class="col-xs-12">
 <div class="table-responsive">
<div class="well text-center">

<?php 
 if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['b_type_select'])){
  $count=$_POST['count'];
    if($tc>='1' && $tf>='1' && $pc>='1' && $pf>='1'){
    for ($i=1; $i<=$count; $i++) {
     
    $roll=$roll_accept[$i];
    $tc=$_POST['tc'.$i];
    $tf=$_POST['tf'.$i];
    $pc=$_POST['pc'.$i];
    $pf=$_POST['pf'.$i];
    $resultinsert=$rt->ResultInsertall($roll,$tc,$tf,$pc,$pf,$dept,$semester,$shift,$subjectName,$subjectCode);
    }
/*
    if($tc>='1'&& $tf>='1' && $pc>='1'){ 
    $roll=$roll_accept[$i];
    $tc=$_POST['tc'.$i];
    $tf=$_POST['tf'.$i];
    $pc=$_POST['pc'.$i];
    $resultinsert=$rt->ResultInserttp($roll,$tc,$tf,$pc,$dept,$semester,$shift,$subjectName,$subjectCode);
    }

    if($tc>='1'&& $tf>='1'){ 
    $roll=$roll_accept[$i];
    $tc=$_POST['tc'.$i];
    $tf=$_POST['tf'.$i];
    $resultinsert=$rt->ResultInsertt($roll,$tc,$tf,$dept,$semester,$shift,$subjectName,$subjectCode);
    }

    if($pc>='1' && $pf>='1'){ 
    $roll=$roll_accept[$i];
    $pc=$_POST['pc'.$i];
    $pf=$_POST['pf'.$i];
    $resultinsert=$rt->ResultInsertp($roll,$pc,$pf,$dept,$semester,$shift,$subjectName,$subjectCode);
    }*/
  }
}
 ?>
<form action="" method="POST">
<table class="table table-bordered table-hover" >

     <thead>
        <tr class="success">    
          <th width="5%">Sl </th>     
          <th width="">Roll </th> 
          <th>TC</th>
          <th>TF</th>
          <th>PC</th>
          <th>PF</th> 
        </tr>
      </thead>

  <?php 

$result_roll_show=$rt->Result_Roll_show($dept,$semester,$shift);
 $serial_number     = 1;

    if( $result_roll_show)
   {
    $i=1;
    while ($result=$result_roll_show->fetch_assoc()) {
      $roll_accept[$i]=$result['roll'];
    
   ?>

        <tr>   
          <td><?php echo  $serial_number++."."; ?></td>     
          <td style="font-size: 20px;"><?php  echo $result['roll']?></td>
            <?php 
              if($tc>='1'){?>

              <td>

<input class="roll_box" type="text" required="" name="tc<?php echo $i;?>" placeholder="TC">

              </td>             
             <?php }
             else{
                echo "<td>X</td>";
             }

              ?>

             <?php 
              if($tf>='1'){?>
              <td>
<input class="roll_box" required="" type="text" name="tf<?php echo $i;?>" placeholder="TF">
               </td>             
             <?php }
             else{
                echo "<td>X</td>";
             }
             ?>

             <?php 
              if($pc>='1'){?>
              <td>
<input  class="roll_box" type="text" required="" name="pc<?php echo $i;?>" placeholder="PC">
              </td>             
             
             <?php }
             else{
                echo "<td>X</td>";
             }
             ?>


             <?php 
              if($pf>='1'){?>
              <td>
 <input  class="roll_box" type="text" required="" name="pf<?php echo $i;?>" placeholder="PF">
              </td>             
             <?php }
              else{
                echo "<td>X</td>";
             }
             ?>       
        </tr>   
          <input type="hidden" name="count" value="<?php echo $i;?>">
    <?php  $i++;}} ?>
</table>
      <tr>
          <td colspan="4">
            <input type="submit" class="btn btn-primary btn-lg active pull-right" name="b_type_select" value="Mark Submit">
          </td>
        </tr>

 </form>
  </div>
</div>
</div>
</div>
</div>




<?php include 'inc/footer.php'; ?>