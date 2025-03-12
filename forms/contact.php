<?php
phpinfo();
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
$messagesent = false;
if (isset($_POST['email']) && $_POST['email'] != '') {

  if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    
    $username = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $to = "jeloramos10092001@gmail.com";
    $body = "";

    $body .= "From: ".$username. "\r\n";
    $body .= "Email: ".$email. "\r\n";
    $body .= "Message: ".$message. "\r\n";

    //mail($to, $subject, $body);

    $messagesent = true;

  }
}













//   $receiving_email_address = 'jeloramos10092001@gmail.com';

//   if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
//     include( $php_email_form );
//   } else {
//     die( 'Unable to load the "PHP Email Form" Library!');
//   }

//   $contact = new PHP_Email_Form;
//   $contact->ajax = true;
  
//   $contact->to = $receiving_email_address;
//   $contact->from_name = $_POST['name'];
//   $contact->from_email = $_POST['email'];
//   $contact->subject = $_POST['subject'];

//   $contact->add_message( $_POST['name'], 'From');
//   $contact->add_message( $_POST['email'], 'Email');
//   $contact->add_message( $_POST['message'], 'Message', 10);

//   echo $contact->send();
// ?>
