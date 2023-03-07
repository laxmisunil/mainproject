<?php
include "connection.php";


?>
<style>
    .search_container{
  margin: 0 auto;
  width: 55%;
}

.search_container #speechText{
  width: 80%;
  padding-top: 5px;
  padding-bottom: 5px;
}

.search_container #start{
  padding-top: 5px;
  padding-bottom: 5px;
}

.container{
  width: 55%;
  margin: 0 auto;
  border: 0px solid black;
  padding: 10px 0px;
}

/* post */
.post{
  width: 97%;
  min-height: 200px;
  padding: 5px;
  border: 1px solid gray;
  margin-bottom: 15px;
}

.post h1{
  letter-spacing: 1px;
  font-weight: normal;
  font-family: sans-serif;
}


.post p{
  letter-spacing: 1px;
  text-overflow: ellipsis;
  line-height: 25px;
}

/* more link */
.more{
  color: blue;
  text-decoration: none;
  letter-spacing: 1px;
  font-size: 16px;
}




</style>

<div class='search_container'>
  <!-- Search box-->
  <input type='text' id='speechText' > &nbsp; 
  <input type='button' id='start' value='Start' onclick='startRecording();'>
</div>

<!-- Search Result -->
<div class="container"></div>
<script>
    var recognition = new webkitSpeechRecognition();

recognition.onresult = function(event) { 
  var saidText = "";
  for (var i = event.resultIndex; i < event.results.length; i++) {
    if (event.results[i].isFinal) {
      saidText = event.results[i][0].transcript;
    } else {
      saidText += event.results[i][0].transcript;
    }
  }
  // Update Textbox value
  document.getElementById('speechText').value = saidText;
 
  // Search Posts
  searchPosts(saidText);
}

function startRecording(){
  recognition.start();
}

// Search Posts
function searchPosts(saidText){

  $.ajax({
    url: 'getData.php',
    type: 'post',
    data: {speechText: saidText},
    success: function(response){
       //$('.container').empty();
       $('.container').append(response);
    }
  });
}

    </script>