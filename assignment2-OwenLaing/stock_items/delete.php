<?php
include('../includes/connect.php');
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM stock_items WHERE id = $id";
    $result = mysqli_query($connect, $sql);
    if($result) {
        header("location: ./list.php");
        exit;
    }
}