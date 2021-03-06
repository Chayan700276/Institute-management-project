<?php
include "Database.php";
 class Student{

  private $db;

 	public function __construct()
		{
			$this->db=new Database();

		}
  public function getStudent()
		{
			$query="SELECT *FROM tbl_student";
			$result=$this->db->select($query);

			return $result;

		}

   public function insertStudent($name,$roll){
		$name=mysqli_real_escape_string($this->db->link,$name);
		$roll=mysqli_real_escape_string($this->db->link,$roll);


		if(empty($name) or empty($roll))
        {
	 	$msg="<div class='alert alert-danger'><strong>Error !</strong>  Field Must Not Be Empty!</div>";
            return $msg;

		}
		else{
			$stu_query="INSERT INTO tbl_student(name,roll)VALUES('$name','$roll')";
			$stu_insert=$this->db->insert($stu_query);

			$att_query="INSERT INTO tbl_attend(roll)VALUES('$roll')";
			$stu_insert=$this->db->insert($att_query);



			if($stu_insert){
			 	$msg="<div class='alert alert-success'><strong> Insert Is Success..!</strong></div>";
              return $msg;
			}


			else{
			  $msg="<div class='alert alert-danger'><strong>Error !</strong>Not Inserted..!</div>";
              return $msg;
			}

		  }
	}



	public function insertAttendance($cur_date,$attend=array()){

		$query="SELECT DISTINCT att_time FROM tbl_attend";
		$getdata=$this->db->select($query);
		while ($result=$getdata->fetch_assoc()){

       $db_date=$result['att_time'];

       if($cur_date==$db_date){
       	$msg="<div class='alert alert-danger'><strong>Error !</strong>Attendance Already Taken..!</div>";
              return $msg;

           }

		}
	foreach ($attend as $atn_key => $atn_value) {

	 if($atn_value=="present"){

	 	$stu_query="INSERT INTO tbl_attend(roll,attend,att_time)VALUES('$atn_key','present',now())";
	 	$data_insert=$this->db->insert($stu_query);

	 }
	 elseif ($atn_value=="absent") {
	 	$stu_query="INSERT INTO tbl_attend(roll,attend,att_time)VALUES('$atn_key','absent',now())";
	 	$data_insert=$this->db->insert($stu_query);

	 }

	}
	if($data_insert){
	 	$msg="<div class='alert alert-success'><strong> Attendance Success..!</strong></div>";
      return $msg;
	}


	else{
	  $msg="<div class='alert alert-danger'><strong>Error !</strong>Attendance Not Inserted..!</div>";
      return $msg;
	}


	}



 }

 ?>
