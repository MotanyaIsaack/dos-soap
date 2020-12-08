<?php
// Take advantage of the nusoap library
require "lib/nusoap.php";
// require_once "./config/dbconn.php";
require './functions/student-functions.php';

function getStudentDetails($student_id)
{
    require_once "./config/dbconn.php";
    $student_details = retrieveStudent($student_id, $mysqli);
    echo "<br>";
    echo "<br>";
    echo "Fetched Results";
    echo "<br>";
    echo "<br>";
    if (!$student_details) {
        echo "<p style='font-size:20px'><b>Could not find a student with that admission number</b></p>";
    } else {
        print_r($student_details);
    }

    // return (!$student_details ?
    //     "Student with ID of " . $student_id . " does not exist" :
    //     join(",", $student_details));
}


// Instantiate new instance of soap server
$server = new soap_server();
$server->configureWSDL("dos-soap" . "urn:dos-soap");
// Register the getStudentDetails function
$server->register("getStudentDetails", array("student_id" => 'xsd:integer'), array("return" => 'xsd:string'));
// $server->service($HTTP_RAW_POST_DATA);
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';


// $server->service(file_get_contents("php://input"));
$server->service(file_get_contents("php://input"));
