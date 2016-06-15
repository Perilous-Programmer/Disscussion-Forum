<?php

require 'dbcon.php';


if (isset($_REQUEST["Insert"])) {
    $sql = "INSERT INTO `comments` (`ID`, `postID`, `Comment`, `name`) VALUES (NULL, {$_REQUEST["post"]}, '{$_REQUEST["Comment"]}', '{$_REQUEST["name"]}');";

    $retval = mysql_query($sql, $conn);
    if (!$retval) {
        die('Could not enter data: ' . mysql_error());
    }
}

if (isset($_REQUEST["post"])) {
    $sql = "SELECT * FROM comments WHERE postID = {$_REQUEST["post"]}";

    $retval = mysql_query($sql, $conn);
    if (!$retval) {
        die('Could not get data: ' . mysql_error());
    }

    while ($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
        print "<li class=\"list-group-item\">".
                "<blockquote><p>{$row['Comment']}</p>".
                "<footer>{$row['name']}</li></footer></blockquote>\n";
    }
}
mysql_close($conn);
?>