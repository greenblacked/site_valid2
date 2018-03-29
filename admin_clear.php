<?php
//open file to write
$fh = fopen("text.txt", "w");
// clear content to 0 bits
ftruncate($fh, 0);
//close file
fclose($fh);
header("Location: admin.php")
?>
