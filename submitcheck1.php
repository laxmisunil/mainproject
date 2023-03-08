<script>
     function ValidateEmail() {
        var email = document.getElementById("email").value;
        var lblError = document.getElementById("lblError");
        lblError.innerHTML = "";
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

        if (!expr.test(email))
        {
            lblError.innerHTML = "Invalid email address.";
            const button = document.querySelector('#submitbutton');
            button.disabled = true;
            
        }
        else if(expr.test(email))
        {
            lblError.innerHTML = "Perfect";
            const button = document.querySelector('#submitbutton');
            button.disabled = false;
        }}
             
    


</script>
<form id="form">
<input type="email" onkeyup="ValidateEmail();" name="cusemail" id="email" placeholder="E-mail ID (Eg. user@domain)" size="30cm"  required><br>
<div style="display:flex">
<span id="lblError" style="color: red;font-size:small"></span>
<div id="uname_response" style="font-size:small;text-align:left"></div>
</div>
<input type="submit" value="submit" id="submitbutton">
</form>