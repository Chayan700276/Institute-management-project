<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/Library.php'; ?>
<?php 

  $lb = new Library();


?>
<?php 
     $dept            =Session::get("dept"); 
     $semester        =Session::get("semester"); 
     $shift           =Session::get("shift"); 
     $g_bookid        =Session::get("s_bookid");
     //get for book id 
      $boo_name        =Session::get("bo_name");
      $wri_name        =Session::get("wr_name");
      $bo_price        =Session::get("b_price");
 
 ?>
<?php 
  if(isset($_GET['libid'])){
    
  }


 ?>
<div class="well text-center">
    <h2>Student Biyodata</h2>
</div>
 <h2>
    <a class="btn btn-info pull-left " href="lib_f_d_s_s.php">Back</a>
  </h2>

<div class="container-fluid marginTop">
<div class="row">
<div class="col-xs-12    ">
 <div class="table-responsive">
<table class="table table-bordered table-striped">
   <thead>
    <tr class="success">
      <th width="10%">Sl.No</th>
      <th width="20%">Student Name</th>
      <th width="15%">Roll</th>
      <th width="20%">Image</th>
      <th width="15%">Action</th>
      
    </tr>
  </thead>
  <tbody>

    <?php 
$lib_roll_show=$lb->Lib_Roll_Show($dept,$semester,$shift);
     if($lib_roll_show){
      $i=0;
      while ($result=$lib_roll_show->fetch_assoc()){
        $i++;

         Session::set("s_name",$result['name']);
         Session::set("roll",$result['roll']);
         Session::set("image",$result['image']);

         Session::set("book_name",$boo_name);
         Session::set("writter_name",$wri_name);
         Session::set("book_price",$bo_price);
        
        ?>
        <thead>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $result['name']; ?></td>
      <td><?php echo $result['roll']; ?></td>
      <td><img src="<?php echo $result['image']; ?>" width="160px" height="100px"></td>  
      <td>
      <?php 

       ?>
      <a href="lib_us_list.php?lib_b_id=<?php echo $result['roll'];?>"><button style="margin-top: 40px" type="submit" name="" class="btn btn-primary">Feedback</button></a>



      </td>
    </tr>

 <?php } } ?>
  </tbody>
</table>
  </div>
</div>
</div>
</div


<?php include 'inc/footer.php'; ?>
