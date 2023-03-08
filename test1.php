<?php
    include "connection.php";
    session_start();
    if(isset($_POST["logdata"]))
    {
            $emailid=$_POST["email"];
            $_SESSION["y"]=$emailid;

            $passwordd=$_POST["password"];
            $encryptedpassword=md5($passwordd);
            $_SESSION["z"]=$encryptedpassword;

           

            if($_SERVER["REQUEST_METHOD"]=="POST")
            {
                if($emailid=="adminpawsown@gmail.com" AND $encryptedpassword=="82819567b9ad4e8c5212f49f67743616")
                {
                    $sel="SELECT * from tbl_userdetails where userRole='Admin' AND userStatus=1";
                    $res=$conn->query($sel);
                    if($res !== false && $res->num_rows > 0)
                    {
                        $row = $res -> fetch_array(MYSQLI_ASSOC);
                        echo $row["userID"], $row["userName"],$row["userEmail"],$row["userPhone"];
                        header("location:adminhome.php");
                        $_SESSION["loginID"]=$row["userID"];
                        $_SESSION["loginStatus"]=1;
                        $_SESSION["userName"]=$row["userName"];
                        $_SESSION["userEmail"]=$row["userEmail"];
                        $_SESSION["userPhone"]=$row["userPhone"];
                    }
                    else 
                    {
                       
                        header("location:login.php?status=1");
                    }
                      
                }
                else if($emailid=="vetpawsown@gmail.com" AND $encryptedpassword=="77019fd1f105b427506353ba1993a73e")
                {
                    $sel="SELECT * from tbl_userdetails where userRole='Veterinarian' AND userStatus=1";
                    $res=$conn->query($sel);
                    if($res !== false && $res->num_rows > 0)
                    {
                        $row = $res -> fetch_array(MYSQLI_ASSOC);
                        echo $row["userID"], $row["userName"],$row["userEmail"],$row["userPhone"];
                        header("location:vethome.php");
                        
                        $_SESSION["loginID"]=$row["userID"];
                        $_SESSION["loginStatus"]=2;
                        $_SESSION["userName"]=$row["userName"];
                        $_SESSION["userEmail"]=$row["userEmail"];
                        $_SESSION["userPhone"]=$row["userPhone"];
                    }
                    else 
                    {
                       
                        header("location:login.php?status=1");
                       
                        
                        exit();
                    }
                }
                else if($emailid=="vaccinecentrepawsown@gmail.com" AND $encryptedpassword=="efd1538b79947ff2c40ff9ed346a72d2")
                {
                    $sel="SELECT * from tbl_userdetails where userRole='VaccineCentre' AND userStatus=1";
                    $res=$conn->query($sel);
                    if($res !== false && $res->num_rows > 0)
                    {
                        $row = $res -> fetch_array(MYSQLI_ASSOC);
                        echo $row["userID"], $row["userName"],$row["userEmail"],$row["userPhone"];
                        header("location:vaccinecentrehome.php");
                        
                        $_SESSION["loginID"]=$row["userID"];
                        $_SESSION["loginStatus"]=4;
                        $_SESSION["userName"]=$row["userName"];
                        $_SESSION["userEmail"]=$row["userEmail"];
                        $_SESSION["userPhone"]=$row["userPhone"];
                    }
                    else 
                    {
                       
                        header("location:login.php?status=1");
                       
                        
                        exit();
                    }
                }
                else 
                {
                    $sel="SELECT * from tbl_userdetails where userEmail='".$emailid."' AND userPassword='".$encryptedpassword."' AND userStatus=1";
                    $res=$conn->query($sel);
                    if($res !== false && $res->num_rows > 0)
                    {
                        $row = $res -> fetch_array(MYSQLI_ASSOC);
                        echo $row["userID"], $row["userName"],$row["userEmail"],$row["userPhone"];
                        /*while($row=$res->fetch_array())
                        {
                            echo $row["userID"];
                        }
                       
                        $_SESSION["loginID"]=$row["userID"];
                       
                        $res->free();*/
                        header("location:home.php");
                        $_SESSION["loginID"]=$row["userID"];
                        $_SESSION["loginStatus"]=3;
                        $_SESSION["userName"]=$row["userName"];
                        $_SESSION["userEmail"]=$row["userEmail"];
                        $_SESSION["userPhone"]=$row["userPhone"];
                    }
                    else 
                    {
                        
                        header("location:login.php?status=1");
                       
                    }
                    
                }
            }        
    }
    $conn->close();
?>