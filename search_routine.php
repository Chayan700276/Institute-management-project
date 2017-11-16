<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<h2>Class Routine</h2>
<div class="showstudent">

  <a href="search_by_teacher_name.php"><button type="button" class="btn btn-primary btn-lg btn-block">Search By Teacher Name</button></a>
  <a href="search_by_class.php"><button type="button" class="btn btn-default btn-lg btn-block">Search By Class</button></a>
</div>


<style type="text/css">
  .showstudent{
    margin-top: 150px;
  }
  .showstudent a button{
    color:red;
    font-size: 30px;
    text-shadow: 4px 7px 8px black;
  }
  h2{
     color: green;
    font-size: 71px;
    text-align: center;
    text-shadow: 4px 7px 8px black;
  }
</style>
<?php include 'inc/footer.php'; ?>