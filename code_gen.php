<?php
require("db_config.php");

$found = 0;
do {
	$hash = md5( rand(0,10000000) ); // Generate random 32 character hash and assign it to a local variable.
    // Example output: f4552671f8909587cf485ea990207f3b
	$sql_sea = "SELECT * FROM registrations WHERE reg_vercode = '".$hash."'";
	$result = $conn->query($sql_sea);
	if ($result->num_rows > 0) {
		$found = 1;
	}

} while ( $found );

?>