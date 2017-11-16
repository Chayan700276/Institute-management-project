<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/Library.php'; ?>
<?php 

	$lb = new Library();
?>


<?php 

 if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['add_book'])){
        $addbook = $lb->AddBook($_POST,$_FILES);

  }

 ?>

<div class="well text-center">
    <h2>Add Book</h2>
    <?php if(isset(  $addbook)){
	echo   $addbook;
	} ?>
</div>

<a href="library.php"><button class="btn btn-success">Back</button></a>
<div class="container-fluid marginTop">
	<div class="row">
		<div class="col-xs-12 col-sm-7 col-md-6 col-sm-offset-2 col-md-offset-3">
			

	<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">

  	<p style="color:green;font-family: Times new Roman;font-size: 20px;">* Book Name</p>
  	<input class="form-control" type="text" name="b_name" placeholder=" input Book name"/>

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

  	<p style="color:green;font-family: Times new Roman;font-size: 20px;">* Writter Name</p>
  	<input class="form-control" type="text" name="w_name" placeholder=" input Writter name"/>

  	<p style="color:green;font-family: Times new Roman;font-size: 20px;">* Price </p>
  	<input class="form-control" type="text" name="price" placeholder=" input Price"/>

    <p style="color:green;font-family: Times new Roman;font-size: 20px;">* Image </p>
    <input type="file" name="image">


<br>
   <button type="submit" name="add_book" class="btn btn-success">Add Book</button>
   <br>
   <br>
   <br>
</form>



		</div>
	</div>
</div>
</body>
</html>

<?php include 'inc/footer.php'; ?>