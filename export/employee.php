<?php
require('connect.php');
$connection = new mysqli($servername, $username, $password, $database);
//read all row from database table
$sql = "SELECT * FROM employee";
$result = $connection->query($sql);

if (!$result) {
    die("Invalid query: " . $connection->error);
}

$html = '<table><tr><td>Id</td><td>Name</td><td>Email</td><td>Phone</td><td>Division</td><td>Cader</td><td>Post</td><td>Post In</td><td>Post Out</td><td>Address</td><td>Education</td></tr>';

//read data of each row
while ($row = $result->fetch_assoc()) {
    $html.='<tr>
    <td>'.$row['id'].'</td>
    <td>'.$row['name'].'</td>
    <td>'.$row['email'].'</td>
    <td>'.$row['phone'].'</td>
    <td>'.$row['division'].'</td>
    <td>'.$row['cader'].'</td>
    <td>'.$row['post'].'</td>
    <td>'.$row['postin'].'</td>
    <td>'.$row['postout'].'</td>
    <td>'.$row['address'].'</td>
    <td>'.$row['education'].'</td>
    </tr>';
}

$html.='</table>';

header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=report.xls');

echo $html;
?>