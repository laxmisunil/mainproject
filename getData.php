<?php

include 'connection.php';

$searchText = $_POST['speechText'];

// search query
$query = 'SELECT * FROM tbl_productdetails WHERE productName like "%'.$searchText.'%" or productSubname like "%'.$searchText.'%" or productCategory like "%'.$searchText.'%"';

$result = mysqli_query($conn,$query);

$html = '';
if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_array($result)){
    $id = $row['productID'];
    $title = $row['productName'];
    $content = $row['productSubname'];
   
    // Creating HTML structure
    $html .= '<div id="post_'.$id.'" class="post">';
    $html .= '<h1>'.$title.'</h1>';
    $html .= '<p>'.$content.'</p>';

    $html .= '</div>';

  }
}else{
  $html .= '<div >';
  $html .= '<p>No Record Found.</p>';
  $html .= '</div>';
}

echo $html;
exit;