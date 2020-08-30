<?php
//Message Vars
$msg = '';
$msgClass = '';

//Check for Submit
if (filter_has_var(INPUT_POST, 'submit')){
//Get Form Data
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$message = htmlspecialchars($_POST['message']);
                            
//Check required fields
if(!empty($name) && !empty($email) && !empty($message)){
    //Passed
    //Check Email
    if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
//Failed
$msg = 'Please use a valid email';
    $msgClass = 'alert-danger';
    } else {
        //Passed
        $to_email = 'ameer.pestana@theeviet.com';
        $subject = 'Contact Request From ' .$name;
        $body = '<h2>Contact Request </h2>
        <h4>Name</h4><p>' .$name.'</p>
        <h4>Email</h4><p>'.$email.'</p>
        <h4>Message</h4><p>'.$message.'</p>';

        //Email Headers
        $headers = "MIME-Version: 1.0" ."\r\n";
        $headers .= "Content-Type:text/html;charset=UTF-8" . "\r\n";

        //Additional Headers
        $headers .= "From: " .$name. "<".$email.">". "\r\n";

        if(mail($to_email, $subject, $body, $headers)) {
            //Email Sent
            $msg = 'Your email has been sent';
            $msgClass = 'alert-sucess';
        } else {
            //Failed
            $msg = 'Your email was not sent';
            $msgClass = 'alert-danger';
        }
    }

} else {
    //Failed
    $msg = 'Please fill in all fields';
    $msgClass = 'alert-danger';
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ameer Pestana</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <!--------------------------------Bootstrap CSS--------------------------------->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">

</head>

<body>
    <div class="container-fluid">

        <!-----------------My Logo & Nav Bar----------------->
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="#"><img src="images/My Logo Version 1.png" width="156" height="23" alt=""
                    loading="lazy"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-navicon" style="color: #40E0D0"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <button type="button" class="btn btn-primary navbarButton" data-toggle="modal"
                            data-target="#writeToMeModal" data-whatever="Ameer">Write To Me</button>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#myProjects">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">About</a>
                    </li>
                </ul>
            </div>
        </nav>                  

        <!------------------------------Hero Image------------------------------------>
        <section class="hero" id="home">
            <div>
                <h1>DEVELOPMENT THE WAY</h1>
                <h1>YOU WANT.</h1>
                <h3>I CREATE WEB APPLICATIONS.</h3>
                <!------------------------Write To Me Button-------------------------->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#writeToMeModal"
                    data-whatever="Ameer">Write To Me</button>
                <!-----------------------Write To Me Modal Form---------------------->
                <div class="modal fade" id="writeToMeModal" tabindex="-1" role="dialog"
                    aria-labelledby="writeToMeModalLabel" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="titleModal">Leave Me Your Contact Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <?php if ($msg): ?>
                                <div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
                                <?php endif; ?>
                                <form id="writeToMeForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input id="nameField" type="text" class="form-control" required
                                            value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input id="emailField" type="email" class="form-control" required
                                            value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea
                                            class="form-control"><?php echo isset($_POST['message']) ? $message : ''; ?></textarea>
                                    </div>
                                    <br>
                                    <button id="submitButton" type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!----------------------------------My Projects------------------------------->
        <section class="bg-dark gradientDark" id="myProjects">
            <h1>My Projects</h1>
            <div class="py-5">
                <div class="row">

                    <div class="col-lg-4 mb-3 mb-lg-0">
                        <div class="hover hover-2 text-white rounded"><img src="images/PwCAcademy.png">
                            <div class="hover-overlay"></div>
                            <div class="hover-2-content px-5 py-4">
                                <h3 class="hover-2-title text-uppercase font-weight-bold mb-0"> <span
                                        class="font-weight-light"> PWC Academy </span>Learning Management System</h3>
                                <p class="hover-2-description text-uppercase mb-0">Develop the front-end
                                    <br> of the PwC Academy LMS
                                    <br><a href="https://github.com/Ameer28/PwCSGAcademyLMS.git" target="_blank">Github
                                        Repository</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-3 mb-lg-0">
                        <div class="hover hover-2 text-white rounded"><img src="images/TECHLearningCentreScreenshot.png">
                            <div class="hover-overlay"></div>
                            <div class="hover-2-content px-5 py-4">
                                <h3 class="hover-2-title text-uppercase font-weight-bold mb-0"> <span
                                        class="font-weight-light">TECH Learning Centre </span>Website</h3>
                                <p class="hover-2-description text-uppercase mb-0">Website for a client using <br> HTML,
                                    CSS
                                    & JQuery
                                    <br><a href="https://github.com/Ameer28/TECHLearningCentre.git"
                                        target="_blank">Github
                                        Repository</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-3 mb-lg-0">
                        <div class="hover hover-2 text-white rounded"><img src="images/e-viet.png">
                            <div class="hover-overlay"></div>
                            <div class="hover-2-content px-5 py-4">
                                <h3 class="hover-2-title text-uppercase font-weight-bold mb-0"> <span
                                        class="font-weight-light">E-Viet Android App <br></span>Landing Page</h3>
                                <p class="hover-2-description text-uppercase mb-0">Short description of app
                                    <br>more details</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="py-5">
                <div class="row">

                    <div class="col-lg-4 mb-3 mb-lg-0">
                        <div class="hover hover-2 text-white rounded"><img src="images/Ameer's PokeDex1.png">
                            <div class="hover-overlay"></div>
                            <div class="hover-2-content px-5 py-4">
                                <h3 class="hover-2-title text-uppercase font-weight-bold mb-0"> <span
                                        class="font-weight-light"> Pokedex </span> Web App</h3>
                                <p class="hover-2-description text-uppercase mb-0">Autocomplete search bar to query
                                    <br>names of Pokemon using the Pokemon API.
                                    <br><a href="https://github.com/Ameer28/AmeerPokedex.git" target="_blank">Github
                                        Repository</a></p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 mb-3 mb-lg-0">
                        <div class="hover hover-2 text-white rounded"><img src="">
                            <div class="hover-overlay"></div>
                            <div class="hover-2-content px-5 py-4">
                                <h3 class="hover-2-title text-uppercase font-weight-bold mb-0"> <span
                                        class="font-weight-light">Currency Converter <br> </span>Web App</h3>
                                <p class="hover-2-description text-uppercase mb-0">Website for a client using <br> HTML,
                                    CSS
                                    & JQuery
                                    <br><a href="https://github.com/Ameer28/TECHLearningCentre.git"
                                        target="_blank">Github
                                        Repository</a></p>
                            </div>
                        </div>
                    </div>
                </div>
        </section>

        <!-------------------------------About Me------------------------------------->
        <section class="aboutMe" id="contact">
            <h1>About Me</h1>
            <div class="container">
                <div class="row">

                    <div class="col-lg-6">
                        <div class="myProfileDescription">
                            <p>Ut venenatis lorem bibendum lacus cursus tincidunt. Aliquam gravida aliquet sapien sit
                                amet finibus. Morbi quis sapien nisi. Pellentesque non tincidunt lorem.
                                Aenean non sollicitudin mi, ac mollis mi. Suspendisse vehicula ligula eu consequat
                                aliquet. Curabitur ultricies semper scelerisque.</p>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="socialNetworks">
                            <span class="socialNetworkHover">
                                <a href="https://www.linkedin.com/in/ameer-pestana-284222114/">
                                    <img src="images/icons8-linkedin-120.png"></a>
                                <a href="https://github.com/Ameer28/">
                                    <img src="images/icons8-github-120.png"></a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <!-----------------------------------Footer-------------------------------------->
        <footer class="copyrightFoot">
            <p>Copyright &#169 2020 Ameer Pestana</p>
        </footer>

        <!----------------------------My JS & Jquery---------------------------------->
        <script type="text/javascript" src="main.js"></script>

        <!-------------------------------Bootstrap JS--------------------------------->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js">
        </script>

</body>

</html>