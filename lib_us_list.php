 <?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/Library.php'; ?>
<?php 
  $lb = new Library();
  error_reporting(0);
?>

<?php 

if(isset($_GET['lib_b_id'])){
  $lib_us_id=$_GET['lib_b_id'];
}
?>

<?php 

if(isset($_GET['id'])){
  $id=$_GET['id'];
}
?>

<?php 
    $query ="SELECT * FROM tbl_student WHERE roll = '$lib_us_id'";
    $result = $db->select($query)->fetch_assoc();

      Session::set("st_name",$result['name']);
      Session::set("st_roll",$result['roll']);
       Session::set("st_imgae",$result['image']);
 ?>
 
<h2 class="thg_1">Thakurgaon Polytechnic Institute</h2>
<h3 class="thg_2">Thakurgaon</h3>
<h2 class="lib">Library Card</h2>
<p class="lib_image_new"><img src="<?php echo $result['image'];?>"></p>
<h2 class="s_name">Student Name:<?php echo $result['name']; ?></h2> 
<h2 class="s_roll">Student Roll:<?php echo $result['roll']; ?></h2> 
<h2 class="dept">Department:<?php echo $result['dept']; ?></h2> 
<h2 class="semester">Semester:<?php echo $result['semester']; ?></h2> 
<h2 class="shift">Shift:<?php echo $result['shift']; ?></h2>


<div class="container-fluid marginTop">
<div class="row">
<div class="col-xs-12">
 <div class="table-responsive">
   <form action="" method="POST">
      <table class="table table-striped hover" >
        <tr class="success">
    <th >SL</th>
    <th >Book Name</th>
    <th class="">Writter Name</th>
    <th class="">Price</th>
    <th class="">Given Date</th>
    <th class="">Taken Date</th>
    <th class="">Action</th>
  </tr>
<?php 
  
$lib_us_list=$lb->LibUsList($lib_us_id);
      if($lib_us_list){
      $i=0;
      while ($result=$lib_us_list->fetch_assoc()) {
      $i++;
      Session::set("get_lib_status",$result['lib_status']);
?>
    <tr class="danger">
    <td><?php echo $i; ?></td>
    <td><?php echo $result['b_name'];?></td>
    <td><?php echo $result['w_name'];?></td>
    <td><?php echo $result['price'];?></td>
    <td><?php echo $result['g_date'];?></td>
    <td><?php echo $result['t_date'];?></td>

    <td>  
    <?php 

    if (Session::get("get_lib_status")=='0') {
      ?>
    <a class="btn btn-info btn btn-success " href="book_back.php?roll_f_id=<?php echo $result['id']; ?>">Do Paid</a>
     <?php }else echo "Book Paid"; ?>
    </td>

  </tr>
  <?php } ?>
</table>
</form>
<?php } else{
  echo "<span style='color:red;font-size:20px'>No data found..!</span>";
  }?>
  </div>
</div>
</div>
</div>

<?php include 'inc/footer.php'; ?>

