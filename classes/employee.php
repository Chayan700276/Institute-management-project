
<?php 

	/**
	* class for student Registration
	*/
	class EMPLOYEE
	{
		 private $db;
		 private $fm;


		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function AddEmployee($data,$file){
			$employee_name    = mysqli_real_escape_string($this->db->link, $data['employee_name']);
			$employee_id        = mysqli_real_escape_string($this->db->link, $data['employee_id']);
			$joining_date      = mysqli_real_escape_string($this->db->link, $data['joining_date']);
			$designation       = mysqli_real_escape_string($this->db->link, $data['designation']);
			$date_of_birth    = mysqli_real_escape_string($this->db->link, $data['date_of_birth']);


			$file_name = $_FILES['image']['name'];
		    $file_size = $_FILES['image']['size'];
		    $file_temp = $_FILES['image']['tmp_name'];
		    $permited  = array('jpg', 'jpeg', 'png', 'gif');

		    $div = explode('.', $file_name);
		    $file_ext = strtolower(end($div));
		    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
		    $uploaded_image = "upload/".$unique_image;



		    if($employee_name =="" || $employee_id =="" || $joining_date =="" || $designation =="" || $date_of_birth =="")
		    {

		    	$msg = "<span style='color:red;font-size:20px'> Field must not be empty</span>";
				return $msg;


		    }
			elseif ($file_size >1048567) {
			     echo "<span style='color:red;font-size:20px'>Image Size should be less then 1MB!
			     </span>";
			 } elseif (in_array($file_ext, $permited) === false) {
			     echo "<span style='color:red;font-size:20px'>You can upload only:-"
			     .implode(', ', $permited)."</span>";
			 }else{

			 	$selquery ="SELECT * FROM `employee` WHERE employee_id = '$employee_id'";
			 	 $chk = $this->db->select($selquery);

			 	 if($chk)
			 	 {
			 	 	$msg = "<span style='color:red;font-size:20px'>Employee`s data already exist!</span>";
		    		return $msg;
			 	 }
			 	 else{
		    	move_uploaded_file($file_temp, $uploaded_image);
		    	$query ="INSERT INTO `employee`(`employee_id`,`employee_name`,`designation`,`joining_date`,`date_of_birth`,`image`)
		    	  
		    	  VALUES 

		    	('$employee_id','$employee_name','$designation','$joining_date','$date_of_birth','$uploaded_image')";	
		 
		    	$Insert = $this->db->insert($query);
		    	


		    	if($Insert){
		    		$msg = "<span style='color:lime;font-size:20px'>Employee`s data Inserted  succesfully</span>";
		    		return $msg;
		    	}else{
		    		$msg = "<span style='color:red;font-size:20px'>error.. employee`s dada  insert failed</span>";
		    		return $msg;
		    	}
		    }
		 } 
			 
			  }

		



		public function getAllEmployeeByRunning(){
			$query="SELECT * FROM employee WHERE status = 'running'";
			$data=$this->db->select($query);
			if($data){
				return $data;
			}
		}

		public function getAllEmployeeByTrans(){
			$query="SELECT * FROM employee WHERE status = 'transfered'";
			$data=$this->db->select($query);
			if($data){
				return $data;
			}
		}

		public function getAllEmployeeByRetired(){
			$query="SELECT * FROM employee WHERE status = 'retired'";
			$data=$this->db->select($query);
			if($data){
				return $data;
			}
		}

		public function EmployeeById($emid){
			$query="SELECT * FROM employee WHERE id='$emid'";
			$data=$this->db->select($query);
			if($data){
				return $data;
			}
		}


		public function UpdateEmployee($data,$file){
			$employee_name    = mysqli_real_escape_string($this->db->link, $data['employee_name']);
			$employee_id        = mysqli_real_escape_string($this->db->link, $data['employee_id']);
			$joining_date      = mysqli_real_escape_string($this->db->link, $data['joining_date']);
			$designation       = mysqli_real_escape_string($this->db->link, $data['designation']);
			$date_of_birth   = mysqli_real_escape_string($this->db->link, $data['date_of_birth']);
			$status   = mysqli_real_escape_string($this->db->link, $data['status']);

            $id     = mysqli_real_escape_string($this->db->link, $data['id']);

			$file_name = $_FILES['image']['name'];
		    $file_size = $_FILES['image']['size'];
		    $file_temp = $_FILES['image']['tmp_name'];
		    $permited  = array('jpg', 'jpeg', 'png', 'gif');

		    $div = explode('.', $file_name);
		    $file_ext = strtolower(end($div));
		    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
		    $uploaded_image = "upload/".$unique_image;



            $chkquery= "SELECT * FROM employee";
		    	 $chkTeacher = $this->db->select($chkquery)->fetch_assoc();
		    	if ($chkTeacher['employee_id']==$employee_id) {
		    		$msg = "<span style='color:red;font-size:20px'>Employee ID Already exist!</span>";
				    return $msg;	
                  }else{


             if($employee_name =="" || $employee_id =="" || $joining_date =="" || $designation =="" || $date_of_birth =="")
		              {

		    	$msg = "<span style='color:red;font-size:20px'> Field must not be empty</span>";
				return $msg;

		    }elseif(!empty($file_name)){
		    	if ($file_size >1048567) {
                         echo "<span class='error'>Image Size should be less then 1MB!
                         </span>";
                     } elseif (in_array($file_ext, $permited) == false) {
                         echo "<span class='error'>You can upload only:-"
                         .implode(', ', $permited)."</span>";
                     } else{

                     	move_uploaded_file($file_temp, $uploaded_image);
                        $query ="UPDATE `employee`
                                    SET
                                `employee_id`     = '$employee_id',
                                `employee_name`   = '$employee_name',
                                `designation`     = '$designation',
                                `joining_date`    = '$joining_date',
                                `date_of_birth`   = '$date_of_birth',
                                `status`          = '$status',
                                `image`           = '$uploaded_image'

                                WHERE `id`='$id'
                        ";

                        $Insert = $this->db->update($query);
                        if($Insert){
                            $msg = "<span class='success'>Employee's information Updated succesfully</span>";
                            return $msg;
                        }else{
                            $msg =  "<span class='error'>error..  Update failed</span>";
                            return $msg;
                        }
                     }
		        }else{
                           
                           $query ="UPDATE `employee`
                                    SET
                                `employee_id`     = '$employee_id',
                                `employee_name`   = '$employee_name',
                                `designation`     = '$designation',
                                `joining_date`    = '$joining_date',
                                `date_of_birth`   = '$date_of_birth',
                                `status`          = '$status'

                                WHERE `id`='$id'
                        ";    
                        $Insert = $this->db->update($query);
                        if($Insert){
                            $msg = "<span class='success'>Employee's information Updated succesfully</span>";
                            return $msg;
                        }else{
                            $msg =  "<span class='error'>error..  Update failed</span>";
                            return $msg;
                        }

                    }

                }





		}




	}






 ?>
