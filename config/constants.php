<?php
// Create Constants to store Non Repeating Values
$LOCALHOST = 'localhost';
$DB_USERNAME = 'root';
$DB_PASSWORD = '';
$DB_NAME = 'timup';

$conn = mysqli_connect($LOCALHOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

// Checking Connection
if (!$conn) {
    die("Connection Failed" . mysqli_connect_error());
}
