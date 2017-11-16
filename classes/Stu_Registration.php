
<?php 

	/**
	* class for student Registration
	*/
	class Student 
	{
		 private $db;
		 private $fm;


		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function StudentRegistration($data,$file){
			$name = mysqli_real_escape_string($this->db->link, $data['name']);
			$roll       = mysqli_real_escape_string($this->db->link, $data['roll']);
			$reg      = mysqli_real_escape_string($this->db->link, $data['reg']);
			$dept       = mysqli_real_escape_string($this->db->link, $data['dept']);
			$semester        = mysqli_real_escape_string($this->db->link, $data['semester']);
			$shift        = mysqli_real_escape_string($this->db->link, $data['shift']);
			$f_name        = mysqli_real_escape_string($this->db->link, $data['f_name']);
			$m_name       = mysqli_real_escape_string($this->db->link, $data['m_name']);
			$birth_date      = mysqli_real_escape_string($this->db->link, $data['birth']);
			$pre_vill       = mysqli_real_escape_string($this->db->link, $data['pre_vill']);
			$pre_post        = mysqli_real_escape_string($this->db->link, $data['pre_post']);
			$pre_thana        = mysqli_real_escape_string($this->db->link, $data['pre_thana']);
			$pre_dist       = mysqli_real_escape_string($this->db->link, $data['pre_dist']);
			$par_vill      = mysqli_real_escape_string($this->db->link, $data['par_vill']);
			$par_post       = mysqli_real_escape_string($this->db->link, $data['par_post']);
			$par_thana        = mysqli_real_escape_string($this->db->link, $data['par_thana']);
			$par_dist        = mysqli_real_escape_string($this->db->link, $data['par_dist']);
			$religion        = mysqli_real_escape_string($this->db->link, $data['religion']);
			$phone       = mysqli_real_escape_string($this->db->link, $data['phone']);
			$session       = mysqli_real_escape_string($this->db->link, $data['session']);
			$email      = mysqli_real_escape_string($this->db->link, $data['email']);



			$file_name = $_FILES['image']['name'];
		    $file_size = $_FILES['image']['size'];
		    $file_temp = $_FILES['image']['tmp_name'];
		    $permited  = array('jpg', 'jpeg', 'png', 'gif');

		    $div = explode('.', $file_name);
		    $file_ext = strtolower(end($div));
		    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
		    $uploaded_image = "upload/".$unique_image;



		    if($name =="" || $roll =="" || $reg =="" || $dept =="" || $semester =="" || $shift =="" || $f_name =="" || $m_name =="" || $birth_date =="" || $pre_vill =="" || $pre_post =="" || $pre_thana =="" || $pre_dist =="" || $par_vill =="" || $par_post =="" || $par_thana =="" || $par_dist =="" || $religion =="" || $phone ==""||$session=="")
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

			 	$selquery ="SELECT * FROM `tbl_student` WHERE roll = $roll OR reg=$reg";
			 	 $chkroll = $this->db->select($selquery);

			 	 if($chkroll)
			 	 {
			 	 	$msg = "<span style='color:red;font-size:20px'>Roll/Reg No already exist!</span>";
		    		return $msg;
			 	 }
			 	 else{
		    	move_uploaded_file($file_temp, $uploaded_image);
		    	$query ="INSERT INTO `tbl_student`(`name`,`roll`,`reg`,`dept`,`semester`,`shift`,`f_name`,`m_name`,`birth_date`,`pre_vill`,`pre_post`,`pre_thana`,`pre_dist`,`par_vill`,`par_post`,`par_thana`,`par_dist`,`religion`,`phone`,`session`,`email`,`image` )
		    	  
		    	  VALUES 

		    	('$name','$roll','$reg','$dept','$semester','$shift','$f_name','$m_name','$birth_date','$pre_vill','$pre_post','$pre_thana','$pre_dist','$par_vill','$par_post','$par_thana','$par_dist','$religion','$phone','$session','$email','$uploaded_image')";	
		 
		    	$Insert = $this->db->insert($query);
		    	


		    	if($Insert){
		    		$msg = "<span style='color:green;font-size:20px'>Student data Inserted  succesfully</span>";
		    		return $msg;
		    	}else{
		    		$msg = "<span style='color:red;font-size:20px'>error..  insert failed</span>";
		    		return $msg;
		    	}
		    }
		 } 
			 
			  }

		



		public function indevisualSearch($roll){
			$query="SELECT * FROM tbl_student WHERE roll='$roll'";
			$data=$this->db->select($query);
			if($data){
				return $data;
			}
		}


		public function StudentUpdate($data,$file){
			$name = mysqli_real_escape_string($this->db->link, $data['name']);
			$roll       = mysqli_real_escape_string($this->db->link, $data['roll']);
			$reg      = mysqli_real_escape_string($this->db->link, $data['reg']);
			$dept       = mysqli_real_escape_string($this->db->link, $data['dept']);
			$semester        = mysqli_real_escape_string($this->db->link, $data['semester']);
			$shift        = mysqli_real_escape_string($this->db->link, $data['shift']);
			$f_name        = mysqli_real_escape_string($this->db->link, $data['f_name']);
			$m_name       = mysqli_real_escape_string($this->db->link, $data['m_name']);
			$birth_date      = mysqli_real_escape_string($this->db->link, $data['birth']);
			$pre_vill       = mysqli_real_escape_string($this->db->link, $data['pre_vill']);
			$pre_post        = mysqli_real_escape_string($this->db->link, $data['pre_post']);
			$pre_thana        = mysqli_real_escape_string($this->db->link, $data['pre_thana']);
			$pre_dist       = mysqli_real_escape_string($this->db->link, $data['pre_dist']);
			$par_vill      = mysqli_real_escape_string($this->db->link, $data['par_vill']);
			$par_post       = mysqli_real_escape_string($this->db->link, $data['par_post']);
			$par_thana        = mysqli_real_escape_string($this->db->link, $data['par_thana']);
			$par_dist        = mysqli_real_escape_string($this->db->link, $data['par_dist']);
			$religion        = mysqli_real_escape_string($this->db->link, $data['religion']);
			$phone       = mysqli_real_escape_string($this->db->link, $data['phone']);
			$session       = mysqli_real_escape_string($this->db->link, $data['session']);
			$email      = mysqli_real_escape_string($this->db->link, $data['email']);

			$Sid = mysqli_real_escape_string($this->db->link, $data['Sid']);



			$file_name = $_FILES['image']['name'];
		    $file_size = $_FILES['image']['size'];
		    $file_temp = $_FILES['image']['tmp_name'];
		    $permited  = array('jpg', 'jpeg', 'png', 'gif');

		    $div = explode('.', $file_name);
		    $file_ext = strtolower(end($div));
		    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
		    $uploaded_image = "upload/".$unique_image;


             if($name =="" || $roll =="" || $reg =="" || $dept =="" || $semester =="" || $shift =="" || $f_name =="" || $m_name =="" || $birth_date =="" || $pre_vill =="" || $pre_post =="" || $pre_thana =="" || $pre_dist =="" || $par_vill =="" || $par_post =="" || $par_thana =="" || $par_dist =="" || $religion =="" || $phone ==""||$session=="")
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
                        $query ="UPDATE `tbl_student`
                                    SET
                                `name`       = '$name',
                                `roll`       = '$roll',
                                `reg`        = '$reg',
                                `dept`       = '$dept',
                                `semester`   = '$semester',
                                `shift`      = '$shift',
                                `f_name`     = '$f_name',
                                `m_name`     = '$m_name',
                                `birth_date` = '$birth_date',
                                `pre_vill`   = '$pre_vill',
                                `pre_post`   = '$pre_post',
                                `pre_thana`  = '$pre_thana',
                                `pre_dist`   = '$pre_dist',
                                `par_vill`   = '$par_vill',
                                `par_post`   = '$par_post',
                                `par_thana`  = '$par_thana',
                                `par_dist`   = '$par_dist',
                                `religion`   = '$religion',
                                `phone`      = '$phone',
                                `session`    = '$session',
                                `email`      = '$email',
                                `image`      = '$uploaded_image'

                                WHERE `id`='$Sid'
                        ";

                        $Insert = $this->db->update($query);
                        if($Insert){
                            $msg = "<span class='success'>Student information Updated succesfully</span>";
                            return $msg;
                        }else{
                            $msg =  "<span class='error'>error..  Update failed</span>";
                            return $msg;
                        }
                     }
		        }else{
                           
                           $query ="UPDATE `tbl_student`
                                    SET
                                `name`       = '$name',
                                `roll`       = '$roll',
                                `reg`        = '$reg',
                                `dept`       = '$dept',
                                `semester`   = '$semester',
                                `shift`      = '$shift',
                                `f_name`     = '$f_name',
                                `m_name`     = '$m_name',
                                `birth_date` = '$birth_date',
                                `pre_vill`   = '$pre_vill',
                                `pre_post`   = '$pre_post',
                                `pre_thana`  = '$pre_thana',
                                `pre_dist`   = '$pre_dist',
                                `par_vill`   = '$par_vill',
                                `par_post`   = '$par_post',
                                `par_thana`  = '$par_thana',
                                `par_dist`   = '$par_dist',
                                `religion`   = '$religion',
                                `phone`      = '$phone',
                                `session`    = '$session',
                                `email`      = '$email'

                                WHERE `id`='$Sid'
                        ";    
                        $Insert = $this->db->update($query);
                        if($Insert){
                            $msg = "<span class='success'>Student information Updated succesfully</span>";
                            return $msg;
                        }else{
                            $msg =  "<span class='error'>error..  Update failed</span>";
                            return $msg;
                        }

                    }





		}


     public function StudentDeleteById($roll){
     	$query  = "SELECT * FROM tbl_student WHERE roll = '$roll'";
		$getData = $this->db->select($query);
		if ($getData) {
			while ($delImg = $getData->fetch_assoc()) {
				$dellink   = $delImg['image'];
				unlink($dellink);
			}
		}    	
     	$query = "DELETE FROM tbl_student WHERE  roll = $roll";
     	$del = $this->db->delete($query);
     	if($del){
                $msg = "<span class='success'>Student information Delete succesfully</span>";
                return $msg;
            }else{
                $msg =  "<span class='error'>Error..  Delete failed</span>";
                return $msg;
            }
     }


					public function semesterSearch($dept,$semester,$shift){
							$selquery ="SELECT * FROM `tbl_student` WHERE dept = '$dept' AND semester='$semester' AND shift='$shift'";
					 	 		$semesterStudent = $this->db->select($selquery);
					 	 		if ($semesterStudent) {
					 	 	 	return $semesterStudent;
					 	 }
					 	
					}
			
     
			public function studentDetailsbyid($id){
				$query="SELECT * FROM tbl_student WHERE id=$id";
				$data=$this->db->select($query);
				if($data){
				return $data;
			}
			}


	}






 ?>
