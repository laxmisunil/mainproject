<script>
    $(document).ready(function(){
$("#plus").click(function(){

      $.ajax({
         url: 'addproductquantity.php',
         type: 'post',
         data: {"productquantity":'1'},
         success: function(html){
            location.reload(true);
          }
      });
  
 });

});
    </script>
    <body>
<div id="uname_response2">j</div>
<?php  $productquantity=1;
echo $productquantity; ?>
<form>
    <input type="button"id="plus">
</form>
    </body>