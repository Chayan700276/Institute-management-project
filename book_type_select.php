<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/Library.php'; ?>

<?php 

  $lb = new Library();
?>


<div class="well text-center">
    <h2>Book Type Select</h2>

<?php 
 if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['b_type_select'])){
    $b_type    = mysqli_real_escape_string($db->link, $_POST['b_type']);
      if(empty ($b_type)){ 
       echo "<span class='error'>Field Not Be Empty</span>";
        
      }else{
    Session::set("book_select",$b_type); 
    echo "<script>window.location='booklist.php'</script>";
    }
  }
    ?>
</div>
    <div class="col-xs-12 col-sm-7 col-md-6 col-sm-offset-2 col-md-offset-3">
      <form action="" method="POST" class="form-horizontal"
       enctype="multipart/form-data">

  <p style="color:green;font-family: Times new Roman;font-size: 20px;">* Book Type</p>
    <select class="form-control" name="b_type">
    <option value="">Select One</option>
    <option value="s">Science</option>
    <option value="cmt">Computer Book</option>
    <option value="st">Story Book</option>
    <option value="f">Food Book</option>
    <option value="ai">AIDT Book</option>
    <option value="rac">RAC Book</option>
    <option value="mac">Macatronix Book</option>
    <option value="et">Electrical Book</option>
    <option value="nt">Network Book</option>
    <option value="tr">Traditional Book</option>
    <option value="md">Medical Book</option>
    <option value="mt">Mathmatical Book</option>
    <option value="ot">Other Book</option>
   </select>
       
    <div class="form-grop">
       <div class="col-sm-offset-2 col-xs-10">
          <td>
          <button type="submit" class="btn btn-primary" name="b_type_select">Submit</button></td>
      </div>
     </div>

</form>
    </div>
<?php include 'inc/footer.php'; ?>