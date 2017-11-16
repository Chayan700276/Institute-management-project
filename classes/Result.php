<?php 
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
?>

<?php 
class Result
{

	private $db;
	private $fm;

	
	public function __construct()
	{	
	 	$this->db=new Database();
	 	$this->fm=new Format();

	}
	

public function Show_result_Subject($get_dept,$get_semester){
  $query = "SELECT * FROM tbl_subject WHERE dept='$get_dept' AND semester='$get_semester'";
	$getData=$this->db->select($query);
	return $getData;	
}
public function Result_Roll_show($dept,$semester,$shift){
	
	$query="SELECT * FROM tbl_student WHERE dept='$dept' AND semester='$semester'  AND shift='$shift'";
	$getData=$this->db->select($query);
	return $getData;
}

public function ResultInsertall($roll,$tc,$tf,$pc,$pf,$dept,$semester,$shift,$subjectName,$subjectCode){
	      $totalall=$tc+$tf+$pc+$pf;

  if($tc>60 || $tf> 90 || $pc>25 || $pf>25){
      echo '<p>Mark Not Insert in roll '.$roll.'</p>';
  }

  else if($tc+$tf<60 || $pc<10 || $pf<10)
 {

   $letter='F';
   $gp='0.00';
}
    
else{


if($totalall>=160)
{
     $letter='A+';
     $gp='4.00';

}
  else if($totalall>=150)
{
  $letter='A';
  $gp=3.75;
}
  else if($totalall>=140)
{
  $letter='A-';
  $gp=3.50;
}
  else if($totalall>=130)
{
  $letter='B+';
  $gp=3.25;
}
  else if($totalall>=120)
{
  $letter='B';
  $gp=3.00;
}
  else if($totalall>=110)
{
  $letter='B-';
  $gp=2.75;
}
  else if($totalall>=100)
{
  $letter='C+';
  $gp=2.50;
}
  else if($totalall>=90)
{
  $letter='C';
  $gp=2.25;
}
  else if($totalall>=80)
{
  $letter='D';
  $gp=2.00;
}
  else if($totalall<80)
{
  $letter='F';
  $gp=0.00;
}
 }

$query="INSERT INTO `tbl_result`(`roll`,`dept`,`semester`,`shift`,`sub_name`,`sub_code`,`tc`,`tf`,`pc`,`pf`,`total`,`gpa`,`letter`,`cgpa`)
VALUES('$roll','$dept','$semester','$shift','$subjectName','$subjectCode','$tc','$tf','$pc','$pf','$totalall','$gp','$letter','$cgpa')";
$resultinsert=$this->db->insert($query);
if ($resultinsert) {
	$msg="Successfull";
	return $msg;
}
else{ 
$msg="Unsuccessful";
return $msg;
}



}


public function ResultInserttp($roll,$tc,$tf,$pc,$dept,$semester,$shift,$subjectName,$subjectCode){
	      $totaltp=$tc+$tf+$pc;

  if($tc>60 || $tf> 90 || $pc>50){
      echo '<p>Mark Not Insert in roll '.$roll.'</p>';
  }

  else if($tc+$tf<60 || $pc<20)
 {

   $math_1_letter='F';
   $math_1_gp='0.00';
}
    
else{


if($totaltp>=160)
{
     $letter='A+';
     $gp='4.00';

}
  else if($totaltp>=150)
{
  $letter='A';
  $gp=3.75;
}
  else if($totaltp>=140)
{
  $letter='A-';
  $gp=3.50;
}
  else if($totaltp>=130)
{
  $letter='B+';
  $gp=3.25;
}
  else if($totaltp>=120)
{
  $letter='B';
  $gp=3.00;
}
  else if($totaltp>=110)
{
  $letter='B-';
  $gp=2.75;
}
  else if($totaltp>=100)
{
  $letter='C+';
  $gp=2.50;
}
  else if($totaltp>=90)
{
  $letter='C';
  $gp=2.25;
}
  else if($totaltp>=80)
{
  $letter='D';
  $gp=2.00;
}
  else if($totaltp<80)
{
  $letter='F';
  $gp=0.00;
}
 }





}



public function ResultInsertt($roll,$tc,$tf,$dept,$semester,$shift,$subjectName,$subjectCode){

	    $totalt=$tc+$tf;

    if($tc> 40 || $tf> 60){
        echo '<p>Mark Not Insert in roll '.$roll.'</p>';
    }
else{
  
  if ($totalt>=80) {
    $letter='A+';
    $gp='4.00';
  }
  elseif ($totalt<80 && $totalt>=75) {
    $letter="A";
    $gp='3.75';
  }

    elseif ($totalt<75 && $totalt>=70) {
    $letter="A-";
    $gp='3.50';
  }
    elseif ($totalt<70 && $totalt>=65) {
    $letter="B+";
    $gp='3.25';
  }
    elseif ($totalt<65 && $totalt>=60) {
    $letter="B";
    $gp='3.00';
  }
    elseif ($totalt<60 && $totalt>=55) {
    $letter="B-";
    $gp='2.75';
  }
    elseif ($totalt<55 && $totalt>=50) {
    $letter="C+";
    $gp='2.50';
  }
    elseif ($totalt<50 && $totalt>=45) {
    $letter="C";
    $gp='2.25';
  }
    elseif ($totalt<45 && $totalt>=40) {
    $letter="D";
    $gp='2.00';
  }
    elseif ($totalt<40) {
    $letter="F";
    $gp='0.00';
  }
$query="INSERT INTO `tbl_result`(`roll`,`dept`,`semester`,`shift`,`sub_name`,`sub_code`,`tc`,`tf`,`total`,`gpa`,`letter`,`cgpa`)
VALUES('$roll','$dept','$semester','$shift','$subjectName','$subjectCode','$tc','$tf','$totalt','$gp','$letter','$cgpa')";
$resultinsert=$this->insert($query);
if ($resultinsert) {
	$msg="Successfull";
	return $msg;
}
else{ 
$msg="Unsuccessful";
return $msg;
}

}
}

public function ResultInsertp($roll,$pc,$pf,$dept,$semester,$shift,$subjectName,$subjectCode){

	$totalp=$pc+$pf;

    if($pc> 50 || $pf> 50){
        echo '<p>Mark Not Insert in roll '.$roll.'</p>';
    }
else{
  
  if ($totalp>=80) {
    $letter='A+';
    $gp='4.00';
  }
  elseif ($totalp<80 && $totalp>=75) {
    $letter="A";
    $gp='3.75';
  }

    elseif ($totalp<75 && $totalp>=70) {
    $letter="A-";
    $gp='3.50';
  }
    elseif ($totalp<70 && $totalp>=65) {
    $letter="B+";
    $gp='3.25';
  }
    elseif ($totalp<65 && $totalp>=60) {
    $letter="B";
    $gp='3.00';
  }
    elseif ($totalp<60 && $totalp>=55) {
    $letter="B-";
    $gp='2.75';
  }
    elseif ($totalp<55 && $totalp>=50) {
    $letter="C+";
    $gp='2.50';
  }
    elseif ($totalp<50 && $totalp>=45) {
    $letter="C";
    $gp='2.25';
  }
    elseif ($totalp<45 && $totalp>=40) {
    $letter="D";
    $gp='2.00';
  }
    elseif ($totalp<40) {
    $letter="F";
    $gp='0.00';
  }

}
}


}
 ?>