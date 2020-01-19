<?php
  if(isset($_POST["submit"]))
  {
      //we need to get our variables first
    
    $email_to =   'workforbetter53@gmail.com'; //the address to which the email will be sent
    $fname     =   $_POST['first-name'];  
    $lname     =   $_POST['last-name'];  
    $email    =   $_POST['email'];
    $subject  =   "LowCostMart";
    $text  =   $_POST['message'];
    
    /*the $header variable is for the additional headers in the mail function,
     we are asigning 2 values, first one is FROM and the second one is REPLY-TO.
     That way when we want to reply the email gmail(or yahoo or hotmail...) will know 
     who are we replying to. */
    // $headers  = "From: $email\r\n";
    // $headers .= "Reply-To: $email\r\n";
    $headers = "From: $email" . "\r\n".
    "Reply-To: $email" . "\r\n".
    'X-Mailer: PHP/' . phpversion();

    $message = "Full Name: $fname $lname \n";
    $message .= "Email: $email \n\n\n";
    $message .= "Message: $text";
    
    if(mail($email_to, $subject, $message, $headers)){
        echo 'Mail has been sent successfully sent!'; // we are sending this text to the ajax request telling it that the mail is sent..      
    }else{
        echo 'Failed to send a mail, please try again!, Thanks.';// ... or this one to tell it that it wasn't sent    
    }
  }  
?>