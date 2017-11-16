<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/Library.php'; ?>

<?php 

if(isset($_POST['lib_end_show'])){
  echo "<script>window.location='library.php'</script>";
}
?>

<?php 
error_reporting(0);
$lb=new Library();
if(isset($_POST['lib_search'])){

  $lib_roll_search=$_POST['lib_roll_search'];

  $lib_search=$lb->Lib_Search($lib_roll_search);
}
?>


<?php 
    $query ="SELECT * FROM tbl_student WHERE roll = '$lib_roll_search'";
    $result = $db->select($query)->fetch_assoc();

    Session::set("st_name",$result['name']);
    Session::set("st_roll",$result['roll']);
    Session::set("st_reg",$result['reg']);
    Session::set("st_imgae",$result['image']);
    Session::set("dept",$dept); 
    Session::set("semester",$semester); 
    Session::set("shift",$shift); 
 ?>
 
<h2 class="thg_1">Thakurgaon Polytechnic Institute</h2>
<h3 class="thg_2">Thakurgaon</h3>
<h2 class="lib">Library Card</h2>

<p class="lib_image_new"><img src="<?php echo $result['image'];?>"></p>
<h2 class="s_name">Student Name : <?php echo $result['name']; ?></h2> 
<h2 class="dept">Department : <?php echo $result['dept']; ?></h2> 
<h2 class="semester">Semester : <?php echo $result['semester']; ?></h2> 
<h2 class="shift">Shift : <?php echo $result['shift']; ?></h2>
<h2 class="s_roll">Roll No : <?php echo $result['roll']; ?></h2> 
<h2 class="s_reg">Reg No : <?php echo $result['reg']; ?></h2> 



<div class="container-fluid marginTop">
<div class="row">
<div class="col-xs-12">
 <div class="table-responsive">
   <form action="" method="POST">
      <table class="table table-striped hover" >
        <tr class="success">
          <th >Serial</th>
          <th>Student Name</th>
          <th>Roll </th>
          <th>Book Name</th>
          <th>Writer</th>
          <th>Price</th>
          <th>Givend Date </th>
          <th>Feedback Date</th>
        </tr>
    
        <?php 
  if(isset($lib_search)){
    $i=0;
    while ($result=$lib_search->fetch_assoc())  {
      $i++;?>
        <tr>
          <td ><?php echo $i; ?></td>
          <td><?php  echo $result['s_name']?></td>
          <td><?php  echo $result['roll']?></td>
          <td><?php  echo $result['b_name']?></td>
          <td><?php  echo $result['w_name']?></td>
          <td><?php  echo $result['price']?></td>
          <td><?php  echo $result['g_date']?></td>
          <td><?php  echo $result['t_date']?></td>
        </tr>  
    <?php } } ?> 
    </table>
     <a href="library.php"><button type="submit" name="lib_end_show"  class="btn btn-success pull-right">Ok</button></a> 

 </form>
  </div>
</div>
</div>
</div>


<?php include 'inc/footer.php'; ?>
