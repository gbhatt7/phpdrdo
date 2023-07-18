<?php

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    require("connect.php");

    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM employee WHERE id=$id";
    $connection->query($sql);
};

header("location: /phpdrdo/employee.php");
exit;

?>