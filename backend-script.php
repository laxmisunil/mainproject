<?php

include "connection.php";

$searchTerm = $_GET['term'];
$sql = "SELECT * FROM tbl_productdetails WHERE productName LIKE '$searchTerm%' GROUP BY productName"; 
$result = $conn->query($sql); 
if ($result->num_rows > 0) {
  $tutorialData = array(); 
  while($row = $result->fetch_assoc()) {

   $data['id']    = $row['productID']; 
   $data['value'] = $row['productName'];
   array_push($tutorialData, $data);
} 
}
 echo json_encode($tutorialData);
?>