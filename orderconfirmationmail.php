<?php
include "connection.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
function sendMail($email,$reset_token)
{
    include "Exception.php";
    include "PHPMailer.php";
    include "SMTP.php";

    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'pawsownindia@gmail.com';                     //SMTP username
        $mail->Password   = 'nkctpumsvsddhqid';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('pawsownindia@gmail.com', 'Pawsown');
        $mail->addAddress($email);     //Add a recipient
      
    
        //Attachments
        
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Password Reset Link';
        $mail->Body    = "<p>We got a request to reset the password for your account.</p>Click the link below <br><a href='http://localhost/miniproject/resetmypassword.php?email=$email&reset_token=$reset_token'>Reset Password</a><br><p>This email is in response to a request to recover a forgotten password.<br> 
        You can ignore this email if you did not submit this request.<br>
      
        Do not reply to this email.</p>";
       
    
        $mail->send();
        return true;
    } catch (Exception $e) {
       return false;
    }
}
$email="lakshmisunil@mca.ajce.in";

$query = "select count(*) as cntUser from tbl_userdetails where userEmail='".$email."'";

$result = mysqli_query($conn,$query);
//$response = "<div style='color: green;text-align:left'></div>";
if(mysqli_num_rows($result))
{
   $row = mysqli_fetch_array($result);

   $count = $row['cntUser'];
   
   if($count==0)
   {
       header("location:resetpassword.php?status=2");
   }
   else
   {
    if($count==1)
    {
        $reset_token=10;
        date_default_timezone_set('Asia/Kolkata');
        $date=date("Y-m-d");
        $query="UPDATE `tbl_userdetails` SET `resettoken`='$reset_token',`resettokenexpire`='$date' WHERE userEmail='$email'";

        
        if(mysqli_query($conn,$query) && sendMail("lakshmisunil@mca.ajce.in",$reset_token))
        {
            header("location:resetpassword.php?status=3");
        }
        else
        {
           echo "
           <script>
           alert('Server Down!');
           </script>
           ";
            //header("location:resetpassword.php?status=4");
        }
    
    }
    else
    {

    }
}
}

?>