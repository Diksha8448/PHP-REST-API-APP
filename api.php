<?php
header("Content-Type:application/json");
if (isset($_GET['Employee_Id']) && $_GET['Employee_Id']!="") {
 include('db.php');
 $Employee_Id = $_GET['Employee_Id'];
 $result = mysqli_query(
 $con,
 "SELECT * FROM `data` WHERE Employee_Id=$Employee_Id");
 if(mysqli_num_rows($result)>0){
 $row = mysqli_fetch_array($result);
 $Name = $row['Name'];
 $Age = $row['Age'];
 $Email = $row['Email'];
 response($Employee_Id, $Name, $Age,$Email);
 mysqli_close($con);
 }else{
 response(NULL, NULL, 200,"No Record Found");
 }
}else{
 response(NULL, NULL, 400,"Invalid Request");
 }
 
function response($Employee_Id,$Name,$Age,$Email){
 $response['Employee_Id'] = $Employee_Id;
 $response['Name'] = $Name;
 $response['Age'] = $Age;
 $response['Email'] = $Email;
 
 $json_response = json_encode($response);
 echo $json_response;
}
?>