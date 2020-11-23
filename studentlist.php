<?php
// Take advantage of the nusoap library
require_once "lib/nusoap.php";
// require_once "./config/dbconn.php";
require './functions/student-functions.php';

function getStudentDetails($student_id, $mysqli)
{
    $student_id = 96378;
    $student_details = retrieveStudent($student_id, $mysqli);
    return (!$student_details ?
        "Student with ID of " . $student_id . " does not exist" :
        join(",", $student_details));
}


// Instantiate new instance of soap server
$server = new soap_server();
// Register the getStudentDetails function
$server->register("getStudentDetails");
$server->service($HTTP_RAW_POST_DATA);
