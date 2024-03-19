<?php
$connect = mysqli_connect('localhost', 'root', 'root', 'http5225-cms');
if (!$connect) {
    die("Connection Failed: " . mysqli_connect_error());
}
/* else {
    echo "Connected successfully";
} */
