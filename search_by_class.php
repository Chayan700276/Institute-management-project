<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<?php include 'classes/class_routine.php'; ?>
<?php 
  $rountine = new Routine();

   $selteacher = $rountine->SelectTeacher();
 ?>

 <?php 
      if ($_SERVER['REQUEST_METHOD']=='POST') {
        $department = $_POST['department'];
        $semester = $_POST['semester'];
        $shift = $_POST['shift'];
        $day = $_POST['day'];

        if(empty($department)|| empty($semester)|| empty($shift)|| empty($day)){
          echo "<span style='color:red;font-size20px'>Field Must not be empty....!</span>";
        }else{
          Session::set("teacher",$department);
          Session::set("semester",$semester);
          Session::set("shift",$shift);
          Session::set("day",$day);
          echo "<script>window.location='show_routin_by_class.php'</script>";
        }
      }
  ?>



<!DOCTYPE html>
<html>
<head>
  <title>Search Class</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <link href="css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

</head>
<body>
<div class="header">
  <center><h1>Search By Class</h1>
</div>
<div class="container-fluid marginTop">
  <div class="row">
    <div class="col-xs-12 col-sm-7 col-md-6 col-sm-offset-2 col-md-offset-3">
      

<form class="form-horizontal" action="" method="POST">

  <p style="color:green;font-family: Times new Roman;font-size: 20px;">* Department</p>
    <select class="form-control" name="department">
    <option value="">Select One</option>
    <option value="computer">Computer</option>
    <option value="food">Food</option>
    <option value="aidt">AIDT</option>
    <option value="rac">RAC</option>
   </select>
              

  <p style="color:green;font-family: Times new Roman;font-size: 20px;">* Semester</p>
    <select class="form-control" name="semester">
    <option value="">Select One</option>
    <option value="first">First</option>
    <option value="second">Second</option>
    <option value="third">Third</option>
    <option value="fourth">Fourth</option>
    <option value="fifth">Fifth</option>
    <option value="sixth">Sixth</option>
     <option value="seventh">Seventh</option>
   </select>

     <p style="color:green;font-family: Times new Roman;font-size: 20px;">* Shift</p>
    <select class="form-control" name="shift">
    <option value="">Select One</option>
    <option value="first">First</option>
    <option value="second">Second</option>
   </select>


   



    <p style="color:green;font-family: Times new Roman;font-size: 20px;">* Day of Week</p>
    <select class="form-control" name="day">
    <option value="">Select One</option>
    <option value="Saturday">Saturday</option>
    <option value="sunday">Sunday</option>
    <option value="monday">Monday</option>
    <option value="tuesday">Tuesday</option>
    <option value="wednesday">Wednesday</option>
    <option value="thursday">Thursday</option>
   </select>
<br>
   <button type="submit" class="btn btn-success">Submit</button>
   <button type="reset" class="btn btn-default">Reset</button>
   <br>
   <br>
   <br>
</form>
<a href="search_routine.php"><button class="btn btn-default">Back</button></a>
    </div>
  </div>
</div>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php include 'inc/footer.php'; ?>