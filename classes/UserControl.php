<?php 
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
?>

<?php 
class UserControl
{

	private $db;
	private $fm;

	
	public function __construct()
	{	
	 	$this->db=new Database();
	 	$this->fm=new Format();

	}
	
public function AddUser($data){

$username    =$this->fm->validation($data['username']);
$email       =$this->fm->validation($data['email']);
$password    =$this->fm->validation($data['password']);
$status      =$this->fm->validation($data['status']);

$username    = mysqli_real_escape_string($this->db->link,$username);
$email       = mysqli_real_escape_string($this->db->link,$email);
$password    = mysqli_real_escape_string($this->db->link,$password);
$status      = mysqli_real_escape_string($this->db->link,$status);

if($username=="" || $email=="" || $password=="" || $status==""){
	$msg="<span class='error'>Field Not Be Empty</span>";
	return $msg;

}else{
		$chk_query="SELECT * FROM tbl_user WHERE  email='$email'";
		$chk_result=$this->db->select($chk_query);
		if($chk_result !=false){
		   $msg="<span class='error'>E-mail Already Used~!</span>";
	       return $msg;
	     	
		}
else{

	$password=md5($password);
	 $query="INSERT INTO tbl_user(username,email,password,status)
         VALUES('$username','$email','$password','$status')";
  $insert_row=$this->db->insert($query);
  if($insert_row) {
  $msg="<span class='success'>AddUser Succesfullyy..</span>";
	return $msg;
  }else{
  	echo $query;
  }      
}

}
}
public function getAllUserData(){
	$query="SELECT * FROM tbl_user";
	$getData=$this->db->select($query);
	return $getData;
}
public function getUserValue($userid){
	$query="SELECT * FROM tbl_user WHERE id='$userid'";
	$getData=$this->db->select($query);
	return $getData;
}
public function UserUpdate($username, $email,$userid){
	$query="UPDATE tbl_user
	SET 
	username='$username',
	email='$email'
    WHERE id='$userid'";
    $update_row=$this->db->update($query);
    if($update_row){
    $msg="<span class='success'>Profile Update Succesfully..</span>";
	return $msg;
    }
    else{
    $msg="<span class='error'>Profile Not Updated..</span>";
	return $msg;	
    }

}

public function UserDelete($udelid){
	$query="DELETE FROM tbl_user WHERE id='$udelid'";
	$deldata=$this->db->delete($query);
	return $deldata;
}
}
 ?>