<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/principal.php'; ?>

<?php 
  $ppal = new principal();
 ?>
<h2>Principal information</h2>
<div class="showstudent">

  <a href="add_principal.php"><button id="teacher" type="button" class="btn btn-primary btn-lg ">Add Principal</button></a>
  <a href="principal_list.php"><button type="button" class="btn btn-danger btn-lg ">Show Principal</button></a>
</div>
<style type="text/css">
  .showstudent{
    margin-top: 150px;
  }
  .showstudent a button{
    color: white;
    font-size: 35px;
  }
  h2{
 border-bottom: 5px dashed #ddd;
color: inherit;
font-size: 113px;
text-align: center;
text-shadow: 9px 14px 10px black;
padding-bottom: 21px;
font-family: icon;

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