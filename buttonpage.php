<html><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="jquery-3.2.1.min.js"></script>
        <script src="script.js"></script>
<script>

    $(document).ready(function(){
    $("#button").click(function(){
        $.ajax({
            url: "buttonpageajax.php",
            type: "POST",
            data: {"set_freq":'<?php echo $set_freq ?>'}, 
            success: function(){
                alert("OK");

            }
        
        });
    });
});
    </script>

<?php
include "connection.php";
   $cartdetails = "SELECT productQuantity FROM tbl_cart WHERE productID=10";
   if ($result=$conn->query($cartdetails))
   {
       if($result->num_rows>0)
       { 
           while($row=$result->fetch_array())
           {
               
               $set_freq=$row["productQuantity"];
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
        
?>
<a id='button' class='w3-bar-item w3-button'><?php echo "hello".$set_freq ?></a>
<style>
    #button:hover
    {
        cursor:pointer;
    }

    </style>
</html>