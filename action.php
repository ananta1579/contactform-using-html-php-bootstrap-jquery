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
