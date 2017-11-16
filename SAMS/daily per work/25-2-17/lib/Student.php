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


		if(empty($name) || empty($roll))
		{
			$msg="error";
			return $msg;

		}
		else
		{
			

			
		}
	}





 }




 ?>