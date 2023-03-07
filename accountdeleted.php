

<script type="text/javascript">
  var count = 10; // Timer
  var redirect = "http://localhost/miniproject/accountdeletionsuccessfull.php"; // Target URL

  function countDown() {
    var timer = document.getElementById("timer"); // Timer ID
    if (count > 0) {
      count--;
      timer.innerHTML = "Your account will be deleted in  " + count + " seconds."; // Timer Message
      setTimeout("countDown()", 1000);
    } else {
      window.location.href = redirect;
    }
  }
</script>
<center><img src="logofinal.png" width="10%" >
<p><font size="10px"><b>Thank you!</b></font></p>
<p>for being a part of our family.</p>
<div class="footer animated slow fadeInUp">
      <center><br><p id="timer">
        <script type="text/javascript">
          countDown();
        </script>
      </p>
      <p>Click <a href="home.php" onclick="return confirm('Cancel account deletion?');" style="color:blue;text-decoration:none">here </a>to CANCEL</p>
     
</div>