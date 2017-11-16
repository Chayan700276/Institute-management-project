<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/Library.php'; ?>
<?php 
  $lb = new Library();
?>
<?php 
     $book_price= Session::get("book_price");
     $writter_name =Session::get("writter_name");
     $book_name =Session::get("book_name");
 ?>


<?php 

if(isset($_GET['libid'])){
  $libid=$_GET['libid'];
}

 ?>

<?php
$lib_roll_name=$lb->Lib_Roll_Name($libid);
if($lib_roll_name){
  while ($result=$lib_roll_name->fetch_assoc()) {
    $s_name=$result['name'];
    $roll=$result['roll'];
    $image=$result['image'];
  }
}

?>

<?php 

if(isset($_POST['library_card'])){
    $g_date = $_POST['g_date'];
    

$library_card_insert=$lb->Library_Card_Insert($g_date,$book_name,$writter_name,$book_price,$s_name,$roll);

}
 ?>
<div class="well text-center">
    <h2 class="thg">You Can Take Book Here</h2><br/> 
        <h3 class="lib_text">Thakurgaon</h3><br/>
    <img class="lib_image" src="<?php echo $image; ?>" />

    <strong><h2 class="lib_card">Library Given Card<br/>
</div>
<a href="lib_roll_list.php"><button class="btn btn-danger">Back</button></a>



<?php if(isset($library_card_insert)){
  echo $library_card_insert;
  } ?>
</h2></strong>

<div class="container-fluid marginTop">
  <div class="row">
    <div class="col-xs-12 col-sm-7 col-md-6 col-sm-offset-2 col-md-offset-3">
      
<form class="form-horizontal" action="" method="POST">

  <p style="color:green;font-family: Times new Roman;font-size: 20px;">*Given Date</p>
      <input  type="date" required="" name="g_date" class="form-control" id="" placeholder="Enter Date">

  <p style="color:green;font-family: Times new Roman;font-size: 20px;">* Student Name </p>
    <input type="text" readonly="" class="form-control" value="<?php echo $s_name; ?>" >


  <p style="color:green;font-family: Times new Roman;font-size: 20px;">*  Roll </p>
    <input type="text" readonly=""  class="form-control" value="<?php echo $roll; ?>" >

  <p style="color:green;font-family: Times new Roman;font-size: 20px;">* Book Name </p>
    <input type="text"  readonly=""  class="form-control" value="<?php echo  $book_name?>" >


  <p style="color:green;font-family: Times new Roman;font-size: 20px;">* Writter Name </p>
    <input type="text" readonly=""  class="form-control" value="<?php echo $writter_name ?>" >

  <p style="color:green;font-family: Times new Roman;font-size: 20px;">* Price </p>
    <input type="text" readonly=""  class="form-control" value="<?php echo $book_price;   ?>/=" >


  
   <br>
   
   <button type="submit" name="library_card" class="btn btn-success">Submit</button>
   
   <br>
   <br>
   <br>
</form>

    </div>
  </div>
</div>


<?php include 'inc/footer.php'; ?>