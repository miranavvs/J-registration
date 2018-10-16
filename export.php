<?php include_once('data/export.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>export</title>
</head>
<body>
	<form method="POST"  enctype="multipart/form-data"  action="data-list.php">
	    	<div class="form-group">
	    		<input class="btn btn-md btn-success" type="file" name="csv-file">
	    		    	
	    		<input class="btn btn-default btn-md" type="submit" name="send-data" value="import-csv-file"><span class="fa fa-send"></span>

	    		<input  type="submit" name="export" value="export-csv-file" class="btn btn-md btn-defautl"/>
	    	</div>
        </form>
     

</body>
</html>