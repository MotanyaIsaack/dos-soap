<?php
require "./config/dbconn.php";
require_once "./lib/nusoap.php";

$client = new nusoap_client("http://localhost/School/year-four/distributed-objects/dos-soap/studentlist.php");

// Checks if the client was created correctly and displays an error message if it wasn't
$error = $client->getError();
if ($error) {
    echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
}

// Todo: fetch the student id from the form
$student_id = 96378;
// The call method generates and sends the SOAP request to call the method or function defined by the first argument
// The second argument contains an associative array of arguments of the RPC
$result = $client->call("getStudentDetails", array('student_id' => $student_id, 'mysqli' => $mysqli));

if ($client->fault) {
    echo "<h2>Fault</h2><pre>";
    print_r($result);
    echo "</pre>";
} else {
    // getError() checks for and displays errors
    $error = $client->getError();
    if ($error) {
        echo "<h2>Error</h2><pre>" . $error . "</pre>";
    } else {
        echo "<h2>Student</h2><pre>";
        echo $result;
        echo "</pre>";
    }
}
