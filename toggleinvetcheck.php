
<?php
include "connection.php";
session_start();
?>

<html>
    <head>
        <title>Appointments</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body
            {
                font-size: 15px;
                font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            }
            .navigation
            {
                display: flex;
                margin-top: 20px;
                margin-left: 5.5cm;
                margin-right: 8cm;  
            }
            .item
            {
                padding: 2px 30px 2px 30px;
                text-decoration: none;
                color: black;
            }
            .item:hover
            {
                color: rgb(197, 110, 3);
            }
            #div2
            {
           
                padding: 2px 10px 2px 10px;
                font-weight: lighter;
                font-size: 27px;
                text-align: center;
                color:white;
                margin-left: 184px;
                
                
            }
            #d
            {
                background-color: #111;
                padding-top: 7px;
                padding-top: 7px;
                margin-bottom: 0;
            }
            hr
            {
                height:1px;
                border-width:0;
                color:rgb(74, 71, 71);
                background-color:rgb(99, 96, 96);
                margin:0px 30px 0px 30px;
            }
            table
            {
                border-collapse: collapse;
                border-spacing: 0;
                width: 100%;
                border: 1px solid #ddd;
            }
            td,th
            {
                text-align: left;
                padding: 16px;
            }
            tr:nth-child(even) 
            {
                background-color: #f2f2f2;
            }
            #s
            {
                border-top:none;
                border-left:none;
                border-right: none;
                border-bottom:1px solid black;
                margin-top:20px;
                margin-left: 30px;
                padding: 4px 32px 4px 25px;
                background-image: url("search-icon.webp");
                background-size: 10%;
                background-repeat: no-repeat;   
            }
            #s:focus
            {
                outline:none;
            }
            #s::placeholder
            {
                padding-left: 0px;
            }
            #a1
            {
                text-decoration: none;
                color: black;
                font-size: 15px;
            }
            #a1:hover
            {
                color:rgb(197, 110, 3);
            }
            h5
            {
                margin-bottom: 3px;
            }
            .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #ff0000;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

       
        
        .slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
.sidenav {
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 200px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
 
  padding: 0px 10px;
}
h2
{
    margin-left: 200px;
    margin-top: 10px;
    margin-bottom: 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
    </head>

        <body>
        <div class="sidenav">
  <a href="adminhome.php">Home</a><br>
  <a href="customerlist.php">Customer Management</a><br>
  <a href="productlist.php">Product Management</a><br>
  <a href="veterinarydetails.php">Veterinary Management</a><br>
  <a href="#contact">About</a>
</div>

<h2>Veterinary Management</h2>  
<div id="div2">
    <div id="d">
            <h3 style="color:white;padding-bottom:24px;margin-bottom:0">Vet Information</h3>
    </div>

        <?php
        $sel="SELECT * FROM tbl_userdetails WHERE userRole='Veterinarian'";
        if ($result=$conn->query($sel))
        {
        if($result->num_rows>0)
            {
            ?>

        <table>
            <tr id="tr1">
              
                <th>vet Name </th>
                <th>vet Email</th>
                <th>vet Phone</th>
                <th>vet Status</th>   
            </tr>

        <?php
        while($row=$result->fetch_array())
        {
            $vetID1=$row["userID"];
            $username=$row["userName"];
            $useremail=$row["userEmail"];
            $userphone=$row["userPhone"];
            
        ?>
        <tr>
          
            <td><?php echo $row["userName"] ?></td>
            <td><?php echo $row["userEmail"] ?></td>
            <td><?php echo $row["userPhone"] ?></td>
            
            <?php $userstatus=$row["userStatus"]; 
                    if($userstatus==1)
                    { 
                    $statuschange="UPDATE tbl_userdetails SET userStatus=0 WHERE userID='$vetID1'";
                    $updatedstatus="SELECT userStatus FROM tbl_userdetails WHERE userID='$vetID1'";
                    if ($result=$conn->query($updatedstatus))
{
    if($result->num_rows>0)
    {
        while($row=$result->fetch_array())
        {
            //echo $row["userID"];
            $updatedstatus=$row["userStatus"];
          
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
                    <td id="status1" style="color:green"></td>
                    <?php
                    }
                    else
                    {?>
                    <td id="status2" style="color:red">INACTIVE</td>
                    <?php
                    }  
                    ?>  
                 <td><label class="switch">
                    <input type="checkbox" id="myButton" value="NO" onclick="Buttontoggle();">
                    <span class="slider round"></span>
                    </label></td>          
        </tr> 
    </table>
    <script type="text/javascript">
function Buttontoggle()
{
  var t1 = document.getElementById("status2");
  var t2 = document.getElementById("status1");
  if(t1.value=="YES"){
      t1.innerHTML="inactive";}
  else if(t2.value=="NO"){
      t2.innerHTML="YACTIVE";}
}
</script>
  


        <?php
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

<div id="d">
            <h3 style="color:white;padding-bottom:24px;margin-bottom:0">Appointments</h3>
    </div>

<?php
$sel="SELECT tbl2.*,tbl1.userName,tbl1.userPhone FROM tbl_appointmentdetails AS tbl2 INNER JOIN tbl_userdetails AS tbl1 ON tbl2.customerID=tbl1.userID";
if ($result=$conn->query($sel))
{
    if($result->num_rows>0)
    { 
    ?>
    <table>
        <tr id="tr1">
            
            <th>Customer Name </th>
            <th>Customer Phone</th>
            <th>Pet Species</th>
            <th>Pet Gender</th>
            <th>Pet Age</th>
            <th>Pet Weight</th>
            <th>Concern about Pet</th>
            <th>Consulation Date</th>
            <th>Consultation Time</th>     
        </tr>

        <?php 
        while($row=$result->fetch_array())
        {
        ?>

        <tr>
          
            <td><?php echo $row["userName"] ?></td>
            <td><?php echo $row["userPhone"] ?></td>
            <td><?php echo $row["petSpecies"] ?></td>
            <td><?php echo $row["petGender"] ?></td>
            <td><?php echo $row["petAge"] ?></td>
            <td><?php echo $row["petWeight"] ?></td>
            <td><?php echo $row["concernAboutPet"] ?></td>
            <td><?php echo $row["consultationDate"] ?></td>
            <td><?php echo $row["consultationTime"] ?></td>    
        </tr> 

        <?php 
        }
        while($row=$result->fetch_array())
        {
        ?>   
                
        <tr>
           
            <td><?php echo $row["userName"] ?></td>
            <td><?php echo $row["userPhone"] ?></td>
            <td><?php echo $row["petSpecies"] ?></td>
            <td><?php echo $row["petGender"] ?></td>
            <td><?php echo $row["petSpecies"] ?></td>
            <td><?php echo $row["petAge"] ?></td>
            <td><?php echo $row["petWeight"] ?></td>
            <td><?php echo $row["concernAboutPet"] ?></td>
            <td><?php echo $row["consultationDate"] ?></td>
            <td><?php echo $row["consultationTime"] ?></td>   
        </tr>     
    </table>

    <?php 
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
</body>
</html>