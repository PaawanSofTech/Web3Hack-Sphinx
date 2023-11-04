<?php
//This script will handle login
session_start();

// check if the user is already logged in
if (isset($_SESSION['username'])) {
    header("location: login_face.html");
    exit;
}
require_once "config.php";

$username = $password = $voterid = $aadhar = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty(trim($_POST['username'])) || empty(trim($_POST['password'])) || empty(trim($_POST['voterid'])) || empty(trim($_POST['aadhar']))) {
        $err = "Please enter username + password + voterid + aadhar";

    } else {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $voterid = trim($_POST['username']);
        $aadhar = trim($_POST['aadhar']);
    }


    if (empty($err)) {
        $sql = "SELECT id, username, password ,voterid ,aadhar FROM users WHERE aadhar = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $param_aadhar);
        $param_aadhar = $aadhar;


        // Try to execute this statement
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $voterid, $aadhar);
                if (mysqli_stmt_fetch($stmt)) {
                    if (password_verify($password, $hashed_password)) {
                        // this means the password is corrct. Allow user to login
                        session_start();
                        $_SESSION["username"] = $username;
                        $_SESSION["id"] = $id;
                        $_SESSION["voterid"] = $voterid;
                        $_SESSION["aadhar"] = $aadhar;
                        $_SESSION["loggedin"] = true;

                        //Redirect user to profile_user page
                        header("location: login_face.html");

                    }
                    // else {
                    //     $err = "Invalid password";
                    //     header("location: error.html");
                    //                     }

                }

            }

        }

    }


}


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Election Commision of India</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="css/slider.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;display=swap'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css'>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./css/news.css">
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="manifest" href="img/site.webmanifest">
    <link rel="stylesheet" href="css/footer.css">
    <script type="text/javascript"
        src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <style>
        .navbar .language-button {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            background-color: #4CAF50;
            color: #ffffff;
            cursor: pointer;
            margin-right: 10px;
        }

        .slider {
            position: relative;
            width: 100%;
            height: 800px;
            overflow: hidden;
        }

        .slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }

        .slide.active {
            opacity: 1;
        }
    </style>

</head>

<body>
<div class="navigation-wrap bg-light start-header start-style">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<nav class="navbar navbar-expand-md navbar-light">
					<div id="google_translate_element"></div>

					<button class="language-button" onclick="changeLanguage('hi')">Translate</button>

					<a class="navbar-brand" href="index.html" target="_blank"><img src="image/logo1.png" alt=""></a>

					<button class="navbar-toggler" type="button" data-toggle="collapse"
						data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
						aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto py-4 py-md-0">

							<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
								<a class="nav-link" href="index.html">Home</a>
							</li>

							<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
								<a class="nav-link" href="news.html">News</a>
							</li>

							<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
								<a class="nav-link" href="instructions.html">Instructions</a>
							</li>

							<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
								<a class="nav-link" href="ballot.html">Ballot</a>
							</li>

							<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
								<a class="nav-link" href="contact.html">Contact</a>
							</li>

							<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
								<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
									aria-haspopup="true" aria-expanded="false">Login</a>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="login_admin.php">Admin Panel</a>
									<a class="dropdown-item" href="login_user.php">Voter Login</a>
								</div>
							</li>

						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</div>
    

    <div class="container mt-4" style="padding : 130px 0px; " >
        <h3 style="font-size:30px ">Voter Login Here:</h3>
        <hr>

        <form action="" method="post">
            <div class="form-group" style="font-size:20px ">
                <label for="exampleInputUserName">Username</label>
                <input type="text" name="username" class="form-control" id="exampleInputUserName"
                    aria-describedby="emailHelp" placeholder="Enter Username" required>
            </div>
            <div class="form-group" style="font-size:20px ">
                <label for="exampleInputPassword">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword"
                    placeholder="Enter Password" required minlength="5" maxlength="20">
            </div>
            <div class="form-group" style="font-size:20px ">
                <label for="exampleInputVoterID">Voter ID</label>
                <input type="text" name="voterid" class="form-control" id="exampleInputVoterID"
                    placeholder="Enter Voter ID" required>
            </div>
            <div class="form-group" style="font-size:20px ">
                <label for="exampleInputAadharNo.">Aadhar No.</label>
                <input type="text" name="aadhar" class="form-control" id="exampleInputAadharNo."
                    placeholder="Enter Aadhar No." required minlength="12" maxlength="12">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>



    </div>
    <footer class="footer-section" style="font-size: 20px;">
        <div class="container">
            <div class="footer-cta pt-5 pb-5">
                <div class="row">
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="cta-text">
                                <h4>Find us</h4>
                                <span style="text-decoration : none;  color : grey;"><a href="https://www.google.com/maps/place/Poornima+Institute+of+Engineering+and+Technology/@26.7677794,75.8503812,17z/data=!3m1!4b1!4m6!3m5!1s0x396dc91e898380fd:0xeee859ae1f1b64b0!8m2!3d26.7677794!4d75.8503812!16s%2Fg%2F11_rvj8nc?entry=ttu"
                                        target="_blank" style="text-decoration : none;  color : grey;" > ISI - 2, Poornima Marg, Sitapura,
                                    Jaipur,
                                    Rajasthan 302022</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="fas fa-phone"></i>
                            <div class="cta-text">
                                <h4>Call us</h4>
                                <span><a href="tel:+91 9928329875" class="cta-text" style="text-decoration : none;  color : grey;">+91 7976645581</a></span><br>
                                <span><a href="tel:+91 9928329875" class="cta-text" style="text-decoration : none;  color : grey;">+91 9928329875</a></span><br>
                                <span><a href="tel:+91 9928329875" class="cta-text" style="text-decoration : none;  color : grey;">+91 8529482153</a></span><br>
                                <span><a href="tel:+91 9928329875" class="cta-text" style="text-decoration : none;  color : grey;">+91 8890919295</a></span><br>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="far fa-envelope-open"></i>
                            <div class="cta-text">
                                <h4>Mail us</h4>
                                <span><a href="mailto:electioncommision4@gmail.com"
									class="cta-text" style="text-decoration : none;  color : grey;">electioncommision4@gmail.com</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-content pt-5 pb-5">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 mb-50">
                        <div class="footer-widget">
                            <div class="footer-logo">
                                <a href="index.html"><img src="img/favicon.jpg" class="img-fluid"
                                        alt="logo"></a>
                            </div>
                            <div class="footer-text">
                                <p></p>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>Useful Links</h3>
                            </div>
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="news.html">News</a></li>
                                <li><a href="instruction.html">Instruction</a></li>
                                <li><a href="ballot.html">Ballot</a></li>
                                <li><a href="contact.html">Contact</a></li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>Subscribe</h3>
                            </div>
                            <div class="footer-text mb-25">
                                <p>Don’t miss to subscribe to our new feeds, kindly fill the form below.</p>
                            </div>
                            <div class="subscribe-form">
                                <form action="#">
                                    <input type="text" placeholder="Email Address">
                                    <button><i class="fab fa-telegram-plane"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 text-center text-lg-left">
                        <div class="copyright-text">
                            <p>Copyright &copy; 2023, All Right Reserved <a
                                    href="error.html">The Creators</a></p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 d-none d-lg-block text-right">
                        <div class="footer-menu">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="news.html">News</a></li>
                                <li><a href="instructions.html">Instruction</a></li>
                                <li><a href="ballot.html">Ballot</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>