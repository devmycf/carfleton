<?php
    include 'includes/connection.php';

    $query = "SELECT * FROM  `carf_vikrentcar_locfees`";

    $result = mysql_query($query);

while($loc = mysql_fetch_array($result)){
    echo "<h3>" . $loc['from'] . "</h3>";
}


    $query2 = "INSERT INTO `carf_vikrentcar_locfees`(`id`, `from`, `to`, `daily`, `cost`, `idiva`, `invert`, `losoverride`) VALUES (NULL,'33','34','0','20.00','1','1','')";

?>
<h1>Create a user</h1>
<form action="create.php" method="post">
    <input type="text" name="inputName" value="" />
    <input type="submit" name="submit" />
</form>