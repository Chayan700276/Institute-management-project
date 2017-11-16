<?php
class Payment{
		 private $db;
		 private $fm;


		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function selectdue($Roll,$payment_type){
			$query="SELECT * FROM `student_payment` WHERE `roll`='$Roll' AND `due_type`='$payment_type' order by id desc limit 1";
			$data=$this->db->select($query);
			if($data){
				while ($result=$data->fetch_assoc()) {
					$due=$result['due_amount'];
				}
				return $due;
			}
		}

		public function insertpayment($Roll,$payment_type,$amaount,$due,$refardSub){
				$old_due=$due;
				$squery="SELECT * FROM `tbl_student` WHERE roll='$Roll'";
				$data=$this->db->select($squery);
				if($data){
					while ($result=$data->fetch_assoc()) {
						$semester=$result['semester'];
					}
					$semester=$semester;
				}

				
				//total payment amount select
				$tkquery="SELECT * FROM payment where semester='$semester'";
				$selectduedata=$this->db->select($tkquery);
				if($selectduedata){
					while ($amountresult=$selectduedata->fetch_assoc()) {
						$month_fee      =$amountresult['month_fee'];
						$exam_fee       =$amountresult['exam_fee'];
						$admission_fee  =$amountresult['admission_fee'];
						$refard_sub_fee =$amountresult['refard_sub_fee'];
					}
				}
				if($payment_type=='month_fee')
				{
					$right=$month_fee;
				$data=$month_fee+$old_due;
				}
				if($payment_type=='exam_fee')
				{
					
					if($refardSub>0)
					{
					$right=$exam_fee*$refard_sub_fee;
					$data=$exam_fee+$old_due+($refardSub*$refard_sub_fee);
					}else{
					$data=$exam_fee+$old_due;
					$right=$exam_fee;
				}
				}
				if($payment_type=='add_fee')
				{
					$right=$admission_fee;
					$data=$admission_fee+$old_due;
				}
				$due_amount=$data-$amaount;
				if($amaount<=$right){

			$query="INSERT INTO `student_payment`(`roll`,`semester`,`payment_type`,`payment_amount`,`due_amount`,`due_type`) VALUES ('$Roll','$semester','$payment_type','$amaount','$due_amount','$payment_type')";
			$insert=$this->db->insert($query);
			if($insert){
				$msg="<span style='color:green;font-size:20px'>Payment successfully</span>";
				return $msg;
			}
			else{
				$msg="<span style='color:red;font-size:20px'>Payment not successful...!</span>";
				return $msg;
			}
		}else {
			return "Please give Right amount";
		}
			
		}


		public function insertfine($Roll,$payment_type,$amaount,$due,$refardSub){

				$old_due=$due;
				$squery="SELECT * FROM `tbl_student` WHERE roll='$Roll'";
				$data=$this->db->select($squery);
				if($data){
					while ($result=$data->fetch_assoc()) {
						$semester=$result['semester'];
					}
					$semester=$semester;
				}



				
				//total payment amount select
				$tkquery="SELECT * FROM payment where semester='$semester'";
				$selectduedata=$this->db->select($tkquery);
				if($selectduedata){
					while ($amountresult=$selectduedata->fetch_assoc()) {
						$month_fee      =$amountresult['month_fee'];
						$exam_fee       =$amountresult['exam_fee'];
						$admission_fee  =$amountresult['admission_fee'];
						$refard_sub_fee =$amountresult['refard_sub_fee'];
					}
				}
				if($payment_type=='month_fee')
				{
					$right=$month_fee;
				$data=$month_fee+$old_due;
				}
				if($payment_type=='exam_fee')
				{
					$right=$exam_fee;
					if($refardSub>0)
					{
					$right=$exam_fee*$refard_sub_fee;
					$data=$exam_fee+$old_due+($refardSub*$refard_sub_fee);
					}else{
					$data=$exam_fee+$old_due;
					$right=$exam_fee;
				}
				}
				if($payment_type=='add_fee')
				{
					$right=$admission_fee;
					$data=$admission_fee+$old_due;
				}
				$due_amount=$data-$amaount;

				$pquery="SELECT * FROM `student_payment` WHERE roll='$Roll' AND `due_type`='$payment_type' AND semester='$semester'";
				$pdata=$this->db->select($pquery);
				if($pdata==false){
				$query="INSERT INTO `student_payment`(`roll`,`semester`,`payment_type`,`payment_amount`,`due_amount`,`due_type`) VALUES ('$Roll','$semester','$payment_type','$amaount','$due_amount','$payment_type')";
				$insert=$this->db->insert($query);
					}
				}
					




		public function paymentDue($Roll,$payment_type,$due,$refardSub,$amaount){
			$payment_type=$payment_type;
			$old_due=$due;
				$squery="SELECT * FROM `tbl_student` WHERE roll='$Roll'";
				$data=$this->db->select($squery);
				if($data){
					while ($result=$data->fetch_assoc()) {
						$semester=$result['semester'];
					}
					$semester=$semester;
				}

				
				//total payment amount select
				$tkquery="SELECT * FROM payment where semester='$semester'";
				$selectduedata=$this->db->select($tkquery);
				if($selectduedata){
					while ($amountresult=$selectduedata->fetch_assoc()) {
						$month_fee      =$amountresult['month_fee'];
						$exam_fee       =$amountresult['exam_fee'];
						$admission_fee  =$amountresult['admission_fee'];
						$refard_sub_fee =$amountresult['refard_sub_fee'];
					}
				}
				if($payment_type=='month_fee')
				{
				$data=$month_fee+$old_due;
				}
				if($payment_type=='exam_fee')
				{
					if($refardSub>0)
					{
					$data=$exam_fee+$old_due+($refardSub*$refard_sub_fee);
					}else{
					$data=$exam_fee+$old_due;
				}
				}
				if($payment_type=='add_fee')
				{
					$data=$admission_fee+$old_due;
				}
				$due_amount=$data-$amaount;
				$student="SELECT * FROM `tbl_student` WHERE roll='$Roll'";
					$data=$this->db->select($student);
					while($result=$data->fetch_assoc())
					{
						$name	  =$result['name'];
						$dept     =$result['dept'];
						$semester =$result['semester'];
						$shift    =$result['shift'];
					}
						$name	  =$name;
						$dept     =$dept;
						$semester =$semester;
						$shift    =$shift;

					$cheack="SELECT * FROM `payment_due_tbl` WHERE `roll`='$Roll' AND `due_type`='$payment_type' AND `semester`='$semester'";
					$chkdata=$this->db->select($cheack);
					
				if($chkdata){
						$update="UPDATE `payment_due_tbl` SET
						`due`='$due_amount' WHERE `roll`='$Roll' AND `due_type`='$payment_type'";
						$updatedata=$this->db->update($update);
						return $updatedata;
					
					}else{
					$duequery="INSERT INTO `payment_due_tbl`(`name`,`roll`,`dept`,`semester`,`shift`,`due_type`,`due`) VALUES('$name','$Roll','$dept','$semester','$shift','$payment_type','$due_amount')";
						$insertdata=$this->db->insert($duequery);
						return $duequery;
			}
			}
				

     public function StudentDeleteById($id){

     	 $query="SELECT * FROM `payment_due_tbl` where `id`=$id";
	    $data=$this->db->select($query);
		    if($data){
	    while ($result=$data->fetch_assoc()){
	    	$roll=$result['roll'];
	    	$due_type=$result['due_type'];
	    }
	    $roll=$roll;
	    $due_type=$due_type;
		} 
     	$Dquery = "DELETE FROM student_payment WHERE  roll = '$roll' AND due_type='$due_type'";
     	$Ddel = $this->db->delete($Dquery);

     	$query = "DELETE FROM payment_due_tbl WHERE  id = '$id'";
     	$del = $this->db->delete($query);
     	if($del){
                $msg = "<span class='success'>Data Delete succesfully</span>";
                return $msg;
            }else{
                $msg =  "<span class='error'>Error..  Delete failed</span>";
                return $msg;
            }
     }


     public function definePayment($exam,$month,$semester,$addmission,$refard){
     	$query="UPDATE `payment` SET 
     	`month_fee`='$month',
     	`exam_fee`='$exam',
     	`admission_fee`='$addmission',
     	`refard_sub_fee`='$refard' WHERE
     	`semester` = '$semester'";
     	$insertdata=$this->db->update($query);
     	if($insertdata){
     		$msg="<span style='color:green;font-size:20px'>Fee Define successful</span>";
     	}
     	else{
     		$msg="<span style='color:red;font-size:20px'>Faild...!</span>";
     	}
     	return $msg;
     }

}
?>