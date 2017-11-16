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



 }




 ?>