<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/Result.php'; ?>

<?php 

$rt=new Result();
 ?>
<?php 
$get_dept      =Session::get("dept");
$get_semester  =Session::get("semester");
$get_shift     =Session::get("shift");
?>

<?php 
Session::set("set_dept",$get_dept);
Session::set("set_semester",$get_semester);
Session::set("set_shift",$get_shift);
?>

<?php 
if(isset($_POST['re_subject_result'])){
  $sub_name=$_POST['sub_name']; 

  if(empty($sub_name)){
    echo "<span class='error'>Select A Subject Name -~</span>";
  }
  else{
    $query="SELECT * FROM tbl_subject WHERE sub_name='$sub_name'";

   $subject_result   =$db->select($query)->fetch_assoc();
    
    $subject_code   =$subject_result['sub_code'];

   $total       =$subject_result['total'];
   $tc          =$subject_result['tc'];
   $tf          =$subject_result['tf'];
   $pc          =$subject_result['pc'];
   $pf          =$subject_result['pf'];


    Session::set("set_subject_name",$sub_name);
    Session::set("set_subject_code",$subject_code);

    Session::set("total",$total);
    Session::set("tc",$tc);
    Session::set("tf",$tf);
    Session::set("pc",$pc);
    Session::set("pf",$pf);


   echo "<script>window.location='result_roll_show.php'</script>";




  }

  }
  
 ?>

<?php 


 ?>
<div class="well text-center">
    <h2>Subject Select And Given Password~!</h2>
 </div>
<a href="result.php"> <button  type="submit" class="btn btn-primary pull-left">Back</button></a>
    <div class="col-xs-12 col-sm-7 col-md-6 col-sm-offset-2 col-md-offset-2">
      <form action="" method="post" class="form-horizontal">  
         <div class="form-group"> 

         <label for="exampleInputPassword1">Subject Name:</label>
            <select name="sub_name" class="form-control">
            <option value="">-----Select Subject------</option>
        <?php 

        $show_subject=$rt->Show_result_Subject($get_dept,$get_semester);
          if($show_subject){     
          while ($result=$show_subject->fetch_assoc()){   
              $sub_result_code=$result['sub_code'];
          ?>

          <option  value="<?php echo $result['sub_name']; ?>"><?php echo $result['sub_name']; ?> [<?php echo $result['sub_code']; ?>]</option>

           <?php } }  ?>
            </select>

          </div>
        
      <button  type="submit" name="re_subject_result" class="btn btn-primary ">Submit</button> 
     </form>
    </div>


<?php include 'inc/footer.php'; ?>