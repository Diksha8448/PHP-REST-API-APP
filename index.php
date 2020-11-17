<form action="" method="POST">
<label>Enter Employee ID:</label><br />
<input type="text" name="Employee_Id" placeholder="Enter Employee ID" required/>
<br /><br />
<button type="submit" name="submit">Submit</button>
</form>

<?php
if (isset($_POST['Employee_Id']) && $_POST['Employee_Id']!="") {
 $Employee_Id = $_POST['Employee_Id'];
 $url = "http://localhost/EMPLOYEE-API-APP/api.php?Employee_Id=".$Employee_Id;
 
 $client = curl_init($url);
 curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
 $response = curl_exec($client);
 
 $result = json_decode($response);
 
 echo "<table>";
 echo "<tr><td>Employee ID:</td><td>$result->Employee_Id</td></tr>";
 echo "<tr><td>Name:</td><td>$result->Name</td></tr>";
 echo "<tr><td>Age:</td><td>$result->Age</td></tr>";
 echo "<tr><td>Email:</td><td>$result->Email</td></tr>";
 echo "</table>";
}
?>