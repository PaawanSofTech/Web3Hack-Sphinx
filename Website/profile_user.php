<?php

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login_user.php");
}


?>

<!DOCTYPE html>
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
    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

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

                        
<script type="text/javascript">
	function googleTranslateElementInit() {
		new google.translate.TranslateElement({ pageLanguage: 'en' }, 'google_translate_element');
	}

	function changeLanguage(language) {
		var select = document.querySelector('.goog-te-combo');
		select.dispatchEvent(new Event('change'));
	}
</script>

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
                                    <a class="nav-link" href="logout.php">Logout</a>
                                </li>


                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <main style="font-size:25px" ;>
        <div class="shadow p-3 mb-5 bg-white rounded" style="margin: 100px; margin-bottom: 100px; padding: 10px;">
            <h1 style="margin: 40px 100px 0px 100px; text-align: center; font-weight: bold;  ">PROFILE</h1>
            <div class="shadow p-3 mb-5 bg-white rounded container" style="margin: 100px; padding: 30px; ">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="media">
                            <img class="mr-3 rounded-circle" src="img/profile.jpg" alt="img/profile.jpg"
                                style="max-width:200px ; margin-left: 100px; margin-top: 20px; display: inline-flex; background-color: rgb(241, 246, 250);">
                        </div>
                    </div>
                    <div class="col-sm-8 " style="text-align: center;">
                        <div class="info"
                            style="text-align: left; display: inline-flex; padding-top: 10px; overflow: hidden; ">
                            <pre><h2>NAME           :       <?php echo $_SESSION['username'] ?></h2>
                            <h2>VID NO.        :       <?php echo $_SESSION['voterid'] ?></h2>
                            <h2>AADHAR NO.     :       <?php echo $_SESSION['aadhar'] ?></h2></pre>


                        </div>
                    </div>
                </div>
            </div>

            <div class="shadow p-3 mb-5 bg-white rounded" style="margin: 100px; padding: 30px;">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="media">
                            <img class="mr-3 rounded-circle" src="img/rajasthan.jpg" alt="Generic placeholder image"
                                style="max-width:200px ; margin-left: 100px; margin-top: 30px; display: inline-flex; background-color: rgb(241, 246, 250);">
                        </div>
                    </div>
                    <div class="col-sm-8 " style="text-align: center;">
                        <div class="info" style="text-align: left;  padding-top: 10px;">
                            <h2 style="font-size: 50px;">RAJASTHAN STATE ELECTION 2023</h2><br>
                            <h3 style="padding-bottom: 20px;font-size: 20px;">DATE - 20 MAY 2023</h3>
                            <div class="form-group">
                                <div class="container">
                                    <a href="http://localhost:3000/">
                                        <button class="btn btn-success btn-lg float-right" style="width: 600px;"
                                            type="button">
                                            VOTE
                                        </button>
                                    </a>
                                </div>
                            </div>

                            </span>
                        </div>
                    </div>

                </div>
            </div>

            <div class="shadow p-3 mb-5 bg-white rounded" style="margin: 100px; padding: 30px;">

                <div>
                    <h2 style="font-size: 30px; font-weight : bold;">Vote History</h2><br>
                    <h3 style="display: inline-flex;">1. Rajasthan State Election 2013</h3>
                    <div class="media" style="display: inline-flex;">
                        <img class="mr-3 rounded-circle" src="img/congress logo.png" alt="Generic placeholder image"
                            style="max-width:40px ; margin-left: 100px; margin-top: 0px; display: inline-flex; background-color: rgb(241, 246, 250); ">
                    </div>
                </div>
                <div>
                    <h3 style="display: inline-flex;">2. Rajasthan State Election 2008</h3>
                    <div class="media" style="display: inline-flex;">
                        <img class="mr-3 rounded-circle" src="img/congress logo.png" alt="Generic placeholder image"
                            style="max-width:40px ; margin-left: 100px; margin-top: 0px; display: inline-flex; background-color: rgb(241, 246, 250); ">
                    </div>
                </div>
            </div>
            <div class="shadow p-3 mb-5 bg-white rounded" style="margin: 100px; padding: 30px;">
                <h2 style="margin: 30px 0px ; font-size:30px; font-weight : bold;  padding-left: 370px;">Information Bulletin</h2>
                <h3 style="padding: 30px;border: 2px solid black;border-radius: 10px;">1. Right to Vote: Every eligible
                    citizen has the right to cast their vote and participate in the electoral process. This includes the
                    right to choose their preferred candidate or political party.</h3>
                <h3 style="padding: 30px;border: 2px solid black;border-radius: 10px;">2. Right to Privacy: Voters have
                    the
                    right to maintain the privacy of their vote. The secrecy of the ballot ensures that no one can
                    determine
                    how an individual voted, thus protecting the voter's freedom to make their own choices without fear
                    of
                    reprisal or influence.</h3>
                <h3 style="padding: 30px;border: 2px solid black;border-radius: 10px;">3. Right to Equal Treatment: All
                    voters are entitled to equal treatment and opportunities to participate in the electoral process.
                    Discrimination based on race, gender, religion, ethnicity, or any other factor is strictly
                    prohibited.
                </h3>
                <h3 style="padding: 30px;border: 2px solid black;border-radius: 10px;">4. Right to Access Information:
                    Voters have the right to access relevant information about candidates, parties, and the electoral
                    process. This includes access to voter education materials, candidate profiles, party platforms, and
                    details about polling locations and procedures.
                </h3>
                <h3 style="padding: 30px;border: 2px solid black;border-radius: 10px;">5. Right to Fair Representation:
                    Voters have the right to be fairly represented in the government. This means that electoral
                    districts
                    should be drawn in a way that ensures fair representation and prevents the dilution of any
                    particular
                    group's voting power.
                </h3>
                <h3 style="padding: 30px;border: 2px solid black;border-radius: 10px;">6. Right to Challenge: If a voter
                    believes their rights have been violated, they have the right to challenge the electoral process
                    through
                    appropriate legal channels. This may involve lodging complaints, seeking legal remedies, or
                    participating in election-related litigation.
                </h3>
                <h3 style="padding: 30px;border: 2px solid black;border-radius: 10px;">7. Right to Participate in
                    Electoral
                    Activities: Voters have the right to engage in political activities such as attending campaign
                    rallies,
                    joining political parties, or supporting candidates of their choice, as long as they comply with
                    relevant laws and regulations.</h3>
                <h3 style="padding: 30px;border: 2px solid black;border-radius: 10px;">8. Right to Transparent and Fair
                    Elections: Voters have the right to expect transparent and fair elections. This includes the proper
                    functioning of electoral systems, accurate voter registration, impartiality of election officials,
                    and a
                    fair counting and tabulation process.</h3>
            </div>
        </div>
    </main>
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
    
</body>


</html>