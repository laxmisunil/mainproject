<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function()
    {
        $("#live_search").keyup(function()
   
        {
            var input=$(this).value;
            if(input!="")
            {
                $.ajax({

                    url:"livesearch.php",
                    method:"POST",
                    data:{input:input},
                    success:function(data)
                    {
                        $("#searchresult").html(data);
                    }

                });
            }
                else
                {
                    $("#searchresult").css("display","none");
                }
            
        })


    })


</script>
</head>

<body>
    
<form action="search3.php" method="POST">
    <input type="search" autocomplete="off" id="live_search" placeholder="Search by Name, Email">
    <input type="submit" name="submit">
    </form>
    <div id="searchresult"></div>

</body>





</html>