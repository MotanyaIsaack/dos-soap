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
                    <a class="nav-link" href="login.php">Register Students</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Search Students</a>
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
                <form method="POST" action='scripts/register-student.php'>
                    <p class="lead">Register</p>
                    <div class="form-group">
                        <input name='student_id' type="text" class="form-control" id="student_id" placeholder="Student ID" style="border-radius:0">
                        <small id="student_id-helpline" class="text-muted">
                            Please enter your fullname
                        </small>
                    </div>
                    <div class="form-group">
                        <input name='full_name' type="text" class="form-control" id="full_name" placeholder="Full name" style="border-radius:0">
                        <small id="fullname-helpline" class="text-muted">
                            Please enter your fullname
                        </small>
                    </div>
                    <div class="form-group">
                        <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" style="border-radius:0" placeholder="Enter email">
                        <small id="email-helpline" class="text-muted">
                            Please enter your email
                        </small>
                    </div>
                    <div class="form-group">
                        <input name="phone" type="number" class="form-control" id="phone" style="border-radius:0" placeholder="Phone">
                        <small id="phone-helpline" class="text-muted">
                            Please enter your phone number
                        </small>
                    </div>
                    <div class="form-group">
                        <input name="address" type="text" class="form-control" id="address" style="border-radius:0" placeholder="Address">
                        <small id="address-helpline" class="text-muted">
                            Please enter your address
                        </small>
                    </div>

                    <div class="form-group">
                        <input name="entry_points" type="text" class="form-control" id="entry_points" style="border-radius:0" placeholder="Entry Point">
                        <small id="address-helpline" class="text-muted">
                            Please enter your entry points
                        </small>
                    </div>

                    <button type="submit" class="btn btn-primary shadow" style="border-radius:0">Register</button>
                </form>
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