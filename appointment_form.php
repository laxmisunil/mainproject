<html>
    <head>
        <title>Appointment Form</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script>
        </script>
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
                margin-left: 8.5cm;
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
                background-color:rgb(248, 238, 223);
                padding: 2px 10px 2px 10px;
                margin-top: 15px;
                font-weight: lighter;
                font-size: 30px;
            }
            hr
            {
                height:1px;
                border-width:0;
                color:rgb(74, 71, 71);
                background-color:rgb(99, 96, 96);
                margin:0px 30px 0px 30px;
            }
            input[type=text],select,input[type=number],input[type=date]
            {
                width: 50%;
                padding: 12px 20px;
                margin: 8px 0px;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }
            textarea
            {
                width: 50%;
                padding: 12px 20px;
                margin: 8px 0px;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
                font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                font-size: 15px;
            }

            input[type=submit]
            {
                width: 50%;
                background-color: black;
                color: #fafafa;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-weight: bolder; 
            }
            input[type=submit]:hover
            {
                background-color: #595959;
            }
            a
            {
                color:blue;
                text-decoration: none;
            } 
            .drop1
            {
                padding: 12px 20px;
                margin: 8px 0px; 
            }
            .alert 
            {
                padding: 14px 20px;
                background-color: #f44336;
                color: white;
            }
            .closebtn 
            {
                margin-left: 15px;
                color: white;
                font-weight: bold;
                float: right;
                font-size: 22px;
                line-height: 20px;
                cursor: pointer;
                transition: 0.3s;
            }
            .closebtn:hover
            {
                color: black;
            }   
        </style>

        <script>
            function show()
            {
                document.getElementById("show").style.visibility="visible";
            }
            $("#subbutton").click(function()
            {
                alert("The Form has been Submitted.");
            });
        </script>
        <script>
           
            function check()
            {  
                var selecteddate = $("#datepick").val();
                var selectedtime = $("#timepick").val();

                $.ajax(
                    {
                        url: 'checkavailability.php',
                        type: 'post',
                        data: {selecteddate: selecteddate,selectedtime:selectedtime},
                        success: function(response)
                        {
                            $('#response2').html(response);
                        }
                    }
                    );
            }  

        </script>
    </head>
    
    <header>
        <center><img src="logofinal.png" width="8%" >
        <hr> 
    </header>
    <body>
        <center>
        <div class="navigation">
            <a href="homepage.php" class="item">Home</a>
            <a href="#" class="item">Dogs</a>
            <a href="#" class="item">Cats</a>
            <a href="consultation.html" class="item">Consultation</a>
            <a href="about.html" class="item">About</a>
            <a href="contact.php" class="item">Contact</a>
        </div>

        <div id="div2">
            <h2>Talk to Vet</h2>
            <form action="apptdata.php" target="_self" method="POST">
                
                    <select name="species" id="species" required>
                        <option value="" disabled selected hidden>Select your pet..</option>
                        <option value="Dog" class="drop1">Dog</option>
                        <option value="Cat" class="drop1">Cat</option>
                        <option value="Others" class="drop1">Others</option>
                      </select>

                    <select name="gender" id="gender" required>
                        <option value="" disabled selected hidden>Select gender...</option>
                        <option value="Female" class="drop1">Female</option>
                        <option value="Male" class="drop1">Male</option>
                        <option value="Not known" class="drop1">Not known</option>
                    </select>

                <input type="number" min=1 max=200 name="age" placeholder="Pet age (in months)" size="30cm"  defaultValue="0" >
                <input type="number" min=1 name="weight" placeholder="Pet weight (in kg)" size="30cm" defaultValue="Not Known"><br>
                <input type="date"  id="datepick" name="date" min="2022-06-01" max="2022-08-30" size="30cm" required><br>
                <select name="timepick" onchange="check()"  required>
                
                    <option value="" disabled selected hidden>Choose a time slot</option>
                    <option value="9" class="drop1">09:00am - 09:30am</option>
                    <option value="10" class="drop1">10:00am - 10:30am</option>
                    <option value="11" class="drop1">11:00am - 11:30am</option>
                    <option value="12" class="drop1">12:00pm - 12:30pm</option>  
                </select>
                <div id="response2" style="font-size:small;text-align:center"></div>
                <textarea placeholder="Describe the concern about your pet in short(Optional)" name="concern" size="30cm" rows="8" cols="30" defaultValue="-"></textarea><br> 
                <input type="submit" name="booknow" value="Book Now" id="subbutton">      
            </form> 

            <script>
            var today = new Date();
            var dd = today.getDate()+1;
            var mm = today.getMonth()+1; //January is 0 so need to add 1 to make it 1!
            var yyyy = today.getFullYear();
            if(dd<10)
            {
                dd='0'+dd
            } 
            if(mm<10)
            {
                mm='0'+mm
            } 
            today = yyyy+'-'+mm+'-'+dd;
            document.getElementById("datepick").setAttribute("min", today);
            </script>
        </div> 
        <p style="font-size:12.8px;">© Copyright 2022  |  All rights reserved | www.pawsown.in</p>
        </center>
    </body>
</html>