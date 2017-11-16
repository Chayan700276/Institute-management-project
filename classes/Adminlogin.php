<?php 
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Session.php');
	
	Session::checkLogin();
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
?>

<?php 
class Adminlogin
{

	private $db;
	private $fm;

	
	public function __construct()
	{	
	 	$this->db=new Database();
	 	$this->fm=new Format();

	}
	public function AdminLoginData($email,$password){

	$email        = $this->fm->validation($email);
	$password     = $this->fm->validation($password);


	$email    = mysqli_real_escape_string($this->db->link,$email);
	$password = mysqli_real_escape_string($this->db->link,md5($password));


	if(empty($email) or empty($password)){
		$loginmsg="Email And Password Not Be Empty..!";
		return $loginmsg;

	}else{
		$query="SELECT * FROM tbl_user WHERE email='$email ' AND password='$password'";
		$result=$this->db->select($query);
		if($result!=false){
			$value=$result->fetch_assoc();

			Session::set("adminlogin",true);
			Session::set("userId",$value['id']);
			Session::set("userName",$value['username']);
			Session::set("Email",$value['email']);
			Session::set("pass",$value['password']);
			Session::set("Role",$value['status']);

		
			header("Location:index.php");
		}
		else{
			$loginmsg="User Password Not Matched..!";
		return $loginmsg;
		}
	}
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
	$msg="Field Not Be Empty";
	return $msg;

}else{
 $query="INSERT INTO tbl_user(username,email,password,status)
         VALUES('$username','$email','$password','$status')";
  $insert_row=$this->db->insert($query);
  if($insert_row) {
  	$msg="Add User Successfully...";
	return $msg;
  }else{
  	echo $query;
  }      


}

}


}
 ?>