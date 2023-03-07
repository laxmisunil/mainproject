

<?php
include "connection.php";


if(isset($_POST['petname'])){
  

   $petname = mysqli_real_escape_string($conn,$_POST['petname']);
   $vaccine = mysqli_real_escape_string($conn,$_POST['vaccine']);
   
  

   $sel="SELECT petSpecies FROM tbl_pet WHERE petName='$petname'";
if ($result2=$conn->query($sel))
{
    if($result2->num_rows>0)
    {
        while($row=$result2->fetch_array())
                {
                    $petspecies=$row["petSpecies"];
                    //echo $petspecies;
                }
                       
                //$result2->free();
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
          

   $vaccinelist = "select vaccineName from tbl_vaccinedetails where vaccineFor='".$petspecies."'";

   if ($result3=$conn->query($vaccinelist))
{
    if($result3->num_rows>0)
    {
        while($row=$result3->fetch_array())
                {
                    $response = $row["vaccineName"];
                    echo $responsez;
                    
                }
                       
                //$result2->free();
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
 
   
      

   
   die;
}