<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/UserControl.php'; ?>

<div class="well text-center">
    <h2>Library</h2>
</div>
<div class="container-fluid marginTop">
<div class="row">
<div class="col-xs-12">
  <h2>
    <a class="btn btn-info pull-left add_book " href="lib_add_book.php">Add Book</a>
  </h2>
  <h2>
    <a class="btn btn-danger pull-left book_list " href="book_type_select.php">Book List&Given</a>

    <form action="library_search.php" method="POST">
     <br>
    <br> <br>
    <br>
      <td> <input type="text" required="" name="lib_roll_search"></td>
      <td> <input type="submit"  name="lib_search" value="Search"></td>
   

    </form>
  </h2>
  <h2>
    <a class="btn btn-info pull-right given_take " href="lib_f_d_s_s.php">Feedback</a>
  </h2>
  
</div>
</div>
</div>
<?php include 'inc/footer.php'; ?>