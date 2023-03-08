


<html>
    <head>
        <title>Customers</title>
       
   
        <style>
              
   





.slider {
  
  background-color: #fff;

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
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

        



</style>
</head>
<body>

                 
                 <form id="form" method="POST">
                 <label class="switch" >
                 <button type="submit" name="togbutton" id="submitbutton">   
                 <?php $userstatus=$row["userStatus"]; 
                 if($userstatus==1)
                 echo "<input type='checkbox' name='togbutton' id='toggle'>";
                 else if($userstatus==0)
                 echo "<input type='checkbox' name='togbutton' id='toggle' checked>";

                 ?>           
     
                 <span class="slider round"></span></button>
                 </label></form>