<?php 
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
?>

<?php 
class Student_Attend
{

	private $db;
	private $fm;

	
	public function __construct()
	{	
	 	$this->db=new Database();
	 	$this->fm=new Format();

	}

public function Get_Attend($dept,$semester,$shift){
	$query="SELECT * FROM tbl_student WHERE dept='$dept' AND semester='$semester'  AND shift='$shift'";
	$getData=$this->db->select($query);
	return $getData;
}

public function UpdateForShow($dateid,$subjectName,$shift){
$query="SELECT tbl_student . name, tbl_attend . *
   	 		FROM tbl_student
   	 		INNER JOIN tbl_attend
   	 		ON tbl_student . roll= tbl_attend. roll
   	 		WHERE att_time='$dateid' AND sub_name='$subjectName' AND shifts='$shift'";
   	 	$result=$this->db->select($query);
   	 	return $result;
}



	public function insertAttendance($dept,$semester,$shift ,$subjectName,$cur_date,$attend){
			$query="SELECT * FROM tbl_attend";
		$getdata=$this->db->select($query);
		
	foreach ($attend as $atn_key => $atn_value) {

	 if($atn_value=="present"){

	 	$stu_query="INSERT INTO 
	 	tbl_attend(dept,semester,shifts,sub_name,roll,attend,att_time)VALUES
	 	('$dept','$semester','$shift','$subjectName','$atn_key','present',now())";
	 	$data_insert=$this->db->insert($stu_query);

	 }
	 elseif ($atn_value=="absent") {
	 	$stu_query="INSERT INTO tbl_attend(dept,semester,shifts,sub_name,roll,attend,att_time)VALUES
	 	('$dept','$semester','$shift','$subjectName','$atn_key','absent',now())";
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

public function getDatelist(){
	 $query="SELECT DISTINCT att_time FROM tbl_attend";
	 $result=$this->db->select($query);
	 return $result;
}

public function CmtDateList($dateid){
	$query="SELECT * FROM tbl_attend WHERE att_time='$dateid'";
	 $result=$this->db->select($query);
	 return $result;
}

public function UpdateAttendance($attend,$dateid){

   	foreach ($attend as $atn_key => $atn_value) {

	 if($atn_value=="present"){
	 	$query="UPDATE tbl_attend

	 	 SET attend='present'

	 	 WHERE roll='". $atn_key."' AND att_time='".$dateid."'";
	 	 $data_update=$this->db->update($query);


	 }
	 elseif ($atn_value=="absent") {
	 	$query="UPDATE tbl_attend

	 	 SET attend='absent'

	 	 WHERE roll='". $atn_key."' AND att_time='".$dateid."'";
	 	 $data_update=$this->db->update($query);

	 }
	}
	if($data_update){
	 	$msg="<div class='alert alert-success'><strong> Attendance update Success..!</strong></div>";
      return $msg;
	}


	else{
	  $msg="<div class='alert alert-danger'><strong>Error !</strong>Attendance Not update Inserted..!</div>";
      return $msg;
	}
   }


}

 ?>