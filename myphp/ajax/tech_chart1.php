<?php
include 'db.php';
$servername = "localhost";
$username = "root";
$password = "";

$ids = $_GET['ids'];
$u_id = json_decode($ids ,true);
// echo count($u_id);
$names = $_GET['names'];
$u_name = json_decode($names ,true);


// SELECT emp_name,
// 	   SUM(CASE WHEN ( edit = 'q1')  THEN 1 ELSE 0 END) as q1,
// 	   SUM(CASE WHEN (edit = 'q2')  THEN 1 ELSE 0 END) as q2,
//        SUM(CASE WHEN (edit = 'q3')  THEN 1 ELSE 0 END) as q3,
//        SUM(CASE WHEN (edit = 'q4')  THEN 1 ELSE 0 END) as q4,
//        SUM(CASE WHEN (  edit = 'q5')  THEN 1 ELSE 0 END) as q5,
//        SUM(CASE WHEN ( edit = 'q6')  THEN 1 ELSE 0 END) as q6,
//        SUM(CASE WHEN (edit = 'q7')  THEN 1 ELSE 0 END) as q7,
//        SUM(CASE WHEN (edit = 'q8')  THEN 1 ELSE 0 END) as q8,
//        SUM(CASE WHEN (edit = 'q9')  THEN 1 ELSE 0 END) as q9
// FROM workshop.new_table 
// where emp_id = 1 AND date between 5 and 6
//  union
//  SELECT emp_name,
// 	   SUM(CASE WHEN ( edit = 'q1')  THEN 1 ELSE 0 END) as q1,
// 	   SUM(CASE WHEN (edit = 'q2')  THEN 1 ELSE 0 END) as q2,
//        SUM(CASE WHEN (edit = 'q3')  THEN 1 ELSE 0 END) as q3,
//        SUM(CASE WHEN (edit = 'q4')  THEN 1 ELSE 0 END) as q4,
//        SUM(CASE WHEN (  edit = 'q5')  THEN 1 ELSE 0 END) as q5,
//        SUM(CASE WHEN ( edit = 'q6')  THEN 1 ELSE 0 END) as q6,
//        SUM(CASE WHEN (edit = 'q7')  THEN 1 ELSE 0 END) as q7,
//        SUM(CASE WHEN (edit = 'q8')  THEN 1 ELSE 0 END) as q8,
//        SUM(CASE WHEN (edit = 'q9')  THEN 1 ELSE 0 END) as q9
//  FROM workshop.new_table 
//  where emp_id = 2 AND date between 5 and 6;

$sql = "SELECT ";

for($i = 0; $i < count($u_id); $i++){
    
    $sql .= "
       SUM(CASE WHEN (emp_id = ".$u_id[$i]." AND edit = 'q1') THEN 1 ELSE 0 END) "."as"." e".$u_id[$i]."_q1,
	   SUM(CASE WHEN (emp_id = ".$u_id[$i]." AND edit = 'q2') THEN 1 ELSE 0 END) "."as"." e".$u_id[$i]."_q2,
       SUM(CASE WHEN (emp_id = ".$u_id[$i]." AND edit = 'q3') THEN 1 ELSE 0 END) "."as"." e".$u_id[$i]."_q3,
       SUM(CASE WHEN (emp_id = ".$u_id[$i]." AND edit = 'q4') THEN 1 ELSE 0 END) "."as"." e".$u_id[$i]."_q4,
       SUM(CASE WHEN (emp_id = ".$u_id[$i]." AND edit = 'q5') THEN 1 ELSE 0 END) "."as"." e".$u_id[$i]."_q5,
       SUM(CASE WHEN (emp_id = ".$u_id[$i]." AND edit = 'q6') THEN 1 ELSE 0 END) "."as"." e".$u_id[$i]."_q6,
       SUM(CASE WHEN (emp_id = ".$u_id[$i]." AND edit = 'q7') THEN 1 ELSE 0 END) "."as"." e".$u_id[$i]."_q7,
       SUM(CASE WHEN (emp_id = ".$u_id[$i]." AND edit = 'q8') THEN 1 ELSE 0 END) "."as"." e".$u_id[$i]."_q8,
       ";
       if($i == count($u_id)-1){
        $sql .=  "
            SUM(CASE WHEN (emp_id = ".$u_id[$i]." AND edit = 'q9') THEN 1 ELSE 0 END) "."as"." e".$u_id[$i]."_q9
            ";
       }else{
        $sql .=    "
            SUM(CASE WHEN (emp_id = ".$u_id[$i]." AND edit = 'q9') THEN 1 ELSE 0 END) "."as"." e".$u_id[$i]."_q9,
            ";
       }
         
}
$sql .= "FROM workshop.new_table WHERE date between 5 and 6;";
$result2 = MYSQL_GETDATA($servername, $username, $password,$sql);

$arr = array();
foreach($result2 as $rows){
    $arr = $rows;
}

$user = (object) array();

for($i = 0; $i < count($u_id); $i++){

}


echo json_encode($arr, true);