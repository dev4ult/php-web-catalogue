<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'web_catalogue';

    $conn = mysqli_connect($hostname, $username, $password, $dbname) or die ('Error connect to the database');
?>