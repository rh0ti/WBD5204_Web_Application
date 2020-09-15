<?php

//Verbindung Datenbank

session_start();

$_SESSION['user_id'] = 1;

$db = new PDO('mysql:dbname=wish_list;host=localhost', 'root', 'root');

if(!isset($_SESSION['user_id'])){
    die('You are not signed in.');
}
