<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
$("#files").change(function() {
  filename = this.files[0].name;
  //console.log(filename);
})
    </script>
<div>
    <label for="files" class="btn">Select Image</label>
    <input id="files"  type="file">
</div>