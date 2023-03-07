<?php
include "connection.php";

$to ='lakshmisunil@mca.ajce.in';

$headers = "From: NO-REPLY<no-reply@mydomain.com>" . "\r\n";
$subject = "Confirmation For Request";
$message = '<html>
                <body>
                    <p>Hi Lakshmi Sunil</p>
                    <p>
                        We recieved below details from you. Please use given Request/Ticket ID for future follow up:
                    </p>
                    <p>
                        Your Request/Ticket ID: <b>H86GUR8FDN</b>
                    </p>
                    <p>
                    Thanks,<br>
                     Team.
                    </p>
                </body>
            </html>';
           
$mail_sent=mail( $to, $subject, $message, $headers ); 
if($mail_sent==true)
{
    echo "Mail sent";
}
else
{
    echo "Failed";
}

?>