<?php
// Replace contact@example.com with your real receiving email address
$receiving_email_address = 'farizmoshi@gmail.com';

if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
    include($php_email_form);
} else {
    die('Unable to load the "PHP Email Form" Library!');
}

$contact = new PHP_Email_Form;
$contact->ajax = true;

$contact->to = $receiving_email_address;
$contact->from_name = isset($_POST['name']) ? $_POST['name'] : '';
$contact->from_email = isset($_POST['email']) ? $_POST['email'] : '';
$contact->subject = isset($_POST['subject']) ? $_POST['subject'] : '';

// Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials

$contact->smtp = array(
    'host' => 'smtp.gmail.com',
    'username' => 'farizmoshi@gmail.com',
    'password' => 'Meerza9966Rida#',
    'port' => '587',
    'encryption' => 'tls' // Use 'tls' for TLS or 'ssl' for SSL
);

$contact->add_message($contact->from_name, 'From');
$contact->add_message($contact->from_email, 'Email');
$contact->add_message(isset($_POST['message']) ? $_POST['message'] : '', 'Message', 10);

if ($contact->send()) {
    echo 'Message sent successfully';
} else {
    echo 'Failed to send message';
}
?>
