
<?php 

	/**
	* 
	*/
	class Principal
	{
		 private $db;
		 private $fm;


		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function AddPrincipal($data,$file){
			$principal_name    = mysqli_real_escape_string($this->db->link, $data['principal_name']);
			$p_gmail           = mysqli_real_escape_string($this->db->link, $data['p_gmail']);
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



		    if($principal_name =="" || $p_gmail =="" || $joining_date =="" || $designation =="" || $date_of_birth =="" ||$file_name=="")
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

			 	$selquery ="SELECT * FROM `principal` WHERE date_of_birth = '$date_of_birth' AND principal_name='$principal_name' AND designation ='$designation'";
			 	 $chkteach = $this->db->select($selquery);

			 	 if($chkteach)
			 	 {
			 	 	$msg = "<span style='color:red;font-size:20px'>Principal`s data already exist!</span>";
		    		return $msg;
			 	 }
			 	 else{
		    	move_uploaded_file($file_temp, $uploaded_image);
		    	$query ="INSERT INTO `principal`(`principal_name`,`p_gmail`,`joining_date`,`designation`,`date_of_birth`,`image`)
		    	  
		    	  VALUES 

		    	('$principal_name','$p_gmail','$joining_date','$designation','$date_of_birth','$uploaded_image')";	
		 
		    	$Insert = $this->db->insert($query);
		    	


		    	if($Insert){
		    		$msg = "<span style='color:green;font-size:20px'>Principal data Inserted  succesfully</span>";
		    		return $msg;
		    	}else{
		    		$msg = "<span style='color:red;font-size:20px'>error.. Principal  insert failed</span>";
		    		return $msg;
		    	}
		    }
		 } 
			 
			  }

		


		public function getAllPrincipalByRunning(){
			$query="SELECT * FROM principal WHERE status='Running'";
			$data=$this->db->select($query);
			if($data){
				return $data;
			}
		}
		public function getAllPrincipalByTrans(){
			$query="SELECT * FROM principal WHERE status='Transfered'";
			$data=$this->db->select($query);
			if($data){
				return $data;
			}
		}
		public function getAllPrincipalByRetired(){
			$query="SELECT * FROM principal WHERE status='Retired'";
			$data=$this->db->select($query);
			if($data){
				return $data;
			}
		}

		public function PrincipalById($pid){
			$query="SELECT * FROM principal WHERE id='$pid'";
			$data=$this->db->select($query);
			if($data){
				return $data;
			}
		}


		public function UpdatePrincipal($data,$file){
			$principal_name      = mysqli_real_escape_string($this->db->link, $data['principal_name']);
			$p_gmail           = mysqli_real_escape_string($this->db->link, $data['p_gmail']);
			$joining_date      = mysqli_real_escape_string($this->db->link, $data['joining_date']);
			$designation        = mysqli_real_escape_string($this->db->link, $data['designation']); 
			$date_of_birth     = mysqli_real_escape_string($this->db->link, $data['date_of_birth']);
			$status           = mysqli_real_escape_string($this->db->link, $data['status']);

            $id               = mysqli_real_escape_string($this->db->link, $data['id']);

			$file_name = $_FILES['image']['name'];  
		    $file_size = $_FILES['image']['size'];
		    $file_temp = $_FILES['image']['tmp_name'];
		    $permited  = array('jpg', 'jpeg', 'png', 'gif');

		    $div = explode('.', $file_name);
		    $file_ext = strtolower(end($div));
		    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
		    $uploaded_image = "upload/".$unique_image;




             if($principal_name =="" || $p_gmail =="" || $joining_date =="" || $designation =="" || $date_of_birth =="")
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


                     	 if ($status=='Transfered') {
                     	 	$transfered_date  = mysqli_real_escape_string($this->db->link, $data['transfered_date']);
		                      if(empty($transfered_date)) {
				        	    	$msg = "<span style='color:red;font-size:20px'> Transfered date must not be empty</span>";
						           return $msg;
				        	    }else{

                     	move_uploaded_file($file_temp, $uploaded_image);
                        $query ="UPDATE `principal`
                                    SET
                                `principal_name` = '$principal_name',
                                `p_gmail`   = '$p_gmail',
                                `joining_date` = '$joining_date',
                                `designation`  = '$designation',
                                `date_of_birth`= '$date_of_birth',
                                `transfered_date` = '$transfered_date',
                                `status`       = '$status',
                                `image`        = '$uploaded_image'

                                WHERE `id`='$id'
                        ";

                        $Insert = $this->db->update($query);
                        if($Insert){
                            $msg = "<span class='success'>Principal's information Updated succesfully</span>";
                            return $msg;
                        }else{
                            $msg =  "<span class='error'>error..  Update failed</span>";
                            return $msg;
                        }
                     }
                 }elseif ($status=='Retired') {
                 	    $retired_date = mysqli_real_escape_string($this->db->link, $data['retired_date']);
		                      if(empty($retired_date)) {
		        	    	$msg = "<span style='color:red;font-size:20px'> Retired date must not be empty</span>";
				           return $msg;
		        	    }else{


                     	move_uploaded_file($file_temp, $uploaded_image);
                        $query ="UPDATE `principal`
                                    SET
                                `principal_name` = '$principal_name',
                                `p_gmail`   = '$p_gmail',
                                `joining_date` = '$joining_date',
                                `designation`  = '$designation',
                                `date_of_birth`= '$date_of_birth',
                                `retired_date` = '$retired_date',
                                `status`       = '$status',
                                `image`        = '$uploaded_image'

                                WHERE `id`='$id'
                        ";

                        $Insert = $this->db->update($query);
                        if($Insert){
                            $msg = "<span class='success'>Principal's information Updated succesfully</span>";
                            return $msg;
                        }else{
                            $msg =  "<span class='error'>error..  Update failed</span>";
                            return $msg;
                        }
                     }
                 } else{


                     	move_uploaded_file($file_temp, $uploaded_image);
                        $query ="UPDATE `principal`
                                    SET
                                `principal_name` = '$principal_name',
                                `p_gmail`   = '$p_gmail',
                                `joining_date` = '$joining_date',
                                `designation`  = '$designation',
                                `date_of_birth`= '$date_of_birth',
                                `status`       = '$status',
                                `image`        = '$uploaded_image'

                                WHERE `id`='$id'
                        ";

                        $Insert = $this->db->update($query);
                        if($Insert){
                            $msg = "<span class='success'>Principal's information Updated succesfully</span>";
                            return $msg;
                        }else{
                            $msg =  "<span class='error'>error..  Update failed</span>";
                            return $msg;
                        }
                 }





                     }
		        }elseif($status=='Transfered'){

		        	$transfered_date  = mysqli_real_escape_string($this->db->link, $data['transfered_date']);
		        	    if(empty($transfered_date)) {
		        	    	$msg = "<span style='color:red;font-size:20px'> Transfered date must not be empty</span>";
				           return $msg;
		        	    }else{
                           
                           $query ="UPDATE `principal`
                                    SET
                                `principal_name`  = '$principal_name',
                                `p_gmail`    = '$p_gmail',
                                `joining_date`  = '$joining_date',
                                `designation`   = '$designation',
                                `date_of_birth` = '$date_of_birth',
                                `transfered_date` = '$transfered_date',
                                 `status`       = '$status'

                                WHERE `id`='$id'
                        ";    
                        $Insert = $this->db->update($query);
                        if($Insert){
                            $msg = "<span class='success'>Principal's information Updated succesfully</span>";
                            return $msg;
                        }else{
                            $msg = "<span class='error'>error..  Update failed</span>";
                            return $msg;
                        }
                    }    

                    }elseif($status=='Retired'){
                      	$retired_date = mysqli_real_escape_string($this->db->link, $data['retired_date']);
                          
		        	    if(empty($retired_date)) {
		        	    	$msg = "<span style='color:red;font-size:20px'> Retired date must not be empty</span>";
				           return $msg;
		        	    }else{
                           
                           $query ="UPDATE `principal`
                                    SET
                                `principal_name`  = '$principal_name',
                                `p_gmail`    = '$p_gmail',
                                `joining_date`  = '$joining_date',
                                `designation`   = '$designation',
                                `date_of_birth` = '$date_of_birth',
                                `retired_date` = '$retired_date',
                                 `status`       = '$status'

                                WHERE `id`='$id'
                        ";    
                        $Insert = $this->db->update($query);
                        if($Insert){
                            $msg = "<span class='success'>Principal's information Updated succesfully</span>";
                            return $msg;
                        }else{
                            $msg =  "<span class='error'>error..  Update failed</span>";
                            return $msg;
                        }
                    }    

                    }else{
                           
                           $query ="UPDATE `principal`
                                    SET
                                `principal_name`  = '$principal_name',
                                `p_gmail`    = '$p_gmail',
                                `joining_date`  = '$joining_date',
                                `designation`   = '$designation',
                                `date_of_birth` = '$date_of_birth',
                                 `status`       = '$status'

                                WHERE `id`='$id'
                        ";    
                        $Insert = $this->db->update($query);
                        if($Insert){
                            $msg = "<span class='success'>Principal's information Updated succesfully</span>";
                            return $msg;
                        }else{
                            $msg =  "<span class='error'>error..  Update failed</span>";
                            return $msg;
                        }   

                    }



		}


/*
		public function UpdateRunningPrincipal($data,$file){
			$principal_name      = mysqli_real_escape_string($this->db->link, $data['principal_name']);
			$p_gmail           = mysqli_real_escape_string($this->db->link, $data['p_gmail']);
			$joining_date      = mysqli_real_escape_string($this->db->link, $data['joining_date']);
			$designation        = mysqli_real_escape_string($this->db->link, $data['designation']); 
			$date_of_birth     = mysqli_real_escape_string($this->db->link, $data['date_of_birth']);
			$status           = mysqli_real_escape_string($this->db->link, $data['status']);

            $id               = mysqli_real_escape_string($this->db->link, $data['id']);

			$file_name = $_FILES['image']['name'];  
		    $file_size = $_FILES['image']['size'];
		    $file_temp = $_FILES['image']['tmp_name'];
		    $permited  = array('jpg', 'jpeg', 'png', 'gif');

		    $div = explode('.', $file_name);
		    $file_ext = strtolower(end($div));
		    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
		    $uploaded_image = "upload/".$unique_image;




             if($principal_name =="" || $p_gmail =="" || $joining_date =="" || $designation =="" || $date_of_birth =="")
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
                        $query ="UPDATE `principal`
                                    SET
                                `principal_name` = '$principal_name',
                                `p_gmail`   = '$p_gmail',
                                `joining_date` = '$joining_date',
                                `designation`  = '$designation',
                                `date_of_birth`= '$date_of_birth',
                                `transfered_date` = '$transfered_date',
                                `status`       = '$status',
                                `image`        = '$uploaded_image'

                                WHERE `id`='$id'
                        ";

                        $Insert = $this->db->update($query);
                        if($Insert){
                            $msg = "<span class='success'>Principal's information Updated succesfully</span>";
                            return $msg;
                        }else{
                            $msg =  "<span class='error'>error..  Update failed</span>";
                            return $msg;
                        }
                     }
 
                     }else{
                           
                           $query ="UPDATE `principal`
                                    SET
                                `principal_name`  = '$principal_name',
                                `p_gmail`    = '$p_gmail',
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

*/


		public function TeachersByID($tech_id){
			$query = "SELECT * FROM teacher WHERE teacher_id=$tech_id";
			$result = $this->db->select($query);
			if ($result) {
				return $result;
			}
		}




	}






 ?>
