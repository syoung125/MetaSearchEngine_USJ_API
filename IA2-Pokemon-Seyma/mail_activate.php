<?php

require("db.php");
$user = $_GET["user"];

$stmt2 = $mysqli->prepare("UPDATE users SET status = \"activated\" WHERE username = ?");
$stmt2->bind_param("s", $user);
$stmt2->execute();

echo "<p>you can now browse the website!
<a href=\"index.php\"; class=\"button\">Browse</a>";

?>