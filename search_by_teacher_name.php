<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<?php include 'classes/class_routine.php'; ?>
<?php 
  $rountine = new Routine();

   $selteacher = $rountine->SelectTeacher();
 ?>

 <?php 
      if ($_SERVER['REQUEST_METHOD']=='POST') {
        $techName = $_POST['teach_name'];
        $day = $_POST['day'];

        if(empty($techName)|| empty($day)){
          echo "<span style='color:red;font-size20px'>Field Must not be empty....!</span>";
        }else{
          Session::set("teacher",$techName);
          Session::set("day",$day);
          echo "<script>window.location='show_routin_by_teacher.php'</script>";
        }
      }
  ?>



<!DOCTYPE html>
<html>
<head>
  <title>Form validation</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <link href="css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

</head>
<body>
<div class="header">
  <center><h1>Search By Teacher Name</h1>
</div>
<div class="container-fluid marginTop">
  <div class="row">
    <div class="col-xs-12 col-sm-7 col-md-6 col-sm-offset-2 col-md-offset-3">
      

<form class="form-horizontal" action="" method="POST">

 
              

  <p style="color:green;font-family: Times new Roman;font-size: 20px;">* Select Teacher Name</p>
    <select class="form-control" name="teach_name">

    <option value="">Select One</option>
     <?php 
      if (isset($selteacher)) {  
            while ($result= $selteacher->fetch_assoc()) { ?>

    <option value="<?php echo $result['teacher_name'] ?>"><?php echo $result['teacher_name'] ?></option>

         <?php        }
         }
      else{
        echo "Data Empty";
      }
   ?>
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