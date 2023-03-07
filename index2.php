
<html>
<head>
    <title>Registration</title>
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
   
    

    <style>
 
        
        form i{
        margin-left: -30px; 
cursor: pointer;
        }
           
    </style>
    <script>
 const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#password");

    togglePassword.addEventListener("click", function () {
        // toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);
        
        // toggle the icon
        this.classList.toggle("bi-eye");
    });

    // prevent form submit
    const form = document.querySelector("form");
    form.addEventListener('submit', function (e) {
        e.preventDefault();
    });
</script>
  
</head>
<body>
    <div>  
       
            <form method="POST">
               
               
       
                
                <input type="password" name="password" id="password" />
                <i class="bi bi-eye-slash" id="togglePassword"></i><br><br>
                
                
               
              
              
            </form>
   
  
    </center>
</body>
</html>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            