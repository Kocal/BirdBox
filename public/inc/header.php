<?php
require_once 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?= $title ?> &bull; BirdBox</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="/assets/css/normalize.css" type="text/css">
        <link rel="stylesheet" href="/assets/css/style.css" type="text/css">
        <link rel="stylesheet" href="/assets/css/better-html-menu.css" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light|Open+Sans' rel='stylesheet' type='text/css'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <header role="banner">
            <h1><a href="/">BirdBox</a></h1>
            <?php require_once 'navbar.php' ?>
        </header>
        <div id="wrapper">
