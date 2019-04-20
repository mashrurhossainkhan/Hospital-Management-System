<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Make Bill</title>

</head>
<body>
<div class="container" style="padding-top:50px">
<h2>Bill Of A Patient</h2>
<?php
	include 'headerAdminSignUp.php';
?>
<br>
<br>
<form class="form-inline" method="post" action="generate_pdf.php">
	<input style="margin-left:30px" type="text" name="id" placeholder="ID">
<button type="submit" id="pdf" name="generate_pdf" class="btn btn-primary"><i class="fa fa-pdf"" aria-hidden="true"></i>
 Bill</button>
</form>
</fieldset>
</div>


</body>
</html>