<?php
    include "connection.php";
    session_start();
    if(isset($_POST["logdata"]))
{
    
            $emailid=$_POST["email"];
            $_SESSION["y"]=$emailid;

            $passwordd=$_POST["password"];
            $_SESSION["z"]=$passwordd;

            
        
            if($_SERVER["REQUEST_METHOD"]=="POST")
            {

                $sel="SELECT * from tbl_customerregistration where customerEmail='".$emailid."' AND customerPassword='".$passwordd."'";
                $res=$conn->query($sel);
                if($res !== false && $res->num_rows > 0)
    
                {
                    header("location:homepage.php");
                }
                else
                {
                    echo '<script language="javascript">';
                    echo 'alert("Access Denied. Invalid USERNAME/PASSWORD")';
                    echo '</script>';
                    exit();
                 }
            }
        }
        $conn->close();

?>