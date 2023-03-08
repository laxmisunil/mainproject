<script src="jquery-3.2.1.min.js"></script>
<script src="script.js"></script>
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
<input type="password" id="password" name="password" placeholder="Password (minimum 6 characters)" minlength="6" size="30cm" required>
                    <i class="bi bi-eye-slash" id="togglePassword"></i>