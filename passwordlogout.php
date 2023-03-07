<?php
include "connection.php";
session_start();
?>
<script>

    </script>

<?php

$_SESSION["loginStatus"]=0;
header("location:login.php?status=2");


?>