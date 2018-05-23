<?php
    include 'includes/connection.php';

    $name = $_POST['inputName'];

    mysql_query("INSERT INTO people ('ID','Name,'Description') VALUES(NULL,'"$name','$desc')" or die(mysql_error());
?>
