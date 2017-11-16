<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/stu_Registration.php'; ?>
<h2>Employe information</h2>
<div class="showstudent">

  <a href="add_employee.php"><button id="teacher" type="button" class="btn btn-primary ">Add Employee</button></a>
  <a href="employeelist.php"><button type="button" class="btn btn-warning ">Show Employee</button></a>
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
    background: #5B4182;
    color:white;
    font-size: 71px;
    text-align: center;
    text-shadow: 4px 7px 8px black;
    width: 

  }
  #teacher{
    margin-left: 270px;
  }
</style>
<?php include 'inc/footer.php'; ?>