<div class="container-fluid">
<div class="row">
<div class=" col-sm-4 col-md-4 col-lg-3 ">
 <div class="menu_style">
  <ul>
  	<li><a href="index.php"><span class="glyphicon glyphicon-home ff" aria-hidden="true"></span>  Dashboard</a></li>
  	<?php if(Session::get("Role")=='0'){?>   
     <li><a href="adduser.php"><span class="glyphicon glyphicon-user ff" aria-hidden="true">
         
     </span> Add User</a></li>
     <?php } ?>

  	<li><a href="userlist.php"><span class="glyphicon glyphicon-list ff" aria-hidden="true"></span> User List</a></li>

  	<li><a href="showstudent.php"><span class="glyphicon glyphicon-search ff" aria-hidden="true"></span> Show Student</a></li>

  	<li>
     <a href="att_dept_seme_shift.php"><span class="glyphicon glyphicon-stats ff" aria-hidden="true"></span> Attendance</a></li>



  	<li><a href="class_routine.php"><span class="glyphicon glyphicon-open ff" aria-hidden="true"></span> Routine</a></li>

  	<li><a href="library.php"><span class="glyphicon glyphicon-book ff" aria-hidden="true"></span> Library</a></li>

  	

  	<li><a href="stu_reg.php"><span class="glyphicon glyphicon-education ff" aria-hidden="true"></span> Student Register</a></li>

  	<li><a href="insert_subject.php"><span class="glyphicon glyphicon-hand-right ff" aria-hidden="true"></span> Insert Subject</a></li>

    <li><a href="show_subject.php"><span class="glyphicon glyphicon-hand-right ff" aria-hidden="true"></span> Show Subject</a></li>

  	<li><a href="payment.php"><span class="glyphicon glyphicon-check ff" aria-hidden="true"></span> Payments</a></li>

     <li><a href="principal.php"><span class="glyphicon glyphicon-blackboard ff" aria-hidden="true"></span> Principal Information</a></li>

     <li><a href="teacher.php"><span class="glyphicon glyphicon-blackboard ff" aria-hidden="true"></span> Teachers</a></li>

  	<li><a href="employee.php"><span class="glyphicon glyphicon-ok ff" aria-hidden="true"></span> Employee</a></li>

  	<li><a href="result.php"><span class="glyphicon glyphicon-book ff" aria-hidden="true"></span>Result</a></li>

  	<li><a href="#"><span class="glyphicon glyphicon-object-align-left ff" aria-hidden="true"></span> Online Exams</a></li>

  	<li><a href="#"><span class="glyphicon glyphicon-bullhorn ff" aria-hidden="true"></span>  News Board</a></li>

  	<li><a href="#"><span class="glyphicon glyphicon-time ff" aria-hidden="true"></span> Events</a></li>

  	<li><a href="#"><span class="glyphicon glyphicon-hand-down ff" aria-hidden="true"></span> Payments</a></li>

  	<li><a href="#"><span class="glyphicon glyphicon-plane ff" aria-hidden="true"></span> Transportation</a></li>

  	<li><a href="#"><span class="glyphicon glyphicon-blackboard ff" aria-hidden="true"></span>  Classes</a></li>
  	<li><a href="#"><span class="glyphicon glyphicon-th ff" aria-hidden="true"></span> Subjects</a></li>
  	<li><a href="#"><span class="glyphicon glyphicon-tasks ff" aria-hidden="true"></span>  Atminitrative Tasks</a></li>
     
     
  	<li><a href="homepage.php?chk=Search"><span class="glyphicon glyphicon-tasks ff" aria-hidden="true"></span> Search Here</a></li>
  	
  </ul>

  </div>


</div>
<div class=" col-sm-8 col-md-8 col-lg-9">

            