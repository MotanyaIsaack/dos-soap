<?php
session_start();

require_once '../config/DbConn.php';
require_once '../functions/check-student.php';
require_once '../functions/student-functions.php';

$student_id = $full_name = $email = $phone = $address = $entry_points = $message =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //Student ID validation
    if (empty(trim($_POST["student_id"]))) {
        $message .= "Please enter your student id. <br/>";
    } else {
        $student_id = trim($_POST["student_id"]);
    }

    //Fullname validation
    if (empty(trim($_POST["full_name"]))) {
        $message .= "Please enter your fullname. <br/>";
    } else {
        $full_name = trim($_POST["full_name"]);
    }

    //Email validation
    if (checkEmail(trim($_POST['email']), $mysqli)) {
        $email = trim($_POST['email']);
    } else {
        $message .= "Email already exists. <br/>";
    }

    //Phone validation
    if (empty(trim($_POST["phone"]))) {
        $message .= "Please enter a phone number. <br/>";
    } else {
        $phone = trim($_POST["phone"]);
    }

    //Address validation
    if (empty(trim($_POST["address"]))) {
        $message .= "Please enter an address. <br/>";
    } else {
        $address = trim($_POST["address"]);
    }

    //Entry points validation
    if (empty(trim($_POST["entry_points"]))) {
        $message .= "Please enter some entry points. If no enter 0. <br/>";
    } else {
        $entry_points = trim($_POST["entry_points"]);
    }


    //Check for errors before insert in database
    if (empty($message)) {

        if (insertUser($student_id, $full_name, $email, $phone, $address, $entry_points, $mysqli) == true) {
            $message .= $full_name . " registered successfully.";
            $_SESSION["registration_success"] = $message;
            header('location: ../register.php?success');
            exit();
        } else {
            $message .= "Registration Failed.";
            $_SESSION["registration_error"] = $message;
            header('location: ../register.php?failed');
            exit();
        }
    } else {
        $_SESSION["registration_error"] = $message;
        // print($message);
        header('location: ../register.php');
    }
}
