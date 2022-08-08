<?php

include('connections.php');

$stmt = $conn->prepare("SELECT * FROM assets");
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
return $stmt->fetchAll();

?>