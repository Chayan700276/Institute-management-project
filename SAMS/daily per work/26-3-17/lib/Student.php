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



 }

 ?>