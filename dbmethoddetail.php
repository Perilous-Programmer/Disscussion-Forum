<?php

require 'dbcon.php';

$sql = "SELECT * FROM posts WHERE ID = {$_GET["post"]}";

$retval = mysql_query($sql, $conn);
if (!$retval) {
    die('Could not get data: ' . mysql_error());
}

while ($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
    print //"<span>{$row['ID']}</span>\n" .
            "<div class=\"panel-heading\">".
            "<h2 class=\"panel-title\">{$row['Title']}</h2>\n" .
            "</div>\n<div class=\"panel-body\">".
            "<span>{$row['Description']}</span></div>\n";
}
mysql_close($conn);
?>