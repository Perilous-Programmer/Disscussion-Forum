<?php

require 'dbcon.php';

if (isset($_REQUEST["Insert"])) {
    $sql = "INSERT INTO `posts` (`ID`, `Title`, `Description`) VALUES (NULL, '{$_REQUEST["title"]}', '{$_REQUEST["desc"]}');";

    $retval = mysql_query($sql, $conn);
    if (!$retval) {
        die('Could not enter data: ' . mysql_error());
    }
}

$sql = 'SELECT * FROM posts';
$retval = mysql_query($sql, $conn);
if (!$retval) {
    die('Could not get data: ' . mysql_error());
}

while ($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
    print "<li class=\"list-group-item\"><a class=\"list-group-item\" href = \"postdetail.html?post={$row['ID']}\">\n" .
            //"<span>{$row['ID']}</span>\n" .
            "<h2>{$row['Title']}</h2>\n" .
            "<span>{$row['Description']}</span>\n" .
            "</a></li>\n\n";
}
mysql_close($conn);
?>