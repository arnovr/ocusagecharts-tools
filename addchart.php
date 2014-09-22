<?php
include('../config/config.php');
$connect = mysqli_connect('localhost', $CONFIG['dbuser'], $CONFIG['dbpassword'], 'owncloud');

$created = new \DateTime();

$query = 'INSERT INTO oc_uc_chartconfig(created, username, charttype, chartprovider) VALUES (
"' . $created->format('Y-m-d H:i:s') . '",
"admin",
"",
"c3js")';
$result = mysqli_query($connect, $query);