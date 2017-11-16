<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/Subject_select.php'; ?>

<?php 

$sb=new Subject_select();

 ?>

<?php 

$get_dept=Session::get("set_dept");
$get_semester=Session::get("set_semester");

?>

<?php 

if (isset($_GET['subid'])) {
  $subid = $_GET['subid'];
  $del_subject=$sb->Delete_Subject($subid);
}

 ?>

<?php 
if(isset($_POST['end_show']))
{
  echo "<script>window.location='show_subject.php'</script>";
}

 ?>





<div class="well text-center">
    <h2>All Subject Show Here~!</h2>
<?php 
  if(isset($del_subject)){
    echo $del_subject;
  }
 ?>
  </div>
<a href="show_subject.php"> <button  type="submit" name="Update_subject_data" class="btn btn-primary pull-left">Back</button></a>

    <div class="col-xs-12 col-sm-7 col-md-6 col-sm-offset-2 col-md-offset-2">
      <form action="" method="post" class="form-horizontal">  
          <?php 
    $show_subject=$sb->Show_Subject($get_dept,$get_semester);
      if($show_subject){     
      while ($result=$show_subject->fetch_assoc()){   
      ?>     
          <div class="form-group">          
         
            <input readonly=""   class="sub_width" type="text" name="sub_name" 
          class="form-control" value="Sub Name:<?php echo $result['sub_name'];?>&Sub Code:<?php echo $result['sub_code']; ?>">
          <a  class="btn btn-primary pull-left edit_subject"
            href="sub_edit.php?subid=<?php echo $result['id'];?>">Edit</a>

            <a  class="btn btn-primary del"
            href="?subid=<?php echo $result['id'];?>">Delete</a>
          </div> 
             
        <?php }} ?>  
         <button  type="submit" name="end_show" class="btn btn-primary ">End Show</button> 
     </form>
    </div>

<style>
.sub_width {
border: 2px solid navy;
border-radius: 3px;
font-size: 25px;
height: 40px;
margin-left: -180px;
width: 908px;
}

.edit_subject {
margin-left: 732px;
margin-top: -36px;

}
.del{
margin-left: 786px;
margin-top: -59px;

}
</style>





<?php include 'inc/footer.php'; ?>