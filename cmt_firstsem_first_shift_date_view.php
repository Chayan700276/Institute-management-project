<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<?php 

include 'classes/Student_Attend.php'; 
$sa = new Student_Attend();
?>

<div class="well text-center">
    <h2>All Date View </h2>
  </div>
<h2>
      <a class="btn btn-info pull-right" href="cmt_firstsem_first_shift.php">Back</a>
    </h2>

<div class="container-fluid marginTop">
<div class="row">
<div class="col-xs-12">
 <div class="table-responsive">
<table class="table table-bordered table-hover">

      <thead>
        <tr   class="success">
          <th width="15%">Sl.No</th>
          
          <th width="30%">Attendnce Date</th>
          <th width="15%">Action</th>
        </tr>
      </thead>
      <tbody>
   <?php
     $get_date=$sa->getDatelist();
     if($get_date){
     $i=0;
     while ($result=$get_date->fetch_assoc()) {
     $i++;

 ?>


        <tr>
          <td><?php echo $i; ?></td>
    
          <td><?php echo $result['att_time'] ?></td>
          
          <td>
           
              <a href="cmt_firstsem_first_shift_atn_up.php?dateid=<?php echo $result['att_time'];?>" class="btn btn-danger">Update</a> 
               

         </td>
        </tr>
        <?php }} ?>
      </tbody>

</table>
  </div>
</div>
</div>


</div>





<?php include 'inc/footer.php'; ?>