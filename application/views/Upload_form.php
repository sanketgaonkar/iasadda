<html>
<head>
<title>Upload Form</title>
</head>
<body>

<form  enctype="multipart/form-data" 
action="<?php echo  base_url(); ?>index.php/Upload/upload1" method="post" >
<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
<input name="userfile" type="file" class="btn btn-outline btn-primary btn-sm" />
<input type="submit" value="Submit" class="btn btn-outline btn-success btn-sm" style="margin-top:10px;"/>
</form>



</body>
</html>