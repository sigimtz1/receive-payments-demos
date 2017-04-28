<?php

//Run this file one to init the database
//Needs write permissions in current directory to create the database file

include 'include.php';

$conn = mysqli_connect($mysql_host, $mysql_username, $mysql_password);
if (!$conn) {
    die(__LINE__ . ' Invalid connect: ' . mysqli_error($conn));
}

$result = mysqli_query($conn,'CREATE DATABASE IF NOT EXISTS `' . $mysql_database . '`');

if (!$conn) {
    die(__LINE__ . ' Invalid query: ' . mysqli_error($conn));
}

mysqli_select_db($conn, $mysql_database) or die( "Unable to select database. Run setup first.");

$result = mysqli_query($conn,'CREATE TABLE IF NOT EXISTS invoices (invoice_id INTEGER, price_in_usd DOUBLE, price_in_btc DOUBLE, product_url TEXT, PRIMARY KEY (invoice_id))');

if (!$conn) {
    die(__LINE__ . ' Invalid query: ' . mysqli_error($conn));
}

$result = mysqli_query($conn,'CREATE TABLE IF NOT EXISTS invoice_payments (transaction_hash CHAR(64), value DOUBLE, invoice_id INTEGER, PRIMARY KEY (transaction_hash))');
     
if (!$conn) {
    die(__LINE__ . ' Invalid query: ' . mysqli_error($conn));
}

$result = mysqli_query($conn,'CREATE TABLE IF NOT EXISTS pending_invoice_payments (transaction_hash CHAR(64), value DOUBLE, invoice_id INTEGER, PRIMARY KEY (transaction_hash))');
  
if (!$conn) {
    die(__LINE__ . ' Invalid query: ' . mysqli_error($conn));
}

?>
