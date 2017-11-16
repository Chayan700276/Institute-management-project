<?php 
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
?>

<?php 
class Library
{

	private $db;
	private $fm;

	
	public function __construct()
	{	
	 	$this->db=new Database();
	 	$this->fm=new Format();

	}

	public function AddBook($data,$file){
	$b_name     = mysqli_real_escape_string($this->db->link, $data['b_name']);
	$b_type     = mysqli_real_escape_string($this->db->link, $data['b_type']);
	$w_name     = mysqli_real_escape_string($this->db->link, $data['w_name']);
	$price      = mysqli_real_escape_string($this->db->link, $data['price']);
	

    $permited = array('jpg','jpeg','png','gif','mp4'); // for pdf 'pdf'
      $file_name= $file['image']['name'];
      $file_size= $file['image']['size'];
      $file_temp= $file['image']['tmp_name'];

      $div = explode('.', $file_name);
      $file_ext = strtolower(end($div));
      $unique_image = substr(md5(time()), 0,10).'.'.$file_ext;
      $Uploaded_image ="upload/book_upload/.$unique_image";

      if( empty($b_name) or empty($b_type) or empty($w_name)  or empty($price) or empty($file_name)){

        $msg="<span class='error'>Feild Not Be Empty~!</span>";
	       return $msg;
      }else if($file_size>1048576){
        echo "<span class='error'>Image size should be 1MB</span>";
      }else if(in_array($file_ext, $permited)=== false ){
        echo "<span class='error'>You can upload only:-".implode(',', $permited)."</span>";
      }else {


      move_uploaded_file($file_temp, $Uploaded_image);

      $query ="INSERT INTO tbl_library(b_name,b_type,w_name,price,image) 
      VALUES('$b_name','$b_type','$w_name','$price','$Uploaded_image')";
      $inserted_rows = $this->db->insert($query);
      if($inserted_rows){
       echo "<script>window.location='book_type_select.php'</script>";
      }
      else{
      	echo $query;
      }
  }
	}

  public function BookSearch($book_select){
    $query ="SELECT * FROM tbl_library WHERE b_type = '$book_select'";
    $semesterStudent = $this->db->select($query);
    return $semesterStudent;
  }

  public function BookDelete($id){
    $query  = "SELECT * FROM tbl_library WHERE id = '$id'";
    $getData = $this->db->select($query);
    if ($getData) {
      while ($delImg = $getData->fetch_assoc()) {
        $dellink   = $delImg['image'];
        unlink($dellink);
      }
    }     
      $query = "DELETE FROM tbl_library WHERE  id = '$id'";
      $del = $this->db->delete($query);
      if($del){
            $msg = "<span class='success'>Book Delete succesfully</span>";
            return $msg;
        }else{
            $msg =  "<span class='error'>Error..  Delete failed</span>";
            return $msg;
        }
  }
public function Lib_Roll_Show($dept,$semester,$shift){
  
   $query ="SELECT * FROM tbl_student WHERE dept = '$dept' AND  semester = '$semester' AND  shift = '$shift'";
    $rollshow = $this->db->select($query);
    return $rollshow;

}
public function Lib_Roll_Name( $libid){

   $query ="SELECT * FROM tbl_student WHERE roll = '$libid'";
    $Lib_Roll_Name = $this->db->select($query);
    return $Lib_Roll_Name;

}

public function Lib_Sub_name($roll_f_id){
  $query ="SELECT * FROM tbl_libcard WHERE id = '$roll_f_id' ORDER BY id DESC";
    $lib_sub_name = $this->db->select($query);
    return $lib_sub_name;


}
  public function Library_Card_Insert($g_date,$book_name,$writter_name,$book_price,$s_name,$roll){

  $query="INSERT INTO tbl_libcard(s_name,roll,b_name,w_name,price,g_date)
         VALUES('$s_name','$roll','$book_name','$writter_name','$book_price','$g_date')";


  $insert_row=$this->db->insert($query);

  if($insert_row) {
  $msg="<span class='success'>Given Book Successfully..</span>";
  return $msg;
  }else{
   $msg="<span class='error'>Given Book Not Successfully..</span>";
  return $msg;
  }      
}

public function LibUsList($lib_us_id){
  $query="SELECT * FROM tbl_libcard
        WHERE roll='$lib_us_id'";
      $result=$this->db->select($query);
    
      return $result;
  }
public function Library_Card_Upadate($t_date,$roll_f_id){
   $query="UPDATE tbl_libcard 
  SET
  t_date='$t_date',
  lib_status='1'
 
   WHERE id='$roll_f_id'";
  $result=$this->db->update($query);
  if($result){
    echo "<script>window.location='library.php'</script>";
  }

}
  public function Lib_Search($lib_roll_search){
  $query="SELECT * FROM tbl_libcard WHERE roll='$lib_roll_search'";
  $data=$this->db->select($query);
   if (!$data) {
   echo "<script>alert('Roll Not Found');</script>";
   echo "<script>window.location='library.php'</script>";
   return $data;
   } else{
    return $data;
    }
  }   


}

 ?>