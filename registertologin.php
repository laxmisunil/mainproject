<?php
include "connection.php";
if(isset($_POST["submitdata"]))
{
$custname=$_POST["cusname"];
$_SESSION["cus"]=$custname;
//echo $a;
$custemail=$_POST["cusemail"];
//$_SESSION["ce"]=$custemail;
//echo $b;
$custphone=$_POST["cusphone"];
//$_SESSION["cp"]=$custphone;
//echo $c;
$custpassword=$_POST["cuspassword"];
$encryptedpassword= md5($custpassword);
//$_SESSION["cpa"]=$custpassword;

$sel="SELECT * FROM tbl_userdetails WHERE (userEmail='$custemail' OR userPhone='$custphone') AND userStatus!=2";
if($result=$conn->query($sel))
{
    if($result->num_rows>0)
    {
        header("location:login.php?status=3");
    }
    else
    {

 



$data="INSERT INTO tbl_userdetails VALUES (NULL,'$custname','$custemail','$custphone','Customer','$encryptedpassword',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL)";
try
{
    //header("location:login.php");
    if($conn->query($data)===true)
    {
        header("location:login.php?status=2");
    }
    else
    {
        echo mysqli_error($conn);
    }
   
   

    //echo "<br>ACCOUNT CREATED SUCCESSFULLY!";
}
catch(Exception)
{
    echo mysqli_error($conn);
    //echo "ERROR";
    //header("location:register.php?status=0");?>
    
<?php
}         
        }  
      }
    }
    ?>