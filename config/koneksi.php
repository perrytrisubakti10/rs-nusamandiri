<?php
if (!isset($_SESSION)) {
    session_start();
}
error_reporting(0);
$conn = mysqli_connect('localhost', 'root', '', 'rumahsakit');
