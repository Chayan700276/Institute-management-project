<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<h2>Payments</h2>
<div class="showstudent">

  <a href="definePayment.php"><button type="button" class="btn btn-primary btn-lg btn-block">Define fee</button></a>
  <a href="student_payment_insert.php"><button type="button" class="btn btn-default btn-lg btn-block">Payment</button></a>
  <a href="dueShow.php"><button type="button" class="btn btn-primary btn-lg btn-block">Show due</button></a>
  <a href="duelist.php"><button type="button" class="btn btn-default btn-lg btn-block">Due's Student List</button></a>
  <a href="showDefineFee.php"><button type="button" class="btn btn-primary btn-lg btn-block">Show Define Fee</button></a>
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