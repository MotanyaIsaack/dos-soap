<?php


//Checks whether email exists
function checkEmail($email, $mysqli)
{
    //Set null values to the param variables
    $param_email = '';
    // require '../config/DbConn.php';
    //Prepare a select statement
    $sql = "SELECT * FROM students WHERE email=?";
    if ($stmt = $mysqli->prepare($sql)) {
        //Bind variables to the prepared statement as parameters
        $stmt->bind_param("s", $param_email);
        //Set the parameters
        $param_email = $email;
        //Attempt to execute the prepared statement
        if ($stmt->execute()) {
            # Store result
            $stmt->store_result();
            if ($stmt->num_rows == 1) {
                //Close statement
                $stmt->close();
                return false;
            } else {
                //Close statement
                $stmt->close();
                return true;
            }
        } else {
            //Close statement
            $stmt->close();
            return false;
        }
    }
}
