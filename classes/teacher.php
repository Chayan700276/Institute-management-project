
<?php 

	/**
	* class for student Registration
	*/
	class Teacher
	{
		 private $db;
		 private $fm;


		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function AddTeacher($data,$file){
			$teacher_name      = mysqli_real_escape_string($this->db->link, $data['teacher_name']);
			$department        = mysqli_real_escape_string($this->db->link, $data['department']);
			$teacher_id        = mysqli_real_escape_string($this->db->link, $data['teacher_id']);
			$joining_date      = mysqli_real_escape_string($this->db->link, $data['joining_date']);
			$designation       = mysqli_real_escape_string($this->db->link, $data['designation']);
			$date_of_birth     = mysqli_real_escape_string($this->db->link, $data['date_of_birth']);


			$file_name = $_FILES['image']['name'];
		    $file_size = $_FILES['image']['size'];
		    $file_temp = $_FILES['image']['tmp_name'];
		    $permited  = array('jpg', 'jpeg', 'png', 'gif');

		    $div = explode('.', $file_name);
		    $file_ext = strtolower(end($div));
		    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
		    $uploaded_image = "upload/".$unique_image;



		    if($teacher_name =="" || $department =="" || $teacher_id =="" || $joining_date =="" || $designation =="" || $date_of_birth =="")
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

			 	$selquery ="SELECT * FROM `teacher` WHERE teacher_id = '$teacher_id' AND teacher_name='$teacher_name' AND designation ='$designation'";
			 	 $chkteach = $this->db->select($selquery);

			 	 if($chkteach)
			 	 {
			 	 	$msg = "<span style='color:red;font-size:20px'>Teacher`s data already exist!</span>";
		    		return $msg;
			 	 }
			 	 else{
		    	move_uploaded_file($file_temp, $uploaded_image);
		    	$query ="INSERT INTO `teacher`(`teacher_name`,`department`,`teacher_id`,`joining_date`,`designation`,`date_of_birth`,`image`)
		    	  
		    	  VALUES 

		    	('$teacher_name','$department','$teacher_id','$joining_date','$designation','$date_of_birth','$uploaded_image')";	
		 
		    	$Insert = $this->db->insert($query);
		    	


		    	if($Insert){
		    		$msg = "<span style='color:green;font-size:20px'>Teacher data Inserted  succesfully</span>";
		    		return $msg;
		    	}else{
		    		$msg = "<span style='color:red;font-size:20px'>error.. teacher  insert failed</span>";
		    		return $msg;
		    	}
		    }
		 } 
			 
			  }

		


		public function TeacherByDept($dept){
			$query="SELECT * FROM teacher WHERE department='$dept' AND status='0'";
			$data=$this->db->select($query);
			if($data){
				return $data;
			}
		}
		public function TeacherByDeptTransfeared($dept){
			$query="SELECT * FROM teacher WHERE department='$dept' AND status='1'";
			$data=$this->db->select($query);
			if($data){
				return $data;
			}
		}
		public function TeacherByDeptResigned($dept){
			$query="SELECT * FROM teacher WHERE department='$dept' AND status='2'";
			$data=$this->db->select($query);
			if($data){
				return $data;
			}
		}

		public function TeacherById($techid){
			$query="SELECT * FROM teacher WHERE id='$techid'";
			$data=$this->db->select($query);
			if($data){
				return $data;
			}
		}


		public function UpdateTeacher($data,$file){
			$teacher_name      = mysqli_real_escape_string($this->db->link, $data['teacher_name']);
			$department        = mysqli_real_escape_string($this->db->link, $data['department']);
			$teacher_id        = mysqli_real_escape_string($this->db->link, $data['teacher_id']);
			$joining_date      = mysqli_real_escape_string($this->db->link, $data['joining_date']);
			$designation       = mysqli_real_escape_string($this->db->link, $data['designation']);
			$date_of_birth    = mysqli_real_escape_string($this->db->link, $data['date_of_birth']);
			$status          = mysqli_real_escape_string($this->db->link, $data['status']);

            $id     = mysqli_real_escape_string($this->db->link, $data['id']);

			$file_name = $_FILES['image']['name'];
		    $file_size = $_FILES['image']['size'];
		    $file_temp = $_FILES['image']['tmp_name'];
		    $permited  = array('jpg', 'jpeg', 'png', 'gif');

		    $div = explode('.', $file_name);
		    $file_ext = strtolower(end($div));
		    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
		    $uploaded_image = "upload/".$unique_image;




             if($teacher_name =="" || $department =="" || $teacher_id =="" || $joining_date =="" || $designation =="" || $date_of_birth =="")
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
                        $query ="UPDATE `teacher`
                                    SET
                                `teacher_name` = '$teacher_name',
                                `department`   = '$department',
                                `teacher_id`   = '$teacher_id',
                                `joining_date` = '$joining_date',
                                `designation`  = '$designation',
                                `date_of_birth`= '$date_of_birth',
                                `status`       = '$status',
                                `image`        = '$uploaded_image'

                                WHERE `id`='$id'
                        ";

                        $Insert = $this->db->update($query);
                        if($Insert){
                            $msg = "<span class='success'>Teacher's information Updated succesfully</span>";
                            return $msg;
                        }else{
                            $msg =  "<span class='error'>error..  Update failed</span>";
                            return $msg;
                        }
                     }
		        }else{
                           
                           $query ="UPDATE `teacher`
                                    SET
                                `teacher_name`  = '$teacher_name',
                                `department`    = '$department',
                                `teacher_id`    = '$teacher_id',
                                `joining_date`  = '$joining_date',
                                `designation`   = '$designation',
                                `date_of_birth` = '$date_of_birth',
                                 `status`       = '$status'

                                WHERE `id`='$id'
                        ";    
                        $Insert = $this->db->update($query);
                        if($Insert){
                            $msg = "<span class='success'>Teacher's information Updated succesfully</span>";
                            return $msg;
                        }else{
                            $msg =  "<span class='error'>error..  Update failed</span>";
                            return $msg;
                        }

                    }


		}


		public function TeachersByID($tech_id){
			$query = "SELECT * FROM teacher WHERE teacher_id=$tech_id";
			$result = $this->db->select($query);
			if ($result) {
				return $result;
			}
		}




	}






 ?>
