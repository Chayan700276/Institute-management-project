<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/Library.php'; ?>
<?php 
  $lb = new Library();
  error_reporting(0);
?>

<?php 

  $name  =Session::get("st_name");
  $roll  =Session::get("st_roll");
  $image  =Session::get("st_imgae");


 ?>







<?php 
if(isset($_GET['roll_f_id'])){
  $roll_f_id=$_GET['roll_f_id'];

}
?>

<?php 
if(isset($_GET['lib_us_id'])){
  $roll_f_id=$_GET['lib_us_id'];

}
?>

<?php
$lib_sub_name=$lb->Lib_Sub_name($roll_f_id);
if($lib_sub_name){
  while ($result=$lib_sub_name->fetch_assoc()) {
    $b_name    =$result['b_name'];
    $w_name    =$result['w_name'];
    $price     =$result['price'];
    $g_date    =$result['g_date'];
   
  }
}

?>
<?php 

if(isset($_POST['insert_lib_trash'])){
  $s_name    = $_POST['s_name'];
  $roll      = $_POST['roll']; 
  $b_name    = $_POST['b_name'];
  $w_name    = $_POST['w_name'];
  $price     = $_POST['price'];
  $g_date    = $_POST['g_date'];
  $t_date    = $_POST['t_date'];

  if(empty($b_name ) or empty($price) ){
    echo "<script>window.location='library.php'</script>";
  }
 else{
  $library_card_update=$lb->Library_Card_Upadate($t_date,$roll_f_id);

 }

}
 ?>
<div class="well text-center">
    <h2 class="thg">You Want To Feedback Your Book</h2><br/>
    <h3 class="lib_text">Thakurgaon</h3><br/>

    <a href="lib_us_list.php?lib_us_id=<?php echo $roll;?>"><img class="lib_image" src="<?php echo $image; ?>" /></a>
     <strong><h2 class="lib_card">Library Feedback Card</h2></strong>
</div>
<?php if(isset($library_trash_insert)){
  echo $library_trash_insert;
  } ?>
<div class="container-fluid marginTop">
  <div class="row">
    <div class="col-xs-12 col-sm-7 col-md-6 col-sm-offset-2 col-md-offset-3">
      
<form class="form-horizontal" action="" method="POST">



<p style="color:green;font-family: Times new Roman;font-size: 20px;">* Take Date </p>
    <input  type="date" required="" name="t_date" class="form-control" id="" placeholder="Eneter Date">


  <p style="color:green;font-family: Times new Roman;font-size: 20px;">* Student Name </p>
    <input type="text" readonly="" name="s_name" class="form-control" value="<?php echo $name; ?>" >


  <p style="color:green;font-family: Times new Roman;font-size: 20px;">*  Roll </p>
    <input type="text" readonly="" name="roll" class="form-control" value="<?php echo $roll; ?>" >

  <p style="color:green;font-family: Times new Roman;font-size: 20px;">* Book Name </p>
    <input type="text"  readonly="" name="b_name"  class="form-control" value="<?php echo  $b_name;?>" >


  <p style="color:green;font-family: Times new Roman;font-size: 20px;">* Writter Name </p>
    <input type="text" readonly=""  name="w_name"   class="form-control" value="<?php echo $w_name; ?>" >

  <p style="color:green;font-family: Times new Roman;font-size: 20px;">* Price </p>
    <input type="text" readonly="" name="price"   class="form-control" value="<?php echo $price;   ?>/=" >


  

<br>
   <button type="submit" name="insert_lib_trash" class="btn btn-success">FeedBack Book</button>
   
   <br>
   <br>
   <br>
</form>

    </div>
  </div>
</div>


<?php include 'inc/footer.php'; ?>