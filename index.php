


<?php
    $error = "";
    $successMessage = "";

    if($_POST) {
        if(!$_POST["email"]) {
            $error .= "An email address id required<br>";
        }
        if(!$_POST["content"]) {
            $error .= "An contect address id required<br>";
        }
        if(!$_POST["subject"]) {
            $error .= "An subject address id required<br>";
        }

        if($_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
            $error .= "The email address is not valid.<br>";
        }

        if($error != "") {
            $error = '<div class="alert alert-danger" role="alert"><p>There were error(s) in your form:</p>' . $error . '</div>';
        }} else {
            $emailTo = "anantamoran@gmail.com";
            $subject = $_POST['subject'];
            $content = $_POST['content'];
            $headers = "From: " . $_POST['email'];

            if(mail($emailTo, $subject, $content, $headers)) {
                $successMessage = '<div class="alert alert-success" role="alert">Your message was sent, ' . ' we\'ll get back to you ASAP!</div>';
            } else {
                $error = '<div class="alert alert-danger role="alert">Your message could\'t be sent - try again</div>';
            }
        }
    
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" conten = "ie-edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    </head>

    <body>
        <div class="container">
            <h1>Get in touch!</h1>

            <div id="error"><?php echo $error.$successMessage ?></div>

            <form method="post" action="action.php">
                <fieldset class="form-group">
                    <label for="email">Email address</label>
                    <input class="form-control" type="email" id="email" name="email" placeholder="Enter email">
                    <small class="text-muted">We'll never share your email eith anyone else.</small>
                </fieldset>
                <fieldset class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter subject">
                </fieldset>

                <fieldset class="from-group">
                    <label for="content">What would you like to ask us ?</label>
                    <textarea name="content" id="content" rows="3" class="form-control"></textarea>
                </fieldset>

                <button type="submit" id="submit" class="btn btn-primary my-3">Submit</button>
            </form>
        </div>

        <script type="text/javascript">
                $("from").submit(function(e) {
                    let error = "";
                    if($("#email").val() = "") {
                        error += "the email field is required<br>";
                    }
                    if($("#subject").val() = "") {
                        error += "the subject field is required<br>"
                    }
                    if($("#content").val() = "") {
                        error += "the content field is required<br>"
                    }
                });

                if(error != "") {
                    $("#error").html('<div class="alert alert-danger" '+' role = "alert"><p><strong>There were error(s) in your form: </strong></p>' + error + '</div>');

                    return false;
                } else {
                    return true;
                }
        </script>
         
    </body>

</html>
