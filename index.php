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
        $to_email = 'elearningviet88@gmail.com';
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
    <link rel="stylesheet" href="style.css">
    <!----------------------------------------------Bootstrap CSS---------------------------------------------->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>
    <div class="container-fluid">

        <!------------------------------------------My Logo & Nav Bar------------------------------------------------------->
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand">
                <img src="My Logo Version 1.png" width="210" height="" class="d-inline-block align-top" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
        </nav>
    </div>

    <!---------------------------------------Hero Image--------------------------------------------------------->
    <section class="hero">
        <div>
            <h1>DEVELOPMENT THE WAY</h1>
            <h1>YOU WANT.</h1>
            <h3>I'M A DEVELOPER FROM SINGAPORE.</h3>
            <h3>I CREATE WEB APPLICATIONS.</h3>
            <h3>I'M BLOCKCHAIN READY.</h3>
            <!------------------------------------------Write To Me Button------------------------------------------------>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#writeToMeModal"
                data-whatever="@Ameer">Write To Me</button>
            <!------------------------------------------Write To Me Modal Form-------------------------------------------->
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
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control"
                                        value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control"
                                        value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea name="message"
                                        class="form-control"><?php echo isset($_POST['message']) ? $message : ''; ?></textarea>
                                </div>
                                <br>
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

<!----------------------------------------------My JS--------------------------------------------------------->
<script type="text/javascript" src="main.js"></script>

<!----------------------------------------------Bootstrap JS-------------------------------------------------->
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


</html>