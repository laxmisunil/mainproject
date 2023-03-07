<?php
include "connection.php";

session_start();
if($_SESSION["loginStatus"])
{
if ($_SESSION["loginStatus"]==1)
{

$vetid=$_GET["vetID"];

$vetphone=$_POST["vetphone"];
?>
<script>
alert(<?php echo $vetid ?>);
</script>

<?php


if(isset($_POST["updatevet"]))
{
$updatevet="UPDATE tbl_userdetails SET userPhone='$vetphone' WHERE userID=$vetid";
try
{
    if($conn->query($updatevet)===true)
    {
       header("location:vaccinecentredetails.php?status1=1");
    }

    else
    {
        echo mysqli_error($conn);
    }
   

}
catch(Exception)
{
    echo "ERROR";
}         
}
}
else
{
    header("location:login.php");
}
}
else
{
    header("location:login.php");
}   



?>



