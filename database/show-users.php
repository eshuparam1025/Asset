<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM users");
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
return $stmt->fetchAll();

?>