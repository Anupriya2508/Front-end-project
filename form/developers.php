<?php
include("database.php");

extract($_POST);
if(isset($save)){

$inputData = [
'fullName' => validate($fullName) ?? "",
'gender'   => validate($gender) ?? "",
'email'    => validate($email) ?? "",
'mobile'   => validate($mobile) ?? "",
'address'  => validate($address) ?? "",
'city'     => validate($city) ?? "",
'state'    => validate($state)?? ""
];

$tableName= "developers";
$db = $conn;
$result= insert_data($db, $tableName, $inputData);
    
$columns= ['id', 'fullName','gender','email','mobile', 'address','city','state'];
$fetchData = fetch_data($db, $tableName, $columns);
}
function fetch_data($db, $tableName, $columns){
 if(empty($db)){
  $msg= "Database connection error";
 }elseif (empty($columns) || !is_array($columns)) {
  $msg="columns Name must be defined in an indexed array";
 }elseif(empty($tableName)){
   $msg= "Table Name is empty";
}else{
$columnName = implode(", ", $columns);
$query = "SELECT ".$columnName." FROM $tableName"." ORDER BY id DESC";
$result = $db->query($query);
if($result== true){ 
 if ($result->num_rows > 0) {
    $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
    $msg= $row;
 } else {
    $msg= "No Data Found"; 
 }
}else{
  $msg= mysqli_error($db);
}
}
return $msg;
}
function insert_data($db, $tableName, $inputData){

 $data = implode(" ",$inputData);
if(empty($db)){
 $msg= "Database connection error";
}elseif(empty($tableName)){
  $msg= "Table Name is empty";
}elseif(trim( $data ) == ""){
  $msg= "Empty Data not allowed to insert";
}else{

    $query  = "INSERT INTO ".$tableName." (";
    $query .= implode(",", array_keys($inputData)) . ') VALUES (';
    $query .= "'" . implode("','", array_values($inputData)) . "')";
    $execute= $db->query($query);
   if($execute=== true){
  $msg= "Data was inserted successfully";
 }else{
  $msg= mysqli_error($db);
 }
}
 return $msg;

}

function validate($value) {
  $value = trim($value);
  $value = stripslashes($value);
  $value = htmlspecialchars($value);
  return $value;
}

?>