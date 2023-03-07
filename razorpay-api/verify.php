<?php

require('config.php');
include "connection.php";
session_start();

$userID=$_SESSION["loginID"];

$username="SELECT userName FROM tbl_userdetails WHERE userID='$userID'";
if ($result=$conn->query($username))
{
    if($result->num_rows>0)
    {
        while($row=$result->fetch_array())
        {
            $username=$row["userName"];      
        }
        $result->free();
    }
    else
    {
        echo "No Records";
    }
}
else
{
    echo "ERROR";
}

$words = explode(" ", $username);
$firstname = $words[0];

$cartdata="SELECT * FROM tbl_cart WHERE customerID='$userID' AND cartStatus=1";
if ($result2=$conn->query($cartdata))
{
    if($result2->num_rows>0)
    { 
        while($row=$result2->fetch_array())
        {
            $cartdetailsID=$row["cartID"];
            $productID=$row["productID"];
            $stockID=$row["stockID"];
            $productcount=$row["productCount"];
        }
       // $result->free();
    }
    else
    {
        echo "No orders yet!";
        
    }
    
}
else
{
    echo "ERROR";
   
}

require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}
$paymentID=$_POST['razorpay_payment_id'];
$razorpayorderID=$_SESSION['razorpay_order_id'];
$amount=$_GET["amount"];

$date=date("Y-m-d"); 

$yearextracted=explode("-",$date);
$year=$yearextracted[0];

$time=date('h:m:s');

if ($success === true)
{
    $amountpaid="INSERT INTO tbl_payment VALUES (NULL,'$paymentID','$razorpayorderID','$userID',1)";
    try
    {
        if($conn->query($amountpaid)===true);
   
    }
    catch(Exception)
    {
   
    } 
    $transactionid="SELECT transactionID FROM tbl_payment WHERE transactionID=(SELECT max(transactionID) FROM tbl_payment)";
    if ($result3=$conn->query($transactionid))
    {
        if($result3->num_rows>0)
        { 
            while($row=$result3->fetch_array())
            {
                $transactionID=$row["transactionID"];
            }
                
        }
        else
        {
           
        }
    }
    else
    {
        echo "ERROR";
    }  
    
    $orderinfo="INSERT INTO tbl_order VALUES (NULL,'$userID','$transactionID','$year','$date','$time',NULL,NULL,1)";
    try
    {
        if($conn->query($orderinfo)===true);
   
    }
    catch(Exception)
    {
   
    }  
    $selectorderid="SELECT orderID FROM tbl_order WHERE orderID=(SELECT max(orderID) FROM tbl_order)";
    if ($result4=$conn->query($selectorderid))
    {
        if($result4->num_rows>0)
        {       
            while($row=$result4->fetch_array())
            {
            $orderID=$row["orderID"];

            $products="SELECT productID,productCount,stockID FROM tbl_cart WHERE cartStatus=1 AND customerID=$userID";
            if ($result5=$conn->query($products))
            {
                if($result5->num_rows>0)
                { 
                    while($row=$result5->fetch_array())
                    {
                    $productID=$row["productID"];
                    $productcount=$row["productCount"];
                    $stockID=$row["stockID"];
                    $selectprice="SELECT * FROM tbl_stock WHERE productID='$productID' AND stockID='$stockID' AND productStock>0";
                    if ($result6=$conn->query($selectprice))
                    {
                        if($result6->num_rows>0)
                        { 
                            while($row=$result6->fetch_array())
                            {
                                $stockID=$row["stockID"];
                                $productquantity=$row["productQuantity"];
                                $productmeasure=$row["productMeasure"];
                                $productPrice=$row["productPrice"];
                                $productstock=$row["productStock"];
                
                                $orderdetails="INSERT into tbl_orderitems VALUES(NULL,'$orderID','$productID','$stockID','$productPrice','$productcount',1)";
                                try
                                {
                                    if($conn->query($orderdetails)===true);
           
                                }
                                catch(Exception)
                                {
           
                                } 

                                $sel="SELECT productQuantity FROM tbl_orderitems WHERE productID='$productID'";
                                {
                                    if ($result=$conn->query($sel))
                                    {
                                        if($result->num_rows>0)
                                        {
                                            while($row=$result->fetch_array())
                                            {
                                                 //$productPrice=$row["productPrice"];
                                                 $productcount=$row["productQuantity"];

                                                $updatestock="UPDATE tbl_stock SET productStock=$productstock-$productcount WHERE stockID=$stockID";
                                                if($conn->query($updatestock)===true)
                                                {
                                                    // header("location:home.php?status=1");
                                                }
                                                else 
                                                {
                                                    //echo "Please try again later";
                                                }


                                            }
                                            $result->free();
                                        }
                                    }
                                }


                            }
                               
                        }
                        else
                        {
           
                        }
                    }
                    else
                    {
                        echo "ERROR";
                    } 
        
                }
                   // $result->free();
            }
            else
            {
               
            }
        }
        else
        {
            echo "ERROR";
        }  
           
        }
            //$result->free();
    }
    else
    {
       
    }
}
else
{
    echo "ERROR";
}  

   

$sel="SELECT productQuantity FROM tbl_orderitems WHERE productID='$productID'";
{
    if ($result=$conn->query($sel))
    {
    if($result->num_rows>0)
    {
        while($row=$result->fetch_array())
        {
            //$productPrice=$row["productPrice"];
            $productcount=$row["productQuantity"];


        }
       // $result->free();
    }
}
}

$totalAmount=$productPrice*$productcount;

    
    $clearcart="UPDATE tbl_cart SET cartStatus=0 WHERE customerID=$userID";
    if($conn->query($clearcart)===true)
    {
       //
    }
    else 
    {
        //
    }

 


   ?> 


<script type="text/javascript">
  var count = 5; // Timer
  var redirect = "http://localhost/miniproject/home.php"; // Target URL

  function countDown() {
    var timer = document.getElementById("timer"); // Timer ID
    if (count > 0) {
      count--;
      timer.innerHTML = "You will be redirected in  " + count + " seconds."; // Timer Message
      setTimeout("countDown()", 1000);
    } else {
      window.location.href = redirect;
    }
  }
</script>
   <div class="footer animated slow fadeInUp">
      <center><br><p id="timer"></center>
        <script type="text/javascript">
          countDown();
        </script>
      </p>
     
</div><?php
    try
{
    if($conn->query($amountpaid)===true);
    //echo "Success";
   

    //echo "<br>ACCOUNT CREATED SUCCESSFULLY!";
}
catch(Exception)
{
    //echo "Failed";
    //echo "ERROR";
    //header("location:register.php?status=0");
    
    
} 
    ?>
    
    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
    <html style="-moz-osx-font-smoothing: grayscale; -webkit-font-smoothing: antialiased; background-color: #464646; margin: 0; padding: 0;">
        <head>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <meta name="format-detection" content="telephone=no">
            <title>Transaction Status</title>
            
        </head>
        <body bgcolor="#d7d7d7" class="generic-template" style="-moz-osx-font-smoothing: grayscale; -webkit-font-smoothing: antialiased; background-color: #d7d7d7; margin: 0; padding: 0;">
            <!-- Header Start -->
           
            <!-- Header End -->
    
            <!-- Content Start -->
            
            <!--<center><br><a style="color:blue;;"href="http://localhost/miniproject/home.php">Continue Shopping</a></center>-->
            <table cellpadding="0" cellspacing="0" cols="1" bgcolor="#d7d7d7" align="center" style="max-width: 600px;">
                <tr bgcolor="#d7d7d7">
                    <td height="30" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                </tr>

                <!-- This encapsulation is required to ensure correct rendering on Windows 10 Mail app. -->
                <!--<tr bgcolor="#d7d7d7">-->
                    <td style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                        <!-- Seperator Start -->
                        <!--<table cellpadding="0" cellspacing="0" cols="1" bgcolor="#d7d7d7" align="center" style="max-width: 600px; width: 100%;">
                            <tr bgcolor="#d7d7d7">
                                <td height="30" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                            </tr>
                        </table>-->
                        <!-- Seperator End -->
    
     <!-- Generic Pod Left Aligned with Price breakdown Start -->
                        <table align="center" cellpadding="0" cellspacing="0" cols="3" bgcolor="white" class="bordered-left-right" style="border-left: 10px solid #d7d7d7; border-right: 10px solid #d7d7d7; max-width: 600px; width: 100%;">
                            <tr height="50"><td colspan="3" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td></tr>
                            <tr align="center">
                                <td width="36" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                                <td class="text-primary" style="color: #F16522; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                    <img src="paymentsuccessful.png" alt="GO" width="50" style="border: 0; font-size: 0; margin: 0; max-width: 100%; padding: 0;">
                                </td>
                                <td width="36" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                            </tr>
                            <tr height="17"><td colspan="3" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td></tr>
                            <tr align="center">
                                <td width="36" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                                <td class="text-primary" style="color: #F16522; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                    <h1 style="color: #32cd32; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 30px; font-weight: 700; line-height: 34px; margin-bottom: 0; margin-top: 0;">Payment received</h1>
                                </td>
                                <td width="36" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                            </tr>
                            <tr height="30"><td colspan="3" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td></tr>
                            <tr align="left">
                                <td width="36" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                                <td style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                    <p style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">
                                        Hi <?php echo $firstname; ?>
                                        , 
                                    </p>
                                </td>
                                <td width="36" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                            </tr>
                            <tr height="10"><td colspan="3" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td></tr>
                            <tr align="left">
                                <td width="36" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                                <td style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                    <p style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">Your transaction was successful!</p>
                                    <br>
                                    <p style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0; "><strong>Payment Details:</strong><br/>
    
                                    Amount: Rs. <?php $totalamount=($amount/100); echo $totalamount ?> <br/>
             Payment ID:<?php echo $_POST['razorpay_payment_id']; ?><br>

                                    </p>
                                        <br>
                                    <!--<p style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">We advise to keep this receipt for future reference.&nbsp;&nbsp;&nbsp;&nbsp;<br/></p>-->
                                </td>
                                <td width="36" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                            </tr>
                            <tr height="30">
                                <td style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                                <td style="border-bottom: 1px solid #D3D1D1; color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                                <td style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                            </tr>
                            <tr height="30"><td colspan="3" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td></tr>
                            <tr align="center">
                                <td width="36" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                                <td style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                    <!--<p style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;"><strong>Transaction ID: ${authorizationCode}</strong></p>-->
                                    <p style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">Order date: <?php echo $date."&nbsp;";// echo $time;?></p>
                                    <p style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;"></p>
                                </td>
                                <td width="36" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                            </tr>
    
                            <tr height="50">
                                <td colspan="3" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                            </tr>
    
                        </table>
                        <!-- Generic Pod Left Aligned with Price breakdown End -->
    
                        <!-- Seperator Start -->
                        <table cellpadding="0" cellspacing="0" cols="1" bgcolor="#d7d7d7" align="center" style="max-width: 600px; width: 100%;">
                            <tr bgcolor="#d7d7d7">
                                <td height="60" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                            </tr>
                        </table>
                        <!-- Seperator End -->
    
                    </td>
                </tr>
            </table>
            <!-- Content End -->
    
            <!-- Footer Start -->
            <div class="bg-gray-dark footer" bgcolor="#464646" height="165" style="background-color: #464646; width: 100%;">
                <!--<table align="center" bgcolor="#464646" style="max-width: 600px; width: 100%;">
                    
                   
    
                   
                  
                </table>-->
            </div>  
          
            <!-- Footer End -->
        </body>
    </html>

             <?php
}
else
{
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}

//echo $html;
