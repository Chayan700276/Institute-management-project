<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/Library.php'; ?>
<?php 
  $lb = new Library();
?>
<?php 
 $query="SELECT * FROM tbl_library";
 $librarydata=$db->select($query);
 if($librarydata){
  while ($result=$librarydata->fetch_assoc()) {

    Session::set("b_name",$result['b_name']);
    Session::set("b_type",$result['b_type']);
    Session::set("w_name",$result['w_name']);    
    Session::set("price",$result['price']);

  }

 }

?>

<div class="well text-center">
    <h2>Book List</h2>
</div>
 <h2>
    <a class="btn btn-info pull-left " href="book_type_select.php">Back</a>
  </h2>

<div class="container-fluid marginTop">
<div class="row">
<div class="col-xs-12">
 <div class="table-responsive">
<table class="table table-bordered table-hover">

  <thead>
    <tr class="success">
      <th width="10%">Sl.No</th>
      <th width="20%">Book Name</th>
      <th width="20%">Writter Name</th>
      <th width="10%">Price</th>
      <th width="20%">image</th>
      <th width="20%">Action</th>
    </tr>
  </thead>
  <tbody>
<?php 

if(isset($_GET['delid'])){
  $id=$_GET['delid'];

  $bookdelete = $lb->BookDelete($id);
}

?>
<?php
 $book_select = Session::get('book_select');
    	
  $booksearch=$lb->BookSearch($book_select);
if($booksearch){
$i=0;
while ($result=$booksearch->fetch_assoc()){ 
$i++;
?>   
    <tr class="danger">
      <td><?php echo $i; ?></td>
      <td><?php echo $result['b_name']; ?></td>
      <td><?php echo $result['w_name']; ?></td>
      <td><?php echo $result['price']; ?>/-</td>
      <td><img src="<?php echo $result['image']; ?>" height="60px" width="100px"></td>
      <td> 
          <a onclick="return confirm('Are you sure to Delete this Book !!')" href="?delid=<?php echo $result['id'];?>" class="btn btn-danger">Delete</a>||
          <a href="lib_d_s_s.php?bookid=<?php echo $result['id'];?>" class="btn btn-danger">Book Given</a>
        </td>
    </tr>
  </tbody>
<?php }} else{
	 echo "<span class='error'>Book Are Not Found Here~!</span>";
	}?>

</table>
  </div>
</div>
</div>
</div


<?php include 'inc/footer.php'; ?>
