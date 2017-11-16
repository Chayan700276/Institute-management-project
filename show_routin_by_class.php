 <?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/class_routine.php'; ?>
<?php 
    $reg = new Routine();
   
 ?>
 <?php
           
         $department= Session::get("teacher");
         $semester  = Session::get("semester");
         $shift     = Session::get("shift");
         $day       = Session::get("day");
      $routindata=$reg->routinshowclass($department,$semester,$shift,$day);
      if($routindata){
 ?>  
      <div class="tech_name">
        <div class="title">Department :</div><div class="Well_msg"><?php echo $department ?> </div>
      </div>
       <div class="tech">
      <div class="titl">Semester:</div><div class="Well"><?php echo $semester ?></div>
       </div>
       <div class="tech">
      <div class="titl">Shift:</div><div class="Well"><?php echo $shift ?></div>
       </div>
       <div class="tech">
      <div class="titl">Class Routine of</div><div class="Well"><?php echo $day ?></div>
       </div>
<table border="1">
  <tr>
    <th class="depth">Teacher's name</th>
    <th class="subh">Subject_Name</th>
    <th class="prih">Priode</th>
  </tr>
   <?php
      
      while ($result=$routindata->fetch_assoc()) {
    ?>
    <tr>
    <td><?php echo $result['teacher_name'];?></td>
    <td><?php echo $result['subject_name'];?></td>
    <td><?php echo $result['class_priode'];?></td>
  </tr>
  <?php }?>
</table>

<?php } else{
    echo "<span style='color:red;font-size20px'>No Data found..!</span>";
  }?>
<?php include 'inc/footer.php'; ?>

<style type="text/css">
  
 .Well_msg{
color: red;
font-family: times new roman;
font-size: 50px;
font-style: italic;
text-shadow: 9px 2px 6px black;
width: 30%;
float: left;
} 
.title{
 color: green;
font-family: times new roman;
font-size: 50px;
font-style: italic;
text-shadow: 9px 2px 6px grey;
width: 38%;
margin-left: 10%;
float: left;
}

 .Well{
color: #1779B8;
font-family: times new roman;
font-size: 30px;
font-style: italic;
text-shadow: 9px 2px 6px black;
width: 50%;
float: left;
} 
.titl{
 color: green;
font-family: times new roman;
font-size: 30px;
font-style: italic;
text-shadow: 9px 2px 6px grey;
width: 25%;
margin-left: 22%;
float: left;
}

.tech_name{
  width: 100%;
}
.tech{
  width: 100%;
}
.depth{
  width:20%;
  color: green;
  font-family: times new roman;
  font-size: 25px;
  font-style: italic;
  text-shadow: 9px 2px 6px grey;
  text-align: center;
}
.semh{
  width:20%;
  color: green;
  font-family: times new roman;
  font-size: 25px;
  font-style: italic;
  text-shadow: 9px 2px 6px grey;
  text-align: center;
}
.shifth{
  width: 15%;
  color: green;
  font-family: times new roman;
  font-size: 25px;
  font-style: italic;
  text-shadow: 9px 2px 6px grey;
  text-align: center;
}
.subh{
  width:38%;
  color: green;
  font-family: times new roman;
  font-size: 25px;
  font-style: italic;
  text-shadow: 9px 2px 6px grey;
  text-align: center;
}
.prih{
  width:25%;
  color: green;
  font-family: times new roman;
  font-size: 25px;
  font-style: italic;
  text-shadow: 9px 2px 6px grey;
  text-align: center;
}
td{
  font-family: time new roman;
  font-size: 20px;
  color:red;
  font-style: italic;
  text-shadow: 9px 2px 6px grey;
  text-align: center;

}

</style>