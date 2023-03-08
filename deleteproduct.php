<html>
    <head>
        <title>Delete a Product</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
        <style>
            body
            {
                background-color:rgb(248, 238, 223);
                text-align: center;
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            }
            input[type=text],input[type=password],select,input[type="file"],input[type=number]
            {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }
            input[type=submit]
            {
                width: 100%;
                background-color: red;
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
                background-color: salmon;
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
            .drop1
            {
                padding: 12px 20px;
                margin: 8px 0px; 
            } 
            fieldset
            {
                border: 2px solid white;
                box-shadow: 8px 8px 12px #888;
            } 
            option
            {
                padding:5px 0px;
            } 
            form i 
            {
                margin-left: -31px; 
                margin-right: 9.5px;
                cursor: pointer;
            }
        
        </style>
    </head>
    <body>
        <div>  
            <fieldset style="margin-top: 2cm;margin-left: 11cm;margin-right: 11cm;background-color:white;padding-bottom: 0.2cm;">
                <form action="removeproduct.php" method="POST" target="_self">
                   
                    <h2>Delete a Product</h2> 
                    
                    <input type="number" size="30cm" placeholder="Enter the product ID" name="productid" id="proid" required><br>
                    <p style="color:blue">By clicking on "Delete Product",all the data associated with that product will be removed completely</p>
                    <input type="submit" value="Delete Product" name="deleteproduct">
                    
                   
                    
                </form>
            </fieldset>