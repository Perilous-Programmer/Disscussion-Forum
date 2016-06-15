<?php

require 'dbcon.php';


$sql = 'SELECT * FROM posts';

$retval = mysql_query($sql, $conn);
if (!$retval) {
    die('Could not get data: ' . mysql_error());
}

while ($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
    print "<li><a href = \"postdetail.html?post={$row['ID']}\">\n" .
            "<span>{$row['ID']}</span>\n" .
            "<h2>{$row['Title']}</h2>\n" .
            "<span>{$row['Description']}</span>\n" .
            "</a></li>\n\n";
}
mysql_close($conn);
?>