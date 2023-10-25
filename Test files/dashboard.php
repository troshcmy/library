<?php

// Include the config file
require_once("config.php");

// Check if the user is logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
<title>User Dashboard</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Custom styles -->
<style>
/* Additional styles */
body {
background-color: #f8f9fa;
}

.container {
margin-top: 50px;
}

.btn-borrow {
background-color: #007bff;
color: #fff;
}

.user-info {
display: flex;
justify-content: space-between;
}

.user-name {
font-size: 18px;
font-weight: bold;
}

.user-email {
font-size: 16px;
}

.borrowed-books {
margin-top: 20px;
}

.borrowed-book {
display: flex;
justify-content: space-between;
}

.borrowed-book-title {
font-size: 16px;
}

.borrowed-book-due-date {
font-size: 14px;
}
</style>
</head>
<body
