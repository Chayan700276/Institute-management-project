<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/stu_Registration.php'; ?>
<h2>Student Search</h2>
<div class="showstudent">

  <a href="indivisual_search.php"><button type="button" class="btn btn-primary btn-lg btn-block">Indevisual Search</button></a>
  <a href="semesterbaseSearch.php"><button type="button" class="btn btn-default btn-lg btn-block">Semester Base Search</button></a>
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