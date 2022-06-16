<?php
include 'db.php';
$servername = "localhost";
$username = "root";
$password = "";

$sql = "SELECT distinct(emp_id), emp_name FROM workshop.new_table WHERE date between 5 and 6;";
$result = MYSQL_GETDATA($servername, $username, $password,$sql);

$id = array();
$name = array();

foreach($result as $rows){
  array_push($id, $rows['emp_id']);
  array_push($name, $rows['emp_name']);
}

$obj = (object) array('id'=>$id, 'name'=>$name);

echo json_encode($obj);

?>