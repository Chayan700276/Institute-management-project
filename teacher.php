<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/stu_Registration.php'; ?>
<h2>Teacher information</h2>
<div class="showstudent">

  <a href="add_teacher.php"><button id="teacher" type="button" class="btn btn-success btn-lg ">Add Teacher</button></a>
  <a href="teacher_search.php"><button type="button" class="btn btn-info btn-lg ">Show Teacher</button></a>
  <a href="search_teacher_by_id.php"><button id="teachers" type="button" class="btn btn-warning btn-lg ">Search Teacher By ID</button></a>
</div>
<style type="text/css">
  .showstudent{
    margin-top: 150px;
  }
  .showstudent a button{
    color: white;
    font-size: 35px;
    text-shadow: 4px 7px 8px black;
  }
  h2{
    background: #3399FF;
    color:white;
    font-size: 71px;
    text-align: center;
    text-shadow: 4px 7px 8px black;
    width: 

  }
  #teacher{
    margin-left: 270px;
  }
    #teachers{
float: right;
margin-right: 262px;
margin-top: 24px;
  }
</style>
<?php include 'inc/footer.php'; ?>