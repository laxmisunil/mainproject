<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script>
var subjectObject = {
  "Food": {"Dry Food":[],"Wet Food": [],"Biscuit": [],"Cookie":[]},
  "Toys": {"Chew Toy":[],"Plush Toy": [],"Rope Toy": [],"Soft Toy":[]},
  "Accessories": {"Cloth":[],"Bowl": [],"Feeder": [],"Bed":[],"Travel Supplies":[]},
  
  }

window.onload = function() {
  var subjectSel = document.getElementById("subject");
  var topicSel = document.getElementById("topic");

  for (var x in subjectObject) {
    subjectSel.options[subjectSel.options.length] = new Option(x, x);
  }
  subjectSel.onchange = function() {
    
    topicSel.length = 1;
    
    for (var y in subjectObject[this.value]) {
      topicSel.options[topicSel.options.length] = new Option(y, y);
    }
  }
  
}
</script>
</head>   
<body>


<form name="form1" id="form1" action="submitdropdown.php" method="POST">
<select name="subject" id="subject">
<option value="" disabled selected hidden>Product category</option>

  </select>
  <br><br>
<select name="topic" id="topic">
<option value="" disabled selected hidden>Product subcategory</option>
  </select>

  <br><br>
  <input type="submit" value="Submit" name="submit">  
</form>

</body>
</html>
