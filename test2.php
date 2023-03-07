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
                
                    $sel="SELECT * from tbl_userdetails where userEmail='".$emailid."' AND userPassword='".$passwordd."'";
                    $res=$conn->query($sel);
                    $row = $res -> fetch_array(MYSQLI_ASSOC);
                    echo $row["userID"], $row["userName"],$row["userEmail"],$row["userPhone"];
                    

                    
                     header("location:homepage.php");
                    
                    
                }
                $_SESSION["loginID"]=$row["userID"];
                $_SESSION["userName"]=$row["userName"];
                $_SESSION["userEmail"]=$row["userEmail"];
                $_SESSION["userPhone"]=$row["userPhone"];
            }        
    
    $conn->close();
?>