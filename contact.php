<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sanitize and capture form data
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $type_of_enquiry = strip_tags(trim($_POST["type_of_enquiry"]));
    $message = strip_tags(trim($_POST["message"]));

    // Set recipient email
    $recipient = "subtle.nepal@gmail.com"; // Replace with your email address

    // Email subject
    $subject = "New Contact Form Submission: $type_of_enquiry";

    // Build the email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Type of Enquiry: $type_of_enquiry\n\n";
    $email_content .= "Message:\n$message\n";

    // Email headers
    $email_headers = "From: $name <$email>";

    // Send email and provide feedback
    if (mail($recipient, $subject, $email_content, $email_headers)) {
        echo "Thank you! Your message has been sent.";
    } else {
        echo "Oops! Something went wrong, and we couldn't send your message.";
    }
}
?>