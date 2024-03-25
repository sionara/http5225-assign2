<?php
$connect = mysqli_connect(
    // "localhost",
    // "root",
    // "root",
    // "http5225-cms"
    "sql311.infinityfree.com", // Host
    "if0_35758259", // Username
    "BliNLXZCqnE", // Password
    "if0_35758259_http5225" // Database
);
if (!$connect) {
    die("Connection Failed: " . mysqli_connect_error());
}
/* else {
    echo "Connected successfully";
} */
