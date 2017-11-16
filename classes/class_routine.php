
<?php 

	/**
	* class for class  routine
	*/
	class Routine 
	{
		 private $db;
		 private $fm;


		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function RoutineInsert($data){

			$class_priode      = mysqli_real_escape_string($this->db->link, $data['class_priode']);
		    $teacher_name	   = mysqli_real_escape_string($this->db->link, $data['teach_name']);
		    $semester          = mysqli_real_escape_string($this->db->link, $data['semester']);
		    $shift             = mysqli_real_escape_string($this->db->link, $data['shift']);
		    $subject_name      = mysqli_real_escape_string($this->db->link, $data['subject_name']);
		    $subject_type      = mysqli_real_escape_string($this->db->link, $data['subject_type']);
		    $department        = mysqli_real_escape_string($this->db->link, $data['department']);
		    $day_of_week               = mysqli_real_escape_string($this->db->link, $data['day']);


		    if(empty($class_priode) or empty($teacher_name) or empty($semester) or empty($shift) or empty($subject_name) or empty($subject_type) or empty($department) or empty($day_of_week))
			 {
			 	$msg = "<script>alert('field must not be empty.......!');</script>";
			 	return $msg;
			 }else{ 

			 	$selquery = "SELECT * FROM class_routine WHERE class_priode='$class_priode' AND semester='$semester' AND  shift='$shift' AND  subject_name= '$subject_name' AND department='$department' AND day_of_week='$day_of_week'";

			 	 $chkRoutine = $this->db->select($selquery);
			 	if ($chkRoutine) {
			 		$msg = "<script>alert('Already Inserted');</script>";
			 		return $msg;
			 	} else{



			 	$query = "INSERT INTO class_routine (`class_priode`,`teacher_name`,`semester`,`shift`,`subject_name`,`subject_type`,`department`,`day_of_week`) VALUES('$class_priode','$teacher_name','$semester','$shift','$subject_name','$subject_type','$department','$day_of_week')";
			   $result = $this->db->insert($query);
			 	if($result)
			 	{
			 		$msg = "<script>alert('Class Routin insert successful');</script>";
			 		return $msg;
			 	}
			 	else
			 	{
			 		$msg = "<script>alert('error class routin insert failed.......!');</script>";
			 		return $msg;
			 	}
			   }
			 }

		}


		public function SelectTeacher(){
			$query = "SELECT * FROM teacher ";
			$result = $this->db->select($query);
			if ($result) {
				return $result;
			} else{
				return false();
			}
		}

		public function routinShow($techName,$day){
			$query="SELECT * FROM class_routine WHERE teacher_name='$techName' AND  day_of_week='$day'";
			$data=$this->db->select($query);
			if($data){
				return $data;
			}
		}
		public function routinshowclass($department,$semester,$shift,$day){
			$query="SELECT * FROM class_routine WHERE department='$department' AND  semester='$semester' AND shift ='$shift' AND  day_of_week='$day'";
			$data=$this->db->select($query);
			if($data){
				return $data;
			}
		}
  }		