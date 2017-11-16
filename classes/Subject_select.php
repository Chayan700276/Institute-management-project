<?php 
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
?>

<?php 
class Subject_select
{

	private $db;
	private $fm;

	
	public function __construct()
	{	
	 	$this->db=new Database();
	 	$this->fm=new Format();

	}
	
	public function Sub_Select($semester,$dept){
		//$semester = Session::get("semester");
		
		$query = "SELECT * FROM tbl_subject WHERE semester='$semester' AND dept='$dept'";
		$getData=$this->db->select($query);
		return $getData;	

	}

public function Insert_Subject($dept, $semester,$sub_name,$sub_code){

if($dept=="" || $semester=="" ||$sub_name=="" || $sub_code=="")
{
	$msg="<span class='error'>Field Not Be  Empty...</span>";
	return $msg;
}
else{


$query="INSERT INTO tbl_subject(sub_name,sub_code,dept,semester)
         VALUES('$sub_name','$sub_code','$dept','$semester')";

  $insert_row=$this->db->insert($query);
  if($insert_row) {
  	$msg="<span class='success'>Insert Subject Successfully...</span>";
	return $msg;
  }else{
  	$msg="<span class='error'> Subject Not Insert ...</span>";
	return $msg;
  } 
    
}

}
public function Show_Subject($get_dept,$get_semester){
  $query = "SELECT * FROM tbl_subject WHERE dept='$get_dept' AND semester='$get_semester'";
	$getData=$this->db->select($query);
	return $getData;	
}
public function Edit_Subject($subid){
	  $query = "SELECT * FROM tbl_subject WHERE id='$subid'";
	$getData=$this->db->select($query);
	return $getData;
}
public function Update_Subject($sub_name,$sub_code,$dept,$semester,$subid){
	$query="UPDATE tbl_subject 
	SET 
	sub_name='$sub_name',
	sub_code='$sub_code',
	dept='$dept',
	semester='$semester'


	 WHERE id='$subid'";
	$update_data=$this->db->update($query);
	if($update_data) {
  	$msg="<span class='success'>Update Subject Successfully...</span>";
	return $msg;

   }else{
  	$msg="<span class='error'> Subject Not Update ...</span>";
	return $msg;
  } 

}
public function Delete_Subject($subid){
	$query="DELETE FROM tbl_subject WHERE id='$subid'";
	$deldata=$this->db->delete($query);
	if($deldata) {
  	$msg="<span class='success'> Subject Delete  Successfully...</span>";
	return $msg;

   }else{
  	$msg="<span class='error'> Subject Not Deleted ...</span>";
	return $msg;
  } 
}
}

 ?>