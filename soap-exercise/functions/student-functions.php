<?php

function insertUser($student_id, $full_name, $email, $phone, $address, $entry_points, $mysqli)
{
    // Set null values for the param values
    $param_student_id = '';
    $param_full_name = '';
    $param_email = '';
    $param_phone = '';
    $param_address = '';
    $param_entry_points = '';
    // require_once ('../config/DbConn.php');
    //Prepare an sql statement
    $sql = "INSERT INTO students (student_id,full_name,email,phone,address,entry_points)
         VALUES (?,?,?,?,?,?)";
    if ($stmt = $mysqli->prepare($sql)) {
        //Bind variables to the prepared statement as parameters
        $stmt->bind_param("ssssss", $param_student_id, $param_full_name, $param_email, $param_phone, $param_address, $param_entry_points);
        //Set the parameters
        $param_student_id = $student_id;
        $param_full_name = $full_name;
        $param_email = $email;
        $param_phone = $phone;
        $param_address = $address;
        $param_entry_points = $entry_points;

        //Attempt to execute the prepared statement
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    //Close the statement
    // $stmt->close();
}

function retrieveStudent($student_id, $mysqli)
{
    // Fill the param fields with null values
    $param_student_id = '';
    // Prepare a select statement
    $sql = "SELECT * FROM students WHERE student_id = ?";

    if ($stmt = $mysqli->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("i", $param_student_id);
        // Set parameters
        $param_student_id = trim($student_id);
        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                $row = $result->fetch_array(MYSQLI_ASSOC);
                return ("<p style='font-size:20px'>
                    Student ID : " . $row["student_id"] . "<br>" .
                    "Student Name: " . $row["full_name"] . "<br>" .
                    "Student Email: " . $row["email"] . "<br>" .
                    "Student Phone: " . $row["phone"] . "<br>" .
                    "Student Address: " . $row["address"] . "<br>" .
                    "Student Entry Points: " . $row["entry_points"] . "<br></p>");
                // "Student ID : " . $row["student_id"],
                // "Student Name: " . $row["full_name"],
                // "Student Email: " . $row["email"],
                // "Student Phone: " . $row["phone"],
                // "Student Address: " . $row["address"],
                // "Student Entry Points: " . $row["entry_points"],

                // Retrieve individual field value
                // $student_id = $row["student_id"];
                // $full_name = $row["full_name"];
                // $email = $row["email"];
                // $phone = $row["phone"];
                // $address = $row["address"];
                // $entry_points = $row["entry_points"];
            } else {
                return false;
            }
        } else {
            return false;
        }
        // Close statement
        $stmt->close();

        // Close connection
        $mysqli->close();
    }
}
