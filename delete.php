<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!empty($_GET['id'])) {

$_id = (int)$_GET['id'];
require "db.php";
$sql1= "DELETE FROM osobe_komentari WHERE id=$_id"; 
$conn->query($sql1);
if($conn->query($sql1) == true){
    header("refresh:1;url='forma.php'");
}
else{
    echo 'Nije izbrisan';
}
    }}
    else{
        echo 'Greska';
    }
?>