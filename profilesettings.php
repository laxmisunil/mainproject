<html>
    <head>
        <title>Contact</title>
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
            input[type=text]
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
            #cac
            {
                color: #595959;
                font-weight: bolder;
                font-size: larger;
                text-align: left;
            } 
            h6
            {
                text-align: left;
            }

        </style>
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
            <a href="#" class="item">Contact</a>
        </div>

        <div id="div2">
            <h2>Update your Profile</h2>
            <form style="text-align:left" action="/action_page.php">
                <h6 >Personal Information</h6>
                <input type="text" placeholder="Enter your name" size="30cm">
                <input type="text" placeholder="E-mail ID" size="30cm"><br>
                <textarea placeholder="Type your message here..." size="30cm" rows="8" cols="30"></textarea><br> 
                <input type="submit" value="Submit">      
            </form>
        </div>  
        <p style="font-size:12.8px;">© Copyright 2022  |  All rights reserved | www.pawsown.in</p>
        </center>
    </body>
</html>