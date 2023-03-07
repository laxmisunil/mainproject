<head>
	<meta charset="UTF-8">
	<title>Live Search</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
  
    <input type="text" class="live-search-box" placeholder="search here">
    <ul class="live-search-list">
      <li>This</li>
      <li>Is</li>
      <li>My</li>
      <li>Search</li>
      <li>With</li>
      <li>Black Jack</li>
      <li>and</li>
      <li>test</li>
      <li>bells</li>
    </ul>

	<script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src = "js/main.js"></script>
  <script>
    jQuery(document).ready(($) => {


$('.live-search-list li').each(function(){
  $(this).attr('data-search-term', $(this).text().toLowerCase());
});

$('.live-search-box').on('keyup', function(){
  const searchTerm = $(this).val().toLowerCase();
  $('.live-search-list li').each(function(){
    ($(this).filter('[data-search-term *= ' + searchTerm + ']').length > 0 || searchTerm.length < 1)
      ? $(this).show()
      : $(this).hide();      
  });
});

$('input[class=live-search-box]').keydown(function(e){
  if(e.keyCode == ENTER){
    e.preventDefault();
    e.stopPropagation();
    
    const toAdd = $('input[class=live-search-box]').val();
    if (toAdd) {
      $('<li/>' , {
        'text': toAdd,      
        'data-search-term':  toAdd.toLowerCase(),
      }).appendTo($('ul'));
      $('input[class=live-search-box]').val('');
      console.log('User has entered '+toAdd);        
    }    
  }
});

$(document).on('dblclick', 'li', function(){
  $(this).fadeOut('slow',function(){
    $(this).remove();
  });
});

});

    </script>
</body>