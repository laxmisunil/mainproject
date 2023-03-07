 <script>$(document).ready(function(){
    $("#time_select_2_hour").change(function(){
    $("#availability_1").html("<img src='ajax-loader.gif' /> checking...");


    var date1=$("#date1").val();
    var time_select_2_hour=$("#time_select_2_hour").val();

      $.ajax({
            type:"post",
            url:"check.php",
            data:"date1="+date1,
            data:"time_select_2_hour="+time_select_2_hour,
                success:function(data){
                if(data==0){
                    $("#availability_1").html("<img src='tick.png' /> Tour  is available!");
                }
                else{
                    $("#availability_1").html("<img src='cross.png' /> Tour is fully booked, please choose another date or tour time.");
                }
            }
         });

    });

 });
 </script>