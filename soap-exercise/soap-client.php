<?php
require_once 'config/dbconn.php';


?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Font-awesome css -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/custom.css">

    <title>SOAP Work</title>
</head>

<body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <a class="navbar-brand" href=""><i class="fas fa-tint"><span> Dos Soap</span></i></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <!-- <a class="nav-link" href="home.html">Home <span class="sr-only">(current)</span></a> -->
                </li>
                <!-- <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li> -->
                <!-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Order
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Request an E-maji delivery</a>
                <a class="dropdown-item" href="#">View orders</a>
                
              </div>
            </li> -->
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Register Students</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="soap-client.php">Search Students</a>
                </li>
            </ul>


        </div>
    </nav>
    <?php
    session_start();
    if (isset($_SESSION['registration_error'])) {
        echo '<div class="message alert alert-danger fade in alert-dismissible show">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true" style="font-size:20px">×</span>
                  </button>    
                  <strong>' . $_SESSION['registration_error'] . '</strong>.

                  
                </div>';
        session_unset();
    } elseif (isset($_SESSION['registration_success'])) {
        echo '<div class="message alert alert-success fade in alert-dismissible show">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true" style="font-size:20px">×</span>
                  </button>    
                  <strong>' . $_SESSION['registration_success'] . '</strong>.

                  
                </div>';
        session_unset();
    }


    ?>
    <!-- end of navbar -->

    <div class="container">
        <div class="row justify-content-center mt-2">
            <div class="col-md-6 bg-light p-3">
                <form method="POST">
                    <p class="lead">Search for student</p>
                    <div class="form-group">
                        <input name='student_id' type="text" class="form-control" id="student_id" placeholder="Student ID" style="border-radius:0">
                        <small id="student_id-helpline" class="text-muted">
                            Please enter the students ID
                        </small>
                    </div>

                    <input name="search-student" type="submit" value="Search" class="btn btn-primary shadow" style="border-radius:0"></input>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center mt-2">
            <div class="col-md-6 bg-light p-3">
                <?php
                if (isset($_POST['search-student'])) {
                    require 'lib/nusoap.php';
                    #pass wsdl file address
                    $client = new nusoap_client("http://localhost/School/year-four/distributed-objects/dos-soap/soap-exercise/soap-server.php?wsdl",);

                    $student_id = $_POST['student_id'];
                    $client->call('getStudentDetails', array("student_id" => $student_id));
                    $server_response = $client->response;
                    echo 'Response:<br>';
                    echo '<br>';
                    echo $server_response;
                }

                ?>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>