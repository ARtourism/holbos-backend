<?php
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
$from = "info@holbos.com";
$headers = "From:" . $from;


$msg = "
<html>
<body>
<p>For email verification, Please click the link given below</p>
<br>
<a href=''>Confirm Email</a>
</body>
</html>
";
?>