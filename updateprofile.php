<?php
include "connection.php";

session_start();
if(isset($_POST["updatedata"]))
{
$userID=$_SESSION["loginID"];
$custname=$_POST["custoname"];
//$_SESSION["cus"]=$custname;
//echo $a;
$custemail=$_POST["custoemail"];
//$_SESSION["ce"]=$custemail;
//echo $b;
$custphone=$_POST["custophone"];
//$_SESSION["cp"]=$custphone;
//echo $c;



$updata="UPDATE tbl_userdetails SET userName='$custname',userEmail='$custemail', userPhone='$custphone' WHERE userID='$userID'";

try
{
    if($conn->query($updata)===true);
   
    //echo "Profile Updated";
}
catch(Exception)
{
    echo "ERROR";
}         
        } 


?>



//
<script>
        function updatedata()
        {
            <?php
            $newvalue="SELECT userName,userEmail,userPhone FROM tbl_userdetails WHERE userID='$userID'";
            $res=$conn->query($sel);
            $row = $res -> fetch_array(MYSQLI_ASSOC);
            echo $row["userID"], $row["userName"],$row["userEmail"],$row["userPhone"];

            $_SESSION["loginID"]=$row["userID"];
            $_SESSION["userName"]=$row["userName"];
            $_SESSION["userEmail"]=$row["userEmail"];
            $_SESSION["userPhone"]=$row["userPhone"];

            $upname=$_SESSION["userName"];
            $upemail=$_SESSION["userEmail"];
            $upphone=$_SESSION["userPhone"];

            ?>
            document.getElementById("uname").value=<?php $upname?>;
            document.getElementById("email").value=<?php $upemail?>
            document.getElementById("uname").value=<?php $upphone?>
        }




</script>